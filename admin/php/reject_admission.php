<?php
require(("db.php"));
$id=$_POST['admission_id'];
$btn_type=$_POST['btn_type'];

$update_query="UPDATE registration_form SET $btn_type='Rejected' WHERE id='$id'";

$update_result=mysqli_query($db,$update_query);

echo $update_query? "Admission rejected successfully." : "Error approving admission.";
?>