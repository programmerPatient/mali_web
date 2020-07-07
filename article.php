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
	$article_id = $_GET['article_id'];
	$article = $mysql->fetch_one("SELECT * FROM article WHERE id=".$article_id);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>文章内容页</title>
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

		*{ 
			margin:0;padding:0;  
		}
	 
		body{	
			color:white;		
	        font-size:12px;
	        font-family:"Arial, Helvetica, sans-serif";
	        background:url("./public/image/honor5.jpg");
	         background-attachment:fixed; 
		}
		
		.content{
			text-align: center; /*让div内部文字居中*/
		    width:1500px;
		    min-height:800px;
		    padding:50px 50px;
		    color:black;
		    background-color: rgba(255,255,255,0.9);
		    margin:auto;
		    margin-top:50px;
		    top: 0;
		    left: 0;
		    right: 0;
		    bottom: 0;
		    font-size: 20px;
		}
		.content p{
			 text-align:justify;
		     letter-spacing: 2px;
		}
	</style>
</head>
<body>
	<?php require './top.php'; ?>


	<div class="content">
		<?php if(!empty($article)){?>
	    <h1><?php echo $article['title']; ?></h1>
	    	<img src="<?php echo '.'.$article['img_src']; ?>" style="float:left;margin: 30px 0;width:100%;height:400px;">
	    	<?php echo $article['content']; ?>
	    <?php }?>
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