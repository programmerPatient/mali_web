<?php

header("Content-Type:text/html;charset=UTF-8");  
require '../../databases/mysql.php';
require '../../config/mysql_config.php';


/**
 * 建立mysql链接
 */
$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);

$cate_id = $_POST['cate_id'];
$data['name'] = $_POST['name'];
$data['status'] = $_POST['status'];
$data['sort'] = $_POST['sort'];
$result = $mysql->update($data,'cate',' id='.$cate_id);
if($result){
	header('location:../cate_list.php?success=分类修改成功！');
}else{
	header('location:../cate_list.php?error=分类修改失败，请重试！');
}