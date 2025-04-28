<?php
    require_once "functions.php";

    if(isset($_POST["logout"])) {
        log_out();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="styles/home.css">
        <link rel="stylesheet" href="styles/themes/rose-pine.css">
        <?php include "database/serie_dati.php";?>
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
            <h1>OpenTube</h1>
            <div id="login">
                <img src="res/ui/user.png" alt="dadaw">
                <button
                <?php
                    if(isset($_SESSION['username'])) {
                        echo "id='profile_button'";
                    }else {
                        echo "id='login_button'";
                    }
                ?>>
                    <h1>
                        <?php 
                            if(isset($_SESSION['username'])) {
                                echo $_SESSION['username'];
                            }else {
                                echo "Login";
                            }
                        ?>
                    </h1>
                </button>
                
            </div>
            
        </header>
    
        <script src="scripts/login_button.js"></script>

        <div id="main">
            <h1>
                Benvenuto su OpenTube
            </h1>
        </div>

        <div class="series-container">
            <div>
                <h1>Continua a guardare</h1>
            </div>
            <div class="scroll-box">
                
            </div>           
        </div>
        

        <div class="series-container">
            <div>
                <h1>Serie consigliate</h1>
            </div>
            <div class="scroll-box">
            </div>           
        </div>

        <div class="series-container">
            <div>
                <h1>Film consigliati</h1>
            </div>
            <div class="scroll-box" id="test">
            </div>           
        </div>
    </div>

    <div id="place_holder"></div>
    
    <script>
        generaTabellaSerie();

        // make series-container scroll horizontally
        // const containers = document.getElementsByClassName('scroll-box');
        // containers.array.forEach(container => {
        //     container.addEventListener('wheel', function(e) {
        //         e.preventDefault();
        //         scrollableDiv.scrollLeft += e.deltaY;
        //     });
        // });
        // const container = document.getElementsByClassName('test');
        // container.addEventListener('wheel', function(e) {
        //     e.preventDefault();
        //     scrollableDiv.scrollLeft += e.deltaY;
        // });
    </script>
</body>
</html>