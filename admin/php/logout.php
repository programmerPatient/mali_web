<?php
/*清除登录信息session*/
session_start();
$_SESSION['adminname'] = null;
$_SESSION['adminphone'] = null;
$_SESSION['adminaccount'] = null;
header('location:../login.php');