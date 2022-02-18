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
        <li class="breadcrumb-item active">Candidate</li>
    </ol>
    <!-- end breadcrumb -->
    {{-- begin page-header --}}
    <h4 class="bold content-header">Candidate Management<small> </small></h4>

    <hr class="mt-0">

    @can('user-create')
        <div class="row m-b-10">
            <div class="col-lg-12">
                {{-- <a class="btn btn-primary" href="{{ route('seekers.create') }}"><i class="fa fa-plus"></i>Create Candidate</a> --}}
                <button id="delete" class="delete btn btn-danger float-right">
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
                    <h4 class="panel-title">Candidate List</h4>
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

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

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
                                <th width="100%" class="no-sort">Action</th>
                                <th width="1%">No.</th>
                                <th class="text-nowrap">Name</th>
                                <th class="text-nowrap">User Name</th>
                                <th class="text-nowrap">Email</th>
                                <th class="text-nowrap">Phone</th>
                                <th class="text-nowrap">Location</th>
                                <th class="text-nowrap">Position titles</th>
                                <th class="text-nowrap">Industry sector</th>
                                <th class="text-nowrap">Target Salary</th>
                                <th class="text-nowrap">Education Level</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($users as $key=>$user)
                                <tr class="odd gradeX">
                                    <td data-ordering="false">
                                        <input type="checkbox" data.value="{{ $user->id }}" id="check_delete[]"
                                            class="check" name="check_delete[]" value="{{ $user->id }}">
                                    </td>
                                    <td width="100%">
                                        <a class="btn btn-success btn-icon btn-circle float-xl-right"
                                            href="{{ route('seekers.show', $user->id) }}"><i
                                                class="fas fa-eye"></i></a>
                                        @can('user-edit')
                                            <a class="btn btn-warning btn-icon btn-circle float-xl-right"
                                                href="{{ route('seekers.edit', $user->id) }}"> <i
                                                    class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('user-delete')
                                            <a class="float-xl-right">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['seekers.destroy', $user->id], 'style' => 'display:inline']) !!}
                                                <button type="submit" class="btn btn-danger btn-icon btn-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class='fas fa-times'></i>
                                                </button>
                                                {!! Form::close() !!}
                                            </a>
                                        @endcan
                                    </td>
                                    <td width="1%" class="f-s-600 text-inverse">{{ $key + 1 }}</td>
                                    <td>{{ $user->name ?? 'no data' }}</td>
                                    <td>{{ $user->user_name ?? 'no data' }}</td>
                                    <td>{{ $user->email ?? 'no data' }}</td>
                                    <td>{{ $user->phone ?? 'no data' }}</td>
                                    <td>
                                        @if ($user->country_id != 'null' && $user->country_id != null)
                                            @foreach ($user->countries as $country)
                                                {{ $country->country_name }} @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @else
                                            {{ 'no data' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->position_title_id != 'null' && $user->position_title_id != null)
                                            @foreach ($user->JobTitles as $job_title)
                                                {{ $job_title->job_title }} @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @else
                                            {{ 'no data' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->sub_sector_id != 'null' && $user->sub_sector_id != null)
                                            @foreach ($user->subsectors as $subsector)
                                                {{ $subsector->sub_sector_name }} @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @else
                                            {{ 'no data' }}
                                        @endif
                                    </td>
                                    <td>{{ $user->target_salary ?? 'no data' }}</td>
                                    <td>{{ $user->degree->degree_name ?? 'no data' }}</td>

                                </tr>
                            @empty
                                <tr class="odd gradeX">
                                    <td colspan="7" class='text-center'> Empty User Record! </td>
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


            $('.delete').on('click', function(e) {
                var val = [];
                $(':checkbox:checked').each(function(i) {
                    val[i] = $(this).val();
                });

                $.ajax({
                    method: "POST",
                    url: "{{ url('admin/seekers/destroy-all') }}",
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
