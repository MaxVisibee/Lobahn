@if (count($seekers) >= 3)
    <div class="wrapper">
        <div class="w-full bg-gray-warm-pale py-20">
            <p
                class="uppercase text-white xl:text-5xl md:text-4xl sm:text-3xl text-xl whitespace-nowrap pb-16 md:pl-48 flex md:justify-start justify-center xl:text-left text-center">
                featured members</p>
            <div class="flex justify-between">
                <div class="xl:flex hidden xl:w-15percent">

                    <div class="flex justify-start self-center">
                        <div class="feature-slider-container">
                            <div class="feature-slider-vertical bg-gray-light">
                                <p
                                    class="uppercase text-right py-9 text-gray-pale font-book text-lg whitespace-normal previousImage-position-title">
                                    @if (isset($first->carrier->carrier_level))
                                        {{ $first->carrier->carrier_level }}
                                    @endif
                                </p>
                                <p
                                    class="uppercase text-right py-9 text-white font-book text-lg whitespace-normal previousImage-name-title">
                                    {{ $first->name ?? 'LOBAHN MEMBER' }}</p>
                            </div>
                            <div class="">
                                <div class="">
                                    <img class="previousImage  opacity-50 object-cover m-auto "
                                        src="{{ asset('/img/home/feature/Intersection 7.png') }}"
                                        style="width: 170px;height:350px;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:flex hidden justify-center w-5percent self-center">
                    <div class="flex justify-center self-center feature-previous cursor-pointer">
                        <img src="{{ asset('/img/home/feature/Icon feather-arrow-left.png') }}" />
                    </div>
                </div>
                <div class="flex xl:w-3/5 md:w-90percent m-auto w-full justify-center">
                    <div class="w-full">
                        <div class="feature-member-carousel">
                            @foreach ($seekers as $key => $seeker)
                                <div class="flex  3xl-custom:px-0 px-4">
                                    <div class="lg:flex justify-center mx-4">
                                        <div class="feature-member-info-img flex">
                                            @if ($seeker->image)
                                                <img class="slider-image{{ $key }} slider-image-padding object-cover my-auto md:mr-0 xl:ml-4 mx-auto"
                                                    src="{{ asset('uploads/profile_photos/' . $seeker->image ?? '') }}" />
                                            @else
                                                <img class="slider-image{{ $key }} slider-image-padding object-cover my-auto md:mr-0 xl:ml-4 mx-auto"
                                                    src="{{ asset('/img/home/feature/profile.png') }}" />
                                            @endif

                                        </div>
                                        <div class="bg-gray  feature-member-info md:px-16 px-8 pt-20 ">
                                            <div class="flex justify-between">
                                                <div class="lg:hidden flex justify-center w-5percent self-center">
                                                    <div
                                                        class="flex justify-center self-center feature-previous cursor-pointer">
                                                        <img
                                                            src="{{ asset('/img/home/feature/Icon feather-arrow-left.png') }}" />
                                                    </div>
                                                </div>
                                                <p data-value="{{ $seeker->name ?? '' }}"
                                                    class="md:text-4xl sm-custom-480:text-3xl text-2xl font-heavy text-lime-orange slider-name-title slider-name-title{{ $key }}">
                                                    {{ $seeker->name ?? '' }}
                                                </p>
                                                <div class="lg:hidden flex justify-center w-5percent self-center">
                                                    <div
                                                        class="flex justify-center self-center feature-next cursor-pointer">
                                                        <img
                                                            src="{{ asset('/img/home/feature/Icon feather-arrow-right.png') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <p data-value="{{ $seeker->carrier->carrier_level ?? '' }}"
                                                class="md:text-21 text-lg font-heavy text-gray-pale pb-8 slider-position-title{{ $key }} position-title-text">
                                                @if (isset($seeker->carrier->carrier_level))
                                                    - {{ $seeker->carrier->carrier_level }}
                                                @endif
                                            </p>
                                            <p id="infotext"
                                                class="md:text-21 text-lg font-normal text-gray-pale pb-8 infotext">
                                                {{ \Illuminate\Support\Str::limit($seeker->description, 160, $end = '...') }}
                                            </p>
                                            <div class="md:text-21 text-lg font-heavy text-gray-pale flex-col">
                                                @if ($seeker->jobPositions)
                                                    @foreach ($seeker->jobPositions as $value)
                                                        <p>• {{ $value->job_title ?? '-' }}</p>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="tag-bar mt-7 text-sm">
                                                @foreach ($seeker->keywords as $keyword)
                                                @endforeach
                                                <span
                                                    class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">{{ $keyword->keyword_name ?? '' }}
                                                </span>
                                            </div>

                                            <div class="flex justify-center pt-8 pb-20">
                                                <button
                                                    class="feature-member-viewprofile-btn hover:bg-lime-orange hover:text-gray-light focus:outline-none outline-none py-2 px-2 w-56 border-2 border-lime-orange rounded-3xl text-lg font-book text-lime-orange"
                                                    data-value="{{ $seeker->name ?? '' }}"
                                                    @if (!Auth::user() && !Auth::guard('company')->user()) onclick="openModalBox('#sign-up-popup')" 
                                                    @else 
                                                    onclick="window.location='{{ url('company-home') }}'" @endif>View
                                                    {{ $seeker->name }}'s profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="lg:flex hidden justify-center w-5percent self-center">
                    <div class="flex justify-center self-center feature-next cursor-pointer">
                        <img src="{{ asset('/img/home/feature/Icon feather-arrow-right.png') }}" />
                    </div>
                </div>
                <div class="xl:flex hidden xl:w-15percent justify-end self-center">
                    <div class="feature-slider-container">
                        <div class="">
                            <div class="">
                                <img class="nextImage opacity-50 object-cover m-auto "
                                    src="{{ asset('/img/home/feature/Intersection 4.png') }}"
                                    style="width: 170px;height:350px;" />
                            </div>
                        </div>
                        <div class="feature-slider-vertical bg-gray-light">
                            <p
                                class="uppercase text-right py-9 text-gray-pale font-book text-lg whitespace-normal nextImage-position-title">
                                @if (isset($latest->carrier->carrier_level))
                                    {{ $latest->carrier->carrier_level }}
                                @endif
                            </p>
                            <p
                                class="uppercase  text-right py-9 text-white font-book text-lg whitespace-nowrap nextImage-name-title">
                                @if ($latest)
                                    {{ $latest->name ?? 'LOBAHN MEMBER' }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endif
