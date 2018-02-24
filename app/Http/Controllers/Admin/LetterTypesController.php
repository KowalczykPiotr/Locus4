<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Letter_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;

class LetterTypesController extends Controller
{


    function index() {

        $letter_types = Letter_type::all();
        return view('admin/letter-types', compact('letter_types') );
    }

    function add() {

        return view('admin/letter-types-add');
    }

    function delete($id) {

        try {
            Letter_type::where('id', $id)->delete();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('admin.msg_delete_error'));
            return redirect('./admin/letter-types');
        }

        Session::flash('alert-success', __('admin.msg_delete_ok'));
        return redirect('./admin/letter-types');

    }

    function save(Request $request) {

        $validator = Validator::make($request->all(), [
            'name'                 =>  'required|between:3,16',
            'sort_order'           =>  'required|digits_between:0,255',
        ]);

        if ($validator->fails()) {

            Session::flash('alert-danger', __('admin.msg_add_validate_error'));
            return redirect('./admin/letter-types/add')
                ->withErrors($validator)
                ->withInput();
        }


        try {

            $letter_type = new Letter_type;

            $letter_type->name = $request->name;
            $letter_type->sort_order = $request->sort_order;
            $letter_type->save();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('admin.msg_add_error'));
            return redirect('./admin/letter-types');
        }

        Session::flash('alert-success', __('admin.msg_add_ok'));
        return redirect('./admin/letter-types');
    }

    function edit($id) {

        $letter_type = Letter_type::findOrFail($id);
        return view('admin/letter-types-edit', compact('letter_type'));
    }

    function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'id'             =>  'required',
            'name'           =>  'required|between:3,16',
            'sort_order'     =>  'required|digits_between:0,255',
        ]);

        if ($validator->fails()) {

            Session::flash('alert-danger', __('admin.msg_add_validate_error'));
            return redirect('./admin/letter-types/edit/'.$request->id)
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $letter_type = Letter_type::find($request->id);

            $letter_type->name = $request->name;
            $letter_type->sort_order = $request->sort_order;
            $letter_type->save();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('admin.msg_add_error'));
            return redirect('./admin/letter-types');
        }

        Session::flash('alert-success', __('admin.msg_edit_ok'));
        return redirect('./admin/letter-types');
    }
}
