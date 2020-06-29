<?php 
session_start();
header("Content-Type:text/html;charset=UTF-8");  
if($_SESSION['username']){
	header('location:./index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>注册页面</title>
</head>

<style type="text/css">

    body{

        font-size:12px;
        font-family:"Arial, Helvetica, sans-serif";
        background-image:url('./image/register.jpg');
        background-repeat:repeat-x;
    }
    a{
    	color: #3fc594;
    }
    a:hover{
    	color: blue;
    }

    .error{
    	color:red;
    	margin:0;
    	padding:0;
    	font-size: 15px;
    }


</style>
<body>
	<div class="login" style="
		text-align: center; /*让div内部文字居中*/
	    background-color: #fff;
	    border-radius: 20px;
	    width: 300px;
	    height: 450px;
	    margin: auto;
	    position: absolute;
	    top: 0;
	    left: 0;
	    right: 0;
	    bottom: 0;
	    font-size: 20px;
	    background-color:rgba(145, 160, 171, 0.3);
	    color:#f3eded;">
		<div class="title" >
			<p style='margin-bottom:0px'>注册</p>
		</div>
		<form id="form" action="./php/register.php" method="POST">
			<p>输入姓名：<input style="background-color:transparent;height: 29px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;" type="text" name="name"></p>
			<p>输入电话：<input style="background-color:transparent;height: 29px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;" type="text" name="phone"></p>
			<p>输入账号：<input style="background-color:transparent;height: 29px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;" type="text" name="account"></p>
			<p>输入密码：<input style="background-color:transparent;height: 29px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;" type="text" name="password"></p>
			<p>确认密码：<input style="background-color:transparent;height: 29px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;" type="text" name="confim_password"></p>
			<p style="margin:0">验证码：<input style="width:80px;background-color:transparent;height: 29px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;" type="" name="code"><image id="captcha" style="float:right;width:60px;height:40px;margin-right:10px" src="./php/captcha.php" onclick="update_captcah()"></p>
			<input style="margin-top: 10px;width:80px;height: 30px;float:left;margin-left: 35px;margin-right: 45px" id="save-btn" type="submit" value="提交"/>
		</form>
		
		<p style="font-size: 15px">有账号？<a style="text-decoration: none" href="login.php">登录</a></p>
	</div>
</body>
</html>
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript">

	var error = "<?php echo $_GET['error']?$_GET['error']:null; ?>";
	if(error){
		$('.title').append('<p class="error">错误信息：'+error+'</p>');
		// alert(error);
	}


	function update_captcah(){
		document.getElementById('captcha').src="./php/captcha.php";
	}
</script>	