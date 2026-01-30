<?php


require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Clientes;

try {
    $cliente = Clientes::create([
        'nombre' => 'Prueba',
        'apellido' => 'Automático',
        'email' => 'prueba_automatica_' . time() . '@example.com',
        'telefono' => '123456789',
        'direccion' => 'Calle Falsa 123'
    ]);

    echo "CREATED_ID:" . $cliente->id . PHP_EOL;
} catch (\Exception $e) {
    echo "ERROR:" . $e->getMessage() . PHP_EOL;
}
