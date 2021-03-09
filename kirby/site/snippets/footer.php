</div>

<footer class="grid end">
  <a href="/" class="end_logo">
    <?php snippet('partials/logo'); ?>
  </a>

  <nav class="end_nav">
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
  </nav>

  <div class="end_copy">
    &copy; 2018-<?= date('Y') ?> Das Habitat Augsburg e.V.
  </div>
</footer>

<?= js('assets/main.js') ?>
<?php if (!$kirby->option('isDevelopment')): ?>
  <script src="https://rabbit.das-habitat.de/script.js" included-domains="das-habitat.de" site="LGSVGZYI" defer></script>
<?php endif; ?>
</body>

</html>