@extends('layouts.master')
@section('content')
<div class="bg-gray-light2 corporate-dashboard-menu 4xl-custom:pt-40 md:pt-36 pt-64 pb-32">
    <div class="xl:flex md:justify-between bg-lime-orange px-8 py-8"> 
        <div class="xl:flex">
            <div class="flex">
                <img class="flex self-start pt-2" src="{{ asset('/img/corporate-menu/dashboard/active.svg') }}" />
                <p class="flex flex-wrap text-2xl text-gray pl-2 uppercase">
                    <a href="{{ route('company.position', $opportunity->id) }}" class="cursor-pointer hover:underline">{{ $opportunity->title }}</a>
                    <img class="pt-1" src="{{ asset('/img/corporate-menu/dashboard/linkicon.svg') }}" />
                </p>
            </div>
            <p class="text-2xl text-gray-light1 pl-6 xl:mt-0 mt-4 font-book font-futura-pt">MKTG SW49206</p>
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
<div class="fixed top-0 w-full h-screen left-0 hidden z-30 bg-black-opacity" id="corporate-view-staff-popup">   
    <div class="absolute left-1/2 cus_width_1400 cus_top_level cus_transform_50">
        <div class="relative mb-20">
            
            <div class="bg-lime-orange flex flex-row items-center letter-spacing-custom m-opportunity-box__title-bar rounded-sm rounded-b-none relative" >
                <div class="m-opportunity-box__title-bar__height percent text-center py-8 relative">
                    <p class="text-3xl md:text-4xl lg:text-5xl font-heavy text-gray mb-1">91.3%</p>
                    <p class="text-base text-gray-light1">JSR<sup>TM</sup> Ratio</p>
                </div>
                <div class="m-opportunity-box__title-bar__height match-target ml-8 py-11 2xl:py-12">
                    <p class="text-lg md:text-xl lg:text-2xl font-heavy text-black">MATCHES YOUR TARGET SALARY</p>
                </div>
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none" onclick="toggleModalClose('#corporate-view-staff-popup')">
                    <img src="./img/sign-up/black-close.svg" alt="close modal image">
                </button>
                <div class="absolute opportunity-image-box cus_transform_50">
                    <img src="./img/dashboard/staff-pic.png" alt="shopify icon" class="shopify-image">
                </div>
            </div>
            <div class="bg-gray-light rounded-sm rounded-t-none">
                <div class="match-company-box p-4 sm:p-12">
                    <div>
                        <span class="text-lg text-gray-light1 mr-4">member_id</span>
                    </div>
                    <h1 class="text-xl md:text-3xl xl:text-4xl text-lime-orange mt-4 mb-2">ALEXANDRIA WILSON BRIDGERTON</h1>
                    <div class="text-sm sm:text-base xl:text-lg text-gray-light1 letter-spacing-custom">
                        <span class="">Connected 24 Oct 2021</span>
                    </div>
                    <ul class="mt-6 mb-10 text-white mark-yellow xl:text-2xl md:text-xl sm:text-lg text-base">
                        <li class="mb-4">Label 1: snappy & attractive</li>
                        <li class="mb-4">Label 2: snappy & attractive</li>
                    </ul>
                    <div class="border border-gray-pale border-t-0 border-l-0 border-r-0 my-4">
                    </div>
                    <div class="mt-7">
                        <p class="text-white sign-up-form__information--fontSize">
                            Brief description of position. Snappy & attractive. 250 characters maximum.Brief description of position. Snappy & attractive. 250 characters maximum.Brief description of position. Snappy & attractive. 250 characters maximum.  
                        </p>
                    </div>
                    <div class="tag-bar sm:mt-7 text-xs sm:text-sm">
                        <span class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">team management</span>
                        <span class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">thirst for excellence</span>
                        <span class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">travel</span>
                        <span class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">e-commerce</span>
                        <span class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">acquisition metrics</span>
                        <span class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">digital marketing</span>
    
                    </div>
                    <div class="button-bar sm:mt-5">
                        <a href="{{ route('staff.detail') }}" class="focus:outline-none text-gray bg-lime-orange text-sm sm:text-base xl:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 h-11 px-12 mr-4 full-detail-btn inline-block" >VIEW PROFILE</a>
                        <button class="focus:outline-none btn-bar text-gray-light bg-smoke text-sm sm:text-base xl:text-lg hover:bg-transparent border h-11 border-smoke rounded-corner py-2 px-4 hover:text-lime-orange delete-o-btn" onclick="openModalBox('#delete-opportunity-popup')">DELETE</button>
                    </div> 
                </div>           
            </div>
        </div>
    </div>
</div>
<div class="fixed top-0 w-full h-screen left-0 hidden z-30 bg-black-opacity" id="corporate-view-feature-staff-popup">  
    <div class="absolute left-1/2 cus_width_1400 cus_top_level cus_transform_50">
        <div class="mb-20">
            <div class="relative">       
                <div class="bg-gray-light rounded-corner relative">
                    <div class="absolute feature-shopify-image-box">
                        <img src="./img/dashboard/staff-pic.png" alt="shopify icon" class="shopify-image">
                    </div>
                    <button class="absolute top-5 right-5 cursor-pointer focus:outline-none" onclick="toggleModalClose('#corporate-view-feature-staff-popup')">
                        <img src="./img/sign-up/close.svg" alt="close modal image">
                    </button>
                    <div class="match-company-box p-12">
                        <div class="mt-10 sm:mt-0">
                            <span class="text-lg text-gray-light1 mr-4">member_id</span>
                        </div>
                        <h1 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl text-lime-orange mt-4 mb-2">ALEXANDRIA WILSON BRIDGERTON</h1>
                        <div class="text-base lg:text-lg text-gray-light1 letter-spacing-custom">
                            <span class="">Connected 24 Oct 2021</span>
                        </div>
                        <ul class="mt-6 mb-10 text-white mark-yellow xl:text-2xl sm:text-xl text-lg">
                            <li class="mb-4">Label 1: snappy & attractive</li>
                            <li class="mb-4">Label 2: snappy & attractive</li>
                        </ul>
                        <div class="border border-gray-pale border-t-0 border-l-0 border-r-0 my-4">
                        </div>
                        <div class="mt-7">
                            <p class="text-white sign-up-form__information--fontSize">
                                Brief description of position. Snappy & attractive. 250 characters maximum.Brief description of position. Snappy & attractive. 250 characters maximum.Brief description of position. Snappy & attractive. 250 characters maximum.  
                            </p>
                        </div>
                        <div class="tag-bar mt-7 text-sm">
                            <span class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">team management</span>
                            <span class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">thirst for excellence</span>
                            <span class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">travel</span>
                            <span class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">e-commerce</span>
                            <span class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">acquisition metrics</span>
                            <span class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">digital marketing</span>

                        </div>
                        <div class="button-bar mt-5">
                            <a href="{{ route('feature.staff.detail') }}" class="focus:outline-none text-gray bg-lime-orange text-sm sm:text-base xl:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 px-12 mr-4 full-detail-btn inline-block" >VIEW PROFILE</a>
                            <button class="focus:outline-none btn-bar text-gray-light bg-smoke text-sm lg:text-lg hover:bg-transparent border border-smoke rounded-corner py-2 px-4 hover:text-lime-orange delete-o-btn" onclick="openModalBox('#delete-opportunity-popup')">DELETE</button>
                        </div> 
                    </div>           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
