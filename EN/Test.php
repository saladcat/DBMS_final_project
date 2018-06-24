<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Test/mysql_connect.php';//链接数据库
$sql='select count(*) from user where user.username = \'qwe\' and user.password = \'qwe\'';
echo $db->query($sql);






    ?>