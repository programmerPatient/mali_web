<?php
header("Content-Type:text/html;charset=UTF-8");  
require '../../databases/mysql.php';
require '../../config/mysql_config.php';
session_start();
/**
 * 建立mysql链接
 */
$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);
$data['name'] = $_POST['name'];
$data['phone'] = $_POST['phone'];
if($_POST['old_password'] || $_POST['passwoed'] || $_POST['confirm_password']){
	//修改密码
	$result = $mysql->fetch_one("SELECT * FROM admin WHERE account="."'".$_SESSION['adminaccount']."'"." AND password="."'".md5($_POST['old_password'])."'");
	if(!$result){
		$error ='原始密码错误！';
	}else{
		if( $_POST['password'] != $_POST['confirm_password']){
			$error ='两次输入密码不一致！';
		}else if(!$_POST['password'] || !$_POST['confirm_password']){
			$error ='新密码不能为空！';
		}else{
			$data['password'] = md5($_POST['password']);
			$result = $mysql->update($data,'admin',' account='.'\''.$_SESSION['adminaccount'].'\'');
			if(!$result){
			$error = '修改失败';
			}else{
				$success = '修改成功';
				$_SESSION['adminname'] = $data['name'];
				$_SESSION['adminphone'] = $data['phone'];
				header('location:../admin_message.php?success='.$success);
				exit();
			}
		}
	}
}else{
	 if(!preg_match("/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/",$_POST['phone'])){
		$error ='手机号格式错误！';
	}else{
		$result = $mysql->update($data,'admin',' account='.'\''.$_SESSION['adminaccount'].'\'');
		if(!$result){
			$error = '修改失败';
		}else{
			$success = '修改成功';
			$_SESSION['adminname'] = $data['name'];
			$_SESSION['adminphone'] = $data['phone'];
			header('location:../admin_message.php?success='.$success);
			exit();
		}
	}
	
}

header('location:../admin_message.php?error='.$error);

