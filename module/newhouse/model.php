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

class newhouseModel extends Model
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

    public function searchHouseList($Data){

        $houseListInfo = array();
        $pageInfo = "";
        $pageSize = 10;
        $offset = 0;
        $subPages=7;//每次显示的页数
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
        if($currentPage>0) $offset=($currentPage-1)*$pageSize;
        extract($_GET);
        $order="e.id desc";
        $where = "e.flag = 1";
        $lefttable = "";
        $condition=0;
        if(!empty($keyword))
        {//关键字
            $keyword = htmlspecialchars(urldecode($keyword));
            $where .= " and (e.name like '%$keyword%') or (e.address like '%$keyword%')";
            $pageInfo .= "keyword=".urlencode($keyword)."&";
            $condition=1;
        }else{
            $keyword = '';
        }
        $houseListInfo['keyword'] = $keyword;

        if(!empty($borough) && $borough!=0)
        {//区域
            $where .= " and e.borough = '$borough'";
            $pageInfo .= "borough=$borough&";
            $condition=1;
        }else{
            $borough = 0;
        }
        $houseListInfo['borough'] = $borough;

        if(!empty($room) && $room!=0)
        {//户型
            $room = intval($room);
            $condition=1;
            if($room=='0')
            {
                $where .= " and m.shi >= '{$room}'";
            }elseif($room==5){
                $where .= " and m.shi > '4' ";
            }else
            {
                $where .= " and m.shi = '{$room}'";
            }
            $lefttable .= "left join fc_project_mode as m on e.id=m.project_id";
            $pageInfo .= "room=$room&";
        }else{
            $room = 0;
        }
        $houseListInfo['room'] = $room;

        $price_param = 'red_house_price_average';


        if(!empty($pm_type) && $pm_type!=0)
        {//类型
            $where .= " and e.pm_type like '%{$pm_type}%'";
            $pageInfo .= "pm_type=$pm_type&";
            $condition=1;
            switch($pm_type){
                case '22301':$price_param = 'red_villa_price_average';break;//别墅
                case '22305':$price_param = 'red_office_price_average';break;//写字楼
                case '22304':$price_param = 'red_business_price_average';break;//商业
                default:$price_param = 'red_house_price_average';break;//住宅
            }
        }else{
            $pm_type = 0;
        }
        $houseListInfo['pm_type'] = $pm_type;
        
        $total_param = 'total_area';

        if( !empty($total_area) && $total_area!=='0')
        {//面积
            $total_area_get = explode('-',$total_area);
            $condition=1;
            if($total_area_get[1]=='0')
            {

                $where .= " and e.".$total_param." >= '{$total_area_get[0]}' ";
            }
            else
            {
                if($total_area_get[0]=='0')
                {
                    $where .= " and e.".$total_param." > '{$total_area_get[0]}' and e.".$total_param." <= '{$total_area_get[1]}' ";
                }else{
                    $where .= " and e.".$total_param." >= '{$total_area_get[0]}' and e.".$total_param." <= '{$total_area_get[1]}' ";
                }
            }
            $pageInfo .= "total_area=$total_area&";
        }else{
            $total_area = 0;
        }
        $houseListInfo['total_area'] = $total_area;

        if(!empty($total_area_sort) && $total_area_sort!='normal')
        { //面积排序
            $condition=1;
            switch($total_area_sort)
            {
                case 'total_area_asc':
                    $order = "cast(e.".$total_param." as SIGNED) asc ";
                    break;
                case 'total_area_desc':
                    $order = "cast(e.".$total_param." as SIGNED) desc ";
                    break;
                //case 'area_asc':$order = " cast(e.total_area as SIGNED) asc ";break;
                //case 'area_desc':$order = " cast(e.total_area as SIGNED) desc ";break;
                default:
                    break;
            }
            $pageInfo .= "total_area_sort=$total_area_sort&";
        }else{
            $total_area_sort = 'normal';
        }
        $houseListInfo['total_area_sort'] = $total_area_sort;

        if(!empty($price) && $price!=0)
        {//价格

            if(strlen($price) == 2 ){
                $where .= " and e.".$price_param." is null ";
                $condition=1;
            }else{
                $price_get = explode('-',$price);
                if($price_get[1]=='0')
                {
                    $where .= " and e.".$price_param." >= '{$price_get[0]}' ";
                }
                else
                {
                    if($price_get[0]=='0')
                    {
                        $where .= " and e.".$price_param." > '{$price_get[0]}' and e.".$price_param." <= '{$price_get[1]}' ";
                    }else{
                        $where .= " and e.".$price_param." >= '{$price_get[0]}' and e.".$price_param." <= '{$price_get[1]}' ";
                        $condition=1;
                    }
                }
            }
            $pageInfo .= "price=$price&";
        }else{
            $price = 0;
        }
        $houseListInfo['price'] = $price;

        $houseListInfo['use_feature'] = 0;

        if(!empty($price_sort) && $price_sort!='normal')
        { //价格排序
            switch($price_sort)
            {
                case 'price_asc':
                    $order = "cast(e.".$price_param." as SIGNED) asc ";
                    break;
                case 'price_desc':
                    $order = "cast(e.".$price_param." as SIGNED) desc ";
                    break;
                //case 'area_asc':$order = " cast(e.total_area as SIGNED) asc ";break;
                //case 'area_desc':$order = " cast(e.total_area as SIGNED) desc ";break;
                default:
                    break;
            }
            $pageInfo .= "price_sort=$price_sort&";
        }else{
            $price_sort = 'normal';
        }
        $houseListInfo['price_sort'] = $price_sort;


        $livedate = 'live_date';
        if(!empty($time_sort) && $time_sort!='normal')
        { //开盘时间排序
            switch($time_sort)
            {
                case 'time_asc':
                    $order = "cast(e.".$livedate." as SIGNED) asc ";
                    break;
                case 'time_desc':
                    $order = "cast(e.".$livedate." as SIGNED) desc ";
                    break;
                //case 'area_asc':$order = " cast(e.total_area as SIGNED) asc ";break;
                //case 'area_desc':$order = " cast(e.total_area as SIGNED) desc ";break;
                default:
                    break;
            }
            $pageInfo .= "time_sort=$time_sort&";
        }else{
            $time_sort = 'normal';
        }
        $houseListInfo['time_sort'] = $time_sort;

        $orderby = empty($order) ? "order by e.id desc " : "order by $order ";
        $limit = "limit $offset,$pageSize";
        //$sql = " select ".$fileds." from ".DB_PREFIX_HOME."layout_new as e left join ".DB_PREFIX_HOME."layout_pic as p on e.id=p.layout_id where $where $orderby $limit  ";
        //echo '<br><br><br>';
        $sql = "select distinct e.* from fc_project as e ".$lefttable." where $where $orderby $limit";
        $sqlcount = "select count(id) as count from (select distinct e.id from fc_project as e ".$lefttable." where $where) as id";
        $res = $this->pdo->getAll($sql);
        //获取楼盘户型信息
        foreach($res as $key=>$item){
            $sql = "select shi,sum(total_apa) as total from fc_project_mode where project_id=".$item['id']." group by shi";
            $res[$key]['modeInfo'] = $this->pdo->getAll($sql);
        }
        $count = $this->pdo->getRow($sqlcount);
        $recordCount = $count['count'];
        $page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$pageInfo,5);
        $splitPageStr=$page->get_page_html();


        $houseListInfo['list'] = $res;
        $houseListInfo['pageInfo'] = $pageInfo;
        $houseListInfo['total'] = $recordCount;
        $houseListInfo['pageNation'] = $splitPageStr;
        $houseListInfo['condition'] = $condition;

        return $houseListInfo;
    }

    //新房详情
    public function HouseDetail($project_id){
        $sql = "select * from fc_project where id=".$project_id;
        $Info = $this->pdo->getRow($sql);

        //获取楼盘图库
        $sql = "select fpa.url from fc_project_pic as fpp LEFT JOIN fc_project_attach as fpa on fpp.attach_id = fpa.id WHERE fpp.project_id = '$project_id'
              AND fpp.flag = 1";
        $Info['gallery'] = $this->pdo->getAll($sql);
        //获取楼盘户型信息
        $sql = "select ting,shi,wei,img_diagram_url as total from fc_project_mode where project_id=".$project_id;
        $Info['modeInfo'] = $this->pdo->getAll($sql);
        //获取楼盘动态信息
        $sql = "select * from fc_project_dynamic where flag=1 and project_id=".$project_id." order by type desc limit 2";
        $Info['dynamic'] = $this->pdo->getAll($sql);
        //获取组团人数
        $sql = "select count(*) as sum from fc_project_reserve where type = 2 AND project_id = '$project_id'";
        $Info['groupsum'] = $this->pdo->getAll($sql);
        //楼盘在售户型
        $sql = "SELECT shi,sum(total_apa) as total from fc_project_mode where project_id = '$project_id' group by shi";
        $Info['household'] = $this->pdo->getAll($sql);
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


    public function loan(){
        $typeid = $_POST['typeid'];
        $phone = $_POST['lphone'];
        $type['type'] = $typeid;
        $type['tel'] = $phone;
        if(isset($_POST['lusername'])){$type['name'] = $_POST['lusername'];}
        if(isset($_POST['lemail'])){$type['email'] = $_POST['lemail'];}
        if(isset($_POST['lloansum'])){$type['loan_money'] = $_POST['lloansum'];}
        if(isset($_POST['lpurpose'])){$type['loan_use'] = $_POST['lpurpose'];}
        if($typeid == 'loancode'){
            $sql = "select * from fc_project_reserve WHERE type = 5 AND  tel = '$phone' AND  flag = 1";
            $sum = $this->pdo->getAll($sql);
            if(count($sum) == 0){
                echo 1;
            }else{
                echo 2;
            }
        }else{
            $loan = $this->pdo->add($type,'fc_project_reserve');
            if($loan){
                echo 1;
            }
        }
    }
    public function type(){
        $typeid = $_POST['typeid'];
        $newhouseid = $_POST['newhouseid'];
        $phone = $_POST['phone'];
        $type['type'] = $typeid;
        $type['project_id'] = $newhouseid;
        $type['project_name'] = $_POST['newhousename'];
        $type['tel'] = $_POST['phone'];
        if(isset($_POST['username'])){$type['name'] = $_POST['username'];}
        if(isset($_POST['subtype'])){$type['subtype'] = $_POST['subtype'];}

        if($typeid == 3){
            $sql = "select * from fc_project_reserve where type='$typeid' AND tel='$phone' AND flag=1";
            $subscribe = $this->pdo->getAll($sql);
            if(count($subscribe) > 0){
                $subtypes = explode(",",$_POST['subtype']);
                $subs = '';
                foreach($subtypes as $key=>$info){
                    if(!strpbrk($subscribe[0]['subtype'],"$info")){
                        $subs .= ",".$info;
                    }
                }
                if($subs == ''){
                    echo 2;
                    exit;
                }else{
                    $subs = $subscribe[0]['subtype'].$subs;
                    $sql = "update fc_project_reserve SET subtype='$subs' WHERE type='$typeid' AND tel='$phone' AND flag=1";
                    $this->pdo->getAll($sql);
                }
            }else{
                $this->pdo->add($type,'fc_project_reserve');
            }
            echo 1;
            exit;
        }
        if($typeid != 3){
            $sql = "select id from fc_project_reserve WHERE type = '$typeid' AND project_id = '$newhouseid' AND tel = '$phone' AND  flag = 1";
            $sum = $this->pdo->getAll($sql);

            if(count($sum) == 0){
                $this->pdo->add($type,'fc_project_reserve');
                echo 1;
            }else{
                echo 2;
            }
        }
    }


}

