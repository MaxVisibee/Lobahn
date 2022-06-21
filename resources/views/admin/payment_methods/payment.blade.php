@extends('admin.layouts.master')

@section('content')


    <!-- begin #content -->
    <!-- <div id="content" class="content"> -->
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Payment Settings</a></li>
        <li class="breadcrumb-item active">Edit Payment Setting</li>
    </ol>
    <!-- end breadcrumb -->

    <!-- begin page-header -->
    <h4 class="page-header">Payment Management</h4>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Edit Payment Setting</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                            data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                            data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                            data-click="panel-collapse"><i class="fa fa-minus"></i></a>
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

                    {!! Form::model($siteSetting, ['method' => 'PATCH', 'route' => ['edit-payment.update', $siteSetting->id], 'id' => 'paymentForm', 'name' => 'paymentForm', 'files' => true]) !!}

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group row m-b-15">
                                <strong>Stripte Key</strong>
                                {!! Form::text('stripe_key', null, ['placeholder' => 'Stripe Key', 'class' => 'form-control', 'id' => 'stripe_key']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group row m-b-15">
                                <strong>Stripte Secret</strong>
                                {!! Form::text('stripe_secret', null, ['placeholder' => 'Stripe Secret', 'class' => 'form-control', 'id' => 'stripe_secret']) !!}
                            </div>
                        </div>
                    </div>

                    @can('admin-edit')
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <a class="btn btn-warning" href="{{ route('edit-payment.index') }}">Back to Listing</a>
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    @endcan
                    {!! Form::close() !!}
                </div>
                <!-- end panel-body -->
            </div>
        </div>

    @endsection
