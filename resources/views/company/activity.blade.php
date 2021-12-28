@extends('layouts.master')
@section('content')
    <div class="report-container md:pt-32 pt-40 pb-40">
        <div class="flex justify-end">
            <div class="activities-report-select-wrapper text-gray my-8 w-40 flex justify-end">
                <div class="activities-report-select-preferences">
                    <div
                        class="mb-1 activities-report-select__trigger py-2 relative flex text-base
                items-center text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                        <span class="whitespace-nowrap text-center">Lifetime</span>
                        <svg class="transition-all mr-4" xmlns="http://www.w3.org/2000/svg" width="13.328" height="7.664"
                            viewBox="0 0 13.328 7.664">
                            <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                transform="translate(19.414 -16.586) rotate(90)" fill="none" stroke="#1a1a1a"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>

                    </div>
                    <div
                        class="activities-report-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                        <div class=" flex activities-report-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                            data-value="Lifetime">
                            <div class="w-10 flex activities-report-select-custom-icon-container">
                                <img class="m-auto checkedIcon1" src="./img/dashboard/checked.svg" />
                            </div>
                            <span
                                class="w-90percent activities-report-select-custom-content-container text-gray font-book">Lifetime</span>
                        </div>
                        <div class="flex activities-report-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                            data-value="Last 7 days">
                            <div class="w-10 flex activities-report-select-custom-icon-container">
                                <img class="m-auto checkedIcon2 hidden" src="./img/dashboard/checked.svg" />
                            </div>
                            <span
                                class="w-90percent activities-report-select-custom-content-container text-gray font-book">Last
                                7 days</span>
                        </div>
                        <div class="flex activities-report-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                            data-value="Last 30 Days">
                            <div class="w-10 flex activities-report-select-custom-icon-container">
                                <img class="m-auto checkedIcon3 hidden" src="./img/dashboard/checked.svg" />
                            </div>
                            <span
                                class="w-90percent activities-report-select-custom-content-containertext-gray font-book">Last
                                30 Days</span>
                        </div>
                        <div class="flex activities-report-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                            data-value="Last 3 months">
                            <div class="w-10 flex activities-report-select-custom-icon-container">
                                <img class="m-auto checkedIcon3 hidden" src="./img/dashboard/checked.svg" />
                            </div>
                            <span
                                class="w-90percent activities-report-select-custom-content-container text-gray font-book">Last
                                3 months</span>
                        </div>
                        <div class="flex activities-report-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                            data-value="Last 6 monts">
                            <div class="w-10 flex activities-report-select-custom-icon-container">
                                <img class="m-auto checkedIcon3 hidden" src="./img/dashboard/checked.svg" />
                            </div>
                            <span
                                class="w-90percent activities-report-select-custom-content-container text-gray font-book">Last
                                6 monts</span>
                        </div>
                        <div class="flex activities-report-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                            data-value="Last year">
                            <div class="w-10 flex activities-report-select-custom-icon-container">
                                <img class="m-auto checkedIcon3 hidden" src="./img/dashboard/checked.svg" />
                            </div>
                            <span
                                class="w-90percent activities-report-select-custom-content-container text-gray font-book">Last
                                year</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid 2xl-custom-1366:grid-cols-3 lg:grid-cols-2 md:grid-cols-2 gap-2">
            <div class="bg-white flex rounded-lg pl-8 pr-4 py-12 ">
                <div class="lg:flex w-full self-center gap-4">
                    <div class="lg:w-1/5">
                        <img class="object-contain self-center m-auto" src="./img/reports/hand.svg" />
                    </div>
                    <div class="lg:w-4/5 lg:mt-0 mt-3 lg:text-left text-center">
                        <p class="uppercase 4xl-custom:whitespace-nowrap text-gray-light1 text-lg font-book">No. of
                            position listings</p>
                        <p class="uppercase text-gray text-4xl font-heavy">412</p>
                    </div>
                </div>
            </div>
            <div class="bg-white flex rounded-lg gap-4 pl-8 pr-4 py-12">
                <div class="lg:flex w-full self-center gap-4">
                    <div class="lg:w-1/5">
                        <img class="object-contain self-center m-auto" src="./img/reports/bar.svg" />
                    </div>
                    <div class="lg:w-4/5 lg:mt-0 mt-3 lg:text-left text-center">
                        <p class="uppercase text-gray-light1 text-lg font-book">No. of impressions</p>
                        <p class="uppercase text-gray text-4xl font-heavy">356</p>
                    </div>
                </div>
            </div>
            <div class="bg-white flex rounded-lg pl-8 pr-4 py-12">
                <div class="lg:flex w-full self-center gap-4">
                    <div class="lg:w-1/5">
                        <img class="object-contain self-center m-auto" src="./img/reports/click.svg" />
                    </div>
                    <div class="lg:w-4/5 lg:mt-0 mt-3 lg:text-left text-center">
                        <p class="uppercase whitespace-nowrap text-gray-light1 text-lg font-book">
                            No. of clicks</p>
                        <p class="uppercase text-gray text-4xl font-heavy">213</p>
                    </div>
                </div>
            </div>
            <div class="bg-white flex rounded-lg  pl-8 pr-4 py-12 ">
                <div class="lg:flex w-full self-center gap-4">
                    <div class="lg:w-1/5">
                        <img class="object-contain self-center m-auto" src="./img/reports/mail.svg" />
                    </div>
                    <div class="lg:w-4/5 lg:mt-0 mt-3 lg:text-left text-center">
                        <p class="uppercase 4xl-custom:whitespace-nowrap text-gray-light1 text-lg font-book">
                            No of profiles received</p>
                        <p class="uppercase text-gray text-4xl font-heavy">121</p>
                    </div>
                </div>
            </div>
            <div class="bg-white flex rounded-lg gap-4 pl-8 pr-4 py-12">
                <div class="lg:flex w-full self-center gap-4">
                    <div class="lg:w-1/5">
                        <img class="object-contain self-center m-auto" src="./img/reports/download.svg" />
                    </div>
                    <div class="lg:w-4/5 lg:mt-0 mt-3 lg:text-left text-center">
                        <p class="uppercase  4xl-custom:whitespace-nowrap text-gray-light1 text-lg font-book">
                            No. of shortlisted candidates</p>
                        <p class="uppercase text-gray text-4xl font-heavy">3,296</p>
                    </div>
                </div>
            </div>
            <div class="bg-white flex rounded-lg pl-8 pr-4 py-12">
                <div class="lg:flex w-full self-center gap-4">
                    <div class="lg:w-1/5">
                        <img class="object-contain self-center m-auto" src="./img/reports/link.svg" />
                    </div>
                    <div class="lg:w-4/5 lg:mt-0 mt-3 lg:text-left text-center">
                        <p class="uppercase whitespace-nowrap text-gray-light1 text-lg font-book">
                            No. of connections</p>
                        <p class="uppercase text-gray text-4xl font-heavy">1,871</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="justify-start pt-8 hidden">
            <button type="button"
                class="text-center
uppercase
focus:outline-none
text-gray-light3 text-lg
report-back-btn
py-3
px-12
">
                Back
            </button>
        </div>
    </div>

@endsection
