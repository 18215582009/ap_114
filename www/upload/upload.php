<?php
error_reporting(0);
//得到目录下的文件总数
function get_file_count($dir_name){
	$files = 0;
	if ($handle = opendir($dir_name)) {
	while (false !== ($file = readdir($handle))) {
		$files++;
	}
	closedir($handle);
	}
	return $files;
}
//循环删除目录和文件
function delDirAndFile($dirName){
	if ($handle = opendir($dirName) ) {
	   while ( false !== ( $item = readdir($handle) ) ){
		  if ( $item != "." && $item != ".." ) {
		  	unlink("$dirName/$item");
		  }

	   }
	   closedir($handle);

	}
}
$files = array();
$url = '//'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."/";
// echo $url;
// print_r($_SERVER);

// print_r ($_FILES);
function uploadFile($file_label){
	// global $url;
	$this_file = $_FILES[$file_label];

}
$fileInput = 'Filedata';
$dir = './houseImages/';
$type = $_POST['type'];
@mkdir($dir);

$isExceedSize = false;
/*-----------------*/
//以下三行代码用于删除文件，实际应用时请予以删除，get_file_count()和delDirAndFile（）函数都可以删掉
if(isset($_GET['files'])){
	$dirName =  $_GET['files'];
	$dir = './'.$_GET['files'].'/';
}else{
	$dirName =  'houseImages';
}
$size = get_file_count($dirName);
//if($size > 3) delDirAndFile($dirName);
/*-----------------*/
$files_name_arr = array($fileInput);
foreach($files_name_arr as $k=>$v){
	$now = time();
	$pic = $_FILES[$v];
	$isExceedSize = $pic['size'] > 5000000;
	if(!$isExceedSize){
		if(file_exists($dir.$pic['name'])){
			@unlink($dir.$pic['name']);
		}
        // 解决中文文件名乱码问题
        $pic['name'] = iconv('UTF-8', 'GBK', $pic['name']);
		$reName = ($now++).rand(100, 999);
		$result = move_uploaded_file($pic['tmp_name'], $dir.$reName."_".$pic['name']);
		$files[$k] = $url.$dir.$pic['name'];
	}
}
if(!$isExceedSize && $result){
    $arr = array(
        'status' => 1,
        'type' => $type,
        'name' => $_FILES[$fileInput]['name'],
		'url' => '/upload/'.$dirName.'/'.$reName."_".$_FILES[$fileInput]['name'],
		'openid' => $_SESSION['openid'],
		'uid' => $_SESSION['uid']
        //'url' => $dir.$_FILES[$fileInput]['name']
    );
}else if($isExceedSize){
    $arr = array(
        'status' => 0,
        'type' => $type,
        'msg' => "文件大小超过5M！"
    );
}else{
    $arr = array(
        'status' => 0,
        'type' => $type,
        'msg' => "未知错误！".$result
    );
}

echo json_encode($arr);

?>