@extends('layouts.master')
@section('content')
    <div class="container">

        <h1>Top Employer</h1><br />

        <ul>
            <li>{{ $user->name }}</li>
            <li>{{ $user->user_name }}</li>
            <li>{{ $user->phone }}</li>
            <li>{{ $user->country->country_name }}</li>
            <li>{{ $user->jobExperience->job_experience }}</li>
            <li>{{ $user->functionalArea->area_name }}</li>
            <li>{{ $user->industry->industry_name }}</li>
            <li>{{ $user->degree->degree_name }}</li>
        </ul>

    </div>



@endsection

@push('scripts')

@endpush
