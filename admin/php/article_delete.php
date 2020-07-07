<?php

header("Content-Type:text/html;charset=UTF-8");  
require '../../databases/mysql.php';
require '../../config/mysql_config.php';


/**
 * 建立mysql链接
 */
$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);
$article_id = $_POST['article_id'];
$result = $mysql->delete('article',' id='.$article_id);
if($result){
	// header('location:../article_list.php?')
	echo json_encode(['code'=>-1,'msg'=>'删除成功！']);
}else{
	echo json_encode(['code'=>1,'msg'=>'删除失败！']);
}