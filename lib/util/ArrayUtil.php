<?php
/**
 * ���������
 * @author luodong
 * @version 1.0
 * @created 2015-01-23 11:06:01
 */
namespace util;

class ArrayUtil
{
	/**
	 * ȥ�������ظ���¼
	 *
	 * @param String $url ·��
	 * @param Integer $time ʱ��(��)
	 * @param String $msg ��ʾ��Ϣ
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