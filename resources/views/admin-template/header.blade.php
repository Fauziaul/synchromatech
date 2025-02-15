<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('assets')}}"
  data-template="vertical-menu-template"
>
  <head>
    <meta charset="utf-8" />
    @yield('meta_header')
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
   <title>Dashboard</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />
    <!-- Favicon -->
    
    <link rel="shortcut icon" type="image/x-icon" href="" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{url('assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{url('assets/vendor/fonts/tabler-icons.css')}}" />
    <link rel="stylesheet" href="{{url('assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{url('assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    {{-- <link rel="stylesheet" href="{{url('assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" /> --}}
    <link rel="stylesheet" href="{{url('assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/node-waves/node-waves.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/swiper/swiper.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/select2/select2.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/pickr/pickr-themes.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/libs/tagify/tagify.css')}}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{url('assets/vendor/css/pages/cards-advance.css')}}" />
    <!-- Helpers -->
    <script src="{{url('assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{url('assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{url('assets/js/config.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .bg-menu-theme.menu-vertical .menu-item.active>.menu-link:not(.menu-toggle) {
            background: #b39d87 !important;
            box-shadow: none !important;
            color: #fff !important;
            
        }
        .bg-menu-theme.menu-vertical{
            background-color: #161931 !important;
            color: #fff !important;

        }
        .font-menu-theme{
            color: #ffffff !important;
        }
        .nav-pills .nav-link.active,
        .nav-pills .nav-link.active:hover,
        .nav-pills .nav-link.active:focus {
            background-color: #b39d87;
            color: #fff;
        }

        .nav-pills .nav-link:not(.active):hover,
        .nav-pills .nav-link:not(.active):focus {
            color: #b39d87;
        }

        .btn-coklat {
            background-color: #b39d87;
            border-color: #b39d87;
            color: #fff;
        }
        .btn-coklat:hover{
            background-color: #a5672a;
            color: #fff
        }

        .form-check-input:checked,
        .form-check-input[type=checkbox]:indeterminate {
            background-color: #b39d87;
            border-color: #b39d87;
        }

        .select2-container--default .select2-results__option--highlighted:not([aria-selected=true]) {
            background-color: rgba(115, 103, 240, 0.08) !important;
            color: #b39d87 !important;
        }

    </style>

    @yield('page_style')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="" class="app-brand-link">
              <span class="demo mt-3">
                
              </span>
              <span class="app-brand-text font-menu-theme demo menu-text fw-bold">Synchromatech</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
              <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
          
            <!-- Apps & Pages -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text font-menu-theme">Administrator</span>
            </li>
            <li class="menu-item {{ request()->is('admin/dashboard*') ? 'active' : ''}}">
              <a href="/admin/dashboard" class="menu-link font-menu-theme">
                <i class="menu-icon tf-icons ti ti-dashboard"></i>
                <div data-i18n="Dashboard">Dashboard</div>
              </a>
            </li>
            <li class="menu-item {{ request()->is('admin/banner*') ? 'active' : ''}}">
              <a href="/admin/banner" class="menu-link font-menu-theme">
                <i class="menu-icon tf-icons ti ti-layout"></i>
                <div data-i18n="Banner">Banner</div>
              </a>
            </li>
            <li class="menu-item {{ request()->is('admin/produk*') ? 'active' : ''}}">
              <a href="/admin/produk" class="menu-link font-menu-theme">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div data-i18n="Produk">Produk</div>
              </a>
            </li>
            <li class="menu-item {{ request()->is('admin/kategori*') ? 'active' : ''}}">
              <a href="/admin/kategori" class="menu-link font-menu-theme">
                <i class="menu-icon tf-icons ti ti-briefcase"></i>
                <div data-i18n="Kategori">Kategori</div>
              </a>
            </li>
            <li class="menu-item {{ request()->is('admin/pesanan*') ? 'active' : ''}}">
              <a href="/admin/pesanan" class="menu-link font-menu-theme">
                <i class="menu-icon tf-icons ti ti-clipboard"></i>
                <div data-i18n="Pesanan">Pesanan</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

              <ul class="navbar-nav flex-row align-items-center ms-auto">

                @php
                $user = Auth::user();
                @endphp
                {{-- <span class="badge bg-label-success mt-1">{{ $user->getRoleNames()->implode(', ') }}</span> --}}
                <!-- Style Switcher -->

                <!--/ Style Switcher -->
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../../assets/img/avatars/no-image.png" alt class="h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../../assets/img/avatars/no-image.png" alt class="h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ ucwords($user->name) }}</span>
                            <small class="text-muted">{{ ucwords($user->email) }}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal" href="{{ route('logout') }}">
                        <i class="ti ti-logout me-2 ti-sm"></i>
                        <span class="align-middle">Logout</span>
                    </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
            
          </nav>
         <!-- Content wrapper -->
         <div class="content-wrapper">
          <!-- Content -->
          <!-- Modal logout-->
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                      </div>
                      <div class="modal-body text-center" style="display:block;">
                          Apakah Anda Ingin Keluar Dari Akun Ini?
                      </div>
                      <div class="modal-footer" style="display: flex; justify-content:center;">
                          <a href="{{ route('logout') }}"><button type="button" class="btn btn-success" data-dismiss="modal">Iya</button></a>
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                      </div>
                  </div>
              </div>
          </div>

          <div class="container-xxl flex-grow-1 container-p-y">

