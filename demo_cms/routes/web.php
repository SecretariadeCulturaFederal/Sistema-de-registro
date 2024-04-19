<?php

use Illuminate\Support\Facades\Route;

// Rutas del Home
Route::get('/', 'homePlantillaController@index')->name('home');

// Rutas de Prueba
Route::prefix('prueba')->name('p_n.')->group(function () {
    Route::get('registro', 'plantillaRegistroController@create')->name('create');
    Route::post('registro', 'plantillaRegistroController@store')->name('store');
    Route::get('ver/{registroDatosPersonales}', 'plantillaRegistroController@show')->name('show');
    Route::get('editar/{registroDatosPersonales}', 'plantillaRegistroController@edit')->name('edit');
});

/* Aviso de registro exitoso */
Route::get('registrado/{folio}', 'plantillaRegistroController@registrado')->name('registrado');

// Preguntas frecuentes
Route::get('preguntas-frecuentes', 'plantillaRegistroController@preguntasFrecuentes')->name('preguntasFrecuentes');

// Contacto
Route::get('contacto', 'plantillaRegistroController@contacto')->name('contacto');

// Rutas del Administrador
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // CRUD de Contactos
    Route::get('crear-contacto', 'adminController@crearContacto')->name('crearContacto')->middleware('roles:1,2');
    Route::get('editar-contacto/{contacto}', 'adminController@editarContacto')->name('editarContacto')->middleware('roles:1,2,4');
    Route::get('lista-contactos', 'adminController@listaContactos')->name('listaContactos')->middleware('roles:1,2,4');
    Route::post('guardar-contacto', 'adminController@guardarContacto')->name('guardarContacto')->middleware('roles:1,2');
    Route::patch('deshabilitar-contacto/{contacto}', 'adminController@deshabilitarContacto')->name('deshabilitarContacto')->middleware('roles:1,2');
    Route::patch('habilitar-contacto/{contacto}', 'adminController@habilitarContacto')->name('habilitarContacto')->middleware('roles:1,2');
    Route::patch('actualizar-contacto/{contacto}', 'adminController@actualizarContacto')->name('actualizarContacto')->middleware('roles:1,2,4');

    // CRUD de Registros
    Route::get('lista-registros', 'adminController@listaRegistros')->name('listaRegistros')->middleware('roles:1,2,3');
    Route::get('lista-verificados', 'adminController@listaVerificados')->name('listaVerificados')->middleware('roles:1,2,3,6');
    Route::patch('verificar-registro/{registro}', 'adminController@verificarRegistro')->name('verificarRegistro')->middleware('roles:1,2,3');
    Route::patch('noAceptadoRegistro/{registro}', 'adminController@noAceptadoRegistro')->name('noAceptadoRegistro')->middleware('roles:1,2,3');
    Route::patch('reversarRegistro/{registro}', 'adminController@reversarRegistro')->name('reversarRegistro')->middleware('roles:1,2,3');

    // CRUD de Preguntas Frecuentes
    Route::get('crear-faq', 'adminController@crearfaq')->name('crearfaq')->middleware('roles:1,2');
    Route::get('editar-faq/{preguntasFrecuentes}', 'adminController@editarFaq')->name('editarFaq')->middleware('roles:1,2,4');
    Route::patch('deshabilitar-faq/{preguntasFrecuentes}', 'adminController@deshabilitarFaq')->name('deshabilitarFaq')->middleware('roles:1,2');
    Route::patch('habilitar-faq/{preguntasFrecuentes}', 'adminController@habilitarFaq')->name('habilitarFaq')->middleware('roles:1,2');
    Route::get('lista-faq', 'adminController@listafaq')->name('listafaq')->middleware('roles:1,2,4');
    Route::post('guardar-faq', 'adminController@guardarfaq')->name('guardarfaq')->middleware('roles:1,2');
    Route::patch('actualizar-faq/{preguntasFrecuentes}', 'adminController@actualizarFaq')->name('actualizarFaq')->middleware('roles:1,2,4');

    // CRUD de Actividades
    Route::get('lista-actividades', 'adminController@listarActividades')->name('listarActividades')->middleware('roles:1');
    Route::get('crear-actividad', 'adminController@crearActividad')->name('crearActividad')->middleware('roles:1');
    Route::get('editar-actividad/{actividades}', 'adminController@editarActividad')->name('editarActividad')->middleware('roles:1');
    Route::post('guardar-actividad', 'adminController@guardarActividad')->name('guardarActividad')->middleware('roles:1');
    Route::patch('actualizar-actividad/{actividades}', 'adminController@actualizarActividad')->name('actualizarActividad')->middleware('roles:1');
    Route::patch('deshabilitar-actividad/{actividades}', 'adminController@deshabilitarActividad')->name('deshabilitarActividad')->middleware('roles:1');
    Route::patch('habilitar-actividad/{actividades}', 'adminController@habilitarActividad')->name('habilitarActividad')->middleware('roles:1');

    // CRUD de Usuarios
    Route::get('lista-usuarios', 'adminController@listarUsuarios')->name('listarUsuarios')->middleware('roles:1');
    Route::get('crear-usuario', 'adminController@CrearUsuario')->name('CrearUsuario')->middleware('roles:1');
    Route::get('editar-usuario/{id}', 'adminController@editarUsuario')->name('editarUsuario')->middleware('roles:1');
    Route::post('guardar-usuario', 'adminController@guardarUsuario')->name('guardarUsuario')->middleware('roles:1');
    Route::patch('actualizar-usuario/{id}', 'adminController@actualizarUsuario')->name('actualizarUsuario')->middleware('roles:1');

    // CRUD de Roles
    Route::get('lista-roles', 'adminController@listarRoles')->name('listarRoles')->middleware('roles:1');
    Route::get('crear-rol', 'adminController@crearRol')->name('crearRol')->middleware('roles:1');
    Route::get('editar-rol/{roles}', 'adminController@editarRol')->name('editarRol')->middleware('roles:1');
    Route::post('guardar-rol', 'adminController@guardarRol')->name('guardarRol')->middleware('roles:1');
    Route::patch('actualizar-rol/{roles}', 'adminController@actualizarRol')->name('actualizarRol')->middleware('roles:1');
    Route::patch('deshabilitar-rol/{roles}', 'adminController@deshabilitarRol')->name('deshabilitarRol')->middleware('roles:1');
    Route::patch('habilitar-rol/{roles}', 'adminController@habilitarRol')->name('habilitarRol')->middleware('roles:1');

    // Guardar Asistencia
    Route::post('guardar-asistencia', 'adminController@guardarAsistencia')->name('guardarAsistencia');

    // Lista con Modificaciones
    Route::get('lista-registros-mod', 'adminController@listaRegistrosMod')->name('listaRegistrosMod')->middleware('roles:1,2,6');
});

// Otras Rutas
Route::get('pruebas', 'pruebasController@pruebas')->name('pruebas')->middleware('auth','roles:1,2');
Auth::routes(['register' => false]);
Route::resource('mail', 'MailController');
