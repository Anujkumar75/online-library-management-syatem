<?php
require(("db.php"));

$collage_id=$_POST['Collage_id'];
$student_name=$_POST['student_name'];
$father_name=$_POST['father_name'];
$dob=$_POST['dob'];
$phone=$_POST['phone_number'];
$email=$_POST['email'];
$course=$_POST['Course'];
$address=$_POST['address'];
$password=md5($_POST['password']);
$confirm_password=md5($_POST['confirm_password']);



if($password==$confirm_password && $password!=""){

      $check_table=$db->query("SELECT * FROM registration_form");

    if($check_table){
        $check_collagID=$db->query("SELECT collage_id FROM admission_form WHERE collage_id='$collage_id'");

        if($check_collagID->num_rows!=0){
            $check_rCollageID=$db->query("SELECT collage_id FROM registration_form WHERE collage_id='$collage_id'");
            if($check_rCollageID->num_rows!=0){
                echo "Student already Registered.";
            }
            else{
            $data_store=$db->query("INSERT INTO registration_form(
            collage_id,
            student_name,
            father_name,
            dob,
            email,
            phone_no,
            course,
            address,
            password)
            VALUES ('$collage_id',
            '$student_name',
            '$father_name',
            '$dob',
            '$email',
            '$phone',
            '$course',
            '$address',
            '$password')");

            if($data_store){
                echo "success";
            }
            else{
                echo "Error Submitting form.";
            }
        
            
        }
    }

        else{
            echo "Wrong collage ID";
        }
    }

    else{
        $create_table=$db->query("CREATE TABLE registration_form(
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            collage_id VARCHAR(50) NOT NULL,
            student_name VARCHAR(100) NOT NULL,
            father_name VARCHAR(100) NOT NULL,
            dob DATE NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone_no VARCHAR(15) NOT NULL,
            course VARCHAR(50) NOT NULL,
            address TEXT NOT NULL,
            password VARCHAR(255) NOT NULL,
            status ENUM('Pending','Approved','Rejected') DEFAULT 'Pending',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

        )");

        if($create_table){
            echo "Table created successfully. Please resubmit the form.";
        }
        else{
            echo "Error creating table.";
        }
    }
}
?>