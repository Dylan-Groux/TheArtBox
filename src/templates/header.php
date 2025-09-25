<?php require_once dirname(__DIR__, 2) . '/config.php'; ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    <title>The ArtBox</title>
</head>
<body>
<header>
    <a href="<?= BASE_URL ?>/index.php"><img src="<?= BASE_URL ?>/assets/img/logo.png" alt="Logo Artbox" id="logo"></a>
    <nav>
        <ul>
            <li><a href="<?= BASE_URL ?>/index.php">Accueil</a></li>
            <li><a href="<?= BASE_URL ?>/src/templates/ajouter.php">Ajouter une œuvre</a></li>
        </ul>
    </nav>
</header>
<main>

