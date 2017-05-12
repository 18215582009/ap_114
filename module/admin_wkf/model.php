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
class admin_wkfModel extends Model
{
	/**
	 * pdo 对象
	 * 
	 * @var object
	 * @access pdo
	 */
	public $pdo;

    public function __construct()
    {
        parent::__construct();
		$this->pdo = new DbPdo();
    }

	/* 获取流程详细信息 */
	public function findWkf($wkf_id){
		$sql = "select * from wkf where id=".$wkf_id;
		$Info = $this->pdo->getRow($sql);
		return $Info;
	}
	
	/* 获取活动详细信息 */
	public function findAct($act_id){
		$sql = "select * from wkf_activity where id=".$act_id;
		$Info = $this->pdo->getRow($sql);
		return $Info;
	}

	/* 获取转换详细信息 */
	public function findTran($tran_id){
		$sql = "select * from wkf_transition where id=".$tran_id;
		$Info = $this->pdo->getRow($sql);
		return $Info;
	}

	/* 获取当前流程的所有活动节点 */
	public function getActList($wkf_id){
		$sql = "select * from wkf_activity where wkf_id=".$wkf_id;
		$List = $this->pdo->getAll($sql);
		return $List;
	}

	/* 获取业务表结构 */
	public function getTableFields($table_name,$type='key'){
		$List = $this->pdo->getFields($table_name);
		if($type=='key'){
			foreach($List as $key=>$val){
				$JsonList[$val['name']] = $val['name'];
			}
			return $JsonList;
		}else{
			return $List;
		}
	}

}