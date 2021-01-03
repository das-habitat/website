<?php snippet('header') ?>

<main class="main grid">
  <div class="column-start1 column-span2">
    <h2>Das Wichtigste auf einen Blick</h2>

    <?php snippet('partials/address') ?>
  </div>

  <div class="column-start3 column-span2">
    <h2>E-Mail schreiben</h2>

    <?php snippet('forms/contact') ?>
  </div>

  <div class="column-start1 column-span3">
    <?= $page->text()->kt() ?>
  </div>
</main>

<?php snippet('footer') ?>