var video = document.getElementById("videoPlayer");

video.addEventListener("click", function() {
    console.log("Video clicked");
    if(video.paused) {
        video.play();
    }else video.pause();
})