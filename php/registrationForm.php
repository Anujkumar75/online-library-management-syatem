<?php
require(("db.php"));

$collage_id=$_POST['Collage_ID'];
$email=$_POST['email'];
$student_name=$_POST['name'];
$father_name=$_POST['father_name'];
$course=$_POST['Course'];
$phone_no=$_POST['phone_no'];
$dob=$_POST['dob'];
$password=$_POST['Password'];
$C_password=$_POST['C_password'];

if($password==$C_password && $password!=""){

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
            email,
            student_name,
            father_name,
            course,
            phone_no,
            DOB,
            password)
            VALUES ('$collage_id',
            '$email',
            '$student_name',
            '$father_name',
            '$course',
            '$phone_no',
            '$dob',
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

    else
    {
        $create_table=$db->query("CREATE TABLE registration_form(
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        collage_id VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        student_name VARCHAR(100) NOT NULL,
        father_name VARCHAR(100) NOT NULL,
        course VARCHAR(50) NOT NULL,
        phone_no VARCHAR(15) NOT NULL,
        DOB DATE NOT NULL,
        password VARCHAR(20) NOT NULL,
        submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        if($create_table){
            $data_store=$db->query("INSERT INTO registration_form(
            collage_id,
            email,
            student_name,
            father_name,
            course,
            phone_no,
            DOB,
            password)
            VALUES ('$collage_id',
            '$email',
            '$student_name',
            '$father_name',
            '$course',
            '$phone_no',
            '$dob',
            '$password')");

            if($data_store){
                echo "success";
            }
            else{
                echo "Error Submitting form.";
            }
        }
        else
        {
            echo "Error creating table: " . $db->error;
        }
        
       
    }
 }
 else{
    echo "Do not match password !";
 }

?>