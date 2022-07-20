<?php
// Quand on veut afficher une page, c'est lui qui va charger les infos dont on a besoin et afficher le résultat
// Le controller récupère les informations


require "models/jeuManager.class.php";

class GamesController {
    private $_gameManager;

    // 1. Méthode appelée quand on crée un nouveau jeu
    public function __construct() {
        $this->_gameManager = new GameManager();
        $this->_gameManager->chargementGames();

    }

    // 2. Je récupère les données fournies par le contrôleur
    public function afficherListeGames() {
        // Données provenant du models
        $games = $this->_gameManager->getGames(); // Je récupère les jeux

        // Récupération de la vue
        require "views/listeDesJeuxDispo.views.php"; // Je récupère la vue
    }

    // 3. Modifier un client et va redifiger vers le template pour modifier le jeu ajouterUnJeu.view.php
    public function ajouterGame() {
        require "views/ajouterUnJeu.views.php";
    }

    // fonction executée lors de la validation du formulaire d'ajout d'un joueur
    public function ajoutGameValidation(){
        $this->_gameManager->ajoutGameBdd($_POST['game_id'],$_POST['title'], $_POST['min_players'], $_POST['max_players']);
    
        $_SESSION['alert'] = [
            'type' => "success",
            'msg' => 'Ajout Réalisé'
        ];
    
        header('Location: '.URL.'jeux');
    }
    
        // fonction de suppression d'un joueur
        public function suppressionGame($game_id){
            $this->_gameManager->suppressionGameBdd($game_id);
    
            $_SESSION['alert'] = [
                "type" => "success",
                "msg" =>  "suppression effectuée"
            ];
    
            header('Location: '.URL."jeux");
        }
    

    // 4. 
    public function modifierGame($game_id) {
        $game = $this->_gameManager->getGameById($game_id);

        $_SESSION['alert'] = [
            'type' => 'success',
            'msg' => 'Modification réalisée'
        ];
        require "views/modifierUnJeu.views.php";

        
    }
    // fonction exécutée lors de la validation du formulaire de modification d'un joueur
    public function modificationGameValidation(){
        $this->_gameManager->modificationGameBdd($_POST['game_id'],$_POST['title'], $_POST['min_players'],$_POST['max_players']);
         header('Location: '.URL.'jeux');
     }
     
}