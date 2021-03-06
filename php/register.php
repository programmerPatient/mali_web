<?php
header("Content-Type:text/html;charset=UTF-8");  
require '../databases/mysql.php';
require '../config/mysql_config.php';
session_start();


/**
 * 建立mysql链接
 */
$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);

$result = $mysql->fetch_one("SELECT * FROM user WHERE account="."'".$_POST['account']."'");

$captcha = $_SESSION['captcha'];//获取验证码数据
$error = '';
if(empty($_POST['name'])){
	$error .= '姓名不能为空！';
}else if(empty($_POST['phone'])){
	$error .= '电话不能为空！';
}else if(empty($_POST['account'])){
	$error .= '账号不能为空！';
}else if(empty($_POST['password']) || strlen($_POST['password']) > 16){
	$error .= '密码不能为空或密码长度超过16！';
}else if($_POST['password'] != $_POST['confim_password']){
	$error .= '两次密码不一致 ';
}else if(!preg_match("/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/",$_POST['phone'])){
	$error .='手机号格式错误！';
}else if($result){
	$error .= '该账号已经存在 ';
}else if($captcha != strtolower($_POST['code'])){
	$error .= '验证码错误 ';
}
if($error != ''){
	header('location:../register.php?error='.$error);
}else{
	$data['name'] = $_POST['name'];
	$data['phone'] = $_POST['phone'];
	$data['account'] = $_POST['account'];
	$data['password'] = md5($_POST['password']);
	$result = $mysql->insert($data,'user');
	$_SESSION['username'] =$_POST['name'];
	$_SESSION['userphone'] = $_POST['phone'];
	$_SESSION['useraccount'] = $_POST['account'];
	header('location:../index.php');
}