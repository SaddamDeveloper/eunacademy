<?php

namespace App\Http\Controllers\Branch\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('created_at', 'DESC')->paginate(10);
        return view('branch.course.show', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branch.course.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $course = new Course();
        $course->name = $request->input('name');
        if($course->save()){
            return redirect()->back()->with('message', 'Course created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $c = Course::find($course->id);
        $c->name = $request->input('name');
        if($c->save()){
            return redirect()->back()->with('message', 'Course updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }

    public function branchList(){
        $query = Course::orderBy('created_at', 'DESC');
            return datatables()->of($query->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('branch.course.edit', ['id' => encrypt($row->id)]).'" class="btn btn-primary">Edit</a><a href="'.route('branch.course.destroy', ['id' => encrypt($row->id)]).'" class="btn btn-danger">Delete</a>';
                if($row->status == '1'){
                    $btn .= '<a href="'.route('course.status', ['id' => encrypt($row->id), 'status'=> 2]).'" class="btn btn-warning">Disable</a>';
                }else{
                    $btn .= '<a href="'.route('course.status', ['id' => encrypt($row->id), 'status'=> 1]).'" class="btn btn-success">Enable</a>';
                }
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function status($id, $status){
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }
        $course = Course::findOrFail($id);
        $course->status = $status;
        if($course->save()){
            return redirect()->back()->with('message', 'Course updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function editCourse($id){
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $course = Course::find($id);
        return view('branch.course.edit', compact('course'));
    }

    public function destroyCourse($id){
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $course = Course::find($id);
        if($course->delete()){
            return redirect()->back()->with('message', 'Course deleted successfully');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function updateCourse(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);
        $id = $request->input('id');
        $course = Course::find($id);
        $course->name = $request->input('name');
        if($course->save()){
            return redirect()->back()->with('message', 'Course updated successfully');
        }
    }
}
