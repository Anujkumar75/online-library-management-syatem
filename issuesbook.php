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
    echo "Please login first";
    exit;
}

$user_email = base64_decode($_COOKIE['user_login']);

/* user collage id fetch */
$getUser = $db->query("
    SELECT collage_id FROM registration_form 
    WHERE collage_id='$user_email'
");
$user = $getUser->fetch_assoc();
$collage_id = $user['collage_id'];

/* issued books fetch */
$sql = "
SELECT i.*, b.title, b.book_image 
FROM issues_book i
JOIN books b ON b.book_id = i.book_id
WHERE i.collage_id='$collage_id'
ORDER BY i.id DESC
";

$result = $db->query($sql);
?>

<div class="container mt-4">
    <h4 class="mb-3 " style="color: white;">📕 My Issued Books</h4>

    <div class="row g-3">

<?php
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
?>
    <div class="col-12 col-md-6 issues" >
        <div class="card  h-100 issues_book" >
            <div class="row g-0">
                <div class="col-4">
                    <img src="admin/uploads/<?= $row['book_image'] ?>"
                         class="img-fluid rounded-start"
                         style="height:100%;object-fit:cover;">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <h6><?= ucfirst($row['title']) ?></h6>
                        <p class="mb-1">
                            <b>Issue:</b> <?= $row['issues_date'] ?><br>
                            <b>Return:</b> <?= $row['return_date'] ?>
                        </p>

                        <span class="badge bg-<?= 
                            $row['status']=="Issued" ? 'warning' : 'success'
                        ?>">
                            <?= $row['status'] ?>
                        </span>

                        <p class="mt-2 mb-0">
                            <b>Fine:</b> ₹<?= $row['fine'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } } else { ?>
    <p class="text-center text-muted">No issued books found</p>
<?php } ?>

    </div>
</div>

  <footer id="fotter">
    <?php include("nav_and_footer/footer.php");  ?>
   </footer>



    
    
</body>
</html>