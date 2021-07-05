<?php require 'include/header.php' ?>



     <div class="flex-top-banner">
        <div id="data"></div>
         <img src="static/image/60dcda031fa021.jpg" alt="">
     </div>

     <section class="spinner">
        <img src="static/image/Spinner-3.gif" alt="">
    </section>

     <div class="content" id="datalist">
     
     </div>
  
   

     
<?php require 'include/footer.php' ?>

     <script>

        const SERVER = 'localhost';   

        window.addEventListener('load', () => {
            fetchCharacters();
            var spinner = document.querySelector('.spinner');

            setTimeout(function(){ 
                 spinner.classList.add('spinner-disable');
            }, 4000);
            
        });
 

        function  render(data) { 
           let output = 
            `<div class="content-image">
                  <img src=${data.image +'/portrait_incredible.jpg'}  alt=" ">
               <div class="content-title"> ${data.name}</div>
               <button type="button">
                   <a href=stories.php?id=${data.id}>stories</a>
                </button>
            </div>`;
            document.getElementById('datalist').innerHTML += output;
        }

       function heroFavorites() {
            return [ { name: "Avengers" },
                     { name: "Agent Zero"},
                     { name: "Ajak"}
            ];
        }
        
        async function fetchCharacters() {
            if (SERVER === '') 
                throw new Error('Recurso não localizado.');

            const res = await fetch(`http://${SERVER}/api_hero_app/app/index.php`);
            const allResults = await res.json();
            const characters = allResults['data'].results; 
            const heroNames  = heroFavorites();

            characters.forEach(function(character, index) {
               heroNames.map(hero => {
                   console.log(characters[1].stories.items.resourceURI);
                    let counter = 0;

                    if (character['name'] === hero.name && counter <= 2) {
                        
                        const currentCharacter = {
                            id: character['id'],
                            name: character['name'],
                            image: character.thumbnail['path'],
                            extension: character.thumbnail['extension']
                        };

                        counter++;
                        render(currentCharacter);
                    }
               });                     
            });
        }  
        
     </script>
</body>
</html>