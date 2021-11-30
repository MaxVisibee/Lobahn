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

@push('scripts')
<script>
$(function() {
    $('#country_id').select2({placeholder:"Select Country"});
    $('#state_id').select2({placeholder:"Select State"});
    $('#city_id').select2({placeholder:"Select City"});

    $('#country_id').on('change', function () {
        filterStates();
    });
   
    $(document).on('change', '#state_id', function () {
        filterCities();
    });

    filterStates({{ old('state_id', (isset($user)) ? $user->state_id : 0) }});
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
                        $("#state_id").empty();

                        $("#state_id").select2({
                            placeholder: "Select State...",
                            data: response.data,
                        });
                        var first_val = response.data[0].id;
                        
                        $("#state_id").select2({first_val}).trigger('change');
                    }
                }
            });
        }
    }

    function filterCities()
    {
        var state_id = $('#state_id').val();
        if (state_id != '') {
            $.ajax({
                type:'get',
                url:"{{ route('filter.cities') }}",
                data:{
                    state_id:state_id
                },
                success:function(response){
                    if(response.status == 200) {
                        $("#city_id").empty();

                        $("#city_id").select2({
                            placeholder: "Select City...",
                            data: response.data,
                        });
                    }
                }
            });
        }
    }

</script>
@endpush