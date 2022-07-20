<?php
session_start();
define("URL",str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controller/joueursController.controller.php";
require_once "controller/jeuxController.controller.php";
require_once "controller/matchsController.controller.php";

$playerController = new playersController();
$gameController = new gamesController();
$contestController = new contestsController();

try {
    if (empty($_GET['page'])) {
        require 'views/accueil.views.php';
    } else {
        $url = explode('/', filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case "accueil" :
                require "views/accueil.views.php";
                break;
            case "joueurs" :
                if (empty($url[1])) {
                    $playerController->afficherListePlayers();
                }  else if ($url[1] === "m") {
                    $playerController->modifierPlayer($url[2]);
                }
                else if ($url[1] === "av") {
                    $playerController->ajoutPlayerValidation();
                }
                else if ($url[1] === "mv") {
                    $playerController->modificationPlayerValidation();
                }
                else if ($url[1] === "a") {
                    $playerController->ajouterPlayer();
                } else if ($url[1] === "s") {
                    $playerController->suppressionPlayer($url[2]);
                }else {
                    throw new Exception("La page n'existe pas");
                }
                break;
                
            case "jeux" :
                if (empty($url[1])) {
                    $gameController->afficherListeGames();
                }  else if ($url[1] === "m") {
                    $gameController->modifierGame($url[2]);
                }
                else if ($url[1] === "av") {
                    $gameController->ajoutGameValidation();
                }
                else if ($url[1] === "mv") {
                    $gameController->modificationGameValidation();
                }
                else if ($url[1] === "a") {
                    $gameController->ajouterGame();
                } else if($url[1] === "s") {
                    $gameController->suppressionGame($url[2]);
                }else {
                    throw new Exception("La page n'existe pas");
                }
                
                break;

            case "matchs" :
                if (empty($url[1])) {
                    $contestController->afficherListeContests();
                }
                  else if ($url[1] === "m") {
                    $contestController->modifierContest($url[2]);
                }
                 else if ($url[0] === "av") {
                    $contestController->ajoutContestValidation();
                }
                else if ($url[0] === "mv") {
                    $contestController->modificationContestValidation();
                }
                else if ($url[0] === "a") {
                    $contestController->ajouterContest();
                } else if ($url[0] === "s") {
                    $contestController->suppressionContest($url[2]);
                }
                else {
                    throw new Exception("La page n'existe pas");
                }break;
                default : throw new Exception("La page n'existe pas");
        }
    }
}
catch(Exception $e){
    $msg = $e->getMessage();
    require "views/error.views.php";
}
