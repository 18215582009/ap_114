<?php
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */

class newhouse extends Control
{
    protected $pdo;
    /* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
        $this->pdo = $this->newhouse->pdo;
    }

    /* 新房首页 */
    public function index()
    {
        $HouseListInfo = $this->newhouse->searchHouseList($_GET);
        $this->assign('borough',$HouseListInfo['borough']);
        $this->assign('room',$HouseListInfo['room']);
        $this->assign('price',$HouseListInfo['price']);
        $this->assign('pm_type',$HouseListInfo['pm_type']);
        $this->assign('use_feature',$HouseListInfo['use_feature']);
        $this->assign('price_sort',$HouseListInfo['price_sort']);
        $this->assign('time_sort',$HouseListInfo['time_sort']);
        $this->assign('list',$HouseListInfo['list']);
        $this->assign('total',$HouseListInfo['total']);
        $this->assign('pageInfo',$HouseListInfo['pageInfo']);
        $this->assign('pageNation',$HouseListInfo['pageNation']);
        $this->assign('keyword',$HouseListInfo['keyword']);
        $this->assign('recommend',$this->recommend());
        $this->assign('youlike',$this->youlike());
        $this->assign('condition',$HouseListInfo['condition']);
        $this->display('newhouse','house_list');
    }

    /* 猜你喜欢 */
    public function youlike(){
        $sql = "select id,name,red_house_price_average,pm_type,img_url from fc_project where borough = '510104' and flag = 1 limit 6";
        $youlike = $this->pdo->getAll($sql);
        return $youlike;
    }

    /* 推荐楼盘 */
    public function recommend(){
        $sql = "select fp.*,count(fpr.project_id) as sum from fc_project as fp LEFT JOIN fc_project_reserve as fpr on fp.id=fpr.project_id
                AND fpr.type=2 AND fpr.flag=1 GROUP BY fp.id ORDER BY fp.live_date DESC limit 3";
        $recommend = $this->pdo->getAll($sql);
        return $recommend;
    }

    /* 新房详细 */
    public function detail()
    {
        $id = isset($_GET['id'])?$_GET['id']:0;
        $pm_type = isset($_GET['pm_type'])?$_GET['pm_type']:0;
        $DetailInfo = $this->newhouse->HouseDetail($id);
        if(isset($DetailInfo['id'])) {
            $OtherInfo = $this->newhouse->otherDetail($id);
            $this->assign('OtherInfo',$OtherInfo);
            $this->assign('pm_type', $pm_type);
            $this->assign('youlike',$this->youlike());
            $this->assign('info', $DetailInfo);
            $this->display('newhouse','house_detail');
        }else{
                lib\util\Util::error('404');
        }

    }

    public function mapHouse()
    {


        $this->display('newhouse','map');
    }

    public function apiMapSearch()
    {


        $HouseListInfo = $this->newhouse->searchHouseList($_GET);




        /* json 数据格式
        var data = {
            total: '5444',
            list: [
                {'id':'1','name':'卓锦城','price':'9000元/平米','area':'80-90m²','feature':'南北通透,小户型,露台','spic':'/theme/agency/img/210x140m.jpg','map_x':'104.076251','map_y':'30.661455','jushi':'<u>三居</u><u>四居</u>','mesMore':'<li><u>小户型</u></li><li><u>南北通透</u></li><li><u>露台</u></li>'},
                {'id':'2','name':'中海国际','price':'9000元/平米','area':'80-90m²','feature':'南北通透,小户型,露台','spic':'/theme/agency/img/210x140m.jpg','map_x':'104.279251','map_y':'30.653455','jushi':'<u>二居</u><u>三居</u>','mesMore':'<li><u>南北通透</u></li><li><u>露台</u></li>'},
                {'id':'3','name':'468公馆','price':'9000元/平米','area':'80-90m²','feature':'南北通透,小户型,露台','spic':'/theme/agency/img/210x140m.jpg','map_x':'104.170051','map_y':'30.669455','jushi':'<u>三居</u><u>四居</u>','mesMore':'<li><u>小户型</u></li><li><u>南北通透</u></li><li><u>露台</u></li>'},
                {'id':'4','name':'马克公馆','price':'9000元/平米','area':'80-90m²','feature':'南北通透,小户型,露台','spic':'/theme/agency/img/210x140m.jpg','map_x':'104.374251','map_y':'30.661455','jushi':'<u>三居</u><u>四居</u>','mesMore':'<li><u>小户型</u></li><li><u>南北通透</u></li><li><u>露台</u></li>'},
            ]
        };
        */




        echo json_encode($HouseListInfo);exit;
    }

    public function chart(){
        $this->display('index','chart');
    }
	
	/* 商铺 */
    public function shangpu()
    {
        $this->display('index','shangpu_list');
    }
	
	/* 商铺详细 */
    public function shangpuDefault()
    {
        $this->display('index','shangpu_detail');
    }

    //图片验证码判断
    public function code(){
        $code = $_POST['code'];
        if($_SESSION['verify']!=md5($code)){
            echo 2;
        }else{
            echo 1;
        }
    }
    //新房客户预定类型
    public function type(){
        $smscode = $_POST['sms_code'];
        if($smscode == $_SESSION['mobile_code']){
            $this->newhouse->type();
        }else{
            echo 3;
        }
    }
    //贷款申请
    public function loan(){
        if(isset($_POST['sms_code'])){$smscode = $_POST['sms_code'];}
        if($_POST['typeid'] == 5){$this->newhouse->loan();exit;}
        if($smscode == $_SESSION['mobile_code']){
            $this->newhouse->loan();
        }else{
            echo 3;
        }
    }
}

