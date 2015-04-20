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
    
    //metodo para agregar al usuario
    public function postCreate()
    {
        //validamos reglas inputs
        $rules = array(
          'inputuser' => 'required|max:10',
          'inputpassword' => 'required|min:8',
          'inputpassword1' => 'required|min:8',
          'inputemail' => 'required|email|unique:users,email'
        );
        
        $validation = Validator::make(Input::all(), $rules);
        //Si no pasa la validacion
        if($validation->fails())
        {
            //Obtenemos los mensajes de error de la validation
            $messages = $validation->messages();
            //Redireccionamos a nuestro formulario de atras con los errores de la validación 
            if(Request::ajax())
            {
                return Response::json(array('errors' => $messages));
            }
            else
            {
                return Redirect::back()->withInput()->withErrors($validation);
            }
        }
        //Si todo ha ido bien guardamos
        $password = Input::get('inputpassword');
        $user = new User;
        $user->username = Input::get('inputuser');
        $user->password = Hash::make($password);
        $user->email = Input::get('inputemail'); 
        $user->admin = (Input::get('es_admin') == '1') ? 1 : 0;
        
        //guardamos
        $user->save();
        
        //redirigimos a usuarios
        
        return Redirect::to('admin/users.index')->with('status','ok_create');
        
    }
}
