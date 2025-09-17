<?php
class OeuvreManager {
    public static function getOeuvreById($id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM oeuvre WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAllOeuvres() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query('SELECT * FROM oeuvre');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function saveOeuvre($titre, $artiste, $description, $imageId) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO oeuvre (titre, artiste, description, image_id) VALUES (:titre, :artiste, :description, :image_id)");
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':artiste', $artiste);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image_id', $imageId);
        return $stmt->execute();
    }
    
    public static function getLastInsertId() {
        $db = Database::getInstance()->getConnection();
        return $db->lastInsertId();
    }
}
