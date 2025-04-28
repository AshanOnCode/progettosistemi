<?php
require_once "functions.php";
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
  <?php include "database/episode_list.php" ?>
</head>

<body>

  <div id="login_window">

    <div>
        <h1>Login window</h1>
    </div>


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

    <button class="register">Registrati</button>

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

      <div class="scroll-box">

      </div>
    </div>



    <div class="bottom-div">
      <div class="detailes-div">
        <img class="coverImg" src="" alt="cover_image">

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
    </div>
  </div>

  <script src="scripts/login_button.js"></script>
  <script src="scripts/home_button.js"></script>
  <script src="scripts/register_button.js"></script>
  <script>
    initializePage();
    generaEp();
  </script>
</body>

</html>