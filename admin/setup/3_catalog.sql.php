<?
CREATE TABLE IF NOT EXISTS `mandarinko_catalog` (
  `id` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL,
  `url` varchar(256) NOT NULL,
  `name` text NOT NULL,
  `metak` text NOT NULL,
  `metad` text NOT NULL,
  `sort` int NOT NULL,
  `root` varchar(256) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `mandarinko_catalog_mapping` (
	`id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
	`fid` INT( 11 ) NOT NULL ,
	`sid` INT( 11 ) NOT NULL ,
PRIMARY KEY ( `id` )
) ENGINE = MYISAM ;


INSERT INTO `mandarinko_catalog` (`id`, `pid`, `url`, `name`, `metak`, `metad`, `sort`, `root`) VALUES
(1, 0, 'for-woman', 'Для нее', '', '', 1, 'nd'),
(5, 0, 'for-man', 'Для него', '', '', 5, 'nd'),
(6, 0, 'for-home', 'Для дома', '', '', 6, 'nd'),

?>