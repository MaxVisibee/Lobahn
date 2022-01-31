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
  <li class="breadcrumb-item active">Education Level</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="bold content-header"> Education Level Management<small> </small></h4>
<div id="footer" class="footer" style="margin-left: 0px"></div>
<div class="row m-b-10">
  <div class="col-xs-6">
    <div>
      <a class="btn btn-primary" href="{{ route('degree_levels.create') }}"><i class="fa fa-plus"></i> Create New
        Education Level</a>
    </div>
  </div>
  <div class="col-xs-6 text-right">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Actions <i class="fas fa-caret-down"></i>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#excelImport">Import</a>
        <a class="dropdown-item" href="{{route('degree_levels.export')}}">Export</a>
      </div>
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
          <!-- Functional Area Managements -->
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
        <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
          <thead>
            <tr>
              <th width="1%">No.</th>
              <th class="text-nowrap">Education Level Name</th>
              <th class="text-nowrap">Priority</th>
              <th class="text-nowrap">Created At</th>
              <th class="text-nowrap">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $key => $degree)
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $degree->degree_name ?? '-' }}</td>
              <td>
                <input style="width: 100px;" type="number" class="sorting" name="sorting_{{ $degree->id }}"
                  id="sorting-{{ $degree->id }}" value="{{ $degree->priority ?? '0' }}" data-id="{{$degree->id}}">
              </td>
              <td>{{ isset($degree->created_at)? Carbon\Carbon::parse($degree->created_at)->format('d-m-Y') :'-' }}</td>
              <td>
                <!--  <a class="btn btn-success btn-icon btn-circle" href="{{ route('degree_levels.show',$degree->id) }}"><i class="fas fa-eye"></i></a> -->
                <a class="btn btn-warning btn-icon btn-circle" href="{{ route('degree_levels.edit',$degree->id) }}"> <i
                    class="fa fa-edit"></i></a>
                <form action="{{ route('degree_levels.destroy', $degree->id) }}" method="POST"
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
<!-- Modal -->
<div class="modal fade" id="excelImport" tabindex="-1" role="dialog" aria-labelledby="excelImportLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="excelImportLabel">Education Levels Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        {!! Form::open(['route' => 'degree_levels.import', 'method'=>'POST', 'enctype'=>'multipart/form-data',
        'id'=>'import_form','files'=>true]) !!}

        <div class="form-group import-file">
          {!! Form::file('import_file', ['id' => 'import_file', 'class'=>'text-center']); !!}
        </div>

        <div class="form-group text-center">
          <a href="{{asset('/sample-import/education_level_sample_import.xlsx')}}"> <i class="fas fa-download"></i>
            Download Sample File </a>
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

@push('scripts')
<script>
  $('.sorting').on('blur',function(e){    
      var id = $(this).data('id');
      console.log(id);
      var next_id = id+1;
      var value = $(this).val();
      console.log(value);
      $.ajax({
        method : "POST",
        url: "{{ url('admin/sort-degree-level') }}/"+id,
        data : {
                "_token": "{{ csrf_token() }}",
                sorting : value
              },
        success : function(data){
              if (data.success) {
              console.log('Successfully');
              $(e.target)
              .closest('tr')
              .nextAll('tr:not(.group)')
              .first()
              .find('.sorting');
              // .focus();
            }
        }
      })
    
  })
</script>
@endpush