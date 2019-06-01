<?php

namespace App\Http\Controllers;

use App\Category;
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
}
