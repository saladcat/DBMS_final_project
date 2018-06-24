<html>
<head>
<!-- CSS -->
<style type="text/css">
body {background-color: #D4E6F1;}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #5499C7
tr:hover {background-color:#5499C7;}

th {
    background-color: #5499C7;
    color: white;
}

</style>
</head>

<?php
$dbh=new PDO('sqlite:db/note.db'); 
//mysql用：
// try {
    // $dbh = new PDO('mysql:host=ss.cs.nthu.edu.tw;dbname=ux1067173', ‘ux1067173’, '123');
    // foreach($dbh->query('SELECT * from FOO') as $row) {
        // print_r($row);
    // }
    // $dbh = null;
// } catch (PDOException $e) {
    // print "Error!: " . $e->getMessage() . "<br/>";
    // die();
// }

if($_SERVER['REQUEST_METHOD']=='POST'){
	if($_POST['action']=="Delete"){
		$sth=$dbh->prepare('DELETE FROM note WHERE id = ?');
		if(isset($_POST['del'])){
			foreach($_POST['del'] as $x){
				$sth->execute(array($x));
			}
		}
	}else if($_POST['action']=="Add"){
		$sth=$dbh->prepare('INSERT INTO note (id,text) VALUES (?,?)');//检测到post往数据库中添加数据
		$sth->execute(array($_POST['id'],$_POST['text']));//用post输入的数据替换？，？
	}
	header('Location:db2.php');
	exit();
}
?>
<div style="background-color:#A9CCE3;color:#5499C7;text-align:center;border:2px dashed #EAF2F8">
<div style="text-align:center">
 <h2>ADD:<h2>
 </div>
<form method="POST">
<div style="text-align:center"> 
<div class="col-25">
<label class="lb" style="text-align:justify">ID</label>
</div>
<div class="col-75">
<textarea class="bar" name="id" placeholder="Enter the new id"></textarea><br>
</div>
<div class="col-25">
<label calss="lb" style="text-align:justify">NAME</label>
</div>
<div class="col-75">
<textarea class="bar" name="text" placeholder="Enter the corresponding name"></textarea>
</div>  
<style type="text/css">
.lb {
	padding: 12px 12px 12px 0;
    display: inline-block; 
}
.bar {
	width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 60%;
    margin-top: 6px;
}
</style>
<br>
<br>
<div style="text-align:center">
 <button class="button" type="submit" name="action" value="Add"><b><b>ADD</b></b></button>
 </div>
</div>
<br>
<br>
</form>
<style type="text/css">
.button {
    background-color: #5499C7;
    border: none;
    color: #EAF2F8;
    padding: 14px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	border-radius: 12px;
	-webkit-transition-duration: 0.4s; 
	opacity: 0.6;
    transition-duration: 0.4s;
}
.button:hover {
	opacity: 1;
    background-color: #5499C7; 
    color: white;
}
 
}


</style>
<form method = "POST">

<?php
$sth=$dbh->prepare('SELECT * from note');
$sth->execute();
?>

<div style="text-align:center" color= white>
 <p>*Please add new data and make sure the id and name are corresponding</p>
 </div>

<!-- Table -->
<div style="text-align:center;border:5px dashed #EAF2F8">

<table>
<tr>
    <th>ID</th><th>NAME</th><th>DELETE</th>
</tr>
<?php
$sth=$dbh->prepare('SELECT * from note');//从note table里面把所有的数据都取出来
$sth->execute();//sth句柄中一行一行拿出来
while($row=$sth->fetch()){?>
<tr onmouseover="this.style.backgroundColor='#5499C7';" onmouseout="this.style.backgroundColor='#EAF2F8';">
    <td><?php echo htmlspecialchars($row['id']) ?></td><td><?php echo htmlspecialchars($row['text']) ?></td><td><?php echo '<input type="checkbox" name="del[]" value="'.$row['id'].'">' ?></td>
	
	
	<?php
}
?>
</table>

</div>
<div style="text-align:center">
 <button class="button" type="submit" name="action" value="Delete"><b><b>DELETE</b></b></button>
 </div>
 </form>
</html>