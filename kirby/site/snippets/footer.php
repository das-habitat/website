</div>

<?= js('assets/main.js') ?>
<?php if (!$kirby->option('isDevelopment')) : ?>
  <script src="https://rabbit.das-habitat.de/script.js" included-domains="das-habitat.de" site="LGSVGZYI" defer></script>
<?php endif ?>
</body>

</html>