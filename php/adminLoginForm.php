<?php
require(("db.php"));

$admin_id=$_POST['Admin_Id'];
$admin_password=md5($_POST['Password']);

$check_admin=$db->query("SELECT admin_id FROM admin_rajestion WHERE admin_id='$admin_id'");

if($check_admin->num_rows!=0){
    $check_password=$db->query("SELECT admin_id,password FROM admin_rajestion WHERE admin_id='$admin_id' and password='$admin_password'");
    if($check_password->num_rows!=0){

        $c_admin=base64_encode($admin_id);
        $c_time=time()+(86400*30); // 30 days
        setcookie("admin_login",$c_admin,$c_time,"/");

        echo "success";
    }
    else{
        echo "Wrong Password.";
    }
}
else{
    echo "Not found Admin.";
}
?>