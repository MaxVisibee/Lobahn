@extends('layouts.master')
@section('content')
    <div class="container">

        <h1>Candidate Dashboard</h1>

        <ul>
            <li> Company Name - {{ $opportunity->company->name }}</li>
            <li> Company Description - {{ $opportunity->company->description }}</li>
            <li> Listing Date{{ $opportunity->company->listing_date }}</li>
            <li> Location - {{ $opportunity->company->location }}</li>
            <li> Language - {{ $opportunity->company->language->language_name }}</li>
            <li> Industary - {{ $opportunity->company->industry->industry_name }}</li>
            <li> Area - {{ $opportunity->functionalArea->area_name }}</li>
            <li> Carrier Level - {{ $opportunity->carrier->carrier_level }}</li>
            <li> Job Type - {{ $opportunity->jobType->job_type }}</li>
            <li> Job Description - {{ $opportunity->description }}</li>

        </ul>

        <a href="{{ url('opportunity/connect/' . $opportunity->id) }}" class="btn btn-primary">Connect</a>
    </div>

@endsection

@push('scripts')

@endpush
