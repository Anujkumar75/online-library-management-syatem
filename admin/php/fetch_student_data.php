<?php
require("db.php");

$collage_id = $_POST['collage_id'] ?? '';

$response = [];

if($collage_id != ""){

    $collage_id = $db->real_escape_string($collage_id);

    $sql = "SELECT student_name, father_name, phone, course ,address,dob
            FROM admission_form 
            WHERE collage_id='$collage_id'";

    $result = $db->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        $response = [
            "status" => "success",
            "student_name" => ucwords($row['student_name']),
            "father_name"  => ucwords($row['father_name']),
            "phone"        => $row['phone'],
            "course"       => $row['course'],
            "address"      => $row['address'],
            "dob"          => $row['dob']
        ];
    } else {
        $response = ["status" => "not_found"];
    }
}

echo json_encode($response);
