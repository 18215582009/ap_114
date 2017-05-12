<?php
/**
 * The control file of sale module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\util\Util as Util;
use lib\util\Token as Token;
class rent extends Control
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
		$this->pdo = $this->rent->pdo;
    }
	
	/* 租房首页 */
    public function index()
    {
        $this->loadModel('sale');
        $_GET['house_type'] = 1;
        $houseListInfo = $this->sale->secondoHouseList($_GET);
        $this->assign('borough',$houseListInfo['borough']);//区域
        $this->assign('price',$houseListInfo['price']);//价格
        $this->assign('area',$houseListInfo['area']);//面积
        $this->assign('room',$houseListInfo['room']);//户型
        $this->assign('build_year',$houseListInfo['build_year']);//年代
        $this->assign('pm_type',$houseListInfo['pm_type']);//房屋类型
        $this->assign('toward',$houseListInfo['toward']);//朝向
        $this->assign('fitmen_type',$houseListInfo['fitmen_type']);//装修
        $this->assign('lease',$houseListInfo['lease']);//租赁方式
        $this->assign('deposit',$houseListInfo['deposit']);//押金方式
        $this->assign('price_sort',$houseListInfo['price_sort']);//价格排序
        $this->assign('time_sort',$houseListInfo['time_sort']);//时间排序
        $this->assign('keyword',$houseListInfo['keyword']);//关键字
        $this->assign('list',$houseListInfo['list']);//租房信息
        $this->assign('total',$houseListInfo['total']);//租房数量

        $this->assign('pageNation',$houseListInfo['pageNation']);//分页
        $this->assign('guessyoulike',$houseListInfo['guessyoulike']);//猜你喜欢
        $this->assign('information',$houseListInfo['information']);//购房问答
        $this->assign('condition',$houseListInfo['condition']);//是否有筛选条件
        if(isset($_SESSION['userid'])){
            $this->assign('collection',$houseListInfo['collection']);//已收藏
            $this->assign('landlordphone',$houseListInfo['landlordphone']);//以获取的房东信息
        }

        $this->display('rent','rent_list');
    }

	/* 租房详细 */
    public function detail()
    {
        $this->loadModel('sale');
        //用户已登录，添加看房记录
        if(isset($_SESSION['userid'])){
            $this->sale->house_record();
        }
        $sale_detail = $this->sale->secondhousedetail();
        $this->assign('sale_detail',$sale_detail['detail']);
        $this->assign('district',$sale_detail['district']);
        $this->assign('img',$sale_detail['img']);
        $this->assign('guessyoulike',$sale_detail['guessyoulike']);

        if(isset($_SESSION['userid'])){
            $this->assign('collection',$sale_detail['collection']);
            $this->assign('landlordphone',$sale_detail['landlordphone']);
        }
        $this->display('rent','rent_detail');

    }


    /* 发布出租 */
    public function pub()
    {
        $token = new Token();
        $this->assign('token',$token->createToken());
        $this->display('rent','publish');
    }

    public function pubSave(){
        $token = new Token();
        //判断改电话号码是否已经注册
        $mobile = intval(isset($_POST['telphone'])?$_POST['telphone']:0);
        $telCode = intval(isset($_POST['telCode'])?$_POST['telCode']:0);
        $hash = isset($_POST['__hash__'])?$_POST['__hash__']:'';

        //防止post页面刷新
        if(!$token->checkToken($hash)){
            Util::prompt($msg='',$type='200',$url='/rent/pub');eixt;
        }

        if($mobile){
            $result = $this->rent->pubSale($_POST);
            if($result){
                $token->refreshToken();
                Util::prompt($msg='',$type='200',$url='/rent/detail?id='.$result,10);eixt;
            }else{
                Util::prompt($msg='',$type='200',$url='/rent/pub');eixt;
            }
        }else{
            Util::prompt($msg='手机号码错误!',$type='200',$url='/rent/pub');eixt;
        }
    }

}

