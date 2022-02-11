@extends('admin.layouts.master')

@section('content')

    <!-- begin #content -->
    <!-- <div id="content" class="content"> -->
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Community</a></li>
        <li class="breadcrumb-item active">Create New Community</li>
    </ol>
    <!-- end breadcrumb -->

    <!-- begin page-header -->
    <h4 class="page-header">Create New Post</h4>
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
                    <form name="jobForm" id="jobForm" method="POST" action="{{ route('communities.store') }}"
                        enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group m-b-15">
                                    <strong>Title<span class="text-danger">*</span>:</strong>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title') }}" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Categories</strong>
                                    <select name="category" id="category" class="form-control" required>
                                        <option value="">Select</option>
                                        @foreach (App\Models\Community::POST_TYPES as $key => $value)
                                            <option value="{{ $value }}">{{ $value ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Users</strong>
                                    <select name="user_id" id="  user_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($users as $key => $user)
                                            <option value="{{ $user->id }}" {{ old('user_id') ? 'selected' : '' }}>
                                                {{                                                 $user->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    {{-- <strong>Started Date</strong>
                                <input type="date" name="started_date" id="started_date" class="form-control"
                                    value="{{old('started_date')}}" placeholder="Started Date"> --}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Description :</strong>
                                    <textarea id="description" name="description" class="form-control ckeditor"></textarea>
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
                        </div><br />
                        {{-- <div class="row">
                        <div class="form-group">
                            <strong>Community Images:</strong><br />
                            <div class="col-xs-12 col-sm-12 col-md-12" id="image_wrap">
                                <div class="form-group inputFormRow">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="file" class="" id="image" name="image[]">
                                        </div>
                                        <div class="col-md-3">
                                            <button id="add_new_row_for_image" type="button" class="btn btn-success"
                                                style="margin-top: 0px;">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-warning" href="{{ route('communities.index') }}">Back to Listing</a>
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

    @push('css')
        <style>
            .note-editor.note-airframe,
            .note-editor.note-frame {
                border: 1px solid rgba(0, 0, 0, .2) !important;
            }

        </style>
    @endpush

    @push('scripts')

        <!-- summernote -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <!-- summernote -->
        <script>
            $("#description").summernote({
                height: 200,
                tabsize: 4
            });
            //End Document Ready
        </script>
        <script type="text/javascript">
            $(document).ready(function() {

            });
            //End Document Ready
        </script>
        <script>
            $(function() {
                let max_attach_number = 9
                // add new attachment for business
                $("#add_new_row_for_image").click(function() {
                    let numItems = $('.new_image_row').length
                    if (numItems < max_attach_number) {
                        var html = '';
                        html += '<div class="form-group new_image_row">';
                        html += '<div class="row">';
                        html += '<div class="col-md-5">';
                        html += '<input type="file" name="image[]" class="" >';
                        html += '</div>';
                        html += '<div class="col-md-3">';
                        html +=
                            '<button type="button" class="btn btn-danger btn-sm remove_business_attached" style="margin-top: 0px;">X</button>';
                        html += '</div>';
                        console.log(html);
                        $('#image_wrap').append(html);
                    }
                });

                // remove business attachment row
                $(document).on('click', '.remove_business_attached', function() {
                    $(this).closest('.new_image_row').remove();
                });
            })
        </script>
    @endpush
