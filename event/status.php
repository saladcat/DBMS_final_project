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
    <h3 class="text-center">报名状况</h3>
    <br>
    <?php
    require '../database/database.php';

    $sql = "SELECT * FROM event";

    $event_result = mysqli_query($conn, $sql);
    if ($event_result && mysqli_num_rows($event_result)) {
        while ($row = mysqli_fetch_assoc($event_result)) {
            if ($row['is_delete'] == true) {
                continue;
            }
            $sql_find_team = "SELECT DISTINCT TN.team_name AS t_name,TN.team_id AS t_id
    FROM event E,  registration R,team_name TN
    WHERE R.team_id=TN.team_id AND R.event_id=" . $row['id'];
            $team_result = mysqli_query($conn, $sql_find_team);
            if ($team_result && mysqli_num_rows($team_result)) {

                echo('<table border="1">');
                echo('<tr><td>队伍名称</td><td>队伍成员</td></tr>');
                echo('<h2 class="title">' . $row["name"] . '</h2>');
                while ($col = mysqli_fetch_assoc($team_result)) {
                    echo('<tr><td>' . $col['t_name'] . $col['t_id'] . '</td>');
                    $sql_find_member = "SELECT U.user_id,user_name FROM team AS T,user AS U WHERE T.user_id=U.user_id and T.team_id=" . $col['t_id'];
                    $member_result = mysqli_query($conn, $sql_find_member);
                    echo '<td>';
                    if ($member_result && mysqli_num_rows($member_result)) {
                        while ($high = mysqli_fetch_assoc($member_result)) {
                            echo('ID:' . $high['user_id'] . '  NAME:' . $high['user_name'] . '<br>');
                        }
                    }
                    echo('</td></tr>');
                }
                echo '</table>';

            } else {
                echo('<h2 class="title">' . $row["name"] . '</h2>');
                echo '没数据';
            }
        }
    }
    ?>
</div>

</body>
</html>
