<?php
						//进行提交新队员的操作，需要连接数据库，往数据库里添加新的成员
					$student_id="";
					$link=mysqli_connect("localhost","root","474102");
						if(!$link)
							echo "database fail<br>";
					mysqli_select_db($link,"mytest");
					if($_SERVER["REQUEST_METHOD"] == "POST")
					{
						if(!empty($_POST["student_id"]))
						{
							$event_id=$_GET['event_id'];
							$student_id=$_POST["student_id"];
							
							$look_for_name="SELECT user_name  FROM user WHERE user_id= '$student_id'";
							$student_name_tmp=mysqli_query($link,$look_for_name);//查詢學生id,并把那個學生的data插入另外一個
							//$student_name=$student_name_tmp->fetch_object()->user_name;
							$student_name=$student_name_tmp->fetch_object();
							
							if(count($student_name)>0)
							{
								$student_name=$student_name->user_name;
								if($student_name!=null)
								{							
									$insert_register="INSERT ignore INTO register_student(user_id,user_name,event_id) VALUES('$student_id','$student_name','$event_id')";
									//把這個學生放進去暫時註冊的表格
									mysqli_query($link,$insert_register);
									//把這個同學加入已經報名這個隊伍的table
									//把已經報名的同學顯示出來
									mysqli_close($link);
									printf( "<script>window.location.href='signup.php?event_id=%d'</script>",$event_id);
								}
								else
									echo "this student not exist";
							}
							else
							{
								echo "this student not exist";
							}
							
							
							
							
							//printf( "<script>window.location.href='signup.php?event_id=%d'</script>",$event_id);
							
						}
						if(!empty($_POST["student_edit_id"]))//修改學生
						{
							$original_student_id=$_POST["original_student_id"];
							$student_edit_id=$_POST["student_edit_id"];
							$event_id=$_POST['event_id'];
							
							$look_for_name="SELECT user_name  FROM user WHERE user_id= '$student_edit_id'";
							$student_name_tmp=mysqli_query($link,$look_for_name);//查詢學生id,并把那個學生的data插入另外一個
							
							$student_name=$student_name_tmp->fetch_object();
							var_dump(count($student_name));
							if(count($student_name)>0)
							{
								$student_name=$student_name->user_name;
								if($student_name!=null)
								{
								$delete_student="DELETE FROM register_student WHERE user_id='$original_student_id' AND event_id='$event_id'";
								$insert_register="INSERT ignore INTO register_student(user_id,user_name,event_id) VALUES('$student_edit_id','$student_name','$event_id')";
								mysqli_query($link,$delete_student);
								mysqli_query($link,$insert_register);
								mysqli_close($link);
								printf( "<script>window.location.href='signup.php?event_id=%d'</script>",$event_id);
								}
								else
									echo "this student not exist";
							
							}
							else
							{
								echo "this student not exist";
							}
							
								
						}
						
					}
							mysqli_close($link);
							
							
							
				?>