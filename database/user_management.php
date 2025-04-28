<?php

    require_once "database.php";

    function attemptRegister(){
        
        $message = "";

        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            $message = registerUser($username, $email, $password);
        }

        if($message == "Utente registrato con successo!"){
            header("Location: home.php");
            exit();
        }

        $_SESSION["message"] = $message;

    }

    function registerUser($username, $email, $password) {
            global $usersStore;
            
            if($username == ""|| $email == ""|| $password == ""){
                return "Completare tutti i campi";
            }

            // Hash della password 
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $user = $usersStore->findOneBy(["username", "=", $username]);

            if ($user != null) {
                return "Nome utente già registrato!";
            }

            $user = $usersStore->findOneBy(["email", "=", $email]);

            if ($user != null) {
                return "Email già utilizzata!";
            }

            try {
                // Salva l'utente nel database
                $usersStore->insert([
                    'username'=> $username,
                    'email' => $email,
                    'password' => $hashedPassword
                ]);
                return "Utente registrato con successo!";
            } catch (\Throwable $th) {
                return "Errore";
            }
        }

        
    function log_out() {
        session_unset();
        session_destroy();
        session_start();
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

            $user = $usersStore->findOneBy(["email", "=", $email]);

            $_SESSION["email"] = $email;
            $_SESSION["username"] = $user["username"];
            $message = "";
            
            header("Location: index.php");
            exit;
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

