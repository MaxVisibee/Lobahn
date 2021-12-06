<h1>Event Details</h1>

<section class="editor-section">
    <div class="container">
        <div class="row">
            <div class="col col-sm-12">
                <div class="card-editor">
                    <div class="card-text">
                        <div class="label-section">
                            <h5 style="font-weight: bold;margin-right: 10px;">{{$event->title ?? ''}}</h5>
                            <img class="img-fluid box-image" src='{{ asset("uploads/events/$event->event_image") }}' alt="{{ $event->title ?? '-' }}">
                            <p>{{$event->created_by ?? '-'}}</p>
                            <span>{{ Carbon\Carbon::parse($event->created_at)->format('d M Y h:m') }}</span>
                        </div>
                        {!! $event->description !!}                   
                    </div>
                </div>            
            </div>
        </div>
    </div>
</section>