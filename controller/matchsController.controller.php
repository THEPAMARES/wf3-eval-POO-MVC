<?php
// Quand on veut afficher une page, c'est lui qui va charger les infos dont on a besoin et afficher le résultat
// Le controller récupère les informations


require "models/matchManager.class.php";

class ContestsController {
    private $_contestManager;

        // 1. Méthode appelée quand on crée un nouveau match
        public function __construct() {
            $this->_contestManager = new ContestManager();
            $this->_contestManager->chargementContests();
        }
    
        // 2. Je récupère les données fournies par le contrôleur
        public function afficherListeContests() {
            // Données provenant du models
            $contests = $this->_contestManager->getContests(); // Je récupère les matchs
            // Récupération de la vue
            require "views/listeDesMatchs.views.php"; 
        }
    
        // 3. Modifier un match et va redifiger vers le template pour modifier le match ajouterUnMatch.view.php
        public function ajouterContest() {
            require "views/ajouterUnMatch.views.php";
        }
    
        // fonction executée lors de la validation du formulaire d'ajout d'un match
        public function ajoutContestValidation(){
            $this->_contestManager->ajoutContestBdd($_POST['contest_id'], $_POST['game_id'],$_POST['start_date'],$_POST['winner_id']);
        
            $_SESSION['alert'] = [
                'type' => "success",
                'msg' => 'Ajout Réalisé'
            ];
        
            header('Location: '.URL.'matchs');
        }
        
            // fonction de suppression d'un match
            public function suppressionContest($contest_id){
                $this->_contestManager->suppressionContestBdd($contest_id);
        
                $_SESSION['alert'] = [
                    "type" => "success",
                    "msg" =>  "suppression effectuée"
                ];
        
                header('Location: '.URL."matchs");
            }
        
    
        // 4. 
        public function modifierContest($contest_id) {
            $contest = $this->_contestManager->getContestById($contest_id);
    
            $_SESSION['alert'] = [
                'type' => 'success',
                'msg' => 'Modification réalisée'
            ];
            require "views/modifierUnMatch.views.php";
        }
        // fonction exécutée lors de la validation du formulaire de modification d'un match
        public function modificationContestValidation(){
            $this->_contestManager->modificationContestBdd($_POST['contest_id'], $_POST['game_id'],$_POST['start_date'],$_POST['winner_id']);
             header('Location: '.URL.'matchs');
         }


         
    }