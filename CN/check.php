<?php
require_once("ms_login.php");
require_once ("mysql_connect.php");
$username=$_POST['username'];
$password=$_POST['password'];
if($username == "")
{

    echo "请填写用户名<br>";
    echo"<script type='text/javascript'>alert('请填写用户名');location='login.php';
			</script>";




}
elseif($password == "")
{

    //echo "请填写密码<br><a href='login.php'>返回</a>";
    echo"<script type='text/javascript'>alert('请填写密码');location='login.php';</script>";

}
else
{
    //$colum=collect_data();


//    while($row = mysqli_fetch_array($result))
//    {
//        echo "username: " . $row["username"]. " - password: "  . $row["password"]. " ". "<br>";
//        echo "<br>";
//    }

//    echo $username;
//    echo 'aaa';
//    echo $password;
    $result = mysqli_query($db,"SELECT * FROM user
WHERE username='$username' and password='$password'");
    //$row = mysqli_fetch_array($result);
    //echo "username: " . $row["username"]. " - password: "  . $row["password"]. " ". "<br>";

    $cnt=0;
    while($row = mysqli_fetch_array($result))
    {
        //echo "username: " . $row["username"]. " - password: "  . $row["password"]. " ". "<br>";
        //echo "验证成功！<br>";

        //保存用户登录状态
        session_start();
        $_SESSION['username'] = $row["username"];

        if($_SESSION['username']=='admin' ){
            $_SESSION['admin']=true;
        }else{
            $_SESSION['admin']=false;
        }
        //echo $_SESSION['admin'];

//        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
//            echo "登录成功：".$_SESSION['user'];
//        }

        echo"<script type='text/javascript'>alert('登陆成功');location='huanying.php';</script>";
        $cnt=$cnt+1;

    }
    if($cnt==0){
        //echo "密码错误<br>";
        echo"<script type='text/javascript'>alert('密码错误');location='login.php';</script>";

        //echo "<a href='login.php'>返回</a>";
    }
}
?>