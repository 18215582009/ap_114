<?php
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\util\Util as Util;
use lib\util\FileUtil as FileUtil;
use lib\util\UploadFile as UploadFile;
use lib\pager\pager_page as pager_page;

class cms_content extends SecuredControl
{
	/**
	 * 数据库连接.
     * 
     * @var object
     * @access pdo
     */
	protected $pdo;

	/**
	 * 当前栏目cid.
     * 
     * @var object
     * @access cid
     */
	public $cid = 0;

	/**
	 * 当前栏目模型mid.
     * 
     * @var object
     * @access mid
     */
	public $mid = 0;

	/**
	 * 网站栏目管理列表.
     * 
     * @var object
     * @access category_list
     */
	 protected $category_list;
	
    /* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
		$this->pdo = $this->cms_content->pdo;
		$this->category_list = $this->cms_content->getWebCategory();//得到网站栏目管理列表
		//获取cid
		$this->cid = intval(isset($_GET['cid']) ? $_GET['cid'] : 0);
		$this->mid = intval(isset($_GET['mid']) ? $_GET['mid'] : 1);
		//通过cid,获取模型mid
		if($this->mid==0 && $this->cid>0)$this->mid = $this->cms_content->getMid($this->cid);
		$this->cms_content->cid = $this->cid;
		$this->cms_content->mid = $this->mid;

    }

	/* 内容管理首页 */
    public function index()
    {
		$category=$this->category_list;//得到网站栏目管理列表
		foreach($category as $key=>$j){
			$isExit = $this->pdo->getRow('select count(id) as cnt from web_category where parent_id='.$j['id']);
			if($isExit['cnt']>0){$category[$key]['ischild']=1;}else{$category[$key]['ischild']=0;}
		}
		//print_r($category);exit;
		$this->assign('category',$category);
        $this->assign('header',  '项目管理');
        $this->display('cms_content','tree_list');
    }

	/**************** 内容相关  ******************/
	/* 内容列表 */
    public function contentList()
    {
		$sort = isset($_GET['sort']) ? $_GET['sort'] : 'a.id';
		$order = isset($_GET['flag']) ? $_GET['flag'] : 'desc';
		$pageSize = 15;
		$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		//获取列表信息
		$list =$this->cms_content->paginate($currentPage,$pageSize,$_GET,$sort,$order);
		$this->assign('list',$list['data']);
		$this->assign('splitPageStr',$list['splitPageStr']);
        $header = $this->cms_content->getClassName($this->cid)==''?'全部':$this->cms_content->getClassName($this->cid);
        $this->assign('header',  $header);
        $this->display('cms_content','content_list');
    }

	/* 新增内容 */
	public function contentAdd(){
		$this->assign('handle',"add");
		$this->assign('header',  '新增 '.$this->cms_content->getClassName($this->cid));
		if($_SERVER['REQUEST_METHOD']=="POST"){
			// 录入公共信息到模型主表contentindex、主要信息出入content表
			$tid=$this->cms_content->addOrUpdateContentIndex($_POST,$option='add');
			$mid=$this->cms_content->getMid2($tid);
			$result = $this->cms_content->addOrUpdateContent($_POST,$tid,$option='add');
			if ($result) {
				$this->cms_content->addAttachindex($_POST['aid'],$tid,$mid=$_POST['mid']);
				$msg = '添加信息成功';
				$isok=true;
			}else{
				$msg = '添加信息失败';
				$isok=false;
			}
			Util::alert_msg($msg,$isok,$_SERVER['HTTP_REFERER']);
		}else{
			//初始数据
			$result = $this->cms_content->getTableModes($this->mid);
			$comm = $this->cms_content->exportCommonContent($this->mid);
			$result = array_merge($result, $comm);
			$categoryInfo = $this->cms_content->getCategoryInfo($this->cid);//获得该栏目信息
			$result['content'] = $categoryInfo['description'];
			$result['cid']=$this->cid;
			$result['mid']=$this->mid;
			$result['guid']=$this->cms_content->guid();
			$result['aid']=0;

			$this->session->set('guid',$result['guid']);
			$result['url']=$_SERVER['HTTP_REFERER'];
			$this->assign('result',$result);
			$this->display('cms_content','content'.$this->mid.'_edit');
		}
	}

	/* 编辑内容 */
	public function contentEdit(){
		$this->assign('handle',"edit");
		$this->assign('header',  '编辑 '.$this->cms_content->getClassName($this->cid));
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$tid=$this->cms_content->addOrUpdateContentIndex($_POST,$option='update');
			$mid=$this->cms_content->getMid2($tid);
			$result = $this->cms_content->addOrUpdateContent($_POST,$tid,$option='update');
			if ($result) {
				$this->cms_content->addAttachindex($_POST['aid'],$tid,$mid=$_POST['mid']);
				$msg = '编辑成功';
				$isok=true;
			}else{
				$msg = '编辑失败';
				$isok=false;
			}
			Util::alert_msg($msg,$isok,$_SERVER['HTTP_REFERER']);
		}else{
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			if($id){
				
				$result1 = $this->cms_content->getDetailContentInfo($id);
				$result2 = $this->cms_content->exportCommonContent($this->mid);
				$result = array_merge($result1, $result2);
				$result['relatedcid']=explode(',',$result['relatedcid']);

				//分解样式字段titlestyle  titlecolor:crimson;titleb:1;
				if(!empty($result['titlestyle'])){
					$styleArray = explode(';',$result['titlestyle']);
					foreach($styleArray as $j){
						if(!empty($j)){
							$aloneStyle=explode(':',$j);
							$result[$aloneStyle[0]]=$aloneStyle[1];
						}
					}
				}

				//获取该信息的附件图片aid
				$result['aid'] = $this->cms_content->getAid($result['photo']);
				$result['guid'] = empty($result['guid'])?$this->cms_content->guid():$result['guid'];

				@$result['content']=stripslashes(htmlspecialchars($result['content']));
				@$result['intro']=stripslashes(htmlspecialchars($result['intro']));

				$this->session->set('guid',$result['guid']);

				$result['url']=$_SERVER['HTTP_REFERER'];
				$this->assign('result',$result);
				$this->display('cms_content','content'.$this->mid.'_edit');
			}else{
				Util::alert_msg($msg='操作失败！',true,$_SERVER['HTTP_REFERER']);
			}
		}
	}

	/* 删除内容 */
	public function contentDel(){
		//$para = formatParameter($_GET["sp"], "out");
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
		$this->pdo->update(array('cid'=>-1) , DB_PREFIX_WEB.'contentindex', "id=".$id);
		//insert recycle table's
		$recycle = array('tid'=>$id,'cid'=>$this->cid,'deltime'=>time(),'admin'=>$this->session->username);
		$this->pdo->add($recycle,DB_PREFIX_WEB.'recycle');
		$rid = $this->pdo->getLastNumRows();
		if($rid){
			$msg = '删除成功！';
			$isok=true;
		}else{
			$msg='删除失败！';
			$isok=false;
		}	
		Util::alert_msg($msg,$isok,$url=$_SERVER['HTTP_REFERER']);
	}

	/* 单独操作-排序*/
	public function order()
	{
		if (isset($_POST['taxis'])) {
			foreach($_POST['taxis'] as $key=>$item){
				$content = array("comnum"=>$item);
				$pdo->update($content, 'web_contentindex', "id=".$key);
			}
			Util::alert_msg($msg='排序成功!',$isok=true,$_SERVER['HTTP_REFERER']);
			exit;
		}
	}

	/* 发布内容 */
	public function contentPub(){
		if (isset($_GET['id'])) {		
			$content = array("ifpub"=>1);
			$this->pdo->update($content, 'web_contentindex', "id=".$_GET['id']);
			Util::alert_msg($msg='审核成功!',true,$_SERVER['HTTP_REFERER']);
		}
	}

	/* 取消发布内容 */
	public function contentCancel(){
		if (isset($_GET['id'])) {
			$content = array("ifpub"=>0);
			$this->pdo->update($content, 'web_contentindex', "id=".$_GET['id']);
			Util::alert_msg($msg='取消审核成功!',true,$_SERVER['HTTP_REFERER']);
		}
	}

	/* ajax设置推荐 */
	function ajaxDigest()
	{
		$data = array('digest'=>$_GET['digest']);
		return $this->pdo->update($data , DB_PREFIX_WEB.'contentindex', "id=".$_GET['id']);
	}

	/* 集体操作 */
	function operate()
	{
		if(isset($_POST['ids'])) {
			//排序
			if($_POST['action']=='order'){
				foreach($_POST['ids'] as $key=>$item){
					if($_POST['taxis'][$item]>0){
						$content = array("comnum"=>$_POST['taxis'][$item]);
						$this->pdo->update($content, 'web_contentindex', "id=".$item);
					}
				}
				Util::alert_msg($msg='排序成功!',$isok=true,$_SERVER['HTTP_REFERER']);
				exit;
			}
			//发布信息
			if($_POST['action']=='pubview'){
				foreach($_POST['ids'] as $key=>$item){
					$content = array("ifpub"=>1);
					$this->pdo->update($content, 'web_contentindex', "id=".$item);
				}
				Util::alert_msg($msg='发布成功!',$isok=true,$_SERVER['HTTP_REFERER']);
				exit;
			}
			//取消发布信息
			if($_POST['action']=='pubcancel'){
				foreach($_POST['ids'] as $key=>$item){
					$content = array("ifpub"=>0);
					$this->pdo->update($content, 'web_contentindex', "id=".$item);
				}
				Util::alert_msg($msg='取消发布成功!',$isok=true,$_SERVER['HTTP_REFERER']);
				exit;
			}
			//删除到回收站
			if($_POST['action']=='del'){
				foreach($_POST['ids'] as $key=>$item){
					$this->pdo->update(array('cid'=>-1) , 'web_contentindex', "id=".$item);
					//insert recycle table's
					$recycle = array('tid'=>$item,'cid'=>$this->cid,'deltime'=>time(),'admin'=>$this->session->username);
					$rid = $this->pdo->add($recycle,'web_recycle');
				}
				Util::alert_msg($msg='删除成功!',$isok=true,$_SERVER['HTTP_REFERER']);
				exit;
			}
		}else{
			Util::alert_msg($msg='操作失败!',$isok=false,$_SERVER['HTTP_REFERER']);
			exit;
		}
	}


	/**************** 栏目相关  ******************/
	/* 栏目列表 */
    public function categoryList()
    {
		$depth=intval(isset($_GET['depth'])?$_GET['depth']:1);
		$up=intval(isset($_GET['up'])?$_GET['up']:0);
		$guide=isset($_GET['guide'])?$_GET['guide']:'ROOT';
		
		//系统模型，可以从module表中读取
		$module_list = array('1'=>'新闻资讯','2'=>'旅游景点','3'=>'旅游路线','4'=>'链接模型');
		//category list
		$category_list=$this->pdo->getAll("select * from web_category where mid>0 and parent_id={$up} and depth={$depth} order by order_list desc");

		$this->assign('list',$category_list);
		$this->assign('module_list',$module_list);
		$this->assign('header',  '栏目列表');
		$this->display('cms_content','category_list');
    }
	
	/* 新增栏目 */
    public function categoryAdd()
    {
        $this->assign('handle',"add");
        $this->assign('header',  '新增栏目');
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //print_r($_POST);exit;
            $result = $this->cms_content->addOrUpdateCategory($_POST,'add');
            if ($result) {
                $msg = '创建成功';
                $isok=true;
            }else{
                $msg = '创建失败';
                $isok=false;
            }
            Util::alert_msg($msg,$isok,$_SERVER['HTTP_REFERER']);
        }else{
            $cInfo = $this->cms_content->getTableMode('web_category');
            $categoryInfo = $this->cms_content->getWebCategory();//获得栏目信息
            $moduleInfo=$this->pdo->getAll('select * from web_module');//all module

            $this->assign('category',$categoryInfo);
            $this->assign('module',$moduleInfo);
            $this->assign('cInfo',$cInfo);
            $this->assign('pid',$this->cid);
            $this->display('cms_content','category_edit');
        }
    }

    /* 删除栏目 */
    public function categoryDel(){
        $result = $this->cms_content->delCategory($this->cid);
        echo json_encode($result);exit;
    }

    /* 编辑栏目 */
    public function categoryEdit(){
        $this->assign('handle',"edit");
        $this->assign('header',  '编辑栏目'.$this->cms_content->getClassName($this->cid));
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //print_r($_POST);exit;
            $result = $this->cms_content->addOrUpdateCategory($_POST,'update');
            if ($result) {
                $msg = '编辑成功';
                $isok=true;
            }else{
                $msg = '编辑失败';
                $isok=false;
            }
            Util::alert_msg($msg,$isok,$_SERVER['HTTP_REFERER']);
        }else{
            if($this->cid){
                $cInfo = $this->cms_content->getCategoryInfo($this->cid);
                $categoryInfo = $this->cms_content->getWebCategory();//获得栏目信息
                $moduleInfo=$this->pdo->getAll('select * from web_module');//all module
                $parentCategoryInfo = $this->cms_content->getParentCategory($this->cid);

                $this->assign('category',$categoryInfo);
                $this->assign('module',$moduleInfo);
                $this->assign('cInfo',$cInfo);
                $this->assign('pid',$parentCategoryInfo['id']);
                $this->display('cms_content','category_edit');
            }else{
                Util::alert_msg($msg='操作失败！',true,$_SERVER['HTTP_REFERER']);
            }
        }
    }

	/* 获取子栏目 */
	public function categoryTree(){
		$cid=intval($_GET['cid']);
		$xmlmsg = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n\t<tree>\n";
		if($_SESSION['isadmin']){
			$child = $this->pdo->getAll("SELECT * FROM web_category WHERE parent_id='$cid' order by order_list desc");
		}else{
			//$child = $this->pdo->getAll("select c.* from admin_category as uc left join web_category as c on uc.category_id=c.id where uc.uid=".$_SESSION['userid']." and c.mid>0 and c.parent_id='$cid'  order by c.order_list desc");
			//$rs = $db->query("SELECT * FROM cms_category WHERE up='$cid' AND cid IN($sqlfathercids)");
		}
		
		foreach($child as $item){
			$item['name'] = htmlspecialchars($item['name']);
			$item['_name'] = Util::msubstr($item['name'],0,8);
			$children = $this->pdo->getAll("select * from web_category where parent_id=".$item['id']);
			if(count($children)){
				$xmlmsg.="\t\t<tree text=\"$item[_name]\" action=\"javascript:goMain('$item[url]?cid=$item[id]&amp;mid=$item[mid]');\" cId=\"$item[id]\"  ";
				//$xmlmsg.="\t\t<tree text=\"$child[cname]\" action=\"javascript:goMain('$admin_file?adminjob=content&amp;action=view&amp;cid=$child[cid]');\" cId=\"$child[cid]\"  ";
			}else{
				//$xmlmsg.="\t\t<tree text=\"$item[name]\" action=\"javascript:void(0);\" cId=\"nopriv\"  ";
				$xmlmsg.="\t\t<tree text=\"$item[_name]\"  action=\"javascript:goMain('$item[url]?cid=$item[id]&amp;mid=$item[mid]');\" cId=\"$item[id]\"  ";
			}
			if(count($children)){
				$xmlmsg.="src=\"categoryTree.php?cid=$item[id]\"";
				//$xmlmsg.="src=\"$admin_file?adminjob=tree&amp;action=showXML&amp;cid=$child[cid]&amp;timestamp=$timestamp\"";
			}
			$xmlmsg.="/>\n";
		}
		$xmlmsg.="\t</tree>";
		header("Content-type: application/xml");
		print $xmlmsg;
	}

	/**************** 附件相关  ******************/
	/* 附件列表 */
	public function attachList(){
		$type=isset($_GET['type'])?$_GET['type']:'image';
		$inputname=isset($_GET['inputname'])?$_GET['inputname']:'photo';
		if($type=='image'){
			$ext_type="('jpg','gif','png')";
			$filetype=0;
		}else{
			$ext_type="('zip','rar','txt','xls','xlsx','doc','docx','pdf')";
			$filetype=1;
		}
		
		$page_info = "type=".$type."&inputtype=input&inputname=".$inputname."&";
		$pageSize = 15;
		$offset = 0;
		$subPages=5;//每次显示的页数
		$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;

		$attach=$this->pdo->getAll("select * from ".DB_PREFIX_WEB."attach where guid='".$this->session->guid."' and type in ".$ext_type." order by aid desc limit ".$offset.",".$pageSize);
		$Count = $this->pdo->getRow("select count(aid) as count from ".DB_PREFIX_WEB."attach where guid='".$this->session->guid."' and type in ".$ext_type);
		$recordCount = $Count['count'];
		$page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$page_info,4);
		$splitPageStr=$page->get_page_html();

		$this->assign('filetype',$filetype);
		$this->assign('inputname',$inputname);
		$this->assign('type',$type);
		$this->assign('attach',$attach);
		$this->assign('splitPageStr',$splitPageStr);
        $this->assign('header',  '附件管理');
        $this->display('cms_content','file_attach');
	}

	public function attachAdd(){
		$path=isset($_POST['type'])?$_POST['type']:"file";
		$info=isset($_POST['fileintro'])?$_POST['fileintro']:"";
		$uptool = new UploadFile($_FILES['file'],$path);
		$upsize = $uptool->upload();
		$upinfo = $uptool->getSaveInfo();
		$ras = array();
		$ras['filename']   = $upinfo[0]['name'];
		$ras['filepath']   = $upinfo[0]['url'];
		$ras['type']       = $upinfo[0]['type'];
		$ras['size']       = $upinfo[0]['size'];
		$ras['filesrc']    = $upinfo[0]['checksum'];
		$ras['uploadtime'] = $_SERVER['REQUEST_TIME'];
		$ras['fileintro']  = $info;
		$ras['guid']       = $this->session->guid;
		$this->pdo->add($ras, DB_PREFIX_WEB."attach");
		if($this->pdo->getLastInsID()){
			echo "<script>parent.notice();</script>"; exit;
		}
	}

	/**************** 回收站相关  ******************/
	/* 回收站列表 */
	public function recycle(){
		//echo $this->cid;
		//print_r($this->category_list);print_r($menu);exit;
		$page_info = "";
		$pageSize = 15;
		$offset = 0;
		$subPages=5;//每次显示的页数
		$currentPage = isset($_GET['p']) ? (int)$_GET['p'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		$where = "where 1=1 ";
		//处理搜索条件
	    if($this->cid>0){
			$where .=" and a.`cid` = {$this->cid}";
			$page_info.="cid={$this->cid}&";
		}
		if(isset($_GET['title']) && $_GET['title'] != ""){
			$where .=" and b.`title` like '%{$_GET['title']}%'";
			$page_info.="title={$_GET['title']}&";
			$this->assign("title",$_GET['title']);
		}

	    $select_columns = "select %s from ".DB_PREFIX_WEB."recycle as a left join ".DB_PREFIX_WEB."contentindex as b on a.tid=b.id %s %s %s";
	    
	    $order = "order by deltime desc";
	    $limit = "limit $offset,$pageSize";
	    $count = " count(a.tid) as count ";
	    $sql = sprintf($select_columns,'a.tid,a.cid,a.admin,a.deltime,b.id,b.mid,b.title,b.publisher,b.guid',$where,$order,$limit);
	    $sqlcount = sprintf($select_columns,$count,$where,'','');
	   	$res = $this->pdo->getAll($sql);
	   	$Count = $this->pdo->getRow($sqlcount);
		$recordCount = $Count['count'];
	    $page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,"?".$page_info."p=",4);
		$splitPageStr=$page->get_page_html();

		$this->assign('menu',$this->category_list);
	 	// 查询到的结果
		$this->assign('list', $res);
		$this->assign('count',$recordCount);
		// 显示分页信息
		$this->assign('splitPageStr', $splitPageStr);
        $this->assign('header',  '回收站 '.$this->cms_content->getClassName($this->cid));//得到类名
        $this->display('cms_content','recycle_list');
	}
	
	/* 集体操作 */
	public function recycleOperate(){
		if(isset($_POST['ids'])) {
			//还原
			if($_POST['action']=='recycleUndo'){
				foreach($_POST['ids'] as $key=>$item){
					$val = explode('-',$item);
					$rid=$this->pdo->update(array('cid'=>$val[1]), DB_PREFIX_WEB.'contentindex', "id=".$val[0]);
					$this->pdo->remove(DB_PREFIX_WEB."recycle","tid={$val[0]}");
				}
				Util::alert_msg($msg='还原成功！',$isok=true,$_SERVER['HTTP_REFERER']);
				exit;
			}
			//删除
			if($_POST['action']=='recycleDel'){
				foreach($_POST['ids'] as $key=>$item){
					$val = explode('-',$item);
					$rlt = $this->recyleDelItem($id=$val[0],$mid=$val[3],$guid=$val[2]);
				}
				Util::alert_msg($msg='删除成功!',$isok=true,$_SERVER['HTTP_REFERER']);
				exit;
			}
		}else{
			Util::alert_msg($msg='操作失败!',$isok=false,$_SERVER['HTTP_REFERER']);
			exit;
		}
		/*
			//永久删除
			foreach($_POST['ids'] as $key=>$item){
				//如果有附件图片，删除attach表记录，同时删除附件文件
				//echo "select * from web_attach where guid='".$_POST['guids'][$item]."'";exit;
				//$attachList = $this->pdo->getAll('select * from web_attach where guid='.$_POST['guids'][$item]);
				//删除attachindex表中的记录信息
				$this->pdo->remove("tid={$item} and mid=".$mid,DB_PREFIX."attachindex");
				$this->pdo->remove("id={$item}",DB_PREFIX."content".$this->mid);
				$this->pdo->remove("id={$item}",DB_PREFIX."contentindex");
			}
			*/
	}

	/* 回收站删除 */
	public function recycleDel(){
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
		$guid = isset($_GET['guid'])?$_GET['guid']:'';
		if($id!=0 && $guid!=''){
			$rlt = $this->recyleDelItem($id,$this->mid,$guid);
			if($rlt){
				Util::alert_msg($msg='删除成功!',$isok=true,$_SERVER['HTTP_REFERER']);
			}else{
				Util::alert_msg($msg='删除失败!',$isok=false,$_SERVER['HTTP_REFERER']);
			}
		}else{
			Util::alert_msg($msg='删除失败!',$isok=false,$_SERVER['HTTP_REFERER']);
		}
	}

	/* 回收站还原 */
	public function recycleUndo(){
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($id>0 && $this->cid>0) {
            //判断该信息所在栏目是否被删除
            $isExt = $this->pdo->getRow('select count(*) as cnt from ' . DB_PREFIX_WEB . 'category where id=' . $this->cid);
            if ($isExt['cnt'] > 0) {
                $rid = $this->pdo->update(array('cid' => $this->cid), DB_PREFIX_WEB . 'contentindex', "id=" . $id);
                $this->pdo->remove(DB_PREFIX_WEB . "recycle", "tid={$id}");
                Util::alert_msg('还原成功！', $isok = true, $_SERVER['HTTP_REFERER']);//'recycle?&cid='.$this->cid
            }else{
                Util::alert_msg('该信息的所在栏目不存在，还原失败！', $isok = false, $_SERVER['HTTP_REFERER']);//'recycle?&cid='.$this->cid
            }
		}else{
			Util::alert_msg('还原失败！',$isok=false,$_SERVER['HTTP_REFERER']);//'recycle?&cid='.$this->cid
		}
	}

	private function recyleDelItem($id,$mid,$guid){
		//如果有附件图片，删除attach表记录，同时删除附件文件
		//echo "select * from web_attach where guid='".$guid."'";exit;
		$attachList = $this->pdo->getAll("select * from web_attach where guid='".$guid."'");
		//删除附件文件
		if(count($attachList)>0){
			$fileUtil = new FileUtil();
			foreach($attachList as $key=>$item){
				$attachFile = $this->app->getAppRoot().'www'.$item['filepath'];
				//echo $attachFile.'<br>';
				$fileUtil->unlinkFile($attachFile);
				$fileUtil->unlinkFile(str_ireplace(".","_s.",$attachFile));
				$fileUtil->unlinkFile(str_ireplace(".","_m.",$attachFile));
				$fileUtil->unlinkFile(str_ireplace(".","_x.",$attachFile));
			}
			$this->pdo->remove(DB_PREFIX_WEB."attach","guid='".$guid."'");
		}
		//删除attachindex表中的记录信息
		$this->pdo->remove(DB_PREFIX_WEB."attachindex","tid={$id} and mid=".$mid);
		$rlt1 = $this->pdo->remove(DB_PREFIX_WEB."content".$mid,"id={$id}");
		$rlt2 = $this->pdo->remove(DB_PREFIX_WEB."contentindex","id={$id}");
		$rlt3 = $this->pdo->remove(DB_PREFIX_WEB."recycle","tid={$id}");
		if($rlt1>0 && $rlt2>0){
			return true;
		}else{
			return false;
		}
	}
}
?>