<?php

    require_once "database.php";
    
    function attemptUpload(){
        $message = "";

        if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['episodes'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $episodes = $_POST['episodes'];
        
            $message = uploadVideo($title, $description, ["Horror", "Thriller"], "1821", "Mappa", "4");
        }

        $_SESSION["message"] = $message;

    }

    function uploadVideo($title, $description, $genres, $year, $studio, $length) {
        global $videosStore;
        
        if($title == ""|| $description == ""|| $length == ""){
            return "Completare tutti i campi";
        }

        $dir = title_to_directory($title);

        $_SESSION["title"] = $dir;
        if(!is_dir("res/")){
            mkdir("res/");
        }
        if(!is_dir("res/".$dir)){
            mkdir("res/".$dir);
        }
        

        for($i = 1; $i <= $length; $i++){
            if (!is_dir("res/".$dir.$i)) {
                mkdir("res/".$dir."/".$i);
            }
        }

        $videosStore -> insert([
            "title"=> $title,
            "description"=> $description,
            "genres"=> $genres,
            "length" => $length,
            "studio" => $studio,
            "year" => $year
            ]);

    }

    function title_to_directory($title) {
        return str_replace(" ","_", $title);
    }    