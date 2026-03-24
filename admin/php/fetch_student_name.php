<?php
require("db.php");

$collage_id = $_POST['collage_id'];

$get = $db->query("SELECT student_name FROM admission_form WHERE collage_id='$collage_id'");

if($get->num_rows == 1){
    $row = $get->fetch_assoc();
    echo json_encode([
        "status" => "success",
        "student_name" => ucwords($row['student_name'])
    ]);
}else{
    echo json_encode(["status" => "error"]);
}
?>
