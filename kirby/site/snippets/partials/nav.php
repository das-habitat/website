<?php
$menus = $site->menus()->toStructure();
if ($menus->isNotEmpty()):
  foreach ($menus as $menu):
    $menuItems = $menu->menuItems()->toPages();

    if ($menuItems->isNotEmpty()): ?>
      <h4><?= $menu->menuHeadline()->html() ?></h4>
      <div>
        <ul>
          <?php foreach ($menuItems as $menuItem): ?>
            <li><a href="<?= $menuItem->url() ?>"><?= $menuItem
  ->navtitle()
  ->or($menuItem->title())
  ->html()
  ->inline() ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
<?php endif;
  endforeach;
endif;
?>
