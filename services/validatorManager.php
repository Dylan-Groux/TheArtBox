<?php 
// Gère la validation des données des œuvres d'art avant leur insertion dans la base de données.
class ValidatorManager {
    public static function validateOeuvreData($titre, $artiste, $image, $description) {
        $errors = [];

        if (empty($titre)) {
            $errors[] = "Le titre de l'œuvre est requis.";
        }

        if (empty($artiste)) {
            $errors[] = "Le nom de l'artiste est requis.";
        }

        if (empty($image)) {
            $errors[] = "L'URL de l'image est requise.";
        } elseif (!filter_var($image, FILTER_VALIDATE_URL)) {
            $errors[] = "L'URL de l'image n'est pas valide.";
        }

        if (empty($description)) {
            $errors[] = "La description de l'œuvre est requise.";
        }

        if (strlen($description) < 3) {
            $errors[] = "La description doit contenir au moins 3 caractères.";
        }

        if (!filter_var($image, FILTER_VALIDATE_URL)) {
            $errors[] = "L'URL de l'image n'est pas valide.";
        }

        return $errors;
    }
}