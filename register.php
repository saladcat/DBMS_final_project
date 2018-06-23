<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <title>欢迎您的到来</title>
</head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Home</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/announce.css">
<style type="text/css">

    .div
    {
        height:1000px;
        width:700px;
        text-align:center;
        margin:40px;

    }
    .text
    {
        font-size:20px;
        margin:20px;

    }
    .button
    {
        font-size:10px;

    }



</style>
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
                <?php
                session_start();
                if  ($_SESSION['username']=='admin')
                    echo '<li><a href="homepage.php">首页 <span class="sr-only">(current)</span></a ></li>';
                else
                    echo '<li><a href="home.php">首页 <span class="sr-only">(current)</span></a ></li>';
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-link">
                <?php
                session_start();
                if  ($_SESSION['username']=='admin')
                    echo '<li><a href="event/admin.php">活動列表 <span class="sr-only">(current)</span></a ></li>';
                else
                    echo '<li><a href="events.php">活動列表 <span class="sr-only">(current)</span></a ></li>';
                ?>
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

<h1>注册页面</h1>
<form method="post" action="register_1.php">
    <div class="div">
        <div class="text">
            用户名<input type="text" name="username" ></div>
        <div class="text">
            密码:<input type="password" name="password"></div>
        <div class="text">
            再次输入密码：<input type="password" name="pwd_again"></div>
        <div class="text">
            验证码：<input type="text" name="check"><img src="showing.php"></img></div>

        <div class="text">
            <input type="radio" name="agree" value="是否同意我们的条款">同意我们的条款?</div>

        <input type="submit" value="提交">
        <input type="reset" value="清除">


    </div>

</form>


</body>
</html>