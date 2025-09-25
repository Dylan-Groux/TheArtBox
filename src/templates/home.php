<?php

use App\Services\OeuvreManager;

$oeuvreManager = new OeuvreManager();
$oeuvres = $oeuvreManager->getAllOeuvres();
?>
<?php require_once 'src/templates/header.php'; ?>
<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="<?= BASE_URL ?>/index.php?route=oeuvre&id=<?= htmlspecialchars($oeuvre->getId()) ?>">
                <img src="<?= htmlspecialchars($oeuvre->getImage()) ?>" alt="<?= htmlspecialchars($oeuvre->getTitre()) ?>">
                <h2><?= htmlspecialchars($oeuvre->getTitre()) ?></h2>
                <p class="description"><?= htmlspecialchars($oeuvre->getArtiste()) ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require_once 'src/templates/footer.php'; ?>
