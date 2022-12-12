<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog - FlexStart Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  

  <!-- Favicons -->
  <link href="assetsx/img/favicon.png" rel="icon">
  <link href="assetsx/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assetsx/vendor/aos/aos.css" rel="stylesheet">
  <link href="assetsx/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assetsx/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assetsx/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assetsx/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assetsx/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assetsx/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.11.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="/">Rentify</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>

          <li><a class="nav-link scrollto" href="tenants">roomates</a></li>
          
          <li><a class="nav-link scrollto" href="/find-rental">Properties</a></li>
         
          @auth
          <li><a class="nav-link scrollto" href="/dashboard" >{{auth()->user()->name}}</a></li>
          @endauth

          @guest
          <li><a class="nav-link scrollto" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign up</a></li>
          @endguest

          @auth
          <li><a class="getstarted scrollto" href="{{ route('logout.perform') }}" >Logout</a></li>
          @endauth

          @guest
          <li><a class="getstarted scrollto" href="{{ route('login.perform') }}" >Sign In</a></li>
          @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      {{-- @auth
        {{auth()->user()->name}}&nbsp;
        <div class="text-end">
          <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
        </div>
      @endauth

      @guest
        <div class="text-end">
          <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
          <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
        </div>
      @endguest --}}
      

    </div>
  </header><!-- End Header -->
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="aboutx" class="aboutx">
        <div class="containerx">
  
          <div class="section-titlex" data-aos="fade-up">
            <h2>Start with finding rentals</h2>
          </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
            @foreach ($properties as $key => $property)
            @if($property->status == "validated")
            <article class="entry"  >

              <div class="entry-img">
                <img src="/image/{{ $property->image }}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">{{$property->name}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">{{$property->city}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"> available from {{$property->availability}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">{{$property->monthlyCost}}.DT</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                    {{$property->description}}
                </p>
                <div class="read-more">
                  <a href="{{url('/details/'.$property->id)}}"> More Details</a>
                </div>
              </div>

            </article><!-- End blog entry -->
            @endif
            @endforeach

            

            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div>

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form method="get" action="{{url('/search')}}">
                    {{ csrf_field() }}
                  <input type="text" name="query" placeholder="Search Rental">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <form method="get" action="{{url('/filter')}}">
                {{ csrf_field() }}
              <div class="sidebar-item categories">
                {{-- <ul>
                  <li><a href="#">General <span>(25)</span></a></li>
                  <li><a href="#">Lifestyle <span>(12)</span></a></li>
                  <li><a href="#">Travel <span>(5)</span></a></li>
                  <li><a href="#">Design <span>(22)</span></a></li>
                  <li><a href="#">Creative <span>(8)</span></a></li>
                  <li><a href="#">Educaion <span>(14)</span></a></li>
                </ul> --}}
                
                    <div class="uk-form-controls">
                      <select name="propertyType"class="form-select" aria-label="Default select example" onchange="this.form.submit()" id="propertyType">
                        <option selected>select property type</option>
                        <option value="flat">Flat</option>
                        <option value="house">House</option>
        
                     </select>
                     
                     
                     
                </form>
              </div><!-- End sidebar categories-->

              
            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assetsx/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assetsx/vendor/aos/aos.js"></script>
  <script src="assetsx/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assetsx/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assetsx/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assetsx/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assetsx/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assetsx/js/main.js"></script>

</body>

</html>