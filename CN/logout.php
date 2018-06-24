

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>登入</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/home.css">
		<link rel="stylesheet" href="css/login.css">

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
		<div class="container login-wrapper">
			<a href="login.php?action=logout">
				<div class="row">
					<div class="col-md-6">
                        <a href="auth/login.php?action=login">注销</a>
					</div>
			</a>
		</div>
	</body>
</html>