<?php
    require 'header.php';
    require_once 'services/bddManager.php';
    require_once 'services/imageManager.php';
    require_once 'services/oeuvreManager.php';
    
    $id = $_GET['id'] ?? null; // Récupération de l'id dans l'URL (ex: oeuvre.php?id=3)

    define('INDEX_PATH_REDIRECTION', 'Location: index.php');

    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    if(empty($id)) {
        header(INDEX_PATH_REDIRECTION);
    } elseif (!is_numeric($id) || $id <= 0) {
        header(INDEX_PATH_REDIRECTION);
        exit;
    }

    $imageManager = new ImageManager();
    $oeuvres = OeuvreManager::getOeuvreById($id);

    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil
    if(is_null($oeuvres)) {
        header(INDEX_PATH_REDIRECTION);
    } elseif ($oeuvres['id'] != $id) {
        header(INDEX_PATH_REDIRECTION);
        exit;
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $imageManager->getImagePath($oeuvres['image_id']) ?>" alt="<?= htmlspecialchars($oeuvres['titre']) ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= htmlspecialchars($oeuvres['titre']) ?></h1>
        <p class="description"><?= htmlspecialchars($oeuvres['artiste']) ?></p>
        <p class="description-complete">
             <?= htmlspecialchars($oeuvres['description']) ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
