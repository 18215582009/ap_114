/* 2017-04-27 */
use fc114;
alter table fc_esf add link_require varchar(225) comment '联系要求' after map_show;
alter table fc_esf add linkman varchar(25) comment '联系人' after map_show;