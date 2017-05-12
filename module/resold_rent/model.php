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

class resold_rentModel extends Model
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
            'base'   =>array('url'=>'edit?resold_sale=','icon'=>'','title'=>'项目信息')
        );
        $lilist['pic']=array('url'=>'listPic?resold_sale=','icon'=>'fa fa-picture-o mrs','title'=>'图库');
    
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

 



    function tranHuxing($ting='',$shi='',$type=1){
        $shiStr = '';
        $tingStr = '';
        switch($shi){
            case '1':
                $shiStr ='一室';
                break;
            case '2':
                $shiStr ='二室';
                break;
            case '3':
                $shiStr ='三室';
                break;
            case '4':
                $shiStr ='四室';
                break;
            case '5':
                $shiStr ='五室以上';
                break;
            default:
                $shiStr ='五室以上';
                break;
        }
        switch($ting){
            case '1':
                $tingStr = '一厅';
                break;
            case '2':
                $tingStr = '二厅';
                break;
            case '3':
                $tingStr = '三厅';
                break;
            case '4':
                $tingStr = '四厅';
                break;
            default:
                $tingStr = '四厅以上';
                break;
        }
        $huxing = $shiStr.$tingStr;
        return $huxing;
    }

    public function refreshPrice($project_id,$pm_type,$ave_price){
        $table = $this->getPmTypeTable($pm_type);
        //echo 'update fc_project set red_'.$table.'_price_average='.$ave_price.' where id='.$project_id;exit;
        $rlt = $this->pdo->doSql('update fc_project set red_'.$table.'_price_average='.$ave_price.' where id='.$project_id);
        return $rlt;
    }

    public function getPmTypeTable($pm_type){
        $table = 'house';
        switch($pm_type){
            case '22301'://别墅
                $table ='villa';
                break;
            case '22304'://商业
                $table ='business';
                break;
            case '22305'://写字楼
                $table ='office';
                break;
            default:
                $table ='house';
                break;
        }
        return $table;
    }

    function stat()
    {
        return get_included_files();
    }

}
