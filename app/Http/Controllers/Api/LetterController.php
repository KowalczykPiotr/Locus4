<?php

namespace App\Http\Controllers\Api;

use App\Letter;
use App\Letter_transition;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use PDF;

class LetterController extends Controller
{

    function index($customer_id = '*', $letter_type_id = '*') {

        $letters = Letter::all()
            ->where('customer_id', '=', $customer_id)
            ->where('letter_position_id', '=', $letter_type_id);


        $letters->load('letter_type');

        return $letters;
    }

    protected function createPDF($print, $customer) {

        $pdf = PDF::loadView('pdf', compact( 'print', 'customer' ));
        $temp = './pdf/'.time().'.pdf';
        $pdf->save($temp);
        $md5 = md5_file($temp);
        rename($temp,'./pdf/'.$md5.'.pdf');
        return $md5;
    }


    function  provide(Request $request) {

        if (! Auth::check()) redirect('./');

        $data = $request ->validate([

            'customer_id'           =>  'required',
            'list'                  =>  'required'
        ]);

        $customer = Customer::where('id', '=', $data['customer_id'])->first();


        foreach ($data['list'] as $id => $val) {

            if($val == 'true') {

                $letters = Letter::where('id', '=', $id)->first();
                $letters->load('letter_type');

                $print[] = array(
                    'id'   => $letters->id,
                    'name' => $letters->name,
                    'type' => $letters->letter_type->name,
                    'date' => $letters->created_at->format('Y-m-d H:i:s')
                );
            }
        }

        $file = $this->createPDF($print, $customer);

        foreach ($data['list'] as $id => $val) {

            if($val == 'true') {
                $letter = Letter::where('id', '=', $id)->first();
                $letter->letter_position_id = 2;
                $letter->save();

                $letter_transition = new Letter_transition;
                $letter_transition->letter_id = $id;
                $letter_transition->letter_position_id = 2;
                $letter_transition->user_id = Auth::id();
                $letter_transition->file = $file;
                $letter_transition->save();
            }
        }

        return ([ 'status'=>'OK' , 'pdf'=>$file ]);
    }




    function store(Request $request) {

        if (! Auth::check()) redirect('./');

        $data = $request ->validate([

            'name'                  =>  'required',
            'letter_type_id'        =>  'required',
            'customer_id'           =>  'required'
        ]);

        $letter = new Letter;
        $letter->name           = $data['name'];
        $letter->letter_type_id = $data['letter_type_id'];
        $letter->customer_id    = $data['customer_id'];
        $letter->letter_position_id = 1;
        $letter->save();
        $id = $letter->id;

        $letter_transition = new Letter_transition;
        $letter_transition->letter_id           = $id;
        $letter_transition->letter_position_id  = 1;
        $letter_transition->user_id             = Auth::id();
        $letter_transition->file                = "";
        $letter_transition->save();

        return 'ok';

    }
}
