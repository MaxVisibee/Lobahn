@extends('layouts.master')
@section('content')

    <div class="bg-gray-light2 postition-detail-content md:pt-40 pt-48 pb-32">
        <div class="bg-white py-12 md:px-10 px-4 rounded-md">
            <div class="lg:flex justify-between">
                <p class="lg:text-left text-center text-2xl text-gray uppercase font-book">
                    {{ $opportunity->title }}
                </p>
                <div class="md:flex lg:justify-start lg:mt-0 mt-4 justify-center md:gap-4">
                    <div class="flex justify-center">

                        <a href="{{ route('company.position.edit', $opportunity->id) }}"
                            class="uppercase focus:outline-none text-gray text-lg position-detail-edit-btn py-3 px-12">
                            Edit
                        </a>
                    </div>
                    <div class="flex justify-center">
                        <button type="button"
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
            <div class="grid md:grid-cols-2 gap-4">
                <div class="bg-gray-light3 rounded-lg">
                    <div class="">
                        <div class="flex justify-center pl-4 pr-8 py-2">
                            <p class="text-gray text-lg font-book">@if ($opportunity->description != null){{ $opportunity->description }}@else No Data @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class=" ">
                    @if ($opportunity->highlight_1 != null)
                        <div class="bg-gray-light3 mb-2 py-2 rounded-lg">
                            <div class="flex px-4">
                                <div class="text-lg flex">
                                    <p class="text-smoke mr-3">1.</p>
                                    <p class="text-gray">{{ $opportunity->highlight_1 }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($opportunity->highlight_2 != null)
                        <div class="bg-gray-light3 mb-2 py-2 rounded-lg">
                            <div class="px-4 ">
                                <div class="text-lg flex">
                                    <p class="text-smoke mr-3">2.</p>
                                    <p class="text-gray">{{ $opportunity->highlight_2 }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($opportunity->highlight_3 != null)
                        <div class="bg-gray-light3 py-2 rounded-lg">
                            <div class="flex px-4">
                                <div class="text-lg flex">
                                    <p class="text-smoke mr-3">3.</p>
                                    <p class="text-gray">{{ $opportunity->highlight_3 }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($opportunity->highlight_1 == null && $opportunity->highlight_2 == null && $opportunity->highlight_2 == null)

                        <div class="bg-gray-light3 py-2 rounded-lg">
                            <div class="flex px-4">
                                <div class="text-lg flex">
                                    <p class="text-gray">No Data</p>
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
            <div class="mt-8">
                <p class="text-21 text-smoke pb-2 font-book tracking-wider">Keywords</p>
            </div>
            <div class="flex flex-wrap gap-2 bg-gray-light3 rounded-lg py-4 pl-6">
                @forelse ($keyword_usages as $keyword_usage)
                    <div class="bg-gray-light1 rounded-2xl text-center px-2 mr-2">
                        <p class="text-gray-light3 text-sm">{{ $keyword_usage->keyword->keyword_name }}</p>
                    </div>
                @empty
                    No Data
                @endforelse
            </div>
            <div class="grid md:grid-cols-2 mt-8 gap-4">
                <div class="">
                    <p class="text-21 text-smoke pb-2 font-book tracking-wider">Expiry Date</p>
                    <div class="flex py-2 bg-gray-light3 rounded-lg">
                        <p class="text-gray text-lg pl-6"> {{ date('d M , Y', strtotime($opportunity->expire_date)) }}</p>
                    </div>
                </div>
                <div class="">
                    <p class="text-21 text-smoke pb-2 font-book tracking-wider">Status</p>
                    <div class="flex justify-between py-2 bg-gray-light3 rounded-lg">
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
            <div class="mt-8">
                <p class="text-21 text-smoke pb-4">Matching Factors</p>
            </div>
            <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-4">
                <div class="col-span-1">
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Company Name</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ $opportunity->company->company_name }}</p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Location</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->country_id)
                                    {{ $opportunity->country->country_name }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Contract terms</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->job_type_id)
                                    {{ $opportunity->jobType->job_type }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Target pay</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6 py-3">
                                @if ($opportunity->target_pay_id)
                                    {{ $opportunity->TargetPay->target_amount }}
                                @else No Data
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Contract hours</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->contract_hour_id)
                                    {{ $opportunity->jobShift->job_shift }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Keywords</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @forelse ($keyword_usages as $keyword_usage )
                                    {{ $keyword_usage->keyword_name }},
                                @empty
                                    No Data
                                @endforelse

                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Management level </p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->management_id)
                                    {{ $opportunity->carrier->carrier_level }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Years </p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->job_experience_id)
                                    {{ $opportunity->jobExperience->job_experience }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Education level </p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p style="word-break: break-all;" class="text-gray text-lg pl-6">
                                @if ($opportunity->degree_level_id)
                                    {{ $opportunity->degree->degree_name }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Academic institutions</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->institution_id)
                                    {{ $opportunity->institution->institution_name }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Languages</p>
                        </div>
                        <div class="md:w-6/12 ">
                            <div class="flex justify-between bg-gray-light3 py-2 rounded-lg">
                                <p class="text-gray text-lg pl-6">
                                    @if (count($laguage_usages) == 0)
                                        No Data
                                    @else
                                        Selected Language
                                    @endif
                                </p>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/plus.svg') }}" />
                            </div>
                            @foreach ($laguage_usages as $laguage_usage)
                                <div class="w-full md:flex justify-between gap-4 mt-2">
                                    <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                        <p class="text-gray text-lg xl:pl-6 pl-3">
                                            {{ $laguage_usage->language->language_name }}</p>
                                        <img class="object-contain self-center pr-4"
                                            src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                                    </div>
                                    <div class="md:w-2/4 flex justify-between">
                                        <div class="flex justify-between bg-gray-light3 py-2 rounded-lg">
                                            <p class="text-gray text-lg xl:pl-6 pl-3">
                                                {{ $laguage_usage->level }}
                                            </p>
                                            <img class="object-contain self-center pr-4"
                                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                                        </div>
                                        <div class="flex">
                                            <img class="object-contain self-center m-auto lg:pr-4"
                                                src="./img/corporate-menu/positiondetail/close.svg" />
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Geographical experience</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->geographical_id)
                                    {{ $opportunity->geographical->geographical_name }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">People management </p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->people_manangement != null)
                                    {{ $opportunity->people_manangement }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Software & tech knowledge</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray self-center text-lg pl-6">
                                @forelse ($skill_usages as $skill_usage )
                                    {{ $skill_usage->skill->job_skill }},
                                @empty
                                    No Data
                                @endforelse
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Fields of study</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->field_study_id != null)
                                    {{ $opportunity->studyField->study_field_name }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Qualifications</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->qualification_id != null)
                                    {{ $opportunity->qualification->qualification_name }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Key strengths</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->key_strnegth_id != null)
                                    {{ $opportunity->keyStrength->key_strength_name }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Position titles</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->job_title_id != null)
                                    {{ $opportunity->jobTitle->job_title }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Industry sectors</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->industry_id != null)
                                    {{ $opportunity->industry->industry_name }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Functional area</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->functional_area_id != null)
                                    {{ $opportunity->functionalArea->area_name }}
                                @else No Data
                                @endif
                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Desirable employers</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">
                                @if ($opportunity->target_employer_id != null)
                                    {{ $opportunity->targetEmployer->company_name }}
                                @else No Data
                                @endif

                            </p>
                            <img class="object-contain self-center pr-4"
                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
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
