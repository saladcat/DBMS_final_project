<?php
session_start();
require_once 'mysql_connect.php';
$username=$_POST['username'];
$email=$_POST['email'];
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
    else if($code!=$_SESSION['check'])
    {
        echo"验证码错误！";
    }
    else
    {
        $sql="insert into user(uid,username,password,email,regdate) values(null,'$username','$password','$email',now())";
        //$result=mysqli_query($sql);
        if($db->query($sql) !== TRUE)
        {
            echo"注册不成功！";
            echo"<a href='register.php'>返回</a>";
        }
        else
        {
            session_start();
            $_SESSION['username'] = $username;

            if($_SESSION['username']=='admin' ){
                $_SESSION['admin']=true;
            }else{
                $_SESSION['admin']=false;
            }
            echo"<script type='text/javascript'>alert('注册成功');location='huanying.php';</script>";

        }
    }
}
?>