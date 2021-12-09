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

          <div class="list-header">
            <div class="record-count float-left">
              <div class="hrTotalRecords">Total Record(s) :</div>
              <div class="hrTotalRecordsCount">{{ $city_count }}</div>
            </div>
  
            <div class="search-wrapper float-right mb-3">
  
              <form action="" method="get" class="filter-form form-inline">
                <div class="form-group mr-2">
                  {!! Form::select('country', $countries, $country->id, ['class'=>'form-control', 'id'=>'country']) !!}
                </div>
                <div class="form-group mr-2">
                  {!! Form::select('state', $states, $state, ['class'=>'form-control', 'id'=>'state']) !!}
                </div>
                <div class="form-group mr-2">
                  <input type="text" name="search" class="form-control" placeholder="Search" id="searchDatatable">  
                </div>
                
              </form>
  
            </div>
          </div>
          
          <!-- Search End -->
          <table class="table table-striped table-bordered datatable table-td-valign-middle">
            <thead>
              <tr>
                <th width="1%">No.</th>
                <th class="text-nowrap">District Name</th>
                <th class="text-nowrap">Area Name</th>
                <th class="text-nowrap">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $key=>$district)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $district->district_name ?? '-' }}</td>
                <td>{{ $district->area->area_name ?? '-' }}</td>
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
  .dataTables_wrapper .dataTables_filter {
    display: none !important;
  }
  .mr-2 {
    margin-right: 15px;
  }
  .mb-3 {
    margin-bottom: 20px;
  }
  .list-header {
    float: left;
    width: 100%;
  }
</style>
@endpush

@push('scripts')
<script>
  $(function() {
    var datatable = $('.datatable').DataTable({
			    			"bInfo" : false,
			    			"bLengthChange": false,
                "bRetrieve": 'true',
			    			"pageLength": 5,
			    			"ordering": false,
			    			"autoWidth": false,
			    			"language": {
			    				"oPaginate": {
			    					"sNext": "<i class='fa fa-angle-double-right'></i>",
			    					"sPrevious": "<i class='fa fa-angle-double-left'></i>"
			    				}
			    			},
		});

    $('#searchDatatable').on('keyup', function () {
			    datatable.search(this.value).draw();
		});

    $('#country').select2();
    $('#state').select2();

    $('#country').on('change', function () {
        filterStates();
    });
   
    $(document).on('change', '#state', function () {
        $('.filter-form').submit();
    });

  });

  function filterStates()
  {
        var country_id = $('#country').val();
        if (country_id != '') {
            $.ajax({
                type:'get',
                url:"{{ route('filter.states') }}",
                data:{
                    country_id:country_id
                },
                success:function(response){
                    if(response.status == 200) {
                        $("#state").empty();

                        $("#state").select2({
                            placeholder: "Select State...",
                            data: response.data,
                        });
                        var first_val = response.data[0].id;
                        
                        $("#state").select2({first_val}).trigger('change');
                    }
                }
            });
        }
  }

    function filterCities()
    {
        var state_id = $('#state').val();
        if (state_id != '') {
            $.ajax({
                type:'get',
                url:"{{ route('filter.cities.datatable') }}",
                data:{
                    state_id:state_id
                },
                success:function(response){
                    if(response.status == 200) {
                        console.log(response.data);
                    }
                }
            });
        }
    }
  
</script>
@endpush