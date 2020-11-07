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
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('web.index')}}">Home</a></li>
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
                        @forelse ($galleries ?:[] as $gallery)
                            <div class="col-md-3">
                                <a class="example-image-link" href="{{ asset('admin/gallery/'.$gallery->photo) }}" data-lightbox="example-set"><img class="example-image img-fluid" src="{{ asset('admin/gallery/'.$gallery->photo) }}" alt=""/></a>
                            </div>
                            @empty
                            <div class="col-md-12 text-center">
                                <h3 style="margin: 0 0px 40px;">No Gallery Yet!</h3>
                            </div>
                        @endforelse
                        {{ $galleries->links() }}
                    </div>
                </div>
            </div>
        </section>
        <!-- end of job-board section --> 

    @endsection

    @section('script') 

    @endsection