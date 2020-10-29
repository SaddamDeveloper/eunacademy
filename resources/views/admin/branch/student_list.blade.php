@extends('admin.template.admin_master')

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
                    </tr>
                </thead>
                <tbody> 
                    @php
                        $count = 1;
                    @endphp
                    @forelse ($student ?: [] as $st)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $st->registraion_no }}</td>
                            <td>{{ $st->name }}</td>
                            <td>{{ $st->father_name }}</td>
                            <td>{{ $st->email }}</td>
                            <td>{{ $st->mobile }}</td>
                        </tr>                      
                    @empty
                        <tr colspan="7" class="text-center">No Student Registered Yet!</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
