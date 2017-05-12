<?php
/**
 * Token类
 * @author luodong
 * @version 1.0
 * @created 2017-04-11 11:06:01
 * //token
$config->token_no = true;  // 是否开启令牌验证
$config->token_name ='__hash__';    // 令牌验证的表单隐藏字段名称
$config->token_type ='md5';  //令牌哈希验证规则 默认为MD5
$config->token_reset =true;  //令牌验证出错后是否重置令牌 默认为true
 */
namespace lib\util;

class Token
{
	/**
	 * Form表单防止刷新Token
	 */
	public function createToken($name='__hash__') {
		$hashVal = md5('fc114'.time());
		$tokenInput ='<input type="hidden" name="'.$name.'" value="'.$hashVal.'" />';
		$_SESSION[$name] = $hashVal;
		return $tokenInput;
	}

	public function checkToken($hashVal,$name='__hash__'){
		if($hashVal==$_SESSION[$name]){
			return true;
		}else{
			return false;
		}
	}

	public function refreshToken($name='__hash__'){
		$hashVal = md5('fc114'.time());
		$_SESSION[$name] = $hashVal;
	}

	public function destroyToken($name='__hash__'){
		unset($_SESSION[$name]);
	}
}
?>
