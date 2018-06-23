<?PHP
//header("Content-Type: text/html; charset=utf8");

//if (!isset($_POST["submit"])) {
//    exit("错误执行");
//}//检测是否有submit操作

//include $_SERVER['DOCUMENT_ROOT'] . '/database/database.php';//链接数据库
$account = $_POST['account'];//post获得用户名表单值
$passowrd = $_POST['password'];//post获得用户密码单值

//    if ($result->num_rows > 0) {
//        // 输出数据
//        while($row = $result->fetch_assoc()) {
//            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//        }
//    } else {
//        echo "0 结果";
//    }

if ($account && $passowrd) {//如果用户名和密码都不为空
    $sqlLogIn = "select * from user where username = '$account' and password='$passowrd'";//检测数据库是否有对应的username和password的sql
    $result = $conn->query($sqlLogIn);//执行sql
    $row = $result->fetch_assoc();//返回一个数值
    if ($result->num_rows > 0) {//0 false 1 true
        header("refresh:0;url=welcome.html");//如果成功跳转至welcome.html页面
        $_SESSION['username'] = $account;
        $_SESSION['userid'] = $row['uid'];
        //echo $username,' 欢迎你！进入 <a href="my.php">用户中心</a><br />';
        //echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';
        exit;
    } else {
        echo "用户名或密码错误";
        echo "
                    <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                    </script>

                ";//如果错误使用js 1秒后跳转到登录页面重试;
    }


} else {//如果用户名或密码有空
    echo "表单填写不完整";
    echo "
                      <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                      </script>";

    //如果错误使用js 1秒后跳转到登录页面重试;
}

//mysql_close();//关闭数据库



//登出

if($_GET['action'] == "logout"){
    unset($_SESSION['admin']);
    unset($_SESSION['username']);
    echo '注销登录成功！点击此处 <a href="login.php">登录</a>';
    exit;
}
?>