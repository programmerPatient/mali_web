<?php
/*清除登录信息session*/
session_start();
session_destroy();
header('location:../login.php');