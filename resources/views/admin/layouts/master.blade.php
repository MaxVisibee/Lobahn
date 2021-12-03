<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>{{ config('app.name', 'Lobahn') }}</title>
	<link rel="shortcut icon" href="{{ asset('images/lobahn-icon.png') }}">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{asset('/backend/css/material/app.min.css')}}" rel="stylesheet" />
	<link href="{{asset('/backend/css/default/app.min.css')}}" rel="stylesheet" />
	{{-- <link href="{{asset('/backend/css/material/theme/blue.min.css')}}" rel="stylesheet" /> --}}
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{asset('/backend/plugins/jvectormap-next/jquery-jvectormap.css')}}" rel="stylesheet" />
	
	{{-- <link href="{{asset('/backend/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" /> --}}
	{{-- <link href="{{asset('/backend/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> --}}
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN Plugin PAGE LEVEL STYLE ================== -->
	<link href="{{asset('/backend/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}" rel="stylesheet" />
	<link href="{{asset('/backend/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" />
	{{-- <link href="{{asset('/backend/plugins/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet')}}" /> --}}
	{{-- <link href="{{asset('/backend/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet" /> --}}
	<link href="{{asset('/backend/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" />
	{{-- <link href="{{asset('/backend/plugins/@danielfarrell/bootstrap-combobox/css/bootstrap-combobox.css')}}" rel="stylesheet" /> --}}
	{{-- <link href="{{asset('/backend/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" /> --}}
	{{-- <link href="{{asset('/backend/plugins/tag-it/css/jquery.tagit.css')}}" rel="stylesheet" /> --}}
	<link href="{{asset('/backend/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
	<link href="{{asset('/backend/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{asset('/backend/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" />
	{{-- <link href="{{asset('/backend/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css')}}" rel="stylesheet" /> --}}
	{{-- <link href="{{asset('/backend/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css')}}" rel="stylesheet" /> --}}
	{{-- <link href="{{asset('/backend/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css')}}" rel="stylesheet" /> --}}
	{{-- <link href="{{asset('/backend/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css')}}" rel="stylesheet" /> --}}
	<!-- ================== END Plugin PAGE LEVEL STYLE ================== -->
	<link href="{{ asset('/backend/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('/backend/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />

	<link href="{{asset('/backend/plugins/dropify/dist/css/dropify.min.css')}}" rel="stylesheet" />

	<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
	
    @stack('css')
</head>
<body>
	<!-- begin #page-loader -->
	{{-- <div id="page-loader" class="fade show">
		<div class="material-loader">
			<svg class="circular" viewBox="25 25 50 50">
				<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
			</svg>
			<div class="message">Loading...</div>
		</div>
	</div> --}}
	<!-- end #page-loader -->
	
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
			<!-- end navbar-header --><!-- begin header-nav -->
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
								<img src="{{asset('/backend/img/user/user-1.jpg')}}" class="media-object" alt="" />
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
								<img src="{{asset('/backend/img/user/user-2.jpg')}}" class="media-object" alt="" />
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
						<img src="{{asset('/backend/img/user/user-14.jpg')}}" alt="" style="float: none;" />
						<span class="d-none d-md-inline">{{ Auth::user()->name }}</span> 
						<b class="caret"></b>						
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<!-- <a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div> -->
						<a href="{{route('admin.logout')}}" class="dropdown-item">Log Out</a>
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
								<!-- <img src="{{asset('/backend/img/user/user-14.jpg')}}" alt="" /> -->
								<!-- {{ Auth::user()->name }} -->
								<img src="{{ asset('images/logo.svg') }}" style="width: 150px;height: auto;" alt="Lobahn">
							</div>
							<div class="info">
								<!-- <b class="caret pull-right"></b>John Smith
								<small>Front end developer</small> -->
							</div>
						</a>
					</li>
					<!-- <li>
						<ul class="nav nav-profile">
							<li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
							<li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
							<li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
						</ul>
					</li> -->
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">					
					<li class="{{(request()->is('dashboard*'))?'active':''}}">
						<a href="{{route('dashboard.index')}}">
							<i class="fa fa-th-large"></i>
							<span>Dashboard</span>
						</a>
					</li>
					<li class="has-sub {{(request()->is('admins*')) || (request()->is('roles*')) || (request()->is('permissions*')) ? 'active':''}}">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-users" aria-hidden="true"></i>
							<span>User Management</span>
						</a>
						<ul class="sub-menu">
							<li><a href="{{route('admins.index')}}">Admin</a></li>
							<li><a href="{{route('roles.index')}}">Role</a></li>
							<li><a href="{{route('permissions.index')}}">Permission</a></li>
						</ul>
					</li>
					<li class="{{(request()->is('opportunities*'))?'active':''}}">
						<a href="{{route('opportunities.index')}}">
							<i class="fa fa-industry" aria-hidden="true"></i>
							<span>Job Opportunity</span>
						</a>
					</li>

						
					<li class="{{(request()->is('companies*'))?'active':''}}">
						<a href="{{route('companies.index')}}">
							<i class="fas fa-landmark" aria-hidden="true"></i>
							<span>Companies</span>
						</a>
					</li>
					<li class="{{(request()->is('seekers*'))?'active':''}}">
						<a href="{{route('seekers.index')}}">
							<i class="fas fa-user-friends" aria-hidden="true"></i>
							<span>Seekers</span>
						</a>
					</li>
					
					<li class="has-sub {{(request()->is('job_types*')) || (request()->is('job_skills*')) || (request()->is('job_experiences*')) ?'active':''}}">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-tasks" aria-hidden="true"></i>
							<span>Job Attributes</span>
						</a>
						<ul class="sub-menu">
							<li><a href="{{route('job_titles.index')}}">Job Titles</a></li>
							<li><a href="{{route('job_types.index')}}">Job Types</a></li>
							<!-- <li><a href="{{route('job_shifts.index')}}">Job Shifts</a></li> -->
							<li><a href="{{route('job_skills.index')}}">Job Skills</a></li>
							<li><a href="{{route('job_experiences.index')}}">Job Experiences</a></li>
							<li><a href="{{route('degree_levels.index')}}">Degree Levels</a></li>
							<li><a href="{{route('functional_areas.index')}}">Functional Areas</a></li>
							<li><a href="{{route('carrier_levels.index')}}">Carrier Levels</a></li>
							<li><a href="{{route('industries.index')}}">Industries</a></li>
							<li><a href="{{route('job_applies.index')}}">Job Applies</a></li>
							<li><a href="{{route('languages.index')}}">Languages</a></li>
							<li><a href="{{route('study_fields.index')}}">Fields of Study</a></li>
							<li><a href="{{route('sub_sectors.index')}}">Sub Sectors</a></li>
						</ul>
					</li>
					<li class="has-sub {{(request()->is('job_types*')) || (request()->is('job_skills*')) || (request()->is('job_experiences*')) ?'active':''}}">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<span>Location Management</span>
						</a>
						<ul class="sub-menu">
							<li><a href="{{route('countries.index')}}">Countries</a></li>
							<li><a href="{{route('areas.index')}}">Areas</a></li>
							<li><a href="{{route('districts.index')}}">Districts</a></li>
						</ul>
					</li>
					<li class="{{(request()->is('packages*'))?'active':''}}">
						<a href="{{route('packages.index')}}">
							<i class="fa fa-calendar" aria-hidden="true"></i>
							<span>Packages</span>
						</a>
					</li>
					<li class="{{(request()->is('events*'))?'active':''}}">
						<a href="{{route('events.index')}}">
							<i class="fas fa-calendar-alt" aria-hidden="true"></i>
							<span>Events</span>
						</a>
					</li>
					<!-- <li class="{{(request()->is('news*'))?'active':''}}">
						<a href="{{route('news.index')}}">
							<i class="fas fa-newspaper"></i></i>
							<span>News</span>
						</a>
					</li>
					<li class="{{(request()->is('banners*'))?'active':''}}">
						<a href="{{route('banners.index')}}">
							<i class="fas fa-newspaper"></i></i>
							<span>Bannes</span>
						</a>
					</li> -->
					<li class="has-sub {{(request()->is('job_types*')) || (request()->is('job_skills*')) || (request()->is('job_experiences*')) ?'active':''}}">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="far fa-list-alt" aria-hidden="true"></i>
							<span>CMS</span>
						</a>
						<ul class="sub-menu">
							<li><a href="{{route('banners.index')}}">Banners</a></li>
							<li><a href="{{route('news.index')}}">News</a></li>
							<li><a href="{{route('faqs.index')}}">FAQs</a></li>
							<li><a href="{{route('terms.index')}}">Terms & Conditions </a></li>
							<li><a href="{{route('privacies.index')}}">Privacy</a></li>
							<li><a href="{{route('communities.index')}}">Communities</a></li>
							<li><a href="{{route('partners.index')}}">Partners</a></li>
							<li><a href="{{route('blogs.index')}}">Blogs</a></li>
							<li><a href="{{route('abouts.index')}}">About Us</a></li>
							<li><a href="{{route('contacts.index')}}">Contacts</a></li>
						</ul>
					</li>
					<li class="has-sub {{(request()->is('payment_methods*')) ? 'active':''}}">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-cogs" aria-hidden="true"></i>
							<span>Setting</span>
						</a>
						<ul class="sub-menu">
							<li><a href="{{route('payment_methods.index')}}">Payment Methods</a></li>
						</ul>
					</li>
					
					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
					<!-- end sidebar minify button -->
				</ul>
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
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('/backend/js/app.min.js')}}"></script>
	<script src="{{asset('/backend/js/theme/material.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	{{-- <script src="{{asset('/backend/plugins/gritter/js/jquery.gritter.js')}}"></script> --}}
	<script src="{{asset('/backend/plugins/flot/jquery.flot.js')}}"></script>
	<script src="{{asset('/backend/plugins/flot/jquery.flot.time.js')}}"></script>
	<script src="{{asset('/backend/plugins/flot/jquery.flot.resize.js')}}"></script>
	<script src="{{asset('/backend/plugins/flot/jquery.flot.pie.js')}}"></script>
	<script src="{{asset('/backend/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
	{{-- <script src="{{asset('/backend/plugins/jvectormap-next/jquery-jvectormap.min.js')}}"></script> --}}
	{{-- <script src="{{asset('/backend/plugins/jvectormap-next/jquery-jvectormap-world-mill.js')}}"></script> --}}
	<!-- ================== END PAGE LEVEL JS ================== -->


	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{asset('/backend/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('/backend/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('/backend/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('/backend/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
	{{-- <script src="{{asset('/backend/js/demo/table-manage-default.demo.js')}}"></script> --}}
	<script src="{{asset('/backend/js/demo/table-manage-responsive.demo.js')}}"></script>
	{{-- <script src="{{asset('/backend/js/demo/form-plugins.demo.js')}}"></script> --}}
	<!-- ================== END PAGE LEVEL JS ================== -->

	<!-- ====================== Begin For Plugin ======================= -->
	{{-- <script src="{{asset('/backend/plugins/jquery-migrate/dist/jquery-migrate.min.js')}}"></script> --}}
	<script src="{{asset('/backend/plugins/moment/min/moment.min.js')}}"></script>
	<script src="{{asset('/backend/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
	{{-- <script src="{{asset('/backend/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script> --}}
	{{-- <script src="{{asset('/backend/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script> --}}
	<script src="{{asset('/backend/plugins/jquery.maskedinput/src/jquery.maskedinput.js')}}"></script>
	<script src="{{asset('/backend/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
	{{-- <script src="{{asset('/backend/plugins/pwstrength-bootstrap/dist/pwstrength-bootstrap.min.js')}}"></script> --}}
	{{-- <script src="{{asset('/backend/plugins/@danielfarrell/bootstrap-combobox/js/bootstrap-combobox.js')}}"></script> --}}
	{{-- <script src="{{asset('/backend/plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script> --}}
	{{-- <script src="{{asset('/backend/plugins/tag-it/js/tag-it.min.js')}}"></script> --}}
	<script src="{{asset('/backend/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('/backend/plugins/select2/dist/js/select2.min.js')}}"></script>
	<script src="{{asset('/backend/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
	{{-- <script src="{{asset('/backend/plugins/bootstrap-show-password/dist/bootstrap-show-password.js')}}"></script> --}}
	{{-- <script src="{{asset('/backend/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js')}}"></script> --}}
	{{-- <script src="{{asset('/backend/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js')}}"></script> --}}
	{{-- <script src="{{asset('/backend/plugins/clipboard/dist/clipboard.min.js')}}"></script> --}}
	
	<!-- ====================== End For Plugin ======================= -->
	
	<script src="{{asset('/backend/plugins/ckeditor/ckeditor.js')}}"></script>
	{{-- <script src="{{asset('/backend/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js')}}"></script> --}}
	<script src="{{asset('/backend/plugins/dropify/dist/js/dropify.min.js')}}"></script>

	<script>
		$('.datepicker').datepicker({
			format: 'dd/mm/yyyy',
		});

		$('.select2').select2();

		$('.dropify').dropify();
	</script>

    @stack('scripts')

</body>
</html>