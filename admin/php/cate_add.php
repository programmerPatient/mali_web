<?php

header("Content-Type:text/html;charset=UTF-8");  
require '../../databases/mysql.php';
require '../../config/mysql_config.php';


/**
 * 建立mysql链接
 */
$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);

$data['name'] = $_POST['name'];
$data['status'] = $_POST['status'];
$data['sort'] = $_POST['sort'];
$result = $mysql->insert($data,'cate');
if($result){
	header('location:../cate_list.php');
}else{
	$error = '添加失败！请重试！';
	header('location:../cate_list.php?error='.$error);
}