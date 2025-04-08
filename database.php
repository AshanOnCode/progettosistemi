<?php
    require_once('vendor/autoload.php');

    use SleekDB\Store;

    $store = new Store('database', 'data_folder');

    $store->insert([
        'name' => 'Mario',
        'age' => 30
    ]);


