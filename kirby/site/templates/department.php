<?php snippet('header') ?>
<?php snippet('contact-info') ?>
<?php snippet('stage') ?>

<h1><?= $page->title() ?></h1>

<main class="main main--grid">
  <?php snippet('partials/blocks', ['blocks' => $page->text()]); ?>
</main>

<?php snippet('footer') ?>