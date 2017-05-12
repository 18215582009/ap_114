<?php 
/**
 * Created on 2008-3-22
 * 基础代码类
 * @author jctr<jc@cdrj.net.cn>
 * ChengDu CandorSoft Co., Ltd.
 * @version $Id: BaseCode.class.php,v 1.1 2012/02/07 08:59:18 gfl Exp $
 */
namespace lib;
use lib\ezsql\DbPdo as DbPdo;
use lib\util\Util;

class BaseCode {
	/**
	 * 数据库连接。
     * 
     * @var object
     * @access pdo
     */
	protected $pdo;

	/**
     * 构造函数
     * @access public 
     * @param 
     */
    function __construct(){
		$this->pdo = new DbPdo();
	}

    /**
    +----------------------------------------------------------
    * 根据不同类型找出基础代码
    +----------------------------------------------------------
    * @param $code_type  基础代码类型
    * @param $show_type  显示类型(select, checkbox)
    * @param $show_name  显示名称
    * @param $rtn_type   返回类型(string, xml, array)
    * @param $class_name 加载样式表
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @return 
    +----------------------------------------------------------
    */
    public function getBaseCodeByType($code_type, $show_name="base_code", $show_type="select", $rtn_type='string', $class_name="" ) {
		$aCode = $this->pdo->find(DB_PREFIX_SYS."code_basic", "flag=1 AND type=".$code_type,  "code, name");
        
        // 要求返回数组
        if("ARRAY" == strtoupper($rtn_type)) return $aCode;
        
        $fileName = strtoupper("base_code_{$show_type}_".base64_encode($code_type)).".{$rtn_type}";
        $fileContent = "";

        if(!file_exists(WEB_ROOT.BASE_CODE_CACHE_PATH.$fileName)) {

            if("STRING" == strtoupper($rtn_type)) {
                $class_name = empty($class_name) ? "" : 'class="'. $class_name .'"';
                if("CHECKBOX" == strtoupper($show_type)){
                    foreach ($aCode as $arr) $fileContent .= '<span '. $class_name .'><input name="{show_name}" type="checkbox" value="'.$arr['code'].'" />'.$arr['name'].'</span>';
                } else if ("SELECT" == strtoupper($show_type)){
                    foreach ($aCode as $arr) $fileContent .= '<option value="'.$arr['code'].'">'.$arr['name'].'</option>';
                    $fileContent = '<select name="{show_name}" id="{show_name}" '. $class_name .'>' . $fileContent . '</select>';
                }
                Util::write_file(BASE_CODE_CACHE_PATH, $fileName, $fileContent);
                return str_ireplace("{show_name}", $show_name, $fileContent);

            } else if ("XML" == strtoupper($rtn_type)) {
                foreach ($aCode as $arr) $fileContent .= '<baseCode id="'.$arr['code'].'" text="'.$arr['name'].'"/>';
                $fileContent = '<?xml version="1.0" encoding="utf-8"?>' . $fileContent;
                Util::write_file(BASE_CODE_CACHE_PATH, $fileName, $fileContent);
                 return "/".BASE_CODE_CACHE_PATH.$fileName;
            }

        } else {
            if("STRING" == strtoupper($rtn_type)) {
                $fileContent = read_file(BASE_CODE_CACHE_PATH.$fileName);
                return str_ireplace("{show_name}", $show_name, $fileContent);
            } else if ("XML" == strtoupper($rtn_type)) { 
                return "/".BASE_CODE_CACHE_PATH.$fileName;
            }
        }
    }


    /**
    +----------------------------------------------------------
    * 找出地区基础代码
    +----------------------------------------------------------
    * @param $type    类型(area: 省  city: 城市)
    * @param $select  生成选中
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @return 
    +----------------------------------------------------------
    */
    public function getRegion($type='area', $select="") {
        $where = "flag=1 AND type='107' ";
        $select = empty($select) ? CURRENT_REGION : $select;
        if("AREA" == strtoupper($type)) $where .= " AND SUBSTR(code, 3)='0000'";
        
        // 代码查询
		$aCode = $this->pdo->find(DB_PREFIX_SYS."code_basic", $where,  "code, name", "code");
        
        // 扩展名
        $fileExt = "CITY" == strtoupper($type) ? "xml" : "inc";
        $fileName = strtoupper("base_code_{$type}").".{$fileExt}";
        $fileContent = "";
        if(!file_exists(WEB_ROOT.BASE_CODE_CACHE_PATH.$fileName)) { // 文件不存在
            if("AREA" == strtoupper($type)) { // 省份HTML
                foreach ($aCode as $arr) {
                    if($arr['code'] == $select) {
                        $fileContent .= '<option value="'.$arr['code'].'" selected="selected">'.$arr['name'].'</option>';
                    } else { 
                        $fileContent .= '<option value="'.$arr['code'].'">'.$arr['name'].'</option>';
                    }
                }
                write_file(BASE_CODE_CACHE_PATH, $fileName, $fileContent);
                return $fileContent;
            } else if("CITY" == strtoupper($type)) { // 城市XML
                $arrXml = array();
                foreach ($aCode as $arr) {
                    $code = $arr['code'];
                    if(substr($code, 2, 4) === "0000") {
                        //$iTemp = 0;
                        $arrXml[] = '</area>';
                        $arrXml[] = '<area id="'.$code.'" text="'.$arr['name'].'">';
                    } else {
                        $arrXml[] = '<city id="'.$code.'" text="'.$arr['name'].'"/>';
                    }
                }
                $arrXml[] = '</area>';
                array_shift($arrXml);
                $fileContent = '<?xml version="1.0" encoding="utf-8"?><region>'.implode("", $arrXml)."</region>";
                write_file(BASE_CODE_CACHE_PATH, $fileName, $fileContent);
                return "/".BASE_CODE_CACHE_PATH.$fileName;
            }
        } else { // 存在
            if("AREA" == strtoupper($type)) { // 省份HTML
                return read_file(BASE_CODE_CACHE_PATH.$fileName);
            } else if("CITY" == strtoupper($type)) { // 城市XML
                return "/".BASE_CODE_CACHE_PATH.$fileName;
            }
        }
    }
	
	
    /**
    +----------------------------------------------------------
    * 找出会员类型代码
    +----------------------------------------------------------
    * @param 
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @return array
    +----------------------------------------------------------
    */	
	public function getUserType(){
		$aUserTypes = array("1"=>"个人会员", "2"=>"开发商会员", "3"=>"中介会员", "4"=>"经纪人", "9"=>"系统人员","11"=>"中介经纪人");
		return $aUserTypes;
	}

    /**
    +----------------------------------------------------------
    * 根据不同类型列出栏目树
    +----------------------------------------------------------
    * @param int $edit  是否生成编辑内容
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @return Array 栏目
    +----------------------------------------------------------
    */
	public function getTypeOfCategory($edit = false){
		$type = (int)$type;
		$aTree = $this->pdo->find("category", "flag=1 AND type=".$this->type,  "id, name, parent_id, url, target, order_list, description", "parent_id");
		$tree = new Tree($aTree, 1, $edit);
		$aHtml = $tree->getTreeXml();
		return $aHtml;
	}

    /**
    +----------------------------------------------------------
    * 保存栏目
    +----------------------------------------------------------
    * @param array $map  _POST提交上来的数据
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @return String 提示信息
    +----------------------------------------------------------
    */
	public function saveCategory($map){
		$name = $map['name'];
		$id  = $map['hidId'];
		$pid = $map['hidParentId'];
		
		$url = $map['url'];
		$tag = $map['target'];
		$odr = $map['order_list'];
		$des = $map['description'];
			
		$arrSave = array("name" => $name, "type" => $this->type, "url" => $url, "target" => $tag, "description" => $des );

		// 有值判断
		if(!empty($odr)) $arrSave['order_list'] = (int) $odr;

		if(empty($id)) { // 新增
			$arrSave['parent_id'] = $pid;
			$isOk = $this->pdo->add($arrSave, "category");
		} else { // 修改
			$isOk = $this->pdo->update($arrSave, "category", "id=".$id);
		}
		return ($isOk ? "保存成功" : "保存失败");
	}


    /**
    +----------------------------------------------------------
    * 删除栏目
    +----------------------------------------------------------
    * @param int $id  删除的主键
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @return String 提示信息
    +----------------------------------------------------------
    */
	public function deleteCategory($id){
		$isOk = $this->pdo->setField("flag", 0, "category", "id=".$id);
		return ($isOk ? "删除成功" : "删除失败");
	}

    /**
    +----------------------------------------------------------
    * 以键值对的形式取出基础代码
    +----------------------------------------------------------
    * @param int $code_type 基础代码类型
    * @param int $code_type 补充条件
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @return array 返回数组
    +----------------------------------------------------------
    */
	public function getPairBaseCodeByType($code_type, $where = " order by order_list desc")
	{
		$aCode = $this->pdo->find(
			DB_PREFIX_SYS."code_basic", 
			"flag=1 AND type=".$code_type . $where,  
			"code, name"
		);
		$rtn = array();

		for ($i=0, $m=sizeof($aCode); $i < $m; $i++) $rtn[$aCode[$i]['code']] = $aCode[$i]['name'];

		return $rtn;
	}

	/**
    +----------------------------------------------------------
    * 以键值对的形式取出基础代码
    +----------------------------------------------------------
    * @param int $code_type 基础代码类型
    * @param int $code_type 补充条件
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @return array 返回数组
    +----------------------------------------------------------
    */
	public function getPairBaseSwCodeByType($code_type, $where = " order by order_list desc")
	{
		$aCode = $this->pdo->find(
			DB_PREFIX_SYS."code_basic", 
			"flag=1 AND type=".$code_type . $where,  
			"sw_code, sw_value"
		);
		$rtn = array();

		for ($i=0, $m=sizeof($aCode); $i < $m; $i++) $rtn[$aCode[$i]['sw_code']] = $aCode[$i]['sw_value'];

		return $rtn;
	}

    /**
    +----------------------------------------------------------
    * 根据基础代码查询代码名称
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @param  $code  基础代码
    +----------------------------------------------------------
    * @return array
    +----------------------------------------------------------
    */    
    public function getNameByCode($code) {
		$sql = "SELECT 
		   *
		 FROM
		   %s
		 WHERE 
		   code = %d AND flag <> 0";
		$sql = sprintf($sql, DB_PREFIX_SYS."code_basic", $code);
        $arrcode = $this->pdo->getRow($sql);
        $name = $arrcode['name'];
		return $name;
    }

	/**
    +-------(ZhuangFei)----------------------------------------
    * 取得一条代码信息
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @param  
    +----------------------------------------------------------
    * @return Int
    +----------------------------------------------------------
	*/
	public function getOneCodeById($id)
	{
		$sql = "Select * From ".DB_PREFIX_SYS."code_basic Where 1 and id={$id}";
        $arrcode = $this->pdo->getRow($sql);

		return $arrcode;
	}

	/**
    +-------(ZhuangFei)----------------------------------------
    * 保存代码
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @param  
    +----------------------------------------------------------
    * @return Int
    +----------------------------------------------------------
	*/

	public function saveOrUpdateCode($data, $id)
	{
		if(!empty($data))
		{
			if($id == 0){
				$this->pdo->add($data, DB_PREFIX_SYS."code_basic");
				return $this->pdo->getLastInsID();
			}else{
				$this->pdo->update($data , DB_PREFIX_SYS.'code_basic', "id={$id}");
				return $id;
			}
		}

		return false;
	}

	
	/**
    +----------------------------------------------------------
    * 删除代码
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @param  
    +----------------------------------------------------------
    * @return array
    +----------------------------------------------------------
	*/
	public function removeOneCodeById($id)
	{		
		$isOk = 0;

		if(1*$id > 0)
		{
			$isOk = $this->pdo->remove("id=".$id, DB_PREFIX_SYS."code_basic");
		}

		return $isOk;
	}

	/**
    +----------------------------------------------------------
    * 删除多条代码
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @param  
    +----------------------------------------------------------
    * @return array
    +----------------------------------------------------------
	*/
	public function removeMultiCode($ids)
	{
		$isOk = 0;


		if(is_array($ids))
		{
			if(!empty($ids))
			{
				$temp = implode("','", $ids);

				$isOk = $this->pdo->remove("id in ('{$temp}')", DB_PREFIX_SYS."code_basic");
			}
		}
		else
		{
			$isOk = $this->removeOneCodeById($ids);
		}


		return $isOk;
	}

	/**
    +----------------------------------------------------------
    * 改变状态
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @param  
    +----------------------------------------------------------
    * @return array
    +----------------------------------------------------------
	*/
	public function refreshCodeStatus($id)
	{
		if(1*$id > 0)
		{
			$isOk = $this->pdo->setField("flag", 0, DB_PREFIX_SYS."code_basic", "id=".$id);
		}
		return ($isOk ? "删除成功" : "删除失败");
	}

    /**
    +----------------------------------------------------------
    * 以键值对的形式取出基础代码 二手房专用 刘雨潇添加
    +----------------------------------------------------------
    * @param int $code_type 基础代码类型
    * @param int $code_type 补充条件
    +----------------------------------------------------------
    * @access public 
    +----------------------------------------------------------
    * @return array 返回数组
    +----------------------------------------------------------
    */
	public function getPidByType($code_type, $where = "")
	{
		$aCode = $this->pdo->find(
			DB_PREFIX_SYS."code_basic", 
			"flag=1 AND pid=".$code_type . $where,  
			"code, name"
		);
		
		$rtn = array();

		for ($i=0, $m=sizeof($aCode); $i < $m; $i++) $rtn[$aCode[$i]['code']] = $aCode[$i]['name'];

		return $rtn;
	}
	
	/**
	+----------------------------------------------------------
	* 根据code获取内容值
	+----------------------------------------------------------
	* @access public 
	+----------------------------------------------------------
	* @param 
	+----------------------------------------------------------
	* @return 
	+----------------------------------------------------------
	*/
	public function getInfoByCode($code)
	{
		$info = $this->pdo->find(DB_PREFIX_SYS.'code_basic','flag = 1 and code = '.$code,'code,name');
		$info[$info['code']] = $info['name'];
		return $info;
	}
}

?>