/* wx.config({
    debug: false,
    appId: appId,
    timestamp: timestamp,
    nonceStr: nonceStr,
    signature: signature,
    jsApiList: [
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo'
      ]
});
	  
wx.config({
"debug":false,
"appId":"wx959d84544b0e1ad2",
"timestamp":1462787801,
"nonceStr":"3ygxorVjs6ViZrIh",
"signature":"4e89e6eb029347569b933b475388297f3d307fff",
"jsApiList":[
	"checkJsApi",
	"onMenuShareTimeline",
	"onMenuShareAppMessage",
	"onMenuShareQQ",
	"onMenuShareWeibo",
	"hideMenuItems",
	"showMenuItems","hideAllNonBaseMenuItem","showAllNonBaseMenuItem",
	"translateVoice","startRecord","stopRecord","onRecordEnd","playVoice",
	"pauseVoice","stopVoice","uploadVoice","downloadVoice","chooseImage",
	"previewImage","uploadImage","downloadImage","getNetworkType","openLocation",
	"getLocation","hideOptionMenu","showOptionMenu","closeWindow","scanQRCode",
	"chooseWXPay","openProductSpecificView","addCard","chooseCard","openCard"]
	})
*/
function share(){
	TempCache.setItem(curData,2); 
}

wx.error(function (res) {
  alert(res.errMsg);
});
wx.ready(function () {
  var shareData = {
		title: title,
		desc: desc,
		link: link,
		imgUrl: imgurl,
		trigger: function (res) {
			// 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
			//alert('用户点击发送给朋友');
		},
		success: function (res) {
			share();
			alert('恭喜您，获得再次抽奖机会！');
		},
		cancel: function (res) {
			//alert('已取消');
		},
		fail: function (res) {
			alert(JSON.stringify(res));
		}
  };
  wx.onMenuShareAppMessage(shareData);
  wx.onMenuShareTimeline(shareData);
});

