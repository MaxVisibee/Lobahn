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

    {{-- @if (session('status'))
            <div class="alert alert-success forget-password-email-required-message text-lime-orange">
                {{ session('status') }}
            </div>
        @endif --}}
    @if (session('status'))
        <div class="fixed top-0 w-full h-screen left-0 z-[9999] bg-black-opacity" id="position-detail-popup">
            <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
                <div
                    class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-10 pb-12 relative">
                    <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                        onclick="toggleModalClose('#position-detail-popup')">
                        <img src="{{ asset('/img/sign-up/close.svg') }}" alt="close modal image">
                    </button>
                    <span class="custom-answer-approve-msg text-white text-lg my-2">{{ session('status') }}</span>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-gray-light2 postition-detail-content md:pt-40 pt-48 pb-32">
        <div class="bg-white py-12 md:px-10 px-4 rounded-md">
            <div class="lg:flex justify-between">
                <p class="lg:text-left text-center text-2xl text-gray uppercase font-book">{{ $opportunity->title }}
                </p>
                <div class="md:flex lg:justify-start lg:mt-0 mt-4 justify-center md:gap-4">
                    <div class="flex justify-center">
                        <button type="button"
                            onclick="location.href='{{ route('company.position.edit', $opportunity->id) }}'"
                            class="uppercase w-40 focus:outline-none text-gray text-lg position-detail-edit-btn py-3 px-12">
                            Edit
                        </button>
                    </div>
                    <div class="flex justify-center">
                        <button type="button" onclick="location.href='{{ route('company.positions', $opportunity->id) }}'"
                            class="uppercase w-40 focus:outline-none text-gray-light3 text-lg position-detail-back-btn py-3 px-12">
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
            @isset($opportunity->supporting_document)
                <div class="mb-6 mt-4 w-full image-upload upload-photo-box" id="edit-professional-photo">
                    <span class="text-21 text-smoke">Upload supporting documents</span>
                    <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                        <a class="w-full text-gray text-lg md:px-6 px-4 white-normal break-words">{{ $opportunity->supporting_document }}</a>
                    </div>
                </div>
            @endisset
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
                            <p class="text-gray text-lg pl-6">{{ $opportunity->ref_no ?? ' ' }}</p>
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
                                {{ $opportunity->country->country_name ?? ' No data' }}
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Industry sector</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @php
                                    if (!is_null($opportunity->custom_industry_id)) {
                                        $custom_industries = json_decode($opportunity->custom_industry_id);
                                    } else {
                                        $custom_industries = [];
                                    }
                                    $count = count($custom_industries) + count($industries);
                                @endphp
                                @if ($count == 0)
                                    No data
                                @elseif($count > 1)
                                    @if (count($custom_industries) == 0)
                                        @php
                                            $id = $industries[0]->industry_id;
                                            $first_industry_name =
                                                DB::table('industries')
                                                    ->where('id', $id)
                                                    ->pluck('industry_name')[0] ?? '';
                                        @endphp
                                    @else
                                        @php
                                            $first_industry_name =
                                                DB::table('custom_inputs')
                                                    ->where('id', $custom_industries[0])
                                                    ->pluck('name')[0] ?? '';
                                        @endphp
                                    @endif
                                    {{ $first_industry_name }} +{{ $count - 1 }}
                                @else
                                    @if (count($custom_industries) == 0)
                                        {{ $industries[0]->industry->industry_name }}
                                    @else
                                        {{ DB::table('custom_inputs')->where('id', $custom_industries[0])->pluck('name')[0] ?? '' }}
                                    @endif
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
                                @php
                                    if (!is_null($opportunity->custom_functional_area_id)) {
                                        $custom_fun_areas = json_decode($opportunity->custom_functional_area_id);
                                    } else {
                                        $custom_fun_areas = [];
                                    }
                                    $count = count($custom_fun_areas) + count($fun_areas);
                                @endphp
                                @if ($count == 0)
                                    No data
                                @elseif($count > 1)
                                    @if (count($custom_fun_areas) == 0)
                                        @php
                                            $id = $fun_areas[0]->functional_area_id;
                                            $first_functional_area_name = DB::table('functional_areas')
                                                ->where('id', $id)
                                                ->pluck('area_name')[0];
                                        @endphp
                                    @else
                                        @php
                                            $first_functional_area_name =
                                                DB::table('custom_inputs')
                                                    ->where('id', $custom_fun_areas[0])
                                                    ->pluck('name')[0] ?? '';
                                        @endphp
                                    @endif
                                    {{ $first_functional_area_name }} +{{ $count - 1 }}
                                @else
                                    @if (count($custom_fun_areas) == 0)
                                        {{ $fun_areas[0]->industry->industry_name }}
                                    @else
                                        {{ DB::table('custom_inputs')->where('id', $custom_fun_areas[0])->pluck('name')[0] ?? '' }}
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Contract terms</p>
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
                                    {{ $first_job_type }} +{{ Count($job_types) - 1 }}
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
                            <p class="text-21 text-smoke pb-2">Full-time monthly salary</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between">
                            <p class="text-gray text-lg pl-4 pr-8 bg-gray-light3 py-2 position-detail-input-box-border">
                                {{ $opportunity->full_time_salary ?? ' - ' }}</p>
                            <p class="text-gray text-lg flex self-center">-</p>
                            <p class="text-gray text-lg pl-4 pr-8 bg-gray-light3 py-2 position-detail-input-box-border">
                                {{ $opportunity->full_time_salary_max ?? ' - ' }}</p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Part time daily rate</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between">
                            <p class="text-gray text-lg pl-4 pr-8 bg-gray-light3 py-2 position-detail-input-box-border">
                                {{ $opportunity->part_time_salary ?? ' - ' }}</p>
                            <p class="text-gray text-lg flex self-center">-</p>
                            <p class="text-gray text-lg pl-4 pr-8 bg-gray-light3 py-2 position-detail-input-box-border">
                                {{ $opportunity->part_time_salary_max ?? ' - ' }}</p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Freelance project fee per month</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between">
                            <p class="text-gray text-lg pl-4 pr-8 bg-gray-light3 py-2 position-detail-input-box-border">
                                {{ $opportunity->freelance_salary ?? ' - ' }}</p>
                            <p class="text-gray text-lg flex self-center">-</p>
                            <p class="text-gray text-lg pl-4 pr-8 bg-gray-light3 py-2 position-detail-input-box-border">
                                {{ $opportunity->freelance_salary_max ?? ' - ' }}</p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Position titles</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @php
                                    if (!is_null($opportunity->custom_position_title_id)) {
                                        $custom_job_titles = json_decode($opportunity->custom_position_title_id);
                                    } else {
                                        $custom_job_titles = [];
                                    }
                                    $count = count($custom_job_titles) + count($job_titles);
                                @endphp
                                @if ($count == 0)
                                    No data
                                @elseif($count > 1)
                                    @if (count($custom_job_titles) == 0)
                                        @php
                                            $id = $job_titles[0]->job_title_id;
                                            $first_job_title =
                                                DB::table('job_titles')
                                                    ->where('id', $id)
                                                    ->pluck('job_title')[0] ?? '';
                                        @endphp
                                    @else
                                        @php
                                            $first_job_title =
                                                DB::table('custom_inputs')
                                                    ->where('id', $custom_job_titles[0])
                                                    ->pluck('name')[0] ?? '';
                                        @endphp
                                    @endif
                                    {{ $first_job_title }} +{{ $count - 1 }}
                                @else
                                    @if (count($custom_job_titles) == 0)
                                        {{ $job_titles[0]->jobTitle->job_title }}
                                    @else
                                        {{ DB::table('custom_inputs')->where('id', $custom_job_titles[0])->pluck('name')[0] ?? '' }}
                                    @endif
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
                                @php
                                    if (!is_null($opportunity->custom_keyword_id)) {
                                        $custom_keywords = json_decode($opportunity->custom_keyword_id);
                                    } else {
                                        $custom_keywords = [];
                                    }
                                    $count = count($custom_keywords) + count($keywords);
                                @endphp
                                @if ($count == 0)
                                    No data
                                @elseif($count > 1)
                                    @if (count($custom_keywords) == 0)
                                        @php
                                            $id = $keywords[0]->keyword_id;
                                            $first_keyword = DB::table('keywords')
                                                ->where('id', $id)
                                                ->pluck('keyword_name')[0];
                                        @endphp
                                    @else
                                        @php
                                            $first_keyword =
                                                DB::table('custom_inputs')
                                                    ->where('id', $custom_keywords[0])
                                                    ->pluck('name')[0] ?? '';
                                        @endphp
                                    @endif
                                    {{ $first_keyword }} +{{ $count - 1 }}
                                @else
                                    @if (count($custom_keywords) == 0)
                                        {{ $keywords[0]->keyword->keyword_name ?? '' }}
                                    @else
                                        {{ DB::table('custom_inputs')->where('id', $custom_keywords[0])->pluck('name')[0] ?? '' }}
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Years - minimum years of relevant experience </p>
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
                                        <p class="text-gray text-lg px-4">
                                            {{ $laguage_usage->language->language_name ?? '' }}
                                        </p>
                                    </div>
                                    <div
                                        class="flex justify-center w-3/6 bg-gray-light3 py-2 position-detail-input-box-border">
                                        <p class="text-gray text-lg px-4">{{ $laguage_usage->level->level ?? '' }}</p>
                                    </div>
                                </div>

                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Software & tech knowledge</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray self-center text-lg pl-6">
                                @php
                                    if (!is_null($opportunity->custom_job_skills)) {
                                        $custom_skills = json_decode($opportunity->custom_job_skills);
                                    } else {
                                        $custom_skills = [];
                                    }
                                    $count = count($custom_skills) + count($job_skills);
                                @endphp
                                @if ($count == 0)
                                    No data
                                @elseif($count > 1)
                                    @if (count($custom_skills) == 0)
                                        @php
                                            $id = $job_skills[0]->job_skill_id;
                                            $first_skill = DB::table('job_skills')
                                                ->where('id', $id)
                                                ->pluck('job_skill')[0];
                                        @endphp
                                    @else
                                        @php
                                            $first_skill =
                                                DB::table('custom_inputs')
                                                    ->where('id', $custom_skills[0])
                                                    ->pluck('name')[0] ?? '';
                                        @endphp
                                    @endif
                                    {{ $first_skill }} +{{ $count - 1 }}
                                @else
                                    @if (count($custom_skills) == 0)
                                        {{ $job_skills[0]->skill->job_skill ?? '' }}
                                    @else
                                        {{ DB::table('custom_inputs')->where('id', $custom_skills[0])->pluck('name')[0] ?? '' }}
                                    @endif
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
                                    {{ $first_geo_name }} +{{ Count($geographicals) - 1 }}
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
                            <p class="text-21 text-smoke pb-2">Education level (minimum) </p>
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
                                @php
                                    if (!is_null($opportunity->custom_institution_id)) {
                                        $custom_institutions = json_decode($opportunity->custom_institution_id);
                                    } else {
                                        $custom_institutions = [];
                                    }
                                    $count = count($custom_institutions) + count($instituties);
                                @endphp
                                @if ($count == 0)
                                    No data
                                @elseif($count > 1)
                                    @if (count($custom_institutions) == 0)
                                        @php
                                            $id = $instituties[0]->institution_id;
                                            $first_institute = DB::table('institutions')
                                                ->where('id', $id)
                                                ->pluck('institution_name')[0];
                                        @endphp
                                    @else
                                        @php
                                            $first_institute =
                                                DB::table('custom_inputs')
                                                    ->where('id', $custom_institutions[0])
                                                    ->pluck('name')[0] ?? '';
                                        @endphp
                                    @endif
                                    {{ $first_institute }} +{{ $count - 1 }}
                                @else
                                    @if (count($custom_institutions) == 0)
                                        {{ $instituties[0]->institution->institution_name ?? '' }}
                                    @else
                                        {{ DB::table('custom_inputs')->where('id', $custom_institutions[0])->pluck('name')[0] ?? '' }}
                                    @endif
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
                                @php
                                    if (!is_null($opportunity->custom_field_study_id)) {
                                        $custom_fields = json_decode($opportunity->custom_field_study_id);
                                    } else {
                                        $custom_fields = [];
                                    }
                                    $count = count($custom_fields) + count($study_fields);
                                @endphp
                                @if ($count == 0)
                                    No data
                                @elseif($count > 1)
                                    @if (count($custom_fields) == 0)
                                        @php
                                            $id = $study_fields[0]->field_study_id;
                                            $first_field = DB::table('study_fields')
                                                ->where('id', $id)
                                                ->pluck('study_field_name')[0];
                                        @endphp
                                    @else
                                        @php
                                            $first_field =
                                                DB::table('custom_inputs')
                                                    ->where('id', $custom_fields[0])
                                                    ->pluck('name')[0] ?? '';
                                        @endphp
                                    @endif
                                    {{ $first_field }} +{{ $count - 1 }}
                                @else
                                    @if (count($custom_fields) == 0)
                                        {{ $study_fields[0]->studyField->study_field_name ?? '' }}
                                    @else
                                        {{ DB::table('custom_inputs')->where('id', $custom_fields[0])->pluck('name')[0] ?? '' }}
                                    @endif
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
                                @php
                                    if (!is_null($opportunity->custom_qualification_id)) {
                                        $custom_qualifications = json_decode($opportunity->custom_qualification_id);
                                    } else {
                                        $custom_qualifications = [];
                                    }
                                    $count = count($custom_qualifications) + count($qualifications);
                                @endphp
                                @if ($count == 0)
                                    No data
                                @elseif($count > 1)
                                    @if (count($custom_qualifications) == 0)
                                        @php
                                            $id = $qualifications[0]->qualification_id;
                                            $first_qualification = DB::table('qualifications')
                                                ->where('id', $id)
                                                ->pluck('qualification_name')[0];
                                        @endphp
                                    @else
                                        @php
                                            $first_qualification =
                                                DB::table('custom_inputs')
                                                    ->where('id', $custom_qualifications[0])
                                                    ->pluck('name')[0] ?? '';
                                        @endphp
                                    @endif
                                    {{ $first_qualification }} +{{ $count - 1 }}
                                @else
                                    @if (count($custom_qualifications) == 0)
                                        {{ $qualifications[0]->qualification->qualification_name ?? '' }}
                                    @else
                                        {{ DB::table('custom_inputs')->where('id', $custom_qualifications[0])->pluck('name')[0] ?? '' }}
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Key strengths desired</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @php
                                    if (!is_null($opportunity->custom_key_strength_id)) {
                                        $custom_keystrengths = json_decode($opportunity->custom_key_strength_id);
                                    } else {
                                        $custom_keystrengths = [];
                                    }
                                    
                                    $count = count($custom_keystrengths) + count($key_strengths);
                                @endphp
                                @if ($count == 0)
                                    No data
                                @elseif($count > 1)
                                    @if (count($custom_keystrengths) == 0)
                                        @php
                                            $id = $key_strengths[0]->key_strength_id;
                                            $first_keystrength = DB::table('key_strengths')
                                                ->where('id', $id)
                                                ->pluck('key_strength_name')[0];
                                        @endphp
                                    @else
                                        @php
                                            $first_keystrength =
                                                DB::table('custom_inputs')
                                                    ->where('id', $custom_keystrengths[0])
                                                    ->pluck('name')[0] ?? '';
                                        @endphp
                                    @endif
                                    {{ $first_keystrength }} +{{ $count - 1 }}
                                @else
                                    @if (count($custom_keystrengths) == 0)
                                        {{ $key_strengths[0]->keyStrength->key_strength_name ?? '' }}
                                    @else
                                        {{ DB::table('custom_inputs')->where('id', $custom_keystrengths[0])->pluck('name')[0] ?? '' }}
                                    @endif
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
                                    {{ $first_shift }} +{{ Count($job_shifts) - 1 }}
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
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Target companies</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @php
                                    if (!is_null($opportunity->custom_target_employer_id)) {
                                        $custom_employers = json_decode($opportunity->custom_target_employer_id);
                                    } else {
                                        $custom_employers = [];
                                    }
                                    $count = count($custom_employers) + count($target_employers);
                                @endphp
                                @if ($count == 0)
                                    No data
                                @elseif($count > 1)
                                    @if (count($custom_employers) == 0)
                                        @php
                                            $id = $target_employers[0]->target_employer_id;
                                            $first_employer = DB::table('target_companies')
                                                ->where('id', $id)
                                                ->pluck('company_name')[0];
                                        @endphp
                                    @else
                                        @php
                                            $first_employer =
                                                DB::table('custom_inputs')
                                                    ->where('id', $custom_employers[0])
                                                    ->pluck('name')[0] ?? '';
                                        @endphp
                                    @endif
                                    {{ $first_employer }} +{{ $count - 1 }}
                                @else
                                    @if (count($custom_employers) == 0)
                                        {{ $target_employers[0]->company->company_name ?? '' }}
                                    @else
                                        {{ DB::table('custom_inputs')->where('id', $custom_employers[0])->pluck('name')[0] ?? '' }}
                                    @endif
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
