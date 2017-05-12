<?php
/**
 * The control file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
class demo extends control
{
	/**
	 * 数据库连接。
     * 
     * @var object
     * @access pdo
     */
	protected $pdo;

    /* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
    }
    
    /* index方法，也是默认的方法。*/
    public function index()
    {
		//$this->display('index','auth');
		$this->display('demo','main');
    }
	
	public function newUi(){
		$this->display('demo','newUi');
	}

	/* 前端UI demo */
	/* ui 首页 */
    public function ui()
    {
		//$this->display('index','auth');
		$this->display('demo','css_main');
    }

	/* css基础 */
    public function baseui()
    {
		//$this->display('index','auth');
		$this->display('demo','css_base');
    }
	/* css布局 */
    public function baselayout()
    {
		//$this->display('index','auth');
		$this->display('demo','css_layout');
    }
	/* css组件 */
    public function basecomponent()
    {
		//$this->display('index','auth');
		$this->display('demo','css_component');
    }
	/* css javascript 插件 */
	public function baseplug(){
		$this->display('demo','css_plug');
	}
	/* css ui exp 实例 */
	public function uiexp(){
		$this->display('demo','css_uiexp');
	}
	/* css ui exp tabpage 实例 */
	public function uitabpage(){
		$this->display('demo','css_uitabpage');
	}
	/* css ui exp dividepage 实例 */
	public function uidividepage(){
		$this->display('demo','css_uidividepage');
	}
	/* css list 列表 */
    public function uilist()
    {
		//$this->display('index','auth');
		$this->display('demo','css_list');
    }

	/* php demo */
	/* php demo 实例 */
	public function phpdemo(){
		$this->display('demo','php_main');
	}

	/* php demo getdata 实例 */
	public function phpGetData(){

		$this->display('demo','php_getData');
	}

	/* php demo D_tabletree 实例 */
	public function tableTree(){

		$this->display('demo','D_tabletree');
	}

	/* php demo 基层调用实例 */
	public function phpBase(){
		$this->display('demo','php_base');
	}

	/* 开发文档 */
	/* 文档 实例 */
	public function api(){
		$this->display('demo','api_main');
	}

	/* Js开发文档 */
	public function apiJs(){
		$this->display('demo','api_js');
	}

	/*validate验证表单*/
	public function validate(){
		$this->display("demo","validate");
	}
	
	public function dovalidate(){
		echo "表单验证成功";
	}
	
	public function ajax(){
		
		$res['res'] = true;
		$res['msg'] = '用户名已存在！';
		echo json_encode($res);
	}

	/* OE接口API */
	public function oe(){
		$this->display('demo','api_oe');
	}
	
	/******************************  mtek 框架 *******************************/
	/* php demo mtek css 框架  */
	public function ui_modals(){
		$this->display('demo','ui_modals');
	}

	/* php demo mtek css 框架  */
	public function ui_tabs_accordions(){
		$this->display('demo','ui_tabs_accordions');
	}
}

