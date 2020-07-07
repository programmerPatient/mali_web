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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>首页</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./public/css/index.css">
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
		        background:url('./public/image/index.jpg'),url("./public/image/honor5.jpg");
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
			    0%   {background:url("./public/image/index.jpg");}
			    50%  {background:url("./public/image/honor5.jpg");}
			    100% {background:url("./public/image/index.jpg");}

			}
			
			#Logo{
				width:100%;
				margin:0px auto;
			}
	</style>
</head>
<body>
	<?php require './top.php'; ?>


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
<script type="text/javascript" src="./public/js/jquery.js"></script>
<script type="text/javascript">


	var error = "<?php echo $_GET['error']?$_GET['error']:null; ?>";
	if(error){
		alert(error);
	}
</script>	