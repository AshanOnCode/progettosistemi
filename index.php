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

<div class="video-container">
  <video id="video"></video> 

  <div class="controls">
    <!-- range audio e progressBar invertiti -->
    <button id="play-pause" class="icon">▶️</button>
    
    <!-- TODO: opzioni player
      1) div as progress+input (se sistemabile)
      2) default browser player -->
    <div class="progress-bar">
        <div class="fill" id="progressFill"></div>
        <input type="range" id="progress" value="0" min="0" max="100">
    </div>

    <span id="time">0:00 / 0:00</span>
    <input type="range" id="volume" min="0" max="1" step="0.05" value="1">
    <button id="fullscreen" class="icon">⛶</button>
  </div>
</div>

<div><p>Hello world!</p></div>

<!-- <script src="scripts/videoLoader.js"></script> -->
<script src="scripts/script.js"></script>
</body>
</html>
