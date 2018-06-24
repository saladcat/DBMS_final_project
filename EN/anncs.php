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
                            echo '<li><a href="homepage.php">Home <span class="sr-only">(current)</span></a ></li>';
                        else
                            echo '<li><a href="home.php">Home <span class="sr-only">(current)</span></a ></li>';
                        ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-link">
                        <?php
                        session_start();
                        if  ($_SESSION['username']=='admin')
                            echo '<li><a href="event/admin.php">Activity <span class="sr-only">(current)</span></a ></li>';
                        else
                            echo '<li><a href="events.php">Activity <span class="sr-only">(current)</span></a ></li>';
                        ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-link">
                        <li><a href="register.php">Register <span class="sr-only">(current)</span></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-link">
                        <li><a href="login.php">Login <span class="sr-only">(current)</span></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-link">
                        <li><a href="logout.php">Logout <span class="sr-only">(current)</span></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-link">
                        <li><a href="my.php">Usercenter <span class="sr-only">(current)</span></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-link">
                        <li><a href="../CN/home.php">中文 <span class="sr-only">(current)</span></a></li>
                    </ul>
                </div>
			</div>
		</nav>
		<div class="container announce-wrapper">
			<h3 class="title">107學年度上學期 體育週開始報名啦！各系體幹看過來！</h3>
			<div class="row">
				<div class="col-md-12 date">2018 / 09 / 06 14:50</div>
				<div class="col-md-12 announce-content">
					<p>根据我校历，2018年我校运动会定于6月26日（周二）全天、6月27日（周三）下午在光复校区东田径场举行，全校停课。校运会当天如遇中雨或大雨则运动会顺延一周举行。请各院系精心组织、积极参赛。</p>
				</div>
                <div id="content"></div>
                <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
                <script>
                    document.getElementById('content').innerHTML =
                        marked('# Marked in the browser\n\nRendered by **marked**.');
                </script>
                <div class="col-md-12 announce-content">
                    <img src="diagram.png"  alt="randompicture" width="500" height="500"/>
                </div>
                <body>

			</div>
		</div>
	</body>
</html>