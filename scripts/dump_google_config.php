<?php
require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$cfg = config('services.google');
echo 'CLIENT_ID=' . ($cfg['client_id'] ?? '[missing]') . PHP_EOL;
echo 'CLIENT_SECRET=' . (filled($cfg['client_secret']) ? '[set]' : '[missing]') . PHP_EOL;
echo 'REDIRECT=' . ($cfg['redirect'] ?? '[missing]') . PHP_EOL;
