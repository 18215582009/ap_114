<?php
/**
 * The control file of admin_entry module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\util\Util as Util;
use lib\pager\pager_page as pager_page;

class user_account extends SecuredControl
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
		$this->pdo = $this->user_account->pdo;
    }

    /* 基础信息 */
	public function baseInfo(){
		$this->assign('menu',array());
        $this->display('user_account','base_info');
    }

    /* 修改密码 */
    public function modifyPw(){
        $this->assign('menu',array());
        $this->display('user_account','modify_password');
        //$this->display('user_account','work_flow');
    }

    /* 账号安全 */
    public function safe(){
        $this->assign('menu',array());
        $this->display('user_account','safe');
    }

    /* 为您推荐 */
    public function rec(){
        $header['title'] = $this->lang->welcome;
        $header['title'] = $this->config->app_name;
        $this->assign('menu',array());
        $this->assign('header',  $header);
        $this->display('user_account','rec');
    }

}

