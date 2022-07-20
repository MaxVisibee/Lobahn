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
                            <div class="col-xs-12 col-sm-12 col-md-5">
                                <div class="form-group m-b-15">
                                    <strong>Candidate:</strong>
                                    <select name="seeker" id="mySelectBox" class="form-control select2 seeker-select"
                                        required>
                                        <option value="">Select</option>
                                        @foreach ($seekers as $seeker)
                                            <option value="{{ $seeker->id }}">{{ $seeker->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <a href="" class="hidden btn btn-success" hidden>View Detail</a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-5">
                                <div class="form-group m-b-15">
                                    <strong>Corporate :</strong>
                                    <select name="opportunity" id=""
                                        class="form-control select2 opportunity-select" required>
                                        <option value="">Select</option>
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
                        <div class="row d-none">
                            <div class="col-md-10">
                                <button class="btn btn-primary pull-right" id="calculate" type="button"> Calculate
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-md-12">
                            <section>
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6">Candidate Name:</div>
                                            <div class="col-md-6 name"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6">Opportunity Title:</div>
                                            <div class="col-md-6 name"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(1) Location</div>
                                            <div class="col-md-6 location"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(1) Location</div>
                                            <div class="col-md-6 location"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="location" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(2) Contract Terms</div>
                                            <div class="col-md-6 contract_terms"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(2) Contract Terms</div>
                                            <div class="col-md-6 contract_terms"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="contract_terms" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-12 font-weight-bold">(3) Target Salary</div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-6">&nbsp;&nbsp;&nbsp;&nbsp; Full Time Salary</div>
                                            <div class="col-md-6"> <span class="full_time_salary"></span> HDK</div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-6">&nbsp;&nbsp;&nbsp;&nbsp; Part Time Salary</div>
                                            <div class="col-md-6"><span class="part_time_salary"></span> HDK</div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-6">&nbsp;&nbsp;&nbsp;&nbsp; Freelance Salary</div>
                                            <div class="col-md-6"><span class="freelance_salary"></span> HDK</div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-12 font-weight-bold">(3) Target Salary</div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-6">&nbsp;&nbsp;&nbsp;&nbsp; Full Time Salary</div>
                                            <div class="col-md-6">
                                                <span class="full_time_salary"></span> -
                                                <span class="full_time_salary_max"></span>
                                                HDK
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-6">&nbsp;&nbsp;&nbsp;&nbsp; Part Time Salary</div>
                                            <div class="col-md-6">
                                                <span class="part_time_salary"></span> -
                                                <span class="part_time_salary_max"></span>
                                                HDK
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-6">&nbsp;&nbsp;&nbsp;&nbsp; Freelance Salary</div>
                                            <div class="col-md-6">
                                                <span class="freelance_salary"></span> -
                                                <span class="freelance_salary_max"></span>
                                                HDK
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="target_salary" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(4) Contract Hours</div>
                                            <div class="col-md-6 contract_hours"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class=" row my-2">
                                            <div class="col-md-6 font-weight-bold">(4) Contract Hours</div>
                                            <div class="col-md-6 contract_hours"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="contract_hours" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(5) Keywords</div>
                                            <div class="col-md-6 keywords"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(5) Keywords</div>
                                            <div class="col-md-6 keywords"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="keywords" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(6) Management Level</div>
                                            <div class="col-md-6 management"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(6) Management Level</div>
                                            <div class="col-md-6 management"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="management_level" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(7) Experience</div>
                                            <div class="col-md-6 experience"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(7) Experience</div>
                                            <div class="col-md-6 experience"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="experience" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>


                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(8) Education Level</div>
                                            <div class="col-md-6 education"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(8) Education Level</div>
                                            <div class="col-md-6 education"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="education_level" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>


                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(9) Academic Institutions</div>
                                            <div class="col-md-6 institutions"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(9) Academic Institutions</div>
                                            <div class="col-md-6 institutions"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="institution" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(10) Language</div>
                                            <div class="col-md-6 languages"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(10) Language</div>
                                            <div class="col-md-6 languages"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="language" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(11) Geographical Experience</div>
                                            <div class="col-md-6 geographical"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(11) Geographical Experience</div>
                                            <div class="col-md-6 geographical"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="georophical" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(12) People Management</div>
                                            <div class="col-md-6 peop_manangement"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(12) People Management</div>
                                            <div class="col-md-6 peop_manangement"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="peop_manangement" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(13) Software & tech knowledge</div>
                                            <div class="col-md-6 skills"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(13) Software & tech knowledge</div>
                                            <div class="col-md-6 skills"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="skill" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(14) Field of Study</div>
                                            <div class="col-md-6 fields"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(14) Field of Study</div>
                                            <div class="col-md-6 fields"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="fields" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(15) Qualifications</div>
                                            <div class="col-md-6 qualifications"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(15) Qualifications</div>
                                            <div class="col-md-6 qualifications"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="qualifications" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(16) Key Strengths</div>
                                            <div class="col-md-6 keystrengths"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(16) Key Strengths</div>
                                            <div class="col-md-6 keystrengths"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="keystrengths" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(17) Position Title</div>
                                            <div class="col-md-6 positions"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(17) Position Title</div>
                                            <div class="col-md-6 positions"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="positions" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(18) Industry</div>
                                            <div class="col-md-6 industries"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(18) Industry</div>
                                            <div class="col-md-6 industries"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="industries" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(19) Functional Area</div>
                                            <div class="col-md-6 functions"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(19) Functional Area</div>
                                            <div class="col-md-6 functions"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="functions" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row">
                                    <div class="candidate col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(20) Target Employers</div>
                                            <div class="col-md-6 target_employers"></div>
                                        </div>
                                    </div>
                                    <div class="opportunity col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-6 font-weight-bold">(20) Target Employers</div>
                                            <div class="col-md-6 target_employers"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span id="target_employers" class="matched-icons d-none">
                                            <i class="fas fa-check-circle text-green"></i> matched
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none">
                                <div class="row d-none" id="result">
                                    <div class="col-md-6">
                                        <div class="row my-2">
                                            <div class="col-md-6">TSR score - <span id="tsr-score"></span></div>
                                            <div class="col-md-6">TSR percent - <span id="tsr-percent"></span>%</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row my-2">
                                            <div class="col-md-6">PSR score - <span id="psr-score"></span></div>
                                            <div class="col-md-6">PSR percent - <span id="psr-percent"></span>%</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <p>JSR Score - <span id="jsr"></span></p>
                                        <p>JSR Percent - <span id="jsr-percent"></span>%</p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="row mt-2">
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

                $('.candidate').addClass('d-none')
                $('.opportunity').addClass('d-none')

                $('.seeker-select').on('change', function() {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('admin/get/candidates/') }}" + '/' + $(this).val(),
                        success: function(res) {
                            console.log(res)

                            $('.candidate').removeClass('d-none')
                            $('.candidate .name').text(res.candidate.name)
                            $('.candidate .location').text(res.candidate.country)
                            $('.candidate .contract_terms').text(res.candidate.contract_terms)
                            $('.candidate .full_time_salary').text(res.candidate.full_time_salary)
                            $('.candidate .part_time_salary').text(res.candidate.part_time_salary)
                            $('.candidate .freelance_salary').text(res.candidate.freelance_salary)
                            $('.candidate .contract_hours').text(res.candidate.contract_hours)
                            $('.candidate .keywords').text(res.candidate.keywords)
                            $('.candidate .management').text(res.candidate.management)
                            $('.candidate .experience').text(res.candidate.experience)
                            $('.candidate .education').text(res.candidate.education)
                            $('.candidate .institutions').text(res.candidate.institutions)
                            $('.candidate .languages').text(res.candidate.languages)
                            $('.candidate .geographical').text(res.candidate.geographicals)
                            $('.candidate .peop_manangement').text(res.candidate.peop_manangement)
                            $('.candidate .skills').text(res.candidate.skills)
                            $('.candidate .fields').text(res.candidate.fields)
                            $('.candidate .qualifications').text(res.candidate.qualifications)
                            $('.candidate .keystrengths').text(res.candidate.keystrengths)
                            $('.candidate .positions').text(res.candidate.positions)
                            $('.candidate .industries').text(res.candidate.industries)
                            $('.candidate .functions').text(res.candidate.functions)
                            $('.candidate .target_employers').text(res.candidate.target_employers)
                        }
                    });
                })

                $('.opportunity-select').on('change', function() {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('admin/get/opportunities/') }}" + '/' + $(this).val(),
                        success: function(res) {

                            $('.opportunity').removeClass('d-none')
                            $('.opportunity .name').text(res.opportunity.name)
                            $('.opportunity .location').text(res.opportunity.country)
                            $('.opportunity .contract_terms').text(res.opportunity.contract_terms)
                            $('.opportunity .full_time_salary').text(res.opportunity
                                .full_time_salary)
                            $('.opportunity .part_time_salary').text(res.opportunity
                                .part_time_salary)
                            $('.opportunity .freelance_salary').text(res.opportunity
                                .freelance_salary)
                            $('.opportunity .full_time_salary_max').text(res.opportunity
                                .full_time_salary_max)
                            $('.opportunity .part_time_salary_max').text(res.opportunity
                                .part_time_salary_max)
                            $('.opportunity .freelance_salary_max').text(res.opportunity
                                .freelance_salary_max)
                            $('.opportunity .contract_hours').text(res.opportunity.contract_hours)
                            $('.opportunity .keywords').text(res.opportunity.keywords)
                            $('.opportunity .management').text(res.opportunity.management)
                            $('.opportunity .experience').text(res.opportunity.experience)
                            $('.opportunity .education').text(res.opportunity.education)
                            $('.opportunity .institutions').text(res.opportunity.institutions)
                            $('.opportunity .languages').text(res.opportunity.languages)
                            $('.opportunity .geographical').text(res.opportunity.geographicals)
                            $('.opportunity .peop_manangement').text(res.opportunity
                                .peop_manangement)
                            $('.opportunity .skills').text(res.opportunity.skills)
                            $('.opportunity .fields').text(res.opportunity.fields)
                            $('.opportunity .qualifications').text(res.opportunity.qualifications)
                            $('.opportunity .keystrengths').text(res.opportunity.keystrengths)
                            $('.opportunity .positions').text(res.opportunity.positions)
                            $('.opportunity .industries').text(res.opportunity.industries)
                            $('.opportunity .functions').text(res.opportunity.functions)
                            $('.opportunity .target_employers').text(res.opportunity
                                .target_employers)
                        }
                    });
                })

                $('select').on('change', function() {
                    $('.matched-icons').addClass('d-none')
                    if ($('.seeker-select').val() != "" && $('.opportunity-select').val() != "") {
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
                                $('hr').removeClass('d-none')

                                $('#result').removeClass('d-none')
                                $('#tsr-score').text(response.tsr)
                                $('#tsr-percent').text(response.tsr_percent)
                                $('#psr-score').text(response.psr)
                                $('#psr-percent').text(response.psr_percent)

                                $('#jsr').text(response.jsr)
                                $('#jsr-percent').text(response.jsr_percent)


                                // $('#calculation-result').find('p:first').text(
                                //     "The JSR Score  - " +
                                //     response
                                //     .jsr)

                                var match_factors = ''
                                response.matched_factors.forEach(function(item) {
                                    match_factors += item
                                    match_factors += ' , '
                                })
                                if (response.matched_factors.includes('Location')) $('#location')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Contract Terms')) $(
                                        '#contract_terms')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Salary')) $(
                                        '#target_salary')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Contract Hour')) $(
                                        '#contract_hours')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Keyword')) $(
                                        '#keywords')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Management Level')) $(
                                        '#management_level')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Experience')) $(
                                        '#experience')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Education')) $(
                                        '#education_level')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Academic Institution')) $(
                                        '#institution')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Language')) $(
                                        '#language')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Geographic experience')) $(
                                        '#georophical')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('People Management Level')) $(
                                        '#peop_manangement')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Skill')) $(
                                        '#skill')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Fields of Study')) $(
                                        '#fields')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes(
                                        'Qualifications & Certifications')) $('#qualifications')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Professional Strengths')) $(
                                        '#keystrengths')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Position Title')) $(
                                        '#positions')
                                    .removeClass(
                                        'd-none')

                                if (response.matched_factors.includes('Industry')) $(
                                        '#industries')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Functional Area')) $(
                                        '#functions')
                                    .removeClass(
                                        'd-none')
                                if (response.matched_factors.includes('Target Employer')) $(
                                        '#target_employers')
                                    .removeClass(
                                        'd-none')




                                // if (match_factors != '')
                                //     $('#calculation-result').find('p:last').text("Match with " +
                                //         match_factors)
                            }
                        });
                    }
                })

                // $('#calculate').click(function() {

                //     var form = $('#calculationForm')[0];
                //     var data = new FormData(form);
                //     data.append("_token", "{{ csrf_token() }}");
                //     $.ajax({
                //         type: "POST",
                //         url: "{{ route('score-calculation-result') }}",
                //         data: data,
                //         processData: false,
                //         contentType: false,
                //         success: function(response) {
                //             $('#calculation-result').find('p:first').text("The JSR Score is - " +
                //                 response
                //                 .jsr_percent)
                //             var match_factors = ''
                //             response.matched_factors.forEach(function(item) {
                //                 match_factors += item
                //                 match_factors += ' , '
                //             })
                //             if (match_factors != '')
                //                 $('#calculation-result').find('p:last').text("Match with " +
                //                     match_factors)
                //         }
                //     });

                // });
            });
        </script>
    @endpush
