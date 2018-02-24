<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer_group;

class AdminController extends Controller
{

    function letterTypes() {

        if (! Auth::check())  return redirect('./login');

        return view('admin-letters');

    }

    function customerGroups() {

        if (! Auth::check())  return redirect('./login');

        $customer_groups = Customer_group::all();


        return view('admin-clients', compact('customer_groups') );

    }

}
