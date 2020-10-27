<?php

namespace App\Http\Controllers\Branch\Student;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Course;
use App\Models\Qualification;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    public function index(){
        $courses = Course::whereStatus(1)->orderBy('created_at', 'DESC')->get();
        return view('branch.student.index', compact('courses'));
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
            'sign' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'city' =>  'required|string',
            'state' =>  'required|string',
            'pin' =>  'required|numeric',
            'present_address' => 'required',
            'exam_passed.*' => 'required',
        ]);

        if($request->hasfile('photo'))
        {
            $photo = $request->file('photo');
            $destination = base_path().'/public/branch/student/';
            $extension = $photo->getClientOriginalExtension();
            $photo_name = md5(date('now').time()).".".$extension;
            $original_path = $destination.$photo_name;
            Image::make($photo)->save($original_path);
            $thumb_path = base_path().'/public/branch/student/thumb/'.$photo_name;
            Image::make($photo)
            ->resize(346, 252)
            ->save($thumb_path);
        }

        if($request->hasfile('sign'))
        {
            $image = $request->file('sign');
            $destination = base_path().'/public/branch/student/';
            $image_extension = $image->getClientOriginalExtension();
            $image_name = md5(date('now').time()).".".$image_extension;
            $original_path = $destination.$image_name;
            Image::make($image)->save($original_path);
            $thumb_path = base_path().'/public/branch/student/thumb/'.$image_name;
            Image::make($image)
            ->resize(346, 252)
            ->save($thumb_path);
        }

        try {
            DB::transaction(function () use ($request, $photo_name, $image_name) {
                $student = new Student();
                $student->name = $request->input('name');
                $student->father_name = $request->input('father_name');
                $student->dob = $request->input('dob');
                $student->gender = $request->input('gender');
                $student->email = $request->input('email');
                $student->mobile = $request->input('mobile');
                $student->category = $request->input('category');
                $student->course = $request->input('course');   
                $student->photo = $photo_name;
                $student->sign = $image_name;
                $student->save();

                $address1 = new Address();
                $address1->student_id = $student->id;
                $address1->state = $request->input('state');
                $address1->city = $request->input('city');
                $address1->pin = $request->input('pin');
                $address1->address = $request->input('address');
                $address1->save();

                $address2 = new Address();
                $address2->student_id = $student->id;
                $address2->state = $request->input('p_state');
                $address2->city = $request->input('p_city');
                $address2->pin = $request->input('p_pin');
                $address2->address = $request->input('permanent_address');
                $address2->save();
                
                $student->present_address_id = $address1->id;
                $student->permanent_address_id = $address2->id;
                $registraion_no = $this->generateRegistrationNo($student->id);
                $student->registraion_no = $registraion_no;
                $student->save();
                
                $data = [];
               for ($i=0; $i <count($request->exam_passed) ; $i++) { 
                $data[] = [
                    'student_id' => $student->id,
                    'exam_passed' => $request->input('exam_passed')[$i],
                    'year_of_pass' => $request->input('year_of_pass')[$i],
                    'board' => $request->input('board')[$i],
                    'marks' => $request->input('marks')[$i],
                    'created_at' => Carbon::now(),
                ];
               }
               Qualification::insert($data);
            });
            return redirect()->back()->with('message', 'Student is Successfully added!');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function show(){
        return view('branch.student.show');
    }
    public function list(){
        $query = Student::orderBy('created_at', 'DESC');
        return datatables()->of($query->get())
        ->addIndexColumn()
        ->addColumn('action', function($row){
               $btn = '
               <a href="'.route('branch.student.view', [encrypt($row->id)]).'" class="btn btn-info btn-sm" target="_blank">View</a>
               <a href="'.route('branch.student.edit', [encrypt($row->id)]).'" class="btn btn-warning btn-sm">Edit</a>              
               <a href="'.route('branch.student.delete', [encrypt($row->id)]).'" class="btn btn-danger btn-sm">Delete</a>              
               ';
               if ($row->status == '1') {
                   $btn .= '<a href="'.route('branch.student.status', ['id' => encrypt($row->id), 'status' => 2]).'" class="btn btn-danger btn-sm">Unpublish</a>';
                    return $btn;
                }else{
                   $btn .= '<a href="'.route('branch.student.status', ['id' => encrypt($row->id), 'status' => 1]).'" class="btn btn-success btn-sm">Publish</a>';
                    return $btn;
                }
                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function view($id){
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $student = Student::find($id);
        return view('branch.student.edit', compact('student'));
    }

    private function generateRegistrationNo($id){
        
        $id = str_pad($id, 5, '0',STR_PAD_LEFT);
        $year = Carbon::now()->year;
        $month = Carbon::now()->format('M');
        $id = $course.'/'.$year.'/'.strtoupper($month).'/'.$id;
        return $id;
    }
}
