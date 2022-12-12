<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/styleAdmin.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
 
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="<?php echo e(route('home.index')); ?>"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/faces/face.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">
                    <?php if(auth()->guard()->check()): ?>
                    <?php echo e(Auth::user()->name); ?>

                    <?php endif; ?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo e(route('logout.perform')); ?>">
                  
             
                  
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
                  <img src="assets/images/faces/face.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">
                    <?php if(auth()->guard()->check()): ?>
                    <?php echo e(Auth::user()->name); ?>

                    <?php endif; ?></span>
                  <span class="text-secondary text-small">
                    <?php if(auth()->guard()->check()): ?>
                    <?php echo e(Auth::user()->email); ?>

                    <?php endif; ?></span>
                  </span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('home.dashboard')); ?>">
                  <span class="menu-title">Welcome</span>
                  <i class="mdi mdi-home menu-icon"></i>
                </a>
              </li>
            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('users.index')); ?>">
                <span class="menu-title">Users</span>
                <i class="mdi mdi-account-multiple menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('roles.index')); ?>">
                  <span class="menu-title">Roles</span>
                  <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                </a>
              </li>
              <?php endif; ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('properties.index')); ?>">
                  <span class="menu-title">Properties</span>
                  <i class="mdi mdi-home-modern menu-icon"></i>
                </a>
              </li>
              
            <li class="nav-item">
                <a class="nav-link" href="/chatify">
                  <span class="menu-title">Messages</span>
                  <i class="mdi mdi-message-processing menu-icon"></i>
                </a>
              </li>
              <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'landlord')): ?>
            <li class="nav-item">
              <a class="nav-link" href="pages/icons/mdi.html">
                <span class="menu-title">Account settings</span>
                <i class="mdi mdi-account-key menu-icon"></i>
              </a>
            </li>
            <?php endif; ?>

            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'tenant')): ?>
            <li class="nav-item">
              <a class="nav-link" href="pages/icons/mdi.html">
                <span class="menu-title">Account settings</span>
                <i class="mdi mdi-account-key menu-icon"></i>
              </a>
            </li>
            <?php endif; ?>
           
            
           
        </nav>
        
        <!-- partial -->
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
            </div>
            
           
            
            <div class="row">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Users</h4>
                      <div class="add-items d-flex">
                        
                          
                          <form method="get" action="<?php echo e(route('users.create')); ?>">
                            <input type="text" class="form-control todo-list-input" placeholder="search user" name="query">
                              <button class="add btn btn-gradient-primary font-weight-bold " type="submit" >Add</button>
                              </form>
  
                              
                        </div>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th> User </th>
                              <th> E-mail </th>
                              <th> Username </th>
                              <th> Last Update </th>
                              <th> Role </th>
                              <th> Action </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td>
                                  <?php echo e($user->name); ?>

                              </td>
                              <td> 
                                  <?php echo e($user->email); ?>

                              </td>
                              <td> 
                                  <?php echo e($user->username); ?>

                              </td>
                              <td> 
                                  <?php echo e($user->updated_at->diffForHumans()); ?>

                              </td>
                              <td>
                                  
                                  <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="badge badge-gradient-primary"><?php echo e($role->name); ?></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      
                              </td>
                              <td><a href="<?php echo e(route('users.show', $user->id)); ?>" class="btn btn-gradient-warning btn-sm">Show</a></td>
                                <td><a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-gradient-info btn-sm">Edit</a></td>
                                <td>
                                    <?php echo Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']); ?>

                                    <?php echo Form::submit('Delete', ['class' => 'btn btn-gradient-danger btn-sm']); ?>

                                    <?php echo Form::close(); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
  

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->

  </body>
</html><?php /**PATH E:\school\L3DSI\Projet-Integration\projet-l3dsi\rentify\resources\views/users/index.blade.php ENDPATH**/ ?>