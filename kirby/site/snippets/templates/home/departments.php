<section>
  <h2>Unsere Werkstätten &amp; Bereiche</h2>

  <?php 
    $index = 0;
    foreach($kirby->collection('departments') as $department): 
      if ($imageId = A::first($department->Thumbnail()->yaml())):
        if ($image = $department->files()->findById($imageId)):
          $resized = $image->resize(808);
  ?>
    <div class="feature <?= e($index % 2, 'feature--reverse') ?> cs1-lg c5-lg">
      <h3 class="feature__title">
        <a href="<?= $department->url() ?>">
          <?= $department->title()->html() ?>
        </a>
      </h3>

      <div class="feature__content">
        <a href="<?= $department->url() ?>" class="feature__img" aria-hidden="true">
          <img src="<?= $resized->url() ?>" alt="" role="presentation" width="<?= $resized->width() / 2 ?>" height="<?= $resized->height() / 2 ?>">
        </a>

        <div>
          <?= $department->description()->html(); ?>
        </div>
      </div>
    </div>
  <?php if ($index === 0): ?>
    <div class="cs1-lg c4-lg larger">
      <?= $page->workshops()->html(); ?>
    </div>
  <?php endif; ?>

  <?php 
        endif;
      endif;
    $index++;
    endforeach; 
  ?>
</section>
