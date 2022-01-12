@extends('admin.layouts.master')
<!-- begin #page-loader -->
  <!-- <div id="page-loader" class="fade show">
    <div class="material-loader">
      <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
      </svg>
      <div class="message">Loading...</div>
    </div>
  </div> -->
<!-- end #page-loader -->
@section('content')
<!-- begin #content -->
<!-- <div id="content" class="content"> -->
  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Seeker</a></li>
    <li class="breadcrumb-item active">Details</li>
  </ol>
  <!-- end breadcrumb -->

  <!-- begin page-header -->
  <h4 class="bold content-header"> Seeker Management Details<small> </small></h4>
  <div id="footer" class="footer" style="margin-left: 0px"></div>
  <div class="row m-b-10">
    
  </div
   
  <!-- end page-header -->
  <!-- begin row -->
  <div class="row">
    <!-- begin col-12-->
    <div class="col-xl-12">
      <!-- begin panel -->
      <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading">
          <h4 class="panel-title"><!-- Job Opportunity Managements --></h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
          </div>
        </div>
        <!-- end panel-heading -->
        <!-- begin panel-body -->
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Profile Photo:</strong><br/>
                       <img class="" src='{{ asset("uploads/profile_photos/$data->image") }}' alt="{{ $data->title ?? '-' }}" width="150px" height="auto" style="margin-top: 10px;">
                    </div>
                </div>
           </div>

           <div class="row">
                
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ isset($data->name)? $data->name:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>User Name:</strong>
                        {{ isset($data->user_name)? $data->user_name:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ isset($data->email) ? $data->email :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Phone:</strong>
                        {{ isset($data->phone)? $data->phone:'-' }}
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Date of Birth:</strong>
                        {{ isset($data->dob) ?  Carbon\Carbon::parse($data->dob)->format('d-m-Y') : '-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Gender:</strong>
                        {{ isset($data->gender) ? $data->gender :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Natinonal ID:</strong>
                        {{ isset($data->nric) ? $data->nric :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Martial Status:</strong>
                        {{ isset($data->marital_status) ? $data->marital_status :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group m-b-15">
                        <strong>Description :</strong>
                        <div class="pl-3">
                            {!! $data->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group m-b-15">
                        <strong>HighLight :</strong> 
                        <div class="pl-3">
                            {!! $data->highlight_1? $data->highlight_1.'<br>':'' !!}
                            {!! $data->highlight_2? $data->highlight_2.'<br>':'' !!}
                            {{$data->highlight_3}}
                        </div>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Location:</strong> <br>
                        @if(isset($data->country_id))
                            @foreach($data->countries as $country)
                                <span class="badge badge-info">{{$country->country_name}}</span>
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Contract Term:</strong> <br>
                        @if(isset($data->contract_term_id))
                            @foreach($data->jobTypes as $job_type)
                                <span class="badge badge-info">{{$job_type->job_type}}</span>
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Target Pay:</strong>
                        {{ isset($data->target_pay_id)? $data->targetPay->target_amount:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Contract Hour:</strong> <br>
                        @if(isset($data->contract_hour_id))
                            @foreach($data->contractHours as $job_shift)
                                <span class="badge badge-info">{{$job_shift->job_shift}}</span>
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Keywords:</strong> <br>
                        @if(isset($data->keyword_id))
                            @foreach($data->keywords as $keyword)
                                <span class="badge badge-info">{{$keyword->keyword_name}}</span>
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Managements Level:</strong>
                        {{ isset($data->management_level_id) ? $data->carrier->carrier_level :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Years:</strong>
                        {{ isset($data->experience_id)? $data->jobExperience->job_experience:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Education Level:</strong>
                        {{ isset($data->education_level_id) ? $data->degree->degree_name :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Academic Institutions:</strong> <br>
                        @if(isset($data->institution_id))
                            @foreach($data->institutions as $institute)
                                <span class="badge badge-info">{{$institute->institution_name}}</span>
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Lanuguage :</strong> <br>
                        @if(isset($data->language_id))
                            @foreach($data->languages as $language)
                                <span class="badge badge-info">{{$language->language_name}} - {{$language->pivot->level}}</span>
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Geographical Experience:</strong> <br>
                        @if(isset($data->geographical_id))
                            @foreach($data->geographicals as $geo)
                                <span class="badge badge-info">{{$geo->geographical_name}}</span>
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>People Management:</strong>
                        {!! isset($data->people_management_id) ? $data->people_management_id :'-' !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Software & Tech knowledge:</strong> <br>
                        @if(isset($data->skill_id))
                            @foreach($data->jobSkills as $job_skill)
                                <span class="badge badge-info">{{$job_skill->job_skill}}</span>
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Field Of Study:</strong> <br>
                        @if(isset($data->field_study_id))
                            {{-- @foreach($data->studyFields as $study)
                                <span class="badge badge-info">{{$study->study_field_name}}</span>
                            @endforeach --}}
                            @foreach($study_fields as $study)
                                @if(in_array($study->id, json_decode($data->field_study_id)))
                                <span class="badge badge-info">{{$study->study_field_name}}</span>
                                @endif
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Qualification:</strong> <br>
                        @if(isset($data->qualification_id))
                            @foreach($data->qualifications as $qualification)
                                <span class="badge badge-info">{{$qualification->qualification_name}}</span>
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Key Strength:</strong> <br>
                        @if(isset($data->key_strength_id))
                            @foreach($data->keyStrengths as $strength)
                                <span class="badge badge-info">{{$strength->key_strength_name}}</span>
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Position Title:</strong> <br>
                        @if(isset($data->position_title_id))
                            @foreach($data->JobTitles as $job_title)
                                <span class="badge badge-info">{{$job_title->job_title}}</span>
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Industry:</strong> <br>
                        @if(isset($data->industry_id))
                            @foreach($data->industries as $industry)
                                <span class="badge badge-info">{{$industry->industry_name}}</span>
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Sub Sector:</strong> <br>
                        @if(isset($data->sub_sector_id))
                            @foreach($data->subsectors as $sector)
                                <span class="badge badge-info">{{$sector->sub_sector_name}}</span>
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Functions:</strong> <br>
                        @if(isset($data->functional_area_id))
                            @foreach($data->functionalAreas as $functional)
                                <span class="badge badge-info">{{$functional->area_name}}</span>
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Specialists:</strong> <br>
                        @if(isset($data->specialist_id))
                            {{-- @foreach($data->specialities as $speciality)
                                <span class="badge badge-info">{{$speciality->speciality_name}}</span>
                            @endforeach --}}
                            @foreach($specialities as $speciality)
                                @if(in_array($speciality->id, json_decode($data->specialist_id)))
                                <span class="badge badge-info">{{$speciality->speciality_name}}</span>
                                @endif
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Target Employer:</strong> <br>
                        @if(isset($data->target_employer_id))
                            @foreach($companies as $employer)
                                @if(in_array($employer->id, json_decode($data->target_employer_id)))
                                    <span class="badge badge-info">{{$employer->company_name}}</span>
                                @endif
                            @endforeach
                        @else
                        -
                        @endif
                    </div>
                </div>
                

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Num of Opportunities Presented:</strong>
                        {{ isset($data->num_opportunities_presented)? $data->num_opportunities_presented:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Num of Sent Profiles:</strong>
                        {{ isset($data->num_sent_profiles)? $data->num_sent_profiles:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Num of Profile Views:</strong>
                        {{ isset($data->num_profile_views)? $data->num_profile_views:'-' }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Num of Short Lists:</strong>
                        {{ isset($data->num_shortlists)? $data->num_shortlists:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Num of Connections:</strong>
                        {{ isset($data->num_connections)? $data->num_connections:'-' }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Remarks:</strong>
                        {{ isset($data->remark)? $data->remark:'-' }}
                    </div>
                </div>
                              
           </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2></h2>
                </div>
                <div class="pull-right" style="margin-right: 10px;">
                    <a class="btn btn-warning" href="{{ route('seekers.index') }}"> Back to Listing </a>
                </div>
            </div>
        </div><br/>
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
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
  <!-- end scroll to top btn -->
</div>
  <!-- end page container -->
@endsection

@push('css')
<style>
    .badge {
        font-size: .75rem;
    }
</style>
@endpush