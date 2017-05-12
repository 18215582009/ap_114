<?php
/**
 * The control file of sale module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\util\ChuanglanSmsApi as ChuanglanSmsApi;
use lib\util\Util as Util;
use lib\util\Token as Token;
use Gregwar\Image\Image;
use lib\util\FileUtil as FileUtil;

class sale extends Control
{
	/**
	 * 数据库连接。
     * Notice: Undefined index: username in /Users/luodong/Project/shareframe/CandorPHP/app_fc114/module/userlogin/model.php on line 328

    Notice: Use of undefined constant loginName - assumed 'loginName' in /Users/luodong/Project/shareframe/CandorPHP/app_fc114/module/userlogin/model.php on line 238
     * @var object
     * @access pdo
     */
	 protected $pdo;

    /* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
		$this->pdo = $this->sale->pdo;
    }
	
	/* 二手房首页 */
    public function index()
    {
        $_GET['house_type'] = 2;
        $houseListInfo = $this->sale->secondoHouseList($_GET);
        $this->assign('borough',$houseListInfo['borough']);
        $this->assign('price',$houseListInfo['price']);
        $this->assign('area',$houseListInfo['area']);
        $this->assign('room',$houseListInfo['room']);
        $this->assign('price_sort',$houseListInfo['price_sort']);
        $this->assign('time_sort',$houseListInfo['time_sort']);
        $this->assign('list',$houseListInfo['list']);
        $this->assign('total',$houseListInfo['total']);
        $this->assign('struct',$houseListInfo['struct']);
        $this->assign('keyword',$houseListInfo['keyword']);
        $this->assign('pageInfo',$houseListInfo['pageInfo']);
        $this->assign('build_year',$houseListInfo['build_year']);
        $this->assign('pm_type',$houseListInfo['pm_type']);
        $this->assign('toward',$houseListInfo['toward']);
        $this->assign('total_floor',$houseListInfo['total_floor']);
        $this->assign('fitmen_type',$houseListInfo['fitmen_type']);
        $this->assign('pageNation',$houseListInfo['pageNation']);
        $this->assign('information',$houseListInfo['information']);
        $this->assign('guessyoulike',$houseListInfo['guessyoulike']);
        $this->assign('condition',$houseListInfo['condition']);
        if(isset($_SESSION['userid'])){
            $this->assign('collection',$houseListInfo['collection']);
            $this->assign('landlordphone',$houseListInfo['landlordphone']);
        }

        $this->display('sale','sale_list');
    }
    //收藏房源
    public function collection(){
        $esf['esf_id'] = $_POST['esf_id'];
        $esf['house_type'] = $_POST['house_type'];
        $val = $this->pdo->add($esf,'fc_esf_user_favorites');
        if($val){
            echo 1;
        }
    }
    //查看房东电话扣除积分
    public function consumption(){
        $userid = $_SESSION['userid'];
        $sql = "select * from fc_user where id = '$userid' AND active = 1";
        $userinfo = $this->pdo->getAll($sql);
        if($userinfo[0]['score'] < 40){
            echo json_encode("积分不足");
            exit;
        }else{
            $score = $userinfo[0]['score'] - 40;
            $sql = "update fc_user SET score='$score' WHERE id='$userid' AND active=1";
            $this->pdo->getAll($sql);
        }

        $esf['esf_id'] = $_POST['esf_id'];
        $esf['score'] = $_POST['sum'];
        $this->pdo->add($esf,'fc_esf_user_cons');
        $sql = "select c.*,e.linkman,e.telphone from fc_esf_user_cons as c LEFT JOIN fc_esf as e on c.esf_id=e.id where
                c.create_uid='$userid' and c.esf_id = ".$esf['esf_id']."";
        $phone = $this->pdo->getAll($sql);
        $rlt = array('linkman'=>$phone[0]['linkman']==""?"未提供":$phone[0]['linkman'], 'telphone'=> $phone[0]['telphone']);
        echo json_encode($rlt);

        $log['des'] = $_POST['esf_name'];
        $log['product'] = '查看房源联系方式';
        $log['score_use'] = 1;
        $log['score'] = $_POST['sum'];
        $log['trade_status'] = 1;
        $this->Add_log($log);
    }
    //添加用户操作日志
    public function Add_log($log){
        $this->pdo->add($log,'fc_user_log');
    }


	/* 二手房详细 */
    public function detail()
    {
        $id = isset($_GET['id'])?$_GET['id']:'0';
        //用户已登录，添加看房记录
        if(isset($_SESSION['userid'])){
            $this->sale->house_record();
        }
        if($id) {
            $_GET['house_type'] = 2;
            $sale_detail = $this->sale->secondhousedetail();
            if(isset($_SESSION['userid'])){
                $this->assign('collection',$sale_detail['collection']);
                $this->assign('landlordphone',$sale_detail['landlordphone']);
            }
            $this->assign('sale_detail',$sale_detail['detail']);
            $this->assign('district',$sale_detail['district']);
            $this->assign('img',$sale_detail['img']);
//            if(isset($sale_detail['collection']))($this->assign('collection',$sale_detail['collection']));
            $this->display('sale', 'sale_detail');
        }else{
            Util::prompt('没有该房源信息','404','/sale');
        }
    }



    public function detail1(){$this->display('sale', 'sale_detail_bak');}

    /* 发布出售 */
    public function pub()
    {
        $token = new Token();
        $this->assign('token',$token->createToken());
        $this->display('sale','publish');
    }

    public function pubSave(){
        $token = new Token();
        //判断改电话号码是否已经注册
        $mobile = intval(isset($_POST['telphone'])?$_POST['telphone']:0);
        $telCode = intval(isset($_POST['telCode'])?$_POST['telCode']:0);
        $hash = isset($_POST['__hash__'])?$_POST['__hash__']:'';

        //防止post页面刷新
        if(!$token->checkToken($hash)){
            Util::prompt($msg='',$type='200',$url='/sale/pub');eixt;
        }

        if($mobile){
            //验证短信验证码
            if($_SESSION['mobile_code']!=$telCode){
                $result = array('success'=>false,'status'=>'2','msg'=>'验证码错误');
                echo json_encode($result);exit;
            }
            /*
            $this->loadModel('userlogin');
            //$this->userlogin->ExitLogin();
            //判断电话是否存在,存在代表已经注册
            if(!$this->userlogin->CheckMobile($mobile)){
                //手机注册,user_type=10,为普通用户
                $this->userlogin->easyRegistLogin($mobile,$user_type=10);
            }else{
                //判断用户是否登录
                if($this->userlogin->IsLogin()){
                    //已经登录 print_r($_COOKIE);exit;
                    //echo '已经登录';exit;
                }else{
                    //获取用户信息,并登录
                    $userInfo = $this->userlogin->getUserInfoByMobile($mobile);
                    $this->userlogin->SaveInfo($mobile,$user_type=10,$userInfo['id']);
                }
            }
            */
            //处理图片信息
            $pic = $_POST['urls'];
            $piclist = empty($pic)?'':explode(',',$pic);
            $this->customPath  = $this->config->module->uploadPath.date("YW")."/" ;
            Util::mk_dir(WEB_ROOT.$this->customPath);
            $attachKeyIds = array();
            foreach ($piclist as $url){
                $procRlt = $this->procEsfPic($url);
                if($procRlt['rlt']){
                    //将图片信息记录数据库
                    //print_r($procRlt);
                    $attachKeyIds[] = $this->pdo->add($procRlt, 'fc_esf_attach');
                }
            }
            $url_path =explode('/', $pic);
            //提交二手房信息
            if(!empty($pic)){
                $_POST['img_path'] =  $this->config->module->uploadPath.date("YW")."/". $url_path[3];
                $_POST['img_num'] = count($piclist);
            }
            $result = $this->sale->pubSale($_POST);
            if($result){
                //记录图片关系
                foreach ($attachKeyIds as $val){
                    $rdata['attach_id'] = $val;
                    $rdata['esf_id'] = $result;
                    $this->pdo->add($rdata, 'fc_esf_pic');
                }
                $token->refreshToken();
                Util::prompt($msg='',$type='200',$url='/sale/detail?id='.$result,10);eixt;
            }else{
                Util::prompt($msg='',$type='200',$url='/sale/pub');eixt;
            }
        }else{
            Util::prompt($msg='手机号码错误!',$type='200',$url='/sale/pub');eixt;
        }
    }

    public function ajaxXqlist(){
        if(isset($_GET['key'])) {
            $key = trim(isset($_GET['key']) ? $_GET['key'] : '');
        }else{
            $key = trim(isset($_GET['query'])?$_GET['query']:'');
        }
        $xqlist = $this->sale->getXqNameList($key);
        echo json_encode($xqlist);
    }

    private function procEsfPic($url){
        //$picurl = WEB_ROOT . "/upload/houseImages/1494294251648_01.jpg";
        $picurl = WEB_ROOT.$url;
        //计算图片缩放比例
        $imageInfo = @getimagesize($picurl);
        $arrParts = pathinfo($url);
        $sExtN = strtolower($arrParts['extension']);
        $newurl = $arrParts['dirname'] . '/' . date("YW") . "/" . $arrParts['basename'];
        $targetSrc = WEB_ROOT.$newurl;

        $srcWidth = $imageInfo[0];
        $srcHeight = $imageInfo[1];

        $thumbscale = min(160 / $srcWidth, 160 / $srcHeight); // 计算缩放比例
        $smlscale = min(320 / $imageInfo[0], 320 / $imageInfo[1]); // 计算缩放比例
        $midscale = min(900 / $imageInfo[0], 900 / $imageInfo[1]); // 计算缩放比例
        // 图像小于缩放大小，安原始图像大小生成图片，即$scale值为1
        if (ceil($thumbscale) > 1) {
            $thumbscale = '100%';
        } else {
            $thumbscale = ($thumbscale * 100) . '%';
        }
        if (ceil($smlscale) > 1) {
            $smlscale = '100%';
        } else {
            $smlscale = ($smlscale * 100) . '%';
        }
        if (ceil($midscale) > 1) {
            $midscale = '100%';
        } else {
            $midscale = ($midscale * 100) . '%';
        }

        $thumb_x = substr($targetSrc, 0, strrpos($targetSrc, '.')) . '_x.' . $sExtN;
        $thumb_s = substr($targetSrc, 0, strrpos($targetSrc, '.')) . '_s.' . $sExtN;
        $thumb_m = substr($targetSrc, 0, strrpos($targetSrc, '.')) . '_m.' . $sExtN;

        //Image::open($this->disk_path)->resize($this->thumbWidth,$this->thumbHeight)->save($thumb_x, $sExtN);
        Image::open($picurl)->resize($thumbscale)->save($thumb_x, $sExtN);
        Image::open($picurl)->resize($smlscale)->save($thumb_s, $sExtN);
        Image::open($picurl)->resize($midscale)->save($thumb_m, $sExtN);

        $fsize = filesize($picurl);//ceil(filesize($picurl) / 1000) . "k"; //获取文件大小
        //移动原始图片
        $rlt = FileUtil::moveFile($picurl, $targetSrc);

        //返回处理图片信息
        $attachData=array();
        $attachData['rlt']  = $rlt;
        $attachData['name'] = $arrParts['basename'];
        $attachData['url'] = $newurl;
        $attachData['type'] = strtolower($arrParts['extension']);
        $attachData['size'] = $fsize;
        $attachData['update_at'] = time();
        return $attachData;
    }

    public function sms(){
        $clapi  = new ChuanglanSmsApi();
        $result = $clapi->sendSMS('18980830015', '【253云通讯】您好，您的验证码是888885');
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

}

