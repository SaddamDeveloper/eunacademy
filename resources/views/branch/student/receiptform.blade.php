@extends('branch.template.branch_master')

@section('content')

<div class="right_col" id="invoice">
  <div class="row">

    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Money Receipt Form</h2>
            <div class="clearfix"></div>
        </div>
        @include('branch.include.error')
        <div class="x_content">
            <div class="well" style="overflow: auto">
                <div class="panel-body">
                    @include('branch.student.form')
                </div>
            </div>
            <div class="panel-footer">
                <div class="pull-right mb-10">
                    <a href="{{route('branch.list.student')}}" class="btn btn-default">Cancel</a>&nbsp;
                    <button class="btn btn-success pull-right" @click="create" :disabled="isProcessing">CREATE</button>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
    <script src="{{asset('js/vue.min.js')}}"></script>
    <script src="{{asset('js/vue-resource.min.js')}}"></script>
    <script type="text/javascript">
        Vue.http.headers.common['X-CSRF-TOKEN'] = '{{csrf_token()}}';
        window._form = {
            discount: 0,
            student_id: `{{$student->id}}`,
            products: [{
                name: '',
                price: 0,
                qty: 1
            }]
        };
    </script>
    <script src="{{asset('js/custom.js')}}"></script>
@endpush