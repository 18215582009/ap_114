//图片平移轮播开始
function pingyimove(btn1,btn2,box,mos,parent){
	var liShu=$(box).first().children().length;
	var liWidth=$(box).children().width();
	var ulWidth=liWidth*liShu;
	var num=0;
	var move=0;
	$(box).css('width',''+ulWidth+'px');
	$(mos).children().click(function(){
		$(this).addClass('current').siblings().removeClass('current');
		$(this).closest(parent).find(box).stop().animate({'left':''+$(this).index()*-liWidth+'px'},500);
	})
	$(btn1).click(function(){
		move+=liWidth;
		num--;
		if(num<0){
			num=liShu-1;
			move=-(ulWidth-liWidth);
		}
		$(this).closest(parent).find(box).stop().animate({'left':''+move+'px'},500);
		$(this).closest(parent).find(mos).children().eq(num).addClass('current').siblings().removeClass('current');
	})
	$(btn2).click(function(){
		move-=liWidth;
		num++;
		if(num>liShu-1){
			move=0;
			num=0;
		}
		$(this).closest(parent).find(box).stop().animate({'left':''+move+'px'},500);
		$(this).closest(parent).find(mos).children().eq(num).addClass('current').siblings().removeClass('current');
	})
}
//图片平移轮播结束
//单步平移展示效果开始
function Move(btn1,btn2,box,btnparent,shu){
	var llishu=$(box).first().children().length
	var liwidth=$(box).children().width();
	var boxwidth=llishu*liwidth;
	var shuliang=llishu-shu;
	$(box).css('width',''+boxwidth+'px');
	var num=0;
	$(btn1).click(function(){
		num++;
		if (num>shuliang) {
			num=shuliang;
		}
		var move=-liwidth*num;
		$(this).closest(btnparent).find(box).stop().animate({'left':''+move+'px'},500);
	});
	$(btn2).click(function(){
		num--;
		if (num<0) {
			num=0;
		}
		var move=liwidth*num;
		$(this).closest(btnparent).find(box).stop().animate({'left':''+-move+'px'},500);
	})
}
//单步平移展示效果结束
//左右tab切换栏开始
function zyTab(btn,box,parent){
	var btnliwidth=$(btn).children().width();
	var boxliwidth=$(box).children().width();
	$(btn).children().mouseover(function(){
		$(this).closest(parent).find(btn).siblings().stop().animate({'left':''+btnliwidth*$(this).index()+'px'},500);
		$(this).closest(parent).find(box).children().eq($(this).index()).show().siblings().hide();
	})
}
//左右tab切换栏结束
//鼠标经过图片移动一点开始
function PicMove(box){
	$(box).children().mouseenter(function(){
		$(this).children('img').stop().animate({'left':'-10px'},300);
	}).mouseleave(function(){
		$(this).children('img').stop().animate({'left':'0px'},300);
	})
}
//鼠标经过图片移动一点结束