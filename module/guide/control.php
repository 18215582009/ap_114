<?php
/**
 * The control file of news module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
class guide extends Control
{
	/**
	 * 数据库连接.
     * 
     * @var object
     * @access pdo
     */
	 protected $pdo;

    /* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
    }

    /* 指南首页 */
    public function index()
    {
        $index = $this->guide->index();
        $this->assign('fenlei',$index);
		$this->assign('type','guide');
        $this->display('guide','index');
    }

    /* 指南列表 */
    public function lists()
    {
        $bkarr = $this->guide->baike();
        $this->assign('bkarr',$bkarr);
        if(isset($_GET['baike'])){$this->assign('leiid',$_GET['baike']);}
        if(isset($_GET['name'])){$this->assign('name',$_GET['name']);}
        $index = $this->guide->index();
        $this->assign('fenlei',$index);
        if(isset($_GET['page'])){$page = $_GET['page'];}else{$page = '1';}
        $this->assign('page',$page);
        $this->assign('type','guide');
        $this->display('guide','list');
    }

	/* 资讯详细 */
    public function detail()
    {
        $neir = $this->guide->neir();
        $index = $this->guide->index();
        $this->assign('fenlei',$index);
        $this->assign('neir',$neir);
        $this->assign('leiid',$_GET['baike']);
        $this->assign('type','guide');
        $this->display('guide','detail');
    }

}

