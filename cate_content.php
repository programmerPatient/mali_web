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
	$cate = $mysql->fetch_all("SELECT * FROM cate WHERE status = 1");
	$username = $_SESSION['username'];
	$cate_id = $_GET['cate_id'];
	$now_cate = $mysql->fetch_all("SELECT * FROM cate WHERE id=".$cate_id);
	$cate_content['cate_name'] = $now_cate['name'];
	$cate_content['article_list'] = $mysql->fetch_all("SELECT * FROM article WHERE  status=1 AND cate_id=".$cate_id." ORDER BY sort asc");
}
?>

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
	<title>分类列表页</title>
	<link rel="stylesheet" type="text/css" href="./public/css/index.css">
	<style type="text/css">
		body{			
		        font-size:12px;
		        font-family:"Arial, Helvetica, sans-serif";
		        background-image:url('./public/image/died.jpg');
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
			width:100%;
			left:0;
			/*margin:上下 左右*/
			margin:0px auto;
		}

			
		#Logo ul{
			padding: 0;
			margin:0;
		}

		
			
		.body{
			background-color: rgba(255, 255, 255, 0.5);
			width:1300px;
			min-height:auto;
			margin: 45px auto;
		    /*position: absolute;*/
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

		.content_li_right:hover{
			color:#4375b3;
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
			color:black;

		}

		.content_li img{
			width:450px;
			height:350px;
			/*opacity: 0.9;*/
			/*object-fit:cover;*/
			text-align: center;
			box-shadow: 10px 10px 8px #656262;

		}
			
	</style>
</head>
<body>
	<?php require './top.php'; ?>
	<div class="body">
		<?php if(!empty($cate_content['article_list'])){?>
		<?php for($i=0;$i<count($cate_content['article_list']);$i++){ ?>
	 	<div class="content_li">
	 		<a href="./article.php?article_id=<?php echo $cate_content['article_list'][$i]['id']; ?>">
		 		<div class="<?php if($i%2==0){?>content_li_left<?}else{?>content_li_right<?}?>">
		 			<img src="<?php echo $cate_content['article_list'][$i]['img_src']; ?>">
		 		</div>
		 		<div class="content_li_right">
		 			<?php echo $cate_content['article_list'][$i]['title']; ?>
		 		</div>
	 		</a>
	 	</div>
	 	<?php }?>
	 	<?php }?>
	</div>

</body>
</html>