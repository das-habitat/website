<?php snippet('header') ?>
<?php snippet('contact-info') ?>
<?php snippet('stage') ?>

<h1><?= $page->title() ?></h1>

<main class="main main--grid">
  <?= $page->text()->kirbytext(); ?>

  <nav class="submenu submenu--workshop">
    <h2>Unsere Ausstattung</h2>

    <ul>
<?php foreach($page->children()->filterBy('template', 'spec') as $spec): ?>
      <li>
        <a href="<?= $spec->url() ?>"><?= $spec->title()->html() ?></a>
      </li>
<?php endforeach; ?>
    </ul>
  </nav>
</main>

<?php snippet('footer') ?>