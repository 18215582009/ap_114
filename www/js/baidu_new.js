function getHouseList($url,maxX,maxY,minX,minY,isclear)
    {
        var $data = [];
        if($url==0)
        {
            $url = './house_item.php?action=getHouseList' ;
            $data = {maxX:maxX,maxY:maxY,minX:minX,minY:minY}
        }
        else $url = './house_list.php'+$url+'&action=getHouseList';
        $.ajax({
                type:'get',
                dataType:'json',
                url:$url,
                data:$data,
                timeout:30000,
                beforeSend: function(){
                   $("#t_rb").html('<img id="loadimg" src="ui/images/loading.gif" />');
                },
                success:function(msg){ 
                    str = msg.content ;
					if(isclear == undefined)
					{map.clearOverlays();}
                    var maps = msg.maps;
                    for(var i in maps)
                    {
                        var _pointX = maps[i].map_x , _pointY = maps[i].map_y ;
                        var txt = maps[i].title, mouseoverTxt = txt ,clickTxt = maps[i];
            
                        var myCompOverlay = new ComplexCustomOverlay(new BMap.Point(_pointX,_pointY), maps[i].title,mouseoverTxt,clickTxt);
                        map.addOverlay(myCompOverlay);
                    }
                    setTimeout(function(){
                        $("#t_rb").html(str) ;$("#t_rb").append(msg.page);
                    },200)
                    $("#s_count").html(msg.count) ;
                
                },
                error:function (XMLHttpRequest, textStatus, errorThrown) {
                    
                }
            });
    }
    
    function ComplexCustomOverlay(point, text, mouseoverText,clickTxt){
          this._point = point;
          this._text = text;
          this._overText = mouseoverText;
          this._clickTxt = clickTxt;
    }
    // 复杂的自定义覆盖物
        ComplexCustomOverlay.prototype = new BMap.Overlay();
        ComplexCustomOverlay.prototype.initialize = function(map){
          this._map = map;
          var div = this._div = document.createElement("div");
          div.style.position = "absolute";
          div.style.zIndex = BMap.Overlay.getZIndex(this._point.lat);
          div.style.background = "url(/theme/agency/img/marker_house.png) left 0";
          div.style.color = "white";
          div.style.height = "33px";
          div.style.padding = "0 0 0 20px";
          div.style.lineHeight = "24px";
          div.style.whiteSpace = "nowrap";
          div.style.MozUserSelect = "none";
          div.style.fontSize = "12px"
          var span = this._span = document.createElement("span");
          span.style.background = "url(/theme/agency/img/marker_house.png) no-repeat right 0";
          span.style.position = "absolute";
          span.style.width = "auto";
          span.style.height = "33px";
          div.style.lineHeight = "24px";
          div.style.cursor = "pointer";
          span.style.padding = "0 10px 0 0 ";

          span.style.overflow = "hidden";
          div.appendChild(span);
          span.appendChild(document.createTextNode(this._text));      
          var that = this;
		  var zIndex = 0 ;
         
          div.onmouseover = function(){
            this.getElementsByTagName("span")[0].innerHTML = that._overText;
            div.style.backgroundPosition = "left -50px";
            span.style.backgroundPosition = "right -50px";
			zIndex = div.style.zIndex ;
			div.style.zIndex = 0 ;
          }

          div.onmouseout = function(){
            this.getElementsByTagName("span")[0].innerHTML = that._text;
            div.style.backgroundPosition = "left 0px";
            span.style.backgroundPosition = "right 0px";
			div.style.zIndex = zIndex ;
          }
          div.onclick = function(){
              var cTxt = that._clickTxt ;
              createInfoWindow(cTxt);
          }
          
          map.getPanes().labelPane.appendChild(div);
          
          return div;
        }
        ComplexCustomOverlay.prototype.draw = function(){
          var map = this._map;
          var pixel = map.pointToOverlayPixel(this._point);
          this._div.style.left = pixel.x + "px";
          this._div.style.top  = pixel.y - 30 + "px";
        }

    function createInfoWindow(content){
        var table='',price = 0,link_require='';
        if(content.house_type=='2')price = content.price+'万';
        else price = content.price+'元/月';
        
        table = '<div class="citem">';
        
        table += '<table width="600" cellspacing="0" cellpadding="0" border="0">';
        table += '<tr>' ;
        table += '<td width="112" align="left" rowspan="4"><a href="/house_item.php?sp='+content.sp+'"><img src="'+content.image_path+'" height="75" width="100"></a></td>';
        table +='<td width="503" align="left"><a href="/house_item.php?sp='+content.sp+'" class="title">'+content.title+'</a></td>' ;
        table +='<td width="150"><span class="price">'+price+'</span></td>';
        table += '</tr>';
        table += '<tr>';
        table +='<td height="20">'+content.address+'</td>';
        table +='<td rowspan="3" width="150" class="func"><div class="linkway" id="link_'+content.id+'">'; 

         table +='</div></td>';
         table +='</tr>';
         table +='<tr>';
         table += '<td height="20">';
         table += '，单价'+content.price+'元/平米';
         table +='</td>';
         table += '</tr> </table></div>';
        var _width = $("#container").width();
        var _height = $("#container").height();
        var _left = $("#container").offset().left;
        var _top = $("#container").offset().top;
        $('#showBox').html(table);
        $('.citem').css({'top':_top+((_height-$('.citem').height())/2)+'px','left':_left+((_width-$('.citem').width())/2)+'px','position':'absolute','z-index':'999'}).show();
    }

    /**
    * 得到圆的内接正方形bounds
    * @param {Point} centerPoi 圆形范围的圆心
    * @param {Number} r 圆形范围的半径
    * @return 无返回值
    */
    function getSquareBounds(centerPoi,r){
        var a = Math.sqrt(2) * r; //正方形边长

        mPoi = getMecator(centerPoi);
        var x0 = mPoi.x, y0 = mPoi.y;

        var x1 = x0 + a / 2 , y1 = y0 + a / 2;//东北点
        var x2 = x0 - a / 2 , y2 = y0 - a / 2;//西南点
		var point = [];
        point['ne'] = getPoi(new BMap.Pixel(x1, y1));
		point['sw'] = getPoi(new BMap.Pixel(x2, y2));
        
		return point;

    }
    //根据球面坐标获得平面坐标。
    function getMecator(poi){
        return map.getMapType().getProjection().lngLatToPoint(poi);
    }
    //根据平面坐标获得球面坐标。
    function getPoi(mecator){
        return map.getMapType().getProjection().pointToLngLat(mecator);
    }
