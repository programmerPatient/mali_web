<?php 
$menu = $mysql->fetch_all("SELECT * FROM menu WHERE fid = 0");
foreach ($menu as $key => &$value) {
    $value['lists'] = $mysql->fetch_all("SELECT * FROM menu WHERE fid = "."'".$value['id']."'");
}
?>
<div class="header">
    <a style="color:white;" href="./index.php"><span class="title"><span style="font-size: 20px;"><?php echo $_SESSION['adminname']; ?></span>--后台管理系统</span></a>
    <span class="userinfo">【<?php echo $_SESSION['adminaccount']; ?>】<span><a href="./php/logout.php">退出</a></span></span>
</div>
<div class="menu" id="menu">
    <div class="layui-collapse" lay-accordion>
        <?php if(!empty($menu)){?>
    	<?php for($i =0;$i<count($menu);$i++) {?>
        <div class="layui-colla-item">
            <h2 class="layui-colla-title"><?php echo $menu[$i]['title']; ?></h2>
            <div class="layui-colla-content layui-show">
                <ul class="layui-nav layui-nav-tree" lay-filter="test">
                	<?php foreach($menu[$i]['lists'] as $val) {?>
                    	<li class="layui-nav-item"><a href="<?php echo $val['href']; ?>"><?php echo $val['title']; ?></a></li>
                    <?php }?>
                </ul>
            </div>
        </div>
        <?php }?>
        <?php }?>
    </div>
</div>