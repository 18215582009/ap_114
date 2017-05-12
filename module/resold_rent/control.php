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

class resold_rent extends SecuredControl
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
		$this->pdo = $this->resold_rent->pdo;
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
		$where = 'where 1=1 ';
	   	if($_GET) {
			//处理搜索条件
			if($name!=""){
				$where .= " and name like '%".$name."%'";
				$page_info .="name=".$name."&";
			}
	    }
	    $select_columns = "select %s from fc_esf_rent %s %s %s";
	    $order = "order by $orderField $orderValue";
	    $limit = "limit $offset,$pageSize";
	    $count = " count(id) as count ";
	    $sql = sprintf($select_columns,'*',$where,$order,$limit);
	    //print_r( $sql );exit;
	    $sqlcount = sprintf($select_columns,$count,$where,'','');
	   	$res = $this->pdo->getAll($sql);
	   	//print_r($res);exit;
	   	//print_r($res);exit;
	   	$Count = $this->pdo->getRow($sqlcount);
	   	//print_r($Count);exit;
		$recordCount = $Count['count'];
		$page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$page_info,4);
		$splitPageStr=$page->get_page_html();
		$this->assign('name',$name);
		$this->assign('list',$res);
        // print_r($res);exit;
		$this->assign('splitPageStr',$splitPageStr);
        $this->assign('header',  '项目管理');
        $this->display('resold_rent','list');


    }

	/* 新增项目 
    public function add()
    {
		$this->assign('handle',"add");
		$this->assign('header',  '新增项目');
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			/*
			foreach ($param["pm_type"] as $v){
				$param["pm_type"] .= $v.','; 
			}
			*/

	/*
			unset($param["id"]);
			$rlt = $this->pdo->add($param,'fc_project');
			if($rlt){
				Util::alert_msg("添加成功!","succeed","/fc_project/index.html",3);
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			//初始数据
			$Info = $this->resold_sale->getTableMode('fc_project');
			// 基础代码
			$code = new BaseCode();
			$region_option=$code->getPairBaseCodeByType(224);//新房片区
			$this->assign('region_option',$region_option);
			$this->assign('Info',$Info);
			$this->display('fc_project','edit');
		}
    }

*/

	/* 编辑项目   新建  和编辑合并  --by xiewen*/
	public function edit(){ 
		$this->assign('handle',"edit");
		$this->assign('header',  '编辑项目');
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			$pm_type = '';
			// if(isset($param["pm_type"]))$param["pm_type"]=implode(',',$param["pm_type"]);
			// if(isset($param['create_date']))$param['create_date'] = strtotime($param['create_date']);
			// if(isset($param['write_date']))$param['write_date'] = strtotime($param['write_date']);
			$id = isset($param['id'])?$param['id']:0;
			if($id>0){
				$rlt = $this->pdo->update($param,'fc_esf_rent','id='.$id);
				if($rlt){
					Util::alert_msg('编辑成功!',"succeed","/resold_rent/index.html",3);
				}else{
					Util::alert_msg("编辑失败!","warning",$_SERVER['HTTP_REFERER'],3);
				}
			}else{
				$rlt = $this->pdo->add($param,'fc_esf');
				if($rlt){
				    Util::alert_msg("添加成功!","succeed","/resold_sale/index.html",3);
				}else{
					Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
				}
			}
		}else{
			$id = intval(isset($_GET['resold_rent'])?$_GET['resold_rent']:0);
			if($id){
				$sql = "select * from fc_esf_rent where id=".$id;
				$Info = $this->pdo->getRow($sql);
				$this->assign('Info',$Info);
				$this->assign('tab',$this->resold_rent->tabbar('base',$id));
				$this->display('resold_rent','edit');
			}else{
				$Info=array();
				$this->assign('Info',$Info);
				$this->assign('tab',$this->resold_rent->tabbar('base',$id));
				$this->display('resold_rent','edit');
				//Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}
	}

	/* 查看项目 */
	public function show(){
		$this->assign('method',"show");
	}

	/* 删除项目 */
	public function del(){
		print_r($_GET);exit;
		$id = intval(isset($_GET['id'])?$_GET['id']:0);
		if($id){
			//判断该项目下是否有经济人todo
			$rlt = $this->pdo->remove("fc_esf","id=".$id);
			if($rlt){
				Util::alert_msg("删除成功!","succeed",$_SERVER['HTTP_REFERER'],3);
			}else{
				Util::alert_msg("删除失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
		}
	}


	/**************************** 图片管理 *****************************/
	/* 图片列表 
	*
	@params 获取图片列表 
	此处分页 是按照上传的图片数量进行分页


	*/
	public function listPic(){
		$project_id = trim(isset($_GET["resold_rent"])?$_GET["resold_rent"]:0); 
		$page_info = "";
		$orderField = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		$orderValue = isset($_GET['flag']) ? $_GET['flag'] : 'desc';
		$pageSize = 15;
		$offset = 0;
		$subPages=5;//每次显示的页数
		$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		$where = 'where id='.$project_id.' ';
	    $select_count = "select %s from fc_esf %s %s %s";
		//$select_columns = "select %s from fc_project_pic as a left join fc_project_attach as b on a.attach_id=b.id %s %s %s";
	    $order = "order by $orderField $orderValue";
	    $limit = "limit $offset,$pageSize";
	    $sql = sprintf($select_count,'id,img_path,img_num,title',$where,$order,$limit);
	   	$res = $this->pdo->getAll($sql);
        $arr = array();
        foreach ($res as $key => $value) {
        $arr['id']= $value['id'];
        $arr['img_num'] = $value['img_num'];
        $arr['title'] = $value['title'];
        $arr['path_img']= explode(',', $value['img_path']);
        }
		$page=new pager_page($pageSize,$arr['img_num'],$currentPage,$subPages,$page_info,4);
		$splitPageStr=$page->get_page_html();
		$this->assign('list',$arr);
		$this->assign('splitPageStr',$splitPageStr);
		$this->assign('project_id',$project_id);
		$this->assign('tab',$this->resold_sale->tabbar('pic',$project_id));
        $this->assign('header',  '图片管理');
        $this->display('resold_sale','pic_list');
	}
	/* 图片新增 */
	public function addPic(){
		$project_id = trim(isset($_GET["project_id"])?$_GET["project_id"]:0);
		$this->assign('handle',"add");
		$this->assign('header',  '新增图片');
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			unset($param["project_id"]);
			//上传图片
			$upinfo = array();
			$file_path ='houseImages';
			$file_name = 'img_type';
			if(!empty($_FILES['name'])){
				$uptool = new UploadFile($file_path,$file_name);
				$upsize = $uptool->upload();
				$upinfo = $uptool->getSaveInfo();
			}

			   print_r($upinfo );exit;
			//新增附件信息
			$rlt = $this->pdo->add($upinfo,'fc_esf');


			// $lastAttachId = $this->pdo->getLastInsId();
			// if($lastAttachId>0){
			// 	$param['attach_id'] = $lastAttachId;
			// 	$rlt = $this->pdo->add($param,'fc_project_pic');
			// 	if($rlt){
			// 		$lastId = $this->pdo->getLastInsId();
			// 		Util::alert_msg("添加成功!","succeed","/fc_project/addPic?project_id=".$lastId,3);
			// 	}else{
			// 		Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			// 	}
			// }else{
			// 	Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			// }

		}else{
			//初始化数据
			//获取图片信息
			$Info = $this->resold_sale->getTableMode('fc_esf');
			$Info['project_id'] = $project_id;
			$this->assign('Info',$Info);
			$this->display('resold_sale','pic_edit');
		}
	}

	/* 图片编辑 */
	public function editPic(){
	
	}

	/* 设置图片显示 */
	public function setShow(){
        $project_id=isset($_GET['project_id'])?$_GET['project_id']:0;
        $attach_id=isset($_GET['attach_id'])?$_GET['attach_id']:0;
        $pic_id=isset($_GET['pic_id'])?$_GET['pic_id']:0;
        $referUrl = '/fc_project/listPic?project_id='.$project_id;

        if($_GET['set']){
            $picUrl = $this->pdo->getRow('select url from fc_project_attach where id='.$attach_id);
            $this->pdo->update(array('is_show'=>0),"fc_project_pic","project_id=".$project_id);
            $this->pdo->update(array('is_show'=>1),"fc_project_pic","id=".$pic_id);
            $rst = $this->pdo->update(array('img_url'=>$picUrl['url']),"fc_project","id=".$project_id);
            if($rst){
                Util::alert_msg($msg='设置成功！',"succeed",$referUrl);
            }else{
                Util::alert_msg($msg='设置失败！',"warning",$referUrl);
            }
        }else{
            $rst = $this->pdo->update(array('is_show'=>0),"fc_project_pic","id=".$pic_id);
            $rst = $this->pdo->doSql("update fc_project set img_url='' where id=".$project_id);
            if($rst){
                Util::alert_msg("取消成功!","succeed",$referUrl,3);
            }else{
                Util::alert_msg("取消失败!","warning",$referUrl,3);
            }
        }
    }

	/*************************** 价格管理  ******************************/
	/* 价格列表 */
	public function listPrice(){
		$project_id = trim(isset($_GET["project_id"])?$_GET["project_id"]:0);
		$page_info = "";
		$orderField = isset($_GET['sort']) ? $_GET['sort'] : 'a.id';
		$orderValue = isset($_GET['flag']) ? $_GET['flag'] : 'desc';

		$pageSize = 15;
		$offset = 0;
		$subPages=5;//每次显示的页数
		$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		$where = 'where a.project_id='.$project_id.' ';
	    $select_columns = "select %s from fc_project_price as a %s %s %s";
	    $order = "order by a.status desc,$orderField $orderValue";
	    $limit = "limit $offset,$pageSize";
	    $count = " count(a.id) as count ";
	    $sql = sprintf($select_columns,'a.*',$where,$order,$limit);
	    $sqlcount = sprintf($select_columns, $count,$where,'','');
	   	$res = $this->pdo->getAll($sql);
	   	$Count = $this->pdo->getRow($sqlcount);
		$recordCount = $Count['count'];
		$page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$page_info,4);
		$splitPageStr=$page->get_page_html();

		$this->assign('list',$res);
		$this->assign('splitPageStr',$splitPageStr);
		$this->assign('project_id',$project_id);
		$this->assign('tab',$this->resold_sale->tabbar('price',$project_id));
        $this->assign('header',  '价格管理');
        $this->display('fc_project','price_list');
	}

	/* 价格新增 */
	public function addPrice(){
		$project_id = trim(isset($_GET["project_id"])?$_GET["project_id"]:0);
		$this->assign('handle',"add");
		$this->assign('header',  '新增价格');
		if($_SERVER['REQUEST_METHOD']=="POST"){
            $project_id = trim(isset($_POST["project_id"])?$_POST["project_id"]:0);
			$param = $_POST;
			$param['start_date'] = strtotime($param['start_date']);
			$param['end_date'] = strtotime($param['end_date']);
			unset($param["id"]);
            //将以前价格设置为历史状态
            if($param['status']==1){
                $this->pdo->update(array('status'=>0),"fc_project_price","project_id=".$project_id." and pm_type='".$param['pm_type']."'");
                //根据物业类型，将最新的价格存入对应表中;同时修改主表中的均价字段
                if(!empty($param['pm_type']) && (intval($param['status'])==1)){
                    //修改主表均价
                    $this->resold_sale->refreshPrice($project_id,$param['pm_type'],$param['ave_price']);
                }
            }
			$rlt = $this->pdo->add($param,'fc_project_price');
			if($rlt){
				$lastId = $this->pdo->getLastInsId();
				Util::alert_msg("添加成功!","succeed","/fc_project/addPrice?project_id=".$lastId,3);
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			//初始数据
			$Info = $this->resold_sale->getTableMode('fc_project_price');
			$Info['project_id'] = $project_id;
			$this->assign('Info',$Info);
			$this->display('fc_project','price_edit');
		}
	}

	/* 价格编辑 */
	public function editPrice(){
		$project_id = trim(isset($_GET["project_id"])?$_GET["project_id"]:0);
		$this->assign('handle',"edit");
		$this->assign('header','编辑价格');
		if($_SERVER['REQUEST_METHOD']=="POST"){
            $project_id = trim(isset($_POST["project_id"])?$_POST["project_id"]:0);
			$param = $_POST;
			$param['start_date'] = strtotime($param['start_date']);
			$param['end_date'] = strtotime($param['end_date']);
			$id = isset($param['id'])?$param['id']:0;
			if($id>0){
				$rlt = $this->pdo->update($param,'fc_project_price','id='.$id);
				if($rlt){
                    //根据物业类型，将最新的价格存入对应表中;同时修改主表中的均价字段
                    if(!empty($_POST['pm_type']) && (intval($_POST['status'])==1)){
                        //修改主表均价
                        $this->resold_sale->refreshPrice($project_id,$param['pm_type'],$param['ave_price']);
                    }
					Util::alert_msg('编辑成功!',"succeed","/fc_project/editPrice?project_id=".$project_id."&id=".$id,3);
				}else{
					Util::alert_msg("编辑失败!","warning",$_SERVER['HTTP_REFERER'],3);
				}
			}else{
				Util::alert_msg("非法数据!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			$id = intval(isset($_GET['id'])?$_GET['id']:0);
			if($id){
				$sql = "select * from fc_project_price where id=".$id;
				//初始数据
				$Info = $this->pdo->getRow($sql);
				$this->assign('Info',$Info);
				$this->display('fc_project','price_edit');
			}else{
				Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}
	}

	public function delPrice(){
		$id = intval(isset($_GET['id'])?$_GET['id']:0);
		if($id){
			if($this->config->db['logicDel']){
				$rlt = $this->pdo->update(array('flag'=>0),'fc_project_price','id='.$id);
			}else{
				$rlt = $this->pdo->remove("fc_project_price","id=".$id);
			}
			if($rlt){
				Util::alert_msg("删除成功!","succeed",$_SERVER['HTTP_REFERER'],3);
			}else{
				Util::alert_msg("删除失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
		}
	}

	/*************************** 动态管理  ******************************/
	/* 动态列表 */
	public function listDynamic(){
		$project_id = trim(isset($_GET["project_id"])?$_GET["project_id"]:0);
		$page_info = "";
		$orderField = isset($_GET['sort']) ? $_GET['sort'] : 'a.id';
		$orderValue = isset($_GET['flag']) ? $_GET['flag'] : 'desc';

		$pageSize = 15;
		$offset = 0;
		$subPages=5;//每次显示的页数
		$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		$where = 'where a.project_id='.$project_id.' ';
	    $select_columns = "select %s from fc_project_dynamic as a %s %s %s";
	    $order = "order by $orderField $orderValue";
	    $limit = "limit $offset,$pageSize";
	    $count = " count(a.id) as count ";
	    $sql = sprintf($select_columns,'a.*',$where,$order,$limit);
	    $sqlcount = sprintf($select_columns, $count,$where,'','');
	   	$res = $this->pdo->getAll($sql);
	   	$Count = $this->pdo->getRow($sqlcount);
		$recordCount = $Count['count'];
		$page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$page_info,4);
		$splitPageStr=$page->get_page_html();

		$this->assign('list',$res);
		$this->assign('splitPageStr',$splitPageStr);
		$this->assign('project_id',$project_id);
		$this->assign('tab',$this->resold_sale->tabbar('dynamic',$project_id));
        $this->assign('header',  '动态管理');
        $this->display('fc_project','dynamic_list');
	}

	/* 动态新增 */
	public function addDynamic(){
		$project_id = trim(isset($_GET["project_id"])?$_GET["project_id"]:0);
		$this->assign('handle',"add");
		$this->assign('header',  '新增动态');
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			$param['start_date'] = strtotime($param['start_date']);
			$param['end_date'] = strtotime($param['end_date']);
			unset($param["id"]);
			$rlt = $this->pdo->add($param,'fc_project_dynamic');
			if($rlt){
				$lastId = $this->pdo->getLastInsId();
				Util::alert_msg("添加成功!","succeed","/fc_project/addDynamic?project_id=".$lastId,3);
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			//初始数据
			$Info = $this->resold_sale->getTableMode('fc_project_dynamic');
			$Info['project_id'] = $project_id;
			$this->assign('Info',$Info);
			$this->display('fc_project','dynamic_edit');
		}
	}

	/* 动态编辑 */
	public function editDynamic(){
		$project_id = trim(isset($_GET["project_id"])?$_GET["project_id"]:0);
		$this->assign('handle',"edit");
		$this->assign('header','编辑动态');
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			$param['start_date'] = strtotime($param['start_date']);
			$param['end_date'] = strtotime($param['end_date']);
			$id = isset($param['id'])?$param['id']:0;
			if($id>0){
				$rlt = $this->pdo->update($param,'fc_project_dynamic','id='.$id);
				if($rlt){
					Util::alert_msg('编辑成功!',"succeed","/fc_project/editDynamic?project_id=".$project_id."&id=".$id,3);
				}else{
					Util::alert_msg("编辑失败!","warning",$_SERVER['HTTP_REFERER'],3);
				}
			}else{
				Util::alert_msg("非法数据!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			$id = intval(isset($_GET['id'])?$_GET['id']:0);
			if($id){
				$sql = "select * from fc_project_dynamic where id=".$id;
				//初始数据
				$Info = $this->pdo->getRow($sql);
				$this->assign('Info',$Info);
				$this->display('fc_project','dynamic_edit');
			}else{
				Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}
	}

	public function delDynamic(){
		$id = intval(isset($_GET['id'])?$_GET['id']:0);
		if($id){
			if($this->config->db->logicDel){
				$rlt = $this->pdo->update(array('flag'=>0),'fc_project_dynamic','id='.$id);
			}else{
				$rlt = $this->pdo->remove("fc_project_dynamic","id=".$id);
			}
			if($rlt){
				Util::alert_msg("删除成功!","succeed",$_SERVER['HTTP_REFERER'],3);
			}else{
				Util::alert_msg("删除失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
		}
	}

	/* 项目高级搜索 */
	private function advanced_search($Data,&$page_info,&$where)
	{
		global $smarty;
		$where = " ";
		$page_info = "";
		//处理搜索条件
		/*
		if(isset($Data['start_time']) && $Data['start_time'] != ""){
			//echo strtotime($Data['start_time'])."<br/>";   
			//unix_timestamp(STR_TO_DATE('04/31/2004', '%m/%d/%Y'))
			//$pieces = explode("-", $Data['start_time']);
			//$ps = $pieces[2]."/".$pieces[1]."/".$pieces[0];
			$ps = strtotime($Data['start_time']);
			//$where .=" and unix_timestamp(STR_TO_DATE(a.`ob_time`,'%Y%m%d')) > '{$ps}'";
			$page_info.="start_time={$Data['start_time']}&";
			$this->assign("start_time",$Data['start_time']);
		}
		if(isset($Data['end_time']) && $Data['end_time'] != ""){
			//$pieces = explode("-", $Data['end_time']);
			//$ps = $pieces[2]."/".$pieces[1]."/".$pieces[0];
			$ps = strtotime($Data['end_time']);
			//$where .=" and unix_timestamp(STR_TO_DATE(a.`ob_time`,'%Y%m%d')) <= '{$ps}'";
			$page_info.="end_time={$Data['end_time']}&";
			$this->assign("end_time",$Data['end_time']);
		}
		*/

		if(isset($Data['h_pm_type']) && $Data['h_pm_type'] != "0"){
			$where .=" and a.`h_pm_type` = '{$Data['h_pm_type']}'";
			$page_info .="h_pm_type=".$Data['h_pm_type']."&";
			$this->assign("h_pm_type",$Data['h_pm_type']);
		}
		if(isset($Data['h_borough']) && $Data['h_borough'] != "0"){
			$where .=" and a.`h_borough` = '{$Data['h_borough']}'";
			$page_info .="h_borough=".$Data['h_borough']."&";
			$this->assign("h_borough",$Data['h_borough']);
		}
		if(isset($Data['h_circle']) && $Data['h_circle'] != "0"){
			$where .=" and a.`h_circle` = '{$Data['h_circle']}'";
			$page_info .="h_circle=".$Data['h_circle']."&";
			$this->assign("h_circle",$Data['h_circle']);
		}
		if(isset($Data['h_project_type']) && $Data['h_project_type'] != "0"){
			$where .=" and a.`h_project_type` = '{$Data['h_project_type']}'";
			$page_info .="h_project_type=".$Data['h_project_type']."&";
			$this->assign("h_project_type",$Data['h_project_type']);
		}

		if(isset($Data['from_project_name']) && $Data['from_project_name'] != ""){
			$where .= " and a.project_name = '".$Data['from_project_name']."'";
			$page_info .="from_project_name=".$Data['from_project_name']."&";
			$this->assign("from_project_name",$Data['from_project_name']);
		}
		if(isset($Data['project_id']) && $Data['project_id'] != "0"){
			//$where .= " and a.project_id = ".$project_id;
			$page_info .="project_id=".$Data['project_id']."&";
		}
		if(isset($Data['create_month']) && $Data['create_month'] != "0"){
			$where .= " and a.create_month = ".$Data['create_month'];
			$page_info .="create_month=".$Data['create_month']."&";
			$this->assign("create_month",$Data['create_month']);
		}else{
			$where .= " and a.create_month = ".date("n");
			$this->assign("create_month",date("n")-1);
		}
	}

}
?>