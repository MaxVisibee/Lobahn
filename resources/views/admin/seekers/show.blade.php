@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <div class="main-body">
            <!-- Breadcrumb -->
            <ol class="breadcrumb float-xl-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('seekers.index') }}">Candidate</a></li>
                <li class="breadcrumb-item active">Candidate Profile</li>
            </ol>
            <!-- /Breadcrumb -->
            <h4 class="bold content-header mb-5"> Candidate Profile</h4>
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if ($data->image)
                                    <img class="rounded-circle" width="150"
                                        src='{{ asset("uploads/profile_photos/$data->image") }}'>
                                @else
                                    <img class="rounded-circle" width="150"
                                        src="{{ asset('uploads/profile_photos/profile-big.jpg') }}" alt="Admin">
                                @endif
                                <div class="mt-3">
                                    <h4>{{ isset($data->name) ? $data->name : '-' }}</h4>
                                    <p class="text-secondary mb-1">
                                        @if (count($data->specialities) > 0)
                                            @foreach ($data->specialities as $speciality)
                                                {{ $speciality->speciality_name }}
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @endif
                                    </p>
                                    {{-- <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <h6 class="d-flex align-items-center mx-3 my-4">
                            <i class="material-icons text-info mr-2">assignment</i> Personal Details
                        </h6>
                    </div>
                    <div class="card mt-1">
                        <ul class="list-group list-group-flush">
                            {{-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"> National ID</h6>
                                <span class="text-secondary">{{ isset($data->nric) ? $data->nric : 'no data' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"> Gender</h6>
                                <span class="text-secondary">{{ isset($data->gender) ? $data->gender : 'no data' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"> Date of Birth</h6>
                                <span class="text-secondary">
                                    {{ isset($data->dob) ? Carbon\Carbon::parse($data->dob)->format('d-m-Y') : 'no data' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"> Martial Status</h6>
                                <span
                                    class="text-secondary">{{ isset($data->marital_status) ? $data->marital_status : 'no data' }}</span>
                            </li> --}}
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"> About</h6>
                                <p class="mt-3">{{ isset($data->remark) ? $data->remark : 'no data' }}
                                </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"> Highlight</h6>
                                <p class="mt-3">
                                <ul>
                                    @if (isset($data->highlight_1))
                                        <li>
                                            {{ $data->highlight_1 }}
                                        </li>
                                    @endif
                                    @if (isset($data->highlight_2))
                                        <li>
                                            {{ $data->highlight_2 }}
                                        </li>
                                    @endif
                                    @if (isset($data->highlight_3))
                                        <li>
                                            {{ $data->highlight_3 }}
                                        </li>
                                    @endif
                                </ul>
                                </p>
                            </li>
                            <ul>
                                <button onclick="window.location='{{ route('seekers.index') }}'"
                                    class="btn btn-primary my-5 float-right mr-3"> Back to listing</button>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-1">
                        <div class="card-body">
                            <h6 class="d-flex align-items-center mt-2"><i
                                    class="material-icons text-info mr-2">assignment</i>Account Detail</h6>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ isset($data->name) ? $data->name : 'no data' }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">User Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ isset($data->user_name) ? $data->user_name : 'no data' }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ isset($data->email) ? $data->email : 'no data' }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ isset($data->phone) ? $data->phone : 'no data' }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Membership</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if ($data->is_fatured)
                                        Premium
                                    @elseif($data->is_trial)
                                        Free Trial
                                    @else
                                        Standard
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Joined</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ date('M d, Y', strtotime($data->created_at)) }}
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <div class="col-sm-12 mb-1">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mt-2"><i
                                            class="material-icons text-info mr-2">assignment</i>Matching Factors</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12  mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(1) Position Title</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (count($data->JobTitles) > 0)
                                                        @foreach ($data->JobTitles as $job_title)
                                                            <li>{{ $job_title->job_title }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(2) Specialists</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (count($data->specialities) > 0)
                                                        @foreach ($data->specialities as $speciality)
                                                            <li>{{ $speciality->speciality_name }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(3) Location:</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (count($data->countries) > 0)
                                                        @foreach ($data->countries as $country)
                                                            <li>{{ $country->country_name }}</li>
                                                        @endforeach
                                                    @else
                                                        <li> no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(4) Geographical Experience</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (isset($data->geographical_id))
                                                        @foreach ($data->geographicals as $geo)
                                                            <li>{{ $geo->geographical_name }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(5) Target Salary</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    <li>{{ isset($data->target_pay_id) ? $data->targetPay->target_amount : 'no data' }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(6) Languages</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (count($data->languageUsage) > 0)
                                                        @foreach ($data->languages as $language)
                                                            <li>{{ $language->language_name }}
                                                                -
                                                                {{ $language->pivot->level }} </li>
                                                        @endforeach
                                                    @else
                                                        <li>no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(7) Contract Term:</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (isset($data->contract_term_id))
                                                        @foreach ($data->jobTypes as $job_type)
                                                            <li>{{ $job_type->job_type }}</li>
                                                        @endforeach
                                                    @else
                                                        <li> no data </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(8) Contract Hour</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (isset($data->contract_hour_id))
                                                        @foreach ($data->contractHours as $job_shift)
                                                            <li>{{ $job_shift->job_shift }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(9) Management Level</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    <li>{{ isset($data->management_level_id) ? $data->carrier->carrier_level : 'no data' }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(10) Year of Experience</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    <li>{{ isset($data->experience_id) ? $data->jobExperience->job_experience : 'no data' }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(11) Education Level</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    <li>{{ isset($data->education_level_id) ? $data->degree->degree_name : 'no data' }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(12) Academic Institutions</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (isset($data->institution_id))
                                                        @foreach ($data->institutions as $institute)
                                                            <li>{{ $institute->institution_name }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(13) Keywords</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (isset($data->keyword_id))
                                                        @foreach ($data->keywords as $keyword)
                                                            <span
                                                                class="badge badge-info mx-1 my-1">{{ $keyword->keyword_name }}</span>
                                                        @endforeach
                                                    @else
                                                        <li>no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(14) Key Strength</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (isset($data->key_strength_id))
                                                        @foreach ($data->keyStrengths as $strength)
                                                            <span
                                                                class="badge badge-info mx-1 my-1">{{ $strength->key_strength_name }}</span>
                                                        @endforeach
                                                    @else
                                                        <li>no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(15) Field Of Study</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (isset($data->field_study_id))
                                                        @foreach ($data->studyFields as $study)
                                                            <li>{{ $study->study_field_name }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(16) Software & Tech knowledge</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (isset($data->skill_id))
                                                        @foreach ($data->jobSkills as $job_skill)
                                                            <li>{{ $job_skill->job_skill }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(17) Industry</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (isset($data->industry_id))
                                                        @foreach ($data->industries as $industry)
                                                            <li>{{ $industry->industry_name }}</li>
                                                        @endforeach
                                                    @else
                                                        <li> no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(18) Qualification</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (isset($data->qualification_id))
                                                        @foreach ($data->qualifications as $qualification)
                                                            <li>{{ $qualification->qualification_name }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(19) Functional Area</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (isset($data->functional_area_id))
                                                        @foreach ($data->functionalAreas as $functional)
                                                            <li>{{ $functional->area_name }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">(20) Target Employer</h6>
                                            <div class="col-sm-12 mt-3 text-secondary">
                                                <ul>
                                                    @if (count($data->targetEmployers) > 0)
                                                        @foreach ($data->targetEmployers as $targetEmployer)
                                                            <li>{{ $targetEmployer->company->company_name }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>no data</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('css')
    <style>
        .badge {
            font-size: .75rem;
        }

    </style>
@endpush
