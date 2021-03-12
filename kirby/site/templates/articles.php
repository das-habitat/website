<?php snippet('header'); ?>

<main class="t:articles-main">
  <h1><?= $page->title() ?></h1>

  <?= $page->text()->kirbytext() ?>

  <ul class="t:articles-list">
    <?php foreach ($page->children() as $child): ?>
      <li>
        <a href="<?= $child->url() ?>">
          <?php if ($child->hasFiles()): ?>
            <img src="" />
          <?php endif; ?>
          <h2><?= $child->title() ?></h2>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</main>

<?php snippet('footer');
?>
