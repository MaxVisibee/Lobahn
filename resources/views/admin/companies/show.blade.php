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
    <li class="breadcrumb-item"><a href="javascript:;">Company</a></li>
    <li class="breadcrumb-item active">Details</li>
  </ol>
  <!-- end breadcrumb -->

  <!-- begin page-header -->
  <h4 class="bold content-header">Company Management Details<small> </small></h4>
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
          <h4 class="panel-title"><!-- Job Company Managements --></h4>
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
                <div class="col-xs-12">
                    <div class="form-group">
                        <strong>Compnay Logo:</strong><br/>
                       <img class="" src='{{ asset("uploads/company_logo/$data->company_logo") }}' alt="{{ $data->company_name ?? '-' }}" width="150px" height="auto">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Company Name:</strong>
                        {{ isset($data->company_name)? $data->company_name:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Company CEO:</strong>
                        {{ isset($data->user_name)? $data->user_name:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Position Title:</strong>
                        {{ isset($data->position_title)? $data->position_title:'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Company Email:</strong>
                        {{ isset($data->email) ? $data->email :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Company Phone:</strong>
                        {{ isset($data->phone) ? $data->phone :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Website Address:</strong>
                        {{ isset($data->website_address) ? $data->website_address :'-' }}
                    </div>
                </div>                
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Main Industry:</strong>
                        {{ isset($data->industry_id) ? $data->industry->industry_name :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Main Sub Sector:</strong>
                        {{ isset($data->sub_sector_id) ? $data->subsector->sub_sector_name :'-' }}
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
                        <strong>No. Of Offices:</strong>
                        {{ isset($data->no_of_offices) ? $data->no_of_offices :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>No. of Employess:</strong>
                        {{ isset($data->no_of_employees) ? $data->no_of_employees :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Established In:</strong>
                        {{ isset($data->established_in) ? $data->established_in :'-' }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Facebook:</strong>
                        {{ isset($data->facebook) ? $data->facebook :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Instargram:</strong>
                        {{ isset($data->instagram) ? $data->instagram :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Twitter:</strong>
                        {{ isset($data->twitter) ? $data->twitter :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>LinkedIn:</strong>
                        {{ isset($data->linkedin) ? $data->linkedin :'-' }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Total Impressions:</strong>
                        {{ isset($data->total_impressions) ? $data->total_impressions :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Total Clicks:</strong>
                        {{ isset($data->total_clicks) ? $data->total_clicks :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Total Position Listings:</strong>
                        {{ isset($data->total_position_listings) ? $data->total_position_listings :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Total Received Profiles:</strong>
                        {{ isset($data->total_received_profiles) ? $data->total_received_profiles :'-' }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Total Shortlists:</strong>
                        {{ isset($data->total_shortlists) ? $data->total_shortlists :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Total Connections:</strong>
                        {{ isset($data->total_connections) ? $data->total_connections :'-' }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Preferred School:</strong>
                        {{ isset($data->preferred_school_id) ? $data->instituton->institution_name :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Payment Method:</strong>
                        {!! isset($data->payment_id) ? $data->payment->payment_name :'-' !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Package Name:</strong>
                        {!! isset($data->package_id) ? $data->package->package_title :'-' !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Target Employer:</strong>
                        {!! isset($data->target_employer_id) ? $data->seeker->name :'-' !!}
                    </div>
                </div>
                
                {{--
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Package Start Date:</strong>
                        {!! isset($data->package_start_date) ? $data->package_start_date->format('d/m/Y') :'-' !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Package End Date:</strong>
                        {!! isset($data->package_end_date) ? $data->package_end_date->format('d/m/Y') :'-' !!}
                    </div>
                </div>
                --}}
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Map:</strong>
                        {{ isset($data->map) ? $data->map :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>About Company:</strong>
                        {!! isset($data->description) ? $data->description :'-' !!}
                    </div>
                </div>
            </div>
                {{-- 
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Contract Term:</strong>
                        {{ isset($data->contract_term_id) ? $data->jobType->job_type :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Contract Hour:</strong>
                        {{ isset($data->contract_hour_id) ? $data->jobShift->job_shift :'-' }}
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
                        <strong>Degree Level:</strong>
                        {{ isset($data->education_level_id) ? $data->degree->degree_name :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Carrier Level:</strong>
                        {{ isset($data->carrier_level_id) ? $data->carrier->carrier_level :'-' }}
                    </div>
                </div>  
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Salary From:</strong>
                        {{ isset($data->min_salary) ? $data->min_salary :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Salary To:</strong>
                        {{ isset($data->max_salary) ? $data->max_salary :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>No. Of Employees:</strong>
                        {{ isset($data->no_of_employees) ? $data->no_of_employees :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Listing Date:</strong>
                        {{ isset($data->listing_date) ? $data->listing_date :'-' }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Expire Date:</strong>
                        {{ isset($data->expire_date) ? $data->expire_date :'-' }}
                    </div>
                </div>
                --}}          
        </div>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2></h2>
                </div>
                <div class="pull-right" style="margin-right: 10px;">
                    <a class="btn btn-warning" href="{{ route('companies.index') }}"> Back to Listing </a>
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