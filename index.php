<?php
session_start();
if(!$_SESSION['username']){
	header('location:./login.php');
}else{
	$username = $_SESSION['username'];	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>首页</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
				color:white;		
		        font-size:12px;
		        font-family:"Arial, Helvetica, sans-serif";
		        background:url('./image/index.jpg'),url("./image/honor5.jpg"),url("./image/login.jpg"),("./image/mine.jpg");
		        /*background-size: 100%;*/
		        /*background-repeat:repeat-x;*/
		        animation-name:myfirst;
			    animation-duration:30s;
			    /*变换时间*/
			    animation-delay:0s;
			    /*动画开始时间*/
			    animation-iteration-count:infinite;
			    /*下一周期循环播放*/
			    animation-play-state:running;
			    /*动画开始运行*/
			    animation-timing-function:linear;
			}

			@keyframes myfirst
			{
			    0%   {background:url("./image/index.jpg");}
			    50%  {background:url("./image/honor5.jpg");}
			    100% {background:url("./image/index.jpg");}

			}
			
			#Logo{
				width:100%;
				z-index: 100;
				position: fixed;
				height:45px;
				/*margin:上下 左右*/
				margin:0px auto;
				border-radius:10px;
				background-color: rgba(156, 156, 156,0.8);
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
				font-size:18px;
				font-family:"微软雅黑";
				text-align:center;
				line-height:45px;/* 行高跟 高度一致时，竖直居中*/
				border-right:1px solid #000;/*右边框*/
			}
			
			#Logo ul li a
			{
				color:white;
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
	</style>
</head>
<body>
	<div id="Logo">
		<ul>
			<li class="last" style="border:none;float:left"> 
				<a href="./index.php">首页</a>
			</li>
			<li class="last" style="border:none;float:left"> 
				<a href="./KB/died.php">科比去世</a>
			</li>
			<li class="last" style="border:none;float:left"> 
				<a href="./KB/honor.php">科比荣誉</a>
			</li>
			<li class="last" style="border:none;float:right"> 
				<a href="./php/logout.php">退出登录</a>
			</li>
			<li class="last" style="border:none;float:right"> 
				<a href="./php/cancel.php">注销账号</a>
			</li>
			<li class="last" style="border:none;float:right"> 
				<a href="./mine.php">个人信息</a>
			</li>
		</ul>
	</div>


	<div class="login" style="
		text-align: center; /*让div内部文字居中*/
	    border-radius: 20px;
	    height: 80px;
	    width:500px;
	    background-color: rgba(12,12,12,0.8);
	    margin: auto;
	    position: absolute;
	    top: 0;
	    left: 0;
	    right: 0;
	    bottom: 0;
	    font-size: 25px;">
	    <p style="font-size: 50px;color:white;">
	    欢迎<?php echo $username?>的光临！</p>
	    
	</div>
</body>
</html>
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript">


	var error = "<?php echo $_GET['error']?$_GET['error']:null; ?>";
	if(error){
		// $('.title').append('<p class="error">错误信息：'+error+'</p>');
		alert(error);
	}
</script>	