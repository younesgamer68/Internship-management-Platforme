<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $session = App\Models\ChatbotSession::create([
        'user_id'  => 1, 
        'title'    => 'New conversation',
        'preview'  => 'New conversation',
        'messages' => [['role' => 'ai', 'content' => 'Test']],
    ]);
    echo "Success: " . $session->id;
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
