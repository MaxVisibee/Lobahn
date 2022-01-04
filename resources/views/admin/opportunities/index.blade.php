@extends('admin.layouts.master')
<!-- begin #page-loader -->
  <!-- <div id="page-loader" class="fade show">
    <div class="material-loader">
      <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
      </svg>
      <div class="message">Loading...</div>
    </div>
  </div> -->
<!-- end #page-loader -->
@section('content')
<!-- begin #content -->
<!-- <div id="content" class="content"> -->
  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item active">Job Opportunity</li>
  </ol>
  <!-- end breadcrumb -->

 <!-- begin page-header -->
  <h4 class="bold content-header"> JobOpportunity Management<small> </small></h4>
  <div id="footer" class="footer" style="margin-left: 0px"></div>
  <div class="row m-b-10">
    <div class="col-lg-12">
      <div>
        <a class="btn btn-primary" href="{{ route('opportunities.create') }}"><i class="fa fa-plus"></i> Create New JobOpportunity</a>            
      </div>
    </div>
  </div>  
  <!-- end page-header -->
   
  <!-- end page-header -->
  <!-- begin row -->
  <div class="row">
    <!-- begin col-12-->
    <div class="col-xl-12">
      <!-- begin panel -->
      <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading">
          <h4 class="panel-title"><!-- Job Opportunity Managements --></h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
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
                <th class="text-nowrap" width="10%">JobTitle</th>
                <th class="text-nowrap" width="10%">Country</th>
                <th class="text-nowrap" width="10%">Employer</th>
                <th class="text-nowrap" width="10%">Documents</th>
                <th class="text-nowrap" width="10%">Status</th>
                <th class="text-nowrap" width="10%">MembershipPlan</th>
                <!-- <th class="text-nowrap">Position</th>
                <th class="text-nowrap">Gender</th>
                <th class="text-nowrap">Contract Terms</th>
                <!-- <th class="text-nowrap">Experinece</th>
                <th class="text-nowrap">Skill</th> -->                               
                <th class="text-nowrap" width="10%">Listing Date</th>
                <th class="text-nowrap" width="10%">Expire Date</th>
                <th class="text-nowrap" width="15%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $key => $job)
              <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $job->title ?? '-' }}</td>
                <td>{{ $job->country->country_name ?? '-' }}</td>
                <td>{{ $job->company->company_name ?? '-' }} </td>
                <td>
                  @if(isset($job->supporting_document))
                    <a href='{{ asset("uploads/job_support_docs/$job->supporting_document") }}' class="psub-link active" target="_blank">Documents</a>
                  @else
                    -
                  @endif
                </td>
                <td>{{ $job->is_active == 1 ? "Open" : "Close" ?? '-' }}</td>
                <td>{{ $job->company->package->package_title ?? '-' }}</td>
                <!--<td>{{ $job->jobTitle->job_title ?? ''}}</td>
                <td>{{ $job->gender ?? '-' }}</td>
                <td>{{ $job->jobType->job_type ?? '-' }}</td>
                <td>{{ $job->jobExperience->job_experience ?? '-' }}</td> 
                <td>{{ $job->jobSkill->job_skill ?? '-' }}
                </td>                             
                <td>{{ $job->created_at->format('d/m/Y')}}</td> -->
                <td>
                  @isset($job->listing_date) 
                    {!! date('d-M-Y', strtotime($job->listing_date)) ?? '-' !!}
                  @else
                    -
                  @endisset
                </td>
                <td>
                    @isset($job->expire_date) 
                      {!! date('d-M-Y', strtotime($job->expire_date)) ?? '-' !!}
                    @else
                      -
                    @endisset
                </td>
                <td>
                  <a class="btn btn-success btn-icon btn-circle" href="{{ route('opportunities.show',$job->id) }}"><i class="fas fa-eye"></i></a>
                  <a class="btn btn-warning btn-icon btn-circle" href="{{ route('opportunities.edit',$job->id) }}"> <i class="fa fa-edit"></i></a>
                  <form action="{{ route('opportunities.destroy', $job->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="btn btn-danger btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Delete">
                          <i class='fas fa-times'></i>
                      </button>
                  </form>
                </td>
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
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
  <!-- end scroll to top btn -->
</div>
  <!-- end page container -->
@endsection

@push('css')
<style>
    table.dataTable thead>tr>th.sorting_asc,
    table.dataTable thead>tr>th.sorting_desc, 
    table.dataTable thead>tr>th.sorting,
    table.dataTable thead>tr>td.sorting_asc,
    table.dataTable thead>tr>td.sorting_desc,
    table.dataTable thead>tr>td.sorting{
      padding-right: 20px;
    }
</style>
@endpush