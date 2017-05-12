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
class demoModel extends model
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
		//$this->pdo = new MysqlPdo();
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

	// 获得指定目录文件列表
	function getFileList($dir){
		$a = array();
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while ($file = readdir($dh)) {
					if($file!='.' && $file!='..'){
						$f=$dir .'/'. $file;
						//if(is_dir($f)) $this->getFileList($f);
						$a[]=$f;
					}
				}
				closedir($dh);
			}
		}
		return $a;
	}
	

	function getList($dir){
		global $dirdata,$j,$nowpath;
		!$j && $j=1;
		if ($dh = opendir($dir)) {
			while ($file = readdir($dh)) {
				$f=str_replace('//','/',$dir.'/'.$file);
				if($file!='.' && $file!='..' && is_dir($f)){
					if (is_writable($f)) {
						$dirdata[$j]['filename']=str_replace($nowpath,'',$f);
						$dirdata[$j]['mtime']=@date('Y-m-d H:i:s',filemtime($f));
						$dirdata[$j]['dirchmod']=$this->getChmod($f);
						$dirdata[$j]['dirperm']=$this->getPerms($f);
						$dirdata[$j]['dirlink']=$this->ue($dir);
						$dirdata[$j]['server_link']=$f;
						$dirdata[$j]['client_link']=$this->ue($f);
						$j++;
					}
					//$this->getList($f);
				}
			}
			closedir($dh);
			clearstatcache();
			return $dirdata;
		} else {
			return array();
		}
	}

	// 获取权限
	function getChmod($filepath){
		return substr(base_convert(@fileperms($filepath),10,8),-4);
	}

	function getPerms($filepath) {
		$mode = @fileperms($filepath);
		if (($mode & 0xC000) === 0xC000) {$type = 's';}
		elseif (($mode & 0x4000) === 0x4000) {$type = 'd';}
		elseif (($mode & 0xA000) === 0xA000) {$type = 'l';}
		elseif (($mode & 0x8000) === 0x8000) {$type = '-';} 
		elseif (($mode & 0x6000) === 0x6000) {$type = 'b';}
		elseif (($mode & 0x2000) === 0x2000) {$type = 'c';}
		elseif (($mode & 0x1000) === 0x1000) {$type = 'p';}
		else {$type = '?';}

		$owner['read'] = ($mode & 00400) ? 'r' : '-'; 
		$owner['write'] = ($mode & 00200) ? 'w' : '-'; 
		$owner['execute'] = ($mode & 00100) ? 'x' : '-'; 
		$group['read'] = ($mode & 00040) ? 'r' : '-'; 
		$group['write'] = ($mode & 00020) ? 'w' : '-'; 
		$group['execute'] = ($mode & 00010) ? 'x' : '-'; 
		$world['read'] = ($mode & 00004) ? 'r' : '-'; 
		$world['write'] = ($mode & 00002) ? 'w' : '-'; 
		$world['execute'] = ($mode & 00001) ? 'x' : '-'; 

		if( $mode & 0x800 ) {$owner['execute'] = ($owner['execute']=='x') ? 's' : 'S';}
		if( $mode & 0x400 ) {$group['execute'] = ($group['execute']=='x') ? 's' : 'S';}
		if( $mode & 0x200 ) {$world['execute'] = ($world['execute']=='x') ? 't' : 'T';}
	 
		return $type.$owner['read'].$owner['write'].$owner['execute'].$group['read'].$group['write'].$group['execute'].$world['read'].$world['write'].$world['execute'];
	}

	function ue($str){
		return urlencode($str);
	}

	/*********************测试ADODB*********************/
	function getall(){
		
	}

}

