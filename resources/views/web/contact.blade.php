@extends('web.templete.master')

    @section('seo')
    @endsection

    @section('content')
    
        <!-- start of page-header -->
        <section class="page-header bg-cover has-overlay" style="background-image: url(assets/images/page-header-02.jpg)">
            <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title text-white font-weight-bold mb-20">Contact</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent justify-content-center p-0 font-weight-600 mb-0">
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('web.index')}}">Home</a></li>
                        <li class="breadcrumb-item">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
            </div>
        </section>
        <!-- end of page-header -->        
        
        <!-- start of contact section -->
        <section class="section-padding bg-gray">
            <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 order-1 order-lg-0">
                    <div class="mb-5">
                        <h2 class="text-secondary font-weight-bold mb-2">Send a Message</h2>
                        <p>Your email address will not be published. <br> Required fields are marked.</p>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success" >{{ Session::get('message') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    {{ Form::open(['method' => 'post','route'=>'web.store.contact']) }}
                        <div class="row">
                        <div class="col-md-6">
                            <div class="mb-30">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control rounded-sm" name="name" value="{{ old('name') }}" id="name" placeholder="Jack Barker">
                                @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-30">
                                <label for="email">Email*</label>
                                <input type="email" class="form-control rounded-sm" name="email" value="{{ old('email') }}" id="email" placeholder="jack@email.com">
                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-30">
                                <label for="sub">Subject</label>
                                <input type="text" class="form-control rounded-sm" id="subject" name="subject" value="{{ old('subject') }}" placeholder="I want to know about course.">
                                @if($errors->has('subject'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-30">
                                <label for="message">Message</label>
                                <textarea class="form-control rounded-sm" id="message" name="message" rows="5">{{ old('message') }}</textarea>
                                @if($errors->has('message'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary rounded-sm">Send Message</button>
                        </div>
                        </div>
                    </form>
                </div>
        
                <div class="col-xl-4 col-lg-5 mb-5 mb-lg-0 order-0 order-lg-1">
                    <div class="mb-5">
                        <h2 class="text-secondary font-weight-bold mb-2">Contact Info</h2>
                        <p>Welcome to our Website. <br> We are glad to have you around.</p>
                    </div>
                    <div class="shadow-sm p-20 mt-4 rounded-sm bg-white d-block d-sm-flex align-items-center">
                        <i class="fas fa-phone fa-2x text-primary"></i>
                        <div class="ml-sm-4 mt-3 mt-sm-0">
                            <h4 class="text-secondary font-weight-600 mb-1">Phone</h4>
                            <p>Phone: <a href="tel:+7800123452" class="text-dark">+780 123 452</a></p>
                        </div>
                    </div>
                    <div class="shadow-sm p-20 mt-4 rounded-sm bg-white d-block d-sm-flex align-items-center">
                        <i class="fas fa-map-marked-alt fa-2x text-primary"></i>
                        <div class="ml-sm-4 mt-3 mt-sm-0">
                            <h4 class="text-secondary font-weight-600 mb-1">Location</h4>
                            <p>Assam</p>
                        </div>
                    </div>
                    <div class="shadow-sm p-20 mt-4 rounded-sm bg-white d-block d-sm-flex align-items-center">
                        <i class="fas fa-envelope fa-2x text-primary"></i>
                        <div class="ml-sm-4 mt-3 mt-sm-0">
                            <h4 class="text-secondary font-weight-600 mb-1">Email</h4>
                            <p>Mail: <a href="mailto:eunproaca@gmail.com" class="text-dark">eunproaca@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of contact section -->

    @endsection

    @section('script') 

    @endsection