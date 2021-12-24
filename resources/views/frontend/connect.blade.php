@extends('layouts.master')

@section('content')
<div class="relative lg:mt-0 md:mt-24 mt-20">
    <img src="./img/premium/1.png" class="w-full object-cover events-banner-container-img"/>
    <div class="absolute premium-content top-1/2 left-1/2">
        <p class="text-white lg:text-5xl text-4xl font-book whitespace-nowrap text-center">Lobahn Connect<sup class="font-book md:text-lg text-base">TM</sup></p>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> 
@endpush
