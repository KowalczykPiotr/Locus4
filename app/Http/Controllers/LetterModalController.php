<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class LetterModalController extends Controller
{

    public function index($tab) {

        return view('/clients-letters-modal/letters-'.$tab);
    }

}