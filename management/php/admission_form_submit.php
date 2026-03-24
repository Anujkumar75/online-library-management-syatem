<?php
require(("db.php"));

$collage_id=$_POST['collage_id'];
$student_name=$_POST['student_name'];
$father_name=$_POST['father_name'];
$phone=$_POST['phone'];
$course=$_POST['course'];
$address=$_POST['address'];
$dob=$_POST['dob'];

$check_table=$db->query("SELECT * FROM admission_form" );

if($check_table){

    $Check_collageID=$db->query("SELECT collage_id FROM admission_form WHERE collage_id='$collage_id'");

    if($Check_collageID->num_rows!=0){
        echo "Collage ID already exists.";
    }
    else{
         $data_store=$db->query("INSERT INTO admission_form (
        collage_id, 
        student_name,
        father_name,
        dob,
        phone, 
        course, 
        address) 
        VALUES ('$collage_id',
         '$student_name',
          '$father_name',
            '$dob',
            '$phone',
             '$course',
              '$address')");

        if($data_store){
            echo "success";
        }
        else{
            echo "Error submitting form.";
        }
       
    }

    }
    


else{
    $create_table=$db->query("CREATE TABLE admission_form(
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        collage_id VARCHAR(50) NOT NULL,
        student_name VARCHAR(100) NOT NULL,
        father_name VARCHAR(100) NOT NULL,
       
        dob DATE NOT NULL,
        phone VARCHAR(15) NOT NULL,
        course VARCHAR(50) NOT NULL,
        address TEXT NOT NULL,
        submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    if($create_table){
        $data_store=$db->query("INSERT INTO admission_form (
        collage_id, 
        student_name,
        father_name,
        dob,
        phone, 
        course, 
        address) 
        VALUES ('$collage_id',
         '$student_name',
          '$father_name',
            '$dob',
            '$phone',
             '$course',
              '$address')");

        if($data_store){
            echo "succeess";
        }
        else{
            echo "Error submitting form.";
        }
         
    }
    else{
        echo "Error creating table: " . $db->error;
    }
}
?>