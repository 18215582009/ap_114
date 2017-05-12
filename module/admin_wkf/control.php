<?php
//require '../../vendor/autoload.php';
//use Monolog\Logger;
//use Monolog\Handler\StreamHandler;
//use Illuminate\Database\Capsule\Manager as Capsule;
//require 'wkf.php';
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\util\Util as Util;

class admin_wkf extends control
{
	/**
	 * 数据库ORM对象
     * 
     * @var object
     * @access pdo
     */
	protected $pdo;

    /* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
		$this->pdo = $this->admin_wkf->pdo;
    }
	
	/* 获取流程列表 */
	public function ajaxList(){
		//http://www.school.com/admin_wkf/ajaxList?sort=id&order=desc&offset=0&limit=10&type=1&key=fff
		$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		$order = isset($_GET['order']) ? $_GET['order'] : 'desc';
		$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
		$pageSize = isset($_GET['limit']) ? $_GET['limit'] : 10;
		$search =  isset($_GET['search']) ? $_GET['search'] : '';
		$where = 'where 1=1 ';
	   	if(!empty($search)) {
			$where .= " and name like '%".$search."%'";
	    }
	    $select_columns = "select %s from wkf %s %s %s";
	    $order = "order by $sort $order";
	    $limit = "limit $offset,$pageSize";
	    $count = " count(id) as cnt ";
	    $sql   = sprintf($select_columns,'*',$where,$order,$limit);
	    $sqlcnt= sprintf($select_columns,$count,$where,'','');
	   	$res = $this->pdo->getAll($sql);
	   	$count = $this->pdo->getRow($sqlcnt);
		$total = $count['cnt'];
		foreach($res as $key=>$val){
			$res[$key]['opt'] = '<a href="/admin_wkf/editWkf.candor?id='.$val['id'].'">编辑</a>&nbsp;&nbsp;';
			$res[$key]['opt'] .= '<a href="javascript:void(0);" onclick="delWkf('.$val['id'].')">删除</a>';
		}
		$list = array(
			'total'=>$total,
			'rows'=>$res
		);
		/*
		$list = array('total'=>12,
					  'rows'=>array(
								array(
								'id'=>1,
								'name'=>'sItem 1',
								'price'=>'$1'
								),
								array(
								'id'=>2,
								'name'=>'sItem 2',
								'price'=>'$2'
								)
						)
					);
		{"total":12,"rows":[{"id":1,"name":"luodong 1","price":"$1"},{"id":2,"name":"Item 2","price":"$2"}]}
		*/
		echo json_encode($list);exit;
	}
    
    /* 流程列表 */
    public function index()
    {
		/* monolog 日志测试 
		// create a log channel
		$log = new Logger('name');
		$log->pushHandler(new StreamHandler('test.log', Logger::WARNING));

		// add records to the log
		$log->warning('Foos');
		$log->error('Bars');exit;*/

		/* Eloquent ORM测试 */
		// create a log channel
		//$this->app->loadClass('Db');
		//$Db = new Db();
		//$users = Capsule::table('wkf')->where('id', '>', 5)->get();
		//$users = Capsule::table('wkf')->where('name', '婚假申请')->first();
		//$builder = Capsule::table('wkf')->where('name', "婚假申请")->count();
		//$t = $this->admin_wkf->where('id', '<', 7)->get();
		//print_r($t);
		//$wkf = new wkf($this->app->config);
		//print_r($wkf->where('id','>',5)->get());
		/*
		$this->pdo->name = "测试";
		$this->pdo->created_uid = 1;
		$this->pdo->created_at = time();
		$this->pdo->updated_at = time();
		$this->pdo->updated_uid = 1;
		$this->pdo->flag = 1;
        //$pdo->save();
		print_r($this->pdo->save());
		exit;
		*/

		$header['title'] = $this->lang->welcome;
		/*
		$page_info = "";
		$orderField = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		$orderValue = isset($_GET['flag']) ? $_GET['flag'] : 'desc';

		$pageSize = 15;
		$offset = 0;
		$subPages=5;//每次显示的页数
		$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		$where = 'where 1=1 ';
	   	if($_GET) {
			//处理搜索条件
			$app_name = trim(isset($_GET["name"])?$_GET["name"]:"");
			if($app_name!=""){
				$where .= " and name like '%".$app_name."%'";
				$page_info .="name=".$app_name."&";
				$this->assign('name',$app_name);
			}
	    }
	    $select_columns = "select %s from wkf %s %s %s";
	    
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

		$this->assign('list',$res);
		$this->assign('splitPageStr',$splitPageStr);
		*/
        $this->assign('header',  $header);
		$this->display('admin_wkf','wfk_list');
    }

	/* 新增流程 */
    public function addWkf()
    {
		$this->assign('handle',"add");
		$action = isset($_GET["action"])?$_GET["action"]:'add';
		if($action=="save"){
			$param = $_POST;
			unset($param["id"]);
			$param["create_uid"]=$_SESSION["uid"];
			$param["create_date"]=time();	
			$param['write_date'] = time();//strtotime($param['write_date']);
			$param['res_field'] = implode(',',$param['res_field']);
			$rlt = $this->pdo->add($param,'wkf');
			if($rlt){
				Util::alert_msg("添加成功!","succeed","/admin_wkf/index.html",3);
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			//初始数据
			$Info = array();
			$this->assign('Info',$Info);
			$this->assign("back",$_SERVER['HTTP_REFERER']);
			$this->display('admin_wkf','wfk_edit');
		}
    }

	/* 编辑流程 */
	public function editWkf(){
		$this->assign('handle',"edit");
		$action = isset($_GET["action"])?$_GET["action"]:'edit';
		if($action=="save"){
			$param = $_POST;
			$param['res_field'] = implode(',',$param['res_field']);
			$rlt = $this->pdo->update($param,'wkf','id='.$param['id']);
			if($rlt){
				Util::alert_msg('编辑成功!',"succeed","/admin_wkf/editWkf?id=".$param['id'],3);
			}else{
				Util::alert_msg("编辑失败!","warning","/admin_wkf/editWkf?id=".$param['id'],3);
			}
		}else{
			$id = intval(isset($_GET['id'])?$_GET['id']:0);
			if($id){
				//初始数据
				$Info = $this->admin_wkf->findWkf($id);
				$Info['res_fields'] = $this->admin_wkf->getTableFields($Info['res_table']);
				$this->assign('Info',$Info);
				$this->display('admin_wkf','wfk_edit');
			}else{
				Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}
	}

	/* 查看流程 */
	public function showWkf(){
		$this->assign('handle',"show");
		$id = intval(isset($_GET['id'])?$_GET['id']:0);
		if($id){
			//$this->app->loadClass("Form");
			//初始数据
			$Info = $this->admin_wkf->findWkf($id);
			$this->assign('Info',$Info);
			$this->display('admin_wkf','wfk_edit');
		}else{
			Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
		}
	}

	/* 删除流程 */
	public function delWkf(){
		$wkf_id = intval(isset($_GET['wkf_id'])?$_GET['wkf_id']:0);
		if($wkf_id>0){
			$where = 'id='.$wkf_id;
			$rlt = $this->pdo->remove('wkf',$where);
			if($rlt){
				$result = array('success'=>true,'status'=>'1','des'=>'删除成功');
			}else{
				$result = array('success'=>false,'status'=>'2','des'=>'删除失败');
			}
		}else{
			$result = array('success'=>false,'status'=>'3','des'=>'删除失败');
		}
		echo json_encode($result);exit;
	}

/************************** 开始 活动节点配置 *************************/
	/* 活动(节点)列表 */
    public function actList()
    {
		$wkf_id = isset($_GET['wkf_id']) ? $_GET['wkf_id'] : '0';
		$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		$order = isset($_GET['order']) ? $_GET['order'] : 'desc';
		$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
		$pageSize = isset($_GET['limit']) ? $_GET['limit'] : 20;
		$search =  isset($_GET['search']) ? $_GET['search'] : '';
		$where = 'where wkf_id='.$wkf_id.' ';
	   	if(!empty($search)) {
			$where .= " and name like '%".$search."%'";
	    }
	    $select_columns = "select %s from wkf_activity %s %s %s";
	    $order = "order by $sort $order";
	    $limit = "limit $offset,$pageSize";
	    $count = " count(id) as cnt ";
	    $sql   = sprintf($select_columns,'*',$where,$order,$limit);
	    $sqlcnt= sprintf($select_columns,$count,$where,'','');
	   	$res = $this->pdo->getAll($sql);
	   	$count = $this->pdo->getRow($sqlcnt);
		$total = $count['cnt'];
		foreach($res as $key=>$val){
			$res[$key]['type'] = $this->config->wkf['type'][$val['type']];
			$res[$key]['start'] ='-';
			$res[$key]['end'] = '-';
			if($val['type']==2){
				$res[$key]['start'] = '是';
			}
			if($val['type']==3){
				$res[$key]['end'] = '是';
			}
			$res[$key]['delete'] = '<a href="javascript:void(0);" onclick="delAct('.$val['id'].')">删除</a>';
		}
		$list = array(
			'total'=>$total,
			'rows'=>$res
		);
		echo json_encode($list);exit;
    }

	/* 活动(节点)添加 */
    public function addAct()
    {
		$this->assign('handle',"add");
		$this->assign('phandle',isset($_GET['phandle'])?$_GET['phandle']:'');
		$action = isset($_GET["action"])?$_GET["action"]:'add';
		if($action=="save"){
			$param = $_POST;
			unset($param["id"]);
			//print_r($param);exit;
			$rlt = $this->pdo->add($param,'wkf_activity');
			if($rlt){
				Util::alert_msg("添加成功!","succeed",$_SERVER['HTTP_REFERER'],3);
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			//初始数据
			$Info = $this->admin_wkf->getTableMode('wkf_activity');
			$Info['wkf_id'] = $_GET['wkf_id'];
			$this->assign('Info',$Info);
			$this->display('admin_wkf','wfk_activity_edit');
		}
	}

	/* 活动(节点)编辑 */
    public function editAct()
    {
		$this->assign('handle',"edit");
		$this->assign('phandle',isset($_GET['phandle'])?$_GET['phandle']:'');
		$action = isset($_GET["action"])?$_GET["action"]:'edit';
		if($action=="save"){
			$param = $_POST;
			$rlt = $this->pdo->update($param,'wkf_activity','id='.$param['id']);
			if($rlt){
				Util::alert_msg("编辑成功!","succeed",$_SERVER['HTTP_REFERER'],3);
			}else{
				Util::alert_msg("编辑失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			$id = intval(isset($_GET['id'])?$_GET['id']:0);
			if($id){
				//初始数据
				$Info = $this->admin_wkf->findAct($id);
				$this->assign('Info',$Info);
				$this->display('admin_wkf','wfk_activity_edit');
			}else{
				Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}
	}

	/* 活动(节点)查看 */
    public function showAct()
    {
		$this->assign('handle',"show");
		$this->assign('phandle',isset($_GET['phandle'])?$_GET['phandle']:'');
		$id = intval(isset($_GET['id'])?$_GET['id']:0);
		if($id){
			//初始数据
			$Info = $this->admin_wkf->findAct($id);
			$this->assign('Info',$Info);
			$this->display('admin_wkf','wfk_activity_edit');
		}else{
			Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
		}
	}

	/* 活动(节点)删除 */
    public function delAct()
    {
		$act_id = isset($_GET['act_id'])?$_GET['act_id']:0;
		if($act_id>0){
			$where = 'id='.$act_id;
			$rlt = $this->pdo->remove('wkf_activity',$where);
			if($rlt){
				$result = array('success'=>true,'status'=>'1','des'=>'删除成功');
			}else{
				$result = array('success'=>false,'status'=>'2','des'=>'删除失败');
			}
		}else{
			$result = array('success'=>false,'status'=>'3','des'=>'删除失败');
		}
		echo json_encode($result);exit;
	}

/************************** 开始 活动转换配置 *************************/
	/* 活动转换添加 */
    public function addTran()
    {
		$this->assign('handle',"add");
		$action = isset($_GET["action"])?$_GET["action"]:'add';
		if($action=="save"){
			$param = $_POST;
			unset($param["id"]);
			$param["create_uid"]=$_SESSION["uid"];
			$param["create_date"]=time();	
			$param['write_date'] = time();//strtotime($param['write_date']);
			$rlt = $this->pdo->add($param,'wkf_transition');
			if($rlt){
				Util::alert_msg("添加成功!","succeed",$_SERVER['HTTP_REFERER'],3);
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			$type = isset($_GET['type'])?$_GET['type']:'';
			$act_id = intval(isset($_GET['act_id'])?$_GET['act_id']:0);
			//获取当前活动节点信息
			$actInfo = $this->admin_wkf->findAct($act_id);
			$wkf_id = $actInfo['wkf_id'];
			//初始数据
			$Info = $this->admin_wkf->getTableMode('wkf_transition');
			//获取当前流程的活动节点
			$actList = $this->admin_wkf->getActList($wkf_id);
			foreach($actList as $key=>$val){
				$Info['actlist'][$val['id']] = $val['name'];
			}
			//获取当前流程信息
			$wkfInfo = $this->admin_wkf->findWkf($wkf_id);
			$Info['tranState'] = explode(',',$wkfInfo['res_field']);

			$Info['act_id'] = $act_id;
			$Info['wkf_id'] = $wkf_id;

			//判断为添加来源或是目的转换
			if($type=='join'){
				$Info['act_to'] = $act_id;
			}else{
				$Info['act_from'] = $act_id;
			}
			
			//获取业务表业务字段
			$this->assign('Info',$Info);
			$this->assign('type',$type);
			$this->assign("back",$_SERVER['HTTP_REFERER']);
			$this->display('admin_wkf','wfk_tran_edit');
		}
	}

	/* 活动转换编辑 */
    public function editTran()
    {
		$this->assign('handle',"edit");
		$this->assign('phandle',isset($_GET['phandle'])?$_GET['phandle']:'');
		$tran_id = intval(isset($_GET['id'])?$_GET['id']:0);
		$action = isset($_GET["action"])?$_GET["action"]:'edit';
		if($action=="save"){
			$param = $_POST;
			$rlt = $this->pdo->update($param,'wkf_transition','id='.$param['id']);
			if($rlt){
				Util::alert_msg("编辑成功!","succeed",$_SERVER['HTTP_REFERER'],3);
			}else{
				Util::alert_msg("编辑失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
			
		}else{
			//初始数据-获取转换信息
			$Info = $this->admin_wkf->findTran($tran_id);
			$wkf_id = $Info['wkf_id'];

			//获取当前流程的活动节点
			$actList = $this->admin_wkf->getActList($wkf_id);
			foreach($actList as $key=>$val){
				$Info['actlist'][$val['id']] = $val['name'];
			}
			//获取当前流程信息
			$wkfInfo = $this->admin_wkf->findWkf($wkf_id);
			$Info['tranState'] = explode(',',$wkfInfo['res_field']);

			//获取业务表业务字段
			$this->assign('Info',$Info);
			$this->assign("back",$_SERVER['HTTP_REFERER']);
			$this->display('admin_wkf','wfk_tran_edit');
		}
	}

	/* 活动转换查看 */
    public function showTran()
    {
		$this->assign('handle',"show");
		$this->assign('phandle',isset($_GET['phandle'])?$_GET['phandle']:'');
		$tran_id = intval(isset($_GET['id'])?$_GET['id']:0);
		if($tran_id){
			//初始数据-获取转换信息
			$Info = $this->admin_wkf->findTran($tran_id);
			$wkf_id = $Info['wkf_id'];

			//获取当前流程的活动节点
			$actList = $this->admin_wkf->getActList($wkf_id);
			foreach($actList as $key=>$val){
				$Info['actlist'][$val['id']] = $val['name'];
			}
			//获取当前流程信息
			$wkfInfo = $this->admin_wkf->findWkf($wkf_id);
			$Info['tranState'] = explode(',',$wkfInfo['res_field']);

			//获取业务表业务字段
			$this->assign('Info',$Info);
			$this->assign("back",$_SERVER['HTTP_REFERER']);
			$this->display('admin_wkf','wfk_tran_edit');
		}
	}

	/* 活动转换删除 */
    public function delTran()
    {
		$tran_id = isset($_GET['tran_id'])?$_GET['tran_id']:0;
		if($tran_id>0){
			$where = 'id='.$tran_id;
			$rlt = $this->pdo->remove('wkf_transition',$where);
			if($rlt){
				$result = array('success'=>true,'status'=>'1','des'=>'删除成功');
			}else{
				$result = array('success'=>false,'status'=>'2','des'=>'删除失败');
			}
		}else{
			$result = array('success'=>false,'status'=>'3','des'=>'删除失败');
		}
		echo json_encode($result);exit;
	}

	/* 活动来源或目的节点列表 */
    public function tranFromToList()
    {
		$wkf_id = isset($_GET['wkf_id']) ? $_GET['wkf_id'] : '0';
		$act_id = isset($_GET['act_id']) ? $_GET['act_id'] : '0';
		$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		$order = isset($_GET['order']) ? $_GET['order'] : 'desc';
		$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
		$pageSize = isset($_GET['limit']) ? $_GET['limit'] : 20;
		$type =  isset($_GET['type']) ? $_GET['type'] : 'join';
		$where = 'where wkf_id='.$wkf_id.' ';
	   	if($type=='join') {
			$where .= " and act_to=".$act_id;
	    }else{
			$where .= " and act_from=".$act_id;
		}
	    $select_columns = "select %s from wkf_transition %s %s %s";
	    $order = "order by $sort $order";
	    $limit = "limit $offset,$pageSize";
	    $count = " count(id) as cnt ";
	    $sql   = sprintf($select_columns,'*',$where,$order,$limit);
	    $sqlcnt= sprintf($select_columns,$count,$where,'','');
	   	$res = $this->pdo->getAll($sql);
	   	$count = $this->pdo->getRow($sqlcnt);
		$total = $count['cnt'];
		foreach($res as $key=>$val){
			$actFrom = $this->admin_wkf->findAct($val['act_from']);
			$res[$key]['act_from_name'] = $actFrom['name'];

			$actTo = $this->admin_wkf->findAct($val['act_to']);
			$res[$key]['act_to_name'] = $actTo['name'];

			$res[$key]['delete_from'] = '<a href="javascript:void(0);" onclick="delTran(\'join\','.$val['id'].')">删除</a>';
			$res[$key]['delete_to'] = '<a href="javascript:void(0);" onclick="delTran(\'split\','.$val['id'].')">删除</a>';
		}
		$list = array(
			'total'=>$total,
			'rows'=>$res
		);
		echo json_encode($list);exit;
    }

	/************************* 公共方法 ***********************/
	public function ajaxTableFields(){
		$table_name = isset($_GET['table_name'])?$_GET['table_name']:'';
		$tableFields = $this->admin_wkf->getTableFields($table_name);
		echo json_encode($tableFields);exit;
	}
}
