<?php
/**
 * The control file of youjia module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
class youjia extends Control
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
		$this->pdo = $this->youjia->pdo;
    }

    /* 优家+首页 */
    public function index()
    {
		$type = isset($_GET['type'])?$_GET['type']:'info';
		$this->assign('type',$type);
        $this->display('youjia','index');
    }

	/* 优家+详细 */
    public function detail()
    {
        $this->display('youjia','detail');
    }

}

