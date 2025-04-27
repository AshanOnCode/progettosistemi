
<?php
    // Funzione per il login dell'utente
    require_once "database.php";

    function log_out() {
        session_unset();
        session_destroy();
        session_start();
    }

    function login_redirect() {
        if(!isset($_SESSION["email"])){
            header("Location: login.php");
            exit();
        }
    }

    function attemptLogin(){
        
        $message = "";
        $email = "";

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            $message = loginUser($email, $password);
        }

        if($message === "Login effettuato con successo!"){
            global $usersStore;
            header("Location: home.php");

            $user = $usersStore->findOneBy(["email", "=", $email]);

            $_SESSION["email"] = $email;
            $_SESSION["username"] = $user["username"];
            $message = "";
            exit();
        }

        $_SESSION["message"] = $message;

    }


    function loginUser($email, $password) {
        global $usersStore;

        // Cerca l'utente per email
        $user = $usersStore->findOneBy(["email", "=", $email]);
        
        if ($user) {
            // Verifica se la password è corretta
            if (password_verify($password, $user['password'])) {
                return "Login effettuato con successo!";
            } else {
                return "Password errata!";
            }
        } else {
            return "Utente non trovato!";
        }
    }
