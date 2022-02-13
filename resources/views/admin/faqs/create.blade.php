@extends('admin.layouts.master')

@section('content')

    <!-- begin #content -->
    <!-- <div id="content" class="content"> -->
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Faqs</a></li>
        <li class="breadcrumb-item active">Create New Faqs</li>
    </ol>
    <!-- end breadcrumb -->

    <!-- begin page-header -->
    <h4 class="page-header">Create New Faqs</h4>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <!-- Create New Job Opportunity -->
                    </h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                            data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                            data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                            data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body">
                    <form name="jobForm" id="jobForm" method="POST" action="{{ route('faqs.store') }}">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>Question<span class="text-danger">*</span>:</strong>
                                    <input type="text" name="question" id="question" class="form-control"
                                        value="{{ old('question') }}" placeholder="Question">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Answer :</strong>
                                    <textarea id="answer" name="answer" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Created By :</strong>
                                    <input type="text" name="created_by" id="created_by" class="form-control"
                                        value="{{ old('created_by') }}" placeholder="CreatedBy">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group row m-b-15">
                            <strong> <input type="checkbox" name="is_active" id="is_active" value="1" checked> Is Active? </strong>
                        </div>
                    </div>                    
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group m-b-15">
                            <strong> <input type="checkbox" name="is_default" id="is_default" value="1"> Is Default? </strong>
                        </div>
                    </div>
                </div> --}}
                        <br />
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-warning" href="{{ route('faqs.index') }}">Back to Listing</a>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end panel-body -->
            </div>
        </div>

    @endsection

    <!-- add new js file -->
    @push('css')
        <style>
            .note-editor.note-airframe,
            .note-editor.note-frame {
                border: 1px solid rgba(0, 0, 0, .2) !important;
            }

        </style>
    @endpush

    <!-- add new js file -->
    @push('scripts')
        <!-- summernote -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <!-- summernote -->
        <script>
            // $("#answer").summernote({
            //     height: 200,
            //     tabsize: 4
            // });
            $(document).ready(function() {

            });
            //End Document Ready
        </script>
    @endpush
