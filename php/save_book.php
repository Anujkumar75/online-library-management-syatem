<?php
require("db.php");

$user_email = base64_decode($_COOKIE['user_login']);
$book_id = $_POST['book_id'];

/*  Check table exists */
$tableCheck = $db->query("SHOW TABLES LIKE 'wishlist'");

if($tableCheck->num_rows == 0){

    /*  Create table if not exists */
    $createTable = "
        CREATE TABLE wishlist (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_email VARCHAR(100) NOT NULL,
            book_id VARCHAR(50) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";

    if(!$db->query($createTable)){
        echo "Table creation failed";
        exit;
    }
}

/*  Check duplicate entry */
$check = $db->query("
    SELECT * FROM wishlist 
    WHERE user_email='$user_email' 
    AND book_id='$book_id'
");

if($check->num_rows > 0){
    echo "Already saved ";
    exit;
}

/*  Insert data */
$insert = $db->query("
    INSERT INTO wishlist(user_email, book_id)
    VALUES('$user_email','$book_id')
");

if($insert){
    echo "success";
}else{
    echo "Failed to save book";
}
?>
