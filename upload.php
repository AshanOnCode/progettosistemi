<?php
    require_once "functions.php";

    // Display the email stored in session (if logged in)
    echo $_SESSION["username"]."\n";
    echo isset($_SESSION["email"]) ? $_SESSION["email"] : "No email found";

    if ($_SESSION["username"] != "admin"){
        log_out();
        login_redirect();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <p>UPLOAD</p>

   <!-- Form di login -->
   <form method="POST" action="upload.php">
        <div>
            <label for="title">Title:</label>
            <input type="title" name="title" id="title">
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="description" name="description" id="description">
        </div>

        <div>
            <label for="episodes">How many episodes:</label>
            <input type="episodes" name="episodes" id="episodes">
        </div>

        <div>
            <button type="submit">Upload</button>
        </div>

        <p>
            <?php
                attemptUpload();
                echo $_SESSION["message"];
            ?>
        </p>
    </form>    
</body>
</html>