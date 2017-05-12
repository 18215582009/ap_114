<?php
/**
 * The model file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: model.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\pager\pager_page as pager_page;
use lib\ezsql\DbPdo as DbPdo;

class officeModel extends Model
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

    public function HouseDetail($project_id){
        $sql = "select * from fc_project where id=".$project_id;
        $Info = $this->pdo->getRow($sql);
        //获取楼盘户型信息
        $sql = "select ting,shi,wei,img_diagram_url as total from fc_project_mode where project_id=".$project_id;
        $Info['modeInfo'] = $this->pdo->getAll($sql);
        //获取楼盘动态信息
        $sql = "select * from fc_project_dynamic where flag=1 and project_id=".$project_id." order by id desc limit 2";
        $Info['dynamic'] = $this->pdo->getAll($sql);
        return $Info;
    }
    public function otherDetail($project_id,$type=''){
        switch ($type){
            case 22308://住宅
                $sql = "select * from fc_project_house where project_id=".$project_id;
                break;
            case 22301://别墅
                $sql = "select * from fc_project_villa where project_id=".$project_id;
                break;
            case 22309://商住
                $sql = "select * from fc_project_house where project_id=".$project_id;
                break;
            case 22304://商铺
                $sql = "select * from fc_project_business where project_id=".$project_id;
                break;
            case 22305://写字楼
                $sql = "select * from fc_project_office where project_id=".$project_id;
                break;
            default:
                $sql = "select * from fc_project_house where project_id=".$project_id;
                break;
        }
        $Info =  $this->pdo->getRow($sql);
        return $Info;
    }
    /**
    @params get_desc 获取房源部分详细信息
    @params $id 传入写字楼的编号
    */
    public function get_desc($id){
        $sql = "select p.name,p.keeper_uid,o.create_date,p.slogan,p.pm_type,p.total_area,p.red_house_price_average,p.telephone,p.sale_address,p.structure,p.level, p.manage_company,p.build_year, p.parking from fc_project as p left join fc_project_office as o  on p.id = o.project_id where project_id=".$id;
        $info = $this->pdo->getRow($sql);
        $arr = array();
        $arr['name']=$info['name'];//名称
        $arr['keeper_uid']=$info['keeper_uid'];//负责人
        $arr['create_date']=date('Y-m-d H:i:s', $info['create_date']);//发布时间
        $arr['total_price']=($info['red_house_price_average']*$info['total_area']);
        $arr['pm_type']=$info['pm_type'];//物业类型
        $arr['slogan']=$info['slogan'];//项目口号
        $arr['total_area']=$info['total_area'];//总面积
        $arr['total_price']=$info['total_price'];//总价格
        $arr['telephone']=$info['telephone'];//联系电话
        $arr['sale_address']=$info['sale_address'];//售楼地址
        $arr['structure']=$info['structure'];//高层还是底层
        $arr['level']=$info['level'];//档次
        $arr['manage_company']=$info['manage_company'];//物业公司
        $arr['build_year']=$info['build_year'];//建筑年月
        $arr['parking']=$info['parking'];//车位
        return $arr;
      }

}

