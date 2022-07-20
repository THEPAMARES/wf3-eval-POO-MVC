<?php

require_once "model.class.php";
require_once "match.class.php";

// 2. Création de la classe contestManager
// On veut bénéficier des méthodes qui sont dans la class Model, on ajoute le "extends"
// On ajoute les méthodes utiles pour le CRUD
class ContestManager extends Model {

    private $contests; // tableau des matchs

    public function ajouterContest($contest){
        // récupération des matchs dans un tableau
        $this->contests[] = $contest;
    }

    // retourne le tableau des matchs
    public function getContests()
    {
        return $this->contests;
    }

    //chargement des matchs de la table contests
    public function chargementContests()
    {
        $req = $this->getBdd()->prepare('SELECT * FROM contest ORDER bY contest_id desc');
        $req->execute();

        $contests = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($contests as $contest)
        {
            $c = new contest($contest['contest_id'], $contest['game_id'], $contest['start_date'], $contest['winner_id']);
            $this->ajouterContest($c);
        }
    }

    // retourne le match grace à l'identifiant
    public function getContestById($contest_id){
        for($i=0; $i < count($this->contests); $i++) {
            if($this->contests[$i]->getContestId() === $contest_id){
                return $this->contests[$i];
            }
        }
        throw new Exception("Le match n'existe pas.");
    }

    // ajouter un match en base de données
    public function ajoutContestBdd($contest_id, $game_id, $start_date, $winner_id){
        $req = "INSERT INTO contest(contest_id, game_id, start_date, winner_id) values (:contest_id, :game_id, :start_date, :winner_id)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":contest_id",$contest_id, PDO::PARAM_INT);
        $stmt->bindValue(":game_id", $game_id, PDO::PARAM_INT);
        $stmt->bindValue(":start_date", $start_date, PDO::PARAM_INT);
        $stmt->bindValue(":winner_id", $winner_id, PDO::PARAM_INT);

        $resultat = $stmt->execute();
        $stmt->closeCursor();


        if($resultat > 0){
            $contest = new contest($this->getBdd()->lastInsertId(), $contest_id, $game_id, $start_date, $winner_id);
            $this->ajouterContest($contest);
        }
    }

        // suppression du match grace à l'dentifiant
        public function suppressionContestBdd($contest_id){
            $req = "DELETE FROM contest WHERE contest_id = :contest_id";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(':contest_id', $contest_id, PDO::PARAM_INT);
            $resultat = $stmt->execute();
            $stmt->closeCursor();
    
            if($resultat > 0){
                $contest = $this->getContestById($contest_id);
                unset($contest);
            }
    
        }
    
        public function modificationContestBdd($contest_id,$game_id, $start_date, $winner_id){

            $req = "UPDATE contest SET contest_id = :contest_id, game_id = :game_id, start_date = :start_date, winner_id = :winner_id WHERE contest_id = :contest_id";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":contest_id", $contest_id, PDO::PARAM_INT);
            $stmt->bindValue(":game_id", $game_id, PDO::PARAM_INT);
            $stmt->bindValue(":start_date", $start_date, PDO::PARAM_INT);
            $stmt->bindValue(":winner_id", $winner_id, PDO::PARAM_INT);
            
            $resultat = $stmt->execute();
            $stmt->closeCursor();
        
            if($resultat > 0){
                $this->getContestById($contest_id)->setContestId($contest_id);
                $this->getContestById($contest_id)->setGameId($game_id);
                $this->getContestById($contest_id)->setStartDate($start_date);
                $this->getContestById($contest_id)->setWinnerId($winner_id);
            }
        
            }
        

}

