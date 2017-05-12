<?php
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
class index extends Control
{
    /* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
//      //连接本地的 Redis 服务
//      $redis = new Redis();
//      $redis->connect('127.0.0.1', 6379);
//      echo "Connection to server sucessfully";exit;
//      //查看服务是否运行
//      echo "Server is running: "+ $redis->ping();
//      exit;
    }

    public function api($value='')
    {
        $arrayName = array('id' => 1, 'name' => "luodong");
        return $arrayName;
    }

    /* 首页 */
    public function index()
    {
        //获取新闻资讯
        $index = $this->index->recom();
        $this->assign('recom',$index);
        $this->display('index','index');
    }


    /* 首页1 */
    public function index1()
    {
        echo $tpl = isset($_GET['tpl'])?$_GET['tpl']:'';
        switch ($tpl){
            case 1:
                $tpl = '_2016_11_7';
                break;
            case 2:
                $tpl = "_2016_12_17";
                break;
            case 3:
                $tpl = "_2016_12_21";
                break;
            case 4:
                $tpl = "_2016_12_22";
                break;
            case 5:
                $tpl = "_2016-10-14";
                break;
            case 6:
                $tpl = "_agency";
                break;
            case 7:
                $tpl = "_李颖";
                break;
            default:
                $tpl = '_new';
        }
        $this->display('index','index'.$tpl);
    }

}

