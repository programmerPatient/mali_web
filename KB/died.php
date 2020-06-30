<?php
session_start();
if(!$_SESSION['username']){
	header('location:../login.php?error=请登录！');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>科比去世</title>
	<style type="text/css">
		body{			
		        font-size:12px;
		        font-family:"Arial, Helvetica, sans-serif";
		        background-image:url('../image/died.jpg');
		        background-repeat:repeat-x;
		        background-attachment:fixed; 
	    		overflow-x: hidden;
				overflow-y: scroll;
		        /*background-repeat: no-repeat;   */
	    		/*background-size: 100% 100%;     */
	    	}
	    body::-webkit-scrollbar {
			    display: none;
			}
			
	    #Logo{
	    		background-color: rgba(156, 156, 156,0.8);
				color:white;/* #fff */
				width:100%;
				z-index: 100;
				position: fixed;
				height:45px;
				left:0;
				top:0;
				/*margin:上下 左右*/
				margin:0px auto;
				border-radius:10px;
				font-family:"apple-system","BlinkMacSystemFont","Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
				/*background-color: rgba(84, 89, 93,0.5);*/
				/*box-shadow:1px 1px 33px #fff;/*设计阴影的*/*/
			}

			
			#Logo ul{
				padding: 0;
				margin:0;
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
			.body{
				background-color: rgba(86, 89, 101, 0.3);
				width:1300px;
				min-height:2000px;
				margin: 80px auto;
			    position: absolute;
			    top: 0;
			    left: 0;
			    right: 0;
			    bottom: 0;
			    /*overflow-y:hidden;*/
			    text-align: center;
			}
	/*
			.body::-webkit-scrollbar {
			    display: none;
			}*/

			.content_li{
				width:1100px;
				height:400px;
				margin:30px 100px;
				padding-top:45px;
				/*background-color: rgba(177, 175, 179, 0.3);*/
			}

			.content_li_left{
				width:450px;
				height:350px;
				margin:0px 50px;
				float:left;
			}

			.content_li_right{
				width:450px;
				height:350px;
				margin:0px 50px;
				/*background-color: red;*/
				/*font-famile:ncursive|fantasy|monospace|serif|sans-serif;*/
				/*letter-spacing :3px;*/
				float:right;
				align-items: center; /*定义div1的元素垂直居中*/
				display: flex;/*设置为弹性容器*/
				font-size: 20px;
				color:white;

			}

			.content_li_left img{
				width:450px;
				height:350px;
				/*opacity: 0.9;*/
				/*object-fit:cover;*/
				text-align: center;

			}
			
	</style>
</head>
<body>
	<div id="Logo">
		<ul>
			<li class="last" style="border:none;float:left"> 
				<a href="../index.php">首页</a> 
			</li>
			<li class="last" style="border:none;float:left"> 
				<a href="./died.php">科比去世</a>
			</li>
			<li class="last" style="border:none;float:left"> 
				<a href="./honor.php">科比荣誉</a>
			</li>
			<li class="last" style="border:none;float:right"> 
				<a href="../php/logout.php">退出登录</a>
			</li>
			<li class="last" style="border:none;float:right"> 
				<a href="../php/cancel.php">注销账号</a>
			</li>
			<li class="last" style="border:none;float:right"> 
				<a href="../mine.php">个人信息</a>
			</li>
		</ul>
	</div>
	<div class="body">
	 	<div class="content_li">
	 		<div class="content_li_left">
	 			<img src="../image/died0.jpg">
	 		</div>
	 		<div class="content_li_right">
	 			<p>2020年06月28日，邓伦在最新一期的极限挑战中朗读偶像科比的退役信《亲爱的篮球》邓伦年少就喜欢科比，他说一路走来，科比的曼巴精神给他很大的力量，曼巴精神一直就好像在抻着他往前走。邓伦脚踝处文身24也代表着科比，科比意外离开时邓伦说：一直想着努力，能见到你，当面和你说声谢谢......是你给我的力量 因为你我放飞梦想去拥抱彩虹 MambaOut</p>
	 		</div>
	 	</div>
	 	<div class="content_li">
	 		<div class="content_li_left">
	 			<img src="../image/died3.jpeg">
	 		</div>
	 		<div class="content_li_right">
	 			<p>科比去世16天后, 瓦妮莎再发长文: 人生常态是无常! 唯有坚强。瓦妮莎在社交平台上写道：“我始终不愿意用语言来表达自己的感情。我的大脑拒绝接受科比和Gigi都已离世的现实，我不能同时处理这两件事，这就像是我尝试处理科比的离世，但我的身体拒绝接受我的Gigi永远无法回到我身边的现实。这种感觉糟透了。为什么我能每天醒来，但我的宝贝女儿却再也醒不来了？!我太生气了。她还有那么多的人生没有经历。”</p>
	 		</div>
	 	</div>
	 	<div class="content_li">
	 		<div class="content_li_left">
	 			<img src="../image/died4.jpg">
	 		</div>
	 		<div class="content_li_right">
	 			<p>岁月如风，带走了青春的芳华；记忆如海，留下了满满的感动。青春里的那个少年，一次次的突破暴扣，一次次的后仰跳投，一次次的致命绝杀，还有最后那一句句的“曼巴精神，这可能是那些年我们热爱篮球的理由吧，那些年我们曾痴迷的收集着球星海报，那些年我们曾无比的期待过体育课，那些年我们无悔的爱着科比，谢谢你，那个日日向清晨4点的洛杉矶问好的人，那个让我相信努力的少年，那个继乔丹之后NBA最耀眼的巨星，那个洛杉矶湖人队永远的中流砥柱……却从此不在人世。当清晨醒来的时候，打开手机，满屏全是你离去的消息，让我极度震惊，我不敢相信，也不愿相信这是事实。</p>
	 		</div>
	 	</div>
	 	<div class="content_li">
	 		<div class="content_li_left">
	 			<img src="../image/died5.png">
	 		</div>
	 		<div class="content_li_right">
	 			<p>北京时间2020年01月27日凌晨4时，一条让人震惊的消息传来：前NBA巨星科比·布莱恩特所搭乘的直升飞机在美国加州卡拉巴萨斯遭遇坠机事故，机上5名成员全部遇难，事故原因还在调查中。当消息传来，人们的第一反应是不敢相信，无法接受，期盼是假消息。网上球迷的留言基本是：“真假？”“不会吧？”“除了震惊还是震惊？”“太突然了吧？”“希望不是真的。”遗憾的是，多家媒体进行了确认，消息属实。</p>
	 		</div>
	 	</div>
	</div>

</body>
</html>