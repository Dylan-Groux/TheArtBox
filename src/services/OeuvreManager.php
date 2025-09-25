<?php

namespace App\Services;

use App\Model\OeuvreData;
use App\Services\Database;
use PDO;

/**
 * Gère les opérations CRUD pour les œuvres d'art dans la base de données.
 */
class OeuvreManager {
    private Database $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getOeuvreById(int $id): ?OeuvreData {
        $stmt = $this->db->getConnection()->prepare('SELECT * FROM oeuvre WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return OeuvreData::fromArray($result) ?: null;
    }

    public function getAllOeuvres(): array {
        $stmt = $this->db->getConnection()->query('SELECT * FROM oeuvre');
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $oeuvres = [];
        foreach ($result as $row) {
            $oeuvres[] = OeuvreData::fromArray($row);
        }
        return $oeuvres;
    }

    public function saveOeuvre(OeuvreData $oeuvreData): bool {

        $titre = $oeuvreData->getTitre();
        $artiste = $oeuvreData->getArtiste();
        $description = $oeuvreData->getDescription();
        $image = $oeuvreData->getImage();

        $stmt = $this->db->getConnection()->prepare("INSERT INTO oeuvre (titre, artiste, description, image_path) VALUES (:titre, :artiste, :description, :image_path)");
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':artiste', $artiste);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image_path', $image);
        return $stmt->execute();
    }
}
