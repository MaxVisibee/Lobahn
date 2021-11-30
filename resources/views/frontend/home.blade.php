@extends('layouts.master')
	@section('content')
		<div class="container">
		    <h1>Top Employer</h1><br/>
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
		<h3>Partners</h3>
		@foreach ($partners as $key => $partner)
		<div class="row">
			<div class="">
				<img class="img-fluid1 box-image1" src='{{ asset("uploads/partner_logo/$partner->partner_logo") }}' alt="{{ $partner->partner_name ?? '-' }}">
				<h5>{{ $partner->partner_name ?? '' }}</h35>
			</div>
		</div>
		@endforeach
@endsection

@push('scripts')

@endpush
