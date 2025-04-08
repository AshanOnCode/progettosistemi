<?php
    require_once('vendor/autoload.php');

    use SleekDB\Store;

    $configuration = ['timeout'=>false];

    $store = new Store('database', 'data_folder', $configuration);

    $store->updateOrInsert([
        '_id' => 2,
        'name' => 'Mario',
        'age' => 30
    ]);

    $users = $store->findAll();

    print_r($users);
    //$store->deleteStore();


