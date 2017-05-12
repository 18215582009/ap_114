<?php
/**
 * $Id: update.php 131 2015-10-10 02:25:57Z $
 * @author deathking(751450467@qq.com)
 */
namespace lib\ezsql\rules\update;
use lib\ezsql\rules\basic\BasicRule;
use lib\ezsql\rules\basic\WhereRule;
use lib\ezsql\impls\UpdateSetImpl;
use lib\ezsql\impls\UpdateImpl;


require_once dirname(__DIR__).'/impls.php';
require_once __DIR__.'/basic.php';

class UpdateRule extends BasicRule
{
    /**
     * update('table')->set('a', 1) => "UPDATE table SET a=1"
     * @param string $table
     * @return \ezsql\rules\update\UpdateSetRule
     */
    public function update($table) {
        UpdateImpl::update($this->context, $table);
        return new UpdateSetRule($this->context);
    }
}

class UpdateSetRule extends WhereRule
{
    public function __construct($context){
        parent::__construct($context);
        $this->impl = new UpdateSetImpl();
    }
    /**
     * update('table')->set('a', 1) => "UPDATE table SET a=1"
     * update('table')->set('a', 1)->set('b',Sql::native('now()')) => "UPDATE table SET a=1,b=now()"
     * @param string $column
     * @param mixed $value
     * @return \ezsql\rules\update\UpdateSetRule
     */
    public function set($column, $value) {
        $this->impl->set($this->context, $column, $value);
        return $this;
    }
    /**
     * update('table')->set(['a'=>1, 'b'=>Sql::native('now()')]) => "UPDATE table SET a=1,b=now()"
     * @param array $values
     * @return \ezsql\rules\update\UpdateSetRule
     */
    public function setArgs($values) {
        $this->impl->setArgs($this->context, $values);
        return $this;
    }
    private $impl;
}



