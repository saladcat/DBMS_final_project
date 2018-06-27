<?php
//header("Content-Type: text/html; charset=utf8");

if(!isset($_POST['submit'])){
    exit("错误执行");
}//判断是否有submit操作

$account=$_POST['account'];//post获取表单里的name
$password=$_POST['password'];//post获取表单里的password

//include $_SERVER['DOCUMENT_ROOT'] . '/database/database.php';//链接数据库
$sql="insert into FinalProjec.user(uid,username,password) values (null,'$account','$password')";//向数据库插入表单传来的值的sql
$reslut=$conn->query($sql);//执行sql

if ($result->num_rows < 1){
    die('Error: ' . $conn->error);//如果sql执行失败输出错误
}else{
    echo "注册成功";//成功输出注册成功
}


//关闭数据库

?>