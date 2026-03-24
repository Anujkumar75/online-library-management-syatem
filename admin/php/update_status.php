<?php
require(("db.php"));
$id=$_GET['id'];
$status=$_GET['s'];
$update_query="UPDATE registration_form SET status='$status' WHERE collage_id='$id'";
$update_result=mysqli_query($db,$update_query);
if($update_result){
    echo "Status updated successfully.";
}
else{
    echo "Error updating status.";
}
?>