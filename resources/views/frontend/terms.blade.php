@extends('layouts.master')

@section('content')

<div class="bg-gray-warm-pale terms-conditions-container md:pt-52 pt-32 pb-28">
    <p class="uppercase text-white lg:text-5xl md:text-4xl text-3xl text-center pb-12">terms and conditions</p>
    <div id="terms-content" class="text-21 text-gray-pale font-book terms-content">
    	<p class="pb-6">Last updated [{!! date('M d ,Y', strtotime($term->updated_at ?? '')) !!}]</p>
        <p class="uppercase pb-6 font-heavy">{{ $term->title ?? '' }}</p>
        {!! $term->description ?? '' !!}
        <p class="uppercase readmore-terms-btn text-lg font-heavy text-lime-orange pt-8 cursor-pointer
         outline-none focus:outline-none">Read More</p>
    </div>
</div>

@endsection

@push('scripts')
  <script>
  </script> 
@endpush