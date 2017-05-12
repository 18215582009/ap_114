<?php
/**
 * The control file of admin_entry module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
class admin_entry extends SecuredControl
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
		$this->pdo = $this->admin_entry->pdo;
    }

	public function layout(){
		$header['title'] = $this->lang->welcome;
		//获取功能菜单
		if($_SESSION['isadmin']==1){
			$sql = "select * from sys_project where flag=1 order by order_list desc";
			$menu = $this->pdo->getAll($sql);
			foreach($menu as $key=>$val){
				$sql = "select * from sys_module where flag=1 and project_code=".$val['project_code']." order by order_list desc";
				$menu[$key]['child'] = $this->pdo->getAll($sql);
			}
			//print_r($menu);exit;
			$this->assign('menu',$menu);
			$this->assign('header',  $header);
			$this->display('admin_entry','layout');
		}else{
			//todo根据用户权限获取功能菜单
            lib\util\Util::alert_msg('您访问的页面不存在',$isok=false,'/index');
		}
	}

    /* index方法，也是默认的方法。*/
    public function index()
    {
		if($this->config->debug){
			$SQL = "select * from sys_project where flag>0";
		}else{
			$SQL = "select * from sys_project where flag>0";
		}
		
		//print_r($_SESSION['userInfo']);
		$projectList = $this->pdo->getAll($SQL);
		if($_SESSION['isadmin']!=1){
			$pro_role = $this->getProRole($_SESSION['userInfo']['RIGHTS']);
			//print_r($_SESSION['userInfo']['role']);
			// print_r($_SESSION['userInfo']['RIGHTS']);
			//print_r($pro_role);exit;
			foreach ($projectList as $k=>$v){
				if(!in_array($v['project_name'],$pro_role['mod'])){
					unset($projectList[$k]);
				}
			}
			$projectList = array_values($projectList);
		}
		if($this->config->debug){
			$SQL = "select * from sys_module where flag=1";
		}else{
			$SQL = "select * from sys_module where project_code =".$projectList[0]['project_code']." and parent_module=0 and flag=1";
		}
		$moduleList = $this->pdo->getAll($SQL);

        if($_SESSION['isadmin']!=1){
            //$pro_role = $this->getProRole($_SESSION['userInfo']['RIGHTS'],true);
			//print_r($moduleList);
			//print_r($pro_role);
            foreach ($moduleList as $k=>$v){ 
                if(!empty($v['module_name'])&&!in_array($v['module_name'],$pro_role['mod'])||!in_array($v['business_name'],$pro_role['name'])){
                    unset($moduleList[$k]);
                }
            }
        }

		// $header['title'] = $this->lang->welcome;
		$header['title'] = $this->config->app_name;
		$this->assign('menu',array());
        $this->assign('header',  $header);
		$this->assign('projectList', $projectList);
		$this->assign('moduleList',$moduleList);
        $this->display('admin_entry','index');
    }

	/* 设置应用 */
	public function desktop()
	{
		$moduleList = array();
		$this->assign('moduleList',$moduleList);
        $this->assign('header',  "设置应用");
        $this->display('admin_entry','index');
	}

	public function modifyPwd(){
		$this->assign('moduleList',$moduleList);
        $this->assign('header',  "修改密码");
        $this->display('index','modifypwd');		
	}
	
	public function confirmpwd(){
		if($_POST)
		{	
			// $base = new base64();
			// $old_pwd=$base->enCrypt(strtoupper($_POST['oldpwd']));
			// $new_pwd=$base->enCrypt(strtoupper($_POST['newpwd']));
			$old_pwd=Util::encrypt($_POST['oldpwd']);
			$new_pwd=Util::encrypt($_POST['newpwd']);
			

			$info=$this->pdo->getRow('select * from sys_user where id='.$_SESSION["userInfo"]["id"]);
			if($old_pwd!=$info['password']){
				$result['code'] = '2';		
				$result['msg'] = "原始密码输入错误,密码修改失败！";		
			}else{
				$data['password']=$new_pwd;
				$info=$this->pdo->update($data,'sys_user','id='.$_SESSION["userInfo"]["id"]);
				if($info){
					$result['code'] = '1';		
					$result['msg'] = '密码修改成功！';
				}else{
					$result['code'] = '2';			
					$result['msg'] = "密码修改失败！";
				}
			}
		}
		echo json_encode($result);
	}
	
}

