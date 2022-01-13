@extends('layouts.master')
@section('content')
    <div class="bg-gray-warm-pale text-white mt-28 py-16 md:pt-28 md:pb-28">
        <div class="flex flex-wrap justify-center items-center sign-up-card-section">
            <div class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">JOIN AS AN INDIVIDUAL MEMBER</h1>
                <form action="{{ route('career_store') }}" method="post" id="msform">
                @csrf
                <div class="sign-up-form mb-5">
                    <div class="mb-3 sign-up-form__information">
                        <input type="text" name="name" id="name" placeholder="Name*"
                                class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide"
                                required />
                    </div>
                    <div class="mb-3 sign-up-form__information">
                        <input type="email" name="email" id="email" placeholder="Email*"
                                class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide"
                                required />
                    </div>
                    <div class="mb-3 sign-up-form__information">
                        <input type="text" name="phone" id="phone" placeholder="Contact No.*"
                                class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide"
                                required />
                    </div>
                    <div class="accept-condition-box text-sm">
                        <input type="checkbox" name="" value="" name="career_agreement" id="career_agreement" required
                                class="focus:outline-none accept-condition-box__checkbox">
                            <label for="career_agreement" class="accept-condition-box__label text-gray-pale"><span>I
                                    understand and
                                    accept <a href="#" class="text-lime-orange">Terms and Conditions</a></span></label>
                    </div>
                </div>
                </form>
                <button type="submit" form="msform"  class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
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
            @if (session('verified'))
                openModalBox('#email-verify')
                @php Session::forget('verified'); @endphp
            @endif
        });
    </script>
@endpush
