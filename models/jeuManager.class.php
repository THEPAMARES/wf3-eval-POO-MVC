<?php

// 1. Il faut qu'on récupère la classe à gérer qui est la class Client
require_once "model.class.php";
require_once "jeu.class.php";

// 2. Création de la classe gameManager
// On veut bénéficier des méthodes qui sont dans la class Model, on ajoute le "extends"
// On ajoute les méthodes utiles pour le CRUD
class GameManager extends Model {

    private $games; // tableau de jeux

    public function ajouterGame($game){
        // récupération des jeux dans un tableau
        $this->games[] = $game;
    }

    // retourne le tableau des jeux
    public function getGames()
    {
        return $this->games;
    }

    //chargement des jeux de la table game
    public function chargementGames()
    {
        $req = $this->getBdd()->prepare('SELECT * FROM game ORDER bY game_id desc');
        $req->execute();

        $games = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($games as $game)
        {
            $g = new Game($game['game_id'], $game['title'], $game['min_players'], $game['max_players']);
            $this->ajouterGame($g);
        }
    }

    // retourne le jeu grace à l'identifiant
    public function getGameById($game_id){
        for($i=0; $i < count($this->games); $i++) {
            if($this->games[$i]->getGameId() === $game_id){
                return $this->games[$i];
            }
        }
        throw new Exception("Le jeu n'existe pas.");
    }

    // ajouter un jeu en base de données
    public function ajoutGameBdd($game_id, $title, $min_players, $max_players){
        $req = "INSERT INTO game(game_id, title, min_players, max_players) values (:game_id, :title, :min_players, :max_players)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":game_id",$game_id, PDO::PARAM_INT);
        $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        $stmt->bindValue(":min_players", $min_players, PDO::PARAM_INT);
        $stmt->bindValue(":max_players", $max_players, PDO::PARAM_INT);

        $resultat = $stmt->execute();
        $stmt->closeCursor();


        if($resultat > 0){
            $game = new Game($this->getBdd()->lastInsertId(), $game_id, $title, $min_players, $max_players);
            $this->ajouterGame($game);
        }
    }

        // suppression du jeu grace à l'dentifiant
        public function suppressionGameBdd($game_id){
            $req = "DELETE FROM game WHERE game_id = :game_id";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(':game_id', $game_id, PDO::PARAM_INT);
            $resultat = $stmt->execute();
            $stmt->closeCursor();
    
            if($resultat > 0){
                $game = $this->getGameById($game_id);
                unset($game);
            }
    
        }
    
        public function modificationGameBdd($game_id,$title, $min_players, $max_players){

            $req = "UPDATE game SET game_id = :game_id, title = :title, min_players = :min_players, max_players = :max_players WHERE game_id = :game_id";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":game_id", $game_id, PDO::PARAM_INT);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(":min_players", $min_players, PDO::PARAM_INT);
            $stmt->bindValue(":max_players", $max_players, PDO::PARAM_INT);
            
            $resultat = $stmt->execute();
            $stmt->closeCursor();
        
            if($resultat > 0){
                $this->getGameById($game_id)->setGameId($game_id);
                $this->getGameById($game_id)->setTitle($title);
                $this->getGameById($game_id)->setMin_players($min_players);
                $this->getGameById($game_id)->setMax_players($max_players);
            }
        
            }
        

}
