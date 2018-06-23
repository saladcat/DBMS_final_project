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
                <li><a href="usersignup.html">用户注册 <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-link">
                <li><a href="login.php">登入 <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-link">
                <li><a href="logout.php">登出 <span class="sr-only">(current)</span></a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container announce-wrapper">
    <form action="view.php" method="GET">
        <h3 class="title">最新公告</h3>
        <div class="row">
            <table class="table">
                <td class="td-date">公告時間</td>
                <td>標題</td>
                <?php
                $con=mysqli_connect('localhost','root','13111162',"FinalProjec")or die("数据库连接失败");
                $q = "select * from `anncs`";
                $result=mysqli_query($con, $q);
                while($row=mysqli_fetch_assoc($result))
                {
                    echo "<tr>
                        <td>" . $row["anncs_time"] . "</td>
                        <td><a href=\"view.php?view=".$row["aid"]."\">" . $row["anncs_title"] . "</td>
                        <tr>";
                }
                ?>
            </table>
        </div>
</div>
</body>
</html>