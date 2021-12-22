@extends('admin.layouts.master')


@section('content')


    <!-- begin #content -->
    <!-- <div id="content" class="content"> -->
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Coupon</a></li>
    </ol>
    <!-- end breadcrumb -->

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
                            <div class="col-xs-4 col-sm-4 col-md-4 mb-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="candidate" id="type1"
                                        checked>
                                    <label class="form-check-label mt-1" for="type1">
                                        <strong> Only Candidate </strong>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 mb-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="coporate" id="type2">
                                    <label class="form-check-label mt-1" for="type2">
                                        <strong> Only Coporate </strong>
                                    </label>
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4 mb-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="both" id="type3">
                                    <label class="form-check-label mt-1" for="type3">
                                        <strong> Both Candidate and Coporate </strong>
                                    </label>
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
                                    <select id="institution" name="institution" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($institutions as $institution)
                                            <option value="{{ $institution->id }}"
                                                data-grade="{{ $institution->institution_name }}">
                                                {{ $institution->institution_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Study Field</strong>
                                    <select id="study_field" name="study_field" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($studyfields as $studyfield)
                                            <option value="{{ $studyfield->id }}"
                                                data-grade="{{ $studyfield->study_field_name }}">
                                                {{ $studyfield->study_field_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Industry</strong>
                                    <select id="industry" name="industry" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($industries as $industry)
                                            <option value="{{ $industry->id }}"
                                                data-grade="{{ $industry->industry_name }}">
                                                {{ $industry->industry_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Job Title</strong>
                                    <select id="job_title" name="job_title" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($job_titles as $job_title)
                                            <option value="{{ $job_title->id }}"
                                                data-grade="{{ $job_title->job_title }}">
                                                {{ $job_title->job_title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Job Experience</strong>
                                    <select id="experience" name="experience" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($job_experiences as $job_experience)
                                            <option value="{{ $job_experience->id }}"
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
                                    <select id="functional_area" name="functional_area" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($areas as $area)
                                            <option value="{{ $area->id }}" data-grade="{{ $area->area_name }}">
                                                {{ $area->area_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Employment Terms</strong>
                                    <select id="term" name="term" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($terms as $term)
                                            <option value="{{ $term->id }}" data-grade="{{ $term->job_type }}">
                                                {{ $term->job_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Qualification</strong>
                                    <select id="qualification" name="qualification" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($qualifications as $qualification)
                                            <option value="{{ $qualification->id }}"
                                                data-grade="{{ $qualification->qualification_name }}">
                                                {{ $qualification->qualification_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Country</strong>
                                    <select id="country" name="country" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                data-grade="{{ $country->country_name }}">{{ $country->country_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
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
                            </div>
                        </div>

                        <!-- Coporate Form -->
                        <div class="row mt-3" id="coporate">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h4>Coporate </h4>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Industry</strong>
                                    <select id="coporate_industry" name="coporate_industry" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($industries as $industry)
                                            <option value="{{ $industry->id }}"
                                                data-grade="{{ $industry->industry_name }}">
                                                {{ $industry->industry_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Country</strong>
                                    <select id="coporate_country" name="coporate_country" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                data-grade="{{ $country->country_name }}">{{ $country->country_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br />
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <button type="button" id="analysis" class="btn btn-info btn-lg">Email
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
                                    <button type="submit" class="btn btn-primary btn-lg">Send Now</button>
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

                // initilize style 
                $('#candidate').show();
                $('#coporate').hide();

                // toggel forms 
                $('#mailForm input').on('change', function() {
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
                            alert("Totally " + response.msg +
                                " emails found !");
                        }
                    });
                });

                // Summer Note
                $('textarea.body').summernote({
                    height: 300,
                });


            });
        </script>
    @endpush
