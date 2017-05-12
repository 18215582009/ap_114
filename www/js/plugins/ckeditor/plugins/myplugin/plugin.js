CKEDITOR.plugins.add('myplugin',   
    {          
		requires : ['dialog'],   
        init : function (editor)   
        {   
            module = module_array;
			var pluginName = 'myplugin';   

            //加载自定义窗口，就是dialogs前面的那个/让我纠结了很长时间   
            //CKEDITOR.dialog.add('myDialog',this.path + "/dialogs/mydialog.js"); 

            //给自定义插件注册一个调用命令   
            editor.addCommand( pluginName, new CKEDITOR.dialogCommand( 'myDialog' ) );   
               
            //注册一个按钮，来调用自定义插件   
            editor.ui.addButton('MyButton',   
                    {   
                        //editor.lang.mine是我在zh-cn.js中定义的一个中文项，   
                        //这里可以直接写英文字符，不过要想显示中文就得修改zh-cn.js   
                        label : editor.lang.mine,   
						icon: this.path + 'logo_ckeditor.jpg',
                        command : pluginName   
                    }); 
			
			CKEDITOR.dialog.add( 'myDialog', function( editor ){
			return {
			title : '添加逻辑处理结果',
			minWidth : 350,
			minHeight : 100,
			contents : [
			{
				id : 'tab1',
				label : 'First Tab',
				title : 'First Tab',
				elements :
				[
					{
					id : 'pagetitle',
					type : 'select',
					label : '请选择添加的逻辑代码类型<br />(如果添加，必须选择，否则合同信息将显示不完全！)',
					'default':'',
					items : module
					//items:[[editor.lang.textfield.owner,'共有人'],[editor.lang.textfield.pay,'支付方式']]
					}
				]
			}
			],
			onOk : function()
			{
				if(this.getValueOf('tab1','pagetitle')!='')
				{
					for(var i=0; i<module.length; i++){
						if(module[i][1]==String(this.getValueOf('tab1','pagetitle'))){
							editor.insertHtml('<span id="'+this.getValueOf('tab1','pagetitle')+'" style="color:red; width:98%; text-align:center; background:#EBEBEB; line-height:30px; border:1px solid #ccc">'+module[i][0]+'</span>');
							break;
						}
					}
				}else{
					editor.insertHtml("[@module="+this.getValueOf( 'tab1', 'pagetitle' )+"@]");
				}
				//<div id="houseinfo" style="color:red; width:98%; text-align:center; background:#EBEBEB; line-height:30px; border:1px solid #ccc">'+this.getValueOf( 'tab1', 'pagetitle' )+'</div>
				//editor.insertHtml("[@module="+this.getValueOf( 'tab1', 'pagetitle' )+"@]");
			}
			};
			});
        }   
    }   
);  
