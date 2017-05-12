		  
		  var C1=52845;
		  var C2=22719;
          var key=1233; 
		  
//加密数组
		 // var encodingTable="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
		 //  window.encodingTable=my_splite("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/");

		  var encodingTable=new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9','+','/');
//解密数组
		  var decodingTable=new Array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
				0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
				0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 62, 0, 0, 0, 63, 52, 53,
				54, 55, 56, 57, 58, 59, 60, 61, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2,
				3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
				20, 21, 22, 23, 24, 25, 0, 0, 0, 0, 0, 0, 26, 27, 28, 29, 30,
				31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45,
				46, 47, 48, 49, 50, 51, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
				0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
				0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
				0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
				0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
				0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
				0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
				0);

			
/*加密函数开始
**********************************************************************************************************
*/


/**/


    	function enCrypt(enStr){
				
			     var tmpCode=internalEncrypt(enStr,key);
				// alert(tmpCode);
				 return postProcess(tmpCode);
			
			}
			/*
			  字符串切割成数组
			*/

			function my_splite(str)
        {
                var str_arr = new Array();

                len = str.length;
                for (i=0;i<len;i++)
                {
                        str_arr[i] = str.substring(i, i+1);
                }

                return str_arr;

        }

//生成字符数组
	function internalEncrypt(password,pkey)
			{
				var tmpBytes=my_splite(password);
				//转化成ascii码
				for(var i=0;i<tmpBytes.length;i++)
				{
				  
				  tmpBytes[i]=tmpBytes[i].charCodeAt(0);
				 // alert(tmpBytes[i]);
				}
				
			    var tmpLen=tmpBytes.length;
               // alert(tmpLen);
                var resBytes=new Array(tmpLen);
				var result=new String();


				for(var i=0 ; i<tmpLen ; i++ ){		
			
            resBytes[i]=(tmpBytes[i])^(pkey>>8);//右移8位后异或
          
			pkey = (((parseInt(resBytes[i])+(pkey&0xffff))*C1)+C2)&0xffff;  //转化成无符号的整数
			//alert(pkey);
			
			result=result+String.fromCharCode(resBytes[i]);//ascii码转化成字符
			
			
			
			
		}
				


              return result;
			
			}


			function postProcess(pwdAndkey)
			{
				
			     var enKey=new String();
				 while(pwdAndkey!="")
				{
				   var tmpSS=new String();
				   if(pwdAndkey.length>3)
					{
					 tmpSS=pwdAndkey.substring(0,3);
				     pwdAndkey=pwdAndkey.substring(3);
				   }
				   else
					{
					   tmpSS=pwdAndkey.substring(0);
					
				pwdAndkey="";
				   }
                   
				//   alert(tmpSS);
				   enKey=enKey+strencode(tmpSS);
				      
				 };
				// alert(enKey);
				 return enKey;
			   
			}


/* 把字符加密 */
			function strencode(tmpKey)
			{
			
			   var ret=new String();
			   var I=0;
			   var tmpKLen=tmpKey.length;
			   var str=new String();
			  // alert(tmpKLen);
			   //alert(tmpKey);
			   var tmpKey=tmpKey.toString();
			   for(var m=tmpKLen-1;m>=0;m--)
				{
			      

			             var x=new String();
						//转化成16进制
						 // alert(my_splite(tmpKey)[m]);
                           x=(parseInt(my_splite(tmpKey)[m].charCodeAt(0),10)).toString(16);
							// alert(x);
						 str=str+x;
						 
			   }
              
			   //str=str.toString(16);
			  // str="0x"+str;
			 
			   // alert(parseInt(str));
              //weqewsew
			   var I=parseInt(str,16);
			  // I=11952693;
			   //alert(I);
			   switch(tmpKLen)
				{
			        case 1: 
		             ret=encodingTable[I%64]+""+encodingTable[(I>>6)%64];
	  	              break;
	                case 2:
		         ret=encodingTable[I%64]+""+encodingTable[(I>>6)%64]+""+encodingTable[(I>>12)%64];
	                   break;
	                case 3:
		             ret=encodingTable[I%64]+""+encodingTable[(I>>6)%64]+""+encodingTable[(I>>12)%64]+""+encodingTable[(I>>18)%64];
			  
			          
	                     break;
	                default:
	                     break;
			   
			   
			   
			   
			   }
               //alert("***********"+ret+"**************")
			   return ret;
			
			}

 
			function deCrypt(strencodeKey)
			{
				//alert(strencodeKey);
			   var tmpS=preProcess(strencodeKey);
			   //alert(tmpS);

			   var ret=internalDecrypt(tmpS,key);

			   return ret;
			}



	        function preProcess(S)
			{
				//alert(S);
			    var enKey=new String();
				while(S!=""){  
					
					    var tmpSS=new String();
		                 	
		                if(S.length>4) {
			
			                tmpSS=S.substring(0,4);
			                S=S.substring(4);
		                 }else{
			
			                 tmpSS=S.substring(0);
			                 S="";
		                 }
					 //alert(tmpSS);
		              enKey=enKey+deCode(tmpSS);
	              } 
				// alert(enKey);
				  return enKey;
				  
			
			}

/*解码*/
     function deCode(S)
			{
				
			   var I=0;
               var res=new String();
			
			   switch(S.length)
				{
			   
			      case 2:{
   	   	  I=decodingTable[my_splite(S)[0].charCodeAt(0)]+(decodingTable[my_splite(S)[1].charCodeAt(0)]<<6);
		  res=move(I,S.length);
   	   	  break;
   	   }
   	   case 3:{
		 I=decodingTable[my_splite(S)[0].charCodeAt(0)]+(decodingTable[my_splite(S)[1].charCodeAt(0)]<<6)+(decodingTable[my_splite(S)[2].charCodeAt(0)]<<12);

		  res=move(I,S.length);
   	      break;
   	   }
   	   case 4:{
            //alert(decodingTable[my_splite(S)[0].charCodeAt(0)]);
		  I=decodingTable[my_splite(S)[0].charCodeAt(0)]+(decodingTable[my_splite(S)[1].charCodeAt(0)]<<6)+(decodingTable[my_splite(S)[2].charCodeAt(0)]<<12)+(decodingTable[my_splite(S)[3].charCodeAt(0)]<<18);
        // alert(S.length);
		  res=move(I,S.length);
   	      break;
   	   }
   	   default:break;
			   
			   
			   }
             
			  
			//alert(res);
			return res;
			}

		

            
        function move(I,strLen)
		{

			 var toHex=new String();
			 toHex=(parseInt(I,10)).toString(16);	    
             //alert(toHex);
			 var tmpLen=strLen;
			 var tmpStr=new String();
			 var tmpHex=new String();

             for(var k=tmpLen-1;k>0;k--){
			
      	               if((toHex.length)%2==0)
				 {
						 
		                  tmpHex=toHex.substring(k*2-2,k*2);
						
				 }
		               else {
			                 if((k*2-3)<0) 
						   {tmpHex=toHex.substring(0,k*2-1);
							
							 }
			                  else 
						   {tmpHex=toHex.substring(k*2-3,k*2-1);
							
							  }
		               } 

					 
		              var tmpI=parseInt(tmpHex,16);
                     //alert(tmpI);
					//  String.fromCharCode(resBytes[i])
		              tmpStr=tmpStr+ String.fromCharCode(tmpI); //按ascii码查找字符
					 
              }
			 //alert(tmpStr);
			  return tmpStr;

		}



			function internalDecrypt(strencodeKey, vKey)
			{
			  

				var tmpLen=strencodeKey.length;

			    var resBytes=new Array(tmpLen);

				var result=new String();



 

				for(var i=0 ; i<tmpLen ; i++ ){
		
			resBytes[i]=(my_splite(strencodeKey)[i].charCodeAt(0))^(vKey>>8);  //key右移8位后异或
          
			//alert(resBytes[i]);	
			
			vKey = (((my_splite(strencodeKey)[i].charCodeAt(0)+(vKey&0xffff))*C1)+C2)&0xffff;  //转化成无符号的整数
			result=result+String.fromCharCode(resBytes[i]);

				
		}

		return result;
			//alert(result);
			}