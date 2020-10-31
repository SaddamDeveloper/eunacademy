@extends('web.templete.master')

    @section('seo')
    @endsection

    @section('content')
    
        <!-- start of page-header -->
        <section class="page-header bg-cover has-overlay" style="background-image: url(assets/images/page-header-02.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="section-title text-white font-weight-bold mb-20">Student Profile</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent justify-content-center p-0 font-weight-600 mb-0">
                            <li class="breadcrumb-item active" aria-current="page"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item">Student Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of page-header -->
        
        
        <!-- start of job-board section -->
        <section class="section-padding bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="p-30 mb-35 bg-light shadow rounded row">
                        <div class="col-lg-12 mt-5 mt-lg-0">
                            <h4>Search Student Profile</h4>
                            <div class="border-top mt-20">
                                <form method="POST" class="row" id="form-submit">
                                    @csrf
                                    <div class="form-group mb-20 col-12">
                                        <label class="text-secondary h6 font-weight-600 mb-2" for="email">Student ID*</label>
                                        <input class="form-control shadow-none rounded-sm" type="text" id="id" name="id" required>
                                    </div>
                                    <div class="form-group col-12">
                                        <button class="btn btn-primary w-100 rounded-sm" id="search" type="submit"><div id="spinner">Search</div></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="profile">
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- end of job-board section -->
 
    @endsection

    @section('script') 
        <script>
            $(function () {
                $(document).on('submit', '#form-submit', function(e){
                    e.preventDefault();
                    $('#spinner').html(`<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>`);
                    var data = $(this).serializeArray();
                    $.ajaxSetup({
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                   });
                   $.ajax({
                       url: "{{route('web.ajax.searchstudent')}}",
                       method: "POST",
                       data: data,
                       beforeSend: function() {
                            $("#loading-image").show();
                        },
                       success: function(response){
                        var html = '';
                        if(response == 1)
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Student not found!'
                            });
                            $("#profile").html('');
                            $("#loading-image").hide();
                            $('#spinner').html('Search');
                        }else{
                            $("#profile").html(response);
                            $("#loading-image").hide();
                            $('#spinner').html('Search');
                        }
                       }
                   });
               });
            });
        </script>
    @endsection