@extends('branch.template.branch_master')

@section('content')

<div class="right_col" role="main">
    <div class="x_panel">
        <div class="x_title">
            <h2>Student List</h2>
            <div class="clearfix"></div>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-success" >{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="x_content">
            <table id="student_list" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Registration No</th>
                        <th>Name</th>
                        <th>Father's Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>                       
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
 
@section('script')
<script>
    $(function(){
        var table = $('#student_list').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('branch.list.student') }}",
            columns: [
                {data: 'id', name: 'id',searchable: true},
                {data: 'registraion_no', name: 'registraion_no',searchable: true},      
                {data: 'name', name: 'name',searchable: true},      
                {data: 'father_name', name: 'father_name',searchable: true},      
                {data: 'email', name: 'email',searchable: true},      
                {data: 'mobile', name: 'mobile',searchable: true},           
                {data: 'action', name: 'action',searchable: true},      
            ]
        });
    })
</script>
@endsection