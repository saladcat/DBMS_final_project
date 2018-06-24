<?php
$con=mysqli_connect('localhost','root','root',"FinalProjec")or die("数据库连接失败");
//if(!empty($_GET['aid'])) {
    $d = $_GET['wid'];
    $rs = "delete from `anncs` where `aid`='$d'";
    if ($con->query($rs) == TRUE) {
        {echo "<script>alert('删除成功！');location.href='homepage.php'</script>";}
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
   }
//}

