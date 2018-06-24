<?php
session_start();
if  ($_SESSION['username']=='admin')
echo"<script type='text/javascript'>alert('你好管理员！正转入管理界面');location='aview.php';</script>";;
?>
<?php
$con=mysqli_connect('localhost','root','root',"FinalProjec")or die("数据库连接失败");
if(!empty($_GET['view'])){
    $v=$_GET['view'];
    $sql="select * from `anncs` where `aid`='$v'";
    $rs=mysqli_query($con, $sql);
    $rs_sql=mysqli_fetch_array($rs);
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
<div class="container announce-wrapper">
    <h3 class="title"><?php echo $rs_sql['anncs_title']?></h3>
    <div class="row">
        <div class="col-md-12 date"><?php echo $rs_sql['anncs_time']?></div>
        <div class="col-md-12 announce-content">
            <p><?php echo $rs_sql['anncs_content']?></p>
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