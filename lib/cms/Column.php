<?php

/**
 * @name column
 * @function cms系统核心类文件
 * @version 1.0
 * @created 2009-09-09 03:45:59
 * @author 罗东
 * index表结构id,create_uid,create_date,write_date,write_uid,cid,mid,title,photo,linkurl,url,fpageurl,ifpub,fpage,digest,hits,sort,template,titlestyle,relatedcid,alias
 */
 
namespace lib\cms;
use lib\ezsql\DbPdo as DbPdo;

class Column{

    /**
	 * 数据库连接。
     * 
     * @var object
     * @access pdo
     */
	protected $pdo;

	/**
     * 构造函数
     * @access public 
     * @param 
     */
    function __construct(){
		//$this->pdo = new DbPdo();
	}


}
?>