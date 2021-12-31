@extends('layouts.master')
@section('content')

    <div class="bg-gray-light2 postition-detail-content md:pt-40 pt-48 pb-32">
        <div class="bg-white py-12 md:px-10 px-4">
            <div class="lg:flex justify-between">
                <p class="lg:text-left text-center text-2xl text-gray uppercase font-book">{{ isset($data->title)? $data->title:'-' }}
                </p>
                <div class="md:flex lg:justify-start lg:mt-0 mt-4 justify-center md:gap-4">
                    <div class="flex justify-center">
                        <a href="{{ route('company.position.edit', $data->id) }}">
                        <button type="button" class="
                        uppercase
                        focus:outline-none
                        text-gray text-lg
                        position-detail-edit-btn
                        py-4
                        w-32
                        ">
                            Edit
                        </button></a>
                    </div>
                    <div class="flex justify-center">
                        <a href="{{ url()->previous() }}"><button type="button" class="
                        uppercase
                        focus:outline-none
                        text-gray-light3 text-lg
                        position-detail-cancel-btn
                        py-4
                        w-32
                        ">
                        BacK
                        </button>
                    </a>
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
                            <p class="text-gray text-lg font-book">{!! isset($data->description) ? $data->description :'-' !!}</p>
                        </div>
                    </div>
                </div>
                <div class=" ">
                    <div class="bg-gray-light3 mb-2 py-2 rounded-lg">
                        <div class="flex px-4">
                            <div class="text-lg flex">
                                <p class="text-smoke mr-3">1.</p>
                                <p class="text-gray">{!! isset($data->highlight_1) ? $data->highlight_1 :'-' !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-light3 mb-2 py-2 rounded-lg">
                        <div class="px-4 ">
                            <div class="text-lg flex">
                                <p class="text-smoke mr-3">2.</p>
                                <p class="text-gray">{!! isset($data->highlight_2) ? $data->highlight_2 :'-' !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-light3 py-2 rounded-lg">
                        <div class="flex px-4">
                            <div class="text-lg flex">
                                <p class="text-smoke mr-3">3.</p>
                                <p class="text-gray">{!! isset($data->highlight_3) ? $data->highlight_3 :'-' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <p class="text-21 text-smoke pb-2 font-book tracking-wider">Keywords</p>
            </div>
            <div class="flex flex-wrap gap-2 bg-gray-light3 rounded-lg py-4 pl-6">
                @foreach($keywords as $id => $keyword)                          
                    <div class="bg-gray-light1 rounded-2xl text-center px-2 mr-2">
                    <p class="text-gray-light3 text-sm">{{ $keyword }}</p>
                </div>
                @endforeach
            </div>
            <div class="grid md:grid-cols-2 mt-8 gap-4">
                <div class="">
                    <p class="text-21 text-smoke pb-2 font-book tracking-wider">Expire Date</p>
                    <div class="flex py-2 bg-gray-light3 rounded-lg">
                        <p class="text-gray text-lg pl-6">{!! isset($data->expire_date) ? $data->expire_date :'-' !!}</p>
                    </div>
                </div>
                <div class="">
                    <p class="text-21 text-smoke pb-2 font-book tracking-wider">Status</p>
                    <div class="flex justify-between py-2 bg-gray-light3 rounded-lg">
                        <p class="text-gray text-lg pl-6">Open</p>
                        
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
                            <p class="text-gray text-lg pl-6">{{ isset($data->company_id) ? $data->company->name :'-' }}</p>
                        
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Country</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->country_id) ? $data->country->country_name :'-' }}</p>
                            
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Contract terms</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->job_type_id) ? $data->jobType->job_type :'-' }}</p>
                            
                        
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Target Pay</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->target_pay_id) ? $data->TargetPay->target_amount :'-' }}</p>
                            
                        
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Contract Hours</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->contract_hour_id) ? $data->jobShift->job_shift :'-' }}</p>
                            
                        
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Education Level</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->degree_level_id) ? $data->degree->degree_name :'-' }}</p>
                            
                        
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Gender</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->gender) ? $data->gender :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Management Level</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->carrier_level_id) ? $data->carrier->carrier_level :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Functional Area</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->functional_area_id) ? $data->functionalArea->area_name :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Job Title</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->job_title_id) ? $data->jobTitle->job_title :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Institutions</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->institution_id) ? $data->institution->institution_name :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Languages</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->language_id) ? $data->language->language_name :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Geographical Experience</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->geographical_id) ? $data->geographical->geographical_name :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">People Management</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->management_id) ? $data->management_id :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Fields of Study</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->field_study_id) ? $data->studyField->study_field_name :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Working Experience</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->job_experience_id) ? $data->jobExperience->job_experience :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Qualifications</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->qualification_id) ? $data->qualification->qualification_name :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Key Strengths</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->key_strnegth_id) ? $data->keyStrength->key_strength_name :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Speciality</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->specialist_id) ? $data->specialiaty->speciality_name :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Website Address</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->website_address) ? $data->website_address :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">No. of Position</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{{ isset($data->no_of_position) ? $data->no_of_position :'-' }}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2"><strong>Is Active ?</strong></p>
                        </div>
                        <div class="md:w-6/12 flex justify-between py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{!! isset($data->is_active) ? (($data->is_active) ? "<i class='fas fa-check-square'></i>" : '')  :'' !!}</p>
                            
                        
                        </div>
                    </div>

                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2"><strong>Is Subscribed ?</strong></p>
                        </div>
                        <div class="md:w-6/12 flex justify-between py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">{!! isset($data->is_subscribed) ? (($data->is_subscribed) ? "<i class='fas fa-check-square'></i>" : '')  :'' !!}</p>
                            
                        
                        </div>
                    </div>

                    <div class="mt-8">
                        <p class="text-21 text-smoke pb-2 font-book tracking-wider">Job Skill</p>
                    </div>
                    <div class="flex flex-wrap gap-2 bg-gray-light3 rounded-lg py-4 pl-6">
                        @foreach($job_skills as $id => $skill)                          
                                <div class="bg-gray-light1 rounded-2xl text-center px-2 mr-2">
                                    <p class="text-gray-light3 text-sm">{{ $skill }}</p>
                                </div>
                        @endforeach
                    </div>

                    
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
@endpush