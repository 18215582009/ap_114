<?php
/**
 * The control file of supervision module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
class supervision extends Control
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
		$this->pdo = $this->supervision->pdo;
    }

    /* 监管首页 */
    public function index()
    {
        $this->display('supervision','index');
    }

	/* 投诉 */
    public function complaint()
    {
        $this->display('supervision','complaint');
    }

	/* 监管详细 */
    public function detail()
    {
        $this->display('supervision','detail');
    }

}

