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
class saleModel extends Model
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

    public function secondoHouseList(){
        $houseListInfo = array();
        $pageInfo = "";
        $pageSize = 10;
        $offset = 0;
        $subPages=10;//每次显示的页数
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
        if($currentPage>0) $offset=($currentPage-1)*$pageSize;

        extract($_GET);
        $order="e.id desc";
        $where = "e.flag = 1";
        $lefttable = "";
        $condition=0;

        $price_param = 'price';
        $total_area = 'total_area';
        $build_years = 'build_year';
        $total_floors = 'total_floor';

        if(!empty($keyword))
        {//关键字
            $keyword = htmlspecialchars(urldecode($keyword));
            $where .= " and (e.title like '%$keyword%') ";
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

        if(!empty($price) && strlen($price) != 1)
        {//价格
            $price_get = explode('-',$price);
            $condition=1;
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
                }
            }
            $pageInfo .= "price=$price&";
        }else{
            $price = 0;
        }
        $houseListInfo['price'] = $price;

        if(!empty($build_year) && strlen($build_year) != 1)
        {//建筑年代
            $price_years = explode('-',$build_year);
            $condition=1;
            if($price_years[1]=='0')
            {
                $where .= " and e.".$build_years." >= '{$price_years[0]}' ";
            }
            else
            {
                if($price_years[0]=='0')
                {
                    $where .= " and e.".$build_years." > '{$price_years[0]}' and e.".$build_years." <= '{$price_years[1]}' ";
                }else{
                    $where .= " and e.".$build_years." >= '{$price_years[0]}' and e.".$build_years." <= '{$price_years[1]}' ";
                }
            }
            $pageInfo .= "build_year=$build_year&";
        }else{
            $build_year = 0;
        }
        $houseListInfo['build_year'] = $build_year;

        if(!empty($pm_type) && $pm_type!=0)
        {//房屋类型
            $where .= " and e.pm_type = '$pm_type'";
            $pageInfo .= "pm_type=$pm_type&";
            $condition=1;
        }else{
            $pm_type = 0;
        }
        $houseListInfo['pm_type'] = $pm_type;

        if(!empty($toward) && $toward!=0)
        {//房屋朝向
            $where .= " and e.toward = '$toward'";
            $pageInfo .= "toward=$toward&";
            $condition=1;
        }else{
            $toward = 0;
        }
        $houseListInfo['toward'] = $toward;

        if(!empty($total_floor) && strlen($total_floor) != 1)
        {//建筑楼层
            $price_floor = explode('-',$total_floor);
            $condition=1;
            if($price_floor[1]=='0')
            {
                $where .= " and e.".$total_floors." >= '{$price_floor[0]}' ";
            }
            else
            {
                if($price_floor[0]=='0')
                {
                    $where .= " and e.".$total_floors." > '{$price_floor[0]}' and e.".$total_floors." <= '{$price_floor[1]}' ";
                }else{
                    $where .= " and e.".$total_floors." >= '{$price_floor[0]}' and e.".$total_floors." <= '{$price_floor[1]}' ";
                }
            }
            $pageInfo .= "total_floor=$total_floor&";
        }else{
            $total_floor = 0;
        }
        $houseListInfo['total_floor'] = $total_floor;

        if(!empty($fitmen_type) && $fitmen_type!=0)
        {//装修类型
            $where .= " and e.fitmen_type = '$fitmen_type'";
            $pageInfo .= "fitmen_type=$fitmen_type&";
            $condition=1;
        }else{
            $fitmen_type = 0;
        }
        $houseListInfo['fitmen_type'] = $fitmen_type;

        if(!empty($struct) && $struct!=0)
        {//房屋结构
            $where .= " and e.house_struct = '$struct'";
            $pageInfo .= "struct=$struct&";
            $condition=1;
        }else{
            $struct = 0;
        }
        $houseListInfo['struct'] = $struct;

        if(!empty($deposit) && $deposit!=0)
        {//押金方式
            $where .= " and e.rent_deposit = '$deposit'";
            $pageInfo .= "deposit=$deposit&";
            $condition=1;
        }else{
            $deposit = 0;
        }
        $houseListInfo['deposit'] = $deposit;

        if(!empty($lease) && $lease!=0)
        {//租赁方式
            $where .= " and e.rent_way = '$lease'";
            $pageInfo .= "lease=$lease&";
            $condition=1;
        }else{
            $lease = 0;
        }
        $houseListInfo['lease'] = $lease;

        if(!empty($area) && strlen($area) != 1)
        {//面积
            $price_get = explode('-',$area);
            $condition=1;
            if($price_get[1]=='0' || count($price_get) == 1)
            {

                $where .= " and e.".$total_area." >= '{$price_get[0]}' ";
            }
            else
            {

                if($price_get[0]=='0' || count($price_get) == 1)
                {
                    $where .= " and e.".$total_area." > '{$price_get[0]}' and e.".$total_area." <= '{$price_get[1]}' ";
                }else{
                    $where .= " and e.".$total_area." >= '{$price_get[0]}' and e.".$total_area." <= '{$price_get[1]}' ";
                }
            }
            $pageInfo .= "area=$area&";
        }else{
            $area = 0;
        }
        $houseListInfo['area'] = $area;

        if(!empty($room) && $room!=0)
        {//户型
            $room = intval($room);
            $condition=1;
            if($room=='0')
            {
                $where .= " and shi >= '{$room}'";
            }elseif($room==5){
                $where .= " and shi > '4' ";
            }else
            {
                $where .= " and shi = '{$room}'";
            }
            $pageInfo .= "room=$room&";
        }else{
            $room = 0;
        }
        $houseListInfo['room'] = $room;


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

        $livedate = 'create_date';
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

        //房屋类型
        if(isset($house_type)){
            $where .= " and e.house_type=".$house_type;
        }

        $orderby = empty($order) ? "order by e.id desc " : "order by $order ";
        $limit = "limit $offset,$pageSize";

        $sql = "select distinct e.* from fc_esf as e ".$lefttable." where $where $orderby $limit";
        $sqlcount = "select count(id) as count from (select distinct e.id from fc_esf as e ".$lefttable." where $where) as id";
        $res = $this->pdo->getAll($sql);
        $count = $this->pdo->getRow($sqlcount);

        $recordCount = $count['count'];
        $page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$pageInfo,5);
        $splitPageStr=$page->get_page_html();


        if(isset($_SESSION['userid'])){
            //获取收藏信息
            $userid = $_SESSION['userid'];
            $sql = "select * from fc_esf_user_favorites where create_uid = '$userid'";
            $houseListInfo['collection'] = $this->pdo->getAll($sql);
            //获取已得到的房东电话
            $sql = "select c.*,e.linkman,e.telphone from fc_esf_user_cons as c LEFT JOIN fc_esf as e on c.esf_id=e.id where c.create_uid='$userid' and e.house_type='$house_type' and  c.score=40";
            $houseListInfo['landlordphone'] = $this->pdo->getAll($sql);
        }


        //购房问答
        $cidstr=implode(",",$this->getChildCids());
        $sql = "SELECT * from web_contentindex where cid in ($cidstr) ORDER BY digest DESC limit 6";
        $houseListInfo['information'] = $this->pdo->getAll($sql);
        //猜你喜欢
        $sql = "select * from fc_esf where house_type = '$house_type' AND flag=1 ORDER BY create_date DESC limit 6";
        $houseListInfo['guessyoulike'] = $this->pdo->getAll($sql);

        $houseListInfo['list'] = $res;
        $houseListInfo['pageInfo'] = $pageInfo;
        $houseListInfo['total'] = $recordCount;
        $houseListInfo['pageNation'] = $splitPageStr;
        $houseListInfo['condition'] = $condition;


        return $houseListInfo;
    }

    //二手房详情
    public function secondhousedetail(){
        $id = $_GET['id'];
        $secondhousedetail = array();
        //获取楼房信息
        $sql = "select * from fc_esf where id='$id'";
        $secondhousedetail['detail'] = $this->pdo->getAll($sql);

        if(isset($_SESSION['userid'])){
            //获取收藏信息
            $userid = $_SESSION['userid'];
            $sql = "select * from fc_esf_user_favorites where create_uid = '$userid'";
            $secondhousedetail['collection'] = $this->pdo->getAll($sql);
            //获取已得到的房东电话
            $sql = "select c.*,e.linkman,e.telphone from fc_esf_user_cons as c LEFT JOIN fc_esf as e on c.esf_id=e.id where c.create_uid='$userid' and c.score=40";
            $secondhousedetail['landlordphone'] = $this->pdo->getAll($sql);
        }

        //获取楼房图片
        $sql = "select fep.*,fea.url from fc_esf_pic as fep LEFT JOIN fc_esf_attach as fea on fep.attach_id=fea.id where esf_id = '$id'";
        $secondhousedetail['img'] = $this->pdo->getAll($sql);
        if(count($secondhousedetail['img']) == 0){
            $secondhousedetail['img'] = "";
        }


        $district = $secondhousedetail['detail'][0]['district_id'];
        //获取该楼房所在小区
        $sql = "select * from fc_esf_district where id = '$district'";
        $secondhousedetail['district'] = $this->pdo->getAll($sql);

        //猜你喜欢
        $sql = "select * from fc_esf where district_id = '$district' and flag=1";
        $secondhousedetail['guessyoulike'] = $this->pdo->getAll($sql);

        return $secondhousedetail;
    }

    //添加看房记录
    public function house_record(){
        $userid = $_SESSION['userid'];
        $esfid = $_GET['id'];
        //获取一条最新的看房记录，10分钟内不会添加看房记录
        $sql = "select * from fc_esf_user_cons WHERE create_uid='$userid' and esf_id='$esfid' and score=0 ORDER BY create_date desc limit 1";
        $new = $this->pdo->getAll($sql);

        $esf['esf_id'] = $esfid;
        $esf['score'] = 0;
        if(count($new) == 0){
            $this->pdo->add($esf,'fc_esf_user_cons');
        }else{
            $newtime = ($new[0]['create_date'])+(10*60);//最新一条看房记录的时间戳
            $time = strtotime(date('Y-m-d H:i:s'));//当前时间戳
            if($newtime <= $time){
                $this->pdo->add($esf,'fc_esf_user_cons');
            }
        }
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

    public function getXqNameList($name=''){
        $list = array();
        if(!empty($name)) {
            $sql = "select id,reside from fc_esf_district where reside like '%{$name}%'";
            $list = $this->pdo->getAll($sql);
        }
        return $list;
    }

    public function getChildCids(){
        $sql = "select id from web_category where parent_id=119";
        $cidArr = $this->pdo->getAll($sql);
        $cidKey = array();
        foreach ($cidArr as $item){
            $cidKey[] = $item['id'];
        }
        return $cidKey;
    }

}

