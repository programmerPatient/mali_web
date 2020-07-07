<?php
require '../databases/mysql.php';
require '../config/mysql_config.php';
session_start();
/**
 * 建立mysql链接
 */
$mysql = Mysql::getInstance(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,'',DB_CHARSET);
if(!$_SESSION['adminname']){
    header('location:./login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>分类添加页面</title>
    <link rel="stylesheet" type="text/css" href="../public/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="../public/css/admin.css" />
    <script type="text/javascript" src="../public/layui/layui.js"></script>
</head>
<body>
    <?php require './default.php';?>
    <div class="main" style="padding:10px;">
        <div class="content">
            <span>分类添加</span>
            <div></div>
        </div>
        <form class="layui-form" method="post" action="./php/cate_add.php" style="margin-top:50px;padding:0px 50px;" >
            <div class="layui-form-item">
                <label class="layui-form-label">分类名称</label>
                <div class="layui-input-block">
                    <input type="text" name="name" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">排序</label>
                <div class="layui-input-inline">
                    <input type="text" name="sort" required lay-verify="required" placeholder="请输入排序" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">分类状态</label>
                <div class="layui-input-block">
                    <input type="radio" name="status" value="1" title="开启" checked>
                    <input type="radio" name="status" value="0" title="关闭">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                </div>
            </div>
		</form>
    </div>
</body>
</html>
<script>
    var error = "<?php echo $_GET['error']?$_GET['error']:null; ?>";
    if(error){
        alert(error);
    }

    layui.use('layedit', function(){
      var layedit = layui.layedit;
      layedit.build('demo'); //建立编辑器
    });

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
</script>