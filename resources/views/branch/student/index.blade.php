@extends('branch.template.branch_master')

@section('content')

<div class="right_col" role="main">
  <div class="row">

    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Add Student</h2>
            <div class="clearfix"></div>
        </div>
        @include('branch.include.error')
        <div class="x_content">
            {{ Form::open(['method' => 'post','route'=>'branch.store.student', 'enctype' => 'multipart/form-data']) }}
                <div class="well" style="overflow: auto">
                    <h2>Basic Details</h2>
                    <div class="form-row mb-10">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="name">Applicant Name</label>
                            <input type="text" class="form-control" name="name" required value="{{old('name')}}"  placeholder="Enter Applicant Name">
                                @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>  
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="father_name">Fathers Name</label>
                           <input type="text" class="form-control" name="father_name" required value="{{old('father_name')}}"  placeholder="Enter Applicant Father Name">
                                @if($errors->has('father_name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('father_name') }}</strong>
                                    </span>
                                @enderror
                        </div>                    
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required value="{{old('email')}}"  placeholder="Enter Email">
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
                            <input type="number" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="Enter Mobile No">
                                @if($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert" >
                                        <strong style="color:red">{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @enderror
                        </div>       
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" value="{{ old('dob') }}">
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
                                <option  {{old('gender') == 'Male'?'selected':''}}>Male</option>
                                <option  {{old('gender') == 'Male'?'selected':''}}>Female</option>
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
                                <option  {{old('category') == 'General'?'selected':''}}>General</option>
                                <option  {{old('category') == 'SC/ST'?'selected':''}}>SC/ST</option>
                                <option  {{old('category') == 'OBC'?'selected':''}}>OBC</option>
                                <option  {{old('category') == 'EWS'?'selected':''}}>EWS</option>
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
                                <option value="" selected disabled>--Select Course--</option>
                                <option>PGDCA</option>
                                <option>BCA</option>
                                <option>HS</option>
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
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6 mb-3">
                            <label for="sign">Signature</label>
                            <input type="file" class="form-control" name="sign">
                            @if($errors->has('sign'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('sign') }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>   
                </div>
                <div class="well" style="overflow: auto">
                    <h3>Communication Details</h3>
                    <h4><u>Present Address</u></h4>
                    <div class="form-row mb-10">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}" placeholder="Enter City">
                            @if($errors->has('city'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="state">State</label>
                            <input type="text" class="form-control" name="state" id="state" value="{{ old('state') }}" placeholder="Enter State">
                            @if($errors->has('state'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="pin">Pin</label>
                            <input type="number" class="form-control" name="pin" id="pin" value="{{ old('pin') }}" placeholder="Enter PIN">
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
                            <textarea name="present_address" id="present_address" placeholder="Enter Present Address" class="form-control">{{ old('present_address') }}</textarea>
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
                            <input type="text" class="form-control" name="p_city" id="p_city" value="{{ old('p_city') }}" placeholder="Enter City">
                            @if($errors->has('p_city'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('p_city') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="p_state">State</label>
                            <input type="text" class="form-control" name="p_state" id="p_state" value="{{ old('p_state') }}" placeholder="Enter State">
                            @if($errors->has('p_state'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('p_state') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="p_pin">Pin</label>
                            <input type="number" class="form-control" name="p_pin" id="p_pin" value="{{ old('p_pin') }}" placeholder="Enter PIN">
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
                    <h2>Qualification Details</h2>
                    <div class="form-row mb-3 input_fields_wrap">
                        <div class="col-md-3 col-sm-12 col-xs-12 mb-3">
                            <label for="exam_passed">Exam Passed</label>
                            <input type="text" name="exam_passed[]" class="form-control" required placeholder="Exam Passed">
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                            <label for="exam_passed">Year of Passing</label>
                            <input type="text" name="year_of_pass[]" class="form-control" required placeholder="Year of Passing">
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12 mb-3">
                            <label for="exam_passed">Board/Council</label>
                            <input type="text" name="board[]" class="form-control" required  placeholder="Board/Council">
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                            <label for="exam_passed">Marks</label>
                            <input type="number" name="marks[]" class="form-control" required placeholder="Marks">
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                            <button class="btn btn-primary btn-rounded" id="add" style="margin-top: 24px;"> 
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group">    	            	
                    {{ Form::submit('Submit', array('class'=>'btn btn-success pull-right')) }}  
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
    $(function () {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $("#add"); //Add button ID
        
        var x = 1; //initlal text box count
        $(add_button).click(function(e){ 
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append(`<div><div class="col-md-3 col-sm-12 col-xs-12 mb-3">
                            <label for="exam_passed">Exam Passed</label>
                            <input type="text" name="exam_passed[]" class="form-control" placeholder="Exam Passed">
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                            <label for="exam_passed">Year of Passing</label>
                            <input type="text" name="year_of_pass[]" class="form-control" placeholder="Year of Passing">
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12 mb-3">
                            <label for="exam_passed">Board/Council</label>
                            <input type="text" name="board[]" class="form-control" placeholder="Board/Council">
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                            <label for="exam_passed">Marks</label>
                            <input type="number" name="marks[]" class="form-control" placeholder="Marks">
                        </div>
                        <div class="remove_field col-md-2 col-sm-12 col-xs-12 mb-3">
                            <button class="btn btn-danger" style="margin-top:24px"><i class="fa fa-trash"></i></button>
                        </div>
                        </div>
                        `);
            }
        });
        
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
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