
var home = document.getElementsByClassName("home_button");


for (let i = 0; i < home.length; i++) {
    const element = home[i];
    
    element.addEventListener("click", function (e){
        window.location.href = "home.php";
    });
}