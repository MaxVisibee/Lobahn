@extends('layouts.master', ['title' => 'YOUR PROFILE'])
@section('content')
    @include('includes.messages')
    <!-- success popup -->
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="success-popup">
        <div class="text-center text-gray-pale absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container pt-16 pb-12 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#success-popup')">
                    <img src="{{ asset('img/sign-up/close.svg') }}" alt="close modal image">
                </button>
                <p class="text-base lg:text-lg tracking-wide popup-text-box__title mb-4 letter-spacing-custom">
                    {{ session('success') ?? 'SAVED !' }}</p>
            </div>
        </div>
    </div>
    <!-- error popup -->
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="error-popup">
        <div class="text-center text-gray-pale absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container pt-16 pb-12 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#error-popup')">
                    <img src="{{ asset('/img/sign-up/close.svg') }}" alt="close modal image">
                </button>
                <p class="text-base lg:text-lg tracking-wide popup-text-box__title mb-4 letter-spacing-custom">
                    {{ session('error') ?? 'Something went wrong !' }}</p>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image" src="">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"
                        class="btn-white text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner"
                        data-dismiss="modal">Cancel</button>
                    <button type="button"
                        class="bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner"
                        id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-pale mt-40 sm:mt-32 md:mt-10 corporate-profile-setting-section">
        <div class="mx-auto relative pt-20 sm:pt-32 pb-40 footer-section">
            <div class="grid gap-3 grid-cols-1 xl:grid-cols-2 ">
                <div class="member-profile-left-side">
                    {!! Form::model($company, ['method' => 'post', 'route' => ['company.profile.update'], 'files' => true, 'id' => 'companyEditForm', 'name' => 'companyEditForm']) !!}
                    <div class="bg-white pl-5 pr-6 pb-10 pt-16 md:pt-8 rounded-corner relative">
                        <button type="submit"
                            class="z-10 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none absolute top-8 right-6 edit-corporate-member-profile-btn"
                            id="edit-corporate-info-save">
                            SAVE
                        </button>
                        <div class="flex flex-col md:flex-row pt-cus-3">
                            <div class="member-profile-image-box relative">
                                <div class="w-full text-center">
                                    @if ($company->company_logo != null)
                                        <img src=" {{ asset('uploads/company_logo/' . $company->company_logo) }}"
                                            alt="profile image" class="member-profile-image" id="corporate-profile-image" />
                                    @else
                                        <img src="{{ asset('/uploads/profile_photos/company-big.jpg') }}"
                                            alt="profile image" class="member-profile-image" id="corporate-profile-image">
                                    @endif
                                    {{-- <img src="{{ asset('http://127.0.0.1:8000/uploads/company_logo/626bac450c772.png') }}"
                                        alt="profile image" class="member-profile-image" id="corporate-profile-image"> --}}
                                </div>
                                <div class="w-full image-upload upload-photo-box mb-8 absolute top-0 left-0"
                                    id="edit-company-photo">
                                    <label for="company_logo" class="relative cursor-pointer block">
                                        <img src="./img/corporate-menu/upload-bg-transparent.svg" alt="sample photo image"
                                            class="member-profile-image" />
                                    </label>
                                    <input type="file" id="company_logo" name="company_logo" accept="image/*"
                                        class="image corporate-profile-image" />
                                    <input type="hidden" id="profile-img" name="cropped_image" value="{{ $company->company_logo }}">
                                    @if ($company->company_logo != null)
                                        <p class="text-gray-light1 text-base text-center mx-auto mt-1 md:mr-8">Change logo
                                        </p>
                                    @else
                                        <p class="text-gray-light1 text-base text-center mx-auto mt-1 md:mr-8">Upload logo
                                        </p>
                                    @endif

                                </div>
                            </div>
                            <div class="member-profile-information-box mt-12 md:mt-0">
                                <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">{{ $company->name }}<span
                                        class="block text-gray-light1 text-base font-book">{{ $company->position_title }}</span>
                                </h6>

                                <ul class="w-full mt-5">
                                    <li
                                        class="flex sm-xl:flex-row flex-col overflow-y-hidden items-center bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 flex-ic comp-name">
                                        <span
                                            class="text-base mr-2 text-smoke letter-spacing-custom mb-0 text-left sm-xl:w-1/2 w-full">Company
                                            name </span>
                                        <input type="text" id="company_name" name="company_name"
                                            value="{{ $company->company_name }}"
                                            class="text-left sm-xl:w-1/2 w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                            id="edit-company-name" />
                                    </li>
                                    <li
                                        class="flex sm-xl:flex-row flex-col overflow-y-hidden items-center bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic">
                                        <span
                                            class="text-base mr-2 text-smoke letter-spacing-custom mb-0 text-left sm-xl:w-1/2 w-full">Username</span>
                                        <input type="text" id="user_name" name="user_name"
                                            value="{{ $company->user_name }}"
                                            class="text-left sm-xl:w-1/2 w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                            id="edit-username" />
                                    </li>
                                    <li
                                        class="flex sm-xl:flex-row flex-col overflow-y-hidden items-center bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic">
                                        <span
                                            class="text-base mr-2 text-smoke letter-spacing-custom mb-0 text-left sm-xl:w-1/2 w-full">Office
                                            email
                                        </span>
                                        <input type="text" id="email" name="email" value="{{ $company->email }}"
                                            class="text-left sm-xl:w-1/2 w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                            id="edit-company-email" />
                                    </li>
                                    <li
                                        class="flex sm-xl:flex-row flex-col overflow-y-hidden items-center bg-gray-light3 rounded-corner py-3 px-4 2xl:px-8 lg:h-11 mt-2 flex-ic o-tele">
                                        <span
                                            class="text-base mr-2 text-smoke letter-spacing-custom mb-0 text-left sm-xl:w-1/2 w-full">Office
                                            telephone</span>
                                        <input type="text" id="phone" name="phone" value="{{ $company->phone }}"
                                            class="text-left sm-xl:w-1/2 w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                            id="edit-company-phone" />

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}

                    <div class="profile-container bg-white pl-5 sm:pl-11 pr-6 pb-12 pt-4 mt-3 rounded-corner">
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom mb-3">PASSWORD</h6>
                            @if ($company->password_updated_date)
                                <p class="text-base text-gray-light1 mt-3 mb-4 letter-spacing-custom changed-password-date"
                                    id="changed-password-date">
                                    Password changed last {{ date('d M Y', strtotime($company->password_updated_date)) }}
                                </p>
                            @endif

                            <button type="button"
                                class="bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner "
                                id="to-change-password-btn">
                                CHANGE PASSWORD
                            </button>

                            <ul class="hidden" id="password-change">
                                <p class="text-base text-gray-light1 mt-3 mb-4 letter-spacing-custom">Enter your current
                                    password</p>
                                <li class="mb-2">
                                    <input type="password" id="current-password" name="password" value=""
                                        class="bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                        placeholder="Current password" autocomplete="off" />
                                </li>
                                <button type="button" id="current-password-submit"
                                    class="bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner ">
                                    NEXT
                                </button>
                            </ul>

                            <ul class="w-full mt-3 mb-4 hidden" id="change-password-form">
                                <li class="mb-2">
                                    <input type="password" id="newPassword" name="newPassword" value=""
                                        class="bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                        placeholder="New Password" />
                                </li>
                                <li class="">
                                    <input type="password" id="confirmPassword" name="confirmPassword" value=""
                                        class="text-lg text-smoke letter-spacing-custom mb-0 w-full bg-gray-light3 rounded-corner py-2 px-4 new-confirm-password focus:outline-none"
                                        placeholder="Confirm Password" />
                                </li>
                            </ul>
                            <button type="button"
                                class="hidden bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner "
                                id="change-password-btn">
                                CHANGE PASSWORD
                            </button>
                        </div>
                    </div>
                </div>
                {!! Form::model($company, ['method' => 'post', 'route' => ['company.profile.update.detail'], 'files' => true, 'id' => 'companyEditForm', 'name' => 'companyEditForm']) !!}
                <div class="member-profile-right-side">
                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-16 pt-8 rounded-corner relative pt-cus-5">
                        <div class="flex sm:flex-row flex-col justify-between">
                            <button
                                class="bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none absolute top-8 right-6 edit-corporate-member-profile-btn"
                                id="save-company-profile-btn" onclick="history.back()">
                                SAVE
                            </button>
                        </div>
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom mb-4">COMPANY PROFILE</h6>
                            <div class="highlights-member-profile pl-1">
                                <ul class="w-full mt-2">
                                    <li class="bg-gray-light3 rounded-corner py-2 px-4">
                                        <span class="text-base text-smoke letter-spacing-custom mb-0">Website</span>
                                        <input type="text" id="website_address" name="website_address"
                                            value="{{ $company->website_address }}"
                                            class="focus:outline-none text-base text-gray ml-2 bg-gray-light3 website-name"
                                            id="edit-company-website" />
                                    </li>
                                    <li class="flex bg-gray-light3 rounded-corner py-2 px-4 mt-3 mb-4 description-box">
                                        <span class="text-base text-smoke letter-spacing-custom mb-0">Description </span>
                                        <textarea maxlength="250" id="edit-description" name="description"
                                            class="focus:outline-none text-base text-gray ml-2 bg-gray-light3 w-full textarea-edit-box" row="10" name="" id="">{{ $company->description }}</textarea>
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

@push('scripts')
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/cropper.css') }}">
    <script src="{{ asset('js/cropper.js') }}"></script>
    <script>
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;
        $("body").on("change", ".image", function(e) {
            var files = e.target.files;
            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });
        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "company-crop-image-upload",
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'image': base64data
                        },
                        success: function(data) {
                            $modal.modal('hide');
                            $('#profile-img').val(data.name);
                            $('#corporate-profile-image').attr("src",
                                "{{ asset('uploads/company_logo/') }}" + '/' +
                                data
                                .name
                            );
                        }
                    });
                }
            });
        })
    </script>


    <script>
        $(document).ready(function() {
            @if (session('success'))
                @php
                    Session::forget('success');
                @endphp
                openModalBox('#success-popup');
                openMemberProfessionalProfileEditPopup();
            @endif
            @if (session('error'))
                @php
                    Session::forget('error');
                @endphp
                openModalBox('#error-popup');
            @endif

            $('#to-change-password-btn').click(function() {
                $('#password-change').removeClass('hidden')
                $('#to-change-password-btn').addClass('hidden')
                $('#changed-password-date').addClass('hidden')
            });

            $("#current-password-submit").click(function() {
                var password = $('#current-password').val()
                $.ajax({
                    type: 'POST',
                    url: 'company-password-check',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'password': password
                    },
                    success: function(data) {
                        if (data.status == "true") {
                            $('#password-change').addClass('hidden')
                            $('#password-change').next().addClass('hidden')

                            $('#change-password-form').removeClass('hidden')
                            $('#change-password-form').next().removeClass('hidden')
                        } else {
                            $('#error-popup').removeClass('hidden')
                        }
                    },
                    beforeSend: function() {
                        $('#loader').removeClass('hidden')
                    },
                    complete: function() {
                        $('#loader').addClass('hidden')
                    }
                });
            })

            // Update Password

            $('#change-password-btn').click(function() {
                if ($('#newPassword').val().length != 0) {
                    if ($('#newPassword').val() == $('#confirmPassword').val()) {
                        // Password match
                        $.ajax({
                            type: 'POST',
                            url: 'company-repassword',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'password': $('#newPassword').val(),
                                'password_confirmation': $('#confirmPassword').val()
                            },
                            success: function(data) {
                                $('#changed-password-date').removeClass('hidden')
                                $('#to-change-password-btn').removeClass('hidden')
                                $('#changed-password-date').text(
                                    "Password changed last {{ date('d M Y', strtotime($company->password_updated_date)) }}"
                                )
                                $('#password-change').addClass('hidden')
                                $('#password-change').next().addClass('hidden')
                                $('#change-password-form').addClass('hidden')
                                $('#change-password-form').next().addClass('hidden')

                                $('#success-popup').removeClass('hidden')
                                $("#success-popup").css('display', 'block')
                            },
                            beforeSend: function() {
                                $('#loader').removeClass('hidden')
                            },
                            complete: function() {
                                $('#loader').addClass('hidden')
                            }
                        });
                    } else {
                        // Password do not match
                        if ($('#confirmPassword').val().length != 0) {
                            //alert("Pasword do not match !")
                            $('#pw-not-match-popup').removeClass('hidden')
                            $('#pw-not-match-popup').css('display', 'block')
                        }
                    }
                }
            });
        });
    </script>
@endpush
