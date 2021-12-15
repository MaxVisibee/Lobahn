@extends('layouts.master')
@section('content')
    <div class="container">

        <h1>Company</h1>
        <ul>
            <li>{{ $company->name }}</li>
            <li>{{ $company->description }}</li>
    </div>

@endsection

@push('scripts')

@endpush
