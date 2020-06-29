<?php
require '../databases/mysql.php';
require '../config/mysql_config.php';
session_start();
/**
 * 建立mysql链接
 */
$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);
$error = '';
if(empty($_POST['name'])){
	$error .= '姓名不能为空！';
	header('location:../mine.php?error='.$error);
}else if(empty($_POST['phone'])){
	$error .= '电话不能为空！';
	header('location:../mine.php?error='.$error);
}else if($_SESSION['captcha'] != $_POST['code']){
	$error .= '验证码错误!';
	header('location:../mine.php?error='.$error);
}else if(!$_POST['password']){
	$result = $mysql->update(['name'=>$_POST['name'],'phone'=>$_POST['phone']],'user',' id='.$_SESSION['userid']);
	if(!$result){
		$error .= '更新失败！';
		header('location:../mine.php?error='.$error);
	}else{
		$_SESSION['username'] = $_POST['name'];
		$_SESSION['userphone'] = $_POST['phone'];
		header('location:./mine.php?success=修改成功！');
	}

}else if($_POST['password'] != $_POST['confim_password']){
	$error .= '两次密码不一致 ';
	header('location:../mine.php?error='.$error);
}else{
	$result = $mysql->fetch_one("SELECT * FROM user WHERE account="."'".$_SESSION['useraccount']."'"." AND password="."'".md5($_POST['old_password']	)."'");
	if($result){
		$update = $mysql->update(['password' => md5($_POST['password']),'name'=>$_POST['name'],'phone'=>$_POST['phone']],'user',' id='.$_SESSION['userid']);
		if(!$update){
			$error .= '修改失败请重试！';
		}else{
			$_SESSION['username'] = $_POST['name'];
			$_SESSION['userphone'] = $_POST['phone'];
			header('location:../mine.php?success=修改成功！');
		}
	}else{
		$error .= '原始密码错误请重试！';
		header('location:../mine.php?error='.$error);
	}
}



