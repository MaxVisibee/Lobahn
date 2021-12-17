@extends('admin.layouts.master')

@section('content')
<!-- begin #content -->
<!-- <div id="content" class="content"> -->
  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item active">District</li>
  </ol>
  <!-- end breadcrumb -->

  <!-- begin page-header -->
  <h4 class="bold content-header">District Management<small> </small></h4>
  <div id="footer" class="footer" style="margin-left: 0px"></div>
  <div class="row m-b-10">
    <div class="col-lg-12">
      <div>
        <a class="btn btn-primary" href="{{ route('districts.create') }}"><i class="fa fa-plus"></i> Create New District</a>            
      </div>
    </div>
  </div
   
  <!-- end page-header -->
  <!-- begin row -->
  <div class="row">
    <!-- begin col-12-->
    <div class="col-xl-12">
      <!-- begin panel -->
      <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading">
          <h4 class="panel-title"><!-- district Opportunity Managements --></h4>
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
          <div class="row">
            <div class="col-md-2" style="">
              <select class="form-control" name="country_id" id="country_id">
                  <option value="">Country</option>
                  @foreach($countries as $id => $country)
                    @if(Request::get('country_id'))
                      <option value="{{$country->id}}" {{ (Request::get('country_id') == $country->id) ? 'selected' : '' }}>{{ $country->country_name ?? ''}}</option>
                    @else
                      <option value="{{$country->id}}" {{ (98 == $country->id) ? 'selected' : '' }}>{{ $country->country_name ?? ''}}</option>
                    @endif
                  @endforeach
              </select>
            </div>
            <div class="col-md-2" style="">
              <select class="form-control" name="area_id" id="area_id">
                  <option value="">Area</option>
                  @foreach($areas as $id => $area)
                  @if(Request::get('area_id'))
                      <option value="{{$area->id}}" {{ (Request::get('area_id') == $area->id) ? 'selected' : '' }}>{{ $area->area_name ?? ''}}</option>
                  @else
                      <option value="{{$area->id}}" {{ (1636 == $area->id) ? 'selected' : '' }}>{{ $area->area_name ?? ''}}</option>
                  @endif
                  @endforeach
              </select>
            </div>
          </div><br/>
          
          <!-- Search End -->
          <table id="data-table-responsive" class="table table-striped table-bordered datatable table-td-valign-middle">
            <thead>
              <tr>
                <th width="1%">No.</th>
                <th class="text-nowrap">District Name</th>
                <th class="text-nowrap">Area Name</th>
                <th class="text-nowrap">Country Name</th>
                <th class="text-nowrap">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $key=>$district)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $district->district_name ?? '-' }}</td>
                <td>{{ $district->area->area_name ?? '-' }}</td>
                <td>{{ $district->country->country_name ?? '-' }}</td>
                <td>
                  <a class="btn btn-warning btn-icon btn-circle" href="{{ route('districts.edit',$district->id) }}"> <i class="fa fa-edit"></i></a>
                  <form action="{{ route('districts.destroy', $district->id) }}" method="POST" onsubmit="return confirm('Are you sure to Delete?');" style="display: inline-block;">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="btn btn-danger btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Delete">
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
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
  <!-- end scroll to top btn -->
</div>
  <!-- end page container -->
@endsection

@push('css')
<style>
  
</style>
@endpush

@push('scripts')
<script>
  $(document).on('change','#area_id', function(){
    var country   =$('#country_id').val();
    var area   =$('#area_id').val();
    var url = "{{ route('districts.index') }}?country_id="+ country+"&area_id="+ area;
    if (url) {
        window.location = url;
    }
    return false;
  })
</script>
@endpush