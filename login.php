<?php

    require_once "functions.php";

    if (isset($_SESSION['message'])) {
        unset($_SESSION['message']);
    }
?>



<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>Login</h2>

    <!-- Form di login -->
    <form method="POST" action="login.php">
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

</body>
</html>