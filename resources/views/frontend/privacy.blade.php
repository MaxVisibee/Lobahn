@extends('layouts.master')

@section('content')

<div class="bg-gray-warm-pale text-white py-32 mt-28">
  <div class="flex flex-wrap justify-center items-center sign-up-card-section sign-up-card-section--login-section">
    <h1>Privacy Policy</h1>
    <div class="row">
    	{!! $privacy->description !!}
    </div>
  </div>
</div>

@endsection

@push('scripts')
  <script>
  </script> 
@endpush
