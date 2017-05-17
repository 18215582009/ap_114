<?php
/**
 * The model file of admin_entry module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: model.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\ezsql\DbPdo as DbPdo;
use lib\pager\pager_page as pager_page;

class user_commonModel extends Model
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
		$this->pdo = new DbPdo();
    }

    //我的收藏
    public function personal_collection(){
        $userid = $this->session->userid;;
        $collection = array();

        $pageInfo = "";
        $pageSize = 10;
        $offset = 0;
        $subPages=10;//每次显示的页数
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
        if($currentPage>0) $offset=($currentPage-1)*$pageSize;

        $where = "";
        if(isset($_GET['keyword'])){
            $where = "and e.title like '%".$_GET['keyword']."%'";
        }

        $sql = "select f.house_type as fhouse_type,f.create_date as fcreate_date,e.* from fc_esf_user_favorites as f left join fc_esf as e on f.esf_id=e.id where
                f.create_uid='$userid' ".$where." ORDER BY f.create_date desc limit $offset,$pageSize";
        $sqlcount = "select count(*) as count from fc_esf_user_favorites as f left join fc_esf as e on f.esf_id=e.id where
                f.create_uid='$userid'".$where."";
        $collection['house'] = $this->pdo->getAll($sql);
        $count = $this->pdo->getRow($sqlcount);
        $recordCount = $count['count'];
        $page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$pageInfo,5);
        $splitPageStr=$page->get_page_html();

        $collection['pageNation'] = $splitPageStr;

        return $collection;

    }

    //积分管理
    public function Integral_management(){
        $userid = $this->session->userid;;
        $management = array();

        //用户信息
        $sql = "select * from fc_user where id = ".$this->session->userid." and active = 1";
        $management['userinfo'] = $this->pdo->getAll($sql);

        //消费记录
        $sql = "select uc.*,fe.title from fc_esf_user_cons as uc LEFT JOIN fc_esf as fe on uc.esf_id=fe.id where uc.create_uid='$userid' and uc.score = 40";
        $management['consumption'] = $this->pdo->getAll($sql);

        return $management;
    }

    //为你推荐
    public function recommend(){
        $userid = $this->session->userid;
        $recommend = array();

        $pageInfo = "";
        $pageSize = 10;
        $offset = 0;
        $subPages=10;//每次显示的页数
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
        if($currentPage>0) $offset=($currentPage-1)*$pageSize;

        //网站推荐
        $sql = "select * from fc_esf where is_recommend=1 and flag=1 limit $offset,$pageSize";
        $recommend['esf_house'] = $this->pdo->getAll($sql);
        $sql = "select count(*) as count from fc_esf where is_recommend=1 and flag=1";
        $count = $this->pdo->getAll($sql);
        $recordCount = $count[0]['count'];

        $page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$pageInfo,5);
        $splitPageStr=$page->get_page_html();

        $recommend['pageNation'] = $splitPageStr;


        return $recommend;

    }
}

