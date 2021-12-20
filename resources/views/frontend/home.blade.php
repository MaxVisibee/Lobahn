@extends('layouts.master')
	@section('content')
		<div class="container" style="margin-top: 7em;">			
		    <h1>Top Employer</h1><br/>
		    <div class="row subject-box">
		        <div class="col-4 employer-logo">
		            <img src="{{ asset('images/logo.svg') }}" alt="Lobahn">
		        </div>
		    </div>
		</div>	

		<h3>Featured Members</h3>
		<!-- @foreach ($seekers as $key => $seeker)
		<div class="row">
			<div class="">
				<img class="img-fluid1 box-image1" src='{{ asset("uploads/profile_photos/$seeker->image") }}' alt="{{ $partner->partner_name ?? '-' }}">
				<h5>{{ $seeker->first_name ?? '' }}{{ $seeker->last_name ?? '' }}</h5>
			</div>
		</div>
		@endforeach -->

		<!-- <h3>Partners</h3>
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
		@endforeach -->

		<h3>Become A  Member</h3>
		<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>
		<a href="/" class="button">Join Today</a>
@endsection

@push('scripts')

@endpush
