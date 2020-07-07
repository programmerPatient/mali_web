<?php
/*清除登录信息session*/
session_start();
$_SESSION['username'] = null;
$_SESSION['userphone'] = null;
$_SESSION['userid'] = null;
$_SESSION['useraccount'] = null;
$_SESSION['is_cancel'] = null;
header('location:../login.php');