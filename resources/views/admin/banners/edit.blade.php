    @extends('admin.layouts.master')

@section('content')

<!-- begin #content -->
<!-- <div id="content" class="content"> -->
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">banners</a></li>
    <li class="breadcrumb-item active">Edit banners</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="page-header">Edit banners</h4>
<!-- end page-header -->
            
<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-xl-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <h4 class="panel-title"><!-- Edit Job Opportunity --></h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
        </div>
        <!-- end panel-heading -->
        <!-- begin panel-body -->
        <div class="panel-body">
            <form name="jobForm" id="jobForm" method="POST" action="{{ route('banners.update', $data->id) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group m-b-15">
                            <strong>Title<span class="text-danger">*</span>:</strong>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $data->title }}">
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Descriptions :</strong>
                            <textarea id="description" name="description" class="form-control ckeditor">{{ $data->description ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="imageInput">Banner Image</label>
                           <!--  <div class="mb-3" style="display: flex;"> 
                            @if ($data->banner_image)
                                <img src="{{ url('uploads/banner_image/' . $data->banner_image) }}" style="width: 100px;height: auto;" />
                            @else
                              <img src="{{ url('images/no_image.jpg') }}" style="width: 100px;height: auto;" class="img-thumbnail mb-3">
                            @endif
                            </div> -->
                            <div class="input-group">
                                @if(isset($data))                                
                                    <input type="file" name="banner_image" class="dropify" id="banner_image" data-default-file="{{ $data->banner_image ? url('uploads/banner_images/'.$data->banner_image):'' }}" accept="image/*;capture=camera,.png,.jpg,.jpeg" data-allowed-file-extensions="jpg jpeg png svg"/>
                                @else
                                    <input type="file" name="banner_image" class="dropify" id="banner_image" accept="image/*;capture=camera,.png,.jpg,.jpeg" data-allowed-file-extensions="jpg jpeg png svg"/>
                                @endif
                                <!-- <p class="small">Minimum Dimension (825px * 214px) ~ Maximum Dimensions (1280px * 332px)</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                           
                <br/>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-warning" href="{{ route('banners.index') }}">Back to Listing</a>
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
  .note-editor.note-airframe, .note-editor.note-frame{
    border: 1px solid rgba(0,0,0,.2) !important;
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
    $("#description").summernote({
        height: 200,
        tabsize: 4
    });
    $(document).ready(function() {

    });  
//End Document Ready
</script>
@endpush