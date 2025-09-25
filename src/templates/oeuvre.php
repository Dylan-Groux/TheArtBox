<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once dirname(__DIR__, 2) . '/config.php';

use App\Services\OeuvreManager;
use App\Services\ValidatorManager;

$oeuvresManager = new OeuvreManager();
$validator = new ValidatorManager();

// Constante pour la redirection vers la page d'accueil
define('INDEX_PATH_REDIRECTION', 'Location:' . BASE_URL . '/index.php?route=home');

$id = $_GET['id'] ?? null; // Récupération de l'id dans l'URL (ex: oeuvre.php?id=3)
if (
    $validator->isNull($id) ||
    !$validator->validateId($id)
    ) {
    header(INDEX_PATH_REDIRECTION);
    exit;
}

$oeuvre = $oeuvresManager->getOeuvreById($id);
if (
    $validator->isNull($oeuvre) ||
    $oeuvre->getId() != $id
    ) {
    header(INDEX_PATH_REDIRECTION);
    exit;
}

$src = $validator->handlerUrlOrImagePath($oeuvre->getImage());

?>
<?php require_once 'header.php'; ?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= htmlspecialchars($src) ?>" alt="<?= htmlspecialchars($oeuvre->getTitre()) ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= htmlspecialchars($oeuvre->getTitre()) ?></h1>
        <p class="description"><?= htmlspecialchars($oeuvre->getArtiste()) ?></p>
        <p class="description-complete">
             <?= htmlspecialchars($oeuvre->getDescription()) ?>
        </p>
    </div>
</article>

<?php require_once 'footer.php'; ?>
