<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once dirname(__DIR__, 2) . '/config.php';

use App\Services\OeuvreManager;

$oeuvresManager = new OeuvreManager();
    
$id = $_GET['id'] ?? null; // Récupération de l'id dans l'URL (ex: oeuvre.php?id=3)

// Constante pour la redirection vers la page d'accueil
define('INDEX_PATH_REDIRECTION', 'Location:' . BASE_URL . '/index.php');

if(empty($id)) {
    header(INDEX_PATH_REDIRECTION);
} elseif (!is_numeric($id) || $id <= 0 || $id > PHP_INT_MAX) {
    header(INDEX_PATH_REDIRECTION);
    exit;
}

$oeuvre = $oeuvresManager->getOeuvreById($id);

if(is_null($oeuvre)) {
    header(INDEX_PATH_REDIRECTION);
} elseif ($oeuvre['id'] != $id) {
    header(INDEX_PATH_REDIRECTION);
    exit;
}

$imagePath = $oeuvre["image_path"];
if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
    $src = $imagePath;
} else {
    $src = BASE_URL . '/' . $imagePath;
}

?>
<?php require_once 'header.php'; ?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= htmlspecialchars($src) ?>" alt="<?= htmlspecialchars($oeuvre['titre']) ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= htmlspecialchars($oeuvre['titre']) ?></h1>
        <p class="description"><?= htmlspecialchars($oeuvre['artiste']) ?></p>
        <p class="description-complete">
             <?= htmlspecialchars($oeuvre['description']) ?>
        </p>
    </div>
</article>

<?php require_once 'footer.php'; ?>
