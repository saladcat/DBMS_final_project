<?php
require_once 'mysql_connect.php';
$username=$_POST['username'];
$password=$_POST['password'];
$pwd_again=$_POST['pwd_again'];
$code=$_POST['check'];
if($username==""|| $password=="")
{
    echo"用户名或者密码不能为空";
}
else
{
    if($password!=$pwd_again)
    {
        echo"两次输入的密码不一致,请重新输入！";
        echo"<a href='register.php'>重新输入</a>";

    }
//    else if($code!=$_SESSION['check'])
//    {
//        echo"验证码错误！";
//    }
    else
    {
        $sql="insert into user(uid,username,password) values(null,'$username','$password')";
        //$result=mysqli_query($sql);
        if($db->query($sql) !== TRUE)
        {
            echo"注册不成功！";
            echo"<a href='register.php'>返回</a>";
        }
        else
        {
            echo"注册成功!";
        }
    }
}
?>