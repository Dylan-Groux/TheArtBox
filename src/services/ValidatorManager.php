<?php

namespace App\Services;

use App\Model\OeuvreData;

// Gère la validation des données des œuvres d'art avant leur insertion dans la base de données.
class ValidatorManager {
    public function validateOeuvreData(OeuvreData $data): array {
        $errors = [];

        if (empty($data->getTitre())) {
            $errors[] = "Le titre de l'œuvre est requis.";
        }

        if (empty($data->getArtiste())) {
            $errors[] = "Le nom de l'artiste est requis.";
        }

        if (empty($data->getImage())) {
            $errors[] = "L'URL de l'image est requise.";
        } elseif (!filter_var($data->getImage(), FILTER_VALIDATE_URL)) {
            $errors[] = "L'URL de l'image n'est pas valide.";
        }

        if (empty($data->getDescription())) {
            $errors[] = "La description de l'œuvre est requise.";
        }

        if (strlen($data->getDescription()) <= 3) {
            $errors[] = "La description doit contenir au moins 3 caractères.";
        }

        return $errors;
    }

    /**
    * Valide que si l'ID est un entier positif non nul et qu'il ne dépasse pas la valeur maximale d'un entier.
    */
    public function validateId($id): bool {
        return is_numeric($id) && $id > 0 && $id <= PHP_INT_MAX;
    }

    /**
    * Vérifie si une valeur est nulle.
    * @return boolean True si la valeur est nulle, sinon false.
    */
    public function isNull($value): bool {
        return is_null($value);
    }

    /**
     * Gère les URLs complètes et les chemins relatifs des images.
     * @return string L'URL complète de l'image || le chemin relatif de l'image.
     */
    public function handlerUrlOrImagePath($imagePath): string {
        if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
            return $imagePath;
        } else {
            return BASE_URL . '/' . $imagePath;
        }
    }
}
