<?php
/**
 * The model file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: model.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
?>
<?php
class studyModel extends model
{
	/**
	 * pdo连接。
	 * 
	 * @var object
	 * @access pdo
	 */
	public $pdo;

    public function __construct()
    {
        parent::__construct();
		//$this->pdo = new DbPdo();
		/*$conn = new DbHelper();
		$this->pdo = $conn->conn;
		$rs = $this->pdo->Execute('select * from project');
        print "<pre>";
        print_r($rs->GetRows());
        print "</pre>";

		$sql = "insert into project (project_code, project_name, project_prefix, project_icon, parent_code, isadmin, flag)";
		$sql .= "values ('700','生产线','SC_','sc.gif','',0,1)";
		if ($this->pdo->Execute($sql) === false) {
				print 'error inserting: '.$conn->ErrorMsg().'<BR>';
		}
		*/

		//print_r($this->pdo);
    }

    function stat()
    {
        return get_included_files();
    }

}
