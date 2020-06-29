<?php
session_start();
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
	<meta charset="utf-8">
	<title>首页</title>
</head>
<style type="text/css">
	li{
		list-style-type:none;
	}

	.top{
		height:20px;
		background-color: rgba(12,255,35,0.5);
		margin:0; 	
	}

	*{ margin:0;padding:0; }
 
		body{			
	        font-size:12px;
	        font-family:"Arial, Helvetica, sans-serif";
	        background-image:url('../image/login.jpg');
	        background-repeat:repeat-x;
		}
		
		#Logo{
			background-color: rgba(156, 156, 156,0.8);
			color:white;/* #fff */
			width:100%;
			z-index: 100;
			position: fixed;
			height:45px;
			/*margin:上下 左右*/
			margin:0px auto;
			border-radius:10px;
			font-family:"apple-system","BlinkMacSystemFont","Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
			/*background-color: rgba(84, 89, 93,0.5);*/
			/*box-shadow:1px 1px 33px #fff;/*设计阴影的*/*/
		}
		#Logo ul li
		{
			width:150px;
			 height:45px;
			list-style:none;/*去掉圆点*/
			float:left;/*水平显示*/
			color:black;/* #fff */
			font-size:18px;
			font-family:"微软雅黑";
			text-align:center;
			line-height:45px;/* 行高跟 高度一致时，竖直居中*/
			border-right:1px solid #000;/*右边框*/
		}
		
		#Logo ul li a
		{
			color:black;/* #fff */
			font-size:18px;
			font-family:"微软雅黑";
			text-decoration:none;
		}
		
		#Logo ul li:hover
		{
			background:rgba(10,5,5,0.45);
		}
		
		#Logo ul li.first:hover
		{
			border-radius:10px 0px 0px 10px;/*左上 左下 圆弧显示 */
		}
		
		#Logo ul li.last:hover
		{
			border-radius:0px 10px 10px 0px;/*右上 右下 圆弧显示 */
		}
 
		#Logo ul li ul li 
		{
			border:none;
			border-top:1px solid #989898;
			background:rgba(10,5,5,0.45);/*颜色透明度 */
			border-radius:10px;
			
		}
 
		#Logo ul li ul
		{
			display:none;/*不显示*/
		}
		#Logo ul li ul li:hover
		{
			background:rgba(10,5,5,0.8);/*颜色透明度 */
			border-radius:10px;
		}
		
		#Logo ul li:hover ul
		{
			display:block;
			-webkit-animation:roll 1s ease;/*roll 旋转名称，1s旋转效果 */
		}
		
		@-webkit-keyframes roll /*roll旋转名称与上面一致*/
		{
			0% {-webkit-transform:rotate(0deg);}
			100% {-webkit-transform:rotate(360deg);}
		}
		.mine #form p{
			margin:15px 0;
			color:white;
		}

		.button{
			margin-top: 10px;width:200px;height: 60px;float:left;margin:10px 100px;  /* Green */
		    
		    background-color: gray; 
		    border: none;
		    color: black; 
		    padding: 16px 32px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		    -webkit-transition-duration: 0.4s; /* Safari */
		    transition-duration: 0.4s;
		    cursor: pointer;
		    border: 2px solid #4CAF50;
		}
		.button:hover{
			background-color: #4CAF50; /* Green */
		    color: white;
		}

		.error{
	    	color:red;
	    	font-size: 15px;
	    }
	    .success{
	    	color:green;
	    	font-size: 15px;
	    }

</style>
<body>
	<div id="Logo">
		<ul>
			<li class="last" style="border:none;float:left"> 
				<a href="../index.php">首页</a>
			</li>
			<li class="last" style="border:none;float:left"> 
				<a href="../KB/died.php">科比去世</a>
			</li>
			<li class="last" style="border:none;float:left"> 
				<a href="../KB/honor.php">科比荣誉</a>
			</li>
			<li class="last" style="border:none;float:right"> 
				<a href="../php/logout.php">退出登录</a>
			</li>
			<li class="last" style="border:none;float:right"> 
				<a href="../php/cancel.php">注销账号</a>
			</li>
			<li class="last" style="border:none;float:right"> 
				<a href="./mine.php">个人信息</a>
			</li>
		</ul>
	</div>

	<div class="mine" style="
		text-align: center; /*让div内部文字居中*/
	    background-color: #fff;
	    border-radius: 20px;
	    width: 400px;
	    height: 550px;
	    margin: auto;
	    position: absolute;
	    top: 0;
	    left: 0;
	    right: 0;
	    bottom: 0;
	    font-size: 20px;
	    background-color:rgba(0, 0, 0, 0.4);
	    color:white">
		<div class="title">
			<p style='margin-bottom:0px;margin-top:20px;'>个人信息</p>
		</div>
		<form id="form" action="../php/update_user.php" method="POST">
			<p>用户姓名：<input style="height: 35px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;color:black" type="text" name="name" value="<?php echo $username?>"></p>
			<p>用户电话：<input style="height: 35px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;color:black" type="text" name="phone" value="<?php echo $userphone?>"></p>
			<p>用户账号：<input disabled style="height: 35px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;color:white" type="text" name="account" value="<?php echo $useraccount?>"></p>
			<p>原始密码：<input style="height: 35px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;color:black" type="text" name="old_password"></p>
			<p>新的密码：<input style="height: 35px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;color:black" type="text" name="password"></p>
			<p>确认密码：<input style="height: 35px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;color:black" type="text" name="confim_password"></p>
			<p style="margin:0">验证码：<input style="width:80px;height: 29px; outline-style: none ;border: 1px solid #fff; border-radius: 3px;color:black" type="" name="code"><image id="captcha" style="float:right;width:80px;height:40px;margin-right:50px" src="./captcha.php" onclick="update_captcah()"></p>
			<input class="button"
			id="save-btn" type="submit" value="提交"/>
		</form>
	</div>
</body>
</html>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">

	var error = "<?php echo $_GET['error']?$_GET['error']:null; ?>";
	if(error){
		$('.title').append('<p class="error">错误信息：'+error+'</p>');
		// alert(error);
	}

	var success = "<?php echo $_GET['success']?$_GET['success']:null; ?>";
	if(success){
		$('.title').append('<p class="success">'+success+'</p>');
		// alert(error);
	}



	function update_captcah(){
		document.getElementById('captcha').src="./captcha.php";
	}
</script>	