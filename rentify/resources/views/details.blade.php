<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog Single - FlexStart Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <style>
    .sidenav {
  width: 300px;
  position: fixed;
  z-index: 1;
  top: 20px;
  left: 950px;
  background: #eee;
  overflow-x: hidden;
  padding: 8px 0;
}
  </style>

  <!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.14.1/dist/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.14.1/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.14.1/dist/js/uikit-icons.min.js"></script>

  <!-- Favicons -->
  <link href="../assetsx/img/favicon.png" rel="icon">
  <link href="../assetsx/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assetsx/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assetsx/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assetsx/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assetsx/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assetsx/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assetsx/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assetsx/css/style.css" rel="stylesheet">


  <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
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
        <h1><a href="index.html">Rentify</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          
          <li><a class="nav-link scrollto" href="/find-rental">Properties</a></li>
          <li><a class="nav-link scrollto" href="tenants">roomates</a></li>
         
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
          <h2>Details</h2>
        </div>

    </div>
  </section><!-- End Breadcrumbs -->


    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

                <div class="entry-img">
                    <img src="/assetsx/img/blog/blog-1.jpg" width="900">
                  </div>

              <h2 class="entry-title">
                <a href="blog-single.html">{{ $property->name }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-geo-alt"></i> {{ $property->address }}</li>
                  <li class="d-flex align-items-center"><i class="bi bi-telephone"></i> {{ $property->city }}</li>
                  @if( $property->propertyType=='flat')
                  <li class="d-flex align-items-center"><i class="bi bi-building"></i> Flat</li>
                  @else
                  <li class="d-flex align-items-center"><i class="bi bi-building"></i> House</li>
                  @endif
                  
                </ul>
              </div>

              <div class="entry-content">
                <p>
                    {{ $property->description }}
                </p>

              </div>

              <div class="entry-footer">
                @foreach($property->options as $value)
                    @if($value=='washer')
                    <i class="bi bi-wifi"></i>
                    <ul class="cats">                  
                    <li><a href="#">Washer</a></li>                   
                    </ul>
                    @endif

                    @if($value=='bills')
                    <i class="bi bi-cup-straw"></i>
                    <ul class="cats">                  
                      <li><a href="#">Bills</a></li>                   
                    </ul>
                    @endif
                    
                    @if($value=='ac')
                    <i class="bi bi-printer"></i>
                    <ul class="cats">                  
                      <li><a href="#">AC</a></li>                   
                    </ul>
                    @endif

                    @if($value=='parking')
                    <i class="bi bi-distribute-horizontal"></i>
                    <ul class="cats">                  
                      <li><a href="#">Parking</a></li>                   
                    </ul>
                    @endif

                @endforeach
              </div>
              
              <div class="entry-content">
               
                <div class="read-more">
                  <a href="/chatify/{{$property->user_id}}">Contact</a>
                  
                </div>
              </div>
              <div class="entry-content">
                
                <div class="read-more">
                  
        
                  
                </div>
              </div>

            </article><!-- End blog entry -->

            </div><!-- End blog author bio -->

           
          </div><!-- End blog entries list -->
          
          
        </div>

      </div>
    </section><!-- End Blog Single Section -->

    

<div id="modal-overflow" uk-modal>
    <div class="uk-modal-dialog">
      <form method="post" class="uk-form-stacked" action="">

        {{ csrf_field() }}




        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Book Now</h2>
        </div>


        <div class="uk-modal-body" uk-overflow-auto>
          
          
          
            <div class="uk-margin">
              <label for="name" class="uk-form-label">Name</label>
              <div class="uk-form-controls">
              <input type="text" name="name"class="uk-input" id="name" placeholder="Your Name">
              </div>
            </div>
            
            <div class="uk-margin">
              <label for="email" class="uk-form-label">Email</label>
              <div class="uk-form-controls">
              <input type="text" name="email" class="uk-input" id="address" placeholder="Your Email">
              </div>
            </div>
            <div class="uk-margin">
              <label for="phoneNumber" class="uk-form-label">Phone Number</label>
              <div class="uk-form-controls">
              <input type="text" name="phoneNumber" class="uk-input" id="phoneNumber" placeholder="Your Phone Number">
              </div>
            </div>
            
            <div class="uk-margin">
              <label for="spots" class="uk-form-label"> Number of seats</label>
              <div class="uk-form-controls">
              <input type="date" class="uk-input" name="date" placeholder="Date" required>
              </div>
            </div>
            <div class="uk-margin">
              <label for="spots" class="uk-form-label"> Number of seats</label>
              <div class="uk-form-controls">
              <input type="text" name="spots" class="uk-input" id="spots" placeholder="">
              </div>
            </div>
            
            <div class="uk-margin">
              <label for="spaceID" class="uk-form-label"> Work Space ID</label>
              <div class="uk-form-controls">
              <input type="text" name="spaceID" class="uk-input" id="spaceID" value="{{ $property->id }}" placeholder="">
              </div>
            </div>            
            
          
            
          
          

        </div>

        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="submit">Send</button>
        </div>
      </form>

    </div>
</div>



  </main><!-- End #main -->

  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assetsx/vendor/purecounter/purecounter.js"></script>
  <script src="../assetsx/vendor/aos/aos.js"></script>
  <script src="../assetsx/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assetsx/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assetsx/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assetsx/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assetsx/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assetsx/js/main.js"></script>

</body>

</html>



