<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index() {

        return view('home', ['title' => 'dupa']);

    }



    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $users = User::all();
        $users = User::where('id', $id)->get();
        foreach ($users as $user) {
            echo $user->name;
        }

        //return view('hello', ['dupa' => $id]);
    }
}