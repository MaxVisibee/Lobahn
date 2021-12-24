@extends('layouts.master')

@section('content')

<div class="faq-container bg-gray-warm-pale md:pt-36 pt-24 pb-36">
    <p class="uppercase xl:text-5xl md:text-4xl text-3xl text-white font-book py-12 text-center">frequently asked questions</p>
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
            <p class="text-center text-21 text-gray-pale font-book">If you have any further questions,
                 please contact us by e-mail at <a href="mailto:info@lobahn.com" class="text-lime-orange underline cursor-pointer">info@lobahn.com</a></p>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

@push('css')
<style>
.faqcontent p{
  --tw-text-opacity: 1;
  color: rgba(186,186,186,var(--tw-text-opacity));
  font-size: 21px;
 }
</style>
@endpush
@push('scripts')
  <script>
  </script> 
@endpush

<!-- @foreach ($faqs as $key => $faq)
	<div class="row">
		<div class="col-md-6">
			<h3>{{ $faq->question ?? '' }}</h3>
			<span>{!! $faq->answer ?? '' !!}</span>
		</div>
	</div>
@endforeach -->
                   