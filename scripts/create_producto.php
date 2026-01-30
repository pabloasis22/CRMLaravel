<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Productos;

try {
    $producto = Productos::create([
        'nombre' => 'Prueba Producto',
        'descripcion' => 'Descripción automática de prueba',
        'precio' => 99.99,
        'stock' => 50,
    ]);

    echo "CREATED_ID:" . $producto->id . PHP_EOL;
} catch (\Exception $e) {
    echo "ERROR:" . $e->getMessage() . PHP_EOL;
}
