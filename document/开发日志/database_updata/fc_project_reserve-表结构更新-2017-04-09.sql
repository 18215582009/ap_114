/* 2017-04-09 */
use fc114;
alter table fc_project_reserve add loan_use tinyint(1) comment '������Ͱ' after note;
alter table fc_project_reserve add loan_money Float(6,2) comment '������' after note;

