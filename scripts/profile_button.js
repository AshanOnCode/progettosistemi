
var profile = document.getElementById("profile_button");
var profile_window = document.getElementById("profile_window");


if(profile!=null){
    profile.addEventListener("click", function (e){
        console.log("click");
        profile_window.style.display = "block";
    });
}
