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

            <h3>Registration</h3>
            <p class="text-muted">Overview of system</p>

            <!-- admission form -->

            <form class="admission row g-3">
  <div class="col-md-6">
    <label class="form-label">Collage ID</label>
    <input type="text" class="form-control" id="collage_id" placeholder="Collage ID" name="Collage_id" required >
  </div>
  <div class="col-md-6">
    <label  class="form-label">Student Name</label>
    <input type="text" class="form-control" name="student_name" id="student_name" placeholder="Student Name" readonly>
  </div>
  <div class="col-6">
    <label  class="form-label">Father's Name</label>
    <input type="text" class="form-control" id="father_name" placeholder="Father's name" name="father_name" readonly>
  </div>
  <div class="col-6">
    <label class="form-label">DOB</label>
    <input type="text" class="form-control" id="dob" name="dob" readonly>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputCity" placeholder="Email" name="email" require>
  </div>
  <div class="col-md-6">
    <label class="form-label">Course</label>
    <input type="text" class="form-control" id="course" name="Course" readonly>

    </select>
  </div>
  <div class="col-md-6">
    <label for="inputZip" class="form-label">Address</label>
    <textarea class="form-control" id="address" name="address" placeholder="Address" readonly></textarea>
  </div>

  <div class="col-md-6">
    <label class="form-label">Phone Number</label>
    <input type="number" class="form-control" id="phone" placeholder="Phone Number" name="phone_number" readonly>
  </div>

   <div class="col-md-6">
    <label class="form-label">Password</label>
    <input type="Password" class="form-control" placeholder="Password" name="password" required>
  </div>

  <div class="col-md-6">
    <label class="form-label">Confirm Password</label>
    <input type="Password" class="form-control" placeholder="Confirm Password" name="confirm_password" required>
    </div>

  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

        
    </div>  

 <!-- ----------------------------------------------------------------------------------- -->




  <!-- footer -->
  

<script>
    $(document).ready(function(){

    // fetch student details
    $('#collage_id').keyup(function() { 
       let collage_id = $(this).val();
     if(collage_id.length < 2){
        $("#student_name, #father_name, #phone, #course, #address, #dob").val("");
        return;
    }

     $.ajax({
        url: "php/fetch_student_data.php",
        type: "POST",
        data: { collage_id: collage_id },
        dataType: "json",
        success: function(data){

            if(data.status === "success"){
                
                $("#student_name").val(data.student_name);
                $("#father_name").val(data.father_name);
                $("#phone").val(data.phone);
                $("#course").val(data.course);
                $("#address").val(data.address)
                $("#dob").val(data.dob)
            } else {
                $("#student_name, #father_name, #phone, #course , #address, #dob").val("");
            }

        }
    });
      
    });
    // data submit
        $(".admission").submit(function(e){
            e.preventDefault();

            $.ajax({
                type:"POST",
                url:"php/submit_admission.php",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(response){
                    alert(response);
                   
                }
            });
        });
    })
</script>

    
</body>
</html>