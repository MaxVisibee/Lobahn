@extends('layouts.master')
@section('content')
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
    <div class="bg-gray-light2 postition-detail-content md:pt-40 pt-48 pb-32">
        <div class="bg-white py-12 md:px-10 px-4 rounded-md">
            @if (session('status'))
                <div class="alert alert-success forget-password-email-required-message text-lime-orange">
                    {{ session('status') }}
                </div>
            @endif
            <div class="lg:flex justify-between">

                <p class="lg:text-left text-center text-2xl text-gray uppercase font-book">{{ $opportunity->title }}
                </p>
                <div class="md:flex lg:justify-start lg:mt-0 mt-4 justify-center md:gap-4">
                    <div class="flex justify-center">
                        <button type="button"
                            onclick="location.href='{{ route('company.position.edit', $opportunity->id) }}'"
                            class="uppercase focus:outline-none text-gray text-lg position-detail-edit-btn py-3 px-12">
                            Edit
                        </button>
                    </div>
                    <div class="flex justify-center">
                        <button type="button" onclick="location.href='{{ route('company.positions', $opportunity->id) }}'"
                            class="uppercase focus:outline-none text-gray-light3 text-lg position-detail-back-btn py-3 px-12">
                            Back
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-8">
                <div>
                    <p class="text-21 text-smoke pb-2 font-book tracking-wider">Description</p>
                </div>
                <div>
                    <p class="text-21 text-smoke pb-2 pl-2 font-book tracking-wider">Highlights</p>
                </div>

            </div>
            <div class="grid md:grid-cols-2 position-detail-gap-safari gap-4">
                <div class="bg-gray-light3 position-detail-input-box-border">
                    <div class="">
                        <div class="flex justify-center pl-4 pr-8 py-2">
                            <p class="text-gray text-lg font-book">{!! $opportunity->description ?? '' !!}</p>
                        </div>
                    </div>
                </div>
                <div class=" ">
                    <div class="bg-gray-light3 mb-2 py-2 position-detail-input-box-border">
                        <div class="flex px-4">
                            <div class="text-lg flex">
                                <p class="text-smoke mr-3">1.</p>
                                <p class="text-gray">{{ $opportunity->highlight_1 ?? ' ' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-light3 mb-2 py-2 position-detail-input-box-border">
                        <div class="px-4 ">
                            <div class="text-lg flex">
                                <p class="text-smoke mr-3">2.</p>
                                <p class="text-gray">{{ $opportunity->highlight_2 ?? ' ' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-light3 py-2 position-detail-input-box-border">
                        <div class="flex px-4">
                            <div class="text-lg flex">
                                <p class="text-smoke mr-3">3.</p>
                                <p class="text-gray">{{ $opportunity->highlight_3 ?? ' ' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <p class="text-21 text-smoke pb-2 font-book tracking-wider">Keywords</p>
            </div>
            <div class="flex flex-wrap gap-2 bg-gray-light3 position-detail-input-box-border py-4 pl-6">
                @forelse ($keywords as $keyword)
                    <div class="bg-gray-light1 rounded-2xl text-center px-2 mr-2">
                        <p class="text-gray-light3 text-sm">{{ $keyword->keyword->keyword_name }}</p>
                    </div>
                @empty
                    no data
                @endforelse
            </div>
            <div class="grid md:grid-cols-2 mt-8 gap-4">
                <div class="">
                    <p class="text-21 text-smoke pb-2 font-book tracking-wider">Expiry Date</p>
                    <div class="flex py-2 bg-gray-light3 position-detail-input-box-border">
                        <p class="text-gray text-lg pl-6">{{ date('d M , Y', strtotime($opportunity->expire_date)) }}</p>
                    </div>
                </div>
                <div class="">
                    <p class="text-21 text-smoke pb-2 font-book tracking-wider">Status</p>
                    <div class="flex justify-between py-2 bg-gray-light3 position-detail-input-box-border">
                        <p class="text-gray text-lg pl-6">
                            @if ($opportunity->is_active)
                                Open
                            @else
                                Closed
                            @endif
                        </p>
                        <img class="object-contain self-center pr-4"
                            src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                    </div>
                </div>
            </div>
            <div class="mb-6 mt-4 w-full image-upload upload-photo-box" id="edit-professional-photo">
                <span class="text-21 text-smoke">Upload supporting documents</span>
                <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                    <p class="text-gray text-lg pl-6">uploaded-document.pdf</p>
                </div>
            </div>
            <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-4">
                <div class="col-span-1">
                    <div class="md:flex justify-between mb-2 mt-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Company Name</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">{{ $opportunity->company->company_name }}</p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2 mt-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Reference No.</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">{{ $opportunity->ref_no ?? 'no data' }}</p>
                        </div>
                    </div>
                    <div class="">
                        <p class="text-21 text-smoke pb-4">Matching Factors</p>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Position location</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($countries) == 0)
                                    no data
                                @elseif(count($countries) > 1)
                                    @php
                                        $id = $countries[0]->country_id;
                                        $first_country = DB::table('countries')
                                            ->where('id', $id)
                                            ->pluck('country_name')[0];
                                    @endphp
                                    {{ $first_country }} + {{ count($countries) - 1 }}
                                @else
                                    @foreach ($countries as $country)
                                        {{ $country->country->country_name }} @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Industry sector</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($industries) == 0)
                                    no data
                                @elseif(count($industries) > 1)
                                    @php
                                        $id = $industries[0]->industry_id;
                                        $first_industry_name = DB::table('industries')
                                            ->where('id', $id)
                                            ->pluck('industry_name')[0];
                                    @endphp
                                    {{ $first_industry_name }} + {{ Count($industries) - 1 }}
                                @else
                                    @foreach ($industries as $industrie)
                                        {{ $industrie->industry->industry_name }} @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Functional and Specialties</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($fun_areas) == 0)
                                    no data
                                @elseif(count($fun_areas) > 1)
                                    @php
                                        $id = $fun_areas[0]->functional_area_id;
                                        $first_functional_area_name = DB::table('functional_areas')
                                            ->where('id', $id)
                                            ->pluck('area_name')[0];
                                    @endphp
                                    {{ $first_functional_area_name }} + {{ Count($fun_areas) - 1 }}
                                @else
                                    @foreach ($fun_areas as $fun_area)
                                        {{ $fun_area->functionalArea->area_name }} @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Employment terms</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($job_types) == 0)
                                    no data
                                @elseif(count($job_types) > 1)
                                    @php
                                        $id = $job_types[0]->job_type_id;
                                        $first_job_type = DB::table('job_types')
                                            ->where('id', $id)
                                            ->pluck('job_type')[0];
                                    @endphp
                                    {{ $first_job_type }} + {{ Count($job_types) - 1 }}
                                @else
                                    @foreach ($job_types as $job_type)
                                        {{ $job_type->type->job_type }} @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Target pay range</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between ">
                            <p class="text-gray text-lg pl-4 pr-8 bg-gray-light3 py-2 position-detail-input-box-border">
                                {{ $opportunity->salary_from ?? 'no data' }}</p>
                            <p class="text-gray text-lg flex self-center">-</p>
                            <p class="text-gray text-lg pl-4 pr-8 bg-gray-light3 py-2 position-detail-input-box-border">
                                {{ $opportunity->salary_to ?? 'no data' }}</p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Full-time monthly salary</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->full_time_salary == null)
                                    no data
                                @else
                                    {{ $opportunity->full_time_salary }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Part time daily rate</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->part_time_salary == null)
                                    no data
                                @else
                                    {{ $opportunity->part_time_salary }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Freelance project fee per month</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->freelance_salary == null)
                                    no data
                                @else
                                    {{ $opportunity->freelance_salary }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Position titles</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($job_titles) == 0)
                                    no data
                                @elseif(count($job_titles) > 1)
                                    @php
                                        $id = $job_titles[0]->job_title_id;
                                        $first_job_title = DB::table('job_titles')
                                            ->where('id', $id)
                                            ->pluck('job_title')[0];
                                    @endphp
                                    {{ $first_job_title }} + {{ Count($job_titles) - 1 }}
                                @else
                                    @foreach ($job_titles as $job_title)
                                        {{ $job_title->jobTitle->job_title }} @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Keywords</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($keywords) == 0)
                                    no data
                                @elseif(count($keywords) > 1)
                                    @php
                                        $id = $keywords[0]->keyword_id;
                                        $first_keyword = DB::table('keywords')
                                            ->where('id', $id)
                                            ->pluck('keyword_name')[0];
                                    @endphp
                                    {{ $first_keyword }} + {{ Count($keywords) - 1 }}
                                @else
                                    @foreach ($keywords as $keyword)
                                        {{ $keyword->keyword->keyword_name }} @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Years </p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->job_experience_id)
                                    {{ $opportunity->jobExperience->job_experience }}
                                @else
                                    no data
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Management level </p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->carrier_level_id != null)
                                    {{ $opportunity->carrier->carrier_level }}
                                @else
                                    no data
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">People management </p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->people_management != null)
                                    {{ $opportunity->peopleManagementLevel->level ?? '' }}
                                @else
                                    no data
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Languages</p>
                        </div>
                        <div class="md:w-6/12 ">
                            @forelse ($languages as $laguage_usage)
                                <div class="w-full md:flex justify-between mt-2">
                                    <div class="flex w-3/6 bg-gray-light3 py-2 position-detail-input-box-border mr-4">
                                        <p class="text-gray text-lg px-4">{{ $laguage_usage->language->language_name }}
                                        </p>
                                    </div>
                                    <div
                                        class="flex justify-center w-3/6 bg-gray-light3 py-2 position-detail-input-box-border">
                                        <p class="text-gray text-lg px-4">{{ $laguage_usage->level->level ?? '' }}</p>
                                    </div>
                                </div>

                            @empty
                                {{-- <div class="md:w-6/12 ">
                            <div class="flex w-6/6 bg-gray-light3 py-2 position-detail-input-box-border mr-4">
                                <p class="text-gray text-lg px-4 ml-2">no data</p>
                            </div>
                        </div> --}}
                            @endforelse
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Software & tech knowledge</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray self-center text-lg pl-6">
                                @if (count($job_skills) == 0)
                                    no data
                                @elseif(count($job_skills) > 1)
                                    @php
                                        $id = $job_skills[0]->job_skill_id;
                                        $first_skill = DB::table('job_skills')
                                            ->where('id', $id)
                                            ->pluck('job_skill')[0];
                                    @endphp
                                    {{ $first_skill }} + {{ Count($job_skills) - 1 }}
                                @else
                                    @foreach ($job_skills as $job_skill)
                                        {{ $job_skill->skill->job_skill }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Geographical experience</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($geographicals) == 0)
                                    no data
                                @elseif(count($geographicals) > 1)
                                    @php
                                        $id = $geographicals[0]->geographical_id;
                                        $first_geo_name = DB::table('geographicals')
                                            ->where('id', $id)
                                            ->pluck('geographical_name')[0];
                                    @endphp
                                    {{ $first_geo_name }} + {{ Count($geographicals) - 1 }}
                                @else
                                    @foreach ($geographicals as $geographical)
                                        {{ $geographical->geographical->geographical_name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Education level </p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p style="word-break: break-all;" class="text-gray text-lg pl-6">
                                @if ($opportunity->degree_level_id)
                                    {{ $opportunity->degree->degree_name }}
                                @else
                                    no data
                                @endif
                            </p>

                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Academic institutions</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($instituties) == 0)
                                    no data
                                @elseif(count($instituties) > 1)
                                    @php
                                        $id = $instituties[0]->institution_id;
                                        $first_institute = DB::table('institutions')
                                            ->where('id', $id)
                                            ->pluck('institution_name')[0];
                                    @endphp
                                    {{ $first_institute }} + {{ Count($instituties) - 1 }}
                                @else
                                    @foreach ($instituties as $institutie)
                                        {{ $institutie->institution->institution_name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Fields of study</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($study_fields) == 0)
                                    no data
                                @elseif(count($study_fields) > 1)
                                    @php
                                        $id = $study_fields[0]->field_study_id;
                                        $first_field = DB::table('study_fields')
                                            ->where('id', $id)
                                            ->pluck('study_field_name')[0];
                                    @endphp
                                    {{ $first_field }} + {{ Count($study_fields) - 1 }}
                                @else
                                    @foreach ($study_fields as $study_field)
                                        {{ $study_field->studyField->study_field_name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Qualifications</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($qualifications) == 0)
                                    no data
                                @elseif(count($qualifications) > 1)
                                    @php
                                        $id = $qualifications[0]->qualification_id;
                                        $first_qualification = DB::table('qualifications')
                                            ->where('id', $id)
                                            ->pluck('qualification_name')[0];
                                    @endphp
                                    {{ $first_qualification }} + {{ Count($qualifications) - 1 }}
                                @else
                                    @foreach ($qualifications as $study_field)
                                        {{ $study_field->qualification->qualification_name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Key strengths</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($key_strengths) == 0)
                                    no data
                                @elseif(count($key_strengths) > 1)
                                    @php
                                        $id = $key_strengths[0]->key_strength_id;
                                        $first_keystrength = DB::table('key_strengths')
                                            ->where('id', $id)
                                            ->pluck('key_strength_name')[0];
                                    @endphp
                                    {{ $first_keystrength }} + {{ Count($key_strengths) - 1 }}
                                @else
                                    @foreach ($key_strengths as $key_strength)
                                        {{ $key_strength->keyStrength->key_strength_name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Contract hours</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($job_shifts) == 0)
                                    no data
                                @elseif(count($job_shifts) > 1)
                                    @php
                                        $id = $job_shifts[0]->job_shift_id;
                                        $first_shift = DB::table('job_shifts')
                                            ->where('id', $id)
                                            ->pluck('job_shift')[0];
                                    @endphp
                                    {{ $first_shift }} + {{ Count($job_shifts) - 1 }}
                                @else
                                    @foreach ($job_shifts as $job_shift)
                                        {{ $job_shift->jobShift->job_shift }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <!-- Specialties -->
                    {{-- <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Specialties</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($specialties) == 0)
                                    no data
                                @elseif(count($specialties) > 3)
                                    {{ Count($specialties) }} Selected
                                @else
                                    @foreach ($specialties as $id => $specialty)
                                        {{ $specialty->speciality->speciality_name ?? '' }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div> --}}
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Target employers</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($target_employers) == 0)
                                    no data
                                @elseif(count($target_employers) > 1)
                                    @php
                                        $id = $target_employers[0]->target_employer_id;
                                        $first_employer = DB::table('companies')
                                            ->where('id', $id)
                                            ->pluck('company_name')[0];
                                    @endphp
                                    {{ $first_employer }} + {{ Count($target_employers) - 1 }}
                                @else
                                    @foreach ($target_employers as $target_employer)
                                        {{ $target_employer->company->company_name ?? '' }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
        });
    </script>
@endpush
