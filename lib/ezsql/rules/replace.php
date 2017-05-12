<?php
namespace lib\ezsql\rules\replace;

use lib\ezsql\rules\basic\BasicRule;
use lib\ezsql\rules\basic\ExecRule;
use lib\ezsql\impls\ReplaceImpl;
use lib\ezsql\impls\ValuesImpl;

require_once dirname(__DIR__).'/impls.php';
require_once __DIR__.'/basic.php';

class ReplaceIntoRule extends BasicRule
{
    /**
     * replaceInto('table')->values([1,2]) => "REPLACE INTO table VALUES(1,2)"
     * @param string $table
     * @return \ezsql\rules\replace\ValuesRule
     */
    public function replaceInto($table) {
        ReplaceImpl::replaceInto($this->context, $table);
        return new ValuesRule($this->context);
    }
}
class ValuesRule extends BasicRule
{
    /**
     * replaceInto('table')->values([1,2]) => "REPLACE INTO table VALUES(1,2)"
     * replaceInto('table')->values(['a'=>1, 'b'=>Sql::native('now()')]) => "REPLACE INTO table(a,b) VALUES(1,now())"
     * @param unknown $values
     * @return \ezsql\rules\basic\ExecRule
     */
    public function values($values) {
        ValuesImpl::values($this->context, $values);
        return new ExecRule($this->context);
    }
}