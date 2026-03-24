<?php
 require(("php/db.php"))
?>
<nav class="navbar navbar-dark ">
  <div class="container-fluid">
    <a class="navbar-brand"> Digital Library</a>
    <div class="d-flex user_info">
        <span class="navbar-text text-white me-3">
            Welcome, 
            <?php
            if(!empty($_COOKIE['user_login'])){
        $user_email=base64_decode($_COOKIE['user_login']);
        
        $get_data=$db->query("SELECT student_name FROM registration_form WHERE collage_id='$user_email'");
        $user_data=$get_data->fetch_assoc();

        echo "<span class='navbar-brand mb-0 h1'>".ucfirst($user_data["student_name"])."</span>";
     }
         else{
            header("Location:index.php");
         }
            ?>
        </span>
        
      
    </div>
  </div>
</nav>

<!-- navbar  -->

<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark shadow">
  <div class="container-fluid ">
    <a class="navbar-brand" href="homePage.php"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-md-end" id="navbarNav">
      <ul class="navbar-nav Item_nav">
        <li class="nav-item me-3">
          <a class="nav-link border rounded" href="homePage.php">Home</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link border rounded" href="homePage.php#about">About</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link border rounded" href="bookSearch.php">Books</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link border rounded" href="#fotter">Contact</a>
        </li>

         <li class="nav-item me-3">
          <a class="nav-link border rounded" href="saveBook.php">Save Book</a>
        </li>

         <li class="nav-item me-3">
          <a class="nav-link border rounded" href="userAccount.php">My Account</a>
        </li>

         <!-- <button class="btn btn-outline-light mb-1 me-2"><a href="#" style="text-decoration: none; ">Admin</a></button> -->
        <button class="btn btn-outline-light logout_btn mb-1"><a href="logout.php" style="text-decoration: none; ">Logout</a></button>
      </ul>
    </div>
  </div>
</nav>

<style>
  .Item_nav .nav-link:hover{
    color: yellow;
  }

  .Item_nav .nav-link{
    font-weight: 500;
    font-size: 18px;
  }

  .Item_nav :hover{
  transform: scale(1.02);
    transition: transform 0.3s ease;
    background-color: #020024;
    border: 1px solid #020024;
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
    color: white;
    border-radius: 10px;
  }
.logout_btn{
    background-color: crimson;
    border: none;   
    }
.logout_btn:hover{
    background-color: none;  
    border: 1px solid white;

    }

.logout_btn a{
    color: white;
}
.logout_btn a:hover{
    color: white;
}


</style>

  