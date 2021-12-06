<h2>DONEC SED VARIUS FEILS</h2>

@foreach ($news as $key => $new)
	<div class="row">
		<div class="col-md-6">
			<img class="img-fluid box-image" src='{{ asset("uploads/new_image/$new->news_image") }}' alt="{{ $new->title ?? '-' }}">
			<h3><a href="/news/{{$new->id}}">{{ $new->title ?? '' }}</a></h3>
			<p>{{ $new->category->category_name ?? '-'}}</p>
			<span>{{ $new->created_by ?? ''}}</span>
			<span>{{ Carbon\Carbon::parse($new->created_at)->format('d M Y h:m') }}</span>
			<h5>{!! $new->description ?? '' !!}</h5>
		</div>
	</div> 

@endforeach
                   