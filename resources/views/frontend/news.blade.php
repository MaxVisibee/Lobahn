@extends('layouts.master')

@section('content')

<div class="bg-gray-warm-pale text-white py-32 mt-28">
  <div class="flex flex-wrap justify-center items-center sign-up-card-section sign-up-card-section--login-section">
    <h1>News</h1>
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
  </div>
</div>
@endsection
@push('scripts')
  <script>
  </script> 
@endpush
    