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

		<h3>Featured Members</h3>
		@foreach ($seekers as $key => $seeker)
		<div class="row">
			<div class="">
				<img class="img-fluid1 box-image1" src='{{ asset("uploads/profile_photos/$seeker->image") }}' alt="{{ $partner->partner_name ?? '-' }}">
				<h5>{{ $seeker->first_name ?? '' }}{{ $seeker->last_name ?? '' }}</h5>
			</div>
		</div>
		@endforeach

		<h3>Partners</h3>
		@foreach ($partners as $key => $partner)
		<div class="row">
			<div class="">
				<img class="img-fluid1 box-image1" src='{{ asset("uploads/partner_logo/$partner->partner_logo") }}' alt="{{ $partner->partner_name ?? '-' }}">
				<h5>{{ $partner->partner_name ?? '' }}</h35>
			</div>
		</div>
		@endforeach
		<br/>
		<h3>Events</h3>
        @foreach ($events as $key => $event)
	        <div class="row">
	            <div class="col-md-6">
	                <img class="img-fluid box-image" src='{{ asset("uploads/events/$event->event_image") }}' alt="{{ $event->event_title ?? '-' }}">
	                <h3><a href="/event/{{$event->id}}">{{ $event->event_title ?? '' }}</a></h3>
	                <span>{{ Carbon\Carbon::parse($event->created_at)->format('d M Y') }}</span>
	                <span>{{ Carbon\Carbon::parse($event->created_at)->format('h:M') }}</span>
	            </div>
	        </div> 
		@endforeach
@endsection

@push('scripts')

@endpush
