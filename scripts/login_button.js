
var login = document.getElementById("login_button");
var background = document.getElementById("background");
var login_window = document.getElementById("login_window");

if(login != null){
    login.addEventListener("click", function (e){
        console.log("click");

        login_window.style.display = "block";
        background.style.display = "block";
        background.addEventListener("click", function (e){
            login_window.style.display = "none";
            background.style.display = "none";
        });
    });    
}
