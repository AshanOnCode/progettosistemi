<?php
require_once "functions.php";

if (isset($_POST["logout"])) {
  log_out();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Custom Video Player</title>
  <link rel="stylesheet" href="styles/player.css">
  <link rel="stylesheet" href="styles/themes/rose-pine.css">
  <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
  <?php include "database/video_script.php" ?>
</head>

<body>

  <div id="login_window">

    <div>
      <h1>Login window</h1>
    </div>

    <div id="form">
      <!-- Form di login -->
      <form method="POST" action="home.php">
        <div>
          <label for="email">Email:</label>
          <input type="email" name="email" id="email">
        </div>

        <div>
          <label for="password">Password:</label>
          <input type="password" name="password" id="password">
        </div>

        <div>
          <button type="submit">Accedi</button>
        </div>

        <p>
          <?php
          attemptLogin();
          echo $_SESSION["message"];
          ?>
        </p>

      </form>
    </div>

  </div>


  <div class="container">


    <header>
      <h1 class="home_button">OpenTube</h1>
      <div id="login">
        <img src="res/ui/user.png" alt="dadaw">
        <button <?php
        if (isset($_SESSION['username'])) {
          echo "id='profile_button'";
        } else {
          echo "id='login_button'";
        }
        ?>>
          <h1>
            <?php
            if (isset($_SESSION['username'])) {
              echo $_SESSION['username'];
            } else {
              echo "Login";
            }
            ?>
          </h1>
        </button>
      </div>
    </header>



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
        <img class="coverImg" alt="cover_image" src="res/Popeye_the_Sailor/cover.jpg">
        <div class="info-div">

          <h1 class="title"></h1>

          <ul class="tag-list"></ul>

          <p class="description"></p>

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
    const list = document.getElementById('epList');
    var content = ""; var lenght = 4; var listEl;
    for (var i = 0; i < lenght; i++) {
      content += '<li><span class="icon">' + (i + 1) + '</span><span class="text">title ep 1</span></li >';
    }
    list.innerHTML = content;
  </script>
  <script>
    getVideo();
    getTitle();
    getDescription();
    getTagList();
    getStudio();
    getCover();
  </script>
  
  <script src="scripts/login_button.js"></script>
  <script src="scripts/home_button.js"></script>
  <script type="text/javascript">
    var list = document.getElementsById('epList');
  </script>
</body>

</html>