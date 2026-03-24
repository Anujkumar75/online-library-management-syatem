<?php
require("db.php");

$user_email = base64_decode($_COOKIE['user_login']);
$book_id = $_POST['book_id'];

$delete = $db->query("
    DELETE FROM wishlist 
    WHERE user_email='$user_email' 
    AND book_id='$book_id'
");

if($delete){
    echo "removed";
}else{
    echo "error";
}
