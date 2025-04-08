<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Custom Video Player</title>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/themes/rose-pine.css">
  <!-- wtf this? non si può fare senza? con 
   video in database immagino non serva proprio?-->
  <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
</head>
<body>
  <div class="container">
<div class="top-div">
  <div class="video-div">
  <video id="video" controls></video>
  
  <!-- <div class="controls">
    range audio e progressBar invertiti
    <button id="play-pause" class="icon"><img src="resources/icons/play.png" alt="play-icon" class="player-icons"></button>
    TODO: opzioni player
      1) div as progress+input (se sistemabile)
      2) default browser player
    <div class="progress-bar">
        <div class="fill" id="progressFill"></div>
        <input type="range" id="progress" value="0" min="0" max="100">
    </div>

    <span id="time">0:00 / 0:00</span>
    <input type="range" id="volume" min="0" max="1" step="0.05" value="1">
    <button id="fullscreen" class="icon">⛶</button>
  </div -->
  </div>
<div class="epList-div">
<ul>
  <li><a>Episode 1</a></li>
  <li><a>Episode 2</a></li>
  <li><a>Episode 4</a></li>
  <li><a>Episode 5</a></li>
</ul>
</div></div>
<div class="bottom-div">
  <div class="detailes-div">
  <img class="coverImg" src="resources/test-series/cover.png" alt="cover_image">
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

<script src="scripts/script.js"></script>
</body>
</html>
