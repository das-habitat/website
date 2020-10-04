<!doctype html>
<html lang="de" class="p-<?= $page->slug() ?>">
<head>
	<meta charset="utf-8">
  <title><?= $site->title() ?> | <?= $page->title() ?></title>
	
  <?= css(['assets/index.css', '@auto']) ?>
	
  <link rel="canonical" href="{{ .RelPermalink | absURL }}"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="keywords" content="{{ delimit .Params.meta_keywords ", " }}">
	<meta name="description" content="{{ .Params.meta_description }}">
	<meta name="apple-mobile-web-app-title" content="{{ .Site.Title }}">
	<meta property="og:site_name" content="{{ .Site.Title }}">
	<meta name="twitter:title" property="og:title" content="{{ .Params.Title }}">
	<meta property="og:type" content="website">
	<meta property="og:url" content="{{ .RelPermalink | absURL }}">
	<meta name="twitter:image" property="og:image" content="{{ .Params.meta_image }}">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:description" content="{{ .Params.meta_description }}">
	<meta name="twitter:domain" content="{{ .Site.BaseURL }}">

  <?php if (!$kirby->option('isDevelopment')): ?>
	<script type="text/javascript" async>var _paq = window._paq || []; _paq.push(['disableCookies']); _paq.push(['trackPageView']); _paq.push(['enableLinkTracking']); (function() { var u="https://statistik.das-habitat.de/"; _paq.push(['setTrackerUrl', u+'matomo.php']); _paq.push(['setSiteId', '1']); var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s); })();</script>
  <?php endif ?>
</head>

<body>
  <div class="site">
    <header id="top" class="header <?= $page->isHomePage() ? "header--home" : "" ?>">
    <a href="/" class="header__logo"><img src="/assets/logo.svg" alt="Das Habitat" width="207" height="80"></a>

    <nav id="nav" class="header__nav">
      <ul role="menubar">
        <?php foreach($pages->listed() as $item): ?>
          <li>
            <a class="<?= $item->isOpen() ? 'active' : '' ?>" href="<?= $item->url() ?>"><?= $item->navTitle()->isNotEmpty() ? $item->navTitle()->html() : $item->title()->html() ?></a>
          </li>
        <?php endforeach ?>

        <!--
        {{- partial "menu-item-dropdown.html" (dict "context" . "menu" "workshops" "title" "Werkstätten") }}
        {{- partial "menu-items.html" (dict "context" . "from" 0 "to" 399) }}
        {{- partial "menu-item-dropdown.html" (dict "context" . "menu" "events" "title" "Kurse & Veranstaltungen") }}
        {{- partial "menu-items.html" (dict "context" . "from" 400 "to" 9999) }}
        -->
      </ul>
    </nav>
  </header>
  <div class="page">