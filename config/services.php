<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */
	'google' => [
		'client_id' => '649010060504-7ots9qdd46o452jtstd5h7l1mba5aatc.apps.googleusercontent.com',
		'client_secret' => 'D-fvZHeULXHBzSQUB1rH94tf',
		'redirect' => 'http://menusqrcostarica.com/auth/google/callback'
	],
	'facebook' => [
		'client_id' => '844337602765881',
		'client_secret' => '403678cf067b7d6a7d2baf98f2b6f83b',
		'redirect' => 'https://menuqr.test/auth/facebook/callback'
	],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
