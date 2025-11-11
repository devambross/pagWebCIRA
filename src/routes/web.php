<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

//Route::get('/servicios', function () {
    //return view('servicios');
//});

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
