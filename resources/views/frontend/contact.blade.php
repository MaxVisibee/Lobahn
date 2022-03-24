@extends('layouts.frontend-master')

@section('content')
    <div class="bg-gray-warm-pale md:px-0 px-4 pb-20">
        <div class="flex justify-center">
            <div class="mt-32 mb-4">
                <div class="flex flex-col">
                    <p class="text-white lg:text-5xl md:text-3xl text-xl text-center py-12">CONTACT</p>
                    <div class="w-full contact-map">
                        <!-- <div id="map" class="mt-40" style="height: 450px;"></div> -->
                        {{-- <iframe class="map "
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.9968282889886!2d114.18243211490552!3d22.27810998533516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340400514b6e9be9%3A0xac099dc865aeb281!2sLa%20Rotisserie!5e0!3m2!1sen!2smm!4v1640264695972!5m2!1sen!2smm"
                            width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
                        <iframe class="map "
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3692.000630682203!2d114.18255531418104!3d22.277965949336725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34040051455b14ed:0x7a3df6d6a53d6562!2sLobahn Limited!5e0!3m2!1sen!2smm!4v1648085702167!5m2!1sen!2smm"
                            width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <!-- <div id="map" class="contact-map"></div> -->

                    <div class="bg-gray-pale contact-horizontal-line my-12"></div>
                    <h2 class="text-xl xl:text-3xl text-gray-pale mb-7 letter-spacing-custom footer-company-name">Lobahn
                        Technology Limited</h2>
                    <div class="flex flex-row justify-between items-start mb-4">
                        <div class="location-image-box pt-2 mr-8">
                            <img src="{{ asset('/img/location/place.svg') }}" alt="company place img"
                                class="location-image" />
                        </div>
                        <div class="mr-auto">
                            <p class="text-gray-pale xl:text-2xl md:text-lg text-base">{{ $contact->address ?? '' }}</p>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between items-center mb-4">
                        <div class="location-image-box pt-2 mr-8">
                            <img src="{{ asset('/img/location/phone.svg') }}" alt="company phone img"
                                class="location-image" />
                        </div>
                        <div class="mr-auto">
                            <a href="tel:+852 9151 4706"
                                class="text-gray-pale xl:text-2xl md:text-lg text-base">{{ $contact->phone ?? '' }}</a>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between items-center mb-10">
                        <div class="location-image-box pt-2 mr-8">
                            <img src="{{ asset('/img/location/email.svg') }}" alt="company phone img"
                                class="location-image location-image--email" />
                        </div>
                        <div class="mr-auto">
                            <a href="mailto: info@lobahn.com"
                                class="text-gray-pale  xl:text-2xl md:text-lg text-base">{{ $contact->email ?? '' }}</a>
                        </div>
                    </div>
                    <div class="flex flex-row flex-wrap items-center">
                        <a class="mr-4" href="#"><img src="{{ asset('/img/location/facebook.svg') }}"
                                alt="facebook icon" /></a>
                        <a class="mr-4" href="#"><img src="{{ asset('/img/location/instagram-black.svg') }}"
                                alt="instagram icon" /></a>
                        <a class="mr-4" href="#"><img src="{{ asset('/img/location/linkedin.svg') }}"
                                alt="linkedin icon" /></a>
                        <a class="mr-4" href="#"><img src="{{ asset('/img/location/twitter.svg') }}"
                                alt="twitter icon" class="footer-social-bar__twitter" /></a>
                    </div>
                </div>
                <div class="bg-gray-pale contact-horizontal-line my-12"></div>
                <form class="form-section" method="post" action="save-contact">
                    {{ csrf_field() }}
                    <div class="">
                        <h2 class="text-xl xl:text-3xl text-gray-pale mb-7 letter-spacing-custom">Get in Touch</h2>
                        @if (Session::has('success'))
                            <div id="content" class="content" style="color: #fff">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    {{ Session::get('success') }}
                                </div>
                            </div>
                        @endif
                        <div class="footer-contact mb-4">
                            <input type="email" name="email" id="email" placeholder="Your email"
                                class="focus:border-none email-input pl-7 bg-gray text-gray-pale text-lg py-4 rounded-corner w-full" />
                        </div>
                        <div class="footer-contact mb-4">
                            <input type="text" name="name" id="name" placeholder="Your name"
                                class="focus:border-none name-input pl-7 bg-gray text-gray-pale text-lg py-4 rounded-corner w-full" />
                        </div>
                        <div class="footer-contact">
                            <textarea name="comment" id="comment"
                                class="message-text pl-7 bg-gray text-gray-pale text-lg py-4 rounded-corner w-full footer-contact-textarea focus:border-none"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="uppercase focus:border-none contact-send-btn w-40 rounded-md py-2">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
    <script>
    </script>
@endpush
