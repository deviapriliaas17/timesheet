<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Timeesheet for PT Sinergi Solusi Teknik">
  <meta name="author" content="SST IT">

  <title>@yield('title')</title>

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/img/brand/sst.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand" href="{{ url('/home')}}">
          <img src="{{ asset('assets/img/brand/sst.png')}}" class="navbar-brand-img" alt="...">
          <h2 class="text-dark d-inline-block mb-0 ml-3">Timesheet</h2>
        </a>
        <div class=" ml-auto ">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <!-- <li class="nav-item">
              <a class="nav-link" href="{{ url('/dashboard') }}">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
            </li> -->
            @can("View Timesheet")
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/timesheet') }}">
                <i class="ni ni-ungroup text-primary"></i>
                <span class="nav-link-text">Timesheet</span>
              </a>
            </li>
            @endcan
            @can("View Summary")
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/summary') }}">
                <i class="ni ni-collection text-info"></i>
                <span class="nav-link-text">Summary</span>
              </a>
            </li>
            @endcan
            <li class="nav-item">
              <a class="nav-link" href="#navbar-management" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-management">
                <i class="ni ni-ungroup text-orange"></i>
                <span class="nav-link-text">Management</span>
              </a>
              <div class="collapse" id="navbar-management">
                <ul class="nav nav-sm flex-column">
                  @can("View Employee")
                  <li class="nav-item">
                    <a href="{{ url('/employee') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> <i class="ni ni-circle-08 text-success"></i> </span>
                      <span class="sidenav-normal"> Employee </span>
                    </a>
                  </li>
                  @endcan
                  @can("View Project")
                  <li class="nav-item">
                    <a href="{{ url('/project') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> <i class="ni ni-briefcase-24 text-orange"></i> </span>
                      <span class="sidenav-normal"> Project </span>
                    </a>
                  </li>
                  @endcan
                  @can("View Project Location")
                  <li class="nav-item">
                    <a href="{{ url('/project_location') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> <i class="ni ni-briefcase-24 text-danger"></i> </span>
                      <span class="sidenav-normal"> Project Location </span>
                    </a>
                  </li>
                  @endcan
                  @can("View Role")
                  <li class="nav-item">
                    <a href="{{ url('/role') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> <i class="ni ni-ui-04 text-danger"></i>  </span>
                      <span class="sidenav-normal"> Role </span>
                    </a>
                  </li>
                  @endcan
                  @can("View Permission")
                  <li class="nav-item">
                    <a href="{{ url('/permission') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> <i class="ni ni-active-40 text-yellow"></i> </span>
                      <span class="sidenav-normal"> Permission</span>
                    </a>
                  </li>
                  @endcan
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="./assets/img/brand/sst.png">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    {{-- <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name_employee }}</span> --}}
                    <span class="mb-0 text-sm  font-weight-bold"></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>{{ __('Logout') }}</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <!-- Header -->
    <!-- Page content -->
    @yield('content')

     <!-- Footer -->
     <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center text-lg-left text-muted ml-4 mb-0">
              &copy; 2021 <a href="https://www.sinergiteknik.co.id" class="font-weight-bold ml-1" target="_blank">Sinergi Solusi Teknik</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('assets/js/argon.js?v=1.2.0')}}"></script>
  <script>
    $('#editProject').on('show.bs.modal', function (event){

      var button = $(event.relatedTarget)
      var project = button.data('myproject')
      var project_id = button.data('projectid')
      var modal = $(this)

      modal.find('.modal-body #project').val(project);
      modal.find('.modal-body #project_id').val(project_id);
    })
  </script>
  <script>
    $('#editLocation').on('show.bs.modal', function (event){

      var button = $(event.relatedTarget)
      var project_location = button.data('myprojectlocation')
      var project_code = button.data('myprojectcode')
      var project_location_id = button.data('projectlocationid')
      var modal = $(this)

      modal.find('.modal-body #project_location').val(project_location);
      modal.find('.modal-body #project_code').val(project_code);
      modal.find('.modal-body #project_location_id').val(project_location_id);
    })
  </script>
  <script>
    $('#editPermission').on('show.bs.modal', function (event){

      var button = $(event.relatedTarget)
      var permission = button.data('mypermission')
      var permission_id = button.data('permissionid')
      var permission_category = button.data('category')
      var modal = $(this)

      modal.find('.modal-body #permission').val(permission);
      modal.find('.modal-body #permission_category').val(permission_category);
      modal.find('.modal-body #permission_id').val(permission_id);
    })
  </script>
  <script>
    $(document).ready(function () {

      $('#checkAll').on('click', function(e) {
          var checkAll = document.getElementById('checkAll')
          if(checkAll.checked == true){
            $(".permission_checked").prop('checked', true);  
          }else{
            $(".permission_checked").prop('checked', false);  
          }  
        });
    })
  </script>
</body>

</html>