@extends('admin.layouts.master')

@section('content')

<!-- begin #content -->
<!-- <div id="content" class="content"> -->
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Speciality</a></li>
    <li class="breadcrumb-item active">Create New Speciality</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="page-header">Create New Speciality</h4>
<!-- end page-header -->
            
<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-xl-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <h4 class="panel-title"><!-- Create New Job Opportunity --></h4>
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
            <form name="jobForm" id="jobForm" method="POST" action="{{ route('specialities.store') }}">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group row m-b-15">
                            <strong>Speciality Name<span class="text-danger">*</span>:</strong>
                            <input type="text" name="speciality_name" id="speciality_name" class="form-control" value="{{old('speciality_name')}}" placeholder="Speciality Name">
                        </div>
                    </div>
                    
                </div>
                <!-- <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <div class="switcher switcher-success">
                                <input type="checkbox" name="switcher_checkbox_1" id="switcher_checkbox_1" checked="" value="1">
                                <label for="switcher_checkbox_1">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <div class="switcher switcher-success">
                                <input type="checkbox" name="switcher_checkbox_1" id="switcher_checkbox_1" checked="" value="1">
                                <label for="switcher_checkbox_1">Active</label>
                            </div>
                        </div>
                    </div>
                </div> -->                
                <br/>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-warning" href="{{ route('specialities.index') }}">Back to Listing</a>
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
@section('js')
<script type="text/javascript">
    $(document).ready(function() {

    });  
//End Document Ready
</script>
@stop