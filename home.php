<?php
    require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="styles/themes/rose-pine.css">
    <?php include "database/serie_list.php"; ?>
</head>

<body>

    <div id="background"></div>

    <div id="profile_window">
        <div>
            <h1>
                <?php if (isset($_SESSION["username"])){ echo $_SESSION["username"]; }?>
                    's profile window
            </h1>
        </div>
        
    </div>


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

        <div id="main">
            <h1>
                Benvenuto su OpenTube
            </h1>
        </div>

        <div class="series-container">
            <div>
                <h1>Continua a guardare</h1>
            </div>
            <div class="scroll-box"></div>
        </div>


        <div class="series-container">
            <div>
                <h1>Serie consigliate</h1>
            </div>
            <div class="scroll-box"></div>
        </div>

        <div class="series-container">
            <div>
                <h1>Film consigliati</h1>
            </div>
            <div class="scroll-box"></div>
        </div>
    </div>

    <div id="place_holder"></div>

    <script>
        generaTabellaSerie();
    </script>
    <script src="scripts/login_button.js"></script>
    <script src="scripts/profile_button.js"></script>
    <script src="scripts/home_button.js"></script>
    <script src="scripts/register_button.js"></script>
</body>

</html>