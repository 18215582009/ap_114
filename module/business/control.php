<?php
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
class business extends Control
{
    /* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
    }

    /* 商业列表 */
    public function index()
    {
        $HouseListInfo = $this->business->searchHouseList($_GET);
        $this->assign('borough',$HouseListInfo['borough']);
        $this->assign('room',$HouseListInfo['room']);
        $this->assign('price',$HouseListInfo['price']);
        $this->assign('pm_type',$HouseListInfo['pm_type']);
        $this->assign('use_feature',$HouseListInfo['use_feature']);
        $this->assign('price_sort',$HouseListInfo['price_sort']);
        $this->assign('list',$HouseListInfo['list']);
        $this->assign('total',$HouseListInfo['total']);
        $this->assign('pageInfo',$HouseListInfo['pageInfo']);
        $this->assign('pageNation',$HouseListInfo['pageNation']);
        $this->display('business','business_list');
    }

    /* 商业详细 */
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
                $this->display('business', 'business_detail');
            }else{
                lib\util\Util::error('404');
            }
        }else{
            //没有找到您需要的信息
            lib\util\Util::error('404');
        }
    }

}

