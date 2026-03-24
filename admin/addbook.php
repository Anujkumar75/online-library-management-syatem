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

            <h3>Add Book</h3>
            <p class="text-muted">Overview of system</p>

            <!-- add book form -->

            <form class="book_form shadow p-4 row ">
  <h2>Add Book</h2>
  <hr>
    <div class="col-md-6">
    <label class="form-label">Book ID</label>
    <input type="text" name="book_id" class="form-control mb-2" placeholder="Book ID" required>
   </div>


   <div class="col-md-6">
    <label class="form-label">Book Title</label>
    <input type="text" name="title" class="form-control mb-2" placeholder="Book Title" required>
   </div>

  
   <div class="col-md-6">
    <label class="form-label">Author Name</label>
    <input type="text" name="author" class="form-control mb-2" placeholder="Author Name" required>
   </div> 

   <div class="col-md-6">
    <label class="form-label">ISBN Number</label>
    <input type="text" name="isbn" class="form-control mb-2" placeholder="ISBN Number" required>
   </div> 

  
 <div class="col-md-6">
    <label class="form-label">Book Category</label>
    <select name="category" class="form-control mb-2">
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
      

    <div class="col-md-6">
    <label class="form-label">Book Image</label>

  <input type="file" name="book_image" class="form-control mb-3" accept="image/*" required>
    </div>

  <button class="btn btn-primary book_btn" type="submit">Add Book</button>
</form>

<div class="msg mt-3"></div>


       

        
    </div>  

 <!-- ----------------------------------------------------------------------------------- -->




  <!-- footer -->
    

<script>
  $(document).ready(function(){
    $(".book_form").submit(function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url:"php/submit_book.php",
            data: new FormData(this),
            contentType:false,
            processData:false,
            success:function(response){
               alert(response);
            }
        });
    });
  });
    
</script>

    
</body>
</html>