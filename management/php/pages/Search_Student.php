<div class="container mt-4">

    <h4 class="text-center mb-3">🎓 Student List</h4>

    <!-- SEARCH -->
    <div class="row mb-3 justify-content-center">
        <div class="col-md-6 col-12">
            <input type="text" id="search"
                   class="form-control"
                   placeholder="Search by Student Name / College ID">
        </div>
    </div>

    <!-- RESULT -->
    <div id="result">
        <?php include("../fetch_students.php"); ?>
    </div>

</div>

<script>
$(document).ready(function(){

    $("#search").on("keyup", function(){
        let value = $(this).val();

        $.ajax({
            url: "php/fetch_students.php",
            type: "POST",
            data: { search: value },
            success: function(data){
                $("#result").html(data);
            }
        });
    });

});
</script>