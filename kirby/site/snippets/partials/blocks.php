<?php foreach ($blocks->toBlocks() as $block): ?>
  <div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?> <?= $block->classNames() ?>">
    <?= $block ?>
  </div>
<?php endforeach ?>
