<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('bootstrap-select-1.13.0-beta/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('jquery-minicolors-master/jquery.minicolors.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/chartist/chartist.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />


    <style>
        .content-message{
            position: fixed;
            z-index: 100; /*Crea una capa nueva por encima, si tenemos una con valor 2 estará a una altura o por encima de una con 
                            valor 1*/
            margin-left:50%; /*Con este margen posicionamos el div donde queramos*/
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="{{ url('/admin') }}">
            <img src="{{ asset('images/logo.svg') }}" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="{{ url('/admin') }}"><img src="{{ asset('images/logo-mini.png') }}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">{{ __('Welcome NeoWise dashboard!') }}</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <form class="search-form d-none d-md-block" action="#">
              <i class="icon-magnifier"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-basket-loaded"></i></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chart"></i></a></li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="icon-speech"></i>
                <span class="count">7</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                  <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{ asset('images/faces/face10.jpg') }}" alt="image" class="img-sm profile-pic"> </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{ asset('images/faces/face12.jpg') }}" alt="image" class="img-sm profile-pic"> </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{ asset('images/faces/face1.jpg') }}" alt="image" class="img-sm profile-pic"> </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown language-dropdown d-none d-sm-flex align-items-center">
              <a class="nav-link d-flex align-items-center dropdown-toggle" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="d-inline-flex mr-3">
                <i class="flag-icon flag-icon-{{ App::getLocale() }}"></i>
                </div>
                <span class="profile-text font-weight-normal">{{ __('language') }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
              <a class="dropdown-item" onclick="changeLanguage('{{ url('') }}','en')">
                  <i class="flag-icon flag-icon-us" ></i> {{ __('English') }} </a>
                <a class="dropdown-item" onclick="changeLanguage('{{ url('') }}','cr')">
                  <i class="flag-icon flag-icon-cr"  ></i> {{ __('spanish') }} </a>
              </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src='<?php 
                                if( \Storage::disk('public')->exists(\Auth::user()->avatar)  ){ 
                                    echo \Storage::url(\Auth::user()->avatar);
                                }else if(\Auth::user()->social_type != null)
                                {
                                    echo \Auth::user()->avatar;
                                } else {
                                    echo (\Storage::url("default.jpg"));
                                } 
                  ?>' alt="Profile image"> <span class="font-weight-normal">{{ Auth::user()->name }}</span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src='<?php 
                                if( \Storage::disk('public')->exists(\Auth::user()->avatar)  ){ 
                                    echo \Storage::url(\Auth::user()->avatar);
                                }else if(\Auth::user()->social_type != null)
                                {
                                    echo \Auth::user()->avatar;
                                } else {
                                    echo (\Storage::url("default.jpg"));
                                } 
                  ?>' style="height: auto;width: 113px;" alt="Profile image">
                  <p class="mb-1 mt-3">{{ Auth::user()->name }}</p>
                  <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
                <a class="dropdown-item" href="{{ route('view_profile') }}"><i class="dropdown-item-icon icon-user text-primary"></i> {{ __('My Profile') }} <span class="badge badge-pill badge-danger">1</span></a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-speech text-primary"></i> {{ __('Messages') }}</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-energy text-primary"></i> {{ __('Activity') }}</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-question text-primary"></i> {{ __('FAQ') }}</a>
                <a onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>{{ __('Sign Out') }}</a>
              </div>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
  
        <!-- partial -->
    
       
          <div class="toast content-message" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body">
            </div>
          </div>
            @if (Session::has('flash_message'))
            <div class="container">
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_message') }}
              </div>
            </div>
            @endif
                @yield('content')
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->

          <!-- partial -->
        
        <!-- main-panel ends -->
      </div>
<style>
  .modal-dialog-full-width {
    max-width: 100%;
    /* width: 90%; */
    /* margin: 0; */
    top: -100px;
    bottom: 50px;
    left: 35px;
    right: 25px;
    height: 100vh;
    /* display: flex; */
    position: fixed;
    z-index: 100000;
  }
  .modal-content-full-width  {
      height: 100% !important;
      min-height: 100% !important;
      border-radius: 0 !important;
      background-color: #ececec !important 
  }
  .modal-header-full-width  {
      border-bottom: 1px solid #9ea2a2 !important;
  }
  .modal-footer-full-width  {
      border-top: 1px solid #9ea2a2 !important;
  }
  .modal-body-full-height {
    min-height: 80%!important;
  }
  .my-custom-scrollbar {
  position: relative;
  height: 200px;
  overflow: auto;
  }
  .table-wrapper-scroll-y {
  display: block;
  }
  .navbar
  {
    background: none!important;
  }
  .navbar-menu-wrapper
  {
    background: #fff!important;
  }
</style>

<!-- Modal -->

<div class="modal fade right" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
  <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
    <div class="modal-content-full-width modal-content ">
      <div class=" modal-header-full-width   modal-header text-center">
        <h5 class="modal-title w-100" id="exampleModalPreviewLabel">{{ __('Photo editor') }}</h5>
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
        <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-body-full-height">
        <div id="appPhoto"></div>
      </div>
      <div class="modal-footer-full-width  modal-footer">
      <button type="button" class="btn btn-danger btn-md btn-rounded" data-dismiss="modal">{{ __('Close') }}</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade right" id="modalProducts" tabindex="-1" role="dialog" aria-labelledby="modalProductsModalPreviewLabel" aria-hidden="true">
  <div class="modal-dialog  modal-fluid" role="document">
    <div class="modal-content">
      <div class=" modal-header text-center">
        <h5 class="modal-title w-100" id="modalProductsModalPreviewLabel">{{ __('Select products') }}</h5>
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
        <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  class="modal-body modal-body-full-height">
      <div class="table-wrapper-scroll-y my-custom-scrollbar">
      <table id="dtHorizontalExample" class="table table-bordered table-striped mb-0">
        <thead>
          <tr>
            <th scope="col" class="text-center">{{ __('Add') }}</th>
            <th scope="col">{{ __('Product name') }}</th>
          </tr>
        </thead>
        <tbody id="modalProductBody">

        </tbody>
      </table>
    </div>
      </div>
      <div class="modal-footer  modal-footer">
      <button type="button" class="btn btn-danger btn-md btn-rounded" data-dismiss="modal">{{ __('Close') }}</button>
      <button type="button" class="btn btn-primary btn-md btn-rounded save_products"  data-dismiss="modal">{{ __('Save') }}</button>
      </div>
    </div>
  </div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    <!-- <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script> -->
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script>
        var url = "{{ Url('/') }}";
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('jquery-minicolors-master/jquery.minicolors.min.js') }}"></script>
    <script src="{{ asset('js/ajax_method.js') }}"></script>
    <script src="{{ asset('photoeditormaster/dist/main.js') }}"></script>
    <script src="{{ asset('bootstrap-select-1.13.0-beta/js/bootstrap-select.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.1/tinymce.min.js"></script>
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendors/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('vendors/chartist/chartist.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '.crud-richtext'
        });
       var token ="{{ csrf_token() }}";
    </script>
    <script type="text/javascript">
        $(function () {
            // Navigation active
            $('ul.navbar-nav a[href="{{ "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" }}"]').closest('li').addClass('active');
        });
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
  <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
    @yield('scripts')
    <!-- End custom js for this page -->
  </body>
</html>