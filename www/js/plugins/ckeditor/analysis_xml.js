/*
Copyright (c) 2010-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
var module_array = [];

loadXML = function(xmlFile)
{
　　var xmlDoc;
	// code for IE
	if (window.ActiveXObject)
	{
	  xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
	}
	// code for Mozilla, Firefox, Opera, etc.
	else if (document.implementation && document.implementation.createDocument)
	{
	  xmlDoc=document.implementation.createDocument("","",null);
	}
	else
	{
	  alert('Your browser cannot handle this script');
	  return null;
	}
	xmlDoc.async=false;
	xmlDoc.load(xmlFile);
	return(xmlDoc);
}

analysisXMLDocObj = function(xmlFile)
{
　　var xmlDoc = loadXML(xmlFile);
	var arrNode=[];
　　if(xmlDoc==null)
　　{
　　	alert('您的浏览器不支持xml文件读取,于是本页面禁止您的操作,推荐使用IE5.0以上可以解决此问题!');
　　	window.location.href='/';
　　}else{
		//获取模块
		moduleNode=xmlDoc.getElementsByTagName("item");
		
		for (var i=0;i<moduleNode.length;i++)
		{
					
			arrNode[i]=new Array();
			arrNode[i][0]=moduleNode[i].getAttribute("title");
			arrNode[i][1]=moduleNode[i].getAttribute("name");
			/* 去属性 
			//var item=moduleNode[i].attributes;	
			if(item.getNamedItem("logicname")!=null){
				tplString=item.getNamedItem("tpl").nodeValue;
				tplArr = tplString.split(",");
				for (var k = 0; k < tplArr.length; k++) { 
					tpl = tplArr[k].split("-");
					arrNode[j]=new Array();
					arrNode[j][0]=tpl[0];
					arrNode[j][1]=tpl[1];
					j++;
				}
			}
			*/
		}
	}
　　return arrNode;
};

// 然后开始获取需要的Login/Weapon/W的第一个节点的属性值 
var module_array = analysisXMLDocObj("/contracttpl_config.xml");
//module_array=analysisXMLDocObj("/js/plugins/ckeditor/System_fcxx.xml");

//手动配置
/*module_array = new Array();
module_array[0] = new Array();
module_array[0][0] = '房屋信息1';
module_array[0][1] = 'houseInfo1';

module_array[1] = new Array();
module_array[1][0] = '房屋信息2';
module_array[1][1] = 'houseInfo2';

module_array[2] = new Array();
module_array[2][0] = '买受人详细信息';
module_array[2][1] = 'buyInfo';

module_array[3] = new Array();
module_array[3][0] = '买受人姓名列表，多人以逗号分隔';
module_array[3][1] = 'buyNameList';

module_array[4] = new Array();
module_array[4][0] = '出卖人详细信息';
module_array[4][1] = 'saleInfo';

module_array[5] = new Array();
module_array[5][0] = '出卖人姓名列表，多人以逗号分隔';
module_array[5][1] = 'saleNameList';

module_array[6] = new Array();
module_array[6][0] = '抵押人详细信息';
module_array[6][1] = 'mortgageInfo';

module_array[7] = new Array();
module_array[7][0] = '抵押人姓名列表，多人以逗号分隔';
module_array[7][1] = 'mortgageNameList';

module_array[8] = new Array();
module_array[8][0] = '出卖方委托代理人详细信息';
module_array[8][1] = 'saleProxyInfo';

module_array[9] = new Array();
module_array[9][0] = '出卖方委托代理人姓名列表，多人以逗号分隔';
module_array[9][1] = 'saleProxyNameList';

module_array[10] = new Array();
module_array[10][0] = '付款方式';
module_array[10][1] = 'payMethod';

*/

