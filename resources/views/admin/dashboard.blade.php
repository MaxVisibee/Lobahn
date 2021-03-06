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
                    <h4>TOTAL CANDIDATE</h4>
                    <p>{{ $total_user }}</p>
                </div>
                <div class="stats-link">
                    <a href="{{ route('seekers.index') }}">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-4 col-md-4 col-xs-4">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-link"></i></div>
                <div class="stats-info">
                    <h4>TOTAL EMPLOYER</h4>
                    <p>{{ $total_company }}</p>
                </div>
                <div class="stats-link">
                    <a href="{{ route('companies.index') }}">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-4 col-md-4 col-xs-4">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-clock"></i></div>
                <div class="stats-info">
                    <h4>TOTAL JOB OPPORTUNITY</h4>
                    <p>{{ $total_job }}</p>
                </div>
                <div class="stats-link">
                    <a href="{{ route('opportunities.index') }}">View Detail <i
                            class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->

    <div class="row">

        {{-- <div class="col-xl-6">
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
                </div>
                <div class="panel-body p-0">
                    <div id="employer-pie-chart"></div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="col-xl-6">
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
                </div>
                <div class="panel-body p-0">
                    <div id="candidate-pie-chart"></div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- end row -->

@endsection
