@extends('admin.layouts.master')

@section('content')

<!-- begin #content -->
<!-- <div id="content" class="content"> -->
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Community</a></li>
    <li class="breadcrumb-item active">Create New Community</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="page-header">Create New Community</h4>
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
            <form name="jobForm" id="jobForm" method="POST" action="{{ route('communities.store') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group row m-b-15">
                            <strong>Title<span class="text-danger">*</span>:</strong>
                            <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" placeholder="Title">
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description :</strong>
                            <textarea id="description" name="description" class="form-control ckeditor"></textarea>
                        </div>
                    </div>                 
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Created By :</strong>
                            <input type="text" name="created_by" id="created_by" class="form-control" value="{{old('created_by')}}" placeholder="CreatedBy">
                        </div>
                    </div>                 
                </div><br/>
                {{--
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group row m-b-15">
                            <strong> <input type="checkbox" name="is_active" id="is_active" value="1" checked> Is Active? </strong>
                        </div>
                    </div>                    
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group m-b-15">
                            <strong> <input type="checkbox" name="is_default" id="is_default" value="1"> Is Default? </strong>
                        </div>
                    </div>
                </div>
                --}}
                <div class="row">
                    <strong>Community Images:</strong><br/>        
                    <div class="col-xs-12 col-sm-12 col-md-12" id="image_wrap">
                        <div class="form-group inputFormRow">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="file" class="" id="image" name="image[]" >
                                </div>  
                                <div class="col-md-3">
                                    <button id="add_new_row_for_image" type="button" class="btn btn-success" style="margin-top: 0px;">+</button>  
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
                        <div class="pull-right">
                            <a class="btn btn-warning" href="{{ route('communities.index') }}">Back to Listing</a>
                            <button type="submit" class="btn btn-primary">Create</button>
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
  $(function(){
     let max_attach_number = 9
     // add new attachment for business
     $("#add_new_row_for_image").click(function (){
         let numItems = $('.new_image_row').length
         if(numItems < max_attach_number){                
           var html = '';
           html += '<div class="form-group new_image_row">';
           html += '<div class="row">';
           html += '<div class="col-md-5">';
           html += '<input type="file" name="image[]" class="" >';
           html += '</div>';
           html += '<div class="col-md-3">';
           html += '<button type="button" class="btn btn-danger btn-sm remove_business_attached" style="margin-top: 0px;">X</button>';
           html += '</div>';
           console.log(html);
         $('#image_wrap').append(html);
         }
     });

      // remove business attachment row
      $(document).on('click', '.remove_business_attached', function () {
        $(this).closest('.new_image_row').remove();
      });
  })

</script>
@endpush