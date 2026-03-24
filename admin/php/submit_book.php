<?php
require(("db.php"));
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $category = $_POST['category'];

   $book_name=$_FILES['book_image']['name'];
   $temp_address=$_FILES['book_image']['tmp_name'];

   $check_table=$db->query("SELECT * FROM books");

    if($check_table){
        $checkk_bookID=$db->query("SELECT book_id FROM books WHERE book_id='$book_id'");
        if($checkk_bookID->num_rows!=0){
            echo "Book ID already exists.";
        }
        else{
            $upload_path="../uploads/".$book_name;
            move_uploaded_file($temp_address,$upload_path);

            $data_store=$db->query("INSERT INTO books(
            book_id,
            title,
            author,
            isbn,
            category,
            book_image)
            VALUES ('$book_id',
            '$title',
            '$author',
            '$isbn',
            '$category',
            '$upload_path')");

            if($data_store){
                echo "Book added successfully.";
            }
            else{
                echo "Error adding book.";
            }
        }

    }
    else{
        $create_table=$db->query("CREATE TABLE books(
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            book_id VARCHAR(50) NOT NULL,
            title VARCHAR(100) NOT NULL,
            author VARCHAR(100) NOT NULL,
            isbn VARCHAR(50) NOT NULL,
            category VARCHAR(50) NOT NULL,
            book_image VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        if(!$create_table){
            echo "Error creating books table.";
            exit();
        }
    }



    
?>