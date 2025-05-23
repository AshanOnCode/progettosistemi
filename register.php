<?php
    require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles/register.css">
    <link rel="stylesheet" href="styles/themes/rose-pine.css">
</head>
<body>

    <div class="register">

        <h1>Register</h1>

        <!-- Form di login -->
        <form method="POST" action="register.php">
            <div>
                <label for="username">Username:</label>
                <input type="username" name="username" id="username">
            </div>

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
                    attemptRegister();
                    echo $_SESSION["message"];
                ?>
            </p>
        </form>
    </div>


</body>
</html>