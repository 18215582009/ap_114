<?php
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2012
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     control.php,v 1.4 2012/06/16 21:53:49 ld Exp $
 *
 * The methods of Class are as follows
 *
 * public index 页面浏览
 * public companyTree 组织机构管理
 * public addCompany 新增单位
 * public editCompany 修改单位
 * public delCompany 删除单位
 * public addDepartment 新增部门
 * public editDepartment 修改部门
 * public delDepartment 删除部门
 * public addJob 新增岗位
 * public editjob 修改岗位
 * public delJob 删除岗位
 * public addPerson 新增人员
 * public editPerson 修改人员
 * public delPerson 删除人员
 * public userlist 用户列表
 * public removePerson 删除用户
 * public activePerson 激活用户
 * public authPerson 用户授权
 * public ajaxGetCyOrgList 获取单位组织机构 
 *
 */
class cyzt_companylist extends SecuredControl
{
	/**
	 * pdo连接。
	 * 
	 * @var object
	 * @access pdo
	 */
	protected $pdo;

	/* 构造函数。*/
	public function __construct()
	{
		parent::__construct();
		$this->pdo = $this->cyzt_companylist->pdo;
	}

	/* index方法，也是默认的方法。*/
	public function index()
	{
		$info = $this->cyzt_companylist->getCompanyBySearch();
		//首次进入默认选中第一个节点，存入cookie用于新增按钮相关操作
		setcookie("currentcompanyid",'0',time()+3600);
		setcookie("currenttype",'company',time()+3600);
		//setcookie("currenttype",$info[0]['COMPANYID'],time()+3600);
		
		$this->assign("companylist",$info);
		$this->assign("firstorgid",$info[0]["id"]);
		$this->assign("first_company",$info[0]);
		$this->assign('tree',$str);
		$this->assign('header','单位管理');
		$this->display('cyzt_companylist','index');
	}

	/* 组织机构管理。*/
	public function companyTree()
	{
		$info = $this->cyzt_companylist->getCompanyBySearch();
		//print_r($info);exit;
		$this->assign("companylist",$info);
		$this->assign('header','单位管理');
		$this->display('cyzt_companylist','companytree');
	}

	/* 新增单位。*/
	public function addCompany()
	{
		if($_GET['act']=='save'){
			$company_id = intval(isset($_POST['id'])?$_POST['id']:0);
			$parent_id  = intval(isset($_POST['parent_id'])?$_POST['parent_id']:0);
			$res=$this->cyzt_companylist->addCompany($_POST);
			if ($res['res']){
				Util::alert_msg("添加成功！".$res['msg'],'succeed','/cyzt_companylist/editcompany.candor?type=company&org_id='.$res["res"].'&parent_id='.$parent_id.'&reload=leftFrame',1);	
			}
			else
			{
				Util::alert_msg("操作失败!".$res['msg'],'error','/cyzt_companylist/addcompany.candor?type=company&parent_id='.$parent_id,100);
			}

		}else{
			$currenttype = $_GET['type']?$_GET['type']:$_COOKIE['currenttype'];
			$currentcompanyid = $_GET['parent_id']?$_GET['parent_id']:$_COOKIE['currentcompanyid'];
			$CodeInfo = new CodeInfo();
			$orgSelect = $this->cyzt_companylist->getSelectHtml($currentcompanyid);
			
			$this->assign('method','addcompany');
			$this->assign('codeInfo',$CodeInfo->region());
			$this->assign('currenttype',$currenttype);
			$this->assign('act',$_GET['act']);
			$this->assign('orgSelect',$orgSelect);
			$this->assign("companyinf",$_SESSION['companyinf']);
			$this->display('cyzt_companylist','editcompany');
		}
	}

	/* 修改单位。*/
	public function editCompany()
	{
		if($_GET['act']=='save'){
			//print_r($_POST);exit;
			$company_id = intval(isset($_POST['id'])?$_POST['id']:0);
			$parent_id  = intval(isset($_POST['parent_id'])?$_POST['parent_id']:0);
			if($company_id){
				$res=$this->cyzt_companylist->editCompany($_POST);
				if($res["res"]){
					Util::alert_msg('修改成功！'.$res['msg'],'succeed','/cyzt_companylist/editcompany.candor?type=company&org_id='.$company_id.'&parent_id='.$parent_id.'&reload=leftFrame',1);
				}else{
					Util::alert_msg('修改失败！'.$res['msg'],'error','/cyzt_companylist/editcompany.candor?type=company&org_id='.$company_id.'&parent_id='.$parent_id,100);
				}
				
			}else{
				Util::alert_msg('非法数据，操作失败！','error','/cyzt_companylist/editcompany.candor?type=company&org_id='.$company_id.'&parent_id='.$parent_id,100);
			}
		}else{
			//获取公司信息
			$org_id = intval(isset($_GET['org_id'])?$_GET['org_id']:0);
			$parent_id = intval(isset($_GET['parent_id'])?$_GET['parent_id']:0);
			if($org_id){
				$orgSelect = $this->cyzt_companylist->getSelectHtml($parent_id);
				$CodeInfo = new CodeInfo();
				$info = $this->cyzt_companylist->getCompany($org_id);
				
				$this->assign('method','editcompany');
				$this->assign('orgSelect',$orgSelect);
				$this->assign('codeInfo',$CodeInfo->region());
				$this->assign('info',$info);
				// $this->assign('request',$_GET);
				//print_r($info);
				$this->display('cyzt_companylist','editcompany');
			}else{
				Util::alert_msg('非法数据，操作失败！','error','/cyzt_companylist/userlist.candor?type=company&opt=view&orgid=99',100);
			}
		}
	}

	/* 删除单位。*/
	public function delCompany()
	{
		$company_id = intval(isset($_GET['org_id'])?$_GET['org_id']:0);
		$parent_id = intval(isset($_GET['parent_id'])?$_GET['parent_id']:0);
		$relate_table='sys_company';
		$info=$this->cyzt_companylist->delOrgstruct($relate_table,$company_id);
		if($info['res']){
			Util::alert_msg('删除成功！'.$info['msg'],'succeed',$_SERVER["HTTP_REFERER"].(strstr($_SERVER["HTTP_REFERER"],'?')?'&':'?').'reload=leftFrame',1);
		}else{
			Util::alert_msg('删除失败！'.$info['msg'],'error',$_SERVER["HTTP_REFERER"],100);
		}
	}

	/* 删除部门。*/
	public function delDepartment()
	{
		$department_id = intval(isset($_GET['org_id'])?$_GET['org_id']:0);
		$parent_id = intval(isset($_GET['parent_id'])?$_GET['parent_id']:0);
		$relate_table='sys_department';
		$info=$this->cyzt_companylist->delOrgstruct($relate_table,$department_id);
		if($info['res']){
			Util::alert_msg('删除成功！'.$info['msg'],'succeed',$_SERVER["HTTP_REFERER"].(strstr($_SERVER["HTTP_REFERER"],'?')?'&':'?').'reload=leftFrame',1);
		}else{
			Util::alert_msg('删除失败！'.$info['msg'],'error',$_SERVER["HTTP_REFERER"],100);
		}
	}

	/* 删除岗位。*/
	public function delJob()
	{
		$department_id = intval(isset($_GET['org_id'])?$_GET['org_id']:0);
		$parent_id = intval(isset($_GET['parent_id'])?$_GET['parent_id']:0);
		$relate_table='sys_poststation';
		$info=$this->cyzt_companylist->delOrgstruct($relate_table,$department_id);
		if($info['res']){
			Util::alert_msg('删除成功！'.$info['msg'],'succeed',$_SERVER["HTTP_REFERER"].(strstr($_SERVER["HTTP_REFERER"],'?')?'&':'?').'reload=leftFrame',1);
		}else{
			Util::alert_msg('删除失败！'.$info['msg'],'error',$_SERVER["HTTP_REFERER"],100);
		}
	}

		/* 删除用户。*/
	public function delPerson(){
		//需要同时删除该用户的权限 todo
		$id = intval(isset($_GET['id'])?$_GET['id']:'0');
		$data['flag']=0;
		$rs = $this->pdo->remove('sys_roles_user','user_id='.$id);
		$rs = $this->pdo->update($data,'sys_user','id='.$id);
		if($rs){
			Util::alert_msg('删除成功！','succeed',$_SERVER['HTTP_REFERER'],1);
		}else{
			Util::alert_msg('删除失败！','error',$_SERVER['HTTP_REFERER'],100);
		}
	}

	/* 新增部门。*/
	public function addDepartment(){
		$act = $_GET['action'];
		if ($act=="save"){	
			$result = $this->cyzt_companylist->saveDepartment($_POST);	
			if ($result){
				$msg['msg'] = '操作成功!';
				// Util::alert_msg($msg['msg'],'succeed','/cyzt_companylist/addDepartment.candor?type=department&parent_id='.$_POST['parent_id'].'&reload=leftFrame',1);
				Util::alert_msg('修改成功！','succeed','/cyzt_companylist/editDepartment.candor?type=department&org_id='.$result.'&parent_id='.$_POST['parent_id'].'&reload=leftFrame',1);
			}
			else
			{
				$msg['msg'] = '操作失败!';
				$_SESSION['departinfo']= $_POST;
				Util::alert_msg($msg['msg'],'error','/cyzt_companylist/addDepartment.candor?type=department&parent_id='.$_POST['parent_id'],100);
			}
		} else {
			$parent_org_id = intval($_GET['parent_id']?$_GET['parent_id']:0);
			$type = $_GET['type']?$_GET['type']:$_COOKIE['currenttype'];

			$orgSelect = $this->cyzt_companylist->getSelectHtml($parent_org_id);
			$info['type'] = $type;
			$this->assign('orgSelect',$orgSelect);
			$this->assign('info',$info);
			$this->assign('method','addDepartment');
			$this->display('cyzt_companylist','editdepartment');
		}
	}

	/* 修改部门。*/
	public function editDepartment(){
		$act = $_GET['action'];
		if ($act=="save"){	
			//print_r($_POST);exit;
			$department_id = intval(isset($_POST['id'])?$_POST['id']:0);
			$parent_id  = intval(isset($_POST['parent_id'])?$_POST['parent_id']:0);
			if($department_id){
				$rlt = $this->cyzt_companylist->saveDepartment($_POST,'update');
				if($rlt){
					Util::alert_msg('修改成功！','succeed','/cyzt_companylist/editDepartment.candor?type=department&org_id='.$department_id.'&parent_id='.$parent_id.'&reload=leftFrame',1);
				}else{
					Util::alert_msg('修改失败！','error',  '/cyzt_companylist/editDepartment.candor?type=department&org_id='.$department_id.'&parent_id='.$parent_id,100);
				}
				
			}else{
				Util::alert_msg('非法数据，操作失败！','error','/cyzt_companylist/editDepartment.candor?type=company&org_id='.$company_id.'&parent_id='.$parent_id,100);
			}		
		} else {
			$parent_id = intval($_GET['parent_id']?$_GET['parent_id']:0);
			$org_id = intval($_GET['org_id']?$_GET['org_id']:0);
			$type = $_GET['type']?$_GET['type']:'department';

			$info = $this->cyzt_companylist->getDepartment($org_id);
			$info['type'] = $type;
			$info['relate_table'] = 'sys_department';
			$this->assign('info',$info);	
			$orgSelect = $this->cyzt_companylist->getSelectHtml($parent_id);
			$this->assign('orgSelect',$orgSelect);
			$this->assign('method','editDepartment');
			$this->display('cyzt_companylist','editdepartment');
		}
	}

	/* 新增岗位。*/
	public function addJob(){
		//ToDo
		$act = $_GET['action'];
		if ($act=="save"){	
			$department_id = intval(isset($_POST['id'])?$_POST['id']:0);
			$parent_id  = intval(isset($_POST['parent_id'])?$_POST['parent_id']:0);
			$info = $this->cyzt_companylist->saveJob($_POST);	
			if($info){
					Util::alert_msg('操作成功！','succeed','/cyzt_companylist/editJob.candor?type=job&org_id='.$info.'&parent_id='.$parent_id.'&reload=leftFrame',1);
				}else{
					Util::alert_msg('操作失败！','error',  '/cyzt_companylist/addJob.candor?type=job&org_id='.$department_id.'&parent_id='.$parent_id,100);
				}
		} else {
			$parent_org_id = intval($_GET['parent_id']?$_GET['parent_id']:0);
			$type = $_GET['type']?$_GET['type']:$_COOKIE['currenttype'];
			$orgSelect = $this->cyzt_companylist->getSelectHtml($parent_org_id);
			$info['type'] = $type;
			$this->assign('orgSelect',$orgSelect);
			$this->assign('info',$info);
			$this->assign('method','addJob');
			$this->display('cyzt_companylist','editjob');
		}
		
	}

	/* 修改岗位。*/
	public function editjob(){
		$act = $_GET['action'];
		if ($act=="save"){	
			//print_r($_POST);exit;
			$department_id = intval(isset($_POST['id'])?$_POST['id']:0);
			$parent_id  = intval(isset($_POST['parent_id'])?$_POST['parent_id']:0);
			if($department_id){
				$info = $this->cyzt_companylist->saveJob($_POST,'update');
				if($info){
					Util::alert_msg('修改成功！','succeed','/cyzt_companylist/editjob.candor?type=department&org_id='.$department_id.'&parent_id='.$parent_id.'&reload=leftFrame',1);
				}else{
					Util::alert_msg('修改失败！','error',  '/cyzt_companylist/editjob.candor?type=department&org_id='.$department_id.'&parent_id='.$parent_id,100);
				}
				
			}else{
				Util::alert_msg('非法数据，操作失败！','error','/cyzt_companylist/editjob.candor?type=company&org_id='.$company_id.'&parent_id='.$parent_id,100);
			}		
		} else {
			$parent_id = intval($_GET['parent_id']?$_GET['parent_id']:0);
			$org_id = intval($_GET['org_id']?$_GET['org_id']:0);
			$type = $_GET['type']?$_GET['type']:'job';

			$info = $this->cyzt_companylist->getJob($org_id);
			$info['type'] = $type;
			$info['relate_table'] = 'sys_poststation';

			$this->assign('info',$info);	
			$orgSelect = $this->cyzt_companylist->getSelectHtml($parent_id);
			$this->assign('orgSelect',$orgSelect);
			$this->assign('method','editjob');
			$this->display('cyzt_companylist','editjob');
		}
	}

	/* 新增人员。*/
	public function addPerson(){
		$act = $_GET['action'];
		if ($act=="save"){	
			//print_r($_POST);exit;
			$res = $this->cyzt_companylist->savePerson($_POST);
			if ($res["res"]){
				// Util::alert_msg($msg['msg'],'succeed','/cyzt_companylist/addPerson.candor?type=person&parent_id='.$_POST['parent_id'],1);
				Util::alert_msg("操作成功!".$res['msg'],'succeed','/cyzt_companylist/editPerson.candor?id='.$res["res"].'&orgstruct_id='.$_POST['parent_id'],1);
			}
			else
			{
				Util::alert_msg("操作失败!".$res['msg'],'error','/cyzt_companylist/addPerson.candor?type=person&parent_id='.$_POST['parent_id'],100);
			}
		} else {
			$parent_id = intval($_GET['parent_id']?$_GET['parent_id']:0);
			$type = $_GET['type']?$_GET['type']:$_COOKIE['currenttype'];
			$orgSelect = $this->cyzt_companylist->getSelectHtml($parent_id);
			$CodeInfo = new CodeInfo();
			$info['type'] = $type;
			$this->assign('orgSelect',$orgSelect);
			$this->assign('info',$info);
			$this->assign('codeInfo',$CodeInfo->region());
			$this->assign('method','addPerson');
			$this->display('cyzt_companylist','editperson');
		}
	}

	/* 修改人员。*/
	public function editPerson(){
		$act = $_GET['action'];
		if ($act=="save"){			
			$res = $this->cyzt_companylist->savePerson($_POST,"update");	
			if ($res["res"]){
				Util::alert_msg("操作成功!".$res['msg'],'succeed','/cyzt_companylist/editPerson.candor?id='.$_POST['id'].'&orgstruct_id='.$_POST['parent_id'],1);
			}
			else
			{
				$_SESSION['departinfo']= $_POST;
				Util::alert_msg("操作失败!".$res['msg'],'error','/cyzt_companylist/editPerson.candor?id='.$_POST['id'].'&orgstruct_id='.$_POST['parent_id'],100);
			}
		} else {
			$id = intval(isset($_GET['id'])?$_GET['id']:0);
			if($id){
				$parent_org_id = intval(isset($_GET['orgstruct_id'])?$_GET['orgstruct_id']:'0');
				$type = $_GET['type']?$_GET['type']:$_COOKIE['currenttype'];
				$orgSelect = $this->cyzt_companylist->getSelectHtml($parent_org_id);
				$info = $this->cyzt_companylist->getPerson($id);
				$info['type'] = $type;
				$this->assign('orgSelect',$orgSelect);
				$this->assign('info',$info);
				$this->assign('method','editPerson');
				$this->display('cyzt_companylist','editperson');
			}else{
				Util::alert_msg('非法数据，操作失败！','error','/cyzt_companylist/userlist.candor?type=company&org_id='.$org_id,3);
			}
		}
	}
	

	/* 激活用户。*/
	public function activePerson(){
		$id = isset($_GET['id'])?$_GET['id']:'0';
		$active = isset($_GET['active'])?$_GET['active']:0;
		if($active){
			$_GET['active'] = 0;
			$msg = '停用成功！';
		}else{
			$_GET['active'] = 1;
			$msg = '激活成功！';
		}
		$rs = $this->pdo->update($_GET,'sys_user','id='.$_GET['id']);
		if($rs){
			Util::alert_msg($msg,'succeed',$_SERVER['HTTP_REFERER'],1);
		}else{
			Util::alert_msg('操作失败！','error',$_SERVER['HTTP_REFERER'],100);
		}
	}

	/* 用户列表。*/
	public function userlist(){
		//print_r($_GET);exit;
		$orgstruct_id = isset($_GET['orgstruct_id'])?$_GET['orgstruct_id']:$_GET['parent_id'];
		$rs = $this->cyzt_companylist->getUserList($_GET);
		$orgSelect = $this->cyzt_companylist->getSelectHtml($orgstruct_id);

		$this->assign('user_name',isset($_GET['user_name'])?$_GET['user_name']:'');
		$this->assign('orgSelect',$orgSelect);
		$this->assign('orgstruct_id',$orgstruct_id);
		$this->assign('userlist',$rs['data']);
		$this->assign('splitPageStr',$rs['splitPageStr']);
		$this->display('cyzt_companylist','personList');
	}

	/* 用户授权 */
	public function authPerson(){
		$act = $_GET['action'];
		if ($act=="save"){
			$user_id = isset($_POST['user_id'])?$_POST['user_id']:0;
			//删除该用户的角色
			$rs = $this->pdo->remove('sys_roles_user','user_id='.$user_id);
			if(isset($_POST['selectuser']) && count($_POST['selectuser'])>0){
				foreach($_POST['selectuser'] as $v){
					$sysRu = array('role_id'=>$v,'user_id'=>$user_id);
					$rs = $this->pdo->add($sysRu,'sys_roles_user');
				}
				$msg = '授权成功！';
				Util::page_msg($msg,'succeed',$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			$id=intval(isset($_GET['user_id'])?$_GET['user_id']:0);
			$name = isset($_GET['name'])?$_GET['name']:'';
			//$sql = "select * from public.res_users where id=".$id;
			//$userInfo = $this->pdo->getRow($sql);

			//获取该用户的角色
			$sql = "select * from sys_roles_user where user_id=".$id;
			$userRole = $this->pdo->getAll($sql);
			//获取所有角色
			$sql = "select * from sys_roles";
			$roleList = $this->pdo->getAll($sql);
			foreach($roleList as $key=>$item){
				$roleList[$key]['checked'] = 0;
				foreach($userRole as $k=>$i){
					if($item['id']==$i['role_id']){
						$roleList[$key]['checked'] = 1;
					}
				}
			}

			$this->assign('user_id',$id);
			$this->assign('roleList',$roleList);
			$this->assign('name',$name);
			$this->display('cyzt_companylist','auth');
		}
	}


	/* 获取单位组织机构。*/
	public function ajaxGetCyOrgList(){
		$parent_id=intval(isset($_GET['root'])?$_GET['root']:0);
		// $sql = "select * from sys_orgstruct where parent_id=".$parent_id;//xyd-
		$sql = "select * from sys_orgstruct where flag=1";//xyd+
		$info = $this->pdo->getAll($sql);
		$jsontree = $this->cyzt_companylist->getSubCyOrgListByData($info,$parent_id);
		//print_r($jsontree);exit;
		/*数据形式形成树*/
		echo $jsontree;
	}

}
?>
