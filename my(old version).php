<?php

//这里是用户中心


session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.php");
    exit();
}
//包含数据库连接文件
include $_SERVER['DOCUMENT_ROOT'] . '/database/database.php';//链接数据库
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$result = $conn->query("select * from user where uid=$userid limit 1");
$row = $result->fetch_assoc();

echo '用户信息：<br />';
echo '用户ID：'. $row["uid"].'<br />';
echo '用户名：'. $row["username"].'<br />';
echo '邮箱：'. $row["email"]. '<br />';
echo '注册日期：'. $row['regdate'] .'<br />';
echo '<a href="login.php?action=logout">注销</a> 登录<br />';
?>