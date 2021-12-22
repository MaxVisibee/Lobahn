<div class="bg-gray-light">
    <div class="mx-auto relative pt-20 sm:pt-32 pb-40 footer-section">
        <ul
            class="flex flex-wrap justify-between text-center items-center text-base md:text-lg xl:text-2xl letter-spacing-custom mx-auto footer-menu-bar mb-20">
            <li class="w-1/5 mb-3"><a href="#"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">About</a></li>
            <li class="w-1/5 mb-3"><a href="#"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Services</a></li>
            <li class="w-1/5 mb-3"><a href="#"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">FAQ</a></li>
            <li class="w-1/5 mb-3"><a href="#"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">News</a></li>
            <li class="w-1/5 mb-3"><a href="#"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Privacy</a></li>
            <li class="w-1/5 mb-3"><a href="#"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Membership</a></li>
            <li class="w-1/5 mb-3"><a href="#"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Events</a></li>
            <li class="w-1/5 mb-3"><a href="#"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Contact</a></li>
            <li class="w-1/5 mb-3"><a href="#"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Community</a></li>
            <li class="w-1/5 mb-3"><a href="#"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Terms</a></li>
        </ul>
        <div class="flex flex-row flex-wrap mt-32 mb-16 footer-contact-box">
            <div class="flex flex-col letter-spacing-custom footer-contact-left">
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
        <div class="absolute left-1/2 copy-right w-full">
            <p class="text-sm text-gray-pale letter-spacing-custom">&copy;2022 Lobahn Technology Limited. All
                rights
                reserved.<span class="block">Lobahn<sup>&reg;</sup>, Lobahn Connect<sup>TM</sup>, Career
                    Partner<sup>TM</sup>, Talent Discovery<sup>TM</sup>, JSR<sup>TM</sup> and JSR
                    Rating<sup>TM</sup> are registered trademarks of Lobahn Technology Limited. HK EA licence no.
                    66450. </span>
            </p>
        </div>
    </div>
</div>
