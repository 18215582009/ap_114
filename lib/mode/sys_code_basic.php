<?php
/**
 * The model file of index module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: model.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
namespace lib\mode;
use lib\Db;

class sys_code_basic extends Db
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'sys_code_basic';

	/* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
    }

}
