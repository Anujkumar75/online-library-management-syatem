<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">     
    <link rel="stylesheet" href="../css/management.css">         
    <title>Digital Library </title>
</head>
<body>
        <style>
        body{
            padding: 0;
            margin: 0;
        }
        .main_icon{
            height: 100vh;
        }
        .left{
            width: 17%;
            height: 100vh;
           background: #000000;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #434343, #000000);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #434343, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

             
        }
        .right{
            width: 83%;
            height: 100%;
           overflow:auto;
           
           
        }
        .left ul{
            list-style: none;
            padding: 0;
            margin: 0;
            
        }
        .left ul li{
            color: white;
            border-bottom: 1px solid white;
           
        }
        
        .left ul li:hover{
            background-color: #fff;
            color: #080429;
            cursor: pointer;
        }

        .nav_link.active{
            display: flex;
        }
        
        .msg{
            width: 100%;
            height: 100vh;
            background-color: rgba(0,0,0,0.7);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000000000000000;
        }
    </style>
</head>
<body>
    
    <div class="w-100 d-flex">
     <div class="left sticky-top" id="nav-link">
            <ul>
                <li class=" px-4 py-3 menu" p_link="adimission"></i>Addimission</li>
                <li class="px-4 py-3 menu" p_link="Admin"></i>Admin</li>
                <li class="px-4 py-3 menu" p_link="Search_Student"></i>Search student</li>              
                
            </ul>
        </div>
       <div class="right p-3">
        <button id="burger" onclick="main()">Hide</button>
       </div>
    </div>
    <div class="msg d-none"></div>
    <script>
        $(document).ready(function(){
            $(".menu").each(function(){
                $(this).click(function(){
                    var page_link=$(this).attr("p_link");
                    $.ajax({
                        type:"POST",
                        url:"php/pages/"+page_link+".php",
                        beforeSend:function(){
                            $(".msg").removeClass("d-none");
                           var div=document.createElement("DIV");
                           $(div).addClass("alert alert-success fs-2 text-center p-5");
                            $(div).html("<i class='fa-solid fa-spinner fa-spin fs-1 display-1'></i><br>Loding....");
                            $(".msg").html(div)

                           
                        },
                        success:function(response){
                            $(".msg").addClass("d-none")
                            $(".right").html(response);
                           
                        }
                    })
                })
            })
        })
    </script>     

    <script src="js/js.js"></script>
    

</body>
</html>