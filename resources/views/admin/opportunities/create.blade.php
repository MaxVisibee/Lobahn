    @extends('admin.layouts.master')

@section('content')

<!-- begin #content -->
<!-- <div id="content" class="content"> -->
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Job Opportunity</a></li>
    <li class="breadcrumb-item active">Create New Job Opportunity</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="page-header">Create New Job Opportunity</h4>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-xl-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <h4 class="panel-title"><!-- Create New Job Opportunity --></h4>
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
            <form name="jobForm" id="jobForm" method="POST" action="{{ route('opportunities.store') }}">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group row m-b-15">
                                    <strong>Title<span class="text-danger">*</span>:</strong>
                                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" placeholder="Title">
                                </div>
                            </div>                            
                            <div class="col-xs-12 col-sm-6 col-md-6 custom-form">
                                <div class="form-group">
                                    <strong>Country</strong>
                                    <select id="country_id" name="country_id" class="default-select2 form-control country_id">
                                        <option value="">Select</option>
                                        @foreach($countries as $id => $country)                          
                                            <option value="{{ $country->id }}" data-grade="{{ $countries }}">
                                                {{ $country->country_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 custom-form">
                                <div class="form-group">
                                    <strong>Education Level</strong>
                                    <select id="degree_level_id" name="degree_level_id" class="form-control degree_level_id">
                                        <option value="">Select</option>
                                        @foreach($degrees as $id => $degree)                          
                                            <option value="{{ $degree->id }}" data-grade="{{ $degrees }}">
                                                {{ $degree->degree_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            {{-- 
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Distric</strong>
                                    <select id="district_id" name="district_id" class="form-control district_id">
                                        <option value="">Select</option>
                                        @foreach($districts as $id => $district)                          
                                            <option value="{{ $district->id }}" data-grade="{{ $districts }}">
                                                {{ $district->district_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Address</strong>
                                    <input type="text" name="address" id="address" class="form-control" value="{{old('address')}}" placeholder="Address">                                                
                                </div>
                            </div>
                             --}}
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Management Level</strong>
                                    <select id="carrier_level_id" name="carrier_level_id" class="form-control carrier_level_id">
                                        <option value="">Select</option>
                                        @foreach($carriers as $id => $carrier)                          
                                            <option value="{{ $carrier->id }}" data-grade="{{ $carriers }}">
                                                {{ $carrier->carrier_level ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Functional Area</strong>
                                    <select id="functional_area_id" name="functional_area_id" class="form-control functional_area_id">
                                        <option value="">Select</option>
                                        @foreach($fun_areas as $id => $fun_area)                          
                                            <option value="{{ $fun_area->id }}" data-grade="{{ $fun_areas }}">
                                                {{ $fun_area->area_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Keywords</strong>
                                    <select id="keyword_id" name="keyword_id" class="form-control keyword_id">
                                        <option value="">Select</option>
                                        @foreach($keywords as $id => $keyword)                          
                                            <option value="{{ $keyword->id }}" data-grade="{{ $keywords }}">
                                                {{ $keyword->keyword_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Institutions</strong>
                                    <select id="institution_id" name="institution_id" class="form-control institution_id">
                                        <option value="">Select</option>
                                        @foreach($institutions as $id => $insti)                          
                                            <option value="{{ $insti->id }}" data-grade="{{ $institutions }}">
                                                {{ $insti->institution_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Languages</strong>
                                    <select id="language_id" name="language_id" class="form-control language_id">
                                        <option value="">Select</option>
                                        @foreach($languages as $id => $language)                          
                                            <option value="{{ $language->id }}" data-grade="{{ $languages }}">
                                                {{ $language->language_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Geographical</strong>
                                    <select id="geographical_id" name="geographical_id" class="form-control geographical_id">
                                        <option value="">Select</option>
                                        @foreach($geographicals as $id => $geo)                          
                                            <option value="{{ $geo->id }}" data-grade="{{ $geographicals }}">
                                                {{ $geo->geographical_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>People Management:</strong>
                                    {!! Form::select('management_id', MiscHelper::getNumEmployees(), null, array('placeholder' => 'Select People Management','class' => 'form-control','id'=>'management_id')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Field of Study</strong>
                                    <select id="field_study_id" name="field_study_id" class="form-control field_study_id">
                                        <option value="">Select</option>
                                        @foreach($study_fields as $id => $field)                          
                                            <option value="{{ $field->id }}" data-grade="{{ $study_fields }}">
                                                {{ $field->study_field_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Qualifications</strong>
                                    <select id="qualification_id" name="qualification_id" class="form-control qualification_id">
                                        <option value="">Select</option>
                                        @foreach($qualifications as $id => $qualify)                          
                                            <option value="{{ $qualify->id }}" data-grade="{{ $qualifications }}">
                                                {{ $qualify->qualification_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Key Strengths</strong>
                                    <select id="key_strnegth_id" name="key_strnegth_id" class="form-control key_strnegth_id">
                                        <option value="">Select</option>
                                        @foreach($key_strengths as $id => $key)                          
                                            <option value="{{ $key->id }}" data-grade="{{ $key_strengths }}">
                                                {{ $key->key_strength_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Industry</strong>
                                    <select id="industry_id" name="industry_id" class="form-control industry_id">
                                        <option value="">Select</option>
                                        @foreach($industries as $id => $indu)                          
                                            <option value="{{ $indu->id }}" data-grade="{{ $industries }}">
                                                {{ $indu->industry_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Sub Sector</strong>
                                    <select id="sub_sector_id" name="sub_sector_id" class="form-control sub_sector_id">
                                        <option value="">Select</option>
                                        @foreach($sectors as $id => $sect)                          
                                            <option value="{{ $sect->id }}" data-grade="{{ $sectors }}">
                                                {{ $sect->sub_sector_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Speciality</strong>
                                    <select id="specialist_id" name="specialist_id" class="form-control specialist_id">
                                        <option value="">Select</option>
                                        @foreach($specialities as $id => $special)                          
                                            <option value="{{ $special->id }}" data-grade="{{ $specialities }}">
                                                {{ $special->speciality_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>Website Address:</strong>
                                    <input type="text" name="website_address" id="website_address" class="form-control" value="{{old('website_address')}}" placeholder="Website Address">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>No. of Position:</strong>
                                    <input type="text" name="no_of_position" id="no_of_position" class="form-control" value="{{old('no_of_position')}}" placeholder="No. of Position">
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Listing Date :</strong>                                    
                                    <div class="input-group date" id="datepicker-disabled-past" data-date-format="yyyy-mm-dd" data-date-start-date="Date.default">
                                        <input type="text" class="form-control listing_date datepicker" placeholder="Select Date" name="listing_date" />
                                        <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Expire Date :</strong>                                    
                                    <div class="input-group date" id="datepicker-disabled-past" data-date-format="yyyy-mm-dd" data-date-start-date="Date.default">
                                        <input type="text" class="form-control expire_date datepicker" placeholder="Select Date" name="expire_date" />
                                        <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Target Pay:</strong>
                                    {!! Form::select('target_pay_id', $target_pays, null, array('placeholder' => 'Select Target Pay','class' => 'form-control','id'=>'target_pay_id')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Target Employer :</strong>
                                    <select id="target_employer_id" name="target_employer_id" class="form-control target_employer_id">
                                        <option value="">Select</option>
                                        @foreach($companies as $id => $company)                          
                                            <option value="{{ $company->id }}" data-grade="{{ $companies }}">
                                                {{ $company->company_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>      
                                </div>
                            </div>

                            {{-- <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>Salary From:</strong>
                                    <input type="text" name="salary_from" id="salary_from" class="form-control" value="{{old('salary_from')}}" placeholder="Salary From">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>Salary To:</strong>
                                    <input type="text" name="salary_to" id="salary_to" class="form-control" value="{{old('salary_to')}}" placeholder="Salary To">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>Salary Currecny:</strong>
                                    <input type="text" name="salary_currency" id="salary_currency" class="form-control" value="{{old('salary_currency')}}" placeholder="Salary Currecny">
                                </div>
                            </div> --}}
                            <div class="col-xs-12 col-sm-6 col-md-6">
                            </div>
                            <!-- <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>Slug:</strong>
                                    <input type="text" name="slug" id="slug" class="form-control" value="{{old('slug')}}" placeholder="Slug">
                                </div>
                            </div> -->

                            <!-- <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group row m-b-15">
                                    <strong> <input type="checkbox" name="hide_salary" id="hide_salary" value="0">Hide Salary</strong>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group row m-b-15">
                                    <strong> <input type="checkbox" name="is_freelance" id="is_freelance" value="0">Freelance</strong>
                                </div>
                            </div> -->                            
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group row m-b-15">
                                    <strong> <input type="checkbox" name="is_active" id="is_active" value="1" checked> Is Active?</strong>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group row m-b-15">
                                    <strong> <input type="checkbox" name="is_subscribed" id="is_subscribed" value="1" checked> Is Subscribed?</strong>
                                </div>
                            </div>                           

                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Requirements :</strong>
                                    <textarea id="requirement" name="requirement" class="form-control ckeditor"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Benefits :</strong>
                                    <textarea id="benefits" name="benefits" class="form-control ckeditor"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>About Company :</strong>
                                    <textarea id="about_company" name="about_company" class="form-control ckeditor"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Descriptions :</strong>
                                    <textarea id="description" name="description" class="form-control ckeditor"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Company</strong>
                                    <select id="company_id" name="company_id" class="form-control company_id">
                                        <option value="">Select</option>
                                        @foreach($companies as $id => $company)                          
                                            <option value="{{ $company->id }}" data-grade="{{ $companies }}">
                                                {{ $company->company_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Gender :</strong>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Male/Female">Male/Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Job Title</strong>
                                    <select id="job_title_id" name="job_title_id" class="form-control job_title_id">
                                        <option value="">Select</option>
                                        @foreach($job_titles as $id => $job_title)                          
                                            <option value="{{ $job_title->id }}" data-grade="{{ $job_titles }}">
                                                {{ $job_title->job_title ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong> Contract Terms</strong>
                                    <select id="job_type_id" name="job_type_id" class="form-control job_type_id">
                                        <option value="">Select</option>
                                        @foreach($job_types as $id => $job_type)                          
                                            <option value="{{ $job_type->id }}" data-grade="{{ $job_types }}">
                                                {{ $job_type->job_type ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Contract Hour</strong>
                                    <select id="contract_hour_id" name="contract_hour_id" class="form-control contract_hour_id">
                                        <option value="">Select</option>
                                        @foreach($job_shifts as $id => $job_shift)                          
                                            <option value="{{ $id }}" data-grade="{{ $job_shifts }}">
                                                {{ $job_shift->job_shift ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Working Experience</strong>
                                    <select id="job_experience_id" name="job_experience_id" class="form-control job_experience_id">
                                        <option value="">Select</option>
                                        @foreach($job_exps as $id => $job_exp)                          
                                            <option value="{{ $job_exp->id }}" data-grade="{{ $job_exps }}">
                                                {{ $job_exp->job_experience ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            

                            <div class="accordion w-100" id="accordionExample">
                              <div class="card">
                                <div class="card-header" id="headingOne" style="background-color: #f2f4f5;">
                                  <label>Job Skill :</label>
                                  <input type="text" class="form-control recipe_search" id="skill_filter" placeholder="search"></input>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                  <div class="card-body">
                                    @foreach($job_skills as $key => $skill)
                                      <div class="jobSkill">
                                      <input type="checkbox" class="" id="job_skill_id-{{$key}}" name="job_skill_id[]" value="{{$skill->id}}"> 
                                      <label class="form-check-label" for="job_skill_id-{{$key}}">{{ $skill->job_skill ?? ''}}</label> <br>
                                    </div>
                                    @endforeach
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                    </div>
                </div>                
                <br/>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                        </div>
                        <div class="pull-right" style="margin-right: 7px;">
                            <a class="btn btn-warning" href="{{ route('opportunities.index') }}">Back to Listing</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
                <br/>
            </form>
        </div>
        <!-- end panel-body -->
    </div>
</div>

@endsection

<!-- add new js file -->
@push('scripts')
<!-- summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $("#").summernote({
        height: 200,
        tabsize: 4
    });
</script>
<!-- summernote -->
<script>
    $(document).ready(function() {
        $("#skill_filter").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            console.log(value);
            $(".jobSkill ").each(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<!-- <script>
    $("#country_id").on('change', function() {
        var country = $("#country_id").val();
        $.ajax({
            url: "../opportunities/countries/"+country,
            type: "GET",
            success: function(data) {                
                $('#area_id').html("<option value=''>Select</option>");
                data.areas.forEach(function(item, index) {
                    $('#area_id').append(
                        '<option value="'+item.id+'">'+item.text+'</option>'
                    );
                });
            }
        });           
    });
    $("#area_id").on('change', function() {
        var area = $("#area_id").val();
        $.ajax({
            url: "../opportunities/areas/"+area,
            type: "GET",
            success: function(data) {                
                $('#district_id').html("<option value=''>Select</option>");
                data.districts.forEach(function(item, index) {
                    $('#district_id').append(
                        '<option value="'+item.id+'">'+item.text+'</option>'
                    );
                });
            }
        });           
    });
</script> -->

<script>
$(function() {
    $('#country_id').select2({placeholder:"Select Country"});
    $('#area_id').select2({placeholder:"Select Area"});
    $('#district_id').select2({placeholder:"Select District"});
    $('#industry_id').select2({placeholder:"Select Industry"});
    $('#sub_sector_id').select2({placeholder:"Select Sub Sector"});
    $('#job_title_id').select2({placeholder:"Select Position Title"});
    $('#keyword_id').select2({placeholder:"Select Keywords"});
    $('#job_type_id').select2({placeholder:"Select Contrarct Term"});
    $('#contract_hour_id').select2({placeholder:"Select Contrarct Hour"});
    $('#carrier_level_id').select2({placeholder:"Select Management Levels"});
    $('#job_experience_id').select2({placeholder:"Select Experiences"});
    $('#degree_level_id').select2({placeholder:"Select Education Levels"});
    $('#institution_id').select2({placeholder:"Select Preferred Schools"});
    $('#language_id').select2({placeholder:"Select Languages"});
    $('#geographical_id').select2({placeholder:"Select Geographical Experiences"});
    $('#qualification_id').select2({placeholder:"Select Qualifications"});
    $('#field_study_id').select2({placeholder:"Select Field Of Study"});
    $('#key_strnegth_id').select2({placeholder:"Select Key Strength"});
    $('#functional_area_id').select2({placeholder:"Select Functional Areas"});
    $('#specialist_id').select2({placeholder:"Select Specialists"});
    $('#target_pay_id').select2({placeholder:"Select Target Pay"});
    $('#company_id').select2({placeholder:"Select Company"});

    $('#industry_id').on('change', function () {
        filterSectors();
    });

    $('#country_id').on('change', function () {
        filterStates();
    });
   
    $(document).on('change', '#area_id', function () {
        filterCities();
    });
});

function filterStates(){
    var country_id = $('#country_id').val();
    if (country_id != '') {
        $.ajax({
            type:'get',
            url:"{{ route('filter.states') }}",
            data:{
                country_id:country_id
            },
            success:function(response){
                if(response.status == 200) {
                    $("#area_id").empty();

                    $("#area_id").select2({
                        placeholder: "Select Area...",
                        data: response.data,
                    });
                    var first_val = response.data[0].id;
                    
                    $("#area_id").select2({first_val}).trigger('change');
                }
            }
        });
    }
}

function filterCities(){
    var area_id = $('#area_id').val();
    if (area_id != '') {
        $.ajax({
            type:'get',
            url:"{{ route('filter.cities') }}",
            data:{
                area_id:area_id
            },
            success:function(response){
                if(response.status == 200) {
                    $("#district_id").empty();

                    $("#district_id").select2({
                        placeholder: "Select District...",
                        data: response.data,
                    });
                }
            }
        });
    }
}

function filterSectors(){
    var industry_id = $('#industry_id').val();
    if (industry_id != '') {
        $.ajax({
            type:'get',
            url:"{{ route('filter.sectors') }}",
            data:{
                industry_id:industry_id
            },
            success:function(response){
                if(response.status == 200) {
                    $("#sub_sector_id").empty();

                    $("#sub_sector_id").select2({
                        placeholder: "Select Sub Sector...",
                        data: response.data,
                    });
                    var first_val = response.data[0].id;
                    
                    $("#sub_sector_id").select2({first_val}).trigger('change');
                }
            }
        });
    }
}
</script>
@endpush