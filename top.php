<?php 
if(!$_SESSION['username']){
	header('location:./login.php');
}else{
	$cate = $mysql->fetch_all("SELECT * FROM cate WHERE status = 1 ORDER BY sort asc limit 6");
}
?>
<div id="Logo">
	<ul>
		<li class="last" style="border:none;float:left"> 
			<a href="./index.php">首页</a>
		</li>
		<?php if(!empty($cate)){?>
		<?php for($i=0;$i<count($cate);$i++){?>
		<li class="last" style="border:none;float:left"> 
			<a href="./cate_content.php?cate_id=<?php echo $cate[$i]['id']; ?>"><?php echo $cate[$i]['name']; ?></a>
		</li>
		<?php }?>
		<?php }?>
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