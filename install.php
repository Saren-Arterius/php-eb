
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

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat1', '一般', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat2', '一般', 2, 1, 1, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat3', '一般', 3, 2, 2, 2, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat4', '一般', 4, 3, 3, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat5', '一般', 5, 3, 4, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat6', '一般', 6, 4, 4, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat7', '一般', 7, 4, 5, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat8', '一般', 8, 4, 5, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat9', '一般', 9, 4, 5, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('natx', '一般', 10, 4, 5, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh1', '强化人间Lv1', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh2', '强化人间Lv2', 2, 1, 0, 0, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh3', '强化人间Lv3', 3, 1, 1, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh4', '强化人间Lv4', 4, 1, 2, 1, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh5', '强化人间Lv5', 5, 2, 3, 1, 4);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh6', '强化人间Lv6', 6, 3, 3, 2, 6);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh7', '强化人间Lv7', 7, 4, 3, 3, 7);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh8', '强化人间Lv8', 8, 5, 4, 3, 8);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh9', '强化人间Lv9', 9, 5, 4, 5, 8);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enhx', '强化人间LvX', 10, 6, 4, 5, 8);");
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
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy1', '念动力 Lv1', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy2', '念动力 Lv2', 2, 0, 1, 1, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy3', '念动力 Lv3', 3, 1, 1, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy4', '念动力 Lv4', 4, 1, 2, 2, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy5', '念动力 Lv5', 5, 2, 4, 2, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy6', '念动力 Lv6', 6, 5, 8, 3, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy7', '念动力 Lv7', 7, 7, 10, 3, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy8', '念动力 Lv8', 8, 9, 11, 4, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy9', '念动力 Lv9', 9, 10, 12, 4, 6);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psyx', '念动力 LvX', 10, 10, 13, 4, 8);");
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
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('25', '真GETTA－1', 5350000, 15, 12, 13, 14, 6000, 275, 37.500, 4.750, '', 45,'ms01/GETTA－1.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('26', '暴走EVA－01', 5250000, 16, 12, 11, 14, 6000, 275, 37.500, 4.750, '', 45,'ms01/EVA－01.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('27', '暴风高达', 5825000, 18, 13, 12, 15, 6200, 275, 45.000, 4.583, 'SeedMode', 50,'seed/BUSTER.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('28', '强袭高达', 6525000, 19, 13, 13, 16, 6500, 500, 45.000, 4.583, 'SeedMode', 55,'seed/STRIKE.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('29', '正义高达', 8100000, 20, 16, 15, 18, 7000, 300, 42.500, 5.400, 'SeedMode', 65,'seed/JUSTICE.gif');");
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
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('874', '无双', 99999999,25,23, 22, 23, 30000, 5000, 50.000, 0.015, 'EXAMSystem', 99,'special/ghost.gif');");

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

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('0', '901', 10, 'G-bit卫星微波能量炮<br>走了一天路，肚子饿极了，你一听到公会有免费晚懂N直冲，可是被地上的书绊倒了......<br>原来是一本残旧的日记，内容支离破碎：<br>想不到十数支巨炮产的力量有这麽大！居然轰毁了一要塞，我无论如何，不择手段都要获得G-bit卫星微波能量炮的资料......<br>那傢伙可真愚蠢，现在G-bit卫星微波能量炮的资料已到手，他已经没有任何利用价值了......铸造方法果然比我想的更複杂：<br>「一号炉        卫星微波能量炮<br>二号炉          双卫星微波能量炮<br>三号炉          Buster Beam Rifle<br>四号炉          长距离光束加农炮<br>五号炉          大型光束加农炮<br>六号炉          大型米加粒子炮<br>七号炉          水晶<br>八号炉          水晶<br>九号炉          水晶<br>十号炉          黄金<br>十一号炉        黄金<br>十二号炉        黄金<br>不过，应该可以铸造成左?.....」日记到此完毕<br>', '974', '993', '962', '616', '619', '608', '718', '718', '718', '715', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('1', '902', 10, '天上天下念动爆碎剑<br>你拥有念动力吗？如果没有，你是不能使用以下武器的！<br>天上天下念动爆碎剑，是天上天下无敌剑的后续武器，实力更在其之上，它同样是一把需要驾驶员极度集中及精神的念动力製造的一把剑<br>而且有念动爆碎的力量，威力惊人<br>一号炉          天上天下无敌剑<br>二号炉          天上天下念动破碎剑<br>三号炉          天上天下念动破碎剑<br>四号炉          T-Link Sensor<br>五号炉          T-Link Sensor<br>六号炉          超大型光束剑<br>七号炉          超大型光束剑<br>八号炉          水晶<br>九号炉          水晶<br>十号炉          黄金<br>十一号炉        黄金<br>', '983', '314', '314', '932', '932', '309', '309', '718', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('2', '903', 10, '缩退炮<br>在你面前的是一把无与伦比的武器<br>它拥有超高的攻击力和射程，运作原理和黑洞炮相似，可以将对手封入闭锁空间，之后引起目标自身的重力坍塌，进而破坏其自身结构<br>它就是──缩退砲。你是想得到它吧？呵呵，拿着！这就是製造缩退炮的材料列表：<br>一号炉          卫星微波能量炮<br>二号炉          引力子步枪BST<br>三号炉          引力子步枪BST<br>四号炉          高性能照准系统<br>五号炉          冲角炮<br>六号炉          米加音波炮<br>七号炉          光束炮<br>八号炉          光束炮<br>九号炉          水晶<br>十号炉          水晶<br>十一号炉        黄金<br>十二号炉        钢铁<br>', '974', '952', '952', '965', '610', '618', '613', '613', '718', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('3', '904', 10, '光之翼<br>你听闻一位公会成员在说故事，于是你走过去：<br>「就是上星期发生的事！你知道我看到了甚麽？是一隻会发光的小鸟」<br>看众人都惊讶不已，他又说下去，<br>「其实啊，它并不是甚麽发光大乌，它是一部正在使用光之翼的MS，而飞行的方向正是三部渣古！<br>就在这雷霆万钧的一刻，三部渣古被切成了六件，继而爆炸！」<br>那公会成员的眼?彷彿看得出有光，然后叹了一口气，闭上发光的双眼，认真的说：<br>「所以，今天小弟希望与大家分享光之翼的铸造方法，只需现金......」<br>可惜，他再打开双眼的时候，人们都散了，你却反应缓慢的预备离开<br>那公会成员以发光的双眼望着你抓住双手，道：<br>「兄弟，你走运了！你有购买光之翼铸造方法的机会了！」<br>你又不好意思推掉他一番好意，只好拿出钱，购买光之翼的铸造方法<br>他还你一个感激的眼神，递送上一张纸，写着光之翼的铸造方法：<br>一号炉          背部光束切裂器<br>二号炉          超大型光束剑<br>三号炉          超大型光束剑<br>四号炉          HiMAT System<br>五号炉          水晶<br>六号炉          水晶<br>七号炉          水晶<br>八号炉          黄金<br>九号炉          黄金<br>', '310', '309', '309', '998', '718', '718', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('4', '905', 10, '黑洞炮<br>我醉心于研究最强的攻击武器，发现黑洞炮堪称最强<br>黑洞炮的基本原理是发射出一个极强的能量团，命中目标之后开始重力坍塌并产生一个黑洞将目标吸入其中，<br>被吸进黑洞的只有一个后果，就是死亡。<br>製造黑洞不是一件简单的工作，一不小心可能会被黑洞吸入，误伤自己。这是我经过长期研究后，黑洞炮可能的製作方法︰<br>一号炉          米加音波炮<br>二号炉          大型光束加农炮<br>三号炉          大型米加粒子炮<br>四号炉          280mm轨道加农炮<br>五号炉          超重力轨道枪<br>六号炉          水晶<br>七号炉          水晶<br>八号炉          黄金<br>', '618', '619', '608', '410', '409', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('5', '906', 10, 'Solar panel<br>在公会的僻静角落，一个口叼香烟的男人，倚牆而立，应该是公会成员之一，于是你走了过去，拿出一箱钞票，<br>并以密码沟通：「Bbm zpt udmk nd tnndugjmh zcnvs ugbs?」<br>公会成员先是吓了一跳，然后施施拿下烟蒂：「nl，据可靠情报，某神秘组织的工程师联同科学家，<br>合力研製了一种会自动回复EN的物料－Solar panel<br>经过我们的仔细的调查，已获得有关资料：<br>一号炉          青铜<br>二号炉          钢铁<br>三号炉          黄金<br>四号炉          水晶<br>五号炉          水晶<br>六号炉          黄金<br>七号炉          钢铁<br>八号炉          青铜<br>九号炉          青铜<br>十号炉          钢铁<br>十一号炉        黄金<br>十二号炉        水晶<br>十三号炉        E - cap」<br>', '711', '712', '715', '718', '718', '715', '712', '711', '711', '712', '715', '718', '999', NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('6', '907', 10, 'NANO Skin<br>在公会的僻静角落，一个口叼香烟的男人，倚牆而立，应该是公会成员之一，于是你走了过去，拿出一箱钞票，<br>并以密码沟通：「Bbm zpt udmk nd tnndugjmh zcnvs ugbs?」<br>公会成员先是吓了一跳，然后施施拿下烟蒂：「nl，据可靠情报，某神秘组织的工程师联同科学家，<br>合力研製了一种会自动回复HP的物料－NANO Skin<br>经过我们的仔细的调查，已获得有关资料：<br>一号炉          青铜<br>二号炉          钢铁<br>三号炉          黄金<br>四号炉          水晶<br>五号炉          水晶<br>六号炉          黄金<br>七号炉          钢铁<br>八号炉          青铜<br>九号炉          青铜<br>十号炉          钢铁<br>十一号炉        黄金<br>十二号炉        水晶    <br>十三号炉        超硬钢装甲<br>十四号炉        超合金Z装甲」<br>', '711', '712', '715', '718', '718', '715', '712', '711', '711', '712', '715', '718', '957', '989', NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('7', '908', 10, 'Z．O．Armor<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－Z．O．Armor，它是一种合金装甲，并较超合金Z装甲有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          超合金Z装甲<br>二号炉          超合金Z装甲<br>三号炉          高达尼姆合金装甲<br>四号炉          高达尼姆合金装甲<br>五号炉          月钛合金装甲<br>六号炉          月钛合金装甲<br>七号炉          月钛合金装甲」<br>', '989', '989', '956', '956', '831', '831', '831', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('8', '909', 10, '超合金newZ装甲<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－超合金newZ装甲，它是一种合金装甲，并较超合金Z装甲有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          超合金Z装甲<br>二号炉          超合金Z装甲<br>三号炉          超硬钢装甲<br>四号炉          超硬钢装甲<br>五号炉          月钛合金装甲<br>六号炉          月钛合金装甲    <br>七号炉          月钛合金装甲」<br>「多谢惠顾！」<br>', '989', '989', '957', '957', '831', '831', '831', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('9', '991', 9, 'V.S.B.R.<br>你在公会看到了一个售卖高级武器铸造方法的人，于是你走过跟他交流一下心得<br>「你知道有关V.S.B.R.的事吗？」<br>「当然知道，V.S.B.R.即Variable Speed Beam Rifle，即无段速光束步枪......」<br>「那麽是怎样铸造的？」<br>他伸出手，像是要什麽的模样，聪明的你当然知道，虽然是交流心得，没有钱是不行的<br>你拿出一叠钞票，他当然告诉你铸造方法：<br>一号炉          高能光束步枪<br>二号炉          高能光束步枪<br>三号炉          Mega．Beam Rifle<br>四号炉          长距离光束加农炮<br>五号炉          光束炮<br>六号炉          水晶<br>七号炉          水晶<br>八号炉          黄金<br>九号炉          黄金<br>', '405', '405', '411', '616', '613', '718', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('10', '992', 9, 'Twin Buster Rifle<br>我以前曾在一间机动战士工厂做过工程人员，记得我好像参与过製造一把拥有两支枪管而破坏力巨大的步枪，<br>我记得製造这把枪需要把材料这样放：<br>一号炉          Buster Beam Rifle<br>二号炉          Buster Rifle<br>三号炉          Buster Rifle<br>四号炉          2连装轨道枪<br>五号炉          大型光束加农炮<br>六号炉          大型光束加农炮<br>七号炉          水晶<br>八号炉          黄金', '962', '412', '412', '407', '619', '619', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('11', '993', 9, '双卫星微波能量炮<br>走了一天路，肚子饿极了，你一听到公会有免费晚懂N直冲，可是被地上的书绊倒了......<br>原来是一本残旧的日记，内容支离破碎：<br>「双卫星微波能量炮与G-bit卫星微波能量炮的资源已到手：<br>一号炉          卫星微波能量炮<br>二号炉          卫星微波能量炮<br>三号炉          长距离光束加农炮<br>四号炉          光束加农炮<br>五号炉          光束炮<br>六号炉          单装炮<br>七号炉          水晶<br>八号炉          黄金<br>九号炉          黄金<br>十号炉          黄金<br>至于G-bit卫星微波能量炮则较为複杂......」<br>日记下一页的内容似乎是故意被撕去的，日记到此完毕<br>', '974', '974', '616', '614', '613', '609', '718', '715', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('12', '994', 9, '反应弹<br>你在公会看到了一个据称是飞弹怪人的成员，于是你便向他追问有关反应弹的问题：<br>「与红外线追踪飞弹相反，反应弹是一种追求攻击界限的飞弹，所以无法应用红外线追踪技术，<br>而由于它的攻击力高，所以它十分珍贵，弹数亦较少<br>既然你提出高价，我是不会让你失望而回的：<br>一号炉          核子火箭炮<br>二号炉          核子火箭炮<br>三号炉          NEO火箭炮<br>四号炉          NEO火箭炮<br>五号炉          高能飞弹发射器<br>六号炉          高能飞弹发射器<br>七号炉          水晶<br>八号炉          水晶<br>九号炉          黄金」<br>', '522', '522', '517', '517', '502', '502', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('13', '995', 9, '斩舰刀．一文字斩<br>你从公会成员听说，斩舰刀藏有十分强大的力量，且可以使出奥义－斩舰刀．一文字斩<br>但要发挥斩舰刀的潜能，光靠驾驶员的力量及技术是不足的，斩舰刀必须先经过强化，才有发挥力量及抵御庞大出力的可能<br>而强化武器，必须以适当的材料再次铸造(?)：<br>一号炉          斩舰刀<br>二号炉          青龙刀<br>三号炉          超合金Z装甲<br>四号炉          水晶<br>五号炉          黄金<br>六号炉          钢铁<br>七号炉          钢铁<br>', '129', '127', '989', '718', '715', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('14', '996', 9, '浮游炮<br>晚上的夜空总是会看到星星的, 今天亦一样, 而且还看到了「格外特别的星」<br>你不禁叹息:「又一部机牺牲在Bit的手上......」<br>一个熟悉的影子在月光下投在你的脸上,心想: 怎麽又是他呢?<br>「那是(?), 而非Bit, 它们的外貌是不同的.而力量更在前者之上」<br>又一张字条飞到脸上：<br>一号炉          Bit<br>二号炉          Newtype系统对应有线式光束炮<br>三号炉          高能光束步枪<br>四号炉          高能光束步枪<br>五号炉          高性能照准系统<br>六号炉          光束炮<br>七号炉          钢铁<br>八号炉          水晶<br>他没留下一句话, 只是......<br>', '971', '620', '405', '405', '965', '613', '712', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('15', '997', 9, '飞翔炮<br>晚上的夜空总是会看到星星的, 今天亦一样, 而且还看到了「格外特别的星」<br>你不禁叹息:「又一部机牺牲在Bit的手上......」<br>一个熟悉的影子在月光下投在你的脸上,心想: 怎麽又是他呢?<br>「那是(?), 而非Bit, 它们的外貌是不同的.而力量更在前者之上」<br>又一张字条飞到脸上：<br>一号炉          Bit<br>二号炉          Newtype系统对应有线式光束炮<br>三号炉          高能光束步枪<br>四号炉          高能光束步枪<br>五号炉          高性能照准系统<br>六号炉          光束炮<br>七号炉          黄金<br>八号炉          水晶<br>他没留下一句话, 只是......<br>', '971', '620', '405', '405', '965', '613', '715', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('16', '998', 9, 'HiMAT System<br>支付巨款后，公会人员带你到一名工程师那裡：<br>「你想知道那样可令70吨重、18米高的机动战士、达到 Mach 4 的速度之装置吗？」<br>他对你说：「不用变型、也不用安装大型的喷射器，却能在大气圈内达到如此惊人的速度，<br>正正就那把『剑』所用的一个系统 － High Mobility Aerial Tactics System !」<br>之后，他便递了一份文件给你，内裡记述着 HiMAT System 的製作方法：<br>一号炉          高性能雷达<br>二号炉          Hyper Thruster<br>三号炉          Hyper Thruster<br>四号炉          极速喷射加速系统<br>五号炉          极速喷射加速系统<br>六号炉          黄金<br>七号炉          黄金<br>八号炉          水晶<br>九号炉          水晶<br>十号炉          水晶<br>', '977', '976', '976', '911', '911', '715', '715', '718', '718', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('17', '999', 9, 'E - cap<br>在公会的僻静角落，一个口叼香烟的男人，倚牆而立，应该是公会成员之一，于是你走了过去，拿出一箱钞票，<br>并以密码沟通：「Bbm zpt udmk nd tnndugjmh zcnvs ugbs?」<br>公会成员先是吓了一跳，然后施施拿下烟蒂：「nl，据可靠情报，某神秘组织的工程师联同科学家，<br>合力研製了一种会自动回复EN的物料－E - cap<br>经过我们的仔细的调查，已获得有关资料：<br>一号炉          青铜<br>二号炉          钢铁<br>三号炉          黄金<br>四号炉          水晶<br>五号炉          水晶<br>六号炉          黄金<br>七号炉          钢铁<br>八号炉          青铜<br>九号炉          水晶<br>十号炉          黄金」<br>', '711', '712', '715', '718', '718', '715', '712', '711', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('18', '981', 8, '你从公会成员听说，皇牌驾驶员是可以发挥天空剑的内在潜能的，并使其能力上升了超过50%，而名字好像叫\"天空剑．V字斩\".<br>但要发挥天空剑的潜能，光靠驾驶员的力量是不行的，武器必须先经过强化，才有发挥力量的可能<br>要强化武器，必须以适当的材料再次铸造天空剑：<br>一号炉          天空剑<br>二号炉          电磁剑<br>三号炉          电磁加农炮<br>四号炉          大型电磁斧<br>五号炉          大型电磁斧<br>六号炉          水晶<br>七号炉          黄金<br>八号炉          钢铁<br>', '963', '106', '943', '116', '116', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('19', '982', 8, '超电磁龙卷<br>你在公会看到了一个售卖高级武器铸造方法的人，于是你走过跟他交流一下心得<br>「你知道有关超电磁龙卷的事吗？」<br>「当然知道，超电磁龙卷是一种利用电磁力产生龙卷作攻击的武器......」<br>「那麽是怎样铸造的？」<br>他伸出手，像是要什麽的模样，聪明的你当然知道，虽然是交流心得，没有钱是不行的<br>你拿出一叠钞票，他当然告诉你铸造方法：<br>一号炉          电磁加农炮<br>二号炉          电磁炮<br>三号炉          双回转式电磁斧<br>四号炉          水晶<br>五号炉          黄金<br>六号炉          黄金<br>七号炉          钢铁<br>八号炉          青铜<br>', '943', '933', '118', '718', '715', '715', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('20', '983', 8, '天上天下无敌剑<br>你拥有念动力吗？如果没有，你是不能使用以下武器的！<br>天上天下无敌剑，故名思义，它是无敌的，是一把需要驾驶员极度集中的武器，并且以念动力製造一把剑，威力惊人<br>一号炉          天上天下念动破碎剑<br>二号炉          天上天下念动破碎剑<br>三号炉          T-Link Sensor<br>四号炉          T-Link Sensor<br>五号炉          水晶<br>六号炉          黄金<br>', '314', '314', '932', '932', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('21', '984', 8, '双格林机关炮<br>格林机关炮是一种力量不低的武器<br>试想想，若果格林机关炮一击便把一部ｍｓ击至重伤，那麽两把格林机关炮不就一击摧毁一部ｍｓ？<br>而且持着格林机关炮攻击有一种兴奋感觉，使驾驶员更能发挥其长<br>一号炉          格林机关炮<br>二号炉          格林机关炮<br>三号炉          双光束旋转机炮<br>四号炉          对装甲散弹炮<br>五号炉          水晶<br>六号炉          黄金            <br>', '968', '968', '430', '422', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('22', '985', 8, '零式斩舰刀<br>你在公会的佈告栏上找到了零式斩舰刀这名字，然而，你却只知道斩舰刀，于是你找了个公会成员问问：<br>「这是斩舰刀强化后的武器，原来是专用武器，但后来机密被盗取，现在则被广泛使用<br>零式斩舰刀胜在攻击力高，其剑气一下子击破ｍｓ，铸造方法如下：<br>一号炉          斩舰刀<br>二号炉          斩舰刀<br>三号炉          高出力周波刀<br>四号炉          超合金Z装甲<br>五号炉          水晶<br>六号炉          黄金」<br>', '129', '129', '108', '989', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('23', '987', 8, '三次元雷达<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－三次元雷达，它是一种辅助瞄准装置，并较高性能雷达有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          高性能雷达<br>二号炉          水晶<br>三号炉          水晶<br>四号炉          黄金<br>五号炉          黄金<br>六号炉          钢铁」<br>「多谢惠顾！」<br>', '977', '718', '718', '715', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('24', '988', 8, 'G．Territory<br>你偶然目睹了一场战斗:<br>A狠狠的以光束剑砍在B身上, 忽然, 一层不明显的防护层出现了, 把A的攻击挡下了, 然后b便一击大破A.<br>机师得意洋洋的下了机,你乘机问问(?)的铸造方法, 他得意忘形的说了两个I-Field Barrier,钢铁,黄金,水晶,黄金,钢铁,水晶<br>接着便走了。但是, 你不知道放在熔炉的次序呢!不过, 可以肯定的是, 原料是不会放在前面的。<br>', '966', '718', '718', '718', '715', '715', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('25', '989', 8, '超合金Z装甲<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－超合金Z装甲，它是一种合金装甲，并较高达尼姆合金装甲有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          高达尼姆合金装甲<br>二号炉          高达尼姆合金装甲<br>三号炉          超硬钢装甲<br>四号炉          超硬钢装甲<br>五号炉          水晶<br>六号炉          水晶<br>七号炉          黄金」<br>「多谢惠顾！」<br>', '956', '956', '957', '957', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('26', '971', 7, 'Bit<br>晚上, 你悠閒的卧视满天星宿的天际, 却发现数颗格外特别的星。<br>「那是Bit呢!那可是一种强劲的精神控制型武器。」说着,他留下一张字条:<br>一号炉          Newtype系统对应有线式光束炮<br>二号炉          光束炮<br>三号炉          光束炮<br>四号炉          高能光束步枪<br>五号炉          Psyco-Frame<br>六号炉          水晶<br>七号炉          水晶<br>和一句话:「有缘会相遇的......」<br>', '620', '613', '613', '405', '975', '718', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('27', '972', 7, 'Divider<br>你正想走进公会打听有关不同武器的铸造方法，却被一个哭闹的人撞倒，你正想站起来讨回公道<br>那人已在问有关卫星微波能量炮的事：<br>「我的卫星微波能量炮在战斗中破裂了，你可以替修理一下吗？」<br>「怎麽样？」那人看来十分焦急<br>「唔......情况不太乐观，应该不能用了，不过你可以以Divider代替卫星微波能量炮，能力不差多少」<br>「那麽是怎样铸造的？」<br>「除原本已毁的武器，只需再顺序加上全出力扩散米加粒子炮，长距离光束加农炮，长距离光束加农炮，水晶，水晶，黄金便可铸造Divider了」<br>「谢谢！」<br>', '974', '607', '616', '616', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('28', '973', 7, '计都罗侯剑*暗剑杀<br>你从公会成员听说，皇牌驾驶员是可以发挥(?)的内在潜能的，并使其能力上升了超过50%，而名字好像叫\"(?)\".<br>但要发挥(?)的潜能，光靠驾驶员的力量是不行的，武器必须先经过强化，才有发挥力量的可能<br>要强化武器，必须以适当的材料再次铸造计都罗侯剑：<br>一号炉          计都罗侯剑<br>二号炉          计都瞬狱剑<br>三号炉          计都瞬狱剑<br>四号炉          神速．四象无形剑<br>五号炉          音速喷射系统<br>六号炉          水晶<br>', '955', '324', '324', '321', '931', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('29', '974', 7, '卫星微波能量炮<br>走了一天路，肚子饿极了，你一听到公会有免费晚懂N直冲，可是被地上的书绊倒了......<br>原来是一本残旧的日记，内容支离破碎：<br>「夜，又来了<br>我，仍忘不了那深刻的一夜......<br>那是一个云雾弥漫晚上，我閒逛着，可是天色突变，云层渐散，一道光从月亮射到大地，紧接着的是一阵震天巨响，<br>我沿着巨响与光的方向走，只见那裡一片荒芜，寸草不生，似是被一富毁灭性的武器掠过......」<br>「经过数年的明查暗访，终于找到了一点头绪，原来那是G-bit卫星微波能量炮,可是我只有卫星微波能量炮铸造方法：<br>一号炉          大型光束加农炮<br>二号炉          米加音波炮<br>三号炉          长距离光束加农炮<br>四号炉          单装炮<br>五号炉          水晶<br>六号炉          黄金<br>七号炉          黄金<br>八号炉          黄金」<br>「......千辛万苦找到的G-bit卫星微波能量炮与双卫星微波能量炮资料被盗取了，应该是公会成员的所为，我已熬不到看见明天的晨曦了......」<br>日记到此完毕<br>', '619', '618', '616', '609', '718', '715', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('30', '975', 7, 'Pscyo-Frame<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－Pscyo-Frame，它是一种瞄准系统，并较Dual Sensor有效率，怎麽样？」<br>你点头示意，把钱交给他：<br>「铸造方法如下：<br>一号炉          T-Link Sensor<br>二号炉          T-Link Sensor<br>三号炉          水晶<br>四号炉          黄金<br>五号炉          黄金」<br>「多谢惠顾！」<br>', '932', '932', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('31', '976', 7, 'Hyper Thruster<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－Hyper Thruster，它是一种辅助加速装置，并较Thruster有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          Thruster<br>二号炉          Thruster<br>三号炉          水晶<br>四号炉          水晶    」<br>「多谢惠顾！」<br>', '941', '941', '718', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('32', '977', 7, '高性能雷达<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－高性能雷达，它是一种辅助瞄准装置，并较高性能照准系统有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          高性能照准系统<br>二号炉          水晶<br>三号炉          黄金<br>四号炉          黄金」<br>「多谢惠顾！」<br>', '965', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('33', '978', 7, '念动力Field<br>你拥有念动力吗？如果没有，你是不能使用以下武器的！<br>一般Field如I-Field，只要有足够能源便能够启动防御的，但念动力Field则还需要驾驶员的精神力<br>只有念动力人种才可以开动，不过要另外铸造念动力Field，才可以启动：<br>一号炉          T-Link Sensor<br>二号炉          T-Link Sensor<br>三号炉          E field<br>四号炉          水晶<br>五号炉          黄金<br>六号炉          钢铁    <br>', '932', '932', '967', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('34', '979', 7, 'Fin Funnel Barrier<br>「Fin Funnel Barrier？与Fin Funnel有关的吗」你好奇的问<br>「你真聪明！Fin Funnel Barrier就是Fin Funnel产生的I-Field」他开始有点不耐烦，仍强颜欢笑<br>「那麽与I-Field Barrier有何区别？」你继续的问<br>「Fin Funnel Barrier当然较厉害！其防御力更在E field之上」<br>「那麽E field又是甚麽？」你越问越兴奋<br>「你到底买还是不买？」<br>你看见他一睑想宰了你的样子，你只好乖乖付钱，慢慢离开......<br>一号炉          E field<br>二号炉          Beam Coating<br>三号炉          水晶<br>四号炉          水晶<br>五号炉          黄金    <br>「多谢?」回头一看，他又回复原来的样子了<br>', '967', '922', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('35', '961', 6, '扩散粒子弹<br>你正想走进公会打听有关不同武器的铸造方法，却被一个哭闹的人撞倒，你正想站起来讨回公道<br>那人已在问有关卫星微波能量炮的事：<br>「我的全出力扩散米加粒子炮在战斗中破裂了，你可以替修理一下吗？」<br>「怎麽样？」那人看来十分焦急<br>「唔......情况不太乐观，应该不能用了，不过你可以以扩散粒子弹代替全出力扩散米加粒子炮，能力不差多少」<br>「那麽是怎样铸造的？」<br>「除原本已毁的武器，只需顺序加上扩散米加粒子炮，米加音波炮，水晶，黄金，钢铁便可铸造扩散粒子弹了」<br>「谢谢！」<br>', '607', '605', '618', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('36', '962', 6, 'Buster Beam Rifle<br>我是个机械维修员，我以前曾替 Wing Gundam Zero 维修，记得那机体有带着一支巨型的步枪<br>看过它的结构后，我与另外多名工程师，分析出这把步枪需要以下材料製造：<br>一号炉          Buster Rifle<br>二号炉          Buster Rifle<br>三号炉          Mega．Beam Rifle<br>四号炉          高能光束步枪<br>五号炉          水晶    <br>', '412', '412', '411', '405', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('37', '963', 6, '天空剑<br>传说，有一把剑名为\"天空剑\"，其力量无比可砍山劈石.<br>某日，你在地上发现了一闪闪发光的物体，满以为是水晶. <br>可是，走近一看，原来是一面镜，下面是一本书，不......是两本才对.满心好奇的你，决定打开看看.<br>深红雷刃书-天空剑的铸造方法<br>一号炉          高出力光束配刀<br>二号炉          妖刀村正<br>三号炉          高周波刀<br>四号炉          青龙刀<br>五号炉          水晶<br>六号炉          钢铁    <br><br>碧青凶刃书-天空剑的铸造方法<br>一号炉          大型电磁斧<br>二号炉          妖刀村正<br>三号炉          高周波刀<br>四号炉          电磁剑<br>五号炉          水晶<br>六号炉          钢铁            <br>原来是天空剑的铸造方法，但是，那一个才对呢？<br>「深红雷刃书......碧青凶刃书......?」接着, 你明白了.<br>', '116', '109', '107', '106', '718', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('38', '964', 6, '光速移动系统<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：「我推荐你这个－光速移动系统，它是一种加速系统，并较音速喷射系统有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          音速喷射系统<br>二号炉          水晶<br>三号炉          黄金<br>四号炉          黄金<br>五号炉          钢铁」<br>「多谢惠顾！」<br>', '931', '718', '715', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('39', '965', 6, '高性能照准系统<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－高性能照准系统，它是一种辅助瞄准装置，并较照准系统有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          照准系统<br>二号炉          照准系统<br>三号炉          水晶<br>四号炉          黄金」<br>「多谢惠顾！」<br>', '942', '942', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('40', '966', 6, 'I-Field Barrier<br>你偶然目睹了一场战斗:<br>A狠狠的以光束剑砍在B身上, 忽然, 一层不明显的防护层出现了, 把A的攻击挡下了, 然后b便一击大破A.<br>机师得意洋洋的下了机,你乘机问问(?)的铸造方法, 他得意忘形的说了AB Field，水晶，水晶，黄金，<br>接着便走了。但是, 你不知道放在熔炉的次序呢!不过, 可以肯定的是, 原料是不会放在前面的。<br>', '944', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('41', '967', 6, 'E field<br>你偶然目睹了一场战斗:<br>A狠狠的以光束剑砍在B身上, 忽然, 一层不明显的防护层出现了, 把A的攻击挡下了, 然后b便一击大破A.<br>机师得意洋洋的下了机,你乘机问问(?)的铸造方法, 他得意忘形的说了AB Field，水晶，黄金，钢铁，钢铁，青铜，<br>接着便走了。但是, 你不知道放在熔炉的次序呢!不过, 可以肯定的是, 原料是不会放在前面的。<br>', '944', '718', '715', '712', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('42', '968', 6, '格林机关炮<br>格林机关炮是一种重弹药的武器，千万别低估了它的力量！虽然一颗子弹的攻击力低，但十颗子弹的破坏力是不堪设想的<br>而且持着格林机关炮攻击有一种兴奋感觉，使驾驶员更能发挥其长<br>铸造方法如下：<br>一号炉          光束旋转机炮<br>二号炉          霰弹炮<br>三号炉          重突击机统<br>四号炉          水晶<br>五号炉          黄金<br>六号炉          钢铁<br>七号炉          钢铁<br>', '429', '419', '418', '718', '715', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('43', '986', 8, 'Transitive FEAR<br>我在某国家当研究人员时，得知有一种名为 FEAR 的系统，就是那个 Far-range Exploration and Alteration Re-locator。这个系统能计算出一个超扩的范围内一切的障碍物，然后，更能够以 FEAR 系统中的推进器优化器，把机体推进至所能达到的极速，并且能躲过所有障碍物 － 包括敌军机体与光束！<br>以下就是 Transitive FEAR 的製作方法。<br>一号炉          光速移动系统<br>二号炉          极速喷射加速系统<br>三号炉          极速喷射加速系统<br>四号炉          喷射加速系统<br>五号炉          水晶<br>六号炉          黄金', '964', '911', '911', '801', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('44', '951', 5, '菊一文字<br>你在公会看到了一个售卖高级武器铸造方法的人，于是你走过跟他交流一下心得<br>「你知道有关菊一文字的事吗？」<br>「当然知道，菊一文字如妖刀川正，是传说中的一把古刀......」<br>「那麽是怎样铸造的？」<br>他伸出手，像是要什麽的模样，聪明的你当然知道，虽然是交流心得，没有钱是不行的<br>你拿出一叠钞票，他当然告诉你铸造方法：<br>一号炉          妖刀村正<br>二号炉          高出力周波刀<br>三号炉          对装甲刀<br>四号炉          青龙刀<br>五号炉          黄金<br>六号炉          钢铁<br>七号炉          钢铁<br>', '109', '108', '128', '127', '715', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('45', '952', 5, '引力子步枪BST<br>你在公会看到了一个售卖高级武器铸造方法的人，于是你走过跟他交流一下心得<br>「你知道有关引力子步枪BST的事吗？」<br>「当然知道，引力子步枪BST是利用引力子，把能力压缩，作出攻击......」<br>「那麽是怎样铸造的？」<br>他伸出手，像是要什麽的模样，聪明的你当然知道，虽然是交流心得，没有钱是不行的<br>你拿出一叠钞票，他当然告诉你铸造方法：<br>一号炉          280mm轨道加农炮<br>二号炉          破坏轨道枪<br>三号炉          Mega．Beam Rifle<br>四号炉          黄金<br>五号炉          黄金<br>', '410', '408', '411', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('46', '953', 5, '红外线追踪飞弹<br>你在公会看到了一个据称是飞弹怪人的成员，于是你便向他追问有关红外线追踪飞弹的问题<br>「飞弹是一种命中力低，攻击力一般，却有大量弹药的武器<br>为弥补命中力低的缺点，我个人研製了一种以红外线追踪的强力飞弹<br>铸造方法如下：<br>一号炉          高性能照准系统<br>二号炉          全方位火箭发射器<br>三号炉          散弹火箭炮<br>四号炉          水晶<br>五号炉          黄金<br>六号炉          钢铁」<br>', '965', '512', '519', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('47', '954', 5, '激光盾<br>「激光盾？我怎麽从没听过这事的？」<br>「这是一种寓攻击于防御的武器，可以在防御敌人攻击的同时作出突击，出其不意」<br>「这麽厉害？一口价！」<br>「成交！<br>一号炉          大型护盾<br>二号炉          强力护盾<br>三号炉          扩散米加粒子炮<br>四号炉          月钛合金装甲<br>五号炉          钢铁<br>六号炉          钢铁<br>七号炉          钢铁」<br>', '828', '826', '605', '831', '712', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('48', '955', 5, '计都罗侯剑<br>有一个公会成员在一旁自成一角，喃喃自语，你走过去听他说：<br>「我闯荡江湖数十年，最难忘的还是那一次......那天，我正赶紧运送货物，偶遇两机大战，忽然天昏地暗，雷电交加，<br>一把剑突然出现在乌云间，其中一机立刻握紧，并向另一机直砍，引起了巨大沙尘，连我的商队亦被波及了」<br>他更说了计都罗侯剑的铸造方法：<br>一号炉          计都瞬狱剑<br>二号炉          龙王破山剑．逆鲮断<br>三号炉          四象无形剑<br>四号炉          黄金<br>五号炉          黄金<br>六号炉          钢铁<br>可是，你眨眼间，那男的就不见了<br>', '324', '323', '320', '715', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('49', '956', 5, '高达尼姆合金装甲<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－高达尼姆合金装甲，它是一种合金装甲，并较月钛合金装甲有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          月钛合金装甲<br>二号炉          月钛合金装甲<br>三号炉          强力护盾<br>四号炉          水晶<br>五号炉          水晶<br>六号炉          钢铁」<br>「多谢惠顾！」<br>', '831', '831', '826', '718', '718', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('50', '957', 5, '超硬钢装甲<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－超硬钢装甲，它是一种合金装甲，并较月钛合金装甲有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          月钛合金装甲<br>二号炉          月钛合金装甲<br>三号炉          大型护盾<br>四号炉          水晶<br>五号炉          水晶<br>六号炉          钢铁」<br>「多谢惠顾！」<br>', '831', '831', '828', '718', '718', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('51', '958', 5, '念动力L式加农炮<br>你拥有念动力吗？如果没有，你是不能使用以下武器的！<br>一般的加农炮均需要大量能源，但念动力L式加农炮是例外，它只需要小量能源，却达到了一般加农炮的攻击水平<br>可惜只有念动力人种方可开动，而且会耗用精神力<br>铸造方法如下：<br>一号炉          T-Link Sensor<br>二号炉          T-Link Sensor<br>三号炉          长距离光束加农炮<br>四号炉          光束加农炮<br>五号炉          黄金<br>六号炉          钢铁    <br>', '932', '932', '616', '614', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('52', '941', 4, 'Thruster　<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－Thruster，它是一种辅助加速装置，并较Mega Booster有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          Mega Booster<br>二号炉          Mega Booster<br>三号炉          黄金<br>四号炉          黄金」<br>「多谢惠顾！」<br>', '921', '921', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('53', '942', 4, '照准系统<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－照准系统，它是一种辅助瞄准装置，并较瞄准器有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          瞄准器<br>二号炉          瞄准器<br>三号炉          Dual Sensor<br>四号炉          黄金<br>五号炉          钢铁」<br>「多谢惠顾！」<br>', '816', '816', '811', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('54', '943', 4, '电磁加农炮<br>你从公会成员听说到有关电磁加农炮的事：<br>「电磁加农炮，故名思义，是两把电磁炮与光束加农炮的结合，不过，这是不足够的，因为还需要一块最珍贵的晶石，才可完成铸造过程」<br>', '933', '933', '614', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('55', '944', 4, 'AB Field<br>你偶然目睹了一场战斗:<br>A狠狠的以光束剑砍在B身上, 忽然, 一层不明显的防护层出现了, 把A的攻击挡下了, 然后b便一击大破A.<br>机师得意洋洋的下了机,你乘机问问(?)的铸造方法, 他得意忘形的说了Beam Coating，黄金，强力护盾，G．Wall，黄金，<br>接着便走了。但是, 你不知道放在熔炉的次序呢!不过, 可以肯定的是, 原料是不会放在前面的。<br>', '922', '821', '826', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('56', '945', 4, 'Shield Buster Rifle<br>在你修行的路途上，看见了一部MS，且装备了Buster Rifle。然而，老练的你只是看了看便打算离开。<br>「站住!」回头一看，是一位少年，「这可不是普通的Buster Rifle，这是Shield Buster Rifle。」<br>此时, Buster Rifle的枪身展开, 成了防护盾! <br>看到你热衷的眼神, 于是, 他便给了你Shield Buster Rifle的铸造方法:<br>一号炉          强力护盾<br>二号炉          大型护盾<br>三号炉          Buster Rifle<br>四号炉          水晶<br>', '826', '828', '412', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('57', '931', 3, '音速喷射系统<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：「我推荐你这个－音速喷射系统，它是一种加速系统，并较极速喷射加速系统有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          极速喷射加速系统<br>二号炉          喷射加速系统<br>三号炉          黄金<br>四号炉          钢铁」<br>「多谢惠顾！」<br>', '911', '801', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('58', '932', 3, 'T-Link Sensor<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－T-Link Sensor，它是一种瞄准系统，并较Pscyo-Frame有效率，怎麽样？」<br>你点头示意，把钱交给他：<br>「铸造方法如下：<br>一号炉          Multi-Sensor<br>二号炉          黄金<br>三号炉          钢铁」<br>「多谢惠顾！」<br>', '912', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('59', '933', 3, '电磁炮<br>第一次来到公会，心情难免有点紧张，结果忘记了来到公会的原因<br>幸好，有一位热心的成员前来协助，你把一切告诉他，他说：<br>「电磁炮是一种常见的武器，但又可否知道它的铸造方法？若不知道，可参考以下内容」<br>然后，他递给你一本书：<br>一号炉          回转式电磁斧<br>二号炉          电磁剑<br>三号炉          轨道枪<br>四号炉          钢铁<br>五号炉          钢铁<br>', '117', '106', '406', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('60', '608', 3, '大型米加粒子炮<br>第一次来到公会，心情难免有点紧张，结果忘记了来到公会的原因<br>幸好，有一位热心的成员前来协助，你把一切告诉他，他说：<br>「大型米加粒子炮是一种常见的武器，但又可否知道它的铸造方法？若不知道，可参考以下内容」<br>然后，他递给你一本书：<br>一号炉          米加粒子炮<br>二号炉          米加粒子炮<br>三号炉          黄金<br>四号炉          青铜<br>', '601', '601', '715', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('61', '319', 3, '四象剑<br>第一次来到公会，心情难免有点紧张，结果忘记了来到公会的原因<br>幸好，有一位热心的成员前来协助，你把一切告诉他，他说：<br>「四象剑是一种常见的武器，但又可否知道它的铸造方法？若不知道，可参考以下内容」<br>然后，他递给你一本书：<br>一号炉          热能光束剑<br>二号炉          黄金<br>三号炉          钢铁<br>四号炉          钢铁<br>五号炉          青铜<br>', '303', '715', '712', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('62', '921', 2, 'Mega Booster<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－Mega Booster，它是一种辅助加速装置，并较Booster有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          Booster<br>二号炉          Booster<br>三号炉          钢铁<br>四号炉          钢铁」<br>「多谢惠顾！」<br>', '806', '806', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('63', '922', 2, 'Beam Coating<br>你偶然目睹了一场战斗:<br>A狠狠的以光束剑砍在B身上, 忽然, 一层不明显的防护层出现了, 把A的攻击挡下了, 然后b便一击大破A.<br>机师得意洋洋的下了机,你乘机问问(?)的铸造方法, 他得意忘形的说了钢铁，G．Wall，钢铁，G．Wall，<br>接着便走了。但是, 你不知道放在熔炉的次序呢!不过, 可以肯定的是, 原料是不会放在前面的。<br>', '821', '821', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('64', '504', 2, '榴炮发射器<br>第一次来到公会，心情难免有点紧张，结果忘记了来到公会的原因<br>幸好，有一位热心的成员前来协助，你把一切告诉他，他说：<br>「榴炮发射器是一种常见的武器，但又可否知道它的铸造方法？若不知道，可参考以下内容」<br>然后，他递给你一本书：<br>一号炉          高能飞弹发射器<br>二号炉          高能飞弹发射器<br>三号炉          黄金<br>', '502', '502', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('65', '518', 2, '高出力火箭炮<br>第一次来到公会，心情难免有点紧张，结果忘记了来到公会的原因<br>幸好，有一位热心的成员前来协助，你把一切告诉他，他说：<br>「高出力火箭炮是一种常见的武器，但又可否知道它的铸造方法？若不知道，可参考以下内容」<br>然后，他递给你一本书：<br>一号炉          原子能飞弹发射器<br>二号炉          黄金<br>三号炉          黄金<br>四号炉          青铜<br>', '503', '715', '715', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('66', '911', 1, '极速喷射加速系统<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：「我推荐你这个－极速喷射加速系统，它是一种加速系统，并较喷射加速系统有效率，怎麽样？」<br>你点头示意，把钱交给他：「铸造方法如下：<br>一号炉          喷射加速系统<br>二号炉          喷射加速系统<br>三号炉          钢铁<br>四号炉          青铜」<br>「多谢惠顾！」<br>', '801', '801', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('67', '912', 1, 'Multi-Sensor<br>公会成员：「能在市面上购买的辅助装备，实在是不足的，不过在这?，我们能为你提供更多的辅助装备铸造方法」<br>说着，他扫视了你手上的钞票，想了想，说：<br>「我推荐你这个－Multi-Sensor，它是一种瞄准系统，并较T-Link Sensor有效率，怎麽样？」<br>你点头示意，把钱交给他：<br>「铸造方法如下：<br>一号炉          Dual Sensor<br>二号炉          Dual Sensor<br>三号炉          钢铁<br>四号炉          青铜」<br>「多谢惠顾！」<br>', '811', '811', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('68', '107', 1, '高周波刀<br>第一次来到公会，心情难免有点紧张，结果忘记了来到公会的原因<br>幸好，有一位热心的成员前来协助，你把一切告诉他，他说：<br>「高周波刀是一种常见的武器，但又可否知道它的铸造方法？若不知道，可参考以下内容」<br>然后，他递给你一本书：<br>一号炉          高出力光束配刀<br>二号炉          光束小刀<br>三号炉          钢铁<br>四号炉          青铜            <br>', '104', '102', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('69', '213', 1, '热带低气压重拳<br>第一次来到公会，心情难免有点紧张，结果忘记了来到公会的原因<br>幸好，有一位热心的成员前来协助，你把一切告诉他，他说：<br>「热带低气压重拳是一种常见的武器，但又可否知道它的铸造方法？若不知道，可参考以下内容」<br>然后，他递给你一本书：<br>一号炉          铁拳<br>二号炉          铁拳<br>三号炉          青铜<br>四号炉          青铜    <br>', '202', '202', '711', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('70', '510', 1, '5连装飞弹发射器<br>第一次来到公会，心情难免有点紧张，结果忘记了来到公会的原因<br>幸好，有一位热心的成员前来协助，你把一切告诉他，他说：<br>「5连装飞弹发射器是一种常见的武器，但又可否知道它的铸造方法？若不知道，可参考以下内容」<br>然后，他递给你一本书：<br>一号炉          高能飞弹发射器<br>二号炉          高能飞弹发射器<br>三号炉          钢铁<br>四号炉          青铜            <br>', '502', '502', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('71', '96001', '6', 'EXAM System<br> 这一天你又来到了工程师公会，发现了一大堆学者正认真地打量着一部残缺不堪的MS。<br> 为满足你的好奇心，你走上前去，试图从听学者们的话中打听这部MS的来历。<br> <br> 「这部以蓝色为主要色系的机体是.....﹖」<br> 「你这新来的﹗这就是那不分敌我都胡乱攻击的\"恶魔\"啊﹗」<br> 「嗯...那时他展现的非凡破坏力...简直叫我心寒.....」<br> 「不只是破坏力，就是回避力，命中率都较一般MS要高呢﹗」<br> 「那为什麽会落得如此下场?」<br> 「因为那个系统强行把出力提高,使机体都负担不了......」<br> 「听说连驾驶者...都被弄得神志不清呢...」<br> 「难道...这就是传说中装备了EXAM System的\"Blue Destiny\"﹗﹖」<br> 「让我把系统给电脑扫一下......」<br> <br> 「Multi-Sensor、Dual Sensor、Multi-Sensor、Dual Sensor、Multi-Sensor、Dual Sensor、水晶、黄金、水晶、黄金」<br> <br> 正当你幻想着自己的机体装备EXAM System后力量是何其强大的同时，<br> 你突然感到自己后领被一道何其强大的力量拉扯，就这样被一个警卫提出公会门外﹕<br> <br> 「你在这里干啥﹖难道你是敌国派来的间谍﹖」<br> <br> 为保自己的清白，你连忙向他解释﹕<br> <br> 「嗯......是这样的......」<br>', '912', '811', '912', '811', '912', '811', '718', '715', '718', '715', NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL );");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('72', '90002', '10', '你目睹了一场争执﹕<br> <br> 「像你这 Coordinator 有什麽厉害，还不及我们这些Newtype﹗」一个男人以食指指向一个戴着面具的男人。<br> 「你只是人造的产物而已﹗」又一个男人指着那个戴着面具的男人。<br> 「我们Newtype能使用浮游炮，你呢﹖」再一个男人指向那个戴着面具的男人。<br> 「啪﹗」在千夫所指下，那戴着面具的男人终于沉不着气，一掌打在桌上﹕<br> 「你们这些没见识的人，有没有听过Super DRAGOON? 就是我们Coordinator专用的武器，能力更在浮游炮之上！」<br> 「那麽Super DRAGOON又是怎样铸造的﹖」你心里好奇地问。<br> 那戴着面具的男人回过头来，瞥了你一眼，递了一张字条﹕<br> <br> 面具男的保证铸造法----Super DRAGOON<br> <br> 一号炉          飞翔炮<br> 二号炉          Newtype系统对应有线式光束炮<br> 三号炉          Bit<br> 四号炉          Bit<br> 五号炉          高能光束步枪<br> 六号炉          高能光束步枪<br> 七号炉          高能光束步枪<br> 八号炉          高能光束步枪<br> 九号炉          水晶<br> 十号炉          水晶<br> 十一号炉        黄金<br> 十二号炉        黄金<br> 十三号炉        黄金<br> <br> 虽然你很奇怪为什麽那戴着面具的男人知道你在想什麽，<br> 但不管怎样，你幸运地获得了铸造Super DRAGOON的方法。<br>', '997', '620', '971', '971', '405', '405', '405', '405', '718', '718', '715', '715', '715', NULL , NULL , NULL , NULL , NULL , NULL , NULL );");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('73', '969', '6', '新高达尼姆合金<br> 这一天你又来到了工程师公会，看到一名工程师，埋头苦干，拿着钢笔写字。<br> 他一面写，一面就哼唱着小调。<br> 突然，他回头一望，便对你笑说：「这歌词你一定会很喜欢！」<br> 然后，他便迅速取去你手上那箱钞票，逃去无踪了。<br> _______________________________________________________<br> 您想变强吗?<br> 作曲、编曲﹕我　　　　　填词﹕冷月无声<br> 小修﹕　　　栩月　　　　製作﹕风之翎<br> <br> 经历了长久的努力和付出后<br> 得到了心目中的神兵利器<br> 又把它用得滚爪烂熟之际....<br> <br> 却发现，发现了您敌人所拥有的<br> 并不比您的弱，甚至更胜于您<br> 更对您咄咄相逼,使您无力招架<br> <br> 您有感到自己的力量不足吗?<br> 您有感到自己所付出的已诸东流吗?<br> 您有想过令自己的武器与机体<br> 按照自己的思想作出强化与进步吗??<br> <br> Repeat *<br> 既然您付了钱,当然不会让您感到灰心<br> 请您紧记以下之物的制作配方<br> 一三七青铜 四五钢铁<br> 二六十黄金 八九水晶<br> 它!能令你变强!!<br> <br> 它!能令你更进一步地变强!!<br> _______________________________________________________<br> 「有种被骗的感觉。。」你心想着。<br>', '711', '715', '711', '712', '712', '715', '711', '718', '718', '715', NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL );");

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

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('0', '通常攻击', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('StrikeA', '突击', 0, 5, 2, 10, -2, -2, -1, 0, 0, 100000, 6, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('DefCounterA', '防御反击', 0, 0, 2, -5, 10, -5, 0, 5, 0, 120000, 11, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('QuickA', '迅速', 0, 10, 2, 0, -5, 10, -2, 0, 5, 120000, 11, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('SnipeA', '狙击', 0, 10, 5, 2, -3, -5, 10, 5, 0, 500000, 27, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('StrikeB', '舍身', 100, 10, 5, 20, -5, 0, 0, 5, 5, 500000, 27, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('DoubleStrike', '二连击', 0, 0, 20, 0, 0, -5, -10, 10, 0, 1000000, 35, 'DoubleStrike');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('TripleStrike', '三连击', 0, 0, 40, 0, 0, -5, -10, 10, 0, 3000000, 65, 'TripleStrike');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('AllWepStirke', '全弹发射', 100, 50, 25, 0, 0, 0, -20, 25, 0, 2500000, 56, 'AllWepStirke');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('RaidStrike', '奇袭', 0, 5, 35, 5, 5, 25, 10, 0, 0, 4000000, 70, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('MindStrike', '心眼', 0, 0, 40, 10, -5, 5, 25, 5, 0, 4000000, 70, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('SenseStrike', '灵感', 0, 25, 60, 25, 0, 10, 10, 10, 10, 10000000, 80, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('CounterStrike', '伺机反击', 0, 0, 45, 0, 0, 0, 0, 20, 0, 12000000, 85, 'CounterStrike');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('FirstStrike', '先制攻击', 0, 30, 45, 0, 0, 5, -5, 0, 0, 12000000, 85, 'FirstStrike');");

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

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('0', '无武器', 0, 'N', '0', '', '', 0, 0, 0, 0, 0, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('101', '小刀', 1, 'BDI', '101', '102,124', '', 780, 95, 2, 15, 40000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('102', '光束小刀', 2, 'BDI', '101', '103', '', 780, 95, 2, 30, 48000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('103', '光束配刀', 3, 'BI', '101', '104', '', 850, 98, 2, 45, 57000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('104', '高出力光束配刀', 4, 'I', '101', '105', '107', 1000, 98, 2, 60, 65000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('105', '电磁力光束配刀', 5, 'I', '101', '115', '106', 1200, 99, 2, 90, 74000, 0, 'MeltB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('106', '电磁剑', 6, 'I', '101', '', '', 2700, 100, 1, 115, 80000, 0, 'MeltB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('107', '高周波刀', 6, 'N', '101', '108', '', 1200, 100, 2, 90, 84000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('108', '高出力周波刀', 7, 'N', '101', '109', '110', 630, 105, 4, 100, 95000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('109', '妖刀村正', 8, 'N', '101', '', '', 1525, 100, 2, 115, 100000, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('110', '对舰刀《SCHWERT-GEWEHER》', 5, 'N', '101', '', '', 835, 100, 4, 130, 100000, 0, 'DamB,MeltB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('115', '电磁斧', 5, 'I', '101', '116,117', '', 2500, 100, 1, 85, 63000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('116', '大型电磁斧', 6, 'I', '101', '', '', 2950, 95, 1, 105, 72000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('117', '回转式电磁斧', 6, 'N', '101', '', '118', 1300, 95, 2, 95, 71000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('118', '双回转式电磁斧', 7, 'N', '101', '', '', 730, 95, 4, 100, 86000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('124', '金属小刀', 2, 'I', '101', '125', '', 800, 100, 2, 25, 46000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('125', '重装金属小刀', 3, 'DI', '101', '', '126', 870, 100, 2, 40, 57000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('126', '重斩刀', 4, 'N', '101', '128', '127', 680, 100, 3, 65, 69000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('127', '青龙刀', 4, 'N', '101', '', '128', 780, 100, 4, 135, 85000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('128', '对装甲刀', 5, 'N', '101', '', '129', 1520, 100, 2, 130, 100000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('129', '斩舰刀', 6, 'N', '101', '', '', 1780, 100, 2, 150, 100000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('201', '格斗', 1, 'BDI', '201', '202', '', 540, 100, 3, 15, 45000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('202', '铁拳', 2, 'DI', '201', '203,212', '', 570, 100, 3, 25, 50000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('203', '刚腕粉碎击', 3, 'I', '201', '204', '219', 610, 103, 3, 35, 55000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('204', '波动龙神击', 4, 'I', '201', '205', '', 650, 105, 3, 50, 63000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('205', '旋风三连击', 5, 'I', '201', '206', '', 710, 105, 3, 70, 72000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('206', '爆碎重落下', 6, 'I', '201', '', '207', 770, 105, 3, 95, 81000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('207', '疾风双连击', 7, 'N', '201', '', '208', 750, 105, 4, 125, 90000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('208', '醉舞．再现江湖', 8, 'N', '201', '', '', 680, 105, 5, 160, 100000, 0, 'MobA,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('212', '燃之重拳', 3, 'I', '201', '213', '216', 775, 100, 3, 60, 75000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('213', '热带低气压重拳', 4, 'I', '201', '', '214', 620, 100, 4, 95, 83000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('214', '豪热机关枪重拳', 5, 'N', '201', '', '215', 490, 100, 6, 110, 90000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('215', '十二王方牌大车轮', 7, 'N', '201', '', '', 265, 100, 12, 125, 100000, 0, 'AntiPDef,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('216', 'T-Link Knuckle', 2, 'N', '201', '', '', 1500, 110, 2, 120, 70000, 0, 'PsyRequired,DamB,AntiPDef,CostSP<3>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('219', '机械爪', 3, 'DI', '201', '220', '', 1100, 100, 2, 90, 56000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('220', '重装机械爪', 4, 'N', '201', '221', '223', 1275, 105, 2, 110, 64000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('221', '神龙伸缩爪', 5, 'N', '201', '', '222', 850, 105, 3, 145, 73000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('222', '真．流星蝴蝶剑', 6, 'N', '201', '', '', 400, 105, 8, 175, 95000, 0, 'DamB,Cease,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('223', '溶断破碎机械手', 4, 'N', '201', '', '', 1675, 110, 2, 170, 90000, 0, 'DamA,Cease,MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('301', '光束剑', 1, 'BDI', '301', '302', '', 830, 100, 2, 20, 60000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('302', '试作型光束剑', 2, 'DI', '301', '303', '', 900, 100, 2, 30, 63000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('303', '热能光束剑', 2, 'DI', '301', '304', '', 950, 100, 2, 38, 67000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('304', '腕式光剑', 3, 'I', '301', '305,318', '', 1050, 100, 2, 48, 71000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('305', '米加光束剑', 4, 'N', '301', '', '306,310,312', 1180, 100, 2, 59, 78000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('306', '大型光束剑', 6, 'N', '301', '307', '309', 1330, 100, 2, 80, 86000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('307', 'Hi-光束剑', 7, 'N', '301', '308', '', 1400, 100, 2, 110, 89000, 0, 'MeltB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('308', 'Hyper光束剑', 8, 'N', '301', '', '', 1580, 100, 2, 140, 94500, 0, 'MeltB,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('309', '超大型光束剑', 7, 'N', '301', '', '', 1560, 100, 2, 130, 93000, 0, 'MeltA,Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('310', '背部光束切裂器', 3, 'I', '301', '', '', 2880, 100, 1, 90, 71000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('312', '诱导式光束剑', 7, 'N', '301', '', '313,314', 2800, 95, 1, 135, 90000, 0, 'MeltB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('313', '有线式光束剑', 8, 'N', '301', '', '', 3100, 95, 1, 155, 99000, 0, 'Cease,MeltB,NTRequired,CostSP<5>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('314', '天上天下念动破碎剑', 8, 'N', '301', '', '', 3200, 95, 1, 175, 110000, 0, 'MeltB,DamB,AntiPDef,PsyRequired,CostSP<7>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('318', '斩铁剑', 5, 'I', '301', '319', '', 1240, 100, 2, 105, 83000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('319', '四象剑', 6, 'N', '301', '320', '322', 1340, 100, 2, 110, 87000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('320', '四象无形剑', 7, 'N', '301', '324', '321', 1450, 100, 2, 140, 91000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('321', '神速．四象无形剑', 8, 'N', '301', '', '', 1600, 100, 2, 180, 95000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('322', '龙王破山剑', 9, 'N', '301', '', '323', 1100, 99, 3, 200, 110000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('323', '龙王破山剑．逆鲮断', 10, 'N', '301', '', '', 1250, 99, 3, 230, 125000, 0, 'DamA,DamB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('324', '计都瞬狱剑', 7, 'I', '301', '', '', 1050, 100, 3, 140, 115000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('401', '105mm机枪', 1, 'BDI', '401', '402', '', 550, 95, 3, 30, 60000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('402', '110mm速射炮', 2, 'DI', '401', '403,417', '', 630, 95, 3, 45, 65000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('403', '光束步枪', 3, 'DI', '401', '405', '404', 730, 95, 3, 60, 71000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('404', '双光束步枪', 4, 'N', '401', '', '', 640, 85, 4, 125, 77000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('405', '高能光束步枪', 5, 'I', '401', '411', '406', 810, 95, 3, 90, 81000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('406', '轨道枪', 6, 'N', '401', '407,408', '410', 933, 98, 3, 120, 85000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('407', '2连装轨道枪', 7, 'N', '401', '', '', 505, 90, 6, 140, 89000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('408', '破坏轨道枪', 7, 'N', '401', '', '409', 1000, 90, 3, 130, 88000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('409', '超重力轨道枪', 8, 'N', '401', '', '', 1220, 98, 3, 180, 93500, 0, 'AntiPDef,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('410', '280mm轨道加农炮', 8, 'N', '401', '', '', 821, 88, 4, 160, 90000, 0, 'AntiPDef,MeltA,DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('411', 'Mega．Beam Rifle', 6, 'N', '401', '', '412', 910, 96, 3, 90, 75000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('412', 'Buster Rifle', 7, 'N', '401', '', '', 630, 98, 5, 170, 95000, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('417', '120mm机炮', 3, 'BDI', '401', '', '418', 610, 90, 3, 55, 65000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('418', '重突击机统', 4, 'I', '401', '419,426', '', 650, 90, 3, 70, 71000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('419', '霰弹炮', 5, 'N', '401', '420', '422', 230, 90, 10, 90, 76000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('420', '光束霰弹炮', 6, 'N', '401', '421', '', 205, 90, 15, 115, 85000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('421', '高能光束霰弹炮', 7, 'I', '401', '', '', 215, 95, 15, 145, 94000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('422', '对装甲散弹炮', 6, 'N', '401', '', '', 270, 90, 10, 125, 90000, 0, 'AntiPDef,DamA,DamB,MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('426', '高能机炮', 5, 'I', '401', '427', '', 695, 95, 3, 80, 74000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('427', '大型机炮', 6, 'N', '401', '428', '431', 575, 95, 4, 105, 82000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('428', '超重型机炮', 7, 'N', '401', '429', '', 435, 95, 6, 135, 91000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('429', '光束旋转机炮', 8, 'N', '401', '', '430', 525, 99, 6, 160, 100000, 0, 'Cease,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('430', '双光束旋转机炮', 10, 'N', '401', '', '', 295, 99, 12, 190, 115000, 0, 'DamA,Cease,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('431', '180mm 加农炮', 7, 'N', '401', '', '', 1350, 97, 2, 155, 93000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('501', '飞弹发射器', 1, 'BDI', '501', '502,509', '', 900, 85, 2, 35, 80000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('502', '高能飞弹发射器', 2, 'I', '501', '503', '', 1100, 85, 2, 55, 85000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('503', '原子能飞弹发射器', 4, 'N', '501', '', '504,516', 1300, 88, 2, 75, 90500, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('504', '榴炮发射器', 6, 'N', '501', '', '505', 1550, 88, 2, 95, 95000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('505', '核弹发射器', 8, 'N', '501', '', '', 4000, 88, 1, 120, 99999, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('509', '连装飞弹发射器', 2, 'DI', '501', '510', '', 800, 87, 3, 64, 87000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('510', '5连装飞弹发射器', 3, 'I', '501', '511', '', 550, 86, 5, 83, 94000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('511', '10连装飞弹发射器', 4, 'N', '501', '512', '513', 300, 85, 10, 95, 98500, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('512', '全方位火箭发射器', 6, 'N', '501', '', '', 185, 85, 20, 110, 105000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('513', '小型自己诱导飞弹', 6, 'N', '501', '', '', 235, 100, 12, 150, 400000, 0, 'Tarb,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('516', '240mm火箭炮', 3, 'I', '501', '518,519,520', '517', 2450, 80, 1, 70, 90000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('517', 'NEO火箭炮', 3, 'I', '501', '', '', 2700, 88, 1, 88, 94500, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('518', '高出力火箭炮', 4, 'N', '501', '', '', 2950, 88, 1, 95, 96500, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('519', '散弹火箭炮', 7, 'N', '501', '', '', 845, 96, 4, 100, 120000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('520', '大型火箭炮', 6, 'N', '501', '521,522', '', 3250, 88, 1, 120, 99000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('521', '原子火箭炮', 7, 'N', '501', '', '', 3300, 93, 1, 135, 110000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('522', '核子火箭炮', 8, 'N', '501', '', '', 3550, 93, 1, 155, 131000, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('601', '米加粒子炮', 1, 'BDI', '601', '602', '613', 440, 78, 5, 70, 90000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('602', '偏向米加粒子炮', 2, 'I', '601', '603', '608,609', 400, 78, 6, 80, 93000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('603', '连装米加粒子炮', 3, 'I', '601', '604', '', 350, 78, 8, 90, 97000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('604', '散弹米加粒子炮', 4, 'I', '601', '605', '', 380, 78, 8, 110, 120000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('605', '扩散米加粒子炮', 5, 'N', '601', '606', '', 275, 78, 12, 125, 126000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('606', '全方位扩散米加粒子炮', 6, 'N', '601', '', '607', 188, 75, 16, 140, 132000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('607', '全出力扩散米加粒子炮', 7, 'N', '601', '', '', 160, 70, 20, 185, 137000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('608', '大型米加粒子炮', 3, 'I', '601', '', '', 588, 75, 5, 160, 97000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('609', '单装炮', 3, 'I', '601', '610', '', 680, 75, 4, 140, 97000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('610', '冲角炮', 3, 'I', '601', '', '611', 600, 75, 5, 175, 97000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('611', '二连装冲角炮', 3, 'I', '601', '', '', 350, 75, 10, 200, 97000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('613', '光束炮', 3, 'I', '601', '614', '616', 540, 75, 5, 90, 115000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('614', '光束加农炮', 4, 'I', '601', '615', '620', 575, 75, 5, 110, 119000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('615', '米加加农炮', 4, 'N', '601', '', '', 680, 78, 5, 170, 122000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('616', '长距离光束加农炮', 5, 'N', '601', '', '617', 540, 80, 6, 155, 124000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('617', '米加光束加农炮', 6, 'N', '601', '619', '618', 570, 80, 6, 175, 130000, 0, 'MeltB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('618', '米加音波炮', 7, 'N', '601', '', '', 555, 95, 6, 220, 140000, 0, 'MeltA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('619', '大型光束加农炮', 8, 'N', '601', '', '', 430, 78, 8, 195, 129000, 0, 'DamA,DamB, AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('620', 'Newtype系统对应有线式光束炮', 7, 'N', '601', '', '', 835, 75, 4, 175, 120000, 0, 'DamA,NTCustom,CostSP<6>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('701', '青铜剑', 1, 'BI', '701', '702', '711', 1000, 95, 1, 25, 100000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('702', '钢铁剑', 2, 'I', '701', '703', '712', 1100, 95, 1, 35, 110000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('703', '晶石剑', 3, 'I', '701', '704', '', 1200, 96, 1, 45, 120000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('704', '白银剑', 4, 'I', '701', '705', '', 1300, 96, 1, 65, 130000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('705', '黄金剑', 5, 'N', '701', '706', '715', 1400, 97, 1, 75, 140000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('706', '白金剑', 6, 'N', '701', '707', '', 1500, 97, 1, 90, 150000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('707', '钻石剑', 7, 'N', '701', '', '708', 1600, 100, 1, 110, 160000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('708', '水晶剑', 8, 'N', '701', '', '718', 1800, 100, 1, 140, 170000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('711', '青铜', 0, 'N', '0', '', '', 0, 0, 0, 0, 120000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('712', '钢铁', 0, 'N', '0', '', '', 0, 0, 0, 0, 135000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('715', '黄金', 0, 'N', '0', '', '', 0, 0, 0, 0, 180000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('718', '水晶', 0, 'N', '0', '', '', 0, 0, 0, 0, 225000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('801', '喷射加速系统', 0, 'BI', '0', '', '', 0, 0, 0, 60, 600000, 2, 'Moba');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('806', 'Booster', 0, 'BI', '0', '', '', 0, 0, 0, 80, 600000, 2, 'MobA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('811', 'Dual Sensor', 0, 'BI', '0', '', '', 0, 0, 0, 30, 600000, 2, 'Tara');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('816', '瞄准器', 0, 'BI', '0', '', '', 0, 0, 0, 35, 600000, 2, 'TarA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('821', 'G．Wall', 0, 'BI', '0', '', '', 0, 0, 0, 70, 600000, 2, 'Defa,AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('826', '强力护盾', 0, 'BI', '0', '', '', 0, 0, 0, 50, 600000, 2, 'DefA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('827', '光束护盾', 0, 'BI', '0', '', '', 0, 0, 0, 50, 600000, 2, 'Defa');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('828', '大型护盾', 0, 'BI', '0', '', '', 0, 0, 0, 40, 500000, 2, 'AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('831', '月钛合金装甲', 0, 'BI', '0', '', '', 0, 0, 0, 150, 1000000, 2, 'DefB,ExtHP<600>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('90002', 'Super DRAGOON', 13, 'N', '0', '', '', 320, 125, 16, 800, 36500000, 0, 'COCustom,AntiPDef,MeltA,');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('901', 'G-bit卫星微波能量炮', 12, 'N', '0', '', '', 1150, 90, 6, 800, 380000, 0, 'NTCustom,DamA,DamB,MeltA,AntiPDef,CostSP<50>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('902', '天上天下念动爆碎剑', 12, 'N', '0', '', '', 2800, 115, 2, 650, 370000, 0, 'AntiPDef,PsyRequired,DamA,MeltB,CostSP<30>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('903', '缩退炮', 11, 'N', '0', '', '', 1070, 95, 5, 490, 360000, 0, 'DamA,DamB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('904', '光之翼', 10, 'N', '0', '', '', 5100, 105, 1, 480, 370000, 0, 'MeltB,Mobb,AntiTarS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('905', '黑洞炮', 11, 'N', '0', '', '', 1700, 90, 3, 490, 360000, 0, 'Cease，DamA,DamB,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('906', 'Solar panel', 0, 'N', '0', '', '', 0, 0, 0, 0, 2000000, 2, 'ENPcRecB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('907', 'NANO Skin', 0, 'N', '0', '', '', 0, 0, 0, 0, 2000000, 2, 'HPPcRecA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('908', 'Z．O．Armor', 0, 'N', '0', '', '', 0, 0, 0, 300, 1600000, 2, 'DefE,AntiDam,ExtHP<3000>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('909', '超合金newZ装甲', 0, 'N', '0', '', '', 0, 0, 0, 350, 1600000, 2, 'DefE,PerfDef,ExtHP<2000>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('911', '极速喷射加速系统', 0, 'I', '0', '', '', 0, 0, 0, 100, 500000, 2, 'Mobb');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('912', 'Multi-Sensor', 0, 'I', '0', '', '', 0, 0, 0, 70, 500000, 2, 'Tarb');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('921', 'Mega Booster', 0, 'I', '0', '', '', 0, 0, 0, 120, 650000, 2, 'MobB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('922', 'Beam Coating', 0, 'I', '0', '', '', 0, 0, 0, 110, 1000000, 2, 'Defb');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('931', '音速喷射系统', 0, 'I', '0', '', '', 0, 0, 0, 150, 750000, 2, 'Mobc');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('932', 'T-Link Sensor', 0, 'I', '0', '', '', 0, 0, 0, 150, 800000, 2, 'Tarc,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('933', '电磁炮', 3, 'I', '0', '', '', 1250, 98, 3, 190, 100000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('941', 'Thruster', 0, 'I', '0', '', '', 0, 0, 0, 180, 900000, 2, 'MobC');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('942', '照准系统', 0, 'I', '0', '', '', 0, 0, 0, 80, 900000, 2, 'TarB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('943', '电磁加农炮', 4, 'I', '0', '', '', 1365, 98, 3, 240, 120000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('944', 'AB Field', 0, 'I', '0', '', '', 0, 0, 0, 160, 1050000, 2, 'Defc');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('945', 'Shield Buster Rifle', 6, 'I', '0', '', '', 620, 98, 5, 115, 120000, 1, 'DamA,AntiPDef,DefC');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('951', '菊一文字', 5, 'I', '0', '', '', 1890, 99, 2, 275, 130000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('952', '引力子步枪BST', 5, 'I', '0', '', '', 1310, 95, 3, 300, 140000, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('953', '红外线追踪飞弹', 7, 'I', '0', '', '', 400, 120, 8, 255, 200000, 0, 'Tarc,AntiMobS,Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('954', '激光盾', 6, 'I', '0', '', '', 340, 90, 10, 200, 130000, 1, 'MeltA,DamA,DefA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('955', '计都罗侯剑', 6, 'I', '0', '', '', 3590, 100, 1, 275, 175000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('956', '高达尼姆合金装甲', 0, 'I', '0', '', '', 0, 0, 0, 200, 1020000, 2, 'DefC,ExtHP<900>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('957', '超硬钢装甲', 0, 'I', '0', '', '', 0, 0, 0, 200, 1020000, 2, 'DefC,ExtHP<800>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('958', '念动力L式加农炮', 0, 'I', '0', '', '', 640, 95, 6, 215, 270000, 0, 'PsyRequired,DamA,AntiPDef,TarB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('96001', 'EXAM System', 0, 'N', '0', '', '', 0, 0, 0, 30, 1100000, 2, 'EXAMSystem, MobA, TarA, AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('961', '扩散粒子弹', 9, 'I', '0', '', '', 260, 93, 15, 330, 160000, 0, 'AntiPDef,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('962', 'Buster Beam Rifle', 8, 'N', '0', '', '', 1030, 95, 4, 320, 1270000, 1, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('963', '天空剑', 7, 'N', '0', '', '', 3850, 100, 1, 310, 155000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('964', '光速移动系统', 0, 'I', '0', '', '', 0, 0, 0, 210, 1100000, 2, 'Mobd');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('965', '高性能照准系统', 0, 'I', '0', '', '', 0, 0, 0, 140, 1100000, 2, 'TarC,Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('966', 'I-Field Barrier', 0, 'I', '0', '', '', 0, 0, 0, 220, 1250000, 2, 'Defd,AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('967', 'E field', 0, 'I', '0', '', '', 0, 0, 0, 220, 1250000, 2, 'Defd,PerfDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('968', '格林机关炮', 8, 'I', '0', '', '', 380, 95, 10, 310, 155000, 0, 'DamB,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('969', '新高达尼姆合金', 0, 'N', '0', '', '', 0, 0, 0, 0, 250000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('971', 'Bit', 8, 'I', '0', '', '', 345, 110, 12, 280, 50000, 0, 'NTRequired,Cease,CostSP<8>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('972', 'Divider', 8, 'I', '0', '', '', 322, 100, 13, 340, 650000, 0, 'AntiPDef,DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('973', '计都罗侯剑*暗剑杀', 9, 'I', '0', '', '', 4450, 105, 1, 355, 2300000, 0, 'AntiPDef,MobA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('974', '卫星微波能量炮', 9, 'I', '0', '', '', 2400, 90, 2, 450, 1650000, 0, 'NTCustom,AntiPDef,CostSP<15>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('975', 'Psyco-Frame', 0, 'I', '0', '', '', 0, 0, 0, 220, 1000000, 2, 'Tard,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('976', 'Hyper Thruster', 0, 'I', '0', '', '', 0, 0, 0, 240, 1000000, 2, 'MobD');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('977', '高性能雷达', 0, 'I', '0', '', '', 0, 0, 0, 185, 1000000, 2, 'TarC,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('978', '念动力Field', 0, 'I', '0', '', '', 0, 0, 0, 250, 1350000, 2, 'PsyRequired,PerfDef,DefX');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('979', 'FF Barrier', 0, 'I', '0', '', '', 0, 0, 0, 240, 1300000, 2, 'Defd,AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('981', '天空剑．V字斩', 9, 'I', '0', '', '', 2270, 100, 2, 385, 700000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('982', '超电磁龙卷', 9, 'I', '0', '', '', 430, 96, 10, 380, 700000, 0, 'AntiMobS,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('983', '天上天下无敌剑', 9, 'I', '0', '', '', 2300, 100, 2, 395, 710000, 0, 'PsyRequired,MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('984', '双格林机关炮', 10, 'I', '0', '', '', 215, 95, 20, 355, 690000, 0, 'DamA,DamB,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('985', '零式斩舰刀', 10, 'I', '0', '', '', 4600, 92, 1, 390, 690000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('986', 'Transitive FEAR', 0, 'I', '0', '', '', 0, 0, 0, 320, 1300000, 2, 'Mobd,AntiTarS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('987', '三次元雷达', 0, 'I', '0', '', '', 0, 0, 0, 250, 1100000, 2, 'TarD,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('988', 'G．Territory', 0, 'I', '0', '', '', 0, 0, 0, 280, 1500000, 2, 'Defe,PerfDef,AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('989', '超合金Z装甲', 0, 'I', '0', '', '', 0, 0, 0, 250, 1250000, 2, 'DefD,ExtHP<1500>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('991', 'V.S.B.R.', 9, 'N', '0', '', '', 1055, 105, 4, 400, 280000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('992', 'Twin Buster Rifle', 10, 'N', '0', '', '', 790, 95, 6, 435, 280000, 0, 'DamA,DamB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('993', '双卫星微波能量炮', 11, 'N', '0', '', '', 1320, 92, 4, 530, 300000, 0, 'NTCustom,AntiPDef,DamB,CostSP<25>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('994', '反应弹', 11, 'N', '0', '', '99001', 2275, 92, 2, 430, 250000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('99001', '对舰用大型反应弹', 11, 'N', '0', '', '', 1330, 86, 4, 650, 1000000, 0, 'DamA,DamB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('995', '斩舰刀．一文字斩', 11, 'N', '0', '', '', 4990, 105, 1, 450, 250000, 0, 'AntiPDef,DamA,DamB,Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('996', '浮游炮', 10, 'N', '0', '', '', 385, 120, 12, 350, 165000, 0, 'NTCustom,Cease,CostSP<12>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('997', '飞翔炮', 10, 'N', '0', '', '', 405, 130, 12, 360, 168000, 0, 'NTCustom,Cease,CostSP<15>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('998', 'HiMAT System', 0, 'N', '0', '', '', 0, 0, 0, 295, 1300000, 2, 'Mobe,AntiTarS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('999', 'E - cap', 0, 'N', '0', '', '', 0, 0, 0, 0, 1700000, 2, 'ENPcRecA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('FortWepA', '对空自动火神炮炮塔系统', 0, 'I', '0', '', '', 1000, 85, 40, 0, 500000, 0, 'Cease, DamA, FortressOnly, CannotEquip');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('FortWepB', '防守用连装对舰飞弹炮台', 0, 'I', '0', '', '', 1000, 110, 20, 0, 5500000, 0, 'TarD, AntiMobS, Cease, FortressOnly, CannotEquip');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('FortWepC', '阳电子破坏炮', 0, 'I', '0', '', '', 1760, 75, 20, 0, 15000000, 0, 'MeltA, AntiMobS, Cease, FortressOnly, CannotEquip');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('FortWepD', '殖民星雷射炮', 0, 'I', '0', '', '', 50000, 100, 1, 0, 155000000, 0, 'MeltB, AntiMobS, Cease, AntiPDef, TarC, FortressOnly, CannotEquip');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('GMwepA','邪*真*帝王の剑(GM专用)','0','I','0','','','50000','120','2','0','1','0','DamA,DamB,MobA,MobB,MobC,MobD,Moba,Mobb,Mobc,Mobd,Mobe,TarA,TarB,TarC,TarD,Tara,Tarb,Tarc,Tard,Tare,DefA,DefB,DefC,DefD,DefE,Defa,Defb,Defc,Defd,Defe,PerfDef,AntiDam,DoubleExp,DoubleMon,DefX,AtkA,MeltA,MeltB,Cease,AntiPDef,AntiTars');");

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
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_game_info` VALUES ('NPC874','无双','20000','5000','5000','50000','5000','5000','9','8','8','7','','30','0','109<!>0','0<!>0','0<!>0','0<!>0','0<!>0','','0','0','0','0','','','0','0','0');");

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

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_organization` VALUES (0, '中立组织', '#AAAAAA', 0, 0, '', '', '', '', '', '', 0, 0, '', '', '');");

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


如无任何错误出现
<br>
资料表建立完成! 
<br>
请删除install.php