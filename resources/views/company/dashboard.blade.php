@extends('layouts.master')
@section('content')

    <div class="bg-gray-light2 corporate-dashboard-menu pb-36">
        <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-2 pb-2">
            <div class="md:col-span-2 bg-white flex rounded-lg py-8">
                <div class="md:flex w-full sm:px-8 px-2">
                    <div class="md:w-30percent w-full">
                        <img class="md:ml-0 m-auto" src="./img/corporate-menu/dashboard/logo.png" />
                    </div>
                    <div class="md:ml-8 md:w-70percent w-full">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-2xl text-gray font-heavy">CHRIS WONG</p>
                                <p class="text-base text-gray-light1 font-book">HR Director</p>
                            </div>
                            <div class="cursor-pointer"
                                onclick="location.href='./corporate-member-profile-setting-edit.html'">
                                <img src="./img/corporate-menu/dashboard/edit.svg" />
                            </div>
                        </div>
                        <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                            <span class="text-base text-smoke mr-1 font-book">Username</span>
                            <span class="text-base text-gray font-book">my_username</span>
                        </div>
                        <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                            <span class="text-base text-smoke mr-1 font-book">Office email</span>
                            <span class="text-base text-gray font-book">professional@email.com</span>
                        </div>
                        <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                            <span class="text-base text-smoke mr-1 font-book">Office telephone</span>
                            <span class="text-base text-gray font-book">+852 1234 5678</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:col-span-1 bg-white rounded-lg py-8 flex justify-center">
                <div class="flex justify-center self-center">
                    <div>
                        <img class="object-contain m-auto" src="./img/corporate-menu/dashboard/bar.png" />
                        <div class="mt-4">
                            <p class="text-center text-lg text-gray-light1 font-book">TOTAL IMPRESSIONS</p>
                            <p class="text-center text-4xl text-gray font-heavy">83,296</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:col-span-1 bg-white rounded-lg py-8 flex justify-center">
                <div class="self-center">
                    <img class="object-contain m-auto" src="./img/corporate-menu/dashboard/mouseicon.svg" />
                    <div class="mt-4">
                        <p class="text-center text-lg text-gray-light1 font-book">TOTAL CLICKS</p>
                        <p class="text-center  text-4xl text-gray font-heavy">6,587</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:flex md:justify-between bg-lime-orange px-8 py-6 mt-2">
            <div class="flex">
                <p class="text-2xl text-gray tracking-wider uppercase font-heavy pt-2">Position Listings</p>
                <div class="flex self-center">
                    <button onclick="location.href='./position-detail-add.html'"
                        class="text-lime-orange py-2 outline-none focus:outline-none rounded-md bg-gray-light border border-lime-orange px-12 ml-2 text-lg">NEW</button>
                </div>
            </div>
            <div class="lg:flex xl:mt-0">
                <div class="md:flex">
                    <p class="text-gray text-base flex self-center mr-3 font-book tracking-wider">Search</p>
                    <input
                        class="bg-gray-light3 appearance-none border-2 border-gray-light2
                    rounded-lg md:w-72 py-3 md:px-8 px-3 text-gray leading-tight 
                    focus:outline-none focus:bg-gray-light2 border-none"
                        type="text" value="">
                </div>
                <div class="md:flex lg:mt-0 mt-4">
                    <p class="text-gray text-base flex self-center mr-1 whitespace-nowrap md:ml-4 font-book tracking-wider">
                        Sory by</p>
                    <div class="dashboard-select-wrapper text-gray-pale">
                        <div class="dashboard-select-preferences">
                            <div
                                class="dashboard-select__trigger py-3 relative flex items-center text-gray justify-between pl-2 bg-gray-light3 cursor-pointer">
                                <span class="">Listing Date</span>
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
        </div>
        <div class="bg-white px-8 py-8">

            <div class="overflow-x-auto">
                <table id="corporate-dashboard-table" class="corporate-dashboard-table mt-4">
                    <tr>
                        <th class="pl-2 font-book">Reference</th>
                        <th class="pl-3 font-book">Position title</th>
                        <th>
                            <div class="tooltip">
                                <img class="self-center m-auto" src="./img/corporate-menu/dashboard/eye1.svg" />
                                <span
                                    class="text-gray font-book text-sm inline-block bg-gray-light3 tooltiptext">Unviewed</span>
                            </div>
                        </th>
                        <th>
                            <div class="tooltip">
                                <img class="self-center m-auto" src="./img/corporate-menu/dashboard/eye2.svg" />
                                <span
                                    class="text-gray font-book text-sm inline-block bg-gray-light3 tooltiptext">Viewed</span>
                            </div>

                        </th>
                        <th>
                            <div class="tooltip">
                                <img class="self-center m-auto" src="./img/corporate-menu/dashboard/mail.svg" />
                                <span
                                    class="text-gray font-book text-sm inline-block bg-gray-light3 tooltiptext">Received</span>
                            </div>

                        </th>
                        <th>
                            <div class="tooltip">
                                <img class="self-center m-auto" src="./img/corporate-menu/dashboard/download.svg" />
                                <span
                                    class="text-gray font-book text-sm inline-block bg-gray-light3 tooltiptext">Shortlisted</span>
                            </div>

                        </th>
                        <th>
                            <div class="tooltip">
                                <img class="self-center m-auto" src="./img/corporate-menu/dashboard/link.svg" />
                                <span
                                    class="text-gray font-book text-sm inline-block bg-gray-light3 tooltiptext">Connected</span>
                            </div>

                        </th>
                        <th><img class="self-center m-auto" src="./img/corporate-menu/dashboard/barchart.svg" /></th>
                        <th><img class="self-center m-auto" src="./img/corporate-menu/dashboard/mouse.svg" /></th>
                        <th class="pl-3 font-book">Listing</th>
                        <th class="pl-3 font-book">Expiration</th>
                        <th class="pl-3 font-book">Status</th>
                    </tr>
                    <tr class="mt-4">
                        <td class="whitespace-nowrap">MKTG SW49206</td>
                        <td class=" font-book"><a href="./position-listing.html"
                                class="hover:underline cursor-pointer">Marketing Communications Manager</a></td>
                        <td class=" font-book" class="text-center">2</td>
                        <td class=" font-book" class="text-center">9</td>
                        <td class=" font-book" class="text-center">11</td>
                        <td class=" font-book" class="text-center">3</td>
                        <td class=" font-book" class="text-center">1</td>
                        <td class=" font-book" class="text-center">5,658</td>
                        <td class=" font-book" class="text-center">1,891</td>
                        <td class=" font-book" class="whitespace-nowrap">2021-10-10</td>
                        <td class=" font-book" class="whitespace-nowrap">2021-11-10</td>
                        <td><img src="./img/corporate-menu/dashboard/active.svg" /></td>
                    </tr>
                    <tr>
                        <td class="whitespace-nowrap">FIN SW66872</td>
                        <td><a class="hover:underline cursor-pointer">Financial Controller</a></td>
                        <td class="text-center font-book">2</td>
                        <td class="text-center font-book">9</td>
                        <td class="text-center font-book">11</td>
                        <td class="text-center font-book">3</td>
                        <td class="text-center font-book">1</td>
                        <td class="text-center font-book">5,658</td>
                        <td class="text-center font-book">1,891</td>
                        <td class="whitespace-nowrap font-book">2021-10-10</td>
                        <td class="whitespace-nowrap font-book">2021-11-10</td>
                        <td><img src="./img/corporate-menu/dashboard/active.svg" /></td>
                    </tr>
                    <tr>
                        <td class="whitespace-nowrap">HR PD29104</td>
                        <td><a class="hover:underline cursor-pointer">HR Manager - Training & Development</a></td>
                        <td class="font-book text-center">2</td>
                        <td class="font-book text-center">9</td>
                        <td class="font-book text-center">11</td>
                        <td class="font-book text-center">3</td>
                        <td class="font-book text-center">1</td>
                        <td class="font-book text-center">5,658</td>
                        <td class="font-book text-center">1,891</td>
                        <td class="font-book whitespace-nowrap">2021-09-30</td>
                        <td class="font-book whitespace-nowrap">2021-10-30</td>
                        <td><img src="./img/corporate-menu/dashboard/active.svg" /></td>
                    </tr>
                    <tr>
                        <td class="whitespace-nowrap">MKTG SW98047 </td>
                        <td><a class="hover:underline cursor-pointer">Head of Sales & Marketing - Customer
                                Experience</a></td>
                        <td class="font-book text-center">0</td>
                        <td class="font-book text-center">9</td>
                        <td class="font-book text-center">11</td>
                        <td class="font-book text-center">3</td>
                        <td class="font-book text-center">1</td>
                        <td class="font-book text-center">5,658</td>
                        <td class="font-book text-center">1,891</td>
                        <td class="font-book whitespace-nowrap">2021-09-26</td>
                        <td class="font-book whitespace-nowrap">2021-10-26</td>
                        <td><img src="./img/corporate-menu/dashboard/active.svg" /></td>
                    </tr>
                    <tr>
                        <td class="whitespace-nowrap font-book">IT SW47324</td>
                        <td class="font-book"><a class="hover:underline cursor-pointer">Technical Operations
                                Officer</a>
                        </td>
                        <td class="font-book text-center">0</td>
                        <td class="font-book text-center">9</td>
                        <td class="font-book text-center">11</td>
                        <td class="font-book text-center">3</td>
                        <td class="font-book text-center">1</td>
                        <td class="font-book text-center">5,658</td>
                        <td class="font-book text-center">1,891</td>
                        <td class="font-book whitespace-nowrap">2021-09-20</td>
                        <td class="font-book whitespace-nowrap">2021-10-20</td>
                        <td><img src="./img/corporate-menu/dashboard/active.svg" /></td>
                    </tr>
                    <tr>
                        <td class="whitespace-nowrap font-book">LEGAL NG95397</td>
                        <td class="font-book "><a class="hover:underline cursor-pointer">Deputy Legal Counsel - In
                                House</a>
                        </td>
                        <td class="font-book text-center">0</td>
                        <td class="font-book text-center">9</td>
                        <td class="font-book text-center">11</td>
                        <td class="font-book text-center">3</td>
                        <td class="font-book text-center">1</td>
                        <td class="font-book text-center">5,658</td>
                        <td class="font-book text-center">1,891</td>
                        <td class="font-book whitespace-nowrap">2021-09-14</td>
                        <td class="font-book whitespace-nowrap">2021-10-14</td>
                        <td><img src="./img/corporate-menu/dashboard/active.svg" /></td>
                    </tr>
                    <tr>
                        <td class="whitespace-nowrap font-book">ADMIN HT33621</td>
                        <td class="font-book "><a class="hover:underline cursor-pointer">Chief Business Officer</a>
                        </td>
                        <td class="font-book text-center">0</td>
                        <td class="font-book text-center">9</td>
                        <td class="font-book text-center">11</td>
                        <td class="font-book text-center">3</td>
                        <td class="font-book text-center">1</td>
                        <td class="font-book text-center">5,658</td>
                        <td class="font-book text-center">1,891</td>
                        <td class="font-book whitespace-nowrap">2021-08-30</td>
                        <td class="font-book whitespace-nowrap">2021-09-306</td>
                        <td><img src="./img/corporate-menu/dashboard/blue.svg" /></td>
                    </tr>
                    <tr>
                        <td class="whitespace-nowrap font-book">MKTG PK82601</td>
                        <td class="font-book "><a class="hover:underline cursor-pointer">AVP - Digital marketing -
                                consumer</a>
                        </td>
                        <td class="font-book text-center">0</td>
                        <td class="font-book text-center">9</td>
                        <td class="font-book text-center">11</td>
                        <td class="font-book text-center">3</td>
                        <td class="font-book text-center">1</td>
                        <td class="font-book text-center">5,658</td>
                        <td class="font-book text-center">1,891</td>
                        <td class="font-book whitespace-nowrap">2021-08-12</td>
                        <td class="font-book whitespace-nowrap">2021-09-12</td>
                        <td><img src="./img/corporate-menu/dashboard/blue.svg" /></td>
                    </tr>
                    <tr>
                        <td class="whitespace-nowrap font-book">CS MH70743</td>
                        <td class="font-book"><a class="hover:underline cursor-pointer">Customer Service Manager
                                (CSM)</a>
                        </td>
                        <td class="font-book text-center">0</td>
                        <td class="font-book text-center">9</td>
                        <td class="font-book text-center">11</td>
                        <td class="font-book text-center">3</td>
                        <td class="font-book text-center">1</td>
                        <td class="font-book text-center">5,658</td>
                        <td class="font-book text-center">1,891</td>
                        <td class="font-book whitespace-nowrap">2021-07-21</td>
                        <td class="font-book whitespace-nowrap">2021-08-21</td>
                        <td><img src="./img/corporate-menu/dashboard/inactive.svg" /></td>
                    </tr>
                    <tr>
                        <td class="whitespace-nowrap font-book">OPS VC20833</td>
                        <td class="font-book"><a class="hover:underline cursor-pointer">Director of Operations</a>
                        </td>
                        <td class="font-book text-center">0</td>
                        <td class="font-book text-center">9</td>
                        <td class="font-book text-center">11</td>
                        <td class="font-book text-center">3</td>
                        <td class="font-book text-center">1</td>
                        <td class="font-book text-center">5,658</td>
                        <td class="font-book text-center">1,891</td>
                        <td class="font-book whitespace-nowrap">2021-07-15</td>
                        <td class="font-book whitespace-nowrap">2021-08-15</td>
                        <td><img src="./img/corporate-menu/dashboard/inactive.svg" /></td>
                    </tr>
                </table>
                <div class="pb-8">
                    <div class="flex gap-2">
                        <button id="pagination1" type="button"
                            class="
                    pagination1
                uppercase
                focus:outline-none
                text-gray text-lg font-book
                corporate-dashboard-pagination-btn
                py-3
                md:w-10 px-5 flex justify-center
                ">
                            1
                        </button>
                        <button type="button" onclick="changePagination(2)" id="pagination2"
                            class=" pagination2
                    uppercase
                    focus:outline-none
                    text-gray text-lg font-book
                    corporate-dashboard-pagination-btn
                    py-3
                    md:w-10 px-5 flex justify-center
                    ">
                            2
                        </button>
                        <button type="button" id="pagination3" onclick="changePagination(3)"
                            class="
                    pagination3
                        uppercase
                        focus:outline-none
                        text-gray text-lg font-book
                        corporate-dashboard-pagination-btn
                        py-3
                        md:w-10 px-5 flex justify-center
                        ">
                            3
                        </button>
                        <div class="flex justify-center self-center">
                            <span class="text-lg text-gray ml-2 mr-2">.</span>
                            <span class="text-lg text-gray mr-2">.</span>
                            <span class="text-lg text-gray mr-2">.</span>
                        </div>
                        <button type="button" id="pagination43" onclick="changePagination(43)"
                            class="
                    pagination43
                        uppercase
                        focus:outline-none
                        text-gray text-lg font-book
                        corporate-dashboard-pagination-btn
                        py-3
                        md:w-10 px-5 flex justify-center
                        ">
                            43
                        </button>
                        <button type="button" id="pagination44" onclick="changePagination(44)"
                            class="
                    pagination44
                        uppercase
                        focus:outline-none
                        text-gray text-lg font-book
                        corporate-dashboard-pagination-btn
                        py-3
                        md:w-10 px-5 flex justify-center
                        ">
                            &gt;
                        </button>
                        <button type="button" id="pagination45" onclick="changePagination(45)"
                            class="pagination45
                        uppercase
                        focus:outline-none
                        text-gray text-lg font-book
                        corporate-dashboard-pagination-btn
                        py-3
                        md:w-10 px-5 flex justify-center
                        ">
                            &#62;&#62;
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
