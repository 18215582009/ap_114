<?php
 /**
　* 数据库PDO操作
　* @version 1.0
　* @author 罗东大侠
  * Created on 2009-01-23
  * Modify on 2009-01-23
　*/

//require_once('adodb5/adodb.inc.php');
//require_once('adodb5/tohtml.inc.php');

namespace lib\ezsql;

use lib\util\Util as Util;

class DbAdo {

	/**
	* 单件模式,保存DbAdo类唯一实例,数据库的连接资源
	* @var object
	* @access private
    */
	private $conn;

	/**
	* 数据库的连接参数配置
	* @var array
	* @access private
    */
	private $config;

	/**
	* 是否开启调试模式
	* @var bool
	* @access private
    */
	private $debug;

	/**
    * 最后插入记录的ID
    * @var integer
	* @access private
    */
    private $lastInsertId = null;

	/**
    * 返回影响记录数
    * @var integer
	* @access private
    */
    private $numRows = 0;

	/**
    * 返回最后分页总记录数
    * @var integer
	* @access private
    */
	private $countRows = 0;

	/**
    * 当前SQL语句
    * @var string
	* @access private
    */
	private $queryStr = '';

	/**
	 * 构造函数，
	 * @param $dbconfig 数据库连接相关信息
	 */
    public function __construct($dbConfig=''){
		 $this->setConfig($dbConfig);
		 if (!isset($this->conn)){
			switch($this->config->driverMode){
				case 'pdo':
					//PDO, which only works with PHP5, accepts a driver specific connection string: 
					if (!class_exists('PDO')) Util::throw_exception("不支持:PDO");
					$this->conn = &ADONewConnection('pdo');
					//$conn->Connect('mysql:host=localhost',$user,$pwd,$mydb);
					$this->conn->Connect($this->config->dsn,$this->config->user,$this->config->password);
					//$conn->Connect("mysql:host=localhost;dbname=mydb;username=$user;password=$pwd");
				case 'ado':
					if($this->config->driver=='odbc_mssql'){
						//ODBC For Microsoft SQL Server
						$this->conn=&ADONewConnection($this->config->driver);
						$this->conn->charSet = 'utf8'; 
						$this->conn->charPage = '65001';
						//$myDSN="DRIVER={SQL Server Native Client 10.0};SERVER=".$this->config->host.";PORT=1433;UID=".$this->config->user.";PWD=".$this->config->password.";DATABASE=".$this->config->name.";";
						//$this->conn->Connect($myDSN);
						$this->conn->PConnect("Driver={SQL Server};Server=".$this->config->host.";Database=".$this->config->name.";",$this->config->user,$this->config->password);
					}else if($this->config->driver=='ado_mssql'){
						//$dsn = "mssql://$username:$password@$hostname/$databasename";
						$this->conn = &ADONewConnection($this->config->driver);
						$this->conn->charPage = 65001;
						$this->conn->Connect("PROVIDER=MSDASQL;DRIVER={SQL Server};SERVER=".$this->config->host.";DATABASE=".$this->config->name.";UID=".$this->config->user.";PWD=".$this->config->password.";");
					}else if($this->config->driver=='db2'){
						$this->conn = &ADONewConnection($this->config->driver);
						$this->conn->charPage = 65001;
						$dsn = "driver={IBM db2 odbc DRIVER};database=".$this->config->name.";hostname=".$this->config->host.";port=".$this->config->port.";protocol=TCPIP;uid=".$this->config->user."; pwd=".$this->config->password;
						$this->conn->Connect($dns);
					}else{
						//use the mysql\mssql extension，使用php扩展连接
						$this->conn=ADONewConnection($this->config->driver);  # create a connection
						$this->conn->SetCharSet($this->config->encoding);
						$this->conn->PConnect($this->config->host,$this->config->user,$this->config->password,$this->config->name); # connect to MySQL, agora db
					}
			}
			
			$this->conn->debug = $this->config->debug;  
			$this->conn->SetFetchMode(ADODB_FETCH_BOTH);
			return $this->conn;
		}else{
			return $this->conn;
		}
    }

	/* 设置config对象。*/
	private function setConfig($dbConfig){
		global $config;
		if(empty($dbConfig)){
			$this->config = $config->db;
		}else{
			$this->config = $dbConfig;
		}
	}
	
	/*********************************************************************************************************/
	/*                                             数据库操作 CRUD                                           */
	/*********************************************************************************************************/

	/**
     * 获得所有的查询数据
     * @access public
	 * @param string $sql  SQL指令
     * @return array
     */
    public function GetAll($sql,$inputarr=false){
        return $this->conn->GetAll($sql,$inputarr);
    }

	/**
     * 获得一条查询结果
     * @access public
     * @param string $sql  SQL指令
     * @return array
     */
    public function GetRow($sql,$inputarr=false){
		return $this->conn->GetRow($sql,$inputarr);
    }

	/**
     * 插入（单条）记录
     * @access public
     * @param mixed  $data   数据
     * @param string $table 数据表名
     * @return false | integer
     */
    public function Add($record,$table) {
		$sql = "SELECT * FROM $table WHERE id = -1"; 
		$rs = $this->conn->Execute($sql);
		foreach($record as $value){
			if(is_array($value)){
				$insertSQL = $this->conn->GetInsertSQL($rs, $value);
				$this->queryStr = $insertSQL;
				$rs1 = $this->conn->Execute($insertSQL);
				
				//返回最后insert自增主键
				if ($rs1){
					$data = $this->conn->GetRow("SET NOCOUNT ON select SCOPE_IDENTITY() as id");
					$this->lastInsertId = $data["id"];
				}
			}else{
				$insertSQL = $this->conn->GetInsertSQL($rs, $record);
				$this->queryStr = $insertSQL;
				$rs = $this->conn->Execute($insertSQL);
				
				//返回最后insert自增主键
				if ($rs){
					$data = $this->conn->GetRow("SET NOCOUNT ON select SCOPE_IDENTITY() as id");
					$this->lastInsertId = $data["id"];
				}
				break;
			}
		}
		return $this->lastInsertId;
    }
	
	/**
     * 更新记录
     * @access public
     * @param mixed  $sets 数据
     * @param string $table  数据表名
     * @param string $where  更新条件
     * @return false | integer
     */
    public function Update($record,$table,$where) {
		$sql = "SELECT * FROM $table WHERE $where"; 
		$rs = $this->conn->Execute($sql);
		$updateSQL = $this->conn->GetUpdateSQL($rs, $record);
		$this->queryStr = $updateSQL;
		$rs = $this->conn->Execute($updateSQL);
		//影响记录数
		if ($rs){
			$this->numRows = $this->conn->Affected_Rows();
		}

		//lxl start
		if($rs){
			$this->numRows = 1;
		}else{
			$this->numRows = 0;
		}
		//lxl end
		return $this->numRows;
    }

	/**
	 * 获取对应的查询数据
	 * @access public
	 * @param string $sql SQL指令
	 * @param integer $pageSize 分页大小
	 * @param integer $offset 指针位置
	 * @return array
	 */
	 public function SelectLimit($sql,$pageSize=-1,$offset=-1,$inputarr=false){
		$rst = $this->conn->SelectLimit($sql,$pageSize,$offset,$inputarr);
		$rs = array();
		if (!$rst) { 
			print $this->conn->ErrorMsg(); // Displays the error message if no results could be returned 
		} 
		else { 
			while (!$rst->EOF) { 
				$rs[] = $rst->fields;
				$rst->MoveNext(); // Moves to the next row 
			} // end while 
		} // end else 
		//返回分页总记录数
		$sqlArr = explode("order",$sql);
		$sqlCount = preg_replace('|select(.*)from|U',"select count(*) as cnt from",$sqlArr[0]);
		$cnt = $this->GetRow($sqlCount);
		$this->countRows = $cnt['cnt'];
		return $rs;
	 }

	 /**
     * 删除记录
     * @access public
     * @param mixed  $where 为条件Map、Array或者String
     * @param string $table  数据表名
     * @return false | integer
     */
	 public function Remove($table,$where){
		$sql = 'DELETE FROM '.$table." where ".$where;
		$rs = $this->conn->Execute($sql);
        //影响记录数
		if ($rs){
			$this->numRows = $this->conn->Affected_Rows();
		}
		return $this->numRows;
	 }

	 /**
     * 统计记录 
     * @access public 
     * @param string  $table  数据表名
     * @param mixed   $where   统计条件
	 * @param string  $fields  字段名
     * @return ArrayObject
     */
    public function CountAll($table, $where="", $field='id') {
        $sql = 'SELECT count(%s) as cnt FROM %s %s';
		$arr = $this->GetRow(sprintf($sql, $field, $table, " where 1=1 and ".$where));
        $cnt = empty($arr['cnt']) ? 0 : $arr['cnt'];
        return $cnt;
    }

	/**
	 * 获取分页总记录数
	 */
	public function GetCount(){
		 return $this->countRows;
	}

	/**
     * 获取最后插入的ID
     * @access public
     * @param
     * @return integer 最后插入时的数据ID
     */
	public function GetLastInsId(){
		return $this->lastInsertId;
	}

	/**
     * 获取最近一次查询的sql语句
     * @access public
     * @param
     * @return String 执行的SQL
     */
	public function GetLastSql() {
		return $this->queryStr;
	}

}
?>