<?php snippet('header') ?>

<div class="page">
  <main>
    <h1><?= $page->title() ?></h1>
  
    <?= $page->text()->kirbytext() ?>

    <ul>
      <?php foreach($page->children() as $child): ?>
        <li>
          <a href="<?= $child->url() ?>">
            <img src="" />
            <h2><?= $child->title() ?></h2>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </main>
</div>

<?php snippet('footer') ?>