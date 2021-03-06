@extends('branch.template.branch_master')

@section('content')

<div class="right_col" role="main">
  <div class="row">

    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Update Course</h2>
            <div class="clearfix"></div>
        </div>
        @include('branch.include.error')
        <div class="x_content">
            <form action="{{ route('course.update', compact('course')) }}" method="PATCH">
                <div class="well" style="overflow: auto">
                    <div class="form-row mb-10">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">

                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="name">Course Name</label>
                            <input type="text" class="form-control" name="name" required value="{{ $course->name }}"  placeholder="Enter Applicant Name">
                                @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>  
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            
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