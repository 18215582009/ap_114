<?php
/**
 * $Id: delete.php 131 2015-10-10 02:25:57Z $
 * @author deathking(751450467@qq.com)
 */
namespace lib\ezsql\rules\delete;
use lib\ezsql\rules\basic\BasicRule;
use lib\ezsql\impls\DeleteImpl;
use lib\ezsql\rules\basic\WhereRule;

require_once dirname(__DIR__).'/impls.php';
require_once __DIR__.'/basic.php';

class DeleteRule extends BasicRule
{
    /**
     * deleteFrom('table') => "DELETE FROM table"
     * @param string $table
     * @return \ezsql\rules\basic\WhereRule
     */
    public function deleteFrom($table) {
        DeleteImpl::deleteFrom($this->context, $table);
        return new WhereRule($this->context);
    }
}
