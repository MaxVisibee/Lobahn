@extends('admin.layouts.master')
@section('content')
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Employer</li>
    </ol>
    <h4 class="bold content-header">Employer Management<small> </small></h4>
    <hr class="mt-0">
    @can('company-create')
        {{-- <div class="row m-b-10">
            <div class="col-lg-12">
                <a class="btn btn-green" href="{{ route('companies.create') }}"><i class="fa fa-plus"></i> Create
                    Employer</a>
                <button id="delete" class="delete btn btn-danger float-right">
                    <i class="fa fa-trash"></i>
                    Delete
                </button>
            </div>
        </div> --}}
    @endcan
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Employer List</h4>
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
                <div class="panel-body table-responsive">
                    <table id="data-table-responsive"
                        class="table table-striped table-bordered table-td-valign-middle table-responsive">
                        <thead>
                            <tr>
                                <th class="no-sort check">
                                    <input type="checkbox" id="checkbox" class="check" name="checkbox"
                                        value="checkbox">
                                </th>
                                <th class="text-nowrap">No.</th>
                                <th class="text-nowrap">Employer Name</th>
                                <th class="text-nowrap">User Name</th>
                                <th class="text-nowrap">Office Email</th>
                                <th class="text-nowrap no-sort">Office Phone</th>
                                <th class="no-sort">Active Status</th>
                                {{-- <th class="no-sort">Payment Status</th>
                                <th class="no-sort">Account Status</th> --}}
                                {{-- <th class="text-nowrap">Main Industry</th> --}}
                                <th class="no-sort check sticky right-col-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($companies as $key=>$company)
                                <tr class="odd gradeX">
                                    <td data-ordering="false">
                                        <input type="checkbox" data.value="{{ $company->id }}" id="check_delete[]"
                                            class="check" name="check_delete[]" value="{{ $company->id }}">
                                    </td>
                                    <td width="1%" class="f-s-600 text-inverse">{{ $key + 1 }}</td>
                                    <td>
                                        @if ($company->company_name)
                                            {{ $company->company_name }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($company->user_name)
                                            {{ $company->user_name }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($company->email)
                                            {{ $company->email }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($company->phone)
                                            {{ $company->phone }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td>
                                    <td>
                                        <center>
                                            @if ($company->is_active)
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
                                    {{-- <td>
                                        @php
                                            $payment = DB::table('payments')
                                                ->where('company_id', $company->id)
                                                ->latest('id')
                                                ->first();
                                        @endphp
                                        @isset($payment)
                                            @if ($payment->is_charged)
                                                <strong class="text-green"> Charged </strong>
                                            @elseif($payment->is_refund)
                                                <strong class="text-warning"> Refurned </strong>
                                            @else
                                                <a href="{{ url('charge/' . $payment->id) }}" class="btn btn-green  btn-block"
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
                                            @if ($company->verification_token)
                                                <strong class="text-red"> Not Verify </strong>
                                            @elseif ($company->is_active)
                                                <a href="{{ route('companies.lock', $company->id) }}"
                                                    class="btn btn-yellow btn-block"
                                                    onclick="return confirm('Are you sure want to lock this candidte?')">Lock</a>
                                            @else
                                                <a href="{{ route('companies.lock', $company->id) }}"
                                                    class="btn btn-green  btn-block"
                                                    onclick="return confirm('Are you sure want to unlock this candidte?')">Unlock</a>
                                            @endif
                                        </center>
                                    </td> --}}
                                    {{-- <td>
                                        @if (isset($company->industry->industry_name))
                                            {{ $company->industry->industry_name }}
                                        @else
                                            <p class="text-red font-weight-bold mt-3">no data</p>
                                        @endif
                                    </td> --}}
                                    <td class="sticky right-col-1">
                                        <a class="btn btn-success btn-icon btn-circle"
                                            href="{{ route('companies.show', $company->id) }}"> <i
                                                class="fa fa-eye"></i></a>
                                        @can('company-edit')
                                            <!-- <a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}"><i class="far fa-lg fa-fw fa-edit"></i></a> -->
                                            <a class="btn btn-warning btn-icon btn-circle"
                                                href="{{ route('companies.edit', $company->id) }}"> <i
                                                    class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('company-delete')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['companies.destroy', $company->id], 'style' => 'display:inline']) !!}
                                            <!-- <button type="submit" class="btn btn-danger"><i class="far fa-lg fa-fw fa-trash-alt"></i></button> -->
                                            <button type="submit" class="btn btn-danger btn-icon btn-circle"
                                                data-toggle="tooltip" data-placement="top" title="Delete"
                                                onclick="return confirm('Are you sure you would like to delete selected data permently?');">
                                                <i class='fas fa-times'></i>
                                            </button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
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
            $('.delete').on('click', function(e) {
                var val = [];
                $(':checkbox:checked').each(function(i) {
                    val[i] = $(this).val();
                });

                $.ajax({
                    method: "POST",
                    url: "{{ url('admin/companies/destroy-all') }}",
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
            padding-right: 60px !important;
        }

        .no-sort {
            /*pointer-events: none !important;*/
            cursor: default !important;
            padding-right: 60px !important;
        }

        .check {
            padding-right: 5px !important;
        }

        .sorting {
            padding-right: 0px !important;
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
