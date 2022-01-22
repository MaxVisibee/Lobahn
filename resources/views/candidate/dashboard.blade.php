@extends('layouts.master')
@section('content')
<div class="bg-gray-light2 dashboard-container-margin md:pt-40 pt-48 pb-2">
    <div class="grid xl:grid-cols-4 md:grid-cols-2 memberprofessional-dashboard-gap-safari gap-2 pb-2">
        <div class="md:col-span-2 bg-white py-8 rounded-lg">
            <div class="md:flex w-full md:px-8 px-2">
                <div class="md:w-30percent w-full">
                    @if ($user->image)
                    <img class="md:ml-0 m-auto" src="{{ asset('uploads/profile_photos/' . $user->image) }}" />
                    @else
                    <img class="md:ml-0 m-auto object-cover rounded-full" src="./img/dashboard/chris-wong.png" />
                    @endif
                    
                </div>
                <div class="md:ml-8 md:w-70percent w-full">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-2xl text-gray font-heavy">{{ $user->name }}</p>
                            <p class="text-base text-gray-light1 font-book">Digital Marketing Guru</p>
                        </div>
                        <!-- <div>
                            <img class="cursor-pointer" src="./img/corporate-menu/dashboard/edit.svg" />
                        </div> -->
                    </div>
                    <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                        <span class="text-base text-smoke mr-1 font-book">Username</span>
                        <span class="text-base text-gray font-book">{{ $user->name }}</span>
                    </div>
                    <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                        <span class="text-base text-smoke mr-1 font-book">Email</span>
                        <span class="text-base text-gray font-book">{{ $user->email }}</span>
                    </div>
                    <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                        <span class="text-base text-smoke mr-1 font-book">Contact</span>
                        <span class="text-base text-gray font-book">{{ $user->phone }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-1 bg-white rounded-lg py-8 flex justify-center">
            <div class="flex justify-center self-center">
                <div>
                    <img class="object-contain m-auto" src="./img/corporate-menu/dashboard/bar.png" />
                    <div class="mt-4">
                        <p class="text-center text-lg text-gray-light1 font-book">NO. OF IMPRESSIONS</p>
                        <p class="text-center text-4xl text-gray font-heavy">{{ number_format($user->num_impressions) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-1 bg-white rounded-lg py-8 flex justify-center">
            <div class="self-center">
                <img class="object-contain m-auto" src="./img/corporate-menu/dashboard/mouseicon.svg" />
                <div class="mt-4">
                    <p class="text-center text-lg text-gray-light1 font-book">NO. OF CLICKS</p>
                    <p class="text-center  text-4xl text-gray font-heavy">{{ number_format($user->num_clicks) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="dashboard-container-margin pb-40">
    <div class="md:px-12 px-4 bg-white pt-12 pb-12 rounded-lg">
        <div class="md:flex md:justify-between mb-10 md:items-center">
            <div>
                <p class="text-gray text-2xl font-book">OPPORTUNITIES</p>
            </div>
            <div class="md:flex justify-center items-center">
                <p class="text-gray text-base font-book whitespace-nowrap md:mr-2">Sort by</p>
                <div class="dashboard-select-wrapper text-gray-pale">
                    <div class="dashboard-select-preferences">
                        <div
                            class="dashboard-select__trigger py-2 relative flex items-center text-gray justify-between pl-2 bg-gray-light3 cursor-pointer">
                            <span class="">Listing Date</span>
                            <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg" width="13.328"
                                height="7.664" viewBox="0 0 13.328 7.664">
                                <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                    transform="translate(19.414 -16.586) rotate(90)" fill="none" stroke="#2F2F2F"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>

                        </div>
                        <div
                            class="dashboard-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                            <div class="flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                data-value="Listing Date">
                                <div class="flex dashboard-select-custom-icon-container">
                                    <img class="mr-2 checkedIcon1" src="./img/dashboard/checked.svg" />
                                </div>
                                <span class="dashboard-select-custom-content-container text-gray pl-4">Listing
                                    Date</span>
                            </div>
                            <div class="flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                data-value="JSR™ Score">
                                <div class="flex dashboard-select-custom-icon-container">
                                    <img class="mr-2 checkedIcon2 hidden" src="./img/dashboard/checked.svg" />
                                </div>
                                <span class="dashboard-select-custom-content-container pl-4 text-gray">JSR™
                                    Score</span>
                            </div>
                            <div class="flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                data-value="Status">
                                <div class="flex dashboard-select-custom-icon-container">
                                    <img class="mr-2 checkedIcon3 hidden" src="./img/dashboard/checked.svg" />
                                </div>
                                <span class="dashboard-select-custom-content-container text-gray pl-4">Status</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($featured_opportunities as $featured_opportunitie)
        <div class="lg:flex mt-4 w-full">
            <div class="3xl-custom:w-1/6 flex justify-center xl:w-1/4 lg:w-2/6 w-full py-4 dashboard-list-container-radius-selected lg:text-center lg:pl-0 pl-4 mr-1px relative">
                <div class="self-center bg-gray inline-block rounded-2xl">
                    <p class="text-lg font-heavy px-8 py-1 text-lime-orange uppercase">featured</p>
                </div>
            </div>
            <div class="py-4 3xl-custom:w-10/12 xl:w-9/12 lg:w-4/6 w-full md:flex md:justify-between dashboard-list-container-radius1-selected lg:pl-4">
                <div class="flex lg:justify-center justify-start self-center lg:pl-0 pl-4">
                    <div class="">
                        <p class="font-heavy text-gray text-2xl">{{$featured_opportunitie->title}}</p>
                        <p class="font-book text-lg text-gray-light1">{{$featured_opportunitie->company->company_name}}</p>
                        <p class="font-book text-lg text-gray-light1">Listed {{ date('M d, Y', strtotime($featured_opportunitie->created_at)) }} </p>
                    </div>
                </div>
                <div class="flex justify-center self-center pr-4 ">
                    <button type="button" class="uppercase rounded-md hover:bg-transparent hover:border-gray hover:text-gray focus:outline-none font-book text-lime-orange text-lg border-gray border bg-gray py-2 px-11" onclick="openModalBox('#feature-opportunity-popup-{{$featured_opportunitie->id}}')">
                        View
                    </button>
                </div>
            </div>
        </div>
        @endforeach

        @foreach ($opportunities as $key => $opportunity)
        <div class="lg:flex mt-4 w-full">
            <div
                class="3xl-custom:w-1/6 xl:w-1/4 lg:w-2/6 w-full {{ $opportunity->isviewed($opportunity->job_id, Auth::id()) == null ? 'dashboard-list-container-radius-selected' : 'dashboard-list-container-radius' }} lg:text-center lg:pl-0 pl-4 mr-1px relative">
                <div class="flex justify-center pt-3">
                    <div class=" pt-3">
                       
                        <p class="font-heavy text-gray text-5xl">{{ $opportunity->jsr_percent }} %</p>
                        <p class="font-book text-lg text-gray-light1">JSR™ Score</p>
                       
                    </div>
                    <div class="absolute left-0 top-0 dashboard-new">
                        
                        @if ($opportunity->isviewed($opportunity->job_id, Auth::id()) == null)
                                <p class="text-lime-orange text-sm font-book px-4"> New </p>
                            @elseif ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null)
                                <p class="text-lime-orange text-sm font-book px-4"> Profile Sent </p>
                                @else
                            <p class="text-lime-orange text-sm font-book px-4">Viewed</p>
                            @endif
                            
                    </div>
                </div>
            </div>
            <div
                class="py-4 3xl-custom:w-10/12 xl:w-9/12 lg:w-4/6 w-full md:flex md:justify-between {{ $opportunity->isviewed($opportunity->job_id, Auth::id()) == null ? 'dashboard-list-container-radius1-selected' : 'dashboard-list-container-radius1' }} lg:pl-4">
                <div class="flex lg:justify-center justify-start self-center lg:pl-0 pl-4">
                    <div class="">
                        <p class="font-heavy text-gray text-2xl">{{ $opportunity->title }}
                        </p>
                        <p class="font-book text-lg text-gray-light1">
                            {{ $opportunity->company->company_name ?? '' }}
                        </p>
                        <p class="font-book text-lg text-gray-light1">Listed {{ date('M d, Y', strtotime($opportunity->created_at)) }} <span class="dot bg-gray-light1 inline-block align-middle rounded-full mx-3.5"></span> 
                            @if ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null && $opportunity->isconnected($opportunity->job_id, Auth::id())->is_shortlisted = true )
                                Your profile was shortlisted last {{ date('M d, Y', strtotime($opportunity->isconnected($opportunity->job_id, Auth::id())->updated_at)) }}
                            @elseif ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null && $opportunity->isconnected($opportunity->job_id, Auth::id())->is_connected = true )
                                You connected last {{ date('M d, Y', strtotime($opportunity->isconnected($opportunity->job_id, Auth::id())->updated_at)) }}
                            @elseif ($opportunity->isviewed($opportunity->job_id, Auth::id()) != null)
                                Your profile was viewed last {{date('M d, Y', strtotime($opportunity->isviewed($opportunity->job_id, Auth::id())->updated_at))}}
                            @endif
                        </p>

                    </div>
                </div>
                <div class="flex justify-center self-center pr-4">
                    <button type="button"
                        class="job-view uppercase rounded-md hover:bg-transparent hover:border-gray hover:text-gray focus:outline-none font-book text-lime-orange text-lg border-gray border bg-gray py-2 px-11"
                        onclick="openModalBox('#opportunity-popup-{{ $opportunity->id }}')">
                        View
                    </button>
                    <input type="hidden" value="{{ $opportunity->job_id }}">
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Feature Opportunity Pop Up -->
@foreach($featured_opportunities as $featured_opportunitie)
<div class="fixed top-0 w-full h-screen left-0 hidden z-30 bg-black-opacity" id="feature-opportunity-popup-{{$featured_opportunitie->id}}">  
    <div class="absolute left-1/2 cus_width_1400 cus_top_level cus_transform_50">
        <div class="mb-20">
            <div class="relative">       
                <div class="bg-gray-light rounded-corner relative">
                    <div class="absolute shopify-image-box staff-profile-div cz-index">
                        <img src="./img/member-opportunity/shopify.png" alt="shopify icon" class="shopify-image">
                    </div>
                    <div class="bg-lime-orange flex flex-row items-center letter-spacing-custom m-opportunity-box__title-bar rounded-corner" >
                        <div class="flex justify-center m-opportunity-box__title-bar__height percent text-center py-8 relative">
                            <div class="self-center bg-gray inline-block rounded-2xl">
                                <p class="text-lg font-heavy px-8 py-1 text-lime-orange uppercase">featured</p>
                            </div>
                        </div>
                        <div class="m-opportunity-box__title-bar__height match-target ml-8 py-11 2xl:py-12">
                            <p class="text-lg md:text-xl lg:text-2xl font-heavy text-black">MATCHES YOUR TARGET SALARY RANGE</p>
                        </div>
                    </div>
                    <button class="absolute top-5 right-5 cursor-pointer focus:outline-none" onclick="toggleModalClose('#feature-opportunity-popup-{{$featured_opportunitie->id}}')">
                        <img src="./img/sign-up/close.svg" alt="close modal image">
                    </button>
                    <div class="match-company-box p-12">
                        <div class="mt-10 sm:mt-0">
                            <span class="text-lg text-gray-light1 mr-4">#12345678</span>
                            <span class="text-sm bg-lime-orange text-black rounded-full px-3 py-0.5">New</span>
                        </div>
                        <h1 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl text-lime-orange mt-4 mb-2">AVP - DIGITAL MARKETING - CONSUMER</h1>
                        <div class="text-base lg:text-lg text-gray-light1 letter-spacing-custom">
                            <span class="">Johnson & Johnson Asia Pacific</span>
                            <span class="listed-label relative"></span>
                            <span class="listed-date">Listed Oct 10, 2021</span>
                        </div>
                        <ul class="mt-6 mb-10 text-white mark-yellow xl:text-2xl sm:text-xl text-lg">
                            @if ($featured_opportunitie->highlight_1) <li class="xl:mb-4 sm:mb-2">{{ $featured_opportunitie->highlight_1 }}</li> @endif
                        @if ($featured_opportunitie->highlight_2) <li class="xl:mb-4 sm:mb-2">{{ $featured_opportunitie->highlight_2 }}</li> @endif
                        @if ($featured_opportunitie->highlight_3) <li class="xl:mb-4 sm:mb-2">{{ $featured_opportunitie->highlight_3 }}</li> @endif
                        </ul>
                        <div class="border border-gray-pale border-t-0 border-l-0 border-r-0 my-4">
                        </div>
                        <div class="mt-7">
                            <p class="text-white sign-up-form__information--fontSize">
                                {{ $featured_opportunitie->description }}
                            </p>
                        </div>
                        <div class="tag-bar mt-7 text-sm">
                            @foreach ($featured_opportunitie->mykeywords() as $mykey)
                                <span
                                    class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">{{ $mykey->keyword()->keyword_name }}</span>
                            @endforeach
                        </div>
                        <div class="button-bar mt-5">
                            <a href="{{ url('opportunity/' . $featured_opportunitie->job_id) }}" class="focus:outline-none text-gray bg-lime-orange text-sm sm:text-base xl:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 px-12 mr-4 full-detail-btn feature-opportunity-popup.html" >MORE DETAILS</a>
                            <button class="focus:outline-none btn-bar text-gray-light bg-smoke text-sm lg:text-lg hover:bg-transparent border border-smoke rounded-corner py-2 px-4 hover:text-lime-orange delete-o-btn" onclick="openModalBox('#delete-opportunity-popup')">DELETE</button>
                        </div> 
                    </div>           
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- Normal Opportunity Popup --}}
@foreach ($opportunities as $key => $opportunity)
<div class="fixed top-0 w-full h-screen left-0 hidden z-30 bg-black-opacity overflow-y-auto hidden"
    id="opportunity-popup-{{ $opportunity->id }}">
    <div class="absolute left-1/2 cus_width_1400 cus_top_level cus_transform_50">
        <div class="relative mb-20">

            <div
                class="bg-lime-orange flex flex-row items-center letter-spacing-custom m-opportunity-box__title-bar rounded-sm rounded-b-none relative">
                <div class="m-opportunity-box__title-bar__height percent text-center py-8 relative">
                    <p class="text-3xl md:text-4xl lg:text-5xl font-heavy text-gray mb-1">
                        {{ $opportunity->jsr_percent }}
                    </p>
                    <p class="text-base text-gray-light1">JSR<sup>TM</sup> Ratio</p>
                </div>
                <div class="m-opportunity-box__title-bar__height match-target ml-8 py-11 2xl:py-12">
                    <p class="text-lg md:text-xl lg:text-2xl font-heavy text-black">MATCHES YOUR TARGET SALARY</p>
                </div>
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#opportunity-popup-{{ $opportunity->id }}')">
                    <img src="{{ asset('/img/sign-up/black-close.svg') }}" alt="close modal image"
                        class="reload">
                </button>
                <div class="absolute opportunity-image-box cus_transform_50">
                    <img src="{{ asset('/uploads/company_logo/' . $opportunity->company->company_logo) }}"
                        alt="shopify icon" class="shopify-image">
                </div>
            </div>
            <div class="bg-gray-light rounded-sm rounded-t-none pt-8 sm:pt-0">
                <div class="match-company-box p-4 sm:p-12">
                    <div>
                        <span class="text-lg text-gray-light1 mr-4">#12345678</span>

                        @if ($opportunity->isviewed($opportunity->job_id, Auth::id()) == null)
                            <span class="text-sm bg-lime-orange text-black rounded-full px-3 py-0.5">
                                New
                            </span>
                        @endif
                    </div>
                    <h1 class="text-xl md:text-3xl xl:text-4xl text-lime-orange mt-4 mb-2">
                        {{ $opportunity->title }} </h1>
                    <div class="text-sm sm:text-base xl:text-lg text-gray-light1 letter-spacing-custom">
                        <span class="">{{ $opportunity->company->company_name ?? '' }}</span>
                        <span class="listed-label relative"></span>
                        <span class="listed-date">Listed
                            {{ date('M d, Y', strtotime($opportunity->created_at)) }}</span>
                    </div>
                    <ul class="mt-6 mb-10 text-white mark-yellow xl:text-2xl md:text-xl sm:text-lg text-base">
                        @if ($opportunity->highlight_1) <li class="xl:mb-4 sm:mb-2">{{ $opportunity->highlight_1 }}</li> @endif
                        @if ($opportunity->highlight_2) <li class="xl:mb-4 sm:mb-2">{{ $opportunity->highlight_2 }}</li> @endif
                        @if ($opportunity->highlight_3) <li class="xl:mb-4 sm:mb-2">{{ $opportunity->highlight_3 }}</li> @endif
                    </ul>
                    <div class="border border-gray-pale border-t-0 border-l-0 border-r-0 my-4">
                    </div>
                    <div class="mt-7">
                        <p class="text-white sign-up-form__information--fontSize">
                            {{ $opportunity->description }}
                        </p>
                    </div>

                    @if (is_array($opportunity->mykeywords()))
                        <div class="tag-bar sm:mt-7 text-xs sm:text-sm">
                            @foreach ($opportunity->mykeywords() as $mykey)
                                <span
                                    class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">{{ $mykey->keyword()->keyword_name }}</span>
                            @endforeach
                        </div>
                    @endif

                    <div class="button-bar sm:mt-5">
                        <a href="{{ url('opportunity/' . $opportunity->job_id) }}"
                            class="focus:outline-none text-gray bg-lime-orange text-sm sm:text-base xl:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 px-12 mr-4 full-detail-btn inline-block">FULL
                            DETAILS</a>
                        <button
                            class="focus:outline-none btn-bar text-gray-light bg-smoke text-sm sm:text-base xl:text-lg hover:bg-transparent border border-smoke rounded-corner py-2 px-4 hover:text-lime-orange delete-o-btn"
                            onclick="openModalBox('#delete-opportunity-popup-{{ $opportunity->id }}')">DELETE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity"
    id="delete-opportunity-popup-{{ $opportunity->id }}">
    <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
        <div
            class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-10 pb-12 relative">
            <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">DELETE OPPORTUNITY</h1>
            <p class="text-gray-pale popup-text-box__description connect-employer-text-box">By clicking on
                'Confirm', this opportunity will be removed from your dashboard.</p>
            <p class="text-gray-pale popup-text-box__description mb-4">Do you wish to proceed?</p>
            <div class="button-bar button-bar--width mt-4">
                <button
                    class="btn-bar focus:outline-none text-gray bg-lime-orange text-sm lg:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 px-4 mr-2"
                    onclick="toggleModalClose('#delete-opportunity-popup-{{ $opportunity->id }}')">CONFIRM</button>
                <button
                    class="btn-bar focus:outline-none text-gray-pale bg-smoke-dark text-sm lg:text-lg hover:bg-transparent border border-smoke-dark rounded-corner py-2 px-4"
                    onclick="toggleModalClose('#delete-opportunity-popup-{{ $opportunity->id }}')">CANCEL</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.job-view').click(function() {
                $.ajax({
                    type: 'POST',
                    url: 'update-viewcount',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'opportunity_id': $(this).next().val()
                    }
                });
            });

            $('.reload').click(function(e) {
                e.preventDefault();
                location.reload();
            });
        });
    </script>
@endpush
