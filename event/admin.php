<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Events</title>
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
    </div>
</nav>
<div class="container event-wrapper event-list">
    <h3 class="title">活動列表</h3>
    <br>
    <div align="right"
    <td><a href="add.php">
            <button class="btn btn-default btn-event">新增活动</button>
        </a>
</div>
<table class="table text-center">
    <tr>
        <th class="text-center"><input type="checkbox" id="qx" onclick="xuanzhong()"/>全选</th>
        <th class="text-center">項目</th>
        <th class="text-center">規則</th>
        <th class="text-center">報名</th>
        <th class="text-center">操作</th>
    </tr>
    <?php
    require '../database/database.php';

    $sql = "SELECT * FROM event";

    $event_result = mysqli_query($conn, $sql);
    if ($event_result && mysqli_num_rows($event_result)) {
        while ($row = mysqli_fetch_assoc($event_result)) {
            if ($row['is_delete'] == true) {
                continue;
            }
            echo '<tr>';
            echo '<td><input type="checkbox" id="qx" onclick="xuanzhong()"/></td>';
            if ($row['year'] < 2018) {
                echo '<td>' . $row['name'] . '(out of date)' . '</td>';
            } else {
                echo '<td>' . $row['name'] . '</td>';
            }
            echo '<td>' . $row['comment'] . '</td>';
            printf('<td><a href="../signup.php?event_id=%d">', $row['id']);
            echo '
            <button class="btn btn-default btn-event">報名</button></a>
              </td>';
            echo '<td><a href="edit.php?event_id=' . $row['id'] . '">';
            echo '
            <button class="btn btn-default btn-event">修改</button></a>
            <a href="status.php">
            <button class="btn btn-default btn-event">报名状况</button></a>';
            printf("<a href=\"delete.php?id=%s\">", $row["id"]);
            echo '<button class="btn btn-default btn-event">移除</button></a>
              </td>';
            echo '</tr>';
        }
    } else {
        echo '没有数据';
    }
    ?>
    <tr>
        <td class="text-center">  <!--todo-->
            <script LANGUAGE="javascript">
                function openwin() {
                    window.open("delete.php?data=".<?php $row['id'];?>, "newwindow", "height=100, width=400, toolbar=no,menubar=no, scrollbars=no, resizable=no, location=no, status=no")
                }

            </script>
            <input id="delete_Event" type="button" value="删除" onClick="openwin()"/>
            <?php printf("<a href=\"delete.php?id=%s\"> </a>\n", $row["id"]); ?>

        </td>
    </tr>

</table>
</div>
</body>
</html>

