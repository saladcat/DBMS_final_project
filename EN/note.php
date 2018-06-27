<html>
<head>
<br>
<br>
<br>

<style type="text/css">
body {background-color: #D4E6F1;}
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

</style>
</head>

<body>

<div style="background-color:#A9CCE3;color:#5499C7;text-align:center;border:5px dashed #EAF2F8">
<h1>Simple Database<h1>
</div>
<br>
<br>
<form action="<?php echo htmlspecialchars("http://ss.cs.nthu.edu.tw/~ux1067173/db2.php");?>" method="post">
 <div style="text-align:center">
 <button class="button" type="submit"><b><b>Enter</b></b></button>
 </div>
</form>


</body>
</html>
