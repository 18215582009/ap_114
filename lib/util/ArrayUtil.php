<?php
/**
 * 数组操作类
 * @author luodong
 * @version 1.0
 * @created 2015-01-23 11:06:01
 */
namespace util;

class ArrayUtil
{
	/**
	 * 去除数组重复记录
	 *
	 * @param String $url 路径
	 * @param Integer $time 时间(秒)
	 * @param String $msg 提示信息
	 * @retrun object
	 */
	static public function remove_duplicate($array, $field)
	{
		if(count($array)>0){
			foreach ($array as $sub)
				$cmp[] = $sub[$field];
			$unique = array_unique($cmp);
			foreach ($unique as $k => $rien)
				$new[] = $array[$k];
			return $new;
		}else{
			return $array;
		}
	}

}
?>