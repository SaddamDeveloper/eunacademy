@extends('admin.template.admin_master')
@section('content')
<div class="right_col" role="main">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{ $contact->subject }}</h2>
            <button class="btn btn-danger pull-right" onclick="window.close()">X</button>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <p>
                {{ $contact->message }}
            </p>
        </div>
    </div>
</div>
@endsection
