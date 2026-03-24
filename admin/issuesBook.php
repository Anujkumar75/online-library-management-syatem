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

            <h3>Issues And Return Book</h3>
            <p class="text-muted">Overview of system</p>

            <!-- admission form -->
         <?php
require("php/db.php");

$search = $_GET['search'] ?? '';

/* 🔹 JOIN QUERY (Admin name included) */
$sql = "
SELECT 
    i.*,
    a.admin_name
FROM issues_book i
LEFT JOIN admin_rajestion a 
ON i.admin_id = a.admin_id
WHERE 
    i.book_id LIKE '%$search%' 
    OR i.collage_id LIKE '%$search%' 
    OR i.student_name LIKE '%$search%'
    OR a.admin_name LIKE '%$search%'
ORDER BY i.id DESC
";

$result = $db->query($sql);
?>

<div class="container-fluid mt-4">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">📚 Issued & Return Books</h4>
        </div>

        <div class="card-body">

            <!-- SEARCH -->
            <form class="row mb-3">
                <div class="col-md-6">
                    <input type="text" 
                           name="search" 
                           value="<?= htmlspecialchars($search) ?>"
                           class="form-control"
                           placeholder="Search Book ID / Student / Admin Name">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100">Search</button>
                </div>
            </form>

            <!-- TABLE -->
            <div class="table-responsive" style="max-height:450px; overflow:auto;">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="table-dark text-center sticky-top">
                        <tr>
                            <th>#</th>
                            <th>Book ID</th>
                            <th>Student Name</th>
                            <th>Issued By (Admin)</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Status</th>
                            <th>Fine</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    if ($result->num_rows > 0) {
                        $i = 1;
                        while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr class="text-center">
                            <td><?= $i++ ?></td>
                            <td><?= $row['book_id'] ?></td>
                            <td><?= ucwords($row['student_name']) ?></td>
                            <td><?= ucwords($row['admin_name'] ?? 'Unknown') ?></td>
                            <td><?= $row['issues_date'] ?></td>
                            <td><?= $row['return_date'] ?></td>
                            <td>
                                <span class="badge bg-<?= $row['status']=="Issued" ? "warning" : "success" ?>">
                                    <?= $row['status'] ?>
                                </span>
                            </td>
                            <td>₹<?= $row['fine'] ?></td>
                            <td>
                                <?php if($row['status']=="Issued"){ ?>
                                    <button class="btn btn-sm btn-danger returnBtn"
                                            data-id="<?= $row['id'] ?>">
                                        Return
                                    </button>
                                <?php } else { ?>
                                    —
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                        }
                    } else {
                        echo '<tr><td colspan="9" class="text-center">No Records Found</td></tr>';
                    }
                    ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- RETURN SCRIPT -->
<script>
$(".returnBtn").click(function(){
    if(!confirm("Are you sure to return this book?")) return;

    let id = $(this).data("id");

    $.post("php/return_book.php",{id:id},function(res){
        alert(res);
        location.reload();
    });
});
</script>


           

        
    </div>  

 <!-- ----------------------------------------------------------------------------------- -->




  <!-- footer -->
    


    
</body>
</html>