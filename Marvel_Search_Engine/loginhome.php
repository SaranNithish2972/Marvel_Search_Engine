<?php
require './submit1.php';
global $conn;
if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
}
else{
  header("Location: login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE MARVEL SEARCH ENGINE</title>
        <link rel="stylesheet" href="./css/main.css">
    </head>
<body>
    <audio id="myAudio">
        <source src="./assets/IMAGES/Mouseclick.mp3" type="audio/mpeg">
      </audio>
    <header>
        <nav class="upper_nav_bar">
            <ul>
                <li class="upper_nav_bar__item "><a href="https://www.marvel.com/" target="_blank" >MARVEL OFFICIAL</a> </li>
                <li class="upper_nav_bar__item "><a href="tutorial.html">HOW TO USE</a></li>
                <li class="upper_nav_bar__item "><a href="history.php">HISTORY</a></li>
                <li class="upper_nav_bar__item "><a href="logout.php">LOG OUT</a></li>      
            </ul>
        </nav>
         <div class="title_container">
            <h1 id="mainTitle" class="title clickable">THE MARVEL<br> <span>SEARCH ENGINE</span></h1>
        </div>
    </header>
    <main>
        <div class="guidebook__control_panel">
            <h2 class="subtitle">FIND A MARVEL LEGEND</h2>
            <div class="search_bar_container">
                <input id="searchHeroBar" class="control_panel__search_bar" type="text" name="" placeholder="E.g. 'HULK'" >
            </div>
            <div class="control_panel__button_container">
                <input id="searchButton" class="control_panel__button button button--yellow clickable" type="button" value="SEARCH IT">
                <input id="findRandomButton" class="control_panel__button button button--green clickable" type="button" value="RANDOM SEARCH">
            </div>
            
        </div>
        <script>
            var audio = document.getElementById("myAudio");
            var playBtn = document.getElementById("findRandomButton");
            var playBtn2 = document.getElementById("searchButton");
            playBtn.addEventListener("click", function() {
              audio.play();
            }
            );
            playBtn2.addEventListener("click", function() {
    audio.play();
   
  });
          </script>
        <div id="resultsStart"></div>
        <!-- SEARCH RESULTS CONTAINER -->
        <div id="characterSearchResults" class="guidebook__character_search_results">
            <template id="templateSearchResults">
                <div id="resultID00" class="character_search_result__container clickable">
                    <div class="character_search_result__picture_box"><img class="character_search_result__picture" src="./assets/IMAGES/hydra_image_not_found.PNG" alt=""></div>
                    <span class="character_search_result__container__name">[HERO NAME]</span>
                </div>
            </template>
        </div>

        <!-- CHARACTER CARD CONTAINER -->
        <div id='characterGalery' class="guidebook__character_galery">
            <template id="templateCharacterRender">
                <div class="card_container card_color_1">
                    <span class="card_title">[HERO NAME]</span>
                    <div class="card_thumbnail_and_description_container">
                        <img class="card_thumbnail" src="./assets/IMAGES/hydra_image_not_found.PNG" alt="">
                        <p class="card_description">[DESCRIPTION]</p>
                    </div>      
        </div>
        </template></div>
     </main>
    <footer>
           &nbsp;Designed by Adhava & Saran&nbsp;
           <img src="./assets/IMAGES/location.png" height="18"><p id="city"> </p>
    </footer>
    <script src="./js/main.js" type="module"></script>
    <script src="./js/script.js" ></script>
</body>
</html>