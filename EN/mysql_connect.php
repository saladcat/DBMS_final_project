<?php
// 连接服务器，并且选择test数据库
//function(){

    $username = 'root';
    $password = 'root';
    $dbname = 'FinalProjec';
    $servername = '127.0.0.1';
    $port = 8889;
//    $db = mysqli_connect($servername, $username, $password);
//    //or die("连接数据库失败！");
//
//    mysqli_select_db($dbname, $port);
//    //or die ("不能连接到user".mysqli_error());


    $db = new mysqli($servername, $username, $password, $dbname, $port);
//    if ($db->connect_error) {
//        die("连接失败: " . $db->connect_error);
//    }
//    echo "连接成功";

    //$sql="insert into user(uid,username,password) values(null,'admin','admin')";
    //$sql = "Delete from user";
    //$result = $db->query($sql);
    //$result=mysqli_query($sql);
//
//    if ($db->query($sql) === TRUE) {
//        echo "新记录插入成功";
//    } else {
//        echo "Error: " . $sql . "<br>" . $conn->error;
//    }



//if ($result->num_rows > 0) {
//    // 输出数据
//    while($row = $result->fetch_assoc()) {
//        echo "username: " . $row["username"]. " - password: "  . $row["password"]. " ". "<br>";
//    }
//} else {
//    echo "0 结果";
//}

//$result = mysqli_query($db,"SELECT * FROM user
//WHERE username='qwe' and password='qwe'");
//echo $row = mysqli_fetch_array($result);
//echo "username: " . $row["username"]. " - password: "  . $row["password"]. " ". "<br>";

//while($row = mysqli_fetch_array($result))
//{
//    echo "username: " . $row["username"]. " - password: "  . $row["password"]. " ". "<br>";
//    echo "<br>";
//}



//}

?>