@extends('admin.layouts.master')

@section('title', 'Dashboard V1')

@push('css')

@endpush

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Dashboard</h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-xl-4 col-md-4 col-xs-4">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>TODAY SEEKERS</h4>
                    <p>{{$today_user}}</p>	
                </div>
                <div class="stats-link">
                    <a href="{{route('seekers.index')}}">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-4 col-md-4 col-xs-4">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-link"></i></div>
                <div class="stats-info">
                    <h4>ACTIVE SEEKERS</h4>
                    <p>{{$active_user}}</p>	
                </div>
                <div class="stats-link">
                    <a href="{{route('seekers.index')}}">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        {{-- <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-orange">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>VERIFIED SEEKERS</h4>
                    <p>{{$total_user}}</p>	
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div> --}}
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-4 col-md-4 col-xs-4">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-clock"></i></div>
                <div class="stats-info">
                    <h4>TOTAL SEEKERS</h4>
                    <p>{{$total_user}}</p>	
                </div>
                <div class="stats-link">
                    <a href="{{route('seekers.index')}}">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-xl-4 col-md-4 col-xs-4">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>TODAY COMPANY</h4>
                    <p>{{$today_company}}</p>	
                </div>
                <div class="stats-link">
                    <a href="{{route('companies.index')}}">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-4 col-md-4 col-xs-4">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-link"></i></div>
                <div class="stats-info">
                    <h4>ACTIVE COMPANY</h4>
                    <p>{{$active_company}}</p>	
                </div>
                <div class="stats-link">
                    <a href="{{route('companies.index')}}">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-4 col-md-4 col-xs-4">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-clock"></i></div>
                <div class="stats-info">
                    <h4>TOTAL COMPANY</h4>
                    <p>{{$total_company}}</p>	
                </div>
                <div class="stats-link">
                    <a href="{{route('companies.index')}}">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->
    
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-xl-4 col-md-4 col-xs-4">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>TODAY JOB</h4>
                    <p>{{$today_job}}</p>	
                </div>
                <div class="stats-link">
                    <a href="{{route('opportunities.index')}}">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-4 col-md-4 col-xs-4">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-link"></i></div>
                <div class="stats-info">
                    <h4>ACTIVE JOB</h4>
                    <p>{{$active_job}}</p>	
                </div>
                <div class="stats-link">
                    <a href="{{route('opportunities.index')}}">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-4 col-md-4 col-xs-4">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-clock"></i></div>
                <div class="stats-info">
                    <h4>TOTAL JOB</h4>
                    <p>{{$total_job}}</p>	
                </div>
                <div class="stats-link">
                    <a href="{{route('opportunities.index')}}">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->
    
@endsection

@push('scripts')
<script src="{{asset('/backend/js/demo/dashboard.js')}}"></script>
@endpush
