@extends('admin.layouts.master')


@section('content')
    <!-- begin #content -->
    <!-- <div id="content" class="content"> -->
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:;">Coupon</a></li>
    </ol>
    <!-- end breadcrumb -->

    <!-- begin page-header -->
    <h4 class="bold content-header">Mail Management<small> </small></h4>
    <div id="footer" class="footer" style="margin-left: 0px"></div>
    <div class="row m-b-10">
        <div class="col-lg-12">
            <div>

            </div>
        </div>
    </div>



    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- begin row -->
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Create New Coupon
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
                    <form method="POST" action="/admin/mail" id="mailForm">
                        @csrf
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4 mb-5 bg-info py-4">
                                <div class="form-check pl-5">
                                    <center>
                                        <input class="form-check-input" type="radio" name="type" value="candidate"
                                            id="type1" checked style="height: 20px; width: 20px;">
                                        <label class="form-check-label mt-2 pl-2" for="type1">
                                            <strong class="text-white"> Only Candidate </strong>
                                        </label>
                                    </center>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 mb-5 bg-primary py-4">
                                <div class="form-check">
                                    <center>
                                        <input class="form-check-input" type="radio" name="type" value="coporate" id="type2"
                                            style="height: 20px; width: 20px;">
                                        <label class="form-check-label mt-2 pl-2" for="type2">
                                            <strong class="text-white"> Only Coporate </strong>
                                        </label>
                                    </center>
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4 mb-5 bg-blue py-4">
                                <div class="form-check">
                                    <center>
                                        <input class="form-check-input" type="radio" name="type" value="both" id="type3"
                                            style="height: 20px; width: 20px;">
                                        <label class="form-check-label mt-2 pl-2" for="type3">
                                            <strong class="text-white"> Both Candidate and Coporate </strong>
                                        </label>
                                    </center>
                                </div>
                            </div>

                        </div>

                        <!-- Candidate Form -->
                        <div class="row" id="candidate">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h4>Candidate </h4>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Institution</strong>
                                    {!! Form::select('institutions[]', $institutions, isset($institutions) ? $institutions : null, ['class' => 'form-control', 'id' => 'institutions', 'multiple']) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Study Field</strong>
                                    {!! Form::select('studyfields[]', $studyfields, isset($studyfields) ? $studyfields : null, ['class' => 'form-control', 'id' => 'studyfields', 'multiple']) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Industry</strong>
                                    {!! Form::select('industries[]', $industries, isset($industries) ? $industries : null, ['class' => 'form-control', 'id' => 'industries', 'multiple']) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Job Title</strong>
                                    {!! Form::select('job_titles[]', $job_titles, isset($job_titles) ? $job_titles : null, ['class' => 'form-control', 'id' => 'position_title_id', 'multiple']) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Job Experience</strong>
                                    <select id="experience" name="experience" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($job_experiences as $job_experience)
                                            <option value="{{ $job_experience->priority }}"
                                                data-grade="{{ $job_experience->job_experience }}">
                                                {{ $job_experience->job_experience }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Functional Area</strong>
                                    {!! Form::select('areas[]', $areas, isset($areas) ? $areas : null, ['class' => 'form-control', 'id' => 'areas', 'multiple']) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Employment Terms</strong>
                                    {!! Form::select('terms[]', $terms, isset($terms) ? $terms : null, ['class' => 'form-control', 'id' => 'terms', 'multiple']) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Qualification</strong>
                                    {!! Form::select('qualifications[]', $qualifications, isset($qualifications) ? $qualifications : null, ['class' => 'form-control', 'id' => 'qualifications', 'multiple']) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Country</strong>
                                    {!! Form::select('countries[]', $countries, isset($countries) ? $countries : null, ['class' => 'form-control', 'id' => 'countries', 'multiple']) !!}
                                </div>
                            </div>

                            {{-- <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Gender</strong>
                                    <select id="gender" name="gender" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Male" data-grade="Male">
                                            Male
                                        </option>
                                        <option value="Female" data-grade="Female">
                                            Female
                                        </option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>

                        <!-- Coporate Form -->
                        <div class="row mt-3" id="coporate">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h4>Coporate </h4>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Industry</strong>
                                    {!! Form::select('coporate_industries[]', $industries, isset($industries) ? $industries : null, ['class' => 'form-control', 'id' => 'coporate_industries', 'multiple']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Country</strong>
                                    {!! Form::select('coporate_countries[]', $countries, isset($countries) ? $countries : null, ['class' => 'form-control', 'id' => 'coporate_countries', 'multiple']) !!}
                                </div>
                            </div>
                        </div>

                        <br />
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <p class="pull-right">
                                    <strong class="alalysis-report hide"></strong>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <a href="{{ url('admin/mail-export') }}"
                                        class="btn btn-green btn-lg mr-3 email-export-btn hide"> Export Analysised Email</a>

                                    <button type="button" id="analysis" class="btn btn-blue btn-lg">Email
                                        Analysis</button>

                                </div>
                            </div>
                        </div>
                        <!-- Mail -->

                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>Message Title</strong>
                                <input type="text" class="form-control" name="subject">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>Schedule Mail</strong>
                                <input type="date" name="date" value="" min="" max="" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Message Body</strong>
                                <textarea class="body form-control" aria-label="With textarea" name="body"
                                    style="width: 100%"></textarea>
                            </div>
                        </div>

                        <br />
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary btn-lg mr-3">Send Email</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end panel-body -->
            </div>
        </div>
    @endsection

    @push('scripts')
        <!--  summernote cdn -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                $('#position_title_id').select2({
                    placeholder: "Select Position Title"
                });
                $('#institutions').select2({
                    placeholder: "Select Institution"
                });
                $('#studyfields').select2({
                    placeholder: "Select Field of Study"
                });
                $('#industries').select2({
                    placeholder: "Select Industries"
                });
                $('#areas').select2({
                    placeholder: "Select Functional Areas"
                });
                $('#qualifications').select2({
                    placeholder: "Select Qualifications"
                });
                $('#terms').select2({
                    placeholder: "Select Employment Terms"
                });
                $('#countries').select2({
                    placeholder: "Select Countries"
                });

                $('#coporate_industries').select2({
                    placeholder: "Select Industries"
                });
                $('#coporate_countries').select2({
                    placeholder: "Select Countries"
                });


                // initilize style 
                $('#candidate').show();
                $('#coporate').hide();

                // toggel forms 
                $('#mailForm input').on('change', function() {
                    $('.alalysis-report').addClass('hide');
                    $('.email-export-btn').addClass('hide');
                    if ($('input[name=type]:checked', '#mailForm').val() == "candidate") {
                        //alert("candidate");
                        $('#candidate').show();
                        $('#coporate').hide();
                    } else if ($('input[name=type]:checked', '#mailForm').val() == "coporate") {
                        //alert("coporate");
                        $('#coporate').show();
                        $('#candidate').hide();
                    } else {
                        //alert("both");
                        $('#candidate').show();
                        $('#coporate').show();
                    }
                });

                // Analysis 

                $('#analysis').click(function(e) {
                    e.preventDefault();
                    var form = $('#mailForm')[0];
                    var data = new FormData(form);
                    data.append("_token", "{{ csrf_token() }}");
                    $.ajax({
                        type: "POST",
                        url: 'mail-analysis',
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response.data);
                            $('.email-export-btn').removeClass('hide');
                            $('.alalysis-report').removeClass('hide');
                            $('.alalysis-report').text(" Total " + response.msg +
                                " account(s) found on this filter !")
                        }
                    });
                });
                // Summer Note
                $('textarea.body').summernote({
                    height: 300,
                    toolbar: [
                        ["style", ["style"]],
                        ["font", ["bold", "italic", "underline", "fontname", "strikethrough", "superscript",
                            "subscript", "clear"
                        ]],
                        ["color", ["forecolor", "backcolor", "color"]],
                        ["paragraph", ["ul", "ol", "paragraph", "height"]],
                        ["table", ["table"]],
                        ["insert", ["link", "picture", "video"]],
                    ]

                });


            });
        </script>
    @endpush
