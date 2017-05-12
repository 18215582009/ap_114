<?php
/**
 * $Id: insert.php 131 2015-10-10 02:25:57Z $
 * @author deathking(751450467@qq.com)
 */
namespace lib\ezsql\rules\insert;

use lib\ezsql\rules\basic\BasicRule;
use lib\ezsql\rules\basic\ExecRule;
use lib\ezsql\impls\InsertImpl;
use lib\ezsql\impls\ValuesImpl;

require_once dirname(__DIR__).'/impls.php';
require_once __DIR__.'/basic.php';

class InsertRule extends BasicRule
{
    /**
     * 
     * insertInto('table')->values([1,2]) => "INSERT INTO table VALUES(1,2)"
     * @param string $table
     * @return \ezsql\rules\insert\ValuesRule
     */
    public function insertInto($table) {
        InsertImpl::insertInto($this->context, $table);
        return new ValuesRule($this->context);
    }
}
class ValuesRule extends BasicRule
{
    /**
     *
     * insertInto('table')->values([1,2]) => "INSERT INTO table VALUES(1,2)"
     * insertInto('table')->values(['a'=>1, 'b'=>Sql::native('now()')]) => "INSERT INTO table(a,b) VALUES(1,now())"
     * @param unknown $values
     * @return \ezsql\rules\basic\ExecRule
     */
    public function values($values) {
        ValuesImpl::values($this->context, $values);
        return new ExecRule($this->context);
    }
}