<?php
namespace lib\util;

class Base64{


	static  $key=1233;
	static  $C1=52845;
    static  $C2=22719;
 /*加密数组*/
  static $encodingTable="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
  
 /*解密数组*/
  static $decodingTable=array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
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
/*加密函数开始*******************************************************************************************/

public function enCrypt($enStr)
{
	$tmpCode=$this->internalEncrypt($enStr,self::$key);
	return $this->postProcess($tmpCode);
}

//生成字符数组
public function internalEncrypt($password, $pkey)
{
	$tmpBytes= str_split($password);//生成字符数组
	//转化成ascii码
	for($i=0;$i<count($tmpBytes);$i++)
	{
		$tmpBytes[$i]=ord($tmpBytes[$i]);
	}

	$tmpLen=count($tmpBytes);
	$resBytes=array();
	$result="";
	for($i=0;$i<$tmpLen;$i++)
	{
		//if($i%3) $pkey=0;
		$resBytes[$i]=($tmpBytes[$i])^($pkey>>8);//右移8位后异或
		$pkey=((($resBytes[$i]+($pkey&0xffff))*(self::$C1))+(self::$C2))&(0xffff); //转化成无符号的整数
		$result=$result.chr($resBytes[$i]);
		//echo $resBytes[$i].'internal='.$i.'=Encrypt=='.$result.'=pkey'.$pkey.'=tmpBytes'.$tmpBytes[$i].'<br/>';
	}

	return $result;
}

public function postProcess($pwdAndkey)
	{

	
          $enKey='';$i=1;
			while($pwdAndkey!="")
		{
				

			$tmpSS;

				if(strlen($pwdAndkey)>3)
				{
					$tmpSS=substr($pwdAndkey,0,3);
					$pwdAndkey=substr($pwdAndkey,3);
				
				}
				else
				{
					
				  $tmpSS=substr($pwdAndkey,0);
				  $pwdAndkey="";
				
				}

			            $i++;
			//echo $i.'=='.$tmpSS;
			$enKey=$enKey.$this->encode($tmpSS);
//echo '=='.$enKey.'<br/>';
			}

			
			return $enKey;
			

}

/* 把字符加密 */
public function encode($tmpKey)
	{


           $ret;
		   $I=0;
		   $tmpKLen=strlen($tmpKey);
		   $str='';
     
		   for($m=$tmpKLen-1;$m>=0;$m--){
			   
			$x=dechex(ord($tmpKey[$m]));//转化成16进制
			if(strlen(dechex(ord($tmpKey[$m])))==1) $x='0'.dechex(ord($tmpKey[$m]));
		    $str=$str.$x;
	
		   }

           // 转化成10进制
		   $I=hexdec($str);
		
		switch($tmpKLen)
		{
		
		   case 1: 
		            $ret=self::$encodingTable[$I%64]."".self::$encodingTable[($I>>6)%64];
	  	              break;
	                case 2:
		       $ret=self::$encodingTable[$I%64]."".self::$encodingTable[($I>>6)%64]."".self::$encodingTable[($I>>12)%64];
	                   break;
	                case 3:
		             $ret=self::$encodingTable[$I%64]."".self::$encodingTable[($I>>6)%64]."".self::$encodingTable[($I>>12)%64]."".self::$encodingTable[($I>>18)%64];
			  
			 
	                     break;
	                default:
	                     break;
		
		
		
		}
    return $ret;


}



/*加密函数结束***********************************************************************************/





/*解密函数开始***********************************************************************************/


public function deCrypt($enCodeKey)
	{

            $tmpS=$this->preProcess($enCodeKey);

            $ret=$this->internalDecrypt($tmpS,self::$key);

			return $ret;

}
/*处理字符*/
public function preProcess($S)
	{

          
			 $enKey;
			 while($S!="")
		{
			 
			 $tmpSS;
			 if(strlen($S)>4)
			{
			 
			 $tmpSS=substr($S,0,4);
			 $S=substr($S,4);
			 }
			 else{
			 
			 $tmpSS=substr($S,0);
			 $S="";
			 
			 }
			// echo $tmpSS;
			 $enKey=$enKey.$this->deCode($tmpSS);
			 }

			 return $enKey;

}


/*解码*/
public function deCode($S)
	{

         
           $I=0;
		   $res;
		   switch(strlen($S))
		{
		   
		   
		   	      case 2:{
   	   	$I=self::$decodingTable[ord($S[0])]+(self::$decodingTable[ord($S[1])]<<6);
		 $res=$this->move($I,strlen($S));
   	   	 // break;
   	   }
   	   case 3:{
		$I=self::$decodingTable[ord($S[0])]+(self::$decodingTable[ord($S[1])]<<6)+(self::$decodingTable[ord($S[2])]<<12);
		 $res=$this->move($I,strlen($S));
   	      break;
   	   }
   	   case 4:{
		$I=self::$decodingTable[ord($S[0])]+(self::$decodingTable[ord($S[1])]<<6)+(self::$decodingTable[ord($S[2])]<<12)+(self::$decodingTable[ord($S[3])]<<18);



        
		  $res=$this->move($I,strlen($S));
   	      break;
   	   }
   	   default:break;
			   
		   
		   
		   }

return $res;

}



public function move($I,$strLen)
	{



       $toHex=dechex($I);//转化成16进制		
	

	   $tmpLen=$strLen;
	   $tmpStr;
	   $tmpHex;

	   for($k=$tmpLen-1;$k>0;$k--)

		{
		    if(strlen($toHex)%2==0)
				{
				$tmpHex=$this->getsubstr($toHex,$k*2-2,$k*2);//用自定义的截取子串操作
				
			
			}
			else{

				if(($k*2-3)<0)
				{
					$tmpHex=$this->getsubstr($toHex,0,$k*2-1);
			
				
				}
				else{
					$tmpHex=$this->getsubstr($toHex,$k*2-3,$k*2-1);
			
				
				}
			
			
			}
          
			$tmpI=hexdec($tmpHex);
			
		    $tmpStr=$tmpStr.chr($tmpI);//按ascii码查找字符
		
		
		
		}
	   
     
  return $tmpStr;


}

/*因为java、javascript的substring与php的substr函数定义不同，所以重写自定义的截取子串函数统一*/
public function getsubstr($str,$start,$end)
	{
      

	  $resultstr;
	  if($start<$end  )
		{
		  for($i=$start;$i<$end;$i++)
			{
		        $resultstr=$resultstr.$str[$i];
		  }
	  
	  }
	  else{

		  for($i=$end;$i<$start;$i++)
			{
		        $resultstr=$resultstr.$str[$i];
		  }
	  
	  
	  }

    return $resultstr;


}


public function internalDecrypt($enCodeKey,$vKey)
	{

           
             $tmpLen=strlen($enCodeKey);
			 $resBytes=array();
			 $result;
			 for($i=0;$i<$tmpLen;$i++)
		{
			 
			  $resBytes[$i]=(ord($enCodeKey[$i]))^($vKey>>8);//key右移8位后异或
			//  echo "********".$resBytes[$i]."************";
			  $vKey=(((ord($enCodeKey[$i])+($vKey&0xffff))*self::$C1)+self::$C2)&0xffff;   //转化成无符号的整数

			  $result=$result.chr($resBytes[$i]);
			 
			 }

          return $result;

}












}



?>
