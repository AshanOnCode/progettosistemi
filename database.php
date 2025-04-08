<?php
require_once 'vendor/autoload.php';

use \SleekDB\Store;
use \SleekDB\Query;

// default configurations
$configuration = [
    "auto_cache" => true,
    "cache_lifetime" => null,
    "timeout" => false,
    "primary_key" => "_id",
    "search" => [
        "min_length" => 2,
        "mode" => "or",
        "score_key" => "scoreKey",
        "algorithm" => Query::SEARCH_ALGORITHM["hits"]
    ],
    "folder_permissions" => 0777
];

$dataDir = __DIR__ . "/database";

$userStore = new Store('users', $dataDir, $configuration);

$user = [
    '_id' => 1,
    'name' => 'Mike Doe',
    'email' => 'miked@example.com',
    'avatar' => [
        'sm' => "/img-sm.jpg",
        'lg' => "/img-lg.jpg"
    ]
];

$userStore->updateOrInsert($user);

$allUsers = $userStore->findAll();

print_r($allUsers);
//$userStore->deleteStore();
?>
