@extends('layouts.master')

@section('content')

<div class="w-full md:pt-0 ">
    <div class="relative events-banner-container">
        <img src="{{ asset('/img/news/newbanner.png') }}" class="w-full object-cover eventbanner-image" />
        <div class="absolute premium-content top-1/2 left-1/2 text-center sm-custom-480:pt-0 pt-4">
            <p class="md:text-5xl text-4xl text-white font-book whitespace-nowrap ctbanner-title">Events</p>
        </div>
    </div>
</div>    
    <div class="bg-gray-warm-pale events-detail-container pb-16 lg:flex">
    <div class="events-detail-1 mr-24">
        <p class="text-4xl text-lime-orange font-book tracking-widest uppercase">Donec sed varius felis</p>
        <div class="flex py-6 pl-2">
            <div class="flex mr-4">
                <img src="{{ asset('/img/events/date.svg') }}" />
                <p class="text-21 text-gray-pale pl-2 whitespace-nowrap">Event Date</p>
            </div>
            <div class="flex">
                <img src="{{ asset('/img/events/time.svg') }}" />
                <p class="text-21 text-gray-pale pl-2 whitespace-nowrap">Event Date</p>
            </div>
        </div>
        <div class=" pl-2">
            <div class="divide-x-2 w-full bg-gray-pale h-1px"></div>
        </div>
        <div class=" pl-2 pb-8">
            <p class="text-21 text-gray-pale font-book pt-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel
                <span class="text-lime-orange">pharetra</span> nunc. Proin maximus ligula
                in lectus sodales vestibulum. Curabitur feugiat est ut lectus convallis, sed ultrices lacus fermentum.
                Praesent vehicula varius dapibus. Vestibulum ac augue erat. Fusce pretium in lorem sed viverra. Aliquam
                in convallis felis.
            </p>
            <p class="text-21 text-gray-pale font-book pt-4">
                Duis turpis ante, scelerisque sit amet viverra ac, pulvinar sit amet orci. Proin semper tellus lorem, in
                sagittis neque congue a. Nam sollicitudin pulvinar arcu, a tempus nisi rhoncus in. <span
                    class="text-lime-orange">Vestibulum</span> viverra
                maximus fermentum. Sed scelerisque leo augue, et vehicula tellus pellentesque at. Pellentesque nec
                libero ullamcorper, mattis odio quis, dapibus ligula. Nam nisl sem, vulputate quis consectetur id,
                tristique vitae metus. Phasellus efficitur libero vel augue maximus, ut eleifend lorem convallis. In
                blandit quis libero rutrum mattis.
            </p>
            <p class="text-21 text-gray-pale font-book pt-4">
                Aliquam erat volutpat. Suspendisse suscipit nisl vitae nibh accumsan, eu consectetur diam scelerisque.
                Donec gravida rhoncus arcu vel pretium. Duis rutrum consectetur purus vel eleifend. Nulla lobortis velit
                nec suscipit aliquet. Duis arcu turpis, gravida sed malesuada sit amet, porttitor quis felis. Sed
                laoreet, justo a varius tincidunt, justo neque rhoncus lacus, nec pretium libero mi eu orci.
            </p>
            <p class="text-21 text-gray-pale font-book pt-4">
                Nullam laoreet ultrices pharetra. Class aptent taciti <span class="text-lime-orange">sociosqu</span> ad
                litora torquent per conubia nostra,
                per inceptos himenaeos. Etiam maximus justo at quam rhoncus finibus. Maecenas mattis, lectus vel pretium
                rhoncus, orci elit lobortis mauris, at hendrerit orci quam eu velit. Fusce mollis augue sit amet
                consequat mattis. Morbi ante orci, vulputate eget posuere commodo, efficitur ut arcu. Quisque aliquam
                nisi odio, vitae pellentesque magna cursus et. Aenean pharetra ullamcorper arcu, egestas pellentesque
                arcu facilisis et.
            </p>
            <p class="text-21 text-gray-pale font-book pt-4">
                Proin tempus congue molestie. Duis blandit, nisl non sagittis faucibus, turpis erat tempor leo, nec
                finibus est quam dapibus odio. Phasellus tempus elit at turpis semper tincidunt. Cras convallis et
                mauris vitae tincidunt. <span class="text-lime-orange">Phasellus</span> at augue tortor. Donec sagittis
                magna nec ante congue placerat. In et
                nunc sit amet erat dictum vestibulum eget at urna. Vestibulum vestibulum urna at blandit porta. Sed
                tempus leo sapien, ac efficitur neque efficitur vitae. Donec sagittis elementum nisl. Suspendisse
                <span class="text-lime-orange">pulvinar</span>malesuada nunc, ut pretium massa finibus at. Vivamus
                tempor eros sit amet leo auctor consequat.
                In sagittis viverra nisi in elementum. Nunc dignissim arcu vel diam viverra egestas. Nunc feugiat quam
                at urna sodales molestie.
            </p>
        </div>        
    </div>
    <div class="events-detail-2">
        <div class="grid grid-cols-1">
            <div class="cursor-pointer relative event-detail-image-container" onclick="openEventDetailPopup()">
                <div class="absolute top-0 left-0 w-full h-full bg-lime-orange event-zoom-hover-bg opacity-0 transition-all"></div>
                <img src="{{ asset('/img/events/eventdetail.png') }}" class="w-full eventdetail-image relative" />
                <div class="absolute eventdetail-zoom top-1/2 left-1/2 opacity-0">
                    <img src="{{ asset('/img/events/zoom.png') }}" class="w-full"/>
                </div>
            </div>

            <div class="bg-smoke-dark1 pt-16 pb-8 xl:px-12 px-4 mt-8 rounded-lg">
                <p class="xl:text-2xl text-lg font-heavy font-futura-pt text-lime-orange uppercase">Register for this event</p>
                <input type="text"
                    class="mt-6 bg-gray py-4 px-8 w-full focus:outline-none text-lg text-gray-pale placeholder-gray-pale rounded-md"
                    placeholder="Your name" />
                <input type="text"
                    class="mt-2 bg-gray py-4 px-8 w-full focus:outline-none text-lg text-gray-pale placeholder-gray-pale rounded-md"
                    placeholder="Your email address" />
                <input type="text"
                    class="mt-2 bg-gray py-4 px-8 w-full focus:outline-none text-lg text-gray-pale placeholder-gray-pale rounded-md"
                    placeholder="Number of guests" />
                <div class="flex sm-custom-480:justify-start justify-center py-4">
                    <button class="text-gray text-lg font-book focus:outline-none py-5 px-16 events-detail-btn">
                        RSVP
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>    
    <div class="fixed top-0 w-full h-screen left-0 z-50 bg-black-opacity eventsdetail-popup" id="eventsdetail-popup">   
    <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
        <div class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container--sign-up py-16 relative">
            <button class="absolute top-5 right-5 cursor-pointer focus:outline-none" onclick="eventDetailModalClose('#eventsdetail-popup')">
                <img src="{{ asset('/img/sign-up/close.svg') }}" alt="close modal image">
            </button>
            <div class="px-12">
                <img src="{{ asset('/img/events/eventdetail.png') }}" class="w-full object-cover"/>
            </div>
        </div>
    </div>  
</div>  

@endsection
@push('scripts')
  <script>
  </script> 
@endpush