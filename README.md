
# Denis Database PHP Driver

Denis Database İçin PHP İle bağlantı sağlayıp komut göndermek için bir sürücü




## Yükleme

benim-projem'i npm kullanarak yükleyin

```bash 
  composer require trxyazilim/denisdb
```

## Kullanım
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use Trxyazilim\Denisdb\DDConnect; // Doğru namespace'i kullanın



try {
    // DenisDB sunucusuna bağlan
    $db = new DDConnect('127.0.0.1', 5142);
    $db->sendCommand('SET key value');

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

```

## İlişkili Projeler


[DenisDB](https://github.com/hacimertgokhan/denisdb)

