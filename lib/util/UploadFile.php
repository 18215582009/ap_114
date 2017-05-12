<?php
/**
 * Created on 2008-03-14
 * 文件上传
 * @author ld<luodongdaxia@yahoo.com.cn>
 * ChengDu CandorSoft Co., Ltd.
 * @version $Id: UploadFile.class.php,v 1.1 2011/11/28 06:12:20 ld Exp $
 */
namespace lib\util;
use Gregwar\Image\Image;

class UploadFile{

	// 允许的扩展名
	private $allowType = array('gif', 'jpg', 'png','bmp', 'zip', 'rar', 'txt', 'xls','xlsx', 'doc','docx','pdf','wmv','jpeg','swf','flv','avi','csv');
	//private $allowType = array('gif', 'jpg', 'png');

	// 上传文件是否重新命名
    public $renewname = true;

	// 使用对上传图片进行缩略图处理
    public $thumb = true;

	// 缩略图最大宽度
    private $thumbWidth = 160;

	// 缩略图最大高度
    private $thumbHeight = 160;

	// 是否加水印
	private $water = CK_WATER;

	// 水印类型
	private $water_type = WATER_TYPE;

	// 生成MD5
	private $checksum = false;

    // 用户上传的文件
	private $postFile = array();

    // 上传路径
    private $upload_path = "/upload/";

    // 自定义文件上传路径
    private $customPath = "";

    // 文件最大尺寸
    private $maxSize = "";

    // 最后一次出错信息
    private $lastError = "";

    // 缩略图后缀
    private $thumbSuffix   =  '_s';

    // 最终保存的文件名
    private $endFileName = "";

    // 磁盘决对路径
    private $disk_path = "";

    // 保存文件的最终信息
	private $saveInfo = array();

	/**
	* 构造函数
	* @access public
	*/
	public function __construct($arrFile, $path="_", $size = 20000000000) {
		$this->saveInfo    = array();
		$this->postFile    = $arrFile;
		//$this->customPath  = $path == "_" ? $this->upload_path.base64_encode(date("Y-W"))."/" :$this->upload_path.base64_encode(date("Y-W"))."/" ;
		$this->customPath  = $path == "_" ? $this->upload_path.date("Ymd")."/" :$this->upload_path.$path."/".date("YW")."/" ;
		$this->maxSize     = $size;
        Util::mk_dir(WEB_ROOT.$this->customPath);
	}


	/**
	* 文件上传的核心代码
	* @access public
	* @return int 上传成功文件数
	*/
	public function upload() {
		$iLen = sizeof($this->postFile['name']);
		$now = time();
		for($i=0;$i<$iLen;$i++){
			if ($this->postFile['error'] == 0) { //上传时没有发生错误
				 //取当前文件名、临时文件名、大小、扩展名，后面将用到。
				$sName  = $this->postFile['name'];
				$sTName = $this->postFile['tmp_name'];
				$iSize  = $this->postFile['size'];
				$sType  = $this->postFile['type'];
				$sExtN  = $this->_GetExtName($sName);
				$sMd5   = "";

				//检测当前上传文件大小是否合法。
				if($this->_CheckSize($iSize)){
					$this->lastError = "您上传的文件[".$sName."],超过系统支持大小!";
					$this->_ShowMsg($this->lastError);
					continue;
				}

				//检测当前上传文件名称是否合法。
				if($this->_CheckExtName($sExtN)){
					$this->lastError = "您上传的文件[".$sName."],系统不支持的文件类型!";
					$this->_ShowMsg($this->lastError);
					continue;
				}

				if(!is_uploaded_file($sTName)) {
					$this->lastError = "您的文件不是通过正常途径上传!";
					$this->_ShowMsg($this->lastError);
					continue;
				}

				//上传文件是否从新命名
				if($this->renewname){
					$_fileName = strtolower(session_id())."_".($now++).rand(100, 999).".".$sExtN;
				}else{
					$_fileName = $sName;
				}

				$this->endFileName = $this->customPath.$_fileName;
                $this->disk_path = WEB_ROOT.$this->endFileName;

				if(!move_uploaded_file($sTName, $this->disk_path)) {
					$this->lastError = $this->postFile['error'];
					$this->_ShowMsg($this->lastError);
					continue;
				}

				if(in_array($sType,array('image/jpg','image/jpeg','image/png','image/gif'))){
					/************** lib\util\Image *****************
					//图片水印处理
					if($this->water){//给原图加水印
						if(strtolower($this->water_type) == "overlay") { // 加水印
							$image = Image::getImageInfo($this->disk_path);
							if(false !== $image) Image::overlay_watermark($this->disk_path);
						}else if (strtolower($this->water_type) == "text") {
							$image = Image::getImageInfo($this->disk_path);
							if(false !== $image)  Image::text_watermark($this->disk_path);
						}
					}
					

				  if($this->thumb) { // 生成图像缩略图
						$image = Image::getImageInfo($this->disk_path);
						if(false !== $image) {
							$thumbname =  Image::thumb($this->disk_path,'','',$this->thumbWidth,$this->thumbHeight,true,$this->thumbSuffix);
							$thumbname_n =  Image::thumb($this->disk_path,'','','320','320',true,'_n');
							$thumbname_m =  Image::thumb($this->disk_path,'','','900','900',true,'_m');
							//Image::overlay_watermark($thumbname_m);
						}
					}
					********************************************/

					//图片水印处理
					if($this->water){//给原图加水印
						if(strtolower($this->water_type) == "overlay") { // 加水印
							Image::open($this->disk_path)->merge(Image::open(WATER_PIC_PATH)->cropResize(100, 100))->save($this->disk_path, $sExtN);
						}
					}

				   if($this->thumb) { // 生成图像缩略图
						//计算图片缩放比例
					   $imageInfo = @getimagesize($this->disk_path);
					   $srcWidth  = $imageInfo[0];
					   $srcHeight = $imageInfo[1];
					   $thumbscale = min($this->thumbWidth/$srcWidth, $this->thumbHeight/$srcHeight); // 计算缩放比例
					   $smlscale = min(320/$imageInfo[0], 320/$imageInfo[1]); // 计算缩放比例
					   $midscale = min(900/$imageInfo[0], 900/$imageInfo[1]); // 计算缩放比例
					   // 图像小于缩放大小，安原始图像大小生成图片，即$scale值为1
					   if(ceil($thumbscale)>1){$thumbscale='100%';}else{$thumbscale=($thumbscale*100).'%';}
					   if(ceil($midscale)>1){$midscale='100%';}else{$midscale=($midscale*100).'%';}
					   if(ceil($smlscale)>1){$smlscale='100%';}else{$smlscale=($smlscale*100).'%';}

					   $thumb_x  = substr($this->disk_path,0,strrpos($this->disk_path, '.')).'_x.'.$sExtN;
					   $thumb_s  = substr($this->disk_path,0,strrpos($this->disk_path, '.')).'_s.'.$sExtN;
					   $thumb_m  = substr($this->disk_path,0,strrpos($this->disk_path, '.')).'_m.'.$sExtN;
					   //Image::open($this->disk_path)->resize($this->thumbWidth,$this->thumbHeight)->save($thumb_x, $sExtN);
					   Image::open($this->disk_path)->resize($thumbscale)->save($thumb_x, $sExtN);
					   Image::open($this->disk_path)->resize($smlscale)->save($thumb_s, $sExtN);
					   Image::open($this->disk_path)->resize($midscale)->save($thumb_m, $sExtN);
					}
				}
                
				// 如果允许生成MD5, 且文件小于2M　则生成
				if($this->checksum AND $iSize < 2097152) $sMd5 = md5(read_file($this->endFileName));

				//存储当前文件的有关信息，以便其它程序调用。
				$this->saveInfo[] =  array("name" => $sName, "type" => $sExtN, "checksum"=> $sMd5,  "size" => $iSize,  "url" => $this->endFileName);
			}
		}
		return sizeof($this->saveInfo);
	}

	/**
	* 多个文件上传的核心代码
	* @access public
	* @return int 上传成功文件数
	*/
	public function uploads() {
		$iLen = sizeof($this->postFile['name']);
		$now = time();
		for($i=0;$i<$iLen;$i++){
			if ($this->postFile['error'][$i] == 0) { //上传时没有发生错误
				 //取当前文件名、临时文件名、大小、扩展名，后面将用到。
				$sName  = $this->postFile['name'][$i];
				$sTName = $this->postFile['tmp_name'][$i];
				$iSize  = $this->postFile['size'][$i];
				$sType  = $this->postFile['type'][$i];
				$sExtN  = $this->_GetExtName($sName);
				$sMd5   = "";

				//检测当前上传文件大小是否合法。
				if($this->_CheckSize($iSize)){
					$this->lastError = "您上传的文件[".$sName."],超过系统支持大小!";
					$this->_ShowMsg($this->lastError);
					continue;
				}

				//检测当前上传文件名称是否合法。
				if($this->_CheckExtName($sExtN)){
					$this->lastError = "您上传的文件[".$sName."],系统不支持的文件类型!";
					$this->_ShowMsg($this->lastError);
					continue;
				}

				if(!is_uploaded_file($sTName)) {
					$this->lastError = "您的文件不是通过正常途径上传!";
					$this->_ShowMsg($this->lastError);
					continue;
				}

				//上传文件是否从新命名
				if($this->renewname){
					$_fileName = strtoupper(session_id())."_".($now++).rand(100, 999).".".$sExtN;
				}else{
					$_fileName = $sName;
				}

				$this->endFileName = $this->customPath.$_fileName;
                $this->disk_path = WEB_ROOT.$this->endFileName;

				if(!move_uploaded_file($sTName, $this->disk_path)) {
					$this->lastError = $this->postFile['error'][$i];
					$this->_ShowMsg($this->lastError);
					continue;
				}

                if($this->thumb) { // 生成图像缩略图
                    $image = Image::getImageInfo($this->disk_path);
                    if(false !== $image) {
                        $thumbname =  Image::thumb($this->disk_path,'','',$this->thumbWidth,$this->thumbHeight,true,$this->thumbSuffix);
						$thumbname =  Image::thumb($this->disk_path,'','','600','600',true,'_m');
                    }
                }
				
			   //图片水印处理
               if($this->water){
					if(strtolower($this->water_type) == "overlay") { // 加水印
						$image = Image::getImageInfo($this->disk_path);
						if(false !== $image) Image::overlay_watermark($this->disk_path);
					}else if (strtolower($this->water_type) == "text") {
						$image = Image::getImageInfo($this->disk_path);
						if(false !== $image)  Image::text_watermark($this->disk_path);
					}
			   }

				// 如果允许生成MD5, 且文件小于2M　则生成
				if($this->checksum AND $iSize < 2097152) $sMd5 = md5(read_file($this->endFileName));

				//存储当前文件的有关信息，以便其它程序调用。
				$this->saveInfo[] =  array("name" => $sName, "type" => $sExtN, "checksum"=> $sMd5,  "size" => $iSize,  "url" => $this->endFileName);
			}
		}
		return sizeof($this->saveInfo);
	}

	/**
	* 得到上传信息
	* @access public
	* @return Array 保存信息
	*/
	public function getSaveInfo(){
		return $this->saveInfo;
	}


	/**
	* 设置允许类型
	* @access public
	*/
	public function setAllowType($arr, $isAdd = true) {
		if(!$isAdd) $this->allowType = array();
		if(is_array($arr)) $this->allowType = array_merge($arr, $this->allowType);
		if(is_string($arr)) $this->allowType[] = $arr;
		$this->allowType = array_unique($this->allowType);
	}

	/**
	* 设置上传文件是否重命名
	* @access public
	*/
	public function setrenewname($isrenewname) {
		$this->renewname = $isrenewname;
	}

	/**
	* 设置上传文件目录
	* @access public
	*/
	public function setcustomPath($iscustomPath) {
		$this->customPath = $iscustomPath;
	}

	/**
	* 设置是否缩略图
	* @access public
	*/
	public function setthumb($isthumb) {
		$this->thumb = $isthumb;
	}
	/**
	* 设置缩略图宽度
	* @access public
	*/
	public function setWidth($width) {
		$this->thumbWidth = $width > 0 ? (int)$width : 200;
	}

	/**
	* 设置缩略图高度
	* @access public
	*/
	public function setHeight($height) {
		$this->thumbHeight = $height > 0 ? (int)$height : 200;
	}

	/**
	* 是否加水印
	* @access public
	*/
	public function setWater($water) {
		$this->water = $water;
	}

	/**
	* 生成MD5验证
	* @access public
	*/
	public function setChecksum($checksum) {
		$this->checksum = $checksum;
	}

	/**
	* 设置上传最大文件大小
	* @access public
	*/
	public function setMaxSize($size) {
		$this->maxSize = $size;
	}

	/**
	* 得到文件名的扩展名
	* @access private
	* @return String 返回文件扩展名
	*/
	public function _GetExtName($fileName){
		$arrParts = pathinfo($fileName);
		return strtolower($arrParts['extension']);
	}

	/**
	* 判断文件大小
	* @access private
	* @return boolean 传入size大于系统定义，则TRUE，反之FALSE
	*/
	public function _CheckSize($size){
		return $size > $this->maxSize;
	}

	/**
	* 判断文件大小
	* @access private
	* @return boolean 传入size大于系统定义，则TRUE，反之FALSE
	*/
	public function _CheckExtName($extName){
		return !in_array(strtolower($extName), $this->allowType);
	}


	/**
	* 输出错误信息
	* @access private
	* @return void
	*/
	private function _ShowMsg($msg){
		//throw_exception($msg);
		Util::page_msg($msg,"alert",$_SERVER['HTTP_REFERER']);
	}
	
	public function DeleteFile($FileName)
	{
		$FileName_s = str_replace('.','_s.',$FileName);
		$FileName_m = str_replace('.','_m.',$FileName);
		$FileName_x = str_replace('.','_x.',$FileName);
		if (file_exists($FileName)) {
			 @unlink($FileName);
		}		
		if (file_exists($FileName_s)) {
			 @unlink($FileName_s);
		}
		if (file_exists($FileName_m)) {
			 @unlink($FileName_m);
		}
		if (file_exists($FileName_x)) {
			 @unlink($FileName_x);
		}


	}
	//是否删除原图
	public function DelOriginalImage($is_del){
		$this->del_original_image = $is_del;
	}

}
?>
