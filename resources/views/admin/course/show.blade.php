@extends('admin.template.admin_master')
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
                      <th>Duration</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
 <script type="text/javascript">
     $(function () {
        var i = 1;
        var table = $('#course_list').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('branch.ajax.course_list') }}",
            columns: [
                { "render": function(data, type, full, meta) {return i++;}},
                {data: 'name', name: 'name',searchable: true},
                {data: 'duration', name: 'duration',searchable: true},
                {data: 'description', name: 'description',searchable: true},
                {data: 'status', name: 'status', render:function(data, type, row){
                  if (row.status == '1') {
                    return "<button class='btn btn-success rounded'>Active</a>"
                  }else{
                    return "<button class='btn btn-warning rounded'>Inactive</a>"
                  }                        
                }},    
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        
    });
 </script>
@endsection