<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/lobahn-icon.png') }}">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/backend/plugins/jquery-ui-1.12.1/jquery-ui.min.css">
    <link href="{{asset('/backend/plugins/dropify/dist/css/dropify.min.css')}}" rel="stylesheet" />

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Lobahn</title>

    @stack('css')
  </head>
  <body> 
    <div id="page-container" class="bg-light">
        <div id="content-wrap">
            <section>
                <nav class="navbar navbar-expand-xl navbar-expand-md navbar-light bg-white justify-content-between">
                    <div class="container">
                        <a class="navbar-brand set-align" href="{{url('/')}}">
                            <img src="{{ asset('images/logo.svg') }}" style="width: 150px;height: auto;" alt="Lobahn">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav ml-auto">
                                <a class="nav-item nav-link active" href="#">Search Job <span class="sr-only">(current)</span></a>
                                <a class="nav-item nav-link" href="#">Compnay Profile</a>
                                <a class="nav-item nav-link" href="#">Career Advice</a>
                            </div>
                            <div class="navbar-nav ml-auto">
                                @guest
                                <a class="nav-item nav-link" href="{{route('login')}}">Login </a>
                                {{-- <a class="nav-item nav-link" href="{{route('userLogin')}}">Login </a> --}}
                                <a class="nav-item nav-link" href="{{ route('signup') }}">Sign up</a>
                                {{-- <a class="nav-item nav-link" href="{{ route('register') }}">Register</a> --}}
                                @else
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                @endguest
                            </div>
                            <form class="form-inline search-form">
                                <!-- <input class="form-control mr-sm-2 input-search" type="search" placeholder="標籤查詢" aria-label="Search"> -->
                                <button class="btn btn-primary my-2 my-sm-0 search-btn" type="submit">For Employers</button>
                            </form>
                        </div>
                        
                    </div>
                </nav>
            </section>  
            <section>
                <div class="banner-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 banner-left-padding" style="color: #FFF">
                                <p class="banner-text">Lobahn <br>
                                    LOBAHN JOB OPPORTUNITY
                                </p>
                                <p class="banner-subtext">
                                    
                                </p>
                            </div>
                        </div>
                       
                    </div>                    
                </div>                 
            </section>

            <section class="main-content">
                @yield('content')
            </section>   
        </div>  
        <section id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <p class="footer-left-text">
                            @2021 Lobanh. All Rights Reserved.
                        </p>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <p class="footer-right-text">
                            Design by Visible One
                        </p>
                    </div>
                </div>
            </div>
        </section>  
    </div>
    <script src="{{asset('/backend/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/backend/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('/backend/plugins/dropify/dist/js/dropify.min.js')}}"></script>

    <script>
        $(function () {
            $('.dropify').dropify();
        });
    </script>

    @stack('scripts')
  </body>
</html>