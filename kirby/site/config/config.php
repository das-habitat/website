<?php

$isCliServer = php_sapi_name() == 'cli-server';

return [
  'isDevelopment' => $isCliServer,
  'markdown' => [
    'breaks' => false,
  ],
  'debug' => $isCliServer,
  'cache' => $isCliServer
    ? false
    : [
      'pages' => [
        'active' => true,
      ],
    ],
];
