<?php

class contest {
    // 1. Création des attributs/propriétés
    private $_contest_id;
    private $_game_id;
    private $_start_date;
    private $_winner_id;

    public function __construct($contest_id,$game_id,$start_date,$winner_id)
    {
        $this->_contest_id = $contest_id;
        $this->_game_id = $game_id;
        $this->_start_date = $start_date;
        $this->_winner_id = $winner_id;

    }

    // 2. Création des getters

    public function getContestId() {
        return $this->_contest_id;
    }
    public function getGameId() {
        return $this->_game_id;
    }
    public function getStartDate() {
        return $this->_start_date;
    }
    public function getWinnerId() {
        return $this->_winner_id;
    }


    // 3. Creátion des setters

    public function setContestId($contest_id) {
        $this->_contest_id = $contest_id;
    }

    public function setGameId($game_id) {
        $this->_game_id = $game_id;
    }

    public function setStartDate($start_date) {
        $this->_start_date = $start_date;
    }

    public function setWinnerId($winner_id) {
        $this->_winner_id = $winner_id;
    }

}