<?php

class game {
    // 1. Création des attributs/propriétés
    private $_game_id;
    private $_title;
    private $_min_players;
    private $_max_players;

    public function __construct($game_id,$title,$min_players,$max_players)
    {
        $this->_game_id = $game_id;
        $this->_title = $title;
        $this->_min_players = $min_players;
        $this->_max_players = $max_players;

    }



    // 2. Création des getters

    public function getGameId() {
        return $this->_game_id;
    }
    public function getTitle() {
        return $this->_title;
    }
    public function getMin_players() {
        return $this->_min_players;
    }
    public function getMax_players() {
        return $this->_max_players;
    }


    // 3. Creátion des setters

    public function setGameId($id) {
        $this->_game_id = $id;
    }

    public function setTitle($title) {
        $this->_title = $title;
    }

    public function setMin_players($min_players) {
        $this->_min_players = $min_players;
    }

    public function setMax_players($max_players) {
        $this->_max_players = $max_players;
    }

}