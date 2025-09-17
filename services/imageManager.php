<?php
class ImageManager{
    public static function getImagePath($imageId) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT image_path, format FROM image WHERE id = ?");
        $stmt->execute([$imageId]);
        $image = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($image) {
            return $image['image_path'];
        } else {
            return 'img/default.png'; // Chemin par défaut si l'image n'est pas trouvée
        }
    }

    public static function saveImage($imagePath, $format, $size) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO image (image_path, format, size, created_at) VALUES (:image_path, :format, :size, NOW())");
        $stmt->bindParam(':image_path', $imagePath);
        $stmt->bindParam(':format', $format);
        $stmt->bindParam(':size', $size);
        $stmt->execute();
        return $db->lastInsertId(); // Retourne l'ID de l'image insérée
    }
}
