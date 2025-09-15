<?php
Class OeuvreManager {
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
}