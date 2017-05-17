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

class fc_project_reserveModel extends Model
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

	public function tabbar($state='base',$project_id){
		$tabbale = '<ul class="nav nav-tabs">';
        $lilist = array(
            'base'   =>array('url'=>'edit?project_id=','icon'=>'','title'=>'编辑项目')
        );
        //判断该项目是否存在物业类型
  //       $sql = "select pm_type from fc_project where id=".$project_id;
  //       $pmType = $this->pdo->getRow($sql);
  //       $_pmTypes = explode(',',$pmType['pm_type']);
  //       if(count($_pmTypes)>0) {
  //           foreach ($_pmTypes as $k => $v) {
  //               switch($v){
  //                   case '22301'://别墅
  //                       $lilist['villa']=array('url'=>'editPmType?pm_type='.$v.'&project_id=','icon'=>'fa fa-bullhorn mrs','title'=>'别墅');
  //                       break;
  //                   case '22304'://商业
  //                       $lilist['business']=array('url'=>'editPmType?pm_type='.$v.'&project_id=','icon'=>'fa fa-bullhorn mrs','title'=>'商业');
  //                       break;
  //                   case '22305'://写字楼
  //                       $lilist['office']=array('url'=>'editPmType?pm_type='.$v.'&project_id=','icon'=>'fa fa-bullhorn mrs','title'=>'写字楼');
  //                       break;
  //                   default:
  //                       $lilist['house']=array('url'=>'editPmType?pm_type='.$v.'&project_id=','icon'=>'fa fa-bullhorn mrs','title'=>'住宅');
  //                       break;
  //               }
  //           }
  //       }
  //       $lilist['dynamic']=array('url'=>'listDynamic?project_id=','icon'=>'fa fa-bullhorn mrs','title'=>'动态');
		// $lilist['price']=array('url'=>'listPrice?project_id=','icon'=>'fa fa-cny mrs','title'=>'价格');
		// $lilist['huxing']=array('url'=>'listHuxing?project_id=','icon'=>'fa fa-home mrs','title'=>'户型');
		// $lilist['pic']=array('url'=>'listPic?project_id=','icon'=>'fa fa-picture-o mrs','title'=>'图库');
		// $lilist['housetable']=array('url'=>'listHouse?project_id=','icon'=>'fa fa-th mrs','title'=>'楼盘表');

		foreach($lilist as $key=>$val){
			$icon = '';
			if(empty($val['icon']))$icon = '<i class="'.$val['icon'].'"></i>';
			if($key==$state){
				$tabbale.= '<li class="active"><a href="javascript:void(0);">'.$icon.$val['title'].'</a></li>';
			}else{
				$tabbale.= '<li><a href="'.$val['url'].$project_id.'">'.$icon.$val['title'].'</a></li>';
			}
		}
		/*
		switch($state){
			case 'dynamic':
				$tabbale .='<div class="action-group btn-group pull-right mtm mbm">
						<button class="btn btn-success mrm"><i class="fa fa-upload mrs"></i>Upload
						</button>
						<button class="btn btn-default"><i class="fa fa-trash-o mrs"></i>Delete
						</button>
					</div>';
				break;
			case 'price':
				break;
			case 'huxing':
				$tabbale .='<div class="action-group btn-group pull-right mtm mbm">
						<button class="btn btn-success mrm"><i class="fa fa-upload mrs"></i>Upload
						</button>
						<button class="btn btn-default"><i class="fa fa-trash-o mrs"></i>Delete
						</button>
					</div>';
				break;
			case 'pic':
				break;
			case 'house':
				break;
			default:
				break;
		}
		*/
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
