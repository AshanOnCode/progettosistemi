
<?php

    require_once "database/database.php";

    $path = $_GET["title"];
    
    $title_u = str_replace("_", " ", $path);   

    $serie = $videosStore->findOneBy(["title", "=", $title_u]);

    $serie_encoded = json_encode($serie);
?>

<script>

    var serie = <?php echo $serie_encoded;?>;
    let episodio = 1;

    function setEpisodio(numero){
        episodio=numero;
        console.log(episodio);
    }

    function getVideo(){

        var title = serie.title;

        const video = document.getElementById('video');

        const videoSrc = `res/<?php echo $path?>/${episodio}/video.m3u8`;

        if (Hls.isSupported()) {
            const hls = new Hls();
            hls.loadSource(videoSrc);
            hls.attachMedia(video);
            } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
            // Per safari che supporta HLS
            video.src = videoSrc;
            video.addEventListener('loadedmetadata', function () {
                video.play();
            });
        }
        console.log(title, episodio);

    }

    function getTitle(){
        var elements = document.getElementsByClassName('title');

        for (let index = 0; index < elements.length; index++) {
            const element = elements[index];

            var p = document.createElement('p');

            p.textContent = serie.title ;

            element.appendChild(p);

        }
    
    }

    function getDescription(){
        var elements = document.getElementsByClassName('description');

        for (let index = 0; index < elements.length; index++) {
            const element = elements[index];

            element.textContent = serie.description;
        }
    
    }

    function getTagList(){
        var elements = document.getElementsByClassName('tag-list');

        for (let index = 0; index < elements.length; index++) {
            const element = elements[index];
            for (let j = 0; j < serie.genres.length; j++) {
                const genres = serie.genres[j];
                
                var li = document.createElement('li');

                li.textContent = genres;

                element.appendChild(li);
            }
        }
    }

    function getStudio(){
        var elements = document.getElementsByClassName('uscita');

        for (let index = 0; index < elements.length; index++) {
            const element = elements[index];
           
            if (index==1) {
                element.textContent = serie.studio;
            }else{
                element.textContent = serie.year;
            }
           
        }
    }
    
  </script>
 