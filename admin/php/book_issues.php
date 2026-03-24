<?php
require(("db.php"));

$book_id=$_POST['book_id'];
// $admin_name=$_POST['admin_name'];
$admin_id=$_POST['admin_id'];
$admin_password=md5($_POST['password']);
$collage_id=$_POST['collage_id'];
$student_name=$_POST['student_name'];
$issues_date=$_POST['issues_data'];
$return_date=$_POST['return_data'];

// ✅ date convert (dd-mm-yyyy → yyyy-mm-dd)
$issues_date = date("Y-m-d", strtotime($issues_date));
$return_date = date("Y-m-d", strtotime($return_date));

$check_table=$db->query("SELECT * FROM issues_book");

$check_password=$db->query("SELECT password FROM admin_rajestion WHERE password='$admin_password'");
if($check_password->num_rows!=0){
    // echo "password match";
    if($check_table)
     {
       $data_store=$db->query("INSERT INTO issues_book(
       book_id,
       collage_id,
       student_name,
       admin_id,
       issues_date,
       return_date)
       VALUES('$book_id',
       '$collage_id',
       '$student_name',
       '$admin_id',
       '$issues_date',
       '$return_date')");

       if($data_store){
        echo "success";

       }
       else{
       echo "data not store";
       }
      
     }
     else{
         $create_table=$db->query("CREATE TABLE issues_book(
         id INT(11) AUTO_INCREMENT PRIMARY KEY,
         book_id VARCHAR(50) NOT NULL,
         collage_id VARCHAR(100) NOT NULL,
         student_name VARCHAR(100) NOT NULL,
         admin_id VARCHAR(20) NOT NULL,
         issues_date DATE NOT NULL,
         return_date DATE NOT NULL,
         status VARCHAR(20) DEFAULT 'Issued',
         issues_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP

         )");
   
          if($create_table){
           echo "Table create successfully.";
          }
          else
          {
            echo " table not create";
          }
      }
    }
  else
      {
        echo "not match";
      }

?>