<?php

require_once "model.class.php";
require_once "joueur.class.php";

// 2. Création de la classe playerManager
// On veut bénéficier des méthodes qui sont dans la class Model, on ajoute le "extends"
// On ajoute les méthodes utiles pour le CRUD
class PlayerManager extends Model {
    private $players; // tableau de joueurs

    public function ajouterPlayer($player){
        // récupération des joueurs dans un tableau
        $this->players[] = $player;
    }

    // retourne le tableau des joueurs
    public function getPlayers()
    {
        return $this->players;
    }

    //chargement des joueurs de la table players
    public function chargementPlayers()
    {
        $req = $this->getBdd()->prepare('SELECT * FROM player ORDER bY player_id desc');
        $req->execute();

        $players = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($players as $player)
        {
            $p = new Player($player['player_id'], $player['email'], $player['nickname']);
            $this->ajouterPlayer($p);
        }
    }

    // retourne le joueur grace à l'identifiant
    public function getPlayerById($player_id){
        for($i=0; $i < count($this->players); $i++) {
            if($this->players[$i]->getPlayerId() === $player_id){
                return $this->players[$i];
            }
        }
        throw new Exception("Le joueur n'existe pas.");
    }

    // ajouter un joueur en base de données
    public function ajoutPlayerBdd($player_id, $email, $nickname){
        $req = "INSERT INTO player(player_id, email, nickname) values (:player_id, :email, :nickname)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":player_id",$player_id, PDO::PARAM_INT);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":nickname", $nickname, PDO::PARAM_STR);

        $resultat = $stmt->execute();
        $stmt->closeCursor();


        if($resultat > 0){
            $player = new Player($this->getBdd()->lastInsertId(), $player_id, $email, $nickname);
            $this->ajouterPlayer($player);
        }
    }

        // suppression du joueur grace à l'dentifiant
        public function suppressionPlayerBdd($player_id){
            $req = "DELETE FROM player WHERE player_id = :player_id";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(':player_id', $player_id, PDO::PARAM_INT);
            $resultat = $stmt->execute();
            $stmt->closeCursor();
    
            if($resultat > 0){
                $player = $this->getPlayerById($player_id);
                unset($player);
            }
    
        }
    
        public function modificationPlayerBdd($player_id,$email,$nickname){

            $req = "UPDATE player SET player_id = :player_id, email = :email, nickname = :nickname WHERE player_id = :player_id";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":player_id", $player_id, PDO::PARAM_INT);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':nickname', $nickname, PDO::PARAM_STR);
        
            $resultat = $stmt->execute();
            $stmt->closeCursor();
        
            if($resultat > 0){
                $this->getPlayerById($player_id)->setPlayerId($player_id);
                $this->getPlayerById($player_id)->setEmail($email);
                $this->getPlayerById($player_id)->setNickname($nickname);
            }
        
            }
        

}
