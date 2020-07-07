<?php

header("Content-Type:text/html;charset=UTF-8");  
require '../../databases/mysql.php';
require '../../config/mysql_config.php';


/**
 * 建立mysql链接
 */
$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);

$article_id = $_POST['article_id'];
$data['title'] = $_POST['title'];
$data['cate_id'] = $_POST['cate_id'];
if($_POST['image_src']){
	$data['img_src'] = $_POST['image_src'];
}
$data['status'] = $_POST['status'];
$data['content'] = $_POST['content'];
$data['sort'] = $_POST['sort'];
$result = $mysql->update($data,'article',' id ='.$article_id);
if($result){
	header('location:../article_list.php?success=修改成功！');
}else{
	header('location:../article_list.php?error=修改失败，请重试！');
}