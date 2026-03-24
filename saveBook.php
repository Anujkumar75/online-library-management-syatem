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

$user_email = base64_decode($_COOKIE['user_login']);

/* table check */
$check = $db->query("SHOW TABLES LIKE 'wishlist'");
if($check->num_rows==0){
    echo "No saved books found";
    exit;
}

/* fetch saved books */
$sql = "
SELECT b.* FROM wishlist w
JOIN books b ON b.book_id = w.book_id
WHERE w.user_email='$user_email'
ORDER BY w.id DESC
";

$result = $db->query($sql);
?>

<div class="container mt-4">
    <h4 class="mb-3" style="color: white;">❤️ My Saved Books</h4>

    <div class="row g-3">

<?php
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
?>
    <div class="col-6 col-md-3 save">
        <div class="card  h-100 save_book">
            <img src="admin/uploads/<?= $row['book_image'] ?>"
                 class="card-img-top"
                 style="object-fit:cover">

            <div class="card-body text-center">
                <h6><b>Book : </b><?= ucfirst($row['title']) ?></h6>
                <small><b>Author  :</b><?= $row['author'] ?></small>
                <div class="card-footer text-center">
                <button class="btn btn-sm btn-danger mt-2 unsaveBtn"
                        data-book="<?= $row['book_id'] ?>">
                    Unsave
                </button>
                </div>
            </div>
        </div>
    </div>

    <div class="msg d-none"></div>

<?php } } else { ?>
    <p class="text-center text-muted">No saved books</p>
<?php } ?>

    </div>
</div>

  <footer id="fotter">
    <?php include("nav_and_footer/footer.php");  ?>
   </footer>


<script>
$(document).on("click",".unsaveBtn",function(){
    if(!confirm("Remove this book from saved?")) return;

    var btn = $(this);
    var book_id = btn.data("book");

    $.post("php/unsave_book.php",{book_id:book_id},function(res){
        if(res==="removed"){
            btn.closest(".col-6").fadeOut(300);
            var div=document.createElement("DIV");
            $(div).addClass("alert alert-success fs-2 text-center p-5");
            $(div).html("<i class='fa fa-trash display-1'></i><br> Book Remove");
            $(".msg").html(div)
            $(".msg").removeClass("d-none");

            setTimeout(function(){
                $(".msg").addClass("d-none");
                
            },1500)

        }else{
            alert(res);
              var div=document.createElement("DIV");
                    $(div).addClass("alert alert-danger fs-2 text-center p-5");
                    $(div).html("<i class='fa-solid fa-triangle-exclamation display-1'></i><br>"+res);
                    $(".msg").html(div)

                    $(".msg").removeClass("d-none");

                    setTimeout(function(){
                      $(".msg").addClass("d-none");
                    
                    } ,1500)
        }
    });
});
</script>




    
    
</body>
</html>