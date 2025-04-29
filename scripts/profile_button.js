
var profile = document.getElementById("profile_button");
var background = document.getElementById("background");
var profile_window = document.getElementById("profile_window");


if(profile!=null) {
    profile.addEventListener("click", function (e) {
        profile_window.style.display = "block";
        background.style.display = "block";
        background.addEventListener("click", function (e) {
            profile_window.style.display = "none";
            background.style.display = "none";
        });
    });
}
