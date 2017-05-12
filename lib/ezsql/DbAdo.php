<?php
 /**
��* ���ݿ�PDO����
��* @version 1.0
��* @author �޶�����
  * Created on 2009-01-23
  * Modify on 2009-01-23
��*/

//require_once('adodb5/adodb.inc.php');
//require_once('adodb5/tohtml.inc.php');

namespace lib\ezsql;

use lib\util\Util as Util;

class DbAdo {

	/**
	* ����ģʽ,����DbAdo��Ψһʵ��,���ݿ��������Դ
	* @var object
	* @access private
    */
	private $conn;

	/**
	* ���ݿ�����Ӳ�������
	* @var array
	* @access private
    */
	private $config;

	/**
	* �Ƿ�������ģʽ
	* @var bool
	* @access private
    */
	private $debug;

	/**
    * �������¼��ID
    * @var integer
	* @access private
    */
    private $lastInsertId = null;

	/**
    * ����Ӱ���¼��
    * @var integer
	* @access private
    */
    private $numRows = 0;

	/**
    * ��������ҳ�ܼ�¼��
    * @var integer
	* @access private
    */
	private $countRows = 0;

	/**
    * ��ǰSQL���
    * @var string
	* @access private
    */
	private $queryStr = '';

	/**
	 * ���캯����
	 * @param $dbconfig ���ݿ����������Ϣ
	 */
    public function __construct($dbConfig=''){
		 $this->setConfig($dbConfig);
		 if (!isset($this->conn)){
			switch($this->config->driverMode){
				case 'pdo':
					//PDO, which only works with PHP5, accepts a driver specific connection string: 
					if (!class_exists('PDO')) Util::throw_exception("��֧��:PDO");
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
						//use the mysql\mssql extension��ʹ��php��չ����
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

	/* ����config����*/
	private function setConfig($dbConfig){
		global $config;
		if(empty($dbConfig)){
			$this->config = $config->db;
		}else{
			$this->config = $dbConfig;
		}
	}
	
	/*********************************************************************************************************/
	/*                                             ���ݿ���� CRUD                                           */
	/*********************************************************************************************************/

	/**
     * ������еĲ�ѯ����
     * @access public
	 * @param string $sql  SQLָ��
     * @return array
     */
    public function GetAll($sql,$inputarr=false){
        return $this->conn->GetAll($sql,$inputarr);
    }

	/**
     * ���һ����ѯ���
     * @access public
     * @param string $sql  SQLָ��
     * @return array
     */
    public function GetRow($sql,$inputarr=false){
		return $this->conn->GetRow($sql,$inputarr);
    }

	/**
     * ���루��������¼
     * @access public
     * @param mixed  $data   ����
     * @param string $table ���ݱ���
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
				
				//�������insert��������
				if ($rs1){
					$data = $this->conn->GetRow("SET NOCOUNT ON select SCOPE_IDENTITY() as id");
					$this->lastInsertId = $data["id"];
				}
			}else{
				$insertSQL = $this->conn->GetInsertSQL($rs, $record);
				$this->queryStr = $insertSQL;
				$rs = $this->conn->Execute($insertSQL);
				
				//�������insert��������
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
     * ���¼�¼
     * @access public
     * @param mixed  $sets ����
     * @param string $table  ���ݱ���
     * @param string $where  ��������
     * @return false | integer
     */
    public function Update($record,$table,$where) {
		$sql = "SELECT * FROM $table WHERE $where"; 
		$rs = $this->conn->Execute($sql);
		$updateSQL = $this->conn->GetUpdateSQL($rs, $record);
		$this->queryStr = $updateSQL;
		$rs = $this->conn->Execute($updateSQL);
		//Ӱ���¼��
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
	 * ��ȡ��Ӧ�Ĳ�ѯ����
	 * @access public
	 * @param string $sql SQLָ��
	 * @param integer $pageSize ��ҳ��С
	 * @param integer $offset ָ��λ��
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
		//���ط�ҳ�ܼ�¼��
		$sqlArr = explode("order",$sql);
		$sqlCount = preg_replace('|select(.*)from|U',"select count(*) as cnt from",$sqlArr[0]);
		$cnt = $this->GetRow($sqlCount);
		$this->countRows = $cnt['cnt'];
		return $rs;
	 }

	 /**
     * ɾ����¼
     * @access public
     * @param mixed  $where Ϊ����Map��Array����String
     * @param string $table  ���ݱ���
     * @return false | integer
     */
	 public function Remove($table,$where){
		$sql = 'DELETE FROM '.$table." where ".$where;
		$rs = $this->conn->Execute($sql);
        //Ӱ���¼��
		if ($rs){
			$this->numRows = $this->conn->Affected_Rows();
		}
		return $this->numRows;
	 }

	 /**
     * ͳ�Ƽ�¼ 
     * @access public 
     * @param string  $table  ���ݱ���
     * @param mixed   $where   ͳ������
	 * @param string  $fields  �ֶ���
     * @return ArrayObject
     */
    public function CountAll($table, $where="", $field='id') {
        $sql = 'SELECT count(%s) as cnt FROM %s %s';
		$arr = $this->GetRow(sprintf($sql, $field, $table, " where 1=1 and ".$where));
        $cnt = empty($arr['cnt']) ? 0 : $arr['cnt'];
        return $cnt;
    }

	/**
	 * ��ȡ��ҳ�ܼ�¼��
	 */
	public function GetCount(){
		 return $this->countRows;
	}

	/**
     * ��ȡ�������ID
     * @access public
     * @param
     * @return integer ������ʱ������ID
     */
	public function GetLastInsId(){
		return $this->lastInsertId;
	}

	/**
     * ��ȡ���һ�β�ѯ��sql���
     * @access public
     * @param
     * @return String ִ�е�SQL
     */
	public function GetLastSql() {
		return $this->queryStr;
	}

}
?>