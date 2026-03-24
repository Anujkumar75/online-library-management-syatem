<?php
require(("db.php"));

$book_id = $_POST['book_id'];

$sql = $db->query("SELECT * FROM books WHERE id='$book_id'");
$aa=$sql->fetch_assoc();
echo json_encode($aa);
?>