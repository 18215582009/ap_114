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

class resold_district extends SecuredControl
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
		$this->pdo = $this->resold_district->pdo;
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
	    $select_columns = "select %s from fc_esf_district %s %s %s";
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

		//print_r($res);exit;
		

		$this->assign('splitPageStr',$splitPageStr);
        $this->assign('header',  '项目管理');
        $this->display('resold_district','list');
    }

	//新增项目


    public function add()
    {
		$this->assign('handle',"add");
		$this->assign('header',  '新增项目');
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			if(isset($param["pm_type"]))$param["pm_type"]=implode(',',$param["pm_type"]);
			unset($param["id"]);
			$rlt = $this->pdo->add($param,'fc_esf_district');
			if($rlt){
				Util::alert_msg("添加成功!","succeed","/fc_esf_district/index.html",3);
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			//初始数据
			$Info = $this->resold_district->getTableMode('fc_esf_district');
			// 基础代码
			$code = new BaseCode();
			$region_option=$code->getPairBaseCodeByType(224);//新房片区
			
			$this->assign('region_option',$region_option);
			$this->assign('Info',$Info);
			$this->display('resold_district','edit');
		}
    }


	/* 编辑项目 --by xiewen*/

public function edit(){ 
		$this->assign('handle',"edit");
		$this->assign('header',  '编辑项目');
		$code = new BaseCode();
        $region_option=$code->getPairBaseCodeByType(224);//新房片区
        $this->assign('region_option',$region_option);
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			if(isset($param["pm_type"]))$param["pm_type"]=implode(',',$param["pm_type"]);

			//print_r($param);exit;
			$id = isset($param['id'])?$param['id']:0;
			if($id>0){
				$rlt = $this->pdo->update($param,'fc_esf_district','id='.$id);
				if($rlt){
					Util::alert_msg('编辑成功!',"succeed","/resold_district/index.html",3);
				}else{
					Util::alert_msg("编辑失败!","warning",$_SERVER['HTTP_REFERER'],3);
				}
			}else{
				Util::alert_msg("非法数据!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			$id = intval(isset($_GET['resold_district'])?$_GET['resold_district']:0);
			if($id){
				$sql = "select * from fc_esf_district where id=".$id;
				//初始数据
				$Info = $this->pdo->getRow($sql);
				$Info['pm_type'] = explode(",", $Info['pm_type']); 
				$this->assign('Info',$Info);


				//print_r($Info);exit;
				$this->assign('tab',$this->resold_district->tabbar('base',$id));
				$this->display('resold_district','edit');

			}
		}
	}








/*
*
删除 排序  打印 导出集体操作

@params 具体没有做删除到回收站的操作，，后面具体修改  --by xiewen

*/
	public function operate()
	{
		if(isset($_POST['ids'])) {
			// if($_POST['action']=='sort_asc'){
			// 	foreach($_POST['ids'] as $key=>$item){
			// 		if($_POST['taxis'][$item]>0){
			// 			$content = array("comnum"=>$_POST['taxis'][$item]);
			// 			$this->pdo->update($content, 'web_contentindex', "id=".$item);
			// 		}
			// 	}
			// 	Util::alert_msg($msg='排序成功!',$isok=true,$_SERVER['HTTP_REFERER']);
			// 	exit;
			// }
			// //发布信息
			// if($_POST['action']=='pubview'){
			// 	foreach($_POST['ids'] as $key=>$item){
			// 		$content = array("ifpub"=>1);
			// 		$this->pdo->update($content, 'web_contentindex', "id=".$item);
			// 	}
			// 	Util::alert_msg($msg='发布成功!',$isok=true,$_SERVER['HTTP_REFERER']);
			// 	exit;
			// }
			// //取消发布信息
			// if($_POST['action']=='pubcancel'){
			// 	foreach($_POST['ids'] as $key=>$item){
			// 		$content = array("ifpub"=>0);
			// 		$this->pdo->update($content, 'web_contentindex', "id=".$item);
			// 	}
			// 	Util::alert_msg($msg='取消发布成功!',$isok=true,$_SERVER['HTTP_REFERER']);
			// 	exit;
			// }
			if($_POST['action']=='delete'){
				foreach($_POST['ids'] as $key=>$item){
					$this->pdo->remove('fc_esf_district', "id=".$item);
				}
				Util::alert_msg($msg='删除成功!',$isok=true,$_SERVER['HTTP_REFERER']);
				exit;
			}
		}else{
			Util::alert_msg($msg='操作失败!',$isok=false,$_SERVER['HTTP_REFERER']);
			exit;
		}
	}


	/* 查看项目 */
	public function show(){
		$this->assign('method',"show");
	}


	/* 
	*
	删除项目 
	@params 前台删除项目隐藏  注释取消即可  --by xiewen
	*/
	public function del(){
		$id = intval(isset($_GET['id'])?$_GET['id']:0);
		if($id){
			//判断该项目下是否有经济人todo
			$rlt = $this->pdo->remove("fc_esf_district","id=".$id);
			if($rlt){
				Util::alert_msg("删除成功!","succeed",$_SERVER['HTTP_REFERER'],3);
			}else{
				Util::alert_msg("删除失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],3);
		}
	}


	// public function delpic(){
	// $id = intval(empty($_POST['project_id'])?$_POST['project_id']:0);
	// $rlt = $this->pdo_>remove("fc_esf","id="$id);
	// if($$rlt){
	// 	Util::alert_msg("删除成功!","succeed",$_SERVER['HTTP_REFERER'],3);

	// }else{



	// }

	// }

	/**************************** 图片管理 *****************************/
	/* 图片列表 
	*
	@params 获取图片列表   
	此处分页 是按照上传的图片数量进行分页  --by  xiewen
	*/
	public function listPic(){
		$resold_district_id = trim(isset($_GET["resold_district"])?$_GET["resold_district"]:0);
		$page_info = "";
		$orderField = isset($_GET['sort']) ? $_GET['sort'] : 'a.id';
		$orderValue = isset($_GET['flag']) ? $_GET['flag'] : 'desc';
		$pageSize = 15;
		$offset = 0;
		$subPages=5;//每次显示的页数
		$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		
		$where = 'where p.esf_id='.$esf_id.' ';
	    $select_count = "select %s from fc_esf_pic as p %s %s %s";
		$select_columns = "select %s from fc_esf_pic as p left join fc_esf_attach as a on p.attach_id=a.id %s %s %s";
	    $order = "order by $orderField $orderValue";
	    $limit = "limit $offset,$pageSize";
	    $count = " count(p.id) as count ";
	    $sql = sprintf($select_columns,'p.id,p.code,p.esf_id,p.attach_id,p.title,p.des,p.is_show,a.url',$where,$order,$limit);
	    $sqlcount = sprintf($select_count, $count,$where,'','');
	   	$res = $this->pdo->getAll($sql);
	   	$Count = $this->pdo->getRow($sqlcount);
		$recordCount = $Count['count'];
		$page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$page_info,4);
		$splitPageStr=$page->get_page_html();
		$this->assign('list',$res);
		$this->assign('splitPageStr',$splitPageStr);
		$this->assign('esf_id',$esf_id);
		$this->assign('tab',$this->resold_sale->tabbar('pic',$esf_id));
        $this->assign('header',  '图片管理');
        $this->display('resold_sale','pic_list');
	}


	/* 设置图片显示 */
	public function setShow(){
        $esf_id=isset($_GET['esf_id'])?$_GET['esf_id']:0;
        $attach_id=isset($_GET['attach_id'])?$_GET['attach_id']:0;
        $pic_id=isset($_GET['pic_id'])?$_GET['pic_id']:0;
        $referUrl = '/resold_sale/listPic?resold_sale='.$esf_id;
        if($_GET['set']){
            $picUrl = $this->pdo->getRow('select url from fc_esf_attach where id='.$attach_id);
            $this->pdo->update(array('is_show'=>0),"fc_esf_pic","esf_id=".$esf_id);
            $this->pdo->update(array('is_show'=>1),"fc_esf_pic","id=".$pic_id);
            $rst = $this->pdo->update(array('img_path'=>$picUrl['url']),"fc_esf","id=".$esf_id);
            if($rst){
                Util::alert_msg($msg='设置成功！',"succeed",$referUrl);
            }else{
                Util::alert_msg($msg='设置失败！',"warning",$referUrl);
            }
        }else{
            $rst = $this->pdo->update(array('is_show'=>0),"fc_esf_pic","id=".$pic_id);
            $rst = $this->pdo->doSql("update fc_esf set img_path='' where id=".$esf_id);
            if($rst){
                Util::alert_msg("取消成功!","succeed",$referUrl,3);
            }else{
                Util::alert_msg("取消失败!","warning",$referUrl,3);
            }
        }
    }


/**
@paradms 图片编辑
*/
	public function editPic(){
		$esf_id = trim(isset($_GET["esf_id"])?$_GET["esf_id"]:0);
		$attach_id = trim(isset($_GET["attach_id"])?$_GET["attach_id"]:0);
		$this->assign('handle',"edit");
		$this->assign('header',  '编辑图片');
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$upinfo = array();
			if(!empty($_FILES['url']['name'])){
				$uptool = new UploadFile($_FILES['url'],"img_type");
				$upsize = $uptool->upload();
				$upinfo = $uptool->getSaveInfo();
                $upinfo[0]['update_at'] = time();
			}
		//$rlt =$this->pdo->doSql("update fc_esf_attach as a,fc_esf_pic as p set a.update_at=".$upinfo[0]['update_at'].",a.name='".$upinfo[0]['name']."',a.url='".$upinfo[0]['url']."',p.code=".$_POST['code'].",p.flag=".$_POST['flag'].",p.title='".$_POST['title']."' where a.id =p.attach_id");

		$rlt = $this->pdo->update(array('update_at'=>$upinfo[0]['update_at'],'name'=>$upinfo[0]['name'],'url'=>$upinfo[0]['url']),'fc_esf_attach',"id=".$attach_id );
		$res = $this->pdo->update(array('code'=>$_POST['code'],'flag'=>$_POST['flag'],'title'=>$_POST['title']),'fc_esf_pic',"attach_id=".$attach_id );
		if($rlt && $res){
			Util::alert_msg("编辑成功!","succeed","/resold_sale/addPic?esf_id=".$esf_id,3);
		}else{

			Util::alert_msg("编辑失败!","warning",$_SERVER['HTTP_REFERER'],3);

		}

		}else{
			$Info = $this->pdo->getRow("select a.id,a.name,a.url,p.code,p.title,p.des,p.flag from fc_esf_attach as a left join fc_esf_pic as p on a.id = p.attach_id where p.attach_id = ".$attach_id." and a.id=".$attach_id);
			$Info['esf_id'] = $esf_id;
			$this->assign('Info',$Info);
			$this->display('resold_sale','pic_edit');
		}
	}
/* 

图片新增

 */
	public function addPic(){
		$esf_id = trim(isset($_GET["esf_id"])?$_GET["esf_id"]:0);
		$this->assign('handle',"add");
		$this->assign('header',  '新增图片');
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$param = $_POST;
			unset($param["id"]);
			//上传户型图
			$upinfo = array();
			if(!empty($_FILES['url']['name'])){
				$uptool = new UploadFile($_FILES['url'],"img_type");
				$upsize = $uptool->upload();
				$upinfo = $uptool->getSaveInfo();
                $upinfo[0]['update_at'] = time();
			}
			//新增附件信息
			$rlt = $this->pdo->add($upinfo[0],'fc_esf_attach');
			$lastAttachId = $this->pdo->getLastInsId();
			if($lastAttachId>0){
				$param['attach_id'] = $lastAttachId;
				$rlt = $this->pdo->add($param,'fc_esf_pic');
				if($rlt){
					$lastId = $this->pdo->getLastInsId();
					Util::alert_msg("添加成功!","succeed","/resold_sale/addPic?esf_id=".$lastId,3);
				}else{
					Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
				}
			}else{
				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);
			}
		}else{
			//初始数据
			$Info = $this->resold_sale->getTableMode('fc_esf_pic');
			$Info['esf_id'] = $esf_id;
			$this->assign('Info',$Info);
			$this->display('resold_sale','pic_add');
		}
	}

/**

@params 删除图片和对应的文件

*/
public function delpic(){
	$attach_id = trim(isset($_GET["attach_id"])?$_GET["attach_id"]:0);
	$esf_id = trim(isset($_GET["esf_id"])?$_GET["esf_id"]:0);
	$referUrl = '/resold_sale/listPic?resold_sale='.$esf_id;
	$rlt = $this->pdo->getRow("select a.id,a.url from fc_esf_attach as a left join fc_esf_pic as p on a.id = p.attach_id where a.id =".$attach_id." and p.attach_id=" .$attach_id);
	if(!empty($rlt)){
		/*
		删除文件 
		$img_url = $rlt['url'];
		$img_str[] = explode('.',$img_url);
		$arr = array();
		foreach ($img_str as $key => $value) {
			$arr[$key][]=$value[0].".".$value[1];
			$arr[$key][]=$value[0]."_x.".$value[1];
			$arr[$key][]=$value[0]."_m.".$value[1];
			$arr[$key][]=$value[0]."_s.".$value[1];
		}

		if (file_exists($_SERVER['HTTP_HOST'].$img_url)) {
		   print_r($img_url);exit;
		} else {
		    print_r($img_url."123");exit;
		}
		*/

		$this->pdo->remove("fc_esf_attach","id=".$attach_id);
		$this->pdo->remove("fc_esf_pic","attach_id=".$attach_id);

		Util::alert_msg("删除图片成功","succeed",$referUrl,1);
	}else{
		Util::alert_msg("不存在这个图片!","warning",$_SERVER['HTTP_REFERER'],1);

	}


}


	/* 
	其中的流程比较繁杂，，由于是一个字段存的多个图片导致每次都需要重组以及过多的重复操作，，通过共同的操作可以整合成一个方法来优化，代码复用
	@$params add  其中add 是点击事件 通过 open 的方式 其余为a 链接的方式 图片新增  --by xiewen
	@$params del 图片删除   --by xiewen
	@$params edit 图片编辑   --by xiewen
	*/
	// public function addPic(){
	// 	$project_id = trim(isset($_GET["project_id"])?$_GET["project_id"]:0);
	// 	$action = !empty($_GET["action"])?$_GET["action"]:'';
	// 	if($action=="edit"){

	
	// 	}else if($action=="del"){
	// 	$img_url = $_GET["url"];
	// 	$sql = $this->pdo->getRow('select img_path from fc_esf where id ='.$project_id);
	// 	$img_im = implode(',',$sql);
	// 	$img_ex = explode(',', $img_im);
	// 	if(in_array($img_url,$img_ex)){
	// 	 $rs = array_search($img_url, $img_ex);
	// 	 unset($img_ex[$rs]);
	// 	}
	// 	$img_str = implode(',',$img_ex);
	// 	$rst = $this->pdo->doSql("update fc_esf set img_path ='".$img_str."' where id=".$project_id);
	// 	if($rst){
	// 		Util::alert_msg("删除成功!","succeed","/resold_sale/listPic?resold_sale=".$project_id,3);
	// 	}else{

	// 		Util::alert_msg("删除失败!","warning",$_SERVER['HTTP_REFERER'],3);
	// 	}
	// 	}else{
	// 	$this->assign('handle',"add");
	// 	$this->assign('header',  '新增图片');
	// 	if($_SERVER['REQUEST_METHOD']=="POST"){
	// 		$param = $_POST;
	// 		//上传图片
	// 		$upinfo = array();
	// 		$file_name = 'img_type';
	// 		if(!empty($_FILES['url']['name'])){
	// 			$uptool = new UploadFile($_FILES['url'],$file_name);
	// 			$upsize = $uptool->upload();
	// 			$upinfo = $uptool->getSaveInfo();
	// 		}
	// 		$arr= array();
	// 		foreach ($upinfo as $key => $value) {
	// 			$arr[$key]=$value['url'];
	// 		}
	// 		$picUrl= $this->pdo->getRow('select img_path from fc_esf where id ='.$project_id);
	// 		$url_ex = explode(',',$picUrl['img_path']);
	// 		$merge = array_merge($url_ex,$arr);
	// 		$img_str = implode(',',$merge);
	// 		$rst = $this->pdo->doSql("update fc_esf set img_path ='".$img_str."' where id=".$project_id);
	// 		if($rlt ){
	// 			Util::alert_msg("添加成功!","succeed","/resold_sale/listPic?resold_sale=".$project_id,3);
	// 		}else{
	// 				Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],3);

	// 		}
	// 	}else{
	// 		//初始化数据
	// 		//获取图片信息
	// 		$Info = $this->resold_sale->getTableMode('fc_esf');
	// 		$Info['project_id'] = $project_id;
	// 		$this->assign('Info',$Info);
	// 		$this->display('resold_sale','pic_edit');
	// 	}
	// 	}
	// }

	


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