</div>

<footer class="grid end">
  <a href="/" class="end_logo">
    <?php snippet('partials/logo'); ?>
  </a>

  <nav class="end_nav">
    <?php snippet('partials/nav'); ?>
  </nav>

  <p class="end_copy">
    &copy; 2018-<?= date(
      'Y'
    ) ?> Das Habitat Augsburg e.V. &mdash; <a href="/impressum">Impressum</a> &mdash; <a href="/datenschutz">Datenschutz</a>
              </p>
</footer>

<?= js('assets/main.js') ?>
<?php if (!$kirby->option('isDevelopment')): ?>
  <script src="https://rabbit.das-habitat.de/script.js" included-domains="das-habitat.de" site="LGSVGZYI" defer></script>
<?php endif; ?>
</body>

</html>