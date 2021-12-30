@extends('layouts.master')
@section('content')
@include('includes.messages')
    <div class="bg-gray-pale mt-40 sm:mt-32 md:mt-10 corporate-profile-setting-section">
        <div class="mx-auto relative pt-20 sm:pt-32 pb-40 footer-section">
            <div class="grid gap-3 grid-cols-1 xl:grid-cols-2 ">
                
                <div class="member-profile-left-side">
                    {!! Form::model($company, ['method' => 'post','route' => ['company.profile.update'], 'files'=>true, 'id'=>'companyEditForm', 'name'=>'companyEditForm']) !!}
                    <div class="bg-white pl-5 pr-6 pb-10 pt-16 md:pt-8 rounded-corner relative">
                        <button type="submit"
                            class="z-10 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none absolute top-8 right-6 edit-corporate-member-profile-btn"
                            id="edit-corporate-info-save">
                            SAVE
                        </button>
                        <div class="flex flex-col md:flex-row pt-cus-3">
                            <div class="member-profile-image-box relative">
                                <div class="w-full text-center">
                                    <img src="@if ($company->company_logo != null) {{ asset('uploads/company_logo/' . $company->company_logo) }} @endif" alt="profile image"
                                        class="member-profile-image" id="corporate-profile-image" />
                                </div>
                                <div class="w-full image-upload upload-photo-box mb-8 absolute top-0 left-0"
                                    id="edit-company-photo">
                                    <label for="file-input" class="relative cursor-pointer block">
                                    <img src="./img/corporate-menu/upload-bg-transparent.svg" alt="sample photo image" class="member-profile-image" />
                                </label>    
                                    <input id="file-input" type="file" id="company_logo" name="company_logo" accept="image/*" class="corporate-profile-image" />
                                    <p class="text-gray-light1 text-base text-center mx-auto mt-1 md:mr-8">Change logo</p>
                                </div>
                            </div>
                            <div class="member-profile-information-box mt-12 md:mt-0">
                                <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">{{ $company->name }}<span
                                        class="block text-gray-light1 text-base font-book">{{ $company->position_title }}</span></h6>
                                       
                                <ul class="w-full mt-5">
                                    <li
                                        class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 flex-ic comp-name">
                                        <span class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Company
                                            name </span>
                                        <input type="text" id="company_name" name="company_name" value="{{ $company->company_name }}"
                                            class="lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                            id="edit-company-name" />
                                    </li>
                                    <li class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic">
                                        <span
                                            class="text-base text-smoke letter-spacing-custom mb-0 cus_width-27">Username</span>
                                        <input type="text" id="user_name" name="user_name" value="{{ $company->user_name }}"
                                            class="lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                            id="edit-username" />
                                    </li>
                                    <li class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic">
                                        <span class="text-base text-smoke letter-spacing-custom cus_width-32">Office email
                                        </span>
                                        <input type="text" id="email" name="email" value="{{ $company->email }}"
                                            class="lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                            id="edit-company-email" />
                                    </li>
                                    <li
                                        class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic o-tele">
                                        <span class="text-base text-smoke letter-spacing-custom cus_width-46">Office
                                            telephone</span>
                                        <input type="text" id="phone" name="phone" value="{{ $company->phone }}"
                                            class="cus_width-56 lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                            id="edit-company-phone" />
                                            
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}

                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-16 pt-8 mt-3 rounded-corner">
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">PASSWORD</h6>
                            <p class="text-base text-gray-light1 mt-3 mb-4 letter-spacing-custom changed-password-date">
                                Password changed last {!! htmlspecialchars_decode(date('F j<\s\up>S</\s\up>, Y', strtotime($company->updated_at))) !!}</p>
            
                                {{ Form::open(['route' => 'company.repassword']) }}

                            <ul class="w-full mt-3 mb-4 hidden" id="change-password-form">
                                <li class="mb-2">
                                    <input type="password" id="password" name="password" value="" required="required" autocomplete="off"
                                        class="bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                        placeholder="New Password" />
                                </li>
                                <li class="">
                                    <input type="password" id="password_confirmation" name="password_confirmation" value="" required="required" autocomplete="off"
                                        class="text-lg text-smoke letter-spacing-custom mb-0 w-full bg-gray-light3 rounded-corner py-2 px-4 new-confirm-password focus:outline-none"
                                        placeholder="Confirm Password" />
                                </li>
                            </ul>
                            <button type="submit"
                                class="bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner "
                                id="change-password-btn" onclick="memberChangePassword()">
                                CHANGE PASSWORD
                            </button>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                {!! Form::model($company, ['method' => 'post','route' => ['company.profile.update.detail'], 'files'=>true, 'id'=>'companyEditForm', 'name'=>'companyEditForm']) !!}
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
                                        <input type="text" id="website_address" name="website_address" value="{{ $company->website_address }}"
                                            class="focus:outline-none text-base text-gray ml-2 bg-gray-light3 website-name"
                                            id="edit-company-website" />
                                    </li>
                                    <li class="flex bg-gray-light3 rounded-corner py-2 px-4 mt-3 mb-4 description-box">
                                        <span class="text-base text-smoke letter-spacing-custom mb-0">Description </span>
                                        <textarea maxlength="250" id="edit-description" name="description"
                                            class="focus:outline-none text-base text-gray ml-2 bg-gray-light3 w-full textarea-edit-box"
                                            row="10" name=""
                                            id="">{{ $company->description }}</textarea>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
