@extends('admin.layouts.master')

@section('content')

<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
  <li class="breadcrumb-item active">Packages</li>
</ol>
<!-- end breadcrumb -->
{{-- begin page-header --}}
<h4 class="bold content-header"> Package Management</h4>

<hr class="mt-0">

@can('package-create')
<div class="row m-b-10">
  <div class="col-lg-12">
    <a class="btn btn-primary" href="{{ route('packages.create') }}"><i class="fa fa-plus"></i> Create Package</a>
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
        <h4 class="panel-title">Package List</h4>
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
              <th class="text-nowrap">Title</th>
              <th class="text-nowrap">Price</th>
              <th class="text-nowrap">PricePerMonth</th>
              <th class="text-nowrap">Promotion %</th>
              <th class="text-nowrap">PackageFor</th>
              <th class="text-nowrap">No.OfDays</th>
              <th class="text-nowrap">No.OfListings</th>
              <th class="text-nowrap">Currency</th>
              <th class="text-nowrap">Action</th>
            </tr>
          </thead>
          <tbody>
            
            @forelse($packages as $key=>$package)
            <tr class="odd gradeX">
              <td width="1%" class="f-s-600 text-inverse">{{$key+1}}</td>
              <td>{{$package->package_title ?? '-'}}</td>
              <td>{{$package->package_price ?? '-'}}</td>
              <td>{{$package->price_permonth ?? '-'}}</td>
              <td>{{$package->package_for ?? '-'}}</td>
              <td>{{$package->promotion_percent ?? '-'}}</td>
              <td>{{$package->package_num_days ?? '-'}}</td>
              <td>{{$package->package_num_listings ?? '-'}}</td>
              <td>{{$package->currency ?? '-'}}</td>
              <td>
                @can('package-edit')
                  <!-- <a class="btn btn-primary" href="{{ route('packages.edit',$package->id) }}"><i class="far fa-lg fa-fw fa-edit"></i></a> -->
                  <a class="btn btn-warning btn-icon btn-circle" href="{{ route('packages.edit',$package->id) }}"> <i class="fa fa-edit"></i></a>
                @endcan
                @can('package-delete')
                  {{-- 
                  {!! Form::open(['method' => 'DELETE','route' => ['packages.destroy', $package->id],'style'=>'display:inline']) !!}
                    <button type="submit" class="btn btn-danger btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class='fas fa-times'></i>
                    </button>
                  {!! Form::close() !!}
                  --}}
                  <form action="{{ route('packages.destroy', $package->id) }}" method="POST" onsubmit="return confirm('Are you sure to Delete?');" style="display: inline-block;">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="btn btn-danger btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Delete">
                          <i class='fas fa-times'></i>
                      </button>
                  </form>
                @endcan
              </td>
            </tr>
            @empty
            <tr class="odd gradeX">
              <td colspan="6" class='text-center'> Empty Package Record! </td>
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