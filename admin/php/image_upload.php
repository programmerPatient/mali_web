<?php
session_start();
/*图片上传*/

//允许上传的图片后缀
$allowed_exts = array("gif","jpeg","jpg","png");

$temp = explode(".", $_FILES['file']['name']);
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
// && ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
&& in_array($extension, $allowed_exts)){
	if ($_FILES["file"]["error"] > 0)
    {
        echo json_encode(['code'=>1,'msg'=>"错误：: " . $_FILES["file"]["error"] . "<br>"]);
    }
    else
    {
        // 判断当前目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if (file_exists($_SERVER['DOCUMENT_ROOT']."/upload/" . $_FILES["file"]["name"]))
        {
            echo json_encode(['code'=>-1,'src'=>"/upload/" . $_FILES["file"]["name"]]);
        }else{
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["file"]["tmp_name"], "../../upload/" . $_FILES["file"]["name"]);
            echo json_encode(['src'=>"/upload/" . $_FILES["file"]["name"],'code'=> -1]);
        }
    }
}else{
	echo json_encode(['code'=>1,'msg'=> "非法的文件格式"]);
}