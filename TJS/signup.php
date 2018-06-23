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
                        <li><a href="home.php">首頁 <span class="sr-only">(current)</span></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-link">
                        <li class="active"><a href="events.php">活動列表 <span class="sr-only">(current)</span></a></li>
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
		<div class="container event-wrapper">
			<div class="signup-form">
				
				<?php
				$event_id=$_GET['event_id'];
				$link=mysqli_connect("localhost","root","root");
						if(!$link)
							echo "database fail<br>";
					mysqli_select_db($link,"mytest");
					
				$sql_event_name="SELECT name FROM event WHERE id=$event_id";
				$event_name_temp=mysqli_query($link,$sql_event_name);
				$event_name=$event_name_temp->fetch_object()->name;
				
				echo "<h3 class='text-center'>活動報名：$event_name</h3>";	
				echo "<div class='description'>";
				
					
				$sql_max_team_members="SELECT max_team_members FROM event WHERE id=$event_id ";
				$sql_min_team_members="SELECT min_team_members FROM event WHERE id=$event_id";
				$sql_team_limit="SELECT team_limit FROM event WHERE id=$event_id";
				$sql_year="SELECT year FROM event WHERE id=$event_id";
				$sql_exist_team="SELECT COUNT(*) AS number FROM registration WHERE event_id=$event_id";
				
				$max_team_members_temp=mysqli_query($link,$sql_max_team_members);
				$min_team_members_temp=mysqli_query($link,$sql_min_team_members);
				$team_limit_temp=mysqli_query($link,$sql_team_limit);
				$year_temp=mysqli_query($link,$sql_year);
				$exist_temp=mysqli_query($link,$sql_exist_team);
				
				
				
				$max_team_members=$max_team_members_temp->fetch_object()->max_team_members;
				$min_team_members=$min_team_members_temp->fetch_object()->min_team_members;
				$team_limit=$team_limit_temp->fetch_object()->team_limit;
				$year=$year_temp->fetch_object()->year;
				$exist_team=$exist_temp->fetch_object()->number;
				$left_team=$team_limit-$exist_team;
				
				echo "<p>每隊上限：$max_team_members</p>";
				echo "<p>每隊下限：$min_team_members</p>";
				echo "<p>隊伍上限：$team_limit</p>";
				echo "<p>已報名隊伍：$exist_team 隊</p>";
				echo "<p class='warning'>尚可報名：$left_team 隊</p>";
				
				
				?>	
				</div>
				<br>
				<label class="text-center" for="team_name">隊伍名稱</label>
				<input type="text" id="team_name" name="team_name" class="form-control" value="MHW Pro">
				<br>
				<label class="text-center" for="team_name">隊伍人員</label>
				<table class="table">
				
				<tr>
						<th class="student-id">隊員學號</th>
						<th>姓名</th>
						<th></th>
				</tr>
				<?php
						//进行提交新队员的操作，需要连接数据库，往数据库里添加新的成员
					$student_id="";
					$link=mysqli_connect("localhost","root","root");
						if(!$link)
							echo "database fail<br>";
					mysqli_select_db($link,"mytest");
					$get_result="SELECT * FROM register_student";
					$result=mysqli_query($link,$get_result);
							while($row=mysqli_fetch_array($result))//把暫時報名的學生顯示
							{
								if($row['event_id']==$_GET['event_id'])
								{
									echo "<tr>";
										echo "<td>".$row['user_id']."</td>";
										echo "<td>".$row['user_name']."</td>";
								
										echo "<td class='text-right'>";
										echo "<form method='POST' action='add_delete.php'>";
											echo "<input type='hidden' name='original_student_id' value='".$row['user_id']."'>";
											echo "<input type='hidden' name='event_id' value='".$_GET['event_id']."'>";
											echo "<input  type='text' name='student_edit_id'>";
											echo " <button  class='btn btn-new' style='margin-right:2px' type='submit' name='action' value='student_change'><b><b>修改</b></b></button></td> ";
										echo "</form>";
									
								
								
								
								printf("<td ><a href=\"delete.php?id=%s&event_id=%s\">", $row['user_id'],$_GET['event_id']);
								echo "<button class='btn btn-new' style='margin-right:20px' type='submit' name='action' value='student_delete'><b><b>取消</b></b></button> </a></td>";
									
								echo "</tr>";
								}
								
							}
							mysqli_close($link);
				?>
				
					<tr>
						<?php printf('<form method="POST" action="add_delete.php?event_id=%d">',$_GET['event_id']);?>
							<input type="hidden" name="event_id" value=$_GET['event_id']>
							<td class="student-id">
								<input type="text" name="student_id" class="form-control">
							</td>
							<td class="text-right">
								<input type="submit" class="btn btn-new" style="margin-right:30px" value="新增隊員">
							</td>
						</form>
					</tr>
					

					
				</table>
				<div class="text-left form-bottom">
					<?php
						$event_id = $_GET['event_id'];
						
						$student_id="";
						$link=mysqli_connect("localhost","root","root");
						if(!$link)
							echo "database fail<br>";
						mysqli_select_db($link,"mytest");
						$get_result="SELECT * FROM register_student";
						$result=mysqli_query($link,$get_result);
						$whole_team_member_id=array();
							while($row=mysqli_fetch_array($result))
							{
								if($row['event_id']==$event_id)
								{
									array_push($whole_team_member_id,$row['user_id']);
								}		
							}
						$regId=implode(",",$whole_team_member_id);
						
						echo "<form method='post' action='finish_team.php'>";
						echo "<input type='hidden' name='event_id' value='".$event_id."'>";
						echo "<input type='hidden' name='student_id' value='".$regId."'>";
						echo "<button type='submit' class='btn btn-default'>提交報名表</button>";
						echo "</form>";
						
						
											
					
					
				?>
				</div>
			</div>
		</div>
	</body>
</html>