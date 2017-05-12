var TempCache = {  
    cache:function(value){  
        localStorage.setItem("EasyWayTempCache",value);  
    },  
    getCache:function(){  
        return  localStorage.getItem("EasyWayTempCache");  
    },  
    setItem:function(key,value){  
        localStorage.setItem(key,value);  
    },  
    getItem:function(key){  
        return localStorage.getItem(key);  
    },  
    removeItem:function(key){  
        return localStorage.removeItem(key);  
    }  
}; 