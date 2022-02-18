@extends('admin.layouts.master')
@section('content')
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">Activity Log</li>
    </ol>
    <h4 class="bold content-header">Activity Log<small></small></h4>
    <div id="footer" class="footer" style="margin-left: 0px"></div>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    </h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                            data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                            data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                            data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th class="text-nowrap">Action</th>
                                <th class="text-nowrap">Subject</th>
                                <th class="text-nowrap">Subject - id</th>
                                <th class="text-nowrap">Causer</th>
                                <th class="text-nowrap">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $key => $log)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        <span
                                            class="font-weight-bold @if ($log->description == 'deleted') text-danger 
                                            @elseif($log->description == 'created') text-green @elseif($log->description == 'updated') text-primary @endif">
                                            {{ strtoupper($log->description) }}
                                        </span>
                                    </td>
                                    @php $subject = explode('\\', $log->subject_type) @endphp
                                    <td>{{ $subject[2] }}</td>
                                    <td>{{ $log->subject_id }}</td>
                                    <td>{{ DB::table('admins')->where('id', $log->causer_id)->pluck('name')[0] ?? '' }}
                                    </td>
                                    <td>{{ date('d M Y / h:i A ', strtotime($log->created_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
            class="fa fa-angle-up"></i></a>
    </div>
@endsection

@push('css')
    <style>
    </style>
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            //
        });
    </script>
@endpush
