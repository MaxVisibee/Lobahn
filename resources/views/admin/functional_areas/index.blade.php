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
    <li class="breadcrumb-item active">Functional Area</li>
  </ol>
  <!-- end breadcrumb -->

  <!-- begin page-header -->
  <h4 class="bold content-header"> Functional Arae Management<small> </small></h4>
  <div id="footer" class="footer" style="margin-left: 0px"></div>
  <div class="row m-b-10">
    <div class="col-xs-6">
      <div>
        <a class="btn btn-primary" href="{{ route('functional_areas.create') }}"><i class="fa fa-plus"></i> Create New Functional Area</a>            
      </div>
    </div>
    <div class="col-xs-6 text-right">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Actions <i class="fas fa-caret-down"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#excelImport">Import</a>
          <a class="dropdown-item" href="{{route('functional_areas.export')}}">Export</a>
        </div>
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
          <h4 class="panel-title"><!-- Functional Area Managements --></h4>
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
          <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
              <tr>
                <th width="1%">No.</th>
                <th class="text-nowrap">Functional Arae</th>
                <th class="text-nowrap">Created At</th>
                <th class="text-nowrap">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $key => $area)
              <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $area->area_name ?? '-' }}</td>
                <td>
                  {{ isset($area->created_at)? Carbon\Carbon::parse($area->created_at)->format('d-m-Y') :'-' }}
                </td>
                <td>
                 <!--  <a class="btn btn-success btn-icon btn-circle" href="{{ route('functional_areas.show',$area->id) }}"><i class="fas fa-eye"></i></a> -->
                  <a class="btn btn-warning btn-icon btn-circle" href="{{ route('functional_areas.edit',$area->id) }}"> <i class="fa fa-edit"></i></a>
                  <form action="{{ route('functional_areas.destroy', $area->id) }}" method="POST" onsubmit="return confirm('Are you sure to Delete?');" style="display: inline-block;">
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
<div class="modal fade" id="excelImport" tabindex="-1" role="dialog" aria-labelledby="excelImportLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="excelImportLabel">Functional Area Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        {!! Form::open(['route' => 'functional_areas.import', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'id'=>'import_form','files'=>true]) !!}
        
        <div class="form-group import-file">
          {!! Form::file('import_file', ['id' => 'import_file', 'class'=>'text-center']); !!}
        </div>
  
        <div class="form-group text-center">
          <a href="{{asset('/sample-import/functional_area_sample_import.xlsx')}}"> <i class="fas fa-download"></i> Download Sample File </a>
        </div>
  
        <div class="form-group text-center">
          <p>
            You can import up to 1000 records through an .xls, .xlsx or .csv file.
            To import more than 1000 records at a time, use a .csv file.
          </p>
        </div>
        
        <div class="form-group">
          <button class="btn btn-block btn-primary">Import</button>
        </div>

        {!! Form::close() !!}
      </div>
      
    </div>
  </div>
</div>
{{-- End Modal --}
@endsection