@extends('admin.layouts.master')

@section('content')

<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
  <li class="breadcrumb-item active">Industries</li>
</ol>
<!-- end breadcrumb -->
{{-- begin page-header --}}
<h4 class="bold content-header"> Industry Management</h4>

<hr class="mt-0">

@can('industry-create')
<div class="row m-b-10">
  <div class="col-xs-6">
    <a class="btn btn-primary" href="{{ route('industries.create') }}"><i class="fa fa-plus"></i> Create Industry</a>
  </div>
  <div class="col-xs-6 text-right">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions <i class="fas fa-caret-down"></i>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#excelImport">Import</a>
        <a class="dropdown-item" href="{{route('industries.export')}}">Export</a>
      </div>
    </div>
  </div>
</div>
@endcan
{{-- end page-header --}}

<!-- begin row -->
<div class="row">
  <!-- begin col-12 -->
  <div class="col-xl-12">
    <!-- begin panel -->
    <div class="panel panel-inverse">
      <!-- begin panel-heading -->
      <div class="panel-heading">
        <h4 class="panel-title">Industry List</h4>
        <div class="panel-heading-btn">
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
        </div>
      </div>
      <!-- end panel-heading -->
      
      <!-- begin panel-body -->
      <div class="panel-body">
        <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
          <thead>
            <tr>
              <th width="1%">No.</th>
              <th class="text-nowrap">Industry</th>
              <th class="text-nowrap" width="13%;">Action</th>
            </tr>
          </thead>
          <tbody>
            
            @forelse($industries as $key=>$industry)
            <tr class="odd gradeX">
              <td width="1%" class="f-s-600 text-inverse">{{$key+1}}</td>
              <td>{{$industry->industry_name}}</td>
              <td>
                @can('industry-edit')
                <!-- <a class="btn btn-primary" href="{{ route('industries.edit',$industry->id) }}"><i class="far fa-lg fa-fw fa-edit"></i></a> -->
                 <a class="btn btn-warning btn-icon btn-circle" href="{{ route('industries.edit',$industry->id) }}"> <i class="fa fa-edit"></i></a>
                @endcan
                @can('industry-delete')
                  {!! Form::open(['method' => 'DELETE','route' => ['industries.destroy', $industry->id],'style'=>'display:inline']) !!}
                    <button type="submit" class="btn btn-danger btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class='fas fa-times'></i>
                    </button>
                  {!! Form::close() !!}
                @endcan
              </td>
            </tr>
            @empty
            <tr class="odd gradeX">
              <td colspan="6" class='text-center'> Empty Industry Record! </td>
            </tr>
            @endforelse
            
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
<div class="modal fade" id="excelImport" tabindex="-1" role="dialog" aria-labelledby="excelImportLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="excelImportLabel">Industry Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        {!! Form::open(['route' => 'industries.import', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'id'=>'import_form','files'=>true]) !!}
        
        <div class="form-group import-file">
          {!! Form::file('import_file', ['id' => 'import_file', 'class'=>'text-center']); !!}
        </div>
  
        <div class="form-group text-center">
          <a href="{{asset('/sample-import/industry_sample_import.xlsx')}}"> <i class="fas fa-download"></i> Download Sample File </a>
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
{{-- End Modal --}}

@endsection