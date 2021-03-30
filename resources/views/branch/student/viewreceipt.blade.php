@extends('branch.template.branch_master')

@section('content')
<div class="right_col" role="main">
  <div class="row">
      <div class="col-md-12">
          <div class="x_panel">
                <div class="x_title">
                  <h2>All Receipts</h2>
                  <div class="clearfix"></div>
                </div>
                @include('branch.include.error')
                <form action="{{ route('get.breanch.receipt') }}" method="get">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="searchKey">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Search By Money Receipt No</button>
                        </span>
                    </div>
                </form>
        <div class="x_content">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Money Receipt No</th>
                        <th>Student Name</th>
                        <th>Invoice Date</th>
                        <th>Discount</th>
                        <th>Sub Total</th>
                        <th>Grand Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($receipts) && !empty($receipts))
                        @foreach ($receipts as $receipt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $receipt->money_receipt_no }}</td>
                                <td>{{ $receipt->student->name }}</td>
                                <td>{{ $receipt->invoice_date }}</td>
                                <td>{{ number_format($receipt->discount, 2) }}</td>
                                <td>{{ number_format($receipt->sub_total, 2) }}</td>
                                <td>{{ number_format($receipt->grand_total, 2) }}</td>
                                <td><a href="{{ route('branch.get.receipt', $receipt) }}" class="btn btn-primary">View</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>No data Found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $receipts->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection