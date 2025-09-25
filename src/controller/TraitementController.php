<?php

namespace App\Controller;

use App\Services\Database;
use PDOException;
use App\Services\HandleSubmissionsManager;

require_once dirname(__DIR__, 2) . '/config.php';

class TraitementController {

    private Database $db;
    private HandleSubmissionsManager $handleSubmissionsManager;

    public function __construct(HandleSubmissionsManager $handleSubmissionsManager) {
        $this->db = Database::getInstance();
        $this->handleSubmissionsManager = $handleSubmissionsManager;
    }

    public function handleFormSubmission(): void {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $errors = $this->handleSubmissionsManager->handleSubmission($_POST);
            
            if (!empty($errors)) {
                // Afficher les erreurs et arrêter le traitement
                echo "Des erreurs ont été trouvées lors de la validation des données :";
                foreach ($errors as $error) {
                    echo "<br>- " . htmlspecialchars($error);
                }
            }
            // Redirection vers la page de l'œuvre nouvellement ajoutée
            header('Location:' . BASE_URL . '/index.php?route=oeuvre&id=' . $this->db->getConnection()->lastInsertId());

        } else {
            echo "Méthode de requête non autorisée.";
        }
    }
}


