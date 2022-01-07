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
    <li class="breadcrumb-item"><a href="javascript:;">Job Opportunity</a></li>
    <li class="breadcrumb-item active">Details</li>
  </ol>
  <!-- end breadcrumb -->

  <!-- begin page-header -->
  <h4 class="bold content-header"> JobOpportunity Management Details<small> </small></h4>
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
                {{--
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Id:</strong>
                        {{ isset($data->id)? $data->id:'' }}
                    </div>
                </div>
                --}}
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Title:</strong>
                        {{ isset($data->title)? $data->title:'-' }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Reference Code:</strong>
                        {{ isset($data->ref_no)? $data->ref_no:'-' }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Company:</strong>
                        {{ isset($data->company_id) ? $data->company->name :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <strong>Location:</strong>
                    @foreach ($data->locations as $location)
                        {{ $location->country_name ?? '-' }}

                        @if( !$loop->last)
                            ,
                        @endif
                    @endforeach
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Contract Term:</strong>
                        @foreach ($data->contractTerm as $location)
                            {{ $location->job_type ?? '-' }}

                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Contract Hour:</strong>
                        @foreach ($data->contractHour as $location)
                            {{ $location->job_shift ?? '-' }}
                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Contract Hour:</strong>
                        @foreach ($data->contractHour as $location)
                            {{ $location->job_shift ?? '-' }}
                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Keyword:</strong>                        
                        @foreach ($data->keywordUsage as $keyword)
                            {{ $keyword->keyword_name ?? '-' }}
                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Management Level:</strong>
                        {{ isset($data->management_level_id) ? $data->carrier->carrier_level :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Year:</strong>
                        {{ isset($data->job_experience_id) ? $data->jobExperience->job_experience:'-' }}
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
                        <strong>Academic Institutions:</strong>
                        @foreach ($data->instituteUsage as $keyword)
                            {{ $keyword->institution_name ?? '-' }}
                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Geographical:</strong>
                        @foreach ($data->geoUsage as $keyword)
                            {{ $keyword->geographical_name ?? '-' }}
                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>People Management::</strong>
                        {{ isset($data->people_manangement) ? $data->people_manangement :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Job Skill:</strong>
                        {{-- {{ isset($data->job_skill_id) ? $data->job_skill_id : '-' }} -->
                        @foreach($data->jobSkill as $skill)
                            {{ $skill->job_skill ?? '-' }}
                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                        --}}
                        @foreach($data->skills as $value => $skill)
                            {{ $skill->job_skill ?? ''}} @if (!$loop->last),@endif
                        @endforeach
                    </div>
                </div>

                 <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Field of Study:</strong>
                        @foreach ($data->studyUsage as $keyword)
                            {{ $keyword->study_field_name ?? '-' }}
                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Qualification:</strong>
                        @foreach ($data->qualifyUsage as $keyword)
                            {{ $keyword->qualification_name ?? '-' }}
                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Key Strengths:</strong>
                        @foreach ($data->strengthUsage as $keyword)
                            {{ $keyword->key_strength_name ?? '-' }}
                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Position Title:</strong>
                        @foreach ($data->jobPositions as $keyword)
                            {{ $keyword->job_title ?? '-' }}
                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Functions:</strong>
                        @foreach ($data->functionUsage as $keyword)
                            {{ $keyword->area_name ?? '-' }}
                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Speciality:</strong>
                        @foreach ($data->specialityUsage as $keyword)
                            {{ $keyword->speciality_name ?? '-' }}
                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>No. Of Position:</strong>
                        {{ isset($data->no_of_position) ? $data->no_of_position :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Gender:</strong>
                        {{ isset($data->gender)? $data->gender :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Website Address:</strong>
                        {{ isset($data->website_address) ? $data->website_address:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Listing Date:</strong>
                        {{ isset($data->listing_date) ? $data->listing_date:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Expire Date:</strong>
                        {{ isset($data->expire_date) ? $data->expire_date :'-' }}
                    </div>
                </div>
                
                {{-- 
                <div class="col-xs-12 col-sm-6 col-md-6">
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
                </div>
                --}} 
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Requirements:</strong>
                        {!! isset($data->requirement) ? $data->requirement :'-' !!}
                    </div>
                </div>
           </div>
           <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Benefits:</strong>
                        {!! isset($data->benefits) ? $data->benefits :'-' !!}
                    </div>
                </div>
           </div>
           <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>About Compnay:</strong>
                        {!! isset($data->about_compnay) ? $data->about_compnay :'-' !!}
                    </div>
                </div>
           </div>
           <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Description:</strong>
                        {!! isset($data->description) ? $data->description :'-' !!}
                    </div>
                </div>
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