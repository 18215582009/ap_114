// JavaScript Document
// 鼠标上去显示div层
var qTipTag = "a,div,img,td"; //Which tag do you want to qTip-ize? Keep it lowercase!//
var qTipX = 0; //This is qTip's X offset//
var qTipY = 15; //This is qTip's Y offset//

//There's No need to edit anything below this line//
tooltip = {
  name : "qTip",
  offsetX : qTipX,
  offsetY : qTipY,
  tip : null
} 

tooltip.init = function () {
	var tipNameSpaceURI = "http://www.w3.org/1999/xhtml";
	if(!tipContainerID){ var tipContainerID = "qTip";}
	var tipContainer = document.getElementById(tipContainerID);
	if(!tipContainer) {
	  tipContainer = document.createElementNS ? document.createElementNS(tipNameSpaceURI, "div") : document.createElement("div");
		tipContainer.setAttribute("id", tipContainerID);
	  document.getElementsByTagName("body").item(0).appendChild(tipContainer);
	}

	if (!document.getElementById) return;
	this.tip = document.getElementById (this.name);
	if (this.tip) document.onmousemove = function (evt) {tooltip.move (evt)};

	var a, sTitle, elements;
	
	var elementList = qTipTag.split(",");
	for(var j = 0; j < elementList.length; j++)
	{	
		elements = document.getElementsByTagName(elementList[j]);
		if(elements)
		{
			for (var i = 0; i < elements.length; i ++)
			{
				a = elements[i];
				sTitle = a.getAttribute("img");				
				if(sTitle)
				{
					a.setAttribute("tiptitle", sTitle);
					a.removeAttribute("img");
					a.removeAttribute("alt");
					a.onmouseover = function() {tooltip.show(this.getAttribute('tiptitle'))};
					a.onmouseout = function() {tooltip.hide()};
				}
			}
		}
	}
}

tooltip.move = function (evt) {
	var x=0, y=0;
	if (document.all) {//IE
		x = (document.documentElement && document.documentElement.scrollLeft) ? document.documentElement.scrollLeft : document.body.scrollLeft;
		y = (document.documentElement && document.documentElement.scrollTop) ? document.documentElement.scrollTop : document.body.scrollTop;
		x += window.event.clientX;
		y += window.event.clientY;
		
	} else {//Good Browsers
		x = evt.pageX;
		y = evt.pageY;
	}
	this.tip.style.left = (x + this.offsetX) + "px";
	this.tip.style.top = (y + this.offsetY) + "px";
}

tooltip.show = function (text) {
	if (!this.tip) return;
	var oTxt = document.createElement("img");
	var oLoader = document.createElement("img");
	var oImg = new Image();
	oLoader.src = "../images/loader.gif";
	this.tip.appendChild(oLoader);
	oImg.onload = function(){
				var qTip_1 = document.getElementById('qTip');
				oTxt.src=text;
				qTip_1.innerHTML="";
				qTip_1.appendChild(oTxt);
				//alert(text);
	}
	oImg.src = text;
	//this.tip.innerHTML = text;
	this.tip.style.display = "block";
}

tooltip.hide = function () {
	if (!this.tip) return;
	this.tip.innerHTML = "";
	this.tip.style.display = "none";
}

window.onload = function () {
	tooltip.init ();
}