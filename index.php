
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
    <link rel="stylesheet" href="css/style.css">              
    <title>Digital Library </title>
</head>
<body>
  <h1 class="name_li"> Digital Library</h1>
    <div class="container mt-3 main_content animate__animated animate__zoomInDown" id="l_form">
        <h1 class="text-center mb-4 pt-5 t_Well">Login </h1>
        <hr>
        <!-- Login Form -->
        <form class="L_form "  >
  <div class="mb-3">
    <label class="form-label">Collage Id<samp class="imp">*</samp></label>
    <input type="text" class="form-control" placeholder="Your Collage Id" name="collage_Id" required>
     </div>
  <div class="mb-3">
    <label  class="form-label">Password<samp class="imp">*</samp></label>
    <input type="password" class="form-control" placeholder="Password" name="Password" required>
  </div>
  
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="show_p">
    <label class="form-check-label" for="show_p" id="show_t">Show Password</label>
  </div>
  
  <button type="submit" class="btn btn-outline-success mb-3">Login</button>
    <div class="msg d-none"></div>
 <!-- <p > Don't have an Registration? <span class="c_click" id="l_link">Click Here</span></p> -->
 <p> Admin Login? <a class="c_click" id="a_link">Click Here</a></p>
</form>

    </div>

    <!-- admin form -->
       <div class="container mt-3 main_content animate__animated animate__zoomInDown" id="a_form" style="display: none;">
        <h1 class="text-center mb-4 pt-5 t_Well">Admin Login</h1>
        <hr>
        
        <form class="A_form "  >
  <div class="mb-3">
    <label class="form-label">Admin Id<samp class="imp">*</samp></label>
    <input type="text" class="form-control" placeholder="Your Admin Id" name="Admin_Id" required>
     </div>
  <div class="mb-3">
    <label  class="form-label">Password<samp class="imp">*</samp></label>
    <input type="password" class="form-control" placeholder="Password" name="Password" required>
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="show_p_a">
    <label class="form-check-label" for="show_p_a" id="show_t_a">Show Password</label>
  </div>

  
  
  <button type="submit" class="btn btn-outline-success mb-3">Login</button>
    <div class="msg d-none"></div>
 <p> User Login? <a class="c_click" id="r_link">Click Here</a></p>
 
</form>

    </div>

    <!-- rajestion form -->
    
    
    <script>
      $(document).ready(function(){

        
        // Login form submit
        $(".L_form").submit(function(e){
          e.preventDefault();
          $.ajax({
            type:"POST",
            url:"php/loginFrom.php",
            data: new FormData(this),
            contentType:false,
            processData:false,
            success:function(response){
              if(response.trim()=="success"){
                location.href="homePage.php";
              }
              else{
                $(".msg").removeClass("d-none")
                var div=document.createElement("DIV");
                $(div).addClass("alert alert-danger mt-1");
                $(div).html(response);
                $(".msg").html(div);

                setTimeout(function(){
                    // $(".msg").html("");
                    $(".msg").addClass("d-none");
                  },3000);
              }
            }
          })
        })

        // Admin form submit
        $(".A_form").submit(function(e){
          e.preventDefault();
          $.ajax({
            type:"POST",
            url:"php/adminLoginForm.php",
            data: new FormData(this),
            contentType:false,
            processData:false,
            success:function(response){
                 if(response.trim()=="success"){
                  location.href="admin/AdminPortal.php";
                 }
                 else{
                  $(".msg").removeClass("d-none")
                  var div=document.createElement("DIV");
                  $(div).addClass("alert alert-danger mt-1");
                  $(div).html(response);
                  $(".msg").html(div);
  
                  setTimeout(function(){
                      // $(".msg").html("");
                      $(".msg").addClass("d-none");
                    },3000);
                  }
            }
          })

        })
      })
    </script>
    
    
                                                 
    <script src="js/js.js"></script>
</body>
</html>