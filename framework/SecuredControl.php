<?php
/**
 * @Route("/demo/secured")
 */
use lib\util\Util as Util;
class SecuredControl extends Control
{
	 /**
     * 构造函数：
     *
     * 1. 引用全局对象，使之可以通过成员变量访问。
     * 2. 设置模块相应的路径信息，并加载对应的model文件。
     * 3. 自动将$lang和$config赋值到模板。
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        //如果不开启调试功能就判断实现是否已在其他地方登录
//        if($this->config->debug === false){
//            $ado = new DbPdo();
//            $sql = "select top 1 * from sys_logs where create_uid='".$_SESSION['login']."' order by id desc";
//            $single = $ado->GetAll($sql);
//            if(count($single)){
//                //判断最后一条记录的状态
//			 	if($single[0]['process_type']==1 && $single[0]['token']!=session_id()){
//			 		Util::alert_msg('该帐户已经在其他地方登录,请返回重新登录','info','/userlogin|返回登录',3);
//			 	}
//			 }
//        }

        //访问权限控制，即在index模块中，访问下面方法时，不许调用访问控制
        $accessModule = $this->app->getModuleName();
        $accessMethod = $this->app->getMethodName();

		//检测用户是否登录
		if(isset($_SESSION['login']) and $_SESSION['login']==1){
			//已登录
		}else{
		    $url = '/userlogin|返回登录';
		    switch ($accessModule){
                case 'user_center':
                    $url = '/userlogin/enter|返回登录';
                    break;
                case 'company_center':
                    $url = '/userlogin/enter|返回登录';
                    break;
                default:
                    break;
            }

			Util::alert_msg('您还没有登录系统！请返回登录','info',$url,3);
		}
		
		//print_r($this->global->userinfo->ROLE);
		/*
		$pathInfo = isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'';
		$pathInfo = trim($pathInfo, '/');
		if(!empty($pathInfo))
        {
			$dotPos = strpos($pathInfo, '.');
            if($dotPos)
            {
                $pathInfo      = substr($pathInfo, 0, $dotPos);
            }
		}
		if(!empty($pathInfo))
        {
            // URL中含有参数信息。
            if(strpos($pathInfo, '/') !== false)
            {
                $items = explode('/', $pathInfo);
				$accessModule = $items[0];
				$accessMethod = $items[1];
            }    
            else
            {
				$accessModule = $pathInfo;
            }
        }
		*/
        //echo $_SESSION['userRelateInfo']['role'];exit;

		if($this->config->access === true)
		{
			if($_SESSION['isadmin']=='1') {
				//如果是超级管理员，可以访问系统的所有功能
			}
			else{
				if(!in_array($accessModule,array('common','index','userlogin',"wx_wechat"))&&!strstr($accessModule,"ajax")){
					$this->accessControl($accessModule,$accessMethod);
				}
			}
		}
		
    }

	/* 访问控制 */
	public function accessControl($accessModule='',$accessMethod='')
	{
		$pdo = new DbPdo();
		$sql = "select id from sys_method where module='".$accessModule."' and method='".$accessMethod."'";
		$info = $pdo->getRow($sql);
		$accessId=$info["id"];

		//判断该方法是否需要权限验证
		// if(!in_array($accessId,$allAccessArr)){
			// print_r($_SESSION['userInfo']['role']);
			// echo $accessId;exit;
		//只有打入了sys_method表的方法才验证权限
		if($accessId||strtolower($accessModule)=="admin"){
			$isSecured = in_array($accessId,$_SESSION['userInfo']['role']);
			if($isSecured&&strtolower($accessModule)!="admin"){
				//处理cms栏目权限管理，因为功能模块下可以出现很多栏目
			}else{
				//$msg = '您没有访问 '.$accessModule.' 模块 '.$accessMethod.' 方法的权限!';
				$msg = '您没有访问该模块的权限，请联系管理员!';
				Util::page_msg($msg,'forbidden');exit;
			}
		}	
		// }
	}

	/**
	 * 角色列表
	 *
	 * @return array $list
	 * 
	 */
	public function rolearray(){
    	$dom = new DOMDocument("1.0","utf-8");
		$dom->load($this->app->getAppRoot().'/module/rolemanage/role.xml');
    	$role=$dom->getElementsByTagName('role');
    	$list = array();
		foreach ($role as $key=>$root){
			foreach($root->attributes as $mk){
				$list[$mk->nodeValue] = array();
				$access=$root->getElementsByTagName('access');
				$i=0;
				$columnid = '';
				foreach ($access as $k=>$item){
					foreach($item->attributes as $itemchild){
						if($itemchild->nodeName=='value') {
							$list[$mk->nodeValue][$i] = $itemchild->nodeValue;
							$i++;
							//break;
						}
						if($itemchild->nodeName=='columnid') {
							$columnid = $itemchild->nodeValue;
							$list[$mk->nodeValue]["column_".$columnid][$itemchild->nodeName] = $itemchild->nodeValue;
							//break;
						}
						if($itemchild->nodeName=='parentid') {
							$list[$mk->nodeValue]["column_".$columnid][$itemchild->nodeName] = $itemchild->nodeValue;
						}
						if($itemchild->nodeName=='depth') {
							$list[$mk->nodeValue]["column_".$columnid][$itemchild->nodeName] = $itemchild->nodeValue;
						}
					}
				}
			}	
		}
		return $list;
    }
}
