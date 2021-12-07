@extends('layouts.master')

@section('content')

<div class="container">
    {{Auth::guard('company')->user()->id}}
    <h1>Company</h1>
    
    <div class="row subject-box">
        <div class="col-4 employer-logo">
            <img src="{{ asset('images/logo.svg') }}" alt="Lobahn">
        </div>
        <div class="col-4 employer-logo">
            <img src="{{ asset('images/logo.svg') }}" alt="Lobahn">
        </div>
        <div class="col-4 employer-logo">
            <img src="{{ asset('images/logo.svg') }}" alt="Lobahn">
        </div>
        <div class="col-4 employer-logo">
            <img src="{{ asset('images/logo.svg') }}" alt="Lobahn">
        </div>
        <div class="col-4 employer-logo">
            <img src="{{ asset('images/logo.svg') }}" alt="Lobahn">
        </div>
        <div class="col-4 employer-logo">
            <img src="{{ asset('images/logo.svg') }}" alt="Lobahn">
        </div>
        <div class="col-4 employer-logo">
            <img src="{{ asset('images/logo.svg') }}" alt="Lobahn">
        </div>
        <div class="col-4 employer-logo">
            <img src="{{ asset('images/logo.svg') }}" alt="Lobahn">
        </div>
        <div class="col-4 employer-logo">
            <img src="{{ asset('images/logo.svg') }}" alt="Lobahn">
        </div>
    </div>

</div>

@endsection

@push('scripts')

@endpush
