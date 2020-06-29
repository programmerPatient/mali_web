
<?php 
session_start();
if($_SESSION['username']){
	header('location:./index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>登录页面</title>
</head>

<style type="text/css">

    body{

        font-size:12px;
        font-family:"Arial, Helvetica, sans-serif";
        background-image:url('./image/login.jpg');
        background-repeat:repeat-x;
    }
    a:hover{
    	color: green;
    }

    .error{
    	color:red;
    	font-size: 15px;
    }


</style>
<body>
	<div class="login" style="
		text-align: center; /*让div内部文字居中*/
	    background-color: #fff;
	    border-radius: 20px;
	    width: 300px;
	    height: 350px;
	    margin: auto;
	    position: absolute;
	    top: 0;
	    left: 0;
	    right: 0;
	    bottom: 0;
	    font-size: 25px;
	    background-color:rgba(200,200,200,0.7);
	    color:#000000;">
		<div class="title" >
			<p style='margin-bottom:0px'>登录</p>
		</div>
		<form action="./php/login.php" method="POST">
			<p>账号：<input style="background-color:transparent;height: 29px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;" type="" name="account"></p>
			<p>密码：<input style="background-color:transparent;height: 29px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;" type="" name="password"></p>
			
			<p style="margin:0">验证码：<input style="width:80px;background-color:transparent;height: 29px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;" type="" name="code"><image id="captcha" style="float:right;width:60px;height:40px;margin-right:10px" src="./php/captcha.php" onclick="update_captcah()"></p>
			<input style="margin-top: 10px;width:80px;height: 30px;float:left;margin-left: 35px;margin-right: 45px" id="save-btn" type="submit" value="登录"/>
		</form>
		<p style="font-size: 15px">没有账号？<a style="text-decoration: none" href="register.php">注册</a></p>
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
		document.getElementById('captcha').src="./php/captcha.php?";
	}

	// //获取url上的指定参数
	// function getQueryString(name) {
	//     var result = window.location.search.match(new RegExp("[\?\&]" + name + "=([^\&]+)", "i"));
	//     if (result == null || result.length < 1) {
	//         return "";
	//     }
	//     return result[1]; 
	// }

	// function init(){
	// 	var error = getQueryString('error');
	// 	if(error) alert(error);
	// }
</script>	