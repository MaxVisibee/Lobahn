<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $siteSetting->site_name? $siteSetting->site_name:'Lobahn' }} | Admin</title>
    {{-- <title>{{ config('app.name', 'Lobahn') }}</title> --}}
    <link rel="shortcut icon" href="{{ asset('images/lobahn-icon.png') }}">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('/backend/css/material/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/backend/css/default/app.min.css') }}" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{ asset('/backend/plugins/jvectormap-next/jquery-jvectormap.css') }}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN Plugin PAGE LEVEL STYLE ================== -->
    <link href="{{ asset('/backend/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/backend/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/backend/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"
        rel="stylesheet" />
    {{-- <link href="{{asset('/backend/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" /> --}}
    <link href="{{ asset('/backend/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('/backend/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link
        href="{{ asset('/backend/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"
        rel="stylesheet" />
    <!-- ================== END Plugin PAGE LEVEL STYLE ================== -->
    <link href="{{ asset('/backend/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/backend/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" />

    <link href="{{ asset('/backend/plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    @stack('css')
    <style>
      /*.note-editor.note-frame{
        border: 1px solid #ccc !important;
      }
      th,td{
        white-space: nowrap;
      }
      div.dataTables_wrapper {
        width: 100%;
      }

      .dataTables_wrapper.dt-bootstrap .dataTables_filter label,
      .dataTables_wrapper.dt-bootstrap4 .dataTables_filter label {
        margin-top: 36px;
      }
      div#data-table-responsive_filter {
        float: left;
        margin-top: -72px;
        margin-left: 43%;
      }
      @media screen and (max-width: 1280px) {
        div#data-table-responsive_filter {
          float: left;
          margin-top: -73px;
          margin-left: 37%;
        }
      }*/
    </style>
</head>

<body>

    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar">
        <!-- begin #header -->
        <div id="header" class="header navbar-default">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed navbar-toggle-left" data-click="sidebar-minify">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a href="index.html" class="navbar-brand">
     <img src="{{ asset('images/logo.svg') }}" style="width: 150px;height: auto;" alt="Lobahn">
    </a> -->
            </div>
            <!-- end navbar-header -->
            <!-- begin header-nav -->
            <ul class="navbar-nav navbar-right">
                <!-- <li>
     <a href="#" data-toggle="navbar-search" class="icon">
      <i class="material-icons">search</i>
     </a>
    </li>
    <li class="dropdown">
     <a href="#" data-toggle="dropdown" class="dropdown-toggle icon">
      <i class="material-icons">inbox</i>
      <span class="label">5</span>
     </a>
     
     <div class="dropdown-menu media-list dropdown-menu-right">
      <div class="dropdown-header">NOTIFICATIONS (5)</div>
      <a href="javascript:;" class="dropdown-item media">
       <div class="media-left">
        <i class="fa fa-bug media-object bg-silver-darker"></i>
       </div>
       <div class="media-body">
        <h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
        <div class="text-muted f-s-11">3 minutes ago</div>
       </div>
      </a>
      <a href="javascript:;" class="dropdown-item media">
       <div class="media-left">
        <img src="{{ asset('/backend/img/user/user-1.jpg') }}" class="media-object" alt="" />
        <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
       </div>
       <div class="media-body">
        <h6 class="media-heading">John Smith</h6>
        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
        <div class="text-muted f-s-11">25 minutes ago</div>
       </div>
      </a>
      <a href="javascript:;" class="dropdown-item media">
       <div class="media-left">
        <img src="{{ asset('/backend/img/user/user-2.jpg') }}" class="media-object" alt="" />
        <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
       </div>
       <div class="media-body">
        <h6 class="media-heading">Olivia</h6>
        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
        <div class="text-muted f-s-11">35 minutes ago</div>
       </div>
      </a>
      <a href="javascript:;" class="dropdown-item media">
       <div class="media-left">
        <i class="fa fa-plus media-object bg-silver-darker"></i>
       </div>
       <div class="media-body">
        <h6 class="media-heading"> New User Registered</h6>
        <div class="text-muted f-s-11">1 hour ago</div>
       </div>
      </a>
      <a href="javascript:;" class="dropdown-item media">
       <div class="media-left">
        <i class="fa fa-envelope media-object bg-silver-darker"></i>
        <i class="fab fa-google text-warning media-object-icon f-s-14"></i>
       </div>
       <div class="media-body">
        <h6 class="media-heading"> New Email From John</h6>
        <div class="text-muted f-s-11">2 hour ago</div>
       </div>
      </a>
      <div class="dropdown-footer text-center">
       <a href="javascript:;">View more</a>
      </div>
     </div>
    </li> -->
                <li class="dropdown navbar-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('/backend/img/user/user-14.jpg') }}" alt="" style="float: none;" />
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- <a href="javascript:;" class="dropdown-item">Edit Profile</a>
      <a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
      <a href="javascript:;" class="dropdown-item">Calendar</a>
      <a href="javascript:;" class="dropdown-item">Setting</a>
      <div class="dropdown-divider"></div> -->
                        <a href="{{ route('admin.logout') }}" class="dropdown-item">Log Out</a>
                    </div>
                </li>
            </ul>
            <!-- end header navigation right -->

            <div class="search-form">
                <button class="search-btn" type="submit"><i class="material-icons">search</i></button>
                <input type="text" class="form-control" placeholder="Search Something..." />
                <a href="#" class="close" data-dismiss="navbar-search"><i class="material-icons">close</i></a>
            </div>
        </div>
        <!-- end #header -->

        <!-- begin #sidebar -->
        <div id="sidebar" class="sidebar" data-disable-slide-animation="true">
            <!-- begin sidebar scrollbar -->
            <div data-scrollbar="true" data-height="100%">
                <!-- begin sidebar user -->
                <ul class="nav">
                    <li class="nav-profile">
                        <a href="javascript:;" data-toggle="nav-profile">
                            <div class="cover with-shadow"></div>
                            <div class="image">
                                {{-- <img src="{{ asset('images/logo.svg') }}" style="width: 150px;height: auto;" alt="Lobahn"> --}}
                                <img src="{{ $siteSetting->site_logo ? asset('/uploads/site_setting/'.$siteSetting->site_logo) : asset('images/logo.svg') }}" style="width: 150px;height: auto;" alt="Lobahn">
                            </div>
                            <div class="info"> </div>
                        </a>
                    </li>
                </ul>
                <!-- end sidebar user -->

                <!-- begin sidebar nav -->
                @include('admin.layouts.sidebar')
                <!-- end sidebar nav -->
                
            </div>
            <!-- end sidebar scrollbar -->
        </div>
        <div class="sidebar-bg"></div>
        <!-- end #sidebar -->

        <!-- begin #content -->
        <div id="content" class="content">
            @yield('content')
        </div>
        <!-- end #content -->

        <!-- begin #footer -->
        {{-- <div id="footer" class="footer">
			&copy; {{ date('Y') }}. Created by <a href="https://visibleone.com/"" target="_blank">VisibleOne</a>
		</div> --}}
        <!-- end #footer -->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
            data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('/backend/js/app.min.js') }}"></script>
    <script src="{{ asset('/backend/js/theme/material.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    {{-- <script src="{{asset('/backend/plugins/gritter/js/jquery.gritter.js')}}"></script> --}}
    <script src="{{ asset('/backend/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('/backend/plugins/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('/backend/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('/backend/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('/backend/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('/backend/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backend/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/backend/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/backend/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ====================== Begin For Plugin ======================= -->
    <script src="{{ asset('/backend/plugins/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/backend/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/backend/plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('/backend/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('/backend/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/backend/plugins/select2/dist/js/select2.min.js') }}"></script>
    <script
        src="{{ asset('/backend/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}">
    </script>

    <!-- ====================== End For Plugin ======================= -->

    <script src="{{ asset('/backend/plugins/dropify/dist/js/dropify.min.js') }}"></script>

    <script>
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
        });

        $('.select2').select2();
        $('.dropify').dropify();
        $(function () {
          $('#pagetable, #data-table-responsive').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": false,
            iDisplayLength: 25,
          //   scrollX: true,
          //   scrollCollapse: true,
          });
        });
    </script>
      


    @stack('scripts')

</body>

</html>
