<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Sign up</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/home.css">
		<link rel="stylesheet" href="css/event.css">
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
                        <?php
                        session_start();
                        if  ($_SESSION['username']=='admin')
                            echo '<li><a href="admin.php">報名狀況 <span class="sr-only">(current)</span></a ></li>';
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
                    <ul class="nav navbar-nav navbar-link">
                        <li><a href="../EN/home.php">English <span class="sr-only">(current)</span></a></li>
                    </ul>
                </div>
			</div>
		</nav>
		<div class="container event-wrapper">
			<div class="signup-form">
				
				<table border="1">

</table>

                <?php

                $link=mysqli_connect("localhost","root","root");
                if(!$link)
                    echo "database fail<br>";
                mysqli_select_db($link,"mytest");


                echo "<h3 class='text-left'><strong>報名狀況</strong></h3>";
                echo "<br><br>";

                $sql_event_id="SELECT id,name FROM event WHERE is_delete=0";
                $event_tmp=mysqli_query($link,$sql_event_id);
                while($row=mysqli_fetch_array($event_tmp))
                {
                    $current_event=$row['id'];
                    $sql_register_team_in_current_event="SELECT event_id, team_id FROM registration WHERE event_id=$current_event";

                    //echo " 新的 $current_event";
                    $register_team_in_current_event_tmp=mysqli_query($link,$sql_register_team_in_current_event);
                    //echo "<br>";
                    //secho mysqli_num_rows($register_team_in_current_event_tmp);
                    //var_dump($register_team_in_current_event_tmp);

                    $event_name=$row['name'];
                    echo "<hr/>";
                    echo "<h3 class='text-left'><strong>比賽：$event_name</strong></h3>";
                    if(mysqli_num_rows($register_team_in_current_event_tmp)>0)
                    {
                        echo "<table class='table'>";
                        echo "<tr>";
                        echo	"<th >隊伍名稱</th>";
                        echo	"<th>隊伍成員</th>";
                        echo "</tr>";

                        while($team=mysqli_fetch_array($register_team_in_current_event_tmp))
                        {
                            $team_id=$team['team_id'];
                            $sql_team_name="SELECT team_name FROM team_name WHERE team_id=$team_id";
                            $team_name_tmp=mysqli_query($link,$sql_team_name);

                            $team_name=mysqli_fetch_array($team_name_tmp)['team_name'];

                            echo "<tr>";
                            echo "<td>$team_name</td>";
                            echo "<td>";
                            $sql_team_member_id="SELECT * FROM team WHERE team_id=$team_id";
                            $team_member_id_all=mysqli_query($link,$sql_team_member_id);
                            while($team_member_id_row=mysqli_fetch_array($team_member_id_all))
                            {
                                $team_member_id=$team_member_id_row['user_id'];
                                $sql_member_name="SELECT user_name FROM user WHERE user_id=$team_member_id";
                                $member_name_tmp=mysqli_query($link,$sql_member_name);
                                $member_name=mysqli_fetch_array($member_name_tmp)['user_name'];
                                echo "$team_member_id  ";
                                echo "$member_name";
                                echo "<br>";
                            }

                            echo "<td/>";
                            echo "</tr>";

                        }
                        echo "</table>";


                    }
                    else
                    {
                        echo "<hr/>";
                        echo "尚無人報名";
                        echo "<br><br>";

                    }

                }
                mysql_close($link);
                ?>

	
				</div>
			</div>
		</div>
	</body>
</html>