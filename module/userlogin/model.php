<?php
/**
 * The model file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: model.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\ezsql\DbPdo as DbPdo;
use lib\util\Util as Util;

class userloginModel extends Model
{
	/**
	 * pdo连接
	 * 
	 * @var object
	 * @access pdo
	 */
	public $pdo;
    public $userId; 	    //会员自增ID
    public $loginName;	    //会员ID
    public $isadmin;        //是否为超级管理员
    public $login;          //是否登录1为已经登录
    public $userType;	    //会员类型 经纪人和市民
    public $M_Scores;	    //会员积分
    public $userName;    //用户名
    public $loginTime;	  //最后一次登录时间
    public $lastUrl;	        //记录最后次URL
    public $key;          //key值 数据库保存md5值格式为:md5(密码+key) 防止破译md5
    private $cookieKeepTime;	//cookie保存时间
    private $notAllowKey;	//非法关键字以后可以写入数据库
    private $way;        //记录Cookie和Session

    public function __construct($kptime = -1,$way = "Session")
    {
        parent::__construct();
		$this->pdo = new DbPdo();
        $this->way = $way;
        if ($kptime==-1)
        {
            $this->cookieKeepTime= 3600 * 24 * 3;//默认cookie保存为时间3天
        }else {
            $this->cookieKeepTime=$kptime;
        }
//        if ($this->way=="Cookie")
//        {
//            $this->loginName = $this->GetCookie("username");
//            $this->loginTime = $this->GetCookie("logintime");
//            $this->userType = $this->GetCookie("usertype");
//            $this->userId = $this->GetCookie("userid");
//            $this->login = $this->GetCookie("login");
//            $this->isadmin = $this->GetCookie("isadmin");
//        }else{
//            $this->loginName = $this->GetSession("username");
//            $this->loginTime = $this->GetSession("logintime");
//            $this->userType = $this->GetSession("usertype");
//            $this->userId = $this->GetSession("userid");
//            $this->login = $this->GetSession("login");
//            $this->isadmin = $this->GetSession("isadmin");
//        }

        $this->notAllowKey = 'admin,userid,色情,法轮功,靠,麻痹';
        $this->lastUrl = "javascript:history.back(-1)";
        $this->key = 'fc114'; //设定过后不能修改 否则验证会通不过
    }

    /**
     * 快速注册并登录
     */
    public function easyRegistLogin($mobile,$user_type){
        //提交注册信息
        $data['mobile'] = $mobile;
        $data['user_type'] = $user_type;//普通用户(市民)10
        $insertRlt = $this->pdo->add($data,'sys_user');
        if($insertRlt){
            //同时登录系统
            $this->SaveInfo($mobile,$data['user_type'],$insertRlt);
            return true;
        }else{
            return false;
        }
    }

    /**
     * 检查用户名密码是否合法
     * @param	$login_name	用户名
     * @param	$password	密码
     * @param   $type 登录类型 user_name为用户名登录 mobile为电话号码登录
     * @param   $user_type 用户类型
                '1' => '超级管理员',
                '2' => '网站管理员',
                '3' => '中介公司',
                '4' => '开发商',
                '5' => '银行',
                '6' => '担保公司',
                '7' => '监督机构',
                '8' => '代理公司',
                '9' => '经纪人',
                '10'=> '市民'
     * @return bool
     */
    public function userNameLogin($username,$password,$loginNameType='user_name',$user_type=10)
    {
        $rlt = array();
        if($loginNameType=='user_name') {
            if (!$this->CheckUserName($username)) {
                $rlt = array('success'=>false, 'msg'=> '你的用户名属于非法内容,请认真填写!');
            }
        }else{
            if(!$this->isMobile($username)){
                $rlt = array('success'=>false, 'msg'=> '你的手机号码不正确,请认真填写!');
            }
        }
        $password = md5(trim($password).$this->key);
        $password=Util::encrypt($password);
        //print_r($password);exit;
        switch ($user_type){
            case 10:
                $loginUserTable = 'fc_user';
                $sepfield = '';
                break;
            default:
                $loginUserTable = 'sys_user';
                $sepfield = ',is_admin';
                break;
        }
        $sql = "SELECT id,user_type,user_name,true_name,nickname,password,openid,headimgurl,mobile".$sepfield." FROM ".$loginUserTable." where active=1 and ".$loginNameType."='".$username."'";
        $row = $this->pdo->getRow($sql);
        if (is_array($row))
        {
            if ($row['password'] != $password) {
                $rlt = array('success'=>false, 'msg'=> '用户名或密码不正确!');
                return $rlt;
            }
            //保存注册信息
            if($user_type==10) {
                $this->SaveInfo($username, $row['user_type'], $row['id']);
            }else{
                $this->SaveInfo($username, $row['user_type'], $row['id'], $row['is_admin']);
            }
            $rlt = array('success'=>true, 'msg'=> '登录成功!');
        } else {
            $rlt = array('success'=>false, 'msg'=> '用户名或密码不正确!');
        }
        return $rlt;
    }

    /**
     * 该函数用于检查用户名的合法性
     * @param  string $login_name	用户ID
     * @return bool 通过返回true 否则返回false
     */
    public function CheckUserName($login_name)
    {
        $nas = explode(',',$this->notAllowKey);
        if (in_array($login_name,$nas))	//验证敏感字段
        {
            return false;
        }
        /*
        if(eregi("[^a-z0-9-]",$login_name))	//验证特殊字符
        {
            page_msg('用户名不能含特殊字符,请认真填写',$isok=false,$this->lastUrl);
            return false;
            exit;
        }
        */
        return true;
    }

    /**
     * 检查手机是否已存在
     * @param	$mobile	用户名
     * @param   $user_type 用户类型
        '1' => '超级管理员',
        '2' => '网站管理员',
        '3' => '中介公司',
        '4' => '开发商',
        '5' => '银行',
        '6' => '担保公司',
        '7' => '监督机构',
        '8' => '代理公司',
        '9' => '经纪人',
        '10'=> '市民'
     * @return bool
     */
    public function CheckMobile($mobile,$user_type='10'){
        //判断电话是否合法
        switch ($user_type){
            case 10:
                $loginUserTable = 'fc_user';
                break;
            default:
                $loginUserTable = 'sys_user';
                break;
        }
        $sql = "select count(id) as cnt from ".$loginUserTable." where mobile={$mobile}";
        $rlt = $this->pdo->getRow($sql);
        if($rlt['cnt']>0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 验证手机号是否正确
     * @param number $mobile
     * @return bool
     */
    public function isMobile($mobile) {
        if (!is_numeric($mobile)) {
            return false;
        }
        return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
    }

    /**
     * 获取用户信息
     */
    public function getUserInfoByMobile($mobile,$filed = 'id'){
        $sql = "select ".$filed." from sys_user where mobile=".$mobile;
        $userInfo = $this->pdo->getRow($sql);
        return $userInfo;
    }

    /**
     * 是否登录
     **/
    public function IsLogin()
    {
        if ($this->way=="Cookie")
        {
            $tmp = $this->GetCookie("username");
            if (!empty($tmp))
            {
                return true;
            }
            return false;
        }
        else
        {
            $tmp = $this->GetSession("username");
            if (!empty($tmp))
            {
                return true;
            }
            return false;
        }
    }

    /**
     * 退出登录
     * */
    public function ExitLogin()
    {
        if ($this->way=="Cookie")
        {
            $this->DelCookie("username");
            $this->DelCookie("logintime");
            $this->DelCookie("usertype");
            $this->DelCookie("userid");
            $this->DelCookie("login");
            $this->DelCookie("isadmin");
        }
        else
        {
            session_destroy();
        }
    }

    /**
     * 保存用户信息Cookie
     * @param $login_name	用户名
     * @param $user_type	用户类型
     * @param $uid			用户ID
     * */
    function SaveInfo($login_name,$user_type,$uid,$isadmin=0)
    {
        $this->loginName = $login_name;
        $this->loginTime = time();
        $this->userType = $user_type;
        $this->userId = $uid;
        $this->login = 1;
        $this->isadmin = $isadmin;
        //判断用户名是否为电话号码
        if($this->isMobile($this->loginName)){
            $this->loginName = substr_replace($this->loginName, '****', 3, 4);
        }
        if ($this->way=="Cookie")
        {
            if ($this->cookieKeepTime>0)
            {
                $this->PutCookie('username',$this->loginName,$this->cookieKeepTime);
                $this->PutCookie("logintime",$this->loginTime,$this->cookieKeepTime);
                $this->PutCookie("usertype",$this->userType,$this->cookieKeepTime);
                $this->PutCookie("userid",$this->userId,$this->cookieKeepTime);
                $this->PutCookie("login",$this->login,$this->cookieKeepTime);
                $this->PutCookie("isadmin",$this->isadmin,$this->cookieKeepTime);
            }
            else
            {
                $this->PutCookie("username",$this->loginName);
                $this->PutCookie("logintime",$this->loginTime);
                $this->PutCookie("usertype",$this->userType);
                $this->PutCookie("userid",$this->userId);
                $this->PutCookie("login",$this->login);
                $this->PutCookie("isadmin",$this->isadmin);
            }
        }
        else
        {
            $this->PutSession('username',$this->loginName);
            $this->PutSession('logintime',$this->loginTime);
            $this->PutSession("usertype",$this->userType);
            $this->PutSession("userid",$this->userId);
            $this->PutSession("login",$this->login);
            $this->PutSession("isadmin",$this->isadmin);
        }
    }

    /**
     * 写入Cookie
     * @param	$key	Cookie名
     * @param	$value	Cookie值
     * @param	$kptime	保存时间
     * @param	$sp		保存路径
     * */
    private function PutCookie($key,$value,$kptime,$sp="/")
    {
        setcookie($key,$value,time()+$kptime,$sp);
    }

    /**
     * 删除Cookie
     * @param	$key	删除Cookie名
     * */
    private function DelCookie($key)
    {
        setcookie($key,'',time()-360000,"/");
    }

    /**
     * 获取Cookie
     * @param	$key	待获取Cookie名
     * */
    private function GetCookie($key)
    {
        if (!isset($_COOKIE[$key]))
        {
            return '';
        }
        return $_COOKIE[$key];
    }

    /**
     * 写入Session
     * */
    private function PutSession($key,$value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * 删除Session
     * */
    private function DelSession($key)
    {
        session_destroy();
    }

    /**
     * 获取Session
     **/
    private function GetSession($key)
    {
        if (!isset($_SESSION[$key]))
        {
            return '';
        }
        return $_SESSION[$key];
    }

}