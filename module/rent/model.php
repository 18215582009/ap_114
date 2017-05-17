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
class rentModel extends Model
{
	/**
	 * ado连接。
	 * 
	 * @var object
	 * @access pdo
	 */
	public $pdo;

    public function __construct()
    {
        parent::__construct();
		$this->pdo = new DbPdo($this->config->db);
    }

    /* 保存发布房源 */
    public function pubSale($data){
        //print_r($data);exit;
        $xq_id = $data['xq_id'];
        $data['district_id'] = $xq_id;
        $data['reside'] = $data['xq_name'];
        //获取小区信息
        $sql = "select * from fc_esf_district where id=".$xq_id;
        $distInfo = $this->pdo->getAll($sql);
        if(count($distInfo)>0) {
            $data['pm_type'] = $distInfo[0]['pm_type'];
            $data['address'] = $distInfo[0]['address'];
            $data['direction'] = $distInfo[0]['direction'];
            $data['region'] = $distInfo[0]['region'];
            $data['borough'] = $distInfo[0]['borough'];
            $data['circle'] = $distInfo[0]['circle'];
            $data['build_year'] = $distInfo[0]['build_year'];
            $insertRlt = $this->pdo->add($data, 'fc_esf');
            return $insertRlt;
        }else{
            return 0;
        }
    }

}

