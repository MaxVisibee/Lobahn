@extends('layouts.master')
@section('content')
    <div class="bg-gray-light2 corporate-dashboard-menu 4xl-custom:pt-40 md:pt-36 pt-64 pb-32">
        <div class="xl:flex md:justify-between bg-lime-orange px-8 py-8">
            <div>
                <div class="xl:flex">
                    <div class="flex">
                        <img class="flex self-start pt-2" src="{{ asset('/img/corporate-menu/dashboard/active.svg') }}" />
                        <p class="flex flex-wrap text-2xl text-gray pl-2 uppercase">
                            <a href="/position-detail.html" class="cursor-pointer hover:underline">Marketing Communications
                                Manager</a>
                            <img class="pt-1" src="{{ asset('/img/corporate-menu/dashboard/linkicon.svg') }}" />
                        </p>
                    </div>
                    <p class="text-2xl text-gray-light1 pl-6 xl:mt-0 mt-4 font-book font-futura-pt">MKTG SW49206</p>
                </div>

            </div>
            <div class="md:flex xl:mt-0 mt-4">
                <div class="flex md:mt-0 mt-4 self-center">
                    <p
                        class="text-gray text-base flex self-center md:mr-1 whitespace-nowrap xl:ml-4 
                md:ml-6 ml-2">
                        Sory by</p>
                    <div class="dashboard-select-wrapper text-gray-pale">
                        <div class="dashboard-select-preferences">
                            <div
                                class="dashboard-select__trigger py-2 relative flex items-center text-gray justify-between pl-2 bg-gray-light3 cursor-pointer">
                                <span class="">Status</span>
                                <svg class="transition-all mr-4" xmlns="http://www.w3.org/2000/svg" width="13.328"
                                    height="7.664" viewBox="0 0 13.328 7.664">
                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                        transform="translate(19.414 -16.586) rotate(90)" fill="none" stroke="#2F2F2F"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>

                            </div>
                            <div
                                class="dashboard-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                <div class="flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                    data-value="Status">
                                    <div class="flex dashboard-select-custom-icon-container">
                                        <img class="mr-2 checkedIcon3" src="./img/dashboard/checked.svg" />
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
        </div>
        <div class="bg-white md:px-8 px-4 pt-6 pb-12">

            <div class="overflow-x-auto">
                <table id="corporate-position-table" class="corporate-position-table w-full">
                    <tr class="mt-4 cursor-pointer" data-target="corporate-view-feature-staff-popup">
                        <td class="">
                            <span
                                class="bg-lime-orange border border-lime-orange text-gray text-lg rounded-full px-3 pb-0.5 inline-block mb-2">Featured</span>
                        </td>
                        <td class="whitespace-nowrap"><a class="hover:underline cursor-pointer">Alexandria Wilson
                                Bridgerton</a></td>
                        <td class="whitespace-pre-line">Vice President of Digital Marketing
                            - Consumer</td>
                        <td class="">Positron Biotechnology Innovation
                            (HK) Ltd.</td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <th class="text-left pl-2">JSR™ Score </th>
                        <th class="text-left pl-2">Member's Name</th>
                        <th class="text-left pl-2">Position</th>
                        <th class="text-left pl-2">Employer</th>
                        <th class="text-left pl-6">Status</th>
                    </tr>
                    <tr class="mt-4 cursor-pointer" data-target="corporate-view-staff-popup">
                        <td class="">91.3%</td>
                        <td class="whitespace-nowrap"><a class="hover:underline cursor-pointer">Alexandria Wilson
                                Bridgerton</a></td>
                        <td class="whitespace-pre-line">Vice President of Digital Marketing
                            - Consumer</td>
                        <td class="">Positron Biotechnology Innovation
                            (HK) Ltd.</td>
                        <td>
                            <div
                                class="cursor-pointer inline-block px-3 font-book text-sm text-center text-gray-light3 border border-gray rounded-2xl bg-gray ">
                                Unviewed
                            </div>
                        </td>
                    </tr>
                    <tr class="mt-4 cursor-pointer" data-target="corporate-view-staff-popup">
                        <td class="">90.1%</td>
                        <td class="whitespace-nowrap"><a class="hover:underline cursor-pointer">Man Yin Ting, Trinity</a>
                        </td>
                        <td class="whitespace-pre-line">Head of Marketing - B@B Services,
                            Creative & Design</td>
                        <td class="">DDB Group Hong Kong</td>
                        <td>
                            <div
                                class="cursor-pointer inline-block px-4 font-book text-sm text-center text-gray-light3 border border-gray rounded-2xl bg-gray ">
                                Unviewed
                            </div>
                        </td>
                    </tr>
                    <tr class="mt-4 cursor-pointer" data-target="corporate-view-staff-popup">
                        <td class="">82.4%</td>
                        <td class="whitespace-nowrap"><a class="hover:underline cursor-pointer">Wong Man Hang, Charles</a>
                        </td>
                        <td class="">Marketing Communications Manager</td>
                        <td class="">Wah Fu Insurance Brokers</td>
                        <td>
                            <div
                                class="cursor-pointer inline-block px-3 text-sm text-center font-book 
                        text-gray-light border border-lime-orange rounded-2xl bg-lime-orange ">
                                Connected
                            </div>
                        </td>
                    </tr>
                    <tr class="mt-4 cursor-pointer" data-target="corporate-view-staff-popup">
                        <td class="">87.6%</td>
                        <td class="whitespace-nowrap"><a class="hover:underline cursor-pointer">Chan Mei Po, Melissas</a>
                        </td>
                        <td class="whitespace-pre-line">Assistant Marketing Manager -
                            Premium Co-living space</td>
                        <td class="">Eton Properties Ltd.</td>
                        <td>
                            <div
                                class="cursor-pointer inline-block px-3 text-sm text-center font-book 
                        text-gray-light border border-lime-orange rounded-2xl bg-lime-orange ">
                                Connected
                            </div>
                        </td>
                    </tr>
                    <tr class="mt-4 cursor-pointer" data-target="corporate-view-staff-popup">
                        <td class="">86.5%</td>
                        <td class="whitespace-nowrap"><a class="hover:underline cursor-pointer">Cheung Tze-kung</a></td>
                        <td class="whitespace-pre-line">Head of Sales & Marketing -
                            Customer Experience</td>
                        <td class="">Trinity Finance Investment Ltd.</td>
                        <td>
                            <div
                                class="cursor-pointer inline-block px-3 text-sm text-center font-book 
                        text-gray-light border border-lime-orange rounded-2xl bg-lime-orange ">
                                Connected
                            </div>
                        </td>
                    </tr>
                    <tr class="mt-4 cursor-pointer" data-target="corporate-view-staff-popup">
                        <td class="">87.6%</td>
                        <td class="whitespace-nowrap"><a class="hover:underline cursor-pointer">Chan Mei Po, Melissa</a>
                        </td>
                        <td class="whitespace-pre-line">Assistant Marketing Manager -
                            Premium Co-living space</td>
                        <td class="">Eton Properties Ltd.</td>
                        <td>
                            <div
                                class="cursor-pointer inline-block px-3 text-sm text-center font-book 
                        text-gray-light3 border border-smoke-light rounded-2xl bg-gray-light1 ">
                                Shortlisted
                            </div>
                        </td>
                    </tr>
                    <tr class="mt-4 cursor-pointer" data-target="corporate-view-staff-popup">
                        <td class="">85.2%</td>
                        <td class="whitespace-nowrap"><a class="hover:underline cursor-pointer">William Howard Taft</a></td>
                        <td class="whitespace-pre-line">Marketing Director -
                            FMCG/E-commerce</td>
                        <td class="">Marketing Manager - China
                            & Hong Kong</td>
                        <td>
                            <div
                                class="cursor-pointer inline-block px-3 text-sm text-center  font-book
                        text-gray-light3 border border-smoke-light rounded-2xl bg-gray-light1 ">
                                Shortlisted
                            </div>
                        </td>
                    </tr>
                    <tr class="mt-4 cursor-pointer" data-target="corporate-view-staff-popup">
                        <td class="">87.6%</td>
                        <td class="whitespace-nowrap"><a class="hover:underline cursor-pointer">Chan Mei Po, Melissa</a>
                        </td>
                        <td class="whitespace-pre-line">Marketing Manager - China
                            & Hong Kong</td>
                        <td class="">Eton Properties Ltd.</td>
                        <td>
                            <div
                                class="cursor-pointer inline-block px-3 text-sm text-center  font-book
                        text-gray-light3 border border-smoke-light rounded-2xl bg-gray-light1 ">
                                Shortlisted
                            </div>
                        </td>
                    </tr>
                    <tr class="mt-4 cursor-pointer" data-target="corporate-view-staff-popup">
                        <td class="">81.7%</td>
                        <td class="whitespace-nowrap"><a class="hover:underline cursor-pointer">Liu Ming-kwong, Michael</a>
                        </td>
                        <td class="">Marketing Director - Greater China</td>
                        <td class="">Kone Engineering & Construction Co.</td>
                        <td>
                            <div
                                class="cursor-pointer inline-block px-5 font-book text-sm text-center 
                        text-gray border border-gray-light2 rounded-2xl bg-gray-light2 ">
                                Viewed
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
