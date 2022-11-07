<?php
    include_once "util.php";

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="dino.php">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>Fortnight</title>
  </head>
  <body>
  <div class="container">
    <div class="row">
      <div class="col l10 push-l1 z-depth-2">
        <div class="row textCenter">
          <h1>Fortnight</h1>
          <input type='text' id='name' name='name' placeholder='name'>
          <h5>press space to jump</h5>
        </div>
      </div>
    </div>
  </div>
  <div id="game" class="z-depth-2">
    <div id="character">
      <div id="characterHead"></div>
      <div id="characterFeet"></div>
    </div>
    <div id="block"></div>
  </div>
  <div class="row">
    <div class="col l4 push-l5">
      <p id="score">Score: <span id="scoreSpan"></span></p>
    </div>
  </div>
  <div class="row">
    <div class="col l4 push-l4">
      <h3>update: vsechno je lepscejsi a freshejsi</h3>
    </div>
  </div>
  <div id="border" class="container">
    <div class="row">
      <div class="col l10 push-l1 z-depth-2">
        <div id="bold" class="row textCenter">
          <div class="col l4 bold">name</div>
          <div class="col l4 bold">score</div>
          <div class="col l4 bold">time</div>
        </div>
        <div id="scoreboard" class="users row z-depth-1">
            <?php top_5_score(); ?>
        </div>
        <div id="last"></div>
      </div>
    </div>
  </div>




  <script>
    // console.log("scoreDB");
    var character = document.getElementById("character");
    var block = document.getElementById("block");
    var counter=0;
    let dead = false;
    let scoreboard = document.getElementById("scoreboard");
    function jump(e){
        // console.log(e);
        if(character.classList == "animate"){return}
        if (dead) {
          dead = false;
          block.style.animation = "block 0.7s infinite linear";
          return;
        }
        character.classList.add("animate");
        setTimeout(function(){
            character.classList.remove("animate");
        },310);
    }


    document.getElementById("game").addEventListener("click", jump); 

    var checkDead = setInterval(function() {
        if (dead) return;
        let characterTop = parseInt(window.getComputedStyle(character).getPropertyValue("top"));
        let blockLeft = parseInt(window.getComputedStyle(block).getPropertyValue("left"));
        

        if(blockLeft<20 && blockLeft>-20 && characterTop>=130) {
            block.style.animation = "none";
            dead = true;

            var scoreDB = Math.floor(counter/70);

            console.log(scoreDB);
            $.post("xhr-action.php", {'score': scoreDB, 'name': document.getElementById("name").value}).done(function(data){
              console.log("data: ", data);
            });

            $.get("xhr-action.php").done(
              function(data)
              {
                // console.log(data);
                scoreboard.innerHTML = data;
              }
            );

            counter=0;
        }
        
        else {
            counter++;
            document.getElementById("scoreSpan").innerHTML = Math.floor(counter/70);
        }
    }, 10);
  </script>
</body>
</html>