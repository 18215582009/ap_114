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
class cyzt_rolemanagerModel extends model
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

	/*保存角色*/
	public function saveRole($record,$act='add'){
		if($act=='add'){
			unset($record['id']);
			//新增角色信息sys_role
			$lastInsertId = $this->pdo->add($record,'sys_roles');
			//新增角色功能信息
			$rightslist = explode(',',$record['rightslist']);
			//print_r($rightslist);exit;
			foreach($rightslist as $item){
				$_item = explode('_',$item);
				if(count($_item)>0){
					$roleMethod = array('role_id'=>$lastInsertId,'project_code'=>$_item[0],'module_id'=>$_item[1],'method_id'=>$_item[2]);
					$this->pdo->add($roleMethod,'sys_roles_method');
				}
			}
			return $lastInsertId;
		}else{
			//修改角色基础信息
			$rlt1 = $this->pdo->update($record,'sys_roles','id='.$record['id']);
			//修改角色权限信息$funList = array();
			$rightslist = explode(',',$record['rightslist']);
			$this->pdo->remove('sys_roles_method','role_id='.$record['id']);
			foreach($rightslist as $item){
				$_item = explode('_',$item);
				if(count($_item)>0){
					$roleMethod = array('role_id'=>$record['id'],'project_code'=>$_item[0],'module_id'=>$_item[1],'method_id'=>$_item[2]);
					$this->pdo->add($roleMethod,'sys_roles_method');
				}
			}
			return $rlt1;
		}
	}

	/*根据返回权限生成json tree*/
	public function getRightsJsonTree($tree,$rootId=0,$selectRights=array(),$unselect=false){
		$jsontree = '[';
		$i = 0;
		foreach ($tree as $k=>$v){
			if($v["parent_module"]==$rootId){
				$type = "true";

				if (count($selectRights)>0){
					if(in_array($v["project_code"].'_'.$v["id"],$selectRights)){
						$type .=',select: true';
					}
				}

				$unselectStr = '';
				if($unselect)$unselectStr = ',unselectable: true';

				//print_r($type);
				//$jsontree .= '{id:'.$v["ID"].',title:"'.$v["RIGHT_NAME"].'",icon:"folder_docs.gif",key:"'.$v["ID"].'"';
			$jsontree .= '{id:"'.$v["project_code"].'_'.$v["id"].'",title:"'.$v["business_name"].'", isFolder: '.$type.',key:"'.$v["project_code"].'_'.$v["id"].'"'.$unselectStr;
				$j=0;
				foreach ($tree as $k1=>$v1){
					if($v1["parent_module"]==$v["id"]){
						$j=1;break;
					}
				}
				if($j>0){
					$jsontree .= ',"expanded": false,"children":';
					unset($tree[$k]);
					$jsontree .= $this->getRightsJsonTree($tree,$v["id"],$selectRights,$unselect);
				}else{
					//将sys_method表中的数据添加到分类
					$sql = "select * from sys_method where module_id=".$v['id'];
					$method = $this->pdo->getAll($sql);
					if(count($method)){
						$jsontree .= ',"children":[';
						foreach($method as $key=>$item){
							$ctype = "";
							$roleCode = $v["project_code"].'_'.$item['module_id'].'_'.$item['id'];//角色方法的id格式为：项目编号_模块名id_方法id
							if (count($selectRights)>0){
								if(in_array($roleCode,$selectRights)){
									$ctype .='select: true,';
								}
							}
							$jsontree .='{id:"'.$roleCode.'",title:"'.$item['method_name'].'"'.$unselectStr.', isFolder: false,'.$ctype.'key:"'.$roleCode.'"},';
						}
						$jsontree = substr($jsontree,0,-1).']';
					}
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

	/*获取角色下用户列表*/
	public function getRolesUser($role_id){
		$sql = "select * from sys_roles_user where role_id=".$role_id;
		$rs = $this->pdo->getALL($sql);//print_r($userlist);exit;
		return $rs;
	}

	/* 生产权限方法编码 */
	public function getRoleCode($item){
		$roleCode = '';
		if($item['project_code']!=''){
			$roleCode = $item['project_code'].'_';
		}else{
			$roleCode = substr($roleCode,0,-1);
		}
		if($item['module_id']!=''){
			$roleCode .= $item['module_id'].'_';
		}else{
			$roleCode = substr($roleCode,0,-1);
		}
		if($item['method_id']!=''){
			$roleCode .= $item['method_id'];
		}else{
			$roleCode = substr($roleCode,0,-1);
		}
		return $roleCode;
	}

	/* -----------------未处理----------------------- */

	/*生成可操作的应用系统*/
	public function getInputHtml($appnameInfo,$tmp=array()){
		$i=0;
		$selectstr = '<div class="row-fluid">';
		
		foreach ($appnameInfo as $k=>$v){
			
			if($i%6==0)
			{
				$selectstr .='</div>';
				$selectstr .= '<div class="row-fluid">';
	
				if (in_array($v['APPNAME'],$tmp))
				{
					$selectstr .= '<div style="width:120px;height:24px; float:left;margin-left:1px;"><input type="checkbox" name="APPNAME[]" value='.$v['APPNAME'].' checked>'.$v['APPNAME'].'</div>';
				}
				else
				{
					$selectstr .= '<div style="width:120px;height:24px; float:left;margin-left:1px;"><input type="checkbox" name="APPNAME[]" value='.$v['APPNAME'].'>'.$v['APPNAME'].'</div>';
				}
			}
			else
			{
				if (in_array($v['APPNAME'],$tmp))
				{
					$selectstr .= '<div style="width:120px;height:24px; float:left;margin-left:1px;"><input type="checkbox" name="APPNAME[]" value='.$v['APPNAME'].' checked>'.$v['APPNAME'].'</div>';
				}
				else
				{
					$selectstr .= '<div style="width:120px;height:24px; float:left;margin-left:1px;"><input type="checkbox" name="APPNAME[]" value='.$v['APPNAME'].'>'.$v['APPNAME'].'</div>';
				}			
			}
			$i++;
		}
		$selectstr .='</div>';
		return $selectstr;
	}

	public function getUsersHtml($userlist,$tmp=array()){
		$i=0;
		$selectstr = '<div class="row-fluid">';
		
		foreach ($userlist as $k=>$v){
			
			if($i%5==0)
			{
				$selectstr .='</div>';
				$selectstr .= '<div class="row-fluid">';
	
				if (in_array($v['USER_NAME'],$tmp))
				{
					$selectstr .= '<div style="width:80px;height:24px; float:left;margin-left:20px;" title="'.$v['FULLNAME'].' '.$v['DPART'].'">'.$v['USER_NAME'].'</div>';
				}
				else
				{
					$selectstr .= '<div style="width:80px;height:24px; float:left;margin-left:20px;" title="'.$v['FULLNAME'].' '.$v['DPART'].'">'.$v['USER_NAME'].'</div>';
				}
			}
			else
			{
				if (in_array($v['USER_NAME'],$tmp))
				{
					$selectstr .= '<div style="width:80px;height:24px; float:left;margin-left:20px;" title="'.$v['FULLNAME'].' '.$v['DPART'].'">'.$v['USER_NAME'].'</div>';
				}
				else
				{
					$selectstr .= '<div style="width:80px;height:24px; float:left;margin-left:20px;" title="'.$v['FULLNAME'].' '.$v['DPART'].'">'.$v['USER_NAME'].'</div>';
				}			
			}
			$i++;
		}
		$selectstr .='</div>';
		return $selectstr;
	}

	/*根据返回附加权限生成json tree*/
	public function getaddRightsJsonTree($nodename,$keyname,$tree,$grouprights=array()){
		//PRINT_R($tree);
		$addrightsjsontree .= '{id:1,title:"'.$nodename.'", isFolder: false,key:"'.$nodename.'","expanded": true,"children":[';
		$skeyname = strtoupper($keyname);
		//PRINT_R($keyname);
		$i = 0;
		$j = 2;
		foreach ($tree as $k=>$v){
			
			$type='false';
			if (count($grouprights)>0){
				if(in_array($v[$skeyname],$grouprights)){
					$type .=',select: true';
				}
			}
			$addrightsjsontree .= '{id:'.$j.',title:"'.$v[$skeyname].'", isFolder: '.$type.',key:"'.$keyname.'('.$v[$skeyname].')"';
			$j++;
			$i = 1;
			$addrightsjsontree .= '},';

		}
		if($i==1){
			$addrightsjsontree = substr($addrightsjsontree,0,-1);
		}
		$addrightsjsontree .= ']},';
		//PRINT_R($addrightsjsontree);
		return $addrightsjsontree;
	}

	/*生成权限列表*/
	public function getRightsHtml($rightslist,$tmp=array()){
		$i=0;
		//print_r($rightslist);exit;
		foreach ($rightslist as $k=>$v){
			if ($appstr==$v['APPNAME']){
				if (in_array($v['RIGHT_NAME'],$tmp))
				{
					$selectstr .= '<tr><td><input type="checkbox" name="RIGHTS[]" value='.$v['ID'].' checked>'.$v['RIGHT_NAME'].'</td></tr>';
				}
				else
				{
					$selectstr .= '<tr><td><input type="checkbox" name="RIGHTS[]" value='.$v['ID'].'>'.$v['RIGHT_NAME'].'</td></tr>';
				}
			}
			else{
				$appstr = $v['APPNAME'];
				if ($i!=0){
					$selectstr .= '</tbody></table>';
				}
				$selectstr .= '<table class="table table-bordered table-striped" style="margin-buttom:10px;width:120px;float:left;">
                            <thead><tr><th><input type="checkbox">'.$v['APPNAME'].'</th></tr></thead><tbody>';

				$i++;
			}
		
		}
		$selectstr .= '</tbody></table>';

		return $selectstr;
	}


		/*保存附加权限*/
	public function saveaddrights($array)
	{
		$data_business['ACTION'] = 'appendaddrights';

		$data_business['MAINTABLE'] = 'SYSTEM@CYGROUPS';
		$data_business['SUBTABLE'] = array(
					'SYSTEM@CYGROUPS' =>array('PK'=>'ID',
					'slave'=>array('SYSTEM@CYRIGHTSADD'=>array('PK'=>'ID','FK'=>'GROUP_ID')))
				);
		$data_business['ID'] = $array['group_id'];
		$tmp = explode(",",$array["addrightslist"]);
		//print_r($tmp);exit;
		$addrightstr='';
		foreach($tmp as $k =>$v)
		{
			if(!empty($v))
			{
				preg_match_all("/\((.*)\)/", $v, $tmpstr);
				$str=preg_replace("/\(.*\)/", '', $v);
				if($addrightstr=='')
				{
					$addrightstr = $str .'('.$tmpstr[1][0].'[]';	
				}
				else
				{
					if(strpos($addrightstr, $str) !== false)
					{
						$addrightstr .= ','.$tmpstr[1][0].'[]';	
					}
					else
					{
						$addrightstr .= ');'.$str .'('.$tmpstr[1][0].'[]';
					}
				}
			}
		}
		$addrightstr .= ')';
		//print_r($addrightstr);exit;


		/*$params['Condition'] = " and parent_id =".$array['nodeId'];
		$rightslist = $this->soap->getSqlidInfo('getModuleRights',$params);
		foreach($rightslist as $key =>$val)
		{
			$rightstr .= $val['ID'].','; 
		}
		$rightstr = substr($rightstr,0,-1);*/
		
		$params['Conditions'] = " and group_id=".$array['group_id']." and right_id=".$array['nodeId'];
		$info = $this->soap->getSqlidInfo('getRightsAddByGroupId',$params);
		//print_r($info);exit;
		if(count($info)>0)
		{
			$data_business['SYSTEM@CYRIGHTSADD-ID'][] = $info[0]['ID'];
		}
		else
		{
			$data_business['SYSTEM@CYRIGHTSADD-ID'][] = "";
		}
		$data_business['SYSTEM@CYRIGHTSADD-GROUP_ID'][] = $array['group_id'];
		$data_business['SYSTEM@CYRIGHTSADD-RIGHT_ID'][] = $array['nodeId'];
		$data_business['SYSTEM@CYRIGHTSADD-RIGHTSADD'][] = $addrightstr;
		
		//PRINT_R($data_business );EXIT;
		$result = $this->soap->doSaveInfo('BBizCYGroups',$data_business);
		return $result;
	}
	
	public function saverightsgive(){
		$data_business['ACTION'] = 'append';
		$data_business['MAINTABLE'] = 'SYSTEM@CYPERMISSIONS';
		$data_business['SUBTABLE'] = array(
					'SYSTEM@CYPERMISSIONS' =>array('PK'=>'ID'));
		foreach ($_POST['selectuser'] as $m=>$val){
			$data_business['ID'][] = -$m-1;
			$data_business['GROUP_ID'][] = $_POST['SYSTEM@CYPERMISSIONS-GROUP_ID'];
			$data_business['USERID'][] = substr($val,4);
			$data_business['DELFLAG'][] = 0;
		}
		$result = $this->soap->doSaveInfo('BBizCYRightsGive',$data_business);
		return $result;
	}

	/*获取角色列表*/
	public function getGroups($groupname,$appname="",$where=""){
		$params['USERNAME'] = $_SESSION['userRelateInfo']['LOGIN_ID'];
		$params['PASSWORD'] = $_SESSION['userRelateInfo']['PASSWORD'];
		$params['USERID'] = $_SESSION['userRelateInfo']['USER_ID'];
		if($appname)$params['APPNAME'] = $appname;
		if($groupname)$params['GROUP_NAME'] = $groupname;
		$params['order'] = 'a.id';
		if(!empty($where))
		{
			$params['where'] = ' where '. $where;
		}else{
			$params['where'] = ' where ROW_ID>0';
		}
		//PRINT_R($params);EXIT;
		$info = $this->soap->getSqlidInfo('getGroups',$params);
		return $info;
	}
	
	/*获取应用系统列表*/
	public function getSystem(){
		$params['USERNAME'] = $_SESSION['userRelateInfo']['LOGIN_ID'];
		$params['PASSWORD'] = $_SESSION['userRelateInfo']['PASSWORD'];
		$info = $this->soap->getSqlidInfo('getSystem',$params);
		return $info;
	}
	
	/*根据角色获取相应权限集*/
	public function getRightsByGroup($groupid){
		$params['USERNAME'] = $_SESSION['userRelateInfo']['LOGIN_ID'];
		$params['PASSWORD'] = $_SESSION['userRelateInfo']['PASSWORD'];
		$params['Conditions'] = " and group_id=".$groupid;



		$info = $this->soap->getSqlidInfo('getRightsByGroupId',$params);
		//print_r($info);exit;
		foreach ($info as $k=>$v){
			$tmp[$k] = $v['RIGHT_ID'];
		}
		
		return $tmp;
	}

	/*根据用户获取相应权限集*/
	public function getRightsByUser($userid){
		$params['USERNAME'] = $_SESSION['userRelateInfo']['LOGIN_ID'];
		$params['PASSWORD'] = $_SESSION['userRelateInfo']['PASSWORD'];
		$params['USERID'] = $userid;



		$info = $this->soap->getSqlidInfo('getRightsByUserId',$params);
		//print_r($info);exit;
		foreach ($info as $k=>$v){
			$tmp[$k] = $v['RIGHT_ID'];
		}
		
		return $tmp;
	}

	private function filterCancelChk($pstArr,$group_id){
		$arr = array();
		if(count($pstArr)>0){

			$params['Conditions'] = " and group_id=".$group_id;
			$rightslist = $this->soap->getSqlidInfo('getRightsByGroupId',$params);
			//print_r($rightslist);exit;
			if(count($rightslist)>0){
				
				foreach($rightslist as $k =>$v){
					//如果ID不为空说明是编辑，编辑需要找到RIGHTS表里面的ID
					if(!in_array($v["RIGHT_ID"],$pstArr)){
						$arr[] = $v["RIGHT_ID"];
					}
				}	
			}
		}
		//print_r($arr);
		return $arr;
	}


}
?>