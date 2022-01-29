@extends('layouts.frontend-master')
@section('content')

    <div class="bg-gray-warm-pale text-white mt-28 py-16 md:pt-28 md:pb-28">
        <div class="flex flex-wrap justify-center items-center sign-up-card-section">

            <div
                class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--height py-16 sm:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">OPTIMIZE
                    PROFILE
                </h1>
                <form action="{{ route('career.opitimized') }}" method="POST" id="msform">
                    @csrf
                    <div class="sign-up-form mb-5">
                        <div class="mb-3 sign-up-form__information">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Preferred contract hours</span>
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
                                        @foreach ($contract_hours as $contract_hour)
                                            <span value="{{ $contract_hour->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $contract_hour->job_shift }}">{{ $contract_hour->job_shift }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="contract_hour[]" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Keywords that apply to you</span>
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
                                        @foreach ($keywords as $keyword)
                                            <span value="{{ $keyword->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $keyword->keyword_name }}">{{ $keyword->keyword_name }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="keyword[]" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Your current management level</span>
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
                                        @foreach ($carriers as $carrier)
                                            <span value="{{ $carrier->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $carrier->carrier_level }}">{{ $carrier->carrier_level }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="carrier" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Your years of work experience</span>
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
                                        @foreach ($years as $year)
                                            <span value="{{ $year->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $year->job_experience }}">{{ $year->job_experience }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="job_experience" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Your highest education level</span>
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
                                        @foreach ($education_levels as $education_level)
                                            <span value="{{ $education_level->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $education_level->degree_name }}">{{ $education_level->degree_name }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="education_level" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Schools you attended</span>
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
                                        @foreach ($institutions as $institution)
                                            <span value="{{ $institution->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $institution->institution_name }}">{{ $institution->institution_name }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="institution[]" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Your language skills</span>
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
                                        @foreach ($languages as $language)
                                            <span value="{{ $language->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $language->language_name }}">{{ $language->language_name }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="language[]" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Your geographical market experience</span>
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
                                        @foreach ($georophical_experiences as $georophical_experience)
                                            <span value="{{ $georophical_experience->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $georophical_experience->geographical_name }}">{{ $georophical_experience->geographical_name }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="georophical[]" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>The largest number of people you have managed</span>
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
                                        @foreach ($people_managements as $people_management)
                                            <span value="{{ $people_management }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $people_management }}">{{ $people_management }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="people_management" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Your software & tech knowledge</span>
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
                                        @foreach ($job_skills as $job_skill)
                                            <span value="{{ $job_skill->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $job_skill->job_skill }}">{{ $job_skill->job_skill }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="job_skill[]" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Your fields of academic study</span>
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
                                        @foreach ($study_fields as $study_field)
                                            <span value="{{ $study_field->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $study_field->study_field_name }}">{{ $study_field->study_field_name }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="study_field[]" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Your qualifications & certificates</span>
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
                                        @foreach ($qualifications as $qualification)
                                            <span value="{{ $qualification->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $qualification->qualification_name }}">{{ $qualification->qualification_name }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="qualification[]" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Your oustanding professionals qualities</span>
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
                                        @foreach ($specialties as $speciality)
                                            <span value="{{ $speciality->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="Your outstanding professionals qualities">{{ $speciality->speciality_name }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="speciality[]" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <button type="submit" form="msform"
                    class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                    Optimize
                </button>
            </div>

        </div>
    </div>


@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.custom-option').click(function() {
                $(this).parent().next().val($(this).attr('value'));
            });
        });
    </script>
@endpush
