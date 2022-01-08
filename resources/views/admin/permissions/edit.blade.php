@extends('admin.layouts.master')

@section('content')

<!-- begin #content -->
<!-- <div id="content" class="content"> -->
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Permissions</a></li>
    <li class="breadcrumb-item active">Edit Permissions</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="page-header">Edit Permissions</h4>
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
            <form name="jobForm" id="jobForm" method="POST" action="{{ route('permissions.update', $permission->id) }}">
                <input type="hidden" name="_method" value="PATCH">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group m-b-15">
                            <strong>Name<span class="text-danger">*</span>:</strong>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}">
                        </div>
                    </div>                    
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      @if(!$roles->isEmpty())
                        <strong>Assign Permission to Roles</strong><br/>
                          @foreach ($roles as $role) 
                            @php $check_value = '' @endphp
                              @foreach($permission_roles as $per_role)
                                @if($role->id == $per_role->role_id)
                                  @php $check_value = "checked"; @endphp
                                    {{-- <input type="checkbox" name="role_permission_id[]" id="per_role_{{$per_role->role_id}}" value="{{$per_role->role_id}}" checked="checked" style="display:none;"> --}}
                                  @endif
                              @endforeach
                            <label for="role_id">
                              <input type="checkbox" name="roles[]" id="role_id_{{$role->id}}" value="{{$role->id}}" {{$check_value}}> {{ucfirst($role->name)}}
                            </label> <br>
                          @endforeach
                        @endif
                      </div>
                    </div>
                  </div>       
                <br/>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-warning" href="{{ route('permissions.index') }}">Back to Listing</a>
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
@section('js')
<script type="text/javascript">
    $(document).ready(function() {

    });  
//End Document Ready
</script>
@stop
{{-- @push('scripts')
<script>
$(document).ready(function() {
  @foreach ($roles as $role)
    var roleId = {{$role->id}};
    $("#role_id_"+roleId).change(function() {
      var checkValue = $(this).val();
      if($("#role_id_"+checkValue).prop('checked') == false) {
        $("#per_role_"+checkValue).removeAttr("checked", "checked");
      }else {
        $("#per_role_"+checkValue).attr("checked", "checked");
      }
    });
  @endforeach
});
</script>
@endpush --}}