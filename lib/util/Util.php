<?php
/**
 * 工具类，全静态方法
 * @author Administrator
 * @version 1.0
 * @created 13-一月-2011 11:06:01
 */
namespace lib\util;

class Util
{
	/**
	 * 格式化参数
	 *
	 *     调用举例:
	 *     <code>
	 *     生成加密串
	 *     $aPara = array("id"=>10, "name"=>"tom's", "addr"=>"四川省，成都市");
	 *     Util::formatParameter($aPara, "in");
	 *     //
	 * 返回：YWRkciwlQ0IlQzQlQjQlQTglQ0ElQTElQTMlQUMlQjMlQzklQjYlQkMlQ0ElRDAsaWQsMTAsbmFtZ
	 * Sx0b20lMjdz
	 *
	 *     将加密串还原成数组
	 *     $str =
	 * "YWRkciwlQ0IlQzQlQjQlQTglQ0ElQTElQTMlQUMlQjMlQzklQjYlQkMlQ0ElRDAsaWQsMTAsbmFtZSx
	 * 0b20lMjdz";
	 *     Util::formatParameter($aPara, "out");
	 *     // 返回：
	 *     Array
	 *     (
	 *        [addr] => 四川省，成都市
	 *        [id] => 10
	 *        [name] => tom's
	 *    )
	 *    </code>
	 *
	 * 	return Array 或 String 根据转换类型返回指定数据
	 *
	 * @param data    Array 或 String 根据转换类型返回指定数据
	 * @param type     参数转化类型 in:生成加密传递字符串，out:将加密字符串还原成数组
	 * @return mixed
	 */
	static function formatParameter($data, $type='in')
	{
		if(@!$data) return;
        $output = null; // 返回数据
        $arrTemp = array(); // 临时数组

        if("in" === $type) { // 参数输入转换
            if(is_string($data) || is_int($data)) $data = array($data);
            if(is_array($data)) ksort($data);

            foreach ($data as $k => $v) { // 编码字符
                $arrTemp[] = rawurlencode(trim($k));
                $arrTemp[] = rawurlencode(trim($v));
            }
            $output = rawurlencode(base64_encode(implode(",", $arrTemp)));

        }else{ // 将参数还原
            $strTemp = base64_decode(rawurldecode(trim($data)));
            $arrTemp = split (',', $strTemp);
            $iLen = count($arrTemp);
            $output = array();
            for($i = 0; $i < $iLen; ) $output[rawurldecode($arrTemp[$i++])] = rawurldecode($arrTemp[$i++]);
        }

        return $output;
	}

	/**
	 * URL重定向
	 *
	 * @param String $url 路径
	 * @param Integer $time 时间(秒)
	 * @param String $msg 提示信息
	 * @retrun object
	 */
	static public function redirect($url,$time=0,$msg='')
	{
		//多行URL地址支持
		$url = str_replace(array("\n", "\r"), '', $url);
		if(empty($msg)) {
			$msg = "系统将在{$time}秒之后自动跳转到{$url}！";
		}

		if (!headers_sent()) {
			// redirect text/html; charset=utf-8
			header("Content-Type:text/html; charset=utf-8");
			if(0===$time) {
				header("Location: ".$url);
			}else {
				header("refresh:{$time};url={$url}");
				echo($msg);
			}
			exit();
		}else {
			$str = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
			if($time!=0) {
				$str .= $msg;
			}
			exit($str);
		}
	}

	/**
	 * 输出页面提示信息
	 *
	 * @param string $msg 页面提示信息
	 * @param string $type 调用页面类型,参数类型:succeed,error,help,warning,info,stop,forbidden
	 * @param string $url  跳转页面地址,为空返回前一链接，数据格式为"url",也可以为"url|title",如"http://www.fg.com/index|返回平台首页"
	 * @param int $time 等待跳转时间
	 * @param string $url2 跳转页面地址2,数据格式为"url|title",如"http://www.fg.com/index|返回平台首页"
	 */
	static public function page_msg($msg='',$type='',$url='',$time=0, $url2=''){
		switch($type){
			case "succeed":
				$style = "succeed";
				break;
			case "error":
				$style = "error";
				break;
			case "help":
				$style = "help";
				break;
			case "warning":
				$style = "warning";
				break;
			case "info":
				$style = "info";
				break;
			case "stop":
				$style = "stop";
				break;
			case "forbidden":
				$style = "forbidden";
				break;
			default:
				$style = 'help';
		}
		include '../../lib/error/msg.php';
		exit;
	}

	/**
	 * 自定义异常处理，错误输出
	 *
	 * 定向到指定的错误页面
	 * @param mixed $error 错误信息 暂时接受字符串
	 * 数组格式为异常类专用格式，不接受自定义数组格式
	 * @return void
	 */
	static public function throw_exception($error) {
		$errMsg = "";
		//var_dump($error);
		$arrErrors = array();
		if(!is_array($error)) {
			$aTrace = debug_backtrace();
			$errMsg = $error;
			$iCount = count($aTrace);
			$now = date("y-m-d H:i:m");
			for($i=1; $i<$iCount; $i++) {
				$_at = $aTrace[$i];
				//Todo:发现问题，描述如下:
				//系统跟踪到框架的module模块的业务control时，将出现跟踪参数的丢失，如下面isset中的变量，没有找到最终的原因，可能与框架的自动加载类和模块有光
				if(!isset($_at['file']) or !isset($_at['line']) or !isset($_at['class']) or !isset($_at['type']))break;
				$arrErrors[] = '['.$now.'] '.$_at['file'].' (第 '.$_at['line'].' 行) ' . $_at['class'].$_at['type'].$_at['function']."()";
			}
		}else {
			$errMsg = implode($error, "<br/>");
			$arrErrors = $error;
		}
		include '../../lib/error/exception.php';
		exit;
	}

	/**
	 * 输出弹出框提示信息
	 *
	 * @param string $msg 页面提示信息
	 * @param string $type 调用页面类型,参数类型:succeed,error,help,warning,info,stop,forbidden
	 * @param string $url  跳转页面地址,为空返回前一链接，数据格式为"url",也可以为"url|title",如"http://www.fg.com/index|返回平台首页"
	 * @param int $time 等待跳转时间
	 * @param string $url2 跳转页面地址2,数据格式为"url|title",如"http://www.fg.com/index|返回平台首页"
	 * @param string $lock 锁屏
	 */
	static public function alert_msg($msg='',$type='', $url='',$time=0,$url2='',$lock=true){
		switch($type){
			case "succeed":
				$style = "succeed";
				break;
			case "error":
				$style = "error";
				break;
			case "help":
				$style = "help";
				break;
			case "warning":
				$style = "warning";
				break;
			case "info":
				$style = "info";
				break;
			case "stop":
				$style = "stop";
				break;
			case "forbidden":
				$style = "forbidden";
				break;
			default:
				$style = 'help';
		}
		include '../../lib/error/alertmsg.php';
		exit;
	}

	/**
	 * 访问提示页面
	 *
	 * @param string $msg 页面提示信息
	 * @param string $type 调用页面类型,参数类型:succeed,error,help,warning,info,stop,forbidden
	 * @param string $url  跳转页面地址,为空返回前一链接，数据格式为"url",也可以为"url|title",如"http://www.fg.com/index|返回平台首页"
	 * @param int $time 等待跳转时间
	 */
	static public function prompt($msg='',$type='',$url='',$time=5){
		switch($type){
			case "404":
				$style = "404";
				break;
			case "":
				$style = "200";//ok
				break;
			default:
				$style = '404';
		}
		include '../../lib/error/'.$type.'.php';
		exit;
	}

	/**
	 * 字符串截取，支持中文和其他编码
	 *
	 * @param string $str 需要转换的字符串
	 * @param string $start 开始位置
	 * @param string $length 截取长度
	 * @param string $charset 编码格式
	 * @param string $suffix 截断显示字符
	 * @return string
	 */
	static public function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true) {
		$return = "";
		if(function_exists("mb_substr"))
			$return = mb_substr($str, $start, $length, $charset);
		elseif(function_exists('iconv_substr')) {
			$return = iconv_substr($str,$start,$length,$charset);
		}
		if($suffix && strlen($str) > strlen($return)) $return .= "…";
		return $return;

		$re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
		$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
		$re['gbk']	  = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
		$re['big5']	  = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
		preg_match_all($re[$charset], $str, $match);
		$slice = join("",array_slice($match[0], $start, $length));
		if($suffix) return $slice."…";
		return $slice;
	}

	/**
	 * 产生随机字串，可用来自动生成密码 默认长度6位 字母和数字混合
	 *
	 * @param string $len 长度
	 * @param string $type 字串类型
	 * 0 字母 1 数字 其它 混合
	 * @param string $addChars 额外字符
	 * @return string
	 */
	static public function rand_string($len=6, $type='', $addChars='') {
		$str ='';
		switch($type) {
			case 0:
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.$addChars;
				break;
			case 1:
				$chars= str_repeat('0123456789',3);
				break;
			case 2:
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ'.$addChars;
				break;
			case 3:
				$chars='abcdefghijklmnopqrstuvwxyz'.$addChars;
				break;
			 //case 4: // 中文字符串在此
			default :
				// 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
				$chars='ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789'.$addChars;
				break;
		}

		if($len>10 ) {//位数过长重复字符串一定次数
			$chars = ($type==1) ? str_repeat($chars,$len) : str_repeat($chars,5);
		}

		if($type!=4) {
			$chars = str_shuffle($chars);
			$str = substr($chars,0,$len);
		}else{
			// 中文随机字
			for($i=0;$i<$len;$i++){
				$str.= msubstr($chars, floor(mt_rand(0,mb_strlen($chars,'utf-8')-1)),1);
			}
		}
		return $str;
	}

	/**
	 * 加指定符号
	 *
	 * @param string $str
	 * @return string
	 */
	static public function addSign($str, $len, $sign='0'){
		if(strlen($str) >= $len) return $str;
		$str = $sign."".$str;
		return addSign($str,$len,$sign);
	}

	/**
	 * 根据数据创建xml编码
	 *
	 * @param object $data
	 * @param string $encoding 编码格式
	 * @param string $root xml跟节点
	 * @return string
	 */
	static public function xml_encode($data,$encoding='utf-8',$root="think") {
		$xml = '<?xml version="1.0" encoding="'.$encoding.'"?>';
		$xml.= '<'.$root.'>';
		$xml.= self::data_to_xml($data);
		$xml.= '</'.$root.'>';
		return $xml;
	}

	/**
	 * 转换为xml
	 *
	 * @param object $data
	 * @return string
	 */
	static public function data_to_xml($data) {
		if(is_object($data)) {
			$data = get_object_vars($data);
		}
		$xml = '';
		foreach($data as $key=>$val) {
			is_numeric($key) && $key="item id=\"$key\"";
			$xml.="<$key>";
			$xml.=(is_array($val)||is_object($val))?data_to_xml($val):$val;
			list($key,)=explode(' ',$key);
			$xml.="</$key>";
		}
		return $xml;
	}

	/**
	 * xml转换为array
	 *
	 * @param string $xml
	 * @return array
	 */
	static public function xml_to_array($xml) {
		$xmlary = array();

		$reels = '/<(\w+)\s*([^\/>]*)\s*(?:\/>|>(.*)<\/\s*\\1\s*>)/s';
		$reattrs = '/(\w+)=(?:"|\')([^"\']*)(:?"|\')/';

		preg_match_all($reels, $xml, $elements);

		foreach ($elements[1] as $ie => $xx) {
			$xmlary[$ie]["name"] = $elements[1][$ie];

			if ($attributes = trim($elements[2][$ie])) {
				preg_match_all($reattrs, $attributes, $att);
				foreach ($att[1] as $ia => $xx)
					$xmlary[$ie]["attributes"][$att[1][$ia]] = $att[2][$ia];
				}

				$cdend = strpos($elements[3][$ie], "<");
				if ($cdend > 0) {
					$xmlary[$ie]["text"] = substr($elements[3][$ie], 0, $cdend - 1);
				}

				if (preg_match($reels, $elements[3][$ie]))
					$xmlary[$ie]["elements"] = Util::xml_to_array($elements[3][$ie]);
				else if ($elements[3][$ie]) {
					$xmlary[$ie]["text"] = $elements[3][$ie];
				}
		   }
		   return $xmlary;
	}

	/**
	 * 建立多级目录
	 *
	 * @return void
	 */
	static public function mk_dir($dir){
		$ap = preg_split('[/]', $dir);
		foreach($ap as $v){
			if(!empty($v)){
				if(empty($path)) $path='/'.$v;
				else $path.='/'.$v;
				file_exists($path) or @mkdir($path);
			}
		}
	}

	/**
	 * 判断目录是否为空
	 *
	 * @return void
	 */
	static public function empty_dir($directory){
		$handle = opendir($directory);
		while (($file = readdir($handle)) !== false) {
			if ($file != "." && $file != ".."){
				closedir($handle);
				return false;
			}
		}
		closedir($handle);
		return true;
	}

	/**
	 * 读取文件内容
	 *
	 * @param string $filename
	 * @param string $method
	 * @return string
	 */
	static public function readover($filename,$method="rb"){
		strpos($filename,'..')!==false && exit('Forbidden');
		if($handle=@fopen($filename,$method)){
			flock($handle,LOCK_SH);
			$filedata=fread($handle,filesize($filename));
			fclose($handle);
		}
		return $filedata;
	}

	/**
	 * 将指定内容写入文件
	 *
	 * @param string $filename 文件名
	 * @param string $data 要写入的数据
	 * @param string $method 操作方法
	 * @param boolean $iflock 是否锁定
	 * @return boolean
	 */
	static public function writeover($filename,$data,$method="rb+",$iflock=1,$check=1,$chmod=1){
		$check && strpos($filename,'..')!==false && exit('Forbidden');
		touch($filename);
		$handle=fopen($filename,$method);
		$iflock && flock($handle,LOCK_EX);
		if(@fwrite($handle,$data)=== FALSE){
			fclose($handle);
			return false;
		}
		if($method=="rb+") ftruncate($handle,strlen($data));
		fclose($handle);
		$chmod && @chmod($filename,0777);
		return true;
	}

	/**
	 * 删除文件
	 *
	 * @access public
	 * @param string $file   删除的文件的路径(相对)
	 * @return boolean 删除成功否？
	 */
	static public function delete_file($file){
		if(empty($file)) return false;
		$file = WEB_ROOT.$file;
		if (! file_exists($file)) return false;
		return unlink($file);
	}

	/**
	 * 删除文件夹及其文件夹下所有文件
	 *
	 * @param string $dir   删除的文件夹的路径(相对)
	 * @return boolean 删除成功否？
	 */
	static public function delete_dir($dir) {
		//if (@rmdir($dir)==false && is_dir($dir)) {
			if ($dp = opendir($dir)) {
				while (($file=readdir($dp)) != false) {
					if ($file!='.' && $file!='..') {
						$fullpath=$dir."/".$file;
						if(is_dir($fullpath)){
							delete_dir($fullpath);
						} else {
							unlink($fullpath);
						}
					}
				}
				closedir($dp);
				if(rmdir($dir)){
					return true;
				} else {
					return false;
				}
			} else {
				exit('Not permission');
			}
		//}
	}

	/**
	 * 将日期字符串变成int
	 *
	 * @access public
	 * @param string $d    字符串的日期
	 * @param string $type 转换类型 st:从0开始的日期
	 * @return boolean 删除成功否？
	 */
	static public function date2int($d,$type="st"){
		if(empty($d) || !is_string($d) || strlen($d)<8) return 0;
		list($y, $m, $d) = preg_split('[/.-]', $d);
		$iTime = 0;
		if($type == "st"){ //开始日期从0点0分起
			$iTime = mktime(0,0,0,$m,$d,$y);
		}else{
			$iTime = mktime(23,59,59,$m,$d,$y);
		}
		return $iTime;
	}

	/**
	 * 获取系统时间，微秒为单位。
	 * @access public
	 * @return float 时间秒
	 */
	static public function getmicrotime(){
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}
	
	/**
	 * 解析返回的字串里面的信息
	 * @access public
	 * @access $messageInf 需要解析字符串
	 * @return Array数组
	 * author liuyuxiao
	 * date 2011-2-11
	 */
    static function resolveXmlMessage($messageInf){
        $returnArr = array();
		$messageInf= preg_split(';',$messageInf);
		foreach($messageInf as $k => $v){
			$tmpUser = preg_split(',',$v);
			$tmpUser[1]= str_replace('$',',',$tmpUser[1]);
			$returnArr[$tmpUser[0]]=$tmpUser[1];
		}
		return $returnArr;
    }

	/**
	 * 判断字符串是否是utf8
	 * @access public
	 * @access $messageInf 需要解析字符串
	 * @return bool
	 */
	static public function is_utf8($str) 
	{ 
		if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$str) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$str) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$str) == true) 
		{ 
			return true; 
		} 
		else 
		{ 
			return false; 
		} 
	}

	/**
	 * 前一来源页面
	 * @return url 
	 */
	static public function creferer($url='')
	{
		return empty($url) ? $_SERVER['HTTP_REFERER'] : $url;
	}

        static function dimplode($array) {
            if(!empty($array)) {
                return "'".implode("','", is_array($array) ? $array : array($array))."'";
            } else {
                return 0;
            }
        }
        static function showdistricts($pdo,$values, $elems=array(), $container='districtbox', $showlevel=null) {
            $showlevel = !empty($showlevel) ? intval($showlevel) : count($values); 
            $showlevel = $showlevel <= 3 ? $showlevel : 3;
            $upids = array(0);
            for($i=0;$i<$showlevel;$i++) {
                if(!empty($values[$i])) {
                    $upids[] = intval($values[$i]);
                } else {
                    for($j=$i; $j<$showlevel; $j++) {
                        $values[$j] = '';
                    }
                    break;
                }
            }  
            $options = array(1=>array(), 2=>array(), 3=>array(), 4=>array()); 
           
            $query = "SELECT * FROM region WHERE pid IN (".  self::dimplode($upids).')';
            $dinfo = $pdo->getAll($query);
                       
            foreach($dinfo as $value) {
                $options[$value['level']][] = array($value['id'], $value['name'],$value['pid']);
            }
          
            $names = array('province', 'city', 'district', 'community');
            for($i=0; $i<4;$i++) {
                $elems[$i] = !empty($elems[$i]) ? $elems[$i] : $names[$i];
            }
            $html = '';           
            for($i=0;$i<$showlevel;$i++) {
                $level = $i+1;
                $jscall = "showdistricts('$container', ['$elems[0]', '$elems[1]', '$elems[2]', '$elems[3]'], $showlevel, $level)";
                $html .= '<select name="'.$elems[$i].'" id="'.$elems[$i].'" onchange="'.$jscall.'">';
                $html .= '<option value="">-请选择</option>';
          
                foreach($options[$level] as $option) {
                    $selected = $option[0] == $values[$i] ? ' selected="selected"' : '';
                    $html .= '<option did="'.$option[0].'" value="'.$option[0].'"'.$selected.'>'.$option[1].'</option>';
                }
                $html .= '</select>';
                $html .= '&nbsp;&nbsp;';
            }
           
            return $html;
        }

    /*金额转中文大写*/
    static public function toCNcap($data){
	   $capnum=array("零","壹","贰","叁","肆","伍","陆","柒","捌","玖");
	   $capdigit=array("","拾","佰","仟");
	   $subdata=explode(".",$data);
	   $yuan=$subdata[0];
	   $j=0; $nonzero=0;
	   for($i=0;$i<strlen($subdata[0]);$i++){
		  if(0==$i){ //确定个位
			 if($subdata[1]){
				$cncap=(substr($subdata[0],-1,1)!=0)?"元":"元零";
			 }else{
				$cncap="元";
			 }
		  }
		  if(4==$i){ $j=0;  $nonzero=0; $cncap="万".$cncap; } //确定万位
		  if(8==$i){ $j=0;  $nonzero=0; $cncap="亿".$cncap; } //确定亿位
		  $numb=substr($yuan,-1,1); //截取尾数
		  $cncap=($numb)?$capnum[$numb].$capdigit[$j].$cncap:(($nonzero)?"零".$cncap:$cncap);
		  $nonzero=($numb)?1:$nonzero;
		  $yuan=substr($yuan,0,strlen($yuan)-1); //截去尾数
		  $j++;
	   }

	   if($subdata[1]){
		 $chiao=(substr($subdata[1],0,1))?$capnum[substr($subdata[1],0,1)]."角":"零";
		 $cent=(substr($subdata[1],1,1))?$capnum[substr($subdata[1],1,1)]."分":"零分";
	   }
	   $cncap .= $chiao.$cent."整";
	   $cncap=preg_replace("/(零)+/","\\1",$cncap); //合并连续“零”
	   return $cncap;
	}
    /*密码加密*/
    static public function encrypt($password){
    	$base = new Base64();
		//$password=$base->enCrypt(strtoupper($password));
		$password=$base->enCrypt($password);
		return $password;
    }
    /*密码解密*/
    static public function decrypt($password){
    	$base = new base64();
		$password=$base->deCrypt($password);
		return $password;
    }

    /*
     *获得浏览器ip
     */
    static public function getClientIp(){
	    if ($_SERVER["HTTP_X_FORWARDED_FOR"])
		{
			$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		elseif ($_SERVER["HTTP_CLIENT_IP"])
		{
			$ip = $_SERVER["HTTP_CLIENT_IP"];
		}
		elseif ($_SERVER["REMOTE_ADDR"])
		{
			$ip = $_SERVER["REMOTE_ADDR"];
		}
		else
		{
			$ip = "Unknown";
		} 
		return $ip;
	}
}
?>
