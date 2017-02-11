CREATE TABLE `pc_article` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`source` char(20) NOT NULL,
	`time` int(10) NOT NULL,
	`url` text NOT NULL,
	`title` char(200) NOT NULL,
	`articletext` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;