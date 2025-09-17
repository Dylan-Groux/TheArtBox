<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'services/bddManager.php';
    require_once 'services/imageManager.php';
    require_once 'services/oeuvreManager.php';
    require_once 'services/ValidatorManager.php';

    $oeuvreManager = new OeuvreManager();
    $imageManager = new ImageManager();
    $validatorManager = new ValidatorManager();

    // Récupération des données du formulaire
    $titre = $_POST['titre'] ?? '';
    $artiste = $_POST['artiste'] ?? '';
    $image = $_POST['image'] ?? '';
    $description = $_POST['description'] ?? '';

    // Validation des données
    $errors = $validatorManager->validateOeuvreData($titre, $artiste, $image, $description);

    // Tentative d'insertion dans la base de données si pas d'erreurs
    try {
        $imageId = $imageManager->saveImage($image, "url", 0);
        if ($imageId) {
            $oeuvreManager->saveOeuvre($titre, $artiste, $description, $imageId);
            $newOeuvreId = Database::getLastInsertId();
            header('Location: oeuvre.php?id=' . $newOeuvreId);
            exit;
        } else {
            die('Erreur lors de l\'ajout de l\'image.');
            header('Location: ajouter.php');
            exit;
        }
        var_dump($stmtImage);
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'œuvre : " . $e->getMessage();
    }
} else {
    echo "Méthode de requête non autorisée.";
}
