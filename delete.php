<?php
					$link=mysqli_connect("localhost","root","root");
						if(!$link)
							echo "database fail<br>";
					mysqli_select_db($link,"mytest");
					$id = $_GET['id'];
					$event_id=$_GET['event_id'];
					 $get_result = "DELETE FROM register_student WHERE user_id=$id AND event_id=$event_id;";
					mysqli_query($link,$get_result);
					mysqli_close($link);
							
					printf( "<script>window.location.href='signup.php?event_id=%d'</script>",$_GET['event_id']);
							
				?>