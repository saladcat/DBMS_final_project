<?PHP

//登出

session_start();
    unset($_SESSION['admin']);
    unset($_SESSION['username']);
    echo '注销登录成功！点击此处 <a href="../login.php">登录</a>';
    exit;

?>