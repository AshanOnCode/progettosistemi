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

    $images = [];
    for ($i = 0; $i < 10; $i++) {
        // Usa la tua funzione per ottenere i percorsi
        $images[$i] = print_image_path($i);
    }
    
?>

<script>
    function generaTabellaSerie() {
        var images = <?php echo json_encode($images) ?>;
        var containers = document.getElementsByClassName('scroll-box');

        for (let index = 0; index < containers.length; index++) {
            const element = containers[index];

            for (let i = 0; i <= 9; i++) {

                const button = document.createElement('button');

                button.style.backgroundImage = `url(${images[i]})`;
                button.id = 'serie-button';

                button.addEventListener("click", () => {
                    window.location.href = `player.php?title=${images[i].replace("/img.jpg", "").replace("res/", "")}`;
                });

                element.appendChild(button); 
            }
        }
    }
</script>