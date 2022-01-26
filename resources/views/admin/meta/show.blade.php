@extends('admin.layouts.master')
@section('content')
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">CMS</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Meta</a></li>
        <li class="breadcrumb-item active">MetaDetails</li>
    </ol>
    <h4 class="bold content-header"> Meta Details<small> </small></h4>
    <div id="footer" class="footer" style="margin-left: 0px"></div>
    <div class="row m-b-10">
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Id:</strong>
                                {{ isset($data->id) ? $data->id : '' }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Page Name:</strong>
                                {{ isset($data->page_name) ? $data->page_name : '-' }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Page URL:</strong>
                                {{ isset($data->page_url) ? $data->page_url : '-' }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title:</strong>
                                {!! isset($data->title) ? $data->title : '-' !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                {!! isset($data->description) ? $data->description : '-' !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2></h2>
                        </div>
                        <div class="pull-right" style="margin-right: 10px;">
                            <a class="btn btn-warning" href="{{ route('meta.index') }}"> Back to Listing </a>
                        </div>
                    </div>
                </div><br />
            </div>
        </div>
    </div>
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
            class="fa fa-angle-up"></i></a>
    </div>
@endsection
