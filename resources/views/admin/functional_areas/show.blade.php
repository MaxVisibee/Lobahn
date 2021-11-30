@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4> Show Job Opportunity</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>JobTitle:</strong>
            {{ $data->name ?? '-' }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Position:</strong>
            {{ $data->position ?? '-' }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Company:</strong>
            {{ $data->company ?? '-' }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Location:</strong>
            {{ $data->location ?? '-' }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Gender:</strong>
            {{ $data->gender ?? '-' }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Posted Date:</strong>
            {{ $data->created_at->format('d/m/Y')}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Requirements:</strong>
            {!! $data->requirement ?? '-' !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Description:</strong>
            {!! $data->description ?? '-' !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2></h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('opportunities.index') }}"> Back to Listing </a>
        </div>
    </div>
</div>
@endsection