<?php
session_start();
if($_SESSION['adminname']){
    header('location:./index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
 
    <title>登录页</title>
    <link rel="stylesheet" href="../public/layui/css/layui.css">
    <link rel="stylesheet" href="../public/css/style.css">
 	<style type="text/css">
 		body{
 			background-image: url('../public/image/honor5.jpg')
 		}
 		.login-main{
 			margin-top:250px;
 			width:400px;
 			height:260px;
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
 	</style>
</head>
<body>
 
<div class="login-main">
    <header class="layui-elip">登录</header>
    <form class="layui-form" action="./php/login.php" method="POST">
        <div class="layui-input-inline">
            <input type="text" name="account" required lay-verify="required" placeholder="用户名" autocomplete="off"
                   class="layui-input">
        </div>
        <div class="layui-input-inline">
            <input type="password" name="password" required lay-verify="required" placeholder="密码" autocomplete="off"
                   class="layui-input">
        </div>
        <div class="layui-input-inline captcha">
        	<image id="captcha" src="../php/captcha.php" onclick="update_captcah()">
            <input type="text" name="code" required lay-verify="required" placeholder="验证码" autocomplete="off"
                   class="layui-input captcha" style="width:50%;float:left">
        </div>
        <div class="layui-input-inline login-btn">
            <button lay-submit lay-filter="login" class="layui-btn">登录</button>
        </div>
        <hr/>
    </form>
</div>
 
 
<script src="../public/layui/layui.js"></script>
<script type="text/javascript" src="../public/js/jquery.js"></script>
<script type="text/javascript">
	function update_captcah(){
		document.getElementById('captcha').src="../php/captcha.php?";
	}

    var error = "<?php echo $_GET['error']?$_GET['error']:null; ?>";
    if(error){
        $('.layui-elip').after('<div class="error">'+error+'</div>');
    }
</script>
</body>
</html>