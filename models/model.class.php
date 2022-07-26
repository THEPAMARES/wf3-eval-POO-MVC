<?php

abstract class Model {
    private static $pdo; // 1. Créer une instance $pdo

    public static function setBdd() {
        // 2. Initialise la connexion à la base de données
        // 3. BIEN AJUSTER LE NOM DE LA BDD !!!
        self::$pdo = New PDO('mysql:host=localhost;dbname=wf3_php_final_pamela;charset=utf8mb4','root','');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    }

    public function getBdd() {// 4. Recupère la connexion à la base de données
        if(self::$pdo === null)
        {
            self::setBdd();
        }

        return self::$pdo;
    }
}