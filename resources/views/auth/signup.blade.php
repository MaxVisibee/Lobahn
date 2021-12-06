@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-6 col-6 text-center">
                    <a href="{{url('/signup-career-opportunities')}}">Explore career Opportunities</a>
                </div>
                <div class="col-sm-6 col-6 text-center">
                    <a href="{{url('/signup-talent')}}">Discover new talent</a>

                    {{-- <a href="{{url('/signup-business-opportunities')}}">Business Opportunities</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
