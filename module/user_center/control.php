<?php
/**
 * The control file of admin_entry module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
class user_center extends SecuredControl
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
		$this->pdo = $this->user_center->pdo;
    }

	public function index(){
		$header['title'] = $this->lang->welcome;
		$header['title'] = $this->config->app_name;
        //设定用户身份10为市民

        $this->session->set('user_type',10);
		$this->assign('menu',array());
        $this->assign('header',  $header);
        $this->display('user_center','layout');
    }
	
}

