<?php

class UsersController extends BaseController
{
    public function __construct() {
        $this->beforeFilter('auth'); //bloqueo de acceso
    }

    public function getIndex()
    {
        $my_id = Auth::user()->id;
        $is_admin = Auth::user()->admin;
        //control permissions only access administrator
        if($is_admin==1)
        {
            $users = User::where('admin', '<>', '1')->where('id', '<>', $my_id)->get();
            return View::make('admin/users.index')->with('users',$users);
        }
        else
        {
            return View::make('errors.access_denied');
        }
    }
}
