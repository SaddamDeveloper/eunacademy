<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('branch.index');
    }

    public function branchLogin(Request $request){
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('branch')->attempt(['email' => $request->username, 'password' => $request->password]) || Auth::guard('branch')->attempt(['mobile' => $request->username, 'password' => $request->password])) {

            return redirect()->intended('/branch/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'))->with('login_error','Username or password incorrect');
    }

    public function logout()
    {
        Auth::guard('branch')->logout();
        return redirect()->route('branch.login');
    }

    public function changePasswordForm()
    {
        return view('branch.change_password');
    }

    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => ['required', 'string', 'min:6'],
            'new_password' => ['required', 'string', 'min:6'],
            'confirm_password' => ['required', 'string', 'min:6', 'same:new_password'],
        ]);

        $current_password = Auth::guard('admin')->user()->password;   

        if(Hash::check($request->input('current_password'), $current_password)){           
            $user_id = Auth::guard('admin')->user()->id; 
            $password_change = DB::table('admin')
            ->where('id',$user_id)
            ->update([
                'password' => Hash::make($request->input('confirm_password')),
                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
            ]);

            return redirect()->back()->with('message','Your Password Changed Successfully');
            
        }else{           
            return redirect()->back()->with('error','Sorry Current Password Does Not matched');
       }
    }
}
