
const video = document.querySelector(".video");
const playButton = document.querySelector(".play-button");
var videoSrc = "http://sample.vodobox.net/skate_phantom_flex_4k/skate_phantom_flex_4k.m3u8"; // HLS file
if (Hls.isSupported()) {
    var hls = new Hls();
    hls.loadSource(videoSrc);
    hls.attachMedia(video);
}

//Play and Pause button
playButton.addEventListener("click", (e) => {
    console.log("play button clicked");
    if(video.paused) {
        video.play();
        e.target.textContent = "😍";
        e.target.title = "Pause";
    } else{
        video.pause();
        e.target.textContent = "❤️"
        e.target.title = "Play";
    }
})



