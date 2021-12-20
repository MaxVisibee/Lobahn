@extends('layouts.master')

@section('content')

<div class="bg-gray-warm-pale text-white py-32 mt-28">
  <div class="flex flex-wrap justify-center items-center sign-up-card-section sign-up-card-section--login-section">
    <h1>DONEC SED VARIUS FEILS</h1>
    @foreach ($communities as $key => $community)
		<div class="row">
			<div class="col-md-6">
				@foreach($community->images as $key => $image)
	                @php
	                    $url = \Storage::url('community_image/'.$image->image);
	                    $path = asset($url);
	                @endphp
	                <li style="width: 100%;list-style: none;margin: 5px 0;">
	                    <img class="" src="{{ $path }}" alt="{{ $data->title ?? '-' }}" max-width="300px" height="auto">
	                </li>
	            @endforeach
				<h3><a href="/community/{{$community->id}}">{{ $community->title ?? '' }}</a></h3>
				<span>{{ $community->created_by ?? ''}}</span>
				<span>{{ Carbon\Carbon::parse($community->created_at)->format('d M Y h:m') }}</span>
				<h5>{!! $community->description ?? '' !!}</h5>
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