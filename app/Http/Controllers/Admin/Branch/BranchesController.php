<?php

namespace App\Http\Controllers\Admin\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BranchesController extends Controller
{
    public function index()
    {
        return view('admin.branch.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:branches',
            'password' => 'required|same:confirm_password|min:6',
            'mobile' => 'required|numeric|min:10|unique:branches',
            'city'  =>  'required|string',
            'state' =>  'required|string'
        ]);
        $branch = new Branch();
        $branch->name = $request->input('name');
        $branch->email = $request->input('email');
        $branch->mobile = $request->input('mobile');
        $branch->password = Hash::make($request->input('password'));
        $branch->city = $request->input('city');
        $branch->state = $request->input('state');
        $branch->address = $request->input('address');

        if ($branch->save()) {
            return redirect()->back()->with('message', 'Branch successfully added!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function show()
    {
        return view('admin.branch.show');
    }

    public function branchList()
    {
        return datatables()->of(Branch::orderBy('created_at', 'DESC')->get())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $action = '
            <a href="' . route('admin.show.student', ['id' => encrypt($row->id)]) . '" class="btn btn-primary"><i class="fa fa-users"></i></a>
            <a href="' . route('admin.edit.branch', ['id' => encrypt($row->id)]) . '" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            <a href="' . route('admin.change.password', ['id' => encrypt($row->id)]) . '" class="btn btn-warning"><i class="fa fa-lock"></i></a>';
                if ($row->status == '1') {
                    $action .= '<a href="' . route('admin.status.branch', ['id' => encrypt($row->id), 'status' =>
                    2]) . '" class="btn btn-danger"><i class="fa fa-power-off"></i></a>';
                } else {
                    $action .= '<a href="' . route('admin.status.branch', ['id' => encrypt($row->id), 'status' =>
                    1]) . '" class="btn btn-success"><i class="fa fa-check"></i></a>';
                }
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function edit($id)
    {
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }
        $branch = Branch::find($id);
        return view('admin.branch.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email' . $branch->email,
            'mobile' => 'required|numeric|min:10' . $branch->mobile,
            'city'  =>  'required|string',
            'state' =>  'required|string'
        ]);

        $id = $request->input('id');
        $branch = Branch::find($id);
        $branch->name = $request->input('name');
        $branch->email = $request->input('email');
        $branch->mobile = $request->input('mobile');
        $branch->city = $request->input('city');
        $branch->state = $request->input('state');
        $branch->address = $request->input('address');

        if ($branch->save()) {
            return redirect()->back()->with('message', 'Branch successfully updated!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function status($id, $status)
    {
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $branch = Branch::find($id);
        $branch->status = $status;
        if ($branch->save()) {
            return redirect()->back()->with('message', 'Branch Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function showList($id)
    {
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }
        $student = Student::where('branch_id', $id)->paginate(10);
        return view('admin.branch.student_list', compact('student'));
    }
    public function listStudent($id)
    {
        dd(1);
    }

    public function changePassword($id)
    {
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            abort(404);
        }
        $branch = Branch::find($id);
        return view('admin.branch.password', compact('branch'));
    }

    public function doChangePassword(Request $request)
    {
        $id = $request->input('id');
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with('error', 'Your current password does not matches with the password you provided. Please try again.');
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }


        //Change Password
        $branch = Branch::find($id);
        $branch->password = bcrypt($request->get('new-password'));
        if ($branch->save()) {
            return redirect()->back()->with("message", "Password changed successfully !");
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
