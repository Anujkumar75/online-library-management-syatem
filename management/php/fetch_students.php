<?php
require("db.php");

$search = $_POST['search'] ?? '';

if ($search != '') {
    $s = $db->real_escape_string($search);
    $sql = "SELECT * FROM admission_form
            WHERE student_name LIKE '%$s%'
            OR collage_id LIKE '%$s%'
            ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM admission_form ORDER BY id DESC";
}

$result = $db->query($sql);
$no = 1;
?>

<div class="table-responsive" style="max-height:450px; overflow:auto;">
<table class="table table-bordered table-striped table-hover text-center mb-0">
    <thead class="table-dark sticky-top">
        <tr style="color: white;">
            <th>#</th>
            <th>College ID</th>
            <th>Student Name</th>
            <th>Father Name</th>
            <th>Phone</th>
            <th>DOB</th>
            <th>Course</th>
            <th>Address</th>
            <th>Submit Date</th>
        </tr>
    </thead>
    <tbody>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr style='color: white;'>
            <td>{$no}</td>
            <td>{$row['collage_id']}</td>
            <td>".ucwords($row['student_name'])."</td>
            <td>".ucwords($row['father_name'])."</td>
            <td>{$row['phone']}</td>
            <td>{$row['dob']}</td>
            <td>{$row['course']}</td>
            <td>{$row['address']}</td>
            <td>{$row['submission_date']}</td>
        </tr>";
        $no++;
    }
} else {
    echo "<tr><td colspan='9'>No Records Found</td></tr>";
}
?>

    </tbody>
</table>
</div>
