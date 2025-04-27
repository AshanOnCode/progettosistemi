<?php 
    require_once "database/login_user.php";
    require_once "database/register_user.php";
    require_once "database/upload_video.php";

    session_start();

    uploadVideo(
        "Popeye the sailor",
        "Popeye and his adventures.",
        ["Musical", "Family", "Comedy"],
        "1933-1934",
        "Fleischer Studios",
        "4");
