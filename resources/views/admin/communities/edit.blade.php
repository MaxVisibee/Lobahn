@extends('admin.layouts.master')

@section('content')

<!-- begin #content -->
<!-- <div id="content" class="content"> -->
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Community</a></li>
    <li class="breadcrumb-item active">Edit Community</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="page-header">Edit Community</h4>
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
            <form name="jobForm" id="jobForm" method="POST" action="{{ route('communities.update', $data->id) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group m-b-15">
                            <strong>Title<span class="text-danger">*</span>:</strong>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $data->title }}" placeholder="Title">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Article Type</strong>
                            <select name="user_types" id="user_types" class="form-control" required>
                                <option value="">Select</option>
                                @foreach (App\Models\Community::POST_TYPES as $key=>$value)                         
                                  <option value="{{ $value }}" {{ (isset($data) && $data->user_types ? $data->user_types : old('user_types')) == $value ? 'selected' : '' }}>
                                      {{ $value ?? ''}}
                                  </option>
                                @endforeach
                            </select>                                                
                        </div>
                    </div>                
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Users</strong>
                            <select name="user_id" id="  user_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($users as $id => $user)                          
                                    <option value="{{ $user->id }}" data-grade="{{ $users }}" {{ (isset($data) && $data->user_id ? $data->user_id : old('user_id')) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Started Date</strong>
                            <input type="date" name="started_date" id="started_date" class="form-control" value="{{ $data->started_date ?? ''}}" placeholder="Started Date">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description :</strong>
                            <textarea id="description" name="description" class="form-control ckeditor">{{ old('description', isset($data) ? $data->description : '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group m-b-15">
                            <strong>Created By:</strong>
                            <input type="text" name="created_by" id="created_by" class="form-control" value="{{ $data->created_by }}">
                        </div>
                    </div>                    
                </div>
                {{--
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group row m-b-15">
                            <strong> <input type="checkbox" name="is_active" id="is_active" value="1" @if($data->is_active == '1') checked @endif> Is Active? </strong>
                        </div>
                    </div>                    
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group m-b-15">
                            <strong> <input type="checkbox" name="is_default" id="is_default" value="{{ $data->is_default}}" {{ $data->is_default == 1 ? 'checked' : null }}> Is Default? </strong>
                        </div>
                    </div>                    
                </div>
                --}}

                <!-- <div class="row">
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
                </div> -->

                <div class="row">       
                    <div class="col-sm-8" id="business_attached_wrap" style="margin: 0;">
                        <div class="form-group inputFormRow">
                            <label for="" class="col-sm-12 col-form-label" style="margin: 0;padding: 0;">
                             <!--  Upload Pdf --> 
                              <span class="required text-danger"></span>
                              <a id="add_new_row_for_image" class="btn btn-success btn-sm add-btn" title="Add New File" style="color: #FFF">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New Image
                              </a>
                            </label>            
                            @foreach($files as $key => $file)
                                <input type="hidden" id="id" name="file_id[]" class="form-control" value="{{ old('id', isset($file) ? $file->id : '') }}" required>
                                <div class="row"> 
                                    <div class="col-md-5" style="width: 306px;margin-top: 18px;">
                                        @php
                                            $url = \Storage::url($file->image);
                                            $path = asset($url);
                                        @endphp
                                        {{$file->image ?? ''}}
                                        <input type="file" class="@error('image')  @enderror" id="image" name="image[{{$file->id}}]" value="{{ old('image', isset($file) ? $file->image : 'Upload File/Video') }}">                    
                                    </div>
                                    <div class="col-md-2" style="margin-top: 18px;">
                                      <meta name="csrf-token" content="{{ csrf_token() }}">
                                      <button class="deleteRecord btn btn-danger btn-sm" data-id="{{ $file->id }}" >X</button>
                                    </div>
                                </div>      
                            @endforeach
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
@push('css')
<style>
  .note-editor.note-airframe, .note-editor.note-frame{
    border: 1px solid rgba(0,0,0,.2) !important;
  }
</style>
@endpush
<!-- add new js file -->
@push('scripts')
<!-- summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- summernote -->
<script>
    $("#description").summernote({
        height: 200,
        tabsize: 4
    });
//End Document Ready
</script>
<script type="text/javascript">
    $(document).ready(function() {

    });  
//End Document Ready
</script>
<!-- Delete File Record -->
<script>
  $(".deleteRecord").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content"); 
    var result = confirm("Are you sure delete?");
    if(result) {
        $.ajax({
            url: "../../communities/images/" + id,
            type: 'POST',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (){
                location.reload();
                //$("#addon_"+id).remove();
            }
        });
    }
  });
</script>

<!-- <script>
  $(".deleteRecord").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");   
    $.ajax({
      // url: "/admin/communities/images/" + id,
      url: "../communities/images/"+id,
      type: 'POST',
      data: {
          "id": id,
          "_token": token,
      },
      success: function (){
        location.reload();
      }
    });
   
});
</script> -->
<!-- Delete File Record -->
<script>
  $(function(){
    let max_attach_number = 9
    // add new attachment for business
    $("#add_new_row_for_image").click(function () {
       let numItems = $('.new_business_attached_row').length
       if(numItems < max_attach_number){                
           var html = '';
           html += '<div class="form-group row new_business_attached_row">';
           html += '<div class="row" style="width:100%;">';           
           html += '<div class="col-md-5" style="margin-top:25px;">';
           // html += '<label for="image">Upload Community Image</label>';
           html += '<input type="file" name="image[]" class="" >';
           html += '</div>';           
           html += '<div class="col-md-2">';
           html += '<button type="button" class="deleteRecord btn btn-danger btn-sm remove_business_attached" style="margin-top: 20px;margin-left:10px;">X</button>';
           html += '</div>';
           html += '</div>';
           console.log(html);
       $('#business_attached_wrap').append(html);
       }
    });
    // remove business attachment row
    $(document).on('click', '.remove_business_attached', function () {
      $(this).closest('.new_business_attached_row').remove();
    });
  })

</script>
@endpush