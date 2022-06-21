@extends('admin.layouts.master')

@section('content')

    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Candidate</li>
    </ol>
    <!-- end breadcrumb -->
    {{-- begin page-header --}}
    <h4 class="bold content-header">Candidate Management<small> </small></h4>

    <hr class="mt-0">

    @can('user-create')
        <div class="row m-b-10">
            <div class="col-lg-12">
                <a class="btn btn-green" href="{{ route('seekers.create') }}"><i class="fa fa-plus"></i> New Candidate</a>
                {{-- <button onclick="return confirm('Are you sure you would like to delete selected data permently?');" id="delete"
                    class="delete btn btn-danger float-right">
                    <i class="fa fa-trash"></i>
                    Delete
                </button> --}}
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
                                    <input type="checkbox" id="checkbox" class="check" name="checkbox" value="checkbox">
                                </th>
                                <th width="1%">No.</th>
                                <th class="text-nowrap">Name</th>
                                <th width="1%">Type</th>
                                <th class="text-nowrap">User Name</th>
                                <th class="text-nowrap">Email</th>
                                <th class="text-nowrap">Phone</th>
                                <th class="text-nowrap">Location</th>
                                <th class="text-nowrap">Position titles</th>
                                <th class="text-nowrap">Industry sector</th>
                                <th class="text-nowrap">Target Salary</th>
                                <th class="text-nowrap">Education Level</th>
                                <th class="text-nowrap no-sort  right-col-1">Active Status</th>
                                {{-- <th class="text-nowrap no-sort  right-col-1">Payment Status</th>
                                <th class="text-nowrap no-sort  right-col-1">Account Status</th> --}}
                                <th width="100%" class="no-sort sticky right-col-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $key=>$user)
                                <tr class="odd gradeX">
                                    <td data-ordering="false" class="f-s-600 text-inverse">
                                        <input type="checkbox" data.value="{{ $user->id }}" id="check_delete[]"
                                            class="check" name="check_delete[]" value="{{ $user->id }}">
                                    </td>
                                    <td width="1%" class="f-s-600 text-inverse">{{ $key + 1 }}</td>
                                    <td>
                                        @if ($user->name)
                                            {{ $user->name }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $user->is_trial == 1 ? 'Free Trial' : 'Membership' }}
                                    </td>

                                    <td>
                                        @if ($user->user_name)
                                            {{ $user->user_name }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->email)
                                            {{ $user->email }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->phone)
                                            {{ $user->phone }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $user->country->country_name ?? 'no data' }}
                                        {{-- @if ($user->country_id != 'null' && $user->country_id != null)
                                            @foreach ($user->countries as $country)
                                                {{ $country->country_name }} @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif --}}
                                    </td>
                                    <td>
                                        @if ($user->position_title_id != 'null' && $user->position_title_id != null)
                                            @foreach ($user->JobTitles as $job_title)
                                                {{ $job_title->job_title }} @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->industry_id != 'null' && $user->industry_id != null)
                                            @foreach ($user->industries as $industry)
                                                {{ $industry->industry_name }} @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->full_time_salary)
                                            HDK {{ $user->full_time_salary }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($user->degree->degree_name))
                                            {{ $user->degree->degree_name }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td width="100%" class="right-col-1">
                                        <center>
                                            @if ($user->is_active)
                                                <span class="badge badge-green">
                                                    active
                                                </span>
                                            @else
                                                <span class="badge badge-danger">
                                                    not-active
                                                </span>
                                            @endif
                                        </center>
                                    </td>
                                    {{-- <td width="100%" class="right-col-1 text-center">
                                        @php
                                            $payment = DB::table('payments')
                                                ->where('user_id', $user->id)
                                                ->latest('id')
                                                ->first();
                                        @endphp
                                        @isset($payment)
                                            @if ($payment->is_charged)
                                                <strong class="text-green"> Charged </strong>
                                            @elseif($payment->is_refund)
                                                <strong class="text-warning"> Refurned </strong>
                                            @else
                                                <a href="{{ url('charge/' . $payment->id) }}"
                                                    class="btn btn-green  btn-block"
                                                    onclick="return confirm('Are you sure want to charge from this candidte?')">Charge
                                                </a>
                                                <a href="{{ url('refund/' . $payment->id) }}" class="btn btn-red  btn-block"
                                                    onclick="return confirm('Are you sure want to refund from this candidte?')">Refund
                                                </a>
                                            @endif
                                        @endisset
                                    </td>
                                    <td width="100%" class="sticky right-col-2">
                                        <center>
                                            @if ($user->verification_token)
                                                <strong class="text-red"> Not Verify </strong>
                                            @elseif ($user->is_active)
                                                <a href="{{ route('seekers.lock', $user->id) }}"
                                                    class="btn btn-yellow btn-block"
                                                    onclick="return confirm('Are you sure want to lock this candidte?')">Lock</a>
                                            @else
                                                <a href="{{ route('seekers.lock', $user->id) }}"
                                                    class="btn btn-green  btn-block"
                                                    onclick="return confirm('Are you sure want to unlock this candidte?')">Unlock</a>
                                            @endif
                                        </center>
                                    </td> --}}
                                    <td width="100%" class="sticky right-col-1">
                                        <a class="btn btn-success btn-icon btn-circle float-xl-right"
                                            href="{{ route('seekers.show', $user->id) }}"><i class="fas fa-eye"></i></a>
                                        @can('user-edit')
                                            <a class="btn btn-warning btn-icon btn-circle float-xl-right"
                                                href="{{ route('seekers.edit', $user->id) }}"> <i class="fa fa-edit"></i></a>
                                        @endcan

                                        <a class="float-xl-right">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['seekers.destroy', $user->id], 'style' => 'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger btn-icon btn-circle"
                                                onclick="return confirm('Are you sure you would like to delete selected data permently?');"
                                                data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class='fas fa-times'></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="odd gradeX">
                                    <td colspan="14" class='text-center'> Empty User Record! </td>
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

@push('css')
    <style>
        .no-sort::after {
            display: none !important;
            padding-right: 0px !important;
        }

        .no-sort {
            /*pointer-events: none !important;*/
            cursor: default !important;
            padding-right: 60px !important;
        }

        .check {
            padding-right: 5px !important;
        }

        .sticky {
            position: sticky !important;
            background: #fff;
            z-index: 1;
        }

        .right-col-1 {
            right: 0;
            border-left: 1px solid #eee !important;
        }
    </style>
@endpush
