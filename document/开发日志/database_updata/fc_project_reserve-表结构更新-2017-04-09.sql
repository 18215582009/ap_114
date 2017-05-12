/* 2017-04-09 */
use fc114;
alter table fc_project_reserve add loan_use tinyint(1) comment '贷款用桶' after note;
alter table fc_project_reserve add loan_money Float(6,2) comment '贷款金额' after note;

