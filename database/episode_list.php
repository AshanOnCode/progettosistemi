
<script>
    function generaEp() {
        var containers = document.getElementsByClassName('scroll-box');

        for (let i = 0; i < containers.length; i++) {
            const element = containers[i];

            for (let j = 0; j < serie.length; j++) {

                const button = document.createElement('button');

                button.id = 'serie-button';
                button.textContent=`Episodio n.${j+1}`;

                button.addEventListener("click", function (e){
                console.log("click");
                setEpisodio(j+1);
                getVideo();
                });

                element.appendChild(button); 
            }
        }
    }
</script> 
