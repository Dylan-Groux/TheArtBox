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
}