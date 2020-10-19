<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- base:css -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="{{ asset('template/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('bootstrap-select-1.13.0-beta/css/bootstrap-select.min.css') }}">
  <link rel="stylesheet" href="{{ asset('jquery-minicolors-master/jquery.minicolors.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('template/images/favicon.png') }}" />
  <style>
    #sortable1, #sortable2, #sortable3, #sortable4 {
    border: 1px solid #eee;
    width: 142px;
    min-height: 20px;
    list-style-type: none;
    margin: 0;
    padding: 5px 0 0 0;
    float: left;
    margin-right: 10px;
    height: 500px;
  }
  #sortable1, #sortable2, #sortable3, #sortable4 li {
    margin: 0 5px 5px 5px;
    /* padding: 5px; */
    font-size: 1.2em;
    /* width: 120px; */
  }
        .content-message{
            position: fixed;
            z-index: 100; /*Crea una capa nueva por encima, si tenemos una con valor 2 estará a una altura o por encima de una con 
                            valor 1*/
            margin-left:50%; /*Con este margen posicionamos el div donde queramos*/
        }
      .modal-dialog-full-width {
        max-width: 100%;
        /* width: 90%; */
        /* margin: 0; */
        top: -20px;
        bottom: 50px;
        left: 25px;
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

        .bd-example-modal-lg .modal-dialog-loading{
      display: table;
      position: relative;
      margin: 0 auto;
      top: calc(50% - 24px);
    }
    
    .bd-example-modal-lg .modal-dialog .modal-content-loading{
      background-color: transparent;
      border: none;
    }
    .cc-selector input{
    margin:0;padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
    }

    .cc-selector input:active +.drinkcard-cc{opacity: .9;}
    .cc-selector input:checked +.drinkcard-cc{
        -webkit-filter: none;
          -moz-filter: none;
                filter: none;
    }
    .drinkcard-cc{
        cursor:pointer;
        background-size:contain;
        background-repeat:no-repeat;
        display:inline-block;
        width:100px;height:70px;
        -webkit-transition: all 100ms ease-in;
          -moz-transition: all 100ms ease-in;
                transition: all 100ms ease-in;
        -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
          -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
                filter: brightness(1.8) grayscale(1) opacity(.7);
    }
    .drinkcard-cc:hover{
        -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
          -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
                filter: brightness(1.2) grayscale(.5) opacity(.9);
    }
    .has-error{border: 1px solid #e01717;}
    

    /* Extras */
    a:visited{color:#888}
    a{color:#444;text-decoration:none;}
    p{margin-bottom:.3em;}
    .mapouter{position:relative;text-align:right;height:500px;width:600px;}
    .gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}
</style>
</head>
<body>
  <div id="app" class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    @if(Auth::user()->hasRole('admin') == 1)
      @include('admin.sidebar')
    @else
      @include('sidebar')
    @endif
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>

          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">{{ __('Welcome back') }}, {{ Auth::user()->name }}</h4>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <h4 class="mb-0 font-weight-bold d-none d-xl-block">Mar 12, 2019 - Apr 10, 2019</h4>
            </li>


            <li class="nav-item dropdown mr-2">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img  src='https://iupac.org/wp-content/uploads/2018/05/default-avatar-300x300.png' alt="profile" style="
                                      max-width: 71px;
                                      max-height: 48px;
                                      border-radius: 103px;
                                  ">
                <span class="nav-profile-name">{{ Auth::user()->name }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item">
                  <i class="mdi mdi-settings text-primary"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="{{ route('view_profile') }}"><i class="mdi mdi-account"></i> {{ __('My Profile') }}</a>
                <a onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="dropdown-item"><i class="mdi mdi-logout text-primary"></i>{{ __('Sign Out') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @if (Session::has('flash_message'))
                    <div class="alert alert-<?php echo(Session::get('type_message')!=null?Session::get('type_message'):'dark') ?>">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ __(Session::get('flash_message')) }}
                    </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ __($error) }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <div class="toast content-message" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body">
            </div>
          </div>
          <div class="print" id="print">
          @yield('content')
          </div>
          <!-- row end -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
        <footer class="footer">
              <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                <p class="text-center text-sm-left d-block d-sm-inline-block mb-0">Copyright © {{date("Y")}} <a href="#" target="_blank">Ing.Cesar Daniel Rodríguez S.</a>. All rights reserved.</p>
                <p class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center mb-0"><i class="mdi mdi-heart-outline text-muted icon-sm"></i></p>
              </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <div class="modal fade bd-example-modal-lg  bd-example-modal-lg-loading" id="modalLoading" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-loading modal-sm">
        <div class="modal-content modal-content-loading" style="width: 48px">
            <span class="fa fa-spinner fa-spin fa-3x"></span>
        </div>
      </div>
  </div>
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
              <th scope="col">{{ __('Image') }}</th>
              <th scope="col">{{ __('Price') }}</th>
              <th scope="col">{{ __('Qty') }}</th>
            </tr>
          </thead>
          <tbody id="modalProductBody">

          </tbody>
        </table>
        <div class="row" >
            <div class="col-md-6">
            <label>Total:</label>
            </div>
            <div class="col-md-6">
            <label id="total"></label>
            </div>
        </div>
      </div>
        </div>
        <div class="modal-footer  modal-footer">
        <button type="button" class="btn btn-danger btn-md btn-rounded" data-dismiss="modal">{{ __('Close') }}</button>
        <button type="button" class="btn btn-primary btn-md btn-rounded save_products"  data-dismiss="modal">{{ __('Continue') }}</button>
        </div>
      </div>
    </div>
  </div>
  <!-- container-scroller -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.1/tinymce.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="{{ asset('template/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- <script src="{{ asset('js/app.js') }}"></script> -->
  <script src="{{ asset('template/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('template/js/off-canvas.js') }}"></script>
  <script src="{{ asset('template/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('template/js/template.js')}}"></script>
  <script src="{{ asset('template/js/dashboard.js') }}"></script>
  <script src="{{ asset('bootstrap-select-1.13.0-beta/js/bootstrap-select.min.js') }}"></script>
  <script src="{{ asset('jquery-minicolors-master/jquery.minicolors.min.js') }}"></script>
  <script type="text/javascript">
    var url = "{{ Url('/') }}";
    var drop_image_here = "{{ __('Drop image here') }}";
    var search = "{{ __('Search') }}";
    var photo_editor = "{{ __('Photo editor') }}";
    var brightness = "{{__('Brightness')}}";
    var upload = "{{__('Upload')}}";
    var flip_vertical = "{{__('Flip vertical')}}";
    var flip_horizontal = "{{__('Flip horizonta')}}l";
    var rotate_right = "{{__('Rotate right')}}";
    var rotate_left = "{{__('Rotate left')}}";
    var zoom_out = "{{__('Zoom out')}}";
    var zoom_in = "{{__('Zoom in')}}";
    var crop = "{{__('Crop')}}";
    var move = "{{__('Move')}}";
    var save = "{{__('Save')}}";
    var cancel = "{{__('Cancel')}}";
    var undo = "{{__('Undo')}}";
    var delete_title = "{{__('Delete')}}";
    var delete_title = "{{__('Delete')}}";
    var alph_error = "{{__('Please use only alphanumeric or alphabetic characters')}}";
    var everything_correct = "{{__('Everything is correct')}}";
    var passwords_must_match = "{{__('Passwords must match')}}";
    var password_empty = "{{__('Password fields cannot be empty')}}";
    var password_blank = "{{__('Password cannot contain blank spaces')}}";
      tinymce.init({
          selector: '.crud-richtext'
      });
    var token ="{{ csrf_token() }}";
    var api_g = "{{ ENV('GOOGLE_API')}}";
  </script>
  <script src="{{ asset('js/ajax_method.js') }}"></script>
  <script src="{{ asset('photoeditormaster/dist/main.js') }}"></script>
  <script type="text/javascript">
      $(function () {
          // Navigation active
          $('navbar-nav a[href="{{ "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" }}"]').closest('li').addClass('active');
      });
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });
      $('#myModal').on('shown.bs.modal', function (e) {
          $("[data-action='remove']").click();
      });
      $('.fa-download').on("click",function(){
          $('#myModal').modal("hide");
      });
  </script>
  <script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  $('select').selectpicker();
  </script>
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable1, #sortable2" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
  } );
  </script>
  <!-- End custom js for this page-->
  @yield('scripts')
</body>

</html>