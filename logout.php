<?php
setcookie("user_login","",time()-(86400*30),"/");

header("Location:index.php")
?>