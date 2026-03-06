<?php
require __DIR__ . '/../vendor/autoload.php';
$m = new App\Models\DeliveryMan;
echo 'class: ' . get_class($m) . PHP_EOL;
echo 'method exists: ' . (method_exists($m, 'getAuthIdentifierName') ? 'yes' : 'no') . PHP_EOL;
echo 'parent class: ' . get_parent_class($m) . PHP_EOL;
