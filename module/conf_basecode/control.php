<?php
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\BaseCode as BaseCode;
use lib\util\Util as Util;
use lib\pager\pager_page as pager_page;

class conf_basecode extends SecuredControl
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
		$this->pdo = $this->conf_basecode->pdo;

		//print_r(OrmModel::where('id','>',5)->paginate(2));
		//$res = self::find(2);
		//print_r($res);
    }

	/* index方法，也是默认的方法。 */
    public function index()
    {
		$search = array();
		$search['code_name'] = trim(isset($_GET["code_name"])?$_GET["code_name"]:"");
		$code = intval(isset($_GET['code'])?$_GET['code']:0);
		$page_info = "";
		$orderField = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		$orderValue = isset($_GET['flag']) ? $_GET['flag'] : 'asc';

		$pageSize = 15;
		$offset = 0;
		$subPages=5;//每次显示的页数
		$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		$where = 'where 1=1 ';
	   	//处理搜索条件
		if($search['code_name']!=""){
			$where .= " and name like '%".$search['code_name']."%'";
			$page_info .="code_name=".$search['code_name']."&";
		}else{
			$where .= " and type = ".$code;
			$page_info .="code=".$code."&";
		}
	    $select_columns = "select %s from sys_code_basic %s %s %s";
	    
	    $order = "order by $orderField $orderValue";
	    $limit = "limit $offset,$pageSize";
	    $count = " count(id) as count ";
	    $sql = sprintf($select_columns,'*',$where,$order,$limit);
	    $sqlcount = sprintf($select_columns,$count,$where,'','');
	   	$res = $this->pdo->getAll($sql);
	   	$Count = $this->pdo->getRow($sqlcount);
		$recordCount = $Count['count'];
		$page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$page_info,4);
		$splitPageStr=$page->get_page_html();

		//判断是有下级节点
		foreach($res as $key=>$val){
			$sql = "select count(*) as cnt from sys_code_basic where type=".$val['code'];
			$chlidCnt = $this->pdo->getRow($sql);
			$res[$key]['cnt'] = $chlidCnt['cnt'];
		}
		$navArr = $this->conf_basecode->getParentArr($code);
		sort($navArr);
		$navBar = '';
		foreach($navArr as $key=>$val){
			$navBar .= '<li><i class="fa fa-angle-right"></i>&nbsp;&nbsp;<a href="/conf_basecode/index?code='.$val['code'].'">'.$val['name'].'</a>&nbsp;&nbsp;</li>';
		}

		$this->assign('code',$code);
        $this->assign('page',$currentPage);
		$this->assign('list',$res);
		$this->assign('navBar',$navBar);
		$this->assign('splitPageStr',$splitPageStr);
        $this->assign('search',  $search);
        $this->display('conf_basecode','list');
    }

	/* 新增配置 */
    public function add()
    {
		$this->assign('handle',"add");
		$this->assign('title','新增配置');
		$action = isset($_GET['action'])?$_GET['action']:'';
		if($action=="save"){
			$param = $_POST;
			unset($param["id"]);
			//自动生成code代码
			if($param['type']==0){
				$sql = "SELECT id,code FROM sys_code_basic where code<1000 order by code desc limit 1";
				$curMaxCode = $this->pdo->getRow($sql);
				$param['code'] = intval($curMaxCode['code'])+1;
			}else{
				$sql = "SELECT id,code FROM sys_code_basic where type='".$param['type']."' order by code desc limit 1";
				$curMaxCode = $this->pdo->getRow($sql);
				$param['code'] = intval($curMaxCode['code'])+1;
			}
			$rlt = $this->pdo->add($param,'sys_code_basic');
			if($rlt){
				Util::alert_msg("添加成功!","succeed","/conf_basecode/index?code=".$param['code']."&page=".$param['page'],3);
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
            $code = intval(isset($_GET['code'])?$_GET['code']:0);
            $page = intval(isset($_GET['page'])?$_GET['page']:0);
			$Info = $this->conf_basecode->getTableMode('sys_code_basic');
			//分类树
			$tree = $this->conf_basecode->getBaseTree(0,$code);
			$this->assign("tree",$tree);
			$this->assign('Info',$Info);
			$this->display('conf_basecode','edit');
		}
    }

	/* 编辑配置 */
	public function edit(){
		$this->assign('handle',"edit");
		$this->assign('title','编辑配置');
		$action = isset($_GET['action'])?$_GET['action']:'';
		if($action=="save"){
			$param = $_POST;
			$id = isset($param['id'])?$param['id']:0;
            $pos = strpos($param['code'], $param['type']);
            if($param['ptype'] != $param['type']){
                $sql = "SELECT id,code FROM sys_code_basic where type='".$param['type']."' order by code desc limit 1";
                $curMaxCode = $this->pdo->getRow($sql);
                $param['code'] = intval($curMaxCode['code'])+1;
            }
            //print_r($param);exit;
            unset($param['id']);
			if($id>0){
				$rlt = $this->pdo->update($param,'sys_code_basic','id='.$id);
				if($rlt){
					Util::alert_msg('编辑成功!',"succeed","/conf_basecode/index?code=".$param['type']."&page=".$param['page'],3);
				}else{
					Util::alert_msg("编辑失败!","warning",$_SERVER['HTTP_REFERER'],3);
				}
			}else{
				Util::alert_msg("非法数据!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			$id = isset($_GET['id'])?$_GET['id']:0;
            $page = intval(isset($_GET['page'])?$_GET['page']:0);
			if($id>0){
				//初始数据
				$sql = "select * from sys_code_basic where id=".$id;
				$Info = $this->pdo->getRow($sql);
				//分类树
				$tree = $this->conf_basecode->getBaseTree(0,$Info['type']);
                $this->assign("page",$page);
				$this->assign("tree",$tree);
				$this->assign("Info",$Info);
				$this->assign("back",$_SERVER['HTTP_REFERER']);
				$this->display('conf_basecode','edit');
			}else{
				Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}
	}

	/* 查看配置 */
	public function show(){
		$this->assign('method',"show");
	}

	/* 删除配置 */
	public function del(){
		$id = intval(isset($_GET['id'])?$_GET['id']:0);
		if($id){
			//判断该配置下是否孩子
			$rlt = $this->pdo->remove("sys_code_basic","id=".$id);
			if($rlt){
				Util::alert_msg("删除成功!","succeed",$_SERVER['HTTP_REFERER'],3);
			}else{
				Util::alert_msg("删除失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
		}
	}

}
?>