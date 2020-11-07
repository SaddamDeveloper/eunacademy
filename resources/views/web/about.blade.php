@extends('web.templete.master')

    @section('seo')
    @endsection

    @section('content')
       <!-- start of page-header -->
        <section class="page-header bg-cover has-overlay" style="background-image: url(assets/images/page-header-01.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="section-title text-white font-weight-bold mb-20">About Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent justify-content-center p-0 font-weight-600 mb-0">
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('web.index')}}">Home</a></li>
                            <li class="breadcrumb-item">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of page-header -->
    
    
        <!-- start of section -->
        <section class="section-padding">
            <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <h2 class="section-title mb-30">Eun Academy, <br> Learn With Us <br>Smart & Easily</h2>
                    <p class="mb-4">EUN ACADEMY offers an inclusive Computer training in starte of Assam. The extensive practical training provided by Computer training institute in field of computer science with live projects and simulations. Such detailed Computer course has helped our students to get practical knowledge and secure job.</p>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0 text-center">
                    <div class="img-line-box">
                        <img class="img-fluid" src="assets/images/online-eu.jpg" alt="">
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- end of section -->
        
        
        <!-- start of section -->
        <section class="bg-gray overflow-hidden">
            <div class="container">
            <div class="no-gutters d-block d-lg-flex align-items-center justify-content-end">
                <div class="col-lg-10 col-12 mb-5 mb-lg-0 text-center">
                    <img class="img-fluid" src="assets/images/admission-open.jpg" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="pl-lg-5 pb-5 mb-5 mb-lg-0 pb-lg-0">
                        <h2 class="section-title mb-30">AIMS & OBJECTIVES</h2>
                        <p class="mb-4 text-justify">
                            EUN means future in Bodo language. This academy will enable professional short term Skill Development/Vocational Training courses like computer education, personality development, entrepreneurship skills development, Spoken English in the Rural and Urban part of North-eastern India. <br>

                            The aims & objectives of this academy is to build skilled human capital by enhancing, stimulating and enriching people of all sections of the society through industry driven and market demand skill which will make them self dependent and promote overall development of the backward Section of Northeast India. <br>
                            
                            EPA aims to develop a complete solutions based on various activities in synchronization with Technology and focus on overall development (Economic, social, Educational, Sustainability) of the people, communities, and areas connected with this Academy. <br>
                            
                            One of the objectives of EPA is to meet the need for skilled and middle-level manpower for the growing sectors of economy, both organized and unorganized. <br>
                            
                            It is mainly aimed to provide Skill Development / Vocational Training in the rural areas to school dropouts, existing workers, unemployed graduates, students and people from all sections of society for helping them in sustaining livelihood. <br>
                            
                            EPA will promote technology in Rural Area of Northeast India through school, colleges and by creating training centres to provide them easy access to learning. <br>
                            
                            EPA aims at promoting entrepreneurship skills in rural area so that youth in rural area do not have to migrate to urban areas searching for work. This will help in development of the rural area and provide employment.</p>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- end of section -->
        
        <!-- end of courses section -->
 
    @endsection

    @section('script') 
    @endsection