@extends('admin.layouts.master')

@section('content')

    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item active">Seekers</li>
    </ol>
    <!-- end breadcrumb -->
    {{-- begin page-header --}}
    <h4 class="bold content-header"> Mail <small> </small></h4>

    <hr class="mt-0">

    {{-- end page-header --}}

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Seeker List</h4>
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

                <!-- begin panel-body -->
                <div class="panel-body">
                    <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th class="text-nowrap">Name</th>
                                <th class="text-nowrap">Email</th>
                                <th class="text-nowrap">Phone</th>
                                <th class="text-nowrap">Nationality</th>
                                <th class="text-nowrap">NRIC</th>
                                <th class="text-nowrap" width="14%" style='text-align:center; vertical-align:middle'>
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($users as $key=>$user)
                                <tr class="odd gradeX">
                                    <td width="1%" class="f-s-600 text-inverse">{{ $key + 1 }}</td>
                                    <td>{{ $user->name ?? '-' }}</td>
                                    <td>{{ $user->email ?? '-' }}</td>
                                    <td>{{ $user->phone ?? '-' }}</td>
                                    <td>{{ $user->nationality ?? '-' }}</td>
                                    <td>{{ $user->nric ?? '-' }}</td>
                                    <td style='text-align:center; vertical-align:middle'>
                                        <!-- Button trigger modal -->
                                        <button data-email="{{ $user->email }}" type="button"
                                            class="mailModal btn btn-success btn-icon btn-circle" data-toggle="modal"
                                            data-target="#mailModal">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr class="odd gradeX">
                                    <td colspan="4" class='text-center'> Empty User Record! </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="mailModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mailModalLabel">Mail </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="/admin/mail">
                                    <div class="modal-body">

                                        @csrf
                                        <h5>To</h5>
                                        <div class="input-group mb-3">
                                            <input type="text" class="to form-control" placeholder="" name="mailto"
                                                readonly>
                                        </div>
                                        <hr>
                                        <h5>Subject</h5>

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="" name="subject"
                                                aria-label="Mail Subject" aria-describedby="basic-addon2">
                                        </div>
                                        <hr>
                                        <h5>Body</h5>
                                        <div class="mail-body" style="border: solid 1px #e9ecef ">
                                            <textarea class="body form-control" aria-label="With textarea"
                                                name="body"></textarea>
                                        </div>
                                        {{-- <hr>
                                    <h5>Attachment</h5>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" multiple>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div> --}}

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Discard</button>
                                        <button type="submit" class="btn btn-primary">Send Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                </div>
                <!-- end panel-body -->
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
    </div>
    <!-- end row -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Admin List</h4>
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

                <!-- begin panel-body -->
                <div class="panel-body table-responsive">
                    <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th class="text-nowrap">Company Name</th>
                                <th class="text-nowrap">Office Email</th>
                                <th class="text-nowrap">Office Phone</th>
                                <th class="text-nowrap">Main Industry</th>
                                <th class="text-nowrap">SubSector Name</th>
                                <th class="text-nowrap" width="13%" style='text-align:center; vertical-align:middle'>
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($companies as $key=>$company)
                                <tr class="odd gradeX">
                                    <td width="1%" class="f-s-600 text-inverse">{{ $key + 1 }}</td>
                                    <td>{{ $company->name ?? '-' }}</td>
                                    <td>{{ $company->email ?? '-' }}</td>
                                    <td>{{ $company->phone ?? '-' }}</td>
                                    <td>{{ $company->industry->industry_name ?? '-' }}</td>
                                    <td>{{ $company->subsector->sub_sector_name ?? '-' }}</td>
                                    <td style='text-align:center; vertical-align:middle'>
                                        <!-- Button trigger modal -->
                                        <button data-email="{{ $company->email }}" type="button"
                                            class="mailModal btn btn-success btn-icon btn-circle" data-toggle="modal"
                                            data-target="#mailModal">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr class="odd gradeX">
                                    <td colspan="4" class='text-center'> Empty Company Record! </td>
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

    <script type="text/javascript">
        $(".mailModal").click(function() {
            var passedID = $(this).data('email'); //get the id of the selected button
            $('.to').val(passedID); //set the id to the input on the modal
            $('.note-toolbar-wrapper').removeAttr('style');
            $('.note-toolbar').removeAttr('style');
        });
    </script>


    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('textarea.body').summernote({
                height: 300,
                width: 465,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['picture']
                ],

            });
        });
    </script>

@endpush
