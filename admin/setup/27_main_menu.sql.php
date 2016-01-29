<?

CREATE TABLE IF NOT EXISTS `mandarinko_menu` (
  `id` int(11) NOT NULL auto_increment,  
  `pid` text NOT NULL,  
  `title` text NOT NULL,
  `parent_title` text NOT NULL,
  `link` text NOT NULL,  
  `text` text NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;


?>