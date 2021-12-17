@extends('layouts.master')
@section('content')
    <div class="container">

        <h1>Top Employer</h1><br />

        <ul>
            <li>{{ $user->name }}</li>
            <li>{{ $user->user_name }}</li>
        </ul>

    </div>

@endsection

@push('scripts')

@endpush
