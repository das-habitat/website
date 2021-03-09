<?php snippet('header'); ?>

<div class="page">
  <main>
    <h1><?= $page->title() ?></h1>
  
    <?php snippet('partials/blocks', ['blocks' => $page->text()]); ?>
  </main>
</div>

<?php snippet('footer');
?>
