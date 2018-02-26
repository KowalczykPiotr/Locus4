<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Customer;
use App\Customer_group;
use Validator;

class ClientsController extends Controller
{


    function index($page = 0, Request $request)
    {

        $customer_groups = Customer_group::all();

        $take = 10;

        $obj = Customer::where('name', 'LIKE', '%' . $request->name . '%')
            ->where('email', 'LIKE', '%' . $request->email . '%')
            ->where('phone', 'LIKE', '%' . $request->phone . '%');

        if ($request->group) {

            $obj = $obj->where('customer_group_id', $request->group);
        }

        $count = $obj->count();
        $customers = $obj->take($take)->skip($page * $take)->get();

        if ($page) {
            $prev = $page - 1;
        }
        if ((($page + 1) * $take) <= $count) {
            $next = $page + 1;
        }

        $input = $request;
        return view('admin/clients', compact('customers', 'customer_groups', 'input', 'prev', 'next'));
    }

    function add() {

        $customer_groups = Customer_group::all();

        return view('admin/clients-add', compact('customer_groups'));

    }

    function save(Request $request) {

        $validator = Validator::make($request->all(), [
            'name'           =>  'required|between:3,80',
            'email'          =>  'required|between:3,80',
            'phone'          =>  'required|between:3,16',
            'group'          =>  'required',
        ]);

        if ($validator->fails()) {

            Session::flash('alert-danger', __('admin.msg_add_validate_error'));
            return redirect('./admin/clients/add')
                ->withErrors($validator)
                ->withInput();
        }


        try {

            $customer = new Customer;

            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->customer_group_id = $request->group;
            $customer->user_id =  Auth::id();
            $customer->save();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('admin.msg_add_error'));
            return redirect('./admin/clients');
        }

        Session::flash('alert-success', __('admin.msg_add_ok'));
        return redirect('./admin/clients');

    }

    function view($id) {

        $customer = Customer::findOrFail($id);
        $customer->group_name = $customer->customer_group->group_name;
        return view('admin/clients-view', compact('customer'));

    }

    function edit($id) {

        $customer = Customer::findOrFail($id);
        $customer_groups = Customer_group::all();

        return view('admin/clients-edit', compact('customer', 'customer_groups'));

    }

    function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'id'             =>  'required',
            'name'           =>  'required|between:3,80',
            'email'          =>  'required|between:3,80',
            'phone'          =>  'required|between:3,16',
            'group'          =>  'required',
        ]);

        if ($validator->fails()) {

            Session::flash('alert-danger', __('admin.msg_add_validate_error'));
            return redirect('./admin/clients/edit/'.$request->id)
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $customer = Customer::find($request->id);

            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->customer_group_id = $request->group;

            $customer->save();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('admin.msg_add_error'));
            return redirect('./admin/clients');
        }

        Session::flash('alert-success', __('admin.msg_edit_ok'));
        return redirect('./admin/clients');
    }

    function delete($id) {

        try {
            Customer::where('id', $id)->delete();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('admin.msg_delete_error'));
            return redirect('./admin/clients');
        }

        Session::flash('alert-success', __('admin.msg_delete_ok'));
        return redirect('./admin/clients');

    }
}
