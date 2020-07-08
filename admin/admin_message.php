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
    <title>管理员信息页</title>
    <link rel="stylesheet" type="text/css" href="../public/layui/css/layui.css">
    <script type="text/javascript" src="../public/layui/layui.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/css/admin.css" />
</head>
<body>
   <?php require './default.php';?>
    <div class="main" style="padding:10px;">
        <div class="content">
            <span>管理员信息</span>
            <div></div>
        </div>
        <form class="layui-form" method="post" action="./php/admin_edit.php" style="margin-top:50px;padding:0px 50px;" >
            <div class="layui-form-item">
                <label class="layui-form-label">账号</label>
                <div class="layui-input-inline">
                    <input type="text" name="account" disabled  lay-verify="required"  autocomplete="off" class="layui-input" value="<?php echo $_SESSION['adminaccount']; ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">姓名</label>
                <div class="layui-input-inline">
                    <input type="text" name="name" required lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input" value="<?php echo $_SESSION['adminname']; ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">手机号</label>
                <div class="layui-input-inline">
                    <input type="text" name="phone" required lay-verify="required" placeholder="请输入手机号" autocomplete="off" class="layui-input" value="<?php echo $_SESSION['adminphone']; ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">原始密码</label>
                <div class="layui-input-inline">
                    <input type="password" name="old_password"  placeholder="请输入原始密码" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">新的密码</label>
                <div class="layui-input-inline">
                    <input type="password" name="password" placeholder="请输入新的密码" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">确认密码</label>
                <div class="layui-input-inline">
                    <input type="password" name="confirm_password" placeholder="确认密码" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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
    var success = "<?php echo $_GET['success']?$_GET['success']:null; ?>";
    if(success){
        alert(success);
    }

    layui.use('layedit', function(){
      var layedit = layui.layedit;
      layedit.build('demo'); //建立编辑器
    });

    layui.use('upload', function(){
        var $ = layui.jquery,upload = layui.upload;
  
        //普通图片上传
        var uploadInst = upload.render({
            elem: '#test1'
            ,url: './php/image_upload.php' //改成您自己的上传接口
            ,before: function(obj){
              //预读本地文件示例，不支持ie8
              obj.preview(function(index, file, result){
                $('#demo1').attr('src', result); //图片链接（base64）
              });
            }
            ,done: function(res){
              //如果上传失败
              if(res.code > 0){
                return layer.msg('上传失败');
              }else{
                $('.image_src').val(res.src);
                console.log(res);
              }
              //上传成功
            }
            ,error: function(){
              //演示失败状态，并实现重传
              var demoText = $('#demoText');
              demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
              demoText.find('.demo-reload').on('click', function(){
                uploadInst.upload();
              });
            }
        });
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