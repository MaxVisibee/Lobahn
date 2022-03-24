@extends('layouts.frontend-master')

@section('content')
    <div id="" class="bg-gray-warm-pale terms-conditions-container md:pt-52 pt-32 pb-28">
        <p class="uppercase text-white lg:text-5xl md:text-4xl text-3xl text-center pb-12">terms and conditions</p>
        <div id="terms-text-box" class="text-21 text-gray-pale font-book terms-text-box overflow-hidden relative">
            <p class="pb-6">Last updated [{!! date('M d ,Y', strtotime($term->updated_at ?? '')) !!}]
            </p>
            <p class="uppercase pb-6 font-heavy">AGREEMENT TO TERMS</p>
            {!! $term->description ?? '' !!}
            <div class="term-layer bg-cover bg-no-repeat bg-center absolute bottom-0 left-0 w-full">
            </div>
        </div>
        <div
            class="uppercase readmore-terms-btn text-lg font-heavy mt-4 text-lime-orange cursor-pointer outline-none focus:outline-none">
            Read More</div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#terms-text-box').find('.p1 , ul li , p').removeAttr('style');
            $('#terms-text-box').find('.p1 , ul li , p').addClass(
                'text-21 text-gray-pale font-book pt-5 tracking-wider');
            $('#terms-text-box').find('a').addClass('cursor-pointer hover:text-lime-orange font-book');
            $('div.content').children('p').addClass('text-21 text-gray-pale font-book pt-5 tracking-wider');
        });
    </script>
@endpush
