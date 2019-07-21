<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contacto;
use App\Content;
use App\Pool;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('onlyAdmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDashboard()
    {
       return $this->getUsers();
    }

    public function getUsers(){
        $users = User::latest()->paginate(10);
        return view('administrador.user.index', compact('users'));
    }

    public function getContactos(){
        $contactos = Contacto::latest()->paginate(10);
        return view('administrador.contactos.index', compact('contactos'));
    }

    public function eliminarContacto($id){
        $contacto = Contacto::findOrFail($id);
        $contacto->delete();
        return redirect()->route('verFormulariosContacto')->with('message', 'El contacto fue eliminado correctamente.');
    }
}
