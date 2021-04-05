<?php $menus = $site->menus()->toStructure(); ?>
<?php if ($menus->isNotEmpty()): ?>
  <?php foreach ($menus as $menu): ?>
    <?php $menuItems = $menu->menuItems()->toPages(); ?>
    <?php if ($menuItems->isNotEmpty()): ?>
      <h4><?= $menu->menuHeadline()->html() ?></h4>
      <div>
        <ul>
          <?php foreach ($menuItems as $menuItem): ?>
            <li><a href="<?= $menuItem->url() ?>"><?= $menuItem
->navtitle()
->or($menuItem->title()) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endif; ?>