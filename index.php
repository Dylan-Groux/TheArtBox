<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\OeuvreManager;

$oeuvreManager = new OeuvreManager();
$oeuvres = $oeuvreManager->getAllOeuvres();
?>
<?php require_once 'src/templates/header.php'; ?>
<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="src/templates/oeuvre.php?id=<?= htmlspecialchars($oeuvre['id']) ?>">
                <img src="<?= htmlspecialchars($oeuvre['image_path']) ?>" alt="<?= htmlspecialchars($oeuvre['titre']) ?>">
                <h2><?= htmlspecialchars($oeuvre['titre']) ?></h2>
                <p class="description"><?= htmlspecialchars($oeuvre['artiste']) ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require_once 'src/templates/footer.php'; ?>
