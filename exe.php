<?php
 
$arr_time=$_POST['data']['time'];
$arr_grade=$_POST['data']['grade'];
$arr_type=$_POST['data']['type'];
 
for($i=0;$i<count($arr_time);$i++){
    $insert[$i]['time']=$arr_time[$i];
    $insert[$i]['grade']=$arr_grade[$i];
    $insert[$i]['type']=$arr_type[$i];
}
 
echo "<pre>";
print_r($insert);
echo "</pre>";
//每个数据是一条数据

//
?>