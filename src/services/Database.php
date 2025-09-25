<?php

namespace App\Services;

use PDO;
use PDOException;

/**
 * Gère la connexion à la base de données en utilisant le pattern Singleton.
 */
class Database {

    private static ?Database $instance = null;
    private \PDO $pdo;

    private function __construct() {
        $host = 'localhost';
        $dbname = 'artbox';
        $username = 'root';
        $password = '';

        // Connexion à la base de données avec gestion des erreurs
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (php_sapi_name() === 'cli') {
                echo "Connexion réussie à la base de données '$dbname' sur le serveur '$host'.\n";
            }
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données '$dbname' sur le serveur '$host' : " . $e->getMessage();
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}


