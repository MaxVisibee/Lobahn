@extends('admin.layouts.master')

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item active">Suitability Ratios</li>
    </ol>
    <!-- end breadcrumb -->
    {{-- begin page-header --}}
    <h4 class="bold content-header"> Suitability Ratio Management</h4>

    <hr class="mt-0">

    @can('admin-create')
        {{-- <div class="row m-b-10">
  <div class="col-lg-12">
    <a class="btn btn-primary" href="{{ route('suitability-ratios.create') }}"><i class="fa fa-plus"></i> Create Suitability Ratio</a>
  </div>
</div> --}}
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
                    <h4 class="panel-title">Ratio List</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                            data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                            data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                            data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <!-- end panel-heading -->

                <!-- begin panel-body -->
                <div class="panel-body">
                    <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th class="text-nowrap">Ratio Name</th>
                                <th class="text-nowrap">Talent Number</th>
                                <th class="text-nowrap">Talent Percent</th>
                                <th class="text-nowrap">Position Number</th>
                                <th class="text-nowrap">Position Percent</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($ratios as $key=>$ratio)
                                <tr class="odd gradeX">
                                    <td width="1%" class="f-s-600 text-inverse">{{ $key + 1 }}</td>
                                    <td>{{ $ratio->name }}</td>
                                    <td>{{ $ratio->talent_num }}</td>
                                    <td>{{ $ratio->talent_percent }}%</td>
                                    <td>{{ $ratio->position_num }}</td>
                                    <td>{{ $ratio->position_percent }}%</td>
                                    <td>
                                        @can('admin-edit')
                                            <a class="btn btn-warning btn-icon btn-circle"
                                                href="{{ route('suitability-ratios.edit', $ratio->id) }}"> <i
                                                    class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('admin-delete')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['suitability-ratios.destroy', $ratio->id], 'style' => 'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger btn-icon btn-circle"
                                                data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class='fas fa-times'></i>
                                            </button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr class="odd gradeX">
                                    <td class='text-center'> Empty Ratio Record! </td>
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
