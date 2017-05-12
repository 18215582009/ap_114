<?php
namespace lib\form;

class Field
{

	/**
	* 生成基本的下拉列表
	*
	* @params	array	生成列表的数组
	* @select	string	选择的项
	× @name		string
	× @id		string	
	× @value	boolean	为true的时候只输出Label
	* @append	string	附加
	*/
    static public function select($params, $select='',  $value='', $name='', $id = "", $key = false, $append="")
    {
		if($value) return $params[$select] != "" ? $params[$select] : $select;
		
		if($id == "") $id=$name;

		$str = "<SELECT name=\"{$name}\" id=\"{$id}\" {$append}>";

		foreach($params as $val => $label)
		{
			if($val != "" && $key == false) $val = $label;

			$str .= "<Option value=\"{$val}\" ";

			if($select !="" && $select == $val) $str .= " SELECTED ";

			$str .=">{$label}</Option>";
		}
		

		$str .= "</SELECT>";

		return $str;
    }

	/*function select()的补充方法，修复是否以数组的key作为下拉菜单的value功能*/
    static public function selectNew($params, $selected,  $showResult, $name, $id = "", $indexValue = false, $append="")
    {
        if($showResult) 
        {
            if($indexValue) return $selected;
            else return $params[$selected] != "" ? $params[$selected] : $selected;
        }
        
        if($id == "") $id=$name;

        $str = "<SELECT name=\"{$name}\" id=\"{$id}\" {$append}>";

        foreach($params as $index => $label)
        {
            $val = ($indexValue ? $index : $label);

            $str .= "<Option value=\"{$val}\" ";

            if($selected !="" && $selected == $val) $str .= " SELECTED ";

            $str .=">{$label}</Option>";
        }
        

        $str .= "</SELECT>";

        return $str;
    }
    
    /*function select()的补充方法，修复是否以数组的key作为下拉菜单的value功能
    * @params array 带KEY数组
    * @name string 取数组下表key中name的值 为 option text
    * @value string 取数组下表key中value的值 为 option value
    * @selected string 取数组下表key中selected的值 为 default selected
    */
	static public function selectList($params , $name, $id = '' ,$text , $value, $selected = ''  ,$append= '',$did='id' )
    {
		
		$id= !empty($id) ? $id : $name;
        $value = empty($value) ? $text : $value ;

		$str = "<SELECT name=\"{$name}\" id=\"{$id}\" {$append}>";

		foreach($params as $index => $label)
		{
			$str .= "<Option value=\"{$label[$value]}\" data=\"{$label[$did]}\" ";

			if($selected !="" && $selected == $val) $str .= " SELECTED ";

			$str .=">{$label[$text]}</Option>";
		}
		

		$str .= "</SELECT>";

		return $str;
    }

	static public function checkbox($params, $value,  $showResult, $name, $id = "", $interval =',',$indexValue = false,  $template=" %s ", $append = '')
    {
		$result = array();
		$values = @explode($interval, $value);

		if($showResult) 
		{
			if(empty($values)) return '';

			if(!$indexValue)
			{
				foreach($params as $k=>$v) 
					if(in_array($k, $values)) $result[] = $v;
				return implode($interval, $result);
			}
			else $value;
		}
		
		if($id == "") $id=$name;

		$str = $checked = "";

		foreach($params as $index => $label)
		{
			$val = ($indexValue ? $index : $label);
			$checked = in_array($val, $values) ? 'checked' : "";

			
			$temp = "<input type='checkbox' name='{$name}' id='{$id}' value='{$val}' {$checked} {$append}/>{$label}";

			$str .= sprintf($template, $temp);
		}
		
		return $str;
    }
}
?>
