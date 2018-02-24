<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LettersController extends Controller
{

    function index() {

        if (! Auth::check())  return redirect('./login');

        return view('clients');

    }

}
