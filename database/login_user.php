
<?php
    // Funzione per il login dell'utente
    require_once "database.php";

    function loginUser($email, $password) {
        global $usersStore;

        // Cerca l'utente per email
        $user = $usersStore->findOneBy(["email", "=", $email]);
        
        if ($user) {
            // Verifica se la password è corretta
            if (password_verify($password, $user['password'])) {
                echo "Login effettuato con successo!";
            } else {
                echo "Password errata!";
            }
        } else {
            echo "Utente non trovato!";
        }
    }

    loginUser("alespa20075@gmail.com", "pippo123");
