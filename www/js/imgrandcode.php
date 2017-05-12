<?php
/**
 * Created by PhpStorm.
 * User: fh
 * Date: 2016/4/28
 * Time: 8:40
 */
/*
 * PHP生成验证码图片
    PHP生成验证码的原理：使用PHP的GD库，生成一张带验证码的图片，并将验证码保存在Session中。
    PHP生成验证码的大致流程有：
    1、产生一张png的图片；
    2、为图片设置背景色；
    3、设置字体颜色和样式；
    4、产生4位数的随机的验证码；
    5、把产生的每个字符调整旋转角度和位置画到png图片上；
    6、加入噪点和干扰线防止注册机器分析原图片来恶意破解验证码；
    7、输出图片；
    8、释放图片所占内存。

    补充说明运用到的函数：
    运用PHP GD库自带的图像处理函数，能轻松生成各种想要的图片效果。
    imagecreate()：创建一个新图像
    imagecolorallocate()：为图像分配颜色
    imagefill()：填充图像
    imagerectangle()：画一个矩形（边框）
    imagesetstyle()：设置画线风格
    imageline()：画一条线段
    imagesetpixel()：画点像素
    imagepng()：以PNG格式将图像输出到浏览器或文件
    imagedestroy()：释放图片所占内存
    将上述代码保存为一个独立的php文件，以便调用。
 */

session_start();
getRandCode(4,60,20);

/**
 * @param $num   输出几个数字
 * @param $w     输出图片宽度
 * @param $h     输出图片高度
 */
function getRandCode($num,$w,$h) {
    $code = "";
//    分四次生成数字验证码随机码
    //4位验证码也可以用rand(1000,9999)直接生成
    for ($i = 0; $i < $num; $i++) {
        $code .= rand(0, 9);
    }

    //将生成的验证码写入session，备验证时用
    $_SESSION["randcode"] = $code;
    //创建图片，定义颜色值
    header("Content-type: image/PNG");
    $im = imagecreate($w, $h);
    $black = imagecolorallocate($im, 0, 0, 0);
    $gray = imagecolorallocate($im, 251, 245, 220);
    $bgcolor = imagecolorallocate($im, 255, 255, 255);
    //填充背景
    imagefill($im, 0, 0, $gray);

    //画边框
//    imagerectangle($im, 0, 0, $w-1, $h-1, $black);

    //随机绘制两条虚线，起干扰作用
    $style = array ($black,$black,$black,$black,$black,
        $gray,$gray,$gray,$gray,$gray
    );
    imagesetstyle($im, $style);
    $y1 = rand(0, $h);
    $y2 = rand(0, $h);
    $y3 = rand(0, $h);
    $y4 = rand(0, $h);
    imageline($im, 0, $y1, $w, $y3, IMG_COLOR_STYLED);
    imageline($im, 0, $y2, $w, $y4, IMG_COLOR_STYLED);

    //在画布上随机生成大量黑点，起干扰作用;
    for ($i = 0; $i < 10; $i++) {
        imagesetpixel($im, rand(0, $w), rand(0, $h), $black);
    }
    //将数字随机显示在画布上,字符的水平间距和位置都按一定波动范围随机生成
    $strx = rand(3, 8);
    for ($i = 0; $i < $num; $i++) {
        $strpos = rand(1, 6);
        imagestring($im, 5, $strx, $strpos, substr($code, $i, 1), $black);
        $strx += rand(8, 12);
    }
    imagepng($im);//输出图片
    imagedestroy($im);//释放图片所占内存
}