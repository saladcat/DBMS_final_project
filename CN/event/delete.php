
<?php
printf("<script LANGUAGE=\"javascript\">
    function firm() {
        //利用对话框返回的值 （true 或者 false）
        if (confirm(\"确定删除？\")) {
            self.location='do_delete.php?id=%s';
        }
        else {
            alert(\"点击了取消\");
            self.location='admin.php';
        }

    }
    firm();
</script>", $_GET['id']);
?>