<?php
require(("php/db.php"))

?>

<!-- fecth admin name for cookie  -->
<?php
if(isset($_COOKIE['admin_login'])){
    $admin_id=base64_decode($_COOKIE['admin_login']);
    $admin_sql=$db->query("SELECT admin_name FROM admin_rajestion WHERE admin_id='$admin_id'");
    $admin_data=$admin_sql->fetch_assoc();
    $admin_name=$admin_data['admin_name'];
}
else{
    header("Location: ../index.php");
    exit();
}
?>

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand">Admin Panel</span>
        <span class="text-white">Welcome <?php echo ucfirst($admin_name); ?></span>
    </div>
</nav>