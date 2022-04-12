@extends('layouts.frontend-master')

@push('css')
    <style>
        .event-image {
            width: 508px !important;
            height: 445px !important;
        }

        .event-image-title {
            width: auto !important;
            height: 449.48px !important;
        }

        .spotlight-image {
            width: 100%;
            position: relative;
            overflow: hidden;
            /*background-image: url(../img/home/spotlight/2.png);*/
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
        }

        html {
            scroll-behavior: smooth;
        }

    </style>
@endpush

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
        <p class="text-21 font-futura-pt font-book text-gray-pale md:pt-12 pt-4">
            Lobahn Connect's™ digital networking effects are enhanced and strengthened by our monthly in-person events and
            activities (as social distancing regulations allow)! We cover a wide spectrum of professional, social, learning,
            motivational and entertaining topics that cater and reflect the diverse needs and interests of our Members. Even
            in the digital age, face-to-face encounters remain a powerful element in human relations.
        </p><br />
        <p class="text-21 font-futura-pt font-book text-gray-pale">
            As a Member, you are invited to monthly events tailored to your background, interests and needs, ranging from
            small-group professional meetups to open-network large-group gatherings where Members meet each other to broaden
            their social and business network. This creates a great chance for Members to mingle, learn from each other,
            discover new career and business opportunities, and well as share their experiences.
        </p>
        <p class="text-21 font-futura-pt font-book text-gray-pale">
            <a class="hover:text-lime-orange underline text-white" href="#inTouch">Click Here</a> for Event Spotlight &
            Registration
        </p>
        <p class="contact-horizontal-line w-full my-20 bg-gray-pale"></p>
        <p class="lg:text-5xl text-3xl uppercase mb-14 text-white text-center">Upcoming Events</p>
        <div class="grid md:grid-cols-2 overflow-hidden eventbox-gap-safari gap-8">
            @forelse ($upCommingEvents as $upCommingEvent)
                <div class="col-span-1" onclick="window.location='{{ route('eventDetails', $upCommingEvent->id) }}'">
                    <div class="relative event-image-container">
                        <div class="img-hover-zoom overflow-hidden">
                            @if ($upCommingEvent->event_image)
                                <img src="{{ asset('uploads/events/' . $upCommingEvent->event_image ?? '') }}"
                                    class="w-full object-cover event-image-size" />
                            @else
                                <img src="{{ asset('uploads/events/title-event-default-small.jpg') }}"
                                    class="w-full object-cover event-image-size" />
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
            @empty
                <p class="text-white font-heavy text-lg xl:text-2xl spotlight-description leading-snug md:mt-8 mt-4">
                    Coming soon</p>
            @endforelse
        </div>
        <div class="bg-gray-pale contact-horizontal-line my-24"></div>
        <p class="lg:text-5xl text-3xl uppercase my-8 text-white text-center">Past Events</p>
        <div class="md:flex lg:mt-0 mb-12">
            <div class="select-wrapper-event text-gray-pale">
                <div class="select-event-box">
                    <div
                        class="event__trigger py-2 relative flex items-center text-gray justify-between pl-2 bg-gray-light2 cursor-pointer">
                        <span class="">{{ Request::get('year') ?? 'All Events' }}</span>
                        <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg" width="13.328"
                            height="7.664" viewBox="0 0 13.328 7.664">
                            <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                transform="translate(19.414 -16.586) rotate(90)" fill="none" stroke="#2F2F2F"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>

                    </div>
                    <div style="margin-top: 0.125em;"
                        class="custom-options-event absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer w-48 border border-white">
                        <div class="custom-option-event flex pb-4 pr-4 relative transition-all hover:bg-gray-light3 hover:text-gray h-8"
                            data-value="All Events">
                            <div class="flex absolute checkIcon_box">
                                <img class="mr-2 checkedIcon {{ Request::get('year') ? 'hidden' : '' }}"
                                    src="./img/dashboard/checked.svg" />
                            </div>
                            <span class="custom-content-container text-gray pl-4 event-year">All Events</span>
                        </div>
                        @foreach ($years as $id => $year)
                            <div class="custom-option-event flex pb-4 pr-4 relative transition-all hover:bg-gray-light3 hover:text-gray h-8"
                                data-value="{{ $year ?? '' }}">
                                <div class="flex absolute checkIcon_box">

                                    <img class="mr-2 checkedIcon {{ Request::get('year') == $year ? '' : 'hidden' }}"
                                        src="./img/dashboard/checked.svg" />
                                </div>
                                <span class="custom-content-container text-gray pl-4 event-year">{{ $year ?? '' }}</span>
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
                                    class="w-full object-contain event-image-title" />
                            @else
                                <img src="{{ asset('uploads/events/title-event-default-small.jpg') }}"
                                    class="w-full object-contain event-image-title" />
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
                        <div class="relative event-image-container">
                            <div class="img-hover-zoom overflow-hidden">
                                @if ($event->event_image)
                                    <img src="{{ asset('uploads/events/' . $event->event_image ?? '') }}"
                                        class="w-full object-cover event-image-size" />
                                @else
                                    <img src="{{ asset('uploads/events/title-event-default-small.jpg') }}"
                                        class="w-full object-cover event-image-size" />
                                @endif
                            </div>
                            <div class="absolute spotlight-content pl-4 xl:pl-8 events-title-box">
                                <p
                                    class="text-white font-heavy text-lg xl:text-2xl spotlight-description leading-snug md:mt-8 mt-4">
                                    {{ $event->event_title ?? '' }} ...</p>
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

                if (year == 'All Events') {
                    window.location = "{{ url('/events') }}";
                } else {
                    var url = "{{ url('/events') }}?year=" + year;
                    if (url) {
                        window.location = url;
                    }
                    return false;
                }

            });

        });
    </script>
@endpush
