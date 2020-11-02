@extends('branch.template.branch_master')

@section('content')

<div class="right_col" role="main">
  <div class="row">

    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Update Student</h2>
            <div class="clearfix"></div>
        </div>
        @include('branch.include.error')
        <div class="x_content">
            {{ Form::open(['method' => 'put','route'=>['branch.student.update','id'=> $student->id], 'enctype' => 'multipart/form-data']) }}
                <div class="well" style="overflow: auto">
                    <h2>Basic Details</h2>
                    <div class="form-row mb-10">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="name">Regitration No</label>
                            <input type="text" class="form-control" required value="{{ $student->registraion_no }}" disabled>
                        </div>
                    </div>
                    <div class="form-row mb-10">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="name">Applicant Name</label>
                            <input type="text" class="form-control" name="name" required value="{{ $student->name }}"  placeholder="Enter Applicant Name">
                                @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>  
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="father_name">Fathers Name</label>
                           <input type="text" class="form-control" name="father_name" required value="{{ $student->father_name }}"  placeholder="Enter Applicant Father Name">
                                @if($errors->has('father_name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('father_name') }}</strong>
                                    </span>
                                @enderror
                        </div>                    
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required value="{{ $student->email }}"  placeholder="Enter Email">
                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-row mb-10">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="date">Mobile No</label>
                            <input type="number" class="form-control" name="mobile" value="{{ $student->mobile }}" placeholder="Enter Mobile No">
                                @if($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert" >
                                        <strong style="color:red">{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @enderror
                        </div>       
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" value="{{ $student->dob }}">
                                @if($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert" >
                                        <strong style="color:red">{{ $errors->first('dob') }}</strong>
                                    </span>
                                @enderror
                        </div>       
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="" selected disabled>--Select Gender--</option>
                                <option  {{ $student->gender == 'Male'?'selected':''}}>Male</option>
                                <option  {{ $student->gender == 'Female'?'selected':''}}>Female</option>
                            </select>
                            @if($errors->has('gender'))
                                <span class="invalid-feedback" role="alert" >
                                    <strong style="color:red">{{ $errors->first('gender') }}</strong>
                                </span>
                            @enderror
                        </div>       
                    </div>
                    <div class="form-row mb-10">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="" selected disabled>--Select Category--</option>
                                <option  {{$student->category == 'General'?'selected':''}}>General</option>
                                <option  {{$student->category == 'SC/ST'?'selected':''}}>SC/ST</option>
                                <option  {{$student->category == 'OBC'?'selected':''}}>OBC</option>
                                <option  {{$student->category == 'EWS'?'selected':''}}>EWS</option>
                            </select>
                            @if($errors->has('category'))
                                <span class="invalid-feedback" role="alert" >
                                    <strong style="color:red">{{ $errors->first('category') }}</strong>
                                </span>
                            @enderror
                        </div> 
                    </div>
                </div>
                <div class="well" style="overflow: auto">
                    <h2>Course</h2>
                    <div class="form-row mb-3"> 
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="course">Course</label>
                            <select name="course" id="course" class="form-control">
                                <option value="" disabled>--Select Course--</option>
                                @if (isset($courses) && !empty($courses))
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if($errors->has('course'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('course') }}</strong>
                                </span>
                            @enderror
                        </div> 
                        <div class="col-md-4 col-sm-6 col-xs-6 mb-3">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" name="photo">
                            @if($errors->has('photo'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                            @enderror
                            <div>
                                <img src="{{ asset('branch/student/thumb/'.$student->photo) }}" alt="photo" width="200">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6 mb-3">
                            <label for="sign">Signature</label>
                            <input type="file" class="form-control" name="sign">
                            @if($errors->has('sign'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('sign') }}</strong>
                                </span>
                            @enderror
                            <div>
                                <img src="{{ asset('branch/student/thumb/'.$student->sign) }}" alt="photo" width="200">
                            </div>
                        </div>
                    </div>   
                </div>
                <div class="well" style="overflow: auto">
                    <h3>Communication Details</h3>
                    <h4><u>Present Address</u></h4>
                    <div class="form-row mb-10">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city" value="{{ !empty($student->presentAddress->city) ? $student->presentAddress->city : old('city')  }}" placeholder="Enter City">
                            @if($errors->has('city'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="state">State</label>
                            <input type="text" class="form-control" name="state" id="state" value="{{ $student->presentAddress->state }}" placeholder="Enter State">
                            @if($errors->has('state'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="pin">Pin</label>
                            <input type="number" class="form-control" name="pin" id="pin" value="{{ $student->presentAddress->pin }}" placeholder="Enter PIN">
                            @if($errors->has('pin'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('pin') }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-10">
                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                            <label for="present_address">Present Address</label>
                            <textarea name="present_address" id="present_address" placeholder="Enter Present Address" class="form-control">{{ $student->presentAddress->address }}</textarea>
                            @if($errors->has('present_address'))
                                <span class="invalid-feedback" role="alert" >
                                    <strong style="color:red">{{ $errors->first('present_address') }}</strong>
                                </span>
                            @enderror
                        </div> 
                    </div>
                    <br>
                    <h4><u>Permanent Address</u></h4>
                    <div class="form-row mb-10">
                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                            <label for="check">Same as Present Address</label>
                            <input type="checkbox" value="{{ old('check') }}"  onclick="filladd()" {{ old('check') == 'checked' ?'checked':''}} name="check" id="check">
                        </div>
                    </div>
                    <div class="form-row mb-10">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="p_city">City</label>
                            <input type="text" class="form-control" name="p_city" id="p_city" value="{{ $student->permanentAddress->city }}" placeholder="Enter City">
                            @if($errors->has('p_city'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('p_city') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="p_state">State</label>
                            <input type="text" class="form-control" name="p_state" id="p_state" value="{{ $student->permanentAddress->state }}" placeholder="Enter State">
                            @if($errors->has('p_state'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('p_state') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="p_pin">Pin</label>
                            <input type="number" class="form-control" name="p_pin" id="p_pin" value="{{ $student->permanentAddress->pin }}" placeholder="Enter PIN">
                            @if($errors->has('p_pin'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('p_pin') }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-10">
                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                            <label for="permanent_address">Permanent Address</label>
                            <textarea name="permanent_address" id="permanent_address" class="form-control" placeholder="Enter Permanent Address">{{ old('permanent_address') }}</textarea>
                            @if($errors->has('permanent_address'))
                                <span class="invalid-feedback" role="alert" >
                                    <strong style="color:red">{{ $errors->first('permanent_address') }}</strong>
                                </span>
                            @enderror
                        </div> 
                    </div>
                </div>
                <div class="well" style="overflow: auto">
                    <h2>Session Details</h2>
                    <div class="form-row mb-3 input_fields_wrap">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" id="start_date" value="{{ $student->start_date }}" class="form-control">
                            @if($errors->has('start_date'))
                                <span class="invalid-feedback" role="alert" >
                                    <strong style="color:red">{{ $errors->first('start_date') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" id="end_date" value="{{ $student->end_date }}" class="form-control">
                            @if($errors->has('end_date'))
                                <span class="invalid-feedback" role="alert" >
                                    <strong style="color:red">{{ $errors->first('end_date') }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="well" style="overflow: auto">
                    <h2>Qualification Details</h2>
                    <div class="form-row mb-3 input_fields_wrap">
                        @forelse ($student->qualifications ?: [] as $qualification)
                            <input type="hidden" value="{{ $qualification->id }}" name="qualification_id[]">
                            <div class="col-md-3 col-sm-12 col-xs-12 mb-3">
                                <label for="exam_passed">Exam Passed</label>
                                <input type="text" value="{{ $qualification->exam_passed }}" name="exam_passed[]" class="form-control" required placeholder="Exam Passed">
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                                <label for="exam_passed">Year of Passing</label>
                                <input type="text" value="{{ $qualification->year_of_pass }}" name="year_of_pass[]" class="form-control" required placeholder="Year of Passing">
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12 mb-3">
                                <label for="exam_passed">Board/Council</label>
                                <input type="text" value="{{ $qualification->board }}" name="board[]" class="form-control" required placeholder="Board/Council">
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                                <label for="exam_passed">Marks</label>
                                <input type="number" value="{{ $qualification->marks }}" name="marks[]" class="form-control" required placeholder="Marks">
                            </div>
                        @empty
                            <div class="col-md-3 col-sm-12 col-xs-12 mb-3 text-center">
                                No Qualification added Yet.
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="form-group">    	            	
                    {{ Form::submit('Update', array('class'=>'btn btn-success pull-right')) }}  
                </div>
            {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
function filladd(){
    if(check.checked == true){
            var present_address = document.getElementById("present_address").value;
            var city = document.getElementById("city").value;
            var state = document.getElementById("state").value;
            var pin = document.getElementById("pin").value;

            var copypresentaddress = present_address ;
            var copyp_city = city;
            var copyp_state = state;
            var copyp_pin = pin;
            document.getElementById("permanent_address").value = copypresentaddress;
            document.getElementById("p_city").value = copyp_city;
            document.getElementById("p_state").value = copyp_state;
            document.getElementById("p_pin").value = copyp_pin;
    }
    else if(check.checked == false){
        document.getElementById("permanent_address").value='';
        document.getElementById("p_city").value='';
        document.getElementById("p_state").value='';
        document.getElementById("p_pin").value='';
    }
}
</script>
@endsection