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
        /*获取排序最大的8条文章放置首页*/
        $article = $mysql->fetch_all("SELECT * FROM article WHERE status=1 ORDER BY sort desc LIMIT 8");//
        
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
            <span>首页推荐</span>
            <div></div>
        </div>
		<div class="article" style="padding: 50px;">
            <?php if(!empty($article)){?>
            <?php for($i=0;$i<count($article);$i++){?>
            <div class="article_li" style="width:330px;height:300px;float:left;margin:35px 30px;box-shadow:10px 10px 5px #c3bdbd;">
                <a href="./article_edit.php?article_id=<?php echo $article[$i]['id']; ?>">
                <h1 style="height:50px;font-size: 15px;text-align: center;line-height: 50px;overflow: hidden;"><?php echo $article[$i]['title']?></h1>
                <img src="<?php echo '..'.$article[$i]['img_src']; ?>" style="width:330px;height:250px;">
                </a>
            </div>
            <?php }?>
            <?php }?>
           
		</div>
    </div>
</body>
</html>
<script>
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

    function edit(id){
        layer.open({
            type: 2,
            title: '添加',
            shade: 0.3,
            area: ['480px', '440px'],
            content: '/index.php/index/edit?id='+id
        });
    }

    function add(){
        layer.open({
            type: 2,
            title: '添加',
            shade: 0.3,
            area: ['480px', '440px'],
            content: '/index.php/index/add'
        });
    }

    function del(id){
        $.post('/index.php/Index/del',{id:id},function(res){
            if(res.code>0){
                layer.alert(res.msg,{icon:2});
            }else{
                layer.msg(res.msg);
                setTimeout(function(){parent.window.location.reload();},1000);
            }
        },'json');
    }
</script>