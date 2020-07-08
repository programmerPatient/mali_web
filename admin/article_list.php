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
    }
    $all_article = $mysql->fetch_all("SELECT * FROM article ORDER BY sort asc");
    $page = ceil(count($all_article)/18);//文章的页数
    
    if(empty($_GET['p'])){
        $p = 0;
    }else{
        $p = $_GET['p'];
    }
    $count = ($p >= ($page-1)) ? count($all_article)-($page-1)*18 : 18;
    $article = $mysql->fetch_all("SELECT * FROM article ORDER BY sort asc limit ".$p.",".$count);
    foreach ($article as  &$vals) {
        $vals['cate_name'] = $mysql->fetch_one("SELECT * FROM cate WHERE id = ".$vals['cate_id'])['name'];
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>文章列表页</title>
    <link rel="stylesheet" type="text/css" href="../public/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="../public/css/admin.css" />
    <script type="text/javascript" src="../public/layui/layui.js"></script>
</head>
<body>
    <?php require './default.php';?>
    <div class="main" style="padding:10px;">
        <div class="content">
            <span>文章列表</span>
            <!-- <button class="layui-btn layui-btn-xs" onclick="add()">编辑</button> -->
            <div></div>
        </div>
        <table class="layui-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>标题</th>
                    <th>分类名称</th>
                    <th>排序</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($article)){?>
            	<?php for($j=0;$j<count($article);$j++) {?>
                <tr>
                    <td><?php echo $article[$j]['id']; ?></td>
                    <td><?php echo $article[$j]['title']; ?></td>
                    <td><?php echo $article[$j]['cate_name']; ?></td>
                    <td><?php echo $article[$j]['sort']; ?></td>
                    <?php if($article[$j]['status'] == 0){ ?>
                    	<td>关闭</td>
                    <?php }?>
                    <?php if($article[$j]['status'] == 1){ ?>
                        <td>开启</td>
                    <?php }?>
                    <td>
                        <a href="./article_edit.php?article_id=<?php echo $article[$j]['id']; ?>" class="layui-btn layui-btn-xs">编辑</a>
                        <button class="layui-btn layui-btn-xs" onclick="del(<?php echo $article[$j]['id']; ?>)">删除</button>
                    </td>
                </tr>
                <?php } ?>
                <?php } ?>
            </tbody>
        </table>
        <?php if($p > 0) { ?>
        <div class="layui-box layui-laypage layui-laypage-default">
            <a style="background-color:#009688; color:white;" href="./article_list.php?p=<?php echo $p-1; ?>">
                <
            </a>
        </div>
        <?php } ?>
        <?php if(!empty($page)) { ?>
        <?php for($i = 0; $i < $page; $i++) { ?>
         <div class="layui-box layui-laypage layui-laypage-default">
            <a href="./article_list.php?p=<?php echo $i; ?>" <?php if($i == $p) { ?> style="background-color:#d2d2d2;" <?php } ?>>
                <?php echo $i+1; ?>
            </a> 
        </div>
        <?php } ?>
        <?php } ?>
        <?php if($p < $page -1) { ?>
        <div class="layui-box layui-laypage layui-laypage-default">
            <a style="background-color:#009688; color:white;" href="./article_list.php?p=<?php echo $p+1; ?>">
                >
            </a>
        </div>
        <?php } ?>
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
        layer.confirm('您确定要删除吗？', {
            btn: ['Yes','No'] //按钮
        }, function(){
            $.post('./php/article_delete.php',{article_id:id},function(res){
                if(res.code>0){
                    layer.alert(res.msg,{icon:2});
                }else{
                    layer.msg(res.msg);
                    setTimeout(function(){parent.window.location.reload();},1000);
                }
            },'json');
        }, function(){
            // 事务回调
        });
    }
</script>