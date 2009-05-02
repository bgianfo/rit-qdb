CREATE TABLE `quotes` (
    `id` int(11) NOT NULL auto_increment,
    `user` varchar(20) default NULL,
    `data` varchar(2000) default NULL,
    `time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    `score` int(11) default NULL,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 | 
