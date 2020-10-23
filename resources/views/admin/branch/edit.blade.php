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
        @include('branch.include.error')
        <div class="x_content">
            {{ Form::open(['method' => 'post','route'=>'admin.update.branch']) }}
            <input type="hidden" name="id" value="{{ $branch->id }}">
                <div class="well" style="overflow: auto">
                    <div class="form-row mb-10">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="name">Branch Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $branch->name }}"  placeholder="Enter Branch Name">
                                @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror
                        </div>                     
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $branch->email }}"  placeholder="Enter Email">
                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="mobile">Mobile No</label>
                            <input type="number" class="form-control" name="mobile" value="{{ $branch->mobile }}" placeholder="Enter Mobile No">
                                @if($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert" >
                                        <strong style="color:red">{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @enderror
                        </div>                      
                    </div>
                    <div class="form-row mb-10">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" value="{{ $branch->city }}" placeholder="Enter City">
                                @if($errors->has('city'))
                                    <span class="invalid-feedback" role="alert" >
                                        <strong style="color:red">{{ $errors->first('city') }}</strong>
                                    </span>
                                @enderror
                        </div> 
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="state">State</label>
                            <input type="text" class="form-control" name="state" value="{{ $branch->state }}" placeholder="Enter State">
                                @if($errors->has('state'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @enderror
                        </div> 
                        <div class="col-md-4 col-sm-6 col-xs-6 mb-3">
                            <label for="address">Address</label>
                                <textarea class="form-control" name="address" placeholder="Enter Address">{{ $branch->address }}</textarea>
                                @if($errors->has('address'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @enderror
                        </div>
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