@extends('layouts.frontend-master')

@section('content')
    <div class="bg-gray-warm-pale terms-conditions-container mt-28 md:py-20 py-16">
        <div class=" mx-auto">
            <h1 class="text-center text-3xl lg:text-4xl xl:text-5xl text-white uppercase">PRIVACY STATEMENT</h1>
            <div id="terms-text-box" class="privacy-text-box text-gray-pale mt-12 overflow-hidden relative"
                id="privacy-text-box">
                <p class="sign-up-form__information"><span>{!! date('d M Y', strtotime($privacy->updated_at ?? '')) !!}</span></p>
                {!! $privacy->description ?? '' !!}
                <br />
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
            $('.custom-nav').addClass('notransparent')
            $('#terms-text-box').find('.p1 , ul li , p').removeAttr('style');
            $('#terms-text-box').find('.p1 , ul li , p').addClass(
                'text-21 text-gray-pale font-book pt-5 tracking-wider');
            $('#terms-text-box').find('a').addClass('cursor-pointer hover:text-lime-orange font-book');
            $('div.content').children('p').addClass('text-21 text-gray-pale font-book pt-5 tracking-wider');
            console.log("Work!");
        });
    </script>
@endpush
