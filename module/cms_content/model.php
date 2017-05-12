<?php
/**
 * The model file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: model.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\ezsql\DbPdo as DbPdo;
use lib\pager\pager_page as pager_page;

class cms_contentModel extends Model
{
	/**
	 * pdo连接。
	 * 
	 * @var object
	 * @access pdo
	 */
	public $pdo;

	/**
	 * 当前栏目cid.
     * 
     * @var object
     * @access cid
     */
	public $cid;

	/**
	 * 当前栏目模型mid.
     * 
     * @var object
     * @access mid
     */
	public $mid;

    public function __construct()
    {
        parent::__construct();
		$this->pdo = new DbPdo();
    }

	public function paginate($currentPage,$pageSize=15,$Param,$orderField,$orderValue){
		$page_info = "";
		$orderField = isset($orderField) ? $orderField : 'a.id';
		$orderValue = isset($orderValue) ? $orderValue : 'desc';
		$offset = 0;
		$subPages=5;//每次显示的页数
		$currentPage = isset($Param['page']) ? (int)$Param['page'] : 0;
		if($currentPage>0) $offset=($currentPage-1)*$pageSize;
		$where = 'where 1=1 ';
	   	if($Param) {
	    	$this->advanced_search($Param,$page_info,$filter_where);
	    	$where .= $filter_where;
	    }
	    $select_columns = "select %s from ".DB_PREFIX_WEB."contentindex as a left join ".DB_PREFIX_WEB."content".$this->mid." as b on a.id=b.id %s %s %s";
	    $order = "order by $orderField $orderValue";
	    $limit = "limit $offset,$pageSize";
	    $count = " count(a.id) as count ";
	    $sql = sprintf($select_columns,'b.*,a.*',$where,$order,$limit);
	    $sqlcount = sprintf($select_columns,$count,$where,'','');
	   	$res['data'] = $this->pdo->getAll($sql);
	   	$Count = $this->pdo->getRow($sqlcount);
		$recordCount = $Count['count'];
	    $page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$page_info,4);
		$res['splitPageStr']=$page->get_page_html();

		return $res;
	}
	
	/* 获取主表与从表的表结构数据 */
	public function getTableModes($mid){
		$index = $this->getTableMode('web_contentindex');
		$slave = $this->getTableMode('web_content'.$mid);
		unset($slave['id']);
		$result = array_merge($index, $slave);
		return $result;
	}

	/**
	 * 输出添加信息界面(add和edit编辑模板的输出数据)
	 */
	public function exportCommonContent($mid)
	{
		$result = array();
		$result['menu']=$this->getWebCategory();//得到网站栏目管理列表
		$result['relatedCategory']=$this->getRelatedCategory($result['menu'],$mid);//得到该类的相关分类
		$result['author_value']=$this->getSelectVaule('11');
		$result['fromsite_value']=$this->getSelectVaule('12');
		$result['titlecolor'] = '';
		$result['titlei'] = 0;
		$result['titleb'] = 0;
		$result['titleu'] = 0;
		return $result;
	}

    /**
	 * 主表操作(新增、修改)
	 * @param $Data,POST提交数据,array('id'=>1)
	 * @param option,执行操作类型,$option='add',$option='update'
	 */
	public function addOrUpdateContentIndex($Data,$option='add'){
		$tid = 0;
		if(!empty($Data)){
			//处理titlestyle
			//print_r($Data);
			$titlestyle=$this->processTitleStyle($Data);
			$tid = $Data['id'];
			//所属相关类别
			$relatedcid="";
			if(!empty($Data['relatedcid']))$relatedcid=implode(',',$Data['relatedcid']);
			// 录入公共信息到模型主表contentindex
			$contentIndex = array("cid"=>isset($Data['cid'])?$Data['cid']:'',
							  "mid"=>isset($Data['mid'])?$_POST['mid']:'',
							  "title"=>isset($Data['title'])?trim($Data['title']):'',
							  "photo"=>isset($Data['photo'])?$Data['photo']:'',
							  "postdate"=>empty($Data['postdate'])?date('Y-m-d',time()):$Data['postdate'],
							  "linkurl"=>isset($Data['linkurl'])?$Data['linkurl']:'',
							  "digest"=>isset($Data['digest'])?$Data['digest']:0,
							  "publisher"=>$this->session->username,
							  "titlestyle"=>$titlestyle,
							  "relatedcid"=>$relatedcid,
							  "alias"=>isset($Data['alias'])?str_ireplace(' ','-',trim($Data['alias'])):'',
							  "is_comment"=>isset($Data['is_comment'])?$Data['is_comment']:1,
							  "guid"=>$this->session->guid);
		}else{
			return false;
		}
		
		if($option=='add'){
			$this->pdo->add($contentIndex, DB_PREFIX_WEB."contentindex");
			$tid=$this->pdo->getLastInsID();
			return $tid;
		}else{
			$this->pdo->update($contentIndex , DB_PREFIX_WEB.'contentindex', "id=".$tid);
			return $tid;
		}
	}

	/**
	 * 附表操作(新增、修改)
	 * @param $Data,POST提交数据,array('id'=>1)
	 * @param $id,操作数据的id
	 * @param option,执行操作类型,$option='add',$option='update'
	 */
	public function addOrUpdateContent($Data,$tid,$option='add')
	{
		$mid = isset($Data['mid'])?$Data['mid']:0;
		if($mid!=0){
			switch ($mid) {
				case 1:
					// 录入详细信息到新闻模型表content1
					$content = array("id"=>$tid,
							 "content"=>isset($Data['content'])?$Data['content']:'',
							 "intro"=>isset($Data['intro'])?$Data['intro']:'',
							 "author"=>isset($Data['author'])?$Data['author']:'',
							 "fromsite"=>isset($Data['fromsite'])?$Data['fromsite']:'');
					break;
				case 2:
					// 录入详细信息到模型表content2
					$content = array("id"=>$tid,
						"content"=>isset($_POST['content'])?$_POST['content']:'',
						"intro"=>isset($_POST['intro'])?$_POST['intro']:'',
						"address"=>isset($_POST['address'])?$_POST['address']:'',
						"region"=>isset($_POST['region'])?$_POST['region']:'',
						"type"=>isset($_POST['type'])?$_POST['type']:'',
						"feature"=>isset($_POST['feature'])?$_POST['feature']:'',
						"prompt"=>isset($_POST['prompt'])?$_POST['prompt']:'',
						"traffic_info"=>isset($_POST['traffic_info'])?$_POST['traffic_info']:'',
						"rim_repast"=>isset($_POST['rim_repast'])?$_POST['rim_repast']:'',
						"rim_lodging"=>isset($_POST['rim_lodging'])?$_POST['rim_lodging']:'');
					break;
				case 3:
					// 录入详细信息到模型表content3
					$content = array("id"=>$tid,
						  "destinations"=>isset($_POST['destinations'])?$_POST['destinations']:'',
						  "prices"=>isset($_POST['prices'])?$_POST['prices']:'',
						  "departuredates"=>isset($_POST['departuredates'])?$_POST['departuredates']:'',
						  "content"=>isset($_POST['content'])?$_POST['content']:'',
						  "cost"=>isset($_POST['cost'])?$_POST['cost']:'',
						  "sightspot"=>isset($_POST['sightspot'])?$_POST['sightspot']:'',
						  "uid"=>isset($_POST['uid'])?$_POST['uid']:$_SESSION['userid'],
						  "username"=>isset($manager[$_POST['uid']])?$manager[$_POST['uid']]:$_SESSION['userName'],
						  "description"=>isset($_POST['description'])?$_POST['description']:'',
						  "keywords"=>isset($_POST['keywords'])?$_POST['keywords']:'',
						  "weight"=>isset($_POST['weight'])?$_POST['weight']:'',
						  "highlights"=>isset($_POST['highlights'])?$_POST['highlights']:''
						  );
					break;
				case 4:
					// 录入详细信息到模型表content4
					$content = array("id"=>$tid,
						 "intro"=>isset($Data['intro'])?$Data['intro']:'');
					break;
			}
			if($option=='add'){
				$this->pdo->add($content, DB_PREFIX_WEB."content".$mid);
				$tid=$this->pdo->getLastInsID();
			}else{
				$this->pdo->update($content , DB_PREFIX_WEB.'content'.$mid, "id=".$Data['id']);
				$tid=$Data['id'];
			}
			$this->addSelectVaule('11',$_POST['author']);
			$this->addSelectVaule('12',$_POST['fromsite']);
			return $tid;
		}else{
			return false;
		}
	}

    /**
     * 更新或新增栏目信息
     * @param $Data,POST提交数据,array('id'=>1)
     * @param option,执行操作类型,$option='add',$option='update'
     */
    public function addOrUpdateCategory($Data,$option='add'){
        $tid = 0;
        if(!empty($Data)){
            $tid = $Data['id'];
        }else{
            return false;
        }
        if($option=='add'){
            //获取当前父级栏目深度
            $depth=$this->pdo->getRow('select depth from '.DB_PREFIX_WEB.'category where id='.$Data['parent_id']);
            $Data['url'] = '/cms_content/contentList';
            $Data['depth'] = $depth['depth']+1;
            $this->pdo->add($Data, DB_PREFIX_WEB."category");
            $tid=$this->pdo->getLastInsID();
            return $tid;
        }else{
            $this->pdo->update($Data , DB_PREFIX_WEB.'category', "id=".$tid);
            return $tid;
        }
    }

    /**
     * 删除栏目
     * @param cid
     */
    public function delCategory($cid){
        //判断该栏目是否存在子栏目
        $childCnt=$this->pdo->getRow('select count(*) as cnt from '.DB_PREFIX_WEB.'category where parent_id='.$cid);
        if($childCnt['cnt']>0){
            return array('state'=>0,'desc'=>'该栏目存在子栏目，不能删除！');
        }else{
            //判断该栏目是否存在信息
            $sql = "select count(*) as cnt from ".DB_PREFIX_WEB."contentindex where cid=".$cid;
            $total = $this->pdo->getRow($sql);
            if($total['cnt']>0){
                return array('state'=>0,'desc'=>'该栏目存在内容，不能删除！');
            }else{
                //delete category table's msg
                $this->pdo->remove(DB_PREFIX_WEB."category","id=".$cid);
                return array('state'=>1,'desc'=>'栏目删除成功！');
            }
        }
    }
	/**
	 * 高级所搜
	 */
	public function advanced_search($Data,&$page_info,&$where)
	{
		$where = " ";
		$page_info = "";
		if(isset($Data['cid']) && $Data['cid'] != ""){
			$where .=" and a.`cid` = '{$Data['cid']}'";
			$page_info.="cid={$Data['cid']}&";
		}
		if(isset($Data['keyword']) && $Data['keyword'] != ""){
			$where .=" and a.`title` like '%{$Data['keyword']}%'";
			$page_info.="keyword={$Data['keyword']}&";
		}
	}

	/******* cms系统基础功能 *******/
	/**
	 * 根据id，得到详细信息
	 * 
	 * @param Data
	 */
	public function getDetailContentInfo($id)
	{
		$contentIndexList = $this->pdo->getRow("select * from ".DB_PREFIX_WEB."contentindex where id = {$id}");
		$contentList = $this->pdo->getRow("select * from ".DB_PREFIX_WEB."content".$contentIndexList['mid']." where id={$id}" );
		unset($contentList['id']);
		if(!empty($contentList)){
			$result = array_merge($contentIndexList, $contentList);
		}else{
			$result=$contentIndexList;
		}
		return $result;
	}

	/**
	 * 获取该网站栏目管理列表
	 * 
	 * @param Data
	 */
	public function getWebCategory()
	{
		if($this->session->isadmin){
			$module_sql=" select * from ".DB_PREFIX_WEB."category where mid>0 and depth=1 order by order_list desc";
		}else{
			//$module_sql="select c.* from admin_category as uc left join category as c on uc.category_id=c.id where uc.uid=".$_SESSION['userid']." and c.mid>0 and c.depth=1  order by c.order_list desc";
		}
		$module_category = $this->pdo->getAll($module_sql);

		foreach($module_category as $key=>$i){
			$module_category[$key]['child'] = self::getChildCategory($i['id']);
			foreach($module_category[$key]['child'] as $ckey=>$ci){
				$module_category[$key]['child'][$ckey]['child'] = self::getChildCategory($ci['id']);
			}
		}
		return $module_category;
	}

	/**
	 * 根据cid获取他的父级分类
	 */
	public function getParentCategory($cid){
        if($cid>0){
            $sql=" select parent_id from ".DB_PREFIX_WEB."category where mid>0 and id=".$cid;
            $selfCategory = $this->pdo->getRow($sql);
            $sql=" select * from ".DB_PREFIX_WEB."category where mid>0 and id=".$selfCategory['parent_id'];
            $parentCategory = $this->pdo->getAll($sql);
            if(count($parentCategory)>0){
                return $parentCategory[0];
            }else{
                return array('id'=>0,'name'=>'Root');
            }
        }else{
            return array('id'=>0,'name'=>'Root');
        }
    }

	/**
	 * 得到该网站的相关栏目列表
	 */
	 function getRelatedCategory($menu,$mid){
		$relatedcategory=array();
		foreach($menu as $list){
			if($list['mid']==$mid)$relatedcategory[]=$list;
		}
		return $relatedcategory;
	 }

	/**
	 * 根据cid,获得栏目信息
	 */
	function getCategoryInfo($cid)
	{
		$sql = "select * from ".DB_PREFIX_WEB."category where id={$cid}";
		$info=$this->pdo->getRow($sql);
		return $info;
	}

	/**
	 * 根据id,获得内容信息标题
	 */
	function getContentName($id)
	{
		$sql = "select title from ".DB_PREFIX_WEB."contentindex where id={$id}";
		$info=$this->pdo->getRow($sql);
		return $info['title'];
	}

	/**
	 * 根据栏目cid，得到栏目classname
	 */
	function getClassName($cid)
	{
		if($cid>0){
			$className=$this->pdo->getRow("select name from ".DB_PREFIX_WEB."category where id={$cid}");
			return $className['name'];
		}else{
			return false;
		}
	}

	/**
	 * 根据栏目cid，得到模型mid
	 */
	function getMid($cid)
	{
		if($cid>0){
			$Mid=$this->pdo->getRow("select mid from ".DB_PREFIX_WEB."category where id={$cid}");
			return $Mid['mid'];
		}else{
			return $cid;
		}
	}

	/**
	 * 根据栏目id，得到模型mid
	 */
	function getMid2($id)
	{
		$sql = "select mid from ".DB_PREFIX_WEB."contentindex where id={$id}";
		$info=$this->pdo->getRow($sql);
		return $info['mid'];
	}

	/**
	 * 根据web_contentindex表中的photo信息,获取该图片的aid
	 */
	function getAid($photo)
	{
		$photo = str_ireplace("_s.", ".", $photo);
		$Aid=$this->pdo->getRow("select aid from web_attach where filepath='{$photo}'");
		if(isset($Aid['aid'])){
			return $Aid['aid'];
		}else{
			return false;
		}
	}

	/**
	 * According to selectid be selectvalue
	 */
	public function getSelectVaule($selectId){
		$selectValue=$this->pdo->getAll("select * from ".DB_PREFIX_WEB."selectvalue where selectid=".$selectId);
		$keyValue=array();
		foreach($selectValue as $item){
			$keyValue[$item['valueid']]=$item['value'];
		}
		return $keyValue;
	}

	/**
	 * add selectvalue
	 */
	public function addSelectVaule($selectId,$selectValue){
		if(!empty($selectValue)){
			$countValue=$this->pdo->getRow("select count(valueid) as cnt from ".DB_PREFIX_WEB."selectvalue where value='".$selectValue."' and selectid=".$selectId);
			if(!$countValue['cnt']){
				$this->pdo->add(array('selectid'=>$selectId,'usetime'=>time(),'value'=>$selectValue), DB_PREFIX_WEB."selectvalue");
			}
		}
	}
	
	 /**
	 * add info to attachindex
	 */
	 public function addAttachindex($aid,$tid,$mid){
		 if($aid==0){
			//$this->pdo->remove("mid='".$mid."' and tid=".$tid,DB_PREFIX_WEB."attachindex");
			$this->pdo->update(array('pic_type'=>'photo'),DB_PREFIX_WEB."attachindex", "mid='".$mid."' and tid=".$tid);
		 }else{
			$this->pdo->update(array('pic_type'=>'photo'),DB_PREFIX_WEB."attachindex", "mid='".$mid."' and tid=".$tid);
			//查询插入的相关图片是否存在 附件关联表中 web_attachindex
			$isInsertSql = "select id,aid from ".DB_PREFIX_WEB."attachindex where mid='{$mid}' and tid={$tid} and aid={$aid}";
			$infoInsert=$this->pdo->getRow($isInsertSql);
			if(isset($infoInsert['id'])){
				$this->pdo->update(array('pic_type'=>'Relevant pictures'),DB_PREFIX_WEB."attachindex", "mid='".$mid."' and tid=".$tid." and aid=".$aid);
			}else{
				$this->pdo->add(array('mid'=>$mid,'tid'=>$tid,'aid'=>$aid,'pic_type'=>'Relevant pictures'),DB_PREFIX_WEB."attachindex");
			}
		 }
	 }

	 /**
	 * 删除attachindex表中的记录信息，同时如果该附件没引用，则删除attach表中信息，清除附件文件
	 */
	 public function delAttach($tid,$mid){
		 $isSql = "select a.*,b.filepath from ".DB_PREFIX_WEB."attachindex as a left join ".DB_PREFIX_WEB."attach as b on a.aid=b.aid where a.mid='{$mid}' and a.tid={$tid}";
		 $info=$this->pdo->getRow($isSql);
		 if(isset($info['id'])){
			//remove
			$this->pdo->remove("id=".$info['id'],DB_PREFIX_WEB."attachindex");
			$isQuote = $this->pdo->getRow('select count(*) as cnt from '.DB_PREFIX_WEB.'attachindex where aid='.$info['aid']);
			if(!$isQuote['cnt']){
				delete_file($info['filepath']);
				delete_file(str_ireplace(".","_s.",$info['filepath']));
				$this->pdo->remove("aid=".$info['aid'],DB_PREFIX_WEB."attach");
			}
		 }
	 }
	
	/****************************内部方法**********************************/
	/**
	 * 处理文件标题样式信息，titlestyle
	 * @param $Data,POST提交数据,array('titlecolor'=>'#fff','titleb'=>1,'titlei'=>1,'titleu'=>0)
	 */
	 private function processTitleStyle($Data){
		//标题处理样式
		$titlestyle='';
		if(!empty($Data['titlecolor']))$titlestyle .= "titlecolor:".$Data['titlecolor'].";";
		if(isset($Data['titleb']))$titlestyle .= "titleb:".$Data['titleb'].";";
		if(isset($Data['titlei']))$titlestyle .= "titlei:".$Data['titlei'].";";//斜体
		if(isset($Data['titleu']))$titlestyle .= "titleu:".$Data['titleu'].";"; //下划线
		return $titlestyle;
	 }

	/**
	 * 根据pid，获取pid的下级分类栏目信息
	 */
	private function getChildCategory($pid){
		if($_SESSION['isadmin']){
			$module_child_sql="select * from web_category where mid>0 and parent_id=".$pid."  order by order_list desc";
		}else{
			//$module_child_sql="select c.* from admin_category as uc left join web_category as c on uc.category_id=c.id where uc.uid=".$_SESSION['userid']." and c.mid>0 and c.parent_id=".$pid."  order by c.order_list desc";
		}
		$result = $this->pdo->getAll($module_child_sql);
		return $result;
	}


	/*****下面两个方法，根据功能来说，应该不属于该类********/
	/**
	 * getall view spot
	 */
	 public function getAllViewSpot($str=''){
		  $keyValue = array();
		  if(!empty($str)){
				$pieces = explode("-->", $str);
				foreach($pieces as $item){
					$box = explode(".", $item);
					$keyValue[]=$box[0];
				}
		  }
		  
		  $all=$this->pdo->getAll("select ct.id,ct.cid,ct.title,c.name from ".DB_PREFIX_WEB."contentindex as ct left join category as c on ct.cid=c.id where ct.mid=2 and cid>0");
		  $allViewSpot=array();
		  $list=array();
		  foreach($all as $key=>$item){
				if(!in_array($item['cid'],$list)){
					$allViewSpot[$item['cid']]['name']=$item['name'];
				}
				if(count($keyValue)){
					if(in_array($item['id'],$keyValue))$item['flag']=1;else $item['flag']=0;
				}
				$allViewSpot[$item['cid']]['child'][]=$item;
		  }
		  return $allViewSpot;
	 }

	/**
	 * explode sightspot,key-value pair(key = value) 
	 * 85.布达拉宫-->89.唐古拉山-->68.纳木措湖
	 */
	 public function explodeSightspot($str){
		 $pieces = explode("-->", $str);
		 $keyValue = array();
		 foreach($pieces as $item){
			$box = explode(".", $item);
			$keyValue[$box[0]]=$box[1];
		 }
		 return $keyValue;
	 }

	public function guid(){
		if (function_exists('com_create_guid')){
			return com_create_guid();
		}else{
			mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
			$charid = strtoupper(md5(uniqid(rand(), true)));
			$hyphen = chr(45);// "-"
			/*
			$uuid = chr(123)// "{"
					.substr($charid, 0, 8).$hyphen
					.substr($charid, 8, 4).$hyphen
					.substr($charid,12, 4).$hyphen
					.substr($charid,16, 4).$hyphen
					.substr($charid,20,12)
					.chr(125);// "}"
			*/
			$uuid = substr($charid, 0, 8)
					.substr($charid, 8, 4)
					.substr($charid,12, 4)
					.substr($charid,16, 4)
					.substr($charid,20,12);
			return $uuid;
		}
	}

}
