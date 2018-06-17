<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2018/6/15
 * Time: 23:44
 */
require '../database/database.php';
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// 定义变量并设置为空值
$name_err = $team_limit_err = $genderErr = $websiteErr = "";
$name = $team_limit = $max_team_member = $min_team_member = $year = $comment = "";
echo $_POST["name"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo 'hah';
    if (empty($_POST["name"])) {
        $name_err = "名字是必填的";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["team_limit"])) {
        $team_limit = 9999;
    } else {
        $team_limit = test_input($_POST["team_limit"]);
    }

    if (empty($_POST["max_team_member"])) {
        $max_team_member = 9999;
    } else {
        $max_team_member = test_input($_POST["max_team_member"]);
    }

    if (empty($_POST["min_team_member"])) {
        $min_team_member = 0;
    } else {
        $min_team_member = test_input($_POST["min_team_member"]);
    }
    if (empty($_POST["year"])) {
        $year = 2018;
    } else {
        $year = test_input($_POST["year"]);
    }

    if (empty($_POST["comment"])) {
        $comment = "无";
    } else {
        $comment = test_input($_POST["comment"]);
    }
    $event_add = 'INSERT INTO event (id, name,team_limit,max_team_member,min_team_members,year,comment) VALUES ($id, $name,$team_limit,$max_team_member,$min_team_member,$year,$comment)';
    $conn->query($event_add);
}
?>
