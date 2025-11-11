<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/productos', function () {
    return view('productos');
});

// Rutas individuales de productos
Route::get('/productos/banca-urban', function () {
    return view('productos.banca-urban');
});

Route::get('/productos/jardinera-eco', function () {
    return view('productos.jardinera-eco');
});

Route::get('/productos/banca-lounge', function () {
    return view('productos.banca-lounge');
});

Route::get('/productos/mesa-eco-hub', function () {
    return view('productos.mesa-eco-hub');
});

Route::get('/proyectos', function () {
    return view('proyectos');
});

Route::get('/aliados', function () {
    return view('aliados');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::post('/contacto', function () {
    // Aquí puedes agregar la lógica para procesar el formulario
    return redirect('/contacto')->with('success', 'Mensaje enviado correctamente');
});
