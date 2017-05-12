/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.dialog.add('textfield',
	function(a){
		var b={value:1,size:1,maxLength:1},c={text:1,password:1};
		return{
				title:a.lang.textfield.title,
				minWidth:350,
				minHeight:150,
		onShow:function(){
					var e=this;delete e.textField;
					var d=e.getParentEditor().getSelection().getSelectedElement();
					if(d&&d.getName()=='input'&&(c[d.getAttribute('type')]||!d.getAttribute('type'))){e.textField=d;e.setupContent(d);}
					},
		onOk:function(){
							var d,e=this.textField,f=!e;
							if(f){
									d=this.getParentEditor();
									e=d.document.createElement('input');
									e.setAttribute('type','text');
								}
							if(f)d.insertElement(e);this.commitContent({element:e});
						},

		onLoad:function(){
					var d=function(f){
						var g=f.hasAttribute(this.id)&&f.getAttribute(this.id);
						this.setValue(g||'');
					},
					e=function(f){var g=f.element,h=this.getValue();if(h)g.setAttribute(this.id,h);else g.removeAttribute(this.id);};
					this.foreach(function(f){if(b[f.id]){f.setup=d;f.commit=e;}});
				},

			contents:[{id:'info',label:a.lang.textfield.title,title:a.lang.textfield.title,
			elements:[
			{type:'hbox',widths:['50%','50%'],
					   children:[{
									id:'_cke_saved_name',
									type:'text',
									label:a.lang.textfield.name,
									'default':'',
									accessKey:'N',
									setup:function(d){this.setValue(d.getAttribute('_cke_saved_name')||d.getAttribute('name')||'');},
									commit:function(d){
									var e=d.element;
									if(this.getValue())e.setAttribute('_cke_saved_name',this.getValue());else{
										//e.removeAttribute('_cke_saved_name');e.removeAttribute('name');
										e.setAttribute('_cke_saved_name','input_'+randomChar(12));
									}}
								},
								{id:'value',type:'text',label:a.lang.textfield.value,'default':'',accessKey:'V'}
								]
				},
				{
					type:'hbox',widths:['50%','50%'],
					children:[{id:'size',type:'text',label:a.lang.textfield.charWidth,'default':'',accessKey:'C',
								style:'width:50px',validate:CKEDITOR.dialog.validate.integer(a.lang.common.validateNumberFailed)},
							{id:'maxLength',type:'text',label:a.lang.textfield.maxChars,'default':'',accessKey:'M',
								style:'width:50px',validate:CKEDITOR.dialog.validate.integer(a.lang.common.validateNumberFailed)}
							]
				},
				{//罗东扩展，添加input是否只读功能
					type:'hbox',
					children:[{id:'readonly',type:'checkbox',label:'是否只读','default':'',accessKey:'M',value:'true',
							   style:'width:10px',
							   setup:function(d){
									this.setValue(d.getAttribute('readonly'));
								},
							   commit:function(d){
									var e=d.element;
									if(!CKEDITOR.env.ie){
										if(this.getValue())e.setAttribute('readonly',this.getValue());else e.removeAttribute('readonly');
									}else{
										var f=e.getAttribute('readonly'),g=this.getValue();
										if(f!=g){
											var h=CKEDITOR.dom.element.createFromHtml('<input type="text"'+(g?' readonly="readonly"':'')+'></input>',a.document);
											e.copyAttributes(h,{type:1,readonly:1});
											h.replace(e);
											a.getSelection().selectElement(h);
											d.element=h;
										}
									}
								}
							 }]
				},

				{//罗东扩展， 添加input是否必填
					type:'hbox',
					children:[{id:'required',type:'checkbox',label:'是否必填','default':'',accessKey:'M',value:'true',
							   style:'width:10px',
							   setup:function(d){
									this.setValue(d.getAttribute('required'));
								},
							   commit:function(d){
									var e=d.element;
									if(!CKEDITOR.env.ie){
										if(this.getValue())e.setAttribute('required',this.getValue());else e.removeAttribute('required');
									}else{
										var f=e.getAttribute('required'),g=this.getValue();
										if(f!=g){
											var h=CKEDITOR.dom.element.createFromHtml('<input type="text"'+(g?' required="required"':'')+'></input>',a.document);
											e.copyAttributes(h,{type:1,required:1});
											h.replace(e);
											a.getSelection().selectElement(h);
											d.element=h;
										}
									}
								}
							 }]
				},

				{//罗东扩展，表单验证
					id:'focus',type:'select',label:'表单验证','default':'',accessKey:'M',
								items:[['是否需要添加验证',""],
									   ['email验证',"popHint(this,'email','blur')"],
									   ['房地产销售人员注册编号验证',"popHint(this,'verifyZcbh','blur')"],
									   ['数字验证',"popHint(this,'number','blur')"],
									   ['时间控件',"WdatePicker({isShowClear:false,readOnly:true})"]],
						   //setup:function(d){this.setValue(d.getAttribute('focus'));alert(d.getAttribute('focus'));},
							setup:function(d){this.setValue(d.getAttribute('focus'));},

						    commit:function(d){
								var e=d.element;
								if(!CKEDITOR.env.ie){
									//e.setAttribute('focus',this.getValue());
									if(this.getValue()){
										e.setAttribute('focus',this.getValue());
									}else{
										e.removeAttribute('focus');
									}
								}else{
									var f=e.getAttribute('focus'),g=this.getValue();

									if(f!=g){
										var h=CKEDITOR.dom.element.createFromHtml('<input type="text"'+(g?' focus="'+g+'"':'')+'"></input>',a.document);
										e.copyAttributes(h,{type:1,focus:1});
										h.replace(e);
										a.getSelection().selectElement(h);
										d.element=h;
									}
								}
							}
							 
				},

				{//罗东扩展，表单权限
					id:'access',type:'select',label:'修改权限','default':'-123',accessKey:'M',
								items:[['所有人',"-123"],
									   ['房管局管理员',"150171"],
									   ['开发商管理员',"150139,150171"]],
							setup:function(d){this.setValue(d.getAttribute('access'));},

						    commit:function(d){
								var e=d.element;
								if(!CKEDITOR.env.ie){
									//e.setAttribute('focus',this.getValue());
									if(this.getValue()){
										e.setAttribute('access',this.getValue());
									}else{
										e.removeAttribute('access');
									}
								}else{
									var f=e.getAttribute('access'),g=this.getValue();

									if(f!=g){
										var h=CKEDITOR.dom.element.createFromHtml('<input type="text"'+(g?' access="'+g+'"':'')+'"></input>',a.document);
										e.copyAttributes(h,{type:1,access:1});
										h.replace(e);
										a.getSelection().selectElement(h);
										d.element=h;
									}
								}
							}
							 
				},

				{id:'type',type:'select',label:a.lang.textfield.type,'default':'text',accessKey:'M',
								items:[[a.lang.textfield.typeText,'text'],
									   [a.lang.textfield.typePass,'password']],
								setup:function(d){this.setValue(d.getAttribute('type'));},

					commit:function(d){
						var e=d.element;
						if(CKEDITOR.env.ie){
							var f=e.getAttribute('type'),g=this.getValue();
							if(f!=g){
								var h=CKEDITOR.dom.element.createFromHtml('<input type="'+g+'"></input>',a.document);
								e.copyAttributes(h,{type:1});h.replace(e);a.getSelection().selectElement(h);d.element=h;
							}
						}else e.setAttribute('type',this.getValue());
					}
				}
				]}]
				};
		});




function  randomChar(length)  {
  var  x="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ";
  var  tmp="";
  for(var i=0;i<length;i++)  {
	tmp  +=  x.charAt(Math.ceil(Math.random()*100000000)%x.length);
  }
  tmp += "_auto";
  return  tmp;
}
