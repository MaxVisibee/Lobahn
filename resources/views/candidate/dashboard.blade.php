@extends('layouts.master')
@section('content')

    <div class="bg-gray-light2 dashboard-container-margin md:pt-40 pt-48 pb-2">
        <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-2 pb-2">
            <div class="md:col-span-2 bg-white py-8 rounded-lg">
                <div class="md:flex w-full md:px-8 px-4">
                    <div class="md:w-30percent w-full">
                        <img class="md:ml-0 m-auto" src="{{ asset('uploads/profile_photos/' . $user->image) }}" />
                    </div>
                    <div class="md:ml-8 md:w-70percent w-full">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-2xl text-gray font-heavy">{{ $user->name }}</p>
                                <p class="text-base text-gray-light1 font-book">{{ $user->package->package_title ?? '' }}
                                    Membership</p>
                            </div>
                            <div>
                                <img class="cursor-pointer" src="./img/corporate-menu/dashboard/edit.svg" />
                            </div>
                        </div>
                        <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                            <span class="text-base text-smoke mr-1 font-book">Username</span>
                            <span class="text-base text-gray font-book">{{ $user->name }}</span>
                        </div>
                        <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                            <span class="text-base text-smoke mr-1 font-book">Office email</span>
                            <span class="text-base text-gray font-book">{{ $user->email }}</span>
                        </div>
                        <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                            <span class="text-base text-smoke mr-1 font-book">Office telephone</span>
                            <span class="text-base text-gray font-book">{{ $user->phone }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:col-span-1 bg-white rounded-lg py-8 flex justify-center">
                <div class="flex justify-center self-center">
                    <div>
                        <img class="object-contain m-auto" src="./img/corporate-menu/dashboard/barchart.svg" />
                        <div class="mt-4">
                            <p class="text-center text-lg text-gray-light1 font-book">IMPRESSIONS</p>
                            <p class="text-center text-4xl text-gray font-heavy">
                                {{ number_format($user->num_impressions) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:col-span-1 bg-white rounded-lg py-8 flex justify-center">
                <div class="self-center">
                    <img class="object-contain m-auto" src="./img/corporate-menu/dashboard/mouseicon.svg" />
                    <div class="mt-4">
                        <p class="text-center text-lg text-gray-light1 font-book">CLICKS</p>
                        <p class="text-center  text-4xl text-gray font-heavy">{{ number_format($user->num_clicks) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-container-margin pb-40">
        <div class="px-12 bg-white pt-8 pb-8 rounded-lg">
            <div class="md:flex md:justify-between">
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
                                    data-value="Status">
                                    <div class="flex dashboard-select-custom-icon-container">
                                        <img class="mr-2 checkedIcon3 hidden" src="./img/dashboard/checked.svg" />
                                    </div>
                                    <span class="dashboard-select-custom-content-container text-gray pl-4">Status</span>
                                </div>
                                <div class="flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                    data-value="JSR™ Ratio">
                                    <div class="flex dashboard-select-custom-icon-container">
                                        <img class="mr-2 checkedIcon2 hidden" src="./img/dashboard/checked.svg" />
                                    </div>
                                    <span class="dashboard-select-custom-content-container pl-4 text-gray">JSR™
                                        Ratio</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:flex mt-4 w-full">
                <div
                    class="3xl-custom:w-1/6 xl:w-1/4 lg:w-2/6 w-full py-4 dashboard-list-container-radius-selected lg:text-center lg:pl-0 pl-4 mr-1 relative">
                    <div class="flex justify-center pt-3">
                        <div>
                            <p class="font-heavy text-gray text-5xl">87.2%</p>
                            <p class="font-book text-lg text-gray-light1">JSR™ Ratio</p>
                        </div>
                    </div>
                    <div class="absolute left-0 top-0 dashboard-new">
                        <p class="text-lime-orange text-sm font-book px-4">New</p>
                    </div>
                </div>
                <div
                    class="py-4 3xl-custom:w-10/12 xl:w-9/12 lg:w-4/6 w-full md:flex md:justify-between dashboard-list-container-radius1-selected lg:pl-4">
                    <div class="flex lg:justify-center justify-start self-center lg:pl-0 pl-4">
                        <div class="">
                            <p class="font-heavy text-gray text-2xl">AVP - Digital marketing - consumer</p>
                            <p class="font-book text-lg text-gray-light1">Johnson & Johnson Asia Pacific</p>
                            <p class="font-book text-lg text-gray-light1">Listed Oct 10, 2021</p>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <button type="button"
                            class="
            uppercase
            focus:outline-none font-book
            text-lime-orange text-lg
            dashboard-view-btn
            py-3
            px-7
            ">
                            View
                        </button>
                    </div>
                </div>
            </div>

            @foreach ($opportunities as $key => $opportunity)
                <div class="lg:flex mt-4">
                    <div
                        class="py-4 3xl-custom:w-1/6 xl:w-1/4 lg:w-2/6 w-full dashboard-list-container-radius lg:text-center lg:pl-0 pl-4  mr-1 relative">
                        <div class=" pt-3">
                            <p class="font-heavy text-gray text-5xl">
                                @if ($opportunity->jsrRatio($opportunity->id, Auth::id()) != null)  {{ $opportunity->jsrRatio($opportunity->id, Auth::id())->jsr_percent }} % @else null @endif </p>
                            <p class="font-book text-lg text-gray-light1">JSR™ Ratio</p>
                        </div>
                        <div class="absolute left-0 top-0 dashboard-profit">
                            <p class="text-lime-orange text-sm font-book whitespace-nowrap pl-4">Profile Sent</p>
                        </div>
                    </div>
                    <div
                        class="py-4 3xl-custom:w-10/12 xl:w-9/12 lg:w-4/6 md:flex md:justify-between dashboard-list-container-radius1 w-full lg:pl-4">
                        <div class="flex lg:justify-center justify-start self-center lg:pl-0 pl-4">
                            <div>
                                <p class="font-heavy text-gray text-2xl">{{ $opportunity->title }}
                                </p>
                                <p class="font-book text-lg text-gray-light1">
                                    {{ $opportunity->company->company_name ?? '' }}
                                </p>
                                <p class="font-book text-lg text-gray-light1">Listed
                                    {{ date('M d, Y', strtotime($opportunity->created_at)) }} You connected last Sep 24,
                                    2021</p>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button type="button"
                                class="
            uppercase
            focus:outline-none
            text-lime-orange text-lg
            dashboard-view-btn
            py-3
            px-7
            ">
                                View
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')

@endpush
