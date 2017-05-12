<?php
/**
 * The model file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: model.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\ezsql\DbPdo as DbPdo;
//use lib\mode\sys_code_basic as baseCode;

class conf_basecodeModel extends Model
{
	/**
	 * pdo连接。
	 * 
	 * @var object
	 * @access pdo
	 */
	public $pdo;

    public function __construct()
    {
        parent::__construct();
		$this->pdo = new DbPdo();
		//print_r(baseCode::where('id','>',5)->paginate(2));
    }

	function getParentArr($code,&$navbar=''){
		//$navbar[] = array('code'=>0,'name'=>'所有配置');
		if($code==0){
			return array();
		}else{
			$sql = "select * from sys_code_basic where code=".$code;
			$res = $this->pdo->getRow($sql);
			if($res['type'] != 0){
				$navbar[] = $res;
				return $this->getParentArr($res['type'],$navbar);
			}else{
				$navbar[] = $res;
				return $navbar;
			}
		}
	}

	/* 获得当前节点的下级节点 */
	function getSubChild($code){
		$sql = "select * from sys_code_basic where type=".$code;
		$res = $this->pdo->getAll($sql);
		return $res;
	}

	/* 生产基础代码结构Tree */
	function getBaseTree($code,$selectValue=0){
		$sql = "select * from sys_code_basic where type=".$code;
		$base_category = $this->pdo->getAll($sql);
		$selected = ' selected="selected" ';
		if($selectValue==0){
			$optTree = '<option value="0"'.$selected.'>顶级分类</option>';
		}else{
			$optTree = '<option value="0">顶级</option>';
		}
		foreach($base_category as $key=>$val){
			//$optTree .= '<optgroup label="">';
			if($selectValue==$val['code']){
				$optTree .= '<option value="'.$val['code'].'" style="font-weight:bold"'.$selected.'>'.$val['name'].'</option>';
			}else{
				$optTree .= '<option value="'.$val['code'].'" style="font-weight:bold">'.$val['name'].'</option>';
			}
			$_base_category = self::getSubChild($val['code']);
			if(count($_base_category)>0){
				foreach($_base_category as $_key=>$_val){
					if($selectValue==$_val['code']){
						$optTree .= '<option value="'.$_val['code'].'"'.$selected.'>|---'.$_val['name'].'</option>';
					}else{
						$optTree .= '<option value="'.$_val['code'].'">|---'.$_val['name'].'</option>';
					}
				}
			}
			//$optTree .= '</optgroup>';
		}
		return $optTree;
	}

}
