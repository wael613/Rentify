<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/assets/css/styleAdmin.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico" />
  </head>
  <body>
 
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="{{ route('home.index') }}"><img src="/assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="/assets/images/faces/face.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">
                    @auth
                    {{Auth::user()->name }}
                    @endauth</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout.perform') }}">
                  
             
                  
                    <button type="submit" class="btn btn-transparent"><i class="mdi mdi-logout me-2 text-primary"></i> Signout</button>
                  
                  
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
           
        
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="/assets/images/faces/face.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">
                    @auth
                    {{Auth::user()->name }}
                    @endauth</span>
                  <span class="text-secondary text-small">
                    @auth
                    {{Auth::user()->email }}
                    @endauth</span>
                  </span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home.dashboard') }}">
                  <span class="menu-title">Welcome</span>
                  <i class="mdi mdi-home menu-icon"></i>
                </a>
              </li>
            @role('admin')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('users.index') }}">
                <span class="menu-title">Users</span>
                <i class="mdi mdi-account-multiple menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('roles.index') }}">
                  <span class="menu-title">Roles</span>
                  <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                </a>
              </li>
              @endrole
              <li class="nav-item">
                <a class="nav-link" href="{{ route('properties.index') }}">
                  <span class="menu-title">Properties</span>
                  <i class="mdi mdi-home-modern menu-icon"></i>
                </a>
              </li>
              @role('landlord')
            <li class="nav-item">
                <a class="nav-link" href="pages/charts/chartjs.html">
                  <span class="menu-title">Messages</span>
                  <i class="mdi mdi-message-processing menu-icon"></i>
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/icons/mdi.html">
                <span class="menu-title">Account settings</span>
                <i class="mdi mdi-account-key menu-icon"></i>
              </a>
            </li>
            @endrole

            <li class="nav-item">
              <a class="nav-link" href="/chatify">
                <span class="menu-title">Messages</span>
                <i class="mdi mdi-message-processing menu-icon"></i>
              </a>
            </li>
            
            
        </nav>
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Add Property
              </h3>
            </div>

            <div class="">
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Add new Property</h4>
                      <p class="card-description"> Fill in the form </p>
                      <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{ route('properties.store') }}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputUsername1">Name</label>
                          <input value="{{ old('name') }}" name="name"   type="text" class="form-control" id="exampleInputUsername1" placeholder="Name" required>
                          @if ($errors->has('name'))
                          <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                      @endif
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Address</label>
                          <input value="{{ old('address') }}" name="address" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
                          @if ($errors->has('address'))
                          <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                      @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">City</label>
                            <input value="{{ old('city') }}"  type="text" class="form-control" id="exampleInputUsername1" placeholder="Name" name="city" required>
                            @if ($errors->has('city'))
                            <span class="text-danger text-left">{{ $errors->first('city') }}</span>
                        @endif
                          </div>
                        
                          <div class="form-group">
                            <label for="exampleInputUsername1">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                        @endif
                          </div>

                          <div class="form-group">
                            <label for="exampleInputUsername1">Monthly Cost</label>
                            <input value="{{ old('monthlyCost') }}"  type="number" class="form-control" id="exampleInputUsername1" placeholder="Name" name="monthlyCost" required>
                            @if ($errors->has('monthlyCost'))
                            <span class="text-danger text-left">{{ $errors->first('monthlyCost') }}</span>
                        @endif
                          </div>

                        <div class="form-group">
                        <label for="exampleInputUsername1">Property Type</label>
                        <select name="propertyType" class="form-control" id="propertyType">

                            <option value="house">House</option>
                            <option value="flat">Flat</option>
                            
                          </select>
                    
    
                        @if ($errors->has('propertyType'))
                            <span class="text-danger text-left">{{ $errors->first('propertyType') }}</span>
                        @endif

                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Furnish Type</label>
                            <select name="furnishType" class="form-control" id="furnishType">

                                <option value="furnished">Furnished</option>
                                <option value="unfurnished">Unfurnished</option>
                                
                              </select>
                        
        
                            @if ($errors->has('furnishType'))
                                <span class="text-danger text-left">{{ $errors->first('furnishType') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputUsername1">Let Type</label>
                            <select name="letType" class="form-control" id="letType">

                                <option value="longTerm">Long Term</option>
                                <option value="shortTerm"> Short Term</option>
                                
                              </select>
                        
        
                            @if ($errors->has('letType'))
                                <span class="text-danger text-left">{{ $errors->first('letType') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputUsername1">Available from</label>
                            <input value="{{ old('availability') }}" 
                            type="date" 
                            class="form-control" 
                            name="availability" 
                            placeholder="dd/mm/yyyy" required>

                            @if ($errors->has('availability'))
                                <span class="text-danger text-left">{{ $errors->first('availability') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Bedrooms</label>
                                <input value="{{ old('rooms') }}" 
                        type="number" 
                        class="form-control" 
                        name="rooms" required>

                    @if ($errors->has('rooms'))
                        <span class="text-danger text-left">{{ $errors->first('rooms') }}</span>
                    @endif

                        </div>

                        
                        <div class="form-group">
                            <label for="exampleInputUsername1">Bathrooms</label>
                            <input value="{{ old('baths') }}" 
                            type="number" 
                            class="form-control" 
                            name="baths" required>
    
                        @if ($errors->has('baths'))
                            <span class="text-danger text-left">{{ $errors->first('baths') }}</span>
                        @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputUsername1">Options</label>

                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="options[]" value="bills"> Bills Included</label>
                      
                      
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input " name="options[]" value="washer" > Washer </label>
                    
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="options[]" value="parking" > Parking </label>
                    
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="options[]" value="ac" > AC</label>
                      
                        </div>

                        <div class="form-group">
                          <label for="exampleInputUsername1">Image</label>
                          <input value="{{ old('image') }}" 
                          type="file" 
                          class="form-control" 
                          name="image" required>
  
                      @if ($errors->has('image'))
                          <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                      @endif
                      </div>

                       
                        {{-- <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputConfirmPassword1">Confirm Password</label>
                          <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                        </div>
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"> Remember me </label>
                        </div> --}}
                        <button type="submit" class="btn btn-gradient-primary me-2">Save Property</button>
                        <button href="{{ route('properties.index') }}" class="btn btn-light">Back</button>
                      </form>
                    </div>
                  </div>
                </div>
                
                </div>
            
           

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/assets/js/off-canvas.js"></script>
    <script src="/assets/js/hoverable-collapse.js"></script>
    <script src="/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/assets/js/dashboard.js"></script>
    <script src="/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->

  </body>
</html>