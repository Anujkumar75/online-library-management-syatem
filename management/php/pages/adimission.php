 <?php
require(("../db.php"));
?> 

 <button id="burger" onclick="main()">Hide</button>

<form class="ad_form shadow p-4 mb-5  col-md-6">
    <h1>Addmission Form</h1>
    <hr>
  <div class="mb-3 ">
    <label  class="form-label">Collage ID <samp class="imp">*</samp></label>
    <input type="text" class="form-control" name="collage_id" placeholder="Collage ID">
    </div>
    
  <div class="mb-3">
    <label  class="form-label">Student Name <samp class="imp">*</samp></label>
    <input type="text" class="form-control" name="student_name" placeholder="Student Name">
  </div>

  <div class="mb-3">
    <label  class="form-label">Father's name<samp class="imp">*</samp></label>
    <input type="text" class="form-control" name="father_name" placeholder="Father's name">
  </div>
  
    

    <div class="mb-3">
  <label class="form-label">Date of Birth <samp class="imp">*</samp></label>
  <input type="date" class="form-control" name="dob">
     </div>


    <div class="mb-3">
        <label  class="form-label">Phone Number<samp class="imp">*</samp></label>
        <input type="number" class="form-control" name="phone" placeholder="Phone Number">
    </div>

    <div class="mb-3">
        <label  class="form-label">Course<samp class="imp">*</samp></label>
        <select name="course" id="course" class="form-select">
            
            <option >BCA</option>
            <option >BBA</option>
            <option >BSc</option>
            <option >BA</option>
        </select>

    </div>

    <div class="mb-3">
        <label  class="form-label">Address<samp class="imp">*</samp></label>
        <textarea name="address" class="form-control" rows="3" placeholder="Address"></textarea>
    </div>
  <button type="submit" class="btn btn-primary ad_btn">Submit</button>
</form>






<!-- record for admin -->

  




<script>
    $(document).ready(function(){
        $(".ad_form").submit(function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:"php/admission_form_submit.php",
                data:new FormData(this),
                contentType:false,
                processData:false,
                beforeSend:function(){
                        $(".ad_btn").html("Please wait...");
                        $(".ad_btn").attr("disabled","disabled");
                    },

                success:function(response){
                   $(".ad_btn").html("Submit");
                   $(".ad_btn").remove("disabled","disabled");
                  // alert(response);
                  if(response.trim()=="success"){
                    var div=document.createElement("DIV");
                    $(div).addClass("alert alert-success fs-2 text-center p-5");
                    $(div).html("<i class='fa-solid fa-circle-check display-1'></i><br> Success");
                    $(".msg").html(div)

                    $(".msg").removeClass("d-none");

                    setTimeout(function(){
                      $(".msg").addClass("d-none");
                      $(".ad_form").trigger("reset");
                    } ,1500)


                  }
                  else{
                    var div=document.createElement("DIV");
                    $(div).addClass("alert alert-danger fs-2 text-center p-5");
                    $(div).html("<i class='fa-solid fa-triangle-exclamation display-1'></i><br>"+response);
                    $(".msg").html(div)

                    $(".msg").removeClass("d-none");

                    setTimeout(function(){
                      $(".msg").addClass("d-none");
                      $(".ad_form").trigger("reset");
                    } ,1500)
                  }
                }
            })
        })
    })

</script>