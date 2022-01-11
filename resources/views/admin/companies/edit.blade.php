@extends('admin.layouts.master')

@section('content')


<!-- begin #content -->
<!-- <div id="content" class="content"> -->
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Admins</a></li>
    <li class="breadcrumb-item active">Edit Admin</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="page-header">Admin Management</h4>
<!-- end page-header -->
            
<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-xl-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <h4 class="panel-title">Edit Admin</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <!-- end panel-heading -->
        <!-- begin alert -->
        @if (count($errors) > 0)
        <div class="alert alert-secondary fade show">
            <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            </button>
            
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                 @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                 @endforeach
              </ul>
            </div>
          
        </div>
        @endif
        <!-- end alert -->
        <!-- begin panel-body -->
        <div class="panel-body">

            {!! Form::model($company, ['method' => 'PATCH','route' => ['companies.update', $company->id], 'files'=>true, 'id'=>'companyForm', 'name'=>'companyForm']) !!}
                
            @include('admin.companies._form', ['model'=>$company])
                
            {!! Form::close() !!}
        </div>
        <!-- end panel-body -->
    </div>
</div>

@endsection

@push('css')
<style>

</style>
@endpush

@push('scripts')
<script>
$(function() {
    $('#country_id').select2({placeholder:"Select Country"});
    $('#area_id').select2({placeholder:"Select Area"});
    $('#district_id').select2({placeholder:"Select District"});
    $('#industry_id').select2({placeholder:"Select Industry"});
    $('#sub_sector_id').select2({placeholder:"Select Sub Sector"});
    $('#position_title_id').select2({placeholder:"Select Position Title"});
    $('#keyword_id').select2({placeholder:"Select Keywords"});
    $('#contract_term_id').select2({placeholder:"Select Contrarct Term"});
    $('#contract_hour_id').select2({placeholder:"Select Contrarct Hour"});
    $('#management_level_id').select2({placeholder:"Select Management Levels"});
    $('#experience_id').select2({placeholder:"Select Experiences"});
    $('#education_level_id').select2({placeholder:"Select Education Levels"});
    $('#institution_id').select2({placeholder:"Select Preferred Schools"});
    $('#language_id').select2({placeholder:"Select Languages"});
    $('#geographical_id').select2({placeholder:"Select Geographical Experiences"});
    $('#skill_id').select2({placeholder:"Select Skills"});
    $('#qualification_id').select2({placeholder:"Select Qualifications"});
    $('#field_study_id').select2({placeholder:"Select Field Of Study"});
    $('#key_strength_id').select2({placeholder:"Select Key Strength"});
    $('#function_id').select2({placeholder:"Select Functions"});
    $('#specialist_id').select2({placeholder:"Select Specialists"});

    $('#industry_id').on('change', function () {
        // filterSectors();
    });

    $('#country_id').on('change', function () {
        filterStates();
    });
   
    $(document).on('change', '#area_id', function () {
        filterCities();
    });

    filterStates({{ old('area_id', (isset($company)) ? $company->area_id : 0) }});
});

    function filterStates()
    {
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
                            placeholder: "Select State...",
                            data: response.data,
                        });
                        var first_val = response.data[0].id;
                        
                        $("#area_id").select2({first_val}).trigger('change');
                    }
                }
            });
        }
    }

    function filterCities()
    {
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
                            placeholder: "Select City...",
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