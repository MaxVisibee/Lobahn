@extends('admin.layouts.master')

@section('content')


<!-- begin #content -->
<!-- <div id="content" class="content"> -->
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Suitability Ratios</a></li>
    <li class="breadcrumb-item active">Create New Ratio</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="page-header">Suitability Ratio Management</h4>
<!-- end page-header -->
            
<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-xl-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <h4 class="panel-title">Create New Ratio</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <!-- end panel-heading -->
        <!-- begin alert -->
        @if (count($errors) > 0)
        <div class="alert alert-secondary fade show">
            <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            </button>
            
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                 @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                 @endforeach
              </ul>
            </div>
          
        </div>
        @endif
        <!-- end alert -->
        <!-- begin panel-body -->
        <div class="panel-body">

            {!! Form::open(array('route' => 'suitability-ratios.store','method'=>'POST', 'id'=>'adminForm', 'name'=>'adminForm')) !!}
                
            @include('admin.suitability_ratios._form')
                
            {!! Form::close() !!}
        </div>
        <!-- end panel-body -->
    </div>
</div>

@endsection