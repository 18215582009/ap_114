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

class fc_project extends SecuredControl
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
		$this->pdo = $this->fc_project->pdo;
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
	    $select_columns = "select %s from fc_project %s %s %s";
	    
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
        $this->assign('header',  '项目管理');
        $this->display('fc_project','list');
    }

	/* 新增项目 */
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
			unset($param["id"]);
			$rlt = $this->pdo->add($param,'fc_project');
			if($rlt){
				Util::alert_msg("添加成功!","succeed","/fc_project/index.html",3);
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			//初始数据
			$Info = $this->fc_project->getTableMode('fc_project');
			// 基础代码
			$code = new BaseCode();
			$region_option=$code->getPairBaseCodeByType(224);//新房片区
			$this->assign('region_option',$region_option);
			$this->assign('Info',$Info);
			$this->display('fc_project','edit');
		}
    }

	/* 编辑项目 */
	public function edit(){
		$this->assign('handle',"edit");
		$this->assign('header',  '编辑项目');
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			$pm_type = '';
			if(isset($param["pm_type"]))$param["pm_type"]=implode(',',$param["pm_type"]);
            if(isset($param["build_type"]))$param["build_type"]=implode(',',$param["build_type"]);
			if(isset($param["tube"]))$param["tube"]=implode(',',$param["tube"]);
			if(isset($param["type"]))$param["type"]=implode(',',$param["type"]);
			if(isset($param['live_date']))$param['live_date'] = strtotime($param['live_date']);
			$id = isset($param['id'])?$param['id']:0;
			if($id>0){
				$rlt = $this->pdo->update($param,'fc_project','id='.$id);
				if($rlt){
					Util::alert_msg('编辑成功!',"succeed","/fc_project/index.html",3);
				}else{
					Util::alert_msg("编辑失败!","warning",$_SERVER['HTTP_REFERER'],3);
				}
			}else{
				Util::alert_msg("非法数据!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			$id = intval(isset($_GET['project_id'])?$_GET['project_id']:0);
			if($id){
				$sql = "select * from fc_project where id=".$id;
				//初始数据
				$Info = $this->pdo->getRow($sql);
				$Info['pm_type'] = explode(",", $Info['pm_type']);
                $Info['build_type'] = explode(",", $Info['build_type']);
				//print_r($Info);
				//print_r($this->config->pm_type_option);
				// 基础代码
				$code = new BaseCode();
				$region_option=$code->getPairBaseCodeByType(224);//新房片区
				$this->assign('region_option',$region_option);
				$this->assign('Info',$Info);
				$this->assign('tab',$this->fc_project->tabbar('base',$id));
				$this->display('fc_project','edit');
			}else{
				Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}
	}

	/* 查看项目 */
	public function show(){
		$this->assign('method',"show");
	}

	/* 删除项目 */
	public function del(){
		$id = intval(isset($_GET['id'])?$_GET['id']:0);
		if($id){
			//判断该项目下是否有经济人todo
			$rlt = $this->pdo->remove("fc_project","id=".$id);
			if($rlt){
				Util::alert_msg("删除成功!","succeed",$_SERVER['HTTP_REFERER'],3);
			}else{
				Util::alert_msg("删除失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
		}
	}

    /**************************** 物业类型信息 **************************/
    public function editPmType(){
        $this->assign('handle',"edit");
        $this->assign('header',  '编辑物业信息');
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $param = $_POST;
            $pmType = isset($param['pm_type'])?$param['pm_type']:'0';
            $pmTypeTable = $this->fc_project->getPmTypeTable($pmType);
            if(isset($param['live_date']))$param['live_date'] = strtotime($param['live_date']);
            if(isset($param['open_date']))$param['open_date'] = strtotime($param['open_date']);
            $id = isset($param['id'])?$param['id']:0;
            if($id>0){
                $rlt = $this->pdo->update($param,'fc_project_'.$pmTypeTable,'id='.$id);
                if($rlt){
                    Util::alert_msg('编辑成功!',"succeed","/fc_project/editPmType?project_id=".$param['project_id']."&pm_type=".$pmType,3);
                }else{
                    Util::alert_msg("编辑失败!","warning",$_SERVER['HTTP_REFERER'],3);
                }
            }else{
                //新增数据
                $rlt = $this->pdo->add($param,'fc_project_'.$pmTypeTable);
                if($rlt){
                    Util::alert_msg("添加成功!","succeed","/fc_project/editPmType?project_id=".$param['project_id']."&pm_type=".$pmType,3);
                }else{
                    Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
                }
            }
        }else{
            $project_id = intval(isset($_GET['project_id'])?$_GET['project_id']:0);
            if($project_id){
                $pmType = isset($_GET['pm_type'])?$_GET['pm_type']:'0';
                $pmTypeTable = $this->fc_project->getPmTypeTable($pmType);
                $sql = "select * from fc_project_".$pmTypeTable." where project_id=".$project_id;
                //初始数据
                $rlt = $this->pdo->getAll($sql);
                if(count($rlt)>=1){
                    //编辑信息
                    $Info = $rlt[0];
                }else{
                    //新增信息
                    $Info = $this->fc_project->getTableMode('fc_project_'.$pmTypeTable);
                    $Info['project_id'] = $project_id;
                }
                //print_r($Info);exit;
                $this->assign('Info',$Info);
                $this->assign('pmType',$pmType);
                $this->assign('tab',$this->fc_project->tabbar($pmTypeTable,$project_id));
                $this->display('fc_project','other_edit');
            }else{
                Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
            }
        }
    }

	/**************************** 户型管理 *****************************/
	/* 户型列表 */
	public function listHuxing(){
		$project_id = trim(isset($_GET["project_id"])?$_GET["project_id"]:0);
		$page_info = "";
		$orderField = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		$orderValue = isset($_GET['flag']) ? $_GET['flag'] : 'desc';

		$pageSize = 15;
		$offset = 0;
		$subPages=5;//每次显示的页数
		$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		$where = 'where project_id='.$project_id.' ';
	    $select_columns = "select %s from fc_project_mode %s %s %s";
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
		
		$this->assign('list',$res);
		$this->assign('project_id',$project_id);
		$this->assign('splitPageStr',$splitPageStr);
		$this->assign('tab',$this->fc_project->tabbar('huxing',$project_id));
        $this->assign('header',  '户型管理');
        $this->display('fc_project','huxing_list');
	}

	/* 户型新增 */
	public function addHuxing(){
		$project_id = trim(isset($_GET["project_id"])?$_GET["project_id"]:0);
		$this->assign('handle',"add");
		$this->assign('header',  '新增户型');
		if($_SERVER['REQUEST_METHOD']=="POST"){
            $project_id = trim(isset($_POST["project_id"])?$_POST["project_id"]:0);
			$param = $_POST;
			unset($param["id"]);
			//上传户型图
			if(!empty($_FILES['img_diagram_url']['name'])){
				$uptool = new UploadFile($_FILES['img_diagram_url'],"huxing");
				$upsize = $uptool->upload();
				$upinfo = $uptool->getSaveInfo();
				$param['img_diagram_url']   = $upinfo[0]['url'];
			}
			
			/*
			//新增户型信息
			$rlt = $this->pdo->add($upinfo[0],'fc_project_attach');
			$lastAttachId = $this->pdo->getLastInsId();
			$pic['attach_id'] = $lastAttachId;
			$pic['project_id'] = $project_id;
			$pic['code'] = '21001';
			$pic['title'] = $this->fc_project->tranHuxing($param['ting'],$param['shi']);
			$pic['des'] = $param['des'];
			$rlt = $this->pdo->add($pic,'fc_project_pic');
			*/

			//上传户型位置图
			if(!empty($_FILES['img_apa_loc_url']['name'])){
				$uptool = new UploadFile($_FILES['img_apa_loc_url'],"huxing");
				$upsize = $uptool->upload();
				$upinfo = $uptool->getSaveInfo();
				$param['img_apa_loc_url']   = $upinfo[0]['url'];
			}

			$rlt = $this->pdo->add($param,'fc_project_mode');
			if($rlt){
				$lastId = $this->pdo->getLastInsId();
				Util::alert_msg("添加成功!","succeed","/fc_project/addHuxing?project_id=".$project_id."&id=".$lastId,3);
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			//初始数据
			$Info = $this->fc_project->getTableMode('fc_project_mode');
			$Info['project_id'] = $project_id;
			// 基础代码
			$code = new BaseCode();
			$region_option=$code->getPairBaseCodeByType(224);//新房片区
			$this->assign('region_option',$region_option);
			$this->assign('Info',$Info);
			$this->display('fc_project','huxing_edit');
		}
	}

	/* 户型编辑 */
	public function editHuxing(){
		$project_id = trim(isset($_GET["project_id"])?$_GET["project_id"]:0);
		$this->assign('handle',"edit");
		$this->assign('header','编辑户型');
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			//上传户型图
			if(!empty($_FILES['img_diagram_url']['name'])){
				$uptool = new UploadFile($_FILES['img_diagram_url'],"huxing");
				$upsize = $uptool->upload();
				$upinfo = $uptool->getSaveInfo();
				$param['img_diagram_url']   = $upinfo[0]['url'];
			}

			//上传户型位置图
			if(!empty($_FILES['img_apa_loc_url']['name'])){
				$uptool = new UploadFile($_FILES['img_apa_loc_url'],"huxing");
				$upsize = $uptool->upload();
				$upinfo = $uptool->getSaveInfo();
				$param['img_apa_loc_url']   = $upinfo[0]['url'];
			}
			$id = isset($param['id'])?$param['id']:0;
			if($id>0){
				$rlt = $this->pdo->update($param,'fc_project_mode','id='.$id);
				if($rlt){
					Util::alert_msg('编辑成功!',"succeed","/fc_project/editHuxing?project_id=".$project_id."&id=".$id,3);
				}else{
					Util::alert_msg("编辑失败!","warning",$_SERVER['HTTP_REFERER'],3);
				}
			}else{
				Util::alert_msg("非法数据!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			$id = intval(isset($_GET['id'])?$_GET['id']:0);
			if($id){
				$sql = "select * from fc_project_mode where id=".$id;
				//初始数据
				$Info = $this->pdo->getRow($sql);
				$this->assign('Info',$Info);
				$this->assign('tab',$this->fc_project->tabbar('base',$id));
				$this->display('fc_project','huxing_edit');
			}else{
				Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}
	}

	public function delHuxing(){
		$id = intval(isset($_GET['id'])?$_GET['id']:0);
		if($id){
			if($this->config->db->logicDel){
				$rlt = $this->pdo->update(array('flag'=>0),'fc_project_mode','id='.$id);
			}else{
				$rlt = $this->pdo->remove("fc_project_mode","id=".$id);
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

	/**************************** 图片管理 *****************************/
	/* 图片列表 */
	public function listPic(){
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
	    $select_count = "select %s from fc_project_pic as a %s %s %s";
		$select_columns = "select %s from fc_project_pic as a left join fc_project_attach as b on a.attach_id=b.id %s %s %s";
	    
	    $order = "order by $orderField $orderValue";
	    $limit = "limit $offset,$pageSize";
	    $count = " count(a.id) as count ";
	    $sql = sprintf($select_columns,'a.id,a.code,a.project_id,a.attach_id,a.title,a.des,a.is_show,b.url',$where,$order,$limit);
	    $sqlcount = sprintf($select_count, $count,$where,'','');
	   	$res = $this->pdo->getAll($sql);
	   	$Count = $this->pdo->getRow($sqlcount);
		$recordCount = $Count['count'];
		$page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$page_info,4);
		$splitPageStr=$page->get_page_html();

		$this->assign('list',$res);
		$this->assign('splitPageStr',$splitPageStr);
		$this->assign('project_id',$project_id);
		$this->assign('tab',$this->fc_project->tabbar('pic',$project_id));
        $this->assign('header',  '图片管理');
        $this->display('fc_project','pic_list');
	}

	/* 图片新增 */
	public function addPic(){
		$project_id = trim(isset($_GET["project_id"])?$_GET["project_id"]:0);
		$this->assign('handle',"add");
		$this->assign('header',  '新增户型');
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			unset($param["id"]);
			//上传户型图
			$upinfo = array();
			if(!empty($_FILES['url']['name'])){
				$uptool = new UploadFile($_FILES['url'],"huxing");
				$upsize = $uptool->upload();
				$upinfo = $uptool->getSaveInfo();
                $upinfo[0]['update_at'] = time();
			}
			//新增附件信息
			$rlt = $this->pdo->add($upinfo[0],'fc_project_attach');
			$lastAttachId = $this->pdo->getLastInsId();
			if($lastAttachId>0){
				$param['attach_id'] = $lastAttachId;
				$rlt = $this->pdo->add($param,'fc_project_pic');
				if($rlt){
					$lastId = $this->pdo->getLastInsId();
					Util::alert_msg("添加成功!","succeed","/fc_project/addPic?project_id=".$lastId,3);
				}else{
					Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
				}
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			//初始数据
			$Info = $this->fc_project->getTableMode('fc_project_pic');
			$Info['project_id'] = $project_id;
			$this->assign('Info',$Info);
			$this->display('fc_project','pic_edit');
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
		$this->assign('tab',$this->fc_project->tabbar('price',$project_id));
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
                    $this->fc_project->refreshPrice($project_id,$param['pm_type'],$param['ave_price']);
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
			$Info = $this->fc_project->getTableMode('fc_project_price');
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
                        $this->fc_project->refreshPrice($project_id,$param['pm_type'],$param['ave_price']);
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
		$this->assign('tab',$this->fc_project->tabbar('dynamic',$project_id));
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
			$Info = $this->fc_project->getTableMode('fc_project_dynamic');
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