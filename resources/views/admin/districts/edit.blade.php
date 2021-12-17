@extends('admin.layouts.master')

@section('content')

<!-- begin #content -->
<!-- <div id="content" class="content"> -->
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">District</a></li>
    <li class="breadcrumb-item active">Edit District</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="page-header">Edit District</h4>
<!-- end page-header -->
            
<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-xl-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <h4 class="panel-title"><!-- Edit Job Opportunity --></h4>
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
            <form name="jobForm" id="jobForm" method="POST" action="{{ route('districts.update', $data->id) }}">
                <input type="hidden" name="_method" value="PATCH">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group row m-b-15">
                            <strong>District Name<span class="text-danger">*</span>:</strong>
                            <input type="text" name="district_name" id="district_name" class="form-control" value="{{ $data->district_name }}">
                        </div>
                    </div> 
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Country Name</strong>
                            <select id="country_id" name="country_id" class="form-control country_id">
                                <option value="">Select</option>
                                @foreach($countries as $id => $country)                          
                                    <option value="{{ $country->id }}" data-grade="{{ $countries }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                        {{ $country->country_name ?? ''}}
                                    </option>
                                    {{-- <option value="{{ $country->id }}" data-grade="{{ $countries }}" {{ (isset($data) && $data->country_id ? $data->country_id : old('country_id')) == $country->id ? 'selected' : '' }}>
                                        {{ $country->country_name ?? ''}}
                                    </option> --}}
                                @endforeach

                            </select>                                                 
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Area Name</strong>
                            <select id="area_id" name="area_id" class="form-control area_id">
                                <option value="">Select</option>
                                @foreach($areas as $id => $area)                          
                                    <option value="{{ $area->id }}" data-grade="{{ $areas }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                                        {{ $area->area_name ?? ''}}
                                    </option>
                                    {{-- <option value="{{ $area->id }}" data-grade="{{ $areas }}" {{ (isset($data) && $data->area_id ? $data->area_id : old('area_id')) == $area->id ? 'selected' : '' }}>
                                        {{ $area->area_name ?? ''}}
                                    </option> --}}
                                @endforeach

                            </select>                                                 
                        </div>
                    </div>
                </div>          
                <br/>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-warning" href="{{ route('districts.index') }}">Back to Listing</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- end panel-body -->
    </div>
</div>

@endsection

<!-- add new js file -->
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {

    });  
//End Document Ready
</script>

<script>
    $(function() {        
        $('#country_id').select2({placeholder:"Select Country"});
        $('#area_id').select2({placeholder:"Select Area"});
        $('#country_id').on('change', function () {
            filterAreas();
        });

        filterAreas({{ old('area_id', (isset($user)) ? $user->area_id : 0) }});
    });

    function filterAreas(){
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

</script>
@endpush