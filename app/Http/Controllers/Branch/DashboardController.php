<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardView()
    {
        $students = Student::where('branch_id', Auth::guard('branch')->user()->id)->orderBy('created_at', 'DESC')->limit(10)->get();
        $total_student = $students->count();
        $total_course = Course::whereStatus(1)->count();
        return view('branch.dashboard', compact('students', 'total_student', 'total_course'));
    }
}
