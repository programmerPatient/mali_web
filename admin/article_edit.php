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
}else{
    $article = $mysql->fetch_one("SELECT * FROM article WHERE id = ".$_GET['article_id']);
    $cate = $mysql->fetch_all("SELECT * FROM cate WHERE status = 1 ORDER BY sort asc");
    $menu = $mysql->fetch_all("SELECT * FROM menu WHERE fid = 0");
    foreach ($menu as $key => &$value) {
        $value['lists'] = $mysql->fetch_all("SELECT * FROM menu WHERE fid = "."'".$value['id']."'");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>文章修改页</title>
    <link rel="stylesheet" type="text/css" href="../public/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="../public/css/admin.css" />
    <script type="text/javascript" src="../public/layui/layui.js"></script>
</head>
<body>
    <?php require './default.php';?>
    <div class="main" style="padding:10px;">
        <div class="content">
            <span>文章修改</span>
            <div></div>
        </div>
        <form class="layui-form" style="margin-top:50px;padding:0px 50px;" action="./php/article_edit.php" method="POST">
            <input type="hidden" name="article_id" value="<?php echo $article['id'];?>">
            <div class="layui-form-item">
                <label class="layui-form-label">文章标题</label>
                <div class="layui-input-block">
                    <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo $article['title']; ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">排序</label>
                <div class="layui-input-inline">
                    <input type="text" name="sort" required lay-verify="required" placeholder="请输入排序" autocomplete="off" class="layui-input"  value="<?php echo $article['sort']; ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文章封面</label>
                <div class="layui-upload">
                    <input class="image_src" type="hidden" name="image_src">
                      <button type="button" class="layui-btn" id="test1">上传图片</button>
                      <div class="layui-upload-list">
                            <img class="layui-upload-img" style="margin-left:110px;width:100px;height:100px;" id="demo1" src="<?php echo '..'.$article['img_src']; ?>">
                            <p id="demoText"></p>
                      </div>
                </div> 
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文章分类</label>
                <div class="layui-input-block">
                    <select name="cate_id" lay-verify="required">
                        <option value=""></option>
                        <?php for($i =0;$i<count($cate);$i++) {?>
                        <option <?php if($article['cate_id'] == $cate[$i]['id']) {?> selected <?php }?> value="<?php echo $cate[$i]['id']; ?>"><?php echo $cate[$i]['name']; ?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文章状态</label>
                <div class="layui-input-block">
                    <input type="radio" name="status" value="1" title="开启" <?php if($article['status'] == 1) {?> checked <?php }?>>
                    <input type="radio" name="status" value="0" title="关闭" <?php if($article['status'] == 0) {?> checked <?php }?>>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">文本域</label>
                <div class="layui-input-block">
                    <textarea id="demo" required lay-verify="required" style="display: none;width:300px;" name="content"><?php echo $article['content'];?></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo" onclick="update(<?php echo $_GET['article_id']; ?>)">立即提交</button>
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

