<?php
require(("db.php"));

$book_id = $_POST['book_id'];

// image delete from folder
$imgsql = $db->query("SELECT * FROM books WHERE id='$book_id'");
$imgdata=$imgsql->fetch_assoc();
$imgpath = "../uploads/".$imgdata['book_image'];
if(file_exists($imgpath)){
    unlink($imgpath);
} 

// delete book from database  

$sql = $db->query("DELETE FROM books WHERE id='$book_id'");
if($sql){
    echo "Book Deleted Successfully";
} else {
    echo "Error Deleting Book";
}  




?>