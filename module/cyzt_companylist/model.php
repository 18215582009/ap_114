<?php
/**
 * The model file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2012
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     : model.php,v 1.4 2012/06/16 21:53:49 ld Exp $
 */
?>
<?php
class cyzt_companylistModel extends model
{

	/**
	 * pdo连接。
	 * 
	 * @var object
	 * @access pdo
	 */
	public $pdo;

    public function __construct()
    {
        parent::__construct();
		$data_driver_class=$this->config->db->driverMode;
		$this->pdo = new $data_driver_class($this->config->db);
    }

    function stat()
    {
        return get_included_files();
    }

	/* 获取公司 */
	public function getCompanyBySearch(){
		if($_POST['org_name']){
			$where = "and flag=1 and org_name like '%".$_POST['org_name']."%'";
		}else {
			$where = "and flag=1 and parent_id=0";
		}
		$sql = "select * from sys_orgstruct where 1=1 ".$where;
		if($_SESSION['ISADMIM']==1){//管理员获取所有公司
			$info = $this->pdo->getAll($sql);
		}elseif ($_SESSION['userRelateInfo']['ISALLHSUSER']==-2){//获取能操作的公司
			$info = $this->pdo->getAll($sql);
		}else{//获取自己所在公司
			//$info = $this->soap->getSqlidInfo('getHsuserByMyUserId',$params);
			$info = $this->pdo->getAll($sql);
		}
		return $info;
	}

	/*构造组织机构HTML*/
	public function getSelectHtml($parent_id,$type='add'){
		$selectstr = '<select name="parent_id" id="parent_id" class="input-medium">';
		$selectstr .= '<option value="0" selected="selected">请选择</option>';
		$sql = "select * from sys_orgstruct where flag=1";
		$info = $this->pdo->getAll($sql);
		$selectstr .= $this->getSelectOrgStruct($info,0,1,$parent_id);
		$selectstr .="</select>";
		//print_r($selectstr);exit;
		return $selectstr;
	}
	
	private function getSelectOrgStruct($tree,$parent_id,$level,$current_id){
		$selectstr = "";
		foreach ($tree as $k=>$v){
			if($v["parent_id"]==$parent_id){
				$showtype = "";
				for ($i=0;$i<$level;$i++){
					$showtype .= '&nbsp;&nbsp;';
				}
				$showtype .= '|--';

				//print_r($selectorgid);exit;
				if($current_id==$v["id"]){
					$selectstr .= '<option  value="'.$v["id"].'" selected>'.$showtype.$v["org_name"].'</option>';
				}else{
					$selectstr .= '<option value="'.$v["id"].'">'.$showtype.$v["org_name"].'</option>';
				}
				$j=0;
				foreach ($tree as $k1=>$v1){
					if($v1["parent_id"]==$v["id"]){
						$j=1;break;
					}
				}
				if($j>0){
					unset($tree[$k]);
					// $selectstr .= $this->getSelectOrgStruct($tree,$v["org_id"],$level+1,$current_id);//xyd-
					$selectstr .= $this->getSelectOrgStruct($tree,$v["id"],$level+1,$current_id);//xyd+
				}
			}
		}
		return $selectstr;
	}

	/* 获取公司详细信息 */
	public function getCompany($company_id){
		$sql = "select * from sys_company where id=".$company_id;
		$rs = $this->pdo->getRow($sql);
		return $rs;
	}

	/* 获取公司详细信息 */
	public function getDepartment($department_id){
		$sql = "select * from sys_department where id=".$department_id;
		$rs = $this->pdo->getRow($sql);
		return $rs;
	}

	/* 获取岗位详细信息 */
	public function getJob($poststation_id){
		$sql = "select * from sys_poststation where id=".$poststation_id;
		$rs = $this->pdo->getRow($sql);
		return $rs;
	}
	/* 获取个人详细信息 */
	public function getPerson($person_id){
		$sql = "select * from sys_user where flag=1 and id=".$person_id;
		$rs = $this->pdo->getRow($sql);
		$rs["password"]=Util::decrypt($rs["password"]);
		return $rs;
	}

	/*数据形式形成树*/
	public function getSubCyOrgListByData($tree,$orgid){
		$jsontree = '[';
		$i = 0;
		foreach ($tree as $k=>$v){
			if($v["parent_id"]==$orgid){
				$type = "company";
				if($v["type"]=='department')$type="folder";
				if($v["type"]=='job')$type="file";
				$jsontree .= '{"id":'.$v["id"].',"text":"'.$v["org_name"].'","org_id":'.$v["org_id"].',"parent_id":'.$v["parent_id"].',"type":"'.$type.'"';
				$j=0;
				foreach ($tree as $k1=>$v1){
					if($v1["parent_id"]==$v["id"]){
						$j=1;break;
					}
				}
				if($j>0){
					$jsontree .= ',"expanded": false,"children":';
					unset($tree[$k]);
					$jsontree .= $this->getSubCyOrgListByData($tree,$v["id"]);
				}
				$i = 1;
				$jsontree .= '},';
			}
		}
		if($i==1){
			$jsontree = substr($jsontree,0,-1);
		}
		$jsontree .=']';
		return $jsontree;
	}

	/*  save部门。*/
	public function saveDepartment($record,$act='add'){
		if($act=='add'){
			unset($record['id']);
			$record['company_id'] = $record['parent_id'];
			//新增部门信息sys_department
			$lastInsertId = $this->pdo->add($record,'sys_department');
			//新增组织结构信息
			$org = array('org_name'=>$record['name'],
						 'type'=>'department',
						 'parent_id'=>$record['parent_id'],
						 'flag'=>1,
						 'relate_table'=>'sys_department',
						 'org_id'=>$lastInsertId);
			$result = $this->pdo->add($org,'sys_orgstruct');
			return $result;
		}else{
			$rlt1 = $this->pdo->update($record,'sys_department','id='.$record['id']);
			$org = array('org_name'=>$record['short_name'],'parent_id'=>$record['parent_id']);//xyd-
			$org = array('org_name'=>($record['short_name']?$record['short_name']:$record['name']),'parent_id'=>$record['parent_id']);//xyd+
			$rlt2 = $this->pdo->update($org,'sys_orgstruct',"relate_table='sys_department' and org_id=".$record['id']);
			return $rlt2;
		}
	}
	
	/* save岗位。*/
	public function saveJob($record,$act='add'){
		if($act=='add'){
			unset($record['id']);
			// $record['company_id'] = $record['parent_id'];
			//新增部门信息sys_department
			$lastInsertId = $this->pdo->add($record,'sys_poststation');
			//新增组织结构信息
			$org = array('org_name'=>$record['name'],
						 'type'=>'job',
						 'parent_id'=>$record['parent_id'],
						 'flag'=>1,
						 'relate_table'=>'sys_poststation',
						 'org_id'=>$lastInsertId);
			$result = $this->pdo->add($org,'sys_orgstruct');
			return $result;
		}else{
			$rlt1 = $this->pdo->update($record,'sys_poststation','id='.$record['id']);
			$org = array('org_name'=>$record['short_name'],'parent_id'=>$record['parent_id']);//xyd-
			$org = array('org_name'=>($record['short_name']?$record['short_name']:$record['name']),'parent_id'=>$record['parent_id']);//xyd+
			$rlt2 = $this->pdo->update($org,'sys_orgstruct',"relate_table='sys_poststation' and org_id=".$record['id']);
			return $rlt2;
		}
	}

	/* save人员。*/
	public function savePerson($record,$act='add'){
		//print_r($record);exit;
		//判断用户名是否存在
		$sql="select id from sys_user where user_name='".strtoupper($record["user_name"])."'";
		$user_info=$this->pdo->getRow($sql);
		if(($act=='add'&&$user_info)||($act!='add'&&$user_info["id"]!=$record['id'])){
			$res["res"]=0;
			$res["msg"]="用户名已存在！";
		}else if($_SESSION["isadmin"]=="0"&&$record["user_type"]=="1"){
			$res["res"]=0;
			$res["msg"]="你操作该用户类型的权限！";
		}else{
			$record['user_name']=strtoupper($record['user_name']);
			$record["write_date"]=time();
			$record["write_uid"]=$_SESSION['uid'];
			$record["password"]=Util::encrypt($record["password"]);
			if($act=='add'){
				unset($record['id']);

				$record["create_uid"]=$_SESSION['uid'];
				$record["create_date"]=time();
				
				$record["status"]=1;
				$record["is_admin"]=0;
				$record["flag"]=1;	
				
				$record['orgstruct_id'] = $record['parent_id']?$record['parent_id']:$record['orgstruct_id'];
				$insert_Id = $this->pdo->add($record,'sys_user');
				$res["res"]=$insert_Id;
				$res["msg"]=$insert_Id?"":"新增用户失败！";
			}else{
				$record['orgstruct_id'] = $record['parent_id'];
				$Affected_Rows= $this->pdo->update($record,'sys_user','id='.$record['id']);
				$res["res"]=$Affected_Rows;
				$res["msg"]=$Affected_Rows?"":"更新用户失败！";
			}
		}
		return $res;
	}

	/* 获取搜索用户列表 */
	public  function getUserList($param){
		//分页数据调取
		$orderField = isset($param['sort']) ? $param['sort'] : 'id';
		$orderValue = isset($param['flag']) ? $param['flag'] : 'asc';
		$page_info = "";
		$pageSize = 5;
		$offset = 0;
		$subPages=5;//每次显示的页数
		$currentPage = isset($param['page']) ? (int)$param['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		$where = ' where is_admin!=1 and flag=1 ';
	   	if($param) {
			$param['orgstruct_id'] = isset($param['orgstruct_id'])?$param['orgstruct_id']:$param['parent_id'];
			//处理搜索条件
			if(isset($param['orgstruct_id']) && $param['orgstruct_id']>0){
				//根据orgstruct_id从sys_orgstruct表中获取对应的孩子orgstruct_id;
				$orgstruct_id = $param['orgstruct_id'];
				$orgList = $this->getOrgList($orgstruct_id);
				if($orgList==''){
					$where .=" and orgstruct_id=".$orgstruct_id;
				}else{
					$orgList=substr($orgList,strlen($orgList)-1,1)==','?substr($orgList,0,-1):$orgList;
					$where .=" and orgstruct_id in($orgstruct_id,".$orgList.")";
				}
				$page_info.="orgstruct_id={$param['orgstruct_id']}&";
			}
			if(isset($param['user_name']) && $param['user_name'] != ""){
				$where .=" and user_name like '%{$param['user_name']}%'";
				$page_info.="user_name={$param['user_name']}&";
			}
			if(isset($param['true_name']) && $param['true_name'] != ""){
				$where .=" and true_name like '%{$param['true_name']}%'";
				$page_info.="true_name={$param['true_name']}&";
			}
				//echo $where;exit;
	    }
		$select_columns = "select %s from sys_user %s %s";
	    $order = "order by $orderField $orderValue";
	    $sql = sprintf($select_columns,'*',$where,$order);
		$rs['data'] = $this->pdo->selectLimit($sql,$pageSize,$offset);
		$recordCount = $this->pdo->getCount();
		$page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$page_info,2);
		$rs['splitPageStr']=$page->get_page_html();
		foreach($rs['data'] as $key=>$item){
			if($item['orgstruct_id']>0){
				$rs['data'][$key]['org_struct'] = $this->getOrgStruct($item['orgstruct_id']);
			}
		}

		return $rs;
	}

	/* 获取组织机构 */
	private function getOrgStruct($orgstruct_id){
		$orgStr = "";
		$sql = "select org_id,org_name,parent_id from sys_orgstruct where id=".$orgstruct_id;
		$orgStruct = $this->pdo->getRow($sql);
		$orgStr = $orgStruct['org_name'];
		if($orgStruct['parent_id']>0){
			$t=$this->getOrgStruct($orgStruct['parent_id']);
			$orgStr =$t."<i class='icon-bar-right icon-blue'></i>".$orgStr;
		}
		return $orgStr;
	}

	/* 根据组织id，获取父级id */
	public function getOrgStructId($id){
		$sql = "select id from sys_orgstruct where org_id=".$id;
		$orgstruct = $this->pdo->getRow($sql);
		return $orgstruct['id'];
	}

	/* 递归获取公司组织结构org_id列表-Array */
	public function getOrgList($orgstruct_id){
		$sql = "select id,org_id from sys_orgstruct where parent_id=".$orgstruct_id;
		$info = $this->pdo->getAll($sql);
		$orglist = '';
		if(count($info)>0){
			foreach ($info as $k=>$v){
				$orglist .= $v['id'].",";
				$orglist .= $this->getOrgList($v["id"]);
			}
		}
		// $orglist = substr($orglist,0,-1);
		// $orglist = substr($orglist,strlen($orglist)-1,1)==','?substr($orglist,0,-1):$orglist;
		return $orglist;
	}

	//级联删除公司、部门、岗位等信息
	function delOrgstruct($relate_table,$relate_id){
		$info=$this->pdo->getRow("select * from sys_orgstruct where relate_table='$relate_table' and org_id=".$relate_id);
		if($info){
			$del_info=$this->getOrgInfo($info['id']);
			$del_info[$relate_table].=",".$relate_id;
			$del_info['sys_orgstruct'].=",".$info['id'];
		}
		$result['res']=0;
		$result['msg']='';
		$data['flag']=0;
		foreach ($del_info as $k => $v) {
			$t=$this->pdo->update($data,$k,'flag!=0 and id in('.substr($v,1).')');
			$result['res']=$result['res']+($t?(int)$t:0);
		}
		return $result;
	}

	//获得组织机构结构数据用于删除
	function getOrgInfo($org_id){
		$info=$this->pdo->getAll("select * from sys_orgstruct where parent_id=".$org_id);
		if($info){
			foreach ($info as $k => $v) {
				$result[$v['relate_table']].=",".$v['org_id'];
				$result['sys_orgstruct'].=",".$v['id'];
				$t=$this->getOrgInfo($v['id']);
				if($t){
					foreach ($t as $k1 => $v1) {
						$result[$k1].=$v1;				
					}
				}
			}
		}		
		return $result;
	}

    // 添加公司
    public function addCompany($data){
    	unset($data['id']);
    	//使用事务处理
		$this->pdo->BeginTrans();
		$success=true;
		//新增公司信息sys_company
		$insert_company_id = $this->pdo->add($data,'sys_company');
		if(!$insert_company_id){
				$success=false;
		}else{
			//新增组织结构信息
			$org = array('org_name'=>$data['short_name'],
						 'type'=>'company',
						 'parent_id'=>$data['parent_id'],
				         'flag'=>1,
				         'relate_table'=>'sys_company',
				         'org_id'=>$insert_company_id);
			$insert_id = $this->pdo->add($org,'sys_orgstruct');
			//根据该公司自动创建用户
			if($this->config->auto_create_user){
				if(!$insert_id){
					$success=false;
				}else{
					//保存用户表信息
					// $sys_user["id"]=$in[""];
					$sys_user["create_uid"]=$_SESSION['uid'];
					$sys_user["create_date"]=time();
					$sys_user["write_date"]=time();
					$sys_user["write_uid"]=$_SESSION['uid'];
					// $sys_user["user_type"]=$info;
					// $sys_user["region_code"]=$in[""];
					$sys_user["user_name"]=$data["phone"];
					$sys_user["true_name"]=$data["contact"];
					$sys_user["password"]=$data["phone"];
					// $sys_user["knowledge"]=$in[""];//todo
					$sys_user["orgstruct_id"]=$insert_id;
					$sys_user["job"]="经办人";
					// $sys_user["id_type"]="身份证";
					// $sys_user["ip_address"]=$in[""];
					// $sys_user["log_date"]=$in[""];
					// $sys_user["expire_date"]=$in[""];
					$sys_user["nationality"]="中国";
					// $sys_user["birthdate"]=$data["ExportsBirthday"];
					// $sys_user["sex"]=$data["ExportsSex"];
					// $sys_user["id_number"]=$data["ExportsCardNo"];
					// $sys_user["qq"]=$in[""];
					// $sys_user["fax"]=$data["ExportsFax"];
					// $sys_user["email"]=$data["ExportsEmail"];
					// $sys_user["phone"]=$data["ExportsBGDH"];
					// $sys_user["address"]=$in[""];
					// $sys_user["mobile"]=$data["ExportsYDDH"];
					// $sys_user["note"]=$in[""];
					$sys_user["status"]=1;
					// $sys_user["sort"]=$in[""];
					$sys_user["is_admin"]=0;
					$sys_user["active"]=1;
					$sys_user["flag"]=1;		
					// $insert_id=$this->pdo->add($sys_user,"sys_user");
					$res=$this->savePerson($sys_user);
					$insert_id=$res["res"];
					//分派默认角色
					if(!$insert_id){
						$ret["msg"] = $res["msg"];
						$success=false;
					}else{
						$sys_roles_user["role_id"]=$this->config->agent_role_id;
						$sys_roles_user["user_id"]=$insert_id;
						$insert_id=$this->pdo->add($sys_roles_user,"sys_roles_user");
						if(!$insert_id){
							$success=false;
						}
					}
				}
				
			}
		}
		if($success){
			$this->pdo->Committrans();//事务提交
			$ret['res'] = $insert_company_id;
			$ret['msg'] = "";			
		}else{
			$this->pdo->Rollbacktrans();//事务回滚
			$ret['res'] = 0;
		}		
		
		return $ret;
    }

 // 编辑公司
    public function editCompany($data){
    	$origin_auto_create_user=$this->config->auto_create_user;
		//如果公司类型为物业公司,公司与用户会自动绑定
		$this->config->auto_create_user=$data["unit_type"]=='物业公司'?true:false;
		
    	//使用事务处理
		$this->pdo->BeginTrans();
		$success=true;
		if($this->config->auto_create_user){
			//获得源公司电话
			$sql="select phone,contact from sys_company where id=".$data["id"];
			$temp=$this->pdo->getRow($sql);
			$origin_phone=$temp["phone"];
			$origin_contact=$temp["contact"];

			$sql="select id from sys_company where phone='".$data["phone"]."'";
			$temp=$this->pdo->getRow($sql);
			$other_company_id=$temp["id"];
		}
		//新增公司信息sys_company
		$insert_company_id = $this->pdo->update($data,'sys_company','id='.$data["id"]);
		if($insert_company_id<0){
				$success=false;
		}else{
			//新增组织结构信息
			$org = array('org_name'=>$data['short_name'],
						 'type'=>'company',
						 'parent_id'=>$data['parent_id'],
				         'flag'=>1,
				         'relate_table'=>'sys_company');
			$insert_id = $this->pdo->update($org,'sys_orgstruct',"relate_table='sys_company' and org_id=".$data["id"]);
			//根据该公司自动创建用户
			if($this->config->auto_create_user){	
				if($insert_id<0){
					$success=false;
				}else{
					$sql="select id from sys_orgstruct where relate_table='sys_company' and org_id=".$data["id"];
					$temp=$this->pdo->getRow($sql);
					$orgstruct_id=$temp["id"];
					//保存用户表信息
					// $sys_user["id"]=$in[""];
					$sys_user["create_uid"]=$_SESSION['uid'];
					$sys_user["create_date"]=time();
					$sys_user["write_date"]=time();
					$sys_user["write_uid"]=$_SESSION['uid'];
					// $sys_user["user_type"]=$info;
					// $sys_user["region_code"]=$in[""];
					$sys_user["user_name"]=$data["phone"];
					$sys_user["true_name"]=$data["contact"];
					$sys_user["password"]=$data["phone"];
					// $sys_user["knowledge"]=$in[""];//todo
					$sys_user["orgstruct_id"]=$orgstruct_id;
					$sys_user["job"]="经办人";
					// $sys_user["id_type"]="身份证";
					// $sys_user["ip_address"]=$in[""];
					// $sys_user["log_date"]=$in[""];
					// $sys_user["expire_date"]=$in[""];
					$sys_user["nationality"]="中国";
					// $sys_user["birthdate"]=$data["ExportsBirthday"];
					// $sys_user["sex"]=$data["ExportsSex"];
					// $sys_user["id_number"]=$data["ExportsCardNo"];
					// $sys_user["qq"]=$in[""];
					// $sys_user["fax"]=$data["ExportsFax"];
					// $sys_user["email"]=$data["ExportsEmail"];
					// $sys_user["phone"]=$data["ExportsBGDH"];
					// $sys_user["address"]=$in[""];
					// $sys_user["mobile"]=$data["ExportsYDDH"];
					// $sys_user["note"]=$in[""];
					$sys_user["status"]=1;
					// $sys_user["sort"]=$in[""];
					$sys_user["is_admin"]=0;
					$sys_user["active"]=1;
					$sys_user["flag"]=1;		

					
					//如果当前手机号不属于其他公司就更新（先删除在新增）
					if(!$other_company_id||$other_company_id==$data["id"]){
						//如果用户存在，删除用户表，删除用户角色表
						$sql="select id from sys_user where user_name='".$origin_phone."'";
						$temp=$this->pdo->getRow($sql);
						$user_id=$temp["id"];
						if ($temp) {
							$temp=$this->pdo->remove("sys_user","id=".$user_id);
							$success=$temp?$success:false;
							$sql="select id from sys_roles_user where user_id=".$user_id;
							$temp=$this->pdo->getRow($sql);
							if($temp){
								$temp=$this->pdo->remove("sys_roles_user","user_id=".$user_id);
								$success=$temp?$success:false;
							}
						}
						// 新增用户，新增用户角色信息
						$res=$this->savePerson($sys_user);
						$success=$res["res"]?$success:false;
						$insert_id=$res["res"];
						$sys_roles_user["role_id"]=$this->config->agent_role_id;
						$sys_roles_user["user_id"]=$insert_id;
						$insert_id=$this->pdo->add($sys_roles_user,"sys_roles_user");
						$success=$insert_id?$success:false;
					}else{
						$success=false;
						$ret['msg'] .= "该手机号已被其他公司使用！";	
					}
				}
				
			}
		}
		if($success){
			$this->pdo->Committrans();//事务提交
			$ret['res'] = 1;
			$ret['msg'] .= "";			
		}else{
			$this->pdo->Rollbacktrans();//事务回滚
			$ret['res'] = 0;
		}		
		$this->config->auto_create_user=$origin_auto_create_user;
		return $ret;
    }
}

?>