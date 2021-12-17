@extends('layouts.master')
@section('content')
    <div class="container">

        <h1>Candidate Dashboard</h1>
        <ul>
            <li>{{ $user->name }}</li>
            <li>{{ $user->user_name }}</li>
            <li>{{ $user->phone }}</li>
        </ul>
        <br>
        <h1>Opportunites</h1>
        <ul>
            @foreach ($opportunities as $key => $opportunity)
                <li><a href="{{ url('opportunity/' . $opportunity->id) }}">{{ $opportunity->jobTitle->job_title ?? ''}}</a>
                </li>
            @endforeach
        </ul>
    </div>

@endsection

@push('scripts')

@endpush
