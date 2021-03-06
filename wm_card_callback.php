<?php
if(!defined('EMLOG_ROOT')) {exit('error!');}
function callback_init(){
	$DB = MySql::getInstance();
	$check_table_exist = $DB->query('SHOW TABLES LIKE "'.DB_PREFIX.'wm_card"');
	if($DB->num_rows($check_table_exist) == 0){// 新建数据表
		$dbcharset = 'utf8mb4';
		$type = 'MYISAM';
		$add = $DB->getMysqlVersion() > '4.1' ? "ENGINE=".$type." DEFAULT CHARSET=".$dbcharset.";":"TYPE=".$type.";";
		$sql = "CREATE TABLE  `".DB_PREFIX."wm_card` (
		`id` mediumint(8) unsigned NOT NULL auto_increment,
		`email` varchar(255) NOT NULL default '0',
		`cardID` longtext NOT NULL,
		`cardCount` longtext NOT NULL,
		`timeStamp` int(10) NOT NULL,
		`todayCount` int(10) NOT NULL,
		`score` int(10) NOT NULL default '0',
		`level` int(10) NOT NULL default '0',
		`exp` int(10) NOT NULL default '0',
		PRIMARY KEY  (`id`)
)".$add;
		$DB->query($sql);
	}
}

function callback_rm(){
	$DB = MySql::getInstance();
	$query = $DB->query("DROP TABLE IF EXISTS ".DB_PREFIX."wm_card");
}
?>
