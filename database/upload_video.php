<?php

    require_once "database.php";
    
    function attemptUpload(){
        $message = "";

        if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['episodes'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $length = $_POST['episodes'];
        
            $message = uploadVideo($title, $description, $length);
        }

        $_SESSION["message"] = $message;

    }

    function uploadVideo($title, $description, $length) {
        global $videosStore;
        
        if($title == ""|| $description == ""|| $length == ""){
            return "Completare tutti i campi";
        }

        $today = date("m.d.y, g:i a");
        echo $today;

        $videosStore -> insert([
            "title"=> $title,
            "description"=> $description,
            "length" => $length,
            "upload_time" => $today
            ]);

    }