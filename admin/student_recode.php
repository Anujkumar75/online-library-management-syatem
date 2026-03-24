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
    <?php require("navbar_and_footer/nav.php") ?>

    <div class="container-fluid">
        <div class="row">
            <?php require("navbar_and_footer/side_navbar.php") ?>

            <!-- main content -->
             <div class="col-md-10 shadow p-4">

             <h3>All Student</h3>
             <p class="text-muted">Overview of system</p>
             
             <!-- all student -->
             <?php require(("php/db.php")) ?>

             <h2 class="text-center mt-3"> All Student</h2>

             <!-- search -->
              <form method="get" class="d-flex mb-3 col-md-6 mx-auto" >
                <input type="text" name="search" class="form-control me-2"
                placeholder="Search by Student Name/ Collage Id " value="<?php echo $_GET['search'] ?? ''; ?>">
                <button class="btn btn-success">Search</button>
              </form>

              <!-- student table -->
               <div class="table-responive" style="max-height: 450px; overflow:auto;">
                <table class="table table-bordered table-striped text-center table-hover mb-0">
                    <thead class="table-dark sticky-top text-center">
                        <tr>
                            <th>#</th>
                            <th>Collage ID</th>
                            <th>student Name</th>
                            <th>Father's Name</th>
                            <th>Email ID</th>
                            <th>Phone Number</th>
                            <th>DOB</th>
                            <th>Course</th>
                            <th>Address</th>
                            <th>Submit Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        if(isset($_GET['search']) && $_GET['search']!=""){
                            $s = $_GET['search'];
                            $sql = "SELECT * FROM registration_form
                            WHERE student_name LIKE '%$s%'
                            OR collage_id LIKE '%$s%'";
                        }
                        else{
                            $sql = "SELECT * FROM registration_form ORDER BY id DESC";
                        }

                        $result = $db->query($sql);
                        $no = 1;

                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()){
                                echo "
                                <tr>
                                  <td>$no</td>
                                  <td>{$row['collage_id']}</td>
                                  <td>{$row['student_name']}</td>
                                  <td>{$row['father_name']}</td>
                                  <td>{$row['email']}</td>
                                  <td>{$row['phone_no']}</td>
                                  <td>{$row['dob']}</td>
                                  <td>{$row['course']}</td>
                                  <td>{$row['address']}</td>
                                  <td>{$row['created_at']}</td>
                                ";
                                $no++;
                            }
                        }
                        ?>
                    </tbody>
                      

                </table>
               </div>
             </div>
        </div>
    </div>
</body>
</html>