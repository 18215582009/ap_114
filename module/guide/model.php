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
class guideModel extends Model
{
	/**
	 * ado连接。
	 * 
	 * @var object
	 * @access pdo
	 */
	public $pdo;

    public function __construct()
    {
        parent::__construct();
		$this->pdo = new DbPdo();
    }

    public function test(){
        return array('hello world!');
    }

    public function newsAll(){
        $type = isset($_GET['type'])?$_GET['type']:'info';
        $cid = 119;
        switch ($type){
            case "info":
                $cid = 119;
                break;
            case "policy":
                $cid = 246;
                break;
            case "guide":
                $cid = 202;
                break;
            default:
                break;
        }
        $newsInfo = array();
        //获取资讯版块最新的幻灯三条信息
        $sql = "select * from web_contentindex where ifpub=1 and digest=3";
        $newsInfo['flash'] = $this->pdo->getAll($sql);
        //获取资讯版块最新推荐，即右边两个图文资讯
        $sql = "select * from web_contentindex where ifpub=1 and digest=2";
        $newsInfo['graphic'] = $this->pdo->getAll($sql);
        //获取最新推荐楼盘
        $sql = "select * from fc_project where flag=1 order by id desc limit 3";
        $newsInfo['recom'] = $this->pdo->getAll($sql);
        foreach ($newsInfo['recom'] as $key=>$item){
            $sql = "select b.url from fc_project_pic as a LEFT JOIN fc_project_attach as b on a.attach_id=b.id where a.project_id={$item['id']} and a.code=21002 order by a.id desc limit 1";
            $pic = $this->pdo->getRow($sql);
            $newsInfo['recom'][$key]['pic'] = $pic['url'];
        }
        //获取资讯版块信息
        $cidstr=implode(",",$this->getChildCids($cid));
        $sql = "select a.id,a.title,a.postdate,a.digest,b.intro,b.author,b.fromsite,c.name from web_contentindex as a left JOIN web_content1 as b on a.id=b.id LEFT JOIN  web_category as c on a.cid=c.id where a.ifpub=1 and cid in ($cidstr) order by a.id desc limit 6";
        $newsInfo['list'] = $this->pdo->getAll($sql);
        return $newsInfo;
    }



    public function pmType($pm_type){
        $pm_type = explode(",",$pm_type);
        $pm_type_str = '';
        foreach ($pm_type as $item){
            if($item!='0')$pm_type_str .= $this->config->pm_type_option[$item]." ";
        }
        $pm_type_str = substr($pm_type_str,0,-1);
        return $pm_type_str;
    }

    public function index(){

        $index = array();

        $cidstr=$this->getChildCids();
        $class_a=implode(",",$cidstr['class_a']);
        $class_b=implode(",",$cidstr['class_b']);


        $sql = "SELECT id,name,parent_id from web_category where parent_id = 202 AND flag = 1 AND type = 1";
        $index['cg1'] = $this->pdo->getAll($sql);

        //获取所有类别
        $sql = "SELECT id,name,parent_id,description from web_category where flag = 1 AND type = 1 AND id in ($class_b)";
        $index['cg2'] = $this->pdo->getAll($sql);


        //获取指南下所有类别的信息
        $sql = "SELECT ct.id,ct.cid,ct.title,ct1.intro,ct.relatedcid from web_contentindex as ct LEFT JOIN web_content1 as ct1
                on ct.id = ct1.id where ct.cid in (202,$class_a,$class_b) AND ct.ifpub = 1  AND ct.cid != '-1'";
        $index['cg3'] = $this->pdo->getAll($sql);

        //获取推荐信息,按照推荐级别排序
        $sql = "SELECT ct.id,ct.title,ct.photo,ct1.intro from web_contentindex as ct LEFT JOIN web_content1 as ct1 on ct.id = ct1.id where ct.digest = 3 AND
                 ct.cid in (202,$class_a,$class_b) AND ct.ifpub = 1 AND ct.cid != '-1' GROUP BY ct.id limit 3";
        $index['ct'] = $this->pdo->getAll($sql);
        //获取推荐信息,按照发布时间排序
        $sql = "SELECT ct.id,ct.title,ct.photo,ct1.intro from web_contentindex as ct LEFT JOIN web_content1 as ct1 on ct.id = ct1.id where ct.digest = 2 AND
                 ct.cid in (202,$class_a,$class_b) AND ct.ifpub = 1 AND ct.cid != '-1' GROUP BY ct.id ORDER BY ct.postdate DESC limit 3";
        $index['ct2'] = $this->pdo->getAll($sql);

        return $index;

    }

    public function baike(){

        $bkarr = array();
        $where = "";
        if(isset($_GET['baike'])){
            $bkid = $_GET['baike'];
            //判断是否存在二级目录
            $sql = "select id,name,parent_id from web_category where id = {$bkid}";
            $bkarr['baike1'] = $this->pdo->getAll($sql);
            if($bkarr['baike1'][0]['parent_id'] == 202){
                //获取需要查询的所有类型id
                $sql = "SELECT id,name from web_category where parent_id = {$bkid}";
                $bkarr['type'] = $this->pdo->getAll($sql);
                foreach($bkarr['type'] as $info){
                    $sum[] = $info['id'];
                }
                $type_id=implode(",",$sum);
                $where .= "and ct.cid in ($bkid,$type_id)";
            }
            if($bkarr['baike1'][0]['parent_id'] != 202){
                //获取上上级百科目录名称
                $sql = "select id,name from web_category where id = {$bkarr['baike1'][0]['parent_id']}";
                $bkarr['baike2'] = $this->pdo->getAll($sql);
                $where .= "and (ct.cid = '$bkid')";
            }
        }
        if(isset($_GET['name'])){$name = $_GET['name'];
            $cidstr=$this->getChildCids();
            $class_a=implode(",",$cidstr['class_a']);
            $class_b=implode(",",$cidstr['class_b']);
            $where = "and ct.title like '%$name%' and ct.cid in (202,$class_a,$class_b)";
        }

        //进行数据分页
        $bkarr['page']=1;
        if(isset($_GET['page'])){
            settype($_GET['page'], 'integer');
            $bkarr['page']=$_GET['page'];
        }
        if($bkarr['page']<1) $bkarr['page']=1;
        $shuliang = "select count(*) as sum from web_contentindex as ct where ct.ifpub=1 ".$where."";
        $zong = $this->pdo->getAll($shuliang);

        $zongshu = $zong[0]['sum'];
        if($zongshu == 0){
            $bkarr['baike'] = "";
            return $bkarr;
            exit;
        }
        $curpagenum=10;
        $maxpage=ceil($zongshu/$curpagenum);
        $bkarr['page'] = $bkarr['page']>$maxpage?$maxpage:$bkarr['page'];
        $a= ($bkarr['page']-1)*$curpagenum;
        //获取百科分类信息
        $sql = "select ct.id,ct.cid,ct.ifpub,ct.title,ct.photo,ct.postdate,ct1.intro,ct1.author,ct1.fromsite,ctg.name from web_contentindex
                 as ct LEFT JOIN web_content1 as ct1 on ct.id = ct1.id LEFT JOIN web_category as ctg on ct.cid = ctg.id where
                  ct.ifpub=1 ".$where." limit $a, $curpagenum";
        $bkarr['baike'] = $this->pdo->getAll($sql);
        $bkarr['page'] = $maxpage;

        return $bkarr;
    }

    public function neir(){
        $id = $_GET['wid'];

        $neir = array();
        //获取单个百科信息
        $sql = "select ct.id,ct.cid,ct.title,ct.postdate,ct1.content,ct1.intro,ct1.author,ct1.fromsite,cg.id as cgid,cg.name,cg.parent_id FROM web_contentindex as
        ct LEFT JOIN web_content1 as ct1 on ct.id = ct1.id LEFT JOIN web_category as cg on ct.cid = cg.id where ct.id = {$id} GROUP BY ct.id";

        $neir['neir'] = $this->pdo->getAll($sql);

        //获取上级百科目录名称
        $sql = "select id,name,parent_id from web_category where id = {$neir['neir'][0]['cid']}";
        $neir['baike1'] = $this->pdo->getAll($sql);
        if($neir['baike1'][0]['parent_id'] != 202){
            $sql = "select id,name,parent_id from web_category where id = {$neir['baike1'][0]['parent_id']}";
            $neir['baike2'] = $this->pdo->getAll($sql);
        }

        return $neir;
    }

    public function getChildCids(){
        $sql = "select id from web_category where parent_id=202 AND flag = 1 AND type = 1";
        $cidArr = $this->pdo->getAll($sql);
        $cidKey = array();
        foreach ($cidArr as $item){
            $cidKey['class_a'][] = $item['id'];
        }
        $class_a = implode(",",$cidKey['class_a']);

        $sql = "select id from web_category where flag = 1 AND type = 1 AND parent_id in ($class_a)";

        $cidBrr = $this->pdo->getAll($sql);
        foreach ($cidBrr as $item){
            $cidKey['class_b'][] = $item['id'];
        }

        return $cidKey;
    }
}

