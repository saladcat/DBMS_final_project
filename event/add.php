<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2018/6/15
 * Time: 23:44
 */
require '../database/database.php';
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// 定义变量并设置为空值
$name = $team_limit = $max_team_members = $min_team_members = $year = $comment = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $name = "empty";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["team_limit"])) {
        $team_limit = 9999;
    } else {
        $team_limit = test_input($_POST["team_limit"]);

    }

    if (empty($_POST["max_team_members"])) {
        $max_team_members = 9999;
    } else {
        $max_team_members = test_input($_POST["max_team_members"]);
    }

    if (empty($_POST["min_team_members"])) {
        $min_team_members = 0;
    } else {
        $min_team_members = test_input($_POST["min_team_members"]);

    }
    if (empty($_POST["year"])) {
        $year = 2018;
    } else {
        $year = test_input($_POST["year"]);
    }

    if (empty($_POST["comment"])) {
        $comment = "无";
    } else {
        $comment = test_input($_POST["comment"]);
    }
    $event_add = sprintf("INSERT INTO event (name, team_limit, max_team_members, min_team_members, year, comment, is_delete) VALUE (\"%s\",%d,%d,%d,%d,\"%s\",%b);
", $name, $team_limit, $max_team_members, $min_team_members, $year, $comment, false);
    $conn->query($event_add);
    echo '<script LANGUAGE="javascript">
    history.back();
    history.back();
    location.reload();
    </script>';
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Add</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/event.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">N C T U &nbsp;&nbsp; S p o r t s</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-link">
                <li><a href="../home.php">首頁 <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-link">
                <li class="active"><a href="../events.php">活動列表 <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-link">
                <li><a href="../usersignup.html">用户注册 <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-link">
                <li><a href="../login.php">登入 <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-link">
                <li><a href="../logout.php">登出 <span class="sr-only">(current)</span></a></li>
            </ul>
        </div>
</nav>
<div class="container event-wrapper event-list">
    <h3 class="title">新增活动</h3>
    <div align="left">
        <form method="post" action="add.php">
            活动名称：<br>
            <input type="text" name="name"><br>
            活动日期：<br>
            <input type="text" name="year"><br>
            队伍限制：<br>
            <input type="text" name="team_limit"><br>
            每队最小人数限制：<br>
            <input type="text" name="min_team_members"><br>
            每队最大人数限制：<br>
            <input type="text" name="max_team_members"><br>
            规则：<br>
            <input type="text" name="comment"> <br><br>
            <input type="submit" name="submit" value="提交">
            <script language="javascript">
                function leave() {
                    if (confirm("您确定要关闭本页吗？")) {
                        history.back();
                    }
                    else {
                    }
                }
            </script>
            <input id="btnClose" type="button" value="取消" onClick="leave()"/>
        </form>
    </div>

</div>

</body>
</html>
