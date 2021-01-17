<?php foreach ($blocks->toBlocks() as $block): ?>
  <div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?> <?= A::join($block->classNames()->split(), ' ') ?>">
    <?= $block ?>
  </div>
<?php endforeach ?>
