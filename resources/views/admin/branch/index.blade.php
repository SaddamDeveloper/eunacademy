@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
  <div class="row">

    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Add Branch</h2>
            <div class="clearfix"></div>
        </div>
        @include('admin.include.error')
        <div class="x_content">
            {{ Form::open(['method' => 'post','route'=>'admin.store.branch']) }}
                <div class="well" style="overflow: auto">
                    <div class="form-row mb-10">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="name">Branch Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}"  placeholder="Enter Branch Name">
                                @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror
                        </div>                     
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{old('email')}}"  placeholder="Enter Email">
                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="mobile">Mobile No</label>
                            <input type="number" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="Enter Mobile No">
                                @if($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert" >
                                        <strong style="color:red">{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @enderror
                        </div>                      
                    </div>
                    <div class="form-row mb-10">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" value="{{old('password')}}"  placeholder="Enter Password">
                                @if($errors->has('password'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @enderror
                        </div>       
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password"  placeholder="Enter Confirm Password">
                                @if($errors->has('confirm_password'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                @enderror
                        </div>       
                    </div>
                    <div class="form-row mb-10">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" value="{{old('city')}}" placeholder="Enter City">
                                @if($errors->has('city'))
                                    <span class="invalid-feedback" role="alert" >
                                        <strong style="color:red">{{ $errors->first('city') }}</strong>
                                    </span>
                                @enderror
                        </div> 
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="state">State</label>
                            <input type="text" class="form-control" name="state" value="{{old('state')}}" placeholder="Enter State">
                                @if($errors->has('state'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @enderror
                        </div> 
                        <div class="col-md-4 col-sm-6 col-xs-6 mb-3">
                            <label for="address">Address</label>
                                <textarea class="form-control" name="address" placeholder="Enter Address">{{old('address')}}</textarea>
                                @if($errors->has('address'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @enderror
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