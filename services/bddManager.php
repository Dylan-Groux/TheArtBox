<?php
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $host = 'localhost';
        $dbname = 'artbox';
        $username = 'root';
        $password = '';

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



