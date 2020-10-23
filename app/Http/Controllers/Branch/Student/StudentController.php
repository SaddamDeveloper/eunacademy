<?php

namespace App\Http\Controllers\Branch\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('branch.student.index');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'father_name' =>  'required|string',
            'email' =>  'required|email|unique:branches', 
            'mobile' => 'required|numeric|min:10|unique:branches',
            'dob' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'course' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'city' =>  'required|string',
            'state' =>  'required|string',
            'pin' =>  'required|numeric',
            'present_address' => 'required',
        ]);
        // dd(1);
    }
}
