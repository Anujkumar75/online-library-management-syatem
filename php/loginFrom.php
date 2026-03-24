<?php
require(("db.php"));

$collage_id=$_POST['collage_Id'];
$password=md5($_POST['Password']);

$check_email=$db->query("SELECT collage_id FROM registration_form WHERE collage_id='$collage_id'");


if($check_email->num_rows!=0){
    $check_password=$db->query("SELECT collage_id,password FROM registration_form WHERE collage_id='$collage_id' and password='$password'");
    if($check_password->num_rows!=0){

        $c_email=base64_encode($collage_id);
        $c_time=time()+(86400*30); // 30 days
        setcookie("user_login",$c_email,$c_time,"/");

        echo "success";
    }
    else{
        echo "Wrong Password.";
    }
}
else{
    echo "User not registered.";
}


?>