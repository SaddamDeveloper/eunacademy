@extends('web.templete.master')

    @section('seo')
    @endsection

    @section('content')
    
        <!-- start of page-header -->
        <section class="page-header bg-cover has-overlay" style="background-image: url(assets/images/page-header-02.jpg)">
            <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title text-white font-weight-bold mb-20">Gallery</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent justify-content-center p-0 font-weight-600 mb-0">
                        <li class="breadcrumb-item active" aria-current="page"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Gallery</li>
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
                <div class="p-30 mb-35 bg-grey shadow rounded gallery">
                    <div class="row">
                        <div class="col-md-3">
                        <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" data-lightbox="example-set"><img class="example-image img-fluid" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-3.jpg" alt=""/></a>
                        </div>
                        <div class="col-md-3">
                        <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-4.jpg" data-lightbox="example-set"><img class="example-image img-fluid" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-4.jpg" alt="" /></a>
                        </div>
                        <div class="col-md-3">
                            <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-5.jpg" data-lightbox="example-set"><img class="example-image img-fluid" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-3.jpg" alt="" /></a>
                        </div>
                        <div class="col-md-3">
                        <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-6.jpg" data-lightbox="example-set"><img class="example-image img-fluid" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-4.jpg" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of job-board section --> 

    @endsection

    @section('script') 

    @endsection