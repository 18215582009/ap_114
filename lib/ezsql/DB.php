<?php
/**
 * $Id: DB.php 131 2015-10-10 02:25:57Z $
 * @author deathking(751450467@qq.com)
 */
namespace lib\ezsql;
/**
 * 
 * @author deathking
 *
 */
class Db extends \PDO
{
	/**
	* Database connection parameters configuration
	* @var array
	* @access private
    */
	private $config;

    public function __construct($dbConfig=''){
		//__construct($dsn, $username, $passwd, $options = [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'utf8';"]);

		if (!class_exists('PDO')) Util::throw_exception("Not supported:PDO");
		$this->setConfig($dbConfig);

		if (!empty($this->config->encoding)) {
			$options = [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'{$this->config->encoding}';"];
		}

        parent::__construct($this->config->dsn, $this->config->user, $this->config->password, $options);
        $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
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
            $this->config->errorMode  = PDO::ERRMODE_WARNING;  // PDO的错误模式: PDO::ERRMODE_SILENT(错误时只显示错误码)|PDO::ERRMODE_WARNING(显示错误码并显示错误位置)|PDO::ERRMODE_EXCEPTION(显示错误码并显示错误位置并显示更多其他信息)
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
