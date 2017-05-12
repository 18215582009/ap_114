<?php
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2013
 * @author      WJ
 * @package     CandorPHP
 * @version     control.php,v 1.4 $
 *
 * The methods of Class are as follows
 *
 * public index 页面浏览
 * public rolelist 角色列表
 * public editRole 编辑角色
 * public addRole 新增角色
 * public rightsGive 赋权
 * public delRole 删除角色 
 * public ajaxGetUserJson 获取用户json列表
 * public ajaxGetsearchres 获得json公司结构列表
 * public ajaxGetorgstructbyid 获得json公司结构下拉框
 * public additionrights 设置附加权限
 * public getmodulesPDF 导出方法（pdf）
 * public getrolesPDF 导出角色（pdf）
 *
 */
class cyzt_rolemanager extends SecuredControl
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
		$this->pdo = $this->cyzt_rolemanager->pdo;
	}

	/* index方法，也是默认的方法。*/
	public function index()
	{
		//print_r($_POST['GROUP_NAME']);exit;
		//$grpinfo = $this->cyzt_rolemanager->getGroups();
		$this->assign('firstgroup',1);
		$this->assign('header','角色管理');
		$this->display('cyzt_rolemanager','index');
	}

	/* 角色列表。*/
	public function rolelist()
	{
		$param = $_GET;
		//分页数据调取
		$orderField = isset($param['sort']) ? $param['sort'] : 'id';
		$orderValue = isset($param['flag']) ? $param['flag'] : 'asc';
		$page_info = "";
		$pageSize = 5;
		$offset = 0;
		$subPages=5;//每次显示的页数
		$currentPage = isset($param['page']) ? (int)$param['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		$where = ' where 1=1 ';
	   	if($param) {
			if(isset($param['name']) && $param['name'] != ""){
				$where .=" and name like '%{$param['name']}%'";
				$page_info.="name={$param['name']}&";
			}
				//echo $where;exit;
	    }
		$select_columns = "select %s from sys_roles %s %s";
	    $order = "order by $orderField $orderValue";
	    $sql = sprintf($select_columns,'*',$where,$order);
		$rs = $this->pdo->selectLimit($sql,$pageSize,$offset);
		$recordCount = $this->pdo->getCount();
		$page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$page_info,2);
		$splitPageStr=$page->get_page_html();
		foreach($rs as $key=>$item){
			//$rs[$key]['org_struct'] = $this->getOrgStruct($item['orgstruct_id']);
		}
		$this->assign('page_html',$splitPageStr);
		$this->assign('rolelist',$rs);
		$this->assign('header','角色管理');
		$this->display('cyzt_rolemanager','rolelist');
	}
	
	/*编辑角色*/
	public function editRole(){
		if($_GET['act']=='save'){
			//print_r($_POST);exit;
			$result=$this->cyzt_rolemanager->saveRole($_POST,'Update');
			$msg['res'] = 0;
			$msg['msg'] = '操作成功';
			Util::alert_msg($msg['msg'],'succeed',$_SERVER["HTTP_REFERER"].(strstr($_SERVER["HTTP_REFERER"],'?')?'&':'?').'reload=leftFrame',1);
		}else{
			$id = isset($_GET['id'])?$_GET['id']:0;
			$sql = "select * from sys_roles where id=".$id;
			$info = $this->pdo->getRow($sql);

			//获取角色已有功能
			$roleMethod = $this->pdo->getAll('select * from sys_roles_method where role_id='.$id);
			$selectRights = array();
			foreach($roleMethod as $item){
				$roleCode = $this->cyzt_rolemanager->getRoleCode($item);
				if($roleCode!='')$selectRights[] = $roleCode;
			}

			//生产权限树
			$sql = "select * from sys_project where project_code!=900";
			$projectList = $this->pdo->getAll($sql);
			foreach($projectList as $key=>$item){
				$rightslist = $this->pdo->getAll('select * from sys_module where project_code='.$item['project_code'].' and flag=1' );
				//print_r($rightslist);
				if(count($rightslist)){
					$onetree = $this->cyzt_rolemanager->getRightsJsonTree($rightslist,'0',$selectRights);
					//判断顶级是否选中
					$sql="select id from sys_roles_method where method_id is null and module_id is null and project_code=".$item['project_code'];
					$temp=$this->pdo->getRow($sql);
					$select=$temp?"select: true,":"";
					$jsontree .= '{title: "'.$item['project_name'].'", isFolder: true,'.$select.' key: "'.$item['project_code'].'", children:'.$onetree.'},';  
				}
			}
			$jsontree = '['.$jsontree.']';

			// xyd+s
			$userSelect = $this->pdo->getAll("select * from sys_roles_user where role_id=".$id);
			foreach($userSelect as $k=>$v){
				// $userlist[$k] = $this->pdo->getRow("select a.id,b.name from public.res_users as a left join public.res_partner as b on a.partner_id=b.id where a.id=".$v['user_id']);
				$userlist[$k] = $this->pdo->getRow("select id,true_name as name from sys_user where flag=1 and id=".$v['user_id']);
			}
			$this->assign("userlist",$userlist);
			//xyd+e
			
			$this->assign("jsontree",$jsontree);
			$this->assign('info',$info);
			$this->assign('method','editRole');
			$this->display('cyzt_rolemanager','editrole');
		}
	}
	
	/*添加角色*/
	public function addRole(){
		if($_GET['act']=='save'){
			$lastInsertId=$this->cyzt_rolemanager->saveRole($_POST);
			if($lastInsertId){
				$msg['msg'] = '添加成功！';
				Util::alert_msg($msg['msg'],'succeed','/cyzt_rolemanager/editRole.candor?id='.$lastInsertId.'&reload=leftFrame',1);
			}else{
				Util::alert_msg($msg['msg'],'warning',$_SERVER['HTTP_REFERER'],100);
			}
		}else{
			//生产权限树
			$sql = "select * from sys_project";
			$projectList = $this->pdo->getAll($sql);
			foreach($projectList as $key=>$item){
				$rightslist = $this->pdo->getAll('select * from sys_module where project_code='.$item['project_code']);
				if(count($rightslist)){
					$onetree = $this->cyzt_rolemanager->getRightsJsonTree($rightslist,'0');
					$jsontree .= '{id:"'.$item['project_code'].'",title: "'.$item['project_name'].'", isFolder: true, key: "'.$item['project_code'].'", children:'.$onetree.'},';  
				}
			}
			$jsontree = '['.$jsontree.']';

			$this->assign("jsontree",$jsontree);

			$this->assign("method","addRole");
			$this->display('cyzt_rolemanager','editrole');
		}
	}

	/*批量赋权*/
	public function rightsGive(){
		//$this->loadModel('cyzt_companylist');
		$act = isset($_GET['act'])?$_GET['act']:'add';
		if($act=='save'){
			$role_id = $_POST['id'];
			//删除角色是否已经授予该用户
			$rs = $this->pdo->remove('sys_roles_user','role_id='.$role_id);
			if(isset($_POST['selectuser']) && count($_POST['selectuser'])>0){
				foreach($_POST['selectuser'] as $v){
					$user = explode("_",$v);
					$sysRu = array('role_id'=>$role_id,'user_id'=>$user[1]);
					$rs = $this->pdo->add($sysRu,'sys_roles_user');
				}
				$msg = '授权成功！';
				// Util::page_msg($msg,'succeed',$_SERVER['HTTP_REFERER'],3);
				Util::alert_msg($msg,'succeed',$_SERVER['HTTP_REFERER'],1);
			}
		}else{
			$role_id = intval(isset($_GET['id'])?$_GET['id']:0);
			if($role_id){
				$roleInfo = $this->pdo->getRow('select * from sys_roles where id='.$role_id);

				//获取角色已有功能
				$roleMethod = $this->pdo->getAll('select * from sys_roles_method where role_id='.$role_id);
				$selectRights = array();
				foreach($roleMethod as $item){
					$roleCode = $this->cyzt_rolemanager->getRoleCode($item);
					if($roleCode!='')$selectRights[] = $roleCode;
				}

				//生产权限树
				$sql = "select * from sys_project";
				$projectList = $this->pdo->getAll($sql);
				foreach($projectList as $key=>$item){
					$rightslist = $this->pdo->getAll('select * from sys_module where project_code='.$item['project_code']);
					if(count($rightslist)){
						$onetree = $this->cyzt_rolemanager->getRightsJsonTree($rightslist,'0',$selectRights,true);//xyd-
						// $onetree = $this->cyzt_rolemanager->getRightsJsonTree($rightslist,'0',$selectRights);//xyd+
						$sql="select id from sys_roles_method where method_id is null and module_id is null and project_code=".$item['project_code'];
						$info=$this->pdo->getRow($sql);
						$select=$info?"select: true,":"";
						$jsontree .= '{id:"'.$item['project_code'].'",title: "'.$item['project_name'].'", unselectable: true, isFolder: true,'.$select.' key: "'.$item['project_code'].'", children:'.$onetree.'},';  
					}
				}
				$jsontree = '['.$jsontree.']';
				
				/*以下获取角色当前用户所能操作的系统*/
				$userSelect = $this->pdo->getAll("select * from sys_roles_user where role_id=".$role_id);
				$userSelectJson = "{";

				foreach($userSelect as $key=>$val){
					// $oeUserInfo = $this->pdo->getRow("select a.id,b.name from public.res_users as a left join public.res_partner as b on a.partner_id=b.id where a.id=".$val['user_id']);
					$oeUserInfo = $this->pdo->getRow("select id,true_name as name from sys_user where flag=1 and id=".$val['user_id']);
					if(count($userSelect)==$key+1){
						$userSelectJson .= '"uid_'.$val['user_id'].'":"'.$oeUserInfo['name'].'",';
						// $userSelectJson .= '"uid_'.$val['user_id'].'_title":"'.$oeUserInfo['name'].'",';
					}else{
						$userSelectJson .= '"uid_'.$val['user_id'].'":"'.$oeUserInfo['name'].'",';
						// $userSelectJson .= '"uid_'.$val['user_id'].'_title":"'.$oeUserInfo['name'].'",';
					}
				}

				$userSelectJson .= "}";
				$this->assign('userSelectJson',$userSelectJson);

				//获取组织结构
				$this->loadModel('cyzt_companylist');
				$orgSelect = $this->cyzt_companylist->getSelectHtml(0);

				$this->assign("orgSelect",$orgSelect);
				$this->assign("jsontree",$jsontree);
				$this->assign("roleInfo",$roleInfo);
				$this->display("cyzt_rolemanager","rightsgive");
			}else{
				Util::alert_msg('非法操作！',$_SERVER['HTTP_REFERER'],3);
			}
		}
	}

	/*删除角色*/
	public function delRole()
	{
		$role_id = isset($_GET['id'])?$_GET['id']:0;
		$roleuserList = $this->cyzt_rolemanager->getRolesUser($_GET['groupid']);
		if (count($userlist)>0)
		{
			$msg['msg'] = '该角色已赋权给用户，请取消角色授权用户后，再尝试！';
			Util::alert_msg($msg['msg'],'alert','/cyzt_rolemanager/editrole.candor?groupid='.$_GET['groupid'].'&type=view',100);			
		}
		else
		{
			//$result = $this->ado->Remove('sys_roles_method','role_id='.$role_id);
			// $data["flag"]=0;
			// $result = $this->pdo->update($data,'sys_roles','flag!=0 and id='.$role_id);
			$result = $this->pdo->remove('sys_roles','id='.$role_id);
			Util::alert_msg('删除角色成功！','succeed','/cyzt_rolemanager/rolelist.candor',1);
			/*
			if($result){
				$msg = '删除角色成功！';
				Util::page_msg($msg,'succeed','/cyzt_rolemanager/rolelist.candor',3);
			}else{
				$msg = '删除角色失败！';
				Util::page_msg($msg,'warning','/cyzt_rolemanager/rolelist.candor',3);
			}
			*/
		}
	}
	
	/* 获取用户json列表 */
	public function ajaxGetUserJson(){
		$org_id=$_POST['org_id'];
		$user_name=urldecode($_POST['user_name']);
		$where=" where is_admin!=1 and flag=1";
		if($org_id){
			$this->loadModel('cyzt_companylist');
			$info= $this->cyzt_companylist->getOrgList($org_id);
			$info="$org_id,";
			$info=substr($info,strlen($info)-1,1)==','?substr($info,0,-1):$info;
			$where.=" and orgstruct_id in (".$info.")";
		}		
		$where.=$user_name?" and (true_name like '%".$user_name."%' or user_name like '%".$user_name."%')":"";
		// $where=$where?" where ".$where:"";
		$sql="select id,true_name as name from sys_user".$where;
		$record = $this->pdo->getAll($sql);
		// $record=eval('return '.iconv("gbk","UTF-8",var_export($userlist['data'],true).';'));
		echo json_encode($record);
	}

	/* -----------------------未处理------------------------------- */
	private function getRoleBySearch(){
		$params['USERNAME'] = $_SESSION['userRelateInfo']['LOGIN_ID'];
		$params['PASSWORD'] = $_SESSION['userRelateInfo']['PASSWORD'];
		if($_POST['orgname']){
			$params['Condition'] = "and orgname like '%".$_POST['orgname']."%'";
		}else {
			$params['Condition'] = "and id>0";
		}
		$info = $this->soap->getSqlidInfo('getOrgStruct',$params);
		$this->assign("companylist",$info);
	}
	
	/*获取某一应用系统的权限列表*/
	private function getModuleRights($appnamestr){
		$params['USERNAME'] = $_SESSION['userRelateInfo']['LOGIN_ID'];
		$params['PASSWORD'] = $_SESSION['userRelateInfo']['PASSWORD'];
		$params['Condition'] = " and appname in (".$appnamestr.")";
		//print_r($params);exit;
		$rightslist = $this->soap->getSqlidInfo('getModuleRights',$params);
		//print_r($rightslist);exit;
		foreach ($rightslist as $k=>$v){
			if($v['PARENT_ID']==10000){
				$id=$v['ID'];
				break;
			}
		}
		$selectstr = '<select name="orgid">';
		$selectstr .= $this->getRightsTree($rightslist,$id,1);
		$selectstr .='</select>';
		return $rightslist;
	}
	
	private function getRightsTree($tree,$id,$level){
		$selectstr = "";
		foreach ($tree as $k=>$v){
			if($v["PARENT_ID"]==$id){
				$showtype = "";
				for ($i=0;$i<$level;$i++){
					$showtype .= '&nbsp;&nbsp;';
				}
				$showtype .= '|--';
				$selectstr .= '<option value="'.$v["ID"].'">'.$showtype.$v["RIGHT_NAME"].'</option>';
				$j=0;
				foreach ($tree as $k1=>$v1){
					if($v1["PARENT_ID"]==$v["ID"]){
						$j=1;break;
					}
				}
				if($j>0){
					unset($tree[$k]);
					$selectstr .= $this->getSelectOrgStruct($tree,$v["ID"],$level+1);
				}
			}
		}
		return $selectstr;
	}

	/*获取用户能操作的系统集合*/
	private function getusersystem(){
		$params['USERNAME'] = $_SESSION['userRelateInfo']['LOGIN_ID'];
		$params['PASSWORD'] = $_SESSION['userRelateInfo']['PASSWORD'];
		$params['Condition'] = " and a.userid=".$_SESSION['userRelateInfo']['USERID'];

		$groupslist = $this->soap->getSqlidInfo('getUserSystem',$params);
		$res = array();
		foreach ($groupslist as $k=>$v){
			$tmp = explode(";",$v["APPNAME"]);
			$res = array_merge($res,$tmp);
		}
		$res = array_unique($res);
		$res = array_values($res);
		foreach ($res as $k=>$v){
			if($v===""){
				unset($res[$k]);
			}
		}
		$res = array_values($res);
		return $res;
	}
	
	private function getSelectOrgStruct($tree,$orgid,$level,$selectorgid=0){
		$selectstr = "";
		foreach ($tree as $k=>$v){
			if($v["PARENTID"]==$orgid){
				$showtype = "";
				for ($i=0;$i<$level;$i++){
					$showtype .= '&nbsp;&nbsp;';
				}
				$showtype .= '|--';
				if($selectorgid==$v["ID"])$selectstr .= '<option value="'.$v["ID"].'" selected>'.$showtype.$v["ORGNAME"].'</option>';
				else $selectstr .= '<option value="'.$v["ID"].'">'.$showtype.$v["ORGNAME"].'</option>';
				$j=0;
				foreach ($tree as $k1=>$v1){
					if($v1["PARENTID"]==$v["ID"]){
						$j=1;break;
					}
				}
				if($j>0){
					unset($tree[$k]);
					$selectstr .= $this->getSelectOrgStruct($tree,$v["ID"],$level+1,$selectorgid);
					
				}
			}
		}
		return $selectstr;
	}
	
	/*获得json公司结构列表*/
	public function ajaxGetsearchres(){
		$this->loadModel('cyzt_companylist');
		$companylist = $this->cyzt_companylist->getCompanyBySearch();
		echo json_encode($companylist);
	}

	/*获得json公司结构下拉框*/
	public function ajaxGetorgstructbyid(){
		$params['USERNAME'] = $_SESSION['userRelateInfo']['LOGIN_ID'];
		$params['PASSWORD'] = $_SESSION['userRelateInfo']['PASSWORD'];
		$params['ORGID'] = $_POST['ORGID'];
		$rightslist = $this->soap->getSqlidInfo('getOrgStructByOrgId',$params);
		$selectstr = '<select name="PARENTID" id="PARENTID" class="input-medium">';
		foreach ($rightslist as $k=>$v){
			if($v['ID']==$_POST['ORGID']){
				$selectstr .= '<option value="'.$v["ID"].'">|--'.$v["ORGNAME"].'</option>';
				$id=$v['ID'];
				break;
			}
		}
		$selectstr .= $this->getSelectOrgStruct($rightslist,$id,1,$id);
		$selectstr .='</select>';
		echo $selectstr;
	}

	/*设置附加权限*/
	public function additionrights(){
		//print_r($_GET);exit;
		$_GET['vnodeid'] = !empty($_GET['nodeid']) ? $_GET['nodeid'] :  $_GET['vnodeid'] ;
		$_GET['vnodename'] = !empty($_GET['vnodename']) ? $_GET['vnodename'] :  $_GET['nodename'] ;
		$act = $_GET['act'];
		if($act=='dosave')
		{
			if (!empty($_GET["addrightslist"]))
			{
				$result=$this->cyzt_rolemanager->saveaddrights($_GET);
				if (!empty($result['lastappendid'])){
					echo 1;
				}else
				{
					echo 0;
				}
				//$msg['res'] = 0;
				//$msg['msg'] = '操作成功';
				//Util::page_msg($msg['msg'],'succeed','/cyzt_rolemanager/editrole.candor?groupid='.$result['lastappendid'].'&type=view',3);
			}
		}
		else{
			$params['Condition'] = " and ID=".$_GET['vnodeid'];
			$modulelist = $this->soap->getSqlidInfo('getModuleRights',$params);

			if (count($modulelist)>0)
			{
				$appname=$modulelist[0]['APPNAME'];
			}

			if(!empty($appname))
			{ 
				$appname = "房屋登记系统";
				$params['Condition'] = " bizname='".$appname."'";
				$xmllist = $this->soap->getSqlidInfo('Select_AdditionRights',$params);
				$xmlpath = $xmllist[0]['XMLPATH'];		
			}
			$xml_file=$this->app->getModuleRoot().$this->app->getModuleName().$xmlpath;

			//$params['Condition'] = " and PARENT_ID=".$_GET['vnodeid'];
			//$rightlist = $this->soap->getSqlidInfo('getModuleRights',$params);

			//$rightid = $rightlist[0]['ID'];
			$addrightjsontree = $this->getxml($xml_file,$_GET['vnodeid'],$_GET['group_id'],$_GET['vnodename']);
			//if (empty($addrightjsontree))
			//{
				//Util::alert_msg('当前选择节点未配置附加权限','warning','/cyzt_rolemanager/editrole.candor?groupid='.$_GET['group_id'].'&type=view',3);
			//}
			$this->assign("vnodename",$_GET['vnodename']);
			$this->assign("vnodeid",$_GET['vnodeid']);
			$this->assign("group_id",$_GET['group_id']);
			$this->assign("addrightjsontree",$addrightjsontree?$addrightjsontree:"0");
			$this->display('cyzt_rolemanager','additionrights');
		}
	}

	private function getxml($xml_file,$rightid,$group_id,$node_name){
		/*获取当前节点已有的附加权限*/
		$params['GROUP_ID'] = $group_id;
		$params['RIGHT_ID'] = $rightid;
		
		$rightaddlist = $this->soap->getSqlidInfo('get_rightsaddByGroupid',$params);
		//print_r($rightaddlist);exit;
		$addlist = explode(";",$rightaddlist[0]['RIGHTSADD']);
		foreach($addlist as $key => $val)
		{
			preg_match_all("/\((.*)\)/", $val, $tmpstr);
			$rightaddstr .= $tmpstr[1][0] . ',';
		}
		//$rightaddstr = substr($rightaddstr,0,-1);
		//print_r($rightaddstr);exit;
		//preg_match_all("/\((.*)\)/", $rightaddlist[0]['RIGHTSADD'], $tmpstr);
		//$rightaddstr = $tmpstr[1][0];
		$rightaddstr = substr($rightaddstr,0,-3);
		$rightlist = explode("[],",$rightaddstr);
		//print_r($rightlist);exit;
		$xml = simplexml_load_file($xml_file);

		foreach ($xml->biz as $tmp){
			$tmp_name = $tmp->attributes()->name;
			if($tmp_name==$node_name){
				$addrightjsontree = '[';
				foreach ($tmp->list as $tmp_list){
					$attrname = $tmp_list->attributes()->name;
					$attrkeyfield = $tmp_list->attributes()->keyfield;
					$attrkeyname = $tmp_list->attributes()->keyname;
					$attrsqlid = $tmp_list->attributes()->sqlid;
					if(!empty($tmp_list->params))
					{
						foreach ($tmp_list->params as $tmp_params)
						{
						    $attrparamsname = (string)$tmp_params->attributes()->name;
							$params[$attrparamsname] = (string)$tmp_params;
							//print_r($params);exit;
							
						}
						$addrightlist = $this->soap->getSqlidInfo($attrsqlid,$params);
						if(count($addrightlist)>0)
						{
							$resultjsontree = $this->cyzt_rolemanager->getaddRightsJsonTree($attrname,$attrkeyname,$addrightlist,$rightlist);
		
							$addrightjsontree .= $resultjsontree;
						}
					}
					else
					{
						//直接执行SQLid
						$addrightlist = $this->soap->getSqlidInfo($attrsqlid,$params);
						if(count($addrightlist)>0)
						{
							$resultjsontree = $this->cyzt_rolemanager->getaddRightsJsonTree($attrname,$attrkeyname,$addrightlist,$rightlist);		
							$addrightjsontree .= $resultjsontree;
						}						
					}
				}
				//print_r($addrightjsontree);exit;
				$addrightjsontree = substr($addrightjsontree,0,-1);//print_r($addrightjsontree);exit;
				$addrightjsontree .=']';

				//print_r($addrightjsontree);exit;
				
				
			}
		}
		return $addrightjsontree;
	}

	/*导出方法（pdf）*/
	public function getmodulesPDF(){
		ini_set('max_execution_time','1200');//设置最大响应时间
		ini_set('memory_limit', '1280M');//设置最大内存开销
		ob_end_clean();//清空缓冲区并关闭输出缓冲
		$sql_modules='select id,module_name,method,method_name from sys_method order by module_name';
		$modules=$this->pdo->getAll($sql_modules);
		// $modules=eval('return '.iconv("gbk","UTF-8",var_export($re_modules,true).';'));
		//pdf设置
		require_once('../../../lib/tcpdf/tcpdf.php');//包含pdf关键类
		$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
		// 设置文档信息
		$pdf->SetCreator('川大软件');//作者
		$pdf->SetAuthor('cw');//文档作者
		$pdf->SetTitle('齐套件展示');//文档标题
		$pdf->SetSubject('总装生产线系统');//文件主题
		$pdf->SetKeywords('生产线,川大软件,CandorPHP'); //关键词
		// 设置页眉和页脚信息
		$pdf->SetHeaderData('logo_example.gif', 10, '', '', array(128,128,128), array(128,128,128));
		$pdf->setFooterData(array(128,128,128), array(128,128,128)); 
		// 设置页眉和页脚字体
		$pdf->setHeaderFont(Array('stsongstdlight', '', '10'));
		$pdf->setFooterFont(Array('stsongstdlight', '', '8')); 
		// 设置默认等宽字体
		$pdf->SetDefaultMonospacedFont('courier'); 
		// 设置间距
		$pdf->SetMargins(15, 27, 15);//定义左，上，右边距
		$pdf->SetHeaderMargin(5);//页眉边距
		$pdf->SetFooterMargin(10); //页脚边距
		// 设置分页
		$pdf->SetAutoPageBreak(TRUE, 25); 
		// 设置图像缩放比例
		$pdf->setImageScale(1.25); 
		// 设置默认支持所有字体文件
		$pdf->setFontSubsetting(true); 
		// 设置一些语言相关的字符串（可选）页脚自动添加 '页面'两个字
		 if (@file_exists('../../../lib/tcpdf/examples/lang/chi.php')) {
			require_once('../../../lib/tcpdf/examples/lang/chi.php');
			$pdf->setLanguageArray($l);
		}
		
		$pdf->AddPage();
		$pdf->SetFont('stsongstdlight', '', 10);//设置字体
		$table='<table  cellpadding="0" cellspacing="0" border="2" style="text-align:center;line-height:35px" id="table-table" width="100%">
						<thead>
							<tr>
								<th>序号</th>
								<th>模块名</th>
								<th>权限名称</th>
							</tr>
						</thead>
					<tbody> ';
		foreach($modules as $v){
			$table.='<tr>
							<td>'.$v['id'].'</td>
							<td >'.$v['module_name'].'</td>
							
							<td >'.$v['method_name'].'</td>	
						</tr>';
		}
		$table.='</tbody>
				</table>';  		
		$pdf->writeHTML($table, true, false, true, false, 'C');
		$pdf->lastPage();
		
		$pdf->Output(date('YmdHis',time()).'.pdf', 'D');			
	}

	/*导出角色（pdf）*/
	public function getrolesPDF(){
		ini_set('max_execution_time','1200');//设置最大响应时间
		ini_set('memory_limit', '1280M');//设置最大内存开销
		ob_end_clean();//清空缓冲区并关闭输出缓冲
		$sql_roles="select a.name,c.module_name,c.method,c.method_name,c.id from sys_roles as a left join sys_roles_method as b on a.id=b.role_id left join sys_method as c on c.id=b.method_id order by a.name";
		$re_roles=$this->pdo->getAll($sql_roles);
		foreach($re_roles as $key=>$v){
			if(empty($v['id'])){
				unset($re_roles[$key]);
			}
		}
		$roles=eval('return '.iconv("gbk","UTF-8",var_export($re_roles,true).';'));
		
		//pdf设置
		require_once('../../../lib/tcpdf/tcpdf.php');//包含pdf关键类
		$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
		// 设置文档信息
		$pdf->SetCreator(iconv('gbk','UTF-8','川大软件'));//作者
		$pdf->SetAuthor(iconv('gbk','UTF-8','cw'));//文档作者
		$pdf->SetTitle(iconv('gbk','UTF-8','齐套件展示'));//文档标题
		$pdf->SetSubject(iconv('gbk','UTF-8','总装生产线系统'));//文件主题
		$pdf->SetKeywords(iconv('gbk','UTF-8','生产线,川大软件,CandorPHP')); //关键词
		// 设置页眉和页脚信息
		$pdf->SetHeaderData('logo_example.gif', 10, iconv("gbk","UTF-8",''), iconv("gbk","UTF-8",'西南物理研究所'), array(128,128,128), array(128,128,128));
		$pdf->setFooterData(array(128,128,128), array(128,128,128)); 
		// 设置页眉和页脚字体
		$pdf->setHeaderFont(Array('stsongstdlight', '', '10'));
		$pdf->setFooterFont(Array('stsongstdlight', '', '8')); 
		// 设置默认等宽字体
		$pdf->SetDefaultMonospacedFont('courier'); 
		// 设置间距
		$pdf->SetMargins(15, 27, 15);//定义左，上，右边距
		$pdf->SetHeaderMargin(5);//页眉边距
		$pdf->SetFooterMargin(10); //页脚边距
		// 设置分页
		$pdf->SetAutoPageBreak(TRUE, 25); 
		// 设置图像缩放比例
		$pdf->setImageScale(1.25); 
		// 设置默认支持所有字体文件
		$pdf->setFontSubsetting(true); 
		// 设置一些语言相关的字符串（可选）页脚自动添加 '页面'两个字
		 if (@file_exists('../../../lib/tcpdf/examples/lang/chi.php')) {
			require_once('../../../lib/tcpdf/examples/lang/chi.php');
			$pdf->setLanguageArray($l);
		}
		
		$pdf->AddPage();
		$pdf->SetFont('stsongstdlight', '', 10);//设置字体
		$table='<table  cellpadding="0" cellspacing="0" border="2" style="text-align:center;line-height:35px" id="table-table" width="100%">
						<thead>
							<tr>
								<th>'.iconv('gbk','UTF-8','序号').'</th>
								<th>'.iconv('gbk','UTF-8','角色名').'</th>
								<th>'.iconv('gbk','UTF-8','模块名').'</th>
								<th>'.iconv('gbk','UTF-8','权限名称').'</th>
							</tr>
						</thead>
					<tbody> ';
		 foreach($roles as $v){
			$table.='<tr>
							<td>'.$v['id'].'</td>
							<td>'.$v['name'].'</td>
							<td >'.$v['module_name'].'</td>
						
							<td >'.$v['method_name'].'</td>	
						</tr>';
		}
		$table.='</tbody>
				</table>';  		
		$pdf->writeHTML($table, true, false, true, false, 'C');
		$pdf->lastPage();
		
		$pdf->Output(date('YmdHis',time()).'.pdf', 'D');
		/* $this->assign('modules',$re_roles);
		$this->display('cyzt_rolemanager','examine'); */
	}
}
?>
