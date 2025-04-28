
var register = document.getElementsByClassName("register");


for (let i = 0; i < register.length; i++) {
    const element = register[i];
    
    element.addEventListener("click", function (e){
        window.location.href = "register.php";
    });
}