@extends('admin.layouts.master')

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">JSR Score Calculation</li>
    </ol>
    <!-- end breadcrumb -->
    {{-- begin page-header --}}
    <h4 class="bold content-header">JSR Score Calculation<small> </small></h4>
    <hr class="mt-0">
    {{-- end page-header --}}

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Calculation</h4>
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
                    <form action="{{ route('score-calculation-result') }}" method="post" id="calculationForm">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group m-b-15">
                                    <strong>Candidate:</strong>
                                    {{-- {!! Form::select('contract_term_id[]', null, ['class' => 'form-control', 'id' => 'contract_term_id']) !!} --}}
                                    <select name="seeker" id="mySelectBox" class="form-control select2" required>
                                        @foreach ($seekers as $seeker)
                                            <option value="{{ $seeker->id }}">{{ $seeker->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <a href="" class="hidden btn btn-success" hidden>View Detail</a>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group m-b-15">
                                    <strong>Corporate :</strong>
                                    {{-- {!! Form::select('contract_term_id[]', null, ['class' => 'form-control', 'id' => 'contract_term_id']) !!} --}}
                                    <select name="opportunity" id="" class="form-control select2" required>
                                        @foreach ($opportunities as $opportunity)
                                            @isset($opportunity->company)
                                                <option value="{{ $opportunity->id }}">
                                                    {{ $opportunity->title }}
                                                    @isset($opportunity->ref_no)
                                                        #{{ $opportunity->ref_no }}
                                                    @endisset
                                                    ({{ $opportunity->company->company_name }})
                                                </option>
                                            @endisset
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <a href="" class="btn btn-success" hidden>View Detail</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <button class="btn btn-primary pull-right" id="calculate" type="button"> Calculate </button>
                            </div>
                        </div>
                    </form>


                    <div class="row">
                        <div class="col-md-12" id="calculation-result">
                            <p></p>
                            <p></p>
                        </div>
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
                $('#calculate').click(function() {

                    var form = $('#calculationForm')[0];
                    var data = new FormData(form);
                    data.append("_token", "{{ csrf_token() }}");
                    $.ajax({
                        type: "POST",
                        url: "{{ route('score-calculation-result') }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $('#calculation-result').find('p:first').text("The JSR Score is - " +
                                response
                                .jsr_percent)
                            var match_factors = ''
                            response.matched_factors.forEach(function(item) {
                                match_factors += item
                                match_factors += ' , '
                            })
                            if (match_factors != '')
                                $('#calculation-result').find('p:last').text("Match with " +
                                    match_factors)
                        }
                    });

                });
            });
        </script>
    @endpush
