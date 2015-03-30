<?php

/**
* Agregamos un usuario nuevo a la base de datos.
*/
class UsersTableSeeder extends Seeder {
    public function run(){
        User::create(array(
            'username'  => 'admin',
            'email'     => 'admin@admin.com',
            'admin' => 0,
            'password' => Hash::make('admin') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
    }
}