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

//孙耕的 table user
$sqlCreateUser = "CREATE TABLE user (
                    uid int(8) unsigned NOT NULL auto_increment,
                    username char(15) NOT NULL default '',
                    password char(32) NOT NULL default '',
                    email varchar(40) NOT NULL default '',
                    regdate int(10) unsigned NOT NULL default '0',
                     PRIMARY KEY  (uid)
                    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ";
//if ($conn->query($sqlCreateUser) === TRUE) {
//    echo "Table MyGuests created successfully";
//} else {
//    echo "创建数据表错误: " . $conn->error;
//}


//$sql = "INSERT INTO user (uid, username, password)
//VALUES (null, '123', '123')";

//if ($conn->query($sql) === TRUE) {
//    echo "新记录插入成功";
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}

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

//朱鸿宁的table anncs

$sqlCreateAnncs = "CREATE TABLE anncs (
                    aid int(8) unsigned NOT NULL auto_increment,
                    anncs_title text NOT NULL,
                    anncs_time date NOT NULL,
                    anncs_content text NOT NULL,
                     PRIMARY KEY  (aid)
                    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ";
if ($conn->query($sqlCreateAnncs) === TRUE) {
    echo "Table anncs created successfully";
} else {
    echo "创建数据表错误: " . $conn->error;
}
