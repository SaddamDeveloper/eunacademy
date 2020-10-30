<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Student;

class DashboardController extends Controller
{
    public function dashboardView()
    {
        $branches = Branch::orderBy('created_at', 'DESC')->paginate(10);
        $total_student = Student::count();
        $total_course = Course::whereStatus(1)->count();
        $total_branch = $branches->count();
        return view('admin.dashboard', compact('branches', 'total_branch', 'total_student', 'total_course'));
    }
}
