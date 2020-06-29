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
	        background-image:url('./image/index.jpg');
	        background-repeat:repeat-x;
		}
		
		#Logo{
			/*width:895px;*/
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
			color:white;/* #fff */
			font-size:18px;
			font-family:"微软雅黑";
			text-align:center;
			line-height:45px;/* 行高跟 高度一致时，竖直居中*/
			border-right:1px solid #000;/*右边框*/
		}
		
		#Logo ul li a
		{
			color:white;/* #fff */
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
<body>
	<div id="Logo">
		<ul>
			<li class="last" style="border:none;float:right"> 
				<a href="./php/logout.php">退出登录<a>
			</li>
		</ul>
	</div>

	<div class="login" style="
		text-align: center; /*让div内部文字居中*/
	    border-radius: 20px;
	    height: 80px;
	    margin: auto;
	    position: absolute;
	    top: 0;
	    left: 0;
	    right: 0;
	    bottom: 0;
	    font-size: 25px;
	    color:#000000;">
	    <p style="font-size: 50px;color:white">
	    welcome
		<?php echo $username?></p>
	    
	</div>
</body>
</html>