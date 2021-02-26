<?php snippet('header') ?>

<main>
  <h1><?= $page->title() ?></h1>

  <?php snippet('partials/blocks', ['blocks' => $page->text()]); ?>
</main>

<aside>
  <ul>
    <?php foreach($page->siblings() as $child): ?>
      <li>
        <?php if($child->isActive()): ?>
          XXX
        <?php else: ?>
        <a href="<?= $child->url() ?>">
          <img src="" />
          <h2><?= $child->title() ?></h2>
        </a>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</aside>

<?php snippet('footer') ?>