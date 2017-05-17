<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><?=$this->config->module->name?></title>
<!-- Bootstrap Core CSS -->
<link href="/js/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="/css/mtek_font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/css/fonts/font-lineicons.css" rel="stylesheet" type="text/css">

<!-- Theme CSS -->
<link href="/theme/agency/css/agency.css" rel="stylesheet">
<link href="/theme/agency/css/hs_pub.css" rel="stylesheet">
<!-- Plugin Css -->
<link href="/css/jquery-ui.css" rel="stylesheet">

<script src="http://g.tbcdn.cn/kissy/k/1.4.7/seed-min.js" charset="utf-8"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
    .form-box .form-group label.error {
        color: #f00;
        text-align: left;
        margin-left: 7px;
        display: inline;
    }
    .container .ico-hint {
        background-position: -90px -2px;
        height: 14px;
        margin-right: 5px;
        vertical-align: -2px;
        width: 14px;
    }
    .grid{margin-left: 150px;}
    .form-pub .getcode {
        display: inline-block;
        height: 32px;
        line-height: 32px;
        background: #fff;
        border: 1px solid #f60;
        color: #f60;
        width: 100px;
        cursor: pointer;
        margin-left: 8px;
        font-size: 12px;
        text-align: center;
    }
    .form-pub .getcode-dis, .form-pub .getcode-dis:hover {
        color: #999;
        background: #ddd;
        border-color: #ddd;
        cursor: default;
    }
    .form-pub .send {color: #62ab00;border-color: #62ab00;background: #fff;}
    .form-pub .nosend{  cursor: default;  color: #aaa;  background: #f5f5f5;  border-color: #ccc;}
</style>
<body id="page-top">
<a href="#" id="totop"><i class="fa fa-angle-up"></i></a>

<!-- secondNav -->
<div class="secondNav mbs mts">
    <div class="container">
        <div class="logo logo-main-dark"><a href="/"></a></div>
        <ul class="navlist">
            <li><a href="/sale">二手房</a></li>
            <li><a class="check" href="javascript:;">发布出售</a></li>
        </ul>
        <div class="input-group col-md-4 pull-right mtm">
            <div class="input-group-btn">
                <button class="btn btn-success pull-right" type="submit">房屋管理</button>
            </div>
        </div>
    </div>
</div>

<div class="container pub-bg">
    <div class="row">
        <div class="col-md-12">
            <div class="subheader">
                <div class="sh-title">
                    <div class="sh-line"></div>
                    <h3>委托出售</h3>
                </div>
                <p>快捷发布、全城展示!</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-box">
                <p class="form-tips">经纪人请登录网络经纪人后台发布，如经纪人伪装房东发布个人房源，被发现后将对经纪人进行封号处理</p>
                <form role="form" class="form-pub" action="/sale/pubSave" method="post" id="form-modify1">
                    <input type="hidden" id="id" name="id" value="0">
                    <input type="hidden" id="house_type" name="house_type" value="2">
                    <?=$token;?>
                    <div class="form-group">
                        <label><i>*</i>发房类型</label>
                        <span class="clear">
                            <a href="javascript:void(0)" class="post-type type-select">二手房出售<i class="icon ok-icon"></i></a>
                            <a href="/rent/pub" class="post-type">出租</a>
                        </span>
                    </div>

                    <div class="form-group">
                        <label><i>*</i>小区名称</label>
                        <input type="text" id="xq_name" name="xq_name" class="int-text" placeholder="请输入（成都）小区" maxlength="50">
                        <input type="text" id="xq_id" name="xq_id" value="0" style="width: 0;height: 0;border:0;">
                    </div>

                    <div class="form-group">
                        <label><i>*</i>楼栋门牌</label>
                        <input type="text" id="dong" name="dong" class="int-text min-text" placeholder="必填">
                        <span>栋（号）</span>
                        <input type="text" id="danyuan" name="danyuan" class="int-text min-text" placeholder="选填">
                        <span>单元</span>
                        <input type="text" id="hao" name="hao" class="int-text min-text" placeholder="必填">
                        <span>室</span>
                    </div>

                    <div class="form-group">
                        <label><i>*</i>面积</label>
                        <input type="text" id="total_area" name="total_area" class="int-text middle-text" placeholder="请输入面积"><span class="mls">m²</span>
                    </div>

                    <div class="form-group">
                        <label><i>*</i>户型</label>
                        <input type="text" id="shi" name="shi" class="int-text min-text" placeholder="">
                        <span>室</span>
                        <input type="text" id="ting" name="ting" class="int-text min-text" placeholder="">
                        <span>厅</span>
                        <input type="text" id="wei" name="wei" class="int-text min-text" placeholder="">
                        <span>卫</span>
                    </div>

                    <div class="form-group">
                        <label><i>*</i>售价</label>
                        <input type="text" id="price" name="price" class="int-text middle-text" placeholder="请输入您的房价"><span class="mls">万</span>
                    </div>

                    <div class="form-group">
                        <label><i>*</i>楼层</label>
                        <input type="text" id="current_floor" name="current_floor" class="int-text min-text" placeholder="">
                        <span>层/共</span>
                        <input type="text" id="total_floor" name="total_floor" class="int-text min-text" placeholder="">
                        <span>层</span>
                    </div>

                    <div class="form-group">
                        <label><i>*</i>类型</label>
                        <select class="int-text" id="pm_type" name="pm_type" style="width:100px;">
                            <option value="">房屋类型</option>
                            <? foreach($this->config->pm_type_option as $key=>$item){
                                if($key > 0){
                                    echo "<option value=".$key.">$item</option>";
                                }
                            } ?>
                        </select>
                        <select class="int-text" id="fitmen_type" name="fitmen_type" style="width:100px;">
                            <option value="">装修</option>
                            <? foreach($this->config->fitment_option as $key=>$item){
                                if($key > 0){
                                    echo "<option value=".$key.">$item</option>";
                                }
                            } ?>
                        </select>
                        <select class="int-text" id="toward" name="toward" style="width:100px;">
                            <option value="">朝向</option>
                            <? foreach($this->config->orientation_option as $key=>$item){
                                if($key > 0){
                                    echo "<option value=".$key.">$item</option>";
                                }
                            } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>业主说</label>
                        <textarea name="selling_point" id="selling_point" class="int-text" placeholder="让买家更好的了解您的房子（选填），请输入0-300字" maxlength="300" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label><i>*</i>房源图</label>
                        <span class="tip">更好展示您的房源（必填）</span>
                        <div style="display: inline"><input type="text" id="J_Urls" name="urls" value=""  style="width:1px;border:none"/></div>
                        <div class="grid">
                            <input type="file" class="g-u" id="J_UploaderBtn" value="上传图片" name="Filedata" accept="image/*" >

                            <div class="g-u mls">还可以上传<span id="J_UploadCount">3</span>张图片</div>
                        </div>
                    </div>

                    <ul id="J_UploaderQueue" class="grid" style="margin-left: 150px; margin-bottom: 1rem">

                    </ul>
                    <script>
                        var S = KISSY;
                        S.config({
                            packages:[
                                {
                                    name:"kg",
                                    path:"//g.tbcdn.cn/kg/",
                                    charset:"utf-8",
                                    ignorePackageNameInUri:true
                                }
                            ]
                        });
                        if (S.Config.debug) {
                            var srcPath = "../";
                            S.config({
                                packages:[
                                    {
                                        name:"kg/uploader/3.0.2",
                                        path:srcPath,
                                        charset:"utf-8",
                                        ignorePackageNameInUri:true
                                    }
                                ]
                            });
                        }
                        S.use('kg/uploader/3.0.2/index,kg/uploader/3.0.2/themes/imageUploader/index,kg/uploader/3.0.2/themes/imageUploader/style.css', function (S, Uploader,ImageUploader) {
                            //上传组件插件
                            var plugins = 'kg/uploader/3.0.2/plugins/auth/auth,' +
                                'kg/uploader/3.0.2/plugins/urlsInput/urlsInput,' +
                                'kg/uploader/3.0.2/plugins/proBars/proBars,' +
                                'kg/uploader/3.0.2/plugins/filedrop/filedrop,' +
                                'kg/uploader/3.0.2/plugins/preview/preview';
                            S.use(plugins,function(S,Auth,UrlsInput,ProBars,Filedrop,Preview){
                                var uploader = new Uploader('#J_UploaderBtn',{
                                    //处理上传的服务器端脚本路径
                                    action:"/upload/upload.php",
                                    multiple:true
                                });
                                //使用主题
                                uploader.theme(new ImageUploader({
                                    queueTarget:'#J_UploaderQueue'
                                }))
                                //上传成功后显示图片描述
                                uploader.on('success',function(ev){
                                    $('#J_Urls-error').hide();
//                                    var result = ev.file.result;
//                                    if(result.status){
//                                        var urlstr = $("#J_Urls").val();
//                                        $("#J_Urls").val(urlstr+'|'+result.url);
//                                    }
//                                    console.log(ev);
                                })
                                //监听队列的删除事件
                                uploader.on('remove',function(ev){
                                    //var result = ev.file.result;
                                    //var urlstr = $("#J_Urls").val();
                                    //urlstr = urlstr.replace(result.url,"")
                                    //$("#J_Urls").val(urlstr);
                                })
                                //验证插件
                                uploader.plug(new Auth({
                                    //最多上传个数
                                    max:3,
                                    //图片最大允许大小
                                    maxSize:6000
                                }))
                                //url保存插件
                                    .plug(new UrlsInput({target:'#J_Urls'}))
                                    //进度条集合
                                    .plug(new ProBars())
                                    //拖拽上传
                                    .plug(new Filedrop())
                                    //图片预览
                                    .plug(new Preview())
                                ;
                            });
                        })
                    </script>

                    <div class="form-group">
                        <label><i>*</i>手机号码</label>
                        <input type="text" id="telphone" name="telphone" class="int-text middle-text" placeholder="请输入手机号码">
                    </div>

                    <div class="form-group">
                        <label><i>*</i>短信验证码</label>
                        <input type="text" id="telCode" name="telCode" class="int-text middle-text" placeholder="请输入短信验证码">
                        <a href="javascript:;" class="getcode getcode-dis nosend">获取动态密码</a>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="pub-btn" id="">立即委托</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include '../../index/view/footer.html.php';?>

<!-- jQuery --> 
<script src="/js/jquery.min.js" type="text/javascript"></script>

<script src="/js/jquery-ui.js" type="text/javascript"></script>

<!-- main JavaScript -->
<script src="http://cdn.bootcss.com/jquery-validate/1.16.0/jquery.validate.js"></script>

<!--BEGIN JAVASCRIPT-->
<script>
    //手机号码验证
    jQuery.validator.addMethod("isMobile", function(value, element) {
        var length = value.length;
        var mobile = /^(((1[3-9]{1}[0-9]{1})|(15[0-9]{1}))+\d{8})$/;
        return this.optional(element) || (length == 11 && mobile.test(value));
    }, "请正确填写您的手机号码");

    $("#form-modify1").validate({
        rules:{
            xq_name:{
                required:true
            },
            xq_id:{
                required:true,
                min:true
            },
            dong:{
                required:true,
                digits:true
            },
            danyuan:{
                required:true,
                digits:true
            },
            hao:{
                required:true,
                digits:true
            },
            total_area:{
                required:true,
                number:true
            },
            shi:{
                required:true,
                digits:true
            },
            ting:{
                required:true,
                digits:true
            },
            wei:{
                required:true,
                digits:true
            },
            price:{
                required:true,
                number:true
            },
            total_floor:{
                required:true,
                digits:true
            },
            current_floor:{
                required:true,
                digits:true
            },
            toward:{
                required:true
            },
            fitmen_type:{
                required:true
            },
            pm_type:{
                required:true
            },
            telphone:{
                required:true,
                isMobile:true
            },
            telCode:{
                required:true
            },
            urls:{
                required:true
            }
        },
        messages:{
            xq_name:{
                required:'请输入小区名称'
            },
            xq_id:{
                required:'请输入小区名称',
                min:'不存在该小区信息'
            },
            dong:{
                required:'请输入栋、单元、房号',
                digits:'请输入整数'
            },
            danyuan:{
                required:'请输入栋、单元、房号',
                digits:'请输入整数'
            },
            hao:{
                required:'请输入栋、单元、房号',
                digits:'请输入整数'
            },
            total_area:{
                required:'请输入面积',
                number:'请输入数字'
            },
            shi:{
                required:'请输入户型',
                digits:'请输入整数'
            },
            ting:{
                required:'请输入户型',
                digits:'请输入整数'
            },
            wei:{
                required:'请输入户型',
                digits:'请输入整数'
            },
            price:{
                required:'请输入价格',
                number:'请输入数字'
            },
            total_floor:{
                required:'请输入楼层',
                digits:'请输入整数'
            },
            current_floor:{
                required:'请输入楼层',
                digits:'请输入整数'
            },
            toward:{
                required:'请选择房屋朝向'
            },
            fitmen_type:{
                required:'请选择房屋装修'
            },
            pm_type:{
                required:'请选择房屋类型'
            },
            telphone:{
                required:'请输入手机号码'
            },
            telCode:{
                required:'请输入短信验证码'
            },
            urls:{
                required:'请上传房源图片'
            }
        },
        errorPlacement: function(error, element) {
            var placement = $(element.parent());
            var warning = $('<i></i>');
            warning.addClass('icon ico-hint');
            error.prepend(warning);
            if($(error).attr('id')=='dong-error' || $(error).attr('id')=='danyuan-error' || $(error).attr('id')=='hao-error'){
                //alert($(element).attr('class'));
                $(element).siblings('label.error').remove();
                error.appendTo( placement );
            }else if($(error).attr('id')=='shi-error' || $(error).attr('id')=='ting-error' || $(error).attr('id')=='wei-error'){
                $(element).siblings('label.error').remove();
                error.appendTo( placement );
            }else if($(error).attr('id')=='total_floor-error' || $(error).attr('id')=='current_floor-error'){
                $(element).siblings('label.error').remove();
                error.appendTo( placement );
            }else if($(error).attr('id')=='pm_type-error' || $(error).attr('id')=='fitmen_type-error' || $(error).attr('id')=='toward-error'){
                $(element).siblings('label.error').remove();
                error.appendTo( placement );
            }else if($(error).attr('id')=='xq_id-error'){
                if($('#xq_name').val()!=''){
                    $(element).siblings('label.error').remove();
                    error.appendTo( placement );
                }
            }else{
                error.appendTo( placement );
            }
        },
        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },
        submitHandler: function(form) { //验证成功时调用
            //判断是否上传图片
            if($("#J_Urls").val()==''){
                alert('请上传房源图片!');
                //$("#J_Urls-error").show();
            }else {
                form.submit();
                //$(form).ajaxSubmit();
            }
        },
        onfocusout: function(element){
            if($(element).attr('id')=='telphone'){
                if($(element).valid()) {
                    $('.getcode').removeClass('nosend').addClass('send');
                    //绑定发送短信事件
                    $('.getcode').click(sendSms);
                }else{
                    $('.getcode').removeClass('send').addClass('nosend');
                }
            }
            if($(element).attr('id')=='telCode'){
                if($('#telCode').val()==''){
                    alert('请输入手机验证码');
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: '/userlogin/apiCheckSms',
                    dataType: 'JSON',
                    data: {
                        telCode: $('#telCode').val()
                    },
                    success: function (result) {
                        if (!result.success) {
                            alert(result.msg);
                            return false;
                        }
                    },
                    error: function (result) {
                        alert(result.msg);
                        if (!result.success) {
                            alert("系统繁忙!");
                        }
                    }
                });
                return false;
            }
        }
    });


$(function() {
//    $("#xq_name").autocomplete({
//        source: xqList(1)
//    });
    //缓存
    var cache = {};
    $( "#xq_name" ).autocomplete({
        source: function(request, response ) {
            var term = request.term;
            if ( term in cache ) {
                response( $.map( cache[ term ], function( item ) {
                    return {
                        id:item.id,
                        value: item.reside
                    }
                }));
                return;
            }
            $.ajax({
                url: "/sale/ajaxXqlist",
                dataType: "json",
                data:{
                    key: request.term
                },
                success: function( data ) {
                    cache[ term ] = data;
                    response( $.map( data, function( item ) {
                        return {
                            id:item.id,
                            value: item.reside
                        }
                    }));
                }
            });
        },
        minLength: 1,
        select: function( event, ui ) {
            $("#xq_id").val(ui.item.id);
        }
    });

    function xqList(key) {
        var xqlist = [];
        $.ajax({
            type: 'GET',
            url: '/sale/ajaxXqList',
            dataType: 'JSON',
            data: {
                key: key
            },
            success: function (result) {
                if (result.success) {
                    //alert('ok');
                } else {
                    //alert('on')
                }
            },
            error: function (result) {
                if (!result.success) {
                    alert("系统繁忙!");
                }
            }
        });
        return xqlist;
    }

    $('#form-modify').validate({
        focusInvalid : true,
        onfocusout: function(element){
            if($(element).attr('id')=='telphone'){
                if($(element).valid()) {
                    $('.getcode').removeClass('nosend').addClass('send');
                    //绑定发送短信事件
                    $('.getcode').click(sendSms);
                }else{
                    $('.getcode').removeClass('send').addClass('nosend');
                }
            }
            if($(element).attr('id')=='telCode'){
                if($('#telCode').val()==''){
                    alert('请输入手机验证码');
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: '/userlogin/apiCheckSms',
                    dataType: 'JSON',
                    data: {
                        telCode: $('#telCode').val()
                    },
                    success: function (result) {
                        if (!result.success) {
                            alert(result.msg);
                            return false;
                        }
                    },
                    error: function (result) {
                        alert(result.msg);
                        if (!result.success) {
                            alert("系统繁忙!");
                        }
                    }
                });
                return false;
            }
        },
        rules:{
            xq_name:{
                required:true
            },
            xq_id:{
                required:true,
                min:true
            },
            dong:{
                required:true,
                digits:true
            },
            danyuan:{
                required:true,
                digits:true
            },
            hao:{
                required:true,
                digits:true
            },
            total_area:{
                required:true,
                number:true
            },
            shi:{
                required:true,
                digits:true
            },
            ting:{
                required:true,
                digits:true
            },
            wei:{
                required:true,
                digits:true
            },
            price:{
                required:true,
                number:true
            },
            total_floor:{
                required:true,
                digits:true
            },
            current_floor:{
                required:true,
                digits:true
            },
            toward:{
                required:true
            },
            fitmen_type:{
                required:true
            },
            pm_type:{
                required:true
            },
            telphone:{
                required:true,
                isMobile:true
            },
            telCode:{
                required:true
            }
        },
        messages:{
            xq_name:{
                required:'请输入小区名称'
            },
            xq_id:{
                required:'请输入小区名称',
                min:'不存在该小区信息'
            },
            dong:{
                required:'请输入栋、单元、房号',
                digits:'请输入整数'
            },
            danyuan:{
                required:'请输入栋、单元、房号',
                digits:'请输入整数'
            },
            hao:{
                required:'请输入栋、单元、房号',
                digits:'请输入整数'
            },
            total_area:{
                required:'请输入面积',
                number:'请输入数字'
            },
            shi:{
                required:'请输入户型',
                digits:'请输入整数'
            },
            ting:{
                required:'请输入户型',
                digits:'请输入整数'
            },
            wei:{
                required:'请输入户型',
                digits:'请输入整数'
            },
            price:{
                required:'请输入价格',
                number:'请输入数字'
            },
            total_floor:{
                required:'请输入楼层',
                digits:'请输入整数'
            },
            current_floor:{
                required:'请输入楼层',
                digits:'请输入整数'
            },
            toward:{
                required:'请选择房屋朝向'
            },
            fitmen_type:{
                required:'请选择房屋装修'
            },
            pm_type:{
                required:'请选择房屋类型'
            },
            telphone:{
                required:'请输入手机号码'
            },
            telCode:{
                required:'请输入短信验证码'
            }
        },
        errorPlacement: function(error, element) {
            var placement = $(element.parent());
            var warning = $('<i></i>');
            warning.addClass('icon ico-hint');
            error.prepend(warning);
            if($(error).attr('id')=='dong-error' || $(error).attr('id')=='danyuan-error' || $(error).attr('id')=='hao-error'){
                //alert($(element).attr('class'));
                $(element).siblings('label.error').remove();
                error.appendTo( placement );
            }else if($(error).attr('id')=='shi-error' || $(error).attr('id')=='ting-error' || $(error).attr('id')=='wei-error'){
                $(element).siblings('label.error').remove();
                error.appendTo( placement );
            }else if($(error).attr('id')=='total_floor-error' || $(error).attr('id')=='current_floor-error'){
                $(element).siblings('label.error').remove();
                error.appendTo( placement );
            }else if($(error).attr('id')=='pm_type-error' || $(error).attr('id')=='fitmen_type-error' || $(error).attr('id')=='toward-error'){
                $(element).siblings('label.error').remove();
                error.appendTo( placement );
            }else if($(error).attr('id')=='xq_id-error'){
                if($('#xq_name').val()!=''){
                    $(element).siblings('label.error').remove();
                    error.appendTo( placement );
                }
            }else{
                error.appendTo( placement );
            }
        },
        submitHandler: function(form) { //验证成功时调用
            //判断是否上传图片
            if($("#J_Urls").val()==''){
                //alert('123');
            }else {
                form.submit();
                //$(form).ajaxSubmit();
            }
        }
    });

});

function sendSms(){
    var $telphone = $('#telphone');
    var $sendbtn = $('.getcode');
    $sendbtn.unbind('click',sendSms);
    countdown = 5;
    settime($sendbtn);
    $.ajax({
        type: 'POST',
        url: '/userlogin/apiSendSms',
        dataType: 'JSON',
        data: {
            mobile: $telphone.val()
        },
        success: function (result) {
            //alert(result.msg);
            if (result.success) {
                alert(result.send_code);
            } else {

            }
        },
        error: function (result) {
            alert(result.msg);
            if (result.success) {

            }
            else {
                alert("系统繁忙!");
            }
        }
    });
}

function settime(val) {
    var val = $(val);
    if (countdown == 0) {
        clearTimeout(timeoutProcess);
        val.removeAttr("disabled");
        val.html("发送验证码");
        val.removeClass('nosend').addClass('send');
        val.click(sendSms);
        return false;
    } else {
        val.attr("disabled", true);
        val.removeClass('send').addClass('nosend');
        val.html("重新发送(" + countdown + ")");
        countdown--;
    }
    timeoutProcess = setTimeout(function() {
        settime(val)
    },1000)
}

function checkMobile(mobile) {
    var result;
    $.ajax({
        type: 'POST',
        url: '/userlogin/apiCheckMobile',
        dataType: 'JSON',
        data: {
            mobile: mobile
        },
        async : false,
        success: function (data) {
            result = data;
        }
    });
    return result;
}

function lang(key) {
    mylang = {
        'ls_xq_name': '请输入（成都）小区',
        '':''
    };
    return mylang[key];
}
</script>
<!--END JAVASCRIPT-->
</body>
</html>
