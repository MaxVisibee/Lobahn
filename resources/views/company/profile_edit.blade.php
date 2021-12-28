@extends('layouts.master')
@section('content')

    <div class="bg-gray-pale mt-40 sm:mt-32 md:mt-10 corporate-profile-setting-section">
        <div class="mx-auto relative pt-20 sm:pt-32 pb-40 footer-section">
            <div class="grid gap-3 grid-cols-1 xl:grid-cols-2 ">
                <div class="member-profile-left-side">
                    <div class="bg-white pl-5 pr-6 pb-10 pt-16 md:pt-8 rounded-corner relative">
                        <button
                            class="z-10 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none absolute top-8 right-6 edit-corporate-member-profile-btn"
                            id="edit-corporate-info-save" onclick="history.back()">
                            SAVE
                        </button>
                        <div class="flex flex-col md:flex-row pt-cus-3">
                            <div class="member-profile-image-box relative">
                                <div class="w-full text-center">
                                    <img src="./img/corporate-menu/company-logo-sample.png" alt="profile image"
                                        class="member-profile-image" id="corporate-profile-image" />
                                </div>
                                <div class="w-full image-upload upload-photo-box mb-8 absolute top-0 left-0"
                                    id="edit-company-photo">
                                    <label for="file-input" class="relative cursor-pointer block">
                                        <img src="./img/corporate-menu/upload-bg-transparent.svg" alt="sample photo image"
                                            class="member-profile-image" />
                                    </label>
                                    <input id="file-input" type="file" accept="image/*" class="corporate-profile-image" />
                                    <p class="text-gray-light1 text-base text-center mx-auto mt-1 md:mr-8">Change logo</p>
                                </div>
                            </div>
                            <div class="member-profile-information-box mt-12 md:mt-0">
                                <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">CHRIS WONG<span
                                        class="block text-gray-light1 text-base font-book">HR Director</span></h6>
                                <ul class="w-full mt-5">
                                    <li
                                        class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 flex-ic comp-name">
                                        <span class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Company
                                            name </span>
                                        <input type="text" value="company name"
                                            class="lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                            id="edit-company-name" />
                                    </li>
                                    <li class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic">
                                        <span
                                            class="text-base text-smoke letter-spacing-custom mb-0 cus_width-27">Username</span>
                                        <input type="text" value="_username_"
                                            class="lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                            id="edit-username" />
                                    </li>
                                    <li class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic">
                                        <span class="text-base text-smoke letter-spacing-custom cus_width-32">Office email
                                        </span>
                                        <input type="text" value="company@email.com"
                                            class="lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                            id="edit-company-email" />
                                    </li>
                                    <li
                                        class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic o-tele">
                                        <span class="text-base text-smoke letter-spacing-custom cus_width-46">Office
                                            telephone</span>
                                        <input type="text" value="+852 1234 5678"
                                            class="cus_width-56 lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                            id="edit-company-phone" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-16 pt-8 mt-3 rounded-corner">
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">PASSWORD</h6>
                            <p class="text-base text-gray-light1 mt-3 mb-4 letter-spacing-custom changed-password-date">
                                Password changed last Oct 21, 2021</p>
                            <ul class="w-full mt-3 mb-4 " id="change-password-form">
                                <li class="mb-2">
                                    <input type="text"
                                        class="bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                        placeholder="New Password" />
                                </li>
                                <li class="">
                                    <input type="text"
                                        class="text-lg text-smoke letter-spacing-custom mb-0 w-full bg-gray-light3 rounded-corner py-2 px-4 new-confirm-password focus:outline-none"
                                        placeholder="Confirm Password" />
                                </li>
                            </ul>
                            <button type="button"
                                class="bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner "
                                id="change-password-btn" onclick="memberChangePasswordForEdit()">
                                CHANGE PASSWORD
                            </button>
                        </div>
                    </div>
                </div>
                <div class="member-profile-right-side">
                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-16 pt-8 rounded-corner relative pt-cus-5">
                        <button
                            class="bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none absolute top-8 right-6 edit-corporate-member-profile-btn"
                            id="save-company-profile-btn" onclick="history.back()">
                            SAVE
                        </button>
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom mb-4">COMPANY PROFILE</h6>
                            <div class="highlights-member-profile pl-1">
                                <ul class="w-full mt-2">
                                    <li class="bg-gray-light3 rounded-corner py-2 px-4">
                                        <span class="text-base text-smoke letter-spacing-custom mb-0">Website</span>
                                        <input type="text" value="company website"
                                            class="focus:outline-none text-base text-gray ml-2 bg-gray-light3 website-name"
                                            id="edit-company-website" />
                                    </li>
                                    <li class="flex bg-gray-light3 rounded-corner py-2 px-4 mt-3 mb-4 description-box">
                                        <span class="text-base text-smoke letter-spacing-custom mb-0">Description </span>
                                        <textarea maxlength="250" id="edit-description"
                                            class="focus:outline-none text-base text-gray ml-2 bg-gray-light3 w-full textarea-edit-box"
                                            row="10" name=""
                                            id="">Brief description of company. Snappy & attractive. Five lines maximum. Brief description of company. Snappy & attractive. Five lines maximum. Brief description of company. Snappy & attractive. Five lines maximum. Brief description of company. Snappy & attractive. Five lines maximum.</textarea>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
