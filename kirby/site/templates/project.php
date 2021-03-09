<?php snippet('header'); ?>

<main class="t:project-main">
  <h1><?= $page->title() ?></h1>

  <?php snippet('partials/blocks', ['blocks' => $page->text()]); ?>
</main>

<aside class="t:project-side">
  <nav>
    <h2>Weitere Projekte</h2>

    <ul>
      <?php foreach ($page->siblings() as $child): ?>
        <li>
          <?php if ($child->isActive()): ?>
            <strong><?= $child->title() ?></strong>
          <?php else: ?>
            <a href="<?= $child->url() ?>"><?= $child->title() ?></a>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>
</aside>

<?php snippet('footer'); ?>
