<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BookClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $rules = array(
            'name'         => 'required',
            'mobile'        => 'required|numeric|min:10',
            'email'         => 'required|email'
        );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $email = $request->input('email');
        $isExists = BookClass::where('email', $email)->first();
        if ($isExists) {
            return response()->json(array("error" => "Email already exists!"));
        }

        $mobile = $request->input('mobile');
        $isExists = BookClass::where('mobile', $mobile)->first();
        if ($isExists) {
            return response()->json(array("error" => "Mobile already exists!"));
        }

        $bookclass = new BookClass;
        $bookclass->name     = $request->input('name');
        $bookclass->email    = $request->input('email');
        $bookclass->mobile   = $request->input('mobile');
        $bookclass->course_id     = $request->input('course_id');
        if($bookclass->save()){
            return response()->json(['success' => 'Data Added successfully.']);
        }
    }
}
