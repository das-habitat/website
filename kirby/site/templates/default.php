<?php snippet('header') ?>

<div class="page">
  <main>
    <h1><?= $page->title() ?></h1>
  
    <?= $page->text()->kirbytext() ?>
  </main>
</div>

<?php snippet('footer') ?>