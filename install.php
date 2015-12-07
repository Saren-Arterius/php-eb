
mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_chat` (
  `c_id` mediumint(8) unsigned NOT NULL auto_increment,
  `c_user` varchar(16) NOT NULL default '',
  `c_time` int(10) NOT NULL default '0',
  `c_msg` text NOT NULL,
  `c_type` tinyint(1) NOT NULL default '0',
  `c_tar` varchar(16) NOT NULL default '',
  PRIMARY KEY  (`c_id`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci AUTO_INCREMENT=1 ;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_game_history` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `time` int(10) unsigned NOT NULL default '0',
  `history` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci AUTO_INCREMENT=1 ;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_regkeys` (
  `regkey` varchar(10) NOT NULL default '',
  `username` varchar(16) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  `ip` text NOT NULL,
  `id` varchar(10) NOT NULL default '0',
  `email` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`regkey`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_bbstoebkeys` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) NOT NULL default '0',
  `bbsname` varchar(20) NOT NULL default '',
  `username` varchar(16) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `Uid` (`Uid`),
  UNIQUE KEY `bbsname` (`bbsname`),
  UNIQUE KEY `username` (`username`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_sys_changemoney` (
  `ebmoney` int(8) NOT NULL default '0',
  `dzmoney` int(8) NOT NULL default '0',
  `bbsmoneycode` char(30) NOT NULL default '',
  `available` tinyint(1) NOT NULL default '0',
   PRIMARY KEY  (`ebmoney`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_changemoney` VALUES ('50', '100', 'extcredits2', '0');");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` (
  `id` varchar(4) NOT NULL default '',
  `name` varchar(12) NOT NULL default '',
  `typelv` tinyint(2) NOT NULL default '0',
  `atf` tinyint(2) NOT NULL default '0',
  `def` tinyint(2) NOT NULL default '0',
  `ref` tinyint(2) NOT NULL default '0',
  `taf` tinyint(2) NOT NULL default '0'
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat1', 'һ��', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat2', 'һ��', 2, 1, 1, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat3', 'һ��', 3, 2, 2, 2, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat4', 'һ��', 4, 3, 3, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat5', 'һ��', 5, 3, 4, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat6', 'һ��', 6, 4, 4, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat7', 'һ��', 7, 4, 5, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat8', 'һ��', 8, 4, 5, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat9', 'һ��', 9, 4, 5, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('natx', 'һ��', 10, 4, 5, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh1', 'ǿ���˼�Lv1', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh2', 'ǿ���˼�Lv2', 2, 1, 0, 0, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh3', 'ǿ���˼�Lv3', 3, 1, 1, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh4', 'ǿ���˼�Lv4', 4, 1, 2, 1, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh5', 'ǿ���˼�Lv5', 5, 2, 3, 1, 4);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh6', 'ǿ���˼�Lv6', 6, 3, 3, 2, 6);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh7', 'ǿ���˼�Lv7', 7, 4, 3, 3, 7);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh8', 'ǿ���˼�Lv8', 8, 5, 4, 3, 8);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh9', 'ǿ���˼�Lv9', 9, 5, 4, 5, 8);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enhx', 'ǿ���˼�LvX', 10, 6, 4, 5, 8);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext1', 'Extended Lv1', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext2', 'Extended Lv2', 2, 2, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext3', 'Extended Lv3', 3, 3, 0, 1, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext4', 'Extended Lv4', 4, 5, 0, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext5', 'Extended Lv5', 5, 7, 1, 2, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext6', 'Extended Lv6', 6, 9, 1, 6, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext7', 'Extended Lv7', 7, 10, 1, 7, 4);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext8', 'Extended Lv8', 8, 10, 1, 8, 6);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext9', 'Extended Lv9', 9, 10, 1, 8, 6);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('extx', 'Extended LvX', 10, 10, 1, 8, 6);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy1', '��� Lv1', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy2', '��� Lv2', 2, 0, 1, 1, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy3', '��� Lv3', 3, 1, 1, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy4', '��� Lv4', 4, 1, 2, 2, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy5', '��� Lv5', 5, 2, 4, 2, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy6', '��� Lv6', 6, 5, 8, 3, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy7', '��� Lv7', 7, 7, 10, 3, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy8', '��� Lv8', 8, 9, 11, 4, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy9', '��� Lv9', 9, 10, 12, 4, 6);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psyx', '��� LvX', 10, 10, 13, 4, 8);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt1', 'New Type Lv1', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt2', 'New Type Lv2', 2, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt3', 'New Type Lv3', 3, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt4', 'New Type Lv4', 4, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt5', 'New Type Lv5', 5, 1, 1, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt6', 'New Type Lv6', 6, 2, 2, 2, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt7', 'New Type Lv7', 7, 3, 3, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt8', 'New Type Lv8', 8, 7, 3, 7, 7);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt9', 'New Type Lv9', 9, 10, 3, 11, 11);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt10', 'New Type LvX', 10, 12, 3, 13, 12);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co1', 'CO Lv1', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co2', 'CO Lv2', 2, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co3', 'CO Lv3', 3, 0, 0, 0, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co4', 'CO Lv4', 4, 0, 0, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co5', 'CO Lv5', 5, 1, 1, 2, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co6', 'CO Lv6', 6, 2, 2, 4, 4);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co7', 'CO Lv7', 7, 4, 4, 6, 6);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co8', 'CO Lv8', 8, 7, 7, 10, 8);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co9', 'CO Lv9', 9, 10, 10, 13, 8);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co10', 'CO LvX', 10, 13, 10, 14, 8);");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_sys_map` (
  `map_id` varchar(4) NOT NULL default '',
  `type` tinyint(1) NOT NULL default '0',
  `occprice` int(10) NOT NULL default '0',
  `hpmax` int(8) NOT NULL default '100000',
  `at` tinyint(3) NOT NULL default '10',
  `de` tinyint(3) NOT NULL default '10',
  `ta` tinyint(3) NOT NULL default '10',
  `wepa` varchar(32) NOT NULL default 'FortWepA',
  `movement` text NOT NULL,
  PRIMARY KEY  (`map_id`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('A1', 20, 500000, 100000, 10, 10, 10, 'FortWepA', 'C2 E2');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('A2', 23, 500000, 100000, 10, 10, 10, 'FortWepA', 'B2 A3');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('A3', 26, 500000, 100000, 10, 10, 10, 'FortWepA', 'A2 B3');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('B1', 21, 2500000, 200000, 25, 20, 20, 'FortWepB', 'A1');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('B2', 24, 10000000, 500000, 50, 50, 50, 'FortWepC', 'C2 A2 C1');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('B3', 27, 2500000, 200000, 25, 20, 20, 'FortWepB', 'A3 C3');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('C1', 22, 7500000, 400000, 45, 40, 40, 'FortWepC', 'B1 B2');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('C2', 25, 2500000, 200000, 25, 20, 20, 'FortWepB', 'B2 A1');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('C3', 28, 7500000, 350000, 40, 30, 30, 'FortWepD', 'E2 B3');");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('D1', '0', '7500000', '400000', '50', '40', '20', 'FortWepC', 'D2 D4');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('D2', '9', '500000', '200000', '10', '10', '10', 'FortWepA', 'D1 D3 D6');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('D3', '10', '7500000', '400000', '60', '30', '40', 'FortWepD', 'D2 D6');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('D4', '7', '5000000', '350000', '30', '10', '30', 'FortWepC', 'D1 D5 E1');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('D5', '6', '2500000', '200000', '20', '20', '20', 'FortWepB', 'D2 D4 D7');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('D6', '8', '5000000', '300000', '20', '40', '40', 'FortWepC', 'D2 D3 D9');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('D7', '1', '500000', '100000', '10', '10', '10', 'FortWepA', 'D5 D8');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('D8', '11', '500000', '100000', '10', '10', '10', 'FortWepA', 'D9 E1');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('D9', '12', '500000', '100000', '10', '10', '10', 'FortWepA', 'D6');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('D10', '13', '500000', '100000', '10', '10', '10', 'FortWepD', 'D1 D2 D3 D4 D5 D6 E1');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('D11', '14', '500000', '100000', '10', '10', '10', 'FortWepA', 'D1 D2 D3 D4 D5 D6 E1');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('D12', '15', '500000', '100000', '10', '10', '10', 'FortWepA', 'D1 D2 D3 D4 D5 D6 E1');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('D13', '16', '500000', '100000', '10', '10', '10', 'FortWepA', 'D1 D2 D3 D4 D5 D6 E1');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('E2', '3', '2147483647', '1000000', '127', '127', '127', 'FortWepD', 'D4 D8');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('E1', '2', '2147483647', '1000000', '127', '127', '127', 'FortWepD', 'A1 C3');");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_sys_ms` (
  `id` varchar(12) NOT NULL default '',
  `msname` varchar(24) NOT NULL default '',
  `price` int(10) NOT NULL default '0',
  `atf` tinyint(3) NOT NULL default '0',
  `def` tinyint(3) NOT NULL default '0',
  `ref` tinyint(3) NOT NULL default '0',
  `taf` tinyint(3) NOT NULL default '0',
  `hpfix` mediumint(6) NOT NULL default '0',
  `enfix` mediumint(6) NOT NULL default '0',
  `hprec` decimal(5,3) NOT NULL default '0.000',
  `enrec` decimal(5,3) NOT NULL default '0.000',
  `spec` varchar(20) NOT NULL default '',
  `needlv` tinyint(3) NOT NULL default '0',
  `image` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('0', 'No Unit', 0, 0, 0, 0, 0, 0, 0, 0.000, 0.000, '', 0, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('1', 'RX-75', 200000, 2, 1, 0, 2, 2600, 75, 10.779, 1.062, '', 1, 'ms01/RX-75.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('2', 'RX-77-2', 450000, 2, 2, 2, 4, 2500, 90, 20.000, 1.300, '', 5, 'ms01/RX-77-2.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('3', 'RGM-79', 500000, 2, 3, 3, 2, 2650, 100, 21.000, 1.500, '', 5, 'ms01/RGM-79.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('4', 'RX-78-2', 500000, 3, 2, 3, 2, 2650, 100, 21.000, 1.600, '', 5, 'ms01/RX-78-2.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('5', 'RX-78NT1', 550000, 5, 3, 3, 4, 2750, 120, 21.000, 1.800, '', 8, 'ms01/RX-78NT1.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('6', 'FA-78-1', 550000, 6, 3, 3, 3, 2750, 130, 22.000, 1.300, '', 8, 'ms01/FA-78-1.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('7', 'RX-78-3', 550000, 6, 3, 3, 3, 2700, 125, 20.000, 1.500, '', 8, 'ms01/RX-78-3.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('8', 'RGM-79N', 550000, 4, 3, 3, 4, 2700, 120, 22.779, 1.700, '', 7, 'ms01/RGM-79N.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9', 'RGC-83', 500000, 5, 3, 2, 5, 2750, 120, 22.000, 1.800, '', 7, 'ms01/RGC-83.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('10', 'RX-78 GP01FB', 950000, 8, 5,15,12, 5000, 180, 27.000, 5.000, '',20, 'ms01/RX-78 GP01FB.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('11', 'RX-178', 700000, 7, 4, 6, 6, 3000, 150, 23.779, 2.300, '', 15, 'ms01/RX-178.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('12', 'RX-79[G]Ez-8', 1000000, 7, 6,14,14, 6000, 200, 30.000, 7.000, '', 22, 'ms01/RX-79[G]Ez-8.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('13', 'XXXG-01SR2', 800000, 8,10, 6, 4, 3600, 140, 23.000, 2.500, '', 18, 'ms01/XXXG-01SR2.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('14', 'XXXG-01H2', 800000,10, 8, 4, 5, 3500, 150, 23.000, 2.700, '', 18, 'ms01/XXXG-01H2.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('15', 'RX-78 GP02A', 1500000,18,10,15,15,10000, 300, 50.000,10.000, '', 40, 'ms01/RX-78 GP02A.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('16', 'RX-78 GP03D', 2700000,25,22,17,18,12000, 450, 38.000,13.000, '', 50, 'ms01/RX-78 GP03D.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('17', 'MSA-099', 900000, 8, 5, 10, 10, 3300, 160, 26.000, 3.779, '', 25, 'ms01/MSA-099.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('18', 'RX-178+FXA-05D', 970000,10, 9, 8,11, 4000, 150, 24.000, 2.700, '', 25, 'ms01/RX-178+FXA-05D.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('19', 'XXXG-01S2', 1000000,12,11, 6, 6, 3800, 170, 25.000, 3.300, '', 28, 'ms01/XXXG-01S2.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('20', 'MSN-100', 1400000,13, 7,14,14, 4200, 220, 27.000, 5.000, '', 38, 'ms01/MSN-100.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('21', 'MSA-005', 1200000,10,14,11,12, 4600, 200, 30.000, 4.000, '', 38, 'ms01/MSA-005.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('22', 'RGZ-91', 1600000,13, 9,10,13, 4500, 240, 27.000, 4.000, '', 38, 'ms01/RGZ-91.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('23', 'XM-X1(F-97)', 2000000,16,14,13,13, 4700, 250, 28.000, 4.779, '', 38,'ms01/XM-X1(F-97).gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('24', 'XXG-01D2', 1800000,14,15, 9, 9, 5000, 530, 25.000, 3.800, '', 38,'ms01/XXXG-01D2.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('25', '��GETTA��1', 5350000, 15, 12, 13, 14, 6000, 275, 37.500, 4.750, '', 45,'ms01/GETTA��1.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('26', '����EVA��01', 5250000, 16, 12, 11, 14, 6000, 275, 37.500, 4.750, '', 45,'ms01/EVA��01.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('27', '����ߴ�', 5825000, 18, 13, 12, 15, 6200, 275, 45.000, 4.583, 'SeedMode', 50,'seed/BUSTER.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('28', 'ǿϮ�ߴ�', 6525000, 19, 13, 13, 16, 6500, 500, 45.000, 4.583, 'SeedMode', 55,'seed/STRIKE.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('29', '����ߴ�', 8100000, 20, 16, 15, 18, 7000, 300, 42.500, 5.400, 'SeedMode', 65,'seed/JUSTICE.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('30', 'MS-05', 200000, 2, 0, 1, 2, 1400, 75, 10.725, 1.071, '', 1, 'ms01/MS-05.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9527', 'npc03', 1700000,14,14, 10, 9, 4800, 530, 25.000, 3.800, '', 99,'npc/npc03.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9528', 'npc01', 1700000,13,15, 10, 9, 5000, 530, 25.000, 3.800, '', 99,'npc/npc01.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9529', 'npc02', 1700000,14,14, 10, 9, 5500, 530, 25.000, 3.800, '', 99,'npc/npc02.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9530', 'npc04', 1700000,14,14, 10, 9, 5400, 540, 25.000, 3.800, '', 99,'npc/npc04.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9531', 'npc05', 1700000,14,14, 10, 9, 4800, 520, 25.000, 3.800, '', 99,'npc/npc05.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9532', 'npc06', 1700000,14,14, 10, 9, 5000, 520, 25.000, 3.800, '', 99,'npc/npc06.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9533', 'npc07', 1700000,14,14, 10, 9, 5200, 530, 25.000, 3.800, '', 99,'npc/npc07.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9534', 'npc08', 1700000,14,14, 10, 9, 5300, 530, 25.000, 3.800, '', 99,'npc/npc08.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9535', 'npc09', 1700000,14,14, 10, 9, 5300, 530, 25.000, 3.800, '', 99,'npc/npc08.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9536', 'npc10', 1700000,14,14, 10, 9, 5300, 530, 25.000, 3.800, '', 99,'npc/npc08.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9537', 'npc11', 1700000,14,14, 10, 9, 5300, 530, 25.000, 3.800, '', 99,'npc/npc08.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9538', 'npc12', 1700000,14,14, 10, 9, 5300, 530, 25.000, 3.800, '', 99,'npc/npc08.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9539', 'npc13', 1700000,14,14, 10, 9, 5300, 530, 25.000, 3.800, '', 99,'npc/npc08.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9540', 'npc14', 1700000,14,14, 10, 9, 5300, 530, 25.000, 3.800, '', 99,'npc/npc08.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9541', 'npc15', 1700000,14,14, 10, 9, 5300, 530, 25.000, 3.800, '', 99,'npc/npc08.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9542', 'npc16', 1700000,14,14, 10, 9, 5300, 530, 25.000, 3.800, '', 99,'npc/npc08.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9543', 'npc17', 1700000,14,14, 10, 9, 5300, 530, 25.000, 3.800, '', 99,'npc/npc08.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9544', 'npc18', 1700000,14,14, 10, 9, 5300, 530, 25.000, 3.800, '', 99,'npc/npc08.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9545', 'npc19', 1700000,14,14, 10, 9, 5300, 530, 25.000, 3.800, '', 99,'npc/npc08.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('874', '��˫', 99999999,25,23, 22, 23, 30000, 5000, 50.000, 0.015, 'EXAMSystem', 99,'special/ghost.gif');");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` (
  `tact_id` varchar(12) NOT NULL default '0',
  `wep_id` varchar(16) NOT NULL default '0',
  `grade` tinyint(2) NOT NULL default '1',
  `directions` text NOT NULL,
  `m1` varchar(16) NOT NULL default '',
  `m2` varchar(16) NOT NULL default '',
  `m3` varchar(16) default NULL,
  `m4` varchar(16) default NULL,
  `m5` varchar(16) default NULL,
  `m6` varchar(16) default NULL,
  `m7` varchar(16) default NULL,
  `m8` varchar(16) default NULL,
  `m9` varchar(16) default NULL,
  `m10` varchar(16) default NULL,
  `m11` varchar(16) default NULL,
  `m12` varchar(16) default NULL,
  `m13` varchar(16) default NULL,
  `m14` varchar(16) default NULL,
  `m15` varchar(16) default NULL,
  `m16` varchar(16) default NULL,
  `m17` varchar(16) default NULL,
  `m18` varchar(16) default NULL,
  `m19` varchar(16) default NULL,
  `m20` varchar(16) default NULL,
  PRIMARY KEY  (`tact_id`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('0', '901', 10, 'G-bit����΢��������<br>����һ��·�����Ӷ����ˣ���һ���������������Nֱ�壬���Ǳ����ϵ������......<br>ԭ����һ���оɵ��ռǣ�����֧�����飺<br>�벻��ʮ��֧���ڲ�������������󣡾�Ȼ�����һҪ������������Σ������ֶζ�Ҫ���G-bit����΢�������ڵ�����......<br>�ǂ������޴�������G-bit����΢�������ڵ������ѵ��֣����Ѿ�û���κ����ü�ֵ��......���췽����Ȼ������ĸ��}�ӣ�<br>��һ��¯        ����΢��������<br>����¯          ˫����΢��������<br>����¯          Buster Beam Rifle<br>�ĺ�¯          �����������ũ��<br>���¯          ���͹�����ũ��<br>����¯          �����׼�������<br>�ߺ�¯          ˮ��<br>�˺�¯          ˮ��<br>�ź�¯          ˮ��<br>ʮ��¯          �ƽ�<br>ʮһ��¯        �ƽ�<br>ʮ����¯        �ƽ�<br>������Ӧ�ÿ����������?.....���ռǵ������<br>', '974', '993', '962', '616', '619', '608', '718', '718', '718', '715', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('1', '902', 10, '������������齣<br>��ӵ����������û�У����ǲ���ʹ�����������ģ�<br>������������齣�������������޵н��ĺ���������ʵ��������֮�ϣ���ͬ����һ����Ҫ��ʻԱ���ȼ��м����������u���һ�ѽ�<br>��������������������������<br>һ��¯          ���������޵н�<br>����¯          ������������齣<br>����¯          ������������齣<br>�ĺ�¯          T-Link Sensor<br>���¯          T-Link Sensor<br>����¯          �����͹�����<br>�ߺ�¯          �����͹�����<br>�˺�¯          ˮ��<br>�ź�¯          ˮ��<br>ʮ��¯          �ƽ�<br>ʮһ��¯        �ƽ�<br>', '983', '314', '314', '932', '932', '309', '309', '718', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('2', '903', 10, '������<br>������ǰ����һ�������ױȵ�����<br>��ӵ�г��ߵĹ���������̣�����ԭ��ͺڶ������ƣ����Խ����ַ�������ռ䣬֮������Ŀ�����������̮���������ƻ�������ṹ<br>�����ǩ������˳h��������õ����ɣ��Ǻǣ����ţ�������u�������ڵĲ����б�<br>һ��¯          ����΢��������<br>����¯          �����Ӳ�ǹBST<br>����¯          �����Ӳ�ǹBST<br>�ĺ�¯          ��������׼ϵͳ<br>���¯          �����<br>����¯          �׼�������<br>�ߺ�¯          ������<br>�˺�¯          ������<br>�ź�¯          ˮ��<br>ʮ��¯          ˮ��<br>ʮһ��¯        �ƽ�<br>ʮ����¯        ����<br>', '974', '952', '952', '965', '610', '618', '613', '613', '718', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('3', '904', 10, '��֮��<br>������һλ�����Ա��˵���£��������߹�ȥ��<br>�����������ڷ������£���֪���ҿ��������᣿��һ�b�ᷢ���С��<br>�����˶����Ȳ��ѣ�����˵��ȥ��<br>����ʵ���������������ᷢ����ڣ�����һ������ʹ�ù�֮���MS�������еķ��������������ţ�<br>���������������һ�̣��������ű��г����������̶���ը����<br>�ǹ����Ա����?�ݏ����ó��й⣬Ȼ��̾��һ���������Ϸ����˫�ۣ������˵��<br>�����ԣ�����С��ϣ�����ҷ����֮������췽����ֻ���ֽ�......��<br>��ϧ�����ٴ�˫�۵�ʱ�����Ƕ�ɢ�ˣ���ȴ��Ӧ������Ԥ���뿪<br>�ǹ����Ա�Է����˫��������ץס˫�֣�����<br>���ֵܣ��������ˣ����й����֮�����췽���Ļ����ˣ���<br>���ֲ�����˼�Ƶ���һ�����⣬ֻ���ó�Ǯ�������֮������췽��<br>������һ���м������񣬵�����һ��ֽ��д�Ź�֮������췽����<br>һ��¯          ��������������<br>����¯          �����͹�����<br>����¯          �����͹�����<br>�ĺ�¯          HiMAT System<br>���¯          ˮ��<br>����¯          ˮ��<br>�ߺ�¯          ˮ��<br>�˺�¯          �ƽ�<br>�ź�¯          �ƽ�<br>', '310', '309', '309', '998', '718', '718', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('4', '905', 10, '�ڶ���<br>���������о���ǿ�Ĺ������������ֺڶ��ڿ�����ǿ<br>�ڶ��ڵĻ���ԭ���Ƿ����һ����ǿ�������ţ�����Ŀ��֮��ʼ����̮��������һ���ڶ���Ŀ���������У�<br>�������ڶ���ֻ��һ�����������������<br>�u��ڶ�����һ���򵥵Ĺ�����һ��С�Ŀ��ܻᱻ�ڶ����룬�����Լ��������Ҿ��������о��󣬺ڶ��ڿ��ܵ��u�������U<br>һ��¯          �׼�������<br>����¯          ���͹�����ũ��<br>����¯          �����׼�������<br>�ĺ�¯          280mm�����ũ��<br>���¯          ���������ǹ<br>����¯          ˮ��<br>�ߺ�¯          ˮ��<br>�˺�¯          �ƽ�<br>', '618', '619', '608', '410', '409', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('5', '906', 10, 'Solar panel<br>�ڹ����Ƨ�����䣬һ���ڵ����̵����ˣ��Р�������Ӧ���ǹ����Ա֮һ�����������˹�ȥ���ó�һ�䳮Ʊ��<br>�������빵ͨ����Bbm zpt udmk nd tnndugjmh zcnvs ugbs?��<br>�����Ա��������һ����Ȼ��ʩʩ�����̵٣���nl���ݿɿ��鱨��ĳ������֯�Ĺ���ʦ��ͬ��ѧ�ң�<br>�������u��һ�ֻ��Զ��ظ�EN�����ϣ�Solar panel<br>�������ǵ���ϸ�ĵ��飬�ѻ���й����ϣ�<br>һ��¯          ��ͭ<br>����¯          ����<br>����¯          �ƽ�<br>�ĺ�¯          ˮ��<br>���¯          ˮ��<br>����¯          �ƽ�<br>�ߺ�¯          ����<br>�˺�¯          ��ͭ<br>�ź�¯          ��ͭ<br>ʮ��¯          ����<br>ʮһ��¯        �ƽ�<br>ʮ����¯        ˮ��<br>ʮ����¯        E - cap��<br>', '711', '712', '715', '718', '718', '715', '712', '711', '711', '712', '715', '718', '999', NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('6', '907', 10, 'NANO Skin<br>�ڹ����Ƨ�����䣬һ���ڵ����̵����ˣ��Р�������Ӧ���ǹ����Ա֮һ�����������˹�ȥ���ó�һ�䳮Ʊ��<br>�������빵ͨ����Bbm zpt udmk nd tnndugjmh zcnvs ugbs?��<br>�����Ա��������һ����Ȼ��ʩʩ�����̵٣���nl���ݿɿ��鱨��ĳ������֯�Ĺ���ʦ��ͬ��ѧ�ң�<br>�������u��һ�ֻ��Զ��ظ�HP�����ϣ�NANO Skin<br>�������ǵ���ϸ�ĵ��飬�ѻ���й����ϣ�<br>һ��¯          ��ͭ<br>����¯          ����<br>����¯          �ƽ�<br>�ĺ�¯          ˮ��<br>���¯          ˮ��<br>����¯          �ƽ�<br>�ߺ�¯          ����<br>�˺�¯          ��ͭ<br>�ź�¯          ��ͭ<br>ʮ��¯          ����<br>ʮһ��¯        �ƽ�<br>ʮ����¯        ˮ��    <br>ʮ����¯        ��Ӳ��װ��<br>ʮ�ĺ�¯        ���Ͻ�Zװ�ס�<br>', '711', '712', '715', '718', '718', '715', '712', '711', '711', '712', '715', '718', '957', '989', NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('7', '908', 10, 'Z��O��Armor<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ��������Z��O��Armor������һ�ֺϽ�װ�ף����ϳ��Ͻ�Zװ����Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          ���Ͻ�Zװ��<br>����¯          ���Ͻ�Zװ��<br>����¯          �ߴ���ķ�Ͻ�װ��<br>�ĺ�¯          �ߴ���ķ�Ͻ�װ��<br>���¯          ���ѺϽ�װ��<br>����¯          ���ѺϽ�װ��<br>�ߺ�¯          ���ѺϽ�װ�ס�<br>', '989', '989', '956', '956', '831', '831', '831', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('8', '909', 10, '���Ͻ�newZװ��<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ�����������Ͻ�newZװ�ף�����һ�ֺϽ�װ�ף����ϳ��Ͻ�Zװ����Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          ���Ͻ�Zװ��<br>����¯          ���Ͻ�Zװ��<br>����¯          ��Ӳ��װ��<br>�ĺ�¯          ��Ӳ��װ��<br>���¯          ���ѺϽ�װ��<br>����¯          ���ѺϽ�װ��    <br>�ߺ�¯          ���ѺϽ�װ�ס�<br>����л�ݹˣ���<br>', '989', '989', '957', '957', '831', '831', '831', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('9', '991', 9, 'V.S.B.R.<br>���ڹ��ῴ����һ�������߼��������췽�����ˣ��������߹���������һ���ĵ�<br>����֪���й�V.S.B.R.�����𣿡�<br>����Ȼ֪����V.S.B.R.��Variable Speed Beam Rifle�����޶��ٹ�����ǹ......��<br>����������������ģ���<br>������֣�����Ҫʲ���ģ�����������㵱Ȼ֪������Ȼ�ǽ����ĵã�û��Ǯ�ǲ��е�<br>���ó�һ����Ʊ������Ȼ���������췽����<br>һ��¯          ���ܹ�����ǹ<br>����¯          ���ܹ�����ǹ<br>����¯          Mega��Beam Rifle<br>�ĺ�¯          �����������ũ��<br>���¯          ������<br>����¯          ˮ��<br>�ߺ�¯          ˮ��<br>�˺�¯          �ƽ�<br>�ź�¯          �ƽ�<br>', '405', '405', '411', '616', '613', '718', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('10', '992', 9, 'Twin Buster Rifle<br>����ǰ����һ�����սʿ��������������Ա���ǵ��Һ��������u��һ��ӵ����֧ǹ�ܶ��ƻ����޴�Ĳ�ǹ��<br>�Ҽǵ��u�����ǹ��Ҫ�Ѳ��������ţ�<br>һ��¯          Buster Beam Rifle<br>����¯          Buster Rifle<br>����¯          Buster Rifle<br>�ĺ�¯          2��װ���ǹ<br>���¯          ���͹�����ũ��<br>����¯          ���͹�����ũ��<br>�ߺ�¯          ˮ��<br>�˺�¯          �ƽ�', '962', '412', '412', '407', '619', '619', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('11', '993', 9, '˫����΢��������<br>����һ��·�����Ӷ����ˣ���һ���������������Nֱ�壬���Ǳ����ϵ������......<br>ԭ����һ���оɵ��ռǣ�����֧�����飺<br>��˫����΢����������G-bit����΢�������ڵ���Դ�ѵ��֣�<br>һ��¯          ����΢��������<br>����¯          ����΢��������<br>����¯          �����������ũ��<br>�ĺ�¯          ������ũ��<br>���¯          ������<br>����¯          ��װ��<br>�ߺ�¯          ˮ��<br>�˺�¯          �ƽ�<br>�ź�¯          �ƽ�<br>ʮ��¯          �ƽ�<br>����G-bit����΢�����������Ϊ�}��......��<br>�ռ���һҳ�������ƺ��ǹ��ⱻ˺ȥ�ģ��ռǵ������<br>', '974', '974', '616', '614', '613', '609', '718', '715', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('12', '994', 9, '��Ӧ��<br>���ڹ��ῴ����һ���ݳ��Ƿɵ����˵ĳ�Ա�������������׷���йط�Ӧ�������⣺<br>���������׷�ٷɵ��෴����Ӧ����һ��׷�󹥻����޵ķɵ��������޷�Ӧ�ú�����׷�ټ�����<br>���������Ĺ������ߣ�������ʮ����󣬵��������<br>��Ȼ������߼ۣ����ǲ�������ʧ�����صģ�<br>һ��¯          ���ӻ����<br>����¯          ���ӻ����<br>����¯          NEO�����<br>�ĺ�¯          NEO�����<br>���¯          ���ܷɵ�������<br>����¯          ���ܷɵ�������<br>�ߺ�¯          ˮ��<br>�˺�¯          ˮ��<br>�ź�¯          �ƽ�<br>', '522', '522', '517', '517', '502', '502', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('13', '995', 9, 'ն������һ����ն<br>��ӹ����Ա��˵��ն��������ʮ��ǿ����������ҿ���ʹ�����壭ն������һ����ն<br>��Ҫ����ն������Ǳ�ܣ��⿿��ʻԱ�������������ǲ���ģ�ն���������Ⱦ���ǿ�������з��������������Ӵ�����Ŀ���<br>��ǿ���������������ʵ��Ĳ����ٴ�����(?)��<br>һ��¯          ն����<br>����¯          ������<br>����¯          ���Ͻ�Zװ��<br>�ĺ�¯          ˮ��<br>���¯          �ƽ�<br>����¯          ����<br>�ߺ�¯          ����<br>', '129', '127', '989', '718', '715', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('14', '996', 9, '������<br>���ϵ�ҹ�����ǻῴ�����ǵ�, ������һ��, ���һ������ˡ������ر���ǡ�<br>�㲻��̾Ϣ:����һ����������Bit������......��<br>һ����Ϥ��Ӱ�����¹���Ͷ���������,����: ������������?<br>������(?), ����Bit, ���ǵ���ò�ǲ�ͬ��.����������ǰ��֮�ϡ�<br>��һ�������ɵ����ϣ�<br>һ��¯          Bit<br>����¯          Newtypeϵͳ��Ӧ����ʽ������<br>����¯          ���ܹ�����ǹ<br>�ĺ�¯          ���ܹ�����ǹ<br>���¯          ��������׼ϵͳ<br>����¯          ������<br>�ߺ�¯          ����<br>�˺�¯          ˮ��<br>��û����һ�仰, ֻ��......<br>', '971', '620', '405', '405', '965', '613', '712', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('15', '997', 9, '������<br>���ϵ�ҹ�����ǻῴ�����ǵ�, ������һ��, ���һ������ˡ������ر���ǡ�<br>�㲻��̾Ϣ:����һ����������Bit������......��<br>һ����Ϥ��Ӱ�����¹���Ͷ���������,����: ������������?<br>������(?), ����Bit, ���ǵ���ò�ǲ�ͬ��.����������ǰ��֮�ϡ�<br>��һ�������ɵ����ϣ�<br>һ��¯          Bit<br>����¯          Newtypeϵͳ��Ӧ����ʽ������<br>����¯          ���ܹ�����ǹ<br>�ĺ�¯          ���ܹ�����ǹ<br>���¯          ��������׼ϵͳ<br>����¯          ������<br>�ߺ�¯          �ƽ�<br>�˺�¯          ˮ��<br>��û����һ�仰, ֻ��......<br>', '971', '620', '405', '405', '965', '613', '715', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('16', '998', 9, 'HiMAT System<br>֧���޿�󣬹�����Ա���㵽һ������ʦ���e��<br>������֪����������70���ء�18�׸ߵĻ���սʿ���ﵽ Mach 4 ���ٶ�֮װ���𣿡�<br>������˵�������ñ��͡�Ҳ���ð�װ���͵���������ȴ���ڴ���Ȧ�ڴﵽ��˾��˵��ٶȣ�<br>�������ǰѡ��������õ�һ��ϵͳ �� High Mobility Aerial Tactics System !��<br>֮���������һ���ļ����㣬���e������ HiMAT System ���u��������<br>һ��¯          �������״�<br>����¯          Hyper Thruster<br>����¯          Hyper Thruster<br>�ĺ�¯          �����������ϵͳ<br>���¯          �����������ϵͳ<br>����¯          �ƽ�<br>�ߺ�¯          �ƽ�<br>�˺�¯          ˮ��<br>�ź�¯          ˮ��<br>ʮ��¯          ˮ��<br>', '977', '976', '976', '911', '911', '715', '715', '718', '718', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('17', '999', 9, 'E - cap<br>�ڹ����Ƨ�����䣬һ���ڵ����̵����ˣ��Р�������Ӧ���ǹ����Ա֮һ�����������˹�ȥ���ó�һ�䳮Ʊ��<br>�������빵ͨ����Bbm zpt udmk nd tnndugjmh zcnvs ugbs?��<br>�����Ա��������һ����Ȼ��ʩʩ�����̵٣���nl���ݿɿ��鱨��ĳ������֯�Ĺ���ʦ��ͬ��ѧ�ң�<br>�������u��һ�ֻ��Զ��ظ�EN�����ϣ�E - cap<br>�������ǵ���ϸ�ĵ��飬�ѻ���й����ϣ�<br>һ��¯          ��ͭ<br>����¯          ����<br>����¯          �ƽ�<br>�ĺ�¯          ˮ��<br>���¯          ˮ��<br>����¯          �ƽ�<br>�ߺ�¯          ����<br>�˺�¯          ��ͭ<br>�ź�¯          ˮ��<br>ʮ��¯          �ƽ�<br>', '711', '712', '715', '718', '718', '715', '712', '711', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('18', '981', 8, '��ӹ����Ա��˵�����Ƽ�ʻԱ�ǿ��Է�����ս�������Ǳ�ܵģ���ʹ�����������˳���50%�������ֺ����\"��ս���V��ն\".<br>��Ҫ������ս���Ǳ�ܣ��⿿��ʻԱ�������ǲ��еģ����������Ⱦ���ǿ�������з��������Ŀ���<br>Ҫǿ���������������ʵ��Ĳ����ٴ�������ս���<br>һ��¯          ��ս�<br>����¯          ��Ž�<br>����¯          ��ż�ũ��<br>�ĺ�¯          ���͵�Ÿ�<br>���¯          ���͵�Ÿ�<br>����¯          ˮ��<br>�ߺ�¯          �ƽ�<br>�˺�¯          ����<br>', '963', '106', '943', '116', '116', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('19', '982', 8, '���������<br>���ڹ��ῴ����һ�������߼��������췽�����ˣ��������߹���������һ���ĵ�<br>����֪���йس������������𣿡�<br>����Ȼ֪���������������һ�����õ������������������������......��<br>����������������ģ���<br>������֣�����Ҫʲ���ģ�����������㵱Ȼ֪������Ȼ�ǽ����ĵã�û��Ǯ�ǲ��е�<br>���ó�һ����Ʊ������Ȼ���������췽����<br>һ��¯          ��ż�ũ��<br>����¯          �����<br>����¯          ˫��תʽ��Ÿ�<br>�ĺ�¯          ˮ��<br>���¯          �ƽ�<br>����¯          �ƽ�<br>�ߺ�¯          ����<br>�˺�¯          ��ͭ<br>', '943', '933', '118', '718', '715', '715', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('20', '983', 8, '���������޵н�<br>��ӵ����������û�У����ǲ���ʹ�����������ģ�<br>���������޵н�������˼�壬�����޵еģ���һ����Ҫ��ʻԱ���ȼ��е�����������������u��һ�ѽ�����������<br>һ��¯          ������������齣<br>����¯          ������������齣<br>����¯          T-Link Sensor<br>�ĺ�¯          T-Link Sensor<br>���¯          ˮ��<br>����¯          �ƽ�<br>', '314', '314', '932', '932', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('21', '984', 8, '˫���ֻ�����<br>���ֻ�������һ���������͵�����<br>�����룬�������ֻ�����һ�����һ�����������ˣ��������Ѹ��ֻ����ڲ���һ���ݻ�һ�����<br>���ҳ��Ÿ��ֻ����ڹ�����һ���˷ܸо���ʹ��ʻԱ���ܷ����䳤<br>һ��¯          ���ֻ�����<br>����¯          ���ֻ�����<br>����¯          ˫������ת����<br>�ĺ�¯          ��װ��ɢ����<br>���¯          ˮ��<br>����¯          �ƽ�            <br>', '968', '968', '430', '422', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('22', '985', 8, '��ʽն����<br>���ڹ���āѸ������ҵ�����ʽն���������֣�Ȼ������ȴֻ֪��ն���������������˸������Ա���ʣ�<br>������ն����ǿ�����������ԭ����ר�����������������ܱ���ȡ�������򱻹㷺ʹ��<br>��ʽն����ʤ�ڹ������ߣ��佣��һ���ӻ��ƣ�����췽�����£�<br>һ��¯          ն����<br>����¯          ն����<br>����¯          �߳����ܲ���<br>�ĺ�¯          ���Ͻ�Zװ��<br>���¯          ˮ��<br>����¯          �ƽ�<br>', '129', '129', '108', '989', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('23', '987', 8, '����Ԫ�״�<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ������������Ԫ�״����һ�ָ�����׼װ�ã����ϸ������״���Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          �������״�<br>����¯          ˮ��<br>����¯          ˮ��<br>�ĺ�¯          �ƽ�<br>���¯          �ƽ�<br>����¯          ������<br>����л�ݹˣ���<br>', '977', '718', '718', '715', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('24', '988', 8, 'G��Territory<br>��żȻĿ����һ��ս��:<br>A�ݺݵ��Թ���������B����, ��Ȼ, һ�㲻���Եķ����������, ��A�Ĺ���������, Ȼ��b��һ������A.<br>��ʦ������������˻�,��˻�����(?)�����췽��, ���������ε�˵������I-Field Barrier,����,�ƽ�,ˮ��,�ƽ�,����,ˮ��<br>���ű����ˡ�����, �㲻֪��������¯�Ĵ�����!����, ���Կ϶�����, ԭ���ǲ������ǰ��ġ�<br>', '966', '718', '718', '718', '715', '715', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('25', '989', 8, '���Ͻ�Zװ��<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ�����������Ͻ�Zװ�ף�����һ�ֺϽ�װ�ף����ϸߴ���ķ�Ͻ�װ����Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          �ߴ���ķ�Ͻ�װ��<br>����¯          �ߴ���ķ�Ͻ�װ��<br>����¯          ��Ӳ��װ��<br>�ĺ�¯          ��Ӳ��װ��<br>���¯          ˮ��<br>����¯          ˮ��<br>�ߺ�¯          �ƽ�<br>����л�ݹˣ���<br>', '956', '956', '957', '957', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('26', '971', 7, 'Bit<br>����, �����f�������������޵����, ȴ�������Ÿ����ر���ǡ�<br>������Bit��!�ǿ���һ��ǿ���ľ����������������˵��,������һ������:<br>һ��¯          Newtypeϵͳ��Ӧ����ʽ������<br>����¯          ������<br>����¯          ������<br>�ĺ�¯          ���ܹ�����ǹ<br>���¯          Psyco-Frame<br>����¯          ˮ��<br>�ߺ�¯          ˮ��<br>��һ�仰:����Ե��������......��<br>', '620', '613', '613', '405', '975', '718', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('27', '972', 7, 'Divider<br>�������߽���������йز�ͬ���������췽����ȴ��һ�����ֵ���ײ����������վ�����ֻع���<br>�����������й�����΢�������ڵ��£�<br>���ҵ�����΢����������ս���������ˣ������������һ���𣿡�<br>���������������˿���ʮ�ֽ���<br>����......�����̫�ֹۣ�Ӧ�ò������ˣ������������Divider��������΢�������ڣ�����������١�<br>����������������ģ���<br>����ԭ���ѻٵ�������ֻ����˳�����ȫ������ɢ�׼������ڣ������������ũ�ڣ������������ũ�ڣ�ˮ����ˮ�����ƽ�������Divider�ˡ�<br>��лл����<br>', '974', '607', '616', '616', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('28', '973', 7, '�ƶ��޺*����ɱ<br>��ӹ����Ա��˵�����Ƽ�ʻԱ�ǿ��Է���(?)������Ǳ�ܵģ���ʹ�����������˳���50%�������ֺ����\"(?)\".<br>��Ҫ����(?)��Ǳ�ܣ��⿿��ʻԱ�������ǲ��еģ����������Ⱦ���ǿ�������з��������Ŀ���<br>Ҫǿ���������������ʵ��Ĳ����ٴ�����ƶ��޺��<br>һ��¯          �ƶ��޺<br>����¯          �ƶ�˲����<br>����¯          �ƶ�˲����<br>�ĺ�¯          ���٣��������ν�<br>���¯          ��������ϵͳ<br>����¯          ˮ��<br>', '955', '324', '324', '321', '931', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('29', '974', 7, '����΢��������<br>����һ��·�����Ӷ����ˣ���һ���������������Nֱ�壬���Ǳ����ϵ������......<br>ԭ����һ���оɵ��ռǣ�����֧�����飺<br>��ҹ��������<br>�ң�������������̵�һҹ......<br>����һ�������������ϣ����f���ţ�������ɫͻ�䣬�Ʋ㽥ɢ��һ����������䵽��أ������ŵ���һ��������죬<br>�����ž������ķ����ߣ�ֻ�����eһƬ���ߣ���ݲ��������Ǳ�һ�������Ե������ӹ�......��<br>��������������鰵�ã������ҵ���һ��ͷ����ԭ������G-bit����΢��������,������ֻ������΢�����������췽����<br>һ��¯          ���͹�����ũ��<br>����¯          �׼�������<br>����¯          �����������ũ��<br>�ĺ�¯          ��װ��<br>���¯          ˮ��<br>����¯          �ƽ�<br>�ߺ�¯          �ƽ�<br>�˺�¯          �ƽ�<br>��......ǧ������ҵ���G-bit����΢����������˫����΢�����������ϱ���ȡ�ˣ�Ӧ���ǹ����Ա����Ϊ�����Ѱ�������������ĳ�����......��<br>�ռǵ������<br>', '619', '618', '616', '609', '718', '715', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('30', '975', 7, 'Pscyo-Frame<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ��������Pscyo-Frame������һ����׼ϵͳ������Dual Sensor��Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ��������<br>�����췽�����£�<br>һ��¯          T-Link Sensor<br>����¯          T-Link Sensor<br>����¯          ˮ��<br>�ĺ�¯          �ƽ�<br>���¯          �ƽ�<br>����л�ݹˣ���<br>', '932', '932', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('31', '976', 7, 'Hyper Thruster<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ��������Hyper Thruster������һ�ָ�������װ�ã�����Thruster��Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          Thruster<br>����¯          Thruster<br>����¯          ˮ��<br>�ĺ�¯          ˮ��    ��<br>����л�ݹˣ���<br>', '941', '941', '718', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('32', '977', 7, '�������״�<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ���������������״����һ�ָ�����׼װ�ã����ϸ�������׼ϵͳ��Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          ��������׼ϵͳ<br>����¯          ˮ��<br>����¯          �ƽ�<br>�ĺ�¯          �ƽ�<br>����л�ݹˣ���<br>', '965', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('33', '978', 7, '���Field<br>��ӵ����������û�У����ǲ���ʹ�����������ģ�<br>һ��Field��I-Field��ֻҪ���㹻��Դ���ܹ����������ģ������Field����Ҫ��ʻԱ�ľ�����<br>ֻ��������ֲſ��Կ���������Ҫ�����������Field���ſ���������<br>һ��¯          T-Link Sensor<br>����¯          T-Link Sensor<br>����¯          E field<br>�ĺ�¯          ˮ��<br>���¯          �ƽ�<br>����¯          ����    <br>', '932', '932', '967', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('34', '979', 7, 'Fin Funnel Barrier<br>��Fin Funnel Barrier����Fin Funnel�йص�����������<br>�����������Fin Funnel Barrier����Fin Funnel������I-Field������ʼ�е㲻�ͷ�����ǿ�ջ�Ц<br>��������I-Field Barrier�к����𣿡����������<br>��Fin Funnel Barrier��Ȼ�������������������E field֮�ϡ�<br>������E field�������᣿����Խ��Խ�˷�<br>���㵽�����ǲ��򣿡�<br>�㿴����һ��������������ӣ���ֻ�ùԹԸ�Ǯ�������뿪......<br>һ��¯          E field<br>����¯          Beam Coating<br>����¯          ˮ��<br>�ĺ�¯          ˮ��<br>���¯          �ƽ�    <br>����л?����ͷһ�������ֻظ�ԭ����������<br>', '967', '922', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('35', '961', 6, '��ɢ���ӵ�<br>�������߽���������йز�ͬ���������췽����ȴ��һ�����ֵ���ײ����������վ�����ֻع���<br>�����������й�����΢�������ڵ��£�<br>���ҵ�ȫ������ɢ�׼���������ս���������ˣ������������һ���𣿡�<br>���������������˿���ʮ�ֽ���<br>����......�����̫�ֹۣ�Ӧ�ò������ˣ��������������ɢ���ӵ�����ȫ������ɢ�׼������ڣ�����������١�<br>����������������ģ���<br>����ԭ���ѻٵ�������ֻ��˳�������ɢ�׼������ڣ��׼������ڣ�ˮ�����ƽ𣬸������������ɢ���ӵ��ˡ�<br>��лл����<br>', '607', '605', '618', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('36', '962', 6, 'Buster Beam Rifle<br>���Ǹ���еά��Ա������ǰ���� Wing Gundam Zero ά�ޣ��ǵ��ǻ����д���һ֧���͵Ĳ�ǹ<br>�������Ľṹ�����������������ʦ����������Ѳ�ǹ��Ҫ���²����u�죺<br>һ��¯          Buster Rifle<br>����¯          Buster Rifle<br>����¯          Mega��Beam Rifle<br>�ĺ�¯          ���ܹ�����ǹ<br>���¯          ˮ��    <br>', '412', '412', '411', '405', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('37', '963', 6, '��ս�<br>��˵����һ�ѽ���Ϊ\"��ս�\"���������ޱȿɿ�ɽ��ʯ.<br>ĳ�գ����ڵ��Ϸ�����һ������������壬����Ϊ��ˮ��. <br>���ǣ��߽�һ����ԭ����һ�澵��������һ���飬��......�������Ŷ�.���ĺ�����㣬�����򿪿���.<br>���������-��ս������췽��<br>һ��¯          �߳��������䵶<br>����¯          ��������<br>����¯          ���ܲ���<br>�ĺ�¯          ������<br>���¯          ˮ��<br>����¯          ����    <br><br>����������-��ս������췽��<br>һ��¯          ���͵�Ÿ�<br>����¯          ��������<br>����¯          ���ܲ���<br>�ĺ�¯          ��Ž�<br>���¯          ˮ��<br>����¯          ����            <br>ԭ������ս������췽�������ǣ���һ���Ŷ��أ�<br>�����������......����������......?������, ��������.<br>', '116', '109', '107', '106', '718', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('38', '964', 6, '�����ƶ�ϵͳ<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵�������Ƽ�������������ƶ�ϵͳ������һ�ּ���ϵͳ��������������ϵͳ��Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          ��������ϵͳ<br>����¯          ˮ��<br>����¯          �ƽ�<br>�ĺ�¯          �ƽ�<br>���¯          ������<br>����л�ݹˣ���<br>', '931', '718', '715', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('39', '965', 6, '��������׼ϵͳ<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ����������������׼ϵͳ������һ�ָ�����׼װ�ã�������׼ϵͳ��Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          ��׼ϵͳ<br>����¯          ��׼ϵͳ<br>����¯          ˮ��<br>�ĺ�¯          �ƽ�<br>����л�ݹˣ���<br>', '942', '942', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('40', '966', 6, 'I-Field Barrier<br>��żȻĿ����һ��ս��:<br>A�ݺݵ��Թ���������B����, ��Ȼ, һ�㲻���Եķ����������, ��A�Ĺ���������, Ȼ��b��һ������A.<br>��ʦ������������˻�,��˻�����(?)�����췽��, ���������ε�˵��AB Field��ˮ����ˮ�����ƽ�<br>���ű����ˡ�����, �㲻֪��������¯�Ĵ�����!����, ���Կ϶�����, ԭ���ǲ������ǰ��ġ�<br>', '944', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('41', '967', 6, 'E field<br>��żȻĿ����һ��ս��:<br>A�ݺݵ��Թ���������B����, ��Ȼ, һ�㲻���Եķ����������, ��A�Ĺ���������, Ȼ��b��һ������A.<br>��ʦ������������˻�,��˻�����(?)�����췽��, ���������ε�˵��AB Field��ˮ�����ƽ𣬸�������������ͭ��<br>���ű����ˡ�����, �㲻֪��������¯�Ĵ�����!����, ���Կ϶�����, ԭ���ǲ������ǰ��ġ�<br>', '944', '718', '715', '712', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('42', '968', 6, '���ֻ�����<br>���ֻ�������һ���ص�ҩ��������ǧ���͹���������������Ȼһ���ӵ��Ĺ������ͣ���ʮ���ӵ����ƻ����ǲ��������<br>���ҳ��Ÿ��ֻ����ڹ�����һ���˷ܸо���ʹ��ʻԱ���ܷ����䳤<br>���췽�����£�<br>һ��¯          ������ת����<br>����¯          ������<br>����¯          ��ͻ����ͳ<br>�ĺ�¯          ˮ��<br>���¯          �ƽ�<br>����¯          ����<br>�ߺ�¯          ����<br>', '429', '419', '418', '718', '715', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('43', '986', 8, 'Transitive FEAR<br>����ĳ���ҵ��о���Աʱ����֪��һ����Ϊ FEAR ��ϵͳ�������Ǹ� Far-range Exploration and Alteration Re-locator�����ϵͳ�ܼ����һ�������ķ�Χ��һ�е��ϰ��Ȼ�󣬸��ܹ��� FEAR ϵͳ�е��ƽ����Ż������ѻ����ƽ������ܴﵽ�ļ��٣������ܶ�������ϰ��� �� �����о������������<br>���¾��� Transitive FEAR ���u��������<br>һ��¯          �����ƶ�ϵͳ<br>����¯          �����������ϵͳ<br>����¯          �����������ϵͳ<br>�ĺ�¯          �������ϵͳ<br>���¯          ˮ��<br>����¯          �ƽ�', '964', '911', '911', '801', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('44', '951', 5, '��һ����<br>���ڹ��ῴ����һ�������߼��������췽�����ˣ��������߹���������һ���ĵ�<br>����֪���йؾ�һ���ֵ����𣿡�<br>����Ȼ֪������һ�����������������Ǵ�˵�е�һ�ѹŵ�......��<br>����������������ģ���<br>������֣�����Ҫʲ���ģ�����������㵱Ȼ֪������Ȼ�ǽ����ĵã�û��Ǯ�ǲ��е�<br>���ó�һ����Ʊ������Ȼ���������췽����<br>һ��¯          ��������<br>����¯          �߳����ܲ���<br>����¯          ��װ�׵�<br>�ĺ�¯          ������<br>���¯          �ƽ�<br>����¯          ����<br>�ߺ�¯          ����<br>', '109', '108', '128', '127', '715', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('45', '952', 5, '�����Ӳ�ǹBST<br>���ڹ��ῴ����һ�������߼��������췽�����ˣ��������߹���������һ���ĵ�<br>����֪���й������Ӳ�ǹBST�����𣿡�<br>����Ȼ֪���������Ӳ�ǹBST�����������ӣ�������ѹ������������......��<br>����������������ģ���<br>������֣�����Ҫʲ���ģ�����������㵱Ȼ֪������Ȼ�ǽ����ĵã�û��Ǯ�ǲ��е�<br>���ó�һ����Ʊ������Ȼ���������췽����<br>һ��¯          280mm�����ũ��<br>����¯          �ƻ����ǹ<br>����¯          Mega��Beam Rifle<br>�ĺ�¯          �ƽ�<br>���¯          �ƽ�<br>', '410', '408', '411', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('46', '953', 5, '������׷�ٷɵ�<br>���ڹ��ῴ����һ���ݳ��Ƿɵ����˵ĳ�Ա�������������׷���йغ�����׷�ٷɵ�������<br>���ɵ���һ���������ͣ�������һ�㣬ȴ�д�����ҩ������<br>Ϊ�ֲ��������͵�ȱ�㣬�Ҹ������u��һ���Ժ�����׷�ٵ�ǿ���ɵ�<br>���췽�����£�<br>һ��¯          ��������׼ϵͳ<br>����¯          ȫ��λ���������<br>����¯          ɢ�������<br>�ĺ�¯          ˮ��<br>���¯          �ƽ�<br>����¯          ������<br>', '965', '512', '519', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('47', '954', 5, '�����<br>������ܣ��������û�������µģ���<br>������һ��Ԣ�����ڷ����������������ڷ������˹�����ͬʱ����ͻ�������䲻�⡹<br>������������һ�ڼۣ���<br>���ɽ���<br>һ��¯          ���ͻ���<br>����¯          ǿ������<br>����¯          ��ɢ�׼�������<br>�ĺ�¯          ���ѺϽ�װ��<br>���¯          ����<br>����¯          ����<br>�ߺ�¯          ������<br>', '828', '826', '605', '831', '712', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('48', '955', 5, '�ƶ��޺<br>��һ�������Ա��һ���Գ�һ�ǣ���������߹�ȥ����˵��<br>���Ҵ���������ʮ�꣬�������Ļ�����һ��......���죬�����Ͻ����ͻ��ż��������ս����Ȼ���ذ����׵罻�ӣ�<br>һ�ѽ�ͻȻ���������Ƽ䣬����һ�������ս���������һ��ֱ���������˾޴�ɳ�������ҵ��̶��౻�����ˡ�<br>����˵�˼ƶ��޺�����췽����<br>һ��¯          �ƶ�˲����<br>����¯          ������ɽ���������<br>����¯          �������ν�<br>�ĺ�¯          �ƽ�<br>���¯          �ƽ�<br>����¯          ����<br>���ǣ���գ�ۼ䣬���еľͲ�����<br>', '324', '323', '320', '715', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('49', '956', 5, '�ߴ���ķ�Ͻ�װ��<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ���������ߴ���ķ�Ͻ�װ�ף�����һ�ֺϽ�װ�ף��������ѺϽ�װ����Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          ���ѺϽ�װ��<br>����¯          ���ѺϽ�װ��<br>����¯          ǿ������<br>�ĺ�¯          ˮ��<br>���¯          ˮ��<br>����¯          ������<br>����л�ݹˣ���<br>', '831', '831', '826', '718', '718', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('50', '957', 5, '��Ӳ��װ��<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ����������Ӳ��װ�ף�����һ�ֺϽ�װ�ף��������ѺϽ�װ����Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          ���ѺϽ�װ��<br>����¯          ���ѺϽ�װ��<br>����¯          ���ͻ���<br>�ĺ�¯          ˮ��<br>���¯          ˮ��<br>����¯          ������<br>����л�ݹˣ���<br>', '831', '831', '828', '718', '718', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('51', '958', 5, '���Lʽ��ũ��<br>��ӵ����������û�У����ǲ���ʹ�����������ģ�<br>һ��ļ�ũ�ھ���Ҫ������Դ�������Lʽ��ũ�������⣬��ֻ��ҪС����Դ��ȴ�ﵽ��һ���ũ�ڵĹ���ˮƽ<br>��ϧֻ��������ַ��ɿ��������һ���þ�����<br>���췽�����£�<br>һ��¯          T-Link Sensor<br>����¯          T-Link Sensor<br>����¯          �����������ũ��<br>�ĺ�¯          ������ũ��<br>���¯          �ƽ�<br>����¯          ����    <br>', '932', '932', '616', '614', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('52', '941', 4, 'Thruster��<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ��������Thruster������һ�ָ�������װ�ã�����Mega Booster��Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          Mega Booster<br>����¯          Mega Booster<br>����¯          �ƽ�<br>�ĺ�¯          �ƽ�<br>����л�ݹˣ���<br>', '921', '921', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('53', '942', 4, '��׼ϵͳ<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ����������׼ϵͳ������һ�ָ�����׼װ�ã�������׼����Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          ��׼��<br>����¯          ��׼��<br>����¯          Dual Sensor<br>�ĺ�¯          �ƽ�<br>���¯          ������<br>����л�ݹˣ���<br>', '816', '816', '811', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('54', '943', 4, '��ż�ũ��<br>��ӹ����Ա��˵���йص�ż�ũ�ڵ��£�<br>����ż�ũ�ڣ�����˼�壬�����ѵ�����������ũ�ڵĽ�ϣ����������ǲ��㹻�ģ���Ϊ����Ҫһ�������ľ�ʯ���ſ����������̡�<br>', '933', '933', '614', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('55', '944', 4, 'AB Field<br>��żȻĿ����һ��ս��:<br>A�ݺݵ��Թ���������B����, ��Ȼ, һ�㲻���Եķ����������, ��A�Ĺ���������, Ȼ��b��һ������A.<br>��ʦ������������˻�,��˻�����(?)�����췽��, ���������ε�˵��Beam Coating���ƽ�ǿ�����ܣ�G��Wall���ƽ�<br>���ű����ˡ�����, �㲻֪��������¯�Ĵ�����!����, ���Կ϶�����, ԭ���ǲ������ǰ��ġ�<br>', '922', '821', '826', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('56', '945', 4, 'Shield Buster Rifle<br>�������е�·;�ϣ�������һ��MS����װ����Buster Rifle��Ȼ������������ֻ�ǿ��˿�������뿪��<br>��վס!����ͷһ������һλ���꣬����ɲ�����ͨ��Buster Rifle������Shield Buster Rifle����<br>��ʱ, Buster Rifle��ǹ��չ��, ���˷�����! <br>���������Ե�����, ����, ���������Shield Buster Rifle�����췽��:<br>һ��¯          ǿ������<br>����¯          ���ͻ���<br>����¯          Buster Rifle<br>�ĺ�¯          ˮ��<br>', '826', '828', '412', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('57', '931', 3, '��������ϵͳ<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵�������Ƽ����������������ϵͳ������һ�ּ���ϵͳ�����ϼ����������ϵͳ��Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          �����������ϵͳ<br>����¯          �������ϵͳ<br>����¯          �ƽ�<br>�ĺ�¯          ������<br>����л�ݹˣ���<br>', '911', '801', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('58', '932', 3, 'T-Link Sensor<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ��������T-Link Sensor������һ����׼ϵͳ������Pscyo-Frame��Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ��������<br>�����췽�����£�<br>һ��¯          Multi-Sensor<br>����¯          �ƽ�<br>����¯          ������<br>����л�ݹˣ���<br>', '912', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('59', '933', 3, '�����<br>��һ���������ᣬ���������е���ţ�������������������ԭ��<br>�Һã���һλ���ĵĳ�Աǰ��Э�������һ�и���������˵��<br>���������һ�ֳ��������������ֿɷ�֪���������췽��������֪�����ɲο��������ݡ�<br>Ȼ�����ݸ���һ���飺<br>һ��¯          ��תʽ��Ÿ�<br>����¯          ��Ž�<br>����¯          ���ǹ<br>�ĺ�¯          ����<br>���¯          ����<br>', '117', '106', '406', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('60', '608', 3, '�����׼�������<br>��һ���������ᣬ���������е���ţ�������������������ԭ��<br>�Һã���һλ���ĵĳ�Աǰ��Э�������һ�и���������˵��<br>�������׼���������һ�ֳ��������������ֿɷ�֪���������췽��������֪�����ɲο��������ݡ�<br>Ȼ�����ݸ���һ���飺<br>һ��¯          �׼�������<br>����¯          �׼�������<br>����¯          �ƽ�<br>�ĺ�¯          ��ͭ<br>', '601', '601', '715', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('61', '319', 3, '����<br>��һ���������ᣬ���������е���ţ�������������������ԭ��<br>�Һã���һλ���ĵĳ�Աǰ��Э�������һ�и���������˵��<br>��������һ�ֳ��������������ֿɷ�֪���������췽��������֪�����ɲο��������ݡ�<br>Ȼ�����ݸ���һ���飺<br>һ��¯          ���ܹ�����<br>����¯          �ƽ�<br>����¯          ����<br>�ĺ�¯          ����<br>���¯          ��ͭ<br>', '303', '715', '712', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('62', '921', 2, 'Mega Booster<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ��������Mega Booster������һ�ָ�������װ�ã�����Booster��Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          Booster<br>����¯          Booster<br>����¯          ����<br>�ĺ�¯          ������<br>����л�ݹˣ���<br>', '806', '806', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('63', '922', 2, 'Beam Coating<br>��żȻĿ����һ��ս��:<br>A�ݺݵ��Թ���������B����, ��Ȼ, һ�㲻���Եķ����������, ��A�Ĺ���������, Ȼ��b��һ������A.<br>��ʦ������������˻�,��˻�����(?)�����췽��, ���������ε�˵�˸�����G��Wall��������G��Wall��<br>���ű����ˡ�����, �㲻֪��������¯�Ĵ�����!����, ���Կ϶�����, ԭ���ǲ������ǰ��ġ�<br>', '821', '821', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('64', '504', 2, '���ڷ�����<br>��һ���������ᣬ���������е���ţ�������������������ԭ��<br>�Һã���һλ���ĵĳ�Աǰ��Э�������һ�и���������˵��<br>�����ڷ�������һ�ֳ��������������ֿɷ�֪���������췽��������֪�����ɲο��������ݡ�<br>Ȼ�����ݸ���һ���飺<br>һ��¯          ���ܷɵ�������<br>����¯          ���ܷɵ�������<br>����¯          �ƽ�<br>', '502', '502', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('65', '518', 2, '�߳��������<br>��һ���������ᣬ���������е���ţ�������������������ԭ��<br>�Һã���һλ���ĵĳ�Աǰ��Э�������һ�и���������˵��<br>���߳����������һ�ֳ��������������ֿɷ�֪���������췽��������֪�����ɲο��������ݡ�<br>Ȼ�����ݸ���һ���飺<br>һ��¯          ԭ���ܷɵ�������<br>����¯          �ƽ�<br>����¯          �ƽ�<br>�ĺ�¯          ��ͭ<br>', '503', '715', '715', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('66', '911', 1, '�����������ϵͳ<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵�������Ƽ�������������������ϵͳ������һ�ּ���ϵͳ�������������ϵͳ��Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ�������������췽�����£�<br>һ��¯          �������ϵͳ<br>����¯          �������ϵͳ<br>����¯          ����<br>�ĺ�¯          ��ͭ��<br>����л�ݹˣ���<br>', '801', '801', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('67', '912', 1, 'Multi-Sensor<br>�����Ա�������������Ϲ���ĸ���װ����ʵ���ǲ���ģ���������?��������Ϊ���ṩ����ĸ���װ�����췽����<br>˵�ţ���ɨ���������ϵĳ�Ʊ�������룬˵��<br>�����Ƽ��������Multi-Sensor������һ����׼ϵͳ������T-Link Sensor��Ч�ʣ�����������<br>���ͷʾ�⣬��Ǯ��������<br>�����췽�����£�<br>һ��¯          Dual Sensor<br>����¯          Dual Sensor<br>����¯          ����<br>�ĺ�¯          ��ͭ��<br>����л�ݹˣ���<br>', '811', '811', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('68', '107', 1, '���ܲ���<br>��һ���������ᣬ���������е���ţ�������������������ԭ��<br>�Һã���һλ���ĵĳ�Աǰ��Э�������һ�и���������˵��<br>�����ܲ�����һ�ֳ��������������ֿɷ�֪���������췽��������֪�����ɲο��������ݡ�<br>Ȼ�����ݸ���һ���飺<br>һ��¯          �߳��������䵶<br>����¯          ����С��<br>����¯          ����<br>�ĺ�¯          ��ͭ            <br>', '104', '102', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('69', '213', 1, '�ȴ�����ѹ��ȭ<br>��һ���������ᣬ���������е���ţ�������������������ԭ��<br>�Һã���һλ���ĵĳ�Աǰ��Э�������һ�и���������˵��<br>���ȴ�����ѹ��ȭ��һ�ֳ��������������ֿɷ�֪���������췽��������֪�����ɲο��������ݡ�<br>Ȼ�����ݸ���һ���飺<br>һ��¯          ��ȭ<br>����¯          ��ȭ<br>����¯          ��ͭ<br>�ĺ�¯          ��ͭ    <br>', '202', '202', '711', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('70', '510', 1, '5��װ�ɵ�������<br>��һ���������ᣬ���������е���ţ�������������������ԭ��<br>�Һã���һλ���ĵĳ�Աǰ��Э�������һ�и���������˵��<br>��5��װ�ɵ���������һ�ֳ��������������ֿɷ�֪���������췽��������֪�����ɲο��������ݡ�<br>Ȼ�����ݸ���һ���飺<br>һ��¯          ���ܷɵ�������<br>����¯          ���ܷɵ�������<br>����¯          ����<br>�ĺ�¯          ��ͭ            <br>', '502', '502', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('71', '96001', '6', 'EXAM System<br> ��һ�����������˹���ʦ���ᣬ������һ���ѧ��������ش�����һ����ȱ������MS��<br> Ϊ������ĺ����ģ�������ǰȥ����ͼ����ѧ���ǵĻ��д����ⲿMS��������<br> <br> ���ⲿ����ɫΪ��Ҫɫϵ�Ļ�����.....�t��<br> �����������ĩu������ǲ��ֵ��Ҷ����ҹ�����\"��ħ\"���u��<br> ����...��ʱ��չ�ֵķǷ��ƻ���...��ֱ�����ĺ�.....��<br> ����ֻ���ƻ��������ǻر����������ʶ���һ��MSҪ���ةu��<br> ����Ϊʲ����������³�?��<br> ����Ϊ�Ǹ�ϵͳǿ�аѳ������,ʹ���嶼��������......��<br> ����˵����ʻ��...����Ū����־������...��<br> ���ѵ�...����Ǵ�˵��װ����EXAM System��\"Blue Destiny\"�u�t��<br> �����Ұ�ϵͳ������ɨһ��......��<br> <br> ��Multi-Sensor��Dual Sensor��Multi-Sensor��Dual Sensor��Multi-Sensor��Dual Sensor��ˮ�����ƽ�ˮ�����ƽ�<br> <br> ������������Լ��Ļ���װ��EXAM System�������Ǻ���ǿ���ͬʱ��<br> ��ͻȻ�е��Լ����챻һ������ǿ���������������������һ�����������������s<br> <br> �����������ɶ�t�ѵ����ǵй������ļ���t��<br> <br> Ϊ���Լ�����ף�����æ�������ͩs<br> <br> ����......��������......��<br>', '912', '811', '912', '811', '912', '811', '718', '715', '718', '715', NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL );");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('72', '90002', '10', '��Ŀ����һ����ִ�s<br> <br> �������� Coordinator ��ʲ��������������������ЩNewtype�u��һ��������ʳָָ��һ��������ߵ����ˡ�<br> ����ֻ������Ĳ�����ѩu����һ������ָ���Ǹ�������ߵ����ˡ�<br> ������Newtype��ʹ�ø����ڣ����ةt����һ������ָ���Ǹ�������ߵ����ˡ�<br> ��ž�u����ǧ����ָ�£��Ǵ�����ߵ��������ڳ���������һ�ƴ������ϩs<br> ��������Щû��ʶ���ˣ���û������Super DRAGOON? ��������Coordinatorר�õ��������������ڸ�����֮�ϣ���<br> ������Super DRAGOON������������ĩt�������������ʡ�<br> �Ǵ�����ߵ����˻ع�ͷ����Ƴ����һ�ۣ�����һ�������s<br> <br> ����еı�֤���취----Super DRAGOON<br> <br> һ��¯          ������<br> ����¯          Newtypeϵͳ��Ӧ����ʽ������<br> ����¯          Bit<br> �ĺ�¯          Bit<br> ���¯          ���ܹ�����ǹ<br> ����¯          ���ܹ�����ǹ<br> �ߺ�¯          ���ܹ�����ǹ<br> �˺�¯          ���ܹ�����ǹ<br> �ź�¯          ˮ��<br> ʮ��¯          ˮ��<br> ʮһ��¯        �ƽ�<br> ʮ����¯        �ƽ�<br> ʮ����¯        �ƽ�<br> <br> ��Ȼ������Ϊʲ���Ǵ�����ߵ�����֪��������ʲ�ᣬ<br> �����������������˵ػ��������Super DRAGOON�ķ�����<br>', '997', '620', '971', '971', '405', '405', '405', '405', '718', '718', '715', '715', '715', NULL , NULL , NULL , NULL , NULL , NULL , NULL );");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('73', '969', '6', '�¸ߴ���ķ�Ͻ�<br> ��һ�����������˹���ʦ���ᣬ����һ������ʦ����ͷ��ɣ����Ÿֱ�д�֡�<br> ��һ��д��һ��ͺ߳���С����<br> ͻȻ������ͷһ���������Ц˵����������һ�����ϲ������<br> Ȼ������Ѹ��ȡȥ���������䳮Ʊ����ȥ�����ˡ�<br> _______________________________________________________<br> �����ǿ��?<br> �����������s�ҡ�����������ʩs��������<br> С�ީs���������¡��������u���s��֮��<br> <br> �����˳��õ�Ŭ���͸�����<br> �õ�����Ŀ�е��������<br> �ְ����õù�צ����֮��....<br> <br> ȴ���֣���������������ӵ�е�<br> ��������������������ʤ����<br> �������������,ʹ�������м�<br> <br> ���ие��Լ�������������?<br> ���ие��Լ����������������?<br> ����������Լ������������<br> �����Լ���˼������ǿ���������??<br> <br> Repeat *<br> ��Ȼ������Ǯ,��Ȼ���������е�����<br> ������������֮��������䷽<br> һ������ͭ �������<br> ����ʮ�ƽ� �˾�ˮ��<br> ��!�������ǿ!!<br> <br> ��!���������һ���ر�ǿ!!<br> _______________________________________________________<br> �����ֱ�ƭ�ĸо��������������š�<br>', '711', '715', '711', '712', '712', '715', '711', '718', '718', '715', NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL );");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` (
  `id` varchar(14) binary NOT NULL default '0',
  `name` varchar(10) NOT NULL default '',
  `hpc` mediumint(6) NOT NULL default '0',
  `enc` mediumint(6) NOT NULL default '0',
  `spc` tinyint(3) NOT NULL default '0',
  `atf` tinyint(3) NOT NULL default '0',
  `def` tinyint(3) NOT NULL default '0',
  `ref` tinyint(3) NOT NULL default '0',
  `taf` tinyint(3) NOT NULL default '0',
  `hitf` tinyint(3) NOT NULL default '0',
  `missf` tinyint(3) NOT NULL default '0',
  `price` int(8) NOT NULL default '0',
  `needlv` tinyint(3) NOT NULL default '0',
  `spec` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('0', 'ͨ������', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('StrikeA', 'ͻ��', 0, 5, 2, 10, -2, -2, -1, 0, 0, 100000, 6, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('DefCounterA', '��������', 0, 0, 2, -5, 10, -5, 0, 5, 0, 120000, 11, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('QuickA', 'Ѹ��', 0, 10, 2, 0, -5, 10, -2, 0, 5, 120000, 11, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('SnipeA', '�ѻ�', 0, 10, 5, 2, -3, -5, 10, 5, 0, 500000, 27, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('StrikeB', '����', 100, 10, 5, 20, -5, 0, 0, 5, 5, 500000, 27, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('DoubleStrike', '������', 0, 0, 20, 0, 0, -5, -10, 10, 0, 1000000, 35, 'DoubleStrike');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('TripleStrike', '������', 0, 0, 40, 0, 0, -5, -10, 10, 0, 3000000, 65, 'TripleStrike');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('AllWepStirke', 'ȫ������', 100, 50, 25, 0, 0, 0, -20, 25, 0, 2500000, 56, 'AllWepStirke');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('RaidStrike', '��Ϯ', 0, 5, 35, 5, 5, 25, 10, 0, 0, 4000000, 70, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('MindStrike', '����', 0, 0, 40, 10, -5, 5, 25, 5, 0, 4000000, 70, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('SenseStrike', '���', 0, 25, 60, 25, 0, 10, 10, 10, 10, 10000000, 80, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('CounterStrike', '�Ż�����', 0, 0, 45, 0, 0, 0, 0, 20, 0, 12000000, 85, 'CounterStrike');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('FirstStrike', '���ƹ���', 0, 30, 45, 0, 0, 5, -5, 0, 0, 12000000, 85, 'FirstStrike');");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` (
  `id` varchar(16) NOT NULL default '0',
  `name` varchar(40) NOT NULL default '',
  `grade` tinyint(3) NOT NULL default '0',
  `kind` varchar(3) NOT NULL default 'N',
  `familyid` varchar(5) NOT NULL default '0',
  `nextev` text NOT NULL,
  `specev` text NOT NULL,
  `atk` mediumint(6) unsigned NOT NULL default '0',
  `hit` tinyint(3) unsigned NOT NULL default '0',
  `rd` tinyint(3) unsigned NOT NULL default '0',
  `enc` smallint(5) unsigned NOT NULL default '0',
  `price` int(10) unsigned NOT NULL default '0',
  `equip` tinyint(1) NOT NULL default '0',
  `spec` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('0', '������', 0, 'N', '0', '', '', 0, 0, 0, 0, 0, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('101', 'С��', 1, 'BDI', '101', '102,124', '', 780, 95, 2, 15, 40000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('102', '����С��', 2, 'BDI', '101', '103', '', 780, 95, 2, 30, 48000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('103', '�����䵶', 3, 'BI', '101', '104', '', 850, 98, 2, 45, 57000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('104', '�߳��������䵶', 4, 'I', '101', '105', '107', 1000, 98, 2, 60, 65000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('105', '����������䵶', 5, 'I', '101', '115', '106', 1200, 99, 2, 90, 74000, 0, 'MeltB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('106', '��Ž�', 6, 'I', '101', '', '', 2700, 100, 1, 115, 80000, 0, 'MeltB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('107', '���ܲ���', 6, 'N', '101', '108', '', 1200, 100, 2, 90, 84000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('108', '�߳����ܲ���', 7, 'N', '101', '109', '110', 630, 105, 4, 100, 95000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('109', '��������', 8, 'N', '101', '', '', 1525, 100, 2, 115, 100000, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('110', '�Խ�����SCHWERT-GEWEHER��', 5, 'N', '101', '', '', 835, 100, 4, 130, 100000, 0, 'DamB,MeltB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('115', '��Ÿ�', 5, 'I', '101', '116,117', '', 2500, 100, 1, 85, 63000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('116', '���͵�Ÿ�', 6, 'I', '101', '', '', 2950, 95, 1, 105, 72000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('117', '��תʽ��Ÿ�', 6, 'N', '101', '', '118', 1300, 95, 2, 95, 71000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('118', '˫��תʽ��Ÿ�', 7, 'N', '101', '', '', 730, 95, 4, 100, 86000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('124', '����С��', 2, 'I', '101', '125', '', 800, 100, 2, 25, 46000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('125', '��װ����С��', 3, 'DI', '101', '', '126', 870, 100, 2, 40, 57000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('126', '��ն��', 4, 'N', '101', '128', '127', 680, 100, 3, 65, 69000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('127', '������', 4, 'N', '101', '', '128', 780, 100, 4, 135, 85000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('128', '��װ�׵�', 5, 'N', '101', '', '129', 1520, 100, 2, 130, 100000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('129', 'ն����', 6, 'N', '101', '', '', 1780, 100, 2, 150, 100000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('201', '��', 1, 'BDI', '201', '202', '', 540, 100, 3, 15, 45000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('202', '��ȭ', 2, 'DI', '201', '203,212', '', 570, 100, 3, 25, 50000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('203', '��������', 3, 'I', '201', '204', '219', 610, 103, 3, 35, 55000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('204', '���������', 4, 'I', '201', '205', '', 650, 105, 3, 50, 63000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('205', '����������', 5, 'I', '201', '206', '', 710, 105, 3, 70, 72000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('206', '����������', 6, 'I', '201', '', '207', 770, 105, 3, 95, 81000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('207', '����˫����', 7, 'N', '201', '', '208', 750, 105, 4, 125, 90000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('208', '���裮���ֽ���', 8, 'N', '201', '', '', 680, 105, 5, 160, 100000, 0, 'MobA,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('212', 'ȼ֮��ȭ', 3, 'I', '201', '213', '216', 775, 100, 3, 60, 75000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('213', '�ȴ�����ѹ��ȭ', 4, 'I', '201', '', '214', 620, 100, 4, 95, 83000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('214', '���Ȼ���ǹ��ȭ', 5, 'N', '201', '', '215', 490, 100, 6, 110, 90000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('215', 'ʮ�������ƴ���', 7, 'N', '201', '', '', 265, 100, 12, 125, 100000, 0, 'AntiPDef,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('216', 'T-Link Knuckle', 2, 'N', '201', '', '', 1500, 110, 2, 120, 70000, 0, 'PsyRequired,DamB,AntiPDef,CostSP<3>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('219', '��еצ', 3, 'DI', '201', '220', '', 1100, 100, 2, 90, 56000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('220', '��װ��еצ', 4, 'N', '201', '221', '223', 1275, 105, 2, 110, 64000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('221', '��������צ', 5, 'N', '201', '', '222', 850, 105, 3, 145, 73000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('222', '�森���Ǻ�����', 6, 'N', '201', '', '', 400, 105, 8, 175, 95000, 0, 'DamB,Cease,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('223', '�ܶ������е��', 4, 'N', '201', '', '', 1675, 110, 2, 170, 90000, 0, 'DamA,Cease,MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('301', '������', 1, 'BDI', '301', '302', '', 830, 100, 2, 20, 60000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('302', '�����͹�����', 2, 'DI', '301', '303', '', 900, 100, 2, 30, 63000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('303', '���ܹ�����', 2, 'DI', '301', '304', '', 950, 100, 2, 38, 67000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('304', '��ʽ�⽣', 3, 'I', '301', '305,318', '', 1050, 100, 2, 48, 71000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('305', '�׼ӹ�����', 4, 'N', '301', '', '306,310,312', 1180, 100, 2, 59, 78000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('306', '���͹�����', 6, 'N', '301', '307', '309', 1330, 100, 2, 80, 86000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('307', 'Hi-������', 7, 'N', '301', '308', '', 1400, 100, 2, 110, 89000, 0, 'MeltB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('308', 'Hyper������', 8, 'N', '301', '', '', 1580, 100, 2, 140, 94500, 0, 'MeltB,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('309', '�����͹�����', 7, 'N', '301', '', '', 1560, 100, 2, 130, 93000, 0, 'MeltA,Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('310', '��������������', 3, 'I', '301', '', '', 2880, 100, 1, 90, 71000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('312', '�յ�ʽ������', 7, 'N', '301', '', '313,314', 2800, 95, 1, 135, 90000, 0, 'MeltB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('313', '����ʽ������', 8, 'N', '301', '', '', 3100, 95, 1, 155, 99000, 0, 'Cease,MeltB,NTRequired,CostSP<5>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('314', '������������齣', 8, 'N', '301', '', '', 3200, 95, 1, 175, 110000, 0, 'MeltB,DamB,AntiPDef,PsyRequired,CostSP<7>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('318', 'ն����', 5, 'I', '301', '319', '', 1240, 100, 2, 105, 83000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('319', '����', 6, 'N', '301', '320', '322', 1340, 100, 2, 110, 87000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('320', '�������ν�', 7, 'N', '301', '324', '321', 1450, 100, 2, 140, 91000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('321', '���٣��������ν�', 8, 'N', '301', '', '', 1600, 100, 2, 180, 95000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('322', '������ɽ��', 9, 'N', '301', '', '323', 1100, 99, 3, 200, 110000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('323', '������ɽ���������', 10, 'N', '301', '', '', 1250, 99, 3, 230, 125000, 0, 'DamA,DamB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('324', '�ƶ�˲����', 7, 'I', '301', '', '', 1050, 100, 3, 140, 115000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('401', '105mm��ǹ', 1, 'BDI', '401', '402', '', 550, 95, 3, 30, 60000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('402', '110mm������', 2, 'DI', '401', '403,417', '', 630, 95, 3, 45, 65000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('403', '������ǹ', 3, 'DI', '401', '405', '404', 730, 95, 3, 60, 71000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('404', '˫������ǹ', 4, 'N', '401', '', '', 640, 85, 4, 125, 77000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('405', '���ܹ�����ǹ', 5, 'I', '401', '411', '406', 810, 95, 3, 90, 81000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('406', '���ǹ', 6, 'N', '401', '407,408', '410', 933, 98, 3, 120, 85000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('407', '2��װ���ǹ', 7, 'N', '401', '', '', 505, 90, 6, 140, 89000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('408', '�ƻ����ǹ', 7, 'N', '401', '', '409', 1000, 90, 3, 130, 88000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('409', '���������ǹ', 8, 'N', '401', '', '', 1220, 98, 3, 180, 93500, 0, 'AntiPDef,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('410', '280mm�����ũ��', 8, 'N', '401', '', '', 821, 88, 4, 160, 90000, 0, 'AntiPDef,MeltA,DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('411', 'Mega��Beam Rifle', 6, 'N', '401', '', '412', 910, 96, 3, 90, 75000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('412', 'Buster Rifle', 7, 'N', '401', '', '', 630, 98, 5, 170, 95000, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('417', '120mm����', 3, 'BDI', '401', '', '418', 610, 90, 3, 55, 65000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('418', '��ͻ����ͳ', 4, 'I', '401', '419,426', '', 650, 90, 3, 70, 71000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('419', '������', 5, 'N', '401', '420', '422', 230, 90, 10, 90, 76000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('420', '����������', 6, 'N', '401', '421', '', 205, 90, 15, 115, 85000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('421', '���ܹ���������', 7, 'I', '401', '', '', 215, 95, 15, 145, 94000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('422', '��װ��ɢ����', 6, 'N', '401', '', '', 270, 90, 10, 125, 90000, 0, 'AntiPDef,DamA,DamB,MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('426', '���ܻ���', 5, 'I', '401', '427', '', 695, 95, 3, 80, 74000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('427', '���ͻ���', 6, 'N', '401', '428', '431', 575, 95, 4, 105, 82000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('428', '�����ͻ���', 7, 'N', '401', '429', '', 435, 95, 6, 135, 91000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('429', '������ת����', 8, 'N', '401', '', '430', 525, 99, 6, 160, 100000, 0, 'Cease,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('430', '˫������ת����', 10, 'N', '401', '', '', 295, 99, 12, 190, 115000, 0, 'DamA,Cease,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('431', '180mm ��ũ��', 7, 'N', '401', '', '', 1350, 97, 2, 155, 93000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('501', '�ɵ�������', 1, 'BDI', '501', '502,509', '', 900, 85, 2, 35, 80000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('502', '���ܷɵ�������', 2, 'I', '501', '503', '', 1100, 85, 2, 55, 85000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('503', 'ԭ���ܷɵ�������', 4, 'N', '501', '', '504,516', 1300, 88, 2, 75, 90500, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('504', '���ڷ�����', 6, 'N', '501', '', '505', 1550, 88, 2, 95, 95000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('505', '�˵�������', 8, 'N', '501', '', '', 4000, 88, 1, 120, 99999, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('509', '��װ�ɵ�������', 2, 'DI', '501', '510', '', 800, 87, 3, 64, 87000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('510', '5��װ�ɵ�������', 3, 'I', '501', '511', '', 550, 86, 5, 83, 94000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('511', '10��װ�ɵ�������', 4, 'N', '501', '512', '513', 300, 85, 10, 95, 98500, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('512', 'ȫ��λ���������', 6, 'N', '501', '', '', 185, 85, 20, 110, 105000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('513', 'С���Լ��յ��ɵ�', 6, 'N', '501', '', '', 235, 100, 12, 150, 400000, 0, 'Tarb,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('516', '240mm�����', 3, 'I', '501', '518,519,520', '517', 2450, 80, 1, 70, 90000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('517', 'NEO�����', 3, 'I', '501', '', '', 2700, 88, 1, 88, 94500, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('518', '�߳��������', 4, 'N', '501', '', '', 2950, 88, 1, 95, 96500, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('519', 'ɢ�������', 7, 'N', '501', '', '', 845, 96, 4, 100, 120000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('520', '���ͻ����', 6, 'N', '501', '521,522', '', 3250, 88, 1, 120, 99000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('521', 'ԭ�ӻ����', 7, 'N', '501', '', '', 3300, 93, 1, 135, 110000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('522', '���ӻ����', 8, 'N', '501', '', '', 3550, 93, 1, 155, 131000, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('601', '�׼�������', 1, 'BDI', '601', '602', '613', 440, 78, 5, 70, 90000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('602', 'ƫ���׼�������', 2, 'I', '601', '603', '608,609', 400, 78, 6, 80, 93000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('603', '��װ�׼�������', 3, 'I', '601', '604', '', 350, 78, 8, 90, 97000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('604', 'ɢ���׼�������', 4, 'I', '601', '605', '', 380, 78, 8, 110, 120000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('605', '��ɢ�׼�������', 5, 'N', '601', '606', '', 275, 78, 12, 125, 126000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('606', 'ȫ��λ��ɢ�׼�������', 6, 'N', '601', '', '607', 188, 75, 16, 140, 132000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('607', 'ȫ������ɢ�׼�������', 7, 'N', '601', '', '', 160, 70, 20, 185, 137000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('608', '�����׼�������', 3, 'I', '601', '', '', 588, 75, 5, 160, 97000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('609', '��װ��', 3, 'I', '601', '610', '', 680, 75, 4, 140, 97000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('610', '�����', 3, 'I', '601', '', '611', 600, 75, 5, 175, 97000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('611', '����װ�����', 3, 'I', '601', '', '', 350, 75, 10, 200, 97000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('613', '������', 3, 'I', '601', '614', '616', 540, 75, 5, 90, 115000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('614', '������ũ��', 4, 'I', '601', '615', '620', 575, 75, 5, 110, 119000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('615', '�׼Ӽ�ũ��', 4, 'N', '601', '', '', 680, 78, 5, 170, 122000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('616', '�����������ũ��', 5, 'N', '601', '', '617', 540, 80, 6, 155, 124000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('617', '�׼ӹ�����ũ��', 6, 'N', '601', '619', '618', 570, 80, 6, 175, 130000, 0, 'MeltB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('618', '�׼�������', 7, 'N', '601', '', '', 555, 95, 6, 220, 140000, 0, 'MeltA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('619', '���͹�����ũ��', 8, 'N', '601', '', '', 430, 78, 8, 195, 129000, 0, 'DamA,DamB, AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('620', 'Newtypeϵͳ��Ӧ����ʽ������', 7, 'N', '601', '', '', 835, 75, 4, 175, 120000, 0, 'DamA,NTCustom,CostSP<6>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('701', '��ͭ��', 1, 'BI', '701', '702', '711', 1000, 95, 1, 25, 100000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('702', '������', 2, 'I', '701', '703', '712', 1100, 95, 1, 35, 110000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('703', '��ʯ��', 3, 'I', '701', '704', '', 1200, 96, 1, 45, 120000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('704', '������', 4, 'I', '701', '705', '', 1300, 96, 1, 65, 130000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('705', '�ƽ�', 5, 'N', '701', '706', '715', 1400, 97, 1, 75, 140000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('706', '�׽�', 6, 'N', '701', '707', '', 1500, 97, 1, 90, 150000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('707', '��ʯ��', 7, 'N', '701', '', '708', 1600, 100, 1, 110, 160000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('708', 'ˮ����', 8, 'N', '701', '', '718', 1800, 100, 1, 140, 170000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('711', '��ͭ', 0, 'N', '0', '', '', 0, 0, 0, 0, 120000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('712', '����', 0, 'N', '0', '', '', 0, 0, 0, 0, 135000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('715', '�ƽ�', 0, 'N', '0', '', '', 0, 0, 0, 0, 180000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('718', 'ˮ��', 0, 'N', '0', '', '', 0, 0, 0, 0, 225000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('801', '�������ϵͳ', 0, 'BI', '0', '', '', 0, 0, 0, 60, 600000, 2, 'Moba');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('806', 'Booster', 0, 'BI', '0', '', '', 0, 0, 0, 80, 600000, 2, 'MobA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('811', 'Dual Sensor', 0, 'BI', '0', '', '', 0, 0, 0, 30, 600000, 2, 'Tara');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('816', '��׼��', 0, 'BI', '0', '', '', 0, 0, 0, 35, 600000, 2, 'TarA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('821', 'G��Wall', 0, 'BI', '0', '', '', 0, 0, 0, 70, 600000, 2, 'Defa,AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('826', 'ǿ������', 0, 'BI', '0', '', '', 0, 0, 0, 50, 600000, 2, 'DefA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('827', '��������', 0, 'BI', '0', '', '', 0, 0, 0, 50, 600000, 2, 'Defa');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('828', '���ͻ���', 0, 'BI', '0', '', '', 0, 0, 0, 40, 500000, 2, 'AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('831', '���ѺϽ�װ��', 0, 'BI', '0', '', '', 0, 0, 0, 150, 1000000, 2, 'DefB,ExtHP<600>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('90002', 'Super DRAGOON', 13, 'N', '0', '', '', 320, 125, 16, 800, 36500000, 0, 'COCustom,AntiPDef,MeltA,');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('901', 'G-bit����΢��������', 12, 'N', '0', '', '', 1150, 90, 6, 800, 380000, 0, 'NTCustom,DamA,DamB,MeltA,AntiPDef,CostSP<50>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('902', '������������齣', 12, 'N', '0', '', '', 2800, 115, 2, 650, 370000, 0, 'AntiPDef,PsyRequired,DamA,MeltB,CostSP<30>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('903', '������', 11, 'N', '0', '', '', 1070, 95, 5, 490, 360000, 0, 'DamA,DamB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('904', '��֮��', 10, 'N', '0', '', '', 5100, 105, 1, 480, 370000, 0, 'MeltB,Mobb,AntiTarS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('905', '�ڶ���', 11, 'N', '0', '', '', 1700, 90, 3, 490, 360000, 0, 'Cease��DamA,DamB,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('906', 'Solar panel', 0, 'N', '0', '', '', 0, 0, 0, 0, 2000000, 2, 'ENPcRecB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('907', 'NANO Skin', 0, 'N', '0', '', '', 0, 0, 0, 0, 2000000, 2, 'HPPcRecA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('908', 'Z��O��Armor', 0, 'N', '0', '', '', 0, 0, 0, 300, 1600000, 2, 'DefE,AntiDam,ExtHP<3000>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('909', '���Ͻ�newZװ��', 0, 'N', '0', '', '', 0, 0, 0, 350, 1600000, 2, 'DefE,PerfDef,ExtHP<2000>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('911', '�����������ϵͳ', 0, 'I', '0', '', '', 0, 0, 0, 100, 500000, 2, 'Mobb');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('912', 'Multi-Sensor', 0, 'I', '0', '', '', 0, 0, 0, 70, 500000, 2, 'Tarb');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('921', 'Mega Booster', 0, 'I', '0', '', '', 0, 0, 0, 120, 650000, 2, 'MobB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('922', 'Beam Coating', 0, 'I', '0', '', '', 0, 0, 0, 110, 1000000, 2, 'Defb');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('931', '��������ϵͳ', 0, 'I', '0', '', '', 0, 0, 0, 150, 750000, 2, 'Mobc');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('932', 'T-Link Sensor', 0, 'I', '0', '', '', 0, 0, 0, 150, 800000, 2, 'Tarc,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('933', '�����', 3, 'I', '0', '', '', 1250, 98, 3, 190, 100000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('941', 'Thruster', 0, 'I', '0', '', '', 0, 0, 0, 180, 900000, 2, 'MobC');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('942', '��׼ϵͳ', 0, 'I', '0', '', '', 0, 0, 0, 80, 900000, 2, 'TarB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('943', '��ż�ũ��', 4, 'I', '0', '', '', 1365, 98, 3, 240, 120000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('944', 'AB Field', 0, 'I', '0', '', '', 0, 0, 0, 160, 1050000, 2, 'Defc');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('945', 'Shield Buster Rifle', 6, 'I', '0', '', '', 620, 98, 5, 115, 120000, 1, 'DamA,AntiPDef,DefC');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('951', '��һ����', 5, 'I', '0', '', '', 1890, 99, 2, 275, 130000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('952', '�����Ӳ�ǹBST', 5, 'I', '0', '', '', 1310, 95, 3, 300, 140000, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('953', '������׷�ٷɵ�', 7, 'I', '0', '', '', 400, 120, 8, 255, 200000, 0, 'Tarc,AntiMobS,Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('954', '�����', 6, 'I', '0', '', '', 340, 90, 10, 200, 130000, 1, 'MeltA,DamA,DefA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('955', '�ƶ��޺', 6, 'I', '0', '', '', 3590, 100, 1, 275, 175000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('956', '�ߴ���ķ�Ͻ�װ��', 0, 'I', '0', '', '', 0, 0, 0, 200, 1020000, 2, 'DefC,ExtHP<900>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('957', '��Ӳ��װ��', 0, 'I', '0', '', '', 0, 0, 0, 200, 1020000, 2, 'DefC,ExtHP<800>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('958', '���Lʽ��ũ��', 0, 'I', '0', '', '', 640, 95, 6, 215, 270000, 0, 'PsyRequired,DamA,AntiPDef,TarB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('96001', 'EXAM System', 0, 'N', '0', '', '', 0, 0, 0, 30, 1100000, 2, 'EXAMSystem, MobA, TarA, AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('961', '��ɢ���ӵ�', 9, 'I', '0', '', '', 260, 93, 15, 330, 160000, 0, 'AntiPDef,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('962', 'Buster Beam Rifle', 8, 'N', '0', '', '', 1030, 95, 4, 320, 1270000, 1, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('963', '��ս�', 7, 'N', '0', '', '', 3850, 100, 1, 310, 155000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('964', '�����ƶ�ϵͳ', 0, 'I', '0', '', '', 0, 0, 0, 210, 1100000, 2, 'Mobd');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('965', '��������׼ϵͳ', 0, 'I', '0', '', '', 0, 0, 0, 140, 1100000, 2, 'TarC,Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('966', 'I-Field Barrier', 0, 'I', '0', '', '', 0, 0, 0, 220, 1250000, 2, 'Defd,AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('967', 'E field', 0, 'I', '0', '', '', 0, 0, 0, 220, 1250000, 2, 'Defd,PerfDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('968', '���ֻ�����', 8, 'I', '0', '', '', 380, 95, 10, 310, 155000, 0, 'DamB,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('969', '�¸ߴ���ķ�Ͻ�', 0, 'N', '0', '', '', 0, 0, 0, 0, 250000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('971', 'Bit', 8, 'I', '0', '', '', 345, 110, 12, 280, 50000, 0, 'NTRequired,Cease,CostSP<8>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('972', 'Divider', 8, 'I', '0', '', '', 322, 100, 13, 340, 650000, 0, 'AntiPDef,DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('973', '�ƶ��޺*����ɱ', 9, 'I', '0', '', '', 4450, 105, 1, 355, 2300000, 0, 'AntiPDef,MobA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('974', '����΢��������', 9, 'I', '0', '', '', 2400, 90, 2, 450, 1650000, 0, 'NTCustom,AntiPDef,CostSP<15>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('975', 'Psyco-Frame', 0, 'I', '0', '', '', 0, 0, 0, 220, 1000000, 2, 'Tard,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('976', 'Hyper Thruster', 0, 'I', '0', '', '', 0, 0, 0, 240, 1000000, 2, 'MobD');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('977', '�������״�', 0, 'I', '0', '', '', 0, 0, 0, 185, 1000000, 2, 'TarC,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('978', '���Field', 0, 'I', '0', '', '', 0, 0, 0, 250, 1350000, 2, 'PsyRequired,PerfDef,DefX');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('979', 'FF Barrier', 0, 'I', '0', '', '', 0, 0, 0, 240, 1300000, 2, 'Defd,AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('981', '��ս���V��ն', 9, 'I', '0', '', '', 2270, 100, 2, 385, 700000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('982', '���������', 9, 'I', '0', '', '', 430, 96, 10, 380, 700000, 0, 'AntiMobS,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('983', '���������޵н�', 9, 'I', '0', '', '', 2300, 100, 2, 395, 710000, 0, 'PsyRequired,MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('984', '˫���ֻ�����', 10, 'I', '0', '', '', 215, 95, 20, 355, 690000, 0, 'DamA,DamB,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('985', '��ʽն����', 10, 'I', '0', '', '', 4600, 92, 1, 390, 690000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('986', 'Transitive FEAR', 0, 'I', '0', '', '', 0, 0, 0, 320, 1300000, 2, 'Mobd,AntiTarS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('987', '����Ԫ�״�', 0, 'I', '0', '', '', 0, 0, 0, 250, 1100000, 2, 'TarD,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('988', 'G��Territory', 0, 'I', '0', '', '', 0, 0, 0, 280, 1500000, 2, 'Defe,PerfDef,AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('989', '���Ͻ�Zװ��', 0, 'I', '0', '', '', 0, 0, 0, 250, 1250000, 2, 'DefD,ExtHP<1500>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('991', 'V.S.B.R.', 9, 'N', '0', '', '', 1055, 105, 4, 400, 280000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('992', 'Twin Buster Rifle', 10, 'N', '0', '', '', 790, 95, 6, 435, 280000, 0, 'DamA,DamB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('993', '˫����΢��������', 11, 'N', '0', '', '', 1320, 92, 4, 530, 300000, 0, 'NTCustom,AntiPDef,DamB,CostSP<25>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('994', '��Ӧ��', 11, 'N', '0', '', '99001', 2275, 92, 2, 430, 250000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('99001', '�Խ��ô��ͷ�Ӧ��', 11, 'N', '0', '', '', 1330, 86, 4, 650, 1000000, 0, 'DamA,DamB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('995', 'ն������һ����ն', 11, 'N', '0', '', '', 4990, 105, 1, 450, 250000, 0, 'AntiPDef,DamA,DamB,Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('996', '������', 10, 'N', '0', '', '', 385, 120, 12, 350, 165000, 0, 'NTCustom,Cease,CostSP<12>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('997', '������', 10, 'N', '0', '', '', 405, 130, 12, 360, 168000, 0, 'NTCustom,Cease,CostSP<15>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('998', 'HiMAT System', 0, 'N', '0', '', '', 0, 0, 0, 295, 1300000, 2, 'Mobe,AntiTarS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('999', 'E - cap', 0, 'N', '0', '', '', 0, 0, 0, 0, 1700000, 2, 'ENPcRecA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('FortWepA', '�Կ��Զ�����������ϵͳ', 0, 'I', '0', '', '', 1000, 85, 40, 0, 500000, 0, 'Cease, DamA, FortressOnly, CannotEquip');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('FortWepB', '��������װ�Խ��ɵ���̨', 0, 'I', '0', '', '', 1000, 110, 20, 0, 5500000, 0, 'TarD, AntiMobS, Cease, FortressOnly, CannotEquip');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('FortWepC', '�������ƻ���', 0, 'I', '0', '', '', 1760, 75, 20, 0, 15000000, 0, 'MeltA, AntiMobS, Cease, FortressOnly, CannotEquip');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('FortWepD', 'ֳ����������', 0, 'I', '0', '', '', 50000, 100, 1, 0, 155000000, 0, 'MeltB, AntiMobS, Cease, AntiPDef, TarC, FortressOnly, CannotEquip');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('GMwepA','а*��*�����ν�(GMר��)','0','I','0','','','50000','120','2','0','1','0','DamA,DamB,MobA,MobB,MobC,MobD,Moba,Mobb,Mobc,Mobd,Mobe,TarA,TarB,TarC,TarD,Tara,Tarb,Tarc,Tard,Tare,DefA,DefB,DefC,DefD,DefE,Defa,Defb,Defc,Defd,Defe,PerfDef,AntiDam,DoubleExp,DoubleMon,DefX,AtkA,MeltA,MeltB,Cease,AntiPDef,AntiTars');");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_bank` (
  `username` varchar(16) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  `savings` int(10) unsigned NOT NULL default '0',
  `sh_ina` varchar(255) NOT NULL default '',
  `sh_inb` varchar(255) NOT NULL default '',
  `sh_inc` varchar(255) NOT NULL default '',
  `sh_outa` varchar(255) NOT NULL default '',
  `sh_outb` varchar(255) NOT NULL default '',
  `sh_outc` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`username`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` (
  `username` varchar(16) binary NOT NULL default '',
  `gamename` varchar(32) binary NOT NULL default '',
  `hp` mediumint(6) unsigned NOT NULL default '0',
  `hpmax` mediumint(6) unsigned NOT NULL default '0',
  `en` mediumint(6) unsigned NOT NULL default '0',
  `enmax` mediumint(6) unsigned NOT NULL default '0',
  `sp` float(8,5) unsigned NOT NULL default '0',
  `spmax` smallint(3) unsigned NOT NULL default '1',
  `attacking` tinyint(3) unsigned NOT NULL default '1',
  `defending` tinyint(3) unsigned NOT NULL default '1',
  `reacting` tinyint(3) unsigned NOT NULL default '1',
  `targeting` tinyint(3) unsigned NOT NULL default '1',
  `ms_custom` varchar(255) NOT NULL default '',
  `level` tinyint(3) unsigned NOT NULL default '1',
  `expr` int(10) unsigned NOT NULL default '0',
  `wepa` varchar(255) NOT NULL default '0<!>0',
  `wepb` varchar(255) NOT NULL default '0<!>0',
  `wepc` varchar(255) NOT NULL default '0<!>0',
  `eqwep` varchar(255) NOT NULL default '0<!>0',
  `p_equip` varchar(255) NOT NULL default '0<!>0',
  `spec` mediumtext NOT NULL,
  `rank` mediumint(6) NOT NULL default '0',
  `rights` char(1) NOT NULL default '0',
  `organization` int(10) NOT NULL default '0',
  `org_group` char(1) NOT NULL default '0',
  `tactics` mediumtext NOT NULL,
  `last_tact` varchar(16) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  `victory` mediumint(6) unsigned NOT NULL default '0',
  `v_points` mediumint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (`username`),
  UNIQUE KEY `gamename` (`gamename`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_game_info` VALUES ('NPC9527','NPC9527','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','103<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_game_info` VALUES ('NPC9528','NPC9528','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','203<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_game_info` VALUES ('NPC9529','NPC9529','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','202<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_game_info` VALUES ('NPC9530','NPC9530','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','219<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_game_info` VALUES ('NPC9531','NPC9531','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','219<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_game_info` VALUES ('NPC9532','NPC9532','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','201<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_game_info` VALUES ('NPC9533','NPC9533','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','201<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_game_info` VALUES ('NPC9534','NPC9534','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','203<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
('NPC9535','NPC9535','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','203<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
('NPC9536','NPC9536','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','203<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
('NPC9537','NPC9537','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','203<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
('NPC9538','NPC9538','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','203<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
('NPC9539','NPC9539','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','203<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
('NPC9540','NPC9540','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','203<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
('NPC9541','NPC9541','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','203<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
('NPC9542','NPC9542','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','203<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
('NPC9543','NPC9543','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','203<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
('NPC9544','NPC9544','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','203<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
('NPC9545','NPC9545','5000','5000','50000','50000','5000','5000','5','5','8','7','','30','0','203<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_game_info` VALUES ('NPC874','��˫','20000','5000','5000','50000','5000','5000','9','8','8','7','','30','0','109<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` (
  `username` varchar(16) binary NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `regkey` varchar(16) binary NOT NULL default '',
  `cash` int(10) unsigned NOT NULL default '0',
  `bounty` int(10) unsigned NOT NULL default '0',
  `color` tinytext,
  `avatar` varchar(16) default NULL,
  `msuit` varchar(16) default NULL,
  `typech` varchar(4) NOT NULL default 'nat1',
  `hypermode` tinyint(1) NOT NULL default '0',
  `growth` smallint(4) default NULL,
  `coordinates` varchar(4) NOT NULL default 'A1',
  `fame` smallint(4) NOT NULL default '0',
  `request` text NOT NULL,
  `time1` int(10) default NULL,
  `time2` int(10) default NULL,
  `btltime` int(10) default NULL,
  `acc_status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`username`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES ('NPC9527','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9527','nat1','0','0','A1','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES ('NPC9528','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9528','nat1','0','0','A2','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES ('NPC9529','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9529','enh1','0','0','A3','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES ('NPC9530','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9530','enh1','0','0','B1','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES ('NPC9531','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9531','enh1','0','0','B2','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES ('NPC9532','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9532','enh1','0','0','B3','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES ('NPC9533','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9533','enh1','0','0','C1','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES ('NPC9534','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9534','enh1','0','0','C3','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES
('NPC9535','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9534','enh1','0','0','D1','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES
('NPC9536','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9534','enh1','0','0','D2','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES
('NPC9537','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9534','enh1','0','0','D3','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES
('NPC9538','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9534','enh1','0','0','D4','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES
('NPC9539','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9534','enh1','0','0','D5','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES
('NPC9540','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9534','enh1','0','0','D6','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES
('NPC9541','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9534','enh1','0','0','D7','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES
('NPC9542','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9534','enh1','0','0','D8','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES
('NPC9543','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9534','enh1','0','0','A1','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES
('NPC9544','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9534','enh1','0','0','A1','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES
('NPC9545','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','9534','enh1','0','0','A1','0','','1181811058','1181822370','1181811374','0');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_general_info` VALUES
('NPC874','a71e5fd14b86a0dca7e665499b62bd4d','','0','0','#A50000','nil','874','psy5','0','0','C2','0','','1181811058','1181822370','1181811374','0');");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_log` (
  `username` varchar(16) binary NOT NULL default '',
  `log1` text NOT NULL,
  `log2` text NOT NULL,
  `log3` text NOT NULL,
  `log4` text NOT NULL,
  `log5` text NOT NULL,
  `time1` int(10) NOT NULL default '0',
  `time2` int(10) NOT NULL default '0',
  `time3` int(10) NOT NULL default '0',
  `time4` int(10) NOT NULL default '0',
  `time5` int(10) NOT NULL default '0',
  PRIMARY KEY  (`username`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_map` (
  `map_id` varchar(4) NOT NULL default '',
  `occupied` int(10) NOT NULL default '0',
  `aname` varchar(32) NOT NULL default '',
  `development` smallint(5) NOT NULL default '0',
  `hp` int(8) unsigned NOT NULL default '0',
  `hpmax` int(8) unsigned NOT NULL default '0',
  `at` tinyint(3) unsigned NOT NULL default '0',
  `de` tinyint(3) unsigned NOT NULL default '0',
  `ta` tinyint(3) unsigned NOT NULL default '0',
  `wepa` varchar(32) NOT NULL default '',
  `spec` mediumtext NOT NULL,
  PRIMARY KEY  (`map_id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('A1', 0, '', 0, 100000, 100000, 10, 10, 10, 'FortWepA', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('A2', 0, '', 0, 100000, 100000, 10, 10, 10, 'FortWepA', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('A3', 0, '', 0, 100000, 100000, 10, 10, 10, 'FortWepA', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('B1', 0, '', 0, 200000, 200000, 25, 20, 20, 'FortWepB', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('B2', 0, '', 0, 500000, 500000, 50, 50, 50, 'FortWepC', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('B3', 0, '', 0, 200000, 200000, 25, 20, 20, 'FortWepB', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('C1', 0, '', 0, 400000, 400000, 45, 40, 40, 'FortWepC', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('C2', 0, '', 0, 200000, 200000, 25, 20, 20, 'FortWepD', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('C3', 0, '', 0, 350000, 350000, 40, 30, 30, 'FortWepD', '');");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('D1', 0, '', 0, '7500000', '400000', '50', '40', '20', 'FortWepC', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('D2', 0, '', 0, '500000', '200000', '10', '10', '10', 'FortWepA', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('D3', 0, '', 0, '7500000', '400000', '60', '30', '40', 'FortWepD', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('D4', 0, '', 0, '5000000', '350000', '30', '10', '30', 'FortWepC', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('D5', 0, '', 0, '2500000', '200000', '20', '20', '20', 'FortWepB', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('D6', 0, '', 0, '5000000', '300000', '20', '40', '40', 'FortWepC', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('D7', 0, '', 0, '500000', '100000', '10', '10', '10', 'FortWepA', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('D8', 0, '', 0, '500000', '100000', '10', '10', '10', 'FortWepA', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('D9', 0, '', 0, '500000', '100000', '10', '10', '10', 'FortWepA', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('D10', 0, '', 0, '500000', '100000', '10', '10', '10', 'FortWepD', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('D11', 0, '', 0, '500000', '100000', '10', '10', '10', 'FortWepA', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('D12', 0, '', 0, '500000', '100000', '10', '10', '10', 'FortWepA', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('D13', 0, '', 0, '500000', '100000', '10', '10', '10', 'FortWepA', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('E2', 0, '', 0, '2147483647', '1000000', '127', '127', '127', 'FortWepD', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('E1', 0, '', 0, '2147483647', '1000000', '127', '127', '127', 'FortWepD', '');");


mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_organization` (
  `id` int(10) NOT NULL default '0',
  `name` varchar(32) NOT NULL default '',
  `color` varchar(7) NOT NULL default '',
  `funds` int(10) unsigned NOT NULL default '0',
  `license` tinyint(1) NOT NULL default '0',
  `request_list` text NOT NULL,
  `groupa` varchar(32) NOT NULL default '',
  `groupb` varchar(32) NOT NULL default '',
  `groupc` varchar(32) NOT NULL default '',
  `operation` varchar(32) NOT NULL default '',
  `optmissioni` varchar(32) NOT NULL default '',
  `opttime` int(10) unsigned NOT NULL default '0',
  `optstart` int(10) unsigned NOT NULL default '0',
  `optmissiona` varchar(32) NOT NULL default '',
  `optmissionb` varchar(32) NOT NULL default '',
  `optmissionc` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_organization` VALUES (0, '������֯', '#AAAAAA', 0, 0, '', '', '', '', '', '', 0, 0, '', '', '');");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_settings` (
  `username` varchar(16) binary NOT NULL default '',
  `gen_img_dir` varchar(128) NOT NULL default '',
  `unit_img_dir` varchar(128) NOT NULL default '',
  `base_img_dir` varchar(128) NOT NULL default '',
  `show_log_num` tinyint(1) NOT NULL default '0',
  `atkonline_alert` tinyint(1) NOT NULL default '1',
  `battle_def_filter` tinyint(1) NOT NULL default '1',
  `fdis_at` tinyint(1) NOT NULL default '0',
  `fdis_de` tinyint(1) NOT NULL default '0',
  `fdis_re` tinyint(1) NOT NULL default '0',
  `fdis_ta` tinyint(1) NOT NULL default '0',
  `fdis_lv` tinyint(1) NOT NULL default '0',
  `fdis_hp` tinyint(1) NOT NULL default '0',
  `fdis_fame` tinyint(1) NOT NULL default '0',
  `fdis_bty` tinyint(1) NOT NULL default '0',
  `fdis_ms` tinyint(1) NOT NULL default '0',
  `fdis_tch` tinyint(1) NOT NULL default '0',
  `fdis_con` tinyint(1) NOT NULL default '0',
  `filter_at_min` tinyint(3) NOT NULL default '0',
  `filter_at_max` tinyint(3) NOT NULL default '0',
  `filter_de_min` tinyint(3) NOT NULL default '0',
  `filter_de_max` tinyint(3) NOT NULL default '0',
  `filter_re_min` tinyint(3) NOT NULL default '0',
  `filter_re_max` tinyint(3) NOT NULL default '0',
  `filter_ta_min` tinyint(3) NOT NULL default '0',
  `filter_ta_max` tinyint(3) NOT NULL default '0',
  `filter_lv_min` tinyint(3) NOT NULL default '0',
  `filter_lv_max` tinyint(3) NOT NULL default '0',
  `filter_hp_min` int(7) NOT NULL default '0',
  `filter_hp_max` int(7) NOT NULL default '0',
  `filter_fame_min` smallint(4) NOT NULL default '0',
  `filter_fame_max` smallint(4) NOT NULL default '0',
  `filter_bty_min` int(10) NOT NULL default '0',
  `filter_bty_max` int(10) NOT NULL default '0',
  `filter_con` tinyint(1) NOT NULL default '0',
  `filter_sort` tinyint(1) NOT NULL default '0',
  `filter_sort_asc` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`username`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` (
  `username` varchar(16) NOT NULL default '',
  `time` int(10) NOT NULL default '0',
  `directions` text NOT NULL,
  `m1` varchar(16) NOT NULL default '',
  `m2` varchar(16) NOT NULL default '',
  `m3` varchar(16) default NULL,
  `m4` varchar(16) default NULL,
  `m5` varchar(16) default NULL,
  `m6` varchar(16) default NULL,
  `m7` varchar(16) default NULL,
  `m8` varchar(16) default NULL,
  `m9` varchar(16) default NULL,
  `m10` varchar(16) default NULL,
  `m11` varchar(16) default NULL,
  `m12` varchar(16) default NULL,
  `m13` varchar(16) default NULL,
  `m14` varchar(16) default NULL,
  `m15` varchar(16) default NULL,
  `m16` varchar(16) default NULL,
  `m17` varchar(16) default NULL,
  `m18` varchar(16) default NULL,
  `m19` varchar(16) default NULL,
  `m20` varchar(16) default NULL,
  `c_wep` varchar(8) NOT NULL default '',
  `c_point` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`username`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_warehouse` (
  `username` varchar(16) NOT NULL default '',
  `warehouse` text NOT NULL,
  `timelast` int(10) NOT NULL default '0',
  PRIMARY KEY  (`username`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_market` (
  `id` INT(15) UNSIGNED NOT NULL AUTO_INCREMENT, 
  `owner` varchar(16) NOT NULL default '',
  `price` int(10) unsigned NOT NULL default '0',
  `wepid` varchar(255) NOT NULL default '',
  `name` varchar(40) NOT NULL default '',
  `atk` mediumint(6) UNSIGNED DEFAULT '0' NOT NULL,
  `hit` tinyint(3) UNSIGNED DEFAULT '0' NOT NULL,
  `rd` tinyint(3) UNSIGNED DEFAULT '0' NOT NULL,
  `enc` smallint(5) unsigned NOT NULL default '0',
  `spec` text NOT NULL,
  `time` INT( 10 ) UNSIGNED DEFAULT '0' NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_marketb` (
  `id` INT(15) UNSIGNED NOT NULL AUTO_INCREMENT, 
  `owner` varchar(16) NOT NULL default '',
  `price` int(10) unsigned NOT NULL default '0',
  `name` varchar(40) NOT NULL default '',
  `state` tinyint(3) UNSIGNED DEFAULT '0' NOT NULL,
  `time` INT( 10 ) UNSIGNED DEFAULT '0' NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_bank_log` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `time` int(10) NOT NULL default '0',
  `user` varchar(16) NOT NULL default '',
  `g_name` varchar(32) NOT NULL default '',
  `type` tinyint(1) NOT NULL default '0',
  `amount` int(10) unsigned NOT NULL default '0',
  `cash` int(10) unsigned NOT NULL default '0',
  `bankamt` int(10) unsigned NOT NULL default '0',
  `t_cash` int(10) unsigned NOT NULL default '0',
  `t_bankamt` int(10) unsigned NOT NULL default '0',
  `target` varchar(16) NOT NULL default '',
  `tg_name` varchar(32) NOT NULL default '',
  `safehouse` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci AUTO_INCREMENT=1 ;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_hangar` (
  `h_id` int(10) unsigned NOT NULL auto_increment,
  `h_user` varchar(16) NOT NULL default '',
  `h_msuit` varchar(16) NOT NULL default '',
  `h_hp` mediumint(6) unsigned NOT NULL default '0',
  `h_hpmax` mediumint(6) unsigned NOT NULL default '0',
  `h_en` mediumint(6) unsigned NOT NULL default '0',
  `h_enmax` mediumint(6) unsigned NOT NULL default '0',
  `h_ms_custom` varchar(255) NOT NULL default '',
  `h_wepa` varchar(255) NOT NULL default '',
  `h_wepb` varchar(255) NOT NULL default '',
  `h_wepc` varchar(255) NOT NULL default '',
  `h_eqwep` varchar(255) NOT NULL default '',
  `h_p_equip` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`h_id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci AUTO_INCREMENT=1 ;");


�����κδ������
<br>
���ϱ������! 
<br>
��ɾ��install.php