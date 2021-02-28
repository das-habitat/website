<?php snippet('header') ?>

<div class="page">
  <main>
    <h1><?= $page->title() ?></h1>
  
    <?= $page->text()->kirbytext() ?>

    <ul class="t:sponsors_list">
      <?php foreach($page->files() as $file): ?>
      <?php if($file->visible()->toBool(false)): ?>
        <li>
          <h3>
            <a href="<?= $file->link() ?>">
              <img src="<?= $file->url() ?>" alt="<?= $file->title() ?>" height="320" />
            </a>
          </h3>
          <?= $file->description()->kirbytext() ?>
        </li>
      <?php endif ?>
      <?php endforeach ?>
    </ul>
  </main>
</div>

<?php snippet('footer') ?>