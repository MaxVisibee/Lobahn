@extends('layouts.master')
@section('content')
    {{-- <div class="fixed top-0 w-full h-screen left-0 z-50 bg-black-opacity block" id="corporate-wants-to-connect-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-10 pb-12 relative">
                <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">&lt;COMPANY-NAME> WANTS TO CONNECT
                    WITH YOU</h1>
                <p class="text-gray-pale popup-text-box__description connect-connect-text-box"> Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Proin quis tempor justo, eu placerat ante.
                    Duis
                    sodales viverra lacus, ut viverra mi ornare nec.</p>
                <div class="button-bar button-bar--width mt-4">
                    <button
                        class="btn-bar focus:outline-none text-gray bg-lime-orange text-sm lg:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 px-12 mr-4 md:mb-0 mb-3"
                        onclick="">CONNECT</button>
                    <button
                        class="btn-bar focus:outline-none text-gray-pale bg-smoke-dark text-sm lg:text-lg hover:bg-transparent border border-smoke-dark rounded-corner py-2 px-4"
                        onclick="toggleModalClose('#corporate-wants-to-connect-popup')">CANCEL</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Payment Success Popup -->
    <div class="fixed top-0 w-full h-screen hidden left-0 z-50 bg-black-opacity" id="optimization-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container--height pt-16 pb-8 relative">
                <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">THAT'S ALL FOR NOW!</h1>
                <p class="text-gray-pale popup-text-box__description individual-successful-description">Get ready to
                    receive well-matched career opportunities that fit your criteria!</p>
                <div class="sign-up-form sign-up-form--individual-success sign-up-optimize-box my-5">
                    <ul
                        class="flex flex-col justify-center mb-3 sign-up-form__information sign-up-form__information--individual">
                        <a href="{{ route('career.opitimize') }}"
                            class="mx-auto active-fee sign-up-form__fee successful-options cursor-pointer hover:bg-lime-orange hover:text-gray text-lime-orange mb-4 rounded-full tracking-wide text-sm lg:text-base xl:text-lg border border-lime-orange py-5">For
                            best results, optimize your profile now!</a>
                        <a id="close-optimization-popup"
                            class="mx-auto cursor-pointer sign-up-form__fee successful-options hover:bg-lime-orange hover:text-gray text-lime-orange mb-4 rounded-full tracking-wide text-sm lg:text-base xl:text-lg border border-lime-orange py-5">I'll
                            optimize my profile later</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Payment Success Popup -->

    <div class="bg-gray-light2 dashboard-container-margin md:pt-40 pt-48">
        <div class="grid xl:grid-cols-4 md:grid-cols-2 pb-2">
            <div class="md:col-span-2 bg-white py-8 rounded-lg custom-margin-right1">
                <div class="md:flex w-full md:px-8 px-2">
                    <div class="md:w-30percent w-full">
                        @if ($user->image)
                            <img class="md:ml-0 m-auto rounded-full member-profile-image"
                                src="{{ asset('uploads/profile_photos/' . $user->image) }}" />
                        @else
                            <img class="md:ml-0 m-auto rounded-full member-profile-image"
                                src="{{ asset('uploads/profile_photos/profile-big.jpg') }}" alt="profile image" />
                        @endif
                        @if ($user->is_trial)
                            <p class="trial-message block text-gray-light1 font-book text-center mt-4 mb-4">
                                (Free Trial -
                                {{ $user->trial_days }} days left )
                            </p>
                        @endif
                    </div>
                    <div class="md:ml-8 md:w-70percent w-full">
                        <div class="flex md:justify-start justify-center">
                            <div>
                                <p class="md:text-2xl text-xl font-heavy text-gray letter-spacing-custom text-center">
                                    {{ $user->name }}</p>
                            </div>
                        </div>
                        <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                            <span class="text-base text-smoke mr-1 font-book">Username</span>
                            <span class="text-base text-gray font-book">{{ $user->user_name }}</span>
                        </div>
                        <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                            <span class="text-base text-smoke mr-1 font-book">Email</span>
                            <span class="text-base text-gray font-book">{{ $user->email }}</span>
                        </div>
                        <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                            <span class="text-base text-smoke mr-1 font-book">Contact</span>

                            <span class="text-base text-gray font-book">
                               
                                    {{$user->phone}}
                              
                            </span>

                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-margin-top md:col-span-1 bg-white rounded-lg py-8 flex justify-center custom-margin-right">
                <div class="flex justify-center self-center">
                    <div>
                        <img class="object-contain m-auto" src="./img/corporate-menu/dashboard/bar.png" />
                        <div class="mt-4">
                            <p class="text-center text-lg text-gray-light1 font-book">NO. OF IMPRESSIONS</p>
                            <p class="text-center text-4xl text-gray font-heavy">
                                {{ number_format($user->num_impressions) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-margin-top md:col-span-1 bg-white rounded-lg py-8 flex justify-center">
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
    <div class="dashboard-container-margin pb-40 custom-padding-top">
        <div class="md:px-12 px-4 bg-white pt-12 pb-12 rounded-lg filter-container">
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
                                <div class="date-sort flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                    data-value="Listing Date">
                                    <div class="flex dashboard-select-custom-icon-container">
                                        <img class="mr-2 checkedIconOne"
                                            src="{{ asset('/img/dashboard/checked.svg') }}" />
                                    </div>
                                    <span class="dashboard-select-custom-content-container text-gray pl-4">Listing
                                        Date</span>
                                </div>
                                <div class="jsr-sort flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                    data-value="JSR??? Score (High-Low)">
                                    <div class="flex dashboard-select-custom-icon-container">
                                        <img class="mr-2 checkedIconTwo hidden"
                                            src="{{ asset('/img/dashboard/checked.svg') }}" />
                                    </div>
                                    <span class="dashboard-select-custom-content-container pl-4 text-gray">JSR???
                                        Score (High-Low)</span>
                                </div>
                                <div class="jsr-resort flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                    data-value="JSR??? Score (Low-Hight)">
                                    <div class="flex dashboard-select-custom-icon-container">
                                        <img class="mr-2 checkedIconThree hidden"
                                            src="{{ asset('/img/dashboard/checked.svg') }}" />
                                    </div>
                                    <span class="dashboard-select-custom-content-container pl-4 text-gray">JSR???
                                        Score (Low-Hight)</span>
                                </div>
                                <div class="status-sort flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                    data-value="Status">
                                    <div class="flex dashboard-select-custom-icon-container">
                                        <img class="mr-2 checkedIconFour hidden"
                                            src="{{ asset('/img/dashboard/checked.svg') }}" />
                                    </div>
                                    <span class="dashboard-select-custom-content-container text-gray pl-4">Status</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- filter with date section -->
            <div class="opportunities_with_date">
                @foreach ($feature_opportunities_with_date as $featured_opportunitie)
                    <div class="lg:flex mt-4 w-full">
                        <div
                            class="3xl-custom:w-1/6 xl:w-1/4 lg:w-2/6 w-full py-4 {{ $featured_opportunitie->isviewed($featured_opportunitie->job_id, Auth::id()) == null ? 'dashboard-list-container-radius1-selected' : 'dashboard-list-container-radius1' }} lg:text-center lg:pl-0 pl-4 mr-1px relative">
                            <div class="flex justify-center pt-3">
                                <div>
                                    <p class="font-heavy text-gray text-5xl">
                                        {{ $featured_opportunitie->jsr_percent + 0 }} %
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">JSR??? Score</p>
                                </div>
                            </div>
                            <div>
                                <div class="absolute left-0 top-0 flex">
                                    @if ($featured_opportunitie->isviewed($featured_opportunitie->job_id, Auth::id()) == null)
                                        <p class="text-lime-orange text-sm font-book px-4 dashboard-new">New</p>
                                    @endif
                                    <p class="text-lime-orange text-sm font-book px-4 dashboard-featured">Featured</p>
                                </div>
                            </div>
                            <div class="absolute left-0 top-0 dashboard-new">
                                {{-- <p class="text-lime-orange text-sm font-book px-4">New</p> --}}
                            </div>
                        </div>
                        <div
                            class="py-4 3xl-custom:w-10/12 xl:w-9/12 lg:w-4/6 w-full md:flex md:justify-between {{ $featured_opportunitie->isviewed($featured_opportunitie->job_id, Auth::id()) == null ? 'dashboard-list-container-radius1-selected' : 'dashboard-list-container-radius1' }} lg:pl-4">
                            <div class="flex lg:justify-center justify-start self-center lg:pl-0 pl-4">
                                <div class="">
                                    <p class="font-heavy text-gray text-2xl">
                                        @isset($featured_opportunitie->position->title)
                                            {{ Str::of($featured_opportunitie->position->title)->words(5, ' ....') }}
                                        @endisset
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">
                                        {{ $featured_opportunitie->company->company_name }}</p>
                                    <p class="font-book text-lg text-gray-light1">Listed
                                        {{ date('M d, Y', strtotime($featured_opportunitie->listing_date)) }}</p>
                                </div>
                            </div>
                            <div class="flex justify-center self-center pr-4  md:mt-2">
                                <button type="button"
                                    class="uppercase rounded-md hover:bg-transparent hover:border-gray hover:text-gray focus:outline-none font-book text-lime-orange text-lg border-gray border bg-gray py-2 px-11"
                                    onclick="openModalBox('#opportunity-popup-{{ $featured_opportunitie->id }}')">
                                    View
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($opportunities_with_date as $key => $opportunity)
                    <div class="lg:flex mt-4 w-full">
                        <div
                            class="3xl-custom:w-1/6 xl:w-1/4 lg:w-2/6 w-full {{ $opportunity->isviewed($opportunity->job_id, Auth::id()) == null ? 'dashboard-list-container-radius-selected' : 'dashboard-list-container-radius' }} lg:text-center lg:pl-0 pl-4 mr-1px relative">
                            <div class="flex justify-center pt-3">
                                <div class=" pt-3">

                                    <p class="font-heavy text-gray text-5xl">
                                        {{ $opportunity->jsr_percent + 0 }} %</p>
                                    <p class="font-book text-lg text-gray-light1">JSR??? Score</p>

                                </div>
                                <div class="absolute left-0 top-0 dashboard-new">

                                    @if ($opportunity->isviewed($opportunity->job_id, Auth::id()) == null)
                                        <p class="text-lime-orange text-sm font-book px-4"> New </p>
                                    @elseif ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null)
                                        <p class="text-lime-orange text-sm font-book px-4"> Profile Sent
                                        </p>
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
                                    <p class="font-heavy text-gray text-2xl">
                                        {{ Str::of($opportunity->position->title ?? '')->words(5, ' ....') }}
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">
                                        {{ $opportunity->company->company_name ?? '' }}
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">Listed
                                        {{ date('M d, Y', strtotime($opportunity->listing_date)) }}
                                        @if ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null && ($opportunity->isconnected($opportunity->job_id, Auth::id())->is_shortlisted = true))
                                            <span
                                                class="dot bg-gray-light1 inline-block align-middle rounded-full mx-3.5"></span>
                                            Your profile was shortlisted last
                                            {{ date('M d, Y', strtotime($opportunity->isconnected($opportunity->job_id, Auth::id())->updated_at)) }}
                                        @elseif ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null && ($opportunity->isconnected($opportunity->job_id, Auth::id())->is_connected = true))
                                            <span
                                                class="dot bg-gray-light1 inline-block align-middle rounded-full mx-3.5"></span>
                                            You connected last
                                            {{ date('M d, Y', strtotime($opportunity->isconnected($opportunity->job_id, Auth::id())->updated_at)) }}
                                        @elseif ($opportunity->isEmployerviewed($opportunity->job_id, Auth::id()) != null)
                                            <span
                                                class="dot bg-gray-light1 inline-block align-middle rounded-full mx-3.5"></span>
                                            Your profile was viewed last
                                            {{ date('M d, Y', strtotime($opportunity->isEmployerviewed($opportunity->job_id, Auth::id())->updated_at)) }}
                                        @endif
                                    </p>

                                </div>
                            </div>
                            <div class="flex justify-center self-center pr-4">
                                <button type="button"
                                    class="click-to-company uppercase rounded-md hover:bg-transparent hover:border-gray hover:text-gray focus:outline-none font-book text-lime-orange text-lg border-gray border bg-gray py-2 px-11"
                                    onclick="openModalBox('#opportunity-popup-{{ $opportunity->id }}')">
                                    View
                                </button>
                                <input type="hidden" value="{{ $opportunity->job_id }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end filter with date section -->

            <!-- filter with status -->
            <div class="opportunities_with_status hidden">
                @foreach ($feature_opportunities_with_status as $featured_opportunitie)
                    <div class="lg:flex mt-4 w-full">
                        <div
                            class="3xl-custom:w-1/6 xl:w-1/4 lg:w-2/6 w-full py-4 {{ $featured_opportunitie->isviewed($featured_opportunitie->job_id, Auth::id()) == null ? 'dashboard-list-container-radius1-selected' : 'dashboard-list-container-radius1' }} lg:text-center lg:pl-0 pl-4 mr-1px relative">
                            <div class="flex justify-center pt-3">
                                <div>
                                    <p class="font-heavy text-gray text-5xl">
                                        {{ $featured_opportunitie->jsr_percent + 0 }} %
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">JSR??? Score</p>
                                </div>
                            </div>
                            <div>
                                <div class="absolute left-0 top-0 flex">
                                    @if ($featured_opportunitie->isviewed($featured_opportunitie->job_id, Auth::id()) == null)
                                        <p class="text-lime-orange text-sm font-book px-4 dashboard-new">New</p>
                                    @endif
                                    <p class="text-lime-orange text-sm font-book px-4 dashboard-featured">Featured</p>
                                </div>
                            </div>
                            <div class="absolute left-0 top-0 dashboard-new">
                                {{-- <p class="text-lime-orange text-sm font-book px-4">New</p> --}}
                            </div>
                        </div>
                        <div
                            class="py-4 3xl-custom:w-10/12 xl:w-9/12 lg:w-4/6 w-full md:flex md:justify-between {{ $featured_opportunitie->isviewed($featured_opportunitie->job_id, Auth::id()) == null ? 'dashboard-list-container-radius1-selected' : 'dashboard-list-container-radius1' }} lg:pl-4">
                            <div class="flex lg:justify-center justify-start self-center lg:pl-0 pl-4">
                                <div class="">
                                    <p class="font-heavy text-gray text-2xl">
                                        @isset($featured_opportunitie->position->title)
                                            {{ Str::of($featured_opportunitie->position->title)->words(5, ' ....') }}
                                        @endisset
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">
                                        {{ $featured_opportunitie->company->company_name }}</p>
                                    <p class="font-book text-lg text-gray-light1">Listed
                                        {{ date('M d, Y', strtotime($featured_opportunitie->listing_date)) }}</p>
                                </div>
                            </div>
                            <div class="flex justify-center self-center pr-4  md:mt-2">
                                <button type="button"
                                    class="uppercase rounded-md hover:bg-transparent hover:border-gray hover:text-gray focus:outline-none font-book text-lime-orange text-lg border-gray border bg-gray py-2 px-11"
                                    onclick="openModalBox('#opportunity-popup-{{ $featured_opportunitie->id }}')">
                                    View
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($opportunities_with_status as $key => $opportunity)
                    <div class="lg:flex mt-4 w-full">
                        <div
                            class="3xl-custom:w-1/6 xl:w-1/4 lg:w-2/6 w-full {{ $opportunity->isviewed($opportunity->job_id, Auth::id()) == null ? 'dashboard-list-container-radius-selected' : 'dashboard-list-container-radius' }} lg:text-center lg:pl-0 pl-4 mr-1px relative">
                            <div class="flex justify-center pt-3">
                                <div class=" pt-3">

                                    <p class="font-heavy text-gray text-5xl">
                                        {{ $opportunity->jsr_percent + 0 }} %</p>
                                    <p class="font-book text-lg text-gray-light1">JSR??? Score</p>

                                </div>
                                <div class="absolute left-0 top-0 dashboard-new">

                                    @if ($opportunity->isviewed($opportunity->job_id, Auth::id()) == null)
                                        <p class="text-lime-orange text-sm font-book px-4"> New </p>
                                    @elseif ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null)
                                        <p class="text-lime-orange text-sm font-book px-4"> Profile Sent
                                        </p>
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
                                    <p class="font-heavy text-gray text-2xl">
                                        {{ Str::of($opportunity->position->title ?? '')->words(5, ' ....') }}
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">
                                        {{ $opportunity->company->company_name ?? '' }}
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">Listed
                                        {{ date('M d, Y', strtotime($opportunity->listing_date)) }}
                                        @if ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null && ($opportunity->isconnected($opportunity->job_id, Auth::id())->is_shortlisted = true))
                                            <span
                                                class="dot bg-gray-light1 inline-block align-middle rounded-full mx-3.5"></span>
                                            Your profile was shortlisted last
                                            {{ date('M d, Y', strtotime($opportunity->isconnected($opportunity->job_id, Auth::id())->updated_at)) }}
                                        @elseif ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null && ($opportunity->isconnected($opportunity->job_id, Auth::id())->is_connected = true))
                                            <span
                                                class="dot bg-gray-light1 inline-block align-middle rounded-full mx-3.5"></span>
                                            You connected last
                                            {{ date('M d, Y', strtotime($opportunity->isconnected($opportunity->job_id, Auth::id())->updated_at)) }}
                                        @elseif ($opportunity->isEmployerviewed($opportunity->job_id, Auth::id()) != null)
                                            <span
                                                class="dot bg-gray-light1 inline-block align-middle rounded-full mx-3.5"></span>
                                            Your profile was viewed last
                                            {{ date('M d, Y', strtotime($opportunity->isEmployerviewed($opportunity->job_id, Auth::id())->updated_at)) }}
                                        @endif
                                    </p>

                                </div>
                            </div>
                            <div class="flex justify-center self-center pr-4">
                                <button type="button"
                                    class="click-to-company uppercase rounded-md hover:bg-transparent hover:border-gray hover:text-gray focus:outline-none font-book text-lime-orange text-lg border-gray border bg-gray py-2 px-11"
                                    onclick="openModalBox('#opportunity-popup-{{ $opportunity->id }}')">
                                    View
                                </button>
                                <input type="hidden" value="{{ $opportunity->job_id }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end filter with status section -->

            <!-- filter with jsr -->
            <div class="opportunities_with_jsr hidden">
                @foreach ($feature_opportunities_with_jsr as $featured_opportunitie)
                    <div class="lg:flex mt-4 w-full">
                        <div
                            class="3xl-custom:w-1/6 xl:w-1/4 lg:w-2/6 w-full py-4 {{ $featured_opportunitie->isviewed($featured_opportunitie->job_id, Auth::id()) == null ? 'dashboard-list-container-radius1-selected' : 'dashboard-list-container-radius1' }} lg:text-center lg:pl-0 pl-4 mr-1px relative">
                            <div class="flex justify-center pt-3">
                                <div>
                                    <p class="font-heavy text-gray text-5xl">
                                        {{ $featured_opportunitie->jsr_percent + 0 }} %
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">JSR??? Score</p>
                                </div>
                            </div>
                            <div>
                                <div class="absolute left-0 top-0 flex">
                                    @if ($featured_opportunitie->isviewed($featured_opportunitie->job_id, Auth::id()) == null)
                                        <p class="text-lime-orange text-sm font-book px-4 dashboard-new">New</p>
                                    @endif
                                    <p class="text-lime-orange text-sm font-book px-4 dashboard-featured">Featured</p>
                                </div>
                            </div>
                            <div class="absolute left-0 top-0 dashboard-new">
                                {{-- <p class="text-lime-orange text-sm font-book px-4">New</p> --}}
                            </div>
                        </div>
                        <div
                            class="py-4 3xl-custom:w-10/12 xl:w-9/12 lg:w-4/6 w-full md:flex md:justify-between {{ $featured_opportunitie->isviewed($featured_opportunitie->job_id, Auth::id()) == null ? 'dashboard-list-container-radius1-selected' : 'dashboard-list-container-radius1' }} lg:pl-4">
                            <div class="flex lg:justify-center justify-start self-center lg:pl-0 pl-4">
                                <div class="">
                                    <p class="font-heavy text-gray text-2xl">
                                        @isset($featured_opportunitie->position->title)
                                            {{ Str::of($featured_opportunitie->position->title)->words(5, ' ....') }}
                                        @endisset
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">
                                        {{ $featured_opportunitie->company->company_name }}</p>
                                    <p class="font-book text-lg text-gray-light1">Listed
                                        {{ date('M d, Y', strtotime($featured_opportunitie->listing_date)) }}</p>
                                </div>
                            </div>
                            <div class="flex justify-center self-center pr-4  md:mt-2">
                                <button type="button"
                                    class="uppercase rounded-md hover:bg-transparent hover:border-gray hover:text-gray focus:outline-none font-book text-lime-orange text-lg border-gray border bg-gray py-2 px-11"
                                    onclick="openModalBox('#opportunity-popup-{{ $featured_opportunitie->id }}')">
                                    View
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($opportunities_with_jsr as $key => $opportunity)
                    <div class="lg:flex mt-4 w-full">
                        <div
                            class="3xl-custom:w-1/6 xl:w-1/4 lg:w-2/6 w-full {{ $opportunity->isviewed($opportunity->job_id, Auth::id()) == null ? 'dashboard-list-container-radius-selected' : 'dashboard-list-container-radius' }} lg:text-center lg:pl-0 pl-4 mr-1px relative">
                            <div class="flex justify-center pt-3">
                                <div class=" pt-3">

                                    <p class="font-heavy text-gray text-5xl">
                                        {{ $opportunity->jsr_percent + 0 }} %</p>
                                    <p class="font-book text-lg text-gray-light1">JSR??? Score</p>

                                </div>
                                <div class="absolute left-0 top-0 dashboard-new">

                                    @if ($opportunity->isviewed($opportunity->job_id, Auth::id()) == null)
                                        <p class="text-lime-orange text-sm font-book px-4"> New </p>
                                    @elseif ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null)
                                        <p class="text-lime-orange text-sm font-book px-4"> Profile Sent
                                        </p>
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
                                    <p class="font-heavy text-gray text-2xl">
                                        {{ Str::of($opportunity->position->title ?? '')->words(5, ' ....') }}
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">
                                        {{ $opportunity->company->company_name ?? '' }}
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">Listed
                                        {{ date('M d, Y', strtotime($opportunity->listing_date)) }}
                                        @if ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null && ($opportunity->isconnected($opportunity->job_id, Auth::id())->is_shortlisted = true))
                                            <span
                                                class="dot bg-gray-light1 inline-block align-middle rounded-full mx-3.5"></span>
                                            Your profile was shortlisted last
                                            {{ date('M d, Y', strtotime($opportunity->isconnected($opportunity->job_id, Auth::id())->updated_at)) }}
                                        @elseif ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null && ($opportunity->isconnected($opportunity->job_id, Auth::id())->is_connected = true))
                                            <span
                                                class="dot bg-gray-light1 inline-block align-middle rounded-full mx-3.5"></span>
                                            You connected last
                                            {{ date('M d, Y', strtotime($opportunity->isconnected($opportunity->job_id, Auth::id())->updated_at)) }}
                                        @elseif ($opportunity->isEmployerviewed($opportunity->job_id, Auth::id()) != null)
                                            <span
                                                class="dot bg-gray-light1 inline-block align-middle rounded-full mx-3.5"></span>
                                            Your profile was viewed last
                                            {{ date('M d, Y', strtotime($opportunity->isEmployerviewed($opportunity->job_id, Auth::id())->updated_at)) }}
                                        @endif
                                    </p>

                                </div>
                            </div>
                            <div class="flex justify-center self-center pr-4">
                                <button type="button"
                                    class="click-to-company uppercase rounded-md hover:bg-transparent hover:border-gray hover:text-gray focus:outline-none font-book text-lime-orange text-lg border-gray border bg-gray py-2 px-11"
                                    onclick="openModalBox('#opportunity-popup-{{ $opportunity->id }}')">
                                    View
                                </button>
                                <input type="hidden" value="{{ $opportunity->job_id }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end filter with jsr section -->

            <!-- filter with jsr reverse -->
            <div class="opportunities_with_jsr_reverse hidden">
                @foreach ($feature_opportunities_with_jsr_reverse as $featured_opportunitie)
                    <div class="lg:flex mt-4 w-full">
                        <div
                            class="3xl-custom:w-1/6 xl:w-1/4 lg:w-2/6 w-full py-4 {{ $featured_opportunitie->isviewed($featured_opportunitie->job_id, Auth::id()) == null ? 'dashboard-list-container-radius1-selected' : 'dashboard-list-container-radius1' }} lg:text-center lg:pl-0 pl-4 mr-1px relative">
                            <div class="flex justify-center pt-3">
                                <div>
                                    <p class="font-heavy text-gray text-5xl">
                                        {{ $featured_opportunitie->jsr_percent + 0 }} %
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">JSR??? Score</p>
                                </div>
                            </div>
                            <div>
                                <div class="absolute left-0 top-0 flex">
                                    @if ($featured_opportunitie->isviewed($featured_opportunitie->job_id, Auth::id()) == null)
                                        <p class="text-lime-orange text-sm font-book px-4 dashboard-new">New</p>
                                    @endif
                                    <p class="text-lime-orange text-sm font-book px-4 dashboard-featured">Featured</p>
                                </div>
                            </div>
                            <div class="absolute left-0 top-0 dashboard-new">
                                {{-- <p class="text-lime-orange text-sm font-book px-4">New</p> --}}
                            </div>
                        </div>
                        <div
                            class="py-4 3xl-custom:w-10/12 xl:w-9/12 lg:w-4/6 w-full md:flex md:justify-between {{ $featured_opportunitie->isviewed($featured_opportunitie->job_id, Auth::id()) == null ? 'dashboard-list-container-radius1-selected' : 'dashboard-list-container-radius1' }} lg:pl-4">
                            <div class="flex lg:justify-center justify-start self-center lg:pl-0 pl-4">
                                <div class="">
                                    <p class="font-heavy text-gray text-2xl">
                                        @isset($featured_opportunitie->position->title)
                                            {{ Str::of($featured_opportunitie->position->title)->words(5, ' ....') }}
                                        @endisset
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">
                                        {{ $featured_opportunitie->company->company_name }}</p>
                                    <p class="font-book text-lg text-gray-light1">Listed
                                        {{ date('M d, Y', strtotime($featured_opportunitie->listing_date)) }}</p>
                                </div>
                            </div>
                            <div class="flex justify-center self-center pr-4  md:mt-2">
                                <button type="button"
                                    class="uppercase rounded-md hover:bg-transparent hover:border-gray hover:text-gray focus:outline-none font-book text-lime-orange text-lg border-gray border bg-gray py-2 px-11"
                                    onclick="openModalBox('#opportunity-popup-{{ $featured_opportunitie->id }}')">
                                    View
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($opportunities_with_jsr_reverse as $key => $opportunity)
                    <div class="lg:flex mt-4 w-full">
                        <div
                            class="3xl-custom:w-1/6 xl:w-1/4 lg:w-2/6 w-full {{ $opportunity->isviewed($opportunity->job_id, Auth::id()) == null ? 'dashboard-list-container-radius-selected' : 'dashboard-list-container-radius' }} lg:text-center lg:pl-0 pl-4 mr-1px relative">
                            <div class="flex justify-center pt-3">
                                <div class=" pt-3">

                                    <p class="font-heavy text-gray text-5xl">
                                        {{ $opportunity->jsr_percent + 0 }} %</p>
                                    <p class="font-book text-lg text-gray-light1">JSR??? Score</p>

                                </div>
                                <div class="absolute left-0 top-0 dashboard-new">

                                    @if ($opportunity->isviewed($opportunity->job_id, Auth::id()) == null)
                                        <p class="text-lime-orange text-sm font-book px-4"> New </p>
                                    @elseif ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null)
                                        <p class="text-lime-orange text-sm font-book px-4"> Profile Sent
                                        </p>
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
                                    <p class="font-heavy text-gray text-2xl">
                                        {{ Str::of($opportunity->position->title ?? '')->words(5, ' ....') }}
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">
                                        {{ $opportunity->company->company_name ?? '' }}
                                    </p>
                                    <p class="font-book text-lg text-gray-light1">Listed
                                        {{ date('M d, Y', strtotime($opportunity->listing_date)) }}
                                        @if ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null && ($opportunity->isconnected($opportunity->job_id, Auth::id())->is_shortlisted = true))
                                            <span
                                                class="dot bg-gray-light1 inline-block align-middle rounded-full mx-3.5"></span>
                                            Your profile was shortlisted last
                                            {{ date('M d, Y', strtotime($opportunity->isconnected($opportunity->job_id, Auth::id())->updated_at)) }}
                                        @elseif ($opportunity->isconnected($opportunity->job_id, Auth::id()) != null && ($opportunity->isconnected($opportunity->job_id, Auth::id())->is_connected = true))
                                            <span
                                                class="dot bg-gray-light1 inline-block align-middle rounded-full mx-3.5"></span>
                                            You connected last
                                            {{ date('M d, Y', strtotime($opportunity->isconnected($opportunity->job_id, Auth::id())->updated_at)) }}
                                        @elseif ($opportunity->isEmployerviewed($opportunity->job_id, Auth::id()) != null)
                                            <span
                                                class="dot bg-gray-light1 inline-block align-middle rounded-full mx-3.5"></span>
                                            Your profile was viewed last
                                            {{ date('M d, Y', strtotime($opportunity->isEmployerviewed($opportunity->job_id, Auth::id())->updated_at)) }}
                                        @endif
                                    </p>

                                </div>
                            </div>
                            <div class="flex justify-center self-center pr-4">
                                <button type="button"
                                    class="click-to-company uppercase rounded-md hover:bg-transparent hover:border-gray hover:text-gray focus:outline-none font-book text-lime-orange text-lg border-gray border bg-gray py-2 px-11"
                                    onclick="openModalBox('#opportunity-popup-{{ $opportunity->id }}')">
                                    View
                                </button>
                                <input type="hidden" value="{{ $opportunity->job_id }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end filter with jsr_reverse section -->
        </div>
    </div>
    <!-- Pop up -->

    @php
    $opportunities = $opportunities_with_date->merge($feature_opportunities_with_date);
    @endphp
    @foreach ($opportunities as $opportunity)
        <div class="popup-overflow fixed top-0 w-full h-screen left-0 hidden z-30 bg-black-opacity"
            id="opportunity-popup-{{ $opportunity->id }}">
            <div class="absolute left-1/2 cus_width_1400 cus_top_level cus_transform_50">
                <div class="mb-20">
                    <div class="relative">
                        <div class="bg-gray-light rounded-corner relative">
                            <div class="flex lg:flex-row-reverse flex-col-reverse justify-between lg:bg-lime-orange">
                                <div
                                    class=" lg:top-20 top-0 lg:-mt-0 -mt-4 transform-none lg:right-8 lg:mx-0 mx-auto relative  cz-index ">
                                    @if ($opportunity->company->company_logo)
                                        <img src="{{ asset('/uploads/company_logo/' . $opportunity->company->company_logo) }}"
                                            alt="shopify icon" class="shopify-image">
                                    @else
                                        <img src="{{ asset('/uploads/profile_photos/company-big.jpg') }}"
                                            alt="shopify icon" class="shopify-image">
                                    @endif
                                </div>
                                <div
                                    class="bg-lime-orange flex flex-row items-center letter-spacing-custom m-opportunity-box__title-bar rounded-sm rounded-b-none relative">
                                    <div class="m-opportunity-box__title-bar__height percent text-center py-8 relative">
                                        <p class="text-3xl md:text-4xl lg:text-5xl font-heavy text-gray mb-1">
                                            {{ $opportunity->jsr_percent + 0 }}%</p>
                                        <p class="text-base text-gray-light1">JSR<sup>TM</sup> Score</p>
                                    </div>
                                    <div class="m-opportunity-box__title-bar__height match-target ml-8 py-11 2xl:py-12">
                                        @php
                                        $matched_factors = $opportunity->matched_factors == null ? [] : json_decode($opportunity->matched_factors); @endphp
                                        @if (count($matched_factors) != 0)
                                            <p class="text-lg md:text-xl lg:text-2xl font-heavy text-black uppercase">
                                                MATCHES YOUR
                                                {{ $matched_factors[0] }}
                                                @if (count($matched_factors) > 1)
                                                    + {{ count($matched_factors) - 1 }} more
                                                @endif
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                                onclick="toggleModalClose('#opportunity-popup-{{ $opportunity->id }}')">
                                <img src="{{ asset('/img/sign-up/black-close.svg') }}" alt="close modal image">
                            </button>
                            <div class="lg:pt-8 pt-4 pb-8 lg:px-12 px-8">
                                <div>
                                    <span
                                        class="text-lg text-gray-light1 mr-4">#{{ $opportunity->position->ref_no ?? '' }}</span>
                                    @if ($opportunity->company->is_featured)
                                        <span class="text-sm bg-lime-orange text-black rounded-full px-3 py-0.5">
                                            Featured
                                        </span>
                                    @elseif($opportunity->isviewed($opportunity->job_id, Auth::id()) == null)
                                        <span class="text-sm bg-lime-orange text-black rounded-full px-3 py-0.5">
                                            New
                                        </span>
                                    @endif
                                </div>
                                <h1 class="text-xl md:text-3xl xl:text-4xl text-lime-orange mt-4 mb-2">
                                    {{ $opportunity->title }}</h1>
                                <div class="text-sm sm:text-base xl:text-lg text-gray-light1 letter-spacing-custom">
                                    <a
                                        href="{{ route('candidate.company', $opportunity->company->id) }}">{{ $opportunity->company->company_name }}</a>
                                    <span class="listed-label relative"></span>
                                    <span class="listed-date">Listed
                                        {{ date('M d, Y', strtotime($opportunity->position->created_at ?? '')) }}
                                    </span>
                                </div>
                                <ul class="mt-6 mb-10 text-white mark-yellow xl:text-2xl md:text-xl sm:text-lg text-base">
                                    @if ($opportunity->highlight_1)
                                        <li class="xl:mb-4 sm:mb-2">{{ $opportunity->highlight_1 }}</li>
                                    @endif
                                    @if ($opportunity->highlight_2)
                                        <li class="xl:mb-4 sm:mb-2">{{ $opportunity->highlight_2 }}</li>
                                    @endif
                                    @if ($opportunity->highlight_3)
                                        <li class="xl:mb-4 sm:mb-2">{{ $opportunity->highlight_3 }}</li>
                                    @endif
                                </ul>
                                <div class="border border-gray-pale border-t-0 border-l-0 border-r-0 my-4">
                                </div>
                                <div class="mt-7">
                                    <p class="text-white sign-up-form__information--fontSize">
                                        {{ $opportunity->description }}
                                    </p>
                                </div>
                                <div class="tag-bar sm:mt-7 text-xs sm:text-sm">
                                    @foreach ($opportunity->mykeywords() as $mykey)
                                        <span
                                            class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">{{ $mykey->keyword()->keyword_name }}</span>
                                    @endforeach
                                </div>
                                <div class="button-bar sm:mt-5">
                                    <a href="{{ url('opportunity/' . $opportunity->job_id) }}"
                                        class="click-to-company focus:outline-none text-gray bg-lime-orange text-sm lg:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 px-5 sm:px-4 mr-4">MORE
                                        DETAILS</a>
                                    <input type="hidden" value="{{ $opportunity->job_id }}">
                                    <button id="del-opportunity" data-value="{{ $opportunity->job_id }}"
                                        class="focus:outline-none btn-bar text-gray-light bg-lime-orange text-sm lg:text-lg hover:bg-transparent border border-smoke rounded-corner py-2 px-4 hover:text-lime-orange delete-o-btn mt-3 md:mt-0"
                                        onclick="openModalBox('#delete-opportunity-popup-{{ $opportunity->id }}')">DELETE</button>
                                </div>
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
                    <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">DELETE
                        OPPORTUNITY</h1>
                    <p class="text-gray-pale popup-text-box__description connect-employer-text-box">By
                        clicking on
                        'Confirm', this opportunity will be removed from your dashboard.</p>
                    <p class="text-gray-pale popup-text-box__description mb-4">Do you wish to proceed?</p>
                    <div class="button-bar button-bar--width mt-4">
                        <form action="{{ url('opportunity-delete') }}" id="del-opportunity-form" method="POST">
                            <input type="hidden" name="opportunity_id" value={{ $opportunity->id }}>
                            @csrf
                            <button type="submit"
                                class="delete-opportunity btn-bar focus:outline-none text-gray bg-lime-orange text-sm lg:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 px-4 mr-2"
                                onclick="toggleModalClose('#delete-opportunity-popup-{{ $opportunity->id }}')">CONFIRM</button>
                            <button type="button"
                                class="btn-bar focus:outline-none text-gray-pale bg-smoke-dark text-sm lg:text-lg hover:bg-transparent border border-smoke-dark rounded-corner py-2 px-4"
                                onclick="toggleModalClose('#delete-opportunity-popup-{{ $opportunity->id }}')">CANCEL</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection


@push('scripts')
    <script>
        @if (session('registration-success'))
            @php
                Session::forget('registration-success');
            @endphp
            $("#optimization-popup").removeClass('hidden')
        @endif

        window.addEventListener('click', function(e) {

            var uniqID = e.target.id.split('-');
            var test = uniqID.pop()

            var id = uniqID.join('-');
            console.log(id, id == "opportunity-popup")
            if (id == "opportunity-popup") {
                $('#' + e.target.id).hide()
            }
        })

        $(document).ready(function() {


            $("#close-optimization-popup").click(function() {
                $("#optimization-popup").addClass('hidden')
            })


            $('.date-sort').click(function() {
                $('.opportunities_with_status').addClass('hidden')
                $('.opportunities_with_jsr_reverse').addClass('hidden')
                $('.opportunities_with_date').removeClass('hidden')
                $('.opportunities_with_jsr').addClass('hidden')
                //SELECT BOX TICK SHOW/HIDE
                $('.checkedIconOne').removeClass('hidden')
                $('.checkedIconTwo').addClass('hidden')
                $('.checkedIconThree').addClass('hidden')
                $('.checkedIconFour').addClass('hidden')



            });
            $('.jsr-sort').click(function() {
                $('.opportunities_with_jsr').removeClass('hidden')
                $('.opportunities_with_date').addClass('hidden')
                $('.opportunities_with_status').addClass('hidden')
                $('.opportunities_with_jsr_reverse').addClass('hidden')

                //SELECT BOX TICK SHOW/HIDE
                $('.checkedIconOne').addClass('hidden')
                $('.checkedIconTwo').removeClass('hidden')
                $('.checkedIconThree').addClass('hidden')
                $('.checkedIconFour').addClass('hidden')
            });
            $('.jsr-resort').click(function() {
                $('.opportunities_with_jsr_reverse').removeClass('hidden')
                $('.opportunities_with_date').addClass('hidden')
                $('.opportunities_with_status').addClass('hidden')
                $('.opportunities_with_jsr').addClass('hidden')

                //SELECT BOX TICK SHOW/HIDE
                $('.checkedIconOne').addClass('hidden')
                $('.checkedIconTwo').addClass('hidden')
                $('.checkedIconThree').removeClass('hidden')
                $('.checkedIconFour').addClass('hidden')
            });
            $('.status-sort').click(function() {
                $('.opportunities_with_status').removeClass('hidden')
                $('.opportunities_with_jsr_reverse').addClass('hidden')
                $('.opportunities_with_date').addClass('hidden')
                $('.opportunities_with_jsr').addClass('hidden')
                //SELECT BOX TICK SHOW/HIDE
                $('.checkedIconOne').addClass('hidden')
                $('.checkedIconTwo').addClass('hidden')
                $('.checkedIconThree').addClass('hidden')
                $('.checkedIconFour').removeClass('hidden')
            });

            $('.delete-opportunity').click(function() {
                $.ajax({
                    type: 'POST',
                    url: 'opportunity-delete',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': $(this).prev().val()
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
            $('.click-to-company').click(function() {
                $.ajax({
                    type: 'POST',
                    url: '/click-to-company',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'opportunity_id': $(this).next().val()
                    }
                });
            });

            $('#del-opportunity').click(function() {
                $('#del-opportunity-form').find('input:first').val($(this).attr('data-value'));
            })
            // $('.reload').click(function(e) {
            //     e.preventDefault();
            //     location.reload();
            // });
        });
    </script>
@endpush
