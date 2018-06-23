<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/announce.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">N C T U &nbsp;&nbsp; S p o r t s</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-link">
                <li class="active"><a href="home.php">首頁 <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-link">
                <li><a href="events.php">活動列表 <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-link">
                <li><a href="register.php">用户注册 <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-link">
                <li><a href="login.php">登入 <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-link">
                <li><a href="logout.php">登出 <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-link">
                <li><a href="my.php">用户中心 <span class="sr-only">(current)</span></a></li>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>

<?php

//这里是用户中心


session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['username'])){
    header("Location:login.php");
    exit();
}
//包含数据库连接文件
//include $_SERVER['DOCUMENT_ROOT'] . '/database/database.php';//链接数据库
require_once ("mysql_connect.php");

//echo 'aaaa';
$username = $_SESSION['username'];
//echo $username;
$result = mysqli_query($db,"select * from user where username='$username' limit 1");
$row=mysqli_fetch_array($result);

echo '用户信息：<br />';
echo '用户ID：'. $row["uid"].'<br />';
echo '用户名：'. $row["username"].'<br />';
echo '邮箱：'. $row["email"]. '<br />';
echo '注册日期：'. '2018-6-24' .'<br />';
echo '<a href="../login.php?action=logout">注销</a> 登录<br />';
?>


