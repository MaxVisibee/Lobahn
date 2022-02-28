@extends('admin.layouts.master')
@section('content')
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item active">Payment</li>
    </ol>
    <h4 class="bold content-header"> Payment Transitions<small> </small></h4>
    <div id="footer" class="footer" style="margin-left: 0px"></div>
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
                    <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th class="text-nowrap">Stripe ID</th>
                                <th class="text-nowrap">Client Name</th>
                                <th class="text-nowrap">Amount</th>
                                <th class="text-nowrap" width="15%">Status</th>
                                <th class="text-nowrap">transitioned At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $key => $payment)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $payment->payment_id ?? '- charged -' }}</td>
                                    <td>
                                        @isset($payment->user_id)
                                            {{ $payment->user->name }}
                                        @else
                                            {{ $payment->company->company_name }}
                                        @endisset
                                    </td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>
                                        <center>
                                            @if ($payment->is_charged)
                                                <button class="btn btn-default disabled">charged</button>
                                            @else
                                                <button
                                                    onclick="window.location='{{ route('payments.show', $payment->id) }}'"
                                                    class="btn btn-yellow">not charged</button>
                                            @endif
                                        </center>
                                    </td>
                                    <td>{{ $payment->created_at->diffForHumans() }}</td>
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
@endsection
