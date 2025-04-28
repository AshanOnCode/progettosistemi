
var login = document.getElementById("login_button");
var login_window = document.getElementById("login_window");

if(login != null){
    login.addEventListener("click", function (e){
        console.log("click");
        login_window.style.display = "block";
    });    
}
