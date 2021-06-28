<?php

return function ($kirby, $pages, $page) {
  $alert = null;

  if ($kirby->request()->is('POST')) {
    // check the honeypot
    if (empty(get('website')) === false) {
      go($page->url());
      exit();
    }

    $data = [
      'name' => get('name'),
      'email' => get('email'),
      'body' => get('body'),
      'subject' => get('subject'),
    ];

    $rules = [
      'name' => ['required', 'minLength' => 3],
      'email' => ['required', 'email'],
      'body' => ['required', 'minLength' => 3, 'maxLength' => 5000],
      'subject' => ['required', 'same' => 'Augsburg'],
    ];

    $messages = [
      'name' => 'Bitte geben Sie ihren Namen ein',
      'email' => 'Bitte geben Sie eine gülte E-Mail-Adresse ein',
      'body' =>
        'Ihre Nachricht sollte aus mindestens 3 und maximal 5000 Zeichen bestehen.',
      'subject' => 'Sind Sie sich sicher?',
    ];

    $to = $kirby->option('isDevelopment')
      ? 'florian.pichler+formular@das-habitat.de'
      : 'kontakt+formular@das-habitat.de';

    // some of the data is invalid
    if ($invalid = invalid($data, $rules, $messages)) {
      $alert = $invalid;
    } else {
      try {
        $kirby->email([
          'template' => 'contact',
          'from' => $data['email'],
          'fromName' => esc($data['name']),
          'to' => $to,
          'subject' => '[Das Habitat] Anfrage via Kontaktformular',
          'data' => [
            'body' => esc($data['body']),
          ],
        ]);
      } catch (Exception $error) {
        if (option('debug')):
          $alert['error'] =
            'The form could not be sent: <strong>' .
            $error->getMessage() .
            '</strong>';
        else:
          $alert['error'] = 'Das Formular konnte nicht abgeschickt werden.';
        endif;
      }

      // no exception occurred, let's send a success message
      if (empty($alert) === true) {
        $success = true;
        $data = [];
      }
    }
  }

  return [
    'alert' => $alert,
    'data' => $data ?? false,
    'success' => $success ?? false,
  ];
};
