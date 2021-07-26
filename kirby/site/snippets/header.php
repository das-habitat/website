<!doctype html>
<html lang="de" class="p-<?= $page->slug() ?>">

<head>
  <meta charset="utf-8">
  <title><?= $page->title() ?> | <?= $site->title() ?></title>

  <?= css(['assets/index.css?1.0.0', '@auto']) ?>

  <link rel="canonical" href="<?= $page->url() ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="<?= $page->description() ?>">
  <meta name="apple-mobile-web-app-title" content="<?= $site->title() ?>">
  <meta property="og:site_name" content="<?= $site->title() ?>">
  <meta name="twitter:title" property="og:title" content="<?= $page->title() ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= $page->url() ?>">
  <?php if ($page->image()): ?>
  <meta name="twitter:image" property="og:image" content="<?= $page
    ->image()
    ->url() ?>">
  <?php endif; ?>
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:description" content="<?= $page->description() ?>">
  <meta name="twitter:domain" content="<?= $site->domain() ?>">
  <?php if (!$kirby->option('isDevelopment')): ?>
  <script id="plausible" defer data-domain="das-habitat.de" src="https://havelock.das-habitat.de/js/script.js"></script>
  <?php endif; ?>
</head>

<body>
  <div class="site grid">
    <header id="top" class="container lg:grid-inner top <?= $page->isHomePage()
      ? 'top-home'
      : '' ?>">
      <h1 class="top_logo">
        <a href="/">
          <?php snippet('partials/logo'); ?>
        </a>
      </h1>

      <nav id="nav" class="top_nav">
        <div class="top_nav_inner">
          <?php snippet('partials/nav'); ?>
        </div>
      </nav>
    </header>