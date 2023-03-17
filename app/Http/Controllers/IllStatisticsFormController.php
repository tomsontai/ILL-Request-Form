<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IllStatsForm;

class IllStatisticsFormController extends Controller
{
    //
    function getData(Request $request) {

        $request->validate([
            'resourceTypeName' => 'required',
            'libraryName' => 'required'
        ], [
            'resourceTypeName' => 'Resource Type Name cannot be empty.',
            'libraryName.required' => 'Library Name field cannot be empty.'
        ]);

        $input = $request->all();
        $a = $input['dateName'];
        $b = $input['resourceTypeName'];
        $c = $input['actionType'];

        $d = $input['fillTypeName'];
        $d = $d ? "Filled" : "Unfilled";

        $e = array_key_exists('unfilledTypeName', $input) ? $input['unfilledTypeName'] : null;

        $f = $input['libraryName'];

        $x = new IllStatsForm();
        $x->dateName = $a;
        $x->resourceTypeName = $b;
        $x->actionType = $c;
        $x->fillTypeName = $d;
        //unfilledTypeName not working. Need to work on the Filled and Unfilled part. 
        $x->unfilledTypeName = $e;
        $x->libraryName = $f;
        $x->save();
        
        return view('formSubmitted', ['dateName'=>$a, 'resourceTypeName'=>$b, 
            'actionType'=>$c,
            'fillTypeName'=>$d, 
            'unfilledTypeName'=>$e,
            'libraryName'=>$f]);
        
        
    }

    // this method doesn't work!
    public function postValidate(Request $request) {
        $request->validate([
            'resourceTypeName' => 'required',
            'libraryName' => 'required'
        ], [
            'resourceTypeName' => 'Resource Type Name cannot be empty.',
            'libraryName.required' => 'Library Name field cannot be empty.'
        ]);

        //https://www.geeksforgeeks.org/laravel-validation-rules/
        // $request->validate([
        //     'username' => 'required',
        //     'password' => 'required|min:8|max:255',
        // ], [
        //     'username.required' => 'Username field cannot be empty.',
        //     'password.required' => 'Password field cannot be empty.',
        //     'password.min' => 
        //       'Password must contain at least 8 characters or more.',
        //     'password.max' => 
        //                   'Password must not exceed 255 characters.',
        // ]);
    }
}
