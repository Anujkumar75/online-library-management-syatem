<?php
setcookie("admin_login","",time()-(86400*30),"/");
header("location:../index.php")
?>