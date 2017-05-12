<?php
 /**
　* 数据库ORM操作
　* @version 1.0
　* @author Luodong
  * Created on 2016-08-08
  * Modify on 2016-08-08
　*/
namespace lib;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;
// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

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
		$this->setConfig($dbConfig);

		// Eloquent ORM
		$capsule = new Capsule;
		$capsule->addConnection([
			'driver'    => $this->config->driver,
			'host'      => $this->config->host,
			'database'  => $this->config->name,
			'username'  => $this->config->user,
			'password'  => $this->config->password,
			'charset'   => $this->config->encoding,
			'collation' => $this->config->collation,
			'prefix'    => $this->config->prefix,
		]);
		$capsule->setEventDispatcher(new Dispatcher(new Container));
		// Make this Capsule instance available globally via static methods... (optional)
		$capsule->setAsGlobal();
		// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
		$capsule->bootEloquent();
    }

	/* 设置config对象。*/
	private function setConfig($dbConfig){
		global $config;
		if(empty($dbConfig)){
			$this->config = $config->db;
		}else{
			$this->config = $dbConfig;
		}
        if(!$this->config->errorMode){
			// PDO的错误模式: PDO::ERRMODE_SILENT(错误时只显示错误码)|PDO::ERRMODE_WARNING(显示错误码并显示错误位置)|PDO::ERRMODE_EXCEPTION(显示错误码并显示错误位置并显示更多其他信息)
            $this->config->errorMode  = PDO::ERRMODE_WARNING;
        }
        if(!$this->config->debug){
            $this->config->debug=$config->debug;
        }
        if(!$this->config->persistent){
            $this->config->persistent=false;
        }
        $this->config->dsn = "{$this->config->driver}:host={$this->config->host};dbname={$this->config->name}";//php5pdo
	}
    
}
?>
