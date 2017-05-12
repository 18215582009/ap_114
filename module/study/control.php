<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
require 'wkf.php';
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
class study extends control
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
		$this->pdo = $this->study->pdo;
    }

	public function ajaxList(){
		//http://www.school.com/wkf_admin/ajaxList?sort=id&order=desc&offset=0&limit=10&type=1&key=fff
		$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		$order = isset($_GET['order']) ? $_GET['order'] : 'desc';
		$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
		$pageSize = isset($_GET['limit']) ? $_GET['limit'] : 10;
		$search =  isset($_GET['search']) ? $_GET['search'] : '';
		//$this->setCurrentPage($currentPage);
	   	$res = $this->pdo->paginate($pageSize,['*'],1);
		
		$resArray = $res->toArray();
		//print_r($resArray);exit;
		//print_r($resArray);exit;
		/*
		// create a log channel
		$log = new Logger('name');
		$log->pushHandler(new StreamHandler('test.log', Logger::WARNING));
		// add records to the log
		$log->warning($res);
		$log->error('Bars');
		*/

		$list = array(
			'total'=>$resArray->total,
			'rows'=>$resArray->data
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
		//$t = $this->wkf_admin->where('id', '<', 7)->get();
		//print_r($t);
		$wkf = new wkf();
		print_r($wkf::where('id','>',5)->paginate(2));
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
        //$this->assign('header',  $header);
		//$this->display('wkf_admin','wfk_list');
    }

	/* 新增流程 */
    public function addWkf()
    {
		$this->assign('handle',"add");
		if($_GET["action"]=="save"){
			$param = $_POST;
			unset($param["id"]);
			$param["create_uid"]=$_SESSION["uid"];
			$param["create_date"]=time();	
			$param['write_date'] = time();//strtotime($param['write_date']);
			$rlt = $this->pdo->add($param,'wkf');
			if($rlt){
				Util::alert_msg("添加成功!","succeed","/wkf_admin/index.html",3);
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			//初始数据
			$this->assign('Info',$Info);
			$this->assign("back",$_SERVER['HTTP_REFERER']);
			$this->display('wkf_admin','wfk_edit');
		}
    }

	/* 编辑流程 */
	public function editWkf(){
		$this->assign('handle',"edit");
		if($_GET["action"]=="save"){
			$param = $_POST;
			$param["write_uid"]=$_SESSION["uid"];
			$param["write_date"]=time();
			$rlt = $this->pdo->update($param,'wkf','id='.$param['id']);
			if($rlt){
				Util::alert_msg('编辑成功!',"succeed","/wkf_admin/editWkf?id=".$param['id'],3);
			}else{
				Util::alert_msg("编辑失败!","warning","/wkf_admin/editWkf?id=".$param['id'],3);
			}
		}else{
			$id = intval(isset($_GET['id'])?$_GET['id']:0);
			if($id){
				$sql = "select * from wkf where id=".$id;
				//初始数据
				$Info = $this->pdo->getRow($sql);
				$this->assign('Info',$Info);
				$this->assign("back",$_SERVER['HTTP_REFERER']);
				$this->display('wkf_admin','wfk_edit');
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
			$sql = "select * from wkf where id=".$id;
			//初始数据
			$Info = $this->pdo->getRow($sql);
			$this->assign('Info',$Info);
			$this->assign("back",$_SERVER['HTTP_REFERER']);
			$this->display('wkf_admin','wfk_edit');
		}else{
			Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
		}
	}

	/* 删除流程 */
	public function delWkf(){
		$id = intval(isset($_GET['id'])?$_GET['id']:0);
		if($id){
			//判断该任务下是否有经济人todo
			$rlt = $this->pdo->remove("id=".$id,"wx_game");
			if($rlt){
				Util::alert_msg("删除成功!","succeed",$_SERVER['HTTP_REFERER'],3);
			}else{
				Util::alert_msg("删除失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
		}
	}

/************************** 开始 活动节点配置 *************************/
	/* 活动(节点)列表 */
    public function actList()
    {
		$wkf_id = isset($_GET['wkf_id']) ? $_GET['wkf_id'] : '0';
		$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		$order = isset($_GET['order']) ? $_GET['order'] : 'desc';
		$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
		$pageSize = isset($_GET['limit']) ? $_GET['limit'] : 10;
		$search =  isset($_GET['search']) ? $_GET['search'] : '';
		$where = 'where wkf_id={$wkf_id} ';
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
		$list = array(
			'total'=>$total,
			'rows'=>$res
		);
		
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
		/*{"total":12,"rows":[{"id":1,"name":"luodong 1","price":"$1"},{"id":2,"name":"Item 2","price":"$2"}]}
		*/
		echo json_encode($list);exit;
    }

	/* 活动(节点)添加 */
    public function addAct()
    {
		$this->assign('handle',"add");
		if($_GET["action"]=="save"){
			$param = $_POST;
			unset($param["id"]);
			$param["create_uid"]=$_SESSION["uid"];
			$param["create_date"]=time();	
			$param['write_date'] = time();//strtotime($param['write_date']);
			$rlt = $this->pdo->add($param,'wkf');
			if($rlt){
				Util::alert_msg("添加成功!","succeed",$_SERVER['HTTP_REFERER'],3);
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			//初始数据
			$this->assign('Info',$Info);
			$this->assign("back",$_SERVER['HTTP_REFERER']);
			$this->display('wkf_admin','wfk_activity_edit');
		}
	}

	/* 活动(节点)编辑 */
    public function editAct()
    {
		
	}

	/* 活动(节点)查看 */
    public function showAct()
    {
		
	}

	/* 活动(节点)删除 */
    public function delAct()
    {
		
	}

/************************** 开始 活动转换配置 *************************/
	/* 活动(节点)添加 */
    public function addTran()
    {
		$this->assign('handle',"add");
		$act_id = intval(isset($_GET['act_id'])?$_GET['act_id']:0);
		if($_GET["action"]=="save"){
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
			//初始数据
			$this->assign('Info',$Info);
			$this->assign("back",$_SERVER['HTTP_REFERER']);
			$this->display('wkf_admin','wfk_tran_edit');
		}
	}

	/* 活动转换编辑 */
    public function editTran()
    {
		
	}

	/* 活动转换查看 */
    public function showTran()
    {
		
	}

	/* 活动转换删除 */
    public function delTran()
    {
		
	}


}
