@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>{{ $student->name }}</h2>
            <div class="clearfix"></div>
        </div>
        @include('admin.include.error')
        <div class="x_content">
            <div class="well" style="overflow: auto">
                <h2>Basic Details</h2>
                <div class="form-row mb-10">
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="registration_no">Registration No</label>
                        <input type="text" class="form-control" value="{{ $student->registraion_no }}" disabled>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="name">Applicant Name</label>
                        <input type="text" class="form-control" name="name" disabled value="{{ $student->name }}">
                    </div>  
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="father_name">Fathers Name</label>
                        <input type="text" class="form-control" name="father_name" disabled value="{{ $student->father_name }}" >
                    </div>                    
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" disabled value="{{ $student->email }}">
                    </div>
                </div>
                <div class="form-row mb-10">
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="date">Mobile No</label>
                        <input type="number" class="form-control" name="mobile" value="{{ $student->mobile }}" disabled>
                    </div>       
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" value="{{ $student->dob }}" disabled>
                    </div>       
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="gender">Gender</label>
                        <input type="text" class="form-control" name="gender" value="{{ $student->gender }}" disabled>
                    </div>       
                </div>
                <div class="form-row mb-10">
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" name="category" value="{{ $student->category }}" disabled>
                    </div> 
                </div>
            </div>
            <div class="well" style="overflow: auto">
                <h2>Course</h2>
                <div class="form-row mb-3"> 
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="course">Course</label>
                        <input type="text" class="form-control" value="{{ $student->courses->name }}" disabled>
                    </div> 
                    <div class="col-md-4 col-sm-6 col-xs-6 mb-3">
                        <label for="photo">Photo</label>
                        <img src="{{ asset('/branch/student/thumb/'.$student->photo) }}" height="200" alt="photo">
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6 mb-3">
                        <label for="sign">Signature</label>
                        <img src="{{ asset('/branch/student/thumb/'.$student->sign) }}" height="100" alt="photo">
                    </div>
                </div>   
            </div>
            <div class="well" style="overflow: auto">
                <h3>Communication Details</h3>
                <h4><u>Present Address</u></h4>
                <div class="form-row mb-10">
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" value="{{$student->presentAddress->city }}" disabled>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="state">State</label>
                        <input type="text" class="form-control" value="{{ $student->presentAddress->state }}" disabled>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="pin">Pin</label>
                        <input type="number" class="form-control" value="{{ $student->presentAddress->state }}" disabled>
                    </div>
                </div>
                <div class="form-row mb-10">
                    <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                        <label for="present_address">Present Address</label>
                        <input type="text" class="form-control" value="{{ $student->presentAddress->address }}" disabled>
                    </div> 
                </div>
                <br>
                <h4><u>Permanent Address</u></h4>
                <div class="form-row mb-10">
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="p_city">City</label>
                        <input type="text" class="form-control" value="{{ $student->permanentAddress->city }}" disabled>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="p_state">State</label>
                        <input type="text" class="form-control" value="{{ $student->permanentAddress->state }}" disabled>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                        <label for="p_pin">Pin</label>
                        <input type="number" class="form-control" value="{{ $student->permanentAddress->pin }}" disabled>
                    </div>
                </div>
                <div class="form-row mb-10">
                    <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                        <label for="permanent_address">Permanent Address</label>
                        <input type="text" class="form-control" value="{{ $student->permanentAddress->address }}" disabled>
                    </div> 
                </div>
            </div>
            <div class="well" style="overflow: auto">
                <h2>Qualification Details</h2>
                <div class="form-row mb-3 input_fields_wrap">
                    @forelse ($student->qualifications ?: [] as $qualification)
                        <div class="col-md-3 col-sm-12 col-xs-12 mb-3">
                            <label for="exam_passed">Exam Passed</label>
                            <input type="text" value="{{ $qualification->exam_passed }}" class="form-control" disabled>
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                            <label for="exam_passed">Year of Passing</label>
                            <input type="text" value="{{ $qualification->year_of_pass }}" class="form-control" disabled>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12 mb-3">
                            <label for="exam_passed">Board/Council</label>
                            <input type="text" value="{{ $qualification->board }}" class="form-control" disabled>
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                            <label for="exam_passed">Marks</label>
                            <input type="number" value="{{ $qualification->marks }}" class="form-control" disabled>
                        </div>
                    @empty
                        <div class="col-md-3 col-sm-12 col-xs-12 mb-3 text-center">
                            No Qualification added Yet
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection