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
    /**
     * 元素布局方式
     *
     * @var string
     * horizontal水平布局，vertical垂直布局
     */
    static public $layout='horizontal';

    // 获得公用cssmin
    static function cssmin($links=array()){
        echo "<link rel=\"stylesheet\" href=\"/css/fonts/open_sans.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/css/mtek_font-awesome.min.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/css/mtek_simple-line-icons.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/bootstrap/css/bootstrap.min.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/css/animate.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/iCheck/skins/all.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/bootstrap-switch/css/bootstrap-switch.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"\" id=\"font-layout\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/css/mtek_core.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/css/mtek_system.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/css/mtek_system-responsive.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/css/mtek_self.css\" type=\"text/css\">\n";
    }

    // 获得公用css
    static function css($links=array()){
        echo "<link rel=\"stylesheet\" href=\"/css/fonts/open_sans.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/css/mtek_font-awesome.min.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/css/mtek_simple-line-icons.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/bootstrap/css/bootstrap.min.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/css/animate.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"\" id=\"font-layout\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/iCheck/skins/all.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/select2/select2-custom.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/bootstrap-select/bootstrap-select.min.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/multi-select/css/multi-select-madmin.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/bootstrap-datepicker/datepicker.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/bootstrap-daterangepicker/daterangepicker-bs3.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/bootstrap-table/src/bootstrap-table.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/js/vendor/jquery-toastr/toastr.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/css/mtek_core.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/css/mtek_system.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/css/mtek_system-responsive.css\" type=\"text/css\">\n";
        //echo "<link rel=\"stylesheet\" href=\"/css/mtek_form.css\" type=\"text/css\">\n";
        echo "<link rel=\"stylesheet\" href=\"/css/mtek_self.css\" type=\"text/css\">\n";
    }

    // 获得公用jsmin
    static function jsmin($scripts=array()){
        echo "<script src=\"/js/jquery.min.js\"></script>\n";
        echo "<script src=\"/js/jquery-migrate-1.2.1.min.js\"></script>\n";
        echo "<script src=\"/js/jquery-ui.js\"></script>\n";
        echo "<script src=\"/js/vendor/bootstrap/js/bootstrap.min.js\"></script>\n";
        echo "<script src=\"/js/vendor/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js\"></script>\n";
        echo "<script src=\"/js/html5shiv.js\"></script>";
        echo "<script src=\"/js/respond.min.js\"></script>\n";
        echo "<script src=\"/js/vendor/metisMenu/jquery.metisMenu.js\"></script>\n";
        echo "<script src=\"/js/vendor/slimScroll/jquery.slimscroll.js\"></script>\n";
        echo "<script src=\"/js/vendor/iCheck/icheck.min.js\"></script>\n";
        echo "<script src=\"/js/vendor/iCheck/custom.min.js\"></script>\n";
        echo "<script src=\"/js/vendor/bootstrap-switch/js/bootstrap-switch.min.js\"></script>\n";
        echo "<script src=\"/js/jquery.cookie.js\"></script>\n";
        echo "<script src=\"/js/jquery.pulsate.js\"></script>\n";

        echo "<!--LOADING SCRIPTS FOR PAGE-->\n";
        foreach ($scripts as $item){
            echo "<script src=\"".$item."\"></script>\n";
        }
        echo "<!--CORE JAVASCRIPT-->\n";
        echo "<script src=\"/js/mtek_core.js\"></script>\n";
        echo "<script src=\"/js/mtek_system-layout.js\"></script>\n";
        echo "<script src=\"/js/mtek_jquery-responsive.js\"></script>\n";
    }

    // 获得公用js
    static function js($scripts=array()){
        echo "<script src=\"/js/jquery.min.js\"></script>\n";
        echo "<script src=\"/js/jquery-migrate-1.2.1.min.js\"></script>\n";
        echo "<script src=\"/js/jquery-ui.js\"></script>\n";
        //echo "<script src=\"/js/jquery.nicescroll.js\"></script>\n";
        echo "<script src=\"/js/vendor/bootstrap/js/bootstrap.min.js\"></script>\n";
        echo "<script src=\"/js/vendor/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js\"></script>\n";
        echo "<script src=\"/js/html5shiv.js\"></script>";
        echo "<script src=\"/js/respond.min.js\"></script>\n";
        echo "<script src=\"/js/vendor/metisMenu/jquery.metisMenu.js\"></script>\n";
        echo "<script src=\"/js/vendor/slimScroll/jquery.slimscroll.js\"></script>\n";
        echo "<script src=\"/js/vendor/iCheck/icheck.min.js\"></script>\n";
        echo "<script src=\"/js/vendor/iCheck/custom.min.js\"></script>\n";
        echo "<script src=\"/js/vendor/bootstrap-switch/js/bootstrap-switch.min.js\"></script>\n";
        echo "<script src=\"/js/jquery.cookie.js\"></script>\n";
        echo "<script src=\"/js/jquery.pulsate.js\"></script>\n";

        echo "<!--LOADING SCRIPTS FOR PAGE-->\n";
        echo "<script src=\"/js/vendor/select2/select2.min.js\"></script>\n";
        echo "<script src=\"/js/vendor/bootstrap-select/bootstrap-select.min.js\"></script>\n";
        echo "<script src=\"/js/vendor/multi-select/js/jquery.multi-select.js\"></script>\n";
        echo "<script src=\"/js/vendor/bootstrap-datepicker/bootstrap-datepicker.js\"></script>\n";
        //echo "<script src=\"/js/vendor/bootstrap-daterangepicker/daterangepicker.js\"></script>\n";
        //echo "<script src=\"/js/vendor/bootstrap-daterangepicker/moment.js\"></script>\n";
        //echo "<script src=\"/js/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js\"></script>\n";
        //echo "<script src=\"/js/vendor/bootstrap-timepicker/bootstrap-timepicker.js\"></script>\n";
        echo "<script src=\"/js/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js\"></script>\n";
        echo "<script src=\"/js/vendor/bootstrap-table/src/bootstrap-table.js\"></script>\n";
        echo "<script src=\"/js/vendor/bootstrap-table/src/locale/bootstrap-table-zh-CN.js\"></script>\n";
        echo "<script src=\"/js/vendor/jquery-toastr/toastr.js\"></script>\n";
        echo "<script src=\"/js/vendor/bootstrap-table/src/extensions/toolbar/bootstrap-table-toolbar.js\"></script>\n";
        echo "<script src=\"/js/plugins/artDialog/artDialog.source.js?skin=default\"></script>\n";
        echo "<script src=\"/js/plugins/artDialog/plugins/iframeTools.js\"></script>\n";
        foreach ($scripts as $item){
            echo "<script src=\"".$item."\"></script>\n";
        }
        echo "<!--CORE JAVASCRIPT-->\n";
        echo "<script src=\"/js/mtek_core.js\"></script>\n";
        echo "<script src=\"/js/mtek_system-layout.js\"></script>\n";
        echo "<script src=\"/js/mtek_jquery-responsive.js\"></script>\n";
    }

	/*form\Form::input('create_uid',$Info['create_uid'],$handle,'创建者',true);*/
	static function input($name='',$val='',$state='show',$title='',$col=3,$class=''){
		$placeholder = explode('-',$title);
		$title = $placeholder[0];
		$helpblock = isset($placeholder[1])?$placeholder[1]:'';
		$disable = '';
		if($state=='show')$disable = 'disabled="disabled"';
		$element = '<div class="form-group">';
        if(self::$layout=='horizontal') {
            $collast = 12-$col;
            $element .= '	<label class="control-label col-md-'.$col.'" for="' . $name . '">' . $title . '</label>';
            $element .= '	<div class="col-md-'.$collast.'"><input type="text" class="form-control ' . $class . '" id="' . $name . '" name="' . $name . '" value="' . $val . '" placeholder="请输入' . $title . '" ' . $disable . ' /></div>';
        }else{
            $element .= '	<label class="control-label" for="' . $name . '">' . $title . '</label>';
            $element .= '	<input type="text" class="form-control ' . $class . '" id="' . $name . '" name="' . $name . '" value="' . $val . '" placeholder="请输入' . $title . '" ' . $disable . ' />';
        }
		if(!empty($helpblock))$element .= '	<p class="help-block">'.$helpblock.'</p>';
		$element .= '</div>';
		echo $element;
	}

	static function textarea($name='',$val='',$state='show',$title='',$col=3,$row=3){
        $disable = '';
        if($state=='show')$disable = 'disabled="disabled"';
		$element = '<div class="form-group">';
        if(self::$layout=='horizontal') {
            $collast = 12-$col;
            $element .= '<label class="control-label col-md-'.$col.'" for="' . $name . '">' . $title . '</label>';
            $element .= '<div class="col-md-'.$collast.'"><textarea class="form-control" placeholder="请填写' . $title . '..." rows="' . $row . '" id="' . $name . '" name="' . $name . '" '.$disable.'>' . $val . '</textarea></div>';
        }else{
            $element .= '<label class="control-label" for="' . $name . '">' . $title . '</label>';
            $element .= '<textarea class="form-control" placeholder="请填写' . $title . '..." rows="' . $row . '" id="' . $name . '" name="' . $name . '" '.$disable.'>' . $val . '</textarea>';
        }
		$element .= '</div>';
		echo $element;
	}

	static function radio($name='',$arr=array(),$selected,$state='show',$title='',$col=3){
		echo '<div class="form-group">';
        if(self::$layout=='horizontal') {
            $collast = 12-$col;
            echo '	<label class="control-label col-md-'.$col.'" for="' . $name . '">' . $title . '</label>';
            echo '	<div class="radio col-md-'.$collast.'">';
            foreach ($arr as $key => $val) {
                $id = "id=" . $name . "_" . $key;
                $checked = '';
                if ($key == $selected) $checked = ' checked="checked"';
                $disable = '';
                if ($state == 'show') $disable = ' disabled="disabled"';
                echo '	<input name="' . $name . '" ' . $id . ' type="radio" value="' . $key . '" ' . $checked . $disable . '  /> ' . $val . ' &nbsp;&nbsp;';
            }
            echo '	</div>';
        }else {
            echo '	<label class="control-label" for="' . $name . '">' . $title . '</label>';
            echo '	<div class="radio">';
            foreach ($arr as $key => $val) {
                $id = "id=" . $name . "_" . $key;
                $checked = '';
                if ($key == $selected) $checked = ' checked="checked"';
                $disable = '';
                if ($state == 'show') $disable = ' disabled="disabled"';
                echo '	<input name="' . $name . '" ' . $id . ' type="radio" value="' . $key . '" ' . $checked . $disable . '  /> ' . $val . ' &nbsp;&nbsp;';
            }
            echo '	</div>';
        }
		echo '</div>';
	}

	static function select($name='',$arr=array(),$selected='',$state='show',$title='',$col=3,$class=''){
		$disable = '';
		if($state=='show')$disable = 'disabled="disabled"';
		echo '<div class="form-group">';
        if(self::$layout=='horizontal') {
            $collast = 12-$col;
            echo '	<label class="control-label col-md-'.$col.'" for="' . $name . '">' . $title . '</label>';
            echo '	<div class="col-md-'.$collast.'">';
            echo '	<select class="form-control ' . $class . '" name="' . $name . '" id="' . $name . '" ' . $disable . '>';
            echo '		<option value="0">-- 请选择 --</option>';
            foreach ($arr as $key => $val) {
                $select = '';
                if ($key == $selected) $select = ' selected="selected"';
                echo '		<option value="' . $key . '"' . $select . '>' . $val . '</option>';
            }
            echo '	</select>';
            echo '	</div>';
        }else {
            echo '	<label class="control-label" for="' . $name . '">' . $title . '</label>';
            //echo '	<div class="input-group">';
            echo '	<select class="form-control ' . $class . '" name="' . $name . '" id="' . $name . '" ' . $disable . '>';
            echo '		<option value="0">-- 请选择 --</option>';
            foreach ($arr as $key => $val) {
                $select = '';
                if ($key == $selected) $select = ' selected="selected"';
                echo '		<option value="' . $key . '"' . $select . '>' . $val . '</option>';
            }
            echo '	</select>';
            //echo '	</div>';
        }
		echo '</div>';
	}

	static function select_multiple($name='',$arr=array('1'=>'测试1','2'=>'测试2'),$selected,$state='show',$title='',$col=3,$class=''){
		$disable = '';
		$selecteds = array();
		if(is_array($selected)){
			$selecteds = $selected;
		}else{
			$selecteds = explode(',',$selected);
		}
		if($state=='show')$disable = 'disabled="disabled"';
		echo '<div class="form-group">';
        if(self::$layout=='horizontal') {
            $collast = 12-$col;
            echo '	<label class="control-label col-md-'.$col.'" for="' . $name . '">' . $title . '</label>';
            echo '	<div class="col-md-'.$collast.'">';
            echo '	<select multiple="multiple" class="selectpicker form-control ' . $class . '" name="' . $name . '" id="' . $name . '" ' . $disable . '>';
            echo '		<option value="0">-- 请选择 --</option>';
            if (is_array($arr) && !empty($arr)) {
                foreach ($arr as $key => $val) {
                    $isselect = '';
                    foreach ($selecteds as $i) {
                        if (in_array($key, $selecteds)) {
                            $isselect = ' selected="selected"';
                        }
                    }
                    echo '		<option value="' . $key . '"' . $isselect . '>' . $val . '</option>';
                }
            }
            echo '	</select>';
            echo '	</div>';
        }else {
            echo '	<label class="control-label" for="' . $name . '">' . $title . '</label>';
            //echo '	<div class="input-group">';
            echo '	<select multiple="multiple" class="selectpicker form-control ' . $class . '" name="' . $name . '" id="' . $name . '" ' . $disable . '>';
            echo '		<option value="0">-- 请选择 --</option>';
            if (is_array($arr) && !empty($arr)) {
                foreach ($arr as $key => $val) {
                    $isselect = '';
                    foreach ($selecteds as $i) {
                        if (in_array($key, $selecteds)) {
                            $isselect = ' selected="selected"';
                        }
                    }
                    echo '		<option value="' . $key . '"' . $isselect . '>' . $val . '</option>';
                }
            }
            echo '	</select>';
            //echo '	</div>';
        }
		echo '</div>';
	}

	static function input_time($name='',$val='',$state='show',$title='',$col=3,$class=''){
		$disable = '';
		if($state=='show')$disable = 'disabled="disabled"';
        if(self::$layout=='horizontal') {
            $collast = 12-$col;
            echo '<div class="form-group">
				<label class="control-label col-md-'.$col.'" for="' . $name . '">' . $title . '</label>
				<div class="col-md-'.$collast.'"><input type="text" class="form-control datepicker-default ' . $class . '" id="' . $name . '" name="' . $name . '" value="' . date('Y-m-d', empty($val) ? time() : $val) . '" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" ' . $disable . ' /></div>					</div>';
        }else {
            echo '<div class="form-group">
				<label class="control-label" for="' . $name . '">' . $title . '</label>
				<input type="text" class="form-control ' . $class . '" id="' . $name . '" name="' . $name . '" value="' . date('Y-m-d', empty($val) ? time() : $val) . '" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" ' . $disable . ' />														
			</div>';
        }
	}

	
	/*************** 功能按钮组、导航条*******************/

	/* 普通窗口（查看、编辑、修改）页面 按钮组
	 * @access public
	 * @param array $param 当前模块功能名（编辑、列表）
	 * @param string $state 状态
	 * @param string $submitType 前端提交方式(form,ajax)
	 * @param string $formOrFunName 前端表单name或js方法名
	 * @param int $style 按钮显示样式
     * @return string
	 */
	static function btn_main($param=array(),$state='',$submitType='form',$formOrFunName='opform',$style=1){
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
        $url_arr=preg_split('/\/|\.|\?/', $_SERVER['REQUEST_URI']);
        $module=$url_arr[1];//获得模块名
        $method=$url_arr[2];//获得方法名
        $urlStr = $_SERVER["QUERY_STRING"];//url参数

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
		//处理数据提交方式
        $action = "$('#".$formOrFunName."').submit();";
        if($submitType=='ajax'){
            $action = $formOrFunName."();";
        }
		switch($state){
			case 'show':
				$but1 = ' <a href="/'.$module.'/'.$param['edit'].'?'.$urlStr.'" class="btn btn-info" id="edit">编辑</a>';
				$but2 = ' <a href="/'.$module.'/'.$param['list'].'" '.$cancelStyle.' id="show">关闭</a>';
				break;
			case 'edit':
				if(strpos($_SERVER['HTTP_REFERER'],'save')!==false) {//包含
					$but1 =  ' <button'.$okStyle.'type="button" id="save" onclick="'.$action.'">保存</button>';
					$but2 =  ' <a href="/'.$module.'/'.$param['list'].'" '.$cancelStyle.' id="show">关闭</a>';
				}else{
					$but1 =  ' <button'.$okStyle.'type="button" id="save" onclick="'.$action.'">保存</button>';
					$but2 =  ' <a href="'.$_SERVER['HTTP_REFERER'].'" '.$cancelStyle.' id="show">取消</a>';
				}
				break;
            case 'add':
                $but1 =  ' <button'.$okStyle.'type="button" id="save" onclick="'.$action.'">保存</button>';
                $but2 =  ' <a href="/'.$module.'/'.$param['list'].'"'.$cancelStyle.' id="show">取消</a>';
                break;
            case 'prt':
                $but1 =  ' <button'.$okStyle.'type="button" id="save" onclick="'.$action.'">打印</button>';
                $but2 =  ' <a href="/'.$module.'/'.$param['list'].'"'.$cancelStyle.' id="show">取消</a>';
                break;
            default:
                if(is_array($param[$state])){
                    $but1 = ' <button'.$okStyle.'type="button" id="save" onclick="'.$action.'">'.$param[$state][1].'</button>';
                    $but2 = ' <a href="/'.$module.'/'.$param['list'].'"'.$cancelStyle.' id="show">取消</a>';
                }else{
                    $but1 = ' <button'.$okStyle.'type="button" id="save" onclick="'.$action.'">其他</button>';
                    $but2 = ' <a href="/'.$module.'/'.$param['list'].'"'.$cancelStyle.' id="show">取消</a>';
                }
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

	/* 弹出窗口（查看、编辑、修改）页面 按钮组
	 * 弹出上下文窗口有两种情况：
	 * 1、弹出窗口与父级窗口没有继承关系，此时$pstate参数为空
	 * 2、弹出窗口与父级窗口为继承关系，此时$pstate参数需要传入父级窗口状态
	 * * 注意：目前只处理继承状态的动作为：add、edit、show三种状态(父级参数的值)
     * @access public
	 * @param array $param 当前模块功能名（编辑、列表）
	 * @param string $state 状态
	 * @param string $pstate 父级窗口状态
	 * @param string $submitType 前端提交方式(form,ajax)
	 * @param string $formOrFunName 前端表单name或js方法名
     * @return string
     */
	static function btn_alert($param,$state,$pstate='',$submitType='form',$formOrFunName='opform'){
        $url_arr=preg_split('/\/|\.|\?/', $_SERVER['REQUEST_URI']);
        $module=$url_arr[1];//获得模块名
        $method=$url_arr[2];//获得方法名
        $urlStr = $_SERVER["QUERY_STRING"];//url参数

        //处理数据提交方式
        $action = "$('#".$formOrFunName."').submit();";
        if($submitType=='ajax'){
            $action = $formOrFunName."();";
        }

		echo '<ul class="list-unstyled" style="padding-top:9px;">';
		echo '<li>';
        //$state = 'edit';
        //$pstate = '';
        //echo 'state='.$state.'<br>pstate='.$pstate;
		if($pstate!=''){
            switch($pstate){
                case 'show':
                    echo '<a href="javascript:void(0)" onclick="art.dialog.close();" id="show">关闭</a>';
                    break;
                case 'edit':
                    if(strpos($_SERVER['HTTP_REFERER'],'save')!==false) {//包含
                        echo '<button class="btn btn-info" type="button" id="save" onclick="'.$action.'">保存</button>&nbsp;或&nbsp;';
                        echo '<a href="javascript:void(0)" onclick="art.dialog.close();" id="show">关闭</a>';
                    }else{
                        echo '<button class="btn btn-info" type="button" id="save" onclick="'.$action.'">保存</button>&nbsp;或&nbsp;';
                        echo '<a href="javascript:void(0)" onclick="art.dialog.close();" id="show">取消</a>';
                    }
                    break;
                case 'add':
                    echo '<button class="btn btn-info" type="button" id="save" onclick="'.$action.'">保存</button>&nbsp;或&nbsp;';
                    echo '<a href="javascript:void(0)" onclick="art.dialog.close();" id="show">取消</a>';
                    break;
                default:
                    echo '父级参数只能为：add、edit、show，您传入为：'.$pstate.'！';
                    break;
            }
        }else{
            switch($state){
                case 'show':
                    echo '<a href="/'.$module.'/'.$param['edit'].'?'.$urlStr.'" class="btn btn-info" id="edit">编辑</a>&nbsp;或&nbsp;';
                    echo '<a href="javascript:void(0)" onclick="art.dialog.close();" id="show">关闭</a>';
                    break;
                case 'edit':
                    if(strpos($_SERVER['HTTP_REFERER'],'save')!==false) {//包含
                        echo ' <button class="btn btn-info" type="button" id="save" onclick="'.$action.'">保存</button>&nbsp;或&nbsp;';
                        echo '<a href="javascript:void(0)" onclick="art.dialog.close();" id="show">关闭</a>';
                    }else{
                        echo '<button class="btn btn-info" type="button" id="save" onclick="'.$action.'">保存</button>&nbsp;或&nbsp;';
                        echo '<a href="'.$_SERVER['HTTP_REFERER'].'" id="show">取消</a>';
                    }
                    break;
                case 'add':
                    echo '<button class="btn btn-info" type="button" id="save" onclick="'.$action.'">保存</button>&nbsp;或&nbsp;';
                    echo '<a href="javascript:void(0)" onclick="art.dialog.close();" id="show">取消</a>';
                    break;
                case 'prt':
                    echo '<button class="btn btn-info" type="button" id="'.$state.'" onclick="'.$action.'">打印</button>&nbsp;或&nbsp;';
                    echo '<a href="javascript:void(0)" onclick="art.dialog.close();" id="show">取消</a>';
                    break;
                default:
                    if(is_array($param[$state])){
                        echo ' <button class="btn btn-info" type="button" id="'.$state.'" onclick="'.$action.'">'.$param[$state][1].'</button>&nbsp;或&nbsp;';
                        echo ' <a href="javascript:void(0)" onclick="art.dialog.close();" id="show">取消</a>';
                    }else{
                        echo '参数错误！';
                    }
                    break;
            }
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
						<li><a href="javascript:;" onClick="operate(order)">排序</a></li>
						<li><a href="javascript:;" onClick="operate(del)">删除</a></li>
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