<?php
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
class office extends Control
{
    /* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
    }

    /* 写字楼列表 */
    public function index()
    {   
        $type=isset($_GET['type'])?$_GET[ 'type']: '';
        $this->loadModel('newhouse');
        $HouseListInfo = $this->newhouse->searchHouseList($_GET);
        $this->assign('total_area',$HouseListInfo['total_area']);
        $this->assign('total_area_sort',$HouseListInfo['total_area_sort']);
        $area = $this->config->area_option;
        $this->assign('area', $area);
        $this->assign('borough',$HouseListInfo['borough']);
        $this->assign('room',$HouseListInfo['room']);
        $this->assign('price',$HouseListInfo['price']);
        if( (!empty($_GET['pm_type']) ) && ($_GET['type']=="sale") ){

          $pm_type =    22305;  

        }
        $this->assign('pm_type', $pm_type);
        $price_option=$this->config->price_option;
        $this->assign('price_option', $price_option);
        $this->assign('price_sort',$HouseListInfo['price_sort']);
        $this->assign('time_sort',$HouseListInfo['time_sort']);
        $this->assign('list',$HouseListInfo['list']);
        $this->assign('youlike',$HouseListInfo['youlike']);
        $this->assign('total',$HouseListInfo['total']);
        $this->assign('pageInfo',$HouseListInfo['pageInfo']);
        $this->assign('pageNation',$HouseListInfo['pageNation']);
        $this->assign('type',$type);
        $borough_option = $this->config->borough_option;
        $this->assign('borough_option',$borough_option);
        $this->display('office','office_list');
    }

    /* 写字楼详细 */
    public function detail()
    {
        $id = isset($_GET['id'])?$_GET['id']:0;
        $pm_type = isset($_GET['pm_type'])?$_GET['pm_type']:0;
        if($id>0) {
            $DetailInfo = $this->office->HouseDetail($id);
            if(isset($DetailInfo['id'])) {
                $OtherInfo = $this->office->otherDetail($id);
                $this->assign('OtherInfo',$OtherInfo);
                //print_r($OtherInfo);exit;
                $this->assign('pm_type', $pm_type);
                $this->assign('info', $DetailInfo);
                $get_desc = $this->office->get_desc($id);

                $this->assign('get_desc',$get_desc);
                //print_r($DetailInfo);exit;
                $this->display('office', 'office_detail');
            }else{
                lib\util\Util::prompt('访问页面不存在!','404');
            }
        }else{
            //没有找到您需要的信息
            lib\util\Util::prompt('访问页面不存在!','404');
        }
    }


}

