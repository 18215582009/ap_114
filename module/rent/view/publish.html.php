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

    <!-- Plugin Css -->
    <link href="/js/vendor/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/css/mtek_font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/fonts/font-lineicons.css" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="/theme/agency/css/agency.css" rel="stylesheet">
    <link href="/theme/agency/css/hs_pub.css" rel="stylesheet">
    <!-- Plugin Css -->
    <link href="/css/jquery-ui.css" rel="stylesheet">
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
            <li><a href="/guide">出租</a></li>
            <li><a class="check" href="/news/index?type=info">发布出租</a></li>
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
                    <h3>免费发布房源</h3>
                </div>
                <p>每天数百万真实用户，帮你快速找到精准客户。</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-box">
                <form role="form" class="form-pub" action="/rent/pubSave" method="post" id="form-modify1">
                    <input type="hidden" id="id" name="id" value="0">
                    <input type="hidden" id="house_type" name="house_type" value="1">
                    <input type="hidden" id="rent_way" name="rent_way" value="1">
                    <?=$token;?>
                    <div class="form-group">
                        <label class="">选择发布类型</label>
                        <span class="clear">
                        <a href="/sale/pub" class="post-type">委托出售</a>
                        <a href="javascript:void(0);" class="post-type type-select" onclick="selectType(this,'1');">出租<i class="icon ok-icon"></i></a>
                        <a href="javascript:void(0);" class="post-type" onclick="selectType(this,'2');">合租<i class="icon ok-icon"></i></a>
                    </span>
                    </div>

                    <div class="form-group">
                        <label><i>*</i>小区名称</label>
                        <input type="text" id="xq_name" name="xq_name" class="int-text" placeholder="请输入小区" maxlength="50">
                        <input type="text" id="xq_id" name="xq_id" value="0" style="width: 0;height: 0;border:0;">
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
                        <label><i>*</i>面积</label>
                        <input type="text" id="total_area" name="total_area" class="int-text middle-text" placeholder="请输入面积">
                        <span class="">平米</span>
                    </div>

                    <div class="form-group">
                        <label>租金</label>
                        <input type="text" id="price" name="price" class="int-text middle-text" placeholder="请输入您的房价">
                        <span class="">元/月 </span>
                    </div>

                    <div class="form-group">
                        <label><i>*</i>手机号码</label>
                        <input type="text" id="telphone" name="telphone" class="int-text middle-text" placeholder="请输入手机号码">
                    </div>

                    <div class="form-group">
                        <label>联系人</label>
                        <input type="text" id="linkman" name="linkman" class="int-text" placeholder="">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="pub-btn" id="">发布房源</button>
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
            telphone:{
                required:true,
                isMobile:true
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
            telphone:{
                required:'请输入手机号码'
            }
        },
        errorPlacement: function(error, element) {
            var placement = $(element.parent());
            var warning = $('<i></i>');
            warning.addClass('icon ico-hint');
            error.prepend(warning);
            if($(error).attr('id')=='shi-error' || $(error).attr('id')=='ting-error' || $(error).attr('id')=='wei-error'){
                $(element).siblings('label.error').remove();
                error.appendTo( placement );
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
            form.submit();
        }
    });

    function selectType(obj,type) {
        $("#rent_way").val(type)
        $(obj).addClass('type-select');
        $(obj).siblings('a').removeClass('type-select');
    }

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
</script>
<!--END JAVASCRIPT-->
</body>
</html>
