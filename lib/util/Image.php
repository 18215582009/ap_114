<?php 
/**
 * Created on 2008-03-14 
 * 图像操作类库
 * @author ld<luodongdaxia@yahoo.com.cn>
 * ChengDu CandorSoft Co., Ltd.
 * @version $Id: Image.class.php,v 1.1 2011/11/28 06:12:20 ld Exp $
 */
namespace lib\util;

class Image {//类定义开始
	static $x_axis;// 水印横坐标
	static $y_axis;// 水印纵坐标
	static $mask_offset_x = 5;// 水印横向偏移
    static $mask_offset_y = 10;// 水印纵向偏移
    /**
     +----------------------------------------------------------
     * 取得图像信息
     * 
     +----------------------------------------------------------
     * @static
     * @access public 
     +----------------------------------------------------------
     * @param string $image 图像文件名
     +----------------------------------------------------------
     * @return mixed
     +----------------------------------------------------------
     */
    static function getImageInfo($img) {
        $imageInfo = @getimagesize($img);
        if( $imageInfo!== false) {
            $imageType = strtolower(substr(image_type_to_extension($imageInfo[2]),1));
            $imageSize = filesize($img);
            $info = array(
                "width"=>$imageInfo[0],
                "height"=>$imageInfo[1],
                "type"=>$imageType,
                "size"=>$imageSize,
                "mime"=>$imageInfo['mime']
            );
            return $info;
        }else {
            return false;
        }
    }


    /**
     +----------------------------------------------------------
     * 显示服务器图像文件
     * 支持URL方式
     +----------------------------------------------------------
     * @static
     * @access public 
     +----------------------------------------------------------
     * @param string $imgFile 图像文件名
     * @param string $text 文字字符串
     * @param string $width 图像宽度
     * @param string $height 图像高度
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     */

    static function showImg($imgFile,$text='',$width=80,$height=30) {
        //获取图像文件信息
        $info = Image::getImageInfo($imgFile);
        if($info !== false) {
            $createFun  =   str_replace('/','createfrom',$info['mime']);
            $im = $createFun($imgFile); 
            if($im) {
                $ImageFun= str_replace('/','',$info['mime']);
                if(!empty($text)) {
                    $tc  = imagecolorallocate($im, 0, 0, 0);
                    imagestring($im, 3, 5, 5, $text, $tc);
                }
                if($info['type']=='png' || $info['type']=='gif') {
                imagealphablending($im, false);//取消默认的混色模式
                imagesavealpha($im,true);//设定保存完整的 alpha 通道信息                	
                }
                Header("Content-type: ".$info['mime']);
                $ImageFun($im);        	            	
                @ImageDestroy($im);
                return ;
            }
        }
        //获取或者创建图像文件失败则生成空白PNG图片
        $im  = imagecreatetruecolor($width, $height); 
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);
        imagestring($im, 4, 5, 5, "NO PIC", $tc);
        Image::output($im);
        return ;
    }


    /**
     +----------------------------------------------------------
     * 生成缩略图
     +----------------------------------------------------------
     * @static
     * @access public 
     +----------------------------------------------------------
     * @param string $image  原图
     * @param string $type 图像格式
     * @param string $filename 缩略图文件名
     * @param string $maxWidth  宽度
     * @param string $maxHeight  高度
     * @param string $position 缩略图保存目录
     * @param boolean $interlace 启用隔行扫描
     +----------------------------------------------------------
     * @return void
     */
    static function thumb($image,$type='',$filename='',$maxWidth=150,$maxHeight=150,$interlace=true,$suffix='_thumb') {
        // 获取原图信息
        $info  = Image::getImageInfo($image); 
         if($info !== false) {
            $srcWidth  = $info['width'];
            $srcHeight = $info['height'];
            $pathinfo = pathinfo($image);
            $type =  $pathinfo['extension'];
            $type = empty($type)?$info['type']:$type;
			$type = strtolower($type);
            $interlace  =  $interlace? 1:0;
            unset($info);
            $scale = min($maxWidth/$srcWidth, $maxHeight/$srcHeight); // 计算缩放比例

			// 图像小于缩放大小，安原始图像大小生成图片，即$scale值为1
			if(ceil($scale)>1)$scale=1;

            // 缩略图尺寸
            $width  = (int)($srcWidth*$scale);
            $height = (int)($srcHeight*$scale);

            // 载入原图
            $createFun = 'ImageCreateFrom'.($type=='jpg'?'jpeg':$type);
            $srcImg     = $createFun($image); 

			if($type=='png')imagesavealpha($srcImg,true);//这里很重要 意思是不要丢了图像的透明色;

            //创建缩略图
            if($type!='gif' && function_exists('imagecreatetruecolor'))
                $thumbImg = imagecreatetruecolor($width, $height); 
            else
                $thumbImg = imagecreate($width, $height); 

			if('gif'==$type || 'png'==$type) {
                imagealphablending($thumbImg, false);//取消默认的混色模式
                imagesavealpha($thumbImg,true);//设定保存完整的 alpha 通道信息
                $background_color  =  imagecolorallocate($thumbImg,  0,255,0);  //  指派一个绿色  
				imagecolortransparent($thumbImg,$background_color);  //  设置为透明色，若注释掉该行则输出绿色的图 
            }

            // 复制图片
            if(function_exists("ImageCopyResampled"))
                ImageCopyResampled($thumbImg, $srcImg, 0, 0, 0, 0, $width, $height, $srcWidth,$srcHeight); 
            else
                ImageCopyResized($thumbImg, $srcImg, 0, 0, 0, 0, $width, $height,  $srcWidth,$srcHeight); 

            // 对jpeg图形设置隔行扫描
            if('jpg'==$type || 'jpeg'==$type) 	imageinterlace($thumbImg,$interlace);

            //$gray=ImageColorAllocate($thumbImg,255,0,0);
            //ImageString($thumbImg,2,5,5,"ThinkPHP",$gray);
            // 生成图片
            $imageFun = 'image'.($type=='jpg'?'jpeg':$type);
            $filename  = empty($filename)? substr($image,0,strrpos($image, '.')).$suffix.'.'.$type : $filename;
            if($imageFun == 'imagepng'){
				$imageFun($thumbImg,$filename);
			}else{
				$imageFun($thumbImg,$filename,100);
			}
			//Image::overlay_watermark($filename);
            ImageDestroy($thumbImg);
            ImageDestroy($srcImg);
            return $filename;
         }
         return false;
    }



         
    /**
     +----------------------------------------------------------
     * 生成图片水印
     +----------------------------------------------------------
     * @static
     * @access public 
     +----------------------------------------------------------
     * @param string $srcImgPath  原图
     +----------------------------------------------------------
     * @return void
     */
	static function overlay_watermark($srcImgPath)	{
		if (!function_exists('imagecolortransparent')) return false;
	
		// 获取图像文件信息
		$srcInfo  = Image::getImageInfo($srcImgPath); 
		$wmInfo = Image::getImageInfo(WATER_PIC_PATH);
		
		// 水印比原图还大
		if((($srcInfo['height'] - $wmInfo['height']) < 50 ) or (($srcInfo['width'] - $wmInfo['width']) < 50)) return false; 
		
		// 载入原图
		$srcPathInfo = pathinfo($srcImgPath);
		$srcType =  strtolower($srcPathInfo['extension']);
		$createSrcFun = 'ImageCreateFrom'.($srcType=='jpg'?'jpeg':$srcType);
		$srcImg  = $createSrcFun($srcImgPath);
		
		// 载入水印图
		$wmPathInfo = pathinfo(WATER_PIC_PATH);
		$wmType =  strtolower($wmPathInfo['extension']);
		$createWmFun = 'ImageCreateFrom'.($wmType=='jpg'?'jpeg':$wmType);
		$wmImg = $createWmFun(WATER_PIC_PATH); 

		//$y_axis = ($srcInfo['height'] - $wmInfo['height']) - 5; 
		//$x_axis = ($srcInfo['width'] - $wmInfo['width']) - 5; 
		Image::countMaskPos($srcInfo['width'],$srcInfo['height'],$wmInfo['width'],$wmInfo['height']);//处理水印位置
		
		if ($wmInfo['type'] == 3 AND function_exists('imagealphablending')) @imagealphablending($src_img, true);

		imagecolortransparent($wmImg, imagecolorat($wmImg, 5, 5));
		imagecopymerge($srcImg, $wmImg, Image::$x_axis, Image::$y_axis, 0, 0, $wmInfo['width'], $wmInfo['height'], WATER_PCT);
		//imagecopy($srcImg, $wmImg, Image::$x_axis, Image::$y_axis, 0, 0, $wmInfo['width'], $wmInfo['height']); 

		$imageFun = 'image'.($srcType=='jpg'?'jpeg':$srcType);
		$imageFun($srcImg, $srcImgPath); 

		ImageDestroy($srcImg);
		ImageDestroy($wmImg);

		return true;
	}
	
	// --------------------------------------------------------------------
	
    /**
     +----------------------------------------------------------
     * 生成图片水印
     +----------------------------------------------------------
     * @static
     * @access public 
     +----------------------------------------------------------
     * @param string $srcImgPath  原图
     +----------------------------------------------------------
     * @return void
     */		
	function text_watermark($srcImgPath) {
		
		// 获取图像文件信息
		$srcInfo  = Image::getImageInfo($srcImgPath);
		// 载入原图
		$srcPathInfo = pathinfo($srcImgPath);
		$srcType =  strtolower($srcPathInfo['extension']);
		$createSrcFun = 'ImageCreateFrom'.($srcType=='jpg'?'jpeg':$srcType);
		$srcImg  = $createSrcFun($srcImgPath);		

		$font_color = FONT_COLOR;
		$shadow_color = "CCCCCC";
		$font_size = FONT_SIZE;
		$fontwidth  = $font_size - ($font_size / 4);
		
		$R1 = hexdec(substr($font_color, 0, 2));
		$G1 = hexdec(substr($font_color, 2, 2));
		$B1 = hexdec(substr($font_color, 4, 2));
	
		$R2 = hexdec(substr($shadow_color, 0, 2));
		$G2 = hexdec(substr($shadow_color, 2, 2));
		$B2 = hexdec(substr($shadow_color, 4, 2));
		
		//$txt_color	= imagecolorclosest($srcImg, $R1, $G1, $B1);
		//$drp_color	= imagecolorclosest($srcImg, $R2, $G2, $B2);
		$txt_color  = imagecolorallocatealpha($srcImg, $R1, $G1, $B1, WATER_PCT);
		$drp_color	= imagecolorallocatealpha($srcImg, $R2, $G2, $B2, WATER_PCT);

		//$y_axis = $srcInfo['height'] - $font_size - 5; 
		//$x_axis = $srcInfo['width'] - ($fontwidth * strlen(WATER_TEXT)) - 5; 
		Image::countMaskPos($srcInfo['width'],$srcInfo['height'],($fontwidth * strlen(WATER_TEXT)),$font_size);//处理水印位置

		imagettftext($srcImg, $font_size, 0, (Image::$x_axis+1), (Image::$y_axis+1), $drp_color, FONTFACE_PATH, WATER_TEXT);
		imagettftext($srcImg, $font_size, 0, Image::$x_axis, Image::$y_axis, $txt_color, FONTFACE_PATH, WATER_TEXT);
		
		$imageFun = 'image'.($srcType=='jpg'?'jpeg':$srcType);
		$imageFun($srcImg, $srcImgPath); 
		ImageDestroy($srcImg);

		return true;
	}

    /**
     +----------------------------------------------------------
     * 生成图像验证码
     +----------------------------------------------------------
     * @static
     * @access public 
     +----------------------------------------------------------
     * @param string $length  位数
     * @param string $mode  类型
     * @param string $type 图像格式
     * @param string $width  宽度
     * @param string $height  高度
     +----------------------------------------------------------
     * @return string
     */
    static function buildImageVerify($length=4,$mode=1,$type='png',$width=48,$height=22,$verifyName='verify') {
        $randval = Util::rand_string($length,$mode);
        $_SESSION[$verifyName]= md5($randval);
        $width = ($length*9+10)>$width?$length*9+10:$width;
        if ( $type!='gif' && function_exists('imagecreatetruecolor')) {
            $im = @imagecreatetruecolor($width,$height);
        }else {
            $im = @imagecreate($width,$height);
        }
        $r = Array(225,255,255,223);
        $g = Array(225,236,237,255);
        $b = Array(225,236,166,125);
        $key = mt_rand(0,3);

        $backColor = imagecolorallocate($im, $r[$key],$g[$key],$b[$key]);    //背景色（随机）
		$borderColor = imagecolorallocate($im, 100, 100, 100);                    //边框色
        $pointColor = imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));                 //点颜色

        @imagefilledrectangle($im, 0, 0, $width - 1, $height - 1, $backColor);
        @imagerectangle($im, 0, 0, $width-1, $height-1, $borderColor);
        $stringColor = imagecolorallocate($im,mt_rand(0,200),mt_rand(0,120),mt_rand(0,120));
		// 干扰
		for($i=0;$i<10;$i++){
			$fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			imagearc($im,mt_rand(-10,$width),mt_rand(-10,$height),mt_rand(30,300),mt_rand(20,200),55,44,$fontcolor);
		}
		for($i=0;$i<25;$i++){
			imagesetpixel($im,mt_rand(0,$width),mt_rand(0,$height),$pointColor);
		}

        //将数字随机显示在画布上,字符的水平间距和位置都按一定波动范围随机生成
        $strx = rand(3, 8);
        for ($i = 0; $i < $length; $i++) {
            $strpos = rand(1, 6);
            imagestring($im, 5, $strx, $strpos, substr($randval, $i, 1), $stringColor);
            $strx += rand(8, 12);
        }

        //@imagestring($im, 5, 5, 3, $randval, $stringColor);
        Image::output($im,$type);
    }
	

	static function GBVerify($length=4,$type='png',$width=180,$height=50,$fontface='',$verifyName='verify') {
		$fontface = empty($fontface) ? FONTFACE_PATH : $fontface;
        
        $code =	rand_string($length,2);
        $width = ($length*45)>$width?$length*45:$width;
		$_SESSION[$verifyName]= md5($code);
		$im=imagecreatetruecolor($width,$height);
		$borderColor = imagecolorallocate($im, 100, 100, 100);                    //边框色
		$bkcolor=imagecolorallocate($im,250,250,250);
		imagefill($im,0,0,$bkcolor);
        @imagerectangle($im, 0, 0, $width-1, $height-1, $borderColor);
		// 干扰
		for($i=0;$i<15;$i++){
			$fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			imagearc($im,mt_rand(-10,$width),mt_rand(-10,$height),mt_rand(30,300),mt_rand(20,200),55,44,$fontcolor);
		}
		for($i=0;$i<255;$i++){
			$fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			imagesetpixel($im,mt_rand(0,$width),mt_rand(0,$height),$fontcolor);
		}

		for($i=0;$i<$length;$i++){
			$fontcolor=imagecolorallocate($im,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120)); //这样保证随机出来的颜色较深。
			$codex= msubstr($code,$i,1);
			@imagettftext($im,mt_rand(16,20),mt_rand(-60,60),40*$i+20,mt_rand(30,35),$fontcolor,$fontface,$codex);
		}
		Image::output($im,$type);
	}

    /**
     +----------------------------------------------------------
     * 把图像转换成字符显示
     +----------------------------------------------------------
     * @static
     * @access public 
     +----------------------------------------------------------
     * @param string $image  要显示的图像
     * @param string $type  图像类型，默认自动获取
     +----------------------------------------------------------
     * @return string
     */
    static function showASCIIImg($image,$string='',$type='') 
    {
        $info  = Image::getImageInfo($image); 
        if($info !== false) {
            $type = empty($type)?$info['type']:$type;
            unset($info);
            // 载入原图
            $createFun = 'ImageCreateFrom'.($type=='jpg'?'jpeg':$type);
            $im     = $createFun($image); 
            $dx = imagesx($im);  
            $dy = imagesy($im);  
			$i	=	0;
            $out   =  '<span style="padding:0px;margin:0;line-height:100%;font-size:1px;">';
			set_time_limit(0);
            for($y = 0; $y < $dy; $y++) {      
              for($x=0; $x < $dx; $x++) {          
                  $col = imagecolorat($im, $x, $y);          
                  $rgb = imagecolorsforindex($im,$col);      
				  $str	 =	 empty($string)?'*':$string[$i++];
                  $out .= sprintf('<span style="margin:0px;color:#%02x%02x%02x">'.$str.'</span>',$rgb['red'],$rgb['green'],$rgb['blue']); 
             }      
             $out .= "<br>\n";  
            }  
            $out .=  '</span>';
            imagedestroy($im);   
            return $out;
        }
        return false;
    }

    /**
     +----------------------------------------------------------
     * 生成高级图像验证码
     +----------------------------------------------------------
     * @static
     * @access public 
     +----------------------------------------------------------
     * @param string $type 图像格式
     * @param string $width  宽度
     * @param string $height  高度
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    static function showAdvVerify($type='png',$width=180,$height=40)  {
        $verifyCodeRandArray = array("f","g","h","i");//build_count_rand(10,1,3);
        $i=0;
        while (list($k,$v)=each($verifyCodeRandArray)) {
            $verifyCode[$i] = $v;
            $i++;
        }
        $letter = implode(" ",$verifyCode);
        $_SESSION['verifyCode'] = $verifyCode;
        $im = imagecreate($width,$height);
        $r = array(225,255,255,223);
        $g = array(225,236,237,255);
        $b = array(225,236,166,125);
        $key = mt_rand(0,3);
        $backColor = imagecolorallocate($im, $r[$key],$g[$key],$b[$key]); 
		$borderColor = imagecolorallocate($im, 100, 100, 100);                    //边框色
        imagefilledrectangle($im, 0, 0, $width - 1, $height - 1, $backColor);
        imagerectangle($im, 0, 0, $width-1, $height-1, $borderColor);
        $numberColor = imagecolorallocate($im, 255,rand(0,100), rand(0,100));
        $stringColor = imagecolorallocate($im, rand(0,100), rand(0,100), 255);
		// 添加干扰
		for($i=0;$i<10;$i++){
			$fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			imagearc($im,mt_rand(-10,$width),mt_rand(-10,$height),mt_rand(30,300),mt_rand(20,200),55,44,$fontcolor);
		}
		for($i=0;$i<255;$i++){
			$fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			imagesetpixel($im,mt_rand(0,$width),mt_rand(0,$height),$fontcolor);
		}
        imagestring($im, 5, 5, 1, "0 1 2 3 4 5 6 7 8 9", $numberColor);
        imagestring($im, 5, 5, 20, $letter, $stringColor);
        Image::output($im,$type);
    }


    /**
     +----------------------------------------------------------
     * 生成UPC-A条形码
     +----------------------------------------------------------
     * @static
     +----------------------------------------------------------
     * @param string $type 图像格式
     * @param string $type 图像格式
     * @param string $lw  单元宽度
     * @param string $hi   条码高度
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    static function UPCA($code,$type='png',$lw=2,$hi=100) { 
        static $Lencode = array('0001101','0011001','0010011','0111101','0100011', 
                         '0110001','0101111','0111011','0110111','0001011'); 
        static $Rencode = array('1110010','1100110','1101100','1000010','1011100', 
                         '1001110','1010000','1000100','1001000','1110100'); 
        $ends = '101'; 
        $center = '01010'; 
        /* UPC-A Must be 11 digits, we compute the checksum. */ 
        if ( strlen($code) != 11 ) { die("UPC-A Must be 11 digits."); } 
        /* Compute the EAN-13 Checksum digit */ 
        $ncode = '0'.$code; 
        $even = 0; $odd = 0; 
        for ($x=0;$x<12;$x++) { 
          if ($x % 2) { $odd += $ncode[$x]; } else { $even += $ncode[$x]; } 
        } 
        $code.=(10 - (($odd * 3 + $even) % 10)) % 10; 
        /* Create the bar encoding using a binary string */ 
        $bars=$ends; 
        $bars.=$Lencode[$code[0]]; 
        for($x=1;$x<6;$x++) { 
          $bars.=$Lencode[$code[$x]]; 
        } 
        $bars.=$center; 
        for($x=6;$x<12;$x++) { 
          $bars.=$Rencode[$code[$x]]; 
        } 
        $bars.=$ends; 
        /* Generate the Barcode Image */ 
        if ( $type!='gif' && function_exists('imagecreatetruecolor')) {
            $im = imagecreatetruecolor($lw*95+30,$hi+30);
        }else {
            $im = imagecreate($lw*95+30,$hi+30);
        }
        $fg = ImageColorAllocate($im, 0, 0, 0); 
        $bg = ImageColorAllocate($im, 255, 255, 255); 
        ImageFilledRectangle($im, 0, 0, $lw*95+30, $hi+30, $bg); 
        $shift=10; 
        for ($x=0;$x<strlen($bars);$x++) { 
          if (($x<10) || ($x>=45 && $x<50) || ($x >=85)) { $sh=10; } else { $sh=0; } 
          if ($bars[$x] == '1') { $color = $fg; } else { $color = $bg; } 
          ImageFilledRectangle($im, ($x*$lw)+15,5,($x+1)*$lw+14,$hi+5+$sh,$color); 
        } 
        /* Add the Human Readable Label */ 
        ImageString($im,4,5,$hi-5,$code[0],$fg); 
        for ($x=0;$x<5;$x++) { 
          ImageString($im,5,$lw*(13+$x*6)+15,$hi+5,$code[$x+1],$fg); 
          ImageString($im,5,$lw*(53+$x*6)+15,$hi+5,$code[$x+6],$fg); 
        } 
        ImageString($im,4,$lw*95+17,$hi-5,$code[11],$fg); 
        /* Output the Header and Content. */ 
        Image::output($im,$type);
    } 

    static function output($im,$type='png') {
        header("Content-type: image/".$type);
        $ImageFun='Image'.$type;
        $ImageFun($im);
        imagedestroy($im);  	
    }

	/**
     * 计算出水印位置坐标
     */
    static function countMaskPos($srcWidth,$srcHeight,$waterWidth,$waterHeight){
		switch(WATER_POS){
			case 0:
				// 中间
				Image::$x_axis = ($srcWidth-$waterWidth)/2 - Image::$mask_offset_x;
				Image::$y_axis = ($srcHeight-$waterHeight)/2 - Image::$mask_offset_y;
				break;
			case 1:
				// 左上
				Image::$x_axis = Image::$mask_offset_x;
				Image::$y_axis = Image::$mask_offset_y;
				break;

			case 2:
				// 左下
				Image::$x_axis = Image::$mask_offset_x;
				Image::$y_axis = $srcHeight - $waterHeight - Image::$mask_offset_y;
				break;

			case 3:
				// 右上
				Image::$x_axis = $srcWidth - $waterWidth - Image::$mask_offset_x;
				Image::$y_axis = Image::$mask_offset_y;
				break;

			case 4:
				// 右下
				Image::$x_axis = $srcWidth - $waterWidth - Image::$mask_offset_x;
				Image::$y_axis = $srcHeight - $waterHeight - Image::$mask_offset_y;
				break;

			default:
				// 默认将水印放到右下,偏移指定像素
				Image::$x_axis = $srcWidth - $waterWidth - Image::$mask_offset_x;
				Image::$y_axis = $srcHeight - $waterHeight - Image::$mask_offset_y;
				break;
		}
    }

}//类定义结束
?>
