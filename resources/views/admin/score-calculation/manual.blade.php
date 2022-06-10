@extends('admin.layouts.master')

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">JSR Score Calculation</li>
    </ol>
    <!-- end breadcrumb -->
    {{-- begin page-header --}}
    <h4 class="bold content-header">JSR Score Calculation<small> </small></h4>
    <hr class="mt-0">
    {{-- end page-header --}}

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Calculation</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                            data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                            data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                            data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <!-- end panel-heading -->

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <!-- begin panel-body -->
                <div class="panel-body">
                    <form action="{{ route('score-calculation-manual-result') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 my-4">
                                <h4>Talent</h4>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 my-4">
                                <h4>Opportunity</h4>
                            </div>

                            <!-- Locations -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Location</strong>
                                    <select name="talent_location_id" class="form-control location_id">
                                        <option value="">Select</option>
                                        @foreach ($countries as $id => $country)
                                            <option value="{{ $id }}">
                                                {{ $country->country_name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Location</strong>
                                    <select name="opportunity_location_id" class="form-control location_id">
                                        <option value="">Select</option>
                                        @foreach ($countries as $id => $country)
                                            <option value="{{ $id }}">
                                                {{ $country->country_name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Job Types Pay -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong> Contract Terms</strong>
                                    <select id="talent_job_types" name="talent_job_type_id[]"
                                        class="form-control job_type_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($job_types as $id => $job_type)
                                            <option value="{{ $id }}">
                                                {{ $job_type ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong> Contract Terms</strong>
                                    <select id="opportunity_job_types" name="opportunity_job_type_id[]"
                                        class="form-control job_type_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($job_types as $id => $job_type)
                                            <option value="{{ $id }}">
                                                {{ $job_type ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Target Pay -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <section class="fulltime-section hide">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group m-b-15">
                                                <strong>Full Time Salary</strong>
                                                <input type="number" name="talent_full_time_salary" id="full_time_salary"
                                                    class="form-control" value="{{ old('full_time_salary') }}"
                                                    placeholder="0.00">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="parttime-section hide">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group m-b-15">
                                                <strong>Part Time Salary</strong>
                                                <input type="number" name="talent_part_time_salary" id="part_time_salary"
                                                    class="form-control" value="{{ old('part_time_salary') }}"
                                                    placeholder="0.00">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="freelance-section hide">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group m-b-15">
                                                <strong>Freelance Salary</strong>
                                                <input type="number" name="talent_freelance_salary" id="freelance_salary"
                                                    class="form-control" value="{{ old('freelance_salary') }}"
                                                    placeholder="0.00">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <section class="opportunity-fulltime-section hide">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group m-b-15">
                                                <strong>Full Time Salary:min</strong>
                                                <input type="number" name="opportunity_full_time_salary"
                                                    id="full_time_salary" class="form-control"
                                                    value="{{ old('full_time_salary') }}" placeholder="0.00">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group m-b-15">
                                                <strong>Full Time Salary:max</strong>
                                                <input type="number" name="opportunity_full_time_salary_max"
                                                    id="full_time_salary_max" class="form-control"
                                                    value="{{ old('full_time_salary_max') }}" placeholder="0.00">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="opportunity-parttime-section hide">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group m-b-15">
                                                <strong>Part Time Salary:min</strong>
                                                <input type="number" name="opportunity_part_time_salary"
                                                    id="part_time_salary" class="form-control"
                                                    value="{{ old('part_time_salary') }}" placeholder="0.00">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group m-b-15">
                                                <strong>Part Time Salary:max</strong>
                                                <input type="number" name="opportunity_part_time_salary_max"
                                                    id="part_time_salary_max" class="form-control"
                                                    value="{{ old('part_time_salary_max') }}" placeholder="0.00">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="opportunity-freelance-section hide">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group m-b-15">
                                                <strong>Freelance Salary:min</strong>
                                                <input type="number" name="opportunity_freelance_salary"
                                                    id="freelance_salary" class="form-control"
                                                    value="{{ old('freelance_salary') }}" placeholder="0.00">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group m-b-15">
                                                <strong>Freelance Salary:max</strong>
                                                <input type="number" name="opportunity_freelance_salary_max"
                                                    id="freelance_salary_max" class="form-control"
                                                    value="{{ old('freelance_salary_max') }}" placeholder="0.00">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <!-- Contract Hour -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Contract Hour</strong>
                                    <select id="talent_contract_hour_id" name="talent_contract_hour_id[]"
                                        class="form-control contract_hour_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($job_shifts as $id => $job_shift)
                                            <option value="{{ $id }}">
                                                {{ $job_shift ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Contract Hour</strong>
                                    <select id="opportunity_contract_hour_id" name="opportunity_contract_hour_id[]"
                                        class="form-control contract_hour_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($job_shifts as $id => $job_shift)
                                            <option value="{{ $id }}">
                                                {{ $job_shift ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Keywords -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Keywords</strong>
                                    <select id="talent_keyword_id" name="talent_keyword_id[]"
                                        class="form-control keyword_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($keywords as $id => $keyword)
                                            <option value="{{ $id }}">
                                                {{ $keyword ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Keywords</strong>
                                    <select id="opportunity_keyword_id" name="opportunity_keyword_id[]"
                                        class="form-control keyword_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($keywords as $id => $keyword)
                                            <option value="{{ $id }}">
                                                {{ $keyword ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- management level -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Management Level</strong>
                                    <select id="talent_carrier_level_id" name="talent_carrier_level_id"
                                        class="form-control carrier_level_id">
                                        <option value="">Select</option>
                                        @foreach ($carriers as $id => $carrier)
                                            <option value="{{ $id }}">
                                                {{ $carrier ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Management Level</strong>
                                    <select id="opportunity_carrier_level_id" name="opportunity_carrier_level_id"
                                        class="form-control carrier_level_id">
                                        <option value="">Select</option>
                                        @foreach ($carriers as $id => $carrier)
                                            <option value="{{ $id }}">
                                                {{ $carrier ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- years -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Years of Experience</strong>
                                    <select id="talent_job_experience_id" name="talent_job_experience_id"
                                        class="form-control job_experience_id">
                                        <option value="">Select</option>
                                        @foreach ($job_exps as $id => $job_exp)
                                            <option value="{{ $id }}">
                                                {{ $job_exp ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Years of Experience</strong>
                                    <select id="opportunity_job_experience_id" name="opportunity_job_experience_id"
                                        class="form-control job_experience_id">
                                        <option value="">Select</option>
                                        @foreach ($job_exps as $id => $job_exp)
                                            <option value="{{ $id }}">
                                                {{ $job_exp ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Education -->
                            <div class="col-xs-12 col-sm-6 col-md-6 custom-form">
                                <div class="form-group">
                                    <strong>Education Level</strong>
                                    <select id="talent_degree_level_id" name="talent_degree_level_id"
                                        class="form-control degree_level_id">
                                        <option value="">Select</option>
                                        @foreach ($degrees as $id => $degree)
                                            <option value="{{ $id }}">
                                                {{ $degree ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 custom-form">
                                <div class="form-group">
                                    <strong>Education Level</strong>
                                    <select id="opportunity_degree_level_id" name="opportunity_degree_level_id"
                                        class="form-control degree_level_id">
                                        <option value="">Select</option>
                                        @foreach ($degrees as $id => $degree)
                                            <option value="{{ $id }}">
                                                {{ $degree ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Institution -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Academic Institutions</strong>
                                    <select id="talent_institution_id" name="talent_institution_id[]"
                                        class="form-control institution_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($institutions as $id => $insti)
                                            <option value="{{ $id }}">
                                                {{ $insti ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Academic Institutions</strong>
                                    <select id="opportuntity_institution_id" name="opportunity_institution_id[]"
                                        class="form-control institution_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($institutions as $id => $insti)
                                            <option value="{{ $id }}">
                                                {{ $insti ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Georophical Experience -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Geographical Experience</strong>
                                    <select id="talent_geographical_id" name="talent_geographical_id[]"
                                        class="form-control geographical_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($geographicals as $id => $geo)
                                            <option value="{{ $id }}">
                                                {{ $geo ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Geographical Experience</strong>
                                    <select id="opportunity_geographical_id" name="opportunity_geographical_id[]"
                                        class="form-control geographical_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($geographicals as $id => $geo)
                                            <option value="{{ $id }}">
                                                {{ $geo ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- People Management -->
                            <div class="col-xs-12 col-sm-6 col-md-6 custom-form">
                                <div class="form-group">
                                    <strong>People Mangement</strong>
                                    <select id="talent_people_management_id" name="talent_people_management_id"
                                        class="form-control degree_level_id">
                                        <option value="">Select</option>
                                        @foreach ($peopleManagementLevel as $id => $level)
                                            <option value="{{ $id }}">
                                                {{ $level ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 custom-form">
                                <div class="form-group">
                                    <strong>People Mangement</strong>
                                    <select id="opportunity_people_management_id" name="opportunity_people_management_id"
                                        class="form-control degree_level_id">
                                        <option value="">Select</option>
                                        @foreach ($peopleManagementLevel as $id => $level)
                                            <option value="{{ $id }}">
                                                {{ $level ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Skill -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Software & tech knowledge</strong>
                                    <select id="talent_job_skill_id" name="talent_job_skill_id[]"
                                        class="form-control job_skill_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($job_skills as $id => $skill)
                                            <option value="{{ $id }}">
                                                {{ $skill ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Software & tech knowledge</strong>
                                    <select id="opportunity_job_skill_id" name="opportunity_job_skill_id[]"
                                        class="form-control job_skill_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($job_skills as $id => $skill)
                                            <option value="{{ $id }}">
                                                {{ $skill ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Field of study -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Field of Study</strong>
                                    <select id="talent_field_id" name="talent_field_id[]" class="form-control" multiple>
                                        <option value="">Select</option>
                                        @foreach ($study_fields as $id => $study_field_name)
                                            <option value="{{ $id }}">
                                                {{ $study_field_name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Field of Study</strong>
                                    <select id="opportunity_field_id" name="opportunity_field_id[]" class="form-control"
                                        multiple>
                                        <option value="">Select</option>
                                        @foreach ($study_fields as $id => $study_field_name)
                                            <option value="{{ $id }}">
                                                {{ $study_field_name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Qualification -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Qualifications</strong>
                                    <select id="talent_qualification_id" name="talent_qualification_id[]"
                                        class="form-control qualification_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($qualifications as $id => $qualify)
                                            <option value="{{ $id }}">
                                                {{ $qualify ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Qualifications</strong>
                                    <select id="opportunity_qualification_id" name="opportunity_qualification_id[]"
                                        class="form-control qualification_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($qualifications as $id => $qualify)
                                            <option value="{{ $id }}">
                                                {{ $qualify ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Key Strength -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Key Strengths</strong>
                                    <select id="talent_key_strength_id" name="talent_key_strength_id[]"
                                        class="form-control key_strength_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($key_strengths as $id => $key)
                                            <option value="{{ $id }}">
                                                {{ $key ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Key Strengths</strong>
                                    <select id="opportunity_key_strength_id" name="opportunity_key_strength_id[]"
                                        class="form-control key_strength_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($key_strengths as $id => $key)
                                            <option value="{{ $id }}">
                                                {{ $key ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Posoition Title -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Position Title</strong>
                                    <select id="talent_job_title_id" name="talent_job_title_id[]"
                                        class="form-control job_title_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($job_titles as $id => $job_title)
                                            <option value="{{ $id }}">
                                                {{ $job_title ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Position Title</strong>
                                    <select id="opportunity_job_title_id" name="opportunity_job_title_id[]"
                                        class="form-control job_title_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($job_titles as $id => $job_title)
                                            <option value="{{ $id }}">
                                                {{ $job_title ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Industry -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Industry</strong>
                                    <select id="talent_industry_id" name="talent_industry_id[]"
                                        class="form-control industry_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($industries as $id => $indu)
                                            <option value="{{ $id }}">
                                                {{ $indu ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Industry</strong>
                                    <select id="opportunity_industry_id" name="opportunity_industry_id[]"
                                        class="form-control industry_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($industries as $id => $indu)
                                            <option value="{{ $id }}">
                                                {{ $indu ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Function -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Functions</strong>
                                    <select id="talent_functional_area_id" name="talent_functional_area_id[]"
                                        class="form-control functional_area_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($fun_areas as $id => $fun_area)
                                            <option value="{{ $id }}">
                                                {{ $fun_area ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Functions</strong>
                                    <select id="opportunity_functional_area_id" name="opportunity_functional_area_id[]"
                                        class="form-control functional_area_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($fun_areas as $id => $fun_area)
                                            <option value="{{ $id }}">
                                                {{ $fun_area ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Target Employer -->
                            {{-- <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Target Employer</strong>
                                    <select id="talent_target_employer" name="talent_target_employer[]"
                                        class="form-control functional_area_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($target_employers as $id => $employer)
                                            <option value="{{ $id }}">
                                                {{ $employer ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Target Employer</strong>
                                    <select id="opportunity_target_employer" name="opportunity_target_employer[]"
                                        class="form-control functional_area_id" multiple>
                                        <option value="">Select</option>
                                        @foreach ($target_employers as $id => $employer)
                                            <option value="{{ $id }}">
                                                {{ $employer ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}




                        </div>
                        <button class="btn btn-primary">Calculate</button>
                    </form>


                    <div class="row">
                        <div class="col-md-12" id="calculation-result">
                            <p></p>
                            <p></p>
                        </div>
                    </div>

                    <!-- end panel-body -->
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-10 -->
        </div>
        <!-- end row -->
    @endsection

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#talent_job_types').select2({
                    placeholder: "Select Job Types"
                });
                $('#opportunity_job_types').select2({
                    placeholder: "Select Job Types"
                });
                $('#talent_contract_hour_id').select2({
                    placeholder: "Select Job Hours"
                });
                $('#opportunity_contract_hour_id').select2({
                    placeholder: "Select Job Hours"
                });
                $('#talent_keyword_id').select2({
                    placeholder: "Select Keywords"
                });
                $('#opportunity_keyword_id').select2({
                    placeholder: "Select Keywords"
                });
                $('#talent_institution_id').select2({
                    placeholder: "Select Institutions"
                });
                $('#opportuntity_institution_id').select2({
                    placeholder: "Select Institutions"
                });
                $('#talent_geographical_id').select2({
                    placeholder: "Select Experience"
                });
                $('#opportunity_geographical_id').select2({
                    placeholder: "Select Experience"
                });
                $('#talent_job_skill_id').select2({
                    placeholder: "Select Skill"
                });
                $('#opportunity_job_skill_id').select2({
                    placeholder: "Select Skill"
                });
                $('#talent_field_id').select2({
                    placeholder: "Select Field"
                });
                $('#opportunity_field_id').select2({
                    placeholder: "Select Field"
                });
                $('#talent_qualification_id').select2({
                    placeholder: "Select Qualification"
                });
                $('#opportunity_qualification_id').select2({
                    placeholder: "Select Qualification"
                });
                $('#talent_key_strength_id').select2({
                    placeholder: "Select Key Strength"
                });
                $('#opportunity_key_strength_id').select2({
                    placeholder: "Select Key Strength"
                });

                $('#talent_job_title_id').select2({
                    placeholder: "Select Position Title"
                });
                $('#opportunity_job_title_id').select2({
                    placeholder: "Select Position Title"
                });
                $('#talent_industry_id').select2({
                    placeholder: "Select Industry"
                });
                $('#opportunity_industry_id').select2({
                    placeholder: "Select Industry"
                });
                $('#talent_functional_area_id').select2({
                    placeholder: "Select Area"
                });
                $('#opportunity_functional_area_id').select2({
                    placeholder: "Select Area"
                });
                $('#talent_target_employer').select2({
                    placeholder: "Select Employer"
                });
                $('#opportunity_target_employer').select2({
                    placeholder: "Select Employer"
                });











            });
        </script>
        <script>
            $("#talent_job_types").on('change', function() {
                $(".fulltime-section").addClass('hide');
                $(".parttime-section").addClass('hide');
                $(".freelance-section").addClass('hide');
                var jobType = $('#talent_job_types').val();
                console.log(jobType);
                if (jobType.includes("1") || jobType.includes("2")) {
                    $(".fulltime-section").removeClass('hide');
                }
                if (jobType.includes("3")) {
                    $(".parttime-section").removeClass('hide');
                }
                if (jobType.includes("4")) {
                    $(".freelance-section").removeClass('hide');
                }
            });

            $("#opportunity_job_types").on('change', function() {
                $(".opportunity-fulltime-section").addClass('hide');
                $(".opportunity-parttime-section").addClass('hide');
                $(".opportunity-freelance-section").addClass('hide');
                var jobType = $('#opportunity_job_types').val();
                console.log(jobType);
                if (jobType.includes("1") || jobType.includes("2")) {
                    $(".opportunity-fulltime-section").removeClass('hide');
                }
                if (jobType.includes("3")) {
                    $(".opportunity-parttime-section").removeClass('hide');
                }
                if (jobType.includes("4")) {
                    $(".opportunity-freelance-section").removeClass('hide');
                }
            });
        </script>
    @endpush
