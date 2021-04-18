<figure data-splide>
  <div>
    <ul>
      <?php foreach ($block->images()->toFiles() as $image): ?>
      <li>
        <img data-loading data-splide-lazy="<?= $image
          ->resize(1200)
          ->url() ?>" alt="<?= $image->alt() ?>" >
        <noscript>
          <img src="<?= $image
            ->resize(1200)
            ->url() ?>" alt="<?= $image->alt() ?>" load="lazy" >
        </noscript>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</figure>