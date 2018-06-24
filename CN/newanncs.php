<?php
$con=mysqli_connect('localhost','root','root',"FinalProjec")or die("数据库连接失败");
//连接数据库
	if(!empty($_POST['sub1'])){
    $title=$_POST['ans_title'];
    $content=$_POST['content'];
    $sql="insert into anncs (`anncs_title`,`anncs_content`,`anncs_time`, rel) values ('$title', '$content',now(),0)";
    //mysqli_query($con,$query);
    if($con->query($sql) ==  TRUE) {echo "<script>alert('儲存成功！');location.href='homepage.php'</script>";}
    else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
if(!empty($_POST['sub2'])){
    $title=$_POST['ans_title'];
    $content=$_POST['content'];
    $sql="insert into anncs (`anncs_title`,`anncs_content`,`anncs_time`, rel) values ('$title', '$content',now(),1)";
    //mysqli_query($con,$query);
    if($con->query($sql) ==  TRUE) {echo "<script>alert('发布成功！');location.href='homepage.php'</script>";}
    else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Announce</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/home.css">
		<link rel="stylesheet" href="css/announce.css">
	</head>
	<body>
       <!--表头-->
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
       <div class="container anncswp">
           <div class="add-form">
               <form method="POST" action="newanncs.php" name="edit" >
                    <h3 class="text-center">新增公告</h3>
                    <hr>
                    <br>
                    <label class="text-center" for="ans_title">公告標題</label>
                    <input type="text" id="ans_title" name="ans_title" class="form-control">
                    <br>
                    <label class=""text-center" for="content">公告內容</label>
                   <textarea name="content" rows="8" cols="92"></textarea>
                    <br>
                    <hr>
                   <div style="float:right">
                       <input type="submit" value="儲存" name="sub1" class="sub_index">
                       <input type="submit" value="發佈" name="sub2" class="sub_index">
                       <button><a href="homepage.php">取消</button></div></a>
               </form>
           </div>
       </div>
	</body>
</html>