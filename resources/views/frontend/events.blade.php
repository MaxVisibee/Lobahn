@extends('layouts.frontend-master')
@section('content')

    <div class="w-full md:pt-0 ">
        <div class="relative events-banner-container">
            <img src="{{ asset('/img/news/newbanner.png') }}"
                class="w-full object-cover object-bottom eventbanner-image" />
            <div class="absolute premium-content top-1/2 left-1/2 text-center sm-custom-480:pt-0 pt-4">
                <p class="text-5xl text-white font-book whitespace-nowrap ctbanner-title">Events</p>
            </div>
        </div>
    </div>
    <div class="bg-gray-warm-pale spotlight-container pb-20 pt-12">
        <p class="lg:text-5xl text-3xl uppercase mb-14 text-white text-center">Upcoming Events</p>
        <div class="grid md:grid-cols-2 overflow-hidden eventbox-gap-safari gap-8">
            @foreach ($upCommingEvents as $upCommingEvent)
                <div class="col-span-1" onclick="window.location='{{ route('eventDetails', $upCommingEvent->id) }}'">
                    <div class="relative spotlight-image-container2">
                        <div class="spotlight-image2 spotlight-img-zoom-out overflow-hidden" style="background-image: none">
                            @if ($upCommingEvent->event_image)
                                <img src="{{ asset('uploads/events/' . $upCommingEvent->event_image ?? '') }}"
                                    class="w-full object-contain" />
                            @else
                                <img src="{{ asset('uploads/events/title-event-default-small.jpg') }}"
                                    class="w-full object-contain" />
                            @endif
                        </div>
                        <div class="absolute spotlight-content pl-4 xl:pl-8 events-title-box">
                            <p
                                class="text-white font-heavy text-lg xl:text-2xl spotlight-description leading-snug md:mt-8 mt-4">
                                {{ $upCommingEvent->event_title }}</p>
                            <div class="flex text-base xl:text-21">
                                <p class="text-gray-pale font-book">{{ $upCommingEvent->event_date }}</p>
                                <p class="ml-10 text-gray-pale font-book">{{ $upCommingEvent->event_time }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="bg-gray-pale contact-horizontal-line my-24"></div>
        <p class="lg:text-5xl text-3xl uppercase my-8 text-white text-center">Past Events</p>
        <div class="md:flex lg:mt-0 mb-12">

            <div class="dashboard-select-wrapper text-gray-pale flex self-center">
                <div class="dashboard-select-preferences">
                    <div
                        class="dashboard-select__trigger py-3 relative flex items-center text-gray justify-between pl-2 bg-gray-light3 cursor-pointer">
                        <span class="">All Events</span>
                        <svg class="transition-all mr-4" xmlns="http://www.w3.org/2000/svg" width="13.328" height="7.664"
                            viewBox="0 0 13.328 7.664">
                            <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                transform="translate(19.414 -16.586) rotate(90)" fill="none" stroke="#2F2F2F"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>

                    </div>
                    <div
                        class="dashboard-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                        <div class="flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                            data-value="All Events">
                            <div class="flex dashboard-select-custom-icon-container">
                                <img class="mr-2 checkedIcon" src="./img/dashboard/checked.svg" />
                            </div>
                            <span class="dashboard-select-custom-content-container text-gray pl-4 event-year">All
                                Events</span>
                        </div>

                        @foreach ($years as $id => $year)
                            <div class="flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                data-value="{{ $year ?? '' }}">
                                <div class="flex dashboard-select-custom-icon-container">
                                    <img class="mr-2 checkedIcon hidden" src="./img/dashboard/checked.svg" />
                                </div>
                                <span
                                    class="dashboard-select-custom-content-container text-gray pl-4 event-year">{{ $year ?? '' }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="grid md:grid-cols-2 overflow-hidden eventbox-gap-safari gap-8">

            @if (isset($title_event->event_title))
                <div onclick="go({{ $title_event->id ?? '' }})" class="md:col-span-2 relative">
                    <div class="relative spotlight-image-container1">
                        <div class="spotlight-image1 spotlight-img-zoom-out overflow-hidden" style="background-image: none">
                            @if ($title_event->event_image)
                                <img src="{{ asset('uploads/events/' . $title_event->event_image ?? '') }}"
                                    class="w-full object-contain" />
                            @else
                                <img src="{{ asset('uploads/events/title-event-default-large.jpg') }}"
                                    class="w-full object-contain" />
                            @endif
                        </div>
                        <div class="absolute spotlight-content pl-4 xl:pl-8 events-title-box">
                            <p
                                class="text-white font-heavy text-lg xl:text-2xl spotlight-description leading-snug md:mt-8 mt-4">
                                {{ $title_event->event_title ?? '' }}</p>
                            <div class="flex text-base xl:text-21">
                                <p class="text-gray-pale font-book">{{ $title_event->event_date ?? '' }}</p>
                                <p class="ml-10 text-gray-pale font-book">{{ $title_event->event_time ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @php $count=1 @endphp
            @foreach ($events as $event)
                @if (isset($event->event_title))
                    <div onclick="go({{ $event->id ?? '' }})" class="col-span-1">
                        <div class="relative spotlight-image-container2">
                            <div class="spotlight-image2 spotlight-img-zoom-out overflow-hidden"
                                style="background-image: none">
                                @if ($event->event_image)
                                    <img src="{{ asset('uploads/events/' . $event->event_image ?? '') }}"
                                        class="w-full object-contain" />
                                @else
                                    <img src="{{ asset('uploads/events/title-event-default-small.jpg') }}"
                                        class="w-full object-contain" />
                                @endif
                            </div>
                            <div class="absolute spotlight-content pl-4 xl:pl-8 events-title-box">
                                <p
                                    class="text-white font-heavy text-lg xl:text-2xl spotlight-description leading-snug md:mt-8 mt-4">
                                    {{ $event->event_title ?? '' }}

                                </p>
                                <div class="flex text-base xl:text-21">
                                    <p class="text-gray-pale font-book">{{ $event->event_date ?? '' }}</p>
                                    <p class="ml-10 text-gray-pale font-book">{{ $event->event_time ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @php $count++ @endphp
                @if ($count == 4)
                    <div class="col-span-1">
                        <div
                            class="relative bg-gray flex flex-col justify-center items-center rounded-corner py-20 sm:py-0 event-image-size">
                            <h1
                                class="uppercase text-2xl sm:text-3xl md:text-2xl lg:text-3xl 2xl:text-5xl text-center text-lime-orange leading-tight">
                                Expand <span class="block text-gray-pale">your Network</span></h1>
                            <a href="{{ route('community') }}"
                                class="mt-3 join-btn rounded-full border-2 border-lime-orange hover:bg-lime-orange hover:text-gray text-lime-orange xl:py-4 text-center text-base lg:text-lg font-heavy">Join
                                Today</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        {{ $events->links('includes.pagination') }}
        {{-- <div class="flex justify-center">
        <div class="pb-8 overflow-auto pt-12">
            <div class="flex">
                <button id="discussion-pagination1" type="button" onclick="changeDiscussionPagination(1,45)"
                    class="uppercase focus:outline-none text-lime-orange text-lg font-book discussion-pagination-btn py-2 md:w-10 px-5 flex justify-center mr-2">
                    1
                </button>
                <button type="button" onclick="changeDiscussionPagination(2,45)" id="discussion-pagination2"
                    class="pagination2 uppercase focus:outline-none text-lime-orange text-lg font-book discussion-pagination-btn py-2 md:w-10 px-5 flex justify-center mr-2">
                    2
                </button>
                <button type="button" id="discussion-pagination3" onclick="changeDiscussionPagination(3,45)"
                    class="pagination3 uppercase focus:outline-none text-lime-orange text-lg font-book discussion-pagination-btn py-2 md:w-10 px-5 flex justify-center mr-2">
                    3
                </button>
                <div class="flex justify-center self-center">
                    <span class="text-lg text-lime-orange ml-2 mr-2">.</span>
                    <span class="text-lg text-lime-orange mr-2">.</span>
                    <span class="text-lg text-lime-orange mr-2">.</span>
                </div>
                <button type="button" id="discussion-pagination43" onclick="changeDiscussionPagination(43,45)"
                    class="pagination43 uppercase focus:outline-none text-lime-orange text-lg font-book discussion-pagination-btn py-2 md:w-10 px-5 flex justify-center mr-2">
                    43
                </button>
                <button type="button" id="discussion-pagination44" onclick="changeDiscussionPagination(44,45)"
                    class="pagination44 uppercase focus:outline-none text-lime-orange text-lg font-book discussion-pagination-btn py-2 md:w-10 px-5 flex justify-center mr-2">
                    &gt;
                </button>
                <button type="button" id="discussion-pagination45" onclick="changeDiscussionPagination(45,45)"
                    class="pagination45 uppercase focus:outline-none text-lime-orange text-lg font-book discussion-pagination-btn py-2 md:w-10 px-5 flex justify-center mr-2">
                    &#62;&#62;
                </button>
            </div>
        </div>
    </div> --}}
    </div>

@endsection

@push('scripts')
    <script>
        function go(e) {

            var url = "/event/" + e
            window.location = url;
        }

        $(document).ready(function() {

            $('.event-year').on('click', function(e) {

                var year = $(this).text();

                var url = "{{ url('/events') }}?year=" + year;
                if (url) {
                    window.location = url;
                }
                return false;

            });

        });
    </script>
@endpush
