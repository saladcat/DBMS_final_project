<?php

$username = 'root';
$password = '474102';
$dbname = 'mytest';
$servername = '127.0.0.1';
$port = 3306;

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

//$sql = "SELECT * FROM event";
//$res = $conn->query($sql);
//if ($res && mysqli_num_rows($res)) {
//
//
//    echo '<table width="800" border="1">';
//
//    while ($row = mysqli_fetch_assoc($res)) {
//
//        echo '<tr>';
//
//        echo '<td>' . $row['id'] . '</td>';
//
//        echo '</tr>';
//    }
//
//    echo '</table>';
//
//} else {
//    echo '没有数据';
//}
