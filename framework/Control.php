<?php
/**
 * 控制器基类。
 * 
 * @package CandorPHP
 */
class Control
{
    /**
     * 全局的$app对象。
     * 
     * @var object
     * @access protected
     */
    protected $app;

    /**
     * 全局的$config对象。 
     * 
     * @var object
     * @access protected
     */
    protected $config;

    /**
     * 全局的$lang对象。
     * 
     * @var object
     * @access protected
     */
    protected $lang;

    /**
     * 全局的$dbh（数据库访问句柄）对象。
     * 
     * @var object
     * @access protected
     */
    protected $dbh;

    /**
     * dao对象。
     * 
     * @var object
     * @access protected
     */
    public $dao;
	
	/**
     * accessWsData对象,获取ws数据对象。
     * 
     * @var object
     * @access public
     */
	protected $accessWsData;

    /**
     * POST对象。
     * 
     * @var ojbect
     * @access public
     */
    public $post;

    /**
     * session对象。
     * 
     * @var ojbect
     * @access public
     */
    public $session;

    /**
     * server对象。
     * 
     * @var ojbect
     * @access public
     */
    public $server;

    /**
     * global对象。
     * 
     * @var ojbect
     * @access public
     */
    public $global;

    /**
     * 所属模块的名字。
     * 
     * @var string
     * @access protected
     */
    protected $moduleName;

    /**
     * 模块所处的路径。
     * 
     * @var string
     * @access protected
     */
    protected $modulePath;

    /**
     * 要加载的model文件。
     * 
     * @var string
     * @access private
     */
    private $modelFile;

    /**
     * 派生的model文件。
     * 
     * @var string
     * @access private
     */
    private $myModelFile;

    /**
     * 记录赋值到view的所有变量。
     * 
     * @var object
     * @access public
     */
    public $view; 

    /**
     * 要加载的view文件。
     * 
     * @var string
     * @access private
     */
    private $viewFile;

    /**
     * 要输出的内容。
     * 
     * @var string
     * @access private
     */
    private $output;

    /**
     * 路径分隔符。
     * 
     * @var string
     * @access protected
     */
    protected $pathFix;

    /**
     * 构造函数：
     *
     * 1. 引用全局对象，使之可以通过成员变量访问。
     * 2. 设置模块相应的路径信息，并加载对应的model文件。
     * 3. 自动将$lang和$config赋值到模板。
     * 
     * @access public
     * @return void
     */
    public function __construct($moduleName = '', $methodName = '')
    {
        /* 引用全局对象，并赋值。*/
        global $app, $config, $lang, $dbh;
        $this->app        = $app;
        $this->config     = $config;
        $this->lang       = $lang;
        $this->dbh        = $dbh;
        $this->pathFix    = $this->app->getPathFix();

        $this->setModuleName($moduleName);
        $this->setModulePath();
        $this->setMethodName($methodName);

        /* 自动加载当前模块的model文件。*/
        $this->loadModel();
		
		/* 自己加载类 */
		//spl_autoload_register(array($this->app, 'auto_load'));
		
		/* sqlite验证模块 
		if($this->config->version=='2.0.STABLE.090620')
		{
			if(!in_array($this->app->getModuleName(),array('common','index','admin'))){
				$sqlite = new Sqlite($this->app->getConfigRoot()."/candor.inc");
				$moduleInfo = $sqlite->GetRow("select * from module where module_name='".$this->app->getModuleName()."'");
				if($this->config->auth){
					if($moduleInfo['id']>0)
					{
						//已注册模块！
					}else{
						echo '非注册模块，请在后台设置该模块为注册状态！';exit;
					}
				}
				// 序列认证 
				if(!Helper::chechKey($moduleInfo['serial_number']))
				{
					echo '序列号过期,请联系川大软件';
					exit;
				}
			}
		}
*/
        /* 自动将$app, $config和$lang赋值到模板中。*/
        $this->assign('app',    $app);
        $this->assign('lang',   $lang);
        $this->assign('config', $config);

        if(isset($config->super2OBJ) and $config->super2OBJ) $this->setSuperVars();
    }

    //-------------------- model相关的方法。--------------------//
    //
    /* 设置模块名。*/
    private function setModuleName($moduleName = '')
    {
        $this->moduleName = $moduleName ? strtolower($moduleName) : $this->app->getModuleName();
    }

    /* 设置模块路径。*/
    private function setModulePath()
    {
        $this->modulePath = $this->app->getModuleRoot() . $this->moduleName . $this->pathFix;
    }

    /* 设置方法名。*/
    private function setMethodName($methodName = '')
    {
        $this->methodName = $methodName ? strtolower($methodName) : $this->app->getMethodName();
    }

    /**
     * 设置model文件。
     * 
     * @param   string      $moduleName     模块名字。
     * @access  private
     * @return void
     */
    private function setModelFile($moduleName)
    {
        $this->modelFile = $this->app->getModuleRoot() . strtolower(trim($moduleName)) . $this->pathFix . 'model.php';
        return file_exists($this->modelFile);
    }

    /**
     * 设置派生的model文件。
     * 
     * @param   string      $moduleName     模块名字。
     * @access  private
     * @return void
     */
    private function setMyModelFile()
    {
        $this->myModelFile = str_replace('model.php', 'mymodel.php', $this->modelFile);
        return file_exists($this->myModelFile);
    }

    /**
     * 加载某一个模块的model文件。
     * 
     * @param   string  $moduleName     模块名字，如果为空，则取当前的模块名作为model名。
     * @access  public
     * @return  void
     */
    public function loadModel($moduleName = '')
    {
        /* 如果没有指定module名，则取当前加载的模块的名作为model名。*/
        if(empty($moduleName)) $moduleName = $this->moduleName;
        if(!$this->setModelFile($moduleName)) return false;
        $modelClass = $moduleName. 'Model';
        Helper::import($this->modelFile);
        
        /* 存在派生的model文件，则加载。*/
        if($this->setMyModelFile())
        {
            Helper::import($this->myModelFile);
            $modelClass = 'my' . $modelClass;
        }

        if(!class_exists($modelClass)) $this->app->error(" The model $modelClass not found", __FILE__, __LINE__, $exit = true);
        $this->$moduleName = new $modelClass();
        if(isset($this->config->db->dao) and $this->config->db->dao)
        {
            $this->dao = $this->$moduleName->dao;
        }
        return $this->$moduleName;
    }

    /**
     * 设置超全局变量。
     * 
     * @access protected
     * @return void
     */
    protected function setSuperVars()
    {
        $this->post    = $this->app->post;
        $this->server  = $this->app->server;
        $this->session = $this->app->session;
        $this->global  = $this->app->global;
    }

    //-------------------- 加载view相关的方法。--------------------//
    /**
     * 设置视图文件。
     * 
     * 某一个module的控制器可以加载另外一个module的视图文件。
     *
     * @param string $moduleName    模块名。
     * @param string $methodName    方法名。
     * @access private
     * @return string               对应的视图文件。
     */
    private function setViewFile($moduleName, $methodName)
    {
        $moduleName = strtolower(trim($moduleName));
        $methodName = strtolower(trim($methodName));
        $viewFile = $this->app->getModuleRoot() . $moduleName . $this->pathFix . 'view' . $this->pathFix . $methodName . '.' . $this->app->getViewType() . '.php';
        if(!file_exists($viewFile)) $this->app->error("the view file $viewFile not found", __FILE__, __LINE__, $exit = true);
        return $viewFile;
    }

    /**
     * 赋值一个变量到view视图。
     * 
     * @param   string  $name       赋值到视图文件中的变量名。
     * @param   mixed   $value      所对应的值。
     * @access  public
     * @return  void
     */
    public function assign($name, $value)
    {
        @$this->view->$name = $value;
    }

    /**
     * 重置output内容。
     * 
     * @access public
     * @return void
     */
    public function clear()
    {
        $this->output = '';
    }

    /**
     * 解析视图文件。
     *
     * 如果没有指定模块名和方法名，则取当前模块的当前方法。
     *
     * @param string $moduleName    模块名。
     * @param string $methodName    方法名。
     * @access public
     * @return void
     */
    public function parse($moduleName = '', $methodName = '')
    {
        if(empty($moduleName)) $moduleName = $this->moduleName;
        if(empty($methodName)) $methodName = $this->methodName;
        $viewFile = $this->setViewFile($moduleName, $methodName);

        /* 切换到视图文件所在的目录，以保证视图文件中的包含路径有效。*/
        $currentPWD = getcwd();
        chdir(dirname($viewFile));

        extract((array)$this->view);
        ob_start();
        include $viewFile;
        $this->output .= ob_get_contents();
        ob_end_clean();

        /* 最后还要切换到原来的目录。*/
        chdir($currentPWD);
    }

    /**
     * 获取某一个模块的某一个方法的内容。
     * 
     * 如果没有指定模块名，则取当前模块当前方法的视图。如果指定了模块和方法，则调用对应的模块方法的视图内容。
     *
     * @param   string  $moduleName    模块名。
     * @param   string  $methodName    方法名。
     * @param   array   $params        方法参数。
     * @access  public
     * @return  string
     */
    public function fetch($moduleName = '', $methodName = 'index', $params = array())
    {
        if($moduleName == '') $moduleName = $this->moduleName;
        if($moduleName == $this->moduleName) 
        {
            $this->parse($moduleName, $methodName);
            return $this->output;
        }

        $moduleControlFile = $this->app->getModuleRoot() . strtolower($moduleName) . '/control.php';
        if(!file_exists($moduleControlFile)) $this->app->error("The control file $moduleControlFile not found", __FILE__, __LINE__, $exit = true);

        Helper::import($moduleControlFile);
        if(!class_exists($moduleName)) $this->app->error(" The class $moduleName not found", __FILE__, __LINE__, $exit = true);
        if(!is_array($params)) parse_str($params, $params);
        $module = new $moduleName($moduleName, $methodName);

        ob_start();
        call_user_func_array(array($module, $methodName), $params);
        $output = ob_get_contents();
        ob_end_clean();
        unset($module);
        return $output;
    }

    /**
     * 显示视图内容。 
     * 
     * @param   string  $moduleName    模块名。
     * @param   string  $methodName    方法名。
     * @access  public
     * @return  void
     */
    public function display($moduleName = '', $methodName = '')
    {
        if(empty($this->output)) $this->parse($moduleName, $methodName);
        echo $this->output;
    }

    /**
     * 生成某一个模块某个方法的链接。
     * 
     * @param   string  $moduleName    模块名。
     * @param   string  $methodName    方法名。
     * @param   mixed   $vars          要传递的参数，可以是数组，array('var1'=>'value1')。也可以是var1=value1&var2=value2的形式。
     * @param   string  $viewType      视图格式。
     * @access  public
     * @return  string
     */
    public function createLink($moduleName, $methodName = 'index', $vars = array(), $viewType = '')
    {
        if(empty($moduleName)) $moduleName = $this->moduleName;
        return Helper::createLink($moduleName, $methodName, $vars, $viewType);
    }

    /**
     * 跳转到另外一个页面。
     * 
     * @param   string   $url   要跳转的url地址。
     * @access  public
     * @return  void
     */
    public function locate($url)
    {
        header("location: $url");
        exit;
    }
}
