<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

return function ($page, $site, $kirby) {

    // Wird nur ausgeführt, wenn das Formular abgeschickt wurde
    if ($kirby->request()->is('POST')) {
        $data = [
          'email' => $kirby->request()->get('email'),
          'firstname' => $kirby->request()->get('firstname'),
          'lastname'  => $kirby->request()->get('lastname')
        ];

        // --- Validierung der E-Mail-Adresse (optional, aber empfohlen) ---
        $errors = [];
        if (empty($data['email']) || !v::email($data['email'])) {
            $errors['email'] = 'Please enter a valid email address.';
        }
        if (empty($data['firstname'])) {
            $errors['firstname'] = 'Please enter your first name.';
        }
        if (empty($data['lastname'])) {
            $errors['lastname'] = 'Please enter your last name.';
        }

        // --- Anfrage an die Infomaniak-API ---
        if (empty($errors)) {
            $client = new Client();
            $token = env('NEWSLETTER_TOKEN'); // get token from .env
            $domain = env('DOMAIN_ID'); // not sure if neccessary and/or correct

            try {
                $response = $client->post("https://api.infomaniak.com/1/newsletters/{$domain}/subscribers", [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $token,
                        'Content-Type' => 'application/json',
                    ],
                    'json' => [
                        'email' => $data['email'],
                        'fields' => [
                          'firstname' => $data['firstname'],
                          'lastname' => $data['lastname']
                        ]
                    ]
                ]);

                // Bei Erfolg: Erfolgsmeldung speichern und Formular leeren
                $success = 'Thank you for signing up!<br>👉 <a href="/">Back to home page</a>.';
                $data = []; // Formular zurücksetzen

            } catch (ClientException $e) {
                // Fehlerbehandlung: z.B. wenn die E-Mail bereits existiert
                $statusCode = $e->getResponse()->getStatusCode();
                $responseBody = json_decode($e->getResponse()->getBody(), true);
                $errors['api'] = $responseBody['error'] ?? 'Error response from newsletter service api, please contact administrator.';
 
                // Spezifische Fehlermeldungen für häufige Statuscodes
                switch ($statusCode) {
                    case 400:
                        $errors['api'] = $responseBody['error'] ?? 'The request seems to be faulty. Please try again or contact the administrator.';
                        break;
                    case 401:
                        $errors['api'] = 'Authification error. Plase contact administrator.';
                        break;
                    case 409:
                        $errors['api'] = 'Error 409, E-Mail address already registered.';
                        break;
                    default:
                        $errors['api'] = $responseBody['error'] ?? 'Error response from newsletter service api, please contact administrator.';
                }
            }
        }

        // Daten an das Template übergeben
        return [
            'formData' => $data,
            'errors' => $errors,
            'success' => $success ?? null,
        ];
    }

    // Bei GET-Anfrage einfach ein leeres Formular anzeigen
    return [
        'formData' => [],
        'errors' => [],
        'success' => null,
    ];
};
