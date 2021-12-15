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
                        <strong>Father Name:</strong>
                        {{ isset($data->father_name) ? $data->father_name :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>DOB:</strong>
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
                        <strong>Martial Status:</strong>
                        {{ isset($data->marital_status) ? $data->marital_status :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Nationality:</strong>
                        {{ isset($data->nationality) ? $data->nationality :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>NRIC:</strong>
                        {{ isset($data->nric) ? $data->nric :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Country:</strong>
                        {{ isset($data->country_id) ? $data->country->country_name :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Area:</strong>
                        {{ isset($data->area_id) ? $data->area->area_name :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>District:</strong>
                        {{ isset($data->district_id) ? $data->district->district_name :'-' }}
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
                        <strong>Mobile Phone:</strong>
                        {{ isset($data->mobile_phone)? $data->mobile_phone:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Industry:</strong>
                        {{ isset($data->industry_id)? $data->industry->industry_name:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Sub Sector:</strong>
                        {{ isset($data->sub_sector_id)? $data->subsector->sub_sector_name:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Position Title:</strong>
                        {{ isset($data->position_title_id)? $data->jobTitle->job_title:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Job Experience:</strong>
                        {{ isset($data->experience_id)? $data->jobExperience->job_experience:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Contract Term:</strong>
                        {{ isset($data->contract_term_id)? $data->jobType->job_type:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Contract Hour:</strong>
                        {{ isset($data->contract_hour_id)? $data->jobShift->job_shift:'-' }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Keywords:</strong>
                        {{ isset($data->keyword_id) ? $data->keyword->keyword_name :'-' }}
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
                        <strong>Experience:</strong>
                        {{ isset($data->experience_id) ? $data->jobExperience->job_experience :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Geographical Experience:</strong>
                        {!! isset($data->geographical_id) ? $data->geographical->geographical_name :'-' !!}
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
                        <strong>Software & Tech knowledge:</strong>
                        {!! isset($data->skill_id) ? $data->jobSkill->job_skill :'-' !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Qualification:</strong>
                        {!! isset($data->qualification_id) ? $data->qualification->qualification_name :'-' !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Key Strength:</strong>
                        {!! isset($data->key_strength_id) ? $data->keyStrength->key_strength_name :'-' !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Position Title:</strong>
                        {!! isset($data->position_title_id) ? $data->jobTitle->job_title :'-' !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Functions:</strong>
                        {!! isset($data->position_title_id) ? $data->jobTitle->job_title :'-' !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Specialists:</strong>
                        {!! isset($data->speciality_id) ? $data->speciality->speciality_name :'-' !!}
                    </div>
                </div>


                
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Lanuguage :</strong>
                        {{ isset($data->language_id)? $data->language->language_name :'-' }}
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Current Salary:</strong>
                        {{ isset($data->current_salary)? $data->current_salary:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Expected Salary:</strong>
                        {{ isset($data->expected_salary)? $data->expected_salary:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Address:</strong>
                        {{ isset($data->street_address)? $data->street_address:'-' }}
                    </div>
                </div>               
           </div>

           <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Profile Photo:</strong><br/>
                       <img class="" src='{{ asset("uploads/profile_photos/$data->image") }}' alt="{{ $data->title ?? '-' }}" width="150px" height="auto" style="margin-top: 10px;">
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