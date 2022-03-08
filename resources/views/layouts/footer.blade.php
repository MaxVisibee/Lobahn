<div class="bg-gray-light">
    <div class="mx-auto relative pt-20 sm:pt-32 pb-10 sm:pb-12 footer-section-div">
        <ul
            class="flex flex-wrap justify-between text-center items-center text-base md:text-lg xl:text-2xl letter-spacing-custom mx-auto footer-menu-bar mb-20 w-full">
            <li class="w-1/6 mb-3"><a href="{{ url('/connect') }}"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Lobahn
                    Connect<sup class="top-0">TM</sup></a></li>
            <li class="w-1/6 mb-3"><a href="{{ route('membership') }}"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Membership</a></li>
            <li class="w-1/6 mb-3"><a href="{{ route('events') }}"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Events</a></li>
            <li class="w-1/6 mb-3"><a href="{{ route('community') }}"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Community</a></li>
            <li class="w-1/6 mb-3"><a href="{{ route('news') }}"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">News
                    & Views</a></li>
            <li class="w-1/6 mb-3"><a href="{{ route('career-partner') }}"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Career Partner<sup
                        class="top-0">TM</sup></a></li>
            <li class="w-1/6 mb-3"><a href="{{ route('talent-discovery') }}"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Talent Discovery<sup
                        class="top-0">TM</sup></a></li>
            <li class="w-1/6 mb-3"><a href="{{ route('faq') }}"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">FAQ</a></li>
            <li class="w-1/6 mb-3"><a href="{{ route('terms') }}"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Terms</a></li>
            <li class="w-1/6 mb-3"><a href="{{ route('privacy') }}"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Privacy Policy</a></li>
            @if (Auth::user())
                <li class="w-1/6 mb-3"><a href="{{ route('candidate.dashboard') }}"
                        class="text-gray-pale hover:text-lime-orange focus:outline-none">My
                        Account</a></li>
            @elseif (Auth::guard('company')->user())
                <li class="w-1/6 mb-3"><a href="{{ url('company-home') }}"
                        class="text-gray-pale hover:text-lime-orange focus:outline-none">My
                        Account</a></li>
            @else
                <li class="w-1/6 mb-3"><a href="{{ route('login') }}"
                        class="text-gray-pale hover:text-lime-orange focus:outline-none">My
                        Account</a></li>
            @endif
            <li class="w-1/6 mb-3"><a href="{{ route('contact') }}"
                    class="text-gray-pale hover:text-lime-orange focus:outline-none">Contact</a></li>
        </ul>
        <div class="flex flex-row flex-wrap mt-32 mb-16 footer-contact-box">
            <div class="flex flex-col letter-spacing-custom footer-contact-left-div">
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
                        <a href="tel:+852 9151 4706" class="text-gray-pale text-base md:text-lg xl:text-2xl">+852 9151
                            4706</a>
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
                    <a href="@php
                        $link = DB::table('site_settings')->pluck('facebook_address')[0];
                        echo $link != null ? $link : '#';
                    @endphp" class="facebook-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="35.781" viewBox="0 0 36 35.781">
                            <g id="facebook" transform="translate(-0.001 0)">
                                <path id="Subtraction_3" data-name="Subtraction 3"
                                    d="M15.187,35.781h0c-.532-.084-1.067-.192-1.589-.324s-1.032-.284-1.535-.46-.993-.372-1.474-.589-.95-.455-1.406-.712-.9-.534-1.332-.828S7,32.26,6.6,31.931s-.792-.678-1.164-1.041-.731-.744-1.07-1.137S3.7,28.948,3.4,28.527s-.595-.863-.861-1.309-.52-.915-.747-1.385-.44-.963-.626-1.454-.356-1.007-.5-1.517S.4,21.816.3,21.288s-.174-1.08-.224-1.623S0,18.555,0,18a18.288,18.288,0,0,1,.093-1.84,18.043,18.043,0,0,1,.273-1.787c.119-.58.268-1.16.444-1.725s.377-1.115.605-1.654S1.9,9.93,2.172,9.42s.579-1.006.9-1.484.67-.942,1.036-1.386.756-.872,1.162-1.278.836-.8,1.278-1.162S7.46,3.4,7.936,3.074s.978-.627,1.484-.9,1.04-.532,1.573-.758,1.1-.432,1.654-.605S13.792.484,14.372.366A18.045,18.045,0,0,1,16.16.093a18.269,18.269,0,0,1,3.681,0,18.047,18.047,0,0,1,1.787.273c.58.119,1.16.268,1.725.444s1.115.377,1.654.605,1.063.481,1.573.758,1.006.578,1.484.9.942.67,1.386,1.036.872.756,1.278,1.162.8.836,1.162,1.278.715.91,1.036,1.386.626.978.9,1.484.532,1.039.758,1.573.432,1.1.605,1.654.325,1.145.444,1.725a18.045,18.045,0,0,1,.273,1.787A18.292,18.292,0,0,1,36,18c0,.555-.026,1.116-.076,1.665s-.125,1.088-.224,1.623-.22,1.057-.365,1.573-.311,1.021-.5,1.517-.4.981-.626,1.454-.479.936-.747,1.385-.556.887-.861,1.309-.63.833-.969,1.226-.7.775-1.07,1.137S29.8,31.6,29.4,31.931s-.823.645-1.251.938-.879.573-1.332.828-.93.5-1.406.712-.976.416-1.474.589-1.019.33-1.535.46-1.056.24-1.589.324V23.2h4.194l.8-5.2H20.812V14.625a3.584,3.584,0,0,1,.144-1.04,2.453,2.453,0,0,1,.484-.9,2.215,2.215,0,0,1,.394-.358,2.473,2.473,0,0,1,.509-.275,3.172,3.172,0,0,1,.634-.177,4.481,4.481,0,0,1,.768-.062h2.27V7.383h0c-.005,0-.526-.09-1.289-.177-.44-.051-.874-.091-1.288-.12-.517-.036-1.005-.054-1.452-.054-4.257,0-6.8,2.618-6.8,7V18h-4.57v5.2h4.57V35.781Z"
                                    transform="translate(0.001 0)" fill="#707070" />
                            </g>
                        </svg>
                    </a>
                    <a href="@php
                        $link = DB::table('site_settings')->pluck('instagram_address')[0];
                        echo $link != null ? $link : '#';
                    @endphp" class="instagram-link">
                        <svg id="instagram-black" xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                            viewBox="0 0 36 36">
                            <path id="Path_88" data-name="Path 88"
                                d="M18,3.244c4.807,0,5.375.018,7.274.1a9.946,9.946,0,0,1,3.343.619,5.579,5.579,0,0,1,2.072,1.347,5.569,5.569,0,0,1,1.346,2.071,9.95,9.95,0,0,1,.619,3.343c.086,1.9.105,2.467.105,7.274s-.019,5.375-.105,7.274a9.946,9.946,0,0,1-.619,3.343,5.965,5.965,0,0,1-3.418,3.416,9.95,9.95,0,0,1-3.343.619c-1.9.086-2.467.105-7.274.105s-5.376-.019-7.274-.105a9.946,9.946,0,0,1-3.343-.619,5.577,5.577,0,0,1-2.072-1.346,5.577,5.577,0,0,1-1.344-2.071,9.95,9.95,0,0,1-.619-3.343c-.086-1.9-.1-2.467-.1-7.274s.018-5.375.1-7.274a9.946,9.946,0,0,1,.619-3.343A5.577,5.577,0,0,1,5.314,5.311,5.577,5.577,0,0,1,7.386,3.965a9.95,9.95,0,0,1,3.343-.619c1.9-.086,2.467-.1,7.274-.1M18,0c-4.886,0-5.5.018-7.419.105A13.213,13.213,0,0,0,6.211.944,8.831,8.831,0,0,0,3.023,3.023,8.831,8.831,0,0,0,.944,6.211,13.212,13.212,0,0,0,.108,10.58C.021,12.5,0,13.111,0,18s.021,5.5.108,7.421a13.184,13.184,0,0,0,.836,4.368,8.841,8.841,0,0,0,2.079,3.187,8.823,8.823,0,0,0,3.189,2.078,13.193,13.193,0,0,0,4.369.837C12.5,35.978,13.113,36,18,36s5.5-.02,7.421-.108a13.173,13.173,0,0,0,4.366-.837,9.2,9.2,0,0,0,5.266-5.266,13.192,13.192,0,0,0,.837-4.369C35.977,23.5,36,22.887,36,18s-.021-5.5-.108-7.421a13.155,13.155,0,0,0-.837-4.366,8.831,8.831,0,0,0-2.078-3.189A8.843,8.843,0,0,0,29.786.945,13.161,13.161,0,0,0,25.42.109C23.5.022,22.889,0,18,0Z"
                                fill="#707070" />
                            <path id="Path_89" data-name="Path 89"
                                d="M133.774,124.55a9.243,9.243,0,1,0,9.243,9.243h0a9.241,9.241,0,0,0-9.244-9.243Zm0,15.244a6,6,0,1,1,6-6A6,6,0,0,1,133.774,139.794Z"
                                transform="translate(-115.774 -115.793)" fill="#707070" />
                            <circle id="Ellipse_7" data-name="Ellipse 7" cx="2.16" cy="2.16" r="2.16"
                                transform="translate(25.449 6.231)" fill="#707070" />
                        </svg>
                    </a>
                    <a href="@php
                        $link = DB::table('site_settings')->pluck('linkedin_address')[0];
                        echo $link != null ? $link : '#';
                    @endphp" class="linkedin-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36.171" height="36" viewBox="0 0 36.171 36">
                            <g id="linkedin" transform="translate(-61.8)">
                                <path id="Path_47" data-name="Path 47"
                                    d="M95.229,0H64.543A2.928,2.928,0,0,0,61.8,2.571V33.429A2.675,2.675,0,0,0,64.543,36H95.229a2.928,2.928,0,0,0,2.743-2.571V2.571A2.675,2.675,0,0,0,95.229,0ZM72.6,30.686H67.286V13.543H72.6ZM69.857,11.143a3.086,3.086,0,1,1,3.086-3.086A3.073,3.073,0,0,1,69.857,11.143Zm22.8,19.543H87.343v-8.4c0-2.057,0-4.629-2.743-4.629s-3.257,2.229-3.257,4.457v8.571H76.029V13.543h5.143v2.4A5.406,5.406,0,0,1,86.143,13.2c5.486,0,6.343,3.6,6.343,8.229Z"
                                    fill="#707070" />
                            </g>
                        </svg>
                    </a>
                    <a href="@php
                        $link = DB::table('site_settings')->pluck('twitter_address')[0];
                        echo $link != null ? $link : '#';
                    @endphp" class="twitter-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="29.252" viewBox="0 0 36 29.252"
                            class="footer-social-bar__twitter">
                            <path id="Path_90" data-name="Path 90"
                                d="M86.321,127.7c13.585,0,21.015-11.255,21.015-21.015,0-.32,0-.638-.022-.955A15.028,15.028,0,0,0,111,101.909a14.743,14.743,0,0,1-4.242,1.162A7.412,7.412,0,0,0,110,98.986a14.8,14.8,0,0,1-4.69,1.793,7.393,7.393,0,0,0-12.587,6.736A20.969,20.969,0,0,1,77.506,99.8a7.392,7.392,0,0,0,2.287,9.86,7.331,7.331,0,0,1-3.352-.924v.094a7.389,7.389,0,0,0,5.926,7.24,7.374,7.374,0,0,1-3.335.127,7.394,7.394,0,0,0,6.9,5.129,14.82,14.82,0,0,1-9.173,3.168A15.034,15.034,0,0,1,75,124.385,20.91,20.91,0,0,0,86.321,127.7"
                                transform="translate(-75 -98.45)" fill="#707070" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="footer-contact-center-div">
                <h2 class="text-xl xl:text-3xl text-gray-pale mb-7 letter-spacing-custom">Get in Touch</h2>
                @if (Session::has('success'))
                    {{-- <div id="content" class="content" style="color: #fff">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">&times;</button>
                            {{ Session::get('success') }}
                        </div>
                    </div> --}}
                @endif
                <form class="form-section" method="post" action="save-contact">
                    {{ csrf_field() }}
                    <div class="footer-contact mb-4">
                        <input type="email" name="email" id="email" placeholder="Your email"
                            class="focus:border-none email-input pl-7 bg-gray text-gray-pale text-lg py-4 rounded-corner w-full" />
                    </div>
                    <div class="footer-contact mb-4">
                        <input type="text" name="name" id="name" placeholder="Your name"
                            class="focus:border-none name-input pl-7 bg-gray text-gray-pale text-lg py-4 rounded-corner w-full" />
                    </div>
                    <div class="footer-contact">
                        <textarea
                            class="message-text pl-7 bg-gray text-gray-pale text-lg py-4 rounded-corner w-full footer-contact-textarea focus:border-none"
                            placeholder="Message" name="comment" id="comment"></textarea>
                    </div>
            </div>
            <div class="footer-contact-right-div self-end pl-5">
                <button class="fra-btn" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33">
                        <g id="Icon_feather-arrow-right-circle" data-name="Icon feather-arrow-right-circle"
                            transform="translate(1.5 1.5)">
                            <path id="Path_91" data-name="Path 91" d="M33,18A15,15,0,1,1,18,3,15,15,0,0,1,33,18Z"
                                transform="translate(-3 -3)" fill="none" stroke="#bababa" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="3" />
                            <path id="Path_92" data-name="Path 92" d="M18,24l6-6-6-6" transform="translate(-3 -3)"
                                fill="none" stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="3" />
                            <path id="Path_93" data-name="Path 93" d="M12,18H24" transform="translate(-3 -3)"
                                fill="none" stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="3" />
                        </g>
                    </svg>
                </button>
            </div>
            </form>
        </div>
        <div class="">
            <p class="text-sm text-gray-pale letter-spacing-custom">&copy;2022 Lobahn Technology Limited. All rights
                reserved.<span class="block">Lobahn<sup class="top-0">&reg;</sup>, Lobahn Connect<sup
                        class="top-0">TM</sup>, Career Partner<sup class="top-0">TM</sup>, Talent
                    Discovery<sup class="top-0">TM</sup>, JSR<sup class="top-0">TM</sup> and JSR
                    Rating<sup class="top-0">TM</sup> are registered trademarks of Lobahn Technology Limited.
                    HK EA licence no. 66450. </span>
            </p>
        </div>
    </div>
</div>
