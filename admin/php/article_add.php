<?php

header("Content-Type:text/html;charset=UTF-8");  
require '../../databases/mysql.php';
require '../../config/mysql_config.php';


/**
 * 建立mysql链接
 */
$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);

$data['title'] = $_POST['title'];
$data['cate_id'] = $_POST['cate_id'];
$data['img_src'] = $_POST['image_src'];
$data['status'] = $_POST['status'];
$data['content'] = $_POST['content'];
$data['sort'] = $_POST['sort'];
$result = $mysql->insert($data,'article');
if($result){
	header('location:../article_list.php');
}else{
	$error = '添加失败！请重试！';
	header('location:../article_list.php?error='.$error);
}