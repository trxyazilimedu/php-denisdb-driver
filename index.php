<?php
require_once __DIR__ . '/vendor/autoload.php';

use Trxyazilim\Denisdb\DDConnect; // Doğru namespace'i kullanın



try {
    // DenisDB sunucusuna bağlan
    $db = new DDConnect('127.0.0.1', 5142);
    $db->sendCommand('SET key1 value1');

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
