<?php
require("../database/database.php");
$id = $_GET['id'];
$sql = "UPDATE event SET is_delete = true WHERE id=$id;";
$conn->query($sql);
?>
<script LANGUAGE="javascript">
    alert("删除成功");
    self.location = 'admin.php';
</script>