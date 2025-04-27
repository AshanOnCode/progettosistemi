<?php
require_once "src/Store.php";
    use SleekDB\Store;

    $configuration = [
        "timeout" => false,
      ];

    // Crea le cartelle per gli utenti
    $usersStore = new Store('users', 'database_data', $configuration); // La cartella dove vengono salvati i dati

    // Crea le cartelle per i video
    $videosStore = new Store('videos', 'database_data', $configuration);
  