<?php
/**
 * The control file of news module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
class huarun extends Control
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
    }

    /* 指南首页 */
    public function index()
    {
		$this->assign('type','guide');
        $this->display('guide','index');
    }

    /* 指南列表 */
    public function lists()
    {
        $this->assign('type','guide');
        $this->display('guide','list');
    }

	/* 资讯详细 */
    public function detail()
    {
		$this->assign('type','guide');
        $this->display('guide','detail');
    }

}

