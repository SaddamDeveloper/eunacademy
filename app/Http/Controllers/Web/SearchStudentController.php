<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SearchStudentController extends Controller
{
    public function search(Request $request){
        $rules = array(
            'id'         => 'required',
        );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $id = $request->input('id');
        $student = Student::where('registraion_no', $id)->first();
        if ($student) {
            $course = $student->courses->name;
            $data = "Registration No: $student->registraion_no\nName : $student->name\nFather: $student->father_name\nCourse : $course\nMobile: $student->mobile";
            $qr_code = QrCode::generate($data);
            $html = '<div class="p-30 mb-35 bg-light shadow rounded row">
            <div class="col-lg-9 col-sm-9 mt-5 mt-lg-0">
            <h4>Student Profile</h4>
            <div class="border-top mt-20">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="media mt-25 align-items-center">
                        <div class="">
                            <p>Student Name</p>
                            <h5 class="font-weight-600 text-blue">'.$student->name.'</h5>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="media mt-25 align-items-center">
                        <div class="">
                            <p>Registration Number</p>
                            <h5 class="font-weight-600 text-blue">'.$student->registraion_no.'</h5>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="media mt-25 align-items-center">
                        <div class="">
                            <p>Father</p>
                            <h5 class="font-weight-600 text-blue">'.$student->father_name.'</h5>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="media mt-25 align-items-center">
                        <div class="">
                            <p>Course opt</p>
                            <h5 class="font-weight-600 text-blue">'.$student->courses->name.'</h5>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="media mt-25 align-items-center">
                        <div class="">
                            <p>DOB</p>
                            <h5 class="font-weight-600 text-blue">'.$student->dob.'</h5>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="media mt-25 align-items-center">
                        <div class="">
                            <p>Session</p>
                            <h5 class="font-weight-600 text-blue">'.$student->start_date.'</h5>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-lg-3 col-sm-3 mt-5 mt-lg-0">
            <div class="image-block">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-6 offset-1 p-0">
                        <img class="img-fluid" src="'.asset('branch/student/'. $student->photo).'" alt="" style="width:100px;height:100px">
                    </div>
                    <div class="col-md-5 col-sm-5 col-6 p-0">
                        <div class="img-fluid">'.$qr_code.'</div>
                    </div>
                </div>
            </div>
            <div class="job-meta sign mt-3">
                <img class="img-fluid" src="'.asset('branch/student/'. $student->sign).'" alt="" style="background:#fff;margin:auto">
            </div>
            </div>
            </div>
            <button id="print" class="btn btn-primary pull-right hidden-print">Print</button>';
            return $html;
        }else{
            return 1;
        }

    }
}
