<?php

function plausibleRequest(string $url, string $campaign = "default") {
  file_get_contents(
    'https://plausible.io/api/event',
    false,
    stream_context_create([
      'http' => [
        'method' => 'POST',
        'header' => join('\n', [
          'content-type: application/json',
          'user-agent: ' . $_SERVER['HTTP_USER_AGENT'],
          'x-forwarded-for: ' .
          kirby()
            ->visitor()
            ->ip(),
        ]),
        'content' => json_encode([
          'name' => 'QR',
          'url' => $url,
          'domain' => 'das-habitat.de',
          'props' => json_encode([
            'campaign' => $campaign,
          ]),
        ]),
      ],
    ])
  );
};

$action = function (string $path = null) {
  $campaigns = site()
    ->qr_campaigns()->toStructure();

  $campaign = $campaigns->findBy('slug', $path);

  if ($campaign) {
    $isExternalUrl = $campaign->externalUrl()->toBool();
    $target = $isExternalUrl ? 
      $campaign->targetUrl() :
      $campaign->targetPage()->toPage()->url();
    $url = $isExternalUrl ? 'https://das-habitat.de/qr/external' : $target;

    plausibleRequest($url, $path);
  } else {
    $target = '/';
  }
  
  return Response::redirect($target, 302);
};

Kirby::plugin('your/plugin', [
  'routes' => [
    [
      'pattern' => 'qr',
      'action' => $action,
    ],
    [
      'pattern' => 'qr/',
      'action' => $action,
    ],
    [
      'pattern' => 'qr/(:alphanum)',
      'action' => $action,
    ],
  ],
]);
