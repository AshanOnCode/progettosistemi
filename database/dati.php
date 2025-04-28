<?php
function print_image_path($i){
    global $videosStore;

    $user = $videosStore->findAll();
    $count = count($user);

    if ($i > $count - 1) {
        return "res/Placeholder/img.jpg";
    }
    
    return "res/" . title_to_directory($user[$i]["title"]) . "/img.jpg";
}
?>