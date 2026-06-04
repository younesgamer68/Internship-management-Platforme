<?php
/**
 * Standalone migration runner — run this directly with:
 *   php run_migrations.php
 * from the project root.
 */

define('LARAVEL_START', microtime(true));

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$exitCode = $kernel->call('migrate', ['--force' => true]);

echo PHP_EOL;
if ($exitCode === 0) {
    echo "✅ Migrations ran successfully!\n";
} else {
    echo "❌ Migrations failed with code: $exitCode\n";
}
