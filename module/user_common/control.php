<?php
/**
 * The control file of admin_entry module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\util\Util as Util;
use lib\pager\pager_page as pager_page;

class user_common extends SecuredControl
{
	/**
	 * 数据库连接。
     * 
     * @var object
     * @access pdo
     */
	 protected $pdo;

    /* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
		$this->pdo = $this->user_common->pdo;
    }

    /* 个人收藏 */
	public function fav(){
        $collection = $this->user_common->personal_collection();
        $this->assign('house',$collection['house']);
        $this->assign('pageNation',$collection['pageNation']);
		$this->assign('menu',array());
        $this->display('user_common','fav');
    }
    //删除收藏
    public function delete(){
        $userid = $this->session->userid;
        $esf_id = $_POST['houseid'];
        $sql = "DELETE FROM fc_esf_user_favorites where create_uid='$userid' AND esf_id='$esf_id'";
        $delete = $this->pdo->getAll($sql);
        echo 1;
    }

    /* 看房记录 */
    public function cons(){
        $page_info = '';
        $pageSize = 15;
        $offset = 0;
        $subPages=5;//每次显示的页数
        $currentPage = isset($_GET['p']) ? (int)$_GET['p'] : 0;
        if($currentPage>0) $offset=($currentPage-1)*$pageSize;
        $where = ' where 1 ';
        if(isset($_GET)){
            @extract($_GET);
            if(!empty($starttime)){
                $time = strtotime($starttime);
                $where .= " and uc.create_date >= '{$time}' ";
                $page_info .= "uc.start={$starttime}&";
            }
            if(!empty($endtime)){
                $time = strtotime($endtime);
                $where .= " and uc.create_date <= '{$time}' ";
                $page_info .= "end={$endtime}&";
            }
        }
        $sql = " select uc.*,e.id,e.title,e.house_type,e.price,e.linkman,e.telphone,e.link_require,e.flag,e.total_area,e.shi,e.ting,e.wei
                from fc_esf_user_cons as uc left join fc_esf as e on e.id = uc.esf_id
			".$where." and uc.create_uid = '".$this->session->userid."' AND score=0 group by uc.id order by uc.create_date desc";
        $limit = " limit $offset,$pageSize ";
        $res = $this->pdo->getAll($sql.$limit);
        $count = $this->pdo->getRow(" select count(distinct uc.id) as count  from  fc_esf_user_cons as uc
			left join fc_esf as e on e.id = uc.esf_id
			".$where." and uc.create_uid = '".$this->session->userid."'   ");

        $page=new pager_page($pageSize,$count['count'],$currentPage,$subPages,"?action=cons&".$page_info."p=",3);
        $splitPageStr=$page->get_page_html();
        foreach($res as $key=>$val){
            //$res[$key]['hx'] = getFitment($val['id']);
            $res[$key]['link_require'] = preg_replace("/(\s|( )+|\xc2\xa0)/","&nbsp;",$val['link_require']);
        }
        //以获取房东信息的房源
        $sql = "select * from fc_esf_user_cons where create_uid = '".$this->session->userid."' and score = 40 ";
        $landlord = $this->pdo->getAll($sql);

        $esfidKey = array();
        foreach ($landlord as $item){
            $esfidKey[] = $item['esf_id'];
        }
        $esfidstr=implode(",",$esfidKey);

        $this->assign('esfidstr',$esfidstr);
        $this->assign('splitPageStr', $splitPageStr);
        $this->assign('pagesize',$pageSize);
        $this->assign('num',$count['count']);
        $this->assign('res',$res);

        $this->assign('menu',array());
        $this->display('user_common','cons');
    }

    /* 积分管理 */
    public function score(){
        $this->assign('menu',array());
        $management = $this->user_common->Integral_management();
        $this->assign('consumption',$management['consumption']);
        $this->assign('userinfo',$management['userinfo']);
        $this->display('user_common','score');
    }

    /* 为您推荐 */
    public function rec(){
        $header['title'] = $this->lang->welcome;
        $header['title'] = $this->config->app_name;

        $recommend = $this->user_common->recommend();
        $this->assign('esf_house',$recommend['esf_house']);
        $this->assign('pageNation',$recommend['pageNation']);
        $this->assign('menu',array());
        $this->assign('header',  $header);
        $this->display('user_common','rec');
    }

}

