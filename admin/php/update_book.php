<?php
require(("db.php"));
$book_id = $_POST['edit_book_id'];
$book_name = $_POST['book_name'];
$author_name = $_POST['author_name'];
$isbn = $_POST['book_isbn'];
$category = $_POST['category'];
$update_sql = $db->query("UPDATE books SET title='$book_name', author='$author_name', isbn='$isbn', category='$category' WHERE id='$book_id'");
if($update_sql){
    echo "Book Updated Successfully";
} else {
    echo "Error in Updating Book";
}
?>