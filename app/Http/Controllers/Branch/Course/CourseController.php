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
    public function edit(Course $course)
    {
        return view('branch.course.edit', compact('course'));
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
        dd(1);
        dd($course);
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
    public function destroy(Course $course)
    {
        //
    }

    public function status($id, $status){
        // $course = Course::findOrFail(decrypt($id));
        // $course->status = $status;
        // if($course->save()){
        //     return redirect()->back()->with('message', 'Course updated successfully!');
        // }else{
        //     return redirect()->back()->with('error', 'Something went wrong!');
        // }
    }
}
