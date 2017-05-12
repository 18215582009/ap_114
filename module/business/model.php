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

class businessModel extends Model
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
        $subPages=10;//每次显示的页数
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
        if($currentPage>0) $offset=($currentPage-1)*$pageSize;

        extract($_GET);
        $order="e.id desc";
        $where = "e.flag = 1";
        $lefttable = "";

        if(!empty($keyword))
        {//关键字
            $keyword = htmlspecialchars(urldecode($keyword));
            $where .= " and (e.project_name like '%$keyword%' or e.project_address like '%$keyword%') ";
            $pageInfo .= "keyword=".urlencode($keyword)."&";
        }else{
            $keyword = '';
        }
        $houseListInfo['keyword'] = $keyword;

        if(!empty($borough) && $borough!=0)
        {//区域
            $where .= " and e.borough = '$borough'";
            $pageInfo .= "borough=$borough&";
        }else{
            $borough = 0;
        }
        $houseListInfo['borough'] = $borough;

        if(!empty($room) && $room!=0)
        {//户型
            $room = intval($room);
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

        if(!empty($price) && $price!=0)
        {//价格
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

        return $houseListInfo;
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

}

