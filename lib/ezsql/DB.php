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

	/* ����config����*/
	private function setConfig($dbConfig){
		global $config;
		if(empty($dbConfig)){
			$this->config = $config->db;
		}else{
			$this->config = $dbConfig;
		}
        if(!$this->config->errorMode){
            $this->config->errorMode  = PDO::ERRMODE_WARNING;  // PDO�Ĵ���ģʽ: PDO::ERRMODE_SILENT(����ʱֻ��ʾ������)|PDO::ERRMODE_WARNING(��ʾ�����벢��ʾ����λ��)|PDO::ERRMODE_EXCEPTION(��ʾ�����벢��ʾ����λ�ò���ʾ����������Ϣ)
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
