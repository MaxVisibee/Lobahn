@extends('admin.layouts.master')
@section('content')
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Job Opportunity</a></li>
        <li class="breadcrumb-item active">Details</li>
    </ol>
    <h4 class="bold content-header"> Job Opportunity Details<small> </small></h4>
    <div id="footer" class="footer" style="margin-left: 0px"></div>


    <!-- begin row -->
    <div class="row">
        <!-- begin col-12-->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <!-- Job Opportunity Managements -->
                    </h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                            data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                            data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                            data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Title:</strong>
                                {{ isset($data->title) ? $data->title : '-' }}
                            </div>
                            <div class="form-group">
                                <strong>Reference Code:</strong>
                                {{ isset($data->ref_no) ? $data->ref_no : '-' }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Listing Date:</strong>
                                {{ isset($data->listing_date) ? date('d M Y', strtotime($data->listing_date)) : '-' }}
                            </div>
                            <div class="form-group">
                                <strong>Expire Date:</strong>
                                {{ isset($data->expire_date) ? date('d M Y', strtotime($data->expire_date)) : '-' }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Company:</strong>
                                {{ isset($data->company_id) ? $data->company->name : '-' }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <strong>Location:</strong>
                            {{ $data->country->country_name ?? '' }}
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Position Title:</strong>
                                <ul class="mt-3">
                                    @foreach ($data->jobPositions as $keyword)
                                        <li>{{ $keyword->job_title ?? '-' }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Year of Experience:</strong>
                                {{ isset($data->job_experience_id) ? $data->jobExperience->job_experience : '-' }}
                            </div>
                            <div class="form-group">
                                <strong>Management Level:</strong>
                                {{ isset($data->carrier_level_id) ? $data->carrier->carrier_level : '-' }}
                            </div>
                            <div class="form-group">
                                <strong>People Management:</strong>
                                {{ isset($data->people_management) ? $data->peopleManagementLevel->level : '-' }}
                            </div>
                            <div class="form-group">
                                <strong>Education Level:</strong>
                                {{ isset($data->degree_level_id) ? $data->degree->degree_name : '-' }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Description:</strong>
                                <p class="mt-2">
                                    {!! isset($data->description) ? $data->description : '-' !!}
                                </p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Language:</strong>
                                <ul>
                                    @foreach ($data->languageUsage($data->id) as $id => $val)
                                        <li>{{ $val->Language->language_name ?? '' }} - {{ $val->level->level ?? '' }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Contract Term:</strong>
                                <ul class="mt-3">
                                    @foreach ($data->contractTerm as $location)
                                        <li>
                                            {{ $location->job_type ?? '-' }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Contract Hour:</strong>
                                <ul class="mt-3">
                                    {{-- {{ $data->contract_hour_id }} --}}
                                    @forelse ($data->contractHour as $job)
                                        <li>{{ $job->job_shift ?? '-' }}</li>
                                    @empty
                                        <li> No data </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Keyword:</strong>
                                <ul class="mt-3">
                                    @foreach ($data->keywordUsage as $keyword)
                                        <li>
                                            {{ $keyword->keyword_name ?? '-' }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Key Strengths:</strong>
                                <ul class="mt-3">
                                    @foreach ($data->strengthUsage as $keyword)
                                        <li>{{ $keyword->key_strength_name ?? '-' }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Academic Institutions:</strong>
                                <ul class="mt-3">
                                    @foreach ($data->instituteUsage as $keyword)
                                        <li>
                                            {{ $keyword->institution_name ?? '-' }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Geographical:</strong>
                                <ul class="mt-3">
                                    @foreach ($data->geoUsage as $keyword)
                                        <li>{{ $keyword->geographical_name ?? '-' }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Tech & Skill:</strong>
                                <ul class="mt-3">
                                    @foreach ($data->skills as $value => $skill)
                                        <li>{{ $skill->job_skill ?? '' }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Field of Study:</strong>
                                <ul class="mt-3">
                                    @php  $ids = json_decode($data->field_study_id);  @endphp
                                    @forelse ($ids as $id)
                                        <li>
                                            {{ DB::table('study_fields')->where('id', $id)->pluck('study_field_name')[0] ?? '' }}
                                        </li>
                                    @empty
                                        <li>No data</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Qualification:</strong>
                                <ul class="mt-3">
                                    @foreach ($data->qualifyUsage as $keyword)
                                        <li>{{ $keyword->qualification_name ?? '-' }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Functions:</strong>
                                <ul class="mt-3">
                                    @foreach ($data->functionUsage as $keyword)
                                        <li> {{ $keyword->area_name ?? '-' }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Target Companies:</strong>
                                @if (isset($data->target_employer_id))
                                    <ul class="mt-3">
                                        @foreach ($employers as $value)
                                            @if (in_array($value->id, json_decode($data->target_employer_id)))
                                                <li>{{ $value->company_name ?? '' }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    -
                                @endif
                            </div>
                        </div>


                        {{-- <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Expire Date:</strong>
                                {{ isset($data->expire_date) ? $data->expire_date : '-' }}
                                <br>

                            </div>
                        </div> --}}

                        {{-- <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Functional Area:</strong>
                        {{ isset($data->functional_area_id) ? $data->functionalArea->area_name :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Salary From:</strong>
                        {{ isset($data->salary_from) ? $data->salary_from :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Salary To:</strong>
                        {{ isset($data->salary_to) ? $data->salary_to :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Salary Currency:</strong>
                        {{ isset($data->salary_currency) ? $data->salary_currency :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Lanuguages:</strong>
                        {{ isset($data->language_id) ? $data->language->language_name:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Industry Name:</strong>
                        {{ isset($data->industry_id) ? $data->industry->industry_name:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Sub Sector:</strong>
                        {{ isset($data->sub_sector_id) ? $data->subSector->sub_sector_name:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Payment Type:</strong>
                        {{ isset($data->payment_id) ? $data->payment->payment_name:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Package Type:</strong>
                        {{ isset($data->package_id) ? $data->package->package_title:'-' }}
                    </div>
                </div>               
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Package Start Date:</strong>
                        {{ isset($data->package_start_date) ? $data->package_start_date:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Package End Date:</strong>
                        {{ isset($data->package_end_date) ? $data->package_end_date:'-' }}
                    </div>
                </div> --}}
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2></h2>
                        </div>
                        <div class="pull-right" style="margin-right: 10px;">
                            <a class="btn btn-warning" href="{{ route('opportunities.index') }}"> Back to Listing </a>
                        </div>
                    </div>
                </div><br />
                <!-- end panel-body -->
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
    </div>
    <!-- end row -->
    <!--   </div> -->
    <!-- end #content -->
    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
            class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
@endsection
