<?php

namespace App\Services;

use App\Services\Database;
use PDO;


// Gère les opérations liées aux œuvres d'art, telles que la récupération, l'ajout et la mise à jour des œuvres dans la base de données.
class OeuvreManager {

    public function getOeuvreById(int $id): array {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM oeuvre WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function getAllOeuvres(): array {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query('SELECT * FROM oeuvre');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveOeuvre(string $titre, string $artiste, string $description, string $image_path): bool {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO oeuvre (titre, artiste, description, image_path) VALUES (:titre, :artiste, :description, :image_path)");
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':artiste', $artiste);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image_path', $image_path);
        return $stmt->execute();
    }
}
