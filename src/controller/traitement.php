<?php

namespace App\Controller;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';
require_once dirname(__DIR__, 2) . '/config.php';

use App\Services\OeuvreManager;
use App\Services\ValidatorManager;
use App\Services\Database;
use PDOException;

$db = Database::getInstance()->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    $oeuvreManager = new OeuvreManager();
    $validatorManager = new ValidatorManager();

    // Récupération des données du formulaire
    $titre = $_POST['titre'] ?? '';
    $artiste = $_POST['artiste'] ?? '';
    $image = $_POST['image'] ?? '';
    $description = $_POST['description'] ?? '';

    // Validation des données
    $errors = $validatorManager->validateOeuvreData($titre, $artiste, $image, $description);

    // Tentative d'insertion dans la base de données si pas d'erreurs
    if (empty($errors)) {
        try {
                $oeuvreManager->saveOeuvre($titre, $artiste, $description, $image);
                $newOeuvreId = $db->lastInsertId();
                header('Location:' . BASE_URL . '/src/templates/oeuvre.php?id=' . $newOeuvreId);
                exit;
            } catch (PDOException $e) {
                echo "Erreur lors de l'ajout de l'œuvre : " . $e->getMessage();
            }
        } else {
            echo "Méthode de requête non autorisée.";
        }
    } else {
        // Affichage des erreurs de validation
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo "<p><a href='ajouter.php'>Retour au formulaire</a></p>";
    }
