const video = document.getElementById('video');
const playPauseBtn = document.getElementById('play-pause');
const timeDisplay = document.getElementById('time');
const volume = document.getElementById('volume');
const fullscreenBtn = document.getElementById('fullscreen');

const progress = document.getElementById('progress');
const progressFill = document.getElementById("progressFill");

var videoSrc = "http://sample.vodobox.net/skate_phantom_flex_4k/skate_phantom_flex_4k.m3u8"; // HLS file

if (Hls.isSupported()) {
    var hls = new Hls();
    hls.loadSource(videoSrc);
    hls.attachMedia(video);
}

//questo fatto ogni tick? possibile evitare?
function togglePlay() {
    if (video.paused) {
        video.play();
        playPauseBtn.textContent = '⏸️';
    } else {
        video.pause();
        playPauseBtn.textContent = '▶️';
    }
}

function updateProgress() {
    percent = (video.currentTime / video.duration) * 100;
    progress.value = percent;

    const current = formatTime(video.currentTime);
    const total = formatTime(video.duration);
    timeDisplay.textContent = `${current} / ${total}`;
}

function setProgress() {
    video.currentTime = (progress.value / 100) * video.duration;
}

function formatTime(time) {
    const minutes = Math.floor(time / 60);
    const seconds = Math.floor(time % 60).toString().padStart(2, '0');
    return `${minutes}:${seconds}`;
}

function setVolume() {
    video.volume = volume.value;
}

function toggleFullscreen() {
    if (!document.fullscreenElement) {
        video.requestFullscreen();
    } else {
        document.exitFullscreen();
    }
}

video.addEventListener('loadedmetadata', () => {
    updateProgress();
});

playPauseBtn.addEventListener('click', togglePlay);
video.addEventListener('timeupdate', updateProgress);
progress.addEventListener('input', setProgress);
volume.addEventListener('input', setVolume);
fullscreenBtn.addEventListener('click', toggleFullscreen);
