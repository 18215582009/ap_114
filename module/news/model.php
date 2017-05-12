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
class newsModel extends Model
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
        $cidstr=implode(",",$this->getChildCids($cid));
        $newsInfo = array();
        //获取资讯版块最新的幻灯三条信息
        $sql = "SELECT * from web_contentindex where cid in ($cidstr) AND digest = 3 ORDER BY postdate DESC limit 3";
        $newsInfo['flash'] = $this->pdo->getAll($sql);
        //获取资讯版块最新推荐，即右边两个图文资讯
        $sql = "SELECT * from web_contentindex where cid in ($cidstr) AND digest = 2 ORDER BY digest DESC limit 2";
        $newsInfo['graphic'] = $this->pdo->getAll($sql);
        //获取最新推荐楼盘
        $sql = "select * from fc_project where flag = 1 ORDER BY live_date DESC limit 3";
        $newsInfo['recom'] = $this->pdo->getAll($sql);

        $where = '';
        if(isset($_GET['name'])){
            $sousuo = $_GET['name'];
            $where = " and a.cid in ($cidstr) AND a.title like '%$sousuo%'";
        }
        if(isset($_GET['houseList'])){
            $houseList = $_GET['houseList'];
            $where = "and a.cid = ".$houseList;
        }
        if($where == ''){$where = " and a.cid in ($cidstr) ORDER BY a.id desc";}
        $page = 0;
        if (isset($_GET['page'])) {
            settype($page, 'integer');
            $page = $_GET['page'];
        }
        if ($page < 1) $page = 1;
        $sql = "select count(*) as sum from web_contentindex as a where a.ifpub=1 ".$where;
        $zongshu = $this->pdo->getAll($sql);
        if($zongshu[0]['sum'] == 0){
            $newsInfo['list'] = "";
            return $newsInfo;
            exit;
        }
        $curpagenum = 10;
        $maxpage = ceil($zongshu[0]['sum'] / $curpagenum);
        $page = $page > $maxpage ? $maxpage : $page;
        $a = ($page - 1) * $curpagenum;
        //获取资讯版块信息
        $sql = "select a.id,a.title,a.postdate,a.photo,a.digest,b.intro,b.author,b.fromsite,c.name from web_contentindex as a left JOIN web_content1 as b on
                 a.id=b.id LEFT JOIN  web_category as c on a.cid=c.id where  a.ifpub=1 ".$where." limit $a,$curpagenum";
        $newsInfo['list'] = $this->pdo->getAll($sql);
        $newsInfo['page'] = $maxpage;

        return $newsInfo;
    }

    public function details(){
        $id = $_GET['id'];
        //资讯详情
        $sql = "select a.id,a.cid as aid,a.title,a.postdate,a.digest,b.intro,b.content,b.author,b.fromsite,c.name,c.id as cid from web_contentindex as a left JOIN web_content1 as b on
                a.id=b.id LEFT JOIN  web_category as c on a.cid=c.id where a.ifpub=1 and a.id = '$id'";
        $detail['zheng'] = $this->pdo->getAll($sql);

        //获取推荐信息,按照推荐级别排序
        $sql = "select ct.id,ct.cid,ct.title,ct.photo,ct.postdate,ct.digest,ctg.name from web_contentindex as ct left join
                web_category as ctg on ct.cid = ctg.id WHERE ct.cid = 161 and ct.ifpub = 1 ORDER BY ct.digest DESC limit 9";
        $detail['tuijian'] = $this->pdo->getAll($sql);

        return $detail;

    }


    public function getChildCids($cid){
        $sql = "select id from web_category where parent_id={$cid}";
        $cidArr = $this->pdo->getAll($sql);
        $cidKey = array();
        foreach ($cidArr as $item){
            $cidKey[] = $item['id'];
        }
        return $cidKey;
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



}

