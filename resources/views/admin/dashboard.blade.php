@extends('admin.template.admin_master')

@section('content')
<div class="right_col" role="main">
    <div class="row tile_count">
      <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-users"></i> Total Student</span>
        <div class="count">{{ $total_student }}</div>
      </div>
     
      <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-rupee"></i> Total Course</span>
        <div class="count">{{ $total_course }}</div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-rupee"></i> Total Branch</span>
        <div class="count">{{ $total_branch }}</div>
      </div>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-striped jambo_table bulk_action">
          <thead>
              <tr class="headings">                
                  <th class="column-title">Sl No. </th>
                  <th class="column-title">Branch Name</th>
                  <th class="column-title">Email</th>
                  <th class="column-title">Mobile</th>
              </tr>
          </thead>
  
          <tbody>
              @php
                  $count = 1;
              @endphp
              @forelse($branches ?: [] as $branch)
                  <tr class="even pointer">
                      <td class=" ">{{ $count++ }}</td>
                      <td>{{ $branch->name }}</td>
                      <td class="">{{ $branch->email }}</td>
                      <td>
                        {{ $branch->mobile }}
                      </td>
                  </tr>
              @empty
              <tr>
                  <td colspan="5" style="text-align: center">Sorry No Data Found</td>
              </tr>
              @endforelse
          </tbody>
      </table>
      <a href="{{ route('admin.list.branch') }}" class="btn btn-primary pull-right">More...</a>
    </div>
</div>
@endsection