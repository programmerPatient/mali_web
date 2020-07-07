<?php
header("Content-Type:text/html;charset=UTF-8");  
require '../../databases/mysql.php';
require '../../config/mysql_config.php';


/**
 * 建立mysql链接
 */
$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);
$cate_id = $_POST['cate_id'];
$result = $mysql->delete('cate',' id='.$cate_id);
if($result){
	echo json_encode(['code'=>-1,'msg'=>'删除成功！']);
}else{
	echo json_encode(['code'=>1,'msg'=>'删除失败！']);
}