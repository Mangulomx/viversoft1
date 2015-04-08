<?php
/*
Route::get('/', function()
{
    return View::make('login');
});
 * 
 */


Route::resource('admin/users', 'Admin_UsersController');
//Nos mostrara el formulario del login
Route::get('login','AuthController@showLogin');
//Validamos los datos de inicio de sesión
Route::post('login','AuthController@postLogin');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{
    // Esta será nuestra ruta de bienvenida.
    Route::get('/', function()
    {
        return View::make('hello');
    });
    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'AuthController@logOut');
});

//Rutas del sistema
Route::Controller('users','UsersController');
