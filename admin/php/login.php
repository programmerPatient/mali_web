<?php

/**
*登录代码逻辑
*/

require '../../databases/mysql.php';
require '../../config/mysql_config.php';
session_start();

/*已经登陆过直接跳转到首页*/
if($_SESSION['adminname']){
	header('location:../index.php');
}
/**
 * 建立mysql链接
 */
$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);
$captcha = $_SESSION['captcha'];//获取验证码数据
$error = '';
if(!$_POST['account']){
	$error .='账号不能为空！';
}else if(!$_POST['password']){
	$error .='密码不能为空！';
}else if($captcha != strtolower($_POST['code'])){
	$error .= '验证码错误!';
}else{
	$account = $_POST['account'];
	$password = $_POST['password'];
	$result = $mysql->fetch_one("SELECT * FROM admin WHERE account="."'".$account."'"." AND password="."'".md5($password)."'");
	if($result){
		$_SESSION['adminname'] = $result['name'];
		$_SESSION['adminphone'] = $result['phone'];
		$_SESSION['adminaccount'] = $result['account'];
		header('location:../index.php');	
	}else{
		$error .= '账号或密码错误!';
	}

}

header('location:../login.php?error='.$error);