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

<div class="row">
    <!-- begin col-3 -->
    <div class="col-xl-4 col-md-4 col-xs-4">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon"><i class="fa fa-desktop"></i></div>
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
    <!-- begin col-3 -->
    <div class="col-xl-4 col-md-4 col-xs-4">
        <div class="widget widget-stats bg-info">
            <div class="stats-icon"><i class="fa fa-link"></i></div>
            <div class="stats-info">
                <h4>TOTAL COMPANIES</h4>
                <p>{{$total_company}}</p>
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
                <h4>TOTAL JOBS</h4>
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

<div class="row">
    <!-- begin col-6 -->
    <div class="col-xl-6">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="chart-js-9">
            <div class="panel-heading">
                <h4 class="panel-title">Employer</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                        data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                        data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                        data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                        data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
                {{-- <p class="mb-0">
                    A pie chart (or a circle chart) is a circular statistical graphic, which is divided into slices to
                    illustrate numerical proportion.
                </p> --}}
            </div>
            <div class="panel-body p-0">
                <div id="employer-pie-chart"></div>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
    <!-- begin col-6 -->
    <div class="col-xl-6">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="chart-js-9">
            <div class="panel-heading">
                <h4 class="panel-title">Candidate</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                        data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                        data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                        data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                        data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
                {{-- <p class="mb-0">
                    A pie chart (or a circle chart) is a circular statistical graphic, which is divided into slices to
                    illustrate numerical proportion.
                </p> --}}
            </div>
            <div class="panel-body p-0">
                <div id="candidate-pie-chart"></div>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
</div>
<!-- end row -->

@endsection

@push('scripts')
<script src="{{asset('/backend/js/demo/dashboard.js')}}"></script>
<script>
    var employerPieChart = function() {
        var options = {
            chart: {
                height: 365,
                type: 'pie',
            },
            dataLabels: {
                dropShadow: {
                    enabled: false,
                    top: 1,
                    left: 1,
                    blur: 1,
                    opacity: 0.45
                }
            },
            colors: [COLOR_PINK, COLOR_ORANGE, COLOR_BLUE, COLOR_TEAL, COLOR_INDIGO],
            labels: [@foreach($employerPackages as $employerPackage)
                    '{{$employerPackage->package->package_title}}',
                    @endforeach],
            series: [@foreach($employerPackages as $employerPackage)
                    {{$employerPackage->count}},
                    @endforeach],
            title: {
                text: 'Package'
            }
        };
        
        var chart = new ApexCharts(
            document.querySelector('#employer-pie-chart'),
        options
        );
        
        chart.render();
    };

    var candidatePieChart = function() {
        var options = {
            chart: {
                height: 365,
                type: 'pie',
            },
            dataLabels: {
                dropShadow: {
                    enabled: false,
                    top: 1,
                    left: 1,
                    blur: 1,
                    opacity: 0.45
                }
            },
            colors: [COLOR_PINK, COLOR_ORANGE, COLOR_BLUE, COLOR_TEAL, COLOR_INDIGO],
            labels: [@foreach($employerPackages as $employerPackage)
                    '{{$employerPackage->package->package_title}}',
                    @endforeach],
            series: [@foreach($candidatePackages as $candidatePackage)
                    {{$candidatePackage->count}},
                    @endforeach],
            title: {
            text: 'Package'
            }
        };
        
        var chart = new ApexCharts(
        document.querySelector('#candidate-pie-chart'),
        options
        );
        
        chart.render();
    };

    var ChartApex = function () {
        "use strict";
        return {
        //main function
            init: function () {
            
                employerPieChart();
                candidatePieChart();
            
            }
        };
    }();
    
    $(document).ready(function() {
        ChartApex.init();
    });
</script>
@endpush