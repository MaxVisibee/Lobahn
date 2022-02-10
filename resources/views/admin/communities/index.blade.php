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
  <li class="breadcrumb-item active">Community</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="bold content-header">Community Management<small> </small></h4>
<div id="footer" class="footer" style="margin-left: 0px"></div>
<div class="row m-b-10">
  <div class="col-lg-12">
    <div>
      <a class="btn btn-primary" href="{{ route('communities.create') }}"><i class="fa fa-plus"></i> Create New
        Community</a>
    </div>
  </div>
</div <!-- end page-header -->
<!-- begin row -->
<div class="row">
  <!-- begin col-12-->
  <div class="col-xl-12">
    <!-- begin panel -->
    <div class="panel panel-inverse">
      <!-- begin panel-heading -->
      <div class="panel-heading">
        <h4 class="panel-title">
          <!-- community Opportunity Managements -->
        </h4>
        <div class="panel-heading-btn">
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
              class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
              class="fa fa-redo"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
              class="fa fa-minus"></i></a>
          <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
        </div>
      </div>
      <!-- end panel-heading -->
      <!-- begin panel-body -->
      <div class="panel-body">
        <table id="data-table-responsive"
          class="table table-striped table-bordered table-td-valign-middle table-responsive">
          <thead>
            <tr>
              <th width="1%">No.</th>
              <th class="text-nowrap">Title</th>
              <th class="text-nowrap">User Type</th>
              <th class="text-nowrap">User</th>
              <th class="text-nowrap">Approved</th>
              <th class="text-nowrap">Started Date</th>
              <!-- 
                <th class="text-nowrap">Description</th>
                <th class="text-nowrap">CreatedBy</th> -->
              <th class="text-nowrap" width="13%">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $key => $community)
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $community->title ?? '-' }}</td>
              <td>{{ $community->category ?? '-' }}</td>
              <td>{{ $community->user->name ?? '-' }}</td>
              <td>
                @if($community->approved)
                <button id="approved" class="approved btn btn-info" data-id="{{$community->id}}" data-value="0">
                  Approved
                </button>
                @else
                <button id="disapproved" class="approved btn btn-danger" data-id="{{$community->id}}" data-value="1">
                  Approved
                </button>
                @endif
              </td>
              <td>{{ $community->started_date ?? '-' }}</td>
              <!--
                <td>{!! $community->description ?? '-' !!}</td>
                <td>{!! $community->created_by ?? '-' !!}</td> -->
              <td>
                <a class="btn btn-success btn-icon btn-circle" href="{{ route('communities.show',$community->id) }}"><i
                    class="fas fa-eye"></i></a>
                <a class="btn btn-warning btn-icon btn-circle" href="{{ route('communities.edit',$community->id) }}"> <i
                    class="fa fa-edit"></i></a>
                <form action="{{ route('communities.destroy', $community->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure to Delete?');" style="display: inline-block;">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-danger btn-icon btn-circle" data-toggle="tooltip"
                    data-placement="top" title="Delete">
                    <i class='fas fa-times'></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
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
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
    class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
<!-- end page container -->
@endsection

@push('scripts')
<script>
  $('.approved').on('click',function(e){    
    var $table = $('#data-table-responsive');
    var value = $(this).data('value');
    var id = $(this).data('id');
    alert(value)
      $.ajax({
        method : "POST",
        url: "{{ url('admin/approved') }}/"+id,
        data : {
        "_token": "{{ csrf_token() }}",
          data : value
        },
        success : function(data){
              if (data.success) {
                location.reload();
            }
        }
      })
    
  })
</script>
@endpush