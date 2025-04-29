<script>


    var serie = null;
    let episodio = 1;

    const urlParams = new URLSearchParams(window.location.search);
    const path = urlParams.get("title");

    async function caricaPagina(){
        try {

            const response = await fetch(`./getSerie.php?title=${path}`);

            if (!response.ok) throw new Error("Errore nel fetch");

            serie = await response.json();

            initializePage();
            generaEp();

        } catch (err) {
            console.error("Errore nel caricamento:", err);
        }
    }

    function setEpisodio(numero){
        episodio=numero;
    }

    function getVideo(){

        var title = serie.title;

        const video = document.getElementById('video');

        const videoSrc = `res/${path}/${episodio}/video.m3u8`;

        if (Hls.isSupported()) {
            const hls = new Hls();
            hls.loadSource(videoSrc);
            hls.attachMedia(video);
        } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
            video.src = videoSrc;
        }
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

            if (index===1) {
                element.textContent = serie.studio;
            }else{
                element.textContent = serie.year;
            }

        }
    }

    function getCover(){
        var coverImage = document.getElementsByClassName('coverImg');

        for (let i = 0; i < coverImage.length; i++) {
            const element = coverImage[i];

            element.alt = `res/${path}/cover.jpg`;
            element.src = `res/${path}/cover.jpg`;

        }
    }

    function initializePage() {
        getVideo();
        getTitle();
        getDescription();
        getTagList();
        getStudio();
        getCover();
    }

    window.addEventListener("DOMContentLoaded", caricaPagina);
</script>