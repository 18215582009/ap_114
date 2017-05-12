<?php
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
require_once '../../lib/ezsql/Sql.php';

class study extends control
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
		$this->pdo = $this->study->pdo;
    }
    
    /* index方法，也是默认的方法。*/
    public function index()
    {
		//$db = new \PDO($dsn, $username, $passwd);
		$res = lib\ezsql\Sql::select('*')
		   ->from('sys_user')
		   ->where('id=?',1)
		   ->limit(0,1)
		   ->get($this->pdo);
		print_r($res);
			//$this->assign('home','home');
			//$this->display('test','homeFrame');
    }
	
}
