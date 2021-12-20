@extends('layouts.master')

@section('content')

<div class="bg-gray-warm-pale text-white py-32 mt-28">
  <div class="flex flex-wrap justify-center items-center sign-up-card-section sign-up-card-section--login-section">
    <h1>Community Details</h1>
        <div class="row">
            <h5 style="font-weight: bold;margin-right: 10px;">{{$community->title ?? ''}}</h5>
            <img class="img-fluid box-image" src='{{ asset("uploads/community_image/$community->community_image") }}' alt="{{ $community->title ?? '-' }}">
            <p>{{$community->created_by ?? '-'}}</p>
            <span>{{ Carbon\Carbon::parse($community->created_at)->format('d M Y h:m') }}</span>
            {!! $community->description !!} 
        </div>
  </div>
</div>

@endsection

@push('scripts')
  <script>
  </script> 
@endpush