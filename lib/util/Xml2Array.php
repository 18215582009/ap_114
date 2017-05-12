<?php
/**
 * @author luojun
 * @version 1.0
 * @created 13-一月-2011 11:06:02
 */
namespace util;

class Xml2Array
{

	var $parser;
	var $document;
	var $parent;
	var $stack;
	var $last_opened_tag;

	public function __construct()
	{
        $this->parser = xml_parser_create();    
        xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, false);    
        xml_set_object($this->parser, $this);    
        xml_set_element_handler($this->parser, 'startElement','endElement');    
        xml_set_character_data_handler($this->parser, 'characterData');    
    }

	function destruct()
	{ 
		xml_parser_free($this->parser); 
	}

	/**
	 * 
	 * @param dataUrl
	 */
	function parseXmlFromUrl($dataUrl)
	{
		$this->document = array();    
        $this->stack    = array();    
        $this->parent   =&$this->document; 
		$filehandler = fopen($dataUrl, "r");	
		while ($idata = fread($filehandler, 4096)) {
			xml_parse( $this->parser, $idata, feof($filehandler));
	    }
		fclose($filehandler);
		$this->destruct();
	}

	/**
	 * 
	 * @param dataStr
	 */
	function parseXmlFromStr($dataStr)
	{
		$this->document = array();    
        $this->stack    = array();    
        $this->parent   = &$this->document; 		
		xml_parse( $this->parser, $dataStr, true);		
		$this->destruct();	
	}

	/**
	 * function startElement(&$parser, $tag, $attributes){ $this->data = ''; #stores
	 * temporary cdata $this->last_opened_tag = $tag; if(is_array($this->parent) and
	 * array_key_exists($tag,$this->parent)){ #if you've seen this tag before
	 * if(is_array($this->parent[$tag]) and array_key_exists(0,$this->parent[$tag])){
	 * #if the keys are numeric #this is the third or later instance of $tag we've
	 * come across $key = $this->count_numeric_items($this->parent[$tag]); }else{
	 * #this is the second instance of $tag that we've seen. shift around
	 * if(array_key_exists("$tag attr",$this->parent)){ $arr = array('0 attr'=>&$this-
	 * >parent["$tag attr"], &$this->parent[$tag]); unset($this->parent["$tag attr"]);
	 * }else{ $arr = array(&$this->parent[$tag]); } $this->parent[$tag] = &$arr; $key
	 * = 1; } $this->parent = &$this->parent[$tag]; }else{ $key = $tag; }
	 * if($attributes){ $this->parent["$key attr"] = $attributes; } $this->parent  =
	 * &$this->parent[$key]; $this->stack[] = &$this->parent; }
	 * 
	 * @param parser
	 * @param tag
	 * @param attributes
	 */
	function startElement(&$parser, $tag, $attributes)
	{
		$this->data = ''; #stores temporary cdata    
        $this->last_opened_tag = $tag; 
		//$this->last_opened_tag=iconv("gb2312","UTF-8",$tag);
		if(isset($this->parent[$tag]) && is_array($this->parent[$tag]) && array_key_exists(0,$this->parent[$tag])){ #if the keys are numeric   
			#this is the third or later instance of $tag we've come across    
			$key = $this->count_numeric_items($this->parent[$tag]);    
		}else{    
			#this is the second instance of $tag that we've seen. shift around   
			/*
			if(is_array($this->parent)) $this->parent=$this->parent;
			else $this->parent=array($this->parent);
			*/
			if((is_array($this->parent) || is_object($this->parent)) && array_key_exists("$tag attr",$this->parent)){   
				$arr = array('0 attr'=>&$this->parent["$tag attr"], &$this->parent[$tag]);   
				unset($this->parent["$tag attr"]);   
			}else{   
				$arr = array(&$this->parent[$tag]);
				$key = 0;   
			}   
			$this->parent[$tag] = &$arr;   
		  
		}   
        $this->parent = &$this->parent[$tag];   
        
        if($attributes){
         	$this->parent["$key attr"] = $attributes;   
        }else{
        	$this->parent["$key attr"] = "";   
        	}
        $this->parent  = &$this->parent[$key];   
        $this->stack[] = &$this->parent;
	}

	/**
	 * 
	 * @param parser
	 * @param data
	 */
	function characterData(&$parser, $data)
	{
		//echo "xml_data:".$xml_data."<br/>";
		if($this->last_opened_tag != NULL) { 
            $this->data .= $data; 
		}
	}

	/**
	 * 
	 * @param parser
	 * @param tag
	 */
	function endElement(&$parser, $tag)
	{
		if($this->last_opened_tag == $tag){    
            $this->parent = $this->data;    
            $this->last_opened_tag = NULL;    
        }    
        array_pop($this->stack);    
        if($this->stack) $this->parent = &$this->stack[count($this->stack)-1];
	}

	/**
	 * 
	 * @param array
	 */
	function count_numeric_items(&$array)
	{
		return is_array($array) ? count(array_filter(array_keys($array), 'is_numeric')) : 0;
	}

}

/*
$xml_file="d:/fgwsweb/common/config/System.xml";
$XmlParser=new XmlParser();
$XmlParser->parseXmlFromUrl($xml_file);
//print_r($XmlParser->parent);
print_r($XmlParser->document);
//print_r($XmlParser->stack);
*/
function XML_unserializeFromUrl($xml_file){
	$XmlParser=new Xml2Array();
	$XmlParser->parseXmlFromUrl($xml_file);
	return $XmlParser->document;
}
function XML_unserializeFromStr($xml_str){
	$XmlParser=new Xml2Array();
	$XmlParser->parseXmlFromStr($xml_str);
	return $XmlParser->document;
}
//print_r(XML_unserializeFromUrl($xml_file));
?>
