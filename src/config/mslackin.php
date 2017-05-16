<?php

return [
    'slack' => [
        'token' => env('SLACK_TOKEN'),
        'ssl_verify' => false,
        'channels' => env('SLACK_CHANNEL', 'all'),
        'resend' => env('SLACK_RESEND_INVITATION', 'true'),
    ],
];