<?php
require(("db.php"));

$admin_id =$_POST['admin_id'];
$admin_name=$_POST['admin_name'];
$password=md5($_POST['password']);
$father_name=$_POST['father_name'];
$phone=$_POST['phone'];
$address=$_POST['address'];


$check_table=$db->query("SELECT * FROM admin_rajestion");

if($check_table){

    $check_adminID=$db->query("SELECT admin_id FROM admin_rajestion WHERE admin_id='$admin_id'");
    if($check_adminID->num_rows!=0){
        echo "Admin ID already exists.";
    }
    else{
         $data_store=$db->query("INSERT INTO admin_rajestion (
        admin_id,
        admin_name,
        father_name,
        phone,
        address,
        password)
        VALUES ('$admin_id',
         '$admin_name',
          '$father_name',
          '$phone',
          '$address',
          '$password')");

          if($data_store){
            echo "success";
          }
          else{
            echo "Error submitting form.";
          }
    }
     
}
else{
    $create_table=$db->query("CREATE TABLE admin_rajestion(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    admin_id VARCHAR(11) NOT NULL,
    admin_name VARCHAR(100) NOT NULL,
    father_name VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    address VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
    )");

    if($create_table)
    {
        $data_store=$db->query("INSERT INTO admin_rajestion (
        admin_id,
        admin_name,
        father_name,
        phone,
        address,
        password)
        VALUES ('$admin_id',
         '$admin_name',
          '$father_name',
          '$phone',
          '$address',
          '$password')");

          if($data_store){
            echo "success";
          }
          else{
            echo "Error submitting form.";
          }
    }
    else{
        echo "table not create";
    }
}
?>