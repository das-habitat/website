<?php snippet('header') ?>

<main class="main main--grid">
  <div class="cs1-lg c3-lg">
    <h2>Das Wichtigste auf einen Blick</h2>

    <?php snippet('contact-info') ?>
  </div>

  <div class="cs4-lg sm:mt-lg">
    <h2>E-Mail schreiben</h2>

    <?php snippet('contact-form') ?>
  </div>

  <div class="mt-lg">
  <?= $page->text()->kt() ?>
  </div>
</main>

<?php snippet('footer') ?>