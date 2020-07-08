<?php
header("Content-Type:text/html;charset=UTF-8");  
require '../../databases/mysql.php';
require '../../config/mysql_config.php';


/**
 * 建立mysql链接
 */
$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);
$cate_id = $_POST['cate_id'];

//事务处理开始
$mysql->get_conn()->autocommit(false); //设置为非自动提交——事务处理
try{
	$mysql->delete('cate',' id='.$cate_id);
	$mysql->delete('article',' cate_id='.$cate_id);
	$mysql->get_conn()->commit();  //全部成功，提交执行结果
	echo json_encode(['code'=>-1,'msg'=>'删除成功！']);
}catch(Exception $e){
	$mysql->get_conn()->rollback(); //有任何错误发生，回滚并取消执行结果
	echo json_encode(['code'=>1,'msg'=>'删除失败！']);
}

//事务处理结束