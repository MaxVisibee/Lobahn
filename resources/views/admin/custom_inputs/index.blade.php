@extends('admin.layouts.master')

@section('content')

<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
  <li class="breadcrumb-item active">Custom Input</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="bold content-header"> Custom Input Management<small> </small></h4>
<div id="footer" class="footer" style="margin-left: 0px"></div>

<!-- end page-header -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="industry-tab" data-toggle="tab" href="#industry" role="tab" aria-controls="industry" aria-selected="true">Industry</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="institution-tab" data-toggle="tab" href="#institution" role="tab" aria-controls="institution" aria-selected="false">institution</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="target-employer-tab" data-toggle="tab" href="#target-employer" role="tab" aria-controls="target-employer" aria-selected="false">Target Company</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="position-title-tab" data-toggle="tab" href="#position-title" role="tab" aria-controls="position-title" aria-selected="false">Position Title</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="functional-area-tab" data-toggle="tab" href="#functional-area" role="tab" aria-controls="functional-area" aria-selected="false">Functional Area</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="keyword-tab" data-toggle="tab" href="#keyword" role="tab" aria-controls="keyword" aria-selected="false">keyword</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="skill-tab" data-toggle="tab" href="#skill" role="tab" aria-controls="skill" aria-selected="false">Software and technology ( Skill )</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="study-field-tab" data-toggle="tab" href="#study-field" role="tab" aria-controls="study-field" aria-selected="false">Study Field</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="qualification -tab" data-toggle="tab" href="#qualification" role="tab" aria-controls="qualification" aria-selected="false">Qualification</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="key-strength-tab" data-toggle="tab" href="#key-strength" role="tab" aria-controls="key-strength" aria-selected="false">Key Strength</a>
  </li>
</ul>



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
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
              class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
              class="fa fa-redo"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
              class="fa fa-minus"></i></a>
          <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
        </div>
      </div>
      <!-- end panel-heading -->
      <div class="tab-content" id="myTabContent">
          <!-- for Industry Tab -->
        <div class="tab-pane fade" id="industry" role="tabpanel" aria-labelledby="industry-tab">
            <div class="panel-body">
                <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                    <th width="1%">No.</th>
                    <th class="text-nowrap">Input Name</th>
                    <th class="text-nowrap">Request User Name</th>
                    <th class="text-nowrap">Request Company Name</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Created At</th>
                    <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($industries as $key => $industry)
                    <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $industry->name ?? '-' }}</td>
                    <td>{{ \App\Models\User::find($industry->user_id)->name ?? '-' }}</td>
                    <td>{{ \App\Models\Company::find($industry->company_id)->name ?? '-' }}</td>
                    <td>{{ $industry->status==0 ? 'Pending': 'Approved' }}</td>
                    <td>{{ isset($industry->created_at)? Carbon\Carbon::parse($industry->created_at)->format('d-m-Y') :'-' }}</td>
                    <td>
                    @if($industry->status==0)
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.approve', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-success"
                            data-toggle="tooltip" data-placement="top" title="Approve"
                            onclick="return confirm('Are you sure you would like to approve?');">
                            Approve
                        </button>
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.unapprove', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-danger"
                            data-toggle="tooltip" data-placement="top" title="UnApprove"
                            onclick="return confirm('Are you sure you would like to unapprove?');">
                            UnApprove
                        </button>
                    {!! Form::close() !!}
                    </td>
                    @endif
                    </tr>
                    @endforeach
                </tbody>
                </div>
                </table>
            </div>
        </div>
        <!-- end industry tab -->

        <!-- start institution tab -->
        <div class="tab-pane fade" id="institution" role="tabpanel" aria-labelledby="institution-tab">
            <div class="panel-body">
                <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                    <th width="1%">No.</th>
                    <th class="text-nowrap">Input Name</th>
                    <th class="text-nowrap">Request User Name</th>
                    <th class="text-nowrap">Request Company Name</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Created At</th>
                    <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($institutions as $key => $industry)
                    <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $industry->name ?? '-' }}</td>
                    <td>{{ \App\Models\User::find($industry->user_id)->name ?? '-' }}</td>
                    <td>{{ \App\Models\Company::find($industry->company_id)->name ?? '-' }}</td>
                    <td>{{ $industry->status==0 ? 'Pending': 'Approved' }}</td>
                    <td>{{ isset($industry->created_at)? Carbon\Carbon::parse($industry->created_at)->format('d-m-Y') :'-' }}</td>
                    <td>
                    @if($industry->status==0)
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.approve', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-success"
                            data-toggle="tooltip" data-placement="top" title="Approve"
                            onclick="return confirm('Are you sure you would like to approve?');">
                            Approve
                        </button>
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.unapprove', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-danger"
                            data-toggle="tooltip" data-placement="top" title="UnApprove"
                            onclick="return confirm('Are you sure you would like to unapprove?');">
                            UnApprove
                        </button>
                    {!! Form::close() !!}
                    </td>
                    @endif
                    </tr>
                    @endforeach
                </tbody>
                </div>
                </table>
            </div>
        </div>
        <!-- end institutions tab -->

        <!-- start Target Comapny tab -->
        <div class="tab-pane fade" id="target-employer" role="tabpanel" aria-labelledby="target-employer-tab">
            <div class="panel-body">
                <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                    <th width="1%">No.</th>
                    <th class="text-nowrap">Input Name</th>
                    <th class="text-nowrap">Request User Name</th>
                    <th class="text-nowrap">Request Company Name</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Created At</th>
                    <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($target_employers as $key => $industry)
                    <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $industry->name ?? '-' }}</td>
                    <td>{{ \App\Models\User::find($industry->user_id)->name ?? '-' }}</td>
                    <td>{{ \App\Models\Company::find($industry->company_id)->name ?? '-' }}</td>
                    <td>{{ $industry->status==0 ? 'Pending': 'Approved' }}</td>
                    <td>{{ isset($industry->created_at)? Carbon\Carbon::parse($industry->created_at)->format('d-m-Y') :'-' }}</td>
                    <td>
                    @if($industry->status==0)
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.approve', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-success"
                            data-toggle="tooltip" data-placement="top" title="Approve"
                            onclick="return confirm('Are you sure you would like to approve?');">
                            Approve
                        </button>
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.unapprove', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-danger"
                            data-toggle="tooltip" data-placement="top" title="UnApprove"
                            onclick="return confirm('Are you sure you would like to unapprove?');">
                            UnApprove
                        </button>
                    {!! Form::close() !!}
                    </td>
                    @endif
                    </tr>
                    @endforeach
                </tbody>
                </div>
                </table>
            </div>
        </div>
       <!-- end Target Comapny tab -->

       <!-- start position-title tab -->
       <div class="tab-pane fade" id="position-title" role="tabpanel" aria-labelledby="position-title-tab">
            <div class="panel-body">
                <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                    <th width="1%">No.</th>
                    <th class="text-nowrap">Input Name</th>
                    <th class="text-nowrap">Request User Name</th>
                    <th class="text-nowrap">Request Company Name</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Created At</th>
                    <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($position_titles as $key => $industry)
                    <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $industry->name ?? '-' }}</td>
                    <td>{{ \App\Models\User::find($industry->user_id)->name ?? '-' }}</td>
                    <td>{{ \App\Models\Company::find($industry->company_id)->name ?? '-' }}</td>
                    <td>{{ $industry->status==0 ? 'Pending': 'Approved' }}</td>
                    <td>{{ isset($industry->created_at)? Carbon\Carbon::parse($industry->created_at)->format('d-m-Y') :'-' }}</td>
                    <td>
                    @if($industry->status==0)
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.approve', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-success"
                            data-toggle="tooltip" data-placement="top" title="Approve"
                            onclick="return confirm('Are you sure you would like to approve?');">
                            Approve
                        </button>
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.unapprove', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-danger"
                            data-toggle="tooltip" data-placement="top" title="UnApprove"
                            onclick="return confirm('Are you sure you would like to unapprove?');">
                            UnApprove
                        </button>
                    {!! Form::close() !!}
                    </td>
                    @endif
                    </tr>
                    @endforeach
                </tbody>
                </div>
                </table>
            </div>
        </div>
       <!-- end positions tab -->

        <!-- start Functional Area tab -->
        <div class="tab-pane fade" id="functional-area" role="tabpanel" aria-labelledby="functional-area-tab">
            <div class="panel-body">
                <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                    <th width="1%">No.</th>
                    <th class="text-nowrap">Input Name</th>
                    <th class="text-nowrap">Request User Name</th>
                    <th class="text-nowrap">Request Company Name</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Created At</th>
                    <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($functional_areas as $key => $industry)
                    <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $industry->name ?? '-' }}</td>
                    <td>{{ \App\Models\User::find($industry->user_id)->name ?? '-' }}</td>
                    <td>{{ \App\Models\Company::find($industry->company_id)->name ?? '-' }}</td>
                    <td>{{ $industry->status==0 ? 'Pending': 'Approved' }}</td>
                    <td>{{ isset($industry->created_at)? Carbon\Carbon::parse($industry->created_at)->format('d-m-Y') :'-' }}</td>
                    <td>
                    @if($industry->status==0)
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.approve', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-success"
                            data-toggle="tooltip" data-placement="top" title="Approve"
                            onclick="return confirm('Are you sure you would like to approve?');">
                            Approve
                        </button>
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.unapprove', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-danger"
                            data-toggle="tooltip" data-placement="top" title="UnApprove"
                            onclick="return confirm('Are you sure you would like to unapprove?');">
                            UnApprove
                        </button>
                    {!! Form::close() !!}
                    </td>
                    @endif
                    </tr>
                    @endforeach
                </tbody>
                </div>
                </table>
            </div>
        </div>
       <!-- end Functional Area tab -->

         <!-- start keyword tab -->
        <div class="tab-pane fade" id="keyword" role="tabpanel" aria-labelledby="keyword-tab">
            <div class="panel-body">
                <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                    <th width="1%">No.</th>
                    <th class="text-nowrap">Input Name</th>
                    <th class="text-nowrap">Request User Name</th>
                    <th class="text-nowrap">Request Company Name</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Created At</th>
                    <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keywords as $key => $industry)
                    <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $industry->name ?? '-' }}</td>
                    <td>{{ \App\Models\User::find($industry->user_id)->name ?? '-' }}</td>
                    <td>{{ \App\Models\Company::find($industry->company_id)->name ?? '-' }}</td>
                    <td>{{ $industry->status==0 ? 'Pending': 'Approved' }}</td>
                    <td>{{ isset($industry->created_at)? Carbon\Carbon::parse($industry->created_at)->format('d-m-Y') :'-' }}</td>
                    <td>
                    @if($industry->status==0)
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.approve', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-success"
                            data-toggle="tooltip" data-placement="top" title="Approve"
                            onclick="return confirm('Are you sure you would like to approve?');">
                            Approve
                        </button>
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.unapprove', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-danger"
                            data-toggle="tooltip" data-placement="top" title="UnApprove"
                            onclick="return confirm('Are you sure you would like to unapprove?');">
                            UnApprove
                        </button>
                    {!! Form::close() !!}
                    </td>
                    @endif
                    </tr>
                    @endforeach
                </tbody>
                </div>
                </table>
            </div>
        </div>
       <!-- end Keywords tab -->

        <!-- start Software and technology ( Skill ) tab -->
        <div class="tab-pane fade" id="skill" role="tabpanel" aria-labelledby="skill-tab">
            <div class="panel-body">
                <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                    <th width="1%">No.</th>
                    <th class="text-nowrap">Input Name</th>
                    <th class="text-nowrap">Request User Name</th>
                    <th class="text-nowrap">Request Company Name</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Created At</th>
                    <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skills as $key => $industry)
                    <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $industry->name ?? '-' }}</td>
                    <td>{{ \App\Models\User::find($industry->user_id)->name ?? '-' }}</td>
                    <td>{{ \App\Models\Company::find($industry->company_id)->name ?? '-' }}</td>

                    <td>{{ $industry->status==0 ? 'Pending': 'Approved' }}</td>
                    <td>{{ isset($industry->created_at)? Carbon\Carbon::parse($industry->created_at)->format('d-m-Y') :'-' }}</td>
                    <td>
                    @if($industry->status==0)
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.approve', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-success"
                            data-toggle="tooltip" data-placement="top" title="Approve"
                            onclick="return confirm('Are you sure you would like to approve?');">
                            Approve
                        </button>
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.unapprove', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-danger"
                            data-toggle="tooltip" data-placement="top" title="UnApprove"
                            onclick="return confirm('Are you sure you would like to unapprove?');">
                            UnApprove
                        </button>
                    {!! Form::close() !!}
                    </td>
                    @endif
                    </tr>
                    @endforeach
                </tbody>
                </div>
                </table>
            </div>
        </div>
       <!-- end Software and technology ( Skill ) tab -->

       <!-- start Study Field tab -->
       <div class="tab-pane fade" id="study-field" role="tabpanel" aria-labelledby="study-field-tab">
            <div class="panel-body">
                <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                    <th width="1%">No.</th>
                    <th class="text-nowrap">Input Name</th>
                    <th class="text-nowrap">Request User Name</th>
                    <th class="text-nowrap">Request Company Name</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Created At</th>
                    <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($study_fields as $key => $industry)
                    <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $industry->name ?? '-' }}</td>
                    <td>{{ \App\Models\User::find($industry->user_id)->name ?? '-' }}</td>
                    <td>{{ \App\Models\Company::find($industry->company_id)->name ?? '-' }}</td>
                    <td>{{ $industry->status==0 ? 'Pending': 'Approved' }}</td>
                    <td>{{ isset($industry->created_at)? Carbon\Carbon::parse($industry->created_at)->format('d-m-Y') :'-' }}</td>
                    <td>
                    @if($industry->status==0)
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.approve', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-success"
                            data-toggle="tooltip" data-placement="top" title="Approve"
                            onclick="return confirm('Are you sure you would like to approve?');">
                            Approve
                        </button>
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.unapprove', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-danger"
                            data-toggle="tooltip" data-placement="top" title="UnApprove"
                            onclick="return confirm('Are you sure you would like to unapprove?');">
                            UnApprove
                        </button>
                    {!! Form::close() !!}
                    </td>
                    @endif
                    </tr>
                    @endforeach
                </tbody>
                </div>
                </table>
            </div>
        </div>
       <!-- end Study Field tab -->

        <!-- start Qualification tab -->
        <div class="tab-pane fade" id="qualification" role="tabpanel" aria-labelledby="qualification-tab">
            <div class="panel-body">
                <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                    <th width="1%">No.</th>
                    <th class="text-nowrap">Input Name</th>
                    <th class="text-nowrap">Request User Name</th>
                    <th class="text-nowrap">Request Company Name</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Created At</th>
                    <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($qualifications as $key => $industry)
                    <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $industry->name ?? '-' }}</td>
                    <td>{{ \App\Models\User::find($industry->user_id)->name ?? '-' }}</td>
                    <td>{{ \App\Models\Company::find($industry->company_id)->name ?? '-' }}</td>
                    <td>{{ $industry->status==0 ? 'Pending': 'Approved' }}</td>
                    <td>{{ isset($industry->created_at)? Carbon\Carbon::parse($industry->created_at)->format('d-m-Y') :'-' }}</td>
                    <td>
                    @if($industry->status==0)
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.approve', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-success"
                            data-toggle="tooltip" data-placement="top" title="Approve"
                            onclick="return confirm('Are you sure you would like to approve?');">
                            Approve
                        </button>
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.unapprove', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-danger"
                            data-toggle="tooltip" data-placement="top" title="UnApprove"
                            onclick="return confirm('Are you sure you would like to unapprove?');">
                            UnApprove
                        </button>
                    {!! Form::close() !!}
                    </td>
                    @endif
                    </tr>
                    @endforeach
                </tbody>
                </div>
                </table>
            </div>
        </div>
       <!-- end Qualification tab -->

       <!-- start Key Strength tab -->
       <div class="tab-pane fade" id="key-strength" role="tabpanel" aria-labelledby="key-strength-tab">
            <div class="panel-body">
                <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                    <th width="1%">No.</th>
                    <th class="text-nowrap">Input Name</th>
                    <th class="text-nowrap">Request User Name</th>
                    <th class="text-nowrap">Request Company Name</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Created At</th>
                    <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keystrengths as $key => $industry)
                    <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $industry->name ?? '-' }}</td>
                    <td>{{ \App\Models\User::find($industry->user_id)->name ?? '-' }}</td>
                    <td>{{ \App\Models\Company::find($industry->company_id)->name ?? '-' }}</td>
                    <td>{{ $industry->status==0 ? 'Pending': 'Approved' }}</td>
                    <td>{{ isset($industry->created_at)? Carbon\Carbon::parse($industry->created_at)->format('d-m-Y') :'-' }}</td>
                    <td>
                    @if($industry->status==0)
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.approve', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-success"
                            data-toggle="tooltip" data-placement="top" title="Approve"
                            onclick="return confirm('Are you sure you would like to approve?');">
                            Approve
                        </button>
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['method' => 'POST', 'route' => ['custom_inputs.unapprove', $industry->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-danger"
                            data-toggle="tooltip" data-placement="top" title="UnApprove"
                            onclick="return confirm('Are you sure you would like to unapprove?');">
                            UnApprove
                        </button>
                    {!! Form::close() !!}
                    </td>
                    @endif
                    </tr>
                    @endforeach
                </tbody>
                </div>
                </table>
            </div>
        </div>
       <!-- end Key Strength tab -->

    </div>
      <!-- begin panel-body -->
     
      <!-- end panel-body -->
    </div>
    <!-- end panel -->
  </div>
  <!-- end col-10 -->
</div>
<!-- end row -->

<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
    class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
<!-- end page container -->


@endsection

@push('scripts')
<script>
//redirect to specific tab
$(document).ready(function () {
if("{{$tab}}"){
    $('#myTab a[href="#industry"]').tab('show')
}
$('#myTab a[href="#{{Session::get('tab')}}"]').tab('show')
});
</script>
@endpush