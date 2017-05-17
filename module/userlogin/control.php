<?php
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\util\Util as Util;
use lib\util\ChuanglanSmsApi as ChuanglanSmsApi;

class userlogin extends Control
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
		//print_r($this->config);exit;
		$this->pdo = $this->userlogin->pdo;
	}

	public function apply(){
	    $type = isset($_GET['type'])?$_GET['type']:'1';
        $this->assign('type',$type);
        $this->assign('name','机构入口');
        $this->display('userlogin','apply');
    }

    /* 普通用户（市民）登录 */
    public function enter()
    {
        $this->assign('name','用户登录');
        $this->display('userlogin','enter');
    }

    /* 普通用户（市民）注册 */
    public function regist()
    {
        $this->assign('name','用户注册');
        $this->display('userlogin','regist');
    }

	/* 退出系统 */
	public function logout()
	{
		$type = isset($_GET['type'])?$_GET['type']:'userlogin';
        switch ($type){
            case 'index':
                $url = "/index";
                break;
            default:
                $url = "/userlogin";
                break;
        }
	    $this->userlogin->ExitLogin();
		Util::redirect($url);
	}

	/* 系统登录 */
	public function index()
	{  
		// $this->session->set("test","bbb");
		// echo $this->session->test;
		$this->display('userlogin','login');
	}

	public function userlogin()
	{
		$username = addslashes($_POST['username']);
		// $password = md5($_POST['password']);
		// $base = new base64();
		$password=$_POST['password'];
        $code = isset($_POST['code'])?$_POST['code']:'';
        $user_type = 1;//超级管理员
        $loginNameType = 'user_name';
        $loginRlt = $this->userlogin->userNameLogin($username,$password,$loginNameType,$user_type);
        if($loginRlt['success']){
            //$this->session->set('userInfo',$data[0]);
            //获取用户角色
            //$this->session->set('role',array('2001'=>23));
            Util::redirect('/admin_entry/layout');
            exit;
        }else {
            Util::alert_msg('用户名或密码错误！', 'info', '/userlogin|返回登录', 3);//'您还没有登录系统！请返回登录'
        }
	}

    public function apiMobilelogin()
    {
        $username = addslashes($_POST['username']);
        // $password = md5($_POST['password']);
        // $base = new base64();
        $password=$_POST['password'];
        $code = isset($_POST['code'])?$_POST['code']:'';
        $from = isset($_POST['from'])?$_POST['from']:'';//标识从那个页面登录
        $user_type = isset($_POST['user_type'])?$_POST['user_type']:10;//用户类型
        $loginNameType = 'mobile';
        $loginRlt = $this->userlogin->userNameLogin($username,$password,$loginNameType,$user_type);
        if($loginRlt['success']){
            echo json_encode($loginRlt);exit;
        }else {
            echo json_encode($loginRlt);exit;
        }
    }

    /* api 用户登录 */
    public function apiUserlogin()
    {
        $username = addslashes($_POST['username']);
        // $password = md5($_POST['password']);
        // $base = new base64();
        $password=$_POST['password'];
        $code = isset($_POST['code'])?$_POST['code']:'';
        $user_type = isset($_POST['user_type'])?$_POST['user_type']:10;//用户类型
        $loginNameType = 'user_name';
        $loginRlt = $this->userlogin->userNameLogin($username,$password,$loginNameType,$user_type);
        if($loginRlt['success']){
            $statusStr['success'] = 1;
            $statusStr['msg'] = $loginRlt['msg'];
            echo json_encode($statusStr);
            exit;
        }else {
            $statusStr['success'] = 0;
            $statusStr['msg'] = $loginRlt['msg'];
            echo json_encode($statusStr);
            exit;
        }
    }

    /* 找回密码 */
    public function forgetPassWord(){
        $this->display('userlogin','forget_password');
    }

    public function apiCheckMobile(){
        $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
        if($this->userlogin->CheckMobile($mobile)){
            echo '1';
        }else{
            echo '0';
        }
    }

    /* 随机验证码 */
    public function apiCheckVerify(){
        return \lib\util\Image::buildImageVerify();
    }

    /* 手机验证码 */
    public function apiCheckSms(){
        //获取手机验证码
        $telCode = intval(isset($_POST['telCode'])?$_POST['telCode']:0);
        //验证短信验证码
        if($_SESSION['mobile_code']!=$telCode){
            $result = array('success'=>false,'status'=>'2','msg'=>'验证码错误');
        }else{
            $result = array('success'=>true,'status'=>'1','msg'=>'验证码正确');
        }
        echo json_encode($result);exit;
    }

	public function apiSendSms(){
        //获取手机号
        $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
        //生成的随机数
        $mobile_code = $this->random(4,1);
        $_SESSION['mobile'] = $mobile;
        $_SESSION['mobile_code'] = $mobile_code;
        $statusStr = array(
            'send_code' => $mobile_code,
            'success'=>1,
            'msg'=> '发送成功'
        );
        //发送短信验证码
        //$statusStr = $this->sendSms($mobile,$mobile_code);
        echo json_encode($statusStr);exit;
    }

    public function apiRegist(){
        $mobile = isset($_POST['mobile'])?trim($_POST['mobile']):'';//获取手机号
        $mobile_code = isset($_POST['sms'])?trim($_POST['sms']):'';//获取验证码
        $nickname = isset($_POST['nickname'])?trim($_POST['nickname']):'';
        $pwd = isset($_POST['pwd'])?trim($_POST['pwd']):'';
        $rpwd = isset($_POST['rpwd'])?trim($_POST['rpwd']):'';
        $user_type = isset($_POST['user_type'])?$_POST['user_type']:10;//用户类型
        $statusStr = array(
            'success'=>0,
            'msg'=> '注册失败'
        );
        if(empty($mobile)){
            $statusStr['success'] = 0;
            $statusStr['msg'] = '请输入电话号码';
            echo json_encode($statusStr);exit;
        }
        if(!$this->userlogin->isMobile($mobile)){
            $statusStr['success'] = 0;
            $statusStr['msg'] = '非法电话号码!';
            echo json_encode($statusStr);exit;
        }
        //防用户恶意请求
        if(empty($_SESSION['mobile_code']) or $mobile_code!=$_SESSION['mobile_code']){
            //exit('请求超时，请刷新页面后重试');
            $statusStr['success'] = 0;
            $statusStr['msg'] = '请求超时，请刷新页面后重试';
            echo json_encode($statusStr);exit;
        }
        if(empty($pwd) or empty($rpwd) or $pwd!=$rpwd){
            $statusStr['success'] = 0;
            $statusStr['msg'] = '密码错误';
            echo json_encode($statusStr);exit;
        }
        //提交注册信息
        $data['mobile'] = $mobile;
        $data['nickname'] = $nickname;
        $data['user_type'] = $user_type;//10=普通用户(市民)
        $data['pwd'] = md5(trim($pwd).$this->userlogin->key);
        $data['password']=Util::encrypt($data['pwd']);
        $data['score'] = $this->config->module->score;
        //普通用户表存入fc_user表
        if($user_type==10) {
            $insertRlt = $this->pdo->add($data, 'fc_user');
        }else{
            $insertRlt = $this->pdo->add($data, 'sys_user');
        }
        if($insertRlt){
            $statusStr['success'] = 1;
            $statusStr['msg'] = '注册成功';
            //同时登录系统
            $this->userlogin->SaveInfo($mobile,$data['user_type'],$insertRlt);
            echo json_encode($statusStr);exit;
        }
        echo json_encode($statusStr);exit;
    }

    private function sms($mobile,$send_code){
        $clapi  = new ChuanglanSmsApi();
        $result = $clapi->sendSMS('18980830015', '您好，您的验证码是888885');
        $result = $clapi->execResult($result);
        //创蓝接口参数
        $statusStr = array(
            '0' =>'发送成功',
            '101'=>'无此用户',
            '102'=>'密码错',
            '103'=>'提交过快',
            '104'=>'系统忙',
            '105'=>'敏感短信',
            '106'=>'消息长度错',
            '107'=>'错误的手机号码',
            '108'=>'手机号码个数错',
            '109'=>'无发送额度',
            '110'=>'不在发送时间内',
            '111'=>'超出该账户当月发送额度限制',
            '112'=>'无此产品',
            '113'=>'extno格式错',
            '115'=>'自动审核驳回',
            '116'=>'签名不合法，未带签名',
            '117'=>'IP地址认证错',
            '118'=>'用户没有相应的发送权限',
            '119'=>'用户已过期',
            '120'=>'内容不是白名单',
            '121'=>'必填参数。是否需要状态报告，取值true或false',
            '122'=>'5分钟内相同账号提交相同消息内容过多',
            '123'=>'发送类型错误(账号发送短信接口权限)',
            '124'=>'白模板匹配错误',
            '125'=>'驳回模板匹配错误'
        );
        if(isset($result[1])){
            echo $statusStr[$result[1]];
        }else{
            echo "未连接上服务器";
        }
    }

    private function random($length = 6 , $numeric = 0) {
        PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
        if($numeric) {
            $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
        } else {
            $hash = '';
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
            $max = strlen($chars) - 1;
            for($i = 0; $i < $length; $i++) {
                $hash .= $chars[mt_rand(0, $max)];
            }
        }
        return $hash;
    }

}