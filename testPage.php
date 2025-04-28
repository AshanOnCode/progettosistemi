<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Custom Video Player</title>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/themes/rose-pine.css">
  <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
</head>

<body>
  <div class="container">
    <div class="top-div">
      <div class="video-div">
        <video id="video" controls></video>
      </div>
      <ul class="epList" id="epList">
        <!-- <li class="active">
          <span class="icon">&#9654;</span>
          <span class="text">title ep 1</span>
        </li>
        <li>
          <span class="icon">2.</span>
          <span class="text">title ep 2</span>
        </li>
        <li>
          <span class="icon">3.</span>
          <span class="text">title ep 3</span>
        </li> -->
      </ul>
    </div>
    <div class="bottom-div">
      <div class="detailes-div">
        <img class="coverImg" src="resources/test-series/cover.png" alt="cover_image">
        <div class="info-div">
          <h1 class="title">Gatto Più piccolo del mondo</h1>
          <ul class="tag-list">
            <li>documentario</li>
            <li>animali</li>
            <li>natura</li>
          </ul>
          <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem minus praesentium
            odit molestias explicabo? Officia omnis odio vitae sunt sed. Consequuntur quibusdam magni, iusto quia quas
            error magnam voluptas accusamus.</p>
          <div class="dati-div">
            <div class="data1">
              <h5>Data di uscita: </h5>
              <p class="uscita">1983</p>
            </div>
            <div class="data2">
              <h5>Studio: </h5>
              <p class="uscita">Giornalista</p>
            </div>
          </div>
        </div>
      </div>
      <div class="seasonList-div">
        <ul>
          <li><a>Season 1</a></li>
          <li><a>Season 2</a></li>
          <li><a>Season 4</a></li>
          <li><a>Season 5</a></li>
        </ul>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    const video = document.getElementById('video');

    const videoSrc = 'res/Betty_in_Blunderland/1/betty_in_blunderlands.m3u8';
    
    if (Hls.isSupported()) {
      const hls = new Hls();
      hls.loadSource(videoSrc);
      hls.attachMedia(video);
    } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
      // Per safari che supporta HLS
      video.src = videoSrc;
      video.addEventListener('loadedmetadata', function () {
        video.play();
      });
    }
  </script>
  <script type="text/javascript">
    const list = document.getElementById('epList');
    var content="";var lenght = 4; var listEl;
    for (var i = 0; i < lenght; i++) {
      content += '<li><span class="icon">'+(i+1)+'</span><span class="text">title ep 1</span></li >';
    }
    list.innerHTML = content;
  </script>
</body>
</html>