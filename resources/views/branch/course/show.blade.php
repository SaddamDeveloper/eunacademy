@extends('branch.template.branch_master')

@section('content')

<div class="right_col" role="main">
  <div class="row">

    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Course List</h2>
            <div class="clearfix"></div>
        </div>
        @include('branch.include.error')
        <div class="x_content">
            <table id="course_list" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($courses ? $courses : [] as $course)
                        <tr>
                            <td>{{ $course->id }}</td>   
                            <td>{{ $course->name }}</td>   
                            <td>{!! $course->status == 1 ? '<label class="label label-success">Active</label>' : '<label class="label label-danger">Deactive</label>' !!}</td>   
                            <td><a href="{{ route('course.edit', compact('course')) }}" class="btn btn-primary">Edit</a></td>
                        </tr>                       
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No data found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection