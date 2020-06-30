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
	<title>科比荣誉</title>
	<style type="text/css">
		body{			
		        font-size:12px;
		        font-family:"Arial, Helvetica, sans-serif";
		        background-image:url('../image/honor5.jpg');
		        background-repeat:repeat-x;
		         background-attachment:fixed; 
		        overflow-x: hidden;
				overflow-y: scroll;
	    	}

	    body::-webkit-scrollbar {
			    display: none;
			}

	    #Logo{
	    		background-color: rgba(156, 156, 156,0.8);
				color:white;/* #fff */
				width:100%;
				z-index: 100;
				top:0;
				left:0;
				position: fixed;
				height:45px;
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
				min-height:2500px;
				margin: 80px auto;
			    position: absolute;
			    top: 0;
			    left: 0;
			    right: 0;
			    bottom: 0;

			    text-align: center;
			}

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
				/*overflow: hidden;*/
				/*text-overflow: ellipsis;*/
	    /*text-overflow: -o-ellipsis-lastline;*/

			}

			.content_li_left img{
				width:450px;
				height:350px;
				/*opacity: 0.9;*/
				/*object-fit:cover;*/
				text-align: center;
				-webkit-filter: grayscale(1); /* Webkit */
		         filter: gray; /* IE6-9 */  
		         filter: grayscale(1); /* W3C */

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
	 			<img src="../image/honor.jpg">
	 		</div>
	 		<div class="content_li_right">
	 			<p>湖人三连冠时期，科比数据：第一冠99-00，幼科场均22.5分6.3板4.9助攻。第二冠00-01，科比坐稳二当家，常规赛场均28.5分5.9篮板5.0助攻，季后赛场均29.4分7.3篮板和6.1助攻，总决赛24.6分7.8板5.8助攻1.4抢断1.4盖帽，妥妥的二当家。亮眼点：西决抢七，奥尼尔被开拓者合围，科比末节15分完成逆转，湖人进入总决赛；总决赛第四场，奥尼尔被罚出场，科比把比赛拖入加时并最终绝杀。第三冠01-02，湖人双核夺冠。2001年西部决赛对马刺，科比场均33.3分7.0篮板7.0助攻1.5抢断，整个季后赛科比29.4分7.3篮板6.1助攻1.6抢断。</p>
	 		</div>
	 	</div>
	 	<div class="content_li">
	 		<div class="content_li_left">
	 			<img src="../image/honor1.jpg">
	 		</div>
	 		<div class="content_li_right">
	 			<p>将时光拨回2006年1月23日，科比在对猛龙的比赛中得到81分，震撼了整个NBA，乃至整个世界，这是NBA历史上单场得分第二高的记录，仅次于上古巨兽张伯伦的100分。科比上场42分钟，46投28中(13投7中)，20罚18中。科比的81分中有55分是在下半场得到的，湖人在第三节落后18分，促使科比爆发，这足以见得科比恐怖的得分能力。</p>
	 		</div>
	 	</div>
	 	<div class="content_li">
	 		<div class="content_li_left">
	 			<img src="../image/honor2.jpg">
	 		</div>
	 		<div class="content_li_right">
	 			<p>2009年总决赛科比场均贡献32.4分5.6篮板还du有场均7.4次助攻。2010年总决赛科比场均贡献28.6分8篮板4助攻2.1抢断，数据对比最近几年的数据看起来没那么可怕，但是其实这个数据难度巨大，先不断面对的是肉搏战绞肉机式的防守，当时也不像现在的打法2010年总决赛，湖人七场平均得分90分，科比28.6分，占了百分之31.7的得分，而2018年总决赛勇士的平均得分是116分，2017年决赛勇士场均得分121分，时代不同，数据的提现不同,科比遇上了联盟平均得分最低的年代！</p>
	 		</div>
	 	</div>
	 	<div class="content_li">
	 		<div class="content_li_left">
	 			<img src="../image/honor3.jpg">
	 		</div>
	 		<div class="content_li_right">
	 			<p>2016年4月14日，洛杉矶，完成了对阵爵士后，科比-布莱恩特退役了。科比在NBA生涯最后一场比赛中出手50次狂劈60分，成为NBA历史单场60+年纪最大的球员，打破NBA球员退#重制未来#役战得分纪录。38岁的科比用最华丽的动作和比分，为个人职业生涯和东家合作划上了完美的句号。正如他在赛后的演讲所说：20年来，人们都在批评他不爱传球；而那晚，所有人都希望他不要传球。</p>
	 		</div>
	 	</div>

	 	<div class="content_li">
	 		<div class="content_li_left">
	 			<img src="../image/honor4.jpg">
	 		</div>
	 		<div class="content_li_right">
	 			<p>一代传奇球星猝然陨落。据美国媒体消息，当地时间1月26日，NBA名宿科比·布莱恩特在美国加利福尼亚州洛杉矶县卡拉巴萨斯的一场直升机坠机事故中遇难，年仅41岁，他13岁的女儿gigi也在事故中遇难。噩耗传来，举世震惊，这是一个寄托了无数人青春记忆与追梦历程的篮球偶像。科比那标志性的后仰跳投、华丽转身、犀利突破，曾经成为多少年轻人的模仿对象。他的职业生涯充满了拼搏与汗水、坚毅与决绝、质疑与证明、鲜花与掌声，他的名字不仅誉满篮坛，更外溢出一种超越篮球的知名度和影响力，这不仅是由于他职业生涯中光辉璀璨的赫赫战绩，更是因为他不懈拼搏、自律自强、永不服输的坚毅精神。</p>
	 		</div>
	 	</div>
	</div>

</body>
</html>