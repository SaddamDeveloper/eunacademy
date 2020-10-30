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
                        <div class="col-lg-9 mt-5 mt-lg-0">
                        <h4>Student Profile</h4>
                        <div class="border-top mt-20">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="media mt-25 align-items-center">
                                    <div class="">
                                        <p>Student Name</p>
                                        <h5 class="font-weight-600 text-blue">Vishal Nag</h5>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="media mt-25 align-items-center">
                                    <div class="">
                                        <p>Registration Number</p>
                                        <h5 class="font-weight-600 text-blue">2020GHY00151</h5>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="media mt-25 align-items-center">
                                    <div class="">
                                        <p>Student Father Name</p>
                                        <h5 class="font-weight-600 text-blue">Ranjit Nag</h5>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="media mt-25 align-items-center">
                                    <div class="">
                                        <p>Course opt</p>
                                        <h5 class="font-weight-600 text-blue">Advanced Diploma in Computer Application</h5>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="media mt-25 align-items-center">
                                    <div class="">
                                        <p>DOB</p>
                                        <h5 class="font-weight-600 text-blue">04/08/1994</h5>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="media mt-25 align-items-center">
                                    <div class="">
                                        <p>Contact Number</p>
                                        <h5 class="font-weight-600 text-blue">+91 545854854</h5>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="media mt-25 align-items-center">
                                    <div class="">
                                        <p>Session</p>
                                        <h5 class="font-weight-600 text-blue">2020 - 2021</h5>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-3 mt-5 mt-lg-0">
                        <div class="image-block">
                            <div class="row">
                                <div class="col-md-5 col-6 offset-1 p-0">
                                    <img class="img-fluid" src="assets/images/student.jpg" alt="">
                                </div>
                                <div class="col-md-5 col-6 p-0">
                                    <img class="img-fluid" src="assets/images/qr-code.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="job-meta sign mt-3">
                            <img class="img-fluid" src="assets/images/sign.jpg" alt="">
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of job-board section -->
 
    @endsection

    @section('script') 

    @endsection