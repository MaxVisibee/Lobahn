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
                                    <strong>Area</strong>
                                    <select id="area_id" name="area_id" class="default-select2 form-control area_id">
                                        <option value="">Select</option>
                                        @foreach($areas as $id => $area)                          
                                            <option value="{{ $area->id }}" data-grade="{{ $areas }}">
                                                {{ $area->area_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
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
                                    <strong>Degree Level</strong>
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
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Carriers</strong>
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
                                <div class="form-group row m-b-15">
                                    <strong>No. of Position:</strong>
                                    <input type="text" name="no_of_position" id="no_of_position" class="form-control" value="{{old('no_of_position')}}" placeholder="No. of Position">
                                </div>
                            </div>
                            <!-- <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Expire Date :</strong>
                                    <div class="">
                                        <div class="input-group date expire_date" id="datetimepicker1">
                                            <input type="text" class="form-control expire_date" name="expire_date" />
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Expire Date :</strong>                                    
                                    <div class="input-group date" id="datepicker-disabled-past" data-date-format="yyyy-mm-dd" data-date-start-date="Date.default">
                                        <input type="text" class="form-control expire_date" placeholder="Select Date" name="expire_date" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
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
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>Slug:</strong>
                                    <input type="text" name="slug" id="slug" class="form-control" value="{{old('slug')}}" placeholder="Slug">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group row m-b-15">
                                    <strong> <input type="checkbox" name="hide_salary" id="hide_salary" value="0">Hide Salary</strong>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group row m-b-15">
                                    <strong> <input type="checkbox" name="is_freelance" id="is_freelance" value="0">Freelance</strong>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group row m-b-15">
                                    <strong> <input type="checkbox" name="is_active" id="is_active" value="1" checked> Is Active?</strong>
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
                                                {{ $company->name ?? ''}}
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
                            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Company :</strong>
                                    <select name="company_id" id="company_id" class="form-control">
                                        <option value="">Select</option>
                                        <option value="visibleone">VisibleOne</option>
                                        <option value="visibletwo">VisileOne2</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Job Type</strong>
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
                            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Job Shift</strong>
                                    <select id="job_shift_id" name="job_shift_id" class="form-control job_shift_id">
                                        <option value="">Select</option>
                                        @foreach($job_shifts as $id => $job_shift)                          
                                            <option value="{{ $id }}" data-grade="{{ $job_shifts }}">
                                                {{ $job_shift ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div> -->
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Job Experience</strong>
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
<script>
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
</script>
@endpush