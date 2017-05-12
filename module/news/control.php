<?php
/**
 * The control file of news module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
class news extends Control
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
		$this->pdo = $this->news->pdo;
    }

    /* 资讯首页 */
    public function index()
    {

        $info = $this->news->newsAll();
        $this->assign('info',$info);
        $type = isset($_GET['type'])?$_GET['type']:'info';
        if(isset($_GET['houseList'])){$this->assign('houseList',$_GET['houseList']);}
        if(isset($_GET['name'])){$this->assign('sousuo',$_GET['name']);}
        if(isset($_GET['page'])){$page = $_GET['page'];}else{$page = '1';}
        $this->assign('page',$page);
		$this->assign('type',$type);
        $this->display('news','list');
    }

	/* 资讯详细 */
    public function detail()
    {
		$type = isset($_GET['type'])?$_GET['type']:'info';
        $detail = $this->news->details();
        $this->assign('detail',$detail);
		$this->assign('type',$type);
        $this->display('news','detail');
    }

    public function denglupd(){
        $this->news->denglupd();
    }

}

