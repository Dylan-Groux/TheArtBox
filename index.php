<?php
    require 'header.php';
    require_once 'services/bddManager.php';
    require_once 'services/imageManager.php';
    require_once 'services/oeuvreManager.php';

    $imageManager = new ImageManager();

    $oeuvres = OeuvreManager::getAllOeuvres();
?>
<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $imageManager->getImagePath($oeuvre['image_id']) ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
