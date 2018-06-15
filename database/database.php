<?php

$username = 'root';
$password = 'root';
$dbname = 'FinalProjec';
$servername = '127.0.0.1';
$port = 8889;

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
echo "连接成功";
//user 用户表
$sqlCreateUser = "CREATE TABLE user (
                    uid int(8) unsigned NOT NULL auto_increment,
                    username char(15) NOT NULL default '',
                    password char(32) NOT NULL default '',
                    email varchar(40) NOT NULL default '',
                    regdate int(10) unsigned NOT NULL default '0',
                     PRIMARY KEY  (uid)
                    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ";
if ($conn->query($sqlCreateUser) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "创建数据表错误: " . $conn->error;
}

$sql = "INSERT INTO user (uid, username, password)
VALUES (null, '123', '123')";

if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>