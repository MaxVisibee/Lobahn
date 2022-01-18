@extends('layouts.master',['title'=>"YOUR PROFILE"])
@section('content')
    <div class="bg-gray-pale mt-40 sm:mt-32 md:mt-10 corporate-profile-setting-section">
        <div class="mx-auto relative pt-20 sm:pt-32 pb-40 footer-section">
            <div class="grid gap-3 grid-cols-1 xl:grid-cols-2 ">
                <div class="member-profile-left-side">
                    <div class="bg-white pl-5 pr-6 pb-10 pt-16 md:pt-8 rounded-corner relative">
                        <a href="{{ route('company.profile.edit') }}"
                            class="z-10 focus:outline-none absolute top-8 right-6">
                            <img src="{{ asset('/img/member-profile/Icon feather-edit.svg') }}" alt="edit icon"
                                class="h-6" />
                        </a>
                        <div class="flex flex-col md:flex-row pt-cus-3">
                            <div class="member-profile-image-box relative">
                                <div class="w-full text-center">
                                    @if ($company->company_logo != null)
                                        <img src="{{ asset('uploads/company_logo/' . $company->company_logo) }}"
                                            alt="profile image" class="member-profile-image" id="corporate-profile-image" />
                                    @else
                                        <img src="{{ asset('/img/corporate-menu/company-logo-sample.png') }}"
                                            alt="profile image" class="member-profile-image" id="corporate-profile-image" />
                                    @endif
                                </div>
                            </div>
                            <div class="member-profile-information-box mt-12 md:mt-0">
                                <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">{{ $company->name }}<span
                                        class="block text-gray-light1 text-base font-book">{{ $company->position_title }}</span>
                                </h6>
                                <ul class="w-full mt-5">
                                    <li
                                        class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 flex-ic comp-name">
                                        <span class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Company
                                            name </span>
                                        <span class="text-gray text-base ml-2"
                                            id="company-profile-name">{{ $company->company_name }}</span>
                                    </li>
                                    <li class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic">
                                        <span
                                            class="text-base text-smoke letter-spacing-custom mb-0 cus_width-27">Username</span>
                                        <span class="text-base text-gray ml-2"
                                            id="company-profile-username">{{ $company->user_name }}</span>
                                    </li>
                                    <li class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic">
                                        <span class="text-base text-smoke letter-spacing-custom cus_width-32">Office email
                                        </span>
                                        <span class="text-base text-gray ml-2"
                                            id="company-profile-email">{{ $company->email }}</span>
                                    </li>
                                    <li
                                        class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic o-tele">
                                        <span class="text-base text-smoke letter-spacing-custom cus_width-46">Office
                                            telephone</span>
                                        <span class="text-gray text-base ml-2"
                                            id="company-profile-phone">{{ $company->phone }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="flex flex-col md:flex-row pt-cus-3">
                            <div class="member-profile-image-box relative">
                                <div class="w-full text-center">
                                    <img src="./img/corporate-menu/company-logo-sample.png" alt="profile image" class="member-profile-image" id="corporate-profile-image"/>
                                </div>                            
                            </div>
                            <div class="member-profile-information-box mt-12 md:mt-0">
                                <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">CHRIS WONG<span class="block text-gray-light1 text-base font-book">HR Director</span></h6>
                                <ul class="w-full mt-5">
                                    <li class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 flex-ic comp-name">
                                        <span class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Company name </span>
                                        <span class="text-gray text-base ml-2" id="company-profile-name">company name</span>                                    
                                    </li>
                                    <li class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic">
                                        <span class="text-base text-smoke letter-spacing-custom mb-0 cus_width-27">Username</span>
                                        <span class="text-base text-gray ml-2" id="company-profile-username">_username_</span>
                                    </li>
                                    <li class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic">
                                        <span class="text-base text-smoke letter-spacing-custom cus_width-32">Office email </span>
                                        <span class="text-base text-gray ml-2" id="company-profile-email">company@email.com</span>
                                    </li>
                                    <li class="flex bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic o-tele">
                                        <span class="text-base text-smoke letter-spacing-custom cus_width-46">Office telephone</span>
                                        <span class="text-gray text-base ml-2" id="company-profile-phone">+852 1234 5678</span>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>

                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-16 pt-8 mt-3 rounded-corner">
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">PASSWORD</h6>
                            <p class="text-base text-gray-light1 mt-3 mb-4 letter-spacing-custom changed-password-date">
                                Password changed last {!! htmlspecialchars_decode(date('d M, Y', strtotime($company->updated_at))) !!}</p>
                            @include('includes.messages')
                            {{ Form::open(['route' => 'company.repassword']) }}

                            <ul class="w-full mt-3 mb-4 hidden" id="change-password-form">
                                <li class="mb-2">
                                    <input type="password" id="password" name="password" value="" required="required"
                                        autocomplete="off"
                                        class="bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                        placeholder="New Password" />
                                </li>
                                <li class="">
                                    <input type="password" id="password_confirmation" name="password_confirmation" value=""
                                        required="required" autocomplete="off"
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
                <div class="member-profile-right-side">
                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-16 pt-8 rounded-corner relative pt-cus-5">
                        <a href="{{ route('company.profile.edit') }}"
                            class="z-10 focus:outline-none absolute top-8 right-6">
                            <img src="{{ asset('/img/member-profile/Icon feather-edit.svg') }}" alt="edit icon"
                                class="h-6" />
                        </a>
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom mb-4">COMPANY PROFILE</h6>
                            <div class="highlights-member-profile pl-1">
                                <ul class="w-full mt-2">
                                    <li class="bg-gray-light3 rounded-corner py-2 px-4">
                                        <span class="text-base text-smoke letter-spacing-custom mb-0">Website</span>
                                        <span class="text-base text-gray ml-2"
                                            id="company-website">{{ $company->website_address }}</span>
                                    </li>
                                    <li class="flex bg-gray-light3 rounded-corner py-2 px-4 mt-3 mb-4 description-box">
                                        <span class="text-base text-smoke letter-spacing-custom mb-0">Description </span>
                                        <span id="view-description"
                                            class="text-base text-gray ml-2">{{ $company->description }}</span>
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

@push('scripts')

    <script>
        $(document).ready(function() {
            $('#change-password-btn').click(function() {
                // if ($('#newPassword').val().length != 0) {
                //     if ($('#newPassword').val() == $('#confirmPassword').val()) {
                //         // Password match

                //         $.ajax({
                //             type: 'POST',
                //             url: 'company-repassword',
                //             data: {
                //                 "_token": "{{ csrf_token() }}",
                //                 'password': $('#newPassword').val()
                //             },
                //             success: function(data) {
                //                 alert(data.msg)
                //             }
                //         });
                //     } else {

                //         // Password do not match
                //     }
                // }

            });
        });
    </script>

@endpush
