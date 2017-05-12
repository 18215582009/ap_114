function houseTbl(tableID, hno,uno,fno,rno,struct,usage,area,outArea,price,totFloor,upFloor,downFloor,floorHeight,fitMentLevel,fitMenttStandard,status)
	{
	    this.tableID = tableID;
	    this.hno = hno;    
	    this.uno = uno;   
	    this.fno = fno;  
	    this.rno = rno;
	    this.struct = struct;    
	    this.usage = usage;   
	    this.area = area;  	 
	    this.outArea=outArea; 
	    this.price=price;  
	    this.totFloor=totFloor;
	    this.upFloor=upFloor;
	    this.downFloor=downFloor;
	    this.floorHeight=floorHeight;
	    this.fitMentLevel=fitMentLevel;
	    this.fitMenttStandard=fitMenttStandard;
	    this.status=status;
	    
	    
	    this.setArea=houseTbl_set_area;
	    this.setOutArea=houseTbl_set_outarea;
	    this.setPrice=houseTbl_set_price;
	}
	function houseTbl_set_area(iarea){
		this.area=iarea;
	}
	function houseTbl_set_outarea(iOutArea){
		this.outArea=iOutArea;
	}
	function houseTbl_set_price(iprice){
		this.price=iprice;
	}		
function Hashtable(){
    this.clear = hashtable_clear;
    this.containsKey = hashtable_containsKey;
    this.containsValue = hashtable_containsValue;
    this.get = hashtable_get;
    this.isEmpty = hashtable_isEmpty;
    this.keys = hashtable_keys;
    this.put = hashtable_put;
    this.remove = hashtable_remove;
    this.size = hashtable_size;
    this.toString = hashtable_toString;
    this.values = hashtable_values;
    this.hashtable = new Array();
}

/*=======Private methods for internal use only========*/

function hashtable_clear(){
    this.hashtable = new Array();
}

function hashtable_containsKey(key){
    var exists = false;
    for (var i in this.hashtable) {
        if (i == key && this.hashtable[i] != null) {
            exists = true;
            break;
        }
    }
    return exists;
}

function hashtable_containsValue(value){
    var contains = false;
    if (value != null) {
        for (var i in this.hashtable) {
            if (this.hashtable[i] == value) {
                contains = true;
                break;
            }
        }
    }
    return contains;
}

function hashtable_get(key){
    return this.hashtable[key];
}

function hashtable_isEmpty(){
    return (parseInt(this.size()) == 0) ? true : false;
}

function hashtable_keys(){
    var keys = new Array();
    for (var i in this.hashtable) {
        if (this.hashtable[i] != null) 
            keys.push(i);
    }
    return keys;
}

function hashtable_put(key, value){
    if (key == null || value == null) {
        throw "NullPointerException {" + key + "},{" + value + "}";
    }else{
        this.hashtable[key] = value;
    }
}

function hashtable_remove(key){
    var rtn = this.hashtable[key];
    this.hashtable[key] = null;
    return rtn;
}

function hashtable_size(){
    var size = 0;
    for (var i in this.hashtable) {
        if (this.hashtable[i] != null) 
            size ++;
    }
    return size;
}

function hashtable_toString(){
    var result = "";
    for (var i in this.hashtable)
    {      
        if (this.hashtable[i] != null) 
            result += "{" + i + "},{" + this.hashtable[i] + "}\n";   
    }
    return result;
}

function hashtable_values(){
    var values = new Array();
    for (var i in this.hashtable) {
        if (this.hashtable[i] != null) 
            values.push(this.hashtable[i]);
    }
    return values;
}

 function FormatNumber(srcStr,nAfterDot){ 
    var srcStr,nAfterDot; 
    var resultStr,nTen; 
   srcStr = ""+srcStr+""; 
   strLen = srcStr.length; 
   dotPos = srcStr.indexOf(".",0); 
   if (dotPos == -1){ 
resultStr = srcStr+"."; 
   for(i=0;i<nAfterDot;i++){ 
  resultStr = resultStr+"0"; 
  } 
  return resultStr; 
  }else{ 
   if ((strLen - dotPos - 1) >= nAfterDot){ 
  nAfter = dotPos + nAfterDot + 1; 
nTen =1; 
  for(j=0;j<nAfterDot;j++){ 
 nTen = nTen*10; 
  } 
  resultStr = Math.round(parseFloat(srcStr)*nTen)/nTen; 
   return resultStr; 
  } else{ 
   resultStr = srcStr; 
  for (i=0;i<(nAfterDot - strLen + dotPos + 1);i++){ 
 resultStr = resultStr+"0"; 
   } 
   return resultStr; 
 } 
} 
} 


