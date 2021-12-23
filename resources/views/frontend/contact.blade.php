@extends('layouts.master')

@section('content')

<div class="bg-gray-warm-pale text-white py-32 mt-28">
  <div class="flex flex-wrap justify-center items-center sign-up-card-section sign-up-card-section--login-section">
    <div class="flex flex-row flex-wrap mt-32 mb-16 footer-contact-box">
            <div class="flex flex-col letter-spacing-custom">
                <h2 class="text-xl xl:text-3xl text-gray-pale mb-7 letter-spacing-custom footer-company-name">Lobahn
                    Technology Limited</h2>
                <div class="flex flex-row justify-between items-start mb-4">
                    <div class="location-image-box pt-2 mr-8">
                        <img src="{{ asset('/img/location/place.svg') }}" alt="company place img"
                            class="location-image" />
                    </div>
                    <div class="mr-auto">
                        <p class="text-gray-pale text-base md:text-lg xl:text-2xl">201 Eton Tower<br />8 Hysan
                            Avenue<br /> Causeway Bay, Hong Kong</p>
                    </div>

                </div>
                <div class="flex flex-row justify-between items-center mb-4">
                    <div class="location-image-box pt-2 mr-8">
                        <img src="{{ asset('/img/location/phone.svg') }}" alt="company phone img"
                            class="location-image" />
                    </div>
                    <div class="mr-auto">
                        <a href="tel:+852 9151 4706" class="text-gray-pale text-base md:text-lg xl:text-2xl">+852
                            9151 4706</a>
                    </div>
                </div>
                <div class="flex flex-row justify-between items-center mb-10">
                    <div class="location-image-box pt-2 mr-8">
                        <img src="{{ asset('/img/location/email.svg') }}" alt="company phone img"
                            class="location-image location-image--email" />
                    </div>
                    <div class="mr-auto">
                        <a href="mailto: info@lobahn.com"
                            class="text-gray-pale text-base md:text-lg xl:text-2xl">info@lobahn.com</a>
                    </div>
                </div>
                <div class="flex flex-row flex-wrap justify-between items-center footer-social-bar">
                    <a href="#"><img src="{{ asset('/img/location/facebook.svg') }}" alt="facebook icon" /></a>
                    <a href="#"><img src="{{ asset('/img/location/instagram-black.svg') }}"
                            alt="instagram icon" /></a>
                    <a href="#"><img src="{{ asset('/img/location/linkedin.svg') }}" alt="linkedin icon" /></a>
                    <a href="#"><img src="{{ asset('/img/location/twitter.svg') }}" alt="twitter icon"
                            class="footer-social-bar__twitter" /></a>
                </div>
            </div>
            <div class="footer-contact-center">
                <h2 class="text-xl xl:text-3xl text-gray-pale mb-7 letter-spacing-custom">Get in Touch</h2>
                @if (Session::has('success'))
                    <div id="content" class="content" style="color: #fff">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif
                <form class="form-section" method="post" action="save-contact">
                {{csrf_field()}}
                    <div class="footer-contact mb-4">
                        <input type="email" name="email" id="email" placeholder="Your email"
                            class="email-input pl-7 bg-gray text-gray-pale text-lg py-4 rounded-corner w-full" />
                    </div>
                    <div class="footer-contact mb-4">
                        <input type="text" name="name" id="name" placeholder="Your name"
                            class="name-input pl-7 bg-gray text-gray-pale text-lg py-4 rounded-corner w-full" />
                    </div>
                    <div class="footer-contact">
                        <textarea
                            class="message-text pl-7 bg-gray text-gray-pale text-lg py-4 rounded-corner w-full footer-contact-textarea"
                            placeholder="Message" name="comment" id="comment"></textarea>
                            <!-- cols="30" rows="5" -->
                    </div>
                </div>
                <div class="footer-contact-right self-end pl-5">
                    <button class="send-btn"><img src="{{ asset('/img/location/feather-arrow-right-circle.svg') }}" alt="right arrow" /></button>
                </div>
            </form>
        </div>
  </div>
</div>

@endsection

@push('scripts')
  <script>
  </script> 
@endpush                   