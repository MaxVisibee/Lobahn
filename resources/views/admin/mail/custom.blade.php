<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $siteSetting->site_name ? $siteSetting->site_name : 'Lobahn' }} | Admin</title>
    {{-- <title>{{ config('app.name', 'Lobahn') }}</title> --}}
    <link rel="shortcut icon" href="{{ asset('images/lobahn-icon.png') }}">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('/backend/css/default/app.min.css') }}" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE CSS STYLE ================== -->
    <link href="{{ asset('/backend/plugins/tag-it/css/jquery.tagit.css') }}" rel="stylesheet" />
    <link href="{{ asset('/backend/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css') }}"
        rel="stylesheet" />
    <!-- ================== END PAGE CSS STYLE ================== -->
</head>

<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>
    <!-- end #page-loader -->
    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed page-content-full-height">
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
            </div>
            <!-- end navbar-header -->
            <!-- begin header-nav -->
            <ul class="navbar-nav navbar-right">
                <li class="dropdown navbar-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{-- <img src="{{ asset('/backend/img/user/user-14.jpg') }}" alt="" style="float: none;" /> --}}
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('admin.logout') }}" class="dropdown-item">Log Out</a>
                    </div>
                </li>
            </ul>
            <!-- end header navigation right -->
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
                            <div class="admin-logo">
                                <a href="{{ route('home') }}"><img
                                        src="{{ $siteSetting->site_logo? asset('/uploads/site_setting/' . $siteSetting->site_logo): asset('images/logo.svg') }}"
                                        style="width: 150px;height: auto;" alt="Lobahn"></a>
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
            <!-- begin vertical-box -->
            <div class="vertical-box with-grid inbox bg-light">
                <!-- begin vertical-box-column -->
                <div class="vertical-box-column width-0">
                </div>
                <!-- end vertical-box-column -->
                <!-- begin vertical-box-column -->
                <div class="vertical-box-column">
                    <!-- begin vertical-box -->
                    <div class="vertical-box">
                        <!-- begin wrapper -->
                        <div class="wrapper"></div>
                        <!-- end wrapper -->
                        <!-- begin vertical-box-row -->
                        <div class="vertical-box-row bg-white">
                            <!-- begin vertical-box-cell -->
                            <div class="vertical-box-cell">
                                <!-- begin vertical-box-inner-cell -->
                                <div class="vertical-box-inner-cell">
                                    <!-- begin scrollbar -->
                                    <div data-scrollbar="true" data-height="100%" class="p-15 mt-3">
                                        <!-- begin email form -->
                                        <form action="{{ route('send.manual') }}" method="POST" name="email_to_form"
                                            id="form">
                                            @csrf
                                            <!-- begin email to -->
                                            <div class="email-to">
                                                <span class="float-right-link">
                                                    <a href="#" data-click="add-cc" data-name="Cc"
                                                        class="m-r-5">Cc</a>
                                                    <a href="#" data-click="add-cc" data-name="Bcc">Bcc</a>
                                                </span>
                                                <label class="control-label">To:</label>
                                                <ul id="email-to" class="primary line-mode">
                                                </ul>
                                            </div>
                                            <!-- end email to -->

                                            <div data-id="extra-cc"></div>
                                            <!-- begin email subject -->
                                            <div class="email-subject">
                                                <input type="text" class="form-control form-control-lg"
                                                    placeholder="Subject" name="subject" />
                                            </div>
                                            <!-- end email subject -->
                                            <!-- begin email content -->
                                            <div class="email-content p-t-15">
                                                <textarea class="textarea form-control" name="body" placeholder="Enter text ..." id="wysihtml5" rows="20"></textarea>
                                            </div>
                                            <!-- end email content -->
                                            <input type="hidden" name="to" id="to">
                                            <input type="hidden" name="cc" id="cc">
                                            <input type="hidden" name="bcc" id="bcc">
                                        </form>
                                        <!-- end email form -->
                                    </div>
                                    <!-- end scrollbar -->
                                </div>
                                <!-- end vertical-box-inner-cell -->
                            </div>
                            <!-- end vertical-box-cell -->
                        </div>
                        <!-- end vertical-box-row -->
                        <!-- begin wrapper -->
                        <div class="wrapper text-right">
                            {{-- <button type="submit" class="btn btn-white p-l-40 p-r-40 m-r-5">Discard</button> --}}
                            <button type="button" class="send btn btn-primary p-l-40 p-r-40">Send</button>
                        </div>
                        <!-- end wrapper -->
                    </div>
                    <!-- end vertical-box -->
                </div>
                <!-- end vertical-box-column -->
            </div>
            <!-- end vertical-box -->
        </div>
        <!-- end #content -->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
            data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('/backend/js/app.min.js') }}"></script>
    <script src="{{ asset('/backend/js/theme/default.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('/backend/plugins/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('/backend/plugins/tag-it/js/tag-it.min.js') }}"></script>
    <script src="{{ asset('/backend/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js') }}">
    </script>
    <script src="{{ asset('/backend/js/demo/email-compose.demo.js') }}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
        $('.send').click(function() {
            var to = [];
            $('#email-to .tagit-label').each(function() {
                to.push($(this).text());
            });
            var cc = [];
            $('#email-cc-Cc .tagit-label').each(function() {
                cc.push($(this).text());
            });
            var bcc = [];
            $('#email-cc-Bcc .tagit-label').each(function() {
                bcc.push($(this).text());
            });
            $('#to').val(to);
            $('#cc').val(cc);
            $('#bcc').val(bcc);
            var form = $('#form')[0];
            form.submit();
        });
    </script>

</body>

</html>
