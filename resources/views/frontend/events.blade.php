<h2>Events</h2>

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
                   