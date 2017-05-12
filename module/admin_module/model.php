<?php
/**
 * The model file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: model.php,v 1.2 2014/06/05 06:00:34 yangyl Exp $
 */
use lib\ezsql\DbAdo as DbAdo;

class admin_moduleModel extends Model
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
        $this->pdo = new DbAdo();
    }

    function stat()
    {
        return get_included_files();
    }

	function createIndex($moduleFolder,$data){
		$content="<?php
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: ".date("Y")."
 * @author      ".$data['developer']." <751450467@qq.com>
 * @package     CandorPHP
 * @version     \$Id: model.php,v 1.2 2014/06/05 06:00:34 yangyl Exp $
 *
 * The methods of Class are as follows
 *
 * public index index方法
 *
 */
class ".$data['module_name']." extends SecuredControl
{
	/**
	 * pdo连接。
	 * 
	 * @var object
	 * @access pdo
	 */
	protected \$pdo;

	/* 构造函数。*/
	public function __construct()
	{
		parent::__construct();
		\$this->pdo = \$this->".$data['module_name']."->pdo;
	}

	/* index方法，也是默认的方法。*/
	public function index()
	{
		\$this->assign(\"header\",\"".$data['business_name']."\");
		\$this->display(\"".$data['module_name']."\",\"index\");
	}

	/* add */
	public function add()
	{
		\$action = isset(\$_GET[\"action\"])?\$_GET[\"action\"]:\"\";
		if(\$action==\"save\"){
			\$res=\$this->".$data['module_name']."->add(\$_POST);
			if (\$res[\"res\"]){
				Util::alert_msg(\"操作成功！\".\$res[\"msg\"],\"succeed\",\"/\".\$this->moduleName.\"/index.candor\",1);
			}
			else
			{
				Util::alert_msg(\"操作失败!\".\$res[\"msg\"],\"error\",\"/\".\$this->moduleName.\"/add.candor\",100);
			}
		}else{
			\$this->assign(\"method\",\"add\");
			\$this->assign(\"back\",\$_SERVER[\"HTTP_REFERER\"]);
			\$this->display(\"".$data['module_name']."\",\"form\");
		}
	}

	/* edit */
	public function edit()
	{
		\$action = isset(\$_GET[\"action\"])?\$_GET[\"action\"]:\"\";
		if(\$action==\"save\"){
			\$res=\$this->".$data['module_name']."->edit(\$_POST);
			if (\$res[\"res\"]){
				Util::alert_msg(\"操作成功！\".\$res[\"msg\"],\"succeed\","/".\$this->moduleName.\"/index.candor\",1);
			}
			else
			{
				Util::alert_msg(\"操作失败!\".\$res[\"msg\"],\"error\","/".\$this->moduleName.\"/edit.candor?id=\".\$_POST[\"id\"],100);
			}
		}else{
			\$this->assign(\"method\",\"edit\");
			\$this->assign(\"back\",\$_SERVER['HTTP_REFERER']);
			\$this->display(\"".$data['module_name']."\",\"form\");
		}
	}

	/* del */
	public function remove()
	{
		\$id=\$_REQUEST[\"id\"];
		\$res=\$this->".$data['module_name']."->remove(\$id);
		if (\$res[\"res\"]){
			Util::alert_msg(\"操作成功！\".\$res[\"msg\"],\"succeed\",\"/\".\$this->moduleName.\"/index.candor\",1);	
		}
		else
		{
			Util::alert_msg(\"操作失败!\".\$res[\"msg\"],\"error\",\"/\".\$this->moduleName.\"/index.candor\",100);
		}
	}

	/* show */
	public function show()
	{
		\$this->assign(\"method\",\"show\");
		\$this->assign(\"back\",\$_SERVER[\"HTTP_REFERER\"]);
		\$this->display(\"".$data['module_name']."\",\"form\");
	}

	/* 该方法写程序时候自行修改方法名 */
	public function alertWin(){
		\$this->display(\"".$data['module_name']."\",\"alertWin\");
	}
}

?>";
		return Util::writeover($moduleFolder."/control.php",$content);
	}

	function createModel($moduleFolder,$data){
		$content="<?php
/**
 * The model file of index module of CandorPHP.
 *
 * @copyright   Copyright: ".date("Y")."
 * @author      ".$data['developer']." <751450467@qq.com>
 * @package     CandorPHP
 * @version     \$Id: model.php,v 1.2 2014/06/05 06:00:34 yangyl Exp $
 */
?>
<?php
class ".$data['module_name']."Model extends model
{
	/**
	 * pdo连接。
	 * 
	 * @var object
	 * @access pdo
	 */
	public \$pdo;

	/* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
		\$data_driver_class=\$this->config->db->driverMode;
        \$this->pdo = new \$data_driver_class(\$this->config->db);
    }

    function stat()
    {
        return get_included_files();
    }
    /*
     *获得问卷
     */
    public function getPage(\$page=1,\$condition=null,\$sort=array(\"sort\" =>\"id\" ,\"flag\"=>\"desc\")){
    	//分页数据调取
		\$orderField = isset(\$_GET[\"sort\"]) ? \$_GET[\"sort\"] : \"id\";
		\$orderValue = isset(\$_GET[\"flag\"]) ? \$_GET[\"flag\"] : \"desc\";
		\$page_info = \"\";
		\$pageSize = \$this->config->pageSize;
		\$offset = 0;
		\$subPages=5;//每次显示的页数
		\$currentPage = isset(\$_GET[\"page\"]) ? (int)\$_GET[\"page\"] : 1;
		if(\$condition){
			foreach (\$condition as \$k => \$v) {
				if(\$v[\"filter\"]==\"like\"){
					\$where.=\" and \".\$v[\"field\"].\" like '%\".\$v[\"value\"].\"%'\";
				}else{
					\$where.=\" and \".\$v[\"field\"].\$v[\"filter\"].\"'\".\$v[\"value\"].\"'\";
				}
				\$page_info.=\"&\".\$v[\"field\"].\"=\".\$v[\"value\"];
			}
		}
		\$sql=\"select * from edu_questionnaire where flag=1 \".\$where.\" order by \".\$orderField.\" \".\$orderValue;
		\$ret[\"data\"] = \$this->pdo->selectLimit(\$sql,\$pageSize,\$offset);
		\$recordCount = \$this->pdo->GetCount();
		\$page=new pager_page(\$pageSize,\$recordCount,\$currentPage,\$subPages,\$page_info,4);
		\$ret[\"pager\"]=\$page->get_page_html();
		return \$ret;
    }

    public function add(\$record){
    	\$this->pdo->BeginTrans();
		\$success=true;
    	//新增父记录
    	\$record[\"parent_id\"]=0;
    	\$insert_id=\$this->pdo->add(\$record,\"edu_questionnaire\");
    	\$success=\$insert_id?\$success:false;
    	if(\$success){
			\$this->pdo->Committrans();//事务提交
			\$ret[\"res\"] =\$insert_id;
			\$ret[\"msg\"] = \"\";			
		}else{
			\$this->pdo->Rollbacktrans();//事务回滚
			\$ret[\"res\"] = 0;
		}	
    	return \$ret;
    }
    public function edit(\$record){
    	\$this->pdo->BeginTrans();
		\$success=true;
    	//新增父记录
    	\$id=\$record[\"id\"];
    	unset(\$record[\"id\"]);
    	\$affect_rows=\$this->pdo->update(\$record,\"edu_questionnaire\",\"id=\".\$id);
    	\$success=\$affect_rows?\$affect_rows:false;
    	if(\$success){
			\$this->pdo->Committrans();//事务提交
			\$ret[\"res\"] = \$id;
			\$ret[\"msg\"] = \"\";			
		}else{
			\$this->pdo->Rollbacktrans();//事务回滚
			\$ret[\"res\"] = 0;
		}	
    	return \$ret;
    }
    public function remove(\$id){
    	\$this->pdo->BeginTrans();
		\$success=true;
    	\$data[\"flag\"]=0;
    	\$affect_rows=\$this->pdo->update(\$data,\"edu_questionnaire\",\"flag!=0 and id=\".\$id);
    	\$success=\$affect_rows?\$affect_rows:false;
    	if(\$success){
			\$this->pdo->Committrans();//事务提交
			\$ret[\"res\"] = \$affect_rows;
			\$ret[\"msg\"] = \"\";			
		}else{
			\$this->pdo->Rollbacktrans();//事务回滚
			\$ret[\"res\"] = 0;
		}	
    	return \$ret;
    }
}

?>";
		return Util::writeover($moduleFolder."/model.php",$content);
	}

	function createView($moduleFolder,$moduleParentFolder,$moduleName){
		$file1 = $moduleParentFolder.'/common/view/index.html.php';
		$newfile1 = $moduleFolder."/view/index.html.php";

		$file2 = $moduleParentFolder.'/common/view/form.html.php';
		$newfile2 = $moduleFolder."/view/form.html.php";

		$file3 = $moduleParentFolder.'/common/view/alertWin.html.php';
		$newfile3 = $moduleFolder."/view/alertWin.html.php";
		
		if(!file_exists($newfile1)){
			if (!copy($file1, $newfile1)) {
				echo "failed to copy $file... ";
			}else{
				$fileflow = Util::readover($newfile1);
				$fileflow = str_ireplace('module->', $moduleName.'->',$fileflow);
				Util::writeover($newfile1,$fileflow);
			}
		}
		if(!file_exists($newfile2)){
			if (!copy($file2, $newfile2)) {
				echo "failed to copy $file... ";
			}else{
				$fileflow = Util::readover($newfile2);
				$fileflow = str_ireplace('module->', $moduleName.'->',$fileflow);
				Util::writeover($newfile2,$fileflow);
			}
		}
		if(!file_exists($newfile3)){
			if (!copy($file3, $newfile3)) {
				echo "failed to copy $file... ";
			}else{
				$fileflow = Util::readover($newfile3);
				$fileflow = str_ireplace('module->', $moduleName.'->',$fileflow);
				Util::writeover($newfile3,$fileflow);
			}
		}
	}

	function createViewIndex($moduleFolder,$data){
		$content='<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: '.date("Y").'
 * @author      '.$data['developer'].' <751450467@qq.com>
 * @package     CandorPHP
 * @version     \$Id: model.php,v 1.2 2014/06/05 06:00:34 yangyl Exp $
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset='.$this->app->config->encoding.'" />
<title><?php echo $header; ?></title>
<link rel=\'stylesheet\' href=\'<?php echo $this->app->getWebRoot() .\'theme/cdrstyle.css\';?>\' type=\'text/css\' media=\'screen\' />
<link rel=\'stylesheet\' href=\'<?php echo $this->app->getWebRoot() .\'theme/default/style.css\';?>\' type=\'text/css\' media=\'screen\' />
<link rel=\'stylesheet\' href=\'<?php echo $this->app->getWebRoot() .\'theme/default/page.css\';?>\' type=\'text/css\' media=\'screen\' />
<script src="/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/js/candor.search-dropdown.js" type="text/javascript"></script>
<script src="/js/candor.common.js" type="text/javascript"></script>
<script>	
$(window).load(function(){
	
});
</script>
</head>
<style>
body{ background:url(/js/plugins/jquery.tabPanel/image/TabPanel/content_bg.png) repeat;}
</style>
<body>
<div id="search_content">
	<form class="form-horizontal" action="/cyzt_companylist/companytree.candor" method="POST" target="leftFrame">
	<div id="search_frist_spacer">
		<div class="row-fluid">
			<div class="span4">
				<div class="control-group">
					<label class="control-label">单位名称</label>
					<div class="controls">
					<input type="text" class="input-xlarge gray radius" id="input01" name="orgname">
					<button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i>搜索</button>
					</div>
				</div>
			</div>
			<div class="btn-toolbar span8" id="operateBar">
				 <div class="btn-group">
				  <button data-toggle="dropdown" class="btn dropdown-toggle disabled" id="add">新增 <span class="caret"></span></button>
				  <ul class="dropdown-menu">
					<li><a href="/cyzt_companylist/addcompany.candor?type=company" target="mainFrame">新增单位</a></li>
					<li><a href="/cyzt_companylist/adddepartment.candor?type=company" target="mainFrame">新增部门</a></li>
					<li><a href="/cyzt_companylist/addjob.candor?type=depart" target="mainFrame">新增岗位</a></li>
					<li class="divider"></li>
					<li><a href="/cyzt_companylist/addperson.candor?type=depart&orgid=100&companyid=99&parentid=99&option=edit&" target="mainFrame">新增人员</a></li>
				  </ul>
				</div><!-- /btn-group -->
				<div class="btn-group">
				<a href="javascript:;" class="btn disabled" id="edit">编辑</a>&nbsp;
				</div>
				<div class="btn-group">
				<a href="javascript:;" class="btn disabled" id="cancel">取消</a>&nbsp;
				</div>
				<div class="btn-group">
				<a href="javascript:;" class="btn disabled" id="save"><i class="icon-check"></i>保存</a>&nbsp;&nbsp;
				</div>
			</div><!-- /btn-toolbar -->
		</div>
	</div>
    <div id="search_second_spacer">
		<div class="row-fluid">
			<div class="span4">
				<div class="row-fluid">
					<div class="span6">
						<div class="control-group">
							<label class="control-label" for="input01">起始日期</label>
							<div class="controls">
							<input type="text"  class="input-medium gray radius" name="search">
							</div>
						</div>  
						<div class="control-group">
							<label class="control-label" for="input01">出租人</label>
							<div class="controls">
							<input type="text"  class="input-medium gray radius" name="search">
							</div>
						</div> 
						<div class="control-group">
							<label class="control-label" for="input01">截止日期</label>
							<div class="controls">
							<input type="text"  class="input-medium gray radius" name="search">
							</div>
						</div> 
						<div class="control-group">
							<label class="control-label" for="input01">承租人</label>
							<div class="controls">
							<input type="text" class="input-medium gray radius" name="search">
							</div>
						</div> 
						<div class="control-group">	
							<div class="controls">
								<input  id="btnReset" type="button" onclick="" class="btn btn-primary" value="重置"/>				
								<!--<input  id="btn04" type="button" onclick="" class="btn btn-info" value="搜索"/>			-->
							</div>
						</div>
					</div>
					<div class="span6">
							<div class="control-group">
								<label class="control-label" for="input01">房屋坐落</label>
								<div class="controls">
								<input type="text"  class="input-medium gray radius" name="search">
								</div>
							</div> 
							<div class="control-group">
								<label class="control-label" for="input01">有效期</label>
								<div class="controls">
								<input type="text"  class="input-medium gray radius" name="search">
								</div>
							</div> 
							<div class="control-group">
								<label class="control-label" for="input01">证书号码</label>
								<div class="controls">
								<input type="text" class="input-medium gray radius" name="search">
								</div>
							</div> 
					</div>
				</div>
			</div>
			<div class="span8">
				<table id="list2"></table>
			</div>
		</div>
    </div>
	</form>
    <div id="search_shadow"></div>
</div>
<div id="search_pull"></div>

<div id="work_platform">
	<div class="span3">
		<div class="row-fluid" style="height:105px; margin-left:-20px;">
			<div style="float:left;width:64px;margin:20px 0 0 50px" ><img src="/images/app_icons/<?php echo $this->app->config->module->icon; ?>" width="64"></div>
			<div class="fcolor_one f_16 f_bold" style="float:left;margin:47px 0 0 10px"><h3><?php echo $this->app->config->module->name; ?></h3></div>
			<input type="hidden" class="span2" name="pageStatus" id="pageStatus" readonly="true" value="<?=$pageStatus?>"/>
		</div>
		<div class="wrap-thinkpad">
			<div class="wrap-thinkpad-header"><span>工作信息</span></div>
			<div class="wrap-thinkpad-content">
				<table width="200" border="0" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="80" align="right">流水号 ：</td>
					<td width="130">&nbsp;</td>
				  </tr>
				  <tr>
					<td align="right">业务状态 ：</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td align="right">操作人 ：</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td align="right">操作时间 ：</td>
					<td>&nbsp;</td>
				  </tr>
			  </table>
			</div>
		</div>
	</div>
</div>
</body>
</html>';
		return Util::writeover($moduleFolder."/view/index.html.php",$content);
	}

	function createConfig($moduleFolder,$data){
		$content="<?php
/**
 * The config file of index.
 *
 * @copyright   Copyright: ".date("Y")." 
 * @author      ".$data['developer']." <751450467@qq.com>
 * @package     CandorPHP
 * @version     \$Id: model.php,v 1.2 2014/06/05 06:00:34 yangyl Exp $
 */
\$config->".$data['module_name']."->name = '".$data['business_name']."';// 模块中文名称
\$config->".$data['module_name']."->icon = '".$data['app_icon']."';// 模块图标
\$config->".$data['module_name']."->moduleName = '".$data['module_name']."';// 模块名
\$config->".$data['module_name']."->projectName = '".$data['project_name']."';// 项目名称
\$config->".$data['module_name']."->background = '".$data['background']."';// 模块背景颜色
\$config->".$data['module_name']."->opacity = '".$data['opacity']."';// 模块透明度
\$config->".$data['module_name']."->backgroundImage = '".$data['project_name']."';// 模块背景图片";
		return Util::writeover($moduleFolder."/config.php",$content);
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
						
						$a[]=iconv("gbk", "utf-8", $file);
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

	function getClassAllMethods($class){
		$_class = explode('/',$class);
		if(count($_class)>1)$class=$_class[0];
		//require_once $t->getFileName();
		//解决getDocComment()第二次访问无结果
		//判断是否为新框架
		if($this->config->version=="2.1.0.160511"){
			$app_prefix=explode('_', $class);
			$app_name=$app_prefix[1]?$app_prefix[0]:'cyzt';
			$file=dirname(dirname(dirname(dirname(__FILE__))))."\app_".$app_name."\module\\".$class."\control.php";
			require "$file";
		}else{
			$file="../$class/control.php";
		}
		clearstatcache();
		$wt=filemtime("$file");
		if(rand(1,2)==1){
			$t=$wt+1;
		}else{
			$t=$wt-1;
		}
		touch($file,$t);
		// $_class = explode('/',$class);
		if(count($_class)>1)$class=$_class[0];
		//require_once $t->getFileName();
		
		$r = new ReflectionClass($class);
		foreach($r->getMethods() as $key=>$methodObj){     
			if($methodObj->isPrivate())            
				$methods[$key]['type'] = 'private';         
			elseif($methodObj->isProtected())             
				$methods[$key]['type'] = 'protected';        
			else            
				$methods[$key]['type'] = 'public';         
			$methods[$key]['name'] = $methodObj->name;  
			$methods[$key]['class'] = $methodObj->class;     
		} 
		
		//过滤系统方法
		$sysFun = array('setModuleName','setModulePath','setMethodName','setModelFile','setMyModelFile','loadModel',
						'setSuperVars','setViewFile','assign','clear','parse','fetch','display','createLink','locate');
		//存储public方法
		$public = array();
		//存储private方法
		$private = array();
		foreach($methods as $key=>$item){
			if (in_array($item['name'], $sysFun)||strstr($item['name'],"ajax")) {
				unset($methods[$key]);
			}else{
				if($item["type"]=='public'){
					$public[] = $item;
				}else{
					$private[] = $item;
				}
			}
		}
		//print_r($methods);//exit;
		$_method = array_merge($public, $private);
		$classInfo['methods'] = $_method;
		$classInfo['doc'] = $r->getDocComment();
		return $classInfo; 
	}


	// 保存项目信息
	function saveProject($data){
		if(!isset($_POST['project_name']) || trim($_POST['project_name'])==''){
			echo '项目名称不能为空！';exit;
		}else{
			$data['project_name']=trim($_POST['project_name']);
		}
		
		if(!isset($_POST['project_prefix']) || trim($_POST['project_prefix'])==''){
			echo '项目前缀不能为空！';exit;
		}else{
			$data['project_prefix']=trim($_POST['project_prefix']);
		}

		if(!isset($_POST['project_code']) || trim($_POST['project_code'])==''){
			echo '项目编号不能为空！';exit;
		}else{
			$data['project_code']=trim($_POST['project_code']);
		}

		if(!isset($_POST['project_icon']) || trim($_POST['project_icon'])==''){
			echo '项目图标没有选择！';exit;
		}else{
			$data['project_icon']=trim($_POST['project_icon']);
		}
		if(!isset($_POST['parent_code']) || trim($_POST['parent_code'])==''){
			$data['parent_code'] = 0;
		}
		//判断新增或修改
		if($data['action']=='insert'){
			$data['create_uid'] = $_SESSION['uid'];
			$data['create_date'] = time();
			$data['write_date'] = time();
			$data['write_uid'] = $_SESSION['uid'];
			$data['isadmin'] = 0;
			$data['active'] = 1;
			$data['flag'] = 1;
			$last_id=$this->pdo->add($data,'sys_project');
			if($last_id>0){
				return $last_id;
			}else{
				return false;
			}
		}else{
			$data['write_date'] =time();
			$data['write_uid'] = $_SESSION['uid'];
			$pid = $data['pid'];
			$rst = $this->pdo->update($data,'sys_project','id='.$pid);
			//如果是修改已经子模块的项目时，需修改module表的project_name
			$crst = $this->pdo->update(array('project_name'=>$data['project_name']),'sys_module','project_code='.$data['project_code']);
			if($rst=='1'){
				return true;
			}else{
				return false;
			}
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

	public function saveFun($data,$act='add'){
		//判断该模块方法是否已经存在
		$sql = "select id from sys_method where module='".$data['module']."' and method='".$data['method']."'";
		$isExt = $this->pdo->getRow($sql);
		// if($act=='add'){			
		// 	if($isExt){
		// 		$lastInsertId = $isExt['id'];
		// 	}else{
		// 		$lastInsertId = $this->pdo->add($record,'sys_method');
		// 	}
		// 	return $lastInsertId;
		// }else{
		// 	$rlt1 = $this->pdo->update($record,'sys_method','id='.$record['id']);
		// 	return $rlt1;
		// }
		if($isExt){
			// $data['write_date'] = time();
			// $data['write_uid'] = $_SESSION['uid'];
			$lastInsertId = $this->pdo->update($data,'sys_method','id='.$data['id']);
		}else{
			// $data['create_uid'] = $_SESSION['uid'];
			// $data['create_date'] = time();
			// $data['write_date'] = time();
			// $data['write_uid'] = $_SESSION['uid'];
			// $data['active'] = 1;
			unset($data['id']);
			$data['flag'] = 1;
			$lastInsertId = $this->pdo->add($data,'sys_method');
		}
		return $lastInsertId;
	}

	public function delFun($array)
	{
		//$sql='select id from sys_method where module_id='.$_GET['module_id'].' and method='.$_GET['fun'];
		$rs=$this->pdo->remove('sys_method',"module_id=".$_GET['module_id']." and method='".$_GET['fun']."'");
		
		
		if($rs){
			return 1;//权限移除成功
		}else{
			return 0;//权限移除失败
		}
	}
}