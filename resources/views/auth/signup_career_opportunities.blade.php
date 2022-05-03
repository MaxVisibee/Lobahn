@extends('layouts.master')
@section('content')
    <div class="bg-gray-warm-pale text-white mt-28 py-16 md:pt-28 md:pb-28">
        <div class="flex flex-wrap justify-center items-center sign-up-card-section">
            <div
                class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">JOIN AS AN
                    INDIVIDUAL MEMBER</h1>
                <form action="{{ route('career_store') }}" method="post" id="msform">
                    @csrf
                    <div class="sign-up-form mb-5">
                        <div class="mb-3 sign-up-form__information">
                            <p
                                class="@if (!$errors->has('name')) hidden @endif signup-name-required-message text-lg text-red-500 mb-1">
                                @foreach ($errors->get('name') as $error)
                                    {{ $error }}
                                @endforeach
                            </p>
                            <input type="text" name="name" id="name" placeholder="Name*" value="{{ old('name') }}"
                                required
                                class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                        </div>
                        <div class="mb-3 sign-up-form__information">
                            <p
                                class="@if (!$errors->has('email')) hidden @endif signup-email-required-message text-lg text-red-500 mb-1">
                                @foreach ($errors->get('email') as $error)
                                    {{ $error }}
                                @endforeach
                            </p>
                            <input type="email" name="email" id="email" placeholder="Email*" value="{{ old('email') }}"
                                required
                                class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                        </div>

                        {{-- <div class="mb-3 sign-up-form__information">
                            <p
                                class="@if (!$errors->has('phone')) hidden @endif signup-contactno-required-message text-lg text-red-500 mb-1">
                                @foreach ($errors->get('phone') as $error)
                                    {{ $error }}
                                @endforeach
                            </p>
                            <input type="text" name="phone" id="phone" placeholder="Contact No.*"
                                value="{{ old('phone') }}"
                                class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                        </div> --}}
                        <div class="flex">
                            <div class="lg:w-30percent w-2/5 xl:mr-4 mr-2">
                                <div class="mb-3 sign-up-form__information country-code-container h-full">
                                    <div class="select-wrapper text-gray-pale h-full">
                                        <div class="select-preferences h-full">
                                            <div
                                                class="select__trigger h-full relative flex items-center justify-between pl-2 bg-gray cursor-pointer">
                                                <span>+852</span>
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
                                                    class="custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+852">+852</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+853">+853</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+854">+854</span>
                                            </div>
                                            <input type="hidden" name="country_code" value="+852">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:w-70percent w-3/5">
                                <div class="sign-up-form__information">
                                    <p class="hidden signup-contactno-required-message text-lg text-red-500 mb-1">contact
                                        no. is required !</p>
                                    <input type="tel" id="phone" placeholder="Contact No.*" value="{{ old('phone') }}"
                                        required name="phone"
                                        class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                                </div>
                            </div>
                        </div>

                        <div class="accept-condition-box text-sm">
                            <input type="checkbox" name="" value="" name="career_agreement" id="career_agreement" required
                                class="focus:outline-none accept-condition-box__checkbox">
                            <label for="career_agreement" class="accept-condition-box__label text-gray-pale"><span>I
                                    understand and accept <a href="{{ route('terms') }}" class="text-lime-orange">Terms
                                        and Conditions</a></span></label>
                        </div>
                    </div>
                </form>
                <button type="submit" form="msform"
                    class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                    Confirm
                </button>

            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="email-verify">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container py-16 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#email-verify')">
                    <img src="./img/sign-up/close.svg" alt="close modal image">
                </button>
                <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">EMAIL VERIFICATION SENT</h1>
                <p class="text-gray-pale popup-text-box__description">An email was sent to your email. Please click the link
                    to verify the registration.</p>
            </div>
        </div>
    </div>
    {{-- End Modal --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.custom-option').click(function() {
                $(this).parent().next().val($(this).attr('data-value'));
            });

            $("#msform").submit(function(event) {
                $('#loader').removeClass('hidden')
            });

            @if (session('verified'))
                openModalBox('#email-verify')
                @php Session::forget('verified'); @endphp
            @endif
        });
    </script>
@endpush
