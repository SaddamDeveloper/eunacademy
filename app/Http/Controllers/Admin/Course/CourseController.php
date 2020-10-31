<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.course.show', compact('courses'));
    }

    public function create()
    {
        return view('admin.course.index');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'duration' => 'required|string'
        ]);

        $course = new Course();
        $course->name = $request->input('name');
        $course->duration = $request->input('duration');
        $course->description = $request->input('description');
        if ($course->save()) {
            return redirect()->back()->with('message', 'Course created successfully');
        }
    }

    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $c = Course::find($course->id);
        $c->name = $request->input('name');
        if ($c->save()) {
            return redirect()->back()->with('message', 'Course updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function branchList()
    {
        $query = Course::orderBy('created_at', 'DESC');
        return datatables()->of($query->get())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('branch.course.edit', ['id' => encrypt($row->id)]) . '" target="_blank" class="btn btn-primary">Edit</a><a href="' . route('branch.course.destroy', ['id' => encrypt($row->id)]) . '" class="btn btn-danger">Delete</a>';
                if ($row->status == '1') {
                    $btn .= '<a href="' . route('course.status', ['id' => encrypt($row->id), 'status' => 2]) . '" class="btn btn-warning">Disable</a>';
                } else {
                    $btn .= '<a href="' . route('course.status', ['id' => encrypt($row->id), 'status' => 1]) . '" class="btn btn-success">Enable</a>';
                }
                return $btn;
            })
            ->editColumn('description', function($row){
                return Str::words($row->description, 5, '...');
            })
            ->rawColumns(['action', 'description'])
            ->make(true);
    }

    public function status($id, $status)
    {
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }
        $course = Course::findOrFail($id);
        $course->status = $status;
        if ($course->save()) {
            return redirect()->back()->with('message', 'Course updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function editCourse($id)
    {
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $course = Course::find($id);
        return view('admin.course.edit', compact('course'));
    }

    public function destroyCourse($id)
    {
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $course = Course::find($id);
        if ($course->delete()) {
            return redirect()->back()->with('message', 'Course deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function updateCourse(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $id = $request->input('id');
        $course = Course::find($id);
        $course->name = $request->input('name');
        $course->duration = $request->input('duration');
        $course->description = $request->input('description');
        if ($course->save()) {
            return redirect()->back()->with('message', 'Course updated successfully');
        }
    }
}
