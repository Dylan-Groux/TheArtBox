<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\HandleSubmissionsManager;

$route = $_GET['route'] ?? 'home';

switch ($route) {
    case 'ajouter':
        require __DIR__ . '../src/templates/ajouter.php';
        break;
    case 'traitement':
        $manager = new \App\Controller\TraitementController(new HandleSubmissionsManager());
        $manager->handleFormSubmission();
        break;
    case 'oeuvre':
        $id = $_GET['id'] ?? null;
        require __DIR__ . '../src/templates/oeuvre.php';
        break;
    case 'home':
        require __DIR__ . '../src/templates/home.php';
        break;
    default:
        break;
}
