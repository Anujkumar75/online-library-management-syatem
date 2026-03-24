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

$search   = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';

$sql = "SELECT * FROM books WHERE 1";

if($search!=""){
    $sql .= " AND (title LIKE '%$search%' 
               OR author LIKE '%$search%' 
               OR isbn LIKE '%$search%')";
}

if($category!=""){
    $sql .= " AND category='$category'";
}

$sql .= " ORDER BY id DESC";
$result = $db->query($sql);

// category list
$catResult = $db->query("SELECT DISTINCT category FROM books");
?>

<div class="container mt-4">

    <h3 class="mb-4" style="color: white;">📚 Search All Books</h3>

    <!-- SEARCH + CATEGORY -->
    <form class="row mb-4">
        <div class="col-md-5 mb-2">
            <input type="text" name="search"
                   value="<?= $search ?>"
                   class="form-control"
                   placeholder="Search Book / Author / ISBN">
        </div>

        <div class="col-md-4 mb-2">
            <select name="category" class="form-select">
                <option value="">-- Select Category --</option>
                <?php while($cat=$catResult->fetch_assoc()){ ?>
                <option value="<?= $cat['category'] ?>"
                    <?= ($category==$cat['category'])?'selected':'' ?>>
                    <?= $cat['category'] ?>
                </option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-3 mb-2">
            <button class="btn btn-primary w-100">Search</button>
        </div>
    </form>

    <!-- BOOK CARDS -->
    <div class="row">
    <?php if($result->num_rows>0){
        while($row=$result->fetch_assoc()){ ?>
        <div class="col-6 col-md-3  mb-4 card_s ">
            <div class="card shadow card_search" style="width: 100%; height:100%;">

                <img src="admin/uploads/<?= $row['book_image'] ?>"
                     class="card-img-top img-fluid"
                     style=" object-fit:cover;">

                <div class="card-body">
                    <h6 class="fw-bold "><?= ucwords($row['title']) ?></h6>
                    <p class="small mb-1"><b>Author  :</b> <?= ucwords($row['author']) ?></p>
                    <p class=" small mb-1"><b>Category  :</b> <?= $row['category'] ?></p>
                    <p class="small mb-1"><b>ISBN  :</b> <?= $row['isbn'] ?></p>
                </div>
                <div class="card-footer text-center">
                  <button class="btn btn-outline-danger btn-sm saveBook"
                          data-book="<?= $row['book_id'] ?>">
                      ❤️ Save
                     </button>
                   </div>



            </div>
        </div>
    <?php }} else { ?>
        <div class="col-12 text-center">
            <h5>No Books Found</h5>
        </div>
    <?php } ?>
    </div>

</div>




  <footer id="fotter">
    <?php include("nav_and_footer/footer.php");  ?>
   </footer>

   <div class="msg d-none"></div>
   
<script>
$(".saveBook").click(function(){
    var book_id = $(this).data("book");

    $.ajax({
        url:"php/save_book.php",
        type:"POST",
        data:{book_id:book_id},
        success:function(res){
            // alert(res);

            if(res.trim()=="success"){
                var div = document.createElement("DIV")
                $(div).addClass("alert alert-success fs-2 text-center p-5");
                $(div).html("<i class='fa-solid fa-circle-check display-1'></i><br> Book save successfully")
                $(".msg").html(div)

                $(".msg").removeClass("d-none");
                
                setTimeout(function() 
                {
                    $(".msg").addClass("d-none")
                    
                }, 1500);

            }
            else{
                var div=document.createElement("DIV");
                    $(div).addClass("alert alert-danger fs-2 text-center p-5");
                    $(div).html("<i class='fa-solid fa-triangle-exclamation display-1'></i><br>"+res);
                    $(".msg").html(div)

                    $(".msg").removeClass("d-none");

                    setTimeout(function(){
                      $(".msg").addClass("d-none");
                      $(".ad_form").trigger("reset");
                    } ,1500)

            }
        }
    });
});
</script>




    
    
</body>
</html>