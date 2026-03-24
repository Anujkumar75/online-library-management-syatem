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
        <div class="col-md-10 p-4">

            <h3>Admin Home</h3>
            <p class="text-muted">Overview of system</p>

            <!-- Cards -->
             <?php
             require("../php/db.php");
             $memberQuery="SELECT COUNT(*) AS memberCount FROM admission_form";
             $memberResult = mysqli_query($db, $memberQuery);
             $memberData = mysqli_fetch_assoc($memberResult);
             $memberCount = $memberData['memberCount'];
             ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-box shadow mb-3">
                        <div class="card-body text-center">
                            <h6>Total Students</h6>
                            <h3><?php echo $memberCount ?></h3>
                        </div>
                    </div>
                </div>

                

                <?php
                $admessionQuery="SELECT COUNT(*) AS admissionCount FROM registration_form";
                $admissionResult = mysqli_query($db, $admessionQuery);
                $admissionData = mysqli_fetch_assoc($admissionResult);
                $admissionCount = $admissionData['admissionCount'];
                ?>

                <div class="col-md-3">
                    <div class="card card-box shadow mb-3">
                        <div class="card-body text-center">
                            <h6>Total Registration</h6>
                            <h3><?php echo $admissionCount ?></h3>
                        </div>
                    </div>
                </div>

                <!-- total book -->
                 <?php 
                 $totalBook="SELECT COUNT(*) AS bookCount FROM books";
                 $bookResult=mysqli_query($db,$totalBook);
                 $bookData = mysqli_fetch_assoc($bookResult);
                 $bookCount= $bookData['bookCount']
                 ?>

                <div class="col-md-3">
                    <div class="card card-box shadow mb-3">
                        <div class="card-body text-center">
                            <h6>Total Book</h6>
                            <h3><?php echo $bookCount ?></h3>
                        </div>
                    </div>
                </div>
                <!-- today addmission -->
                 <?php 
                
                 $todayQuery="SELECT COUNT(*) AS todayCount FROM issues_book WHERE DATE(issues_time) = CURDATE()";
                    $todayResult = mysqli_query($db, $todayQuery);
                    $todayData = mysqli_fetch_assoc($todayResult);
                    $todayCount = $todayData['todayCount'];
                 ?>

                <div class="col-md-3">
                    <div class="card card-box shadow mb-3">
                        <div class="card-body text-center">
                            <h6>Today Issues Book</h6>
                            <h3><?php echo $todayCount ?></h3>
                        </div>
                    </div>
                </div>
            
              <!-- total issues book -->
               <?php 
               $totalQuery="SELECT COUNT(*) AS totalQuery FROM issues_book";
               $totalResult=mysqli_query($db,$totalQuery);
               $totalData=mysqli_fetch_assoc($totalResult);
               $totalCount=$totalData['totalQuery']
               ?>
            <div class="col-md-3">
                    <div class="card card-box shadow mb-3 ">
                        <div class="card-body text-center">
                            <h6>Total Issues Book</h6>
                            <h3><?php echo $totalCount ?></h3>
                        </div>
                    </div>
                
            </div>

            <!-- total return book -->

           <?php 
                $returnQuery = "SELECT COUNT(*) AS totalReturn FROM issues_book WHERE status='Returned'";
                $returnResult = mysqli_query($db, $returnQuery);
                $returnData = mysqli_fetch_assoc($returnResult);
                $returnCount = $returnData['totalReturn'];
            ?>
                <div class="col-md-3">
                    <div class="card shadow mb-3 card-box text-center">
                        <div class="card-body text-center">
                            <h6>Total Returned Books</h6>
                            <h3><?= $returnCount ?></h3>
                        </div>
                    </div>
                </div>

                <!-- late book -->

                <?php
                  $today = date("Y-m-d");
                  
                  $lateQuery = "SELECT COUNT(*) AS lateCount 
                        FROM issues_book 
                        WHERE return_date < '$today' 
                        AND status='Issued'";
                   $lateResult = mysqli_query($db, $lateQuery);
                   $lateData = mysqli_fetch_assoc($lateResult);
                   $lateCount = $lateData['lateCount'];
                 ?>
               <div class="col-md-3">
                   <div class="card shadow mb-3 text-center border-danger">
                       <div class="card-body">
                           <h6>Today Late Returns</h6>
                           <h3 class="text-danger"><?= $lateCount ?></h3>
                       </div>
                   </div>
               </div>

               <!-- fine amount -->
                <?php 
                $fineQuery = "SELECT SUM(fine) AS total_fine FROM issues_book";
                $fineResult = mysqli_query($db, $fineQuery);
                $fineData = mysqli_fetch_assoc($fineResult);
                $totalFine = $fineData['total_fine'] ?? 0;
                ?>

                <div class="col-md-3">
                   <div class="card shadow mb-3 text-center border-danger">
                       <div class="card-body">
                           <h6>Total Fine Amount</h6>
                           <h3 class="text-danger"><?= $totalFine ?></h3>
                       </div>
                   </div>
               </div>
               
                
               </div>

            
             
             

            <!-- Recent Admissions -->
            <!-- <div class="card shadow mt-2">
                <div class="card-header bg-white">
                    <h5>Recent Admissions</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>Collage  ID</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Phone</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $recentQuery = "SELECT * FROM registration_form WHERE DATE(created_at) = CURDATE() ORDER BY created_at DESC ";  
                            // $recentResult = mysqli_query($db, $recentQuery);
                            // while ($row = mysqli_fetch_assoc($recentResult)) {
                                // echo "<tr>
                                        // <td>".$row['collage_id']."</td>
                                        // <td>".$row['student_name']."</td>
                                        // <td>".$row['course']."</td>
                                        // <td>".$row['phone_no']."</td>
                                        // <td>".$row['status']."</td>
                                        // <td>
                                        //  <button class='btn btn-sm btn-success aprrove_btn' id='".$row['id']."' btn_type='status'>Approve</button>
                                        //   <button class='btn btn-sm btn-danger reject_btn' id='".$row['id']."' btn_type='status'>Reject</button>
                                        // </td>
                                    //   </tr>";
                            // }

                            ?>
                           
                        </tbody>
                    </table>
                </div>
            </div> -->

        </div>
    </div>
</div>

</body>
</html>

 <!-- ----------------------------------------------------------------------------------- -->




  <!-- footer -->
    



    <script>
        $(document).ready(function(){
            $(".aprrove_btn").each(function(){
                $(this).click(function(){
                var admission_id=$(this).attr("id");
                var btn_type=$(this).attr("btn_type");
                $.ajax({
                    type:"POST",
                    url:"php/approve_admission.php",
                   data:{admission_id:admission_id,
                         btn_type:btn_type
                   },
                    success:function(response){
                        alert(response);
                        location.reload();
                       
                    }
                });
            });
            });
            // reject btn click
            $(".reject_btn").each(function(){
                $(this).click(function(){
                var admission_id=$(this).attr("id");
                var btn_type=$(this).attr("btn_type");
                $.ajax({
                    type:"POST",
                    url:"php/reject_admission.php",
                   data:{admission_id:admission_id,
                         btn_type:btn_type
                   },
                    success:function(response){
                        alert(response);
                        location.reload();
                       
                    }
                });
            });
            });
        });
    </script>
    
</body>
</html>