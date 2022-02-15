@extends('admin.layouts.master')

@push('css')
<style>
  .no-sort::after {
    display: none !important;
    padding-right: 0px !important;
  }

  .no-sort {
    pointer-events: none !important;
    cursor: default !important;
    padding-right: 60px !important;
  }

  .check {
    padding-right: 5px !important;
  }
</style>
@endpush

@section('content')

<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
  <li class="breadcrumb-item active">Employer</li>
</ol>
<!-- end breadcrumb -->
{{-- begin page-header --}}
<h4 class="bold content-header">Employer Management<small> </small></h4>

<hr class="mt-0">

@can('company-create')
<div class="row m-b-10">
  <div class="col-lg-12">
    {{-- <a class="btn btn-primary" href="{{ route('companies.create') }}"><i class="fa fa-plus"></i>Create Employer</a>
    --}}
    <button id="delete" class="delete btn btn-danger">
      Delete
    </button>
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
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
              class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
              class="fa fa-redo"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
              class="fa fa-minus"></i></a>
        </div>
      </div>
      <!-- end panel-heading -->

      <!-- begin panel-body -->
      <div class="panel-body table-responsive">
        <table id="data-table-responsive"
          class="table table-striped table-bordered table-td-valign-middle table-responsive">
          <thead>
            <tr>
              <th class="no-sort check">
                <input type="checkbox" id="checkbox" class="check" name="checkbox" value="checkbox">
              </th>
              <th class="no-sort check">Action</th>
              <th width="1%">No.</th>
              <th class="text-nowrap">Employer Name</th>
              <th class="text-nowrap">Name</th>
              <th class="text-nowrap">Office Email</th>
              <th class="text-nowrap">Office Phone</th>
              <th class="text-nowrap">Main Industry</th>
              <!-- <th class="text-nowrap">SubSector Name</th> -->
            </tr>
          </thead>
          <tbody>

            @forelse($companies as $key=>$company)
            <tr class="odd gradeX">
              <td data-ordering="false">
                <input type="checkbox" data.value="{{$company->id}}" id="check_delete[]" class="check"
                  name="check_delete[]" value="{{$company->id}}">
              </td>
              <td>
                <a class="btn btn-success btn-icon btn-circle" href="{{ route('companies.show',$company->id) }}"> <i
                    class="fa fa-eye"></i></a>
                @can('company-edit')
                <!-- <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}"><i class="far fa-lg fa-fw fa-edit"></i></a> -->
                <a class="btn btn-warning btn-icon btn-circle" href="{{ route('companies.edit',$company->id) }}"> <i
                    class="fa fa-edit"></i></a>
                @endcan
                @can('company-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['companies.destroy',
                $company->id],'style'=>'display:inline']) !!}
                <!-- <button type="submit" class="btn btn-danger"><i class="far fa-lg fa-fw fa-trash-alt"></i></button> -->
                <button type="submit" class="btn btn-danger btn-icon btn-circle" data-toggle="tooltip"
                  data-placement="top" title="Delete">
                  <i class='fas fa-times'></i>
                </button>
                {!! Form::close() !!}
                @endcan
              </td>
              <td width="1%" class="f-s-600 text-inverse">{{$key+1}}</td>
              <td>{{$company->company_name ?? '-'}}</td>
              <td>{{$company->user_name ?? '-'}}</td>
              <td>{{$company->email ?? '-'}}</td>
              <td>{{$company->phone ?? '-'}}</td>
              <td>{{$company->industry->industry_name ?? '-'}}</td>
              <!-- <td>{{$company->subsector->sub_sector_name ?? '-'}}</td> -->

            </tr>
            @empty
            <tr class="odd gradeX">
              <td colspan="7" class='text-center'> Empty Employer Record! </td>
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

@push('scripts')
<script>
  $(document).ready(function() {
      
      
      $('.delete').on('click',function(e){    
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });

          $.ajax({
            method : "POST",
            url: "{{ url('admin/companies/destroy-all') }}",
            data : {
            "_token": "{{ csrf_token() }}",
              data : val
            },
            success : function(data){
                  if (data.success) {
                    location.reload();
                }
            }
          })
        
      });
      $("th input[type='checkbox']").on("change", function () {
          var cb = $(this),          //checkbox that was changed
              th = cb.parent(),      //get parent th
              col = th.index() + 1;  //get column index. note nth-child starts at 1, not zero
          $("tbody td:nth-child(" + col + ") input").prop("checked", this.checked);  //select the inputs and [un]check it
      });
      
    });
</script>
@endpush