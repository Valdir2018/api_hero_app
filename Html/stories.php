<?php 
require "include/header.php";

    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
    }

?>
    
    <div class="flexrow-page-stories"></div>
      <section class="spinner">
         <img src="static/image/Spinner-3.gif" alt="">
      </section>
      <div class="content" id="stories"> </div>

     
 <?php require "include/footer.php"; ?>

     <script>

        var spinner = document.querySelector('.spinner'); 
        window.addEventListener('load', () => {
          
           getStories();

            setTimeout(function(){ 
                spinner.classList.add('spinner-disable');
            }, 1600);
        
        });
 

        function  renderTemplate(data) { 
           let output = 
                `<div class="content-stories">
                    <img src=${data.image+'.'+data.extension}  alt=" " id="imagem">
                      <h1>${data.title}  <button onclick='goBack()'>Voltar</button></h1>
                      
                    <div id="totalStories"></div>
                   
                </div>`;
            document.getElementById('stories').innerHTML += output;
        }

        function renderStories(storie) {
            let output = 
                 `<div class="storie">
                    ${storie}
                 </div>`;
            document.querySelector('#totalStories').innerHTML += output;
        }

        function getStories() {
            const params = new URLSearchParams(document.location.search.substring(1));
            const paramsId = params.get('id');

            let res = new XMLHttpRequest();
            res.open('GET', 'http://localhost/api_hero_app/app/stories.php?method=stories&params='+paramsId, true);
            res.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            res.onreadystatechange = function() {
                if (res.readyState === 4 && res.status === 200) {
                    const stories = JSON.parse(res.responseText);
                    const allStories = stories['data'].results;

                    let counterImage = 0;
                    let counterStories = 0;
                    let getStories = [];
                            
                    allStories.forEach(function(storie, index) {
                        getStories.push(storie.description);
                        
                        while( counterImage < 1) {
                            const images = {
                                  title: storie['title'],
                                  image: storie.thumbnail['path'],
                                  extension: storie.thumbnail['extension']
                            };
                            counterImage++;
                            renderTemplate(images);
                        }
                       
                   });

                   for(var x = 0; x <= 4; x++) {
                        console.log(x);
                        renderStories(getStories[x]);
                    }
                }
            }
           res.send();
        }

        function handleStories() {
            const params = new URLSearchParams(document.location.search.substring(1));
            const paramsId = params.get('id');

            const res = new XMLHttpRequest();
            res.open('GET', 'http://localhost/api_hero_app/app/index.php?method=stories&params='+paramsId, true);
            res.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            res.onreadystatechange = function() {
                if (res.readyState === 4 && res.status === 200) {
                   console.log('success');
                }
            }

           res.send();
        }

        function goBack() {
           window.history.go(-1);
        }
        
     </script>
</body>
</html>


