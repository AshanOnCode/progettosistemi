<?php

    require_once "database.php";

    // Esempio di registrazione
    registerUser('ale', 'alespa20075@gmail.com', 'pippo123');

    function registerUser($username, $email, $password) {
            global $usersStore;
            
            // Hash della password 
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $user = $usersStore->findOneBy(["username", "=", $username]);

            if ($user != null) {
                echo "Nome utente già registrato!";
                return false;
            }

            $user = $usersStore->findOneBy(["email", "=", $email]);

            if ($user != null) {
                echo "Email già utilizzata!";
                return false;
            }

            try {
                // Salva l'utente nel database
                $usersStore->insert([
                    'username'=> $username,
                    'email' => $email,
                    'password' => $hashedPassword
                ]);
                echo "Utente registrato con successo!";
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        
            return true;
        }
