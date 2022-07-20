<?php
// Quand on veut afficher une page, c'est lui qui va charger les infos dont on a besoin et afficher le résultat
// Le controller récupère les informations


require "models/joueurManager.class.php";

class PlayersController {

    private $_playerManager;

    // 1. Méthode appelée quand on crée un nouveau joueur
    public function __construct() {
        $this->_playerManager = new PlayerManager();
        $this->_playerManager->chargementPlayers();
    }

    // 2. Je récupère les données fournies par le contrôleur
    public function afficherListePlayers() {
        // Données provenant du models
        $players = $this->_playerManager->getPlayers(); // Je récupère les joueurs
        // Récupération de la vue
        require "views/listeDesJoueurs.views.php"; 
    }

    // 3. Modifier un joueur et va redifiger vers le template pour modifier le joueur ajouterUnJoueur.view.php
    public function ajouterPlayer() {
        require "views/ajouterUnJoueur.views.php";
    }

    // fonction executée lors de la validation du formulaire d'ajout d'un joueur
    public function ajoutPlayerValidation(){
        $this->_playerManager->ajoutPlayerBdd($_POST['player_id'], $_POST['email'],$_POST['nickname']);
    
        $_SESSION['alert'] = [
            'type' => "success",
            'msg' => 'Ajout Réalisé'
        ];
    
        header('Location: '.URL.'joueurs');
    }
    
        // fonction de suppression d'un joueur
        public function suppressionPlayer($player_id){
            $this->_playerManager->suppressionPlayerBdd($player_id);
    
            $_SESSION['alert'] = [
                "type" => "success",
                "msg" =>  "suppression effectuée"
            ];
    
            header('Location: '.URL."joueurs");
        }
    

    // 4. 
    public function modifierPlayer($player_id) {
        $player = $this->_playerManager->getPlayerById($player_id);

        $_SESSION['alert'] = [
            'type' => 'success',
            'msg' => 'Modification réalisée'
        ];
        require "views/modifierUnJoueur.views.php";
    }
    // fonction exécutée lors de la validation du formulaire de modification d'un joueur
    public function modificationPlayerValidation(){
        $this->_playerManager->modificationPlayerBdd($_POST['player_id'],$_POST['email'], $_POST['nickname']);
         header('Location: '.URL.'joueurs');
     }

}