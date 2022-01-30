@extends('layouts.master')
@section('content')
    <div class="bg-gray-light2 postition-detail-content md:pt-40 pt-48 pb-32">
        <div class="bg-white py-12 md:px-10 px-4 rounded-md">
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
                            <p class="text-gray text-lg font-book">{{ $opportunity->description ?? '' }}</p>
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
                    <div class="">
                        <p class="text-21 text-smoke pb-4">Matching Factors</p>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Position location</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($countries) == 0) no data
                                @elseif(count($countries) > 3) {{ Count($countries) }} Selected
                                @else
                                    @foreach ($countries as $country)
                                        {{ $country->country->country_name }} ,
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
                                @if (count($industries) == 0) no data
                                @elseif(count($industries) > 3) {{ Count($industries) }} Selected
                                @else
                                    @foreach ($industries as $industrie)
                                        {{ $industrie->industry->industry_name }} ,
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <div class="text-21 text-smoke pb-2">Sub-sectors</div>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                            <div class="text-gray text-lg pl-6 flex self-center">
                                @if (count($sub_sectors) == 0) No Data
                                @elseif(count($sub_sectors) > 3) {{ Count($sub_sectors) }} Selected
                                @else
                                    @foreach ($sub_sectors as $sub_sector)
                                        {{ $sub_sector->subsector->sub_sector_name }} @if (!$loop->last) , @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Functional area</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($fun_areas) == 0) no data
                                @elseif(count($fun_areas) > 3) {{ Count($fun_areas) }} Selected
                                @else
                                    @foreach ($fun_areas as $fun_area)
                                        {{ $fun_area->functionalArea->area_name }} ,
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
                                @if (count($job_types) == 0) no data
                                @elseif(count($job_types) > 3) {{ Count($job_types) }} Selected
                                @else
                                    @foreach ($job_types as $job_type)
                                        {{ $job_type->type->job_type }} ,
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
                                {{ $opportunity->salary_from ?? '' }}</p>
                            <p class="text-gray text-lg flex self-center">-</p>
                            <p class="text-gray text-lg pl-4 pr-8 bg-gray-light3 py-2 position-detail-input-box-border">
                                {{ $opportunity->salary_to ?? '' }}</p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Position titles</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($job_titles) == 0) no data
                                @elseif(count($job_titles) > 3) {{ Count($job_titles) }} Selected
                                @else
                                    @foreach ($job_titles as $job_title)
                                        {{ $job_title->jobTitle->job_title }} ,
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
                                @if (count($keywords) == 0) no data
                                @elseif(count($keywords) > 3) {{ Count($keywords) }} Selected
                                @else
                                    @foreach ($keywords as $keyword)
                                        {{ $keyword->keyword->keyword_name }} ,
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
                                @else no data
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
                                @if ($opportunity->management_id != null)
                                    {{ $opportunity->carrier->carrier_level }}
                                @else no data
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
                                    {{ $opportunity->peopleManagementLevel->level }}
                                @else no data
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
                                        <p class="text-gray text-lg px-4">{{ $laguage_usage->level }}</p>
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
                                @if (count($job_skills) == 0) no data
                                @elseif(count($job_skills) > 3) {{ Count($job_skills) }} Selected
                                @else
                                    @foreach ($job_skills as $job_skill)
                                        {{ $job_skill->skill->job_skill }} ,
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
                                @if (count($geographicals) == 0) no data
                                @elseif(count($geographicals) > 3) {{ Count($geographicals) }} Selected
                                @else
                                    @foreach ($geographicals as $geographical)
                                        {{ $geographical->geographical->geographical_name }} ,
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
                                @else no data
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
                                @if (count($instituties) == 0) no data
                                @elseif(count($instituties) > 3) {{ Count($instituties) }} Selected
                                @else
                                    @foreach ($instituties as $institutie)
                                        {{ $institutie->institution->institution_name }} ,
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
                                @if (count($study_fields) == 0) no data
                                @elseif(count($study_fields) > 3) {{ Count($study_fields) }} Selected
                                @else
                                    @foreach ($study_fields as $study_field)
                                        {{ $study_field->studyField->study_field_name }} ,
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
                                @if (count($qualifications) == 0) no data
                                @elseif(count($qualifications) > 3) {{ Count($qualifications) }} Selected
                                @else
                                    @foreach ($qualifications as $study_field)
                                        {{ $study_field->qualification->qualification_name }} ,
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
                                @if (count($key_strengths) == 0) no data
                                @elseif(count($key_strengths) > 3) {{ Count($key_strengths) }} Selected
                                @else
                                    @foreach ($key_strengths as $key_strength)
                                        {{ $key_strength->keyStrength->key_strength_name }} ,
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
                                @if (count($job_shifts) == 0) no data
                                @elseif(count($job_shifts) > 3) {{ Count($job_shifts) }} Selected
                                @else
                                    @foreach ($job_shifts as $job_shift)
                                        {{ $job_shift->jobShift->job_shift }} ,
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <!-- Specialties -->
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Specialties</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($specialties) == 0) no data
                                @elseif(count($specialties) > 3) {{ Count($specialties) }} Selected
                                @else
                                    @foreach ($specialties as $id => $specialty)
                                        {{ $specialty->speciality->speciality_name ?? '' }},
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Target employers</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                            <p class="text-gray text-lg pl-6">
                                @if (count($target_employers) == 0) no data
                                @elseif(count($target_employers) > 3) {{ Count($target_employers) }} Selected
                                @else
                                    @foreach ($target_employers as $target_employer)
                                        {{ $target_employer->company->company_name ?? '' }} ,
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
@endpush
