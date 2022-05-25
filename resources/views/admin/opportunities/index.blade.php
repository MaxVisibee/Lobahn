@extends('admin.layouts.master')
@section('content')
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Job Opportunity</li>
    </ol>
    <h4 class="bold content-header"> JobOpportunity Management<small> </small></h4>
    <div id="footer" class="footer" style="margin-left: 0px"></div>
    <div class="row m-b-10">
        <div class="col-lg-12">
            <div class="float-xl-left">
                <a class="btn btn-green" href="{{ route('opportunities.create') }}"><i class="fa fa-plus"></i>
                    Create New
                    JobOpportunity</a>
            </div>
            <div class="float-xl-right">
                <button id="delete" class="delete btn btn-danger" type="button"
                    onclick="return confirm('Are you sure you would like to delete selected data permently?');">
                    Delete
                </button>
            </div>
        </div>
    </div>
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12-->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <!-- Job Opportunity Managements -->
                    </h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                            data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                            data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                            data-click="panel-collapse"><i class="fa fa-minus"></i></a>
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
                                <th class="no-sort check">
                                    <input type="checkbox" id="checkbox" class="check" name="checkbox"
                                        value="checkbox">
                                </th>
                                <th width="1%">No.</th>
                                <th class="text-nowrap" width="10%">Title</th>
                                <th class="text-nowrap" width="10%">Location</th>
                                <th class="text-nowrap" width="10%">Employer</th>
                                <th class="text-nowrap" width="10%">Position</th>
                                <th class="text-nowrap" width="10%">Main Industry</th>
                                <th class="text-nowrap" width="10%">Fulltime Salary - min</th>
                                <th class="text-nowrap" width="10%">Fulltime Salary - max</th>
                                <th class="text-nowrap" width="10%">Status</th>
                                <th class="text-nowrap" width="10%">Expire On</th>
                                <th class="text-nowrap no-sort sticky right-col-1" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($data as $key => $job)
                                <tr>
                                    <td>
                                        <input type="checkbox" data.value="{{ $job->id }}" id="check_delete[]"
                                            class="check" name="check_delete[]" value="{{ $job->id }}">
                                    </td>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $job->title ?? '-' }}</td>
                                    <td>
                                        @if (isset($job->country->country_name))
                                            {{ $job->country->country_name }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif 
                                    </td>
                                    <td>
                                        @if (isset($job->company->company_name))
                                            {{ $job->company->company_name }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($job->job_title_id != 'null' && $job->job_title_id != null)
                                            @foreach ($job->jobPositions as $job_title)
                                                {{ $job_title->job_title }} @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($job->sub_sector_id != 'null' && $job->sub_sector_id != null)
                                            @foreach ($job->sectorUsage as $subsector)
                                                {{ $subsector->sub_sector_name }} @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($job->full_time_salary)
                                            {{ $job->full_time_salary }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($job->full_time_salary_max)
                                            {{ $job->full_time_salary_max }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        <center>
                                            @if ($job->is_active)
                                                <span class="badge badge-green">
                                                    Open
                                                </span>
                                            @else
                                                <span class="badge badge-danger">
                                                    Closed
                                                </span>
                                            @endif
                                        </center>
                                    </td>
                                    <td>
                                        @isset($job->expire_date)
                                            {!! date('d-M-Y', strtotime($job->expire_date)) ?? '-' !!}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endisset
                                    </td>
                                    <td class="sticky right-col-1">
                                        <a class="btn btn-success btn-icon btn-circle"
                                            href="{{ route('opportunities.show', $job->id) }}"><i
                                                class="fas fa-eye"></i></a>
                                        <a class="btn btn-warning btn-icon btn-circle"
                                            href="{{ route('opportunities.edit', $job->id) }}"> <i
                                                class="fa fa-edit"></i></a>
                                        <form action="{{ route('opportunities.destroy', $job->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger btn-icon btn-circle"
                                                data-toggle="tooltip" data-placement="top" title="Delete"
                                                onclick="return confirm('Are you sure you would like to delete selected data permently?');">
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
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
            class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
@endsection

@push('css')
    <style>
        table.dataTable thead>tr>th.sorting_asc,
        table.dataTable thead>tr>th.sorting_desc,
        table.dataTable thead>tr>th.sorting,
        table.dataTable thead>tr>td.sorting_asc,
        table.dataTable thead>tr>td.sorting_desc,
        table.dataTable thead>tr>td.sorting {
            padding-right: 20px;
        }

        .no-sort::after {
            display: none !important;
            padding-right: 0px !important;
        }

        .no-sort {
            /*pointer-events: none !important;*/
            cursor: default !important;
            padding-right: 65px !important;
        }

        .check {
            padding-right: 5px !important;
        }

        .sticky {
          position: sticky !important;
          background: #fff;
          z-index: 1;
          width: 95px;
        }

        .right-col-1 {
          right: 0;
          border-left: 1px solid #eee !important;
        }

    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.delete').on('click', function(e) {
                var val = [];
                $(':checkbox:checked').each(function(i) {
                    val[i] = $(this).val();
                });

                $.ajax({
                    method: "POST",
                    url: "{{ url('admin/opportunities/destroy') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        data: val
                    },
                    success: function(data) {
                        if (data.success) {
                            location.reload();
                        }
                    }
                })

            });
            $("th input[type='checkbox']").on("change", function() {
                var cb = $(this), //checkbox that was changed
                    th = cb.parent(), //get parent th
                    col = th.index() + 1; //get column index. note nth-child starts at 1, not zero
                $("tbody td:nth-child(" + col + ") input").prop("checked", this
                    .checked); //select the inputs and [un]check it
            });
        });
    </script>
@endpush
