#用户表
-- create table wzq_user (
-- 	id int(11) not null primary key auto_increment,
-- 	username char(20) not null,
-- 	password char(32) not null,
-- 	registertime int(10) not null,
-- 	lately int(10),
-- );

#文章分类
CREATE TABLE `wzq_articleClass` (
	`id` int(2) NOT NULL AUTO_INCREMENT,
	`classname` char(10) NOT NULL, #类名
	`parentclass` int(2) NOT NULL, #上级分类
	`order` int(3) NOT NULL DEFAULT '255', #排序
	PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#文章
create table wzq_article (
	id int(11) not null primary key auto_increment,
	userid int(11) not null default '0', #投稿用户ID
	username char(20) not null, #投稿用户名称
	articleurl text, #文章来源地址
	articletitle char(100) not null, #文章标题
	articleclassid int(2) not null, #文章分类ID
	contributionstime int(10) not null, #投稿时间
	readnum int(6) not null default '0',#阅读量
	commentnum int(6) not null default '0', #评论数量
	tag int(6) not null default '0', #标签
	articleimg char(255), #文章缩略图
	articletext text #文章内容
)