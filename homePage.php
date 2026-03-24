
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
    <link rel="stylesheet" href="animation/animate.css">
    <title>Library</title>
</head>
<body>
    <?php include("nav_and_footer/nav.php");  ?>
    
    <!-- slide image -->

   <div id="carouselExampleIndicators" class="carousel slide slide_image " data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner wow fadeIn" data-wow-duration="2s">
    <div class="carousel-item active">
      <img src="image/banner8.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/banner3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/banner4.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- about for library -->

<h1 style="text-align: center; color:darkgoldenrod;" class="mt-2 mb-2 fst-italic wow bounce" id="about">About us</h1>

<div class="card mb-3 ms-3 me-3  bg-transparent text-light about_box rounded " id="about" style="max-width: 97%;">
  <div class="row g-0 ">
    <div class="col-md-4 wow fadeInLeft">
      <img src="image/im/best3.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8 rounded-end wow fadeInRight">
      <div class="card-body">
        <h5 class="card-title fw-bold fst-italic ">About Online Library</h5>
        <hr>
        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum sed qui maiores aliquam error quo esse non fugit itaque libero sint commodi soluta, ipsa quisquam cupiditate inventore dolores reiciendis facilis in adipisci sequi iusto quaerat dignissimos architecto. Debitis, corporis impedit voluptas quibusdam officia odit facere nihil quas, suscipit delectus velit.</p>
      </div>
    </div>
  </div>
</div>

<!-- card of features section -->
 <div class="row row-cols-2  ms-4 mb-2 mt-3 row-cols-md-6 g-5 justify-content-md-center card_featured_box" id="features">
  <a href="bookSearch.php" style="text-decoration: none;">
  <div class="col card_featured_col wow fadeInUp" data-wow-duration="1s">
    <div class="card card_featured ">
      <img src="image/features/search.png" class="card-img-top" alt="...">
      <div class="card-body border-top">
        <h5 class="card-title">Search Books</h5>
      </div>
    </div>
  </div>
  </a>

  <a href="issuesbook.php" style="text-decoration: none;">
  <div class="col card_featured_col wow fadeInUp" data-wow-duration="1.5s">
    <div class="card card_featured">
      <img src="image/features/return.png" class="card-img-top mt-2 p-3" alt="...">
      <div class="card-body border-top">
        <h6 class="card-title">Issues and Return</h6>
       
      </div>
    </div>
  </div>
</a>

<a href="userAccount.php" style="text-decoration: none;">
  <div class="col card_featured_col wow fadeInUp" data-wow-duration="2s">
    <div class="card card_featured">
      <img src="image/features/user.png" class="card-img-top " alt="...">
      <div class="card-body border-top mt-1">
        <h5 class="card-title">My Account</h5>
      </div>
    </div>
  </div>
</a>
<a href="saveBook.php" style="text-decoration: none;">
  <div class="col  card_featured_col wow fadeInUp" data-wow-duration="2.5s">
    <div class="card card_featured">
      <img src="image/features/save.png" class="card-img-top " alt="...">
      <div class="card-body border-top mt-1">
        <h5 class="card-title">Save book</h5>
      </div>
    </div>
  </div>
</a>
</div>

<!-- statistics/option about good -->

<h1 style="text-align: center; color:darkgoldenrod;" class="mt-4 mb-2 fst-italic wow bounce">Statistics</h1>

<div class="container mt-5 mb-5 stat_box wow " id="statistics">
  <div class="row text-center">
    <?php 
    //  count book
    $bookQuery = "SELECT COUNT(*) AS bookCount FROM books";
    $bookResult= mysqli_query($db,$bookQuery);
    $bookData = mysqli_fetch_assoc($bookResult);
    $bookCount = $bookData['bookCount']
    ?>
    <div class="col-md-4">
      <h2 class="text-warning fw-bold" id="bookCount"><?php echo $bookCount ?></h2>
      <p class="fw-semibold">Books Available</p>
    </div>
     <!-- count registered members -->
      <?php
      require("php/db.php");
      $memberQuery = "SELECT COUNT(*) AS memberCount FROM registration_form";
      $memberResult = mysqli_query($db, $memberQuery);
      $memberData = mysqli_fetch_assoc($memberResult);
      $memberCount = $memberData['memberCount'];
      ?>
    <div class="col-md-4">
      <h2 class="text-warning fw-bold" id="memberCount"><?php echo $memberCount; ?></h2>
      <p class="fw-semibold">Registered Members</p>
    </div>
    <!-- books Issued -->
     <?php 
     $issuesQuery = "SELECT COUNT(*) AS issuesBook FROM issues_book";
     $issuesResult = mysqli_query($db,$issuesQuery);
     $issuesData = mysqli_fetch_assoc($issuesResult);
     $issuesCount = $issuesData['issuesBook']; 
     ?>
    <div class="col-md-4">
      <h2 class="text-warning fw-bold" id="issueCount"><?php echo $issuesCount ?></h2>
      <p class="fw-semibold">Books Issued</p>
    </div>
  </div>
</div>

  <!-- footer -->
   <footer id="fotter">
    <?php include("nav_and_footer/footer.php");  ?>
   </footer>


<script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
    
</body>
</html>