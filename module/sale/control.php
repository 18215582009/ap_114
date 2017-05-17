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
        if(isset($_SESSION['userid'])){
            $obtained = $this->sale->obtained();
            $this->assign('collection',$obtained['collection']);//已收藏的房源
            $this->assign('landlordphone',$obtained['landlordphone']);//已获得的房源电话
        }
        $this->assign('interlocution',$this->interlocution());
        $this->assign('guessyoulike',$this->youlike());
        $this->assign('borough',$houseListInfo['borough']);//区域
        $this->assign('price',$houseListInfo['price']);//价格
        $this->assign('area',$houseListInfo['area']);//面积
        $this->assign('room',$houseListInfo['room']);//户型
        $this->assign('price_sort',$houseListInfo['price_sort']);//价格排序
        $this->assign('time_sort',$houseListInfo['time_sort']);//时间排序
        $this->assign('list',$houseListInfo['list']);//二手房信息
        $this->assign('total',$houseListInfo['total']);//二手房数量
//        $this->assign('struct',$houseListInfo['struct']);//房屋结构
        $this->assign('keyword',$houseListInfo['keyword']);//关键字
        $this->assign('pageInfo',$houseListInfo['pageInfo']);
        $this->assign('build_year',$houseListInfo['build_year']);//年代
        $this->assign('pm_type',$houseListInfo['pm_type']);//房屋类型
        $this->assign('toward',$houseListInfo['toward']);//房屋朝向
        $this->assign('total_floor',$houseListInfo['total_floor']);//建筑楼层
        $this->assign('fitmen_type',$houseListInfo['fitmen_type']);//装修类型
        $this->assign('pageNation',$houseListInfo['pageNation']);//分页显示
        $this->assign('condition',$houseListInfo['condition']);//是否存在筛选类型

        $this->display('sale','sale_list');
    }

        public function tools(){


          $this->display('sale','sale_tools');

        }




    /* 猜你喜欢 */
    public function youlike(){
        $sql = "select * from fc_esf where house_type = 2 AND flag=1 ORDER BY create_date DESC limit 6";
        $youlike = $this->pdo->getAll($sql);
        return $youlike;
    }

    /* 购房问答 */
    public function interlocution(){
        $cidstr=implode(",",$this->sale->getChildCids());
        $sql = "SELECT * from web_contentindex where cid in ($cidstr) ORDER BY digest DESC limit 6";
        $interlocution = $this->pdo->getAll($sql);
        return $interlocution;
    }

    /* 举报房源 */
    public function report(){
        $houseid = $_POST['houseid'];
        $userid = $_SESSION['userid'];
        $sql = "select * from fc_rei_report where create_uid='$userid' and esf_id = '$houseid' ORDER BY create_date DESC ";
        $report = $this->pdo->getAll($sql);
        $sql = "select * from fc_esf where id = '$houseid'";
        $house = $this->pdo->getAll($sql);
        $rei_uid = $house[0]['create_uid'];
        $rei['esf_id'] = $houseid;
        $rei['type'] = $_POST['type'];
        $rei['reason'] = $_POST['reason'];
        $rei['page_url'] = $_POST['page_url'];
        $rei['rei_uid'] = $rei_uid;

        if(count($report) == 0){
            $result = $this->pdo->add($rei,'fc_rei_report');
            if(!empty($result)){
                $text = "提交成功";
            }
        }else{
            $text = "你已提交过申请，请等待申请结果";
        }
        if(isset($text)){
            echo json_encode($text);
        }
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

        $log['note'] = "消耗40积分查看房东电话";
        $log['ip'] = Util::getClientIp();
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
        $_GET['house_type'] = 2;
        //用户已登录，添加看房记录
        if(isset($_SESSION['userid'])){
            $this->sale->house_record();
        }
        if(isset($_SESSION['userid'])){
            $obtained = $this->sale->obtained();
            $this->assign('collection',$obtained['collection']);//已收藏的房源
            $this->assign('landlordphone',$obtained['landlordphone']);//已获得的房源电话
        }
        $sale_detail = $this->sale->secondhousedetail();
        $this->assign('sale_detail',$sale_detail['detail']);
        $this->assign('district',$sale_detail['district']);
        $this->assign('img',$sale_detail['img']);
        $this->display('sale', 'sale_detail');

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

