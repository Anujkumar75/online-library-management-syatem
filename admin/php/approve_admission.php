<?php
require(("db.php"));
$id=$_POST['admission_id'];
$btn_type=$_POST['btn_type'];

$update_query="UPDATE registration_form SET $btn_type='Approved' WHERE id='$id'";

$update_result=mysqli_query($db,$update_query);

echo $update_query? "Admission approved successfully." : "Error approving admission.";
?>