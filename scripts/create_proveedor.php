<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Proveedores;

try {
    $proveedor = Proveedores::create([
        'nombre' => 'Prueba Proveedor',
        'contacto' => 'Juan Pérez',
        'email' => 'proveedor_prueba_' . time() . '@example.com',
        'telefono' => '987654321',
        'direccion' => 'Calle Proveedores 100',
        'ciudad' => 'Madrid',
        'pais' => 'España',
    ]);

    echo "CREATED_ID:" . $proveedor->id . PHP_EOL;
} catch (\Exception $e) {
    echo "ERROR:" . $e->getMessage() . PHP_EOL;
}
