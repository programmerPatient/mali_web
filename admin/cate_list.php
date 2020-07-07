<?php
require '../databases/mysql.php';
require '../config/mysql_config.php';
session_start();
/**
 * 建立mysql链接
 */
$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);

$result = $mysql->fetch_one("SELECT * FROM admin");
if(!$result){
    header('location:./init_admin.php');
}else{
    if(!$_SESSION['adminname']){
        header('location:./login.php');
    }else{
        $cate = $mysql->fetch_all("SELECT * FROM cate ORDER BY sort asc");
    }
    

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="../public/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="../public/css/admin.css" />
    <script type="text/javascript" src="../public/layui/layui.js"></script>
</head>
<body>
    <?php require './default.php';?>
    <div class="main" style="padding:10px;">
        <div class="content">
            <span>分类列表</span>
            <!-- <button class="layui-btn layui-btn-xs" onclick="add()">编辑</button> -->
            <div></div>
        </div>
        <table class="layui-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>分类名称</th>
                    <th>排序</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($cate)){?>
            	<?php for($i=0;$i<count($cate);$i++) {?>
                <tr>
                    <td><?php echo $cate[$i]['id']; ?></td>
                    <td><?php echo $cate[$i]['name']; ?></td>
                    <td><?php echo $cate[$i]['sort']; ?></td>
                    <?php if($cate[$i]['status'] == 0){ ?>
                    	<td>关闭</td>
                    <?php }?>
                    <?php if($cate[$i]['status'] == 1){ ?>
                        <td>开启</td>
                    <?php }?>
                    <td>
                        <a class="layui-btn layui-btn-xs" href="./cate_edit.php?cate_id=<?php echo $cate[$i]['id']; ?>">编辑</a>
                        <button class="layui-btn layui-btn-xs" onclick="del(<?php echo $cate[$i]['id']; ?>)">删除</button>
                    </td>
                </tr>
                <?php } ?>
                <?php }?>
            </tbody>
        </table>
		<div>
			<!-- {$right|raw} -->
		</div>
    </div>
</body>
</html>
<script>

    var error = "<?php echo $_GET['error']?$_GET['error']:null; ?>";
    if(error){
        alert(error);
    }


    var success = "<?php echo $_GET['success']?$_GET['success']:null; ?>";
    if(success){
        alert(success);
    }

    layui.use(['element','layer','laypage','layedit'], function(){
        var element = layui.element;
        var laypage = layui.laypage;
        $ = layui.jquery;
        layer = layui.layer;
        resetMenuHeight();
    });
    // 重新设置菜单容器高度
    function resetMenuHeight(){
        var height = document.documentElement.clientHeight - 50;
        $('#menu').height(height);
    }


    function del(id){
        $.post('./php/cate_delete.php',{cate_id:id},function(res){
            if(res.code>0){
                layer.alert(res.msg,{icon:2});
            }else{
                layer.msg(res.msg);
                setTimeout(function(){parent.window.location.reload();},1000);
            }
        },'json');
    }
</script>