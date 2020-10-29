@extends('admin.template.admin_master')
@section('content')
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Add Photo</h2>
            <div class="clearfix"></div>
        </div>
        @include('admin.include.error')
        <div class="x_content">
            {{ Form::open(['method' => 'post','route'=>'admin.store.gallery', 'enctype' => 'multipart/form-data']) }}
                <div class="well" style="overflow: auto">
                    <div class="form-row mb-10">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="name">Caption</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}"  placeholder="Enter Caption">
                                @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror
                        </div>                     
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" name="photo" value="{{old('photo')}}"  placeholder="Enter photo">
                                @if($errors->has('photo'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('photo') }}</strong>
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