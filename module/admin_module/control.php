<?php
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use util\Util as Util;
use lib\pager\pager_page as pager_page;

class admin_module extends SecuredControl
{
	/**
	 * 数据库连接。
     * 
     * @var object
     * @access pdo
     */
	protected $pdo;
	private $tree = '';
	
    /* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
		$this->pdo = $this->admin_module->pdo;
    }

    /* index方法，也是默认的方法。*/
    public function index()
    {
		//print_r($this->app->config->project->category);
		//echo "您没有权限，请找系统管理员";exit;
		$moduleList = $this->pdo->getAll("select * from sys_module");
		$icons = $this->admin_module->getFileList($this->app->getAppRoot()."www\images\app_icons");

		$header['title'] = "创建模块";
        $this->assign('header',  $header);
		$this->assign('mList',$moduleList);
        $this->assign('icons',$icons);
		$this->display('admin_module','index');
    }

	/*--------------------------应用模块 方法--------------------------------*/
	
	/**
	* 应用系统管理
	* @access public 
	* @param 
	* @return string
	*/
	public function module(){
		$this->display('admin_module','module');
	}
	
	/**
	* 项目管理
	* @access public 
	* @param 
	* @return string
	*/
	public function projectList(){
		$page_info = "";
		$orderField = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		$orderValue = isset($_GET['flag']) ? $_GET['flag'] : 'desc';

		$pageSize = 10;
		$offset = 0;
		$subPages=0;//每次显示的页数
		$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		$where = 'where is_admin=0 ';
	   	if($_GET) {
			//处理搜索条件
	    }

	    $select_columns = "select %s from sys_project %s %s";
	    $order = "order by $orderField $orderValue";
	    $sql = sprintf($select_columns,'*',$where,$order);
		$res = $this->pdo->selectLimit($sql, $pageSize, $offset);
		foreach($res as $key=>$item){
			//判断该项目模块是否存在子模块
			$sql = "select count(id) as cnt from sys_module where project_code='".$item['project_code']."'";
			$rlt = $this->pdo->getRow($sql);
			$res[$key]['cnt'] = isset($rlt['cnt'])?$rlt['cnt']:0;
		}
		$recordCount = $this->pdo->getCount();
	    $page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$page_info,2);
		$splitPageStr=$page->get_page_html();
		
		$header['title'] = "模块管理";
        $this->assign('header',  $header);
		$this->assign('page_html',$splitPageStr);
        $this->assign('mList',$res);
		$this->display('admin_module','projectList');
	}
	
	public function addProject(){
		$action = isset($_POST['action'])?$_POST['action']:'add';
		if($action=='add'){
			$projectCodeList = array('100','101','102','103','104','105','106','107','108','109','110','900');
			//$projectCodeList = $this->app->config->project->category;
			//过滤已经声明过的项目
			$res = $this->pdo->getAll('select * from sys_project');
			foreach($res as $key=>$item){
				if (array_key_exists($item['project_code'], $projectCodeList)) {
					unset($projectCodeList[$item['project_code']]);
				}
			}

			$effProjectCodeList = array();
			//获取项目信息
			$sql = "SELECT * FROM sys_project";
			$project = $this->pdo->getAll($sql);
			foreach($project as $key=>$item){
				array_push($effProjectCodeList, $item['project_code']);
			}
			$resultCodeList = array_diff($projectCodeList, $effProjectCodeList);
			$this->assign('resultCodeList',$resultCodeList);

			$icons = $this->admin_module->getFileList($this->app->getAppRoot()."www\images\app_icons");
			$header['title'] = "添加项目";
            $this->assign('header',  $header);
			$this->assign('icons',$icons);
			$this->assign('action','insert');
			$this->display('admin_module','projectAdd');
		}else{
			$result = $this->admin_module->saveProject($_POST);
			if($result){
				Util::alert_msg('新建项目成功!','succeed','/admin/editProject?pid='.$result.'&reload=leftFrame',1);
			}else{
				Util::alert_msg('新建项目失败!','error','/admin/addProject?action=add',100);
			}
		}
	}

	public function editProject(){
		$action = isset($_POST['action'])?$_GET['action']:'edit';
		if($action=='edit'){
			$pid = intval(isset($_GET["pid"])?$_GET["pid"]:0);
			if($pid>0){
				$sql = "select * from sys_project where id=".$pid;
				$project = $this->pdo->getRow($sql);

				$icons = $this->admin_module->getFileList($this->app->getAppRoot()."www\images\app_icons");
				$this->assign('icons',$icons);

				$this->assign('action','update');
				$this->assign('project',$project);
				$this->display('admin_module','projectAdd');
			}else{
				Util::alert_msg('项目信息不存在','warning','/admin/addProject?action=add',3);
			}
		}else{
			$result = $this->admin_module->saveProject($_POST);
			if($result){
				Util::alert_msg('修改项目成功!','succeed','/admin/editProject?pid='.$_POST['pid'].'&reload=leftFrame',1);
			}else{
				Util::alert_msg('修改项目失败!','error','/admin/editProject?pid='.$_POST['pid'],100);
			}
		}
	}

	public function delProject(){
		$pid = intval(isset($_GET["pid"])?$_GET["pid"]:0);
		if($pid){
			$rlt = $this->pdo->remove("sys_project","id=".$pid);/* notic */
			if($rlt){
				Util::alert_msg('删除成功!','succeed','/admin/projectList.candor',1);
			}
		}else{
			Util::alert_msg('非法操作!','error','/admin/projectList.candor',100);
		}
	}
	      
	/**
	* 添加应用系统模块
	* @access public 
	* @param 
	* @return string
	*/
	public function moduleFun(){
		$mid = intval(isset($_GET["mid"])?$_GET["mid"]:0);
		if($mid>0){
			$sql = "select * from sys_module where id=".$mid;
			$res = $this->pdo->getRow($sql);
			//获取父级分类信息
			if($res['parent_module']>0){
				$sql = "select * from sys_module where id=".$res['parent_module'];
				$pmodule = $this->pdo->getRow($sql);
				$res['parent_module_name'] = $pmodule['business_name'];
			}else{
				$res['parent_module_name'] = "";
			}
			$this->assign('module',$res);

			//该模块下的public方法
			if(!empty($res["module_name"])){
				$classInfo = $this->admin_module->getClassAllMethods($res["module_name"]);
				//print_r($classInfo);
				//var_dump($methods);
			}
			unset($classInfo['methods'][0]);
			$methods = $classInfo['methods'];

			//查询该模块下的所有方法
			$sql_method="select id,method_name,method from sys_method where module_id=".$mid;
			$rs_method=$this->pdo->getAll($sql_method);
			$this->assign('methodname',$rs_method);

			preg_match_all('|public\s(.*)\s(.*)\s|U',$classInfo['doc'], $fundoc);  //过滤方法
			foreach($methods as $mkey=>$mitem){
				foreach($fundoc[1] as $fkey=>$fitem){
					if($mitem['name']== $fitem){
						$methods[$mkey]['doc'] = $fundoc[2][$fkey];
					}
				}
				$t=0;
				foreach($rs_method as $v1){
					if($v1['method']==$mitem['name']){
						$t=$v1["id"];
						break;
					}
				}
				$methods[$mkey]['method_id']=$t;

				unset($mitem['is_ext']);
				//判断该方法是否打入权限
				$sql = "select id from sys_method where module='".$mitem['class']."' and method='".$mitem['name']."'";
				$isExt = $this->pdo->getRow($sql);
				if($isExt){
					$methods[$mkey]['is_ext'] = '1';
				}else{
					$methods[$mkey]['is_ext'] = '0';
				}
				//过滤SecuredControl中的方法
				if($mitem['name']=='rolearray' || $mitem['name']=='accessControl'){
					unset($methods[$mkey]);
				}
			}


			// print_r($methods);
			
			$this->assign('methods',$methods);
			$this->display('admin_module','moduleFun');
		}else{
			Util::alert_msg('模块信息不存在','warning','/admin/addModule',3);
		}
	}

	/**
	* 添加应用系统模块
	* @access public 
	* @param 
	* @return string
	*/
	public function editModule()
	{
		$mid = intval(isset($_GET["mid"])?$_GET["mid"]:0);
		$parent_module =  isset($_GET["parent_module"])?$_GET["parent_module"]:'0';
		if($mid>0){
			//获取项目信息
			$sql = "SELECT * FROM sys_project where is_admin=0";
			$project = $this->pdo->getAll($sql);
			//print_r($project);
			$sql = "select * from sys_module where id=".$mid;
			$res = $this->pdo->getRow($sql);

			$icons = $this->admin_module->getFileList($this->app->getAppRoot()."www\images\app_icons");
			$this->assign('icons',$icons);

			//处理模块名称
			$moduleName = explode('_',$res['module_name']);
			$res['module_name'] = $moduleName[1];

			//获取该模块所属项目下的分类
			$sql = "select * from sys_module where project_code='".$res['project_code']."' and module_type=1";
			$category = $this->pdo->getAll($sql);
			$this->assign('category',$category);
			
			$this->assign('parent_module',$parent_module);
			$this->assign('action','edit');
			$this->assign('project',$project);
			$this->assign('module',$res);
			$this->display('admin_module','moduleAdd');
		}else{
			Util::alert_msg('模块信息不存在','warning','/admin/addModule',3);
		}
	}

	/**
	* 添加应用系统模块
	* @access public 
	* @param 
	* @return string
	*/
	public function addModule(){
// 		echo 99;
// 		$t=new DbPdo($this->config->dbdb2);
// 		$sql = "select  * from sys_module";
// 			// $sql = "select  * from res_users";
// 		// $sql = "select * from system.cymodule";
// 		$t1 = $t->getRow($sql);
// print_r($t1);
		$projectcode = isset($_GET['projectcode'])?$_GET['projectcode']:'0';
		$parent_module =  isset($_GET["parent_module"])?$_GET["parent_module"]:'0';
		//获取项目信息
		$sql = "SELECT * FROM sys_project where is_admin=0";
		$project = $this->pdo->getAll($sql);
		$this->assign('project',$project);

		//获取项目前缀
		$res['module_prefix'] = "";
		foreach($project as $key=>$item){
			if($item['project_code']==$projectcode){
				$res['module_prefix'] = $item['project_prefix'];
			} 
		}
		
		$moduleList = $this->pdo->getAll("select * from sys_module");
		$icons = $this->admin_module->getFileList($this->app->getAppRoot()."www\images\app_icons");

		//获取该模块所属项目下的分类
		$sql = "select * from sys_module where project_code='".$projectcode."' and module_type=1";
		$category = $this->pdo->getAll($sql);
		$this->assign('category',$category);
		
		$header['title'] = "添加模块";
        $this->assign('header',  $header);
		$this->assign('parent_module',$parent_module);
		$this->assign('projectcode',$projectcode);
		$this->assign('module',$res);
		$this->assign('action','add');
        $this->assign('icons',$icons);
		$this->display('admin_module','moduleAdd');
	}

	/**
	* 添加应用系统模块
	* @access private 
	* @param 
	* @return string
	*/
	public function saveModule(){
		//Util::alert_msg('ddfdf','error','/|sdfsdfsdf',0,'/|dsfsdfsdfsdf');
		//Util::alert_msg($msg='sdfdf',$type=true,$url=$_SERVER['HTTP_REFERER'] ,$lock=true,$time='3000');

		$data = $_POST;//print_r($data);exit;
		if(!isset($_POST['business_name']) || trim($_POST['business_name'])==''){
			echo '业务名称不能为空！';exit;
		}else{
			$data['business_name']=trim($_POST['business_name']);
		}
		
		if(!isset($_POST['module_prefix']) || trim($_POST['module_prefix'])==''){
			echo 'module_prefix文件名不能为空！';exit;
		}else{
			$data['module_prefix']=trim($_POST['module_prefix']);
		}

		if(!isset($_POST['module_name']) || trim($_POST['module_name'])==''){
			echo 'module文件名不能为空！';exit;
		}else{
			$data['module_name']=trim($_POST['module_prefix']).trim($_POST['module_name']);
		}

		if(!isset($_POST['project_code']) || trim($_POST['project_code'])==''){
			echo '项目名称不能为空！';exit;
		}else{
			//获取对应父级模块的信息、
			$pmoudle = $this->pdo->getRow("select * from sys_project where project_code='".$_POST['project_code']."'");
			$data['project_name']=trim($pmoudle['project_name']);
			$data['project_code']=trim($pmoudle['project_code']);
		}
		if(!isset($_POST['developer']) || trim($_POST['developer'])==''){
			echo '开发者不能为空！';exit;
		}else{
			$data['developer']=trim($_POST['developer']);
		}
		if(!isset($_POST['describe']) || trim($_POST['describe'])==''){
			echo '模块功能描述不能为空！';exit;
		}else{
			$data['describe']=trim($_POST['describe']);
		}

		if(!isset($_POST['app_icon']) || trim($_POST['app_icon'])==''){
			echo '业务应用图标没有选择！';exit;
		}else{
			$data['app_icon']=trim($_POST['app_icon']);
		}
		$data['time'] = time();
		
		$moduleFolder = $this->app->getModuleRoot().$data['module_name'];
		
		//判断新增或修改
		if($data['action']=='add'){
			//判断数据库中是否记录该模块
			//$result =$this->pdo->getRow("SELECT count(*) as cnt FROM sys_module WHERE module_name='".$_POST['module_prefix'].$_POST['module_name']."'");
			//if($result['cnt']==0){
				//判断该模块是否存在
				if(!file_exists($moduleFolder)){
					//创建目录
					Util::mk_dir($moduleFolder."/view");
					//生成文件
					$this->admin_module->createIndex($moduleFolder,$data);
					$this->admin_module->createModel($moduleFolder,$data);
					$this->admin_module->createConfig($moduleFolder,$data);
					$this->admin_module->createView($moduleFolder,$this->app->getModuleRoot(),$data['module_name']);
					//$this->admin_module->createViewIndex($moduleFolder,$data);
				}else{
					//该模块文件程序已经存在，则代表添加的为菜单项
					$data['module_type']='2';
				}
				$data['create_uid'] = $_SESSION['uid'];
				$data['create_date'] = time();
				$data['write_date'] = time();
				$data['write_uid'] = $_SESSION['uid'];
				$data['active'] = 1;
				$data['flag'] = 1;
				$last_id=$this->pdo->add($data,'sys_module');
				if($last_id>0){
				Util::alert_msg('创建模块成功!','succeed','/admin/editModule?mid='.$last_id.'&reload=leftFrame',1);
				}else{
					Util::alert_msg('创建模块失败!','succeed','/admin/addModule.candor?projectcode='.$data['project_code'].'&parent_module='.$data['parent_module'],100);
				}
			//}else{
			//	echo '该模块已经存在!';
			//}
		}else{
			$result =$this->pdo->getRow("SELECT * FROM sys_module WHERE id='".$_POST['mid']."'");
			//echo $result['background'].'='.$data['background']."<br>";
//echo $result['business_name'].'='.$data['business_name']."<br>";
//echo $result['app_icon'].'='.$data['app_icon'];exit;
			$fileflow = Util::readover($moduleFolder."/config.php");
			$fileflow = str_ireplace($result['background'], $data['background'],$fileflow);
			$fileflow = str_ireplace($result['business_name'], $data['business_name'],$fileflow);
			$fileflow = str_ireplace($result['app_icon'], $data['app_icon'],$fileflow);
			Util::writeover($moduleFolder."/config.php",$fileflow);
			
			$mid = $data['mid'];
			$data['write_date'] = time();
			$data['write_uid'] = $_SESSION['uid'];
			$rst = $this->pdo->update($data,'sys_module','id='.$mid);
			if($rst=='1'){
				Util::alert_msg('修改模块成功!','succeed','/admin/editModule?mid='.$mid.'&parent_module='.$data['parent_module'].'&reload=leftFrame',1);
			}else{
				Util::alert_msg('修改模块失败!','warning','/admin/editModule?mid='.$mid,100);
			}
		}
	}

	/**
	* 删除应用系统模块
	* @access public 
	* @param 
	* @return string
	*/
	public function delModule(){
		//$sqlite = new Sqlite();
		$mid = intval(isset($_GET["mid"])?$_GET["mid"]:0);
		if($mid>0){
			//获取该模块信息
			$moduleInfo = $this->pdo->getRow("select * from sys_module where id=".$mid);
			if($moduleInfo['module_type']=='0'){
				//处理该模块程序
				$oldModuleFolder = $this->app->getModuleRoot().$moduleInfo['module_name'];
				$newModuleFolder = $this->app->getModuleRoot()."Del_".time()."_".$moduleInfo['module_name'];
				rename($oldModuleFolder,$newModuleFolder);
				//echo $targetFolder = $this->app->getAppRoot()."tmp\modulebak";exit;
				//$FileCtr = new FileUtil();
				//$FileCtr->copyDir($newModuleFolder, $targetFolder);
			}

			$rst = $this->pdo->remove('sys_module','id='.$mid);
			if($rst){
				Util::alert_msg('删除模块成功!','succeed',$_SERVER['REFERER'],1);
			}else{
				Util::alert_msg('删除模块失败!','warning',$_SERVER['REFERER'],100);
			}
		}else{
			Util::alert_msg('模块信息不存在!','warning',$_SERVER['REFERER'],100);
		}
	}

	/**
	* 获取应用系统子模块
	* @access public 
	* @param 
	* @return string
	*/
	public function ajaxGetSubModule(){
		$pid = isset($_POST['pid'])?$_POST['pid']:0;
		//获取该模块所属项目下的分类
		$sql = "select * from sys_module where project_code='".$pid."' and module_type=1";
		$category = $this->pdo->getAll($sql);
		$option = '<option value="0">请选择子类</option>';
		foreach($category as $key=>$item){
			$option .='<option value="'.$item['id'].'">'.$item['business_name'].'</option>';	
		}
		echo $option;
	}

	/**
	* 向后台打入权限，同时将方法存入mysql库中
	* @access public 
	* @param 
	* @return string
	*/
	public function addFun(){
		// print_r($_POST);exit;
		$module = isset($_GET['module'])?$_GET['module']:'';
		$fun = isset($_GET['method_name'])?$_GET['method_name']:'';
		//print_r($_GET);exit;
		if($module!='' && $fun!=''||$_POST){
			if($_GET){
				$result = $this->admin_module->saveFun($_GET,'add');
			}else{
				foreach ($_POST as $k => $v) {
					if(is_array($v)){
						foreach ($v as $k1 => $v1) {
							$data[$k1][$k]=$v1;
						}
					}
				}
				// print_r($data);exit();
				$result=0;
				foreach ($data as $k => $v) {
					$result += $this->admin_module->saveFun($v,'add');
				}
				
			}
			
			if($result)
			{
				Util::alert_msg('打入权限成功!','succeed',$_SERVER['HTTP_REFERER'],1);	
			}
			else
			{
				Util::alert_msg('打入权限失败!','warning',$_SERVER['HTTP_REFERER'],100);
			}
		}else{
			Util::alert_msg('方法或模块名不能为空!','warning',$_SERVER['HTTP_REFERER'],100);
		}
	}

	public function quickAddFun(){
		$module = isset($_GET['module'])?$_GET['module']:'';
		$fun = isset($_GET['method_name'])?$_GET['method_name']:'';
		//print_r($_GET);exit;
		if($_POST){
			$result = $this->admin_module->saveFun($_GET,'add');
			if($result)
			{
				Util::alert_msg('打入权限成功!','succeed',$_SERVER['HTTP_REFERER'],1);	
			}
			else
			{
				Util::alert_msg('打入权限失败!','warning',$_SERVER['HTTP_REFERER'],100);
			}
		}else{
			Util::alert_msg('方法或模块名不能为空!','warning',$_SERVER['HTTP_REFERER'],100);
		}
	}

	/**
	* 删除后台权限，同时删除mysql库中方法
	* @access public 
	* @param 
	* @return string
	*/
	public function delFun(){
		$module = isset($_GET['module'])?$_GET['module']:'';
		$fun = isset($_GET['fun'])?$_GET['fun']:'';
		if($module!='' && $fun!=''){
			$result = $this->admin_module->delFun($_GET);	
			if($result)
			{
				//$this->soap->erromsg;
				Util::alert_msg('操作成功!','succeed','/admin/moduleFun.candor?mid='.$_GET['module_id'].'|确定',1);
			}
			else
			{
				Util::alert_msg('操作失败!','warning','/admin/moduleFun.candor?mid='.$_GET['module_id'].'|确定',100);
			}
			//需要保证前后台一致
			//插入后台
			//TODO:罗强完成
			
			//存入mysql
			//TODO:罗东完成

		}else{
			Util::alert_msg('删除权限失败!','warning');
		}
	}
	
	/**
	* 模块分类管理
	* @access public 
	* @param 
	* @return string
	*/
	public function categoryList(){
		//print_r($_GET);
		$projectcode = isset($_GET['projectcode'])?$_GET['projectcode']:'0';

		//获取项目信息
		$sql = "SELECT * FROM sys_project where is_admin=0";
		$project = $this->pdo->getAll($sql);
		$this->assign('project',$project);

		$type = isset($_GET['type'])?$_GET['type']:'parent';
		$page_info = "pid=".$pid."&type=".$type."&";

		$orderField = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		$orderValue = isset($_GET['flag']) ? $_GET['flag'] : 'desc';

		$pageSize = 15;
		$offset = 0;
		$subPages=0;//每次显示的页数
		$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		$where = "where 1=1 ";
		
		if($type=='child'){
			if($projectcode>0)$where .= " and project_code ='".$projectcode."'";
		}else{
			$where .= " and project_code ='".$projectcode."' and parent_module='0' ";
		}
		if($_GET) {
			//处理搜索条件
			$business_name = trim(isset($_GET["business_name"])?$_GET["business_name"]:"");
			if($business_name!=""){
				$where .= " and business_name like '%".$business_name."%'";
				$page_info .="business_name=".$business_name."&";
				$this->assign('business_name',$business_name);
			}
			$parent_module =  trim(isset($_GET["parentmodule"])?$_GET["parentmodule"]:"0");
			if($parent_module!="0"){
				$where .= " and parent_module='".$parent_module."'";
				$page_info .="parent_module=".$parent_module."&";
			}
		}
		$select_columns = "select %s from sys_module %s %s %s";
		$order = "order by $orderField $orderValue";
		$sql = sprintf($select_columns,'*',$where,$order,$limit);
		$res = $this->pdo->selectLimit($sql,$pageSize,$offset);
		$recordCount = $this->pdo->getCount();
		foreach($res as $key=>$item){
			//判断该项目模块是否存在子模块
			$sql = "select count(id) as cnt from sys_module where parent_module='".$item['id']."'";
			$rlt = $this->pdo->getRow($sql);
			$res[$key]['cnt'] = isset($rlt['cnt'])?$rlt['cnt']:0;
		}
		$page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$page_info,2);
		$splitPageStr=$page->get_page_html();
		
		$this->assign('parent_module',$parent_module);
		$this->assign('projectcode',$projectcode);
		$this->assign('page_html',$splitPageStr);
		$this->assign('cList',$res);
		$this->display('admin_module','categoryList');

	}

	/**
	* 分类添加
	* @access public 
	* @param 
	* @return string
	*/
	public function addCategory(){
		$projectcode = intval(isset($_GET["projectcode"])?$_GET["projectcode"]:0);
		$module['project_code'] = $projectcode;
		$module['module_type'] = 1;
		//获取项目信息
		$sql = "SELECT * FROM sys_project where is_admin=0";
		$project = $this->pdo->getAll($sql);
		$this->assign('project',$project);

		$moduleList = $this->pdo->getAll("select * from sys_module");
		$icons = $this->admin_module->getFileList($this->app->getAppRoot()."www\images\app_icons");
        $this->assign('icons',$icons);

		$this->assign('module',$module);
		$this->assign('action','add');
		$this->display('admin_module','categoryAdd');	
	}

	/**
	* 添加分类
	* @access public 
	* @param 
	* @return string
	*/
	public function editCategory()
	{
		$mid = intval(isset($_GET["mid"])?$_GET["mid"]:0);
		if($mid>0){
			//获取项目信息
			$sql = "SELECT * FROM sys_project where is_admin=0";
			$project = $this->pdo->getAll($sql);

			$sql = "select * from sys_module where id=".$mid;
			$res = $this->pdo->getRow($sql);

			$icons = $this->admin_module->getFileList($this->app->getAppRoot()."www\images\app_icons");
			$this->assign('icons',$icons);

			$this->assign('action','edit');
			$this->assign('project',$project);
			$this->assign('module',$res);
			$this->display('admin_module','categoryAdd');
		}else{
			Util::alert_msg('分类信息不存在','warning','/admin/addCategory',3);
		}
	}

	/**
	* 保存分类
	* @access public 
	* @param 
	* @return string
	*/
	public function saveCategory(){
		$data = $_POST;
		if(!isset($_POST['business_name']) || trim($_POST['business_name'])==''){
			echo '分类名称不能为空！';exit;
		}else{
			$data['business_name']=trim($_POST['business_name']);
		}

		if(!isset($_POST['project_name']) || trim($_POST['project_name'])==''){
			echo '所属项目名称不能为空！';exit;
		}else{
			//获取对应父级模块的信息、
			$pmoudle = $this->pdo->getRow("select * from sys_project where project_code='".$_POST['project_name']."'");
			$data['project_name']=trim($pmoudle['project_name']);
			$data['project_code']=trim($pmoudle['project_code']);
		}
		if(!isset($_POST['app_icon']) || trim($_POST['app_icon'])==''){
			echo '分类应用图标没有选择！';exit;
		}else{
			$data['app_icon']=trim($_POST['app_icon']);
		}
		$data['time'] = time();
		$data['developer'] = 'admin';
		$data['parent_module'] = '0';
		
		//判断新增或修改
		if($data['action']=='add'){
			$data['create_uid'] = $_SESSION['uid'];
			$data['create_date'] = time();
			$data['write_date'] = time();
			$data['write_uid'] = $_SESSION['uid'];
			$data['active'] = 1;
			$data['flag'] = 1;
			$last_id=$this->pdo->add($data,'sys_module');
			if($last_id>0){
				Util::alert_msg('分类模块成功!','succeed','/admin/editCategory?mid='.$last_id,1);
			}else{
				echo "分类模块失败!";
			}
		}else{
			$mid = $data['mid'];
			$data['write_date'] = time();
			$data['write_uid'] = $_SESSION['uid'];
			$chilidrst = $this->pdo->update(array('project_name'=>$data['project_name'],'project_code'=>$data['project_code']),'sys_module',"parent_module='".$mid."'");
			$rst = $this->pdo->update($data,'sys_module','id='.$mid);
			if($rst=='1'){
				Util::alert_msg('修改分类成功!','succeed','/admin/editCategory?mid='.$mid,1);
			}else{
				Util::alert_msg('修改分类失败!','warning','/admin/editCategory?mid='.$mid,100);
			}
		}
	}

	/*--------------------------流程模块 方法--------------------------------*/
	/**
	* 流程模块
	* @access public 
	* @param 
	* @return 
	*/
	public function workFlowList()
	{
		$pageSize = 15;
	    $offset = 0;
	    $subPages=15;//每次显示的页数
	    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
	    if($currentPage>0) $offset=($currentPage-1)*$pageSize;
	    $limit = " limit $offset,$pageSize ";
		$sql = " select * from flowinfo   $limit  ";
		$pdo = new MysqlPdo();
		$flowinfo = $pdo->getAll($sql);
		$count = $pdo->find('flowinfo','','count(*) as count');
		$page=new pager_page($pageSize,$count['count'],$currentPage,$subPages,'',1);
		$pageStr=$page->get_page_html();
		
		$this->assign('pageStr',$pageStr);
		$this->assign('flowinfo',$flowinfo);
		$this->display('admin_module','workFlowList');
	}

	/**
	* 流程图编辑
	* @access public 
	* @param 
	* @return 
	*/
	public function workFlowEdit()
	{
		$flowid = isset($_GET["flowid"])?$_GET["flowid"]:0;
		if($flowid){
			$sql = "select * from flowinfo where ID=".$flowid;
			$pdo = new MysqlPdo();
			$flowinfo = $pdo->getRow($sql);
			if(isset($flowinfo['ID'])){
				$this->assign('flowxml',$flowinfo['XML']);
				$this->assign('flowid',$flowid);
				$this->display();
			}else{
				echo '该流程不存在！';
			}
		}else{
			echo '非法数据！';
		}
	}
	
	/**
	* 输出流程XML文件
	* @access public 
	* @param 
	* @return 
	*/
	public function workFlowXml(){
		$flowid = isset($_GET["flowid"])?$_GET["flowid"]:0;
		if($flowid){
			$sql = "select * from flowinfo where ID=".$flowid;
			$pdo = new MysqlPdo();
			$flowinfo = $pdo->getRow($sql);
			header("Content-type: text/xml");
			Header("Pragma: no-cache"); #HTTP 1.0
			Header("Cache-control: private, no-cache, no-store");
			Header("Expires: 0");
			if(isset($flowinfo['ID'])){
				echo htmlspecialchars_decode(stripslashes($flowinfo['XML']));
			}
		}
	}

	/**
	* 流程图保存
	* @access public 
	* @param 
	* @return 
	*/
	public function workFlowSave()
	{
		$flowid = isset($_GET["flowid"])?$_GET["flowid"]:0;
		if($flowid){
			// Gets the XML parameter from the POST request
			$xml = stripslashes($_POST["xml"]);
			$xml = str_replace('flowid="0"','flowid="'.$flowid.'"',$xml);
			if (isset($xml))
			{
				// Stores the xml in database
				$flowinfo = array('XML'=>$xml);
				$pdo = new MysqlPdo();
				$pdo->update($flowinfo,'flowinfo','ID='.$flowid);
				$workFlow = new FlowControl();
				$mess =$workFlow->OpFlowNodesDB($xml,$flowid);
				if($mess['ISSUCESS'])echo '保存成功！';
				else echo $mess['INFO'];
			}
			else echo '保存失败 ';
		}else{
			echo '非法数据！';
		}
	}

	/**
	* 新建、修改流程
	* @access public 
	* @param 
	* @return 
	*/
	public function workFlowAddDialog()
	{
		if(isset($_GET['id'])&&$_GET['id']>0)
		{
			$sql = "select * from flowinfo where ID=".$_GET['id'];
			$pdo = new MysqlPdo();
			$flowinfo = $pdo->getRow($sql);		
			$this->assign('flowinfo',$flowinfo);	
		}

		
		$this->display();
	}
	
	/**
	* 保存新建、修改流程
	* @access public 
	* @param 
	* @return 
	*/
	public function saveWorkFlow()
	{
		extract($_POST);
		$msgS = '0';
		if(!empty($APPNAME)&&!empty($FLOWNAME))
		{
			$INTIME = date('Y-m-d H:i:s');
			if($ID<=0)$sql = " insert into flowinfo set REGIONCODE = '510501' , APPNAME ='$APPNAME' , FLOWNAME = '$FLOWNAME' , ISUSE = '$ISUSE' , INMAN = 'young' ,INTIME = '$INTIME'  ";
			else $sql = " update flowinfo set APPNAME ='$APPNAME' , FLOWNAME = '$FLOWNAME' , ISUSE = '$ISUSE' where ID = '$ID' ";
			$pdo = new MysqlPdo();
			if($pdo->execute($sql))$msgS = '1';
		}
		echo $msgS;
	}
	/**
	* 删除 流程
	* @access public 
	* @param 
	* @return 
	*/
	public function workFlowDel()
	{
		$msgS = '0' ;
		if(isset($_GET['flowid'])&&$_GET['flowid']>0)
		{
			$pdo = new  MysqlPdo();
			$count = $pdo->getRow(" select count(*) as count from flownode where FLOWID = '{$_GET['flowid']}' ");
			$sql = " delete from flownode where FLOWID = '{$_GET['flowid']}' ";
			if($count['count'] <= 0 ||$pdo->execute($sql)){
				if($pdo->execute(" delete from flowinfo where ID = '{$_GET['flowid']}' "))$msgS = '1';
			}
		}
		echo $msgS ;
	}

	/**
	* 保存工作节点信息
	* @access public 
	* @param 
	* @return 
	*/
	public function workFlowNodeAdd()
	{
		if(isset($_POST['FLOWID']) and $_POST['FLOWID']>0 and isset($_POST['NODEID']) and $_POST['NODEID']>0){
			$pdo = new MysqlPdo();
			//判断节点是否存在
			$sql = "select count(*) as cnt from flownode where flowid = '{$_POST['FLOWID']}' and NODEID=".$_POST['NODEID'];
			$count = $pdo->getRow($sql);
			#判断该流程是否已经存在开始节点
			if($_POST['NODETYPE']!='end')$_POST['ISSTART'] = $this->isExistStartNode($_POST['FLOWID'],$_POST['NODEID'])===true || empty($_POST['ISSTART']) ? '0' : '1';
			if($count['cnt']>0){
				$num = $pdo->update($_POST,'flownode',"NODEID=".$_POST['NODEID']." and flowid = '{$_POST['FLOWID']}' ");
				if($num!==false){
					echo '保存成功';
				}else{
					echo '保存失败';
				}
			}else{
				$pdo->add($_POST,'flownode');
				if($pdo->getLastInsId()){
					echo '保存成功';
				}else{
					echo '保存失败';
				}
			}
		}else{
			echo '系统数据错误！';
		}
	}
	
	/**
	 * 保存条件节点相关信息
	 * @access private
	 * @return bool
	 * */
	public function saveConditionNode()
	{
		$msg = '0' ;
		if(isset($_POST['FLOWID']) and $_POST['FLOWID']>0 and isset($_POST['NODEID']) and $_POST['NODEID']>0){
			$pdo = new MysqlPdo();
			//判断节点是否存在
			@extract($_POST);
			#删除该条件节点的所有记录 再从新添加新的记录
			$isDel = true; 
			if ($this->isExistNode($FLOWID,$NODEID))
			{
				
				#节点条件
				$nodeids = explode('#split#',$_POST['nodeids']);
				
				$nodeInfo = $this->getNodeInfo($FLOWID,$NODEID);
				//$actions = explode('#split#',$_POST['actions']);
                $conditions = explode('#split#',$_POST['conditions']);
                $tagname = explode('#split#',$_POST['tagname']);
				$bizstatus = explode('#split#',$_POST['bizstatus']);
				$isoneline = empty($isoneline) ? 0 : 1 ;
				$pdo->startTrans();//启动事务
				
				foreach ($nodeids as $k=>$item)
				{
					$ISNEW = TRUE ;
					if($item>0)
					{#插入条件节点的下一条信息
						foreach ($nodeInfo as $s)
						{
							#首先查询该条信息是否存在 存在则更新
							if($item==$s['NEXTNODE'])
							{
								$sql = " update flownode set NODENAME='$NODENAME',CONDITIONS = '{$conditions[$k]}',TAGNAME = '{$tagname[$k]}',BIZSTATUS = '{$bizstatus[$k]}',ENTERCHECK='$ENTERCHECK',LEAVECHECK='$LEAVECHECK' , ISONELINE = '$isoneline' , NEEDCOMP = '$NEEDCOMP' WHERE FLOWID ='$FLOWID' AND NODEID = '$NODEID' AND NEXTNODE = '$item' ";
								$pdo->doSql($sql);
								$ISNEW = false;
								$hasNodes[] = $item ;
							}
						}
						if ($ISNEW)
						{
							 $sql = " insert into flownode set FLOWID = '$FLOWID' , NODEID = '$NODEID' ,NODENAME = '$NODENAME' , CONDITIONS = '{$conditions[$k]}' ,TAGNAME = '{$tagname[$k]}',BIZSTATUS = '{$bizstatus[$k]}', NODETYPE = 'condition' , NEXTNODE = '$item' , ISONELINE = '$isoneline' , NEEDCOMP = '$NEEDCOMP' "; 
							 $pdo->doSql($sql);
							 $hasNodes[] = $item ;
						}
					}
				}
				#删除已经移除过的线
				foreach ($nodeInfo as $s)
				{
					if(!in_array($s['NEXTNODE'],$hasNodes))
					{
						echo $sql = " delete from flownode where FLOWID = '$FLOWID' and NODEID = '$NODEID' and nextnode = '".$s['NODEID']."' ";
						$pdo->doSql($sql);
					}
				}
				if($pdo->commit())$msg = '1' ;
			}
		}
		echo $msg ;
	}
	/**
	 * 是否已经存在开始节点
	 * @access private
	 * @return bool
	 * */
	private function isExistStartNode($flowid,$nodeid)
	{
    	$sql = " select nodeid from flownode where flowid ='$flowid' and isstart = '1' order by id desc  " ;
		$pdo = new MysqlPdo();
		$cnt = $pdo->getRow($sql);
		if(!empty($cnt['nodeid'])&&$cnt['nodeid']!=$nodeid)return true;
		else return false;
	}
	/**
	 * 是否存在节点信息
	 * 
	 * */
	private function isExistNode($flowid,$nodeid,$nextid='')
	{
		$nextnode = empty($nextid) ? "" : " and nextnode = '$nextid' ";
		$sql = " select count(*) as cnt from flownode where flowid ='$flowid' and nodeid = '$nodeid' $nextnode " ;
		$pdo = new MysqlPdo();
		$cnt = $pdo->getRow($sql);
		if($cnt['cnt']>0)return true;
		else return false;
	}
	/**
	 * 获取节点信息
	 * 
	 * */
	private function getNodeInfo($flowid,$nodeid,$nextid='')
	{
		$nextnode = empty($nextid) ? "" : " and nextnode = '$nextid' ";
		$sql = " select * from flownode where flowid ='$flowid' and nodeid = '$nodeid' $nextnode " ;
		$pdo = new MysqlPdo();
		$info = $pdo->getAll($sql);
		return $info;
	}
	/**
	* 任务配置弹出框
	* @access public 
	* @param 
	* @return 
	*/
	public function taskConfigDialog()
	{
		//获取用户列表
		$sql = " select f.userrights,f.action,f.isstart,f.display,f.entercheck,f.leavecheck,f.bizname,f.savebeforecheck,f.cptype,f.params from flownode f  where f.flowid = '{$_GET['flowid']}' and f.nodeid = '{$_GET['id']}' and f.nodetype = 'task' ";
		$pdo = new MysqlPdo();
		$flowinfo = $pdo->getRow($sql);
		$userinfo = strlen($flowinfo['userrights']) > 0 ?  explode(',',$flowinfo['userrights']) : array();
		if(is_array($userinfo))
		{
			$u = explode('u:',$userinfo[0]);
			$userinfo[0] = $u[1];
		}
		$userinfo = array_filter($userinfo);
		#取用户
		$user = implode(',',$userinfo);
		
		$enc = explode(':',$flowinfo['entercheck']);
		$lvc = explode(':',$flowinfo['leavecheck']);
		$sbc = explode(':',$flowinfo['savebeforecheck']);
		$flowinfo['entercheck'] = $enc[1];
		$flowinfo['leavecheck'] = $lvc[1];
		$flowinfo['savebeforecheck'] = $sbc[1];

		$this->assign('userinfo',$userinfo);
		$this->assign('flowinfo',$flowinfo);
		$this->assign("task",$_GET);
		$this->display();
	}
	
	/**
	* 结束节点配置弹出框
	* @access public 
	* @param 
	* @return 
	*/
	public function endConfigDialog()
	{
		$sql = " select f.userrights,f.action,f.isstart,f.display,f.entercheck,f.leavecheck from flownode f  where f.flowid = '{$_GET['flowid']}' and f.nodeid = '{$_GET['id']}' ";
		$pdo = new MysqlPdo();
		$flowinfo = $pdo->getRow($sql);
		$this->assign('flowinfo',$flowinfo);
		$this->assign("task",$_GET);
		$this->display();
	}
	
	/**
	* 任务配置用户列表
	* @access public 
	* @param 
	* @return 
	*/
	public function taskUserDialog()
	{
		$userlist = $this->getUserList(1);
		$this->assign('userlist',$userlist);
		$this->assign('treelist',$this->tree);
		$this->display();
	}
	
	/**
	* 获取用户列表
	* @access public 
	* @param 
	* @return 
	*/
	public function getUserList($id)
	{
		
		$userlist[0] = array(
			'id'=>1,
			'name'=>'川大软件01',
			'estate@company'=>array(
				'id'=>2,
				'name'=>'川大软件02',
				'estate@company'=>array(
					'id'=>3,
					'name'=>'川大软件03',
					'estate@department'=>array(
						'0'=>array(
							'id'=>1,
							'name'=>'部门01',
							'estate@post'=>array(
								'0'=>array(
									'id'=>1,
									'name'=>'岗位01',
									'estate@user'=>array(
										'0'=>array('id'=>1,'name'=>'罗俊1'),
										'1'=>array('id'=>2,'name'=>'罗强2'),
										'2'=>array('id'=>1,'name'=>'罗俊1'),
										'3'=>array('id'=>2,'name'=>'罗强2'),
										'4'=>array('id'=>1,'name'=>'罗俊1'),
										'51'=>array('id'=>2,'name'=>'罗强2'),
										'6'=>array('id'=>1,'name'=>'罗俊1'),
										'7'=>array('id'=>2,'name'=>'罗强2'),
										'8'=>array('id'=>1,'name'=>'罗俊1'),
										'9'=>array('id'=>2,'name'=>'罗强2'),
										'10'=>array('id'=>1,'name'=>'罗俊1'),
									)
								)
							)
						),
						'1'=>array(
							'id'=>1,
							'name'=>'部门02',
							'estate@post'=>array(
								'0'=>array(
									'id'=>1,
									'name'=>'岗位01',
									'estate@user'=>array(
										'0'=>array('id'=>1,'name'=>'罗俊32'),
										'1'=>array('id'=>2,'name'=>'罗强42')
									)
								)
							)
						)
					)
				),
				'estate@department'=>array(
					'0'=>array(
						'id'=>1,
						'name'=>'部门03',
						'estate@post'=>array(
							'0'=>array(
								'id'=>1,
								'name'=>'岗位01',
								'estate@user'=>array(
									'0'=>array('id'=>1,'name'=>'罗俊53'),
									'1'=>array('id'=>2,'name'=>'罗强64')
								)
							)
						)
					),
					'1'=>array(
						'id'=>1,
						'name'=>'部门04',
						'estate@post'=>array(
							'0'=>array(
								'id'=>1,
								'name'=>'岗位01',
								'estate@user'=>array(
									'0'=>array('id'=>1,'name'=>'罗俊75'),
									'1'=>array('id'=>2,'name'=>'罗强85')
								)
							)
						)
					)
				)
			),
			'estate@department'=>array(
				'0'=>array(
					'id'=>1,
					'name'=>'部门05',
					'estate@post'=>array(
						'0'=>array(
							'id'=>1,
							'name'=>'岗位01',
							'estate@user'=>array(
								'0'=>array('id'=>1,'name'=>'罗俊96'),
								'1'=>array('id'=>2,'name'=>'罗强106')
							)
						)
					)
				),
				'1'=>array(
					'id'=>1,
					'name'=>'部门06',
					'estate@post'=>array(
						'0'=>array(
							'id'=>1,
							'name'=>'岗位01',
							'estate@user'=>array(
								'0'=>array('id'=>1,'name'=>'罗俊111'),
								'1'=>array('id'=>2,'name'=>'罗强121')
							)
						)
					)
				)
			)
		);
		if($id>0)
		{
			$list = $this->dealUser($userlist[0]);
		}
		return $list;
	}
	public function getUserListInfo()
	{
		$u1 = array(array('id'=>1,'name'=>'张三'),array('id'=>2,'name'=>'李四'),array('id'=>3,'name'=>'王二麻子'));
		$u2 = array(array('id'=>4,'name'=>'张总'),array('id'=>5,'name'=>'李总'),array('id'=>6,'name'=>'王总'));
		$u3 = array(array('id'=>7,'name'=>'张主任'),array('id'=>8,'name'=>'李主任'),array('id'=>9,'name'=>'王主任'));
		$u13 = array_merge($u1,$u2,$u3);
		echo json_encode($u13);exit;
	}
	private function dealUser($arr)
	{
		static $tree = '' ;
		$model_key = array('estate@company','estate@department','estate@post','estate@user');
		$tree .="<ul>" ;
		$tree .= "<li class='ltitle'>";
		$tree .='<div class="label">
	                    <span><img src="/images/minus.gif" alt=""></span>
	                    <span class="checkbox"><span class="not"></span><input type="checkbox" name="depart_1" checked="checked"  value="'.$arr['id'].'" /></span>
	                    <span>&nbsp;'.$arr['name'].'</span>
	                </div>
	                <ul>';
		if(key_exists($model_key[0],$arr))$this->dealUser($arr[$model_key[0]]);
		if(key_exists($model_key[1],$arr)) {
			foreach ($arr[$model_key[1]] as $key=>$item)
			{
				$tree .= "<li class='ltitle'>";
				$tree .='<div class="label">
		                    <span><img src="/images/minus.gif" alt=""></span>
		                    <span class="checkbox"><span class="not"></span><input type="checkbox" name="depart_1" checked="checked"  value="'.$arr['id'].'_'.$item['id'].'" /></span>
		                    <span>&nbsp;'.$item['name'].'</span>
		                </div>
		                <ul>';
				if (key_exists($model_key[2],$item)) {
					foreach ($item[$model_key[2]] as $mitem)
					{
						$tree .= "<li class='ltitle'>";
						$tree .='<div class="label">
		                            <span><img src="/images/minus.gif" alt=""></span>
		                            <span class="checkbox"><span class="not"></span><input type="checkbox" name="depart_1" checked="checked"  value="'.$arr['id'].'_'.$item['id'].'_'.$mitem['id'].'" /></span>
		                            <span>&nbsp;'.$mitem['name'].'</span>
		                        </div>
		                        <ul>';
						if (key_exists($model_key[3],$mitem)) {
							//$user[] = $mitem[$model_key[3]];
							foreach ($mitem[$model_key[3]] as $uitem)
							{/*
								$tree .= "<li class='ltitle'>";
								$tree .='<div class="label">
				                            <span><img src="/images/minus.gif" alt=""></span>
				                            <span><input type="checkbox" name="depart_1" checked="checked" /></span>
				                            <span>&nbsp;'.$uitem['name'].'</span>
				                        </div>
				                        <ul>';
								foreach ($uitem as $ulist)
								{
									//$tree .= '<li class="lcontent"><input type="checkbox" name="depart_3" checked="checked" />&nbsp;'.$uitem['name'].'</li>';
								}*/
								$user[] = $uitem;
								//$tree .= '</ul></li>';
							}
						}
						$tree .= '</ul></li>';
					}
				}
				$tree .= '</ul></li>';
			}
		}
		$tree .= '</ul></li>';
		$tree .="</ul>";
		$this->tree = $tree;
		if(is_array($users)&&$istree==0)$user = array_merge($user,$users);
		return $user;
	}
	/**
	* 保存用户权限
	* @access public 
	* @param 
	* @return 
	*/
	public function saveUserRight()
	{
		$msg = 0;
		if(strlen($_POST['userid'])>0)
		{
			$sql = "select id,userrights from flownode where NODEID=".$_POST['nodeid']." and FLOWID = '{$_POST['flowid']}' " ;
			$pdo = new MysqlPdo();
			$info = $pdo->getRow($sql);
			if($info['id']>0)
			{
				$userid = substr($_POST['userid'],0,strlen($_POST['userid'])-1);
				$uone = explode(',',$userid);
				$utwo = explode(',',$info['userrights']);
				if(count($utwo)>0)
				{ //去掉重复存在的用户
					foreach ($uone as $item)
					{
						foreach ($utwo as $k=>$u2)
						{
							if($u2==$item)
							{
								unset($utwo[$k]);
							}
						}
					}
					$userid = implode(',',array_merge($uone,$utwo));
				}
				$sql = " update flownode set USERRIGHTS = '$userid' where NODEID = '{$_POST['nodeid']}' and FLOWID = '{$_POST['flowid']}' ";
				if($pdo->execute($sql))
				{
					$msg = 1;
				}
			}
		}
		
		echo json_encode($msg);

	}
	/**
	* 移除用户权限
	* @access public 
	* @param 
	* @return 
	*/
	public function delUserOne()
	{
		$msg = 0;
		if($_POST['uid']>0)
		{
			$sql = "select id,userrights from flownode where NODEID=".$_POST['nodeid']." and FLOWID = '{$_POST['flowid']}' " ;
			$pdo = new MysqlPdo();
			$info = $pdo->getRow($sql);
			if($info['id']>0)
			{
				$userid = explode(',',$info['userrights']);
				if(in_array($_POST['uid'],$userid))
				{
					foreach ($userid as $k=>$item)
					{
						if($item==$_POST['uid'])
						{
							unset($userid[$k]);
						}
					}
					$userid = implode(',',$userid);
					$sql = " update flownode set USERRIGHTS = '$userid' where NODEID = '{$_POST['nodeid']}' and FLOWID = '{$_POST['flowid']}' ";
					if($pdo->execute($sql))
					{
						$msg = 1;
					}
				}
			}
		}
		echo json_encode($msg);
	}
	/**
	* 条件框配置弹出框
	* @access public 
	* @param 
	* @return 
	*/
	public function conditionConfigDialog()
	{
		$info = $this->getNodeInfo($_GET['flowid'],$_GET['id']);
		$enc = explode(':',$info[0]['ENTERCHECK']);
		$lvc = explode(':',$info[0]['LEAVECHECK']);
		$info['0']['entercheck'] = $enc[1];
		$info['0']['leavecheck'] = $lvc[1];
		foreach ($info as $key=>$item)
		{
			if($item['ISONELINE']=='1')
			{
                $fninfo[$info[$key]['NEXTNODE']]['conditions'] = $info[$key]['CONDITIONS']    ;    
				$fninfo[$info[$key]['NEXTNODE']]['tagname'] = $info[$key]['TAGNAME']	;
                $fninfo[$info[$key]['NEXTNODE']]['bizstatus'] = $info[$key]['BIZSTATUS']    ;    	
			}
		}
		$this->assign('info',$info[0]);
		$this->assign('fninfo',$fninfo);
		$this->assign("task",$_GET);
		$this->display();
	}
	/*无刷新更新sys_method*/
	public function ajaxUpdateMethod(){
		$value=$_POST['value'];
		$data['method_name']=$value;
		$id=$_POST['id'];
		$rs=$this->pdo->update($data,'sys_method','id='.$id);
		if($rs){
			echo 1;
		}else{
			echo 0;
		}
	}
}