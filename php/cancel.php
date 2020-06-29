<?php

/**
*注销账号
*/

require '../databases/mysql.php';
require '../config/mysql_config.php';
session_start();

$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);
$result = $mysql->update(['is_cancel'=>'1'],'user',' id='.$_SESSION['userid']);

if($result){
	session_destroy();
	header('location:../login.php?success=注销成功');
}else{
	header('location:../index.php?error=注销失败');
}
