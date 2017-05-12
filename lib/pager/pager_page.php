<?php
 /**
　* php分页类
　* @version 1.0
　* @author 罗东大侠
  * Created on 2009-01-23
  * Modify on 2009-01-23
　*/

namespace lib\pager;

class pager_page{
   private   $page_size;//每页显示的条目数
   private   $nums;//总条目数
   private   $current_page;//当前被选中的页
   private   $sub_pages;//每次显示的页数
   private   $page_nums;//总页数
   private   $page_array = array();//用来构造分页的数组
   private   $subPage_link;//每个分页的链接
   private   $subPage_type;//显示分页的类型
   private   $page_html;//最后返回的分页html代码
   /*
   __construct是SubPages的构造函数，用来在创建类的时候自动运行.
   @$page_size   每页显示的条目数
   @nums 总条目数
   @current_num 当前被选中的页
   @sub_pages    每次显示的页数
   @subPage_link 每个分页的链接
   @subPage_type 显示分页的类型
  
   当@subPage_type=1的时候为普通分页模式
       example：   共4523条记录,每页显示10条,当前第1/453页 [首页] [上页] [下页] [尾页]
       当@subPage_type=2的时候为经典分页样式
       example：   当前第1/453页 [首页] [上页] 1 2 3 4 5 6 7 8 9 10 [下页] [尾页]
   */
function __construct($page_size,$nums,$current_page,$sub_pages=5,$subPage_link,$subPage_type){
	$this->page_size=intval($page_size);
	$this->nums=intval($nums);
	if(!$current_page){
		$this->current_page=1;
	}else{
		$this->current_page=intval($current_page);
	}
	$this->sub_pages=intval($sub_pages);
	$this->page_nums=ceil($nums/$page_size);
	$this->subPage_link='?'.$subPage_link.'page='; 
	$this->show_SubPages($subPage_type);
	//echo $this->page_nums."--".$this->sub_pages;
}

/**
* 返回分页html代码
* @access public
* @return string
*/
public function get_page_html(){
	return $this->page_html;
}

/*
* __destruct析构函数，当类不在使用的时候调用，该函数用来释放资源。
*/
function __destruct(){
	unset($page_size);
	unset($nums);
	unset($current_page);
	unset($sub_pages);
	unset($page_nums);
	unset($page_array);
	unset($subPage_link);
	unset($subPage_type);
	unset($page_str);
}
  
/*
* show_SubPages函数用在构造函数里面。而且用来判断显示什么样子的分页  
*/
private function show_SubPages($subPage_type){
	if($subPage_type == 1){
		$this->subPageCss1();
	}elseif ($subPage_type == 2){
		$this->subPageCss2();
	}elseif ($subPage_type == 3){
		$this->subPageCss3();
	}elseif ($subPage_type == 4){
		$this->subPageCss4();
	}elseif ($subPage_type == 5){
		$this->subPageCss5();
	}
}
  
  
/*
* 用来给建立分页的数组初始化的函数。
*/
private function initArray(){
	for($i=0;$i<$this->sub_pages;$i++){
	$this->page_array[$i]=$i;
	}
	return $this->page_array;
}
  
  
/*
* construct_num_Page该函数使用来构造显示的条目
* 即使：[1][2][3][4][5][6][7][8][9][10]
*/
private function construct_num_Page(){
	if($this->page_nums < $this->sub_pages){
		$current_array=array();
		for($i=0;$i<$this->page_nums;$i++){ 
			$current_array[$i]=$i+1;
		}
	}else{
		$current_array=$this->initArray();
		if($this->current_page <= 3){
			for($i=0;$i<count($current_array);$i++){
		   $current_array[$i]=$i+1;
			}
		}elseif ($this->current_page <= $this->page_nums && $this->current_page > $this->page_nums - $this->sub_pages + 1 ){
			for($i=0;$i<count($current_array);$i++){
		   $current_array[$i]=($this->page_nums)-($this->sub_pages)+1+$i;
			}
		}else{
			for($i=0;$i<count($current_array);$i++){
		   $current_array[$i]=$this->current_page-2+$i;
			}
		}
	}
	return $current_array;
}
  
/*
 *  构造普通模式的分页
 *  共4523条记录,每页显示10条,当前第1/453页 [首页] [上页] [下页] [尾页]
 */
private function subPageCss1(){
	$subPageCss1Str="";
	$subPageCss1Str.="共".$this->nums."条记录，";
	$subPageCss1Str.="每页显示".$this->page_size."条，";
	$subPageCss1Str.="当前第".$this->current_page."/".$this->page_nums."页 ";
	if($this->current_page > 1){
	$firstPageUrl=$this->subPage_link."1";
	$prewPageUrl=$this->subPage_link.($this->current_page-1);
	$subPageCss1Str.="[<a href='$firstPageUrl'>首页</a>] ";
	$subPageCss1Str.="[<a href='$prewPageUrl'>上一页</a>] ";
	}else {
	$subPageCss1Str.="[首页] ";
	$subPageCss1Str.="[上一页] ";
	}

	if($this->current_page < $this->page_nums){
	$lastPageUrl=$this->subPage_link.$this->page_nums;
	$nextPageUrl=$this->subPage_link.($this->current_page+1);
	$subPageCss1Str.=" [<a href='$nextPageUrl'>下一页</a>] ";
	$subPageCss1Str.="[<a href='$lastPageUrl'>尾页</a>] ";
	}else {
		$subPageCss1Str.="[下一页] ";
		$subPageCss1Str.="[尾页] ";
	}
	$this->page_html = $subPageCss1Str;
}
  
  
/*
 *  构造经典模式的分页
 *  当前第1/453页 [首页] [上页] 1 2 3 4 5 6 7 8 9 10 [下页] [尾页]
 */
private function subPageCss2(){
	$subPageCss2Str="";
	$subPageCss2Str.="当前第".$this->current_page."/".$this->page_nums."页 ";

	if($this->current_page > 1){
		$firstPageUrl=$this->subPage_link."1";
		$prewPageUrl=$this->subPage_link.($this->current_page-1);
		$subPageCss2Str.="[<a href='$firstPageUrl'>首页</a>] ";
		$subPageCss2Str.="[<a href='$prewPageUrl'>上一页</a>] ";
	}else {
		$subPageCss2Str.="[首页] ";
		$subPageCss2Str.="[上一页] ";
	}

	$a=$this->construct_num_Page();
	for($i=0;$i<count($a);$i++){
		$s=$a[$i];
		if($s == $this->current_page ){
			$subPageCss2Str.="[<span style='color:red;font-weight:bold;'>".$s."</span>]";
		}else{
			$url=$this->subPage_link.$s;
			$subPageCss2Str.="[<a href='$url'>".$s."</a>]";
		}
	}

	if($this->current_page < $this->page_nums){
		$lastPageUrl=$this->subPage_link.$this->page_nums;
		$nextPageUrl=$this->subPage_link.($this->current_page+1);
		$subPageCss2Str.=" [<a href='$nextPageUrl'>下一页</a>] ";
		$subPageCss2Str.="[<a href='$lastPageUrl'>尾页</a>] ";
	}else {
		$subPageCss2Str.="[下一页] ";
		$subPageCss2Str.="[尾页] ";
	}
	$this->page_html = $subPageCss2Str;
}

/*
 *  眉山分页
 *  共有 120 条记录，当前第 1/10 页  [首页] [上页] [下页] [尾页]  转到第 页 
 */
private function subPageCss3(){
	$subPageCss3Str='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td>  ';
	$subPageCss3Str.="共有&nbsp;".$this->nums."&nbsp;条记录，当前第".$this->current_page."/".$this->page_nums."&nbsp;</td><td><table border=0 align=right  cellpadding=0 cellspacing=0 ><tr>";
	if($this->current_page > 1){
		$firstPageUrl=$this->subPage_link."1";
		$prewPageUrl=$this->subPage_link.($this->current_page-1);
		$subPageCss3Str.='<td width="40"><a href="'.$firstPageUrl.'"><img src="/theme/default/images/table/first.gif" width="37" height="15" /></a></td>';
		$subPageCss3Str.='<td width="45"><a href="'.$prewPageUrl.'"><img src="/theme/default/images/table/back.gif" width="37" height="15" /></a></td>';
	}else {
		$subPageCss3Str.='<td width="40"><img src="/theme/default/images/table/first_off.gif" width="37" height="15" /></td>';
		$subPageCss3Str.='<td width="45"><img src="/theme/default/images/table/back_off.gif" width="37" height="15" /></td>';
	}

	if($this->current_page < $this->page_nums){
		$lastPageUrl=$this->subPage_link.$this->page_nums;
		$nextPageUrl=$this->subPage_link.($this->current_page+1);
		$subPageCss3Str.='<td width="45"><a href="'.$nextPageUrl.'"><img src="/theme/default/images/table/next.gif" width="43" height="15" /></a></td>';
		$subPageCss3Str.='<td width="40"><a href="'.$lastPageUrl.'"><img src="/theme/default/images/table/last.gif" width="43" height="15" /></a></td>';
	}else {
		$subPageCss3Str.='<td width="45"><img src="/theme/default/images/table/next_off.gif" width="43" height="15" /></td>';
		$subPageCss3Str.='<td width="40"><img src="/theme/default/images/table/last_off.gif" width="43" height="15" /></td>';
	}
	$subPageCss3Str.='<td width="100">&nbsp;转到第 <input name="textfield" type="text" size="4" style="height:12px; width:20px; border:1px solid #999999;" onBlur="$(\'#gotoPage\').attr(\'href\',$(\'#gotoPage\').attr(\'href\')+this.value)" /> 页</td>';
	$subPageCss3Str.='<td width="40"><a id="gotoPage" href="'.$this->subPage_link.'"><img src="/theme/default/images/table/go.gif" width="37" height="15" /></a></td></tr></table></table>';
	$this->page_html = $subPageCss3Str;
}

/*
 *  青冈上分页
 *  [首页] [上页] 1 2 3 4 5 6 7 8 9 10 [下页] [尾页]
 */
private function subPageCss4(){
	$subPageCss4Str="";

	if($this->current_page > 1){
		$firstPageUrl=$this->subPage_link."1";
		$prewPageUrl=$this->subPage_link.($this->current_page-1);
		$subPageCss4Str.="<li><a href='$prewPageUrl'>上一页</a></li> ";
	}else {
		$subPageCss4Str.="<li class='disabled'><a href='javascript:;'>上一页</a></li> ";
	}

	$a=$this->construct_num_Page();
	for($i=0;$i<count($a);$i++){
		$s=$a[$i];
		if($s == $this->current_page ){
			$subPageCss4Str.="<li class='active'><a href='javascript:;'>".$s."</a></li>";
		}else{
			$url=$this->subPage_link.$s;
			$subPageCss4Str.="<li><a href='$url'>".$s."</a></li>";
		}
	}

	if($this->current_page < $this->page_nums){
		$lastPageUrl=$this->subPage_link.$this->page_nums;
		$nextPageUrl=$this->subPage_link.($this->current_page+1);
		$subPageCss4Str.=" <li><a href='$nextPageUrl'>下一页</a></li> ";
	}else {
		$subPageCss4Str.="<li class='disabled'><a href='javascript:;'>下一页</a></li> ";
	}
	//$subPageCss3Str .= "<li class='disabled'>共有".$this->nums."条记录，当前第".$this->current_page."/".$this->page_nums."页</li>";
	$this->page_html = $subPageCss4Str;
}

/*
 *  前台模式的分页4,地图找房AJAX调用
 *  [上一页] 1 2 3 4 5 6 7 8 9 10 [下一页]
*/
private function subPageCss5(){
	$subPageCss5Str="";
	if($this->current_page > 1){
		$firstPageUrl=$this->subPage_link."1";
		$prewPageUrl=$this->subPage_link.($this->current_page-1);
		$subPageCss5Str.="<li><a href='".($prewPageUrl)."'>上一页</a></li> ";
	}else {
		//$subPageCss5Str.="<li class='active'><a href='javascript::void(0)'>上一页</a></li> ";
	}

	$a=$this->construct_num_Page();
	for($i=0;$i<count($a);$i++){
		$s=$a[$i];
		if($s == $this->current_page ){
			$subPageCss5Str.="<li class='active'><a href='javascript:void({$s});'>".$s."</a></li>";
		}else{
			$url=$this->subPage_link.$s;
			$subPageCss5Str.="<li><a href='".$url."' >".$s."</a></li>";
		}
	}

	if($this->current_page < $this->page_nums){
		$lastPageUrl=$this->subPage_link.$this->page_nums;
		$nextPageUrl=$this->subPage_link.($this->current_page+1);
		$subPageCss5Str.="<li><a href='".($nextPageUrl)."'>下一页</a></li>";
	}else {
		//$subPageCss5Str.="<li class='active'><a href='javascript::void(0)'>下一页</a></li>";
	}

	$this->page_html = $this->nums>$this->page_size ? $subPageCss5Str : '';
}

}
?>
