@extends('layouts.master')

@section('content')

<div class="bg-gray-warm-pale text-white py-32 mt-28">
  <div class="flex flex-wrap justify-center items-center sign-up-card-section sign-up-card-section--login-section">
    <h1>Events</h1>
    @foreach ($events as $key => $event)
		<div class="row">
			<div class="col-md-6">
				<img class="img-fluid box-image" src='{{ asset("uploads/events/$event->event_image") }}' alt="{{ $event->event_title ?? '-' }}">
				<h3><a href="/event/{{$event->id}}">{{ $event->event_title ?? '' }}</a></h3>
				<span>{{ $event->created_by ?? ''}}</span>
				<span>{{ Carbon\Carbon::parse($event->created_at)->format('d M Y h:m') }}</span>
				<h5>{!! $event->description ?? '' !!}</h5>
			</div>
		</div>
	@endforeach
  </div>
</div>

@endsection

@push('scripts')
  <script>
  </script> 
@endpush

                   