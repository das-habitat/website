<?php
if ($imageId = A::first($page->StageImage()->yaml())):
  $image = $page->files()->findById($imageId); ?>

<figure class="stage">
  <img src="<?= $image->url() ?>" alt="{{ .alt }}" width="{{ .width }}" height="{{ .height }}">
</figure>

<?php
endif; ?>
