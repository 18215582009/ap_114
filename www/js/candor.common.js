document.write("<script type=\"text/javascript\" src=\"/js/plugins/artDialog/artDialog.source.js?skin=default\"></script>");
document.write("<script type=\"text/javascript\" src=\"/js/plugins/artDialog/plugins/iframeTools.js\"></script>");
/**
 * @jQuery代码：模块公共代码
 * @author:luodong
 * @date:  2012-05-31
 */

/* 按钮启用或禁用功能 */
function operateBar(state,enable){
	if(state=="hide"){
		$("#operateBar").hide();
	}else{
		$("#operateBar").show();
		$("#operateBar").find(".btn").css("display","none");
		//$("#operateBar").find(".btn").attr("disabled",true);
		$("button").removeAttr("data-toggle");
		//$("#operateBar").find(".btn").unbind();
		if(enable!=""){
			var enablelist = enable.split(",");
			if(enablelist.length>0){
				for(var i=0;i<enablelist.length;i++){
					//$("#"+enablelist[i]).removeClass('disabled');
					$("#"+enablelist[i]).css("display","");
					if (enablelist[i]=='add')
					{
						$("button").attr("data-toggle","dropdown");
					}
				}
			}else{
				//$("#"+enable).removeClass('disabled');
				$("#"+enable).css("display","");
				if (enablelist[i]=='add')

				{
					$("button").attr("data-toggle","dropdown");
				}
			}
		}
	}
}

/* 处理查看修改时页面元素状态 */
function disabled(state,wrap){
	var wrap = (typeof(wrap) == 'undefined')?"opform":wrap;
	if(state){
		$("#"+wrap+" input[type='text']").attr("readonly",true);
		$("#"+wrap+" input[type='text'][writeable='true']").attr("readonly",false);
		$("#"+wrap+" input[type='checkbox']").attr("disabled",true);
		$("#"+wrap+" input[type='radio']").attr("disabled",true);
		$("#"+wrap+" input[type='file']").attr("disabled",true);
		$("#"+wrap+" select").attr("disabled",true);
		$("#"+wrap+" textarea").attr("disabled",true);
	}else{
		$("#"+wrap+" input[type='text']").attr("readonly",false);
		$("#"+wrap+" input[type='checkbox']").attr("disabled",false);
		$("#"+wrap+" input[type='radio']").attr("disabled",false);
		$("#"+wrap+" input[type='file']").attr("disabled",false);
		$("#"+wrap+" select").attr("disabled",false);
		$("#"+wrap+" textarea").attr("disabled",false);
	}
	$("#"+wrap+" input[alt='cible']").attr("disabled",false);
	$("#"+wrap+" input[alt='cible']").attr("readonly",false);
}

/* 按钮工具条工厂函数 */
function operateFactory(operatebtn,filter) {
	// factory for click save
	function save(filter) {
		return function() {
			var program;
			var doc;
			var filterlist = filter.split("#");
			if(filterlist.length>1){
				if (document.all){//IE
					//doc = document.frames["mainFrame"].document;
					program = 'doc=document.frames["'+filterlist[0]+'"].document';
					eval(program);
				}else{//Firefox   
					//doc = document.getElementById("mainFrame").contentDocument;
					program = 'doc=document.getElementById("'+filterlist[0]+'").contentDocument';
					eval(program);
				}
				//doc.forms.opform.submit();
				//program = 'doc.forms.'+filterlist[1]+'.submit()';
				oForm = 'doc.getElementById("'+filterlist[1]+'").submit();';    
			}else{
				oForm = 'document.'+filter+'.submit()';
			}
			eval(oForm);
		};
	}
	// factory for click cancel
	function cancel(filter){
		if(filter=='back'){
			return function(){
				location.back();
			}
		}else{
			return function(){
				var _filter = filter.split("#");
				var refresh = _filter[0]+".window.location.reload()";
				//alert(_filter[0]);
				eval(refresh);
			}
		}
	}

	// click on first element to collapse tree
	//$("#operateBar").find("button.btn").unbind();
	if(operatebtn=='save'){
		//$("#"+operatebtn, "#operateBar").unbind();
		$("#"+operatebtn, "#operateBar").bind("click",save(filter));
		//$("#"+operatebtn, "#operateBar").click( save(filter) );
	}
	if(operatebtn=='cancel'){
		//$("#"+operatebtn, "#operateBar").unbind();
		$("#"+operatebtn, "#operateBar").bind("click",cancel(filter));
		//$("#"+operatebtn, "#operateBar").click( cancel(filter) );
	}
}

/* 按钮工具条工厂函数2 */
function operateFactoryFun(operatebtn,fun) {//alert(operatebtn);
		$("#"+operatebtn, "#operateBar").bind("click",fun);
}

/*弹出询问消息,已重写（可删除）
 * @var string action 执行动作'refresh、back、close、url(执行url链接地址)、fun(执行js方法)'

function prompt(msg,success,action='',param='')
{
    var success = success != void 0 ? success : 'error'
	var action = action != void 0 ? action : 'refresh';
	var param = param != void 0 ? param : '';
    art.dialog({
        content: msg,
        icon: success,//succeed or error
        time: 2000,
        lock:true,
        okVal:'确认',
		zIndex:20000,
        window:'parent',
		ok: function () {
			if(action=='refresh'){
				window.location.reload()
			}else if(action=='back'){
				window.history.back();
			}else if(action=='close'){
				//关闭弹出任务窗口
				art.dialog.close();
			}else if(action=='url'){
				if(param!=''){
					window.location=param;
				}
			}else if(action=='fun'){
				if(param!=''){
					eval(param+"()");
				}
			}
		},
		cancel: true
    });
}
 */
 
function promptback(msg,success)
{
    success = success != void 0 ? success : 'error'
    art.dialog({
        content: msg,
        icon: success,//succeed or error
        time: 2000,
        lock:true,
        okVal:'确认',
		zIndex:20000,
        window:'parent',
		ok: function () {
			window.history.back();
		},
		cancel: true
    });
}

/*ie中confirm只能传一个参数。已使用prompt方法替代，可删除
function confirm(obj) {
	var url=obj.split('|')[0];	
	var msg=typeof(obj.split('|')[1])=="undefined"?"你确定要删除这个计划吗？":obj.split('|')[1];	
	var isfun=typeof(obj.split('|')[2])=="undefined"?"false":obj.split('|')[2];	
	art.dialog.confirm(msg, function () {
		if(isfun=="true"){			
			eval(url);
		}else{
			window.location.href=url;
		}
	}, function () {
		
	});
}*/

/*
window.confirm= function (msg, callBack) {
	var success = 'error';
    art.dialog({
        content: msg,
        icon: success,//succeed or error
        time: 2000,
        lock:true,
        okVal:'确认1',
		zIndex:20000,
        window:'parent',
		ok: function () {
			callBack();
		},
		cancel: true
    });
}
//confirm("are you sure!", function (){alert("删除成功")});
*/


/*弹出询问消息
 *@var string param1 参数格式为：动作(refresh、back、close、url、fun)|按钮名字|执行操作(可以为js方法或url地址)
 *@var string param2 参数格式为：动作(refresh、back、close、url、fun)|按钮名字|执行操作(可以为js方法或url地址)
*/
function prompt(msg,status,param1,time,param2,islock){
	var _islock = typeof(islock)!='undefined' ?islock:true;
	var _time = typeof(time)!='undefined' ?time:2000;
	var btn1 = '确认',btn2 = '取消';
	var act1 ='close',act2 = ''
	var url1='',url2='';
	var _param1 = typeof(param1)!='undefined' ? param1.split("|"):"";
	var _param2 = typeof(param2)!='undefined' ? param2.split("|"):"";
	btn1 = _param1[1] !=''&&typeof(_param1[1])!='undefined' ? _param1[1]:btn1;
	url1 = _param1[2] !=''&&typeof(_param1[2])!='undefined'  ? _param1[2]:url1;
	act1 = _param1[0] !=''&&typeof(_param1[0])!='undefined'  ? _param1[0]:act1;
	btn2 = _param2[1]!=''&&typeof(_param2[1])!='undefined'  ? _param2[1]:btn2;
	url2 = _param2[2]!=''&&typeof(_param2[2])!='undefined'  ? _param2[2]:url2;
	act2 = _param2[0]!=''&&typeof(_param2[0])!='undefined'  ? _param2[0]:act2;
	var obj;
	if(status=='loading'){
		obj = art.dialog({
				lock: _islock,
				background: '#ccc',
				opacity: 0.37,
				time: _time,
				title: msg
			});
	}else if(status=='alert'){	
		obj = art.dialog({
				lock: _islock,
				background: '#ccc',
				opacity: 0.37,
				time: _time,
				content: msg,
				icon: 'warning',
				ok: function () {
                    return true;
                }
			});
	}else{
		obj = art.dialog({
			lock: _islock,
			background: '#ccc',
			opacity: 0.37,
			time: _time,
			content: msg,
			icon: 'icon48_'+status,
			button: [
				{
					name: btn1,
					callback: function () {
						if(act1=='refresh'){
							window.location.reload()
						}else if(act1=='back'){
							window.history.back();
						}else if(act1=='close'){
							//关闭弹出任务窗口
							art.dialog.close();
						}else if(act1=='url'){
							if(url1!=''){
								window.location.href=url1;
							}
						}else if(act1=='fun'){
							if(url1.indexOf("(")>=0&&url1.substr(url1.length-1,1)==")"){//函数带参数20151026加
								eval(url1);
							}else{
								eval(url1+"()");
							}
						}
						return true;
					},
					focus: true
				},
				{
					name: btn2,
					callback: function () {
						if(act2=='refresh'){
							window.location.reload()
						}else if(act2=='back'){
							window.history.back();
						}else if(act2=='close'){
							//关闭弹出任务窗口
							art.dialog.close();
						}else if(act2=='url'){
							if(url2!=''){
								window.location.href=url1;
							}
						}else if(act2=='fun'){
							if(url2.indexOf("(")>=0&&url2.substr(url2.length-1,1)==")"){
								eval(url2);
							}else{
								eval(url2+"()");
							}							
						}
						return true;
					}
				}

			]
		});
	}
	return obj;
}

/*页面处理消息--用调用alert_msg--请勿使用
function page_msg(status,msg,callback){
    var obj;
    if(status=='loading'){
        obj = art.dialog({
                lock: true,
                background: '#ccc', // 背景色
                opacity: 0.37,    // 透明度
                title: msg,
				window:"top"
            });
    }else{
        obj = art.dialog({
                lock: true,
                background: '#ccc', // 背景色
                opacity: 0.37,    // 透明度
                content: msg,
                icon: status,
				zIndex:20000,
                ok: function () {
                    if(callback!=null){
                        eval(callback+"()");
                    }else{
                        //window.location.reload(); 
                        //widndow.location.href = url;
                    }
                    return true;
                },
                cancel: true
            });
    }
    return obj;
}
*/

/*页面加载等待--用调用alert_msg--请勿使用
function loading()
{
    var obj = art.dialog({ 
        lock:true,
        title:false,
        border: false,
        drag: false,
        esc: false,
        //close:function(){return false;},
        content:'<div><img src="/images/loading4.gif" /><p style="text-align:center;font-weight:bold;">数据加载，请等待...</p><div>'
    });
    return obj;
}
*/

var proLoading = function(){
    var obj = art.dialog({ 
        lock:true,
        title:false,
        border: false,
        drag: false,
        esc: false,
        //close:function(){return false;},
        content:'<div><div class="progress"><div class="bar"></div ><div class="percent">0%</div ></div><p style="text-align:center;font-weight:bold;">数据处理中，请等待...</p><div>'
    });
    return obj;
}

/* 调用框架tab */
function frameWorkTab(id,title,url){
	var tabWinC = '<iframe src="'+url+'" width="100%" height="100%" frameborder="0" id="'+id+'_1" name="'+id+'_1"></iframe>';
	// alert(tabWinC);
	window.top.tab_panel.addTab({id:id+"_1", 
						  title:title,
						  html:tabWinC,
						  closable: true, 
						  disabled:false
					   });
}

function frameWorkTabKill(position){
	window.top.tab_panel.kill(position+"_1");	
}

function frameWorkTabRefresh(position){
	window.top.tab_panel.refresh(position+"_1");	
}

//弹出框
function markGS(){}
markGS.prototype.id = null;
markGS.prototype.parent = null ;
markGS.prototype.title = null ;
markGS.prototype.did = 'itemText';
markGS.prototype.width = 540;
markGS.prototype.height = 300;
markGS.prototype.dialog = function(url)
{
    url = url.indexOf('?') > 0 ? url : url+'?' ;
    var http = url+'&id='+this.id+'&title='+this.title+'&did='+this.did;
    art.dialog.open(http,{
            title: this.title,
            id:this.did,
            lock:true,
            width:this.width,
            height:this.height
        },true);
}

var markG = 
{
    dialog:function(url,expand)
    {
        var mark = new markGS();
        var Default = {
            title : '提示信息' ,
            id : null,
            did : 'itemText',
            width:540,
            height:300
        }
        if(expand != void 0)
        {
            if(typeof(expand)=='object')
            {
                for(var i in Default)
                {
                    for(var j in expand)
                    {
                        if(i==j)
                        {
                            Default[i] = expand[j];
                        }
                    }
                }
            }
            else Default.title = expand ; 
            
        }
        //开始传值
        for(var i in Default)
        {
            mark[i] = Default[i] ;
        }
        mark.dialog(url);
    }
}


/*弹出打印公共方法*/
function candorprt(tData){
	var url = '/common/select_rpt.candor';
	art.dialog.open(url,{
		title: '报表打印',height: '120px'
	});
}

/**
ajax Submit提交
**/
function ajaxSubmit(formId,saveUrl,locationUrl,upload)
{
    saveUrl = saveUrl.indexOf('?') > -1 ? saveUrl : saveUrl+'?';
    options = {
        url : saveUrl+'&ajax=1',
        dataType : 'json',
        beforeSubmit:function(){
            load = upload==void 0 ? loading() : proLoading();
            var percentVal = '0%';
            $('.bar').width(percentVal)
            $('.percent').html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete){
                var percentVal = percentComplete + '%';
                $('.bar').width(percentVal)
                $('.percent').html(percentVal);
        },
        success: function(data) { 
            if(data.res==1)
            {
                message("【温馨提示】"+data.msg);
                load.close();
            }else if(data.res==2)
            {
                //artSubConfirm(data.msg,'修改',formId,saveUrl,locationUrl);
                load.close();
            }
            else
            {
                art.dialog({
                    content:"【温馨提示】"+data.msg,
                    width:200,
                    icon: 'succeed',
                    lock:true,
                    title:'提示信息',
                    button: [
                    {
                        name: '关闭',
                        callback: function () {
							if(locationUrl=="-1") return true;
							else	window.location.href=locationUrl;
                            return false;
                        },
                        focus: true
                    }]
                })
                load.close();
            }
        },
        complete: function(xhr) {
                var percentVal = '100%';
                $('.bar').width(percentVal)
                $('.percent').html(percentVal);
        }      
    }
    $('#'+formId).ajaxSubmit(options);
}

// /*treegrid加强代码开始*/
// (function ($) {
// 	$.fn.treegridpro = function () {
// 		$(this).find("tbody tr").each(function(){
// 		var c=$(this).attr("class");
// 		var templateClass = /treegrid-([A-Za-z0-9_-]+)/;
// 		var templateParentClass = /treegrid-parent-([A-Za-z0-9_-]+)/;
// 		var t1=c.match(templateClass);
// 		var t2=c.match(templateParentClass);
// 		var t3=templateParentClass.test(c);
//         var tid=t1[0].toString().split("-")[1];
// 		$(this).find("[class*='fa-caret']").eq(0).click(function () {
// 				//如果点击时图标为展开样式
// 				if($(this).attr("class").indexOf("fa-caret-right")>=0){
//                 	// treeOpen(obj,true);//展开
//                 	$(this).removeClass("fa-caret-right");
// 					$(this).addClass("fa-caret-down");
// 					$("[class*='treegrid-parent-"+tid+"']").show();
// 					$("[class*='treegrid-parent-"+tid+"']").each(function(){
// 							treeOpen(this,true);
// 					});
// 	            }else{
// 	            	// treeOpen(obj,false);
// 	            	$(this).removeClass("fa-caret-down");
// 					$(this).addClass("fa-caret-right");
// 					$("[class*='treegrid-parent-"+tid+"']").hide();
// 	            	$("[class*='treegrid-parent-"+tid+"']").each(function(){
// 							treeOpen(this,false);
// 					});
// 	            }
//             });	
// 		});

//     };
// })(jQuery);

// //展示或隐藏下一级
// function treeOpen(obj,all){
// 	var c=$(obj).attr("class");
// 	var templateClass = /treegrid-([A-Za-z0-9_-]+)/;
// 	var e1=c.match(templateClass);
//     var tid=e1[0].toString().split("-")[1];
//     if($("[class*='treegrid-parent-"+tid+"']").length>0){
//     	if(!all){
//     		$("[class*='treegrid-parent-"+tid+"']").hide();
//     	}else{
//     		if($(obj).find("td:eq(0) span:last").attr("class").indexOf("fa-caret-down")>=0){
// 				$("[class*='treegrid-parent-"+tid+"']").show();						
// 			}else{
// 				$("[class*='treegrid-parent-"+tid+"']").hide();							
// 			}
//     	}
		
// 		$("[class*='treegrid-parent-"+tid+"']").each(function(){
// 			treeOpen(this,all);
// 		});
// 	}	                
// }

// //初始化，关闭第几层以下的
// function closeTr(obj){
// 	$(obj).find("tbody tr").each(function(){
// 		if($(this).attr("class").indexOf("treegrid-parent")>=0){
// 			$(this).hide();
// 		}
// 		$(this).find("span").filter("[class*='fa-caret']").removeClass("fa-caret-down").addClass("fa-caret-right");		
// 	})
// }
// /*treegrid加强代码结束*/

// /*titleshow开始*/
// (function ($){
// 	$.fn.showtitle=function(){
// 		var tableobj=this;
// 		$(this).find("thead th[title]").each(function(){
// 			var temp='<i class="glyphicon glyphicon-plus titleshow" style="color:#358BD8; cursor:pointer;"></i>';
// 			var thindex = $(tableobj).find("thead th").index(this);
// 			$(temp).appendTo($(this)).click(function () {
// 				var isshow=false;
// 				//改变图标
// 				if($(this).attr("class").indexOf("glyphicon-plus")>=0){
// 					$(this).removeClass("glyphicon-plus");
// 					$(this).addClass("glyphicon-minus");
// 					isshow=true;
// 				}else{
// 					$(this).removeClass("glyphicon-minus");
// 					$(this).addClass("glyphicon-plus");
// 				}
// 				//改变表格下内容
// 				$(tableobj).find("tbody tr").each(function(){
// 					if(isshow){
// 						$(this).find("td").eq(thindex).attr("data-text",$(this).find("td").eq(thindex).text());
// 						$(this).find("td").eq(thindex).text($(this).find("td").eq(thindex).attr("title"));						
// 					}else{
// 						$(this).find("td").eq(thindex).text($(this).find("td").eq(thindex).attr("data-text"));					
// 					}					
// 				})
// 			})
// 		})
// 	}
// })(jQuery);
// //glyphicon-minus
// /*titleshow结束*/

// /*titleshow开始*/
// (function ($){
// 	$.fn.showsort=function(options){
// 		var settings = $.extend({}, this.treegrid.defaults, options);//将后连个参数合并，存在相同就取后面的值（一次一次压入到{}中）
// 		var tableobj=this;
// 		var tsort=settings.defaultsort;
// 		var tflag=settings.defaultflag;

// 		var temp='<i class="fa '+(tflag=="asc"?'fa-caret-down':'fa-caret-up')+' showsort" style="color:#358BD8; cursor:pointer;float: right;"></i>';
// 		$(this).find("thead th[data-field]").each(function(){
// 			if($(this).data("field")==tsort){
// 				$(this).append(temp);
// 			}else{
// 				$(this).append('<i class="fa fa-unsorted showsort" style="color:#358BD8; cursor:pointer;float: right;"></i>');
// 			}
// 		})

// 		$(this).find("thead i").filter(".showsort").each(function(){
// 			$(this).click(function () {
// 			var isshow=false;
// 				//改变图标
// 				var sort=$(this).parents("th").data("field");
// 				var url=window.location.href;

// 				if($(this).attr("class").indexOf("fa-caret-down")>=0){
// 					var flag="desc";				
// 				}else{
// 					var flag="asc";	
// 				}
// 				url=url.replace(/&sort=([A-Za-z0-9]|\.|_)*/g,"&sort="+sort).replace(/\?sort=([A-Za-z0-9]|\.|_)*/g,"?sort="+sort);
// 				url=url.replace(/&flag=([A-Za-z0-9]|\.|_)*/g,"&flag="+flag).replace(/\?flag=([A-Za-z0-9]|\.|_)*/g,"?flag="+flag);
// 				url=url.replace(/&page=([A-Za-z0-9]|\.|_)*/g,"&page=1").replace(/\?page=([A-Za-z0-9]|\.|_)*/g,"?page=1");
// 				url+=url.indexOf("?")>=0?"":"?";
// 				url+=url.indexOf("?sort="+sort)>=0||url.indexOf("&sort="+sort)>=0?"":("&sort="+sort);
// 				url+=url.indexOf("?flag="+flag)>=0||url.indexOf("&flag="+flag)>=0?"":("&flag="+flag);
// 				// alert(url);
// 				window.location.href=url;
// 			})
// 		})
// 	}
// 	$.fn.showsort.defaults = {
// 		defaultsort:'',
// 		defaultflag:'asc'
// 	};
	
// })(jQuery);
// //glyphicon-minus
// /*titleshow结束*/


window.onload = function() {
    if (window.applicationCache) {
        // alert("你的浏览器支持HTML5");
    } else {
        // alert("你的浏览器不支持HTML5");
        $(":text[placeholder]").each(function(){        	
        	var top=$(this).position().top+($(this).outerHeight(true)-$(this).height())/2;
        	var left=$(this).position().left+($(this).outerWidth(true)-$(this).width())/2;
			var str='<div id="'+$(this).attr("id")+'_placeholder"  style="position:absolute;top:'+top+'px;left:'+left+'px;width:'+$(this).outerWidth(true)+'px;height:'+$(this).outerHeight(true)+'px;">'+$(this).attr('placeholder')+'</div>';
			$(this).after(str);
			$(this).blur(function(){
				placeholder(this);
			});
			$(this).focus(function(){
				$("#"+$(this).attr("id")+"_placeholder").hide();
				$(this).click();
			});
			var id=$(this).attr("id");
			$("#"+$(this).attr("id")+"_placeholder").click(function(){
				$("#"+id).focus();
			})	
			$(this).blur();
			$(this).bind('input propertychange', function() {
				placeholder(this);
			})
		})
    }
}

function placeholder(obj){
	if ($(obj).val()=="") {
		$("#"+$(obj).attr("id")+"_placeholder").show();
	}else{
		$("#"+$(obj).attr("id")+"_placeholder").hide();
	}
}


 /*****
  * 打开子表添加记录
  * vWidth	弹出窗体的宽度 
  * jsonobj 弹出窗体的高度
  * pageid 子表页面的文件名
  * listid  列表tableid
  * tablename  数据库表名 形如：模式名@表名
  * bizname 模块名
  ******/
function addSubList(vWidth,vHeight,pageid,listid,tablename,bizname,vobj,vthis){	
//alert('/'+bizname+'/addSubInfo.candor?pageid='+pageid+'&pk='+pk)	;
	var pk = $('#PKEY').val();
	var pagedata = {};
	art.dialog.data("pageData",vobj);
	art.dialog.open('/'+bizname+'/addSubInfo.candor?pageid='+pageid+'&pk='+pk,{
		title:'基本信息',
		width:vWidth,height:vHeight,lock:true,
		esc:'false',id:pageid,window:top,
		ok:function(){
			
			var iframe = this.iframe.contentWindow;
			if (!iframe.document.body) {
                art.dialog.alert('页面未加载完成！');
                return false;
            };
			var objform = iframe.document.getElementById('opform');
			var submitEles = $(objform).find("input,textarea,select");
			if (!$.html5Validate.isAllpass(submitEles)){
				art.dialog.alert('请确认必填项是否填写完成！');
				return false;
			}else{
				
				submitEles.each(function(){
					eval("pagedata." + $(this).attr("name") + " = '" + $(this).val() + "'");
				});
				
				loadSubList(listid,pagedata,tablename,"35px");
				var tmps = $(vthis).parent('td').parent('tr').parent('tbody').children('tr').size()-1;
				if(tmps == 1){
					var t = $(vthis).parent('td').parent('tr').parent('tbody').children('tr:first');
					if(t.attr("class")=="muted") t.show();
				}	
				$(vthis).parent('td').parent('tr').remove();					
			}
		},
		cancel: true
	});
 }
function editSubInfo(obj)
{	var pagedata={};
	var trObj = $(obj).parent();
	//alert(trObj.parent().parent().parent().next().attr("onclick"));
	var hidObj = $(trObj).find('input[type="hidden"]');
	$(hidObj).each(function(){
		var tmpname = $(this).attr("name");
		var rName = tmpname.substring(tmpname.indexOf("-")+1,tmpname.indexOf("[]"));
		var rVal = $(this).val();
		eval("pagedata." + rName + " = '" + rVal + "'");
	})
	//alert($(obj).html());
	//var parastr = $(obj).closest("fieldset").children(".pagingbox").find("a").attr("onclick");
	var parastr=$(obj).parent().parent().parent().parent().next().attr("onclick");
	//console.log(parastr.attr("onclick"));
	//var parastr=$("#"+id).attr('onclick');
	//alert(id);
	//console.log(parastr);
	var t = parastr.substring(parastr.indexOf('(')+1,parastr.indexOf(')'));
	var paraArr = t.split(",");
	
	var pa = paraArr[0].substring(paraArr[0].indexOf("'")+1,paraArr[0].length-1);
	var pb = paraArr[1].substring(paraArr[1].indexOf("'")+1,paraArr[1].length-1);
	var pc = paraArr[2].substring(paraArr[2].indexOf("'")+1,paraArr[2].length-1);
	var pd = paraArr[3].substring(paraArr[3].indexOf("'")+1,paraArr[3].length-1);
	var pe = paraArr[4].substring(paraArr[4].indexOf("'")+1,paraArr[4].length-1);
	var pf = paraArr[5].substring(paraArr[4].indexOf("'")+1,paraArr[5].length-1);
	addSubList(pa,pb,pc,pd,pe,pf,pagedata,obj);
}
 /*****
  * 从弹出窗口的form表单中加载table列表信息
  * tbodyid 
  * jsonobj 
  * tablename
  * vIptWid
  ******/
 function loadSubList(tbodyid,jsonobj,tablename,vIptWid){
	 //alert(id);
	var td = "<tr id='tr_1'>";
	if($("#"+tbodyid+" tbody tr:first").attr("class")=="muted") $("#"+tbodyid+" tbody tr:first").hide();
	var tr =$("#"+tbodyid+" thead tr");
	var tdlen = tr.find('th').size();
	for(var j=0;j<tdlen;j++)
	{
		var vtitle = "";
		var name = tr.find('th').eq(j).attr('name');
		if(name=='TITLE-YYSJFJ'||name=='TITLE-TDZZS'||name=='TITLE-QYSDS'||name=='TITLE-OPERATE') continue;
		var t = tr.find('th').eq(j).width();
		if(t=='0'||t==0) t = vIptWid;
		if(typeof(jsonobj[name])=='undefined') vtitle = "";
		else vtitle = jsonobj[name];
		td += "<td>";
		td += vtitle;
//		td += "<input style='background-color:#FFFFFF;border:1px solid #FFFFFF;border:0px;padding:0;width:"+t+"px;' title='"+vtitle+"' name='"+tablename+"-"+name+"[]' type='text' value = '"+vtitle+"' />";
		td += "</td>";
		//alert(td);
	}	
	var vhid= "";
	for(var key in jsonobj){
		vhid += "<input name='"+tablename+"-"+key+"[]' type='hidden' value = '"+jsonobj[key]+"' />";
	}
	if(tbodyid!='auditlist')	td += "<td name='tdhidden[]'><a href='javascript:;' id='editshow' name='editshow'  onclick='editSubInfo(this)' title='修改'><i class='glyphicon glyphicon-pencil'></i></a>&nbsp;&nbsp;&nbsp;<a href='javascript:;' id='delshow' name='delshow' onclick='delListRow(this,\""+jsonobj['ID']+"\")' title='删除'><i class='glyphicon glyphicon-trash'></i></a>"+vhid+"</td>";
	td += "</tr>";
	$("#"+tbodyid+" tbody").append(td);
	
	//
 }

/*****
*  删除选中table列表中某一行
*  obj 当前删除a标签对象 
******/	
function delListRow(obj,key){
	var isok = confirm("确定删除这条信息吗?");		
	var tmps = $(obj).parent('td').parent('tr').parent('tbody').children('tr').size()-1;
	if(isok){			
		if(tmps == 1){
			var t = $(obj).parent('td').parent('tr').parent('tbody').children('tr:first');
			if(t.attr("class")=="muted") t.show();
		}	
		if(typeof(key)=='undefined'||key==''||key=='0'){
			$(obj).parent('td').parent('tr').remove();
		}else{
			$(obj).siblings('input[name$="DELFLAG[]"]').val("1");
			$(obj).parent('td').parent('tr').hide();
		}
	}
}