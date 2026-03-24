<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin.css"> 
    <title>Library</title>
</head>
<body>


<!-- ---------------------------------------------------------------------------- -->

<!-- Top Navbar -->
<?php require("navbar_and_footer/nav.php") ?>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <?php require("navbar_and_footer/side_navbar.php") ?>

        <!-- Main Content -->
        <div class="col-md-10 shadow  p-4">

            <h3>All book</h3>
            <p class="text-muted">Overview of system</p>

            <!-- all book -->

            <?php
             require(("php/db.php"));
?>

<h2 class="text-center mt-3">All Books</h2>

<!-- SEARCH -->
<form method="get" class="d-flex mb-3 col-md-6 mx-auto">
  <input type="text" name="search"  class="form-control me-2"
         placeholder="Search by Title / Author / ISBN / Collage ID "
         value="<?php echo $_GET['search'] ?? ''; ?>">
  <button class="btn btn-success">Search</button>
</form>

<!-- BOOK TABLE -->
  <div class="table-responsive" style="max-height:450px; overflow:auto;">
<table class="table table-bordered table-striped text-center table-hover mb-0">
<thead class="table-dark sticky-top text-center">
<tr>
  <th>#</th>
  <th>Book ID</th>
  <th>Image</th>
  <th>Title</th>
  <th>Author</th>
  <th>ISBN</th>
  <th>Category</th>
  <th>Date</th>
    <th>Edit</th>
    <th>Delete</th>
    <th>Issues</th>
</tr>
</thead>

<tbody>
<?php
if(isset($_GET['search']) && $_GET['search']!=""){
    $s = $_GET['search'];
    $sql = "SELECT * FROM books 
            WHERE title LIKE '%$s%' 
            OR book_id LIKE '%$s%'
            OR author LIKE '%$s%' 
            OR isbn LIKE '%$s%'";
}else{
    $sql = "SELECT * FROM books ORDER BY id DESC";
}

$result = $db->query($sql);
$no = 1;

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "
        <tr>
          <td>$no</td>
          <td>{$row['book_id']}</td>
          <td>
            <img src='uploads/{$row['book_image']}' width='60'>
          </td>
          <td>{$row['title']}</td>
          <td>{$row['author']}</td>
          <td>{$row['isbn']}</td>
          <td>{$row['category']}</td>
         
          <td>{$row['created_at']}</td>
          <td><button class='btn btn-primary edit_book' id='".$row['id']."'>Edit</button></td>
          <td><button class='btn btn-danger delete_book' id='".$row['id']."'>Delete</button></td>
          <td><button class='btn btn-success Issues_book' id='".$row['id']."'>Issues</button></td>
        </tr>";
        $no++;
    }
}else{
    echo "<tr><td colspan='12'>No Books Found</td></tr>";
}
?>
</tbody>
</table>
  </div>



        
    </div>  

    <!-- edit  modal -->


    <div class="modal fade" tabindex="-1" id="edit_book">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Book</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form class="edit_frm">
            <div class="form-group">
                <label for="book_name" class="mb-2">Book Name</label>
                <input type="text" class="form-control mb-3" id="edit_book_name" name="book_name">
            </div>

             <div class="form-group">
                <label for="book_name" class="mb-2">Author Name</label>
                <input type="text" class="form-control mb-3" id="author_name" name="author_name">
            </div>

            <!-- <div class="form-group">
                <label for="book_image" class="mb-2">Book Image</label>
                <input type="file" class="form-control mb-3" id="book_image" name="book_image">
            </div> -->

            <div class="form-group">
                <label for="book_isbn" class="mb-2">Book ISBN</label>
                <input type="text" class="form-control mb-3" id="book_isbn" name="book_isbn">
            </div>

            <div class="form-group">
                <label for="book_category" class="mb-2">Book Category</label>
                <select name="category" id="book_category" class="form-control mb-2">
                  <option value="">Select Category</option>
                     <option>Novel</option>
                     <option> History</option>
                     <option>Science</option>
                     <option>AI</option>
                     <option>Competitive exam books</option>
                     <option>Programming / Technical books</option>
                     <option>Life improvement books</option>
                     <option>Other</option>
              </select>
            </div>

            <input type="hidden" id="edit_book_id" name="edit_book_id">
            <button type="submit" class="btn btn-primary update_cat_btn">Update Book</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- delete book -->
<div class="modal fade" tabindex="-1" id="delete_book">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Book</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form class="delete_book">
            <p>Are you sure you want to delete this book?</p>
            <hr>
            <input type="hidden" id="delete_book_id" name="book_id">
            <button type="submit" class="btn btn-danger delete_btn">Delete Book</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- isses book modal -->

  <div class="modal fade" tabindex="-1" id="isses_book">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Issues Book</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form class="Issus_frm">
        <h3>Book details</h3>
            <div class="form-group">
                <label class="mb-2">Book ID</label>
                <input type="text" class="form-control mb-3" id="isses_book_id" readonly name="book_id">
            </div>

            <div class="form-group">
                <label for="book_name" class="mb-2">Book Name</label>
                <input type="text" class="form-control mb-3" id="isses_book_name" disabled name="book_name">
            </div>

             <div class="form-group">
                <label for="book_name" class="mb-2">Author Name</label>
                <input type="text" class="form-control mb-3" id="I_author_name" disabled name="author_name">
            </div>

            <!-- <div class="form-group">
                <label for="book_image" class="mb-2">Book Image</label>
                <input type="file" class="form-control mb-3" id="book_image" name="book_image">
            </div> -->

            <div class="form-group">
                <label for="book_isbn" class="mb-2">Book ISBN</label>
                <input type="text" class="form-control mb-3" id="I_book_isbn" disabled name="book_isbn">
            </div>

           

            <div class="form-group">
                <label for="book_category" class="mb-2">Book Category</label>
                <select name="category" id="I_book_category" disabled class="form-control mb-2">
                   <option value="">Select Category</option>
                   <option>Novel</option>
                   <option> History</option>
                   <option>Science</option>
                   <option>AI</option>
                   <option>Competitive exam books</option>
                   <option>Programming / Technical books</option>
                   <option>Life improvement books</option>
                   <option>Other</option>
              </select>
            </div>

             <div class="form-group mb-3">
                <label >Book Image</label>
                <div>
                  <img src="" id="I_book_image" width="100">
                </div>
            </div>
            <hr>
            <!-- admin deatails -->
             <h3>Admin details</h3>
                  <?php
            if(!empty($_COOKIE['admin_login'])){
              $admin_id=base64_decode($_COOKIE['admin_login']);

               $get_data=$db->query("SELECT admin_name,admin_id FROM admin_rajestion WHERE admin_id='$admin_id'");
               $user_data=$get_data->fetch_assoc();

                   
                   echo "<div class='form-group'>
                   <label for='admin_id' class='mb-2'>Admin ID</label>
                   <input type='text' class='form-control mb-3' readonly id='I_admin_id' name='admin_id' value='".$user_data["admin_id"]."'>
                    </div>
                    
                    <div class='form-group '>
                    <label for='admin_name' class='mb-2'>Admin Name</label>
                    <input type='text' class='form-control mb-3' disabled id='I_admin_name' name='admin_name' value='".ucfirst($user_data["admin_name"])."'>";
             }
             else{
               echo " Please login again";
             }
            ?>
            </div>

            <div class="form-group">
                <label class="mb-2">Password</label>
                <input type="password" class="form-control mb-3"   name="password" placeholder="Password">
            </div>

            <hr>
            <h3>Student details</h3>
            <!-- student fiil you collage id and automatic show name in input box -->
            <div class="form-group">
                <label for="collage_id" class="mb-2">Collage ID</label>
                <input type="text" class="form-control mb-3" id="I_collage_id" name="collage_id" placeholder="Student ID" >
            </div>

            <div class="form-group">
                <label  class="mb-2">Student Name</label>
                <input type="text" class="form-control mb-3" id="I_student_name" name="student_name" readonly >
            </div>
            <hr>
            <h3>Date</h3>
                 
            <div class="form-group">
                <label class="mb-2">Issue Date</label>
                <input type="text"  class="form-control mb-3" id="issue_date" name="issues_data" readonly>
            </div>
                
                 <div class="form-group">
                    <label class="mb-2">Return Date</label>
                 <input type="text"  class="form-control mb-3" id="return_date" name="return_data" readonly>
                 </div>
                 


            <input type="hidden" id="I_book_id" name="edit_book_id">
            <button type="submit" class="btn btn-primary update_cat_btn">Issues Book</button>
        </form>

      </div>
    </div>
  </div>
</div>



 <!-- ----------------------------------------------------------------------------------- -->




  <!-- footer -->
    
<script>
    // edit book fech book
    $(document).ready(function(){
        myModal = new bootstrap.Modal(document.getElementById('edit_book'));
        deleteModal = new bootstrap.Modal(document.getElementById('delete_book'));
        IssuesBookModal = new bootstrap.Modal(document.getElementById('isses_book'));
        $(".edit_book").each(function(){
            $(this).click(function(){
            var book_id = $(this).attr('id');
            $.ajax({
                type:"POST",
                url:"php/fetch_book.php",
                data:{book_id:book_id},
                success:function(response){
                    var data = JSON.parse(response);
                    $("#edit_book_name").val(data.title);
                    $("#author_name").val(data.author);
                    $("#edit_book_id").val(data.id);
                    $("#book_isbn").val(data.isbn);
                    $("#book_category").val(data.category);
                    myModal.show();
                }
            });
        });

        // edit form submit
       

        $(".edit_frm").submit(function(e){
            e.preventDefault();

            $.ajax({
                type:"POST",
                url:"php/update_book.php",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(response){
                    alert(response);
                    location.reload();
                }
            });
        });
    });
    // delete book fech book

    $(".delete_book").each(function(){
            $(this).click(function(){
            var book_id = $(this).attr('id');
            $.ajax({
                type:"POST",
                url:"php/fetch_book.php",
                data:{book_id:book_id},
                success:function(response){
                    var data = JSON.parse(response);
                    $("#delete_book_id").val(data.id);
                    deleteModal.show();
                }
            });
        });

        // delete form submit
       

        $(".delete_book").submit(function(e){
            e.preventDefault();

            $.ajax({
                type:"POST",
                url:"php/delete_book.php",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(response){
                    alert(response);
                    location.reload();
                }
            });
        });
    });

    // Issues book fech book
    $(".Issues_book").each(function(){
            $(this).click(function(){
            var book_id = $(this).attr('id');
            $.ajax({
                type:"POST",
                url:"php/fetch_book.php",
                data:{book_id:book_id},
                success:function(response){
                    var data = JSON.parse(response);
                    $("#isses_book_id").val(data.book_id);
                    $("#isses_book_name").val(data.title);
                    $("#I_author_name").val(data.author);
                    $("#I_book_id").val(data.id);
                    $("#I_book_isbn").val(data.isbn);
                    $("#I_book_category").val(data.category);
                    $("#I_book_image").attr("src","uploads/"+data.book_image);

                    IssuesBookModal.show();
                }
            });
  });

        // Issues form submit
       

        $(".edit_frm").submit(function(e){
            e.preventDefault();

            $.ajax({
                type:"POST",
                url:"php/update_book.php",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(response){
                    alert(response);
                    location.reload();
                }
            });
        });


});
//   student collage id fetch name
    $("#I_collage_id").keyup(function () {

    var collage_id = $(this).val().trim();

    if (collage_id === "") {
        $("#I_student_name").val("");
        return;
    }

    $.ajax({
        type: "POST",
        url: "php/fetch_student_name.php",
        data: { collage_id: collage_id },
        dataType: "json",   // ⭐ important
        success: function (data) {

            if (data.status === "success") {
                $("#I_student_name").val(data.student_name);
            } else {
                $("#I_student_name").val("");
            }

        },
        error: function () {
            alert("Server error");
        }
    });

});

// today Issues date and afeter five days return book
 function formatDate(date){
        let dd = String(date.getDate()).padStart(2, '0');
        let mm = String(date.getMonth() + 1).padStart(2, '0');
        let yyyy = date.getFullYear();
        return dd + "-" + mm + "-" + yyyy;
    }

    // aaj ki date
    let today = new Date();
    $("#issue_date").val(formatDate(today));

    // 5 din baad ki date
    today.setDate(today.getDate() + 5);
    $("#return_date").val(formatDate(today));


    // issuess book submit
    $(".Issus_frm").submit(function(e){
        e.preventDefault();

        $.ajax({
            type:"POST",
            url:"php/book_issues.php",
            data: new FormData(this), 
             contentType:false,
             processData:false,
             success:function(response){
                alert(response);
                 location.reload();
             }

        })
    })

});
</script>

    
</body>
</html>