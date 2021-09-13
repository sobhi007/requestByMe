<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{


    public function __Construct()
    {
        $this->middleware('auth')->except(['greeting','login']);
    }

    public function login()
    {
      return 'must be login';
    }

    public function greeting()
    {
      return 'hello';
    }
    public function ShowAdmin()
    {
        return '<h1>Mohamed Sobhi';
    }
}
