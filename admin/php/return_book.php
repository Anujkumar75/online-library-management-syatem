<?php
require("db.php");

$id = $_POST['id'];

$get = $db->query("SELECT return_date FROM issues_book WHERE id='$id'");
$row = $get->fetch_assoc();

$today = date("Y-m-d");
$return_date = $row['return_date'];

$late_days = floor((strtotime($today) - strtotime($return_date)) / 86400);

$fine = ($late_days > 0) ? $late_days * 5 : 0;

$db->query("UPDATE issues_book SET 
    actual_return_date='$today',
    fine='$fine',
    status='Returned'
    WHERE id='$id'
");

echo ($fine>0)
    ? "Returned Late ❌ | Fine ₹$fine"
    : "Returned Successfully ✅";
