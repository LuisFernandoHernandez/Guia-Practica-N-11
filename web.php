<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\EventoTransaccionController;

Route::get('/', function () {
    return view('welcome');
});

// ===== Guía N.º 1 =====

Route::get('/taskboard', function () {
    return 'Bienvenido a TaskBoard, tu pasarela de pagos.';
});

Route::get('/acerca-de', function () {
    return 'TaskBoard es una pasarela de pagos que permite a comercios afiliados recibir pagos de sus clientes y dar seguimiento a cada transacción hasta su liquidación.';
});

Route::get('/contacto', function () {
    return 'Luis Hernandez - correo: luis.hernandez63901@uped.edu.sv';
});

Route::get('/estados', function () {
    return ['Iniciada', 'Procesando', 'Aprobada', 'Rechazada', 'Liquidada'];
});

Route::get('/transaccion/demo', function () {
    return [
        'id'       => 1,
        'comercio' => 'Café Amanecer',
        'monto'    => 25.50,
        'moneda'   => 'USD',
        'estado'   => 'Aprobada',
    ];
});

// ===== Guía N.º 2 =====

// Sección 3 — Ruta con parámetro opcional
Route::get('/comercios-categoria/{categoria?}', function ($categoria = 'todos') {
    return "Mostrando comercios de la categoría: $categoria";
});

// Secciones 5, 6, 10, 11, 12, 13 y Ejercicio 4 —
// Grupo de rutas de comercios conectado al controlador
Route::prefix('comercios')->name('comercios.')->group(function () {
    Route::get('/', [ComercioController::class, 'index'])->name('index');

    Route::get('/{comercio}', [ComercioController::class, 'show'])
        ->name('show');
});

// Ejercicio práctico 1 — TransaccionController
Route::get('/transacciones', [TransaccionController::class, 'index']);
Route::get('/transaccion/{transaccion}', [TransaccionController::class, 'show']);

// Ejercicio 3 — EventoTransaccionController
Route::get('/eventos-transaccion', [EventoTransaccionController::class, 'index']);

Route::get('/practica/formulario-demo', function () {
    return view('practica.formulario_demo');
});

Route::post('/practica/enviar', function () {
    return 'Formulario recibido correctamente.';
});

Route::get('/comercios/{comercio}/transacciones/nueva',
    [TransaccionController::class, 'create']
)->name('transacciones.create');

Route::post('/transacciones',
    [TransaccionController::class, 'store']
)->name('transacciones.store');

Route::get('/transacciones/{transaccion}/editar',
    [TransaccionController::class, 'edit']
)->name('transacciones.edit');

Route::put('/transacciones/{transaccion}',
    [TransaccionController::class, 'update']
)->name('transacciones.update');

Route::delete('/transacciones/{transaccion}',
    [TransaccionController::class, 'destroy']
)->name('transacciones.destroy');

Route::patch('/transacciones/{transaccion}/mover/{estado}',
    [TransaccionController::class, 'moverEstado']
)->name('transacciones.mover');
