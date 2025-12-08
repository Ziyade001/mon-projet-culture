<?php

return [
    'secret' => env('FEDAPAY_SECRET'),
    'public' => env('FEDAPAY_PUBLIC'),
    'env' => env('FEDAPAY_ENV', 'sandbox'), // sandbox par défaut
];
