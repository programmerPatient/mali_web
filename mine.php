<?php
require './databases/mysql.php';
require './config/mysql_config.php';
session_start();
/**
 * 建立mysql链接
 */
$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);
if(!$_SESSION['username']){
	header('location:./login.php');
}else{
	$username = $_SESSION['username'];
	$userphone = $_SESSION['userphone'];
	$useraccount = $_SESSION['useraccount'];	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
 
    <title>个人信息页</title>
    <link rel="stylesheet" href="./public/layui/css/layui.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/css/index.css">
 	<style type="text/css">
 		body{
 			background-image: url('./public/image/login.jpg')
 		}
 		.login-main{
 			margin-top:200px;
 			width:400px;
 			height:500px;
 			padding:50px;
 			background-color: #eaeaea;
 		}
 		.login-main header{
 			margin-top:0px;
 		}

 		#captcha{
 			width:45%;
 			margin-left:5%;
 			height:35px;
 		}

 		.error,.success{
            width:100%;
            text-align: center;
            padding-bottom:10px;
        }
 		.error{
 			color:red;
 		}
        .success{
            color:green;
        }
 		.login-main form .layui-input-inline input{
 			width:60%;
 		}
 	</style>
</head>
<body>

<?php require './top.php'; ?>

<div class="login-main">
    <header class="layui-elip">个人信息</header>
    <form class="layui-form" action="./php/update_user.php" method="POST">
        <div class="layui-input-inline">
        	<label class="layui-form-label ">账号：</label>
            <input type="text" name="account" disabled lay-verify="required" placeholder="账号" autocomplete="off"
                   class="layui-input" style="float:left" value="<?php echo $useraccount; ?>">
        </div>
        <div class="layui-input-inline">
        	<label class="layui-form-label ">姓名：</label>
            <input type="text" name="name" required lay-verify="required" placeholder="用户名" autocomplete="off"
                   class="layui-input" value="<?php echo $username; ?>">
        </div>
        <div class="layui-input-inline">
        	<label class="layui-form-label ">手机：</label>
            <input type="text" name="phone" required lay-verify="required" placeholder="手机" autocomplete="off"
                   class="layui-input" value="<?php echo $userphone; ?>">
        </div>
        <div class="layui-input-inline">
        	<label class="layui-form-label ">原始密码：</label>
            <input type="password" name="old_password" lay-verify="required" placeholder="原始密码" autocomplete="off"
                   class="layui-input">
        </div>
        <div class="layui-input-inline">
        	<label class="layui-form-label ">新的密码：</label>
            <input type="password" name="password" lay-verify="required" placeholder="新密码" autocomplete="off"
                   class="layui-input">
        </div>
        <div class="layui-input-inline">
        	<label class="layui-form-label ">密码确认：</label>
            <input type="password" name="confim_password" lay-verify="required" placeholder="确认密码" autocomplete="off"
                   class="layui-input">
        </div>
        <div class="layui-input-inline captcha">
        	<image id="captcha" src="./php/captcha.php" onclick="update_captcah()">
            <input type="text" name="code" required lay-verify="required" placeholder="验证码" autocomplete="off"
                   class="layui-input captcha" style="width:50%;float:left">
        </div>
        <div class="layui-input-inline login-btn">
            <button lay-submit lay-filter="login" class="layui-btn">提交</button>
        </div>
        <hr/>
    </form>
</div>
 
 
<script src="./public/layui/layui.js"></script>
<script type="text/javascript" src="./public/js/jquery.js"></script>
<script type="text/javascript">
	function update_captcah(){
		document.getElementById('captcha').src="./php/captcha.php?";
	}
	var error = "<?php echo $_GET['error']?$_GET['error']:null; ?>";
	if(error){
		$('.layui-elip').after('<div class="error">'+error+'</div>');
		// alert(error);
	}

	var success = "<?php echo $_GET['success']?$_GET['success']:null; ?>";
	if(success){
		$('.layui-elip').after('<div class="success">'+success+'</div>');
		// alert(error);
	}
</script>
</body>
</html>

