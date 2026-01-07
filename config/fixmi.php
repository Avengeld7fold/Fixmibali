<?php

return [
    'locale' => [
        'cookie' => 'fixmi_locale',
        'default' => 'id',
    ],
    'currency' => [
        'base' => 'IDR',
        'target' => 'USD',
        'fallback_rate' => 0.000065,
        'rate_url' => 'https://api.exchangerate.host/latest?base=IDR&symbols=USD',
        'cache_key' => 'fixmi_currency_usd_rate',
        'cache_hours' => 24,
    ],
];
