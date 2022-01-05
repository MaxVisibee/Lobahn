@extends('admin.layouts.master')

@section('content')

<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Seekers</a></li>
    <li class="breadcrumb-item active">Edit Seeker</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="page-header">Seeker Management</h4>
<!-- end page-header -->
            
<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-xl-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <h4 class="panel-title">Edit Seeker</h4>
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

            {!! Form::model($user, ['method' => 'PATCH','route' => ['seekers.update', $user->id], 'files'=>true, 'id'=>'userForm', 'name'=>'userForm']) !!}
                
            @include('admin.seekers._form', ['model'=>$user])
                
            {!! Form::close() !!}
        </div>
        <!-- end panel-body -->
    </div>
</div>

@endsection

@push('css')
<style>
    input.datepicker{
        border-radius: 3px !important;
    }
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
    $('#functional_area_id').select2({placeholder:"Select Functional Area"});
    $('#specialist_id').select2({placeholder:"Select Specialists"});
    $('#target_pay_id').select2({placeholder:"Select Target Pay"});

    $('#industry_id').on('change', function () {
        filterSectors();
    });

});

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

    var countLanguage = 1;

    function addLanguageRow()
    {
        var lanrow = countLanguage + 1;
        $('#language_count').val(lanrow);
        countLanguage++;

        $(".language-append").append(
            '<div class="row language-row-'+lanrow+'">'+
                '<div class="col-xs-5">'+
                    '<div class="form-group m-b-15">'+
                        '{!! Form::select("language_id[]", $languages, null, array("class" => "form-control")) !!}'+
                    '</div>'+
                '</div>'+
                '<div class="col-xs-5">'+
                    '<div class="form-group m-b-15">'+
                        '{!! Form::select("language_level[]", MiscHelper::getLanguageLevel(), null, array("class" => "form-control select2-default")) !!}'+
                    '</div>'+
                '</div>'+
                '<div class="col-xs-2">'+
                    '<div class="form-group addon_btn m-b-15">'+
                        '<button id="remove_language_'+lanrow+'" onClick="removeLanguageRow('+lanrow+')" type="button" class="btn btn-danger btn-sm">x</button>'+
                    '</div>'+
                '</div>'+
            '</div>'
        );
    }

    function removeLanguageRow(row)
    {
        if(countLanguage == 1)
        {
            alert('There has to be at least one line');
            return false;
        }
        else
        {
            $('.language-row-'+row).remove();
            countLanguage--;
        }
        $('#language_count').val(countLanguage);
    }

    var countCV = {{count(json_decode($user->cv))}};

    function addCV()
    {
        var cvrow = countCV + 1;
        $('#cv_count').val(cvrow);
        countCV++;

        $(".cv-wrapper").append(
            '<div class="mb-2 cv-row-'+cvrow+'">'+
                '<input type="file" name="cv[]" id="cv_'+cvrow+'"/>'+
                '<button type="button" onClick="removeCV('+cvrow+')" class="btn btn-danger btn-xs float-right">x</button>'+
            '</div>'
        );
    }

    function removeCV(row)
    {
        $('.cv-row-'+row).remove();
        countCV--;
        $('#cv_count').val(countCV);
    }
    
    function removeUploadCV(row)
    {
        var result = confirm('Are you sure delete?');
        if(result) {
            $('.cvupload-row-'+row).remove();
            countCV--;
            if(countCV == 0) {
                countCV = 1;
            }
            $('#cv_count').val(countCV);
        }
    }
</script>
@endpush