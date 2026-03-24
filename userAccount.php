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
    <link rel="stylesheet" href="css/homePage.css"> 
    <title>Library</title>
</head>
<body>
    <?php include("nav_and_footer/nav.php") ?>

<?php
require("php/db.php");

if(empty($_COOKIE['user_login'])){
    header("location:login.php");
    exit;
}

$user_email = base64_decode($_COOKIE['user_login']);

/* USER DATA */
$user = $db->query("SELECT * FROM registration_form WHERE collage_id='$user_email'")->fetch_assoc();
$collage_id = $user['collage_id'];

/* COUNTS */
$issued = $db->query("SELECT COUNT(*) c FROM issues_book 
                      WHERE collage_id='$collage_id' AND status='Issued'")
                      ->fetch_assoc()['c'];

$returned = $db->query("SELECT COUNT(*) c FROM issues_book 
                        WHERE collage_id='$collage_id' AND status='Returned'")
                        ->fetch_assoc()['c'];

$saved = $db->query("SELECT COUNT(*) c FROM wishlist 
                     WHERE user_email='$user_email'")
                     ->fetch_assoc()['c'];

$fine = $db->query("SELECT SUM(fine) f FROM issues_book 
                    WHERE collage_id='$collage_id'")
                    ->fetch_assoc()['f'];
$fine = $fine ?? 0;
?>



<div class="container mt-4">

<h3 class="mb-3" style="color: white;">👤 My Account</h3>

<!-- PROFILE CARD -->
<div class="card shadow mb-4 user_details">
 <div class="card-body">
  <h5 class="mb-3">Profile Information</h5>
  <p><b>Name:</b> <?= ucwords($user['student_name']) ?></p>
  <p><b>College ID:</b> <?= $user['collage_id'] ?></p>
  <p><b>Email:</b> <?= $user['email'] ?></p>
  <p><b>Course:</b> <?= $user['course'] ?></p>
  <p><b>Phone:</b> <?= $user['phone_no'] ?></p>
 </div>
</div>

<!-- SUMMARY CARDS -->
<div class="row text-center mb-4 ">
 <div class="col-6 col-md-3 mb-2 ">
  <div class="card user_details">
   <div class="card-body">
    <h6>Issued</h6>
    <h3><?= $issued ?></h3>
   </div>
  </div>
 </div>

 <div class="col-6 col-md-3 mb-2">
  <div class="card user_details">
   <div class="card-body">
    <h6>Returned</h6>
    <h3><?= $returned ?></h3>
   </div>
  </div>
 </div>

 <div class="col-6 col-md-3 mb-2">
  <div class="card user_details">
   <div class="card-body">
    <h6>Saved</h6>
    <h3><?= $saved ?></h3>
   </div>
  </div>
 </div>

 <div class="col-6 col-md-3 mb-2">
  <div class="card user_details">
   <div class="card-body">
    <h6>Total Fine</h6>
    <h3>₹<?= $fine ?></h3>
   </div>
  </div>
 </div>
</div>

<!-- ISSUED BOOKS -->
<div class="card user_details">
 <div class="card-body">
  <h5 class="mb-3">📚 My Issued Books</h5>

  <div class="table-responsive">
   <table class="table table-bordered table-striped">
    <thead class="table-dark text-center" >
     <tr style="color: white;">
      <th>Book ID</th>
      <th>Issue Date</th>
      <th>Return Date</th>
      <th>Status</th>
      <th>Fine</th>
     </tr>
    </thead>
    <tbody>
<?php
$res = $db->query("SELECT * FROM issues_book 
                   WHERE collage_id='$collage_id' 
                   ORDER BY id DESC");

if($res->num_rows>0){
 while($r=$res->fetch_assoc()){
?>
<tr class="text-center" style="color: white;">
 <td><?= $r['book_id'] ?></td>
 <td><?= $r['issues_date'] ?></td>
 <td><?= $r['return_date'] ?></td>
 <td>
  <span class="badge bg-<?= $r['status']=="Issued"?'warning':'success' ?>">
   <?= $r['status'] ?>
  </span>
 </td>
 <td>₹<?= $r['fine'] ?></td>
</tr>
<?php }} else { ?>
<tr>
 <td colspan="5" class="text-center">No books found</td>
</tr>
<?php } ?>
    </tbody>
   </table>
  </div>
 </div>
</div>

<a href="logout.php" class="btn btn-danger w-100 mt-4">Logout</a>

</div>


  <footer id="fotter">
    <?php include("nav_and_footer/footer.php");  ?>
   </footer>


   
    
</body>
</html>