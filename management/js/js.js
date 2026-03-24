// hide nav link on burger click


 function main(){
        var picture=document.getElementById("nav-link");
        var button=document.getElementById("burger");
        var btn_text=button.innerHTML;
        picture.style.display="none";
           button.innerHTML="show";
        
        
        if(btn_text=="show")
        {
            picture.style.display="block";
            button.innerHTML="Hide";
        }
          else{
            picture.style.display="none";
           button.innerHTML="show";
          }

        }
        
    