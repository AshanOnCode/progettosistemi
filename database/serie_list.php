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

    
    function print_title($i){
        global $videosStore;
    
        $user = $videosStore->findAll();
        $count = count($user);
    
        if ($i > $count - 1) {
            return "";
        }
        
        return str_replace("_", " ", title_to_directory($user[$i]["title"]));
    }

    $images = [];
    for ($i = 0; $i < 10; $i++) {
        $images[$i] = print_image_path($i);
    }

    $titles = [];   
    for ($i = 0; $i < 10; $i++) {
        $titles[$i] = print_title($i);
    }

    
?>

<script>
    function generaTabellaSerie() {
        var images = <?php echo json_encode($images) ?>;
        var titles = <?php echo json_encode($titles)?>;
        var containers = document.getElementsByClassName('scroll-box');

        for (let index = 0; index < containers.length; index++) {
            const element = containers[index];

            for (let i = 0; i <= 9; i++) {

                const button = document.createElement('button');

                const p =  document.createElement('h1');

                p.textContent = titles[i];
                button.style.backgroundImage = ` linear-gradient(to top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0)), url(${images[i]})`;
                button.id = 'serie-button';

                button.addEventListener("click", () => {
                    window.location.href = `player.php?title=${images[i].replace("/img.jpg", "").replace("res/", "")}`;
                });
                button.appendChild(p);
                element.appendChild(button); 
            }
        }
    }
</script>