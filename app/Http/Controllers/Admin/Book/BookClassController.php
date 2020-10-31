<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\BookClass;
use Illuminate\Http\Request;

class BookClassController extends Controller
{
    public function index(){
        return view('admin.book.index');
    }

    public function list(){
        return datatables()->of(BookClass::orderBy('created_at', 'DESC')->get())
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
            $action = '
                <a href="' . route('book.class.destroy', ['id' => encrypt($row->id)]) . '" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
            return $action;
        })
        ->editColumn('course', function ($row) {
            $course = $row->courses->name;
            return $course;
        })
        ->rawColumns(['action', 'course'])
        ->make(true);
    }
}
