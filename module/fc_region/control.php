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
use lib\util\UploadFile as UploadFile;
use lib\pager\pager_page as pager_page;

class fc_region extends SecuredControl
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
		$this->pdo = $this->fc_region->pdo;
    }

	/* index方法，也是默认的方法。 */
    public function index()
    {

		$name = trim(isset($_GET["name"])?$_GET["name"]:"");
		$page_info = "";
		$orderField = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		$orderValue = isset($_GET['flag']) ? $_GET['flag'] : 'desc';

		$pageSize = 15;
		$offset = 0;
		$subPages=5;//每次显示的页数
		$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		$where = ' ';
	   	if($_GET) {
			//处理搜索条件
			if($name!=""){
				$where .= " and name like '%".$name."%'";
				$page_info .="name=".$name."&";
			}
	    }
	    $select_columns = "select %s from fc_region %s %s %s";

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
		$this->assign('name',$name);
		$this->assign('list',$res);
		$this->assign('splitPageStr',$splitPageStr);
        $this->assign('header',  '片区管理');
        $this->display('fc_region','list');
    }

	/** 新增片区
	@params --by  xiewen   在删除的时候必须同时删除
	 */
    public function add()
    {
		$this->assign('handle',"add");
		$this->assign('header',  '新增片区');
		$code = new BaseCode();
		$region_option=$code->getPairBaseCodeByType(224);//新房片区
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			unset($param["id"]);
			$arr= array();
			ksort($region_option);
			foreach ($region_option as $key => $value) {
				$arr[$key]['k'] = $key;
				$arr[$key]['v'] =$value;
			}
			$max =end($arr);
			$max_code = $max['k'];
			$param['code'] = $max_code+1; //查看type为 224的最大值,依次加1
			$rlt = $this->pdo->add($param,'fc_region');
			$sys_code['code'] = $param['code'];
			$sys_code['name'] = $param['name'];
			$sys_code['type'] = 224;
			$sys_code['flag'] = 1;//是否删除代码 --- 暂时设置为1
			$sys_code['order_list'] = 0; //排序暂时没有
			$sys_code['active'] = $param['flag'];//是否激活 这里值等于是否有效  有效代表激活
			$sys_code['relate_code'] = $param['relate_code'];
			$result = $this->pdo->add($sys_code,'sys_code_basic');

			if($rlt && $result){
				Util::alert_msg("添加成功!","succeed","/fc_region/index.html",3);
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			//初始数据
			$Info = $this->fc_region->getTableMode('fc_region');
			$this->assign('region_option',$region_option);
			$this->assign('Info',$Info);
			$this->display('fc_region','edit');
		}
    }

	/* 编辑片区 */
	public function edit(){
		$this->assign('handle',"edit");
		$this->assign('header',  '编辑片区');
		$code = new BaseCode();
        $region_option=$code->getPairBaseCodeByType(224);//新房片区
        $this->assign('region_option',$region_option);
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			$id = isset($param['id'])?$param['id']:0;
			if($id>0){
				$rlt = $this->pdo->update($param,'fc_region','id='.$id);
				if($rlt){
					Util::alert_msg('编辑成功!',"succeed","/fc_region/index.html",3);
				}else{
					Util::alert_msg("编辑失败!","warning",$_SERVER['HTTP_REFERER'],3);
				}
			}else{
				Util::alert_msg("非法数据!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			$id = intval(isset($_GET['id'])?$_GET['id']:0);
			if($id){
				$sql = "select * from fc_region where id=".$id;
				$Info = $this->pdo->getRow($sql);

				//print_r($Info);exit;



				$this->assign('Info',$Info);
				$this->display('fc_region','edit');
			}else{
				Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}
	}

	// /* 查看片区 */
	// public function show(){
	// 	$this->assign('method',"show");
	// }

	/* 删除片区 */
	public function del(){
		$id = intval(isset($_GET['id'])?$_GET['id']:0);
		if($id){
			$rlt = $this->pdo->remove("fc_region","id=".$id);
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
