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
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/themes/rose-pine.css">
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



    <div id="screen">
        
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
        
        <p>
        
        </p>
        

        <!-- Form for logout -->
        <form method="POST" action="home.php">
            <div>
                <button type="submit" name="logout" >Logout</button>
            </div>
        </form>
    </div>

    <div id="place_holder"></div>
</body>
</html>