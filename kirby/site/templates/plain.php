<?php snippet('header'); ?>

<main>
  <h1><?= $page->title() ?></h1>

  <?= $page->text()->kirbytext() ?>
</main>

<?php snippet('footer');
?>
