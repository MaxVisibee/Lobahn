@if (count($opportunities) >= 3)
    <div class="wrapper">
        <div class="w-full bg-gray-warm-pale py-20">
            <p
                class="uppercase text-white xl:text-5xl md:text-4xl sm:text-3xl text-xl whitespace-nowrap pb-16 md:pl-48 flex md:justify-start justify-center xl:text-left text-center">
                featured OPPORTUNITIES</p>
            <div class="flex justify-between">
                <div class="xl:flex hidden xl:w-15percent">

                    <div class="flex justify-start self-center">
                        <div class="feature-slider-container">
                            <div class="feature-opportunity-slider-vertical bg-gray-light px-1">

                                <p
                                    class="uppercase text-right py-9 text-white font-book text-lg whitespace-normal previousImage-position-title-opportunity">
                                    {{ $first_opporunity->company->company_name ?? '' }}</p>
                                <p
                                    class="uppercase text-right py-9 text-gray-pale font-book text-lg whitespace-normal previousImage-name-title-opportunity">
                                    {{ $first_opporunity->title ?? '' }}
                                </p>
                            </div>
                            <div class="">
                                <div class="h-full">
                                    <img class="feature-opportunity-previousImage  opacity-50 object-cover m-auto "
                                        src="@isset($first_opporunity->company->company_logo) {{ asset('uploads/company_logo/' . $first_opporunity->company->company_logo) }}
                                                @else  
                                                    {{ asset('/img/default-opp.png') }} @endisset"
                                        style="width: 170px;height:100%;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:flex hidden justify-center w-5percent self-center">
                    <div class="flex justify-center self-center feature-opportunity-previous cursor-pointer">
                        <img src="{{ asset('/img/home/feature/Icon feather-arrow-left.png') }}" />
                    </div>
                </div>
                <div class="flex xl:w-3/5 md:w-90percent m-auto w-full justify-center">
                    <div class="w-full">
                        <div class="feature-opportunity-carousel">
                            @foreach ($opportunities as $key => $opportunity)
                                <div class="flex 3xl-custom:px-0 px-0">
                                    <div class="lg:flex justify-center mx-4">
                                        <div class="feature-member-info-img flex">
                                            <img class="slider-image0 slider-image-padding object-cover my-auto md:mr-0 xl:ml-0 mx-auto"
                                                src="@isset($opportunity->company->company_logo) {{ asset('uploads/company_logo/' . $opportunity->company->company_logo) }}
                                                @else  
                                                    {{ asset('/img/default-opp.png') }} @endisset" />
                                        </div>
                                        <div class="feature-opportunity-info bg-gray rounded-corner relative ">
                                            <div class="flex md:p-8 p-4">
                                                <div
                                                    class="mobile-slick-icon absolute top-1/2 left-4 -translate-y-1/2 justify-center self-center feature-opportunity-previous cursor-pointer">
                                                    <img
                                                        src="{{ asset('/img/home/feature/Icon feather-arrow-left.png') }}" />
                                                </div>
                                                <div>
                                                    <div class="flex flex-col-reverse">
                                                        <div>
                                                            <h1 class="text-xl md:text-2xl 2xl-custom-1366:text-3xl 2xl-custom-1560:text-32 3xl-custom:text-4xl text-lime-orange mt-4 mb-2 featured-opportunity-title featured-opportunity-title0"
                                                                data-value="{{ $opportunity->title }}">
                                                                {{ $opportunity->title }}</h1>
                                                            <div
                                                                class="text-base lg:text-lg text-gray-light1 letter-spacing-custom">
                                                                <span
                                                                    class="featured-opportunity-name{{ $key }}"
                                                                    data-value="{{ $opportunity->company->company_name ?? '' }}">{{ $opportunity->company->company_name ?? '' }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-wrap justify-between pr-4 w-4/5 mt-4">
                                                        @php
                                                            $industries = DB::table('industry_usages')
                                                                ->where('opportunity_id', $opportunity->id)
                                                                ->get()
                                                                ->pluck('industry_id');
                                                        @endphp
                                                        @if (count($industries) != 0)
                                                            <div class="flex pr-4">
                                                                <img src="{{ asset('/img/industry.svg') }}"
                                                                    class="w-auto" />
                                                                <p class="font-futura-pt text-lg text-gray-pale pl-2">
                                                                    @if (count($industries) > 1)
                                                                        {{ DB::table('industries')->where('id', $industries[0])->get()->pluck('industry_name')[0] ?? '' }}
                                                                        +{{ count($industries) - 1 }}
                                                                    @else
                                                                        {{ DB::table('industries')->where('id', $industries[0])->get()->pluck('industry_name')[0] ?? '' }}
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        @endif

                                                        @isset($opportunity->carrier->carrier_level)
                                                            <div class="flex pr-4">
                                                                <img src="{{ asset('/img/people.svg') }}"
                                                                    class="w-auto" />
                                                                <p class="font-futura-pt text-lg text-gray-pale pl-2">
                                                                    {{ $opportunity->carrier->carrier_level ?? '' }}
                                                                </p>
                                                            </div>
                                                        @endisset

                                                        @php
                                                            $areas = DB::table('functional_area_usages')
                                                                ->where('opportunity_id', $opportunity->id)
                                                                ->get()
                                                                ->pluck('functional_area_id');
                                                        @endphp
                                                        @if (count($areas) != 0)
                                                            <div class="flex">
                                                                <img src="{{ asset('/img/area.svg') }}"
                                                                    class="w-auto" />
                                                                <p class="font-futura-pt text-lg text-gray-pale pl-2">
                                                                    @if (count($areas) > 1)
                                                                        {{ DB::table('functional_areas')->where('id', $area_id)->get()->pluck('area_name')[0] ?? '' }}
                                                                        + {{ count($areas) }}
                                                                    @else
                                                                        {{ DB::table('functional_areas')->where('id', $area_id)->get()->pluck('area_name')[0] ?? '' }}
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div
                                                        class="border border-gray-pale border-t-0 border-l-0 border-r-0 my-4">
                                                    </div>
                                                    <ul
                                                        class="2xl-custom-1440:mt-6 mt-3 mb-3 2xl-custom-1440:mb-10 text-white mark-yellow 2xl-custom-1366:text-2xl sm:text-xl text-lg">
                                                        @isset($opportunity->highlight_1)
                                                            <li class="mb-2 3xl-custom:mb-4">
                                                                {{ $opportunity->highlight_1 }}
                                                            </li>
                                                        @endisset
                                                        @isset($opportunity->highlight_2)
                                                            <li class="mb-2 3xl-custom:mb-4">
                                                                {{ $opportunity->highlight_2 }}
                                                            </li>
                                                        @endisset
                                                        @isset($opportunity->highlight_3)
                                                            <li class="mb-2 3xl-custom:mb-4">
                                                                {{ $opportunity->highlight_3 }}
                                                            </li>
                                                        @endisset
                                                    </ul>
                                                    <div
                                                        class="border border-gray-pale border-t-0 border-l-0 border-r-0 my-4">
                                                    </div>
                                                    <div class="opportunity-description mt-7">
                                                        <p class="text-white feature-slider-description">
                                                            {!! $opportunity->description !!}
                                                        </p>
                                                    </div>
                                                    <div class="tag-bar mt-7 text-sm">
                                                        @php
                                                            $keywords = DB::table('keyword_usages')
                                                                ->where('opportunity_id', $opportunity->id)
                                                                ->get()
                                                                ->pluck('keyword_id');
                                                        @endphp
                                                        @foreach ($keywords as $keyword_id)
                                                            <span
                                                                class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">{{ DB::table('keywords')->where('id', $keyword_id)->get()->pluck('keyword_name')[0] ?? '' }}</span>
                                                        @endforeach
                                                    </div>
                                                    <div class="button-bar flex justify-center sm:mt-5">
                                                        <a @if (!Auth::user() && !Auth::guard('company')->user()) href="{{ route('login') }}"
                                                        @else
                                                            @if (Auth::user())  href="{{ route('candidate.dashboard') }}" @else  href="{{ route('company.home') }}" @endif
                                                            @endif
                                                            class="focus:outline-none text-gray bg-lime-orange text-sm sm:text-base xl:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange custom-rounded-btn py-3 px-7 mr-4 full-detail-btn inline-block">View
                                                            Full Details</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="mobile-slick-icon absolute top-1/2 right-4 justify-center self-center feature-opportunity-next cursor-pointer">
                                                    <img
                                                        src="{{ asset('/img/home/feature/Icon feather-arrow-right.png') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="lg:flex hidden justify-center w-5percent self-center">
                    <div class="flex justify-center self-center feature-opportunity-next cursor-pointer">
                        <img src="{{ asset('/img/home/feature/Icon feather-arrow-right.png') }}" />
                    </div>
                </div>
                <div class="xl:flex hidden xl:w-15percent justify-end self-center">
                    <div class="feature-slider-container">
                        <div class="">
                            <div class="h-full">
                                <img class="feature-opportunity-nextImage opacity-50 object-cover m-auto "
                                    src="@isset($latest_opporunity->company->company_logo) {{ asset('uploads/company_logo/' . $latest_opporunity->company->company_logo) }}
                                                @else  
                                                    {{ asset('/img/default-opp.png') }} @endisset"
                                    style="width: 170px;height:100%;" />
                            </div>
                        </div>
                        <div class="feature-opportunity-slider-vertical bg-gray-light px-1">
                            <p
                                class="uppercase text-right py-9 text-gray-pale font-book text-lg whitespace-normal nextImage-position-title-opportunity">
                                {{ $latest_opporunity->company->company_name ?? '' }}</p>
                            <p
                                class="uppercase text-right py-9 text-white font-book text-lg whitespace-normal nextImage-name-title-opportunity">
                                {{ $latest_opporunity->title ?? '' }}</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endif
