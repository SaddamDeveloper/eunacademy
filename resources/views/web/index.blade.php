@extends('web.templete.master')

    @section('seo')
    @endsection

    @section('content')
        <!-- start of banner -->
        <section class="banner-1 has-overlay bg-cover" style="background-image: url(assets/images/banner-image-00.jpg);">
            <div class="container-lg">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 col-sm-8 text-center text-md-left">
                    <div class="text-white">
                        <h2 class="text-lg mb-30">Find The <span class="has-line line-primary">Perfect Tutor</span> for Online & Offline</h2>
                        <p class="h4">Education now more easy then before</p>
                        
                    </div>
                </div>
                <div class="col-md-6 col-sm-10 mt-5 mt-md-0"></div>
            </div>
            </div>
        </section>
        <!-- end of banner -->
        
        <!-- start of video-popup section -->
        <section class="section-padding pt-0 bg-light has-white-half">
            <h3 class="light-bg-text d-none">EUN ACADEMY</h3>
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="text-center">
                        <a href="https://www.youtube.com/watch?v=yD7b6R0-LQw" class="d-block">
                        <img class="img-fluid rounded about-index" src="assets/images/about-index.png" alt="">
                        </a>
                        <h2 class="section-title mt-50 mb-25">What  Some Awesome Parent Says <span class="has-line">About Us</span></h2>
                        <p class="mb-40"><strong>EUN ACADEMY</strong> offers an inclusive Computer training in starte of Assam. The extensive practical training provided by Computer training institute in field of computer science with live projects and simulations. Such detailed Computer course has helped our students to get practical knowledge and secure job.</p>
                        <a href="#!" class="btn btn-lg btn-secondary rounded-pill">Read More...</a>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- end of video-popup section -->
        
        <!-- start of we-offer-section -->
        <section class="section-padding" id="course">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <h2 class="section-title">What <span class="has-line">We Offer</span></h2>
                </div>
            </div>      
            <div class="owl-carousel tutors-carousel-alt has-dots-center">
                <div class="tutor-item-alt">
                    <div class="card shadow-sm mt-40">
                        <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="media d-block">
                                <div class="mt-3">
                                    <h4 class="font-weight-600 text-blue mb-1">Business Computer Application </h4>
                                    <p>(BCA)</p>
                                </div>
                            </div>
                            <div class="text-primary text-center course-item">
                                <span class="h2 d-block font-weight-bold line-hight-1">3</span>
                                <span class="h4">months</span>
                            </div>
                        </div>
                        <ul class="list-inline my-4 pt-3 pb-4 border-top border-bottom">
                            <li class="list-inline-item line-clamp-4 p-2 bg-gray rounded mt-2" id="course1">Computer Fundamentals of Software & Hardware MS-DOS, Handling Windows, MS Office, Internet Browsing, Downloading & E-mail Handling.</li>
                            <li class="full-op"><a  href="#!"  data-toggle="modal" data-target="#signup-modal1">see more</a></li>
                        </ul>
        
                        <a href="#!" class="btn btn-outline-primary rounded-pill">Book Class</a>
                        </div>
                    </div>
                </div>
                <div class="tutor-item-alt">
                    <div class="card shadow-sm mt-40">
                        <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="media d-block">
                                <div class="mt-3">
                                    <h4 class="font-weight-600 text-blue mb-1">Diploma in Computer Application </h4>
                                    <p>(DCA)</p>
                                </div>
                            </div>
                            <div class="text-primary text-center course-item">
                                <span class="h2 d-block font-weight-bold line-hight-1">6</span>
                                <span class="h4">months</span>
                            </div>
                        </div>
                        <ul class="list-inline my-4 pt-3 pb-4 border-top border-bottom">
                            <li class="list-inline-item line-clamp-4 p-2 bg-gray rounded mt-2" id="course2">Computer Fundamentals of Software & Hardware MS-DOS, Handling Windows, MS Office, Internet Browsing, Downloading & E-mail Handling, Financial Accounting, Tally. DTP. Photoshop. Bilinguals Package (Assames, Bengali, Hindi, Bodo etc.)</li>
                            <li class="full-op"><a  href="#!"  data-toggle="modal" data-target="#signup-modal2">see more</a></li>
                        </ul>
        
                        <a href="#!" class="btn btn-outline-primary rounded-pill">Book Class</a>
                        </div>
                    </div>
                </div>
                <div class="tutor-item-alt">
                    <div class="card shadow-sm mt-40">
                        <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="media d-block">
                                <div class="mt-3">
                                    <h4 class="font-weight-600 text-blue mb-1">Advanced Diploma in Computer Application </h4>
                                    <p>(ADCA)</p>
                                </div>
                            </div>
                            <div class="text-primary text-center course-item">
                                <span class="h2 d-block font-weight-bold line-hight-1">12</span>
                                <span class="h4">months</span>
                            </div>
                        </div>
                        <ul class="list-inline my-4 pt-3 pb-4 border-top border-bottom">
                            <li class="list-inline-item line-clamp-4 p-2 bg-gray rounded mt-2" id="course3">Computer Fundamentals of Software & Hardware MS-DOS, Handling Windows, MS Office, Internet Browsing, Downloading & E-mail Handling, Financial Accounting, Tally. DTP. Photoshop. Bilinguals Package (Assames, Bengali, Hindi, Bodo etc.) Concept on Multimedia an E-commerce. Web Page Designing (HTML, DHTML & front page), Fundamentals of Java, Java Script, Programming in “C” & “C++”.</li>
                            <li class="full-op"><a  href="#!"  data-toggle="modal" data-target="#signup-modal3">see more</a></li>
                        </ul>
        
                        <a href="#!" class="btn btn-outline-primary rounded-pill">Book Class</a>
                        </div>
                    </div>
                </div>
                <div class="tutor-item-alt">
                    <div class="card shadow-sm mt-40">
                        <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="media d-block">
                                <div class="mt-3">
                                    <h4 class="font-weight-600 text-blue mb-1">P.G Diploma In Computer Application </h4>
                                    <p>(PGDCA)</p>
                                </div>
                            </div>
                            <div class="text-primary text-center course-item">
                                <span class="h2 d-block font-weight-bold line-hight-1">12</span>
                                <span class="h4">months</span>
                            </div>
                        </div>
                        <ul class="list-inline my-4 pt-3 pb-4 border-top border-bottom">
                            <li class="list-inline-item line-clamp-4 p-2 bg-gray rounded mt-2" id="course4">Computer Fundamentals of Software & Hardware MS-DOS, Handling Windows, MS Office, Internet Browsing, Downloading & E-mail Handling, Financial Accounting, Tally. DTP. Photoshop. Bilinguals Package (Assames, Bengali, Hindi, Bodo etc.) Concept on Multimedia an E-commerce. Web Page Designing (HTML, DHTML & front page), Fundamentals of Java, Java Script, Programming in “C” & “C++”, DBMS, Faculty Training.</li>
                            <li class="full-op"><a  href="#!"  data-toggle="modal" data-target="#signup-modal4">see more</a></li>
                        </ul>
        
                        <a href="#!" class="btn btn-outline-primary rounded-pill">Book Class</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- end of we-offer-section -->
        
        <!-- start of counter -->
        <section class="overflow-hidden">
            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pt-60 pb-30 counter-section text-white text-center">
                        <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
                            <h2 class="h1 font-weight-600 mb-2 text-primary jsCounter">9456</h2>
                            <p class="h5 font-weight-600">Active People</p>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
                            <h2 class="h1 font-weight-600 mb-2 text-primary jsCounter">154</h2>
                            <p class="h5 font-weight-600">Award Winning</p>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
                            <h2 class="h1 font-weight-600 mb-2 text-primary jsCounter">2563</h2>
                            <p class="h5 font-weight-600">Active Coach</p>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
                            <h2 class="h1 font-weight-600 mb-2 text-primary jsCounter">2817</h2>
                            <p class="h5 font-weight-600">Certify People</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- end of counter -->
        
        <!-- start of how-it-works section -->
        <section class="section-padding">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title">How <span class="has-line">It Works</span></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6 mt-40">
                    <div class="how-it-works-item text-center shadow">
                        <img src="assets/images/how-it-works/01.png" alt="">
                        <h3 class="mt-20 font-weight-600 text-secondary">Tell Us Where You <br> Need Help</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt-40">
                    <div class="how-it-works-item text-center shadow">
                        <img src="assets/images/how-it-works/02.png" alt="">
                        <h3 class="mt-20 font-weight-600 text-secondary">Choose The Tutor <br> You Want</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt-40">
                    <div class="how-it-works-item text-center shadow">
                        <img src="assets/images/how-it-works/03.png" alt="">
                        <h3 class="mt-20 font-weight-600 text-secondary">Book A Tutor <br> Start Lesson</h3>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- end of how-it-works section -->
        
        <!-- start of section -->
        <section class="section-padding pt-0">
            <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 text-center">
                    <img class="img-fluid" src="assets/images/free-class.png" alt="">
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0">
                    <h2 class="section-title mb-30">Book A Class <span class="has-line">Be Professional</span></h2>
                    <p class="mb-4">Weddings and any opinions suitable smallest nay. My he houses or months settle remove ladies appear. Engrossed suffering supposing he recommend. Commanded no of depending extremity recommend attention tolerably.</p>
                    <a href="#!" class="btn btn-lg btn-secondary rounded-pill">Get in Touch</a>
                </div>
            </div>
            </div>
        </section>
        <!-- end of section -->
 
    @endsection

    @section('script') 

    @endsection