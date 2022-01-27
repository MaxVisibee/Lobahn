@extends('admin.layouts.master')
@section('content')
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Meta</a></li>
        <li class="breadcrumb-item active">Edit Meta</li>
    </ol>
    <h4 class="page-header">Edit Meta</h4>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    </h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                            data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                            data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                            data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('meta.update', $data->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>Page Name<span class="text-danger">*</span>:</strong>
                                    <input type="text" name="page_name" id="page_name" class="form-control"
                                        value="{{ $data->page_name ?? '' }}" placeholder=" Page Name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Page URL</strong>
                                    <input type="text" name="page_url" id="page_url" class="form-control"
                                        value="{{ $data->page_url ?? '' }}" placeholder="Page URl">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group row m-b-15">
                                    <strong>Meta Title</strong>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ $data->title ?? '' }}" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Meta Descriptions :</strong>
                                    <textarea id="description" name="description"
                                        class="form-control ckeditor">{{ $data->description ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-warning" href="{{ route('meta.index') }}">Back to Listing</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end panel-body -->
            </div>
        </div>

    @endsection

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
            // $("#description").summernote({
            //     height: 200,
            //     tabsize: 4
            // });
            $(document).ready(function() {

            });
            //End Document Ready
        </script>
    @endpush
