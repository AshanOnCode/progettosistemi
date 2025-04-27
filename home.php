<?php
    require_once "functions.php";

    // Display the email stored in session (if logged in)
    echo $_SESSION["username"]."\n";
    echo isset($_SESSION["email"]) ? $_SESSION["email"] : "No email found";
    

    // Redirect if the user is not logged in
    login_redirect();

    // Check if the user is trying to log out (using POST method)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        log_out();  // Call your log_out function
        login_redirect();  // Redirect the user after logging out
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
    <p>CIAO</p>

    <!-- Form for logout -->
    <form method="POST">
        <div>
            <button type="submit">Logout</button>
        </div>
    </form>
</body>
</html>