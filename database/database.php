<?php
    require_once('vendor/autoload.php');

    use SleekDB\Store;

    $configuration = [
        "timeout" => false,
      ];

    // Crea le cartelle per gli utenti
    $usersStore = new Store('users', 'data_folder', $configuration); // La cartella dove vengono salvati i dati

    // Crea le cartelle per i video
    $videosStore = new Store('videos', 'data_folder', $configuration);
  