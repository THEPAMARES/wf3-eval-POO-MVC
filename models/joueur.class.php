<?php

class player {
    // 1. Création des attributs/propriétés
    private $_player_id;
    private $_email;
    private $_nickname;

    public function __construct($player_id,$email,$nickname)
    {
        $this->_player_id = $player_id;
        $this->_email = $email;
        $this->_nickname = $nickname;

    }

    // 2. Création des getters

    public function getPlayerId() {
        return $this->_player_id;
    }
    public function getEmail() {
        return $this->_email;
    }
    public function getNickname() {
        return $this->_nickname;
    }

    // 3. Creátion des setters

    public function setPlayerId($id) {
        $this->_player_id = $id;
    }

    public function setEmail($email) {
        $this->_email = $email;
    }

    public function setNickname($nickname) {
        $this->_nickname = $nickname;
    }

}