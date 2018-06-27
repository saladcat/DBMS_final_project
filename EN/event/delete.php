<script LANGUAGE="javascript">
    function firm() {
        //利用对话框返回的值 （true 或者 false）
        if (confirm("确定删除？")) {
            alert("删除成功");
            <?php
            require("../database/database.php");
            $id = $_GET['id'];
            $sql = "UPDATE event SET is_delete = true WHERE id=$id;";
            $conn->query($sql);
            ?>
        }
        else {
            alert("点击了取消");
        }
    }

    firm();
    history.go(-1);
</script>

