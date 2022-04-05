@extends('layouts.frontend-master')

@section('content')
    <div class="bg-gray-warm-pale terms-conditions-container mt-28 md:py-20 py-16">
        <div class=" mx-auto">
            <h1 class="text-center text-3xl lg:text-4xl xl:text-5xl text-white">PRIVACY STATEMENT</h1>
            <div class="privacy-text-box text-gray-pale mt-12 overflow-hidden relative" id="privacy-text-box">
                <p class="sign-up-form__information"><span>{!! date('M d ,Y', strtotime($privacy->updated_at ?? '')) !!}</span></p>
                {!! $privacy->description ?? '' !!}
                <div class="layer bg-cover bg-no-repeat bg-center absolute bottom-0 left-0 w-full">
                </div>
            </div>
            <button type="button" class="uppercase text-lime-orange text-lg font-heavy mt-8 readmore-btn">Read More</button>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.privacy-text-box').find('.p1 , ul li').css({
                "color": "white",
                'font-family': 'futura-pt,sans-serif',
                'font-size': '20px'
            });
            console.log("Work!");
        });
    </script>
@endpush
