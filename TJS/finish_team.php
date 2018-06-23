<?php

$event_id=$_POST['event_id'];//比賽項目
$student_id=explode(",",$_POST["student_id"]);//所有報名的學生 是個數組

$link=mysqli_connect("localhost","root","root");
	if(!$link)
		echo "database fail<br>";
mysqli_select_db($link,"mytest");
//連接數據庫

//檢查是否曾經加入過這個比賽
$GLOBALS['flag']=false;
$GLOBALS['check_student']=0;
for($i=0;$i<count($student_id);$i++)
{
	
	$sql_get_team_id="SELECT team_id FROM team WHERE user_id=$student_id[$i]";
	$team_id_temp=mysqli_query($link,$sql_get_team_id);//對於每個學生都去檢查它是否有參加過這個比賽
	
	$team_id=$team_id_temp->fetch_object();
	if(count($team_id)>0)
	{
		
		//有參加過某個team
		$team_id=$team_id->team_id;
		$sql_check_this_student_in_this_event="SELECT event_id FROM registration WHERE team_id=$team_id";
		$event_id_temp=mysqli_query($link,$sql_check_this_student_in_this_event);
		$event_id=$event_id_temp->fetch_object();
			
		if(count($event_id)>0)//這個人的確有參加每個比賽
		{
			
			//它是否是參加了這個比賽呢？
			$event_id=$event_id->event_id;
			if($event_id==$_POST['event_id'])
			{
				$GLOBALS['flag']=true;//這個人已經參加這個比賽了
				$GLOBALS['check_student']=$student_id[$i];
				break;
			}
		}
		
		
	}
}
if($GLOBALS['flag'])//有人已經參加了這個比賽，不成功報名
{
	$sql_delete_all_register_student="DELETE FROM register_student";

	mysqli_query($link,$sql_delete_all_register_student);
	mysqli_close($link);
	echo "student ";
	ECHO $GLOBALS['check_student'];
	echo " has joined this event";
}
else
{
	
	$insert_team="INSERT INTO team(user_id) VALUES('$student_id[0]')";//把第一個參賽者加入

mysqli_query($link,$insert_team);
$get_team_id="SELECT MAX(team_id) AS team_id FROM team ";//獲得team id
$team_latest_id_tmp=mysqli_query($link,$get_team_id);

$team_latest_id=$team_latest_id_tmp->fetch_object()->team_id ;



for($i=0;$i<count($student_id);$i++)
{
	$student_id_temp=$student_id[$i];
	$inset_left_member="INSERT INTO team(team_id,user_id) VALUES('$team_latest_id','$student_id_temp')";//把剩餘的成員加入
	mysqli_query($link,$inset_left_member);
}
$event_test=$_POST['event_id'];
$insert_registration="INSERT INTO registration(event_id,team_id) VALUES('$event_test','$team_latest_id')";
mysqli_query($link,$insert_registration);

//把registration加入

//加入完畢之後把所有候補學生刪除
$sql_delete_all_register_student="DELETE FROM register_student";

mysqli_query($link,$sql_delete_all_register_student);

mysqli_close($link);
printf( "<script>window.location.href='signup.php?event_id=%d'</script>",$_POST['event_id']);
}


?>