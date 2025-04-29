<?php

require_once "database/database.php";

    global $videosStore;
    if (!isset($_GET["title"])) {
        http_response_code(400); 
        header("Content-Type: application/json");
        echo json_encode(["error" => "Missing title"]);
        exit;
    }

    
    $path = $_GET["title"];
    $title_u = str_replace("_", " ", $path);

    
    $serie = $videosStore->findOneBy(["title", "=", $title_u]);

    if (!$serie) {
        http_response_code(404); 
        header("Content-Type: application/json");
        echo json_encode(["error" => "Serie not found"]);
        exit;
    }

    header("Content-Type: application/json"); 
    echo json_encode($serie); 
