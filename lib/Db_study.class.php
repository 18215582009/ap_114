<?php
 /**
　* 数据库ORM操作
　* @version 1.0
　* @author Luodong
  * Created on 2016-08-08
  * Modify on 2016-08-08
　*/
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;
// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
// Autoload 自动载入
require '../../vendor/autoload.php';
require '../../lib/helpers.php';
class Db extends Model{
	
	/**
	* 数据库的连接参数配置
	* @var array
	* @access private
    */
	private $config;

	/**
	 * 每页多少
	 *
	 * @var int
	 */
	CONST PAGE_NUMS = 15;

	/**
     * 关闭自动维护updated_at、created_at字段
     * 
     * @var boolean
     */
    public $timestamps = false;

	//设置日期时间格式为Unix时间戳
	//protected $dateFormat = 'U';

	/**
	 * 构造函数
	 */
    public function __construct($dbConfig=''){
        if (!class_exists('PDO')) Util::throw_exception("不支持:PDO");
		if(empty($dbConfig)){
			//$dbconfig = include("../../config/database.php");
			//(object)$this->config = $dbconfig['connections'][$dbconfig['default']];
		}else{
			//(object)$this->config = $dbConfig;
		}

		// Eloquent ORM
		$capsule = new Capsule;
		$capsule->addConnection([
			//'driver'    => $this->config['driver'],
			//'host'      => $this->config['host'],
			//'database'  => $this->config['database'],
			//'username'  => $this->config['username'],
			//'password'  => $this->config['password'],
			//'charset'   => $this->config['charset'],
			//'collation' => $this->config['collation'],
			//'prefix'    => $this->config['prefix'],
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'fc114',
			'username'  => 'root',
			'password'  => '',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => ''
		]);
		$capsule->setEventDispatcher(new Dispatcher(new Container));
		// Make this Capsule instance available globally via static methods... (optional)
		$capsule->setAsGlobal();
		// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
		$capsule->bootEloquent();
    }
    
}

/*
'driver'    => $this->config->db->driver,
			'host'      => $this->config->db->host,
			'database'  => $this->config->db->name,
			'username'  => $this->config->db->user,
			'password'  => $this->config->db->password,
			'charset'   => $this->config->db->encoding,
			'collation' => $this->config->db->collation,
			'prefix'    => $this->config->db->prefix,
			*/
?>
