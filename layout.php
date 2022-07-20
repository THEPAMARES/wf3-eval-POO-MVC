<?php
ob_start()


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Evaluation 4"><!--description de la page-->
        <meta name="keywords" content="HTML,CSS,JavaScript,PHP"> <!--Mot clef de la page-->
        <meta name="author" content="TAVARES Pamela"><!--Auteur du site-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>wf3_php_final_pamela</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    </head>
<body>
    <header>
       
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
            <a class="navbar-brand" href="<?=URL?>">My Scoreboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=URL?>jeux">Les jeux </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL?>joueurs">Les joueurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL?>matchs">Les parties</a>
                </li>

            </ul>
        </div>
        </nav>
    
    </header>

    <main>
        <div class='container'>
            <!-- <h1 class="text-center py-5">Liste des joueurs</h1> -->
            <?= $content ?> 
            <!-- chargement des views (vue)
            Les views nous permettent de mettre en place le crud (create, read, update, delete)  -->
        </div>
    </main>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>