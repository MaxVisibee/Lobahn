@extends('layouts.master')

@section('content')
    <div class="bg-gray-warm-pale text-white mt-28 py-16 md:pt-28 md:pb-28">
        {!! Form::open(['route' => 'register', 'method' => 'POST', 'files' => true, 'id' => 'msform', 'name' => 'msform', 'enctype' => 'multipart/form-data']) !!}

        <div class="flex flex-wrap justify-center items-center sign-up-card-section">

            <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">

            {{-- User Data --}}
            <fieldset
                class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">

                <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">YOUR PASSWORD
                </h1>

                <div class="sign-up-form mb-5">
                    <div class="mb-3 sign-up-form__information">
                        <input type="text" name="user_name" id="user_name" placeholder="Username*"
                            class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                    </div>
                    <div class="mb-3 sign-up-form__information relative">
                        <input type="text" name="password" id="password" placeholder="Password*"
                            class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password" />
                        <img src="../img/sign-up/eye-lash.svg" alt="eye lash icon"
                            class="cursor-pointer eye-lash-icon absolute right-0" />
                    </div>
                    <div class="mb-3 sign-up-form__information relative">
                        <input type="text" name="confirm_password" id="confirm_password" placeholder="Comfirm Password.*"
                            class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password" />
                        <img src="../img/sign-up/eye-lash.svg" alt="eye lash icon"
                            class="cursor-pointer eye-lash-icon absolute right-0" />
                    </div>
                </div>

                <button type="button"
                    class=" next action-button text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                    Next
                </button>

            </fieldset>

            {{-- Profile Data --}}
            <fieldset
                class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--height py-16 sm:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                <center>
                    <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">PROFILE
                        DATA
                    </h1>
                    <div class="sign-up-form mb-5">
                        <div class="mb-3 sign-up-form__information">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Where do you live?</span>
                                        <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                            width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                            <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                        </svg>

                                    </div>
                                    <div
                                        class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                        <span
                                            class="location-reset custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="Where do you live?">Where do you live?</span>
                                        <span
                                            class="location custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example1" value="1">example1</span>
                                        <span
                                            class="location custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example2" value="2">example2</span>

                                    </div>
                                    <input type="hidden" id="location_id" name="location_id" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Desired position titles</span>
                                        <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                            width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                            <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                        </svg>

                                    </div>
                                    <div
                                        class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                        <span
                                            class="position_title-reset custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="Desired position titles">Desired position titles</span>
                                        <span
                                            class="position_title custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example" value="example">example</span>
                                        <span
                                            class="position_title custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example" value="example">example</span>

                                    </div>
                                    <input type="hidden" id="position_title_id" name="position_title_id" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Target industry sectors</span>
                                        <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                            width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                            <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                        </svg>

                                    </div>
                                    <div
                                        class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                        <span
                                            class="industry-reset custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="Target industry sectors">Target industry sectors</span>
                                        <span
                                            class="industry custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example" value="example">example</span>
                                        <span
                                            class="industry custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example" value="example">example</span>

                                    </div>
                                    <input type="hidden" name="industry_id" id="industry_id">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Desired functional areas</span>
                                        <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                            width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                            <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                        </svg>

                                    </div>
                                    <div
                                        class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                        <span
                                            class="functional_area-rest custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="Desired functional areas">Desired functional areas</span>
                                        <span
                                            class="functional_area custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example" value="example">example</span>
                                        <span
                                            class="functional_area custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example" value="example">example</span>

                                    </div>
                                    <input type="hidden" name="functional_area_id" id="functional_area_id">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Desirable employers</span>
                                        <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                            width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                            <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                        </svg>

                                    </div>
                                    <div
                                        class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                        <span
                                            class="employer-reset custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="Desirable employers">Desirable employers</span>
                                        <span
                                            class="employer custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example" value="example">example</span>
                                        <span
                                            class="employer custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example" value="example">example</span>

                                    </div>
                                    <input type="hidden" name="employer_id" id="employer_id">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Preferred employment terms</span>
                                        <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                            width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                            <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                        </svg>

                                    </div>
                                    <div
                                        class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                        <span
                                            class="contract_term-reset custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="Preferred employment terms">Preferred employment terms</span>
                                        <span
                                            class="contract_term custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example" value="example">example</span>
                                        <span
                                            class="contract_term custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example" value="example">example</span>

                                    </div>
                                    <input type="hidden" name="contract_term_id" id="contract_term_id">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Target pay*</span>
                                        <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                            width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                            <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                        </svg>

                                    </div>
                                    <div
                                        class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                        <span
                                            class="pay-reset custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="Target pay*">Target pay*</span>
                                        <span
                                            class="pay custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example" value="example">example</span>
                                        <span
                                            class="pay custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example" value="example">example</span>

                                    </div>
                                    <input type="hidden" name="pay_id" id="pay_id">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button"
                        class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button">
                        Next
                    </button>
                </center>
            </fieldset>
            {{-- Upload CV --}}
            <fieldset
                class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--upload-height py-16 sm:py-20 lg:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                <center>
                    <h1 class="text-xl sm:text-2xl xl:text-4xl text-center font-heavy tracking-wide mt-4 mb-3">PLEASE
                        UPLOAD YOUR CV</h1>
                    <h6
                        class="text-base xl:text-lg letter-spacing-custom mb-7 text-gray-pale text-center upload-accepted-file-note">
                        Accepted file types: .pdf, .docx
                        Maximum file size: 1mb</h6>
                    <div class="sign-up-form mb-5">
                        <div class="image-upload upload-photo-box  sign-up-form__information mb-8 relative">
                            <label for="file-input"
                                class="relative cursor-pointer block w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password">
                                Your most recent CV
                                <img src="./img/sign-up/upload-file.svg" alt="upload icon"
                                    class="upload-cv-image absolute right-2" />
                            </label>
                            <input type="file" name="cv" id="cv" accept=".pdf,.docs"
                                data-allowed-file-extensions="pdf docs" />
                        </div>
                    </div>

                    <button type="button"
                        class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button">
                        Next
                    </button>
                </center>
            </fieldset>


            {{-- Upload Photo --}}
            <fieldset
                class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--upload-height py-16 sm:py-20 lg:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                <center>
                    <h1 class="text-xl sm:text-2xl xl:text-4xl text-center font-heavy tracking-wide mt-4 mb-3">PLEASE UPLOAD
                        YOUR COMPANY LOGO</h1>
                    <h6
                        class="text-base xl:text-lg letter-spacing-custom mb-7 text-gray-pale text-center upload-accepted-file-note upload-accepted-file-note--width">
                        Recommended format:<span class="block">300x300px, .jpg, not larger than 200kb</span></h6>
                    <div class="image-upload upload-photo-box  mb-8 relative">
                        <label for="file-input" class="relative cursor-pointer block">
                            <img src="./img/sign-up/upload-photo.png" alt="sample photo image"
                                class="upload-photo-box__photo" />
                            <img src="./img/sign-up/upload-file.svg" alt="upload icon"
                                class="upload-photo-box__icon absolute top-1/2 left-1/2" />
                        </label>

                        <input id="file-input" name="photo" type="file" accept="image/*" />
                    </div>
                    <button type="button"
                        class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button">
                        Next
                    </button>
                </center>
            </fieldset>

            {{-- Membership --}}
            <fieldset
                class="group sign-up-card-section__explore join-individual card-membership-height flex flex-col items-center justify-center bg-gray-light m-2 rounded-md py-20">
                <center>
                    <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">SELECT
                        MEMBERSHIP</h1>
                    <div class="sign-up-form mb-5">
                        <ul class="mb-3 sign-up-form__information letter-spacing-custom">
                            <li
                                class="w-full bg-white active-fee sign-up-form__fee cursor-pointer hover:bg-lime-orange text-gray pl-8 pr-4 py-4 mb-4 rounded-md tracking-wide sign-up-form__information--fontSize">
                                <label for="monthly">
                                    <input type="radio" name="package_id" id="monthly" style="appearance: none;">
                                    Monthly Plan<span class="block text-gray">
                                        $1,295 per month</span></label>

                            </li>
                            <li
                                class="w-full bg-white cursor-pointer sign-up-form__fee hover:bg-lime-orange text-gray pl-8 pr-4 py-4 mb-4 rounded-md tracking-wide sign-up-form__information--fontSize">
                                <label for="annually">
                                    <input type="radio" name="package_id" id="annually" style="appearance: none;">
                                    One-year plan <span class="block text-gray">$970 per month</span>
                                    <span class="block text-gray">billed at $11,640 annually</span></label>


                            </li>
                            <li
                                class="w-full bg-white cursor-pointer sign-up-form__fee text-gray hover:bg-lime-orange pl-8 pr-4 py-4 rounded-md tracking-wide sign-up-form__information--fontSize">
                                <label for="twoyears">
                                    <input type="radio" name="package_id" id="twoyears" style="appearance: none;">
                                    Two-year plan <span class="block text-gray">$450 per month</span>
                                    <span class="block text-gray">billed at $10,800 every two years</span></label>

                            </li>
                        </ul>
                    </div>
                    <button type="button"
                        class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button">
                        Next
                    </button>
                </center>
            </fieldset>

            {{-- Payment --}}
            <fieldset
                class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                <center>
                    <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">
                        PAYMENT
                    </h1>
                    <div class="sign-up-form mb-5">
                        <div class="mb-3 sign-up-form__information">
                            <button class="focus:outline-none w-full bg-gray text-gray-pale py-4 rounded-md tracking-wide">
                                <img src="./img/sign-up/ipay.svg" alt="i pay icon" class="mx-auto ipay-image">
                            </button>
                        </div>
                        <div class="divider-custom mb-3">
                            <p class="inline-block text-sm text-gray-pale">or pay with card</p>
                        </div>
                        <div class="mb-3 sign-up-form__information">
                            <input type="text" placeholder="Card number"
                                class="text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray pl-8 pr-4 py-4 rounded-md tracking-wide" />
                        </div>
                        <div class="flex flex-wrap justify-between items-center">
                            <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                <input type="text" placeholder="MM/YY"
                                    class="text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray pl-8 pr-4 py-4 rounded-md tracking-wide" />
                            </div>
                            <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                <input type="text" placeholder="CVV"
                                    class="text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray pl-8 pr-4 py-4 rounded-md tracking-wide" />
                            </div>
                        </div>
                    </div>
                    <button type="button" id="btn_complete"
                        class="text-gray text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button ">
                        Next
                    </button>
                </center>
            </fieldset>

            {{-- Payment --}}
            <fieldset>
                <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity"
                    id="individual-successful-popup">
                    <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
                        <div
                            class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container--height pt-16 pb-8 relative">
                            {{-- <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                             onclick="toggleModalClose('#email-verify')">
                             <img src="./img/sign-up/close.svg" alt="close modal image">
                         </button> --}}
                            <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">THAT'S ALL FOR
                                NOW!
                            </h1>
                            <p class="text-gray-pale popup-text-box__description individual-successful-description">
                                Get
                                ready to
                                receive well-matched career opportunities that fit your criteria!</p>
                            <div class="sign-up-form sign-up-form--individual-success my-5">
                                <ul class="mb-3 sign-up-form__information sign-up-form__information--individual">
                                    <button type="button"
                                        class="mx-auto active-fee sign-up-form__fee successful-options cursor-pointer hover:bg-lime-orange hover:text-gray text-lime-orange mb-4 rounded-full tracking-wide text-sm lg:text-base xl:text-lg border border-lime-orange py-3 next action-button">
                                        For best results, optimize your profile now!
                                    </button>
                                    <li
                                        class="mx-auto cursor-pointer sign-up-form__fee successful-options hover:bg-lime-orange hover:text-gray text-lime-orange mb-4 rounded-full tracking-wide text-sm lg:text-base xl:text-lg border border-lime-orange py-3">
                                        I'll optimize my profile later
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>

        </div>
        </form>
        {{-- {!! Form::close() !!} --}}
    </div>
@endsection



@push('css')
    <style>
        #msform fieldset:not(:first-of-type) {
            display: none
        }

    </style>
@endpush



@push('scripts')
    <script>
        $(document).ready(function() {


            // Custom Select 

            $('.location').click(function() {
                $("#location_id").val($(this).attr('value'));
            });
            $('.location-reset').click(function() {
                $("#location_id").val('');
            });

            // Position Title 

            $('.position_title').click(function() {
                $("#position_title_id").val($(this).attr('value'));
            });
            $('.location-reset').click(function() {
                $("#position_title_id").val('');
            });

            // industry

            $('.industry').click(function() {
                $("#industry_id").val($(this).attr('value'));
            });
            $('.industry-reset').click(function() {
                $("#industry_id").val('');
            });

            // pay 

            $('.pay').click(function() {
                $("#pay_id").val($(this).attr('value'));
            });
            $('.pay-reset').click(function() {
                $("#pay_id").val('');
            });

            // employment terms 

            $('.contract_term').click(function() {
                $("#contract_term_id").val($(this).attr('value'));
            });
            $('.contract_term-reset').click(function() {
                $("#contract_term_id").val('');
            });

            //employer

            $('.employer').click(function() {
                $("#employer_id").val($(this).attr('value'));
            });
            $('.employer-reset').click(function() {
                $("#employer_id").val('');
            });

            //functional_area_id

            $('.functional_area').click(function() {
                $("#functional_area_id").val($(this).attr('value'));
            });
            $('.functional_area-reset').click(function() {
                $("#functional_area_id").val('');
            });




            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function() {

                current_fs = $(this).closest("fieldset");
                next_fs = $(this).closest("fieldset").next();

                //show the next fieldset
                next_fs.show();
                //console.log(next_fs);
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $(".previous").click(function() {

                current_fs = $(this).closest("fieldset");
                previous_fs = $(this).closest("fieldset").prev();

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });



            //onclick="openModalBox('#individual-successful-popup')""

            $("#btn_complete").click(function() {

                if (document.getElementById("cv").value != "") {
                    // you have a file
                    console.log("have");
                } else {
                    console.log("Empty");
                }

                $("#msform").submit();

            });

        });
    </script>
@endpush
