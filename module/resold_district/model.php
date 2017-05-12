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

class resold_districtModel extends Model
{
	/**
	 * pdo连接。
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

    public function tabbar($state='base',$resold_sale){
        $tabbale = '<ul class="nav nav-tabs">';
        $lilist = array(
            'base'   =>array('url'=>'edit?resold_district=','icon'=>'','title'=>'项目信息')
        );
        //$lilist['pic']=array('url'=>'listPic?resold_district=','icon'=>'fa fa-picture-o mrs','title'=>'图库');
    
        foreach($lilist as $key=>$val){
            $icon = '';
            if(empty($val['icon']))$icon = '<i class="'.$val['icon'].'"></i>';
            if($key==$state){
                $tabbale.= '<li class="active"><a href="javascript:void(0);">'.$icon.$val['title'].'</a></li>';
            }else{
                $tabbale.= '<li><a href="'.$val['url'].$resold_sale.'">'.$icon.$val['title'].'</a></li>';
            }
        }
        $tabbale .= '</ul>';

        return $tabbale;
    }

 



    function stat()
    {
        return get_included_files();
    }

}
