@extends('admin.layouts.master')

@section('content')

<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
  <li class="breadcrumb-item active">Companies</li>
</ol>
<!-- end breadcrumb -->
{{-- begin page-header --}}
<h4 class="bold content-header"> Company Management<small> </small></h4>

<hr class="mt-0">

@can('company-create')
<div class="row m-b-10">
  <div class="col-lg-12">
    <a class="btn btn-primary" href="{{ route('companies.create') }}"><i class="fa fa-plus"></i> Create Company</a>
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
        <h4 class="panel-title">Admin List</h4>
        <div class="panel-heading-btn">
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
        </div>
      </div>
      <!-- end panel-heading -->
      
      <!-- begin panel-body -->
      <div class="panel-body table-responsive">
        <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
          <thead>
            <tr>
              <th width="1%">No.</th>
              <th class="text-nowrap">Name</th>
              <th class="text-nowrap">Company Name</th>
              <th class="text-nowrap">Office Email</th>
              <th class="text-nowrap">Office Phone</th>
              <th class="text-nowrap">Main Industry</th>
              <!-- <th class="text-nowrap">SubSector Name</th> -->
              <th class="text-nowrap" width="13%">Action</th>
            </tr>
          </thead>
          <tbody>
            
            @forelse($companies as $key=>$company)
            <tr class="odd gradeX">
              <td width="1%" class="f-s-600 text-inverse">{{$key+1}}</td>
              <td>{{$company->name ?? '-'}}</td>
              <td>{{$company->company_name ?? '-'}}</td>
              <td>{{$company->email ?? '-'}}</td>
              <td>{{$company->phone ?? '-'}}</td>
              <td>{{$company->industry->industry_name ?? '-'}}</td>
              <!-- <td>{{$company->subsector->sub_sector_name ?? '-'}}</td> -->
              <td>
                <a class="btn btn-success btn-icon btn-circle" href="{{ route('companies.show',$company->id) }}"> <i class="fa fa-eye"></i></a>
                @can('company-edit')
                <!-- <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}"><i class="far fa-lg fa-fw fa-edit"></i></a> -->
                <a class="btn btn-warning btn-icon btn-circle" href="{{ route('companies.edit',$company->id) }}"> <i class="fa fa-edit"></i></a>
                @endcan
                @can('company-delete')
                  {!! Form::open(['method' => 'DELETE','route' => ['companies.destroy', $company->id],'style'=>'display:inline']) !!}
                    <!-- <button type="submit" class="btn btn-danger"><i class="far fa-lg fa-fw fa-trash-alt"></i></button> -->
                    <button type="submit" class="btn btn-danger btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class='fas fa-times'></i>
                    </button>
                  {!! Form::close() !!}
                @endcan
              </td>
            </tr>
            @empty
            <tr class="odd gradeX">
              <td colspan="4" class='text-center'> Empty Company Record! </td>
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

@endsection