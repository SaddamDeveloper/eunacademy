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
                        <li class="breadcrumb-item active" aria-current="page"><a href="index.html">Home</a></li>
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
                    <form action="#">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="mb-30">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control rounded-sm" id="name" placeholder="Jack Barker">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-30">
                                <label for="email">Email*</label>
                                <input type="email" class="form-control rounded-sm" id="email" placeholder="jack@email.com">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-30">
                                <label for="sub">Subject</label>
                                <input type="text" class="form-control rounded-sm" id="sub" placeholder="I want to know about course.">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-30">
                                <label for="message">Message</label>
                                <textarea class="form-control rounded-sm" id="message" rows="5"></textarea>
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
                        <h4 class="text-secondary font-weight-600 mb-1">Contact Details</h4>
                        <p>Phone: <a href="tel:+7800123452" class="text-dark">+780 123 452</a></p>
                        <p>Mail: <a href="mailto:contact@eduskill.com" class="text-dark">contact@eduskill.com</a></p>
                        </div>
                    </div>
                    <div class="shadow-sm p-20 mt-4 rounded-sm bg-white d-block d-sm-flex align-items-center">
                        <i class="fas fa-map-marked-alt fa-2x text-primary"></i>
                        <div class="ml-sm-4 mt-3 mt-sm-0">
                        <h4 class="text-secondary font-weight-600 mb-1">Location</h4>
                        <p>PO Box 97845 Baker st. 567, Los Angeles, California, US.</p>
                        </div>
                    </div>
                    <div class="shadow-sm p-20 mt-4 rounded-sm bg-white d-block d-sm-flex align-items-center">
                        <i class="fas fa-user-clock fa-2x text-primary"></i>
                        <div class="ml-sm-4 mt-3 mt-sm-0">
                        <h4 class="text-secondary font-weight-600 mb-1">Opening Hours</h4>
                        <p>Monday-Friday</p>
                        <p>10:30a.m-7:00p.m</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- end of contact section -->

    @endsection

    @section('script') 

    @endsection