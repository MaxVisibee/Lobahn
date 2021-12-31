@extends('layouts.master')

@section('content')
<div class="w-full md:pt-0 ">
    <div class="relative events-banner-container">
        <img src="./img/news/newbanner.png" class="w-full object-cover object-bottom eventbanner-image" />
        <div class="absolute premium-content top-1/2 left-1/2 text-center sm-custom-480:pt-0 pt-4">
            <p class="text-5xl text-white font-book whitespace-nowrap ctbanner-title">Events</p>
        </div>
    </div>
</div>

<div class="bg-gray-warm-pale spotlight-container py-20">
    <div class="md:flex lg:mt-0 mb-12">
        <div class="select-wrapper-event text-gray-pale">
            <div class="select-event-box">
                <div class="event__trigger py-2 relative flex items-center text-gray justify-between pl-2 bg-gray-light2 cursor-pointer">
                    <span class="">All Events</span>
                    <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg" width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                        <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                            transform="translate(19.414 -16.586) rotate(90)" fill="none" stroke="#2F2F2F"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </div>
                <form class="row gx-3">
                    <div class="mt-1 custom-options-event absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer w-48 border border-white" name="year" id="year">                    
                        <div class="custom-option-event flex pb-4 pr-4 relative transition-all hover:bg-gray-light3 hover:text-gray h-8"
                            data-value="All Events">
                            <div class="flex absolute checkIcon_box">
                                <img class="mr-2 checkedIcon" src="./img/dashboard/checked.svg" />
                            </div>
                            <span class="custom-content-container text-gray pl-4">All Events</span>
                        </div>
                        <div class="custom-option-event flex pb-4 pr-4 relative transition-all hover:bg-gray-light3 hover:text-gray h-8" data-value="2021" value="2021" {{ (Request::get('year') == '2021') ? 'selected' : '' }}>
                            <div class="flex absolute checkIcon_box">
                                <img class="mr-2 checkedIcon hidden" src="./img/dashboard/checked.svg" />
                            </div>
                            <span class="custom-content-container text-gray pl-4">2021</span>
                        </div>
                        <div class="custom-option-event flex pb-4 pr-4 relative transition-all hover:bg-gray-light3 hover:text-gray h-8" data-value="2020" value="2020" {{ (Request::get('year') == '2020') ? 'selected' : '' }}>
                            <div class="flex absolute checkIcon_box">
                                <img class="mr-2 checkedIcon hidden" src="./img/dashboard/checked.svg" />
                            </div>
                            <span class="custom-content-container pl-4 text-gray">2020</span>
                        </div>                    
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="grid md:grid-cols-2 overflow-hidden gap-4">
        <div class="md:col-span-2  relative">
            <div class="relative spotlight-image-container1">
                <div class="spotlight-image1 spotlight-img-zoom-out overflow-hidden">
                    <img src="{{ asset('uploads/events/' . $title_event->event_image) }}" class="w-full object-contain" style="visibility: hidden;width: 930px;height: 399px;" />
                </div>
                <div class="absolute spotlight-content pl-4 xl:pl-8 events-title-box">
                    <p class="text-white font-heavy text-lg xl:text-2xl spotlight-description leading-snug md:mt-8 mt-4"><a href="/event/{{$title_event->id}}">{{ $title_event->event_title ?? ''}}</a></p>
                    <div class="flex text-base xl:text-21">
                        <p class="text-gray-pale font-book">{!! date('d M Y', strtotime($title_event->event_date ?? '')) !!}</p>
                        <p class="ml-10 text-gray-pale font-book">{!! date('h:m', strtotime($title_event->event_time ?? '')) !!}</p>
                    </div>
                </div>
            </div>
        </div>
        @foreach($events as $key=> $event)
            <div class="col-span-1">
                <div class="relative spotlight-image-container2">
                    <div class="spotlight-image2 spotlight-img-zoom-out overflow-hidden">
                        <img src="{{ asset('uploads/events/' . $event->event_image) }}" class="w-full object-contain" style="" />
                    </div>
                    <div class="absolute spotlight-content pl-4 xl:pl-8 events-title-box">
                        <p class="text-white font-heavy text-lg xl:text-2xl spotlight-description leading-snug md:mt-8 mt-4"><a href="/event/{{$event->id}}"> {{ $event->event_title ?? '' }}</a></p>
                        <div class="flex text-base xl:text-21">
                            <p class="text-gray-pale font-book">{!! date('d M Y', strtotime($event->event_date ?? '')) !!}</p>
                            <p class="ml-10 text-gray-pale font-book">{!! date('h:m', strtotime($event->event_time ?? '')) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!--
        <div class="col-span-1">
            <div class="relative spotlight-image-container3">
                <div class="spotlight-image3 spotlight-img-zoom-out overflow-hidden">
                    <img src="./img/home/spotlight/3.png" class="w-full object-contain" style="visibility: hidden;" />
                </div>
                <div class="absolute spotlight-content pl-4 xl:pl-8 events-title-box">
                    <p class="text-white font-heavy text-lg xl:text-2xl spotlight-description leading-snug md:mt-8 mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    <div class="flex text-base xl:text-21">
                        <p class="text-gray-pale font-book">Event Date</p>
                        <p class="ml-10 text-gray-pale font-book">Event Time</p>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-span-1">
            <div class="relative event-image-container">
                <div class="img-hover-zoom overflow-hidden">
                    <img src="./img/home/spotlight/4.jpg" class="w-full object-cover event-image-size" />
                </div>
                <div class="absolute spotlight-content pl-4 xl:pl-8 events-title-box">
                    <p class="text-white font-heavy text-lg xl:text-2xl spotlight-description leading-snug md:mt-8 mt-4">Aenean nec iaculis lorem Duis consectetur ...</p>
                    <div class="flex text-base xl:text-21">
                        <p class="text-gray-pale font-book">Event Date</p>
                        <p class="ml-10 text-gray-pale font-book">Event Time</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-1">
            <div
                class="relative bg-gray flex flex-col justify-center items-center rounded-corner py-20 sm:py-0 event-image-size">
                <h1 class="uppercase text-2xl sm:text-3xl md:text-2xl lg:text-3xl 2xl:text-5xl text-center text-lime-orange leading-tight">
                    Expand <span class="block text-gray-pale">your Network</span></h1>
                <a href="#" class="mt-3 join-btn rounded-full border-2 border-lime-orange hover:bg-lime-orange hover:text-gray text-lime-orange xl:py-4 text-center text-base lg:text-lg font-heavy">Join  Today</a>
            </div>
        </div>
        <div class="col-span-1">
            <div class="relative spotlight-image-container2">
                <div class="spotlight-image2 spotlight-img-zoom-out overflow-hidden">
                    <img src="./img/home/spotlight/2.png" class="w-full object-contain" style="visibility: hidden;" />
                </div>
                <div class="absolute spotlight-content pl-4 xl:pl-8 events-title-box">
                    <p class="text-white font-heavy text-lg xl:text-2xl spotlight-description leading-snug md:mt-8 mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    <div class="flex text-base xl:text-21">
                        <p class="text-gray-pale font-book">Event Date</p>
                        <p class="ml-10 text-gray-pale font-book">Event Time</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-1">
            <div class="relative spotlight-image-container3">
                <div class="spotlight-image3 spotlight-img-zoom-out overflow-hidden">
                    <img src="./img/home/spotlight/3.png" class="w-full object-contain" style="visibility: hidden;" />
                </div>
                <div class="absolute spotlight-content pl-4 xl:pl-8 events-title-box">
                    <p class="text-white font-heavy text-lg xl:text-2xl spotlight-description leading-snug md:mt-8 mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    <div class="flex text-base xl:text-21">
                        <p class="text-gray-pale font-book">Event Date</p>
                        <p class="ml-10 text-gray-pale font-book">Event Time</p>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
@endsection

@push('scripts')
  <script>
  </script> 
@endpush

                   