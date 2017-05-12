<?php
/**
 * 微信基础类
 */
class WxControl extends Control
{
	/**
	 * 数据库连接。
     * 
     * @var object
     * @access pdo
     */
	protected $pdo;

	/**
	 * 当前用户信息
     * 
     * @var array
     * @access user
     */
	protected $user;

	/**
	 * 当前朋友信息
     * 
     * @var array
     * @access fuser
     */
	protected $fuser;
	
	/**
	 * 微信配置信息
     * 
     * @var object
     * @access wechat
     */
	protected $wechat;

	/**
	 * 当前组织机构
     * 
     * @var int
     * @access org_id
     */
	protected $org_id;
	
	/**
	 * 用户传递的参数值
     * 
     * @var string
     * @access state
     */
	protected $state;
	
	protected $jssdk;

	 /**
     * 构造函数：
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
		$this->config->module->moduleName = $this->app->getModuleName();
		$this->config->module->methodName = $this->app->getMethodName();
		
		//获取传递状态参数
		$this->state = isset($_GET['state'])?$_GET['state']:0;
		//获取微信配置信息
		$this->org_id = isset($_GET['orgid'])?$_GET['orgid']:1;
		if($this->org_id==0){echo '未配置组织信息';exit;}
		$this->pdo = new DbPdo();
		$this->wechat = (object)$this->getWechatInfo();

		//获取微信用户授权及用户信息
		$MpWechat = new WeChat_MpWechat();
		$MpWechat->appId = $this->wechat->app_id;
		$MpWechat->appSecret = $this->wechat->app_secret;
		$MpWechat->token = $this->wechat->app_token;
		$MpWechat->encodingAesKey = $this->wechat->app_encodingaeskey;
		$MpWechat->init();
		if($this->config->debug){
			$code = 'abx';
		}else{
			$code = isset($_GET['code'])?$_GET['code']:'';
		}

		//检测微信用户是否登录
		if($this->checkWxUserIsLogin()){
			//echo 'logined';
			if($this->checkWxUserIsExist($this->session->openid)){
				$this->user = $this->getWxUser($this->session->openid);
			}else{
				$this->session->destroy();
				header('Location: http://'.$this->config->domain.'/'.$this->config->module->moduleName.'/'.$this->config->module->methodName.'?orgid='.$this->org_id);
			}
		}else{
			if($code==''){
				$url =$MpWechat->getOauth2AuthorizeUrl('http://'.$this->config->domain.'/'.$this->config->module->moduleName.'/'.$this->config->module->methodName.'?orgid='.$this->org_id,$this->state,'snsapi_userinfo');
				Util::redirect($url);
			}else{
				if($this->config->debug){
					$userinfo = $this->config->test->userinfo;
				}else{
					$userOauthInfo = $MpWechat->getOauth2AccessToken($code);
					if(empty($userOauthInfo))
					{
						echo '授权失败';exit;
					}
					$userinfo = $MpWechat->getSnsUserInfo($userOauthInfo['openid'],$userOauthInfo['access_token']) ;
					if(empty($userinfo)){
						echo '获取微信用户信息失败';exit;
					}
				}
				
				if($this->checkWxUserIsExist($userinfo['openid'])){
					$this->user = $this->getWxUser($userinfo['openid']);
				}else{
					$this->user = $this->addWxUser($userinfo);
				}
				$this->session->set('wxlogin','1');
				$this->session->set('wxapply','0');
				$this->session->set('uid',$this->user['id']);
				$this->session->set('openid',$this->user['openid']);
				$this->session->set('user_type',$this->user['user_type']);
			}
		}

		//jssdk
		$this->jssdk = json_encode($MpWechat->jsApiConfig());
    }

	/**
     * 检测用户是否登录
     */
    public function checkWxUserIsLogin()
    {
        if(!$this->session->wxlogin){
			return false;
		}
		return true;
    }

	/**
     * 检测用户是否报名参加
     */
    public function checkWxUserIsApply()
    {
        if($this->user['telephone']==''){
			return false;
		}
		return true;
    }

	/**
     * 检查微信用户是否存在
	 * 用户首次访问系统实，系统将保留该用户的微信的基本信息，否则直接返回系统用户信息
     */
	private function checkWxUserIsExist($openid){
		$sql = "select count(*) as cnt from wx_user where openid='{$openid}' and org_id={$this->org_id} and app_wechat_id='{$this->wechat->app_wechat_id}'";
		$count = $this->pdo->getRow($sql);
		if($count['cnt']>0){
			return true;
		}
		return false;
	}

	/**
     * 获取互动活动微信配置信息
     */
	private function getWechatInfo(){
		$sql = "select * from wx_wechat where org_id={$this->org_id}";
		$wechatInfo = $this->pdo->getRow($sql);
		return $wechatInfo;
	}
	
	/**
     * 返回微信用户信息
     */
	private function getWxUser($openid){
		$sql = "select * from wx_user where openid='{$openid}' and org_id={$this->org_id} and app_wechat_id='{$this->wechat->app_wechat_id}'";
		$user = $this->pdo->getRow($sql);
		return $user;
	}

	/**
     * 通过id，返回微信用户信息
     */
	private function getWxUserById($uid){
		$sql = "select * from wx_user where id={$uid}";
		$user = $this->pdo->getRow($sql);
		return $user;
	}

	/**
     * 新增用户信息(插入认证授权后获得的用户)
     */
	private function addWxUser($userinfo){
		$data = array();
		if(!empty($userinfo['openid'])){
			$data['openid'] = $userinfo['openid'];
			$data['nickname'] = isset($userinfo['nickname'])?$userinfo['nickname']:'';
			$data['sex'] = $userinfo['sex'];
			$data['city'] = $userinfo['city'];
			$data['user_type'] = isset($userinfo['user_type'])?$userinfo['user_type']:1;
			$data['province'] = $userinfo['province'];
			$data['headimgurl'] = $userinfo['headimgurl'];
			$data['create_date'] = time();
			$data['write_date'] = time();
			$data['app_wechat_id'] = $this->wechat->app_wechat_id;
			$data['org_id'] = $this->org_id;
			//首次访问获取微信信息到数据库
			$this->pdo->add($data,'wx_user');
			$data['id'] = $this->pdo->getLastInsId();
			return $data;
		}else{
			return false;
		}
	}
	
	/**
     * 用户报名信息
     */
	public function addWxUserApply($data){
		$result = $this->updateWxUser($data);
		if($result['success']){
			$this->session->set('wxapply','1');
			$result = array('success'=>true,'status'=>'1');	
		}
		return $result;
	}

	/**
     * 更新用户信息
     */
	public function updateWxUser($data){
		//判断电话是否已经存在
		$sql = "select count(*) as cnt from wx_user where telephone='{$data['telephone']}' and app_wechat_id='{$this->wechat->app_wechat_id}' and org_id={$this->org_id}";
		$rlt = $this->pdo->getRow($sql);
		if($rlt['cnt']>0){
			$result = array('success'=>false,'status'=>'0');
		}else{
			$where = "id='".$this->user['id']."'";
			$data['write'] = time();
			$numRows = $this->pdo->update($data,'wx_user',$where);
			if($numRows){
				$result = array('success'=>true,'status'=>'1');	
			}else{
				$result = array('success'=>false,'status'=>'2');
			}
		}
		return $result;
	}
	
	/**
     * 更新用户积分
     */
	public function updataWxUserScore($score){
		$where = "id='".$this->user['id']."'";
		$data['write'] = time();
		$data['score'] = $score;
		$numRows = $this->pdo->update($data,'wx_user',$where);
		if($numRows){
			$result = array('success'=>true,'status'=>'1');	
		}else{
			$result = array('success'=>false,'status'=>'2');	
		}
		return $result;
	}

	/**
     * 返回用户排名列表
     */
	public function getWxUserRank($limit=10){
		$sql = "select nickname,score from wx_user where org_id={$this->org_id} and score>0 and app_wechat_id='{$this->wechat->app_wechat_id}' order by score desc limit {$limit}";
		$Rank = $this->pdo->getAll($sql);
		return $Rank;
	}

	/**
	 * 通过配置表sys_base获得下拉框字符串
	 * @param string $use 表名.字段名
	 * @return string $select_str 下拉框字符串
	 * 
	 */
    public function getSelectStr($use,$type=1){
    	if($type=1){
    		$sql="select * from sys_base where flag>0 and `use`='$use' and parent_id>0";
    		$sys_base=$this->pdo->getAll($sql);
    		return $sys_base;
    	}elseif($type=2){
    		$sql="select * from sys_base where flag>0 and `use` in ('$use') and parent_id>0";
    		$sys_base=$this->pdo->getAll($sql);
    		foreach ($sys_base as $k => $v) {
	            $sys_base_arr[$v["code"]]=$v["name"];
	        }
	        return $sys_base_arr;
    	}elseif($type=3){	
    		$sql="select * from sys_base where flag>0 and `use`='$use' order by parent_id asc";
	    	$sys_base=$this->pdo->getAll($sql);
	    	
	    	$select_str="";
	    	foreach ($sys_base as $k => $v) {
	    		if($k==0&&$v["parent_id"]==0){
	    			$select_str.='<select class="form-control input-medium" data-style="btn-default" placeholder="请选择'.$v["name"].'" size="1" id="'.$use.'" name="'.$use.'">';
	    		}else{
	    			$select_str.='<option value="'.$v["code"].'">'.$v["name"].'</option>';
	    		}
	    	}
	    	$select_str.=$select_str==""?"":"</select>";
	    	return $select_str;
    	}
    	
    }

}
