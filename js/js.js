let loginBox = document.getElementById("l_form");
let adminBox = document.getElementById("a_form");

let adminLink = document.getElementById("a_link");
let userLink = document.getElementById("r_link");

adminLink.onclick = function () {
    adminBox.style.display = "block";
    loginBox.style.display = "none";
};

userLink.onclick = function () {
    loginBox.style.display = "block";
    adminBox.style.display = "none";
};

//user show password & hide password
let show_p = document.getElementById("show_p");
show_p.onclick = function () {
    if (show_p.checked) {
        document.getElementById("show_t").innerHTML = " Hide Password";
        document.getElementsByName("Password")[0].type = "text";
    } else {
        document.getElementById("show_t").innerHTML = " Show Password";
        document.getElementsByName("Password")[0].type = "password";
    }   
};

//admin show password & hide password
let show_p_a = document.getElementById("show_p_a");
let show_t_a = document.getElementById("show_t_a");

show_p_a.onclick = function () {
    if (show_p_a.checked) {
        show_t_a.innerHTML = " Hide Password";
        document.getElementsByName("Password")[1].type = "text";
    } else {
        show_t_a.innerHTML = " Show Password";
        document.getElementsByName("Password")[1].type = "password";
    }
};
