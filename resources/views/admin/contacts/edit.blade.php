@extends('admin.layouts.master')

@section('content')

<!-- begin #content -->
<!-- <div id="content" class="content"> -->
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Contact</a></li>
    <li class="breadcrumb-item active">Edit Contact</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="page-header">Edit Contact</h4>
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
            <form name="jobForm" id="jobForm" method="POST" action="{{ route('contacts.update', $data->id) }}">
                <input type="hidden" name="_method" value="PATCH">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group row m-b-15">
                            <strong>Title<span class="text-danger">*</span>:</strong>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $data->title }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group row m-b-15">
                            <strong>Phone:</strong>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $data->phone }}">
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group row m-b-15">
                            <strong>Fax:</strong>
                            <input type="text" name="fax" id="fax" class="form-control" value="{{ $data->fax }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group row m-b-15">
                            <strong>Email:</strong>
                            <input type="text" name="email" id="email" class="form-control" value="{{ $data->email }}">
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group row m-b-15">
                            <strong>Website:</strong>
                            <input type="text" name="website" id="website" class="form-control" value="{{ $data->website }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group row m-b-15">
                            <strong>Address:</strong>
                            <input type="text" name="address" id="address" class="form-control" value="{{ $data->address }}">
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Google Map :</strong>
                            <textarea id="map" name="map" class="form-control ckeditor">{{ $data->map ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
                             
                <br/>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-warning" href="{{ route('contacts.index') }}">Back to Listing</a>
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

<!-- add new js file -->
@section('js')
<script type="text/javascript">
    $(document).ready(function() {

    });  
//End Document Ready
</script>
@stop