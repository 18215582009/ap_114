<?php
/**
 * 工具类对象，存放着各种杂项的工具方法。
 *
 * @package CandorPHP
 */
class Helper
{
    /**
     * 为一个对象设置某一个属性，其中key可以是“father.child”的形式。
     * 
     * <code>
     * <?php
     * $lang->db->user = 'wwccss';
     * Helper::setMember('lang', 'db.user', 'chunsheng.wang');
     * ? >
     * </code>
     * @param string    $objName    对象变量名。
     * @param string    $key        要设置的属性，可以是father.child的形式。
     * @param mixed     $value      要设置的值。
     * @static
     * @access public
     * @return void
     */
    static public function setMember($objName, $key, $value)
    {
        global $$objName;
        if(!is_object($$objName) or empty($key)) return false;
        $key   = str_replace('.', '->', $key);
        $value = serialize($value);
        $code  = ("\$${objName}->{$key}=unserialize(<<<EOT\n$value\nEOT\n);");
        eval($code);
    }

    /**
     * 生成某一个模块某个方法的链接。
     * 
     * 在control类中对此方法进行了封装，可以在control对象中直接调用createLink方法。
     * <code>
     * <?php
     * Helper::createLink('hello', 'index', 'var1=value1&var2=value2');
     * Helper::createLink('hello', 'index', array('var1' => 'value1', 'var2' => 'value2');
     * ? >
     * </code>
     * @param string    $moduleName     模块名。
     * @param string    $methodName     方法名。
     * @param mixed     $vars           要传递给method方法的各个参数，可以是数组，也可以是var1=value2&var2=value2的形式。
     * @param string    $viewType       扩展名方式。
     * @static
     * @access public
     * @return string
     */
    static public function createLink($moduleName, $methodName = 'index', $vars = '', $viewType = '')
    {
        global $app, $config;

        $link = $config->webRoot;
        if($config->requestType == 'GET')
        {
            if(strpos($_SERVER['SCRIPT_NAME'], 'index.php') === false)
            {
                $link = $_SERVER['SCRIPT_NAME'];
            }
        }

        if(empty($viewType)) $viewType = $app->getViewType();

        /* 如果传递进来的vars不是数组，尝试将其解析成数组格式。*/
        if(!is_array($vars)) parse_str($vars, $vars);
        if($config->requestType == 'PATH_INFO')
        {
            $link .= "$moduleName{$config->requestFix}$methodName";
            if($config->pathType == 'full')
            {
                foreach($vars as $key => $value) $link .= "{$config->requestFix}$key{$config->requestFix}$value";
            }
            else
            {
                foreach($vars as $value) $link .= "{$config->requestFix}$value";
            }    
            /* 如果访问的是/index/index.html，简化为/index.html。*/
            if($moduleName == $config->default->module and $methodName == $config->default->method) $link = $config->webRoot . 'index';
            $link .= '.' . $viewType;
        }
        elseif($config->requestType == 'GET')
        {
            $link .= "?{$config->moduleVar}=$moduleName&{$config->methodVar}=$methodName";
            if($viewType != 'html') $link .= "&{$config->viewVar}=" . $viewType;
            foreach($vars as $key => $value) $link .= "&$key=$value";
        }
        return $link;
    }

    /**
     * 将一个数组转成对象格式。此函数只是返回语句，需要eval。
     * 
     * <code>
     * <?php
     * $config['user'] = 'wwccss';
     * eval(Helper::array2Object($config, 'configobj');
     * print_r($configobj);
     * ? >
     * </code>
     * @param array     $array          要转换的数组。
     * @param string    $objName        要转换成的对象的名字。
     * @param string    $memberPath     成员变量路径，最开始为空，从根开始。
     * @param bool      $firstRun       是否是第一次运行。
     * @static
     * @access public
     * @return void
     */
    static public function array2Object($array, $objName, $memberPath = '', $firstRun = true)
    {
        if($firstRun)
        {
            if(!is_array($array) or empty($array)) return false;
        }    
        static $code = '';
        $keys = array_keys($array);
        foreach($keys as $keyNO => $key)
        {
            $value = $array[$key];
            if(is_int($key)) $key = 'item' . $key;
            $memberID = $memberPath . '->' . $key;
            if(!is_array($value))
            {
                $value = addslashes($value);
                $code .= "\$$objName$memberID='$value';\n";
            }
            else
            {
                Helper::array2object($value, $objName, $memberID, $firstRun = false);
            }
        }
        return $code;
    }

    /**
     * 包含一个文件。router.class.php和control.class.php中包含文件都通过此函数来调用，这样保证文件不会重复加载。
     * 
     * @param string    $file   要包含的文件的路径。 
     * @static
     * @access public
     * @return void
     */
    static public function import($file)
    {
        if(!file_exists($file)) return false;
        static $includedFiles = array();
        if(!isset($includedFiles[$file]))
        {
			$return = include $file;
            if(!$return) return false;
            $includedFiles[$file] = true;
            return true;
        }
		return true;
    }

    /**
     * 生成SQL查询中的IN(a,b,c)部分代码。
     * 
     * @param   misc    $ids   id列表，可以是数组，也可以是使用逗号隔开的字符串。 
     * @static
     * @access  public
     * @return  string
     */
    static function dbIN($ids)
    {
        if(is_array($ids)) return "IN ('" . join("','", $ids) . "')";
        return "IN ('" . str_replace(',', "','", $ids) . "')";
    }

    /**
     * 生成对框架安全的base64encode串。
     * 
     * @param   string  $string   要编码的字符串列表。
     * @static
     * @access  public
     * @return  string
     */
    static function safe64Encode($string)
    {
        return strtr(base64_encode($string), '+/=', '');
    }

    /**
     * 解码。
     * 
     * @param   string  $string   要解码的字符串列表。
     * @static
     * @access  public
     * @return  string
     */
    static function safe64Decode($string)
    {
        return base64_decode(strtr($string, '', '+/='));
    }

    /**
     *  计算两个日期的差。
     * 
     * @param   date  $date1   第一个时间
     * @param   date  $date2   第二个时间
     * @access  public
     * @return  string
     */
    static function diffDate($date1, $date2)
    {
        return round((strtotime($date1) - strtotime($date2)) / 86400, 0);
    }
		
	/**
	 * 模块序列号算法[CANDOR-LUODONG-2012-10-10-1234]
	 *
	 * @param string
	 * @access private
	 * @return boolean
	 */
	static function chechKey($key='')
	{
		//if($key=='')return false;
		if($key=='')$key='CANDOR-LUODONG-2012-10-10-1234';
		$str = explode("-",$key);
        if (count($str)!= 6)
        {
            return false;
        }
        if ($str[0] != "CANDOR")
        {
            return false;
        }
        if ($str[1] != "LUODONG")
        {
            return false;
        }
        $n1 = intval($str[3]);
        $n2 = intval($str[4]);
        $n3 = intval($str[5]);
		//echo Abs(intval((((n1 * 8) - (n2 * 7)) + 0x4d2) % 0x2710));
        return (Abs(intval((((n1 * 8) - (n2 * 7)) + 0x4d2) % 0x2710)) == $n3);
	}
}

