 <?php
require(("../db.php"));
?>
 <button id="burger" onclick="main()">Hide</button>

 
<div class="row">
<form class="admin_form shadow p-4 mb-5 col-md-6"> 
    <h1>Admin Form</h1>
    <hr>
  <div class="mb-3 ">
    <label  class="form-label">Admin ID <samp class="imp">*</samp></label>
    <input type="text" class="form-control" name="admin_id" placeholder="Admin ID">
    </div>
    
  <div class="mb-3">
    <label  class="form-label">Admin Name <samp class="imp">*</samp></label>
    <input type="text" class="form-control" name="admin_name" placeholder="Admin Name">
  </div>

  <div class="mb-3">
    <label class="form-label">Father's Name</label>
    <input type="text" class="form-control" name="father_name" placeholder="Father's Name">
  </div>

  <div class="mb-3">
    <label  class="form-label">Phone <samp class="imp">*</samp></label>
    <input type="number" class="form-control" name="phone" placeholder="Phone Number">
  </div>

  <div class="mb-3">
    <label  class="form-label">Address <samp class="imp">*</samp></label>
    <textarea name="address" class="form-control" rows="3" placeholder="Address"></textarea>
  </div>

   <div class="mb-3">
    <label  class="form-label">Password <samp class="imp">*</samp></label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary ad_btn">Submit</button>
</form>

<!-- record for admin -->
 <div class="col-md-6">
 <table class="table ">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Admin ID</th>
      <th scope="col">Admin Name</th>
      <th scope="col">Father's Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <?php
    $get_admin_data=$db->query("SELECT * FROM admin_rajestion");
    if($get_admin_data->num_rows>0){
        while($row=$get_admin_data->fetch_assoc()){
            echo '
            <tbody>
            <tr>
              <th scope="row">'.$row['id'].'</th>
              <td>'.$row['admin_id'].'</td>
              <td>'.$row['admin_name'].'</td>
              <td>'.$row['father_name'].'</td>
              <td>'.$row['phone'].'</td>
              <td>'.$row['address'].'</td>
            </tr>
          </tbody>
            ';
        }
    }
    ?>
  
</table>
</div>

</div>


<script>
    $(document).ready(function(){
        $(".admin_form").submit(function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:"php/admin_rejestion.php",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(response){
                    alert(response);
                   
                }
            })
        })
    })
</script>
<style>
    .admin_form{
          /* width: 50%; */
    color: white;
    border-radius: 10px 10px 10px 10px;
    background: #8E0E00;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #1F1C18, #8E0E00);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #1F1C18, #8E0E    );
 /* transform: translateX(50%); */
} 
    
.table{
  /* width: 40%; */
    border-radius: 10px 10px 10px 10px;
     color: white;
    border-radius: 10px 10px 10px 10px;
    background: #8E0E00;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #1F1C18, #8E0E00);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #1F1C18, #8E0E    );
}
</style>