<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>{{ config('app.name') }}</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- ** Plugins Needed for the Project ** -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-nice-select/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/OwlCarousel2/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/magnific-popup/css/magnific-popup.css') }}">

  <!-- Main Stylesheet -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/lightbox.min.css') }}" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
  @stack('css')
</head>

<body id="top">

  <!-- start of preloader -->
  <div class="preloader"></div>
  <!-- end of preloader -->
  
   <!-- signup-modal -->
   <div class="modal fade rounded" id="modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div id="alert"></div>
            <div class="modal-header" id="header">
               
            </div>
               <div class="modal-body p-3 p-sm-4">
                  <h6 class="mb-20" id="description"></h6>
                  <form method="POST" class="row" id="form-submit" name="form-submit">
                     <div class="form-group mb-20 col-12">
                           <label class="text-secondary h6 mb-2" for="fname">Your Name*</label>
                           <input class="form-control shadow-none rounded-sm" name="name" type="text" placeholder="Jack" id="name" >
                     </div>
                     <div class="form-group mb-20 col-6">
                           <label class="text-secondary h6 mb-2" for="pnumber">Phone Number*</label>
                           <input class="form-control shadow-none rounded-sm" type="number" placeholder="Phone Number" id="mobile" name="mobile">
                     </div>
                     <div class="form-group mb-20 col-6">
                           <label class="text-secondary h6 mb-2" for="email2">Email Address*</label>
                           <input class="form-control shadow-none rounded-sm" type="email" placeholder="jack@email.com" id="email" name="email">
                     </div>
                     <div class="form-group col-12">
                           <button class="btn btn-primary w-100 rounded-sm">Book Class</button>
                     </div>
                  </form>
               </div>
         </div>
      </div>
   </div>
   <!-- signup-modal -->
  
<header class="bg-white shadow">
   <div class="container-lg">
      <nav class="navbar navbar-expand-xl navbar-dark px-0">
         <a class="navbar-brand" href="{{ route('web.index') }}">
            <img src="{{asset('assets/images/logo-2.png')}}" alt="" style="height:49px">
         </a>

         <button class="navbar-toggler ml-3" type="button" data-toggle="collapse" data-target="#navbarNavAlt" aria-controls="navbarNavAlt" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
         </button>
         
         <div class="collapse navbar-collapse" id="navbarNavAlt">
            <ul class="navbar-nav mt-4 mt-xl-0 ml-auto">
               <li class="nav-item"> <a class="nav-link" href="{{route('web.index')}}"> Home </a><li>
               <li class="nav-item dropdown"> <a class="nav-link"  href="{{route('web.about')}}"> About</a></li>
               <li class="nav-item">
                  @if (\Request::path() == '/')                      
                  <a class="nav-link" href="#course">Courses</a>
                  @else                      
                  <a class="nav-link" href="{{route('web.index')}}#course">Courses</a>
                  @endif
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{route('web.gallery')}}">Gallery</a>
               </li>              

               <li class="nav-item">
                  <a class="nav-link" href="{{route('web.student-corner')}}">Student Corner</a>
               </li>                
               <li class="nav-item">
                  <a class="nav-link" href="{{route('web.contact')}}">Contact Us</a>
               </li>
            </ul>

            <div class="ml-0 ml-xl-4 mt-3 mt-xl-0 mb-3 mb-xl-0 text-center text-xl-right">
               <a href="{{ route('branch.login') }}" class="btn btn-sm btn-blue rounded-pill" >Branch Login</a>
            </div>
         </div>
      </nav>
   </div>
</header>