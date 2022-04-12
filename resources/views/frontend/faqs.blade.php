@extends('layouts.frontend-master')

@section('content')
    <div class="faq-container bg-gray-warm-pale md:pt-36 pt-24 pb-36">
        <p class="uppercase xl:text-5xl md:text-4xl text-3xl text-white font-book py-12 text-center">frequently asked
            questions</p>
        <div class="">
            @foreach ($faqs as $key => $faq)
                <div class="flex justify-center mt-5">
                    <div class="xl:w-62percent w-full">
                        <div
                            class="rounded-lg  md:px-8 px-4 cursor-pointer faq-collapse text-21 text-gray-pale font-book bg-gray py-4 flex justify-between">
                            <p>{{ $faq->question ?? '' }}</p>
                            <img src="./img/events/dropdown.png" class="object-contain faqdropdownicon" />
                        </div>
                        <div class="bg-gray-warm faqcontent  md:px-8 px-4 py-6 rounded-lg">
                            <p class="text-21 text-gray-pale">
                                {!! $faq->answer ?? '' !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-12">
                <p class="text-center text-21 text-gray-pale font-book">CONTACT INFORMATION</p>
                <p class="text-center text-21 text-gray-pale font-book">
                    If you can’t find the answers you are looking for here, let us help you. <br> Whatsapp: <a
                        href="https://wa.me/85288888888">+852 8888 8888</a>
                    Email:<a href="mailto:support@lobahn.com" class="text-lime-orange cursor-pointer">
                        support@lobahn.com</a>
                </p>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .faqcontent p {
            --tw-text-opacity: 1;
            color: rgba(186, 186, 186, var(--tw-text-opacity));
            font-size: 21px;
        }

    </style>
@endpush
@push('scripts')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script>
    </script>
@endpush
