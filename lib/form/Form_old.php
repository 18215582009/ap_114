<?php
 /**
　* ToHtml
　* @version 1.0 All rights reserved.
　* @author luodong(751450467@qq.com)
  * Created on 2014-12-11
  * Modify on 2014-12-11
　*/
namespace lib\form;

class Form {
	/*form\Form::input('create_uid',$Info['create_uid'],$handle,'创建者',true);*/
	static function input($name='',$val='',$state='show',$title='',$is_sys=false,$class=''){
		$placeholder = explode('-',$title);
		$title = $placeholder[0];
		$helpblock = isset($placeholder[1])?$placeholder[1]:'';
		$disable = '';
		if($state=='show')$disable = 'disabled="disabled"';
		$element = '<div class="form-group">';
		$element .= '	<label class="control-label" for="'.$name.'">'.$title.'</label>';
		$element .= '	<input type="text" class="form-control '.$class.'" id="'.$name.'" name="'.$name.'" value="'.$val.'" placeholder="请输入'.$title.'" '.$disable.' />';
		if(!empty($helpblock))$element .= '	<p class="help-block">'.$helpblock.'</p>';
		$element .= '</div>';
		echo $element;
	}

	static function textarea($name='',$val='',$state='show',$title='',$row=3){
		$element = '<div class="form-group">';
		$element .= '<label class="control-label" for="'.$name.'">'.$title.'</label>';
        $element .= '<textarea class="form-control" placeholder="请填写'.$title.'..." rows="'.$row.'" id="'.$name.'" name="'.$name.'" >'.$val.'</textarea>';
		$element .= '</div>';
		echo $element;
	}

	static function radio($name='',$arr=array(),$selected,$state='show',$title=''){
		echo '<div class="form-group">';
		echo '	<label class="control-label" for="'.$name.'">'.$title.'</label>';
        echo '	<div class="radio">';
		foreach($arr as $key=>$val){
			$id = "id=".$name."_".$key;
			$checked = '';
			if($key==$selected)$checked = ' checked="checked"';
			$disable = '';
			if($state=='show')$disable = ' disabled="disabled"';
			echo '	<input name="'.$name.'" '.$id.' type="radio" value="'.$key.'" '.$checked.$disable.'  /> '.$val.' &nbsp;&nbsp;';
		}
		echo '	</div>';
		echo '</div>';
	}

	static function select($name='',$arr=array(),$selected='',$state='show',$title='',$class=''){
		$disable = '';
		if($state=='show')$disable = 'disabled="disabled"';
		echo '<div class="form-group">';
		echo '	<label class="control-label" for="'.$name.'">'.$title.'</label>';
		//echo '	<div class="input-group">';
        echo '	<select class="form-control '.$class.'" name="'.$name.'" id="'.$name.'" '.$disable.'>';
		echo '		<option value="0">-- 请选择 --</option>';
		foreach($arr as $key=>$val){
			$select = '';
			if($key==$selected)$select = ' selected="selected"';
			echo '		<option value="'.$key.'"' .$select.'>'.$val.'</option>';
		}
		echo '	</select>';
		//echo '	</div>';
		echo '</div>';
	}

	static function select_multiple($name='',$arr=array(),$selected,$state='show',$title='',$class=''){
		$disable = '';
		$selecteds = array();
		if(is_array($selected)){
			$selecteds = $selected;
		}else{
			$selecteds = explode(',',$selected);
		}
		if($state=='show')$disable = 'disabled="disabled"';
		echo '<div class="form-group">';
		echo '	<label class="control-label" for="'.$name.'">'.$title.'</label>';
		//echo '	<div class="input-group">';
        echo '	<select multiple="multiple" class="selectpicker form-control '.$class.'" name="'.$name.'" id="'.$name.'" '.$disable.'>';
		echo '		<option value="0">-- 请选择 --</option>';
		if(is_array($arr) && !empty($arr)){  
		foreach($arr as $key=>$val){ 
			$isselect = '';
			foreach($selecteds as $i){
				if(in_array($key,$selecteds)){
					$isselect = ' selected="selected"';
				}
			}
			echo '		<option value="'.$key.'"' .$isselect.'>'.$val.'</option>';
		}
		}
		echo '	</select>';
		//echo '	</div>';
		echo '</div>';
	}

	static function input_time($name='',$val='',$state='show',$title='',$is_sys=false,$class=''){
		$disable = '';
		if($state=='show')$disable = 'disabled="disabled"';
		echo '<div class="form-group">
				<label class="control-label" for="'.$name.'">'.$title.'</label>
				<input type="text" class="form-control '.$class.'" id="'.$name.'" name="'.$name.'" value="'.date('Y-m-d',empty($val)?time():$val).'" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" '.$disable.' />														
			</div>';
	}

	
	/*************** 功能按钮组、导航条*******************/

	/* 普通窗口（查看、编辑、修改）页面 按钮组 */
	static function btn_main($param=array(),$state='',$style=1){
		// style 1
		/*<div class="text-right pal">
			<button class="btn btn-success" type="submit">Submit</button>
			&nbsp;
			<button class="btn btn-default" type="button">Cancel</button>
		/*</div>

		// style 2
		/*<ul style="padding-top:9px;" class="list-unstyled">	
			<li> 
			<a id="edit" class="btn btn-info" href="/admin_wkf/editWkf?id=13">编辑</a>&nbsp;或&nbsp; 
			<a id="show" href="/admin_wkf/index">关闭</a>	
			</li>
		</ul>
		*/

		$butStr = '';
		$but1 = '';
		$but2 = '';
		$cancelStyle = '';
		$okStyle = ' class="btn btn-info" ';
		if($style==1){
			$butStr = '<div class="text-right ptm">';
		}else{
			$butStr = '<div class="text-right pal">';
			$cancelStyle = ' class="btn btn-default" ';
			$okStyle = ' class="btn btn-success" ';
		}
		switch($state){
			case 'show':
				$but1 = ' <a href="'.$param['edit'].'?id='.$_GET["id"].'" class="btn btn-info" id="edit">编辑</a>';
				$but2 = ' <a href="'.$param['list'].'" '.$cancelStyle.' id="show">关闭</a>';
				break;
			case 'edit':
				if(strpos($_SERVER['HTTP_REFERER'],'save')!==false) {//包含
					$but1 =  ' <button'.$okStyle.'type="button" id="save" onclick="$(\'#'.$param['form'].'\').submit();">保存</button>';
					$but2 =  ' <a href="'.$param['list'].'" '.$cancelStyle.' id="show">关闭</a>';
				}else{
					$but1 =  ' <button'.$okStyle.'type="button" id="save" onclick="$(\'#'.$param['form'].'\').submit();">保存</button>';
					$but2 =  ' <a href="'.$_SERVER['HTTP_REFERER'].'" '.$cancelStyle.' id="show">取消</a>';
				}
				break;
			default:
				$but1 =  ' <button'.$okStyle.'type="button" id="save" onclick="$(\'#'.$param['form'].'\').submit();">保存</button>';
				$but2 =  ' <a href="'.$param['list'].'"'.$cancelStyle.'id="show">取消</a>';
				break;
		}
		if($style==1){
			$butStr .= $but1.'&nbsp;或&nbsp;'.$but2;
		}else{
			$butStr .= $but2.'&nbsp;或&nbsp;'.$but1;
		}
		$butStr .= '</div>';
		echo $butStr;
	}

	/* 弹出窗口（查看、编辑、修改）页面 按钮组 */
	static function btn_alert($param,$state,$pstate=''){
		echo '<ul class="list-unstyled" style="padding-top:9px;">';
		echo '<li>';
		if(is_array($param)){
			$module = $param['edit'];
			$form = $param['form'];
		}else{
			$module = 'edit'.$param;
			$form = 'opform';
		}
		switch($state){
			case 'show':
				if($pstate=='show'){
					echo ' <a href="javascript:void(0)" onclick="art.dialog.close();" id="show">关闭</a>';
				}else{
					echo ' <a href="'.$module.'?id='.$_GET["id"].'" class="btn btn-info" id="edit">编辑</a>&nbsp;或&nbsp;';
					echo ' <a href="javascript:void(0)" onclick="art.dialog.close();" id="show">关闭</a>';
				}
				break;
			case 'edit':
				if(strpos($_SERVER['HTTP_REFERER'],'save')!==false) {//包含
					echo ' <button class="btn btn-info" type="button" id="save" onclick="$(\'#'.$form.'\').submit();">保存</button>&nbsp;或&nbsp;';
					echo ' <a href="javascript:void(0)" onclick="art.dialog.close();" id="show">关闭</a>';
				}else{
					echo ' <button class="btn btn-info" type="button" id="save" onclick="$(\'#'.$form.'\').submit();">保存</button>&nbsp;或&nbsp;';
					if($pstate=='edit'){
						echo ' <a href="javascript:void(0)" onclick="art.dialog.close();" id="show">取消</a>';
					}else{
						echo ' <a href="'.$_SERVER['HTTP_REFERER'].'" id="show">取消</a>';
					}
				}
				break;
			default:
				echo ' <button class="btn btn-info" type="button" id="save" onclick="$(\'#'.$form.'\').submit();">保存</button>&nbsp;或&nbsp;';
				echo ' <a href="javascript:void(0)" onclick="art.dialog.close();" id="show">取消</a>';
				break;
		}
		echo '</li>';
		echo '</ul>';
	}

	/* 列表页面 工具条 */
	static function toolbar_list($method,$search=array()){
		echo '<div class="btn-toolbar mtm mbm ">';
		echo '	<a class="btn btn-default" href="'.$method.'" id="newAdd">新建</a>';

		echo '	<div class="btn-group">
					<button type="button" class="btn btn-default">更多</button>
					<button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<ul role="menu" class="dropdown-menu">
						<li><a href="javascript:;" onClick="listOrder()">排序</a></li>
						<li><a href="javascript:;" onClick="listDel()">删除</a></li>
						<li class="divider"></li>
						<li><a href="javascript:;" onClick="listExport()">导出</a></li>
						<li><a href="javascript:;" onClick="listPrint()">打印</a></li>
					</ul>
				</div>';
		echo '<div class="input-group pull-right">';
		echo '	<form method="get" id="opform">';
		echo '		<ul class="list-group mail-action list-unstyled list-inline" style="margin-bottom:0;float:left">';
		echo '			<li>';
		echo '				<div class="input-group">';
		foreach($search as $key=>$val){
		echo '				<input type="text" name="'.$key.'" class="form-control pull-left" id="code_name" value="'.$val.'" placeholder="请输关键字" />';
		}
		echo '					<div class="input-group-btn">';
		echo '						<button  type="submit" class="btn btn-info">搜索</button>';
		echo '					</div>';
		echo '				</div>';
		echo '			</li>';
		echo '		</ul>';
		echo '	</form>';
		echo '</div>';
		echo '</div>';
	}

	/* breadcrumb导航条1 */
	static function bread_crumb($page_title,$moduleName,$navlist=array()){
		echo '<div class="page-title-breadcrumb">';
		echo '	<div class="page-header pull-left">';
		echo '		<div class="page-title">'.$page_title.'</div>';
		echo '	</div>';
		echo '	<ol class="breadcrumb page-breadcrumb hidden-xs">';
		echo '		<li><i class="fa fa-home"></i>&nbsp;<a href="/admin_entry/desktop">管理中心</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>';
		foreach($navlist as $key=>$val){
		echo '		<li><a href="/'.$moduleName.'/'.$val['method'].'">'.$val['name'].'</a>&nbsp;&nbsp;</li>';
		}
		echo'	</ol>';
		echo '</div>';
	}

	/* breadcrumb导航条2 */
	static function bread_crumb2($page_title,$moduleName,$navlist=array()){
		echo '<div class="caption">';
		echo '	<i class="fa fa-home"></i>&nbsp;<a href="/admin_entry/desktop">管理中心</a>&nbsp;';
		echo '	<i class="fa fa-angle-right"></i>&nbsp;<a href="/'.$moduleName.'/index">'.$page_title.'</a>&nbsp;';
		foreach($navlist as $key=>$val){
			echo '		<i class="fa fa-angle-right"></i>&nbsp;<a href="/'.$moduleName.'/'.$val['method'].'">s'.$val['name'].'</a>&nbsp;';
		}
		echo '</div>';
	}

	/**************** 其他显示组建 *********************/
	static function lable($name,$state,$type='span',$class='sm'){
		$stateStr = 'success';
		switch($state){
			case '0':
				$stateStr = 'default';
				break;
			case '1':
				$stateStr = 'success';
				break;
			case '2':
				$stateStr = 'info';
				break;
			case '3':
				$stateStr = 'warning';
				break;
			default:
				$stateStr = 'danger';
				break;
		}
		echo $lable = '<'.$type.' class="label label-'.$class.' label-'.$stateStr.'">'.$name.'</'.$type.'>';
	}

}