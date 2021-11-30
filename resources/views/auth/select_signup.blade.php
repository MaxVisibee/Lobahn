@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-6 col-6 text-center">
                    <h2>ALREDY A MEMBER?</h2>
                    <a href="{{route('login')}}" class="btn btn-outline">Login</a>
                </div>
                <div class="col-sm-6 col-6 text-center">
                    <h4>Your are looking for...</h4>

                    <div class="row">
                        <div class="col">
                            <a href="{{url('/signup-top-talent')}}">Top Talent</a>
                        </div>
                        <div class="col">
                            <a href="{{url('/signup-career-opportunities')}}">Career Opportunities</a>
                        </div>
                        <div class="col">
                            <a href="{{url('/signup-business-opportunities')}}">Business Opportunities</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
