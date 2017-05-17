<?php
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\BaseCode as BaseCode;
use lib\util\Util as Util;
use lib\util\UploadFile as UploadFile;
use lib\pager\pager_page as pager_page;

class fc_project_reserve extends SecuredControl
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
		$this->pdo = $this->fc_project_reserve->pdo;
    }

	/* index方法，也是默认的方法。 */
    public function index()
    {
		$name = trim(isset($_GET["name"])?$_GET["name"]:"");
		$page_info = "";
		$orderField = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		$orderValue = isset($_GET['flag']) ? $_GET['flag'] : 'desc';

		$pageSize = 15;
		$offset = 0;
		$subPages=5;//每次显示的页数
		$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		$where = 'where 1=1 ';
	    if($_SERVER['REQUEST_METHOD']=="POST"){
	    	$param = $_POST;
	    	if(!empty($param['reserve_type']) && !empty($param['reserve_subtype']) && !empty($param['start_time']) && !empty($param['end_time']) && !empty($param['tel_name'])){
	    		$where .="and type = ".$param['reserve_type']." and subtype = ".$param['reserve_subtype']." and create_date >=".$param['start_time']." and create_date<= ".$param['end_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' ";
	    		$page_info .="and type = ".$param['reserve_type']." and subtype = ".$param['reserve_subtype']." and create_date >=".$param['start_time']." and create_date<= ".$param['end_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' &";
	    	}else if(!empty($param['reserve_type']) && !empty($param['reserve_subtype']) && !empty($param['start_time']) && !empty($param['end_time'])){
	    		$where .="and type = ".$param['reserve_type']." and subtype = ".$param['reserve_subtype']." and create_date >=".$param['start_time']." and create_date<= ".$param['end_time']." ";
	    		$page_info .="and type = ".$param['reserve_type']." and subtype = ".$param['reserve_subtype']." and create_date >=".$param['start_time']." and create_date<= ".$param['end_time']."&";

	    	}else if(!empty($param['reserve_type']) && !empty($param['reserve_subtype']) && !empty($param['start_time']) && !empty($param['tel_name'])){
	    		$where .="and type = ".$param['reserve_type']." and subtype = ".$param['reserve_subtype']." and create_date >=".$param['start_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' ";
	    		$page_info .="and type = ".$param['reserve_type']." and subtype = ".$param['reserve_subtype']." and create_date >=".$param['start_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' &";

	    	}else if(!empty($param['reserve_type']) && !empty($param['reserve_subtype']) && !empty($param['end_time']) && !empty($param['tel_name'])){
	    		$where .="and type = ".$param['reserve_type']." and subtype = ".$param['reserve_subtype']."  and create_date<= ".$param['end_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' ";
	    		$page_info .="and type = ".$param['reserve_type']." and subtype = ".$param['reserve_subtype']." and create_date<= ".$param['end_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' &";

	    	}else if(!empty($param['reserve_type']) && !empty($param['start_time']) && !empty($param['end_time']) && !empty($param['tel_name'])){
	    		$where .="and type = ".$param['reserve_type']." and create_date >=".$param['start_time']." and create_date<= ".$param['end_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' ";
	    		$page_info .="and type = ".$param['reserve_type']."  and create_date >=".$param['start_time']." and create_date<= ".$param['end_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' &";
	    	}else if(empty($param['reserve_type'])  && !empty($param['start_time']) && !empty($param['tel_name'])){
	    		$where .="and type = ".$param['reserve_type']."  and create_date >=".$param['start_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' ";
	    		$page_info .="and type = ".$param['reserve_type']."  and create_date >=".$param['start_time']."  and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' &";

			}else if(!empty($param['reserve_type']) && !empty($param['end_time']) && !empty($param['tel_name'])){
				$where .="and type = ".$param['reserve_type']."  and create_date<= ".$param['end_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' ";
	    		$page_info .="and type = ".$param['reserve_type']."  and create_date<= ".$param['end_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' &";

			}else if( !empty($param['start_time']) && !empty($param['end_time']) && !empty($param['tel_name'])){
				$where .="and create_date >=".$param['start_time']." and create_date<= ".$param['end_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' ";
	    		$page_info .=" and create_date >=".$param['start_time']." and create_date<= ".$param['end_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' &";

			}else if(!empty($param['reserve_type']) && !empty($param['start_time']) ){
				$where .="and type = ".$param['reserve_type']." and create_date >=".$param['start_time']." ";
	    		$page_info .="and type = ".$param['reserve_type']."  and create_date >=".$param['start_time']." &";

			}else if(!empty($param['reserve_type']) && !empty($param['end_time']) ){
				$where .="and type = ".$param['reserve_type']." and create_date <=".$param['end_time']." ";
	    		$page_info .="and type = ".$param['reserve_type']."  and create_date <=".$param['end_time']." &";

			}else if(!empty($param['reserve_type']) && !empty($param['tel_name'])){
				$where .="and type =".$param['reserve_type']."  and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' ";
	    		$page_info .=" and type =".$param['reserve_type']."  and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' &";

			}else if(!empty($param['start_time']) && !empty($param['tel_name'])){
				$where .=" and create_date >=".$param['start_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' ";
	    		$page_info .=" and create_date >=".$param['start_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' &";

			}else if(!empty($param['end_time']) && !empty($param['tel_name'])){

				$where .=" and create_date <=".$param['end_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' ";
	    		$page_info .=" and create_date <=".$param['end_time']." and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' &";
			}else if(!empty($param['reserve_type']) && !empty($param['reserve_subtype'])){

				$where .="and type = ".$param['reserve_type']." and subtype = ".$param['reserve_subtype']." ";
	    		$page_info .="and type = ".$param['reserve_type']." and subtype = ".$param['reserve_subtype']." &";

			}else if(!empty($param['reserve_type'])){
				$where .="and type = ".$param['reserve_type']." ";
	    		$page_info .="and type = ".$param['reserve_type']." &";

			}else if(!empty($param['start_time'])){
				$where .="and create_date >= ".$param['start_time']." ";
	    		$page_info .="and create_date >= ".$param['start_time']." &";
			}else if(!empty($param['end_time'])){
				$where .="and create_date <= ".$param['end_time']." ";
	    		$page_info .="and create_date <= ".$param['end_time']." &";
			}else {
				$where .="  and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' ";
	    		$page_info .="  and name like '%".$param['tel_name']."%' or create_uid like '%".$param['tel_name']."%' &";
			}
		}
	    $select_columns = "select %s from fc_project_reserve %s %s %s";
	    $order = "order by $orderField $orderValue";
	    $limit = "limit $offset,$pageSize";
	    $count = " count(id) as count ";
	    $sql = sprintf($select_columns,'*',$where,$order,$limit);
	    $sqlcount = sprintf($select_columns,$count,$where,'','');
	   	$res = $this->pdo->getAll($sql);
	   	$Count = $this->pdo->getRow($sqlcount);
		$recordCount = $Count['count'];
		$page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$page_info,4);
		$splitPageStr=$page->get_page_html();
		$this->assign('name',$name);
		$this->assign('list',$res);


		//print_r($res);exit;
		$this->assign('splitPageStr',$splitPageStr);
        $this->assign('header',  '项目管理');
        $this->display('fc_project_reserve','list');
    }

	/* 新增项目 */
    public function add()
    {
		$this->assign('handle',"add");
		$this->assign('header',  '新增项目');
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			/*
			foreach ($param["pm_type"] as $v){
				$param["pm_type"] .= $v.','; 
			}
			*/
			unset($param["id"]);
			$rlt = $this->pdo->add($param,'fc_project');
			if($rlt){
				Util::alert_msg("添加成功!","succeed","/fc_project/index.html",3);
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			//初始数据
			$Info = $this->fc_project->getTableMode('fc_project');
			// 基础代码
			$code = new BaseCode();
			$region_option=$code->getPairBaseCodeByType(224);//新房片区
			$this->assign('region_option',$region_option);
			$this->assign('Info',$Info);
			$this->display('fc_project','edit');
		}
    }




	/* 编辑项目 */
	public function edit(){
		$this->assign('handle',"edit");
		$this->assign('header',  '编辑项目');
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			$id = isset($param['id'])?$param['id']:0;
			if($id>0){
				$rlt = $this->pdo->update($param,'fc_project_reserve','id='.$id);
				if($rlt){
					Util::alert_msg('编辑成功!',"succeed","/fc_project_reserve/index.html",3);
				}else{
					Util::alert_msg("编辑失败!","warning",$_SERVER['HTTP_REFERER'],3);
				}
			}else{
				Util::alert_msg("非法数据!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			$id = intval(isset($_GET['project_id'])?$_GET['project_id']:0);
			if($id){
				$sql = "select * from fc_project_reserve where id=".$id;
				//初始数据
				$Info = $this->pdo->getRow($sql);
				$this->assign('Info',$Info);
				$this->assign('tab',$this->fc_project_reserve->tabbar('base',$id));
				$this->display('fc_project_reserve','edit');
			}else{
				Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}
	}


	/* 删除项目 */
	public function del(){
		$id = intval(isset($_GET['id'])?$_GET['id']:0);
		if($id){
			//判断该项目下是否有经济人todo
			$rlt = $this->pdo->remove("fc_project","id=".$id);
			if($rlt){
				Util::alert_msg("删除成功!","succeed",$_SERVER['HTTP_REFERER'],3);
			}else{
				Util::alert_msg("删除失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
		}
	}

   
	

}
?>